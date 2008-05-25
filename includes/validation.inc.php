<?php
   /***************************************************************/
   /* Licensed under BSD License with the following exceptions:

      -----------------------------------------------------------------
      * Design elements (images, CSS) relating to the "Website Performance" 
        branding and web site remain copyright of Ed Eliot & 
        Stuart Colville and should not be used without written 
        permission.
      * If you host a copy of the tool publicly in a largely unaltered 
        form and with the same application name then you must add clear 
        notices to explain that it is a copy of the original and provide 
        a link back to our that original hosted version 
        at http://spritegen.website-performance.org/.
      ------------------------------------------------------------------

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
   
   class Validation {
      protected $aFormValues = array();
      protected $aFormErrors = array();
      protected $aFieldsToIgnore = array();
      protected $aOptionalFields = array();
      protected $aRules = array();
      
      public function __construct($aData, $aFieldsToIgnore, $aOptionalFields, $aRules) {
         $this->aFieldsToIgnore = $aFieldsToIgnore;
         $this->aOptionalFields = $aOptionalFields;
         $this->aRules = $aRules;
         
         $this->aFormErrors['missing'] = array();
         $this->aFormErrors['invalid'] = array();
         
         foreach ($aData as $sKey => $sValue) {
            if (!in_array($sKey, $this->aFieldsToIgnore)) {
               if (!empty($sValue) || in_array($sKey, $this->aOptionalFields)) {
                  $this->aFormValues[$sKey] = $sValue;
                  
                  if (!empty($sValue)) {
                     if (array_key_exists($sKey, $this->aRules)) {
                        foreach ($this->aRules[$sKey] as $sRule) {
                           if (!$this->$sRule($sKey)) {
                              break;
                           }
                        }
                     }
                  }
               } else {
                  $this->aFormErrors['missing'][] = $sKey;
               }
            }
         }
      }
      
      protected function IsNumber($sKey) {
         if (!is_numeric($this->aFormValues[$sKey])) {
            $this->aFormErrors['invalid'][$sKey] = 'IsNumber';
            return false;
         }
         return true;
      }
      
      protected function IsHex($sKey) {
         if (!preg_match("/^#?([0-9a-f]{3}|[0-9a-f]{6})$/i", $this->aFormValues[$sKey])) {
            $this->aFormErrors['invalid'][$sKey] = 'IsHex';
            return false;
         }
         return true;
      }
      
      protected function IsImageType($sKey) {
         if (!in_array($this->aFormValues[$sKey], array('GIF', 'PNG', 'JPG'))) {
            $this->aFormErrors['invalid'][$sKey] = 'IsImageType';
            return false;
         }
         return true;
      }
      
      protected function IsPercent($sKey) {
         if ($this->aFormValues[$sKey] < 0 || $this->aFormValues[$sKey] > 100) {
            $this->aFormErrors['invalid'][$sKey] = 'IsPercent';
            return false;
         }
         return true;
      }
      
      protected function IsIgnoreOption($sKey) {
         if (!in_array($this->aFormValues[$sKey], array('ignore', 'merge'))) {
            $this->aFormErrors['invalid'][$sKey] = 'IsIgnoreOption';
            return false;
         }
         return true;
      }
      
      protected function IsClassPrefix($sKey) {
         if (!preg_match("/^[^0-9]{1}[a-z0-9_-]+$/i", $this->aFormValues[$sKey])) {
            $this->aFormErrors['invalid'][$sKey] = 'IsClassPrefix';
            return false;
         }
         return true;
      }
      
      protected function IsCss($sKey) {
         echo $sKey;
         if (!preg_match("/^[a-z0-9_\.\s\#-]+$/i", $this->aFormValues[$sKey])) {
            $this->aFormErrors['invalid'][$sKey] = 'IsCss';
            return false;
         }
         return true;
      }
      
      public function FormOk() {
         return !count($this->aFormErrors['missing']) && !count($this->aFormErrors['invalid']);
      }
      
      public function GetFormValues() {
         return $this->aFormValues;
      }
      
      public function GetMissingFields() {
         return $this->aFormErrors['missing'];
      }
      
      public function GetInvalidFields() {
         return $this->aFormErrors['invalid'];
      }
      
      public function GetAllErrors() {
         return $this->aFormErrors;
      }
   }
?>