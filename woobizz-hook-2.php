<?php
/*
Plugin Name: Woobizz Hook 2 
Plugin URI: http://woobizz.com
Description: Hide order notes on checkout page
Author: WOOBIZZ.COM
Author URI: http://woobizz.com
Version: 1.0.1
Text Domain: woobizzhook2
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook2_load_textdomain' );
function woobizzhook2_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook2', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Hook 2
function woobizzhook2_disable_order_notes() {
    add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 1);
}
add_action( 'init', 'woobizzhook2_disable_order_notes' );