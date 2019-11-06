<h2>Sugesties</h2>
<p class="lead">De laatste 3 dagen uitgevoerd:</p>
<?php

//var_dump($_POST);
include("./connectdb.php");

include("./functions.php");

$date = date('Y-m-d'); 
$date_min_3 = date('Y-m-d', strtotime("-3 days"));
$email =  $_SESSION["email"];

$mogelijke = array('Loopband', 'Seated chest press', 'Seated leg extension',
    'Horizontal row machine', 'Abdominal crunch machine', 'Triceps push down',
    'Front lunge', 'Plank reps', 'Hometrainer', 'Full body stratch staand');
$uitgevoerd = array();


$sql = "SELECT * FROM `oefening` 
        WHERE `email` = '$email' AND (date BETWEEN '$date_min_3' AND '$date')";
//echo "hallo we gaat dit doen $sql" ;
$result = mysqli_query($conn, $sql);
//var_dump($result);

if (mysqli_num_rows($result)> 0) {
    echo "<table border='1'>
    <tr>
    <th>Date</th>
    <th>Oefening</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    array_push($uitgevoerd, $row['oefening']);
    echo "<tr>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['oefening'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
} else {
    echo "U heeft de afgelopen 3 dagen geen oefeningen uitgevoerd."; 
}

$tel_sugesties = 0;
foreach ($mogelijke as $o) {
    $done = false;
    foreach($uitgevoerd as $u) {
        if ($o == $u) {
            $done = true;
        }
    }
    if ($done == false) {
        echo "<br>Suggestie: $o is de afgelopen 3 dagen nog niet uigevoerd!<br>";
        $tel_sugesties++;
    }
}if ($tel_sugesties == 0) {

    echo '<br><p class="lead">U heeft alles gedaan de afgelopen 3 dagen. U kunt kiezen uit alle oefeningen.</p>';
}


mysqli_close($conn);

?>