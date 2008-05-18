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
   
   // publically accessible document root
   define('APP_ROOT', '/');
   // location of action scripts (corresponding to page types)
   define('ACTIONS_DIR', 'actions/');
   // directory to store uploaded ZIP files
   define('UPLOAD_DIR', '/var/www/vhosts/website-performance.org/subdomains/spritegen/cache/css-sprite-gen-source-files/');
   // easier to use a command line binary as many installs of PHP won't have ZIP libraries compiled in
   define('UNZIP_BINARY', '/usr/bin/unzip');
   // location to store generated sprite images
   define('SPRITE_DIR', '/var/www/vhosts/website-performance.org/subdomains/spritegen/cache/css-sprite-gen-sprites/');
   // maximum file upload size - specified in bytes
   define('MAX_FILE_SIZE', 1048576);
   // secret used to check validity of download link request
   define('CHECKSUM', 'iweoruewior324239243842f');
   // in our installation we've set up a separate virtual host for assets - CSS & JS. This sets far futures expires headers to ensure resources
   // are cached effectively. If you prefer you can store these resources under your main virtual host and modify this path accordingly. / should do.
   define('ASSETS_DIR', 'http://assets.website-performance.org/');
   // default translations language, this is what it'll use if none is specified
   define('TRANSLATIONS_DEFAULT_LANG', 'en');
   // location of translation files - these contain key/value pairs
   define('TRANSLATIONS_PATH', 'translations/');
   // once parsed translation files are cached, this specifies where to store the cache files
   define('TRANSLATIONS_CACHE', '/var/www/vhosts/website-performance.org/cache/translations/');
   // determines whether or not adding showKeys=true parameter is active
   define('TRANSLATIONS_ALLOW_SHOW_KEYS', true);
   // path to templates
   define('TEMPLATE_PATH', 'templates/');
   // path to localised versions of templates, each locale is stored in a separate directory
   define('TEMPLATE_LOCALES_PATH', 'locales/');
   // other template settings, you don't need to change these
   define('TEMPLATE_DEBUG', false);
   define('TEMPLATE_STRIP_HTML', true);
   define('TEMPLATE_CONVERT_ENTITIES', false);
   define('TEMPLATE_ENCODING', 'UTF-8');
   define('TEMPLATE_CACHE_LENGTH', 300);
   
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