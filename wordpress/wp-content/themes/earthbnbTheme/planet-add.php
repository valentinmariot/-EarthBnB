<?php 
/**
 * Template Name: planet-add
 */
?>

<?php get_header(); ?>

<h1>Louer un bien</h1>

<p>Formulaire pour louer son bien</p> 

<form method="post">
<label for="planet_name">Nom du lieu:</label> <input type="text" name="planet_name" value="<?php echo $planet_name;?>">
<label for="price">Coût:</label> <input type="text" name="price" value="<?php echo $price;?>">
<label for="distance">Distance:</label> <input type="number" name="distance" value="<?php echo $distance;?>">
<label for="description">Description:</label> <textarea name="description" rows="5" cols="40"><?php echo $description;?></textarea>
<input type="hidden" name="post_type" value="ads" />
<button type="submit">Publier</button>
</form>

<?php get_footer(); ?>
