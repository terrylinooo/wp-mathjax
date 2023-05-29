<?php
/**
 * WP MathJax
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package wp-mathjax
 * @since 1.0.0
 * @version 1.0.1
 */

/**
 * Plugin Name: WP MathJax
 * Plugin URI:  https://github.com/terrylinooo/wp-mathjax
 * Description: WP MathJax displays mathematical notation in web browsers, using MathML, LaTeX and ASCIIMathML markup on WordPress by using MathJax.js.
 * Version:     1.0.1
 * Author:      Terry Lin
 * Author URI:  https://terryl.in/
 * License:     GPL 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: wp-mathjax
 * Domain Path: /languages
 */

/**
 * Any issues, or would like to request a feature, please visit.
 * https://github.com/terrylinooo/wp-mathjax/issues
 *
 * Welcome to contribute your code here:
 * https://github.com/terrylinooo/wp-mathjax
 *
 * Thanks for using WP MathJax!
 * Star it, fork it, share it if you like this plugin.
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * CONSTANTS
 *
 * MATHJAX_PLUGIN_NAME          : Plugin's name.
 * MATHJAX_PLUGIN_DIR           : The absolute path of the wp-mathjax plugin directory.
 * MATHJAX_PLUGIN_URL           : The URL of the wp-mathjax plugin directory.
 * MATHJAX_PLUGIN_PATH          : The absolute path of the wp-mathjax plugin launcher.
 * MATHJAX_PLUGIN_LANGUAGE_PACK : Translation Language pack.
 * MATHJAX_PLUGIN_VERSION       : wp-mathjax plugin version number
 * MATHJAX_PLUGIN_TEXT_DOMAIN   : wp-mathjaxplugin text domain
 *
 * Expected values:
 *
 * MATHJAX_PLUGIN_DIR           : {absolute_path}/wp-content/plugins/wp-mathjax/
 * MATHJAX_PLUGIN_URL           : {protocal}://{domain_name}/wp-content/plugins/wp-mathjax/
 * MATHJAX_PLUGIN_PATH          : {absolute_path}/wp-content/plugins/wp-mathjax/wp-mathjax.php
 * MATHJAX_PLUGIN_LANGUAGE_PACK : wp-mathjax/languages
 */

define( 'MATHJAX_PLUGIN_NAME', plugin_basename( __FILE__ ) );
define( 'MATHJAX_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MATHJAX_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MATHJAX_PLUGIN_PATH', __FILE__ );
define( 'MATHJAX_PLUGIN_LANGUAGE_PACK', dirname( plugin_basename( __FILE__ ) ) . '/languages' );
define( 'MATHJAX_PLUGIN_VERSION', '1.0.1' );
define( 'MATHJAX_PLUGIN_TEXT_DOMAIN', 'wp-mathjax' );
define( 'MATHJAX_JS_VERSION', '2.7.9' );

if ( ! function_exists( 'wp_doing_ajax' ) ) {
	/**
	 * Backward compatibility for WordPress version 4.7 and below.
	 *
	 * @return bool
	 */
	function wp_doing_ajax() {
		return false;
	}
}

if ( ! wp_doing_ajax() ) {

	load_plugin_textdomain( 'wp-mathjax', false, basename( dirname( __FILE__ ) ) . '/languages' );

	if ( is_admin() ) {
		require_once MATHJAX_PLUGIN_DIR . 'inc/admin/register.php';
		require_once MATHJAX_PLUGIN_DIR . 'inc/admin/setting.php';
		require_once MATHJAX_PLUGIN_DIR . 'inc/admin/menu.php';
	}

	// This is a global variable we use to identify where we want to use MathJax.js
	$load_mathjax_js = false;

	require_once MATHJAX_PLUGIN_DIR . 'inc/helper.php';
	require_once MATHJAX_PLUGIN_DIR . 'inc/block.php';
	require_once MATHJAX_PLUGIN_DIR . 'inc/shortcode.php';
	require_once MATHJAX_PLUGIN_DIR . 'inc/smart-loader.php';
	require_once MATHJAX_PLUGIN_DIR . 'inc/mathjax-js.php';
}
