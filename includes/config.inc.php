<?php
   require('template.inc.php');
   require('template-functions.inc.php');
   require('translations.inc.php');
   require('css-sprite-gen.inc.php');
   require('version.inc.php');
   require('config-helper.inc.php');
   require('conf/app.inc.php');
   require('conf/languages.inc.php');
   
   $sBasename = dirname(__FILE__).'/';
   
   /*if (file_exists($sBasename.'conf/overrides.inc.php')) {
      require('conf/overrides.inc.php');
   }*/
   
   $oConfigHelper = new ConfigHelper($aConfig);
   
   if (!$oConfigHelper->Get('/setup')) {
      $oTemplate = new Template('setup-config-error.php');
      $oTemplate->Set('config', $sConfig);
      $oTemplate->Set('basename', $sBasename);
      echo $oTemplate->Display();
      exit;
   }
   
   $sUploadDir = $oConfigHelper->GetAbsolutePath($sBasename.$oConfigHelper->Get('/cache/upload_dir'));
   $sSpriteDir = $oConfigHelper->GetAbsolutePath($sBasename.$oConfigHelper->Get('/cache/sprite_dir'));
   $sTranslationsCacheDir = $oConfigHelper->GetAbsolutePath($sBasename.$oConfigHelper->Get('/cache/translations_dir'));
   
   if (!is_dir($sUploadDir)) {
      @mkdir($sUploadDir);
   }
   
   if (!is_dir($sSpriteDir)) {
      @mkdir($sSpriteDir);
   }
   
   if (!is_dir($sTranslationsCacheDir)) {
      @mkdir($sTranslationsCacheDir);
   }
   
   if ($oConfigHelper->Get('/cache/tla/dir')) {
      $sTextLinkAdsDir = $oConfigHelper->GetAbsolutePath($sBasename.$oConfigHelper->Get('/cache/tla/dir'));
      
      if (!is_dir($sTextLinkAdsDir)) {
         @mkdir($sTextLinkAdsDir);
      }
      
      if (!file_exists($sTextLinkAdsDir.$oConfigHelper->Get('/cache/tla/file'))) {
         @touch("$sTextLinkAdsDir/".$oConfigHelper->Get('/cache/tla/file'));
      }
   }
   
   if (
      !is_writeable($sUploadDir) || 
      !is_writeable($sSpriteDir) || 
      !is_writeable($sTranslationsCacheDir)
   ) {
      $oTemplate = new Template('setup-permissions-error.php');
      $oTemplate->Set('uploadDir', $sUploadDir);
      $oTemplate->Set('spriteDir', $sSpriteDir);
      $oTemplate->Set('translationsCacheDir', $sTranslationsCacheDir);
      echo $oTemplate->Display();
      exit;
   }
?>
