<style>
    #active_toevoegen{
        color: white;
    }
</style>

<h1 class="display-4">Product toevoegen:</h1><br>
<form action='./index.php?content=./fuctions/toevoegen_script' method='post' enctype='multipart/form-data'>
  <div class='form-row' >
    <div class='form-group col-md-6'>
      <label for='afbeeldign'>Hooft Afbeelding</label>
      <input type='file' name='afbeelding' required>
    </div>
    <div class='form-group col-md-6'>
      <label for='naam'>Naam</label>
      <input type='text' class='form-control' id='naam' name='naam' required>
    </div>
  </div>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='prijs'>Prijs</label>
      <input type='text' class='form-control' id='prijs' name='prijs' required>
    </div>
    <div class='form-group col-md-6'>
      <label for='merk'>merk</label>
      <input type='text' class='form-control' id='merk' name='merk' required>
    </div>
  </div>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='serie'>serie</label>
      <input type='text' class='form-control' id='serie' name='serie'>
    </div>
    <div class='form-group col-md-6'>
      <label for='versnellingen'>aantal versnellingen</label>
      <input type='text' class='form-control' id='versnellingen' name='versnellingen'>
    </div>
  </div>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='frametype'>Frametype</label>
      <input type='text' class='form-control' id='frametype' name='frametype'>
    </div>
    <div class='form-group col-md-6'>
      <label for='garantie'>Garantie in jaren</label>
      <input type='text' class='form-control' id='garantie' name='garantie'>
    </div>
  </div>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='accuPositie'>Accu positie</label>
      <input type='text' class='form-control' id='accuPositie' name='accuPositie'>
    </div>
    <div class='form-group col-md-6'>
      <label for='oplaatTijd'>Oplaat tijd</label>
      <input type='text' class='form-control' id='oplaatTijd' name='oplaatTijd'>
    </div>
  </div>
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='capacitijdAccu'>Capacitijd accu (Wh)</label>
      <input type='text' class='form-control' id='capacitijdAccu' name='capacitijdAccu'>
    </div>
    <div class='form-group col-md-6'>
    <label for='type'>Type product</label>    
    <select class='form-control' name='typeFiets'>
          <option value='3'>stadsfiets</option>
          <option value='2'>sportfiets</option>
          <option value='1'>electrischefiets</option>
          <option value='4'>accessoires</option>
        </select> 
    </div>
  </div>
  <button type='submit' name='submit' class='btn btn-primary'>Voeg toe</button>
</form>
<br>