<?php
   /***************************************************************/
   /* Licensed under BSD License with the following exceptions:

      -----------------------------------------------------------------
      * Design elements (images, CSS) relating to the "Website Performance" 
        branding and web site remain copyright of Ed Eliot & 
        Stuart Colville and should not be used without written 
        permission.
      * If you host a copy of the tool publicly in a largely unaltered 
        form and with the same application name then you must add clear 
        notices to explain that it is a copy of the original and provide 
        a link back to our that original hosted version 
        at http://spritegen.website-performance.org/.
      ------------------------------------------------------------------

      Copyright (C) 2007-2008, Ed Eliot & Stuart Colville.
      All rights reserved.

      Redistribution and use in source and binary forms, with or without
      modification, are permitted provided that the following conditions are met:

         * Redistributions of source code must retain the above copyright
           notice, this list of conditions and the following disclaimer.
         * Redistributions in binary form must reproduce the above copyright
           notice, this list of conditions and the following disclaimer in the
           documentation and/or other materials provided with the distribution.
         * Neither the name of Ed Eliot & Stuart Colville nor the names of its contributors 
           may be used to endorse or promote products derived from this software 
           without specific prior written permission of Ed Eliot & Stuart Colville.

      THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS" AND ANY
      EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
      WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
      DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY
      DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
      (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
      LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
      ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
      (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
      SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
                                                                  */
   /***************************************************************/
   
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