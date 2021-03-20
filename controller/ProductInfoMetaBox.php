<?php wp_nonce_field('product_info', 'product_info_nonce') ?>
<?php $oldValue = get_post_meta($args->ID, '_product_info_price', true) ?>

<label for="_product_info_price">
    Product Price
</label>
<input type="text" id="_product_info_price" name="_product_info_price" value="<?php echo esc_attr($oldValue) ?>">
