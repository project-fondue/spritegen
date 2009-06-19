<?php
   require_once(dirname(__FILE__).'/../../includes/config.inc.php');
   require_once(dirname(__FILE__).'/../../includes/combine.inc.php');
   
   $aConfig = array(
      'file_type' => 'text/javascript',
      'cache_length' => 31356000,
      'create_archive' => true,
      'archive_folder' => 'js/archive',
      'jsmin_binary' => JSMIN_BINARY,
      'jsmin_compress' => JSMIN_COMPRESS,
      'jsmin_comments' => JSMIN_COMMENTS,
      'files' => array(
         'js/yahoo.js',
         'js/dom.js',
         'js/event.js',
         'js/tool.js'
      )
   );
   
   $oCombine = new Combine($aConfig);
   echo $oCombine->Get();
?>
