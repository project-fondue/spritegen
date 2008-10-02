<?php
   // publically accessible document root
   define('APP_ROOT', '/');
   // location of view scripts (corresponding to page types)
   define('VIEWS_DIR', '../views/');
   // directory to store uploaded ZIP files
   define('UPLOAD_DIR', '../cache/source-images/');
   // easier to use a command line binary as many installs of PHP won't have ZIP libraries compiled in
   define('UNZIP_BINARY', '/usr/bin/unzip');
   // otipng binary - compresses PNG images
   define('OPTIPNG_BINARY', '/usr/local/bin/optipng');
   // location to store generated sprite images
   define('SPRITE_DIR', '../cache/sprites/');
   // maximum file upload size - specified in bytes
   define('MAX_FILE_SIZE', 1048576);
   // secret used to check validity of download link request
   define('CHECKSUM', 'ENTER_RANDOM_CHECKSUM_HERE');
   // location of CSS, JS & images - set this if you want to load these from a separate virtual host
   define('ASSETS_DIR', '/');
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
   define('HEADER_IMAGE_URL', '');
   define('HEADER_IMAGE_ALT', '');
   define('HEADER_IMAGE_WIDTH', );
   define('HEADER_IMAGE_HEIGHT', );
   define('HEADER_HREF', '');
   // bug reporting
   define('REPORT_BUG_URL', '');
   // url types
   define('REWRITTEN_URLS', false);
   // base URL to tool
   define('TOOL_URL', 'http://spritegen.website-performance.org/');
   // contact email address
   define('CONTACT_EMAIL', 'contact@website-performance.org');
   
   // views which don't render the normal HTML layout
   $aNonPageViews = array('download');
   
   // installed languages
   $aLanguages = array(
      'af' => 'Afrikaans',
      'cn' => '中文',
      'cs' => 'čeština',
      'nl' => 'Nederlands',
      'en' => 'English',
      'fr' => 'français',
      'de' => 'Deutsch',
      'it' => 'italiano',
      'pt' => 'português',
      'ja' => '日本語',
      'es' => 'Español',
      'se' => 'svenska',
      'tw' => '臺灣話'
   );
   
   $aCompletedLanguages = array('cn', 'en', 'pl', 'pt');
?>