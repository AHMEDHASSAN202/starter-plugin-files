<?php
namespace eCommerce\classes\Widgets;

class WidgetsActions
{
    public static function set()
    {
        add_action('widgets_init', 'eCommerce\classes\Widgets\Widgets::registerProductWidgets');
    }
}