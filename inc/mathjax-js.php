<?php
/**
 * WP MathJax - Enqueue MathJax scripts.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

// For backend.
add_action( 'admin_enqueue_scripts', 'wp_mathjax_admin_enqueue_scripts' );
add_action( 'admin_print_footer_scripts', 'wp_mathjax_print_footer_scripts' );
add_action( 'admin_print_scripts', 'wp_mathjax_print_scripts' );

// For frontend.
add_action( 'loop_end', 'wp_mathjax_enqueue_scripts', 20 );
add_action( 'wp_enqueue_scripts', 'wp_mathjax_enqueue_styles' );
add_action( 'wp_print_footer_scripts', 'wp_mathjax_print_scripts', -10 );
add_action( 'wp_print_footer_scripts', 'wp_mathjax_print_footer_scripts', 20 );

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
				$script_url = MATHJAX_PLUGIN_URL . 'assets/mathjax/MathJax.js';
				break;
		}

		wp_enqueue_script( 'mathjax', $script_url, array( 'jquery' ), MATHJAX_JS_VERSION, true );
	}
}

/**
 * Print JavasSript plaintext in page footer.
 * This method will be called by `wp_print_footer_scripts` hook.
 *
 * @return void
 */
function wp_mathjax_print_scripts() {
	global $load_mathjax_js;

	$option_input_type = get_option( 'wp_mathjax_input_type', 'TeX' );

	$script = '';

	if ( $load_mathjax_js ) {

		$script .= '<script id="wp-mathjax-var">';
		$script .= 'var mathjax_input = "' . $option_input_type . '";';

		if ( is_single() || is_page() || is_home() ) {
			$script .= 'var is_single_post = true;';
		} else {
			$script .= 'var is_single_post = false;';
		}

		$script .= '</script>';

		if ( 'MathML' === $option_input_type ) {
			$script .= '
				<script type="text/x-mathjax-config">
					MathJax.Hub.Config( {
						showProcessingMessages: false,
						messageStyle: "none",
						extensions: [
							"mml2jax.js",
							"MathEvents.js",
							"MathZoom.js",
							"MathMenu.js",
							"toMathML.js",
							"fast-preview.js",
							"AssistiveMML.js",
							"a11y/accessibility-menu.js"
						],
						jax: [
							"input/MathML",
							"output/SVG"
						]
					} );
				</script>
			';
		}

		if ( 'TeX' === $option_input_type ) {
			$script .= '
				<script type="text/x-mathjax-config">
					MathJax.Hub.Config( {
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
					} );
				</script>
			';
		}

		if ( 'ASCIIMathML' === $option_input_type ) {
			$script .= '
				<script type="text/x-mathjax-config">
					MathJax.Hub.Config( {
						showProcessingMessages: false,
						messageStyle: "none",
						extensions: [
							"asciimath2jax.js",
							"MathMenu.js",
							"MathZoom.js",
							"fast-preview.js",
							"AssistiveMML.js",
							"a11y/accessibility-menu.js"
						],
						jax: [
							"input/AsciiMath",
							"output/SVG"
						]
					} );
				</script>
			';
		}
		echo preg_replace( '/\s+/', ' ', $script );
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
								if (is_single_post) {

									if ( mathjax_input === "TeX" ) {
										$( ".mathjax" ).each( function( i ) {
											var content = $(this).html();
											if ( $( this ).hasClass( "mathjax-inline" ) ) {
												$( this ).html( "$ " + content + " $" );
											} else {
												$( this ).html( "$$" + "\n" + content + "\n" + "$$" );
											}
											if ( i + 1 === block_count ) {
												mathjaxInit("TeX");
											}
										} );
									} else if ( mathjax_input === "ASCIIMathML" ) {
										$( ".mathjax" ).each( function( i ) {
											var content = $(this).html();
											$( this ).html( "`" + "\n" + content + "\n" + "`" );
											if ( i + 1 === block_count ) {
												mathjaxInit("ASCIIMathML");
											}
										} );
									} else if ( mathjax_input === "MathML" ) {
										$( ".mathjax" ).each( function( i ) {
											var content = $(this).html();
											var t = "";
											t += "<math display=\"inline\" xmlns=\"http://www.w3.org/1998/Math/MathML\" mode=\"display\">";
											t += "\n";
											t += content;
											t += "\n";
											t += "</math>";
											$( this ).html(t);
											if ( i + 1 === block_count ) {
												mathjaxInit("MathML");
											}
										} );
									}
								} else {
									mathjaxInit();
								}
							} else {
								console.log( "[wp-mathjax] MathJax code blocks not found." );
							}
						} else {
							console.log( "[wp-mathjax] MathJax is not loadded." );
						}  
					});
				} )( jQuery );

				function mathjaxInit(type) {
					setTimeout(function() {
						MathJax.Hub.Queue( ["Typeset", MathJax.Hub] );
						console.log( "[wp-mathjax] MathJax executed. (" + type + ")" );
					}, 300);
				}
			</script>
		';
		echo preg_replace( '/\s+/', ' ', $script );
	}
}

/**
 * Print CSS plaintext in page header.
 * This method will be called by `wp_enqueue_scripts` hook.
 *
 * @return void
 */
function wp_mathjax_enqueue_styles() {
	wp_register_style( 'wp-mathjax', false );
	wp_enqueue_style( 'wp-mathjax' );

	$custom_css = '';

	// Fix Twenty-twenty theme's SVG not showing.
	$custom_css .= '  svg { visibility: visible; } ';

	wp_add_inline_style( 'wp-mathjax', $custom_css );
}
