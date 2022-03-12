<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <script src="https://kit.fontawesome.com/a373cfe327.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<?php 
    is_front_page() ? $ebnbClass = array('earbnb-class', 'ebnb-class') : $ebnbClass = array('other-ebnb-class')
?>

    <body <?php body_class($ebnbClass); ?>>

        <header>
            <?php wp_nav_menu(array('theme_location'=>'header')); ?>
        </header>
