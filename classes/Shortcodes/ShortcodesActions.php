<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace eCommerce\classes\Shortcodes;


class ShortcodesActions
{
    public static function set()
    {
        add_action('init', 'eCommerce\classes\Shortcodes\Shortcodes::productShortcode');
    }
}