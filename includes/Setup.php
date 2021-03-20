<?php
namespace eCommerce\includes;

class Setup
{
    public static function run()
    {
        register_activation_hook(E_COMMERCE_PLUGIN_FILE, __CLASS__.'::activation');

        register_deactivation_hook(E_COMMERCE_PLUGIN_FILE, __CLASS__.'::deactivation');

        add_action('init', __CLASS__.'::initialPlugin');
    }

    public static function activation()
    {
        //do something
    }


    public static function deactivation()
    {
        //do something
    }


    public static function uninstall()
    {
        //do something
    }

    public static function initialPlugin()
    {
        self::loadLocalization();
    }

    private static function loadLocalization()
    {
        load_plugin_textdomain(
            E_COMMERCE_PLUGIN_DOMAIN,
            false,
            dirname(plugin_basename(E_COMMERCE_PLUGIN_FILE)) . DIRECTORY_SEPARATOR . 'languages'
        );
    }
}