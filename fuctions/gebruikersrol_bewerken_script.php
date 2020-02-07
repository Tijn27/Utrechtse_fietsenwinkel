<?php
$gebruikersrol = [2];
include("./securety.php");
include("connect_db.php");

if(isset($_POST["select"])){
    $gebruikersrol = $_POST['select'];
    $gebruikersid = $_POST['gebruikerId'];

    //check of de laatste admin niet woord verwijdert
    $sql = "SELECT gebruikersrol FROM gebruikers WHERE id = $gebruikersid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($row["gebruikersrol"] == 2){
        $sql = "SELECT COUNT(gebruikersRol) FROM gebruikers WHERE gebruikersRol = 2";
        $resultRol = $conn->query($sql);
        $rowRol = $resultRol->fetch_assoc();
        if($rowRol["COUNT(gebruikersRol)"] > 1){
            $magVerandertwoorden = true;
        }else{
            $magVerandertwoorden = false;
            echo '<div class="alert alert-danger" role="alert">Deze gebruikersrol kan niet worden gewijzigd, er moet minimaal 1 admin blijven bestaan</div>';
            header("Refresh: 5; ./index.php?content=beheren");
        }
    }else{
        $magVerandertwoorden = true;
    }

    //verandert de gebruikersrol
    if($magVerandertwoorden){
   
        $sql = "UPDATE `gebruikers` SET `gebruikersrol` = '$gebruikersrol' WHERE `gebruikers`.`id` = $gebruikersid";
        $result = mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">De gebruiker is succesvol geüpdatet</div>';
            header("Refresh: 3; ./index.php?content=beheren");
        } else {
            echo '<div class="alert alert-danger" role="alert">Er is iets fout gegaan probeer het later nog een keer</div>';
            header("Refresh: 10; ./index.php?content=beheren");
        }
    }
}

?>