<?php
/**
 * Plugin Name: Pin It Button for WooCommerce
 * Plugin URI: http://targetimc.com
 * Description: Adds a Pin It button on WooCommerce Single Products Images
 * Version: 1.0.0
 * Author: TargetIMC
 * Author URI: http://targetimc.com
 * Developer: Max Terbeck
 * Developer URI: http://targetimc.com/author/max/
 * Text Domain: tgt-woo-pinit
 * Domain Path: /languages/
 * Tags: pinterest, pinterest share, social, social popup, social sharing, woocommerce, e-commerce, shop, plugin, Share, share buttons, share buttons plugin, sharing, sharing buttons, sharing sidebar, sidebar, social buttons, social tools, pin it, pinit
 * Copyright: (c) 2016 TargetIMC
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

/* Prevent Leaks */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Localization*/
function tgt_action_init() {
  // Localization
  load_plugin_textdomain('tgt-woo-pinit', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
// Add actions
add_action('init', 'tgt_action_init');

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
// define the woocommerce_single_product_image_html callback 
  function tgt_woo_pintit_button( $sprintf, $post_id ) { 
      echo '<script async defer data-pin-hover="true" data-pin-tall="true" src="//assets.pinterest.com/js/pinit.js"></script>';
      return $sprintf; 
  } 
  // add the filter 
  add_filter( 'woocommerce_single_product_image_html', 'tgt_woo_pintit_button', 10, 2 ); 
}