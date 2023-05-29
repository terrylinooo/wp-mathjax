<?php
/**
 * WP MathJax - Setting page.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'admin_init', 'wp_mathjax_settings' );

/**
 * Add settings.
 *
 * @return void
 */
function wp_mathjax_settings() {

	register_setting( 'wp_mathjax_setting_group', 'wp_mathjax_js_source' );
	register_setting( 'wp_mathjax_setting_group', 'wp_mathjax_input_type' );
	register_setting( 'wp_mathjax_setting_group', 'wp_mathjax_uninstall_option' );

	add_settings_section(
		'wp_mathjax_basic_section_id',
		__( 'Basic', 'wp-mathjax' ),
		'wp_mathjax_setting_section_callback',
		'wp_mathjax_setting_group'
	);

	add_settings_field(
		'wp_mathjax_js_source',
		__( 'File Host', 'wp-mathjax' ),
		'wp_mathjax_js_source_callback',
		'wp_mathjax_setting_group',
		'wp_mathjax_basic_section_id'
	);

	add_settings_field(
		'wp_mathjax_input_type',
		__( 'Input Type', 'wp-mathjax' ),
		'wp_mathjax_input_type_callback',
		'wp_mathjax_setting_group',
		'wp_mathjax_basic_section_id'
	);

	add_settings_field(
		'wp_mathjax_uninstall_option',
		__( 'Uninstall Option', 'wp-mathjax' ),
		'wp_mathjax_uninstall_option_callback',
		'wp_mathjax_setting_group',
		'wp_mathjax_basic_section_id'
	);
}

/**
 * Setting block - Uninstall option.
 *
 * @return void
 */
function wp_mathjax_setting_section_callback() {
	echo '';
}

/**
 * Setting block - The source of Javascript files will be used from.
 *
 * @return void
 */
function wp_mathjax_js_source_callback() {
	$option_js_source = get_option( 'wp_mathjax_js_source', 'local' );
	$data             = array(
		'option_js_source' => $option_js_source,
	);

	echo wp_mathjax_load_view( 'admin/section-js-source', $data );
}

/**
 * Setting block - The source of Javascript files will be used from.
 *
 * @return void
 */
function wp_mathjax_input_type_callback() {
	$option_input_type = get_option( 'wp_mathjax_input_type', 'TeX' );
	$data              = array(
		'option_input_type' => $option_input_type,
	);

	echo wp_mathjax_load_view( 'admin/section-input-type', $data );
}

/**
 * Setting block - The source of Javascript files will be used from.
 *
 * @return void
 */
function wp_mathjax_uninstall_option_callback() {
	$option_uninstall_option = get_option( 'wp_mathjax_uninstall_option', 'yes' );
	$data                    = array(
		'option_uninstall_option' => $option_uninstall_option,
	);

	echo wp_mathjax_load_view( 'admin/section-uninstall', $data );
}
