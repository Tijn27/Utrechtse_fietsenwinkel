<style>
    #active_beheren{
        color: white;
    }
</style>

<h2 class="display-4">Gebruikers:</h2>
<?php
$gebruikersrol = [2];
include("./securety.php");
include("./fuctions/connect_db.php");
//gebruiker opvragen
$sql = "SELECT id, naam, gebruikersrol FROM gebruikers";
$result = $conn->query($sql);

// $x geeft een unike naam aan aan het formulier van de gebruikersrol
$x = 0;

if ($result->num_rows > 0) {
    // output data of each row
    echo"
    <ul class='list-group '>
        <li class='list-group-item' style='background-color: #d1d9ff;'>
            <div class='row'>
                <a class='col-4'>Gebruikersnaam:</a>
                <a class='col-4'>Rol:</a>
            </div>
        </li>";
    while($row = $result->fetch_assoc()) {
        $x++;
        //gebruikersRol opvragen
        $gebruikersrol = $row["gebruikersrol"];
        $sql = "SELECT GebruikersRol FROM gebruikersrol WHERE $gebruikersrol = idGebruikersRol";
        $resultRol = $conn->query($sql);
        $rowRol = $resultRol->fetch_assoc();

        echo "<li class='list-group-item'>
                <div class='row'>
                    <a class='col-4'>". $row["naam"] . "</a>
                    <a class='col-4'>
                        <select form='$x' class='custom-select' name='select' id='inputGroupSelect01'>
                            <option value='1' "; if($row["gebruikersrol"] == 1){echo'selected';} echo">Fietsenmaker</option>
                            <option value='2' "; if($row["gebruikersrol"] == 2){echo'selected';} echo">Admin</option>
                        </select>
                    </a>
                        <form action='./index.php?content=./fuctions/gebruikersrol_bewerken_script' method='post' id='$x'>
                            <input type='hidden' value='$gebruikersrol' name='gebruikersRol'>
                            <input type='hidden' value=" . $row["id"] . " name='gebruikerId'>
                            <button type='submit' class='btn btn-outline-dark'>Opslaan</button>
                        </form>
                    <div class='col-sm'>
                    <form action='./index.php?content=./fuctions/gebruiker_verwijderen_script' method='post'> 
                        <input type='hidden' value=" . $gebruikersrol . " name='gebruikersRol'>
                        <input type='hidden' value=" . $row["id"] . " name='gebruikerId'>
                        <input type='image' src='./img/kruisje.png' alt='verwijderen' width='34' height='34'>
                    </form>
                </div>
                </div>
            </li>";
    }
    echo "</ul>";
} else {
    echo "Geen gebruikers gevonden";
}
?>
