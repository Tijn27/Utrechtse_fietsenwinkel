<?php
$code = $_POST['productCode'];

if(isset($_COOKIE['winkelwagen'])) {
    $data = json_decode($_COOKIE['winkelwagen'], true);
    if(in_array($code, $data)){
        $data = array_diff($data, ["$code"]);
        setcookie('winkelwagen', json_encode($data), time() + (86400 * 30), "/");
        //verwijdert cookie waar aantal in is opgeslagen
        setcookie($code, "", time() - 3600);
        header("Refresh: 0; url=./index.php?content=bestelling");
    }else{
        echo "er is iets fout gegaan";
    }
} else {
    echo "nope";
}
?>