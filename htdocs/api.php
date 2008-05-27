<?php
   require('../includes/config.inc.php');
   
   $oCssSpriteGen = new CssSpriteGen();
   
   if (!empty($_POST) || !empty($_FILES)) {
      (!empty($_POST['type']) && $_POST['type']) == 'php' ? $sType = 'php' : $sType = 'json';
      if (empty($_POST['width-resize'])) {
         $_POST['width-resize'] = 100;
      }
      if (empty($_POST['height-resize'])) {
         $_POST['height-resize'] = 100;
      }
      if (empty($_POST['ignore-duplicates'])) {
         $_POST['ignore-duplicates'] = 'ignore';
      }
      if (empty($_POST['horizontal-offset'])) {
         $_POST['horizontal-offset'] = 150;
      }
      if (empty($_POST['vertical-offset'])) {
         $_POST['vertical-offset'] = 30;
      }
      if (!isset($_POST['use-transparency'])) {
         $_POST['use-transparency'] = 'on';
      }
      if (empty($_POST['image-output'])) {
         $_POST['image-output'] = 'PNG';
      }
      
      $bFormError = !$oCssSpriteGen->ProcessForm();
      $bUploadError = !(bool)($sFolderMD5 = $oCssSpriteGen->ProcessFile());
      
      if (!$bFormError && !$bUploadError) {
         $oCssSpriteGen->CreateSprite($sFolderMD5);
         $sSpriteFilename = $oCssSpriteGen->GetSpriteFilename();
         $sSpriteHash = $oCssSpriteGen->GetSpriteHash();
         $sSpriteCss = $oCssSpriteGen->GetCss();
         
         if ($oCssSpriteGen->ValidImages()) {
            $aReturnValues = array(
               'filename' => $sSpriteFilename,
               'hash' => $sSpriteHash,
               'css' => $sSpriteCss
            );
            
            if ($sType == 'php') {
               echo serialize($aReturnValues);
            } else {
               echo json_encode($aReturnValues);
            }
         } else {
            if ($sType == 'php') {
               echo serialize(false);
            } else {
               echo json_encode(false);
            }
         }
      } else {
         $aFormErrors = $oCssSpriteGen->GetAllErrors();
         
         if ($sType == 'php') {
            echo serialize($aFormErrors);
         } else {
            echo json_encode($aFormErrors);
         }
      }
   } else {
      $oTemplate = new Template('api.php');
      
      echo $oTemplate->Display();
   }
?>