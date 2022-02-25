<?php
/**
 * @package EarthBnBBanner
 */
/*
Plugin Name: EarthBnB Banner
Description: Une bannière pour EarthBnb
Version: 1.0.0
Author: EarthBnb
*/

# security
defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );

class BannerPlugin
{
    function activate() {
        // generate a CPT
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    }

    function uninstall() {
        // delete CPT
    }

}
if ( class_exists( 'BannerPluggin' ) ) {
    $bannerPluggin = new BannerPlugin();
}

//activation
register_activation_hook( __FILE__, array($bannerPluggin, 'activate') );

//deactivation
register_deactivation_hook( __FILE__, array($bannerPluggin, 'deactivate') );
