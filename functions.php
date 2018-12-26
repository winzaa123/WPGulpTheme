<?php
/**
 * Theme Functions
 *
 * Entire theme's function definitions.
 *
 * @since   1.0.0
 * @package WP
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once (TEMPLATEPATH . '/config/php.init.php');


/**
 * Scripts & Styles.
 *
 * Frontend with no conditions, Add Custom styles to wp_head.
 *
 * @since  1.0.0
 */
function wpgt_scripts() {
	// Frontend scripts.
	if ( ! is_admin() ) {

		if(SITE_MODE === 'live'){
			// please build !!!
			wp_enqueue_style( 'wpgt_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
			wp_enqueue_script( 'wpgt_customJs', get_template_directory_uri() . '/static/js/compiled.min.js' );
		}else{
			// Enqueue vendors first.
			wp_enqueue_script( 'wpgt_vendorsJs', get_template_directory_uri() . '/static/js/vendor.js' );
			
			// Enqueue custom JS after vendors.
			wp_enqueue_script( 'wpgt_customJs', get_template_directory_uri() . '/static/js/custom.js' );
			
			// Minified and Concatenated styles.
			wp_enqueue_style( 'wpgt_style', get_template_directory_uri() . '/static/css/style.min.css', array(), '1.0', 'all' );
		}
	}
}
// Hook.
add_action( 'wp_enqueue_scripts', 'wpgt_scripts' );
