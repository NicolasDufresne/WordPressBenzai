<?php /* Template Name: Disconnect */

    wp_destroy_current_session();
    wp_clear_auth_cookie();
    wp_set_current_user(0);

    /**
     * Fires after a user is logged-out.
     *
     * @since 1.5.0
     */
    do_action('wp_logout');


$redirect_to = esc_url(home_url('/'));
wp_safe_redirect($redirect_to);