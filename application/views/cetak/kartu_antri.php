<?php
$a = $pasien['kd_antrian'];
$no_antri = substr($a, 6);


$pdf = new FPDF();
$pdf->AddPage('P', 'A4');


$pdf->Image('assets/img/antrian.jpg', 5, 5, 90, 90);


$pdf->setFont('Arial', 'B', 50);
$pdf->Cell(80, 95, $no_antri, 0, 0, 'C');
$pdf->Cell(10, 5, '', 0, 1, 'C');
$pdf->Output('cetak-kartu-berobat.pdf', 'I');
