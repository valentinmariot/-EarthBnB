<?php 
/**
 * Template Name: home
 */
?>

<?php get_header(); ?>

<h1>Home template</h1>

 <?php 
    if (have_posts()) : 
        while (have_posts()): 
            the_post();
?>


<?php endwhile; ?>
<?php endif;?>
<?php get_footer(); ?>