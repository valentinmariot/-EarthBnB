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
        $this->banners_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    // register a custom post type called 'banner'
    function banners_post_type() {
        $labels = array(
            'name' => __( 'Banners' ),
            'singular_name' => __( 'banner' ),
            'add_new' => __( 'New banner' ),
            'add_new_item' => __( 'Add New banner' ),
            'edit_item' => __( 'Edit banner' ),
            'new_item' => __( 'New banner' ),
            'view_item' => __( 'View banner' ),
            'search_items' => __( 'Search banners' ),
            'not_found' =>  __( 'No banners Found' ),
            'not_found_in_trash' => __( 'No banners found in Trash' ),
        );
        $args = array(
            'labels' => $labels,
            'has_archive' => true,
            'public' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'custom-fields',
                'thumbnail',
                'page-attributes'
            ),
            'taxonomies' => array( 'post_tag', 'category'),
        );
        register_post_type( 'banner', $args );
    }
    }

}
if ( class_exists( 'BannerPluggin' ) ) {
    $bannerPluggin = new BannerPlugin();
}

//activation
register_activation_hook( __FILE__, array($bannerPluggin, 'activate') );

//deactivation
register_deactivation_hook( __FILE__, array($bannerPluggin, 'deactivate') );
