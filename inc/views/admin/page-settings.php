<?php

if ( ! defined( 'MATHJAX_PLUGIN_NAME' ) ) {
	die;
}

?>

<div class="wrap">
	<h1>WP MathJax
		<small style="font-size: 12px;">
			<a href="https://github.com/terrylinooo/wp-mathjax" target="_blank" style="text-decoration: none">
				<?php echo MATHJAX_PLUGIN_VERSION; ?>
			</a> by 
			<a href="https://github.com/terrylinooo" target="_blank" style="text-decoration: none">
				TerryL
			</a>
		</small>
	</h1>
	<hr />
	<form action="options.php" method="post">
		<?php settings_fields( 'wp_mathjax_setting_group' ); ?>
		<?php do_settings_sections( 'wp_mathjax_setting_group' ); ?>
		<hr />
		<?php submit_button(); ?>
	</form>
</div>
<div class="wrap">
	<hr />
	<h3><?php echo __( 'How to Use', 'wp-mathjax' ); ?></h3>
	<blockquote>
		<h4><?php echo __( 'Shortcode', 'wp-mathjax' ); ?></h4>
		<blockquote>
			<p>
				<?php echo __( 'In classic editor, you can use the shortcode to render your MathJax syntax.', 'wp-mathjax' ); ?><br />
				<?php echo __( 'If you are using WordPress version below 5.0, this is the only way you can use this feature.', 'wp-mathjax' ); ?>
			</p>
			<code style="background-color: white; padding: 10px; margin: 10px 0; display: inline-block;">[mathjax] ... [/mathjax]</code>
		</blockquote>
		<h4><?php echo __( 'Gutenberg Block', 'wp-mathjax' ); ?></h4>
		<blockquote>
			<p><?php echo __( 'Choose MathJax block:', 'wp-mathjax' ); ?></p>
			<img src="<?php echo MATHJAX_PLUGIN_URL; ?>/assets/example-gutenberg-block-1.png" style="width: 500px; max-width: 95%">
			<p><?php echo __( 'Fill in your MathJax syntax in the editor.', 'wp-mathjax' ); ?></p>
			<img src="<?php echo MATHJAX_PLUGIN_URL; ?>/assets/example-gutenberg-block-2.png" style="width: 500px; max-width: 95%">>
		</blockquote>
	</blockquote>
</div>
