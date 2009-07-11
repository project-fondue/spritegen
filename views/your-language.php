<?php
   $oTemplate->Set('title', $oTranslations->Get('page.title.your-language'));
   $oTemplate->Set('languages', ConfigHelper::Get('/languages/installed'));
   $oTemplate->Set('functions', new TemplateFunctions());
?>
