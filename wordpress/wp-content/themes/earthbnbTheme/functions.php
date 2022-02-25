<?php

#theme setup
add_action('after_setup_theme', 'EarthbnbTheme');
function EarthbnbTheme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Le menu du header mec');
}

add_action('after_setup_theme', 'remove_Admin_bar');

#login management
function wpdocs_my_login_redirect( $url, $request, $user ) {
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'administrator' || 'manage_ad') ) {
            $url = admin_url();
        } else {
            $url = home_url( '/account/' );
        }
    }
    return $url;
}

add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 10, 3 );

function remove_admin_bar(){
    if (!current_user_can('manage_options') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}