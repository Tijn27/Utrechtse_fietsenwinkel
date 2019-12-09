<!-- zorgt dat de link op de navbar oplicht -->
<style>
    #active_producten{
        color: white;
    }
</style>

<div id='achtergrond' class='row'>
<?php 
require_once("./fuctions/connect_db.php");

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<form action='index.php?content=product' method='get' id='produckt' class='card' class='col' style='width: 18rem;'>
        <img src='./img/webshop/" . $row["productCode"] . "/1.jpg' class='card-img-top' alt='afbeelding fiets'>
        <div class='card-body'>
            <h5 class='card-title'>" . $row["productNaam"] . "</h5>
            <p class='card-text'> <li>Frametype: " . $row["frameType"] . "</li>
                                <li>Aantal versnellingen: " . $row["versnellingen"] . "</li>
                                <li>Garantie: " . $row["Garantie"] . " jaar</li>
                                <li>€ " . $row["kosten"] . "</li></p>
            <button type='submit' name='naam' value='" . $row["productNaam"] . "' class='btn btn-primary btn-block btn-lg'>Bekijk Product</button>     
        </div></form>";
    }
} else {
    echo "Geen produckten gevonden";
}
?>
</div>  