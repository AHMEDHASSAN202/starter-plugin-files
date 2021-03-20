<?php

namespace eCommerce\classes\Widgets;


use eCommerce\includes\Helpers;

class ProductWidget extends \WP_Widget
{
    public function __construct()
    {
        parent::__construct('popularProducts', 'Popular Products', ['description' => 'show popular products widget']);
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
//        if ( ! empty( $instance['title'] ) ) {
//            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
//        }
        $products = get_posts(['post_type' => 'products', 'numberposts' => 3]);
        $html = '<ul>';
        foreach ($products as $product) {
            $html .= '<li><a href="'. esc_url(get_permalink($product->ID)) .'"><h3>'.$product->post_title.'</h3></a></li>';
        }
        $html .= '</ul>';
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title']  ) . $html . $args['after_title'];
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = ! empty( $instance['popularProductsTitle'] ) ? $instance['popularProductsTitle'] : 'Popular Products';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'popularProductsTitle' ) ); ?>"><?php 'Title:' ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'popularProductsTitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'popularProductsTitle' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['popularProductsTitle'] = ( ! empty( $new_instance['popularProductsTitle'] ) ) ? sanitize_text_field( $new_instance['title'] ) : 'Popular Products';

        return $instance;
    }
}