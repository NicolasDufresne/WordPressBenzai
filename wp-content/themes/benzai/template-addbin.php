<?php
/* Template Name: Add Bin*/
$current_user = wp_get_current_user();
if (user_can( $current_user, 'administrator' )) {
    // user is an admin

if (isset($_POST['submitted'])){
    /*Sécurité données*/
    $errors = array();
    if (empty($_POST['numBorn']) || strlen($_POST['numBorn']) < 5 || strlen($_POST['numBorn']) < 20)
        $errors['numBorn'] = 'Il y a une erreur dans l\'insertion de le numéro de borne';
    if (empty($_POST['volume']) || strlen($_POST['volume']) < 1 || strlen($_POST['volume']) < 3)
        $errors['volume'] = 'Il y a une erreur dans l\'insertion du volume';
    if (empty($_POST['landMark']))
        $errors['landMark'] = 'Il y a une erreur sur l\'adresse';
    if (empty($_POST['collectDay']) || strlen($_POST['collectDay']) < 1 || strlen($_POST['collectDay']) < 2)
        $errors['collectDay'] = 'Il y a une erreur dans la date de collecte';
    if (empty($_POST['coordinates']) || strlen($_POST['coordinates']) < 2 || strlen($_POST['coordinates']) < 100)
        $errors['coordinates'] = 'Il y a une erreur dans les coordonnées';
    if (empty($_POST['damage']))
        $errors['damage'] = 'Il y a une erreur dans le champ damage';
    if (empty($_POST['isFull']))
        $errors['isFull'] = 'Il y a une erreur dans le champ isFull';
    if (empty($_POST['isEnable']))
        $errors['isEnable'] = 'Il y a une erreur dans le champ isEnable';
    if (empty($_POST['nameCity']) || strlen($_POST['nameCity']) < 1 || strlen($_POST['nameCity']) < 50)
        $errors['nameCity'] = 'Il y a une erreur dans l\'insertion du nom de la ville';
    if (empty($_POST['countryCode']) || strlen($_POST['countryCode']) != 5)
        $errors['countryCode'] = 'Il y a une erreur dans le code postal';

    if (isset($errors)){
            /*Parse donnée en JSON*/
    $array = array(
        "numBorn" => $_POST['numBorn'],
        "volume" => $_POST['volume'],
        "landMark" => $_POST['landMark'],
        "collectDay" => $_POST['collectDay'],
        "coordinates" => $_POST['coordinates'],
        "damage" => $_POST['damage'],
        "isFull" => $_POST['isFull'],
        "isEnable" => $_POST['isEnable'],
        "nameCity" => $_POST['nameCity'],
        "countryCode" => $_POST['countryCode']
    );
    $json = json_encode($array);
    $ch = curl_init('http://localhost:8000/glassdump/create');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json))
    );
    /*Send Data to API*/
    $result = curl_exec($ch);
    $redirect_to = esc_url(home_url('/'));
    wp_safe_redirect($redirect_to);
    }
}
?>
<?php get_header(); ?>
<div class="login-page">
    <div class="form-login">
        <form class="" method="POST">
            <span class="errors"><?= $errors['numBorn'] ?></span>
            <input type="text" name="numBorn" placeholder="Numéro de la borne">
            <span class="errors"><?= $errors['volume'] ?></span>
            <input type="number" name="volume" placeholder="Volume de borne">
            <span class="errors"><?= $errors['landMark'] ?></span>
            <input type="text" name="landMark" placeholder="Adresse">
            <span class="errors"><?= $errors['collectDay'] ?></span>
            <input type="number" name="collectDay" placeholder="Date de collecte">
            <span class="errors"><?= $errors['coordinates'] ?></span>
            <input type="text" name="coordinates" placeholder="Coordonnées">
            <label for="damage">Endommagé ?</label>
            <span class="errors"><?= $errors['damage'] ?></span>
            <select name="damage" id="damage">
                <option value="TRUE">true</option>
                <option value="FALSE" selected>false</option>
            </select>
            <br>
            <label for="isFull">Pleine ?</label>
            <span class="errors"><?= $errors['isFull'] ?></span>
            <select name="isFull" id="isFull">
                <option value="TRUE">true</option>
                <option value="FALSE" selected>false</option>
            </select>
            <br>
            <label for="isEnable">Active ?</label>
            <span class="errors"><?= $errors['isEnable'] ?></span>
            <select name="isEnable" id="isEnable">
                <option value="TRUE" selected>true</option>
                <option value="FALSE">false</option>
            </select>
            <br>
            <span class="errors"><?= $errors['nameCity'] ?></span>
            <input type="text" name="nameCity" placeholder="Nom de la ville">
            <span class="errors"><?= $errors['countryCode'] ?></span>
            <input type="number" name="countryCode" placeholder="Code Postal">
            <input type="submit" name="submitted" value="Envoyer">
        </form>
    </div>
</div>
<?php get_footer();
}else{
    $redirect_to = esc_url(home_url('/'));
    wp_safe_redirect($redirect_to);
}