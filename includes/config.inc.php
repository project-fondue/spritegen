<?php
   define('CONF', 'live');
   
   require('template.inc.php');
   require('template-functions.inc.php');
   require('translations.inc.php');
   require('css-sprite-gen.inc.php');
   require('version.inc.php');
   
   $sBasename = dirname(__FILE__).'/';
   $sConfig = $sBasename.'conf/'.CONF.'.inc.php';
   
   if (file_exists($sConfig)) {
      require($sConfig);
   } else {
      $oTemplate = new Template('setup-config-error.php');
      $oTemplate->Set('config', $sConfig);
      $oTemplate->Set('basename', $sBasename);
      echo $oTemplate->Display();
      exit;
   }
   
   $sUploadDir = ConfigHelper::GetAbsolutePath($sBasename.UPLOAD_DIR);
   $sSpriteDir = ConfigHelper::GetAbsolutePath($sBasename.SPRITE_DIR);
   $sTranslationsCacheDir = ConfigHelper::GetAbsolutePath($sBasename.TRANSLATIONS_CACHE_DIR);
   
   if (!is_dir($sUploadDir)) {
      @mkdir($sUploadDir);
   }
   
   if (!is_dir($sSpriteDir)) {
      @mkdir($sSpriteDir);
   }
   
   if (!is_dir($sTranslationsCacheDir)) {
      @mkdir($sTranslationsCacheDir);
   }
   
   if (defined('TEXT_LINK_ADS_DIR') && defined('TEXT_LINK_ADS_FILE')) {
      $sTextLinkAdsDir = ConfigHelper::GetAbsolutePath($sBasename.TEXT_LINK_ADS_DIR);
      
      if (!is_dir($sTextLinkAdsDir)) {
         @mkdir($sTextLinkAdsDir);
      }
      
      if (!file_exists($sTextLinkAdsDir.TEXT_LINK_ADS_FILE)) {
         @touch("$sTextLinkAdsDir/".TEXT_LINK_ADS_FILE);
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
   
   class ConfigHelper {
      // derived from http://uk.php.net/manual/en/function.realpath.php#84012
      function GetAbsolutePath($sPath) {
         $aParts = array_filter(explode('/', $sPath), 'strlen');
         $aAbsolutes = array();
        
         foreach ($aParts as $sPart) {
            if ($sPart == '.') {
               continue;
            }
            if ($sPart == '..') {
               array_pop($aAbsolutes);
            } else {
               $aAbsolutes[] = $sPart;
            }
         }
         return '/'.implode('/', $aAbsolutes);
      }
   }
?>
