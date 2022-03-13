<?php 
/**
 * Template Name: account
 */

if (!is_user_logged_in()) {
    ob_start();
    $url = home_url("/login/");
    wp_redirect($url);
    exit;
};
?>

<?php get_header(); ?>
    <h1>Mes annonces</h1>
<?php
    wp_user_ads(get_current_user_id());
?>


<?php get_footer(); ?>
