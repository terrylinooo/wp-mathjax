<?php

if ( ! defined( 'MATHJAX_PLUGIN_NAME' ) ) {
	die;
}

?>

<div>
	<div>
		<input type="radio" name="wp_mathjax_input_type" id="wp-mathjax-js-input-type-1" value="TeX" <?php checked( $option_input_type, 'TeX' ); ?>>
		<label for="wp-mathjax-js-library-source-1">
		<?php echo __( 'TeX', 'wp-mathjax' ); ?> (<?php echo __( 'default', 'wp-mathjax' ); ?>)
		<label>
	</div>
	<div>
		<input type="radio" name="wp_mathjax_input_type" id="wp-mathjax-js-input-type-2" value="MathML" <?php checked( $option_input_type, 'MathML' ); ?>>
		<label for="wp-mathjax-js-library-source-2">
			<?php echo __( 'MathML', 'wp-mathjax' ); ?>
		<label>
	</div>
	<div>
		<input type="radio" name="wp_mathjax_input_type" id="wp-mathjax-js-input-type-3" value="ASCIIMathML" <?php checked( $option_input_type, 'ASCIIMathML' ); ?>>
		<label for="wp-mathjax-js-library-source-3">
			<?php echo __( 'ASCIIMathML', 'wp-mathjax' ); ?>
		<label>
	</div>
</div>
