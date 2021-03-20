<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace eCommerce\classes\Shortcodes;


class Shortcodes
{
    public static function productShortcode()
    {
        add_shortcode('product', function ($atts, $content) {
            if (empty($atts)) return;
            $attributes = shortcode_atts(['shows' => ['price']], $atts, 'product');
            global $post;
            $keys = explode(',', $attributes['shows']);
            foreach ($keys as $key) {
                $metaKey = sprintf('_product_info_%s', $key);
                $metaValue = get_post_meta($post->ID, $metaKey, true);
                echo sprintf('Product %s : %s', $key, $metaValue) . '<br>';
            }
        });
    }
}