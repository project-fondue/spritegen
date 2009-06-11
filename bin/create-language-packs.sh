#!/usr/bin/php
<?php
   $sCurrentDir = dirname(__FILE__);
   
   require("$sCurrentDir/../includes/config.inc.php");
   
   foreach ($aLanguages as $sKey => $sValue) {
      if ($sKey != 'en') {
      	shell_exec("zip -j $sCurrentDir/../htdocs/downloads/language-pack-$sKey.zip \
      		$sCurrentDir/../translations/$sKey.txt \
      		$sCurrentDir/../templates/locales/$sKey/what-are-css-sprites.php \
      		$sCurrentDir/../templates/locales/$sKey/tool-help.php");
      } else {
         shell_exec("zip -j $sCurrentDir/../htdocs/downloads/language-pack-en.zip \
      		$sCurrentDir/../translations/en.txt \
      		$sCurrentDir/../templates/what-are-css-sprites.php \
      		$sCurrentDir/../templates/tool-help.php");
      }
   }
?>
