<?php
// var_dump($hasil);
// die;
$pdf = new FPDF('L', 'mm', 'A5');
$image1 = base_url() . "assets/img/logo.jpg";
$image2 = base_url() . "assets/img/logo.jpg";
/* tinggal diganti image yang 1 dengan logo agan*/
$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$gambar2 = $pdf->Image($image2, 160, 10, 35);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Kwitansi Tebus Obat', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'Klinik Kharisma Medical Center', 0, 1, 'C');
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

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 6, '', 0, 1, 'L');
$pdf->Cell(60, 8, 'Kode Bayar       : ' . $biodata['kd_billing_obat'], 0, 0, 'L');
$pdf->Cell(60, 8, 'Kode Pasien      : ' . $biodata['kd_pasien'], 0, 0, 'L');
$pdf->Cell(60, 8, 'Kode RM     : ' . $biodata['kd_rm'], 0, 1, 'L');
$pdf->Cell(60, 8, 'Nama Pasien     : ' . $biodata['nama'], 0, 1, 'L');


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 6, '', 0, 0, 'C');
$pdf->Cell(15, 6, 'No', 1, 0, 'C');
$pdf->Cell(50, 6, 'Nama Obat', 1, 0, 'C');
$pdf->Cell(40, 6, 'Harga', 1, 0, 'C');
$pdf->Cell(30, 6, 'Jumlah', 1, 0, 'C');
$pdf->Cell(50, 6, 'Total', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$total = 0;
$no = 1;
foreach ($hasil as $row) {
    $sub = $row['jumlah'] * $row['harga_jual'];
    $total += $sub;
    $pdf->Cell(1, 6, '', 0, 0, 'C');
    $pdf->Cell(15, 6, $no, 1, 0, 'C');
    $pdf->Cell(50, 6, $row['nama_obat'], 1, 0, 'C');
    $pdf->Cell(40, 6, 'Rp.' . $row['harga_jual'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['jumlah'], 1, 0, 'C');
    $pdf->Cell(50, 6, 'Rp.' . $sub, 1, 1, 'C');
    $no++;
}
$pdf->Cell(136, 6,  '', 0, 0, 'C');
$pdf->Cell(50, 6,  'Rp.' . $total, 1, 1, 'C');


$pdf->Output();
