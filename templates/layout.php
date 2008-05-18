<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title><?php echo $translation->Get('site.title'); ?> <?php echo $title; ?></title>
   <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/reset.css" type="text/css">
   <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/default.css" type="text/css">
   <!--[if IE]>
      <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/ie.css" type="text/css">
   <![endif]-->                                                                          
   <meta name="robots" content="all" >
   <meta http-equiv="imagetoolbar" content="false" >
   <meta name="MSSmartTagsPreventParsing" content="true">
   <link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon">        
   
   <?php if ($action == 'home'): ?>
      <script type="text/javascript">
         var SPRITEGEN = {
            locale : {
               aspectRatio : "<?php echo $translation->Get('form.label.maintain-aspect-ratio'); ?>:"
            },
            formFields : {
               aspectRatio : '<?php if (!$formPosted || !empty($_POST['aspect-ratio'])) echo 'checked'; ?>'
            }
         };
      </script>
      <script type="text/javascript" src="http://yui.yahooapis.com/2.3.1/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
      <script type="text/javascript" src="<?php echo $assetsDir; ?>j/tool.js"></script>
   <?php endif; ?>
</head>

<body class="lang-<?php echo $language; ?>"> 
   <div id="page">          
      <a href="http://www.website-performance.org/"><img src="http://assets.website-performance.org/i/website-performance.png" alt="Website-Performance" width='659' height='60'></a>
      <h1><?php echo $title; ?></h1>
      <div id="content">
         <div id="menu">
            <ul>   
               <li<?php if ($action == 'home'): ?> class="active"<?php endif; ?>><a href="<?php echo $appRoot; ?>"><?php echo $translation->Get('menu.home'); ?></a></li>
               <li<?php if ($action == 'what-are-css-sprites'): ?> class="active"<?php endif; ?>><a href="<?php echo $appRoot; ?>section/what-are-css-sprites/"><?php echo $translation->Get('menu.what-are-css-sprites'); ?></a></li>
               <li<?php if ($action == 'tool-help'): ?> class="active"<?php endif; ?>><a href="<?php echo $appRoot; ?>section/tool-help/"><?php echo $translation->Get('menu.tool-help'); ?></a></li>
               <li><a href="https://bugs.launchpad.net/css-sprite-generator/"<?php if ($language != 'en'): ?> title="Translation required. Can you help by providing the text for this link in your language?"<?php endif; ?>><?php echo $translation->Get('menu.report-bug'); ?></a></li>
            </ul>
            <form method="get" action="<?php echo $appRoot; ?>">
               <div>
                  <input type="hidden" name="action" id="action" value="<?php echo $action; ?>">
                  <label for="lang"><?php echo $translation->Get('menu.language.label'); ?>:</label>
                  <select name="lang" id="lang">
                     <?php foreach ($languages as $key => $value): ?>
                        <option value="<?php echo $key; ?>"<?php if ($key == $language): ?> selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                     <?php endforeach; ?>
                  </select>
                  <input class="submit" type="submit" name="change" id="change" value="<?php echo $translation->Get('menu.language.button'); ?>">
               </div>
            </form>
         </div>
         <p id="your-language"><a href="<?php echo $appRoot; ?>section/your-language/"><?php echo $translation->Get('menu.language.your-language')?></a></p>
         <div class="ads">
            <?php
               if (file_exists('master/text-ads.inc.php')) {
                  require('../master/text-ads.inc.php');
               }
            ?>
         </div>
         <?php echo $content; ?>
         <div id="footer">
            <p><?php echo $translation->Get('site.copyright', '<a href="http://www.ejeliot.com/">Ed Eliot</a>', '<a href="http://muffinresearch.co.uk/">Stuart Colville</a>'); ?></p>
         </div>
      </div>
   </div>
   <?php
      if (file_exists('master/analytics.inc.php')) {
         require('../master/analytics.inc.php');
      }
   ?>
</body> 
 
</html>