<?php
$productCode = $_POST['productCode'];
$aantal = $_POST['select'];

echo $productCode;
echo $aantal;

if(isset($aantal)){
    if(isset($_COOKIE[$productCode])) {            
        setcookie($productCode, $aantal, time() + (86400 * 30), "/");
        header("Refresh: 0; url=./index.php?content=bestelling");
    } else {
        echo"er is helaas iets mis gegaan";
        header("Refresh: 3; url=./index.php?content=bestelling");
    }
}else{
    echo"er is helaas iets mis gegaan";
    header("Refresh: 3; url=./index.php?content=bestelling");
}