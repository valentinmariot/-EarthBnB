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
    <h2 id="account-title">Mes annonces</h2>
    <div class="container-ads">
        <?php wp_user_ads(get_current_user_id());?>
    </div>


<?php get_footer(); ?>
