<?php
   $oTemplate->Set('title', $oTranslations->Get('page.title.api'));
   $oTemplate->Set('toolUrl', TOOL_URL);
   $oTemplate->Set('functions', new TemplateFunctions());
?>