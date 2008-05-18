<div>
   <label for="<?php echo $id; ?>"><?php echo $label; ?>:</label>
   <select name="<?php echo $id; ?>" id="<?php echo $id; ?>">
      <?php foreach ($options as $option): ?>
         <option value="<?php echo $option; ?>"<?php if ($option == $value): ?> selected="selected"<?php endif; ?>>
         <?php echo $option; ?></option>
      <?php endforeach; ?>
   </select>
</div>