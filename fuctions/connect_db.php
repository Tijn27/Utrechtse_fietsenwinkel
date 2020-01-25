<?php
    //verbinding met de database opzetten
    define("SERVERNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "utrechtsefietsenwinkel");
  
    // We maken contact met de database
    //$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, );
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3306);
?>

