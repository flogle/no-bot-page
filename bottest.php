<?php

require "recaptchainfo.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="jquery-3.6.1.min.js"></script>
    <script src="bottest.js"></script>
    <title>Bot test</title>
</head>

<body>
    <span id="jsonGETParmsE" hidden>
        <?php echo json_encode($_GET); ?>
    </span>
    <div class="container">
        <h1>Are you a robot?</h1>
        <hr>
        <?php

            if (isset($_GET["bot"])) {

                if ($_GET["bot"] == "y") {

                    echo "<h3>Yes you are!</h3>";


                } elseif ($_GET["bot"] == "n") {


                    echo "<h3>No you're not!</h3><br><h4>Redirecting... <div class='clearfix'><div class='spinner-border float-end' role='status'></div></div></h4>";

                }


            } else {

                echo "<div class='g-recaptcha' id='recapt' data-sitekey='" . getreCaptchaV2SiteKey() . "' data-callback='verify'></div>";

            }


        ?>
    </div>
</body>

</html>