<?php

namespace eCommerce\classes\PostType;

class PostTypeActions
{
    public static function set()
    {
        add_action('init', 'eCommerce\classes\PostType\PostType::registerProductTaxonomy');
        add_action('init', 'eCommerce\classes\PostType\PostType::registerProductType');
    }
}