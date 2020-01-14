<?php /* Template Name: Register */ ?>

<?php
if (isset($_POST['submitted'])):
    //Strip HTML and PHP tags from a string
    $user_login = strip_tags(trim($_POST['login']));
    $user_email = filter_var(strip_tags(trim($_POST['email'])), FILTER_VALIDATE_EMAIL);
    $user_password = strip_tags(trim($_POST['password']));
    $user_confirmed_password = strip_tags(trim($_POST['passwordCheck']));

    echo $user_login . $user_email . $user_password . $user_confirmed_password;

    //Password strength validation
    $uppercase = preg_match('@[A-Z]@', $user_password);
    $lowercase = preg_match('@[a-z]@', $user_password);
    $number = preg_match('@[0-9]@', $user_password);

    $errors = array();

    //User data
    $user_data = array(
        'user_login' => $user_login,
        'user_email' => $user_email,
        'user_password' => $user_password,
        'user_check' => $user_confirmed_password,
    );

    if (isset($_POST['submitted']) && isset($errors)):

        //Check login
        if (empty($user_login)):
            $errors['user_login'] = 'Veuillez renseigner un identifiant';
        elseif (strlen($user_login) < 3):
            $errors['user_login'] = 'Identifiant trop court';
        elseif (strlen($user_login) > 10):
            $errors['user_login'] = 'Identifiant trop long';
        endif;

        //Check email
        if (empty($user_email)):
            $errors['user_email'] = 'Veuillez renseigner un email';
        endif;

        //Check password
        if (empty($user_password)):
            $errors['user_password'] = 'Veuillez renseigner un mot de passe';
        elseif (!$uppercase || !$lowercase || !$number || strlen($user_password) < 8):
            $errors['user_password'] = 'Le mot de passe doit avoir une longueur d\'au moins 8 caractères
	        et contenir une majuscule et un chiffre';
        endif;
        //Check same password
        if ($user_password != $user_confirmed_password):
            $errors['user_confirmed_password'] = 'Le mot de passe ne correspond pas';
        endif;
    endif;
endif;

wp_insert_user($user_data);
$object = 'Confirmation de votre inscription';
$msg = 'Vous êtes maintenant inscrit';
$headers = 'From : ' . get_option('admin_email') . "\r\n";
wp_mail($user_email, $object, $msg, $headers);

?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="register-form" action="#" method="post">
                <input type="text" name="login" placeholder="Nom d'utilisateur"/>
                <span><?= $errors['user_login'] ?></span>
                <input type="email" name="email" placeholder="Adresse email"/>
                <span><?= $errors['user_email'] ?></span>
                <input type="password" name="password" placeholder="Mot de passe"/>
                <span><?= $errors['user_password'] ?></span>
                <input type="password" name="passwordCheck" placeholder="Mot de passe à nouveau">
                <span><?= $errors['user_confirmed_password'] ?></span>
                <input type="submit" name="submitted" value="S'incrire">
                <p class="message">Déjà inscrit ?
                    <a href="<?php echo esc_url(home_url('register')); ?>">Connectez-vous</a>
                </p>
            </form>
        </div>
    </div>

<?php get_footer();
