<?php 
/**
 * Template Name: planet-description
 */
?>

<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>
    <div>
        <img src="<?php the_post_thumbnail_url() ; ?> alt="image annonce">
    </div>
    <div>
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
        <p>Distance : <?php get_post_meta(get_the_ID(), 'ad_localisation', true); ?> parsecs</p>
        <p>Superficie : <?php get_post_meta(get_the_ID(), 'ad_surface', true); ?></p>
        <p>Prix : <?php get_post_meta(get_the_ID(), 'ad_price', true); ?>€</p>
        <a href="<?php the_permalink(); ?>"> Acheter </a>
    </div>
<?php endwhile; ?>

<?php
if (comments_open() || get_comments_number()) {
    comments_template();
}
?>
                                           
<?php get_footer(); ?>
