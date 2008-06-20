<?php
   require('../includes/config.inc.php');
   
   // check for language
   if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $aLanguages)) {
      $sLang = $_GET['lang'];
      setcookie('lang', $sLang, time() + 60 * 60 * 24 * 365, '/');
      header('Location: /');
      exit;
   } elseif (isset($_COOKIE['lang']) && array_key_exists($_COOKIE['lang'], $aLanguages)) {
      $sLang = $_COOKIE['lang'];
   } else {
      $sLang = 'en';
   }
   
   // check for action to run
   if (isset($_REQUEST['action']) && preg_match("/^[a-z0-9_-]+$/i", $_REQUEST['action'])) {
      $sAction = $_REQUEST['action'];
   } else {
      $sAction = 'home';
   }
   
   // the action has to exist to proceed
   if (file_exists(ACTIONS_DIR."$sAction.php")) {
      // instantiate translations
      $oTranslations = new Translations($sLang);
      
      // instantiate template
      $oTemplate = new Template('layout.php', $sLang);
      
      // pass data to template
      $oTemplate->Set('appRoot', APP_ROOT);
      $oTemplate->Set('contactEmail', CONTACT_EMAIL);
      $oTemplate->Set('languages', $aLanguages);
      $oTemplate->Set('language', $sLang);
      $oTemplate->Set('missingTranslations', !in_array($sLang, $aCompletedLanguages));
      $oTemplate->Set('action', $sAction);
      $oTemplate->Set('template', $sAction);
      $oTemplate->Set('translation', $oTranslations);
      $oTemplate->Set('assetsDir', ASSETS_DIR);
      $oTemplate->Set('content', new Template("$sAction.php", $sLang));
      $oTemplate->Set('headerImageUrl', HEADER_IMAGE_URL);
      $oTemplate->Set('headerImageAlt', HEADER_IMAGE_ALT);
      $oTemplate->Set('headerImageWidth', HEADER_IMAGE_WIDTH);
      $oTemplate->Set('headerImageHeight', HEADER_IMAGE_HEIGHT);
      $oTemplate->Set('headerHref', HEADER_HREF);
      $oTemplate->Set('reportBugUrl', REPORT_BUG_URL);
      $oTemplate->Set('actionsDir', ACTIONS_DIR);
   
      // get full action path
      $sAction = ACTIONS_DIR."$sAction.php";
      // action is optional, if it doesn't exist ignore and carry on
      require($sAction);
   
      // display resulting page
      echo $oTemplate->Display();
   } else {
      die('Invalid action specified.');
   }
?>