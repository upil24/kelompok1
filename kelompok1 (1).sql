-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2021 pada 20.30
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
-- Struktur dari tabel `p_dokter`
--

CREATE TABLE `p_dokter` (
  `id` int(11) NOT NULL,
  `no_mr` int(11) NOT NULL,
  `dokter` varchar(40) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `tgl_periksa` int(11) NOT NULL,
  `tensi` varchar(10) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `saran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_dokter`
--

INSERT INTO `p_dokter` (`id`, `no_mr`, `dokter`, `keluhan`, `tgl_periksa`, `tensi`, `diagnosis`, `saran`) VALUES
(27, 5, 'Dr.Titin', 'Demam', 1633702418, '120/90', 'kurang istirahat', 'cuti kerja'),
(28, 15, 'Dr.Titin', 'Tangan Kanan Linu', 1633702431, '150/90', 'Gejala rematik', 'jangan kebanyakan makan emping,minum obat rematik.'),
(29, 18, 'jourdan', 'Migrain', 1633702254, '110/100', 'stress berlebih atau posisi tidur kurang baik.', 'pilih bantal yang pas,minum obat panadol untuk mengurangi migrain.'),
(30, 19, 'Dr.Titin', 'Panuan', 1633705425, '100/100', 'terkena panu', 'jaga kebersihan badan, mandi setelah aktifitas berat. gunakan obat panu 3x sehari.'),
(31, 20, 'Dr.Titin', 'kecelakaan', 1633705715, '150/70', 'kecelakaan lalu lintas menyebabkan tangan luka', 'istirahat yang cukup, ganti perban setiap pagi hari,beri obat merah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_pasien`
--

CREATE TABLE `reg_pasien` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jen_kel` enum('PRIA','WANITA') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` varchar(3) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `p_dokter` varchar(20) NOT NULL,
  `p_rontgen` varchar(25) NOT NULL,
  `p_lab` varchar(25) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reg_pasien`
--

INSERT INTO `reg_pasien` (`id`, `nama_pasien`, `no_hp`, `jen_kel`, `tgl_lahir`, `umur`, `no_ktp`, `alamat`, `p_dokter`, `p_rontgen`, `p_lab`, `date_created`) VALUES
(3, 'pasien1', '8245566448', 'PRIA', '1991-02-07', '12', '212121212', 'beaksi timur', '', 'Rontgen', 'Laboratorium', 1632588636),
(5, 'jojo', '06546464663', 'WANITA', '1991-04-24', '12', '1234', 'sadasd', 'Dokter', 'Rontgen', '', 1632646431),
(10, 'pasien baru1', '1234567898', 'PRIA', '1991-02-26', '12', '11112121211111', 'jl.pegangasaan timur no.5 bekasi timur', '', 'Rontgen', '', 1632999899),
(11, 'pasien baru2', '2255884477', 'WANITA', '1991-02-26', '24', '1346548454546', 'jl.garuda timur bla bla jakarta selatan', '', '', 'Laboratorium', 1632999947),
(13, 'pasien baru4', '5346543546546', 'PRIA', '1991-02-26', '11', '21323423423423', 'ashdkuwehfkjsdhkfjhsdjfsdfsd', '', 'Rontgen', 'Laboratorium', 1633000083),
(14, 'pasien baru5', '081210309267', 'PRIA', '1991-02-26', '12', '3463543435454', 'sadfasfasdfdsf3243214wq', '', '', 'Laboratorium', 1633000173),
(15, 'pasien baru7', '081210309267', 'PRIA', '1991-02-26', '11', '21323423423423', 'jl.suka-suka no.102 jakarta timur 17115', 'Dokter', 'Rontgen', 'Laboratorium', 1633013059),
(17, 'pasien9', '821547844', 'PRIA', '1991-02-26', '12', '654687313457', 'jl.suka-suka no.102 jakarta timur 17115', '', 'Rontgen', '', 1633013102),
(18, 'pasien10', '06546464663', 'WANITA', '1991-02-26', '32', '6546546565656565656', 'jl.pegangasaan timur no.5 bekasi timur', 'Dokter', 'Rontgen', 'Laboratorium', 1633013136),
(19, 'Roy Kusnandar', '081210309267', 'PRIA', '1991-02-26', '43', '1346548454546', 'jl.garuda timur bla bla jakarta selatan', 'Dokter', 'Rontgen', '', 1633018720),
(20, 'yugh', '081210309267', 'PRIA', '1991-02-26', '21', '11112121211111', 'asdasfsdbgvxdfbvsdfg sefsdgsdgs gsdgsdg', 'Dokter', '', '', 1633018755),
(21, 'jourdan', '081210309267', 'PRIA', '1991-02-26', '30', '11221122', 'jl.mutiara raya blok c/5 bekasi timur 17114', '', 'Rontgen', 'Laboratorium', 1633039473),
(22, 'sdfsdsfsdf', '081210309267', 'PRIA', '1991-02-26', '25', '654687313457', 'jl.garuda timur bla bla jakarta selatan', '', 'Rontgen', 'Laboratorium', 1633039589),
(25, 'tidurrrrrr', '081210309267', 'PRIA', '1991-02-26', '25', '654687313457', 'jl.garuda timur bla bla jakarta selatan', '', 'Rontgen', '', 1633044159),
(26, 'terbaru', '081210309267', 'PRIA', '2000-04-24', '25', '1234', 'jl.pegangasaan timur no.5 bekasi timur', '', '', 'Laboratorium', 1633104449),
(27, 'Adrian Yudha Pratama', '0812454444477', 'PRIA', '1992-06-10', '29', '323565656565656', 'Margahayu timur kota bekasi', '', '', 'Laboratorium', 1633441244);

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_biaya`
--

CREATE TABLE `set_biaya` (
  `id` int(11) NOT NULL,
  `nama_pemeriksaan` varchar(20) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `set_biaya`
--

INSERT INTO `set_biaya` (`id`, `nama_pemeriksaan`, `tarif`) VALUES
(1, 'Dokter', 100000),
(2, 'Laboratorium', 175000),
(3, 'Rontgen', 150000);

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
(4, 'jourdan', 'bikinnamaajaribet@gmail.com', 'pro1632771860.jpg', '$2y$10$0JN7FVnqglsJv2STFlS85O1gatX9kakdsx9OLDG24XPLX9QNUrp/O', 1, 1, 1631992072),
(24, 'Dr.Titin', 'dokter@gmail.com', 'pro1632734572.jpg', '$2y$10$5EXeme8R6JTvynpvhZrmgOMPPxhlq2fUrZ6gE9VoeR4f.l6Xa2Lqm', 2, 1, 1632130638),
(26, 'rontgen', 'rontgen@gmail.com', 'pro1632996387.jpg', '$2y$10$zYbvQmOU8Y2QJrwOt6IbEufJX9xi00ZRU4NgQjzb3LEKQ/mSkHQB.', 4, 1, 1632132780),
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
(8, 2, 2),
(9, 2, 7),
(10, 3, 5),
(11, 3, 7),
(12, 4, 3),
(13, 4, 7),
(14, 5, 4),
(15, 5, 7),
(16, 6, 1),
(17, 6, 7),
(19, 1, 5);

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
(1, 'Pendaftaran'),
(2, 'Dokter'),
(3, 'Radiologi'),
(4, 'Laboratorium'),
(5, 'SetBiaya'),
(6, 'DataUser'),
(7, 'MyProfile');

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
(1, 1, 'Pasien', 'pendaftaran', 'fas fa-fw fa-procedures', 1),
(2, 2, 'Dokter', 'dokter', 'fas fa-fw fa-user-md', 1),
(3, 3, 'Radiologi', 'Radiologi', 'fas fa-fw fa-x-ray', 1),
(4, 4, 'laboratorium', 'lab', 'fas fa-fw fa-flask', 1),
(5, 5, 'Master Biaya', 'SetBiaya', 'fas fa- fw fa-dollar-sign', 1),
(6, 6, 'Data User', 'DataUser', 'fas fa-fw fa-users', 1),
(7, 7, 'My Profile', 'MyProfile', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `p_dokter`
--
ALTER TABLE `p_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reg_pasien`
--
ALTER TABLE `reg_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `set_biaya`
--
ALTER TABLE `set_biaya`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `p_dokter`
--
ALTER TABLE `p_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `reg_pasien`
--
ALTER TABLE `reg_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `set_biaya`
--
ALTER TABLE `set_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
