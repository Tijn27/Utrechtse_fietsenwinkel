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
                //paginainhoud
                echo "<div class='row' style='background-color: white;'>
                <div class='col'>
                    <div style='width: 100%;'>
                        <img src='./img/webshop/" . $IdFiets . "/" . $rowId["afbeeldingUrl"] . "' class='card-img-top' alt='afbeelding fiets'>
                    </div>
                </div>
                <div class='col'>
                    <div style='width: 100%;'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row["productNaam"] . "</h5>
                            <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href='#' style='background-color:#67ca67;' class='btn btn-primary'>Maak een proefrit</a><br><br>
                            <a href='#'style='background-color:#5cc3ce;' class='btn btn-primary'>Plaats in bestelling</a>
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