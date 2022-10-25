-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2022 pada 23.44
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`nik`, `nama`, `bagian`, `jabatan`) VALUES
('123332132', 'Rifky', 'Manajer', 'IT'),
('33333', 'Rizaldi Akbar', 'Marketing', 'IT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hardware`
--

CREATE TABLE `hardware` (
  `id_hardware` int(3) NOT NULL,
  `no_tiket` varchar(50) NOT NULL,
  `komponen` varchar(50) NOT NULL,
  `status_hardware` enum('OK','NOK') NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `noc_admin`
--

CREATE TABLE `noc_admin` (
  `nik_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `position_admin` varchar(50) NOT NULL,
  `division_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `noc_admin`
--

INSERT INTO `noc_admin` (`nik_admin`, `nama_admin`, `position_admin`, `division_admin`) VALUES
('0000000001', 'Rizaldi Akbar', 'Juanda', 'IT Support'),
('0000000002', 'Rizal Aziz', 'Juanda', 'IT Helpdesk'),
('0000000004', 'Sulthani', 'HR & Development', 'Juanda'),
('121', 'Bandoro', 'Head IT NOC', 'IT Operations'),
('909095', 'Andrian Laksamana', 'Head IT dede', 'IT Planning');

-- --------------------------------------------------------

--
-- Struktur dari tabel `receipt`
--

CREATE TABLE `receipt` (
  `id_receipt` int(11) NOT NULL,
  `no_tiket` varchar(50) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nik_admin` varchar(10) NOT NULL,
  `item` varchar(20) NOT NULL,
  `item_id` varchar(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `description` varchar(70) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `receipt`
--

INSERT INTO `receipt` (`id_receipt`, `no_tiket`, `nik`, `nik_admin`, `item`, `item_id`, `kategori`, `description`, `date`) VALUES
(1, '3214217474', '0000000000', '', 'Proyektor', '12', 'Surat Serah Terima', 'A', '2022-10-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_request` int(3) NOT NULL,
  `keluhan` text NOT NULL,
  `no_tiket` varchar(50) NOT NULL,
  `no_aset` varchar(20) NOT NULL,
  `tipe_pengajuan` enum('hardware','software') NOT NULL,
  `status` enum('pending','process','approved','revision','rejected','finish') NOT NULL,
  `nik` varchar(10) NOT NULL,
  `id_category` int(1) NOT NULL DEFAULT 1,
  `tanggal_request` date NOT NULL,
  `tanggal_approval` date NOT NULL,
  `approval_notes` text NOT NULL,
  `nik_admin` varchar(10) NOT NULL,
  `nip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_request`, `keluhan`, `no_tiket`, `no_aset`, `tipe_pengajuan`, `status`, `nik`, `id_category`, `tanggal_request`, `tanggal_approval`, `approval_notes`, `nik_admin`, `nip`) VALUES
(1, 'a', '2426666666', '232', 'hardware', 'pending', '123332132', 5, '2022-10-25', '0000-00-00', '', '', ''),
(2, 'a', '3214217474', 'A/201/RIFKY', 'software', 'pending', '33333', 1, '2022-10-25', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `no_tiket` varchar(50) NOT NULL,
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
  `role` enum('manager','admin','sadmin') NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nip`, `nama`, `role`, `password`) VALUES
('0000000001', 'Rifky Yusuf Mahfuz', 'manager', '123'),
('0000000002', 'Rizal', 'admin', '321'),
('0000000003', 'Doly', 'sadmin', '111'),
('0000000004', 'Sulthan', 'sadmin', '1234');

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
-- Indeks untuk tabel `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id_hardware`);

--
-- Indeks untuk tabel `noc_admin`
--
ALTER TABLE `noc_admin`
  ADD PRIMARY KEY (`nik_admin`);

--
-- Indeks untuk tabel `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id_receipt`);

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
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id_hardware` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_receipt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
