<h2>Persoonlijke voortgang</h2>
<p class="lead">De laatste 7 dagen uitgevoerd:</p>
<?php

//var_dump($_POST);
include("./connectdb.php");

include("./functions.php");

$date = date('Y-m-d'); 
$date_min_7 = date('Y-m-d', strtotime("-7 days")); 
$email =  $_SESSION["email"];

$mogelijke = array('Loopband', 'Seated chest press', 'Seated leg extension',
    'Horizontal row machine', 'Abdominal crunch machine', 'Triceps push down',
    'Front lunge', 'Plank reps', 'Hometrainer', 'Full body stratch staand');
$uitgevoerd = array();

$sql = "SELECT * FROM `oefening` 
        WHERE `email` = '$email' AND (date BETWEEN '$date_min_7' AND '$date')";
//echo "hallo we gaat dit doen $sql" ;
$result = mysqli_query($conn, $sql);
//var_dump($result);

if (mysqli_num_rows($result)> 0) {
    echo '<div class="row">
    <div class="col-4">
    <table border="1">
    <tr>
    <th>Date</th>
    <th>Oefening</th>
    </tr>';

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['oefening'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    echo '</div>';
} else {
    echo "U heeft nog geen oefeningen uitgevoerd."; 
}

mysqli_close($conn);

?>
<div class="col-8">
<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Graag suggesties over oefeningen?</h5>
    <a class="card-text"><?php echo"<a href=/index.php?content=sugestie>Klik hier</a>" ?> voor suggesties over volgende oefeningen.</a>
  </div>
</div>
</div>
</div>
