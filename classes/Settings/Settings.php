<?php

namespace eCommerce\classes\Settings;

use eCommerce\includes\Helpers;

class Settings
{
    public static function registerMainSection()
    {
        add_settings_section(
            'productsSection',
            'Products Section',
            function ($args) {
                Helpers::controllerRequire('ProductsSectionPartController', $args);
            },
            'general'
        );
    }

    public static function registerFields()
    {
        add_settings_field(
            'enabledProducts',
            'Enabled Products',
            function ($args) {
                Helpers::controllerRequire('enabledProductsFieldController', $args);
            },
            'general',
            'productsSection',
            [
                'label_for'  => 'enabledProducts',
                'name'       => 'enabledProducts',
                'value'      => (bool)get_option('enabledProducts'),
                'description'=> 'you want to enable products plugin!'
            ]
        );
        register_setting(
            'general',
            'enabledProducts',
            [
                'type' => 'checkbox',
                'sanitize_callback' => function ($val) {
                    if ($val == 'on') return true;
                    return false;
                }
            ]
        );
    }
}