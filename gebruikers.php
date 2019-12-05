Hier woorden de gebruikers beheerd
<?php
include("./fuctions/connect_db.php");
$sql = "SELECT gebruikersnaam FROM gebruikers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["gebruikersnaam"]. "<br>";
    }
} else {
    echo "0 results";
}

