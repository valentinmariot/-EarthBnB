<?php
/**
 * Template Name: login
 */

/*if (is_user_logged_in()) {
    ob_start();
    nocache_headers();
    $url = home_url("/mon-compte/");
    wp_redirect($url);
    exit;
}else{*/
    get_header(); ?>
    <h2 class="form_title">Connexion</h2>
    <?php echo wp_login_form();
//};

get_footer();
