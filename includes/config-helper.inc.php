<?php
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
      
      function Get($sProperty, $vDefaultValue = null) {
         global $aConfig;
         
         $aCurrentConfigItem = $aConfig;
         $vSection = null;
         $aProperty = explode('/', trim($sProperty, '/'));
         
         for ($i = 0; $i < count($aProperty); $i++) {
            if (isset($aCurrentConfigItem[$aProperty[$i]])) {
               if ($i < count($aProperty)) {
                  $aCurrentConfigItem = $aCurrentConfigItem[$aProperty[$i]];
               } else {
                  $vSection = $aCurrentConfigItem[$aProperty[$i]];
               }
            }
         }
         
         if (!is_null($vSection)) {
            return $vSection;
         } else {
            return false;
         }
      }
   }
?>