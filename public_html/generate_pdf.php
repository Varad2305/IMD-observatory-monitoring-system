<?php
//include connection file 

include_once('./utilities/db_connection.php');
include_once('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
    function Header()
    {   
        // Logo
        //$this->Image('logo.png',10,-1,70);
        $this->SetFont('Arial','B',15);
        // Move to the right
        //$this->Cell(60 , 10 , '' , 0, 0 );
        //Image
        $this->Cell(75 , 10 , '' , 0, 0 );
        $this->Image('icon.jpeg' , null , null , 35 , 35);
        // Title
        $this->Cell(35, 10 ,'India Meteorological Department',0,0,'C');
        
        // Line break
        //$this->Line(0 , 25 , 220 , 25);

        $this->Ln(20);

    //    $this->Cell()
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$display_heading = array('instrument'=>'Instrument', 'working'=> 'Working', 'remark'=> 'Remark');

$result = getResult("SELECT instrument, working, remark FROM report WHERE date_recorded = '2019-07-03' AND observatory = 'Station' AND type = 'AWS';");
$header = array('instrument','working','remark');

$working = array('1'=>'Working' , '0'=>'Not Working' , '-1'=>'Not Available');

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);

$pdf->Cell(40 , 12 , 'Date : '. date("Y/m/d"), 0 , 1);
$pdf->Cell(40 , 12 , 'Date of Report Submission : ' , 0 ,1 );
$pdf->Cell(40 , 12 , 'Type of observatory : ' , 0 ,1 );
$pdf->Cell(40 , 12 , 'Name of Observatory : ' , 0 ,1 );
$pdf->Cell(40 , 12 , 'State : ' , 0 ,1 );
$pdf->Cell(80);
$pdf->Cell(40 , 12 , 'Report of Instruments' , 0 ,1 , 'C');

$pdf->SetFont('Arial','B',12);
// foreach($header as $heading) {
//     $pdf->Cell(40,12,$display_heading[$heading],1 , 0 , 'C');
// }

$pdf->Cell(80,10,'Instrument',1 , 0 , 'C');
$pdf->Cell(26,10,'Working',1 , 0 , 'C');
$pdf->Cell(80,10,'Remark',1 , 0 , 'C');

$pdf->SetFont('Arial','',12);

foreach($result as $row) {
    $pdf->Ln();
    foreach($row as $column){
        if($column == '0'){
            $pdf->setFillColor(255,0,0);
            $pdf->Cell(26,10,$working[$column],1 , 0 , 'C' , 1);
        }
        else if ($column == '1'){
            $pdf->setFillColor(0,255,0);
            $pdf->Cell(26,10,$working[$column],1 , 0 , 'C' , 1);
        }
        else if ($column == '-1'){
            $pdf->setFillColor(128,128,128);
            $pdf->Cell(26,10,$working[$column],1 , 0 , 'C' , 1);
        }
        else{
            $pdf->setFillColor(255,255,255);
            $pdf->Cell(80,10,$column,1 , 0 , 'C');
        }
    }
}

$images = getResult( "SELECT * FROM images where date_recorded = '2019-07-04' and observatory = 'Thane' and type = 'MWO';");
while ($row = mysqli_fetch_array($images)) {
    $pdf->AddPage();
    $pdf->image('images/'.$row['image'] , 10 , 65 , -180 ,-180);
}

$pdf->Output();

?>