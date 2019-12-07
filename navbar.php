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
      <li class="nav-item">
        <a class="nav-link" id="active_producten" href="index.php?content=Producten">Producten   </a> 
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
                case 'admin':
                  echo '<li class="nav-item">
                    <a id="active_berichten" class="nav-link" href="index.php?content=admin">Berichten</a>
                  </li>';
                break;
                case 'super-admin':
                  echo '<li class="nav-item">
                    <a id="active_berichten" class="nav-link" href="index.php?content=admin">Berichten</a>
                  </li>
                  <li class="nav-item">
                    <a id="active_gebruikers" class="nav-link" href="index.php?content=Gebruikers">Gebruikers</a>
                  </li>';
                break;
            }
              echo '<li class="nav-item">
                      <a id="active_logout" class="nav-link" href="index.php?content=logout">Log Uit</a>
                    </li>';
            } else{
              echo '
                <li class="nav-item">
                  <a id="active_login" class="nav-link" href="index.php?content=login">Aanmelden</a>
                </li>';
            }
          ?>
    </ul>
  </div>
</nav>

