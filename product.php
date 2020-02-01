<?php

    if(!isset($_GET["naam"])){
        include("./home.php");
    }else{
        
        require_once("./fuctions/connect_db.php");

        $naam = $_GET["naam"];
        $sql = "SELECT * FROM product where productNaam = '$naam'";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //url afbeelding ophalen uit de database
                $IdFiets = $row["productCode"];
                $sql = "SELECT afbeeldingUrl FROM afbeelding WHERE IdFiets = $IdFiets";
                $resultId = $conn->query($sql);
                $rowId = $resultId->fetch_assoc();

                //type fiets ophalen uit de type tabel
                $typeFietsId = $row['TypeFiets_TypeFietsId'];
                $sql = "SELECT TypeFiets FROM `typefiets` WHERE $typeFietsId = TypeFietsId";
                $resultType = $conn->query($sql);
                $rowType = $resultType->fetch_assoc();
                //paginainhoud

                if($row['actief'] == false){
                    echo "  <div class='row'>
                                <div class='col alert alert-danger' role='alert'>Dit product is helaas niet meer beschikbaar</div>
                            </div>";
                }

                echo "<div class='row' style='background-color: white;'>
                <div style='min-width: 250px;' class='col'>
                    <div style='max-width: 100%;'>
                        <img src='./img/webshop/" . $IdFiets . "/" . $rowId["afbeeldingUrl"] . "' class='card-img-top' alt='afbeelding fiets'>
                    </div>
                </div>
                <div class='col'>
                    <div style='width: 100%;'>
                        <form action='./index.php?content=./fuctions/bestelling_script' method='post' class='card-body'>
                            <h5 id='productTitel' class='card-title'>" . $row["productNaam"] . "</h5>
                            <p class='card-text'>Merk: " . $row["merk"] . "</p>
                            <p class='card-text'>Type: " . $rowType["TypeFiets"] . "</p>
                            <h5 class='card-title'>€ " . number_format($row["kosten"],2,',','.') . "</h5>
                            <button formaction='./index.php?content=Proefrit' style='background-color:#67ca67;border-color: #67ca67;' class='btn btn-primary'"; if($row['actief'] == false){echo "disabled";} echo">Maak een proefrit</button><br><br>
                            <button type='submit' name='naam' value='$IdFiets' style='background-color:#5cc3ce;border-color: #5cc3ce;' class='btn btn-primary'"; if($row['actief'] == false){echo "disabled";} echo">Plaats in bestelling</button>
                        </form>
                    </div>              
                </div>
            </div>
            <br>    
            <div class='row' style='background-color: white;'>
                <div class='col'><br>
                     <h5 id='productTitel' class='card-title'>Specificaties " . $row["productNaam"] . "</h5>";
                     if(!$row["productNaam"] == NULL){echo"<div class='row' id='border'><a class='col'>Productnaam: </a><a class='col'>" . $row["productNaam"] . "</a></div>";}
                     if(!$row["merk"] == NULL){echo"<div class='row' id='border'><a class='col'>Merk: </a><a class='col'>" . $row["merk"] . "</a></div>";}
                     if(!$row["serie"] == NULL){echo"<div class='row' id='border'><a class='col'>Serie: </a><a class='col'>" . $row["serie"] . "</a></div>";}
                     if(!$rowType["TypeFiets"] == NULL){echo"<div class='row' id='border'><a class='col'>Type: </a><a class='col'>" . $rowType["TypeFiets"] . "</a></div>";}
                     if(!$row["versnellingen"] == NULL){echo"<div class='row' id='border'><a class='col'>Versnellingen: </a><a class='col'>" . $row["versnellingen"] . "</a></div>";}
                     if(!$row["frameType"] == NULL){echo"<div class='row' id='border'><a class='col'>Frametype: </a><a class='col'>" . $row["frameType"] . "</a></div>";}
                     if(!$row["Garantie"] == NULL){echo"<div class='row' id='border'><a class='col'>Garantie: </a><a class='col'>" . $row["Garantie"] . " jaar</a></div>";}
                     
                     if((!$row["accuPositie"] == NULL || !$row["oplaatTijd"] == NULL) || !$row["capaciteitAccu"] == NULL){
                        echo "<br><br><h5 id='productTitel' class='card-title'>E-bike techniek</h5>";
                        if(!$row["accuPositie"] == NULL){echo"<div class='row' id='border'><a class='col'>Accu positie: </a><a class='col'>" . $row["accuPositie"] . "</a></div>";}
                        if(!$row["oplaatTijd"] == NULL){echo"<div class='row' id='border'><a class='col'>Oplaat tijd: </a><a class='col'>" . $row["oplaatTijd"] . "</a></div>";}
                        if(!$row["capaciteitAccu"] == NULL){echo"<div class='row' id='border'><a class='col'>Capiciteit van de accu: </a><a class='col'>" . $row["capaciteitAccu"] . "Wh</a></div>";}
                     }
                echo"</div>
            </div>
              ";
            }
        } else {
            echo "Geen informaie over dit produckt gevonden";
        }
    }
?>