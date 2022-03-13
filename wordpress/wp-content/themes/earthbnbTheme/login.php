<?php
/**
 * Template Name: login
 */

if (is_user_logged_in()) {
    ob_start();
    nocache_headers();
    $url = home_url("/mon-compte/");
    wp_redirect($url);
    exit;
}else{
    get_header();
    echo wp_login_form();
};

get_footer();
