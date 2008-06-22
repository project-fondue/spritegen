#!/usr/bin/php
<?php
   require('../includes/config.inc.php');
   
   $sCurrentDir = dirname(__FILE__);
   
   foreach ($aLanguages as $sKey => $sValue) {
      if ($sKey != 'en') {
      	shell_exec("zip $sCurrentDir/../htdocs/downloads/language-pack-$sKey.zip \
      		$sCurrentDir/../translations/$sKey.txt \
      		$sCurrentDir/../templates/locales/$sKey/what-are-css-sprites.php \
      		$sCurrentDir/../templates/locales/$sKey/tool-help.php \
      		$sCurrentDir/../templates/locales/$sKey/your-language.php");
      } else {
         shell_exec("zip $sCurrentDir/../htdocs/downloads/language-pack-en.zip \
      		$sCurrentDir/../translations/en.txt \
      		$sCurrentDir/../templates/what-are-css-sprites.php \
      		$sCurrentDir/../templates/tool-help.php \
      		$sCurrentDir/../templates/your-language.php");
      }
   }
?>