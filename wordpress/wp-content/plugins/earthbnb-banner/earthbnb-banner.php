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
    function __construct() {
        add_action( 'init', [$this, 'banners_post_type'] );
    }

    function activate() {
        // generate a CPT
        // $this->banners_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    // function custom_post_type() {
    //     register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
    // }

    // register a custom post type called 'banner'
    function banners_post_type() {
        $labels = array(
            'name' => __( 'banners' ),
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
            "capability_type" => "post",
            'menu_positions' => 21,
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
        register_post_type( 'banners', $args );
    }
}

if ( class_exists( 'BannerPluggin' ) ) {
    $bannerPluggin = new BannerPlugin();
}

//activation
register_activation_hook( __FILE__, array($bannerPluggin, 'activate') );

//deactivation
register_deactivation_hook( __FILE__, array($bannerPluggin, 'deactivate') );

// function to show page banner using query of banner post type
function display_banner() {
 
    // start by setting up the query
    $query = new WP_Query( array(
        'post_type' => 'banner',
    ));
 
    // now check if the query has posts and if so, output their content in a banner-box div
    if ( $query->have_posts() ) { ?>
        <div class="banner-box">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'banner' ); ?>><?php the_content(); ?></div>
            <?php endwhile; ?>
        </div>
    <?php }
    wp_reset_postdata();
 
}