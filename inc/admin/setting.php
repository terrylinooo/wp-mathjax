<?php

/**
 * WP MathJax - Setting page.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action('admin_init', 'wp_mathjax_settings');

/**
 * Add settings.
 *
 * @return void
 */
function wp_mathjax_settings()
{

	register_setting('wp_mathjax_setting_group', 'wp_mathjax_js_source');
	register_setting('wp_mathjax_setting_group', 'wp_mathjax_input_type');
	register_setting('wp_mathjax_setting_group', 'wp_mathjax_uninstall_option');

	add_settings_section(
		'wp_mathjax_basic_section_id',
		__('Basic', 'wp-mathjax'),
		'wp_mathjax_setting_section_callback',
		'wp_mathjax_setting_group'
	);

	add_settings_field(
		'wp_mathjax_js_source',
		__('File Host', 'wp-mathjax'),
		'wp_mathjax_js_source_callback',
		'wp_mathjax_setting_group',
		'wp_mathjax_basic_section_id'
	);

	add_settings_field(
		'wp_mathjax_input_type',
		__('Input Type', 'wp-mathjax'),
		'wp_mathjax_input_type_callback',
		'wp_mathjax_setting_group',
		'wp_mathjax_basic_section_id'
	);

	add_settings_field(
		'wp_mathjax_uninstall_option',
		__('Uninstall Option', 'wp-mathjax'),
		'wp_mathjax_uninstall_option_callback',
		'wp_mathjax_setting_group',
		'wp_mathjax_basic_section_id'
	);
}

function wp_mathjax_setting_section_callback()
{
	echo __('', 'wp-mathjax');
}

/**
 * Setting block - The source of Javascript files will be used from.
 *
 * @return void
 */
function wp_mathjax_js_source_callback()
{
	$option_js_source = get_option('wp_mathjax_js_source', 'local');
?>
	<div>
		<div>
			<input type="radio" name="wp_mathjax_js_source" id="wp-mathjax-js-library-source-1" value="local" <?php checked($option_js_source, 'local'); ?>>
			<label for="wp-mathjax-js-library-source-1">
				<?php echo __('Local', 'wp-mathjax'); ?> (<?php echo __('default', 'wp-mathjax'); ?>)
				<label>
		</div>
		<div>
			<input type="radio" name="wp_mathjax_js_source" id="wp-mathjax-js-library-source-1" value="cloudflare" <?php checked($option_js_source, 'cloudflare'); ?>>
			<label for="wp-mathjax-js-library-source-2">
				<?php echo __('cdn.cloudflare.com', 'wp-mathjax'); ?>
				<label>

		</div>
		<div>
			<input type="radio" name="wp_mathjax_js_source" id="wp-mathjax-js-library-source-2" <?php checked($option_js_source, 'jsdelivr'); ?> value="jsdelivr">
			<label for="wp-mathjax-js-library-source-3">
				<?php echo __('cdn.jsdelivr.net', 'wp-mathjax'); ?>
				<label>
		</div>
	</div>
	<p><em><?php echo __('This plugin loads MathJax.js locally by default, but if you would like to use it with a CDN service, here is the option.', 'wp-mathjax'); ?></em></p>
<?php
}

/**
 * Setting block - The source of Javascript files will be used from.
 *
 * @return void
 */
function wp_mathjax_input_type_callback()
{
	$option_input_type = get_option('wp_mathjax_input_type', 'TeX');
?>
	<div>
		<div>
			<input type="radio" name="wp_mathjax_input_type" id="wp-mathjax-js-input-type-1" value="TeX" <?php checked($option_input_type, 'TeX'); ?>>
			<label for="wp-mathjax-js-library-source-1">
				<?php echo __('TeX', 'wp-mathjax'); ?> (<?php echo __('default', 'wp-mathjax'); ?>)
				<label>
		</div>
		<div>
			<input type="radio" name="wp_mathjax_input_type" id="wp-mathjax-js-input-type-2" value="MathML" <?php checked($option_input_type, 'MathML'); ?>>
			<label for="wp-mathjax-js-library-source-2">
				<?php echo __('MathML', 'wp-mathjax'); ?>
				<label>
		</div>
		<div>
			<input type="radio" name="wp_mathjax_input_type" id="wp-mathjax-js-input-type-3" value="ASCIIMathML" <?php checked($option_input_type, 'ASCIIMathML'); ?>>
			<label for="wp-mathjax-js-library-source-3">
				<?php echo __('ASCIIMathML', 'wp-mathjax'); ?>
				<label>
		</div>
	</div>
<?php
}

/**
 * Setting block - The source of Javascript files will be used from.
 *
 * @return void
 */
function wp_mathjax_uninstall_option_callback()
{
	$option_uninstall_option = get_option('wp_mathjax_uninstall_option', 'yes');
?>
	<div>
		<div>
			<input type="radio" name="wp_mathjax_uninstall_option" id="wp-mathjax-uninstall-option-yes" value="yes" <?php checked($option_uninstall_option, 'yes'); ?>>
			<label for="wp-mathjax-uninstall-option-yes">
				<?php echo __('Remove WP Mathjax generated data.', 'wp-mathjax'); ?><br />
				<label>
		</div>
		<div>
			<input type="radio" name="wp_mathjax_uninstall_option" id="wp-mathjax-uninstall-option-yes" value="no" <?php checked($option_uninstall_option, 'no'); ?>>
			<label for="wp-mathjax-uninstall-option-yes">
				<?php echo __('Keep WP Mathjax generated data.', 'wp-mathjax'); ?>
				<label>
		</div>
	</div>
	<p><em><?php echo __('This option only works when you uninstall this plugin.', 'wp-mathjax'); ?></em></p>
<?php
}
