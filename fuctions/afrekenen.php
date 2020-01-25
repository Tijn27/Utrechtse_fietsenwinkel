<?php
    include("connect_db.php");
    include("functions.php");

    //gegevens ophalen uit form
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $postcode = $_POST['postcode'];
    $huisnummer = $_POST['huisnummer'];
    $straat = $_POST['straat'];
    $plaats = $_POST['plaats'];

    if(isset($_COOKIE["winkelwagen"])){
        //check of alles is ingevuld
        if (empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || empty($_POST["email"]) || empty($_POST["tel"]) || empty($_POST["postcode"]) || empty($_POST["huisnummer"]) || empty($_POST["straat"]) || empty($_POST['plaats'])) {
            echo '<br><div class="alert alert-warning" role="alert">U heeft niet alle vereise gegevens ingevuld</div>';
            header("Refresh: 5; url=./index.php?content=bestelling");
          } else {
        //database vullen
        //klant aanmaken
            $sql = "INSERT INTO `klant` (
                                        `KlantId`, 
                                        `email`, 
                                        `voornaam`, 
                                        `achternaam`, 
                                        `postcode`, 
                                        `woonplaats`, 
                                        `telefoonnummer`, 
                                        `Straat`,
                                        `huisnummer`) 
                                VALUES (
                                        NULL, 
                                        '$email', 
                                        '$voornaam', 
                                        '$achternaam', 
                                        '$postcode', 
                                        '$plaats', 
                                        '$tel', 
                                        '$straat', 
                                        '$huisnummer');";
    
            $result = mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            //factuur aanmaken
            $sql = "SELECT MAX(klantId) as idKlant FROM klant where email='$email'";
            $result1 = $conn->query($sql);
            $row = $result1->fetch_assoc();
            $idKlant = $row['idKlant'];

            $sql = "INSERT INTO `factuur` (
                                        `factuurcode`, 
                                        `Factuurdatum`, 
                                        `btw`, 
                                        `Klant_id`) 
                                VALUES (
                                        NULL, 
                                        CURRENT_TIMESTAMP, 
                                        '21', 
                                        '$idKlant');";

            $result2 = mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            //producten in de factuur(regel) zetten
            $sql = "SELECT MAX(factuurcode) as codefactuur FROM factuur where klant_id='$idKlant'";
            $result3 = $conn->query($sql);
            $row = $result3->fetch_assoc();
            $factuurcode = $row['codefactuur'];
            
            $winkelwagen = json_decode($_COOKIE['winkelwagen'], true);
            foreach($winkelwagen as $value){
                $aantal = $_COOKIE["$value"];
            
                $sql = "INSERT INTO `factuurregel` (
                                            `factuurcode`, 
                                            `productcode`, 
                                            `aantal`)
                                    VALUES (
                                            '$factuurcode', 
                                            '$value', 
                                            '$aantal');";
                $result4 = mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                setcookie("$value", "", time() - 3600);
            }
            setcookie("winkelwagen", "", time() - 3600);
          }
//check of schrijven naar de DB is gelukt
          if ($result && $result1 && $result2 && $result3 && $result4){
//bevestigings mail sturen
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
            <ul class='nav justify-content-center'>
                <li class='nav-item' id='nav'>
                    <img src='' width='250' height='75' alt='Utrechtse Fietsenwinkel'>
                </li>
            </ul>
            <h1>U bestelling is geslaagt!</h1>
            <a href='http://www.utrechtsefietsenwinkel.nl/factuur?id=" . $factuurcode . "'>Factuur</a>
            <p>bedankt voor uw aankoop we zien u graag nog vaker terug</p>
            </body>
            </html>";
            $headers = "MIME-Version: 1.0". "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: no-reply@utrechtsefietsenwinkel.nl". "\r\n";

            mail($to, $subject, $messege,$headers);
                echo '<div class="alert alert-success" role="alert">Wij hebben u een bevestigings mail gestuurt</div>';
                header("Refresh: 10; url=./index.php?content=home");
            // header("Refresh: 0; url=./index.php?content=./fuctions/mail");
            }else {
            echo '<br><div class="alert alert-danger" role="alert">Er is iets misgegaan, probeer het nogmaals</div>';
            header("Refresh: 10; url=./index.php?content=klantGegevens");
          }
        }else{
            echo '<br><div class="alert alert-danger" role="alert">U heeft niks in u bestelling staan</div>';
            header("Refresh: 10; url=./index.php?content=producten");
        }
?>