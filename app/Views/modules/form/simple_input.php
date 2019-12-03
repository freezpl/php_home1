
<div class="form-group">
<label for="<?php echo $id; ?>"><?php echo $label; ?></label>
<input type="<?php echo $type; ?>" 
        id="<?php echo $id; ?>" 
        name="<?php echo $name; ?>" 
        <?php if(isset($value)) echo "value=".$value; ?>
        <?php if(isset($min)) echo "min=".$min; ?>
        <?php if(isset($max)) echo "max=".$max; ?>
        class="form-control">
</div>