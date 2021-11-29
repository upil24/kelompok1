<?php
$pdf = new FPDF('L', 'mm', 'Letter');
$image1 = base_url() . "assets/img/logo.jpg";


$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$pdf->SetTitle('Cetak Laporan Kunjungan Pasien');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Kunjungan Pasien', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'Klinik Kharisma Medical Center', 0, 1, 'C');
$pdf->Cell(0, 7, 'Jl.caman raya jatibening blok n/11', 0, 1, 'C');
$pdf->Cell(0, 7, 'Kota Bekasi', 0, 1, 'C');
$pdf->Cell(0, 7, '', 0, 1);
$pdf->Ln(-2);
$pdf->SetLineWidth(0);
$pdf->Line(12, 40, 270, 40);
$pdf->SetLineWidth(1);
$pdf->Line(12, 41, 270, 41);
$pdf->SetLineWidth(0);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(2, 6, '', 0, 0, 'C');
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(30, 6, 'No Antrian', 1, 0, 'C');
$pdf->Cell(40, 6, 'Nama Pasien', 1, 0, 'C');
$pdf->Cell(30, 6, 'Nama Dokter', 1, 0, 'C');
$pdf->Cell(45, 6, 'Keluhan', 1, 0, 'C');
$pdf->Cell(60, 6, 'Diagnosa', 1, 0, 'C');
$pdf->Cell(45, 6, 'Tanggal', 1, 1, 'C');



$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($data as $row) {
    $pdf->Cell(2, 6, '', 0, 0, 'C');
    $pdf->Cell(8, 6, $no, 1, 0, 'C');
    $pdf->Cell(30, 6, $row['kd_antrian'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['nama'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nama_dokter'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['keluhan'], 1, 0, 'C');
    $pdf->Cell(60, 6, $row['diagnosa'], 1, 0, 'C');
    $pdf->Cell(45, 6, date("d M Y", strtotime($row['date_created'])), 1, 1, 'C');
    $no++;
}



$pdf->Output();
