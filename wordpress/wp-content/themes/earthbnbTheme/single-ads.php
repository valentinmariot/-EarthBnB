<?php 
/**
 * Template Name: planet-description
 */
?>

<?php get_header(); ?>
<div class="single-ad">
    <?php while(have_posts()) : the_post(); ?>
    <div class="single-ad__container">
        <div class="single-ad__container-head">
            <div class="single-ad__container-head-left">
                <div class="single-ad__container-head-left-title">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class="single-ad__container-head-left-distance">
                    <p>
                        <i class="fa-solid fa-location-pin"></i> 
                        Distance : <?php echo get_post_meta(get_the_ID(), 'ad_localisation', true); ?> parsecs
                    </p>
                </div>
            </div>
            <div class="single-ad__container-head-thumbnail">
                <img src="<?php the_post_thumbnail_url() ; ?>" alt="image annonce">
            </div>
        </div>
        <div class="single-ad__container-content">
            <p><?php the_content(); ?></p>
            <div class="single-ad_container-content-bottom">
                <div class="single-ad__container-informations">
                    <p>
                        <i class="fa-solid fa-earth-asia"></i> 
                        Superficie : <?php echo get_post_meta(get_the_ID(), 'ad_surface', true); ?> Mkm
                    </p>
                    <p>
                        <i class="fa-solid fa-money-bill"></i> 
                        Prix : <?php echo get_post_meta(get_the_ID(), 'ad_price', true); ?>€ /jour
                    </p>
                </div>

                <div class="single-ad__container-location">
                    <a href="<?php the_permalink(); ?>">Louer</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
?>

<?php get_footer(); ?>