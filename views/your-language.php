<?php
   $oTemplate->Set('title', $oTranslations->Get('page.title.your-language'));
   $oTemplate->Set('numLanguages', count($aLanguages));
   $oTemplate->Set('functions', new TemplateFunctions());
?>