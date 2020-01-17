<?php /* Template Name: Register */ ?>

<?php
if (isset($_POST['submitted'])):
    //Strip HTML and PHP tags from a string
    $user_login = strip_tags(trim($_POST['login']));
    $user_email = filter_var(strip_tags(trim($_POST['email'])), FILTER_VALIDATE_EMAIL);
    $user_password = strip_tags(trim($_POST['password']));
    $user_confirmed_password = strip_tags(trim($_POST['passwordCheck']));

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

    if (count($errors) == 0) {
        //Insert in database wpb_users
        wp_insert_user($user_data);

        echo '<script>alert("Inscription")</script>';

        //Send mail
        $object = 'Confirmation de votre inscription';
        $msg = 'Vous êtes maintenant inscrit';
        $headers = 'From : ' . get_option('admin_email') . "\r\n";
        wp_mail($user_email, $object, $msg, $headers);

        //Location to index
        header("http://localhost/WordPressBenzaiTheme/login/");
    }

endif;

?>

<?php get_header(); ?>

    <div class="login-page">
        <div class="form-login">
            <form class="register-form" method="post">
                <span class="errors"><?= $errors['user_login'] ?></span>
                <input type="text" name="login" placeholder="Nom d'utilisateur"/>
                <span class="errors"><?= $errors['user_email'] ?></span>
                <input type="email" name="email" placeholder="Adresse email"/>
                <span class="errors"><?= $errors['user_password'] ?></span>
                <input type="password" id="password_show" name="password" placeholder="Mot de passe"/>
                <label class="label_checkbox" for="checkbox">
                    <img src="<?= get_template_directory_uri() . '/assets/img/icons/hide.png'; ?>" alt="show_password"
                         id="imgClickAndChange" onclick="changeImage()"/>
                </label>
                <div class="clear"></div>
                <input type="checkbox" onclick="myFunction()" id="checkbox">
                <span class="errors"><?= $errors['user_confirmed_password'] ?></span>
                <input type="password" id="password_confirmed_show" name="passwordCheck"
                       placeholder="Mot de passe à nouveau">
                <input type="submit" name="submitted" value="S'incrire">
                <p class="message">Déjà inscrit ?
                    <a href="<?php echo esc_url(home_url('register')); ?>">Connectez-vous</a>
                </p>
            </form>
        </div>
    </div>

<?php get_footer();
