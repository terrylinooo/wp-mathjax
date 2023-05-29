<?php
/**
 * WP MathJax - Menu.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'admin_menu', 'wp_mathjax_option' );

/**
 * Register the plugin setting page.
 *
 * @return void
 */
function wp_mathjax_option() {
	if ( function_exists( 'add_options_page' ) ) {
		add_options_page(
			__( 'WP MathJax', 'wp-mathjax' ),
			__( 'WP MathJax', 'wp-mathjax' ),
			'manage_options',
			'wp-mathjax.php',
			'wp_mathjax_options_page'
		);
	}
}

/**
 * Output the setting page.
 *
 * @return void
 */
function wp_mathjax_options_page() {
	echo wp_mathjax_load_view( 'admin/page-settings' );
}
