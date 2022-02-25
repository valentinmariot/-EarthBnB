<?php 
/**
 * Template Name: planet-add
 */
?>

<?php get_header(); ?>

<h1>Louer un bien</h1>

<?php while(have_posts()) : the_post(); ?>
    <div>
        <img src="<?php the_post_thumbnail_url() ; ?> alt="image annonce">
    </div>
    <div>
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
        <p>Localisation : <?php get_post_meta(get_the_ID(), 'ad_localisation', true); ?>€</p>
        <p>Superficie : <?php get_post_meta(get_the_ID(), 'ad_surface', true); ?>€</p>
        <p>Prix : <?php get_post_meta(get_the_ID(), 'ad_price', true); ?>€</p>
        <a href="<?php the_permalink(); ?>"> Acheter </a>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>