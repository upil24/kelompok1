<?php
$pdf = new FPDF('L', 'mm', 'Legal');
$image1 = base_url() . "assets/img/logo.jpg";


$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$pdf->SetTitle('Cetak Laporan Data Dokter');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Data Dokter', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'Klinik Kharisma Medical Center', 0, 1, 'C');
$pdf->Cell(0, 7, 'Jl.caman raya jatibening blok n/11', 0, 1, 'C');
$pdf->Cell(0, 7, 'Kota Bekasi', 0, 1, 'C');
$pdf->Cell(0, 7, '', 0, 1);
$pdf->Ln(-2);
$pdf->SetLineWidth(0);
$pdf->Line(12, 40, 350, 40);
$pdf->SetLineWidth(1);
$pdf->Line(12, 41, 350, 41);
$pdf->SetLineWidth(0);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 6, '', 0, 0, 'C');
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(25, 6, 'KD Dokter', 1, 0, 'C');
$pdf->Cell(45, 6, 'Nama Dokter', 1, 0, 'C');
$pdf->Cell(45, 6, 'No SIP', 1, 0, 'C');
$pdf->Cell(30, 6, 'Spesialis', 1, 0, 'C');
$pdf->Cell(30, 6, 'Jam Praktek', 1, 0, 'C');
$pdf->Cell(30, 6, 'Hari Praktek', 1, 0, 'C');
$pdf->Cell(30, 6, 'Kontak', 1, 0, 'C');
$pdf->Cell(50, 6, 'Email', 1, 0, 'C');
$pdf->Cell(20, 6, 'Status', 1, 0, 'C');
$pdf->Cell(27, 6, 'Tanggal Masuk', 1, 1, 'C');



$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($data as $row) {
    $pdf->Cell(1, 6, '', 0, 0, 'C');
    $pdf->Cell(8, 6, $no, 1, 0, 'C');
    $pdf->Cell(25, 6, $row['kd_dokter'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['nama_dokter'], 1, 0, 'C');
    $pdf->Cell(45, 6, $row['no_sip'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['spesialis'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['jam_praktek'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['hari_praktek'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['kontak'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['email'], 1, 0, 'C');
    $pdf->Cell(20, 6, $row['status'], 1, 0, 'C');
    $pdf->Cell(27, 6, date("d M Y", strtotime($row['date_created'])), 1, 1, 'C');
    $no++;
}



$pdf->Output();
