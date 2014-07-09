<?php
/**
 * Plugin Name: Thumb Links
 * Plugin URI: https://github.com/billerickson/Core-Functionality
 * Description: A Custom Post Type plugin. Thanks to Bill Erickson for the boilerplate.
 * Version: 1.0
 * Author: Matt Cromwell
 * Author URI: http://mattcromwell.com
 *
 */

//definitions
define( 'TL_PATH', plugin_dir_path( __FILE__ ));
define( 'TL_URL', plugins_url( '/' , __FILE__ ));

 
// Post Types
require_once( TL_PATH . 'lib/functions/post-types.php' );

// Metaboxes
if (is_admin()){
require_once( TL_PATH . 'lib/functions/metaboxes.php' );
}

// Shortcodes
require_once( TL_PATH . 'lib/functions/shortcodes.php' );

//extend the FooBase class for Thumb Links
if ( !class_exists( 'thumb_links' ) ) {

    //include FooBase
    require_once TL_PATH . 'includes/foopluginbase/bootstrapper.php';

    /**
     * FooGallery_Plugin class.
     *
     * @package FooGallery
     * @author  Brad Vincent <brad@fooplugins.com>
     */
class thumb_links extends Foo_Plugin_Base_v2_1 {   
    
    function __construct() {
            $this->init( __FILE__, 'thumb_links', '1.0', 'Thumb Links' );
    
        if (is_admin()){
            add_filter('thumb_links-admin_settings', array($this, 'create_settings_tl')); 
            }
    }
    
    
    function create_settings_tl() {
        
    }
}
}

new thumb_links();