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
   <link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon">                                                                          
   <meta name="description" content="A tool for generating image sprites and CSS for your web site. Using this tool can help you dramatically reduce the number of HTTP requests made for higher performance.">        
   
   <?php if ($view == 'home'): ?>
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
      <script type="text/javascript" src="<?php echo $assetsDir; ?>js/tool.js"></script>
   <?php endif; ?>
</head>

<body class="lang-<?php echo $language; ?>"> 
   <div id="page">
      <?php if (!empty($headerImageUrl)): ?>          
         <a href="<?php echo $headerHref; ?>"><img src="<?php echo $assetsDir.$headerImageUrl; ?>" alt="<?php echo $headerImageAlt; ?>" width="<?php echo $headerImageWidth; ?>" height="<?php echo $headerImageHeight; ?>"></a>
      <?php endif; ?>
      <h1><?php echo $title; ?></h1>
      <div id="content">
         <div id="menu">
            <ul>   
               <li<?php if ($view == 'home'): ?> class="active"<?php endif; ?>><a href="<?php echo $appRoot; ?>"><?php echo $translation->Get('menu.home'); ?></a></li>
               <li<?php if ($view == 'what-are-css-sprites'): ?> class="active"<?php endif; ?>><a href="<?php echo $functions->GetMenuUrl($appRoot, 'what-are-css-sprites'); ?>"><?php echo $translation->Get('menu.what-are-css-sprites'); ?></a></li>
               <li<?php if ($view == 'tool-help'): ?> class="active"<?php endif; ?>><a href="<?php echo $functions->GetMenuUrl($appRoot, 'tool-help'); ?>"><?php echo $translation->Get('menu.tool-help'); ?></a></li>
               <?php if (!empty($reportBugUrl)): ?>
                  <li><a href="<?php echo $reportBugUrl; ?>"><?php echo $translation->Get('menu.report-bug'); ?></a></li>
               <?php endif; ?>
            </ul>
            <form method="get" action="<?php echo $appRoot; ?>">
               <div>
                  <input type="hidden" name="view" id="view" value="<?php echo $view; ?>">
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
         <?php if (file_exists($viewsDir.'your-language.php')): ?>
            <p id="your-language"><a href="<?php echo $functions->GetMenuUrl($appRoot, 'your-language'); ?>"><?php echo $translation->Get('menu.language.your-language')?></a></p>
         <?php endif; ?>
         <div id="main">
            <?php if ($missingTranslations): ?>
               <p class="missing-translations"><a href="<?php echo $functions->GetMenuUrl($appRoot, 'your-language'); ?>"><?php echo $translation->Get('warning.missing-translations')?></a></p>
            <?php endif; ?>
            <?php echo $content; ?>
         </div>
         <div id="sidebar">
            <?php if (file_exists('../templates/sidebar.php')): ?>
               <?php require('../templates/sidebar.php'); ?>
            <?php endif; ?>
         </div>
         <div id="footer">
            <p><?php echo $translation->Get('site.copyright', '<a href="http://www.ejeliot.com/">Ed Eliot</a>', '<a href="http://muffinresearch.co.uk/">Stuart Colville</a>'); ?></p>
         </div>
      </div>
   </div>
   <?php
      if (file_exists('../templates/analytics.php')) {
         require('../templates/analytics.php');
      }
   ?>
</body> 
 
</html>