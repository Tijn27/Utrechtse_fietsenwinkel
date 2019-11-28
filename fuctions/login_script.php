<!-- navbar -->
<style>
    #active_login{
        color: white;
    }
</style>

<!-- website -->
<?php 
    include("./connect_db.php");
    include("./functions.php");

    $email = sanitize($_POST["email"]);
    $password = sanitize($_POST["password"]);

    $sql = "SELECT * FROM  `login` WHERE `email` = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1){
        //inloggen
        $record = mysqli_fetch_assoc($result);
        $blowfish_password = $record["password"];

        if ( password_verify($password, $blowfish_password)) {

            $_SESSION["id"] = $record["password"];
            $_SESSION["email"] = $email;
            $_SESSION["userrole"] = $record["userrole"];
            
            switch ($record["userrole"]){
                case 'influencer':
                    echo '<div class="alert alert-success" role="alert">Uw bent ingelogd en word nu doorgestuurd</div>';
                    header("Refresh: 3; ./index.php?content=home");
                case 'klant':
                    echo '<div class="alert alert-success" role="alert">Uw bent ingelogd en word nu doorgestuurd</div>';
                    header("Refresh: 3; ./index.php?content=home");
                break;
                case 'admin':
                    echo '<div class="alert alert-success" role="alert">Uw bent ingelogd als administrator en word nu doorgestuurd</div>';
                    header("Refresh: 3; ./index.php?content=home");
                break;
                case 'super-admin':
                    echo '<div class="alert alert-success" role="alert">Uw bent ingelogd als super-admin en word nu doorgestuurd</div>';
                    header("Refresh: 3; ./index.php?content=home");
                break;
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