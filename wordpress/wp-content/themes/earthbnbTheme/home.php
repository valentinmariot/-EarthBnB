<?php 
/**
 * Template Name: home
 */
?>

<?php get_header(); ?>


<div>
    <h1>Quelle sera votre prochaine destination ?</h1>
    <?php get_search_form() ?>
    <a href="/liste-annonces/">Je suis flexible</a>
</div>

<div>
    <h2>Dernières annonces publiées</h2>
    <?php wp_last_adds(); ?>
</div>
<?php get_footer(); ?>