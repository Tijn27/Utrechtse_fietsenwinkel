<!-- zorgt dat de link op de navbar oplicht -->
<style>
    #active_producten{
        color: white;
    }
</style>

<div id='achtergrond' class='row'>
<?php 
require_once("./fuctions/connect_db.php");

$sql = "SELECT * FROM product WHERE TypeFiets_TypeFietsId = 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //url afbeelding ophalen uit de database
        $IdFiets = $row["productCode"];
        $sql = "SELECT afbeeldingUrl FROM afbeelding WHERE IdFiets = $IdFiets";
        $resultId = $conn->query($sql);
        $rowId = $resultId->fetch_assoc();
        //card printen
        echo "<form action='index.php?content=product' method='get' id='produckt' class='card' class='col' style='width: 18rem;'>
        <img src='./img/webshop/" . $IdFiets . "/" . $rowId["afbeeldingUrl"] . "' class='card-img-top' alt='afbeelding fiets'>
        <div class='card-body'>
            <h5 class='card-title'>" . $row["productNaam"] . "</h5>
            <p class='card-text'> <li>Frametype: " . $row["frameType"] . "</li>
                                <li>Aantal versnellingen: " . $row["versnellingen"] . "</li>
                                <li>Garantie: " . $row["Garantie"] . " jaar</li>
                                <li>€ " . $row["kosten"] . "</li></p>
            <button type='submit' name='naam' value='" . $row["productNaam"] . "' class='btn btn-primary btn-block btn-lg'>Bekijk Product</button></form>";    
            if ( isset($_SESSION["id"])){

                switch ($_SESSION["gebruikersrol"]) {
                case 2:
                    echo "  <form action='index.php?content=bewerken' method='post' id='produckt'><button type='submit' name='naam' value='" . $row["productNaam"] . "' class='btn btn-secondary btn-block btn-lg'>Bewerken</button></form>
                            <form action='index.php?content=verwijderen' method='post' id='produckt'><input type='hidden' name='productNaam' value=" . $row["productNaam"] . "><button type='submit' name='naam' value='" . $row["productCode"] . "' class='btn btn-danger btn-block btn-lg'>Verwijderen</button></form>";
                        break;
                }
              }
        echo "</div>";
    }
} else {
    echo "Geen produckten gevonden";
}
?>
</div>