<?php

require "recaptchainfo.php";
require "hcaptchainfo.php";


if ($_POST["mode"] == "v3re") {

    $url = "https://www.google.com/recaptcha/api/siteverify";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("secret" => getreCaptchaV3SiteSecret(), "response" => $_POST["token"]));


    $data = curl_exec($ch);

    curl_close($ch);

    echo $data;


}

if ($_POST["mode"] == "h") {

    $url = "https://hcaptcha.com/siteverify";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("secret" => gethcaptchasitesecret(), "response" => $_POST["token"]));


    $data = curl_exec($ch);

    curl_close($ch);

    echo $data;


}


?>