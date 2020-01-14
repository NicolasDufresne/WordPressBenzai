<?php

if (!function_exists('benzai_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function benzai_setup()
    {

        load_theme_textdomain('benzai', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }
endif;
add_action('after_setup_theme', 'benzai_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function benzai_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('benzai_content_width', 640);
}

add_action('after_setup_theme', 'benzai_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function benzai_scripts()
{
    //CSS
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_style('animated', get_template_directory_uri() . '/assets/css/animate.css', array(), '1.0.1');
    wp_enqueue_style('animated');
    //JS
    //WOW.MIN.JS
    wp_register_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '1.0.1');
    wp_enqueue_script('wow');

}

add_action('wp_enqueue_scripts', 'benzai_scripts');

add_image_size('users', 125, 125, true);
add_image_size('img-gallery', 300, 300, true);

/**
 * Function is Logged.
 */
function isLogged($nomSession, $aSession, $bSession, $cSession, $dSession)
{
    if (!empty($_SESSION[$nomSession][$aSession])) {
        if (!empty($_SESSION[$nomSession][$bSession])) {
            if (!empty($_SESSION[$nomSession][$cSession])) {
                if (!empty($_SESSION[$nomSession][$dSession])) {
                    return TRUE;
                }
            }
        }
    }
    return FALSE;
}