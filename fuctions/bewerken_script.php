<?php
$gebruikersrol = [2];

include("connect_db.php");
include("functions.php");
include("./securety.php");

$productId = $_POST["productcode"];

if($_FILES['afbeelding']['size'] > 0){
//afbeeldingen verwijderen is mogelijk als dat nodig is
    if(file_exists('./img/webshop/' . $productId . '')){
        //verwijderen foto's
        $files = glob('./img/webshop/' . $productId . '/*'); // get all file names
        foreach($files as $file){ // iterate files
        if(is_file($file))
            unlink($file); // delete file
        }
        rmdir('./img/webshop/' . $productId . '');
        //ook de oude afbeelding uit de db verwijderen
        $sql = "DELETE FROM `afbeelding` WHERE `afbeelding`.`idFiets` = $productId";
        if ($conn->query($sql) === TRUE) {
            $nieuweAfbeelding = true;
        } else {
            echo "er is iets fout gegaan";
        }
    }
}else{
    $nieuweAfbeelding = false;
}


    //gegevens ophalen uit form
    $naam = sanitize($_POST["naam"]);
    $prijs = sanitize($_POST["prijs"]);
    $merk = sanitize($_POST["merk"]);
    $serie = sanitize($_POST["serie"]);
    $versnellingen = sanitize($_POST["versnellingen"]);
    $frametype = sanitize($_POST["frametype"]);
    $garantie = sanitize($_POST["garantie"]);
    $accuPositie = sanitize($_POST["accuPositie"]);
    $oplaatTijd = sanitize($_POST["oplaatTijd"]);
    $capacitijdAccu = sanitize($_POST["capacitijdAccu"]);
    $typeFiets = sanitize($_POST["typeFiets"]);

    //check of alles is ingevuld
    if (empty($_POST["naam"]) || empty($_POST["prijs"]) || empty($_POST["merk"])) {
        echo '<br><div class="alert alert-warning" role="alert">U heeft niet alle vereise gegevens ingevuld</div>';
        header("Refresh: 5; url=./index.php?content=producten");
    } else {
    //database vullen
        $sql = "UPDATE `product` SET 
                                    `productNaam` = '$naam', 
                                    `merk` = '$merk', 
                                    `serie` = '$serie', 
                                    `versnellingen` = '$versnellingen', 
                                    `frameType` = '$frametype', 
                                    `Garantie` = '$garantie', 
                                    `accuPositie` = '$accuPositie', 
                                    `oplaatTijd` = '$oplaatTijd', 
                                    `capaciteitAccu` = '$capacitijdAccu', 
                                    `TypeFiets_TypeFietsId` = '$typeFiets' 
                                    WHERE `product`.`productCode` = $productId";

        $result = mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);

        //afbeelding toevoegen
        if($nieuweAfbeelding == true){
            $afbeelding = $_FILES['afbeelding'];

            $fileName = $_FILES['afbeelding']['name'];
            $fileTmpName = $_FILES['afbeelding']['tmp_name'];
            $fileSize = $_FILES['afbeelding']['size'];
            $fileError = $_FILES['afbeelding']['error'];
            $fileType = $_FILES['afbeelding']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0) {
                    if ($fileSize < 1000000){
                        mkdir("img/webshop/" . $productId);
                        $fileNameNew = $_POST["naam"] . "." . $fileActualExt;
                        $fileDestination = 'img/webshop/' . $productId . '/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                        $sql = "INSERT INTO `afbeelding` (`idafbeelding`, `IdFiets`, `afbeeldingUrl`) VALUES (NULL, '$productId', '$fileNameNew')";
                        $result = mysqli_query($conn, $sql);
                        $id = mysqli_insert_id($conn);
                    }else{
                        echo "De afbeelding is te groot";
                    }
                } else{
                    echo "Er is iets fout gegaan bij het uploaden van de afbeelding";
                }
            } else{
                echo "Je kan geen afbeeldingen van dit type uploaden";
            }
        }

        //melingen
        if ($result){
            echo '<br><div class="alert alert-success" role="alert">Het product is succesvol bewerkt</div>';
            header("Refresh: 3; url=./index.php?content=producten");
        } else {
            echo '<br><div class="alert alert-danger" role="alert">Er is iets misgegaan, probeer het nogmaals</div>' . $conn->error;
            header("Refresh: 10; url=./index.php?content=producten");
        }
    }
    
?>