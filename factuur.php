<?php
$id = $_GET['id'];
$idv = $_GET['idv'];

if(password_verify($id, $idv)){
    require_once("./fuctions/connect_db.php");
    require('./fpdf/fpdf.php');


    //haalt alle gegevens uit de database
    $sql = "SELECT factuurcode, date_format(Factuurdatum, '%d/%m/%Y') as factuurdatum, btw, Klant_id FROM `factuur` WHERE factuurcode = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $factuurCode = $row["factuurcode"];
    $factuurdatum = $row["factuurdatum"];
    $btw = $row["btw"];
    $klantId = $row["Klant_id"];

    // $sql = "SELECT * FROM `factuurregel` WHERE factuurcode = $id";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();

    class PDF extends FPDF{
        //Page header
        function Header()
        {
            //Logo
            $this->Image('./img/logo3.png',10,8,66);
            //Beweeg naar rechts
            $this->Cell(80);
            //Line break
            $this->Ln(20);

        }

        
    }
    $hoogte = 90;
    $totaalbedrag = NULL;

    //Instanciation of inherited class
    $pdf=new PDF();
    define('EURO',chr(128));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',20);    
    $pdf->Cell(100,50,'Factuur: ' . $id);
    $pdf->Cell(0,50,'Factuurdatum: ' . $factuurdatum, 0,1);
    $pdf->SetFont('Arial','',13);    
    $pdf->Cell(20,5,'Aantal');
    $pdf->Cell(106,5,'Omschrijving');
    $pdf->Cell(41,5,'Bedrag');
    $pdf->Cell(158,5,'Bedrag',0,1);
    $pdf->Cell(20,5);
    $pdf->Cell(100,5);
    $pdf->Cell(42,5,'excl. BTW');
    $pdf->Cell(13,5,'incl. BTW',0,1);
    $pdf->Line( 10, 90, 193, 90);
    
    $sql = "SELECT productcode, aantal FROM factuurregel WHERE factuurcode = $factuurCode";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $aantal = $row["aantal"];
            $productCode = $row["productcode"];

            $sql = "SELECT kosten, productNaam FROM product WHERE productCode = $productCode";
            $resultP = $conn->query($sql);
            $row = $resultP->fetch_assoc();

            $kosten = round($row["kosten"]*$aantal,2);
            $kostenExBtw = round($kosten*(100-$btw)/100,2);
            $productNaam = $row["productNaam"];

            $pdf->Cell(20,7,$aantal);
            $pdf->Cell(82,7,$productNaam);
            $pdf->Cell(41,7,EURO." ".number_format($kostenExBtw,2,',','.'),'','','R');
            $pdf->Cell(41,7,EURO." ".number_format($kosten,2,',','.'),0,1,'R');
            $pdf->SetFont('Arial', '',10);
            $pdf->Cell(184,2,$btw . "% BTW" ,0,1,'R');
            $pdf->Cell(1,1,'',0,1);
            $pdf->SetFont('Arial', '',13);
            $hoogte = $hoogte + 10;
            $totaalbedrag = round($totaalbedrag + $kosten,2);
        }
    } else {
        echo "Geen produckten gevonden";
    }
    $pdf->Line( 10, $hoogte, 193, $hoogte);

    $pdf->Cell(20,7);
    $pdf->Cell(82,7);
    $pdf->SetFont('Arial','',15);
    $pdf->Cell(41,7, 'Totaalbedrag excl. BTW','','','R');
    $pdf->Cell(41,7,EURO." ".number_format($totaalbedrag*79/100,2,',','.'),0,1,'R');
    $pdf->Cell(20,7);
    $pdf->Cell(82,7);
    $pdf->Cell(41,7, 'BTW','','','R');
    $pdf->Cell(41,7,EURO." ".number_format($totaalbedrag-($totaalbedrag*79/100),2,',','.'),0,1,'R');

    $pdf->Line( 10, $hoogte+14, 193, $hoogte+14);

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(20,7);
    $pdf->Cell(82,7);
    $pdf->Cell(41,7, 'Totaalbedrag incl. BTW','','','R');
    $pdf->Cell(41,7,EURO." ".number_format($totaalbedrag,2,',','.'),0,1,'R');

    $pdf->Output();
}else{
    header("Refresh: 0; url=./index.php?content=home");
}

?>