<?php
   $oTemplate->Set('title', $oTranslations->Get('page.title.advertising'));
   $oTemplate->Set('numLanguages', count(ConfigHelper::Get('/languages/installled'));
   $oTemplate->Set('functions', new TemplateFunctions());
?>
