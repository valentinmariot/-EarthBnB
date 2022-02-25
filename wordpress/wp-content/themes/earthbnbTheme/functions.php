<?php
#theme setup
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

#login management
function wpdocs_my_login_redirect( $url, $request, $user ) {
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'administrator' || 'ad_manager') ) {
            $url = admin_url();
        } else {
            $url = home_url( '/account/' );
        }
    }
    return $url;
}
add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 10, 3 );

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
    if (!current_user_can('manage_options') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}

function register_my_cpt_ad()
{
    $labels = [
        "name" => __("Ads", "Post Type General Name"),
        "singular_name" => ("Ad", "Post Type General Name"),
        "search_items" => __("Rechercher une annonce"),
        "all_items" => __("Toutes les annonces"),
        "add_new_item" => __("Ajouter une annonce"),
        "add_new" => __("Ajouter"),
        "edit_item" => __("Modifier l'annonce"),
        "update_items" => __("Modifier l'annonce"),
        "not_found" => __("Non trouvée"),
    ];

    $args = [
        "label" => __("Ads"),
        "labels" => $labels,
        "description" => "Toutes les annonces intergalactiques",
        "public" => true,
        "show_in_rest" => true,
        "menu_icon" => "dashicons-align-left",
        "has_archive" => true,
        "delete_with_user" => false,
        "capability_type" => "post",
        "capabilities" => [
            'read_post' => 'manage_ads',
            'delete_post' => 'manage_ads',
            'edit_post' => 'manage_ads'
        ],
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "ad", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "excerpt", "thumbnail", "author", "custom-fields"],
        "show_in_graphql" => false,
    ];

    register_post_type("ads", $args);

    $labelsTaxo = [
        'name' => 'Styles',
        'singular_name' => 'Style'
    ];

    $argsTaxo = [
        'labels' => $labelsTaxo,
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_admin_column' => true
    ];

    register_taxonomy('style', ['post'], $argsTaxo);
}

add_action('init', 'register_my_cpt_ad');

#profile management

add_action('after_switch_theme', function (){
    $admin = get_role('administrator');
    $admin->add_cap('manage_ads');

    add_role('ad_manager', 'Ad Manager', [
        'read' => true,
        'manage_ads' => true
    ]);
});

add_action('switch_theme', function (){
    $admin = get_role('administrator');
    $admin->remove_cap('manage_ads');
    remove_role('ad_manager');
});
