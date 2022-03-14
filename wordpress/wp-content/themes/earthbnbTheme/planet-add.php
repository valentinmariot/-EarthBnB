<?php 
/**
 * Template Name: planet-add
 */
?>

<?php get_header(); ?>
<section class="planet-add__page">
<section class="planet-add__page-content-container">

<h1 class="planet-add__title">Louer un bien</h1>

<p class="planet-add__subtitle">Informations concernant votre bien</p> 

    <form class="planet-add__form" method="post">
        <section class="planet-add__field">
            <label class="planet-add__label" for="planet_name">Nom du lieu</label> 
            <input class="planet-add__input" type="text" name="planet_name" value="<?php echo $planet_name;?>">
        </section>
        <section class="planet-add__field">
            <label class="planet-add__label" for="ad_price">Coût</label>
            <input class="planet-add__input" type="text" name="ad_price" value="<?php echo $price;?>">
        </section>
        <section class="planet-add__field">
            <label class="planet-add__label" for="ad_distance">Distance</label> 
            <input class="planet-add__input" type="numeric" name="ad_distance" value="<?php echo $distance;?>">
        </section>
        <section class="planet-add__field">
            <label class="planet-add__label" for="ad_surface">Surface</label> 
            <input class="planet-add__input" type="numeric" name="ad_surface" value="<?php echo $surface;?>">
        </section>
        <section class="planet-add__field">
            <label class="planet-add__label" for="description">Description</label> 
            <textarea class="planet-add__input" name="description" rows="5" cols="40"><?php echo $description;?></textarea>
        </section>
        <!-- <input type="file" id='gallery' name="pictures[]" multiple> -->
        <section class="planet-add__field">
            <?php wp_dropdown_categories( 'show_option_none=Météo&tab_index=4&taxonomy=weather' ); ?>
            <?php wp_dropdown_categories( 'show_option_none=Activités&tab_index=4&taxonomy=price' ); ?>
        </section>
        <input type="hidden" name="post_type" value="ads" />
        <section class="planet-add__field">
            <button class="planet-add__btn" type="submit">Publier</button>
        </section>
    </form>
    </section>
</section>
<?php get_footer(); ?>
