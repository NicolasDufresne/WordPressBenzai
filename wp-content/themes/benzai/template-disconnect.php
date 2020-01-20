<?php /* Template Name: Disconnect */

session_start();
$_SESSION = array();
session_destroy();
$redirect_to = esc_url(home_url('/'));
wp_safe_redirect($redirect_to);