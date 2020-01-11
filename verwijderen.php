<?php
$code = $_POST["naam"];
$naam = $_POST["productNaam"];

echo "<form action='./index.php?content=./fuctions/verwijderen_script' method='post'> <div class='jumbotron jumbotron-fluid'>
<div class='container'>
  <h3 class='display-9'>Weet u zeker dat u: '" . $_POST["productNaam"] . "' wil verwijderen</h3>
  <p class='lead'><button type='submit' formaction='./index.php?content=Producten' class='btn btn-info'>Annuleren</button> 
  <input type='hidden' name='productId' value=" . $_POST["naam"] . ">
  <button type='submit' name='fiets' class='btn btn-danger'>Verwijderen</button></p>
</div>
</div></form>";
?>