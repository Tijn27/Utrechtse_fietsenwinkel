<div class='row'>
  <div class='col' style='min-width: 300px;'>
    <form action="./index.php?content=./fuctions/afrekenen" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="voornaam">Voornaam</label>
          <input type="text" class="form-control" id="voornaam" name="voornaam" required>
        </div>
        <div class="form-group">
          <label for="achternaam">Achternaam</label>
          <input type="text" class="form-control" id="achternaam" name="achternaam" required>
        </div>
        <div class="form-group">
          <label for="email">E-mailadres</label>
          <input type="text" class="form-control" id="email" name="email"required>
        </div>
        <div class="form-group">
          <label for="tel">Telefoonnummer</label>
          <input type="text" class="form-control" id="tel" name="tel"required>
        </div>
        <div class="form-group">
          <label for="postcode">Postcode</label>
          <input type="text" class="form-control" id="postcode" name="postcode"required>
        </div>
        <div class="form-group">
          <label for="huisnummer">Huisnummer + Toevoeging</label>
          <input type="text" class="form-control" id="huisnummer" name="huisnummer"required>
        </div>
        <div class="form-group">
          <label for="straat">Straat</label>
          <input type="text" class="form-control" id="straat" name="straat"required>
        </div>
        <div class="form-group">
          <label for="oplaatTijd">Plaats</label>
          <input type="text" class="form-control" id="plaats" name="plaats"required>
        </div>
        <div class='text-center'>
      <button type="submit" name="submit" class="btn btn-primary">Betalen</button>
      </div>
    </form>
  </div>
  <div class='col' style='min-width: 300px;'>
  <!-- Bestelling overzicht -->
  <h2 style='text-align: center;'>bestelling</h2><br>
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
                        "; 
                        echo $_COOKIE[$value] .
                        "
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
            </div>
            </li><br>";
        echo "<div class='row'><div class='col-sm' style='text-align: center;'><a href='index.php?content=bestelling' style='background-color:#5cc3ce;border-color: #5cc3ce;' class='btn btn-primary'>Bestelling bewerken</a></div></div>";
        echo "</ul>";
    }
    ?>
  </div>
</div>