-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2021 pada 13.46
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `kd_antrian` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`kd_antrian`, `kd_pasien`, `tanggal`) VALUES
('241121001', 'PSN231121001', '2021-11-24 14:27:31'),
('241121002', 'PSN241121001', '2021-11-24 16:49:49'),
('241121003', 'PSN211121002', '2021-11-24 16:56:53'),
('251121001', 'PSN211121001', '2021-11-24 17:00:16'),
('251121002', 'PSN251121001', '2021-11-24 17:01:22'),
('271121001', 'PSN251121001', '2021-11-27 12:47:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `billing_obat`
--

CREATE TABLE `billing_obat` (
  `kd_billing_obat` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL,
  `kd_rm` varchar(16) NOT NULL,
  `tgl_bayar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `billing_obat`
--

INSERT INTO `billing_obat` (`kd_billing_obat`, `kd_pasien`, `kd_rm`, `tgl_bayar`, `total`, `status`, `date_created`) VALUES
('031221001', 'PSN251121001', 'RM261121002', 20211203, 5000, 'Selesai', '2021-12-03 10:13:07'),
('031221002', 'PSN231121001', 'RM031221001', 20211203, 5000, 'Selesai', '2021-12-03 10:20:34'),
('031221003', 'PSN231121001', 'RM251121001', 20211203, 19000, 'Selesai', '2021-12-03 11:30:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `billing_pemeriksaan`
--

CREATE TABLE `billing_pemeriksaan` (
  `kd_billing_periksa` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL,
  `kd_rm` varchar(16) NOT NULL,
  `tgl_bayar` int(11) NOT NULL,
  `total` int(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `billing_pemeriksaan`
--

INSERT INTO `billing_pemeriksaan` (`kd_billing_periksa`, `kd_pasien`, `kd_rm`, `tgl_bayar`, `total`, `status`, `date_created`) VALUES
('031221001', 'PSN231121001', 'RM251121001', 20211203, 125000, 'Selesai', '2021-12-03 12:08:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tindakan`
--

CREATE TABLE `detail_tindakan` (
  `kd_detail` int(16) NOT NULL,
  `kd_tindakan` varchar(16) NOT NULL,
  `kd_rm` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_tindakan`
--

INSERT INTO `detail_tindakan` (`kd_detail`, `kd_tindakan`, `kd_rm`) VALUES
(1, 'TDK0001', 'RM251121001'),
(2, 'TDK0002', 'RM251121001'),
(4, 'TDK0004', 'RM251121001'),
(5, 'TDK0002', 'RM251121002'),
(6, 'TDK0001', 'RM251121002'),
(7, 'TDK0001', 'RM261121001'),
(8, 'TDK0002', 'RM261121001'),
(9, 'TDK0001', 'RM261121002'),
(10, 'TDK0002', 'RM271121001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `kd_dokter` varchar(16) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `no_sip` varchar(30) NOT NULL,
  `jen_kel` varchar(10) NOT NULL,
  `spesialis` varchar(25) NOT NULL,
  `jam_praktek` varchar(15) NOT NULL,
  `hari_praktek` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `nama_dokter`, `no_sip`, `jen_kel`, `spesialis`, `jam_praktek`, `hari_praktek`, `alamat`, `kontak`, `email`, `status`, `date_created`, `last_update`) VALUES
('DKT0001', 'Dr.Boykeee', '133215545456/nas/23423', 'PRIA', 'Umum', '10:00 - 16:00', 'Senin - Jumat', 'Jl.mutiara raya', '081210309267', 'bilqiest91@gmail.com', 'AKTIF', 1637832706, 1637836926),
('DKT0002', 'dr.jourdan', '133215545456/nas/23423', 'PRIA', 'Umum', '10:00 - 16:00', 'Senin - Jumat', 'Jl.mutiara raya', '081210309267', 'bikinnamaajaribet@gmail.com', 'AKTIF', 1637857661, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(16) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kd_obat`, `nama_obat`, `satuan`, `harga_beli`, `harga_jual`, `date_created`, `last_update`) VALUES
('OBT0001', 'Paramex', 'Strip isi 10 Tablet', 3500, 5000, 1637841466, 1638117953),
('OBT0002', 'Panadol', 'Strip isi 10 Tablet', 4500, 7000, 1637841889, 1637931022),
('OBT0003', 'Dextral', 'Strip isi 10 Tablet', 7500, 10000, 1637841940, 1637931027);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `kd_pasien` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `jen_kel` enum('PRIA','WANITA') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pelayanan` varchar(5) NOT NULL,
  `no_bpjs` varchar(30) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nama`, `kontak`, `jen_kel`, `tgl_lahir`, `umur`, `pekerjaan`, `email`, `no_ktp`, `alamat`, `pelayanan`, `no_bpjs`, `gol_darah`, `date_created`, `last_update`) VALUES
('PSN211121001', 'pasien baru9', '081210309267', 'PRIA', '2000-10-31', 21, 'asdsadsa', 'tes@gmail.com', '1234', 'Jl.mutiara raya', 'UMUM', '', 'A', '2021-11-21 15:14:03', 1638354252),
('PSN211121002', 'Monalisa', '081210309267', 'WANITA', '2000-02-01', 21, 'Karyawati', 'tes@gmail.com', '3212504189600211', 'Jl.mutiara rayasdsdfsdf blok c/5 bekasi timur', 'BPJS', '123456789', 'AB', '2021-11-21 15:14:10', 1638477471),
('PSN221121001', 'pasien baru7', '081210309267', 'WANITA', '1990-03-07', 31, 'Mahasiswa', 'nurse@gmail.com', '6546546565656565656', 'Jl.mutiara raya', 'UMUM', '', 'O', '2021-11-21 17:01:30', 1637993300),
('PSN231121001', 'Jourdan', '081210309267', 'PRIA', '1991-04-24', 30, 'Mahasiswa', 'bilqiest91@gmail.com', '6546546565656565656', 'Jl.mutiara raya blok c/5 bekasi timur', 'UMUM', 'asda', 'B', '2021-11-23 07:41:51', 1637761273),
('PSN241121001', 'HOHOHOHOH', '081210309267', 'PRIA', '2021-10-31', 21, 'Mahasiswa', 'bilqiest91@gmail.com', '6546546565656565656', 'Jl.mutiara raya', 'UMUM', '34234', 'B', '2021-11-24 14:11:23', 1637993246),
('PSN251121001', 'roy kusnandar', '1212121212', 'PRIA', '2000-03-01', 21, 'Mahasiswa', 'bilqiest91@gmail.com', '1346548454546', 'Jl.mutiara raya', 'UMUM', '34234', 'B', '2021-11-24 17:01:08', 1637993272);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `kd_rm` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL,
  `kd_dokter` varchar(16) NOT NULL,
  `tensi` varchar(10) NOT NULL,
  `tb_bb` varchar(15) NOT NULL,
  `alergi` varchar(70) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` int(11) NOT NULL,
  `status_periksa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`kd_rm`, `kd_pasien`, `kd_dokter`, `tensi`, `tb_bb`, `alergi`, `keluhan`, `diagnosa`, `date_created`, `last_update`, `status_periksa`) VALUES
('RM031221001', 'PSN231121001', 'DKT0001', '120/100', '180cm/72kg', '-', 'Pusing', 'Banyak pikiran', '2021-12-02 20:42:36', 1638479306, 'Done'),
('RM251121001', 'PSN231121001', 'DKT0001', '120/100', '165cm/70kg', '-', 'Sakit Perut', 'Makan sambel menyebabkan diare', '2021-11-25 16:27:11', 0, 'Done'),
('RM261121001', 'PSN241121001', 'DKT0002', '120/100', '180cm/72kg', '-', 'batuk', 'kebanyakan makan gorengan', '2021-11-25 17:27:59', 0, 'Done'),
('RM261121002', 'PSN251121001', 'DKT0001', '120/90', '180cm/72kg', '-', 'Tangan kanan Luka', 'Jatuh dari motor', '2021-11-25 17:28:43', 0, 'Done'),
('RM271121001', 'PSN221121001', 'DKT0002', '120/100', '165cm/70kg', '-', 'laper', 'belum makan ternyata', '2021-11-27 08:13:56', 0, 'Done'),
('RM301121001', 'PSN211121002', 'DKT0001', '', '', '', '', '', '2021-11-30 15:00:56', 0, 'Belum Periksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `kd_resep` int(11) NOT NULL,
  `kd_rm` varchar(16) NOT NULL,
  `kd_obat` varchar(16) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`kd_resep`, `kd_rm`, `kd_obat`, `jumlah`, `keterangan`) VALUES
(4, 'RM261121002', 'OBT0001', 1, ''),
(6, 'RM251121002', 'OBT0003', 3, ''),
(7, 'RM261121001', 'OBT0003', 1, ''),
(12, 'RM251121001', 'OBT0001', 1, '3x1 setelah makan'),
(13, 'RM251121001', 'OBT0002', 2, '2x1 setelah makan'),
(15, 'RM031221001', 'OBT0001', 1, '2x1 setelah makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `kd_tindakan` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `penjelasan` varchar(255) NOT NULL,
  `tarif` int(10) NOT NULL,
  `lama_tindakan` varchar(10) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `nama`, `penjelasan`, `tarif`, `lama_tindakan`, `date_created`, `last_update`) VALUES
('TDK0001', 'Anamnesa', 'Anamnesa', 25000, '10menit', 1637842973, 1638099713),
('TDK0002', 'Konsultasi Dokter', 'Konsultasi', 50000, '20-30menit', 1637843014, 0),
('TDK0003', 'Pasang/Ganti Perban', 'Pasang/Ganti Perban', 50000, '20-30menit', 1637843056, 0),
('TDK0004', 'Pijit', 'pijit biasa', 50000, '30menit', 1637945941, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'jourdan', 'bikinnamaajaribet@gmail.com', 'pro1636372157.JPG', '$2y$10$0JN7FVnqglsJv2STFlS85O1gatX9kakdsx9OLDG24XPLX9QNUrp/O', 1, 1, 1631992072),
(24, 'Dr.Titin', 'dokter@gmail.com', 'pro1632734572.jpg', '$2y$10$5EXeme8R6JTvynpvhZrmgOMPPxhlq2fUrZ6gE9VoeR4f.l6Xa2Lqm', 2, 1, 1632130638),
(30, 'pendaftaran', 'pendaftaran@gmail.com', 'default.jpg', '$2y$10$11ZJpgHt9j5GKWPBHXla9ur0s2MmsKAOCGQV7Xb3J7e/Z/dmZ2Nya', 4, 1, 1632158644),
(43, 'administratorr', 'admin@gmail.com', 'pro1637820613.png', '$2y$10$pgXE0i/e24177oWxfk7QS.GO8USIX7DFNr/sZi3ezsMB8bMhK51iS', 1, 1, 1633516693),
(44, 'Dr.Boyke', 'dokter2@gmail.com', 'default.jpg', '$2y$10$OzyHDXZiKVsoKXyjVbOi6eHC3nmq9Bk6JcvffwxsFNbZhhC3KrrLC', 2, 1, 1633516733),
(47, 'kasir', 'kasir@gmail.com', 'default.jpg', '$2y$10$ug.izaCvAnKzzdUyrai59ONdtTsfN/r8uQ5CIBd74dQPXZUroy5j.', 3, 1, 1637820855),
(50, 'Super', 'super@gmail.com', 'default.jpg', '$2y$10$Em64vg0UGIANqbZz3l9Axu6RMOTsRv1SShHj2p4lPGd.hUkcwziSy', 5, 1, 1638212193);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 5),
(4, 1, 7),
(5, 4, 1),
(6, 4, 2),
(7, 4, 7),
(8, 2, 1),
(9, 2, 4),
(10, 2, 7),
(11, 3, 1),
(12, 3, 6),
(13, 3, 7),
(14, 5, 1),
(15, 5, 2),
(16, 5, 3),
(17, 5, 4),
(18, 5, 5),
(19, 5, 6),
(20, 5, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'Pendaftaran'),
(3, 'Master Data'),
(4, 'Rekam Medis'),
(5, 'Laporan'),
(6, 'Transaksi'),
(7, 'My Profile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Dokter'),
(3, 'Kasir'),
(4, 'Pendaftaran'),
(5, 'Super');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Pasien', 'pasien', 'fas fa-fw fa-cash-register', 1),
(3, 3, 'Data Pasien', 'pasien', 'fas fa-fw fa-user-injured', 1),
(4, 3, 'Data Dokter', 'Dokter', 'fas fa-fw fa-user-md', 1),
(5, 3, 'Data Obat', 'Obat', 'fas fa-fw fa-capsules', 1),
(6, 3, 'Data User', 'User', 'fas fa-fw fa-users', 1),
(7, 4, 'Rekam Medis', 'RekamMedis', 'fas fa-fw fa-notes-medical', 1),
(8, 5, 'Laporan', 'Laporan', 'far fa-fw fa-file-alt', 1),
(12, 7, 'My Profile', 'MyProfile', 'fas fa-fw fa-address-card', 1),
(13, 6, 'Billing Pemeriksaan', 'Billing_Pemeriksaan', 'fas fa-fw fa-file-invoice-dollar', 1),
(14, 6, 'Tebus Obat', 'Billing_Obat', 'fas fa-fw fa-dollar-sign', 1),
(15, 2, 'Antrian', 'Antrian', 'fas fa-fw fa-sort', 1),
(16, 3, 'Data Tindakan', 'tindakan', 'fas fa-fw fa-clipboard-check', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`kd_antrian`);

--
-- Indeks untuk tabel `billing_obat`
--
ALTER TABLE `billing_obat`
  ADD PRIMARY KEY (`kd_billing_obat`);

--
-- Indeks untuk tabel `billing_pemeriksaan`
--
ALTER TABLE `billing_pemeriksaan`
  ADD PRIMARY KEY (`kd_billing_periksa`);

--
-- Indeks untuk tabel `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  ADD PRIMARY KEY (`kd_detail`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kd_dokter`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`kd_rm`);

--
-- Indeks untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`kd_resep`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kd_tindakan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  MODIFY `kd_detail` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `kd_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
