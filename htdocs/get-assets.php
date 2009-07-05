<?php
   require_once('../../includes/config.inc.php');
   require_once('../../includes/combine.inc.php');
   
   if (!empty($_GET['config']) && preg_match("/^[a-z0-9-]+$", $_GET['config'])) {
      $sConfig = dirname(__FILE__).'../../assets/'.$_GET['config'].'.inc.php';
      
      if (file_exists($sConfig)) {
         require($sConfig);
         
         $oCombine = new Combine($aConfig);
         echo $oCombine->Get();
         exit;
      }
   }
   
   header('HTTP/1.0 404 Not Found');
   echo 'Assets not found';
?>