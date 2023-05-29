<?php
/**
 * WP MathJax - Setting page.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.1
 */

/**
 * Load view files.
 *
 * @param string $template_path The specific template's path.
 * @param array  $data              Data is being passed to.
 *
 * @return string
 */
function wp_mathjax_load_view( $template_path, $data = array() ) {
	$view_file_path = MATHJAX_PLUGIN_DIR . 'inc/views/' . $template_path . '.php';

	if ( ! empty( $data ) ) {
        // phpcs:ignore
		extract( $data );
	}

	if ( file_exists( $view_file_path ) ) {
		ob_start();
		require $view_file_path;
		$result = ob_get_contents();
		ob_end_clean();
		return $result;
	}
	return null;
}
