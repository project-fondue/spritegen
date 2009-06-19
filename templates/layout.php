<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php echo $language; ?>">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title><?php echo $translation->Get('site.title'); ?> <?php echo $title; ?></title>
   <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/get.<?php require('../htdocs/css/get.php'); ?>.css" type="text/css">
   <!--[if IE]>
      <link rel="stylesheet" href="<?php echo $assetsDir; ?>css/get-ie.<?php require('../htdocs/css/get.php'); ?>.css" type="text/css">
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
         <a href="<?php echo $headerHref; ?>" id="logo"><?php echo Version::GetImage($assetsDir.$headerImageUrl, $headerImageWidth, $headerImageHeight, $headerImageAlt); ?></a>
      <!-- END_PF_REMOVE -->
      <h1><?php echo $title; ?></h1>
   </div>
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
            <?php if (count($languages)): ?>
               <ul>
                  <?php foreach ($languages as $code => $name): ?>
                     <?php if ($languageSwitch == 'host'): ?>
                        <?php if ($code == 'en'): ?>
                           <li><a href="http://<?php echo $toolUrl; ?>"<?php if ($code == $language) echo ' class="selected"'; ?>><?php echo $name['native']; ?></a></li>
                        <?php else: ?>
                           <li><a href="http://<?php echo $code; ?>.<?php echo $toolUrl; ?>"<?php if ($code == $language) echo ' class="selected"'; ?>><?php echo $name['native']; ?></a></li>
                        <?php endif; ?>
                     <?php else: ?>
                        <li><a href="<?php echo $appRoot; ?>?lang=<?php echo $code; ?>"<?php if ($code == $language) echo ' class="selected"'; ?>><?php echo $name['native']; ?></a></li>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </ul>
            <?php endif; ?>
            <!-- PF_REMOVE -->
               <?php if ($missingTranslations): ?>
                  <p class="missing-translations"><a href="<?php echo $functions->GetMenuUrl($appRoot, 'your-language'); ?>"><?php echo $translation->Get('warning.missing-translations')?></a></p>
               <?php endif; ?>
            <!-- END_PF_REMOVE -->
            <!-- PF_REMOVE -->
               <p id="your-language"><a href="<?php echo $functions->GetMenuUrl($appRoot, 'your-language'); ?>"><?php echo $translation->Get('menu.language.your-language')?></a></p>
            <!-- END_PF_REMOVE -->
         </div>
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
   <script type="text/javascript" src="<?php echo $assetsDir; ?>js/get.<?php require('../htdocs/js/get.php'); ?>.js"></script>
   <!-- PF_REMOVE -->
      <?php require('../templates/analytics.php'); ?>
   <!-- END_PF_REMOVE -->
</body> 
 
</html>
