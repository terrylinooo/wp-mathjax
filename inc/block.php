<?php
/**
 * WP MathJax - Gutenberg Block.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'init', 'mathjax_block_init' );

/**
 * Initial block.
 *
 * @return void
 */
function mathjax_block_init() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

	wp_register_script(
		'mathjax-gutenberg-block',
		plugins_url( 'assets/mathjax/block-editor.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-element' )
	);

	wp_register_style(
		'mathjax-gutenberg-block',
		plugins_url( 'assets/mathjax/block-editor.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' )
	);

	register_block_type(
		'wp-mathjax/display-block',
		array(
			'editor_script'   => 'mathjax-gutenberg-block',
			'editor_style'    => 'mathjax-gutenberg-block',
			'render_callback' => 'mathjax_display_block_render',
		)
	);
}

/**
 * Render block.
 *
 * @param array  $attr    Attributes.
 * @param string $content Content.
 * @return string
 */
function mathjax_display_block_render( $attr, $content = null ) {
	global $load_mathjax_js;
	$load_mathjax_js = true;
	return $content;
}
