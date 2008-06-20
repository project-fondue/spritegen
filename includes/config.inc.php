<?php
   require('../includes/css-sprite-gen.inc.php');
   require('../includes/template.inc.php');
   require('../includes/template-functions.inc.php');
   require('../includes/translations.inc.php');
   
   define('CONF', 'live');
   
   require('conf/'.CONF.'.inc.php');
?>