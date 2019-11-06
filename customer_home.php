<?php 
$userrol = ['customer', 'root'];
include("./security.php");
?>



<h1>Oefeningen</h1>
<br>
<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Oefeningen uitgevoerd.</h5>
    <p class="card-text">Klik op de knop onder de oefening, dan word uw vordering opgeslagen.</p>
    <a class="card-text"><?php echo"<a href=/index.php?content=progressie>Klik hier</a>" ?> voor uw persoonlijke voortgang.</a>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Loopband</h5>
            <p class="card-text">Cardio, 10 minuten <I>(verbrande kcal: 50)</I></p>
            <video width="100%" height="100%" controls poster="./img/1.png">
                <source src="./img/1.mp4" type="video/mp4">
                </video>
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Loopband" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Seated chest press</h5>
            <p class="card-text">Krachtapparatuur, 15x 15x 15x <I>(verbrande kcal: 25)</I></p>
                <video width="100%" height="100%" controls poster="./img/2.png">
                <source src="./img/2.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Seated chest press" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Seated leg extension</h5>
            <p class="card-text">Krachtapperatuur, 15x 15x 15x <I>(verbrande kcal: 25)</I></p>
                <video width="100%" height="100%" controls poster="./img/3.png">
                <source src="./img/3.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Seated leg extension" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Horizontal row machine</h5>
            <p class="card-text">Krachtapperatuur, 15x 15x 15x <I>(verbrande kcal: 25)</I></p>
                <video width="100%" height="100%" controls poster="./img/4.png">
                <source src="./img/4.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Horizontal row machine" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Abdominal crunch machine</h5>
            <p class="card-text">Krachtapperatuur, 15x 15x 15x <I>(verbrande kcal: 25)</I></p>
                <video width="100%" height="100%" controls poster="./img/5.png">
                <source src="./img/5.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Abdominal crunch machine" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Triceps push down</h5>
            <p class="card-text">Krachtapperatuur(Pulley), 15x 15x 15x <I>(verbrande kcal: 25)</I></p>
                <video width="100%" height="100%" controls poster="./img/6.png">
                <source src="./img/6.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Triceps push down" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Front lunge</h5>
            <p class="card-text">Medicijnbal, 15x 15x 15x <I>(verbrande kcal: 30)</I></p>
                <video width="100%" height="100%" controls poster="./img/7.png">
                <source src="./img/7.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Front lunge" name="oefening">
            <button type="submit" class="btn btn-outline-info" name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Plank reps</h5>
            <p class="card-text">20 seconden <I>(verbrande kcal: 10)</I></p>
                <video width="100%" height="100%" controls poster="./img/8.png">
                <source src="./img/8.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Plank reps" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Hometrainer</h5>
            <p class="card-text">Cardio, 10 minuten <I>(verbrande kcal: 55)</I></p>
                <video width="100%" height="100%" controls poster="./img/9.png">
                <source src="./img/9.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Hometrainer" name="oefening">
            <button type="submit" class="btn btn-outline-info" name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Full body stratch staand</h5>
            <p class="card-text">20 seconden</p>
                <video width="100%" height="100%" controls poster="./img/10.png">
                <source src="./img/10.mp4" type="video/mp4">
                </video>
            <form action="./vordering.php" method="post">
            <input type="hidden" value="Full body stratch staand" name="oefening">
            <button type="submit" class="btn btn-outline-info " name="update" value="update">Uitgevoerd</button>
        </form>
      </div>
    </div>
  </div>
</div>
