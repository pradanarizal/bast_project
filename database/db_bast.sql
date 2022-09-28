-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2022 pada 08.18
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
-- Struktur dari tabel `executor`
--

CREATE TABLE `executor` (
  `id_executor` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `rekomendasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hardware`
--

CREATE TABLE `hardware` (
  `id_hardware` int(3) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_executor` int(3) NOT NULL,
  `komponen` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `requestor`
--

CREATE TABLE `requestor` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `no_tiket` int(10) NOT NULL,
  `no_aset` varchar(20) NOT NULL,
  `tipe_pengajuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `requestor`
--

INSERT INTO `requestor` (`nik`, `nama`, `bagian`, `jabatan`, `keluhan`, `no_tiket`, `no_aset`, `tipe_pengajuan`) VALUES
('3333234802010002', 'Asep', 'Rangkasbitung', 'Staff Stasiun', 'Gate Rusak', 457623, '88899988', 'hardware');

-- --------------------------------------------------------

--
-- Struktur dari tabel `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_executor` int(3) NOT NULL,
  `nama_software` text NOT NULL,
  `version` varchar(20) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('manager','admin') NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nip`, `nama`, `role`, `password`) VALUES
('0000000001', 'Rifky', 'manager', '123'),
('0000000002', 'Rizal', '', '321'),
('0000000003', 'Doly', '', '111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `executor`
--
ALTER TABLE `executor`
  ADD PRIMARY KEY (`id_executor`);

--
-- Indeks untuk tabel `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id_hardware`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_executor` (`id_executor`);

--
-- Indeks untuk tabel `requestor`
--
ALTER TABLE `requestor`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id_software`),
  ADD UNIQUE KEY `id_executor` (`id_executor`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `requestor` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hardware_ibfk_2` FOREIGN KEY (`id_executor`) REFERENCES `executor` (`id_executor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `software_ibfk_1` FOREIGN KEY (`id_executor`) REFERENCES `executor` (`id_executor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `software_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `requestor` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
