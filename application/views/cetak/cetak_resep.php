<?php

$pdf = new FPDF('L', 'mm', 'A5');
$image1 = base_url() . "assets/img/logo.jpg";
$image2 = base_url() . "assets/img/logo.jpg";
/* tinggal diganti image yang 1 dengan logo agan*/
$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$gambar2 = $pdf->Image($image2, 160, 10, 35);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Klinik', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'Kharisma Medical Center', 0, 1, 'C');
$pdf->Cell(0, 7, 'Jl.caman raya jatibening blok n/11 Kota Bekasi', 0, 1, 'C');
$pdf->Cell(0, 7, 'Kota Bekasi', 0, 1, 'C');
$pdf->Cell(0, 7, '', 0, 5);
$pdf->Ln(-2);

$x1 = 10;
$y1 = 10;
$x2 = 10;
$y2 = 10;

$pdf->SetLineWidth(0);
$pdf->Line(12, 40, 195, 40);
$pdf->SetLineWidth(1);
$pdf->Line(12, 41, 195, 41);
$pdf->SetLineWidth(0);
$pdf->Ln(2);
$pdf->SetFont('Arial', '', 11);

$pdf->Cell(35, 6, 'Id Pembayaran : ' . $pasien['kd_rm'], 0, 1, 'L');
$pdf->Cell(20, 6, 'Nama Pasien : ' . $pasien['nama'], 0, 1, 'L');
$pdf->Cell(20, 6, 'No Kamar : ' . 'aaa', 0, 1, 'L');
$pdf->Cell(20, 6, 'Nama Kamar : ' . 'aaa', 0, 1, 'L');
$pdf->Cell(20, 6, 'Kelas Kamar : ' . 'aaa', 0, 1, 'L');
$pdf->Cell(30, 6, 'Jenis Pembayaran :' . 'aaa', 0, 1, 'L');
$pdf->Cell(30, 6, 'Lama Inap : ' . 'aaa' . ' Hari', 0, 1, 'L');
$pdf->Cell(30, 6, 'Biaya Periksa : ' . 'aaa', 0, 1, 'L');
$pdf->Cell(35, 6, 'Biaya Inap : ' . 'aaa', 0, 1, 'L');
$pdf->Cell(35, 6, 'Tanggal Bayar : ' . date('d F, Y'), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(35, 6, '', 0, 1, 'L');
$pdf->Cell(70, 8, 'Total : Rp. ' . 'aaa', 1, 1, 'L');
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(70, 8, 'Kode Pasien : ' . 'aaa', 1, 1, 'L');

$pdf->Output();
