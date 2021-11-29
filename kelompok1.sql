-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2021 pada 12.04
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
-- Struktur dari tabel `reg_pasien`
--

CREATE TABLE `reg_pasien` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jen_kel` enum('PRIA','WANITA') NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pemeriksaan` varchar(20) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reg_pasien`
--

INSERT INTO `reg_pasien` (`id`, `nama_pasien`, `no_hp`, `jen_kel`, `tgl_lahir`, `umur`, `no_ktp`, `alamat`, `pemeriksaan`, `date_created`) VALUES
(3, 'fghgf', '1245', 'WANITA', '24/05/1945', '12', '212121212', 'beaksi timur', 'Thorax', 1632588636),
(5, 'jojo', '06546464663', 'WANITA', '24/12/2002', '12', '1234', 'sadasd', 'Thorax', 1632646431);

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
(1, 'Dokter Umum', 75000),
(2, 'Cek Darah Lengkap', 175000),
(3, 'Thorax', 150000),
(4, 'EKG', 130000);

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
(4, 'jourdan', 'bikinnamaajaribet@gmail.com', 'pro1632729079.jpg', '$2y$10$0JN7FVnqglsJv2STFlS85O1gatX9kakdsx9OLDG24XPLX9QNUrp/O', 1, 1, 1631992072),
(24, 'dokter_jiwa', 'dokter@gmail.com', 'pro1632734572.jpg', '$2y$10$mLK8KdQGIxU.IHDhFi.jtu98OSb5syCKpVgpj1P1XRssO.3.PlwJq', 2, 1, 1632130638),
(26, 'rontgen', 'rontgen@gmail.com', 'default.jpg', '$2y$10$zYbvQmOU8Y2QJrwOt6IbEufJX9xi00ZRU4NgQjzb3LEKQ/mSkHQB.', 4, 1, 1632132780),
(29, 'Nurse', 'nurse@gmail.com', 'pro1632235871.jpg', '$2y$10$bFFiURBvTVMc3tCqE0OvAett6cLFR70ibwy9qgrMKf433xbUg030O', 3, 1, 1632136746),
(30, 'pendaftaran', 'pendaftaran@gmail.com', 'default.jpg', '$2y$10$11ZJpgHt9j5GKWPBHXla9ur0s2MmsKAOCGQV7Xb3J7e/Z/dmZ2Nya', 6, 1, 1632158644),
(32, 'analis', 'analis@gmail.com', 'default.jpg', '$2y$10$rxHRAw1gPcyVPD4hKuzhHuTRgkwYEF/6q3bglaZXJ4Wbl73fPV46S', 5, 1, 1632204574);

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
(17, 6, 7);

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
(5, 'Rekam jantung'),
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
(3, 3, 'Rontgen', 'rontgen', 'fas fa-fw fa-x-ray', 1),
(4, 4, 'laboratorium', 'lab', 'fas fa-fw fa-flask', 1),
(5, 5, 'Rekam jantung', 'ekg', 'fas fa-fw fa-heartbeat', 1),
(6, 6, 'Data User', 'DataUser', 'fas fa-fw fa-users', 1),
(7, 7, 'My Profile', 'MyProfile', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `reg_pasien`
--
ALTER TABLE `reg_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `set_biaya`
--
ALTER TABLE `set_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
