<?php
$pdf = new FPDF('L', 'mm', 'Letter');
$image1 = base_url() . "assets/img/logo.jpg";


$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$pdf->SetTitle('Cetak Laporan Pasien');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Data Pasien', 0, 1, 'C');
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
$pdf->Cell(55, 6, 'Nama Pasien', 1, 0, 'C');
$pdf->Cell(30, 6, 'No.Pasien', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tanggal Lahir', 1, 0, 'C');
$pdf->Cell(30, 6, 'Kontak', 1, 0, 'C');
$pdf->Cell(30, 6, 'Gender', 1, 0, 'C');
$pdf->Cell(30, 6, 'Pekerjaan', 1, 0, 'C');
$pdf->Cell(45, 6, 'Tanggal Daftar', 1, 1, 'C');



$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($pasien as $row) {
    $pdf->Cell(2, 6, '', 0, 0, 'C');
    $pdf->Cell(8, 6, $no, 1, 0, 'C');
    $pdf->Cell(55, 6, $row['nama'], 1, 0, 'L');
    $pdf->Cell(30, 6, $row['kd_pasien'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['tgl_lahir'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['kontak'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['jen_kel'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['pekerjaan'], 1, 0, 'C');
    $pdf->Cell(45, 6, date("d M Y", strtotime($row['date_created'])), 1, 1, 'C');
    $no++;
}



$pdf->Output();
