<!-- pagina -->

<div style="margin-top: 30px;" class="row">
<!-- registeeren -->
  
  <br>
  <!-- inloggen -->
  <div id="inloggen" class="col-md-6">
    <form action="./index.php?content=./fuctions/login_script" method="post">
      <div class="form-group">
        <h1>Log hier in:</h1>
        <br>
        <label for="exampleInputEmail1">Gebruikersnaam</label>
        <input type="gebruikersnaam" class="form-control" id="InputGebruikersnaam" aria-describedby="gebruikersnaamHelp"
          placeholder="Voer uw Gebruikersnaam in..." name="gebruikersnaam" required>
          <br>
        <div class="form-group">
            <label for="exampleInputPassword1">Wachtwoord</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Voer uw wachtwoord in" name="password" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form><br>
  </div>
</div>