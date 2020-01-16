<form action="./index.php?content=./fuctions/afrekenen" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="voornaam">Voornaam</label>
      <input type="text" class="form-control" id="voornaam" name="voornaam" required>
    </div>
    <div class="form-group col-md-6">
      <label for="achternaam">Achternaam</label>
      <input type="text" class="form-control" id="achternaam" name="achternaam" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email adres</label>
      <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="tel">Telefoon nummer</label>
      <input type="text" class="form-control" id="tel" name="tel">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="postcode">Postcode</label>
      <input type="text" class="form-control" id="postcode" name="postcode">
    </div>
    <div class="form-group col-md-6">
      <label for="huisnummer">Huisnummer + Toevoeing</label>
      <input type="text" class="form-control" id="huisnummer" name="huisnummer">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="straat">Straat</label>
      <input type="text" class="form-control" id="straat" name="straat">
    </div>
    <div class="form-group col-md-6">
      <label for="oplaatTijd">Plaats</label>
      <input type="text" class="form-control" id="plaats" name="plaats">
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Bestellen</button>
</form>
<br>