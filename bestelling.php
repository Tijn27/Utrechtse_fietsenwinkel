<h1>bestelling:</h1><br>
<?php
require_once("./fuctions/connect_db.php");

$totaal = 0;

if(!isset($_COOKIE['winkelwagen'])) {
    echo"U heeft geen producten in u bestelling staan";
} else {
    $winkelwagen = json_decode($_COOKIE['winkelwagen'], true);
    echo "<ul class='list-group list-group-flush'>";
    foreach($winkelwagen as $value){
        $sql = "SELECT * FROM product WHERE productCode = '$value'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totaal = $totaal + $row["kosten"];
        echo "<li class='list-group-item'><div class='row'><div class='col-sm'>" . $row["productNaam"] . "</div><div class='col-sm'>€ " . $row["kosten"] . "</div><div class='col-sm'>Aantal " . $row["kosten"] . "</div></div></li>";
    }
    echo "<li class='list-group-item' style='background-color: #d1d9ff;'><div class='row'><div class='col-sm'>Totaal: </div><div class='col-sm'>€ " . $totaal . "</div><div class='col-sm'></div></div></li>";
    echo "</ul>";
}

// setcookie('winkelwagen', "", time() - 3600);
?>