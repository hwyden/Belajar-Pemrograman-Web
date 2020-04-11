-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2020 pada 09.23
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb_minggu7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_plat` varchar(9) NOT NULL,
  `idtipe` char(5) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`no_plat`, `idtipe`, `tahun`, `tarif`, `status`) VALUES
('D7295PP', 'A0001', 2017, 250000, 'Baik'),
('G8876UTC', 'B0002', 2015, 300000, 'Baik'),
('H2616OY', 'C0003', 2012, 225000, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `noktp` char(16) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`noktp`, `nama`, `alamat`, `telepon`) VALUES
('1000000350025623', 'Asih', 'Pemalang', '089546464646'),
('1000000570045789', 'Sulistyo', 'Medan', '081232323235'),
('1000000890095465', 'Widya', 'Semarang', '081262626222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `idsopir` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `sim` char(12) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`idsopir`, `nama`, `alamat`, `telepon`, `sim`, `tarif`) VALUES
(1, 'Saras', 'Semarang', '081312222222', '000000111111', 75000),
(2, 'Tyas', 'Solo', '08134444444', '111111222222', 125000),
(3, 'Krisna', 'Yogyakarta', '08136666666', '222222333333', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipekendaraan`
--

CREATE TABLE `tipekendaraan` (
  `idtipe` char(5) NOT NULL,
  `tipe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipekendaraan`
--

INSERT INTO `tipekendaraan` (`idtipe`, `tipe`) VALUES
('A0001', 'Matic'),
('B0002', 'Manual'),
('C0003', 'Matic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transakasi`
--

CREATE TABLE `transakasi` (
  `no_transaksi` char(10) NOT NULL,
  `no_plat` varchar(9) DEFAULT NULL,
  `idsopir` int(11) DEFAULT NULL,
  `noktp` char(16) DEFAULT NULL,
  `tanggalpesan` date DEFAULT NULL,
  `tanggalpinjam` date DEFAULT NULL,
  `tanggalkembalirencana` date DEFAULT NULL,
  `jamkembalirencana` time DEFAULT NULL,
  `tanggalkembalirealisasi` date DEFAULT NULL,
  `jamkembalirealisasi` time DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `kilometerpinjam` int(11) DEFAULT NULL,
  `kilometerkembali` int(11) DEFAULT NULL,
  `bbmpinjam` varchar(50) DEFAULT NULL,
  `bbmkembali` varchar(50) DEFAULT NULL,
  `kondisimobilpinjam` varchar(100) DEFAULT NULL,
  `kondisimobilkembali` varchar(100) DEFAULT NULL,
  `kerusakan` varchar(100) DEFAULT NULL,
  `biayakerusakan` int(11) DEFAULT NULL,
  `biayabbm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transakasi`
--

INSERT INTO `transakasi` (`no_transaksi`, `no_plat`, `idsopir`, `noktp`, `tanggalpesan`, `tanggalpinjam`, `tanggalkembalirencana`, `jamkembalirencana`, `tanggalkembalirealisasi`, `jamkembalirealisasi`, `denda`, `kilometerpinjam`, `kilometerkembali`, `bbmpinjam`, `bbmkembali`, `kondisimobilpinjam`, `kondisimobilkembali`, `kerusakan`, `biayakerusakan`, `biayabbm`) VALUES
('T000000001', 'D7295PP', 1, '1000000350025623', '2018-05-11', '2018-06-08', '2018-06-20', '18:00:00', '2018-06-20', '17:00:00', 0, 125634, 125690, 'penuh', 'penuh', 'baik', 'baik', 'tidak ada', 0, 0),
('T000000002', 'G8876UTC', 2, '1000000570045789', '2018-10-11', '2018-11-13', '2018-11-20', '20:00:00', '2018-11-20', '18:00:00', 0, 11236, 11277, 'penuh', 'setengah', 'baik', 'baik', 'tidak ada', 0, 50000),
('T000000003', 'H2616OY', 3, '1000000890095465', '2019-02-02', '2019-02-20', '2019-03-10', '12:00:00', '2019-03-29', '17:00:00', 100000, 12777, 12811, 'penuh', 'penuh', 'baik', 'tidak', 'lampu mati', 250000, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_plat`),
  ADD KEY `kendaraan_ibfk_1` (`idtipe`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`noktp`),
  ADD UNIQUE KEY `telepon` (`telepon`);

--
-- Indeks untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`idsopir`),
  ADD UNIQUE KEY `telepon` (`telepon`),
  ADD UNIQUE KEY `sim` (`sim`);

--
-- Indeks untuk tabel `tipekendaraan`
--
ALTER TABLE `tipekendaraan`
  ADD PRIMARY KEY (`idtipe`);

--
-- Indeks untuk tabel `transakasi`
--
ALTER TABLE `transakasi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `idsopir` (`idsopir`) USING BTREE,
  ADD KEY `no_plat` (`no_plat`),
  ADD KEY `noktp` (`noktp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sopir`
--
ALTER TABLE `sopir`
  MODIFY `idsopir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`idtipe`) REFERENCES `tipekendaraan` (`idtipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transakasi`
--
ALTER TABLE `transakasi`
  ADD CONSTRAINT `transakasi_ibfk_3` FOREIGN KEY (`noktp`) REFERENCES `pelanggan` (`noktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_plat`) REFERENCES `kendaraan` (`no_plat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idsopir`) REFERENCES `sopir` (`idsopir`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
