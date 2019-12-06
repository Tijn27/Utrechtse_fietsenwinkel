<?php
  require_once("connect_db.php");
  require_once("functions.php");

//haal de gegevens op
  $email = $_POST["email"];
  $password = $_POST["wachtwoord"];

  $email = sanitize($email);
  $password = sanitize($password);

//check of alles is ingevuld
  if ( empty($_POST["email"]) || empty($_POST["wachtwoord"])) {
    echo '<br><div class="alert alert-warning" role="alert">U heeft geen email of wachtwoord ingevuld, dit zijn verplichte velden</div>';
    header("Refresh: 5; url=./index.php?content=registreer");
  } else {
//vul de database
        $pw = password_hash($password, PASSWORD_BCRYPT);

        date_default_timezone_set("Europe/Amsterdam");
        $date = date('d,m,Y H: i:s ');

        $sql = "INSERT INTO gebruikers(id, naam, wachtwoord, gebruikersrol, aanmaakDatum)
                        VALUES  (null,
                                '$email',
                                '$pw',
                                1,
                                '$date')";
        $result = mysqli_query($conn, $sql);

        $id = mysqli_insert_id($conn);
//stuur een bevestegingsmail
      if ($result) {
        $to = "admin@utrechtsefietstenwinkel.nl";
        $subject = "nieuwe registratie";
        $messege = "<!DOCTYPE html>
                      <html>
                        <style>
                        </style>
                        <head>
                          <title>nieuwe registratie</title>
                        </head>
                        <body>
                          <h2>Er is een nieuw account aan gemaakt:</h2>
                          <p>gebruikersnaam: $email</p>
                          <p>Als u dit account niet heeft aangemaak kunt uw deze blokeren door op de onderstaande link te klikken</p>
                          <a href='http://www.utrechtsefietsenwinkel.nl/index.php?content=gebruikers'>Beheer gebruikers</a>
                          <p></p>
                        </body>
                      </html>";
        $headers = "MIME-Version: 1.0". "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: admin@ExcersiceMe.nl". "\r\n";

        mail($to, $subject, $messege,$headers);
        echo '<br><div class="alert alert-success" role="alert">Het nieuwe account is succesvol gecreerd</div>';
        header("Refresh: 10; url=./index.php?content=home");
      } else {
        echo '<br><div class="alert alert-danger" role="alert">Er is iets misgegaan tijdens het registreren, probeer het nogmaals</div>';
        header("Refresh: 5; url=./index.php?content=registreer");
      }
    }
?>