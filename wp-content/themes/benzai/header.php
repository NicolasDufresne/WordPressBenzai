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

<!--Loading page-->
<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<!--navbar-->
<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?= get_template_directory_uri() . '/assets/img/benzai_bouteille.svg'; ?>" alt="Logo" width="50px" height="50px">
            </a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <li><a href="<?php echo esc_url(home_url('login')); ?>">Connexion</a></li>
                <li><a href="http://localhost/WordPressBenzaiTheme/#about">À propos</a></li>
                <li><a href="http://localhost/WordPressBenzaiTheme/#benzai">Qu'est-ce que Benzai ?</a></li>
                <li><a href="http://localhost/WordPressBenzaiTheme/#gallery">Galerie</a></li>
                <li><a href="http://localhost/WordPressBenzaiTheme/#clients">Avis utilisateur</a></li>
                <li><a href="http://localhost/WordPressBenzaiTheme/#contact">Nous contacter</a></li>
            </ul>
        </div>
        <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
    </div>
</nav>

<!--progress bar-->
<div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
</div>
