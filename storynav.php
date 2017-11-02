<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.2.1
 * @package           Story_Navigation
 *
 * @wordpress-plugin
 * Plugin Name:       Story Navigation
 * Plugin URI:        https://folsomcreative.com/
 * GitHub Plugin URI: https://github.com/FolsomCreative/storynav
 * Description:       This plugin enables a story navigation to be added to pages
 * Version:           1.2.1
 * Author:            Folsom Creative, Inc.
 * Author URI:        https://folsomcreative.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       story-nav
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'STORY_NAV_VERSION', '1.2.1' );

function get_hex_to_rgb($color, $opacity = false) {
		$default = 'rgb(0,0,0)';

		if (empty($color))
				return $default;

		if ($color[0] == '#')
				$color = substr($color, 1);

		if (strlen($color) == 6)
				$hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);

		elseif (strlen($color) == 3)
				$hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);

		else
				return $default;

		$rgb = array_map('hexdec', $hex);

		if ($opacity) {
				if (abs($opacity) > 1)
						$opacity = 1.0;

				$output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
		} else {
				$output = 'rgb(' . implode(",", $rgb) . ')';
		}
		return $output;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-story-nav-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-story-nav-activator.php';
	Story_Nav_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-story-nav-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-story-nav-deactivator.php';
	Story_Nav_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-story-nav.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Story_Nav();
	$plugin->run();

}
run_plugin_name();
