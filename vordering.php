<?php 

    session_start();
    //var_dump($_POST);
    //We maken contact met de mysql-server
    include("./connectdb.php");

    // We includen de sanitize funtion om de $_POST waarden schoon te maken.
    include("./functions.php");

    date_default_timezone_set("Europe/Amsterdam");

    $date = date('Y-m-d');
 
    $email =  $_SESSION["email"];
    $oefening = $_POST["oefening"];

    $sql = "INSERT INTO `oefening` (date, email, oefening)
             VALUES ('$date', '$email', '$oefening' );";
    
    //echo $sql; exit();
    mysqli_query($conn, $sql);

    header("Location: ./index.php?content=uitgevoerd");
?>