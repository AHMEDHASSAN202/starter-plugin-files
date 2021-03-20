<?php
/*
 Plugin Name: E-Commerce
 Plugin URI: http://example.com/e-commerce
 Description: This is a brief description of my plugin
 Version: 1.0
 Author: Ahmed Hassan
 Author URI: http://example.com
 Text Domain:ecommerce-plugin
 License: GPLv2
 */
use eCommerce\includes\Setup;
use eCommerce\includes\Route;

const E_COMMERCE_PLUGIN_FILE = __FILE__;
const E_COMMERCE_PLUGIN_DOMAIN = 'ecommerce-plugin';

require_once 'autoload.php';

Setup::run();

if (get_option('enabledProducts')) {
    \eCommerce\classes\PostType\PostTypeActions::set();
}

Route::add([
    [
        'regex' => '^wp-admin/product-settings/$',
        'query' => 'wp-admin/index.php',
        'controller'  => 'subMenuController'
    ],
    [
        'regex' => '^controller/([a-zA-Z1-9]+)/?',
        'query' => 'index.php?param=$matches[1]',
        'controller'  => 'firstController'
    ]
]);

\eCommerce\classes\Menus\MenusActions::set();
\eCommerce\classes\Settings\SettingsAction::set();
\eCommerce\classes\Metabox\MetaboxActions::set();
\eCommerce\classes\Shortcodes\ShortcodesActions::set();
\eCommerce\classes\Widgets\WidgetsActions::set();

