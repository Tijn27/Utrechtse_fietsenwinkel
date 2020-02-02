<?php
$gebruikersrol = [2];
include("./securety.php");
include("connect_db.php");


if(isset($_POST["gebruikerId"])){
    //check of de laatste admin niet woord verwijdert
    if($_POST["gebruikersRol"] == 2){
        $sql = "SELECT COUNT(gebruikersRol) FROM gebruikers WHERE gebruikersRol = 2";
        $resultRol = $conn->query($sql);
        $rowRol = $resultRol->fetch_assoc();
        if($rowRol["COUNT(gebruikersRol)"] > 1){
            $magVerwijdertWorden = true;
        }else{
            $magVerwijdertWorden = false;
            echo '<div class="alert alert-danger" role="alert">Deze gebruiker kan niet verwijdert worden, want er moet minimaal 1 admin blijven bestaan</div>';
            header("Refresh: 5; ./index.php?content=beheren");
        }
    }else{
        $magVerwijdertWorden = true;
    }

    //verwijderen gebruiker
    if($magVerwijdertWorden){
        $gebruikersId = $_POST["gebruikerId"];

        $sql = "DELETE FROM `gebruikers` WHERE `gebruikers`.`id` = $gebruikersId";
        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">De gebruiker is succesvol verwijderd</div>';
            header("Refresh: 3; ./index.php?content=beheren");
        } else {
            echo '<div class="alert alert-danger" role="alert">Er is iets fout gegaan probeer het later nog een keer</div>';
            header("Refresh: 10; ./index.php?content=beheren");
        }
    }
}
?>