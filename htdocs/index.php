<?php
   /***************************************************************/
   /* Software License Agreement (BSD License)

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
   
   // is the template different from the action
   if (isset($_REQUEST['template']) && preg_match("/^[a-z0-9_-]+$/i", $_REQUEST['template'])) {
      $sTemplate = $_REQUEST['template'];
   } else {
      $sTemplate = $sAction;
   }
   
   // the template has to exist to proceed
   if (file_exists(TEMPLATE_PATH."$sTemplate.php")) {
      // instantiate translations
      $oTranslations = new Translations($sLang);
      
      // instantiate template
      $oTemplate = new Template('layout.php', $sLang);
      
      // pass data to template
      $oTemplate->Set('appRoot', APP_ROOT);
      $oTemplate->Set('languages', $aLanguages);
      $oTemplate->Set('language', $sLang);
      $oTemplate->Set('action', $sAction);
      $oTemplate->Set('template', $sTemplate);
      $oTemplate->Set('translation', $oTranslations);
      $oTemplate->Set('assetsDir', ASSETS_DIR);
      $oTemplate->Set('content', new Template("$sTemplate.php", $sLang));
   
      // get full action path
      $sAction = ACTIONS_DIR."$sAction.php";
      // action is optional, if it doesn't exist ignore and carry on
      if (file_exists($sAction)) {
         require($sAction);
      }
   
      // display resulting page
      echo $oTemplate->Display();
   } else {
      die('Invalid template specified.');
   }
?>