<!-- zorgt dat de link op de navbar oplicht -->
<style>
    #active_producten{
        color: white;
    }
</style>

<div id='achtergrond' class='row'>
<?php 
require_once("./fuctions/connect_db.php");

//chect of het type product in de url woord aangegeven
if(isset($_GET['type'])){
    $typeFiets = $_GET['type'];
    $sql = "SELECT * FROM product WHERE actief = true AND TypeFiets_TypeFietsId = $typeFiets";
    $result = $conn->query($sql);
}else{
    $sql = "SELECT * FROM product WHERE actief = true";
    $result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //url afbeelding ophalen uit de database
        $IdFiets = $row["productCode"];
        $sql = "SELECT afbeeldingUrl FROM afbeelding WHERE IdFiets = $IdFiets";
        $resultId = $conn->query($sql);
        $rowId = $resultId->fetch_assoc();

        $typeFietsId = $row['TypeFiets_TypeFietsId'];
        $sql = "SELECT TypeFiets FROM `typefiets` WHERE $typeFietsId = TypeFietsId";
        $resultType = $conn->query($sql);
        $rowType = $resultType->fetch_assoc();
        
        //card printen
        echo "<form action='index.php?content=product' method='get' id='produckt' class='card ' style='width: 20rem;'>
        <img src='./img/webshop/" . $IdFiets . "/" . $rowId["afbeeldingUrl"] . "' class='card-img-top' alt='afbeelding fiets'>
        <div class='card-body'>
            <h5 id='productTitel' class='card-title'>" . $row["productNaam"] . "</h5>
            <p class='card-text'> ";
                                    if(!$row['TypeFiets_TypeFietsId'] == NULL){
                                        echo "<li>Type: " . $rowType["TypeFiets"] . "</li>";
                                    }
                                    if(!$row['frameType'] == NULL){
                                        echo "<li>Frametype: " . $row["frameType"] . "</li>";
                                    }
                                    if(!$row['capaciteitAccu'] == NULL){
                                        echo "<li>Accu capaciteit(Wh): " . $row["capaciteitAccu"] . "</li>";
                                    }
                                    if(!$row['versnellingen'] == NULL){
                                        echo "<li>Versnellingen: " . $row["versnellingen"] . "</li>";
                                    }
                                    if(!$row['Garantie'] == NULL){
                                        echo "<li>Garantie: " . $row["Garantie"] . " jaar</li>";
                                    }echo"
                                <a style='font-size: 20px;-'>€ " . number_format($row["kosten"],2,',','.') . "</a></p>
            <button type='submit' name='naam' value='" . $row["productNaam"] . "' class='btn btn-primary btn-block btn-lg'>Bekijk Product</button></form>";    
            if ( isset($_SESSION["id"])){

                switch ($_SESSION["gebruikersrol"]) {
                case 2:
                    echo "  <form action='index.php?content=bewerken' method='post' id='produckt'><button type='submit' name='naam' value='" . $row["productCode"] . "' class='btn btn-secondary btn-block btn-lg'>Bewerken</button></form>
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