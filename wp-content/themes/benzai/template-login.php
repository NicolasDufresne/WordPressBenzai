<?php /* Template Name: Login */ ?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="login-form" method="post">
                <input type="text" placeholder="Adresse mail ou nom utilisateur"/>
                <input type="password" placeholder="Mot de passe"/>
                <input type="submit" value="Connexion"/>
                <p class="message">Pas de compte ? <a
                            href="<?php echo esc_url(home_url('register')); ?>">Inscrivez-vous</a></p>
            </form>
        </div>
    </div>

<?php get_footer();
