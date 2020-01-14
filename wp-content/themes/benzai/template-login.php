<?php /* Template Name: Login */ ?>

<?php
if (!empty($_POST['submitted'])) {
    $creds = array();
    $creds['user_login'] = $_POST['login'];
    $creds['user_password'] = $_POST['password'];
    $creds['remember'] = true;

    $user = wp_signon( $creds, false );

    if ( is_wp_error($user) ) {
        echo $user->get_error_message();
    }
    print_r($_SESSION);
}
?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="login-form" method="post">
                <input type="text" name="login" placeholder="Adresse mail ou nom utilisateur"/>
                <input type="password" name="password" placeholder="Mot de passe"/>
                <input type="submit" name="submitted" value="Connexion"/>
                <p class="message">Pas de compte ? <a
                            href="<?php echo esc_url(home_url('register')); ?>">Inscrivez-vous</a></p>
            </form>
        </div>
    </div>

<?php get_footer();
