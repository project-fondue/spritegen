<?php
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