<?php
// var_dump($pasien);
// die;
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetTitle('Cetak Pemeriksaan Rontgen');
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
$pdf->Cell(70, 5, 'LAPORAN HASIL PEMERIKSAAN RONTGEN', 0, 1, 'C');
$pdf->SetLineWidth(0.8);
$pdf->Line(10, 42, 199, 42);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(23, 20, 'No Pasien   :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, ' ' . $pasien['id'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(25, 20, 'No.Telp       :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, $pasien['no_hp'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(23, 20, 'Jenkel      :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, $pasien['jen_kel'], 0, 1, 'L');


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 10, '', 0, 0, 'L');
$pdf->Cell(23, 6, 'Nama           :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 6, '  ' . $pasien['nama_pasien'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(25, 6, 'Tgl Periksa :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 6, date('d M Y', $pasien['date_created']), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(23, 6, 'Tgl Lahir  :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 6, $pasien['tgl_lahir'], 0, 1, 'L');

$pdf->SetLineWidth(0.8);
$pdf->Line(10, 70, 199, 70);



$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(9, 40, '', 0, 0, 'L');
$pdf->Cell(24, 40, 'Hasil           :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(31, 40, $pasien['hasil'], 0, 1, 'L');
$pdf->SetLineWidth(0.3);
$pdf->Line(43, 88, 199, 88);
$pdf->Line(43, 100, 199, 100);
$pdf->Line(43, 112, 199, 112);



$pdf->Ln(25);



$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(140, 20, '', 0, 0, 'L');
$pdf->Cell(25, 60, 'Bekasi, ' . date('d F Y', $pasien['date_created']), 0, 1, 'L');
$pdf->Cell(150, 5, '', 0, 0, 'L');
$pdf->Cell(0, 10,  $pasien['dokter'], 0, 1, 'L');
$pdf->Output();
