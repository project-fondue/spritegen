<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php echo $language; ?>">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title><?php echo $translation->Get('site.title'); ?> <?php echo $title; ?></title>
   <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/reset.css" type="text/css">
   <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/default.css" type="text/css">
   <!--[if IE]>
      <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/ie.css" type="text/css">
   <![endif]-->
   <!-- PF_REMOVE -->
      <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="/favicon.ico" type="image/x-icon">
      <meta name="description" content="A tool for generating image sprites and CSS for your web site. Using this tool can help you dramatically reduce the number of HTTP requests made for higher performance.">
      <meta name="keywords" content="css sprites, css, sprites, sprite, tool, generate, http requests, http, request">
   <!-- END_PF_REMOVE -->                                                                               
   
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
   <?php endif; ?>
</head>

<body class="lang-<?php echo $language; ?>">
   <div id="header">
      <!-- PF_REMOVE -->         
         <a href="<?php echo $headerHref; ?>" id="logo"><img src="<?php echo $assetsDir.$headerImageUrl; ?>" alt="<?php echo $headerImageAlt; ?>" width="<?php echo $headerImageWidth; ?>" height="<?php echo $headerImageHeight; ?>"></a>
      <!-- END_PF_REMOVE -->
      <h1><?php echo $title; ?></h1>
   </div>
   <!-- PF_REMOVE -->
      <!--<div class="google-ads">
         <script type="text/javascript">
            google_ad_client = "pub-6795488395000718";
            /* Spritegen - Top */
            google_ad_slot = "9592932909";
            google_ad_width = 728;
            google_ad_height = 90;
         </script>
         <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
      </div>-->
   <!-- END_PF_REMOVE --> 
   <div id="content">
      <ul id="nav">
         <li<?php if ($view == 'home') echo ' class="selected"'; ?>><a href="<?php echo $appRoot; ?>"><?php echo $translation->Get('menu.home'); ?></a></li>
         <!-- PF_REMOVE -->
            <li<?php if ($view == 'what-are-css-sprites') echo ' class="selected"'; ?>><a href="<?php echo $functions->GetMenuUrl($appRoot, 'what-are-css-sprites'); ?>"><?php echo $translation->Get('menu.what-are-css-sprites'); ?></a></li>
            <li<?php if ($view == 'tool-help') echo ' class="selected"'; ?>><a href="<?php echo $functions->GetMenuUrl($appRoot, 'tool-help'); ?>"><?php echo $translation->Get('menu.tool-help'); ?></a></li>
            <li><a href="<?php echo $reportBugUrl; ?>"><?php echo $translation->Get('menu.report-bug'); ?></a></li>
         <!-- END_PF_REMOVE -->
      </ul>
      <div id="frame">
         <div id="lang-bar">
            <!-- PF_REMOVE -->
               <p id="your-language"><a href="<?php echo $functions->GetMenuUrl($appRoot, 'your-language'); ?>"><?php echo $translation->Get('menu.language.your-language')?></a></p>
            <!-- END_PF_REMOVE -->
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
         <!-- PF_REMOVE -->
            <?php if ($missingTranslations): ?>
               <p class="missing-translations"><a href="<?php echo $functions->GetMenuUrl($appRoot, 'your-language'); ?>"><?php echo $translation->Get('warning.missing-translations')?></a></p>
            <?php endif; ?>
         <!-- END_PF_REMOVE -->
         <div id="main">
            <?php echo $content; ?>
         </div>
         <div id="sidebar">
            <!-- PF_REMOVE -->
               <?php require('../templates/sidebar.php'); ?>
            <!-- END_PF_REMOVE -->
         </div>
      </div>
   </div>
   <div id="footer">
      <?php require('../templates/footer.php'); ?>
   </div>
   <script type="text/javascript" src="http://yui.yahooapis.com/2.3.1/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
   <script type="text/javascript" src="<?php echo $assetsDir; ?>js/tool.js"></script>
   <!-- PF_REMOVE -->
      <?php require('../templates/analytics.php'); ?>
   <!-- END_PF_REMOVE -->
</body> 
 
</html>
