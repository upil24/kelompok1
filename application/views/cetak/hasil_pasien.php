<?php

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetTitle('Cetak Pemeriksaan Pasien');
$image1 = base_url() . "assets/img/logo.jpg";
$pdf->setMargins(10, 6, 10);
$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 165, 5, 35);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 5, 'KHARISMA MEDICAL CENTER', 0, 1, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 5, 'Jl.Caman raya jatibening' . "\n" . 'Kota Bekasi' . " \n" . '021 82406456');
$pdf->SetLineWidth(0.8);
$pdf->Line(10, 28, 199, 28);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(62, 5, '', 0, 0, '');
$pdf->Cell(70, 5, 'LAPORAN HASIL PEMERIKSAAN PASIEN', 0, 1, 'C');
$pdf->SetLineWidth(0.8);
$pdf->Line(10, 42, 199, 42);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(23, 20, 'No Pasien   :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, ' ' . $pasien['kd_pasien'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(25, 20, 'Tgl Lahir     :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, $pasien['tgl_lahir'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(23, 20, 'Jenkel      :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, $pasien['jen_kel'], 0, 1, 'L');


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 10, '', 0, 0, 'L');
$pdf->Cell(23, 6, 'Nama           :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 6, '  ' . $pasien['nama'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(25, 6, 'Tgl Periksa :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 6, date("d M Y", strtotime($pasien['date_created'])), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(23, 6, 'Gol Darah:', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 6, $pasien['gol_darah'], 0, 1, 'L');

$pdf->SetLineWidth(0.8);
$pdf->Line(10, 80, 199, 80);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(25, 20, 'Dokter         :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(31, 20, $pasien['nama_dokter'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(24, 20, 'Tensi          :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, $pasien['tensi'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
//$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(24, 20, 'TB/BB      :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(31, 20, $pasien['tb_bb'], 0, 1, 'L');



$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 10, '', 0, 0, 'L');
$pdf->Cell(25, 10, 'Keluhan   :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(20, 10, $pasien['keluhan'], 0, 1, 'L');
$pdf->SetLineWidth(0.3);
$pdf->Line(44, 93, 200, 93);
$pdf->Line(44, 105, 200, 105);

$pdf->Ln(25);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 3, '', 0, 0, 'L');
$pdf->Cell(25, 10, 'Diagnosa  :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(20, 10, $pasien['diagnosa'], 0, 1, 'L');
$pdf->SetLineWidth(0.3);
$pdf->Line(44, 128, 200, 128);
$pdf->Line(44, 140, 200, 140);



$pdf->Output();
