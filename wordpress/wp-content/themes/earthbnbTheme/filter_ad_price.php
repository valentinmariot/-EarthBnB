<?php
/**
 * Template Name: filter price
 */

get_header(); ?>
<?php
    $price = $_GET["price"];
    wp_ad_filter_price($price);
?>


<?php get_footer(); ?>
