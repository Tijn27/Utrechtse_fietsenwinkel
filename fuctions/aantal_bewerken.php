<?php
// $productCode = $_POST['productCode'];

// if(isset($_POST["0"])){
//     echo"yeah";
//     $aantal = $_POST['0'];
//         if(isset($_COOKIE[$productCode])) {            
//             setcookie($productCode, $aantal, time() + (86400 * 30), "/");
//         } else {
//         }

//     // header("Refresh: 0; url=./index.php?content=producten");
// }else{
//     echo"oei";
//     // header("Refresh: 0; url=./index.php?content=producten");
// }




require_once("./fuctions/connect_db.php");
$aantal = $_POST["1"];


if(!isset($_COOKIE['winkelwagen'])) {
    header("Refresh: 0; url=./index.php?content=producten");
}elseif($_COOKIE['winkelwagen'] == '[]'){
    header("Refresh: 0; url=./index.php?content=producten");
}else {
    $winkelwagen = json_decode($_COOKIE['winkelwagen'], true);
    foreach($winkelwagen as $value){
        $sql = "SELECT * FROM product WHERE productCode = '$value'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo $row["productCode"] . "              " . $aantal . "<br>";
    }
}
?>