<?php

function earthbnb_script_enqueue() {
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/earthbnb.css', array(), '1.0.0', 'all');
    wp_enqueue_style('customsjs', get_template_directory_uri() . '/js/earthbnb.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'earthbnb_script_enqueue');

add_action('after_setup_theme', 'earthbnb_theme_setup');
function earthbnb_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Header navigation');
    register_nav_menu('footer', 'Footer navigation');
}



// add_action('wp_enqueue_scripts', 'wpheticBootstrap');
// function wpheticBootstrap()
// {
//     wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
//     wp_enqueue_script("bootstrap_js", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", [], false, true);
// }


                                     
                                     
                                     
                                     
                                     