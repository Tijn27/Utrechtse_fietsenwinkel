<?php
$gebruikersrol = [2];

include("./fuctions/connect_db.php");
include("./fuctions/functions.php");
include("securety.php");


$code = $_POST["naam"];
//afbeeling uit de db
$sql = "SELECT afbeeldingUrl FROM afbeelding WHERE idFiets = '$code'";
$resultImg = $conn->query($sql);
$rowImg = $resultImg->fetch_assoc();
//productgegevens uit db
$sql = "SELECT * FROM product WHERE productCode = '$code'";
$result = $conn->query($sql);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo "
    <form action='./index.php?content=./fuctions/bewerken_script' method='post' enctype='multipart/form-data'>
      <div class='form-row' >
        <div class='form-group col-md-6'>
          <label for='afbeeldign'>Oude afbeelding: " . $rowImg['afbeeldingUrl'] . "<br> Klik hieronder om een nieuwe afbeelding te selecteren</label>
          <input type='file' name='afbeelding'>
        </div>
        <input type='hidden' name='productcode' value=" . $row['productCode'] . ">
        <div class='form-group col-md-6'>
          <label for='naam'>Naam</label>
          <input type='text' "; if(!$row['productNaam'] == NULL){ echo "value=" . $row['productNaam'] . "";}echo " class='form-control' id='naam' name='naam' required>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label for='prijs'>Prijs</label>
          <input type='text' "; if(!$row['kosten'] == NULL){ echo "value=" . $row['kosten'] . "";}echo " class='form-control' id='prijs' name='prijs' required>
        </div>
        <div class='form-group col-md-6'>
          <label for='merk'>merk</label>
          <input type='text' "; if(!$row['merk'] == NULL){ echo "value=" . $row['merk'] . "";}echo " class='form-control' id='merk' name='merk' required>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label for='serie'>serie</label>
          <input type='text' "; if(!$row['serie'] == NULL){ echo "value=" . $row['serie'] . "";}echo " class='form-control' id='serie' name='serie'>
        </div>
        <div class='form-group col-md-6'>
          <label for='versnellingen'>aantal versnellingen</label>
          <input type='text' "; if(!$row['versnellingen'] == NULL){ echo "value=" . $row['versnellingen'] . "";}echo " class='form-control' id='versnellingen' name='versnellingen'>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label for='frametype'>Frametype</label>
          <input type='text' "; if(!$row['frameType'] == NULL){ echo "value=" . $row['frameType'] . "";}echo " class='form-control' id='frametype' name='frametype'>
        </div>
        <div class='form-group col-md-6'>
          <label for='garantie'>Garantie in jaren</label>
          <input type='text' "; if(!$row['Garantie'] == NULL){ echo "value=" . $row['Garantie'] . "";}echo " class='form-control' id='garantie' name='garantie'>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label for='accuPositie'>Accu positie</label>
          <input type='text' "; if(!$row['accuPositie'] == NULL){ echo "value=" . $row['accuPositie'] . "";}echo " class='form-control' id='accuPositie' name='accuPositie'>
        </div>
        <div class='form-group col-md-6'>
          <label for='oplaatTijd'>Oplaat tijd</label>
          <input type='text' "; if(!$row['oplaatTijd'] == NULL){ echo "value=" . $row['oplaatTijd'] . "";}echo " class='form-control' id='oplaatTijd' name='oplaatTijd'>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label for='capacitijdAccu'>Capacitijd accu (Wh)</label>
          <input type='text'  "; if(!$row['capaciteitAccu'] == NULL){ echo "value=" . $row['capaciteitAccu'] . "";}echo " class='form-control' id='capacitijdAccu' name='capacitijdAccu'>
        </div>
        <div class='form-group col-md-6'>
            <label for='type'>Type product</label>
            <select class='form-control' name='typeFiets'>
              <option value='3'"; if($row['TypeFiets_TypeFietsId'] == 3){echo "selected";}echo">stadsfiets</option>
              <option value='2'"; if($row['TypeFiets_TypeFietsId'] == 2){echo "selected";}echo">sportfiets</option>
              <option value='1'"; if($row['TypeFiets_TypeFietsId'] == 1){echo "selected";}echo">electrischefiets</option>
              <option value='4'"; if($row['TypeFiets_TypeFietsId'] == 4){echo "selected";}echo">accessoires</option>
            </select> 
        </div>
      </div>
      <button type='submit' name='submit' class='btn btn-primary'>Update</button>
    </form>
    <br>
    ";
  }
}

?>
