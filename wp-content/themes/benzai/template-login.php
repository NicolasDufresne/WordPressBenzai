<?php /* Template Name: Login */ ?>

<?php

if (isset($_POST['submitted'])):
    $login_data = array();
    $login_data['user_login'] = sanitize_user($_POST['login']);
    $login_data['user_password'] = esc_attr($_POST['password']);
    $user_data = wp_signon($login_data, false);
    if (is_wp_error($user_data)) {
        echo '<script>alert("T\'es pas co")</script>';
    } else {
        wp_clear_auth_cookie();
        do_action('wp_login', $user_data->ID);
        wp_set_current_user($user_data->ID);
        wp_set_auth_cookie($user_data->ID, true);
        $redirect_to = esc_url(home_url('/'));
        wp_safe_redirect($redirect_to);
        echo '<script>alert("T\'es co")</script>';
        exit;
    }
endif;
?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="login-form" method="post">
                <input type="text" name="login" placeholder="Adresse mail ou nom utilisateur"/>
                <input type="password" name="password" placeholder="Mot de passe"/>
                <input type="submit" name="submitted" value="Connexion"/>
                <p class="message">Pas de compte ?
                    <a href="<?php echo esc_url(home_url('register')); ?>">Inscrivez-vous</a>
                </p>
            </form>
        </div>
    </div>

<?php get_footer();
