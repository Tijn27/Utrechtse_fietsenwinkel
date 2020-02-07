<!-- navbar -->
<style>
    #active_login{
        color: white;
    }
</style>

<!-- website -->
<br>
<?php 
    include("connect_db.php");
    include("functions.php");

    $email = sanitize($_POST["gebruikersnaam"]);
    $password = sanitize($_POST["password"]);
    $sql = "SELECT * FROM  `gebruikers` WHERE `naam` = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1){
        //inloggen
        $record = mysqli_fetch_assoc($result);
        $blowfish_password = $record["wachtwoord"];


        if ( password_verify($password, $blowfish_password)) {

            $_SESSION["id"] = $record["wachtwoord"];
            $_SESSION["gebruikersnaam"] = $email;
            $_SESSION["gebruikersrol"] = $record["gebruikersrol"];
            switch ($record["gebruikersrol"]){
                case 1:
                    echo '<div class="alert alert-success" role="alert">U bent ingelogd en wordt nu doorgestuurd</div>';
                    header("Refresh: 5; ./index.php?content=home");
                break;
                case 2:
                    echo '<div class="alert alert-success" role="alert">U bent ingelogd als admin u en wordt nu doorgestuurd</div>';
                    header("Refresh: 5; ./index.php?content=home");
                break;
            }
          } else {
            // E-mailadres is niet bekend in database, terugsturen naar het inlogformulier
            echo '<div class="alert alert-danger" role="alert">Uw wachtwoord of/en e-mail is niet correct, probeer het nogmaals</div>';
            header("Refresh: 4; url=./index.php?content=login");
          }

    } else{
        echo '<div class="alert alert-danger" role="alert">Uw wachtwoord of/en e-mail is niet correct, probeer het nogmaals</div>';
        header("Refresh: 4; url=./index.php?content=login");
    }
?> 