<?php

if ( ! defined( 'MATHJAX_PLUGIN_NAME' ) ) {
	die;
}

?>

<div>
	<div>
		<input type="radio" name="wp_mathjax_js_source" id="wp-mathjax-js-library-source-1" value="local" <?php checked( $option_js_source, 'local' ); ?>>
		<label for="wp-mathjax-js-library-source-1">
		<?php echo __( 'Local', 'wp-mathjax' ); ?> (<?php echo __( 'default', 'wp-mathjax' ); ?>)
		<label>
	</div>
	<div>
		<input type="radio" name="wp_mathjax_js_source" id="wp-mathjax-js-library-source-1" value="cloudflare" <?php checked( $option_js_source, 'cloudflare' ); ?>>
		<label for="wp-mathjax-js-library-source-2">
			<?php echo __( 'cdn.cloudflare.com', 'wp-mathjax' ); ?>
		<label>
	</div>
	<div>
		<input type="radio" name="wp_mathjax_js_source" id="wp-mathjax-js-library-source-2" <?php checked( $option_js_source, 'jsdelivr' ); ?> value="jsdelivr">
		<label for="wp-mathjax-js-library-source-3">
			<?php echo __( 'cdn.jsdelivr.net', 'wp-mathjax' ); ?>
		<label>
	</div>
</div>
<p>
	<em>
		<?php echo __( 'This plugin loads MathJax.js locally by default, but if you would like to use it with a CDN service, here is the option.', 'wp-mathjax' ); ?>
	</em>
</p>
