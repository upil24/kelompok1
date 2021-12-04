<?php
// var_dump($riwayat);
// die;
$pdf = new FPDF('L', 'mm', 'A5');
$image1 = base_url() . "assets/img/logo.jpg";
$image2 = base_url() . "assets/img/logo.jpg";
/* tinggal diganti image yang 1 dengan logo agan*/
$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$gambar2 = $pdf->Image($image2, 160, 10, 35);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Rekam Medis Pasien', 0, 1, 'C');
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
$pdf->Cell(60, 8, 'Kode Pasien       : ' . $pasien['kd_pasien'], 0, 1, 'L');
$pdf->Cell(60, 8, 'Nama Pasien      : ' . $pasien['nama'], 0, 1, 'L');
$pdf->Cell(60, 8, 'Tanggal Lahir     : ' . $pasien['tgl_lahir'], 0, 1, 'L');
$pdf->Cell(60, 8, 'No KTP                : ' . $pasien['no_ktp'], 0, 1, 'L');
$pdf->Cell(70, 8, 'No BPJS              : ' . $pasien['no_bpjs'], 0, 1, 'L');
$pdf->Cell(70, 8, 'Alamat                 : ' . $pasien['alamat'], 0, 1, 'L');
$pdf->Cell(70, 8, 'No Telpon           : ' . $pasien['kontak'], 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 6, '', 0, 0, 'C');
$pdf->Cell(15, 6, 'No', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tanggal Berobat', 1, 0, 'C');
$pdf->Cell(45, 6, 'Keluhan', 1, 0, 'C');
$pdf->Cell(60, 6, 'Diagnosa', 1, 0, 'C');
$pdf->Cell(40, 6, 'Dokter', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($riwayat as $row) {
    $pdf->Cell(1, 6, '', 0, 0, 'C');
    $pdf->Cell(15, 6, $no, 1, 0, 'C');
    $pdf->Cell(30, 6, date("d M Y", strtotime($row['date_created'])), 1, 0, 'C');
    $pdf->Cell(45, 6, $row['keluhan'], 1, 0, 'C');
    $pdf->Cell(60, 6, $row['diagnosa'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['nama_dokter'], 1, 1, 'C');
    $no++;
}



$pdf->Output();
