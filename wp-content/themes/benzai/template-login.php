<?php /* Template Name: Login */

if (isset($_POST['submitted'])):

    $user_login = sanitize_user($_POST['login']);
    $user_password = esc_attr($_POST['password']);

    $exists_email = email_exists($user_login);
    $exists_username = username_exists($user_login);

    //User data
    $login_data = array(
        'user_login' => $user_login,
        'user_password' => $user_password,
    );

    //errors
    $errors = array();

    //Authenticates and logs a user in with ‘remember’ capability.
    $user_data = wp_signon($login_data, false);


    if (isset($_POST['submitted']) && isset($errors)):
        if (empty($user_login)):
            $errors['user_login'] = 'Veuillez renseigner un identifiant.';
        elseif ($exists_email || $exists_username):
        else :
            $errors['user_login'] = 'Cette identifiant n\'existe pas.';
        endif;
        if (empty($user_password)):
            $errors['user_password'] = 'Veuillez renseigner un mot de passe.';
        endif;
    endif;

    if (is_wp_error($user_data)) {
        echo '<script>alert("Erreur de connexion")</script>';
    } else {
        wp_clear_auth_cookie();
        do_action('wp_login', $user_data->ID);
        wp_set_current_user($user_data->ID);
        wp_set_auth_cookie($user_data->ID, true);
        $redirect_to = esc_url(home_url('/'));
        wp_safe_redirect($redirect_to);
        echo '<script>alert("Connecté")</script>';
        exit;
    }
endif;
?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="login-form" method="post">
                <span class="errors"><?= $errors['user_login'] ?></span>
                <input type="text" name="login" placeholder="Adresse mail ou nom utilisateur"/>
                <span class="errors"><?= $errors['user_password'] ?></span>
                <input type="password" name="password" placeholder="Mot de passe"/>
                <input type="submit" name="submitted" value="Connexion"/>
                <p class="message">Pas de compte ?
                    <a href="<?= esc_url(home_url('register')); ?>">Inscrivez-vous</a> <br/>
                    <a href="<?= esc_url(home_url('forgot-password')); ?>">Mot de passe oublié</a>
                </p>
            </form>
        </div>
    </div>

<?php get_footer();
