<?php $oldValue = $args['value']; ?>

<input name="<?php echo esc_attr( $args['name'] ) ?>" type="checkbox" <?php echo (!is_null($oldValue) && (boolean)$oldValue === true) ? 'checked' : '' ?> id="<?php echo esc_attr( $args['name'] ) ?>">
<label for="<?php echo esc_attr( $args['name'] ) ?>">
    <?php echo esc_attr( $args['description'] ) ?>
</label>