<?php
  include("connect_db.php");
  require_once ("functions.php");

  $email = $_POST["email"];
  $password = $_POST["wachtwoord"];

  $email = sanitize($email);
  $password = sanitize($password);

  if ( empty($_POST["email"]) || empty($_POST["wachtwoord"])) {
    echo '<br><div class="alert alert-warning" role="alert">U heeft geen email of wachtwoord ingevuld, dit zijn verplichte velden</div>';
    header("Refresh: 5; url=./index.php?content=registreer");
  } else {
    $sql = "SELECT * FROM `gebruikers` WHERE `gebruikersnaam` = '$email'";
    $result = mysqli_query($conn, $sql);
    if ( mysqli_num_rows($result) == 1 ) {
      echo '<br><div class="alert alert-info" role="alert">De door u ingevoerde gebruikersnaam is al bezet, vul een andere gebruikersnaam in</div>';
      header("Refresh: 5; ./index.php?content=registreer");
    } else {
        $pw = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO gebruikers(gebruikersnaam, wachtwoord, gebruikersrol)
                        VALUES  ('$email',
                                '$pw',
                                1)";
        $result = mysqli_query($conn, $sql);

        $id = mysqli_insert_id($conn);
        var_dump($result);
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
        echo '<br><div class="alert alert-success" role="alert">Het</div>';
        header("Refresh: 10; url=./index.php?content=home");
      } else {
        echo '<br><div class="alert alert-danger" role="alert">Er is iets misgegaan tijdens het registreren, probeer het nogmaals</div>';
        header("Refresh: 5; url=./index.php?content=registreer");
      }
    }
  }
?>