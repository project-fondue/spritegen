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
   
   define('APP_ROOT', '/css-sprite-gen/');
   define('ACTIONS_DIR', 'actions/');
   define('UPLOAD_DIR', '/tmp/css-sprite-gen-source-files/');
   define('UNZIP_BINARY', '/usr/bin/unzip');
   define('SPRITE_DIR', '/tmp/css-sprite-gen-sprites/');
   define('MAX_FILE_SIZE', 10485760);
   define('CHECKSUM', 'iweoruewior324239243842f');
   define('ASSETS_DIR', '/assets/');
   define('TRANSLATIONS_DEFAULT_LANG', 'en');
   define('TRANSLATIONS_PATH', 'translations/');
   define('TRANSLATIONS_CACHE', 'translations/cache/');
   define('TRANSLATIONS_ALLOW_SHOW_KEYS', true);
   define('TEMPLATE_PATH', 'templates/');
   define('TEMPLATE_LOCALES_PATH', 'locales/');
   define('TEMPLATE_DEBUG', false);
   define('TEMPLATE_STRIP_HTML', true);
   define('TEMPLATE_CONVERT_ENTITIES', false);
   define('TEMPLATE_ENCODING', 'ISO-8859-1');
   define('TEMPLATE_CACHE_LENGTH', 300);
   
   $aLanguages = array(
      'af' => 'Afrikaans',
      'cn' => 'Chinese',
      'en' => 'English',
      'fr' => 'French',
      'de' => 'German',
      'it' => 'Italian',
      'es' => 'Spanish',
      'se' => 'Swedish'
   );
?>