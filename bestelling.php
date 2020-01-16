<h1>bestelling:</h1><br>
<?php
require_once("./fuctions/connect_db.php");

$totaal = 0;

if(!isset($_COOKIE['winkelwagen'])) {
    echo"U heeft geen producten in u bestelling staan";
}elseif($_COOKIE['winkelwagen'] == '[]'){
    echo"U heeft geen producten in u bestelling staan";
}else {
    $winkelwagen = json_decode($_COOKIE['winkelwagen'], true);
    echo "<ul class='list-group list-group-flush'>";
    foreach($winkelwagen as $value){
        $sql = "SELECT * FROM product WHERE productCode = '$value'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totaal = $totaal + $row["kosten"];
        echo "<li class='list-group-item'>
            <div class='row'>
                <div class='col-5'>"
                    . $row["productNaam"] . "
                </div>
                <div class='col-sm'>
                    € " . $row["kosten"] . "
                </div>
                <div class='col-sm'>
                    Aantal: 1
                </div>
                <form method='post' class='col-sm' action='./index.php?content=fuctions/product_verwijderen_script'>
                    <input type='hidden' value='$value' name='productCode'>
                    <input type='image' src='./img/kruisje.png' alt='verwijderen' width='20' height='20'>
                </form>
            </div></li>";
    }
    echo "<li class='list-group-item' style='background-color: #d1d9ff;'>
            <div class='row'><div class='col-5'>   	
                Totaal: 
            </div>
            <div class='col-sm'>
                € " . $totaal . "
            </div>
            <div class='col-sm'>
            </div>
            <div class='col-sm'>
            </div>
        </div>
        </li><br>";
    echo "<div class='row'><div class='col-sm'><a href='./index.php?content=producten' style='background-color:#67ca67;border-color: #67ca67;' class='btn btn-primary'>Verder Winkelen</a>
    <a href='./index.php?content=klantGegevens' style='background-color:#5cc3ce;border-color: #5cc3ce;' class='btn btn-primary'>Bestellen</a></div></div>";
    echo "</ul>";
}

// setcookie('winkelwagen', "", time() - 3600);
?>
