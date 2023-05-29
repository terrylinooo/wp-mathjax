<?php
/**
 * WP MathJax - Shortcode
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'init', 'wp_mathjax_shortcode_init' );

/**
 * Initial `mathjax` short code.
 *
 * @since 1.0.0
 * @return void
 */
function wp_mathjax_shortcode_init() {
	add_shortcode( 'mathjax', 'wp_mathjax_shortcode' );
}

/**
 * Render the shortcode.
 *
 * @param array  $attr    Attributes.
 * @param string $content Content.
 * @return string
 */
function wp_mathjax_shortcode( $attr, $content = null ) {
	global $load_mathjax_js;

	$load_mathjax_js = true;

	$attr = shortcode_atts(
		array(),
		$attr,
		'mathjax'
	);

	$content = html_entity_decode( $content );
	$content = str_replace( '<br />', "\n", $content );
	$content = str_replace( array( '<p>', '</p>' ), "\n", $content );
	$content = preg_replace( "/[\r\n]+/", "\n", $content );
	$result  = sprintf( "<div class=\"mathjax\">\n%s\n</div>", $content );

	return $result;
}
