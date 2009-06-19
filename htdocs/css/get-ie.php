<?php
   require_once(dirname(__FILE__).'/../../includes/config.inc.php');
   require_once(dirname(__FILE__).'/../../includes/combine.inc.php');
   
   $aConfig = array(
      'file_type' => 'text/css',
      'cache_length' => 31356000,
      'create_archive' => true,
      'archive_folder' => 'css/archive',
      'gzip_compress' => GZIP_COMPRESS,
      'files' => array(
         'css/ie.css'
      )
   );
   
   $oCombine = new Combine($aConfig);
   echo $oCombine->Get();
?>
