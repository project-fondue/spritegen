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
   
   // publically accessible document root
   define('APP_ROOT', '');
   // location of action scripts (corresponding to page types)
   define('ACTIONS_DIR', '../actions/');
   // directory to store uploaded ZIP files
   define('UPLOAD_DIR', '../cache/source-images/');
   // easier to use a command line binary as many installs of PHP won't have ZIP libraries compiled in
   define('UNZIP_BINARY', '/usr/bin/unzip');
   // location to store generated sprite images
   define('SPRITE_DIR', '../cache/sprites/');
   // maximum file upload size - specified in bytes
   define('MAX_FILE_SIZE', 1048576);
   // secret used to check validity of download link request
   define('CHECKSUM', 'iweoruewior324239243842f');
   // location of CSS, JS & images - set this if you want to load these from a separate virtual host
   define('ASSETS_DIR', '');
   // default translations language, this is what it'll use if none is specified
   define('TRANSLATIONS_DEFAULT_LANG', 'en');
   // location of translation files - these contain key/value pairs
   define('TRANSLATIONS_PATH', '../translations/');
   // once parsed translation files are cached, this specifies where to store the cache files
   define('TRANSLATIONS_CACHE', '../cache/translations/');
   // determines whether or not adding showKeys=true parameter is active
   define('TRANSLATIONS_ALLOW_SHOW_KEYS', true);
   // path to templates
   define('TEMPLATE_PATH', '../templates/');
   // path to localised versions of templates, each locale is stored in a separate directory
   define('TEMPLATE_LOCALES_PATH', 'locales/');
   // other template settings, you don't need to change these
   define('TEMPLATE_DEBUG', false);
   define('TEMPLATE_STRIP_HTML', true);
   define('TEMPLATE_CONVERT_ENTITIES', false);
   define('TEMPLATE_ENCODING', 'UTF-8');
   define('TEMPLATE_CACHE_LENGTH', 300);
   // header image
   define('HEADER_IMAGE_URL', 'images/header.png');
   define('HEADER_IMAGE_ALT', 'Website Performance');
   define('HEADER_IMAGE_WIDTH', 659);
   define('HEADER_IMAGE_HEIGHT', 60);
   define('HEADER_HREF', 'http://website-performance.org/');
   // bug reporting
   define('REPORT_BUG_URL', 'https://bugs.launchpad.net/css-sprite-generator/');
   // url types
   define('REWRITTEN_URLS', false);
   
   // installed languages
   $aLanguages = array(
      'af' => 'Afrikaans',
      'cn' => '中文',
      'nl' => 'Nederlands',
      'en' => 'English',
      'fr' => 'français',
      'de' => 'Deutsch',
      'it' => 'italiano',
      'pt' => 'português',
      'es' => 'Español',
      'se' => 'svenska'
   );
?>