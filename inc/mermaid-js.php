<?php
/**
 * WP MathJax - Enqueue MathJax scripts.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'loop_end', 'wp_mathjax_enqueue_scripts', 20 );
add_action( 'admin_enqueue_scripts', 'wp_mathjax_admin_enqueue_scripts' );
add_action( 'wp_print_footer_scripts', 'wp_mathjax_print_footer_scripts' );

/**
 * Register JS files for backend use.
 * This method will be called by `admin_enqueue_scripts` hook.
 *
 * @return void
 */
function wp_mathjax_admin_enqueue_scripts() {
	global $load_mathjax_js;

	// We want to load mathjax.js for previewing the graph in block editor.
	$load_mathjax_js = true;

	wp_mathjax_enqueue_scripts();
}

/**
 * Register JS files for frontend use.
 * This method will be called by `wp_enqueue_scripts` hook.
 *
 * @return void
 */
function wp_mathjax_enqueue_scripts() {
	global $load_mathjax_js;

	if ( $load_mathjax_js ) {

		$option = get_option( 'wp_mathjax_js_source' );

		switch ( $option ) {
			case 'cloudflare':
				$script_url = 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/' . MATHJAX_JS_VERSION . '/MathJax.js';
				break;

			case 'jsdelivr':
				$script_url = 'https://cdn.jsdelivr.net/npm/mathjax@' . MATHJAX_JS_VERSION . '/MathJax.js';
				break;

			default:
				$script_url = MATHJAX_PLUGIN_URL . 'assets/vendor/mathjax/MathJax.js';
				break;
		}

		wp_enqueue_script( 'mathjax', $script_url, array(), MATHJAX_JS_VERSION, true );
	}
}

/**
 * Print JavasSript plaintext in page footer.
 * This method will be called by `wp_print_footer_scripts` hook.
 *
 * @return void
 */
function wp_mathjax_print_footer_scripts() {
	global $load_mathjax_js;

	if ( $load_mathjax_js ) {

		$script = '
			<script id="wp-mathjax">
				( function( $ ) {
					$( function() {
						if ( typeof MathJax !== "undefined" ) {
							let block_count = $( ".mathjax" ).length;
							let i = 0;

							if ( block_count > 0 ) {
								$( ".mathjax" ).each( function( i ) {
									var content = $( this ).html();

									if ( $( this ).hasClass( "mathjax-inline" ) ) {
										$( this ).html( "$$ " + content + " $$" );
									} else {
										$( this ).html( "$$" + "\n" + content + "\n" + "$$" );
									}

									if ( i + 1 === block_count ) {
										MathJax.Hub.Config(
											{
												showProcessingMessages: false,
												messageStyle: "none",
												extensions: [
													"tex2jax.js",
													"TeX/mediawiki-texvc.js",
													"TeX/noUndefined.js",
													"TeX/autoload-all.js",
													"TeX/AMSmath.js",
													"TeX/AMSsymbols.js"
												],
												jax: [
													"input/TeX",
													"output/SVG"
												],
												elements: document.getElementsByClassName( "mathjax" ),
												tex2jax: {
													skipTags: [
														"script",
														"noscript",
														"style",
														"textarea"
													],
													inlineMath: [
														[\'$\', \'$\']
													],
													displayMath: [
														[\'$$\', \'$$\']
													],
													processClass: "mathjax"
												}
											} 
										);
										MathJax.Hub.Queue( ["Typeset", MathJax.Hub] );
									}
								} );
							} else {
								console.log( "[wp-mathjax] MathJax code blocks not found." );
							}
						} else {
							console.log( "[wp-mathjax] MathJax is not loadded." );
						}  
					});
				} )( jQuery );
			</script>
		';
		echo preg_replace( '/\s+/', ' ', $script );
	}
}