-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2022 pada 19.35
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bast`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(3) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `no_tiket` varchar(6) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` int(2) NOT NULL,
  `perihal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `nip`, `no_tiket`, `nama_barang`, `qty`, `perihal`) VALUES
(1, '0000000001', '124124', 'Laptop', 1, 'Gak bisa nyala'),
(2, '0000000001', '235235', 'Komputer', 1, 'Lambat'),
(3, '0000000001', '426235', 'Gate', 3, 'Gak bisa di pakai'),
(4, '0000000003', '121212', 'Mouse', 5, 'Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('user','noc','manager') NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nip`, `nama`, `role`, `password`) VALUES
('0000000001', 'Rifky', 'user', '123'),
('0000000002', 'Rizal', 'noc', '321'),
('0000000003', 'Doly', 'user', '111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
