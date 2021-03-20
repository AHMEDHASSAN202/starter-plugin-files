<?php

namespace eCommerce\classes\Menus;

class MenusActions
{

    public static function set()
    {
        add_action('admin_menu', 'eCommerce\classes\Menus\Menus::mainProductMenu');
    }
}