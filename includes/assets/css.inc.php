<?php
   $aConfig = array(
      'file_type' => 'text/css',
      'cache_length' => 31356000,
      'create_archive' => true,
      'archive_folder' => ConfigHelper::Get('/cache/css_archive'),
      'files' => array(
         'css/reset.css',
         'css/default.css'
      )
   );
?>
