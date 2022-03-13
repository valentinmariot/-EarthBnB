<?php 
/**
 * Template Name: home
 */
?>

<?php get_header(); ?>


<?php get_search_form() ?>

<div class="home-last">
    <div class="home-last__container-title">
        <h2 class="home-last__title">Dernières annonces publiées</h2>
    </div>
    <div class="home-last__container-card">
    <?php wp_last_adds(); ?>
    </div>
</div>

<?php get_footer(); ?>