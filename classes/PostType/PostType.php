<?php

namespace eCommerce\classes\PostType;

class PostType
{
    public static function registerProductType()
    {
        register_post_type(
            'products',
            [
                'labels'        => [
                    'name' => 'Products',
                    'singular_name' => 'Product',
                    'add_new' => 'Add New Product',
                    'add_new_item' => 'Add New Product',
                    'edit_item' => 'Edit Product',
                    'new_item' => 'New Product',
                    'all_items' => 'All Products',
                    'view_item' => 'View Product',
                    'search_items' => 'Search Products',
                    'not_found' => 'No products found',
                    'not_found_in_trash' => 'No products found in Trash',
                    'menu_name' => 'Products'
                ],
                'description'   => 'Products Post Type Description',
                'public'        => true,
                'rewrite'       => [
                    'slug' => 'product'
                ],
                'supports'      => [
                    'title', 'editor', 'author', 'thumbnail', 'comments'
                ]
            ]
        );
    }

    public static function registerProductTaxonomy()
    {
        register_taxonomy(
            'type',
            'products',
            array(
                'hierarchical' => true,
                'label' => 'Products Categories',
                'query_var' => true,
                'rewrite' => true,
                'public' => true,
                'capabilities' => ['manage_terms']
            )
        );
    }
}