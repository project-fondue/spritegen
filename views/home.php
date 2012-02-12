<?php
    // create an intance of the sprite gen class
    // (this does all the work of creating sprites and CSS)
    $oCssSpriteGen = new CssSpriteGen();

    // has the form been submitted
    $bFormPosted = !empty($_POST);

    if ($bFormPosted) {
        // process form and uploaded ZIP file
        $bFormError = !$oCssSpriteGen->ProcessForm();
        $bUploadError = !(bool)($sFolderMD5 = $oCssSpriteGen->ProcessFile());

        // check for error
        if (!$bUploadError) {
            // get ZIP folder and MD5 has to store in hidden form fields
            // these are used if the form is resubmitted (options changed) to prevent the
            // need to re-upload the ZIP file
            $oTemplate->Set('zipFolder', $oCssSpriteGen->GetZipFolder());
            $oTemplate->Set('zipFolderHash', $oCssSpriteGen->GetZipFolderHash());
        }

        // if no form or upload errors then get parameters for sprite image
        if (!$bFormError && !$bUploadError) {
            $oCssSpriteGen->CreateSprite($sFolderMD5);
            $oTemplate->Set('filename', $oCssSpriteGen->GetSpriteFilename());
            $oTemplate->Set('hash', $oCssSpriteGen->GetSpriteHash());
            $oTemplate->Set('css', $oCssSpriteGen->GetCss());
            $oTemplate->Set('validImages', $oCssSpriteGen->ValidImages());
        } else {
            $oTemplate->Set('validImages', false);
        }

        // pass error flags to template
        $oTemplate->Set('formError', $bFormError);
        $oTemplate->Set('uploadError', $bUploadError);
    }

    // get all errors
    $aFormErrors = $oCssSpriteGen->GetAllErrors();

    // pass data to template
    $oTemplate->Set('title', $oTranslations->Get('page.title.home'));
    $oTemplate->Set('maxFileSize', (int)(ConfigHelper::Get('/upload/max_file_size')));
    $oTemplate->Set('imageTypes', TemplateFunctions::ConvertArrayToMulti($oCssSpriteGen->GetImageTypes()));
    $oTemplate->Set('formPosted', $bFormPosted);
    $oTemplate->Set('formErrors', $aFormErrors);
    $oTemplate->Set('useApi', !empty($_GET['use-api']));
    $oTemplate->Set('functions', new TemplateFunctions($bFormPosted, $aFormErrors));
?>
