<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace eCommerce\classes\Metabox;


use eCommerce\includes\Helpers;

class Metabox
{
    public static function addProductInfo()
    {
        add_meta_box(
            'productInfo',
            'Product Info',
            function ($args) {
                Helpers::controllerRequire('ProductInfoMetaBox', $args);
            },
            'products',
            'side'
        );
    }
    public static function saveProductInfo($postId)
    {
        if ($_POST['post_type'] != 'products') {
            return $postId;
        }

        if (!isset($_POST['product_info_nonce'])) {
            return $postId;
        }

        if (!wp_verify_nonce($_POST['product_info_nonce'], 'product_info')) {
            return $postId;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $postId;
        }

        if (!current_user_can('edit_post')) {
            return $postId;
        }

        $productPrice = sanitize_text_field($_POST['_product_info_price']);

        update_post_meta($postId, '_product_info_price', $productPrice);
    }
}