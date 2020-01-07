<?php /* Template Name: Register */ ?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="register-form" method="post">
                <input type="text" placeholder="Nom d'utilisateur"/>
                <input type="email" placeholder="Adresse email"/>
                <input type="text" placeholder="Adresse postale">
                <input type="password" placeholder="Mot de passe"/>
                <input type="submit" value="S'incrire">
                <p class="message">Déjà inscrit ? <a
                            href="<?php echo esc_url(home_url('register')); ?>">Connectez-vous</a></p>
            </form>
        </div>
    </div>

<?php get_footer();
