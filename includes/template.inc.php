<?php
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