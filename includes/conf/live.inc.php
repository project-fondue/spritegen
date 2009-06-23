<?php
   // publically accessible document root
   define('APP_ROOT', '/');
   // location of view scripts (corresponding to page types)
   define('VIEWS_DIR', '../views/');
   // directory to store uploaded ZIP files
   define('UPLOAD_DIR', '../../cache/upload/');
   // file binary - used to check for a valid ZIP file
   define('FILE_BINARY', '/usr/bin/file');
   // easier to use a command line binary as many installs of PHP won't have ZIP libraries compiled in
   define('UNZIP_BINARY', '/usr/bin/unzip');
   // otipng binary - compresses PNG images
   define('OPTIPNG_BINARY', '/usr/local/bin/optipng');
   // location to store generated sprite images
   define('SPRITE_DIR', '../../cache/sprites/');
   // maximum file upload size - specified in bytes
   define('MAX_FILE_SIZE', 524288);
   // secret used to check validity of download link request
   define('CHECKSUM', 'iweoruewior324239243842f');
   // location of CSS, JS & images - set this if you want to load these from a separate virtual host
   define('ASSETS_DIR', '/');
   // default translations language, this is what it'll use if none is specified
   define('TRANSLATIONS_DEFAULT_LANG', 'en');
   // location of translation files - these contain key/value pairs
   define('TRANSLATIONS_DIR', '../translations/');
   // once parsed translation files are cached, this specifies where to store the cache files
   define('TRANSLATIONS_CACHE_DIR', '../../cache/translations/');
   // determines whether or not adding showKeys=true parameter is active
   define('TRANSLATIONS_ALLOW_SHOW_KEYS', true);
   // path to templates
   define('TEMPLATE_DIR', '../templates/');
   // path to localised versions of templates, each locale is stored in a separate directory
   define('TEMPLATE_LOCALES_DIR', 'locales/');
   // other template settings, you don't need to change these
   define('TEMPLATE_DEBUG', false);
   define('TEMPLATE_STRIP_HTML', true);
   define('TEMPLATE_CONVERT_ENTITIES', false);
   define('TEMPLATE_ENCODING', 'UTF-8');
   define('TEMPLATE_CACHE_LENGTH', 0);
   // header image
   define('HEADER_IMAGE_URL', 'images/project-fondue-logo.png');
   define('HEADER_IMAGE_ALT', 'Project Fondue');
   define('HEADER_IMAGE_WIDTH', 64);
   define('HEADER_IMAGE_HEIGHT', 80);
   define('HEADER_HREF', 'http://projectfondue.com/');
   // bug reporting
   define('REPORT_BUG_URL', 'https://bugs.launchpad.net/css-sprite-generator/');
   // url types
   define('REWRITTEN_URLS', true);
   // language switching mechanism
   define('LANGUAGE_SWITCH', 'host');
   // base URL to tool
   define('TOOL_URL', 'http://spritegen.website-performance.org/');
   // contact email address
   define('CONTACT_EMAIL', 'spritegen@projectfondue.com');
   // text link ads
   define('TEXT_LINK_ADS_DIR', '../../cache/tla/');
   define('TEXT_LINK_ADS_FILE', 'local_202297.xml');
   // path to jsmin binary - http://www.crockford.com/javascript/jsmin.html
   define('JSMIN_BINARY', '/usr/local/bin/jsmin');
   // jsmin compress JS
   define('JSMIN_COMPRESS', true);
   // comments to add at start of jsmin compressed files
   define('JSMIN_COMMENTS', '
      /*
         YUI:
         
         Copyright (c) 2009, Yahoo! Inc. All rights reserved.
         Code licensed under the BSD License:
         http://developer.yahoo.net/yui/license.txt
         version: 2.7.0
      
         tool.js
         
         Copyright (c) 2007-2009 Project Fondue. All Rights Reserved.
         Code licensed under the BSD License.
      */
   ');
   
   // views which don't render the normal HTML layout
   $aNonPageViews = array('download');
   
   // installed languages
   $aLanguages = array(
      'af' => array(
         'native' => 'Afrikaans',
         'english' => 'Afrikaans'
      ),
      'cn' => array(
         'native' => '中文',
         'english' => 'Chinese',
      ),
      'cs' => array(
         'native' => 'čeština',
         'english' => 'Catalan'
      ),
      'nl' => array(
         'native' => 'Nederlands',
         'english' => 'Dutch'
      ),
      'en' => array(
         'native' => 'English',
         'english' => 'English'
      ),
      'fr' => array(
         'native' => 'français',
         'english' => 'French'
      ),
      'de' => array(
         'native' => 'Deutsch',
         'english' => 'German'
      ),
      'it' => array(
         'native' => 'italiano',
         'english' => 'Italian'
      ),
      'pl' => array(
         'native' => 'polski',
         'english' => 'Polish)'
      ),
      'pt' => array(
         'native' => 'português',
         'english' => 'Portuguese'
      ),
      'ja' => array(
         'native' => '日本語',
         'english' => 'Japanese'
      ),
      'es' => array(
         'native' => 'Español',
         'english' => 'Spanish'
      ),
      'se' => array(
         'native' => 'svenska',
         'english' => 'Swedish'
      ),
      'tr' => array(
         'native' => 'Türkçe',
         'english' => 'Turkish'
      ),
      'tw' => array(
         'native' => '臺灣話',
         'english' => 'Taiwanese'
      )
   );
   
   $aCompletedLanguages = array('en');
?>
