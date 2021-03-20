<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace eCommerce\classes\Settings;


class SettingsAction
{
    public static function set()
    {
        add_action('admin_init', 'eCommerce\classes\Settings\Settings::registerMainSection');
        add_action('admin_init', 'eCommerce\classes\Settings\Settings::registerFields');
    }
}