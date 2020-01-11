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
                //type ophalen
                if($row["TypeFiets_TypeFietsId"] == 1){
                    $typeFiets = "Elektrische fiets";
                }else if($row["TypeFiets_TypeFietsId"] == 2){
                    $typeFiets = "Sport fiets";
                }else if($row["TypeFiets_TypeFietsId"] == 3){
                    $typeFiets = "Stads fiets";
                }else{
                    $typeFiets = "Overig";
                }
                //url afbeelding ophalen uit de database
                $IdFiets = $row["productCode"];
                $sql = "SELECT afbeeldingUrl FROM afbeelding WHERE IdFiets = $IdFiets";
                $resultId = $conn->query($sql);
                $rowId = $resultId->fetch_assoc();
                //paginainhoud
                echo "<div class='row' style='background-color: white;'>
                <div class='col'>
                    <div style='max-width: 100%;'>
                        <img src='./img/webshop/" . $IdFiets . "/" . $rowId["afbeeldingUrl"] . "' class='card-img-top' alt='afbeelding fiets'>
                    </div>
                </div>
                <div class='col'>
                    <div style='width: 100%;'>
                        <form action='./index.php?content=bestelling' method='post' class='card-body'>
                            <h5 class='card-title'>" . $row["productNaam"] . "</h5>
                            <p class='card-text'>Merk: " . $row["merk"] . "</p>
                            <p class='card-text'>Type: " . $typeFiets . "</p>
                            <h5 class='card-title'>€ " . $row["kosten"] . "</h5>
                            <button formaction='./index.php?content=Proefrit' style='background-color:#67ca67;border-color: #67ca67;' class='btn btn-primary'>Maak een proefrit</button><br><br>
                            <button style='background-color:#5cc3ce;border-color: #5cc3ce;' class='btn btn-primary'>Plaats in bestelling</button>
                            <hr>
                        </div>
                    </div>
                </div>
              </div>";
            }
        } else {
            echo "Geen informaie over dit produckt gevonden";
        }
    }
?>