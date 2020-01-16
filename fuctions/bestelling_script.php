<?php
if(isset($_POST["naam"])){
    $IdFiets = $_POST["naam"];

        if(!isset($_COOKIE['winkelwagen'])) {
            $card = array($IdFiets);
            //zet product in winkelwagen
            setcookie('winkelwagen', json_encode($card), time() + (86400 * 30), "/");
            //stelt in hoeveel er zijn bestelt
            setcookie($IdFiets, 1, time() + (86400 * 30), "/");
        } else {
            $data = json_decode($_COOKIE['winkelwagen'], true);
            if(in_array($IdFiets, $data)){
                $aantal = $_COOKIE[$IdFiets] +1; 
                setcookie($IdFiets, $aantal, time() + (86400 * 30), "/");
            }else{
                setcookie($IdFiets, 1, time() + (86400 * 30), "/");
                array_push($data, $IdFiets);
                setcookie('winkelwagen', json_encode($data), time() + (86400 * 30), "/");
            } 
        }

    header("Refresh: 0; url=./index.php?content=bestelling");
}else{
    header("Refresh: 0; url=./index.php?content=home");
}
?>

