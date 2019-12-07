<h2>Gebruikers:</h2>
<?php
include("./fuctions/connect_db.php");
//telt aantal gebruikers
    // $sql = "SELECT COUNT(naam) FROM gebruikers;";
    // $result = mysq;
    // $data=mysql_fetch_assoc($result);
    // echo $data['total'];
    //
    // $result=mysql_query("SELECT COUNT(naam) FROM gebruikers;");
    // $data=mysql_fetch_assoc($result);
    // echo $data['total'];


$sql = "SELECT naam FROM gebruikers";
$result = $conn->query($sql);
// var_dump($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Gebruikersnaam: ". $row["naam"]. "<br>";
    }
} else {
    echo "0 results";
}

