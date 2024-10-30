<?php
/*
 * Plugin Name: Blackbox.cool
 * Plugin URI: http://blackbox.cool
 * Description: A convenience plugin for adding Blackbox widgets to a WordPress installation.
 * Version: 0.1
 * Date: Aug 4th, 2016
 * Author: Scott Robbin
 */

// Shortcode
function blackbox_widget_handler( $atts ){
  if ( isset($atts['product']) ) {
    /* Create data attributes from shortcode attributes */
    $data = Array();     
    foreach ( $atts as $key => $value ) {
      $data[] = "data-{$key}=\"{$value}\"";
    }
    $data_atts = implode( ' ', $data );
    return "<a href=\"https://shop.blackbox.cool/products/{$atts['product']}/{$atts['name']}\" class=\"blackbox-widget\" {$data_atts}>Buy {$atts['name']} on Blackbox</a>";
  } else {
    return '';
  }
}
add_shortcode( 'blackbox', 'blackbox_widget_handler' );

// Adds the JavaScript to the footer
function blackbox_widget_javascript() {
  wp_enqueue_script('bb-wjs', 
                    'https://cdn.blackbox.cool/embed/widget.js', 
                    array(), 
                    '0.1', 
                    true);
}
add_action('wp_enqueue_scripts', 'blackbox_widget_javascript');