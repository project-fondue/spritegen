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
         $vSection = null;
         $aProperty = explode('/', trim($sProperty), '/');
         
         foreach ($aProperty as $sComponent) {
            if (isset($this->aConfig[$sComponent])) {
               $vSection = $this->aConfig[$sComponent];
            } else {
               if (is_null($vDefaultValue)) {
                  return false;
               } else {
                  return $vDefaultValue;
               }
            }
         }
         return false;
      }
   }
?>