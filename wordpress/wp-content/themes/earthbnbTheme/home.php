<?php 
/**
 * Template Name: home
 */
?>

<?php get_header(); ?>


    <?php get_search_form() ?>

<div>
    <h2>Dernières annonces publiées</h2>
    <?php wp_last_adds(); ?>
</div>
<?php get_footer(); ?>