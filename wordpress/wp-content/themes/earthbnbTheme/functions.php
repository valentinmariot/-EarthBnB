<?php

#theme setup
function earthbnb_script_enqueue() {
    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], '1.0.0', 'all');
    wp_enqueue_style('style');

    wp_enqueue_script(('jquery'));

    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('app');
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

#Add CPT
function register_my_cpt_ad()
{
    $labels = [
        "name" => __("Ads", "Post Type General Name"),
        "singular_name" => __("Ad", "Post Type General Name"),
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
        "supports" => ["title", "editor", "excerpt","comments", "thumbnail", "author", "custom-fields"],
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

#Add taxonomies
add_action('init', 'add_taxonomies');
function add_taxonomies(){
    #landscape taxonomy
    $labels_landscape = array(
        'name' => __('Paysages', 'taxonomy general name'),
        'singular_name' =>__('Paysage', 'taxonomy singular name'),
        'search_items' => __('Chercher un paysage'),
        'all_items' => __('Tous les paysages'),
        'edit_item' => __('Mettre à jour le paysahe'),
        'update_item' => __('Mettre à jour le paysage'),
        'add_new_item' => __('Ajouter'),
        'new_item_name' => __('Ajouter'),
        'separate_items_with_commas' => __('Séparer les valeurs par une virgule'),
        'menu_name' => __('Paysage'),
    );

    $args_landscape = array(
        'hierarchical' => true,
        'labels' =>  $labels_landscape,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('landscape','ads', $args_landscape);

    #weather taxonomy
    $labels_weather = array(
        'name' => __('Meteo', 'taxonomy general name'),
        'singular_name' =>__('Meteo', 'taxonomy singular name'),
        'search_items' => __('Chercher une meteo'),
        'all_items' => __('Toutes les meteo'),
        'edit_item' => __('Mettre à jour la meteo'),
        'update_item' => __('Mettre à jour la meteo'),
        'add_new_item' => __('Ajouter'),
        'new_item_name' => __('Ajouter'),
        'separate_items_with_commas' => __('Séparer les valeurs par une virgule'),
        'menu_name' => __('Meteo'),
    );

    $args_weather = array(
        'hierarchical' => true,
        'labels' =>  $labels_weather,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('weather','ads', $args_weather);

    #activity taxonomy
    $labels_activity = array(
        'name' => __('Activités', 'taxonomy general name'),
        'singular_name' =>__('Activité', 'taxonomy singular name'),
        'search_items' => __('Chercher une activité'),
        'all_items' => __('Tous les activités'),
        'edit_item' => __('Mettre à jour activité'),
        'update_item' => __('Mettre à jour activité'),
        'add_new_item' => __('Ajouter'),
        'new_item_name' => __('Ajouter'),
        'separate_items_with_commas' => __('Séparer les valeurs par une virgule'),
        'menu_name' => __('Activité'),
    );

    $args_activity = array(
        'hierarchical' => true,
        'labels' =>  $labels_activity,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('price','ads', $args_activity);
}

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

#display last 3 adds
function wp_last_adds() {
    $args = array(
        'posts_per_page' => '3',
        'post_type' => 'ads',
        'post_status' => 'publish',
        'orderby' => 'date',
    );

    $query = new WP_Query($args);
    while($query -> have_posts()) :
        $query->the_post();
        echo '<div class="home-last__row">';
        echo '<div class="home-last__column">';
        echo '<div class="home-last__card">';
        echo '<div class="home-last__img">';
        the_post_thumbnail();
        echo '</div>';
        echo '<li><a class="home-last__link" href="'.get_the_permalink().'" rel="bookmark">'.get_the_title().'</a></li>';
        echo '<p class="home-last__price">Prix : '.get_post_meta(get_the_ID(), 'ad_price', true).'€ /jour</p>';
        echo get_the_excerpt();
        echo '<div class="home-last__details">';
        echo '<br><a class="home-last__details" href="'.get_permalink().'">Plus de détails </a><br><br>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    endwhile;
    wp_reset_postdata();
};

#display user articles
function wp_user_ads($user_id) {
    $args = array(
        'post_type' => 'ads',
        'post_status' => 'publish, pending',
        "author" => $user_id
    );

    $query = new WP_Query($args);
    while($query -> have_posts()) :
        $query->the_post();
        echo '<li>'.get_the_title().'</li>';
        the_post_thumbnail();
        if(get_post_status == "pending"){
            echo '<br><a href="'.home_url("/creer-son-annonce/").'">Modifier</a><br>';
        }
        $post_id= get_the_ID();
        $my_post = array(
            'ID' => $post_id,
            'post_status'   => 'draft',
        );
        # commenter car archive tous les posts sur la page même si on ne clique pas sur le bouton
        #echo '<a href="'. wp_update_post( $my_post ).'">Archiver</button><br>';
    endwhile;
    wp_reset_postdata();
};

#filter add price
function wp_ad_filter_price($price) {
    $args = array(
        'meta_key'     => 'ad_price',
        'meta_value'   => $price,
        'meta_compare' => '<=',
        'post_type'    => 'ads'
    );

    $query = new WP_Query($args);
    echo '<div class="ad__cards">';
    while($query -> have_posts()) :
        $query->the_post();
        echo '<div class="ad__card">';
        echo '<div class="ad__card-img">';
        the_post_thumbnail();
        echo '</div>';
        echo '<li><a class="ad__card-link" href="'.get_the_permalink().'" rel="bookmark">'.get_the_title().'</a></li>';
        echo '<p><i class="fa-solid fa-money-bill"></i> Prix :'.get_post_meta(get_the_ID(), 'ad_price', true).'€ /sem</p>';
        echo '<p>Distance :'.get_post_meta(get_the_ID(), 'ad_localisation', true). 'parsecs</p>';
        echo '<div class="ad__card-content">';
        echo get_the_excerpt();
        echo '</div>';
        echo '<br><div class="ad__card-details"><a href="'.get_permalink().'">Détails </a></div><br>';
        echo '</div>';
    endwhile;
    echo '</div>';
    wpheticPaginate();
    wp_reset_postdata();
};

#display all adds
function wpheticPaginate() {
    $pages = paginate_links(['type' => 'array']);
    if (!$pages) {
        return null;
    }

    ob_start();
    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current');
        $liClass = $active ? 'page-item active' : 'page-item';
        $page = str_replace('page-numbers', 'page-link', $page);

        echo sprintf('<li class="%s">%s</li>', $liClass, $page);
    }
    echo '</ul></nav>';

    return ob_get_clean();
};

function post_new_ad(){    
    // create post object with the form values from planet-add.php
    $new_ad = array(
    'post_title'    => $_POST['planet_name'],
    'post_content' => $_POST['description'],
    'post_status'   => 'pending',
    'post_type' => $_POST['post_type'],
    'post_author'=> get_current_user_id(),
    'comment_status' => 'closed',
    'meta_input' => array(
        'ad_price' => $_POST['ad_price'],
        'ad_surface' => $_POST['ad_surface'],
        'ad_distance' => $_POST['ad_distance'],
    )
    );
    // insert the post into the database
    $ad_id = wp_insert_post( $new_ad);
    if ( $ad_id ) {
        wp_redirect( "localhost:5555" );
        exit;
    }
}
post_new_ad();

function wpb_comment_reply_text( $link ) {
    $link = str_replace( 'Répondre', '', $link );
    return $link;
    }
add_filter( 'comment_reply_link', 'wpb_comment_reply_text' );
