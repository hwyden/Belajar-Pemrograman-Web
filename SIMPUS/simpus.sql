-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2020 pada 21.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(128) NOT NULL,
  `kode_periksa` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `bentuk_obat` varchar(128) NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `kode_obat`, `kode_periksa`, `nama_obat`, `bentuk_obat`, `stok_obat`, `exp`) VALUES
(1, 'R001', 'A001', 'Paracetamol', 'Cair', 100, '2022-04-21'),
(3, 'R002', 'A002', 'Amoxicilin', 'Tablet', 70, '2022-07-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `kode_psn` varchar(128) NOT NULL,
  `nama_psn` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `jenis_klm` char(128) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `kode_psn`, `nama_psn`, `alamat`, `no_hp`, `jenis_klm`, `tgl_daftar`) VALUES
(2, 'P001', 'Bagas Indra Bayu', 'Jalan kedepan aja', '0851236547', 'Laki-laki', '2020-05-14'),
(3, 'P002', 'Junito Bayu', 'Jalan ada disana', '0854658974', 'Laki-laki', '2020-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(11) NOT NULL,
  `kode_periksa` varchar(128) NOT NULL,
  `kode_psn` varchar(128) NOT NULL,
  `nama_psn` varchar(128) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `keluhan` varchar(128) NOT NULL,
  `diagnosa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `kode_periksa`, `kode_psn`, `nama_psn`, `tgl_periksa`, `keluhan`, `diagnosa`) VALUES
(1, 'A001', 'P001', 'Bagas Indra Bayu', '2020-03-19', 'Mudah lelah, Sering buang air kecil', 'Hipertensi'),
(13, 'A002', 'P002', 'Junito Bayu', '2020-03-19', 'Nyeri kepala', 'Migrain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `no_hp`, `alamat`, `foto`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Yunita Ayu Pratiwi', 'Admin@admin', '$2y$10$KTl5dgKEe3KREIuZ9IX9VOjtkE9Srpmr59sI3ABCpOnbArsODgVsu', '08999555444', 'Jl Kenangan dengan si dia', 'violet.png', 1, 1, 1594233935),
(5, 'Mega Setyawati', 'dokter@simpus', '$2y$10$5W4uMj9vM42QhwQIeKFyvO0vDgfTJyuaBe34E6mH1X65CI72zBWHq', '089955447778', 'Jl Biarkan ku pergi', 'default.jpg', 2, 1, 1594233955),
(7, 'Adinda Putri', 'farmasi@simpus', '$2y$10$I4UQ7yWPozFjmV9xSKVzAeGC/ZiNcwt1ULLeQbmuPnAbqJg3.iARm', '089955447778', 'Jalan Lupa Resep Obat', 'default.jpg', 4, 1, 1594382350),
(8, 'Lina Kurniawati', 'pendaftaran@simpus', '$2y$10$8VRjcpaUuw/Mzb6IaT2tXOHCi4JGKSbUEWBa291nhz1BX2mZ5evA.', '08122896542', 'Jalan pendaftaran puskesmas', 'default.jpg', 5, 1, 1594383075);

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
(3, 2, 2),
(4, 1, 3),
(7, 2, 6),
(9, 4, 2),
(10, 4, 8),
(11, 5, 7),
(12, 5, 2);

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
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Kelola Data'),
(7, 'Pasien'),
(8, 'Obat');

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
(1, 'Admin'),
(2, 'Dokter'),
(4, 'Farmasi'),
(5, 'Pendaftaran');

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
(1, 1, 'Role', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'dokter', 'fas fa-fw fa-user-md', 1),
(3, 2, 'Edit Profile', 'dokter/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Manajemen', 'menu', 'far fa-fw fa-folder', 1),
(5, 3, 'Sub Menu', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(7, 6, 'Kelola Data Pemeriksaan', 'Pemeriksaan', 'fas fa-fw fa-stethoscope', 1),
(8, 6, 'Edit Data Pemeriksaan', 'pemeriksaan/edit', 'fas fa-fw fa-pencil-alt', 1),
(10, 7, 'Kelola Data Pasien', 'pasien', 'fas fa-fw fa-stethoscope', 1),
(11, 7, 'Edit Data Pasien', 'pasien/edit', 'fas fa-fw fa-pencil-alt', 1),
(12, 8, 'Kelola Data Obat', 'obat', 'fas fa-fw fa-stethoscope', 1),
(13, 8, 'Edit Data Obat', 'obat/edit', 'fas fa-fw fa-pencil-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
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
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
