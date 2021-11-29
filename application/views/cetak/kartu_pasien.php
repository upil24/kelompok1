<?php


$pdf = new FPDF();
$pdf->AddPage('P', 'A4');


$pdf->Image('assets/img/latar-kartu.jpg', 5, 5, 100, 56);
$pdf->Image('assets/img/logo-klinik.png', 10, 9, 10, 10);

$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(90, 5, 'KLINIK KHARISMA MEDICAL CENTER', 0, 0, 'C');
$pdf->Cell(10, 5, '', 0, 1, 'C');
$pdf->setFont('Arial', 'B', 10);

$pdf->Cell(90, 5, 'Jl.Apel No 11, Telp (021)345678', 0, 0, 'C');
$pdf->Cell(10, 5, '', 0, 1, 'C');

$pdf->SetLineWidth(0.2);
$pdf->Line(10, 20, 100, 20);
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(90, 5, 'KARTU BEROBAT', 0, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'C');
$pdf->SetLineWidth(0.2);
$pdf->Line(10, 25, 100, 25);
$pdf->Ln(10);


$pdf->setFont('Arial', '', 9);
$pdf->Cell(22, 4, 'ID Pasien', 0, 0, 'L');
$pdf->Cell(36, 4, ': ' . $pasien['kd_pasien'], 0, 0, 'L');
$pdf->Cell(10, 4, '', 0, 1, 'C');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(22, 4, 'Nama', 0, 0, 'L');
$pdf->Cell(36, 4, ': ' . $pasien['nama'], 0, 1, 'L');
$pdf->Cell(22, 4, 'Jenkel', 0, 0, 'L');
$pdf->Cell(36, 4, ': ' . $pasien['jen_kel'], 0, 1, 'L');
$pdf->Cell(22, 4, 'Tgl Daftar', 0, 0, 'L');
$pdf->Cell(36, 4, ': ' .  date("d M Y", strtotime($pasien['date_created'])), 0, 1, 'L');
$pdf->Cell(22, 4, 'Alamat', 0, 0, 'L');
$pdf->Cell(36, 4, ': ' . $pasien['alamat'], 0, 1, 'L');
$pdf->Ln(2);

$pdf->Output('cetak-kartu-berobat.pdf', 'I');
