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
    <div class="ad__cards">
        <?php while (have_posts()): ?>
            <?php the_post(); ?>
            <div class="ad__card">
                <div class="ad__card-img">
                <?php the_post_thumbnail(); ?>
                </div>
                <li><a class="ad__card-link" href="<?php get_the_permalink(); ?>" rel="bookmark"> <?= get_the_title() ; ?></a></li>
                <p>Prix : <?= get_post_meta(get_the_ID(), 'ad_price', true); ?>€ /sem</p>
                <p>Distance : <?= get_post_meta(get_the_ID(), 'ad_localisation', true); ?> parsecs</p>
                <div class="ad__card-content">
                    <?= get_the_excerpt(); ?>
                </div>
                <br><div class="ad__card-details"><a href="<?php get_permalink(); ?>">Détails </a></div><br>
            </div>
        <?php endwhile; ?>
        <?= wpheticPaginate(); ?>
    </div>
<?php endif;?>

<?php get_footer(); ?>
