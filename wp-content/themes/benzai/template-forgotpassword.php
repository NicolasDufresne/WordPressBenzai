<?php /* Template Name: Forgot Password */

if (isset($_POST['submitted'])):
    $user_email = sanitize_user($_POST['email']);
    $exists_email = email_exists($user_email);

    $reset = esc_url(get_site_url() . '/reset?user_login=' . $user_email . '&reset_key=' . $GLOBALS['reset_key']);

    if ($exists_email):
        $object = 'Reinitialisation de mot passe';
        $msg = <<<HTML
		<div>
		Cliquez sur ce lien pour reinitialiser votre mot de passe.
		<a href="{$reset}">Clique</a>
        </div>
HTML;
        wp_mail($user_email, $object, $msg);
        echo '<script>alert("Un mail à été envoyé.")</script>';
    else:
        $errors['user_email'] = 'Cette adresse email n\'existe pas.';
    endif;
endif;
?>

<?php get_header(); ?>

<div class="login-page">
    <div class="form-login">
        <form class="login-form" method="post">
            <span class="errors"><?= $errors['user_email'] ?></span>
            <input type="email" name="email" placeholder="Adresse mail "/>
            <input type="submit" name="submitted" value="Envoyé"/>
        </form>
    </div>
</div>

<?php get_footer(); ?>
