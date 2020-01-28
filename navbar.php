<nav class="navbar navbar-expand-lg navbar-dark" id="nav">
  <a class="navbar-brand" href="index.php?content=home"><img src="img/Logo3.png" width="250"
    height="75" alt="Utrechtse Fietsenwinkel"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="active_producten" data-toggle="dropdown" href="index.php?content=Producten" role="button" aria-haspopup="true" aria-expanded="false">Producten</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?content=Producten">Alle bekijken</a>
          <a class="dropdown-item" href="index.php?content=Producten&type=1">Elektrische fietsen</a>
          <a class="dropdown-item" href="index.php?content=Producten&type=3">Stadsfietsen</a>
          <a class="dropdown-item" href="index.php?content=Producten&type=2">Sportieve fietsen</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?content=Producten&type=4">Accessoires</a>
        </div>
      </li>
      &nbsp;
      <li class="nav-item">
        <a class="nav-link" id="active_reparatie" href="index.php?content=Reparatie">Reparatie    </a>
      </li>
      &nbsp;
      <li class="nav-item">
        <a class="nav-link" id="active_proefrit" href="index.php?content=Proefrit">Proefrit       </a>
      </li>
      &nbsp;
      <li class="nav-item">
        <a class="nav-link" id="active_contact" href="index.php?content=Contact">Contact          </a>
      </li>
      <?php 
            if ( isset($_SESSION["id"])){

              switch ($_SESSION["gebruikersrol"]) {
                case 2:
                  echo '<li class="nav-item">
                    <a id="active_berichten" class="nav-link" href="index.php?content=beheren">Beheren</a>
                  </li>
                  <li class="nav-item">
                    <a id="active_berichten" class="nav-link" href="index.php?content=toevoegen">Toevoegen</a>
                  </li>';
                break;
                case 1:
                  echo '<li class="nav-item">
                    <a id="active_berichten" class="nav-link" href="index.php?content=rooster">Rooster</a>
                  </li>';
                break;
            }
              echo '<li class="nav-item">
                      <a id="active_logout" class="nav-link" href="index.php?content=logout">Log Uit</a>
                    </li>';
            } 
            if (!isset($_COOKIE['winkelwagen'])){
            }elseif($_COOKIE['winkelwagen'] == '[]'){
            }else{
              echo '<li class="nav-item">
                      <a id="active_bestellingen" class="nav-link" href="index.php?content=bestelling">bestelling</a>
                    </li>';
            }
          ?>
    </ul>
  </div>
</nav>


