<?php
$gebruikersrol = [2];

include("connect_db.php");
include("functions.php");
include("./securety.php");

$productId = $_POST["productId"];

// verwijderen afbeeldingen als producten niet meer actief zijn is een optie voor als de server vol raakt

    // if(file_exists('./img/webshop/' . $productId . '')){
    //     //verwijderen foto's
    //     $files = glob('./img/webshop/' . $productId . '/*'); // get all file names
    //     foreach($files as $file){ // iterate files
    //     if(is_file($file))
    //         unlink($file); // delete file
    //     }
    //     rmdir('./img/webshop/' . $productId . '');
    // }

//verwijderen uit de database
$sql = "UPDATE `product` SET `actief` = '0' WHERE `product`.`productCode` = '$productId';";
if ($conn->query($sql) === TRUE) {
    echo '<div class="alert alert-success" role="alert">Het product is succesvol verwijderd</div>';
    header("Refresh: 5; ./index.php?content=producten");
} else {
    echo '<div class="alert alert-danger" role="alert">Er is iets fout gegaan probeer het later nog een keer</div>';
    header("Refresh: 10; ./index.php?content=home");
}
?>