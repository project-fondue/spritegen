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
   
   class TemplateFunctions {
      protected $bFormPosted;
      protected $aFormErrors;
      
      public function __construct($bFormPosted, $aFormErrors) {
         $this->bFormPosted = $bFormPosted;
         $this->aFormErrors = $aFormErrors;
      }
      
      protected function HasError($sField) {
         if (
            $this->bFormPosted && (in_array($sField, $this->aFormErrors['missing']) || 
            array_key_exists($sField, $this->aFormErrors['invalid']))
         ) {
            return true;
         }
         return false;
      }

      protected function GetCurrentValue($sField, $sDefault) {
         if (isset($_POST[$sField])) {
            return htmlspecialchars($_POST[$sField]);
         }
         return $sDefault;
      }
      
      public function TextInput($sId, $sLabel, $vDefault = '', $iSize = null, $sHint = '', $bOptional = false) {
         $oTemplate = new Template('text-input.php');
         $oTemplate->Set('id', $sId);
         $oTemplate->Set('label', $sLabel);
         $oTemplate->Set('value', $this->GetCurrentValue($sId, $vDefault));
         $oTemplate->Set('size', $iSize);
         $oTemplate->Set('hint', $sHint);
         $oTemplate->Set('optional', $bOptional);
         $oTemplate->Set('error', $this->HasError($sId));
         
         return $oTemplate->Display();
      }
      
      public function SelectInput($sId, $sLabel, $aOptions, $vDefault = '', $sHint = '') {
         $oTemplate = new Template('select-input.php');
         $oTemplate->Set('id', $sId);
         $oTemplate->Set('label', $sLabel);
         $oTemplate->Set('options', $aOptions);
         $oTemplate->Set('value', $this->GetCurrentValue($sId, $vDefault));
         $oTemplate->Set('hint', $sHint);
         
         return $oTemplate->Display();
      }
      
      public function RadioInput($sName, $sId, $sLabel, $vValue, $vDefault) {
         $oTemplate = new Template('radio-input.php');
         $oTemplate->Set('name', $sName);
         $oTemplate->Set('id', $sId);
         $oTemplate->Set('label', $sLabel);
         $oTemplate->Set('value', $vValue);
         $oTemplate->Set('current', $this->GetCurrentValue($sName, $vDefault));
         
         return $oTemplate->Display();
      }
   }
?>