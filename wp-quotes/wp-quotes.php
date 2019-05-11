<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cornbread.me
 * @since             0.0.1
 * @package           Wp_Quotes
 *
 * @wordpress-plugin
 * Plugin Name:       Random Quote
 * Plugin URI:        https://github.com/cornbreadheadman/WP-Quotes
 * Description:       This plugin displays a random quote from a mySQL server.
 * Version:           0.0.1
 * Author:            Cornbread
 * Author URI:        https://cornbread.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-quotes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_QUOTES_VERSION', '0.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-quotes-activator.php
 */
function activate_wp_quotes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-quotes-activator.php';
	Wp_Quotes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-quotes-deactivator.php
 */
function deactivate_wp_quotes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-quotes-deactivator.php';
	Wp_Quotes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_quotes' );
register_deactivation_hook( __FILE__, 'deactivate_wp_quotes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-quotes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_quotes() {

	$plugin = new Wp_Quotes();
	$plugin->run();

}
run_wp_quotes();
