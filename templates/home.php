<?php if ($formPosted): ?>
   <?php if ($formError || $uploadError || !$validImages): ?>
      <ul id="error">
         <h2><?php echo $translation->Get('form.errors.title'); ?></h2>
         <?php if ($uploadError): ?>
            <li><?php echo $translation->Get('form.errors.invalid-file'); ?></li>
         <?php endif; ?>
         <?php if (!$formError && !$uploadError && !$validImages): ?>
            <li><?php echo $translation->Get('form.errors.zip'); ?></li>
         <?php endif; ?>
         <?php if ($formError): ?>
            <?php foreach ($formErrors['missing'] as $error): ?>
               <li><?php echo $translation->Get('form.errors.missing.'.strtolower($error)); ?></li>
            <?php endforeach; ?>
            <?php foreach ($formErrors['invalid'] as $key => $value): ?>
               <li><?php echo $translation->Get('form.errors.invalid.'.strtolower($key).'.'.strtolower($value)); ?></li>
            <?php endforeach; ?>
         <?php endif; ?>
      </ul>
   <?php endif; ?>
   <?php if ($validImages): ?>
      <div id="result">
         <a href="<?php echo $appRoot; ?>" class="close"><?php echo $translation->Get('form.result.reset'); ?></a>
         <h2><?php echo $translation->Get('form.result.title.css-rules'); ?></h2>
         <div class="code-container"><pre><code><?php echo $css; ?></code></pre></div>
         <p><?php echo $translation->Get('form.result.dont-forget')?></p>
         <pre><code>#container li { background: url(<?php echo $filename; ?>) no-repeat top left; }</code></pre>
         <h2><?php echo $translation->Get('form.result.title.sprite-image'); ?></h2>
         <p><a class="download" href="<?php echo $appRoot; ?>download.php?file=<?php echo $filename; ?>&hash=<?php echo $hash; ?>"><?php echo $translation->Get('form.result.download'); ?></a></p>
      </div>
   <?php endif; ?>
<?php endif; ?>
<form action="<?php echo $appRoot; ?>" method="post" enctype="multipart/form-data" id="options">
   <fieldset>
      <legend><?php echo $translation->Get('form.legend.source-files'); ?></legend>
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maxFileSize; ?>">
      <?php if ($formPosted && !$uploadError): ?>
         <input type="hidden" name="zip-folder" id="zip-folder" value="<?php echo $zipFolder; ?>">
         <input type="hidden" name="zip-folder-hash" id="zip-folder-hash" value="<?php echo $zipFolderHash; ?>">
      <?php endif; ?>
      <label for="path"<?php if ($formPosted && $uploadError) echo ' class="error"'; ?>><?php echo $translation->Get('form.label.upload-images'); ?><?php if ($formPosted && $uploadError) echo ' *'; ?>:</label>
      <div id="file-container">
         <input type="file" name="path" id="path"><span><?php echo $translation->Get('form.hint.max-upload-size', $maxFileSize / 1024 / 1024); ?></span>
         <?php if ($formPosted && !$uploadError): ?>
            <p><?php echo $translation->Get('form.hint.file-selected'); ?></p>
         <?php endif; ?>
      </div>
   </fieldset>  
   <fieldset id="resize">
      <legend><?php echo $translation->Get('form.legend.resize-source-images'); ?></legend>
      <?php echo $functions->TextInput('widthResize', $translation->Get('form.label.width'), 100, 3, '%'); ?>
      <?php echo $functions->TextInput('heightResize', $translation->Get('form.label.height'), 100, 3, '%'); ?>
   </fieldset>
   <fieldset class="duplicates">
      <legend><?php echo $translation->Get('form.legend.image-duplicates'); ?></legend>
      <?php echo $functions->RadioInput('ignore', 'duplicates1', $translation->Get('form.label.ignore-duplicates'), 'ignore', 'ignore'); ?>
      <?php echo $functions->RadioInput('ignore', 'duplicates2', $translation->Get('form.label.merge-duplicates'), 'merge', 'ignore'); ?>
   </fieldset>
   <fieldset>
      <legend><?php echo $translation->Get('form.legend.sprite-output-options'); ?></legend>
      <?php echo $functions->TextInput('hoffset', $translation->Get('form.label.horizontal-offset'), 150, 5, 'px'); ?>
      <?php echo $functions->TextInput('voffset', $translation->Get('form.label.vertical-offset'), 30, 5, 'px'); ?>

      <?php echo $functions->TextInput('bckground', $translation->Get('form.label.background-colour'), '', 7, $translation->Get('form.hint.transparency'), true); ?>
      <label for="use-transparency"><?php echo $translation->Get('form.label.use-transparency'); ?></label><input type="checkbox" name="use-transparency" id="use-transparency"<?php if (!$formPosted || isset($_POST['use-transparency'])) echo ' checked="checked"'; ?>>
      
      <?php echo $functions->SelectInput('imageoutput', $translation->Get('form.label.sprite-output-format'), $imageTypes, '', ''); ?> 
   </fieldset>
   <fieldset>
      <legend><?php echo $translation->Get('form.legend.css-output-options'); ?></legend>
      <?php echo $functions->TextInput('tagspre', $translation->Get('form.label.css-prefix'), '', null, $translation->Get('form.hint.css-prefix'), true); ?>
      <?php echo $functions->TextInput('fileregex', $translation->Get('form.label.filename-pattern-match'), '', null, $translation->Get('form.hint.filename-pattern-match'), true); ?>
      <?php echo $functions->TextInput('classpre', $translation->Get('form.label.class-prefix'), 'sprite-', null, $translation->Get('form.hint.class-prefix'), true); ?>
      <?php echo $functions->TextInput('tagspost', $translation->Get('form.label.css-suffix'), '', null, $translation->Get('form.hint.css-suffix'), true); ?>
   </fieldset>
   <p><input class="submit" type="submit" name="sub" value="<?php echo $translation->Get('form.button.create-sprite'); ?>"></p>
</form>