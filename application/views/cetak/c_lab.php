<?php

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetTitle('Cetak Hasil Lab');
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
$pdf->Cell(70, 5, 'LAPORAN HASIL PEMERIKSAAN LABORATORIUM', 0, 1, 'C');
$pdf->SetLineWidth(0.8);
$pdf->Line(10, 42, 199, 42);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(1, 20, '', 0, 0, 'L');
$pdf->Cell(23, 20, 'No Pasien   :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 20, ' ' . $pasien['id_pasien'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(25, 20, 'No.Telp       :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, $pasien['no_hp'], 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(23, 20, 'Jenkel      :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40, 20, $pasien['jen_kel'], 0, 1, 'L');


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(1, 10, '', 0, 0, 'L');
$pdf->Cell(23, 6, 'Nama           :', 0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 6, '  ' . $pasien['nama_pasien'], 0, 0, 'L');
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
$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(80, 22, 'Pemeriksaan',  0, 0, 'L');
$pdf->Cell(50, 22, 'Hasil',  0, 0, 'L');
$pdf->Cell(25, 22, 'Nilai Normal / Satuan',  0, 1, 'L');

$pdf->Line(10, 82, 199, 82);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(10, 20, '', 0, 0, 'L');
$pdf->Cell(80, 10, 'Hematologi',  0, 1, 'L');

$pdf->Cell(12, 20, '', 0, 0, 'L');
$pdf->Cell(76, 10, '- Hemoglobin',  0, 0, 'L');
$pdf->Cell(60, 10, $pasien['hemoglobin'],  0, 0, 'L');
$pdf->Cell(76, 10, 'g/dL',  0, 1, 'L');

$pdf->Cell(12, 20, '', 0, 0, 'L');
$pdf->Cell(76, 10, '- Hematokrit',  0, 0, 'L');
$pdf->Cell(60, 10, $pasien['hematokrit'],  0, 0, 'L');
$pdf->Cell(76, 10, '%',  0, 1, 'L');

$pdf->Cell(12, 20, '', 0, 0, 'L');
$pdf->Cell(76, 10, '- Leukosit',  0, 0, 'L');
$pdf->Cell(60, 10, $pasien['leukosit'],  0, 0, 'L');
$pdf->Cell(76, 10, '10^3/uL', 0, 1, 'L');

$pdf->Cell(12, 20, '', 0, 0, 'L');
$pdf->Cell(76, 10, '- Trombosit',  0, 0, 'L');
$pdf->Cell(60, 10, $pasien['trombosit'],  0, 0, 'L');
$pdf->Cell(76, 10, '10^3/uL', 0, 1, 'L');

$pdf->Line(10, 140, 199, 140);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(23, 18, 'Catatan    :',  0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(76, 18, $pasien['catatan'],  0, 1, 'L');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8, 20, '', 0, 0, 'L');
$pdf->Cell(23, 10, 'Spesimen :',  0, 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(76, 10, $pasien['spesimen'],  0, 1, 'L');


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(140, 20, '', 0, 0, 'L');
$pdf->Cell(25, 60, 'Bekasi, ' . date('d F Y', $pasien['date_created']), 0, 1, 'L');
$pdf->Cell(155, 5, '', 0, 0, 'L');
$pdf->Cell(0, 10,  $pasien['petugas'], 0, 1, 'L');
$pdf->Output();
