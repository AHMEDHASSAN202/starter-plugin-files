<?php
/**
 * Created by PhpStorm.
 * User: AQSSA
 */

namespace eCommerce\classes\Widgets;


class Widgets
{
    public static function registerProductWidgets()
    {
        register_widget('eCommerce\classes\Widgets\ProductWidget');
    }
}