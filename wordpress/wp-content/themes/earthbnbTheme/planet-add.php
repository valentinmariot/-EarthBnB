<?php 
/**
 * Template Name: planet-add
 */
?>

<?php get_header(); ?>

<h1>Louer un bien</h1>

<p>Formulaire pour louer son bien</p> 

<form class="planet-add-form" method="post">
<section class="planet-add-form__field"><label class="planet-add-form__label" for="planet_name">Nom du lieu:</label> <input class="planet-add-form__input" type="text" name="planet_name" value="<?php echo $planet_name;?>"></section>
<section class="planet-add-form__field"><label class="planet-add-form__label" for="ad_price">Coût:</label> <input class="planet-add-form__input" type="text" name="ad_price" value="<?php echo $price;?>"></section>
<section class="planet-add-form__field"><label class="planet-add-form__label" for="ad_distance">Distance:</label> <input class="planet-add-form__input" type="number" name="ad_distance" value="<?php echo $distance;?>"></section>
<section class="planet-add-form__field"><label class="planet-add-form__label" for="ad_surface">Surface:</label> <input class="planet-add-form__input" type="number" name="ad_surface" value="<?php echo $surface;?>"></section>
<section class="planet-add-form__field"><label class="planet-add-form__label" for="description">Description:</label> <textarea name="description" rows="5" cols="40"><?php echo $description;?></textarea></section>
<!-- <input type="file" id='gallery' name="pictures[]" multiple> -->
<section class="planet-add-form__field">
    <?php wp_dropdown_categories( 'show_option_none=Météo&tab_index=4&taxonomy=weather' ); ?>
    <?php wp_dropdown_categories( 'show_option_none=Activités&tab_index=4&taxonomy=price' ); ?>
</section>
<input type="hidden" name="post_type" value="ads" />
<section class="planet-add-form__field"><button type="submit">Publier</button></section>
</form>

<?php get_footer(); ?>
