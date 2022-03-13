<?php 
/**
 * Template Name: planet-list
 */
?>

<?php get_header(); ?>
    <span>Distance</span>
    <ul>
        <li><a href="#">+ de 20 parsecs</a></li>
        <li><a href="#">- de 20 parsecs</a></li>
    </ul>
    <span>Météo</span>
    <ul>
        <li><a href="#">+ de 20 parsecs</a></li>
        <li><a href="#">- de 20 parsecs</a></li>
    </ul>
    <span>Prix</span>
    <ul>
        <li><a href="#">- de 100 euros</a></li>
        <li><a href="#">- de 50 euros</a></li>
    </ul>

<?php
    echo wp_list_categories();
?>

<?php wp_adds(); ?>

<!-- J'ai plutôt utilisé une query au final mais je voulais verifier avec vous. Je me demande par exemple s'il ne faut pas rajouter le if (have_posts()) avant d'appeler la query
<?php if (have_posts()) : ?>
    <div>
        <?php while (have_posts()): ?>
            <?php the_post(); ?>
            <div>
                <img src="<?php the_post_thumbnail_url() ; ?> alt="image annonce">
                <div>
                    <h3><?php the_title(); ?></h3>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif;?> -->

<p>Manque la pagination </p>

<?php get_footer(); ?>