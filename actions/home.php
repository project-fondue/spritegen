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
   
   $oCssSpriteGen = new CssSpriteGen();
   
   if (!empty($_POST)) {
      $bFormError = !$oCssSpriteGen->ProcessForm();
      $bUploadError = !(bool)($sFolderMD5 = $oCssSpriteGen->ProcessFile());
      
      if (!$bUploadError) {
         $oTemplate->Set('zipFolder', $oCssSpriteGen->GetZipFolder());
         $oTemplate->Set('zipFolderHash', $oCssSpriteGen->GetZipFolderHash());
      }
      
      if (!$bFormError && !$bUploadError) {
         $oCssSpriteGen->CreateSprite($sFolderMD5);
         $oTemplate->Set('filename', $oCssSpriteGen->GetSpriteFilename());
         $oTemplate->Set('hash', $oCssSpriteGen->GetSpriteHash());
         $oTemplate->Set('css', $oCssSpriteGen->GetCss());
         $oTemplate->Set('validImages', $oCssSpriteGen->ValidImages());
      } else {
         $oTemplate->Set('validImages', false);
      }
      
      $oTemplate->Set('formError', $bFormError);
      $oTemplate->Set('uploadError', $bUploadError);
   }
   
   $bFormPosted = !empty($_POST);
   $aFormErrors = $oCssSpriteGen->GetAllErrors();
   
   $oTemplate->Set('title', $oTranslations->Get('page.title.home'));
   $oTemplate->Set('maxFileSize', (int)(MAX_FILE_SIZE));
   $oTemplate->Set('imageTypes', TemplateFunctions::ConvertArrayToMulti($oCssSpriteGen->GetImageTypes()));
   $oTemplate->Set('formPosted', $bFormPosted);
   $oTemplate->Set('formErrors', $aFormErrors);
   $oTemplate->Set('useApi', !empty($_GET['use-api']));
   $oTemplate->Set('functions', new TemplateFunctions($bFormPosted, $aFormErrors));
?>