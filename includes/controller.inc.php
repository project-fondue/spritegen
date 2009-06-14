<?php
   class Controller {
      protected $sLanguage;
      protected $sView;
      protected $sViewPath;
      
      public function __construct() {
         require('../includes/config.inc.php');
         
         $this->SetLanguage($aLanguages);
         
         // check validity of selected view (to prevent loading of other files from the filesystem)        
         if (
            isset($_REQUEST['view']) &&
            preg_match("/^[a-z0-9_-]+$/i", $_REQUEST['view']) &&
            file_exists(VIEWS_DIR.$_REQUEST['view'].'.php')
         ) {
            // we now have a safe string
            $this->sView = $_REQUEST['view'];
            $this->sViewPath = VIEWS_DIR.$_REQUEST['view'].'.php';
         } elseif (empty($_REQUEST['view']) && file_exists(VIEWS_DIR.'home.php')) { // look for default view
   			$this->sView = 'home';
   			$this->sViewPath = VIEWS_DIR.'home.php';
   		} else {
		      // invalid request and no default view available - quit application
            die('Invalid view specified.');
         }

         if (!in_array($this->sView, $aNonPageViews)) {
            // instantiate translations
            $oTranslations = new Translations($this->sLanguage);

            // instantiate layout template
            $oTemplate = new Template('layout.php', $this->sLanguage);

            // pass common data to template
            $oTemplate->Set('appRoot', APP_ROOT);
            $oTemplate->Set('contactEmail', CONTACT_EMAIL);
            $oTemplate->Set('languages', $aLanguages);
            $oTemplate->Set('language', $this->sLanguage);
            $oTemplate->Set('missingTranslations', !in_array($this->sLanguage, $aCompletedLanguages));
            $oTemplate->Set('view', $this->sView);
            $oTemplate->Set('template', $this->sView);
            $oTemplate->Set('translation', $oTranslations);
            $oTemplate->Set('assetsDir', ASSETS_DIR);
            $oTemplate->Set('content', new Template("$this->sView.php", $this->sLanguage)); // add content template
            $oTemplate->Set('headerImageUrl', HEADER_IMAGE_URL);
            $oTemplate->Set('headerImageAlt', HEADER_IMAGE_ALT);
            $oTemplate->Set('headerImageWidth', HEADER_IMAGE_WIDTH);
            $oTemplate->Set('headerImageHeight', HEADER_IMAGE_HEIGHT);
            $oTemplate->Set('headerHref', HEADER_HREF);
            $oTemplate->Set('reportBugUrl', REPORT_BUG_URL);
            $oTemplate->Set('viewsDir', VIEWS_DIR);
            
            $oTemplate->AddPostFilter('StripPfMarkers');

            // load view
            require($this->GetViewPath());

            // display resulting page
            echo $oTemplate->Display();
         } else {
            // load view
            require($this->GetViewPath());
         }
      }
      
      protected function SetLanguage($aLanguages) {
         // check for request to change language
         // if not present check for cookie specifiying language
         // finally fall back to english
         if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $aLanguages)) {
            $this->sLanguage = $_GET['lang'];
            setcookie('lang', $this->sLanguage, time() + 60 * 60 * 24 * 365, '/');
            header('Location: /');
            exit;
         } elseif (isset($_COOKIE['lang']) && array_key_exists($_COOKIE['lang'], $aLanguages)) {
            $this->sLanguage = $_COOKIE['lang'];
         } else {
            $this->sLanguage = 'en';
         }
      }
      
      // get currently selected language
      public function GetLanguage() {
         return $this->sLanguage;
      }
      
      // get view name
      public function GetView() {
         return $this->sView;
      }
      
      // get full path to view
      public function GetViewPath() {
         return $this->sViewPath;
      }
   }
?>
