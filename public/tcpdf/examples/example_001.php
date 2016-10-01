<?php
include('../fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Image("photos/page1.jpg",0,0,210,297);
$pdf->SetXY(90,260);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(0,15,"imprimé le ".date("d/m/Y"));
$pdf->Output();
