<?php
/* Template Name: Add Bin*/

if (isset($_POST['submitted'])){
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

    $result = curl_exec($ch);
    echo "Ajout OK";
}
?>

<div class="login-page">
    <div class="form-login">
        <form class="" method="POST">
            <input type="text" name="numBorn" placeholder="Numéro de la borne">
            <input type="number" name="volume" placeholder="Volume de borne">
            <input type="text" name="landMark" placeholder="Adresse">
            <input type="number" name="collectDay" placeholder="Date de collecte">
            <input type="text" name="coordinates" placeholder="Coordonnées">
            <label for="damage">Endommagé ?</label>
            <select name="damage" id="damage">
                <option value="TRUE">true</option>
                <option value="FALSE" selected>false</option>
            </select>
            <label for="isFull">Pleine ?</label>
            <select name="isFull" id="isFull">
                <option value="TRUE">true</option>
                <option value="FALSE" selected>false</option>
            </select>
            <label for="isEnable">Active ?</label>
            <select name="isEnable" id="isEnable">
                <option value="TRUE" selected>true</option>
                <option value="FALSE">false</option>
            </select>
            <input type="text" name="nameCity" placeholder="Nom de la ville">
            <input type="number" name="countryCode" placeholder="Code Postal">
            <input type="submit" name="submitted" value="Envoyer">
        </form>
    </div>
</div>
