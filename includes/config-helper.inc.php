<?php
   class ConfigHelper {
      protected $aConfig;
      
      function __construct($aConfig) {
         $this->aConfig = $aConfig;
      }
      
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
         $aConfig = $this->aConfig;
         $vSection = null;
         $aProperty = explode('/', trim($sProperty, '/'));
         
         print_r($aProperty);
         
         for ($i = 0; $i < count($aProperty); $i++) {
            echo $i.': '.$aProperty[$i].'<br>';
            echo $aConfig[$aProperty[$i]].'<br>';
            if (isset($aConfig[$aProperty[$i]])) {
               if ($i < count($aProperty)) {
                  $aConfig = $aConfig[$aProperty[$i]];
               } else {
                  $vSection = $aConfig[$aProperty[$i]];
               }
            }
         }
         
         print_r($vSection);
         
         if (!is_null($vSection)) {
            return $vSection;
         } else {
            return false;
         }
      }
   }
?>