<?php 
    include("connect_db.php");
    include("functions.php");

    $email = $_COOKIE['email'];

    

    if ($result){
        $to = $email;
        $subject = "Bestelling";
        $messege = "<!DOCTYPE html>
                    <html>
                        <style>
                        </style>
                        <head>
                            <title>Bestelling</title>
                        </head>
                        <body>
                            <h1>U bestelling is geslaagt!</h1>
                            <p>In de bijlage vind u een pdf met de factuur<br>bedankt voor uw aankoop we zien u graag nog vaker terug</p>
                            "; echo $row['klantid'] . "
                        </body>
                    </html>";
            $headers = "MIME-Version: 1.0". "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: no-reply@utrechtsefietsenwinkel.nl". "\r\n";

            mail($to, $subject, $messege,$headers);
            echo '<div class="alert alert-success" role="alert">U bent geregistreerd. Wij hebben een mail gestuurd naar dit adres. Klik daarin op de activatielink om uw registratie te voltooien.</div>';
            header("Refresh: 10; url=./index.php?content=home");
        }else {
        echo '<br><div class="alert alert-danger" role="alert">Er is iets misgegaan, probeer het nogmaals</div>';
        header("Refresh: 10; url=./index.php?content=klantGegevens");
  }
?>


<!-- link in mail naar pdf -->