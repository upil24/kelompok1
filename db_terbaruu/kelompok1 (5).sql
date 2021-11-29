-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2021 pada 18.09
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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`kd_antrian`, `kd_pasien`, `tanggal`, `status`) VALUES
('241121001', 'PSN231121001', '2021-11-24 14:27:31', 'Belum Periksa'),
('241121002', 'PSN241121001', '2021-11-24 16:49:49', 'Belum Periksa'),
('241121003', 'PSN211121002', '2021-11-24 16:56:53', 'Belum Periksa'),
('251121001', 'PSN211121001', '2021-11-24 17:00:16', 'Belum Periksa'),
('251121002', 'PSN251121001', '2021-11-24 17:01:22', 'Belum Periksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `billing_obat`
--

CREATE TABLE `billing_obat` (
  `kd_billing_obat` varchar(16) NOT NULL,
  `kd_pasien` int(11) NOT NULL,
  `kd_rm` int(11) NOT NULL,
  `tgl_bayar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tindakan`
--

CREATE TABLE `detail_tindakan` (
  `kd_detail` varchar(16) NOT NULL,
  `kd_tindakan` varchar(16) NOT NULL,
  `kd_rm` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `kd_dokter` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_sip` varchar(30) NOT NULL,
  `jen_kel` varchar(10) NOT NULL,
  `spesialis` varchar(25) NOT NULL,
  `jam_praktek` varchar(15) NOT NULL,
  `hari_praktek` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('PSN211121001', 'pasien baru7', '081210309267', 'PRIA', '1900-10-31', 12, 'asdsadsa', 'tes@gmail.com', '1234', 'Jl.mutiara raya', 'UMUM', '', 'A', '2021-11-21 15:14:03', 1637772880),
('PSN211121002', 'sdfsdsfsdf', '081210309267', 'WANITA', '1900-10-31', 23, 'sadaaa', 'tes@gmail.com', '6546546565656565656', 'Jl.mutiara rayasdsdfsdf', 'BPJS', '23234234', 'AB', '2021-11-21 15:14:10', 1637772907),
('PSN221121001', 'pasien baru7', '081210309267', 'WANITA', '0000-00-00', 34, 'Mahasiswa', 'nurse@gmail.com', '6546546565656565656', 'Jl.mutiara raya', 'UMUM', '', 'O', '2021-11-21 17:01:30', 1637772976),
('PSN231121001', 'Jourdan', '081210309267', 'PRIA', '1991-04-24', 30, 'Mahasiswa', 'bilqiest91@gmail.com', '6546546565656565656', 'Jl.mutiara raya blok c/5 bekasi timur', 'UMUM', 'asda', 'B', '2021-11-23 07:41:51', 1637761273),
('PSN241121001', 'HOHOHOHOH', '081210309267', 'PRIA', '2021-10-31', 25, 'Mahasiswa', 'bilqiest91@gmail.com', '6546546565656565656', 'Jl.mutiara raya', 'UMUM', '34234', 'B', '2021-11-24 14:11:23', 0),
('PSN251121001', 'roy kusnandar', '1212121212', 'PRIA', '2000-03-01', 25, 'Mahasiswa', 'bilqiest91@gmail.com', '1346548454546', 'Jl.mutiara raya', 'UMUM', '34234', 'B', '2021-11-24 17:01:08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `kd_rm` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL,
  `kd_dokter` varchar(16) NOT NULL,
  `tensi` varchar(10) NOT NULL,
  `alergi` varchar(70) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `kd_resep` varchar(16) NOT NULL,
  `kd_rm` varchar(16) NOT NULL,
  `kd_obat` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `kd_tindakan` varchar(16) NOT NULL,
  `nama_tindakan` varchar(30) NOT NULL,
  `penjelasan` varchar(255) NOT NULL,
  `tarif` int(10) NOT NULL,
  `lama_tindakan` varchar(10) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'jourdan', 'bikinnamaajaribet@gmail.com', 'pro1636372157.JPG', '$2y$10$0JN7FVnqglsJv2STFlS85O1gatX9kakdsx9OLDG24XPLX9QNUrp/O', 1, 1, 1631992072),
(24, 'Dr.Titin', 'dokter@gmail.com', 'pro1632734572.jpg', '$2y$10$5EXeme8R6JTvynpvhZrmgOMPPxhlq2fUrZ6gE9VoeR4f.l6Xa2Lqm', 2, 1, 1632130638),
(26, 'Dr.Kamal.Sp.Rad', 'rontgen@gmail.com', 'pro1632996387.jpg', '$2y$10$zYbvQmOU8Y2QJrwOt6IbEufJX9xi00ZRU4NgQjzb3LEKQ/mSkHQB.', 4, 1, 1632132780),
(30, 'pendaftaran', 'pendaftaran@gmail.com', 'default.jpg', '$2y$10$11ZJpgHt9j5GKWPBHXla9ur0s2MmsKAOCGQV7Xb3J7e/Z/dmZ2Nya', 6, 1, 1632158644),
(32, 'analis', 'analis@gmail.com', 'default.jpg', '$2y$10$rxHRAw1gPcyVPD4hKuzhHuTRgkwYEF/6q3bglaZXJ4Wbl73fPV46S', 5, 1, 1632204574),
(43, 'administrator', 'admin@gmail.com', 'default.jpg', '$2y$10$Q8DO0.YrnCD0MdZT8Pl5yu7Tfs9SEycKisuv4wXUxXoZkPm6Rzt5O', 1, 1, 1633516693),
(44, 'Dr.Boyke', 'dokter2@gmail.com', 'default.jpg', '$2y$10$OzyHDXZiKVsoKXyjVbOi6eHC3nmq9Bk6JcvffwxsFNbZhhC3KrrLC', 2, 1, 1633516733);

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
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 3),
(10, 3, 5),
(11, 3, 7),
(12, 4, 1),
(13, 4, 4),
(14, 5, 1),
(15, 5, 5),
(16, 6, 1),
(17, 6, 2),
(19, 1, 5),
(20, 1, 8),
(21, 2, 8),
(22, 3, 8),
(23, 4, 8),
(24, 5, 8),
(25, 6, 8);

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
(3, 'Perawat'),
(4, 'Radiologi'),
(5, 'Analis'),
(6, 'Pendaftaran');

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
(8, 5, 'Pasien', 'C_Pasien', 'far fa-fw fa-file-alt', 1),
(9, 5, 'Kunjungan', 'C_Kunjungan', 'far fa-fw fa-file-alt', 1),
(10, 5, 'Dokter', 'C_Dokter', 'far fa-fw fa-file-alt', 1),
(11, 5, 'User', 'C_User', 'far fa-fw fa-file-alt', 1),
(12, 7, 'My Profile', 'MyProfile', 'fas fa-fw fa-address-card', 1),
(13, 6, 'Billing Pemeriksaan', 'Billing_Pemeriksaan', 'fas fa-fw fa-file-invoice-dollar', 1),
(14, 6, 'Tebus Obat', 'Billing_Obat', 'fas fa-fw fa-dollar-sign', 1),
(15, 2, 'Antrian', 'Antrian', 'fas fa-fw fa-sort', 1);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
