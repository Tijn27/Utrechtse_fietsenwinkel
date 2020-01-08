<?php 
    include("connect_db.php");
    include("functions.php");

    //productcode genereren
    $sql = "SELECT MAX(productcode) AS maxProductcode FROM product";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $productcode = $row["maxProductcode"] + 1;

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

    //afbeelding toevoegen
    if(isset($_POST['submit'])){
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
            $fileNameNew = $_POST["naam"] . "." . $fileActualExt;
            $fileDestination = 'img/webshop/5/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
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

    //check of alles is ingevuld
    if (empty($_POST["naam"]) || empty($_POST["prijs"]) || empty($_POST["merk"]) || empty($_POST["serie"]) || empty($_POST["frametype"]) || empty($_POST["garantie"])) {
        echo '<br><div class="alert alert-warning" role="alert">U heeft niet alle vereise gegevens ingevuld</div>';
        header("Refresh: 5; url=./index.php?content=toevoegen");
      } else {
    //database vullen
        $sql = "INSERT INTO `product` ( `productCode`, 
                                        `productNaam`,
                                        `kosten`, 
                                        `merk`, 
                                        `serie`, 
                                        `versnellingen`, 
                                        `frameType`, 
                                        `Garantie`, 
                                        `accuPositie`, 
                                        `oplaatTijd`, 
                                        `capaciteitAccu`, 
                                        `TypeFiets_TypeFietsId`)
                VALUES                 ('$productcode', 
                                        '$naam', 
                                        '$prijs', 
                                        '$merk', 
                                        '$serie', 
                                        '$versnellingen', 
                                        '$frametype', 
                                        '$garantie', 
                                        '$accuPositie', 
                                        '$oplaatTijd', 
                                        '$capacitijdAccu', 
                                        '$typeFiets');";

        $result = mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        //melingen
        if ($result){
            echo '<br><div class="alert alert-success" role="alert">Het nieuwe product is succesvol toegevoegd</div>';
            header("Refresh: 5; url=./index.php?content=producten");
          } else {
            echo '<br><div class="alert alert-danger" role="alert">Er is iets misgegaan, probeer het nogmaals</div>';
            header("Refresh: 10; url=./index.php?content=toevoegen");
          }
      }
?>