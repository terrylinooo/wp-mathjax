<?php
/**
 * WP MathJax - Smart loader for frontend posts.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'loop_end', 'wp_mathjax_js_smart_loader', 10 );

// We need to remove `wptexturize` to make the MathJax syntax work as expected,
// becuase the HTML encoded characters break the syntax.
remove_filter( 'the_content', 'wptexturize' );

// Decode &lt; and &gt; to make MathML work.
add_filter( 'the_content', 'wp_specialchars_decode', 1, 1 );

/**
 * Detect whether MathJax syntax existed in post content.
 *
 * @since 1.0.0
 * @return void
 */
function wp_mathjax_js_smart_loader() {
	global $load_mathjax_js;

	if ( is_mathjax_loaded_on_post() ) {
		$load_mathjax_js = true;
	}
}

/**
 * Check if mathjax.js should be loaded.
 * This method is used in `wp_mathjax_js_smart_loader` only.
 *
 * @return bool
 */
function is_mathjax_loaded_on_post() {
	$is_mathjax   = false;
	$post_content = get_the_content();

	if ( false !== stripos( $post_content, 'wp-block-wp-mathjax-block' ) ) {
		// Detect whether post content contains WP-MathJax block.
		$is_mathjax = true;

	} else {

		if (
			// We also support Markdown code block, for example: ```mathjax and HTML `<div class="mathjax">`
			false !== stripos( $post_content, ' class="mathjax">' ) ||
			false !== stripos( $post_content, ' class="language-mathjax">' )
		) {
			$is_mathjax = true;
		}
	}

	return $is_mathjax;
}
