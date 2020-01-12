<?php
if(isset($_POST["naam"])){
    $IdFiets = $_POST["naam"];

        if(!isset($_COOKIE['winkelwagen'])) {
            $card = array($IdFiets);
            setcookie('winkelwagen', json_encode($card), time() + (86400 * 30), "/");
        } else {
            $data = json_decode($_COOKIE['winkelwagen'], true);
            array_push($data, $IdFiets);
            setcookie('winkelwagen', json_encode($data), time() + (86400 * 30), "/");
        }

    header("Refresh: 0; url=./index.php?content=bestelling");
}else{
    header("Refresh: 0; url=./index.php?content=home");
}
?>

