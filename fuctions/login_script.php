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
    echo "doorgegeven informatie: " . $email . $password;
    $sql = "SELECT * FROM  `gebruikers` WHERE `naam` = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1){
        //inloggen
        $record = mysqli_fetch_assoc($result);
        $blowfish_password = $record["wachtwoord"];

        var_dump ($record);

        if ( password_verify("test", $blowfish_password)) {

            $_SESSION["id"] = $record["wachtwoord"];
            $_SESSION["gebruikersnaam"] = $email;
            $_SESSION["gebruikersrol"] = $record["gebruikersrol"];
            echo "Yeah";
            switch ($record["gebruikersrol"]){
                case 1:
                    echo '<div class="alert alert-success" role="alert">Uw bent ingelogd en word nu doorgestuurd</div>';
                    header("Refresh: 3; ./index.php?content=home");
                case 2:
                    echo '<div class="alert alert-success" role="alert">Uw bent ingelogd als admin u en word nu doorgestuurd</div>';
                    header("Refresh: 3; ./index.php?content=home");
                break;
                // case 3:
                //     echo '<div class="alert alert-success" role="alert">Uw bent ingelogd als administrator en word nu doorgestuurd 3</div>';
                //     header("Refresh: 3; ./index.php?content=home");
                // break;
                // case 4:
                //     echo '<div class="alert alert-success" role="alert">Uw bent ingelogd als super-admin en word nu doorgestuurd 4</div>';
                //     header("Refresh: 3; ./index.php?content=home");
                // break;
            }
          } else {
            // E-mailadres is niet bekend in database, terugsturen naar het inlogformulier
            echo '<div class="alert alert-danger" role="alert">Uw wachtwoord is niet correct, probeer het nogmaals</div>';
            header("Refresh: 2; url=./index.php?content=login");
          }

    } else{
        echo '<div class="alert alert-danger" role="alert">Het ingevoerde e-mailaderes is niet bekent probeer opnieuw</div>';
        header("Refresh: 4; url=./index.php?content=login");
    }
?> 