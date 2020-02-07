<?php
$gebruikersrol = [2];
include("securety.php");

echo "<div id='inloggen'> 
    <form action='./index.php?content=./fuctions/register_script' method='post'>
      <div class='form-group'>
        <h1 class='display-4'>Registeer een gebruiker:</h1>
        <br>
        <label for='exampleInputEmail1'>Gebruikersnaam</label>
        <input type='text' class='form-control' id='InputEmail' aria-describedby='emailHelp'
          placeholder='Voer een gebruikersnaam in...' name='email' required>
          <br>
          <label for='exampleInputEmail1'>Wachtwoord</label>
          <input type='password' class='form-control' id='InputEmail' aria-describedby='wachtwoordHelp'
                 placeholder='Voer een wachtwoord in...' name='wachtwoord' required>
      </div>
      <button type='submit' class='btn btn-primary'>Maak een account</button>
    </form><br>
  </div>";


?>