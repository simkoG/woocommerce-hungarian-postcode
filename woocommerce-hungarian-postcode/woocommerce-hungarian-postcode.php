<?php
/**
* Plugin Name: Irányítószám várossá
* Plugin URI: simko.me/whp
* Description: Woocommerce esetén ha a vásárló megadja az irányítószámát, a plugin automatikusan beírja a hozzá tartozó várost a megfelelő helyre
* Version: 1.0
* Author: Simkó Gergő
* Author URI: https://simko.me
* License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/** 
 * CONSTANTS 
 */
define( "PLUGIN_SLUG", "woocommerce-hungarian-postcode" );
define( "PLUGIN_DIRECTORY", plugin_dir_url( __FILE__ ) );


/**
 * INJECT JS TO CHECKOUT PAGE 
 */
function inject_js_file() {
  $checkoutID = get_option( 'woocommerce_checkout_page_id' );
  
  if( is_page( $checkoutID ) ) {
    wp_enqueue_script('postcode-js', PLUGIN_DIRECTORY.'postcode.js', array('jquery'), '', false);
    
    echo '<script type="text/javascript">/* <![CDATA[ */' ."\n";
    echo 'var whc_param = {"ajax_url": "'. PLUGIN_DIRECTORY .'postcode.php"};' ."\n";
    echo '/* ]]> */</script>' ."\n";
  }
}
add_action( 'wp_footer', 'inject_js_file');

?>
