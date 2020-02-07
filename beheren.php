<style>
    #active_beheren{
        color: white;
    }
</style>

<?php
$gebruikersrol = [2];
include("./securety.php");

echo "<div class='row'>
        <div class='col'>";
            include("./gebruikers.php");
    echo"</div>
        <div class='col'>";
            include("./registreer.php");
    echo"</div>
    </div>";
?>

