<?php
/*
Plugin Name: Woobizz Hook 2 
Plugin URI: http://woobizz.com
Description: Hide order notes on checkout page
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
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
//Add Hook 2
//add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 1);
//Check if WooCommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	//echo "woocommerce is active";
    add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 1);
}else{
	//Show message on admin
	//echo "woocommerce is not active";
	add_action( 'admin_notices', 'woobizzhook2_admin_notice' );
}
//Hook2 Notice
function woobizzhook2_admin_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e( 'Woobizz hook 2 needs woocommerce to work properly, please install and activate woocommerce or disable this plugin.', 'woobizzhook2' ); ?></p>
    </div>
    <?php
}