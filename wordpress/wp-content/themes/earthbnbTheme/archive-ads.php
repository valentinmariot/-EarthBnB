<?php 
/**
 * Template Name: planet-list
 */
?>

<?php get_header(); ?>
<!--
POUR LES FILTRES MAIS PAS DU TOUT FONCTIONNEL
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
 -->

<?php if (have_posts()) : ?>
    <div>
        <?php while (have_posts()): ?>
            <?php the_post(); ?>
            <div>
                <?php the_post_thumbnail(); ?>
                <li><a href="<?php get_the_permalink(); ?>" rel="bookmark"> <?= get_the_title() ; ?></a></li>
                <p>Prix : <?= get_post_meta(get_the_ID(), 'ad_price', true); ?>€</p>
                <p>Distance : <?= get_post_meta(get_the_ID(), 'ad_localisation', true); ?> parsecs</p>
                <?= get_the_excerpt(); ?>
                <br><a href="<?php get_permalink(); ?>">Détails </a><br><br>
            </div>
        <?php endwhile; ?>
        <?= wpheticPaginate(); ?>
    </div>
<?php endif;?>

<?php get_footer(); ?>
