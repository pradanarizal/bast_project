-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2022 pada 04.40
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
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(3) NOT NULL,
  `operating_system` int(1) NOT NULL DEFAULT 0,
  `microsoft_office` int(1) NOT NULL DEFAULT 0,
  `software_design` int(1) NOT NULL DEFAULT 0,
  `software_lainnya` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `operating_system`, `microsoft_office`, `software_design`, `software_lainnya`) VALUES
(22, 1, 0, 0, 0),
(23, 1, 0, 0, 0),
(24, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`nik`, `nama`, `bagian`, `jabatan`) VALUES
('134134135133434', 'Ditaaa', 'Juandaaa', 'HRDDD'),
('1341341351334344', 'Dita', 'Juandaa', 'Marketing'),
('1341341351334367', 'Agungaaaaa', 'Juanda', 'Design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `executor`
--

CREATE TABLE `executor` (
  `nip_executor` int(16) NOT NULL,
  `nama_executor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `executor`
--

INSERT INTO `executor` (`nip_executor`, `nama_executor`) VALUES
(3324, 'Agus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hardware`
--

CREATE TABLE `hardware` (
  `id_hardware` int(3) NOT NULL,
  `id_executor` int(2) NOT NULL,
  `id_request` int(2) NOT NULL,
  `komponen` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_request` int(3) NOT NULL,
  `keluhan` text NOT NULL,
  `no_tiket` int(10) NOT NULL,
  `no_aset` varchar(20) NOT NULL,
  `tipe_pengajuan` enum('hardware','software') NOT NULL,
  `status` enum('pending','process','approved','revision','rejected') NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_category` int(1) NOT NULL DEFAULT 1,
  `tanggal_request` date NOT NULL,
  `tanggal_approval` date NOT NULL,
  `approval_notes` text NOT NULL,
  `nip_executor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_request`, `keluhan`, `no_tiket`, `no_aset`, `tipe_pengajuan`, `status`, `nik`, `id_category`, `tanggal_request`, `tanggal_approval`, `approval_notes`, `nip_executor`) VALUES
(26, 'Update Office', 2147483647, '444449', 'software', 'pending', '1341341351334367', 24, '2022-10-10', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `no_tiket` int(10) NOT NULL,
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
('0000000002', 'Rizal', 'admin', '321'),
('0000000003', 'Doly', '', '111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `executor`
--
ALTER TABLE `executor`
  ADD PRIMARY KEY (`nip_executor`);

--
-- Indeks untuk tabel `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id_hardware`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id_software`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
