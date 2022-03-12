<?php get_header(); ?>

<h1>EarthBnB</h1>

 <?php 
    if (have_posts()) : 
        while (have_posts()): 
            the_post();
?>

    <h3><?php the_title(); ?></h3>
    <small>Publié le <?php the_time('d F Y'); ?> à <?php the_time('G:i'); ?></small>
    <small><?php the_category(); ?></small>
    <p><?php the_content(); ?></p>


<?php endwhile; ?>
<?php endif;?>
<?php get_footer(); ?>