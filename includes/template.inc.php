<?php
   /***************************************************************/
   /* Software License Agreement (BSD License)

      Copyright (C) 2007-2008, Ed Eliot & Stuart Colville.
      All rights reserved.

      Redistribution and use in source and binary forms, with or without
      modification, are permitted provided that the following conditions are met:

         * Redistributions of source code must retain the above copyright
           notice, this list of conditions and the following disclaimer.
         * Redistributions in binary form must reproduce the above copyright
           notice, this list of conditions and the following disclaimer in the
           documentation and/or other materials provided with the distribution.
         * Neither the name of Ed Eliot & Stuart Colville nor the names of its contributors 
           may be used to endorse or promote products derived from this software 
           without specific prior written permission of Ed Eliot & Stuart Colville.

      THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS" AND ANY
      EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
      WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
      DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY
      DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
      (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
      LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
      ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
      (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
      SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
                                                                  */
   /***************************************************************/
   
   class Template {
      protected $sTemplate;
      protected $sLang;
      protected $sTemplatePath;
      protected $aVars = array();
      protected $aFunctions = array();
      protected $aPostFilters = array();
      protected $bDebug;
      protected $bCacheSupport;
      protected $aCacheConditions = array();
      protected $iCacheLength;
      protected $oCache = null;
      
      public function __construct(
         $sTemplate,
         $sLang = '',
         $sTemplatePath = TEMPLATE_PATH,
         $iCacheLength = TEMPLATE_CACHE_LENGTH,
         $bDebug = TEMPLATE_DEBUG
      ) {
         $this->sTemplate = $sTemplate;
         $this->sLang = $sLang;
         $this->sTemplatePath = $sTemplatePath;
         $this->bDebug = $bDebug;
         $this->bCacheSupport = class_exists('PhpCache') && $iCacheLength;
         $this->iCacheLength = $iCacheLength;
      }
      
      public function AddCacheCondition($vCondition) {
         if (is_array($vCondition)) {
            $this->aCacheConditions = array_merge($this->aCacheConditions, $vCondition);
         } else {
            $this->aCacheConditions[] = $vCondition;
         }
      }
      
      public function SetCacheLength($iCacheLength) {
         $this->iCacheLength = $iCacheLength;
      }
      
      public function IsCached() {
         // is caching support available
         if ($this->bCacheSupport) {
            if (is_null($this->oCache)) {
               $this->oCache = new PhpCache(implode('_', $this->aCacheConditions), $this->iCacheLength);
            }
         
            return $this->oCache->Check();
         }
         return false;
      }
      
      public function Set(
         $sName,
         $vValue,
         $bStripHtml = TEMPLATE_STRIP_HTML,
         $bConvertEntities = TEMPLATE_CONVERT_ENTITIES,
         $sCharSet = TEMPLATE_ENCODING
      ) {
         $this->aVars[$sName] = $vValue;
         
         // variable value might be a reference to a sub-template
         if (!($vValue instanceof Template) && is_scalar($vValue)) {
            if ($bStripHtml) {
               $this->aVars[$sName] = strip_tags($this->aVars[$sName]);
            }

            if ($bConvertEntities) {
               $this->aVars[$sName] = htmlentities($this->aVars[$sName], $sCharSet);
            }
         }
      }
      
      public function AddPostFilter($sFunctionName) {
         $this->aPostFilters[] = $sFunctionName;
      }
      
      public function Display() {
         if (!$this->IsCached()) {
            $sOutput = '';
         
            // looping rather than using extract because we need to determine the value type before assigning
            foreach ($this->aVars as $sKey => &$vValue) {
               // is this variable a reference to a sub-template
               if ($vValue instanceof Template) {
                  // pass variables from parent to sub-template but don't override variables in sub-template 
                  // if they already exist as they are more specific
                  foreach ($this->aVars as $sSubKey => $vSubValue) {
                     if (!($vSubValue instanceof Template) && !array_key_exists($sSubKey, $vValue->aVars)) {
                        $vValue->aVars[$sSubKey] = $vSubValue;
                     }
                  }
                  // disable caching for sub-template
                  $vValue->bCacheSupport = false;
                  // display sub-template and assign output to parent variable
                  $$sKey = $vValue->Display();
               } else {
                  $$sKey = $vValue;
               }
            }
            
            // add template functions
            $methods = $this->aFunctions;
            
            if ($this->bDebug) {
               $sOutput .= "\n<!-- start $this->sTemplate -->\n";
            }
            // use output buffers to capture data from require statement and store in variable
            ob_start();
            if (
               $this->sLang != '' && 
               file_exists($this->sTemplatePath.TEMPLATE_LOCALES_PATH."$this->sLang/".$this->sTemplate)
            ) {
               $this->AddCacheCondition($this->sLang);
               require($this->sTemplatePath.TEMPLATE_LOCALES_PATH."$this->sLang/".$this->sTemplate);
            } else {
               require($this->sTemplatePath.$this->sTemplate);
            }
            $sOutput .= ob_get_clean();
            if ($this->bDebug) {
               $sOutput .= "\n<!-- end $this->sTemplate -->\n";
            }
         
            // process content against defined post filters
            foreach ($this->aPostFilters as $sPostFilter) {
               $sOutput = $sPostFilter($sOutput);
            }
            // is caching support available
            if ($this->bCacheSupport) {
               $this->oCache->Set($sOutput);
            }
            return $sOutput;
         } else {
            return $this->oCache->Get();
         }
      }
   }
?>