<?php
/**
 * WP MathJax - Activating plugin.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

register_activation_hook( __FILE__, 'wp_mathjax_activation' );
register_uninstall_hook( __FILE__, 'wp_mathjax_uninstall' );

/**
 * Assign default setting values while activating this plugin.
 *
 * @return void
 */
function wp_mathjax_activation() {
	add_option( 'wp_mathjax_js_source', 'local' );
	add_option( 'wp_mathjax_uninstall_option', 'yes' );
}

/**
 * Remove setting values while uninstalling this plugin.
 *
 * @return void
 */
function wp_mathjax_uninstall() {
	$option_uninstall = get_option( 'wp_mathjax_uninstall_option' );

	if ( 'yes' === $option_uninstall ) {
		delete_option( 'wp_mathjax_js_source' );
		delete_option( 'wp_mathjax_uninstall_option' );
	}
}
