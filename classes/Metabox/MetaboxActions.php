<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace eCommerce\classes\Metabox;


class MetaboxActions
{
    public static function set()
    {
        add_action('add_meta_boxes', 'eCommerce\classes\Metabox\Metabox::addProductInfo');
        add_action('save_post', 'eCommerce\classes\Metabox\Metabox::saveProductInfo');
    }
}