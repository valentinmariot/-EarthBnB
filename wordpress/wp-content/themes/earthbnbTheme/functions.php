<?php

add_action('after_setup_theme', 'EarthbnbTheme');
function EarthbnbTheme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Le menu du header mec');
}