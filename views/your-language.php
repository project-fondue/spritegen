<?php
   $oTemplate->Set('title', $oTranslations->Get('page.title.your-language'));
   $oTemplate->Set('languages', $aLanguages);
   $oTemplate->Set('functions', new TemplateFunctions());
?>
