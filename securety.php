<?php 
    if (!isset($_SESSION["id"])){
        echo '<div class="alert alert-danger" role="alert">Uw moet ingelogd zijn om deze pagina te kunnen zien</div>';
        header("Refresh: 5; url=./index.php?content=home");
        exit();
    } elseif ( !in_array($_SESSION["gebruikersrol"],  $gebruikersrol)){
        echo '<div class="alert alert-danger" role="alert">Uw heeft niet de rechten voor deze pagina</div>';
        header("Refresh: 5; url=./index.php?content=logout");
        exit();
    }
?>