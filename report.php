<?php
require_once './classes/db.php';
require './classes/login.php';
require './fpdf/fpdf.php';

if(!Login::isLoggedIn()){
    header('location:./login.php');
}

$result;

if(isset($_GET['date']) && $_GET['date']){
    $result = DB::query("SELECT * FROM bookings WHERE date=:date", array(":date"=>$_GET['date']));
}else{
    $result = DB::query("SELECT * FROM bookings");
}


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(180,10,'Booking Report', 0, 1, 'C');
if(!$result){
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(180,10,'This is a blank report, no data available', 0, 1, 'C');
}else{
    $pdf->SetFont('Arial','B',12);
    $pdf->Ln(8);
    $pdf->Cell(25, 7, 'Ap. ID.', 1, 0, 'C');
    $pdf->Cell(45, 7, 'Date', 1, 0, 'C');
    $pdf->Cell(45, 7, 'Slot', 1, 0, 'C');
    $pdf->Cell(70, 7, 'Name', 1, 1, 'C');
    $pdf->SetFont('Arial','',12);
}
foreach($result as $r){
    $pdf->Cell(25, 7, 'AP-'.$r['id'], 1, 0, 'C');
    $pdf->Cell(45, 7, $r['date'], 1, 0, 'C');
    $pdf->Cell(45, 7, $r['slot'], 1, 0, 'C');
    $pdf->Cell(70, 7, $r['name'], 1, 1, 'C');
}

$pdf->Output();


?>