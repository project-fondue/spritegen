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
      header('Content-Type: text/plain');
      die("
         Setup Error: Make a copy of '$sConfig' and modify settings to match your system.
         Then update '{$sBasename}conf/config.inc.php' accordingly.
      ");
   }
   
   if (!is_dir(UPLOAD_DIR)) {
      @mkdir(UPLOAD_DIR);
   }
   
   if (!is_dir(SPRITE_DIR)) {
      @mkdir(SPRITE_DIR);
   }
   
   if (!is_dir(TRANSLATIONS_CACHE_DIR)) {
      @mkdir(TRANSLATIONS_CACHE_DIR);
   }
   
   if (defined('TEXT_LINK_ADS_DIR') && defined('TEXT_LINK_ADS_FILE')) {
      if (!is_dir(TEXT_LINK_ADS_DIR)) {
         @mkdir(TEXT_LINK_ADS_DIR);
      }
      
      if (!file_exists(TEXT_LINK_ADS_DIR.TEXT_LINK_ADS_FILE)) {
         @touch(TEXT_LINK_ADS_DIR.TEXT_LINK_ADS_FILE);
      }
   }
   
   if (
      !is_writeable(UPLOAD_DIR) || 
      !is_writeable(SPRITE_DIR) || 
      !is_writeable(TRANSLATIONS_CACHE_DIR)
   ) {
      header('Content-Type: text/plain');
      die("
         Setup Error: Ensure all cache directories are writeable by the web server process:
         
         $sUploadDir
         $sSpriteDir
         $sTranslationsCache
         
         e.g:
         
         sudo chgrp -R www-data $sUploadDir $sSpriteDir $sTranslationsCache
         sudo chmod -R g+w $sUploadDir $sSpriteDir $sTranslationsCache
         
         For more information about setting file permissions check out our Unix Permissions Calculator - http://permissions-calculator.org/
      ");
   }
?>
