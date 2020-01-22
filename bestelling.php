<h1>bestelling:</h1><br>
<?php
require_once("./fuctions/connect_db.php");

if(!isset($_COOKIE['winkelwagen'])) {
    echo"U heeft geen producten in u bestelling staan";
}elseif($_COOKIE['winkelwagen'] == '[]'){
    echo"U heeft geen producten in u bestelling staan";
}else {
    $totaal = 0;
    $winkelwagen = json_decode($_COOKIE['winkelwagen'], true);
    echo "<ul class='list-group list-group-flush'>";
    foreach($winkelwagen as $value){
        $sql = "SELECT * FROM product WHERE productCode = '$value'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totaal = $totaal + ($row["kosten"]*$_COOKIE[$value]);
        //bij de select woord de hoeveelheid die de gebruiker van een product heeft als standaart geselecteerd
        echo "<li class='list-group-item'>
            <div class='row'>
                <div class='col-5'>"
                    . $row["productNaam"] . "
                </div>
                <div class='col-sm'>
                    € " . $row["kosten"] . "
                </div>
                <div class='col-sm'>
                    <p style='text-align: right;'>Aantal:</p>
                </div>
                <div class='col-sm'>
                <form action='./index.php?content=./fuctions/aantal_bewerken' method='post'>
                    <select class='custom-select' name='select' id='inputGroupSelect01'>";
                    for($x=1; $x<=10; $x++){
                        echo"<option value='$x' "; if($_COOKIE[$value] == $x){echo "selected";} echo " >$x</option>";
                       
                    }
                    if($_COOKIE[$value] > 10){
                    echo
                        "<option value=' "; if($_COOKIE[$value] > 10){echo $_COOKIE[$value];}echo" ' "; if($_COOKIE[$value] > 10){echo "selected";} echo " >"; if($_COOKIE[$value] > 10){echo $_COOKIE[$value];}else{echo "10+";} echo"</option>";
                    }
                    echo "</select>
                </div>
                <div class='col-sm'>
                        <input type='hidden' value='$value' name='productCode'>
                        <button type='submit' class='btn btn-outline-dark'>Opslaan</button>
                    </form>
                </div>
                <div class='col-sm'>
                    <form action='./index.php?content=./fuctions/product_verwijderen_script' method='post'> 
                        <input type='hidden' value='$value' name='productCode'>
                        <input type='image' src='./img/kruisje.png' alt='verwijderen' width='34' height='34'>
                    </form>
                </div>
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
            <div class='col-sm'>
            </div>
        </div>
        </li><br>";
    echo "<div class='row'><div class='col-sm'><button style='background-color:#67ca67;border-color: #67ca67;' class='btn btn-primary'>Verder Winkelen</button>
    <button style='background-color:#5cc3ce;border-color: #5cc3ce;' class='btn btn-primary'>Bestellen</button></div></div>";
    echo "</ul>";
}
?>
