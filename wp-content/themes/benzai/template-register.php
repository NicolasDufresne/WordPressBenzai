<?php /* Template Name: Register */ ?>

<?php
$username = $_POST['username'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$password = $_POST['password'];
$user_data = [
    'user_login'        => $username,
    'user_email'        => $email,
    'user_description'  => $adresse,
    'user_pass'         => $password,
];

$user_id = wp_insert_user($user_data);

// success
if (!is_wp_error($user_id)) {
    echo 'User created: ' . $user_id;
}
?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="register-form" method="post">
                <input type="text" name="username" placeholder="Nom d'utilisateur"/>
                <input type="email" name="email" placeholder="Adresse email"/>
                <input type="text" name="adresse" placeholder="Adresse postale">
                <input type="password" name="password" placeholder="Mot de passe"/>
                <input type="submit" value="S'incrire">
                <p class="message">Déjà inscrit ? <a
                            href="<?php echo esc_url(home_url('register')); ?>">Connectez-vous</a></p>
            </form>
        </div>
    </div>

<?php get_footer();
