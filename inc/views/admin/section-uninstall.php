<?php

if ( ! defined( 'MATHJAX_PLUGIN_NAME' ) ) {
	die;
}

?>

<div>
	<div>
		<input type="radio" name="wp_mathjax_uninstall_option" id="wp-mathjax-uninstall-option-yes" value="yes" 
			<?php checked( $option_uninstall_option, 'yes' ); ?>>
		<label for="wp-mathjax-uninstall-option-yes">
			<?php echo __( 'Remove WP Mathjax generated data.', 'wp-mathjax' ); ?><br />
		<label>
	</div>
	<div>
		<input type="radio" name="wp_mathjax_uninstall_option" id="wp-mathjax-uninstall-option-yes" value="no" 
			<?php checked( $option_uninstall_option, 'no' ); ?>>
		<label for="wp-mathjax-uninstall-option-yes">
			<?php echo __( 'Keep WP Mathjax generated data.', 'wp-mathjax' ); ?>
		<label>
	</div>    
</div>
<p>
	<em>
		<?php echo __( 'This option only works when you uninstall this plugin.', 'wp-mathjax' ); ?>
	</em>
</p>
