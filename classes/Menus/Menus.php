<?php

namespace eCommerce\classes\Menus;

class Menus
{
    public static function mainProductMenu()
    {
        add_submenu_page(
            'edit.php?post_type=products',
            'Products Settings',
            'Products Settings',
            'manage_options',
            'products-settings',
            function ($args) {
                \eCommerce\includes\Helpers::controllerRequire('subMenuController', $args);
            }
        );
    }
}