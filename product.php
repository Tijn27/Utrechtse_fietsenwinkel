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
                echo "<div class='row' style='background-color: white;'>
                <div class='col'>
                    <div style='width: 100%;'>
                        <img src='./img/webshop/" . $row["productCode"] . "/1.jpg' class='card-img-top' alt='afbeelding fiets'>
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
                // echo "<form action='index.php?content=product' method='get' id='produckt' class='card' class='col' style='width: 100%;'>
                // <img src='./img/webshop/" . $row["productCode"] . "/1.jpg' class='card-img-top' alt='afbeelding fiets'>
                // <div class='card-body'>
                //     <h5 class='card-title'>" . $row["productNaam"] . "</h5>
                //     <p class='card-text'> <li>Frametype: " . $row["frameType"] . "</li>
                //                         <li>Aantal versnellingen: " . $row["versnellingen"] . "</li>
                //                         <li>Garantie: " . $row["Garantie"] . " jaar</li>
                //                         <li>€ " . $row["kosten"] . "</li></p>
                //     <button type='submit' name='naam' value='" . $row["productNaam"] . "' class='btn btn-primary btn-block btn-lg'>Bekijk Product</button>     
                // </div></form>";
            }
        } else {
            echo "Geen informaie over dit produckt gevonden";
        }
    }
?>