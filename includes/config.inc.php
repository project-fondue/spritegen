<?php
   define('CONF', 'live');
   
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
   
   $sUploadDir = realpath($sBasename.UPLOAD_DIR);
   $sSpriteDir = realpath($sBasename.SPRITE_DIR);
   $sTranslationsCache = realpath($sBasename.TRANSLATIONS_CACHE);
   
   if (
      !is_writeable($sUploadDir) || 
      !is_writeable($sSpriteDir) || 
      !is_writeable($sTranslationsCache)
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
