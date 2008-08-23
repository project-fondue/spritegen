<?php
   $oTemplate->Set('title', $oTranslations->Get('page.title.advertising'));
   $oTemplate->Set('numLanguages', count($aLanguages));
   $oTemplate->Set('functions', new TemplateFunctions());
?>