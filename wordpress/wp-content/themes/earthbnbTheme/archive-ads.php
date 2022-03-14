<?php 
/**
 * Template Name: planet-list
 */
?>

<?php get_header(); ?>

<form class="archive-ads-form" method="get" action="http://localhost:5555/filter-price/">
    <label class="archive-ads-form__label">Prix maximum :</label><br>
    <input class="archive-ads-form__input"type="range" name="price" min="10" max="300" step="10"><br>
    <label class="archive-ads-form__label"><em>min: 10€ max: 300€</em></label><br>
    <button class="archive-ads-form__btn" type="submit">Valider</button>
</form>

<?php if (have_posts()) : ?>
    <div class="ad__cards">
        <?php while (have_posts()): ?>
            <?php the_post(); ?>
            <div class="ad__card">
                <div class="ad__card-img">
                <?php the_post_thumbnail(); ?>
                </div>
                <li><a class="ad__card-link" href="<?php echo get_the_permalink(); ?>" rel="bookmark"> <?= get_the_title() ; ?></a></li>
                <p>
                    <i class="fa-solid fa-location-pin"></i> 
                    &nbsp;Distance : <?= get_post_meta(get_the_ID(), 'ad_localisation', true); ?> parsecs
                </p>
                <p>
                    <i class="fa-solid fa-money-bill"></i> 
                    &nbsp;Prix : <?= get_post_meta(get_the_ID(), 'ad_price', true); ?>€ /jour
                </p>
                <div class="ad__card-content">
                    <?= get_the_excerpt(); ?>
                </div>
                <br><div class="ad__card-details"><a href="<?php echo get_permalink(); ?>">Détails </a></div><br>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="pagination__container">
        <?= wpheticPaginate(); ?>
    </div>
<?php endif;?>

<?php get_footer(); ?>
