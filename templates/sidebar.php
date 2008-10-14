<!--
   <div class="ad">
      <a href="<?php echo $functions->GetMenuUrl($appRoot, 'advertising'); ?>"><?php echo $translation->Get('sidebar.ad-placeholder'); ?></a>
   </div>
   <div class="ad">
      <a href="<?php echo $functions->GetMenuUrl($appRoot, 'advertising'); ?>"><?php echo $translation->Get('sidebar.ad-placeholder'); ?></a>
   </div>
-->
<h2><?php echo $translation->Get('sidebar.sponsors-header'); ?></h2>
<?php require('../includes/text-ads.inc.php'); ?>
<h2><?php echo $translation->Get('sidebar.advertise-header'); ?></h2>
<p><a href="<?php echo $functions->GetMenuUrl($appRoot, 'advertising'); ?>"><?php echo $translation->Get('sidebar.advertise-text'); ?></a></p>
<h2><?php echo $translation->Get('sidebar.open-source-header'); ?></h2>
<p><a href="https://launchpad.net/css-sprite-generator"><?php echo $translation->Get('sidebar.open-source-text'); ?></a></p>