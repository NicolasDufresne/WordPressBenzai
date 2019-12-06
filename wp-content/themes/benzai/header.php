<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeWordPress
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benzai</title>
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">

    <!--Jquery pour la navbar-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <?php wp_head(); ?>
    <script>new WOW().init();</script>

</head>

<body <?php body_class(); ?>>

<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="#">Benzai</a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <!--                <li><a href="#">Accueil</a></li>-->
                <!--                <li><a href="#">Map</a></li>-->
            </ul>
        </div>
        <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
    </div>
</nav>