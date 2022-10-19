-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2022 pada 12.14
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

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
(1, 1, 0, 0, 0),
(2, 1, 0, 0, 0),
(3, 1, 0, 0, 0),
(4, 1, 0, 1, 0),
(5, 0, 0, 1, 1),
(6, 0, 0, 1, 0),
(7, 1, 0, 0, 0),
(8, 1, 0, 1, 0),
(9, 1, 0, 0, 0);

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
('0000000000000001', 'Rizaldi Akbar', 'Juanda', 'IT Support'),
('0000000000000002', 'Rizal Aziz', 'Juanda', 'IT Helpdesk'),
('0000000000000003', 'Rifky Yusuf Mahfuz', 'Juanda', 'IT Governance'),
('0000000000000004', 'Sulthani', 'Juanda', 'HR & Development'),
('0000000000000005', 'Doly', 'Juanda', 'IT Support'),
('0000000000000006', 'Muhammad Agam', 'Juanda', 'IT Helpdesk'),
('0000000000000007', 'Zidan Nurdin', 'Juanda', 'IT Operation'),
('0000000000000008', 'Tri Aji', 'Juanda', 'IT Operation'),
('0000000000000009', 'Muhammad Fadhlurrahman', 'Juanda', 'IT Governance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `giver`
--

CREATE TABLE `giver` (
  `id_giver` int(11) NOT NULL,
  `id_receipt` int(11) NOT NULL,
  `nik` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hardware`
--

CREATE TABLE `hardware` (
  `id_hardware` int(3) NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `komponen` varchar(50) NOT NULL,
  `status_hardware` enum('OK','NOK') NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hardware`
--

INSERT INTO `hardware` (`id_hardware`, `no_tiket`, `komponen`, `status_hardware`, `problem`) VALUES
(1, '6546435325', 'Hardisk', 'OK', '-'),
(2, '6546435325', 'Mouse', 'OK', '-'),
(6, '6546435325', 'Memory', 'NOK', 'Memori penuh'),
(7, '7773427432', 'Monitor', 'NOK', '-'),
(8, '7773427432', 'Keyboard', 'OK', '-'),
(9, '2426666666', 'Monitor', 'NOK', 'Ganti LCD'),
(10, '3333424332', 'Keyboard', 'NOK', 'Keyboard error banyak karat dan kabel putus'),
(11, '2426666666', 'Keyboard', 'NOK', 'Kabelnya putus'),
(12, '3333333333', 'Monitor', 'NOK', 'Soket putus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `noc_admin`
--

CREATE TABLE `noc_admin` (
  `nik_admin` varchar(16) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `position_admin` varchar(50) NOT NULL,
  `division_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `noc_admin`
--

INSERT INTO `noc_admin` (`nik_admin`, `nama_admin`, `position_admin`, `division_admin`) VALUES
('0000000000000001', 'Rizaldi Akbar', 'Juanda', 'IT Support'),
('0000000000000002', 'Rizal Aziz', 'Juanda', 'IT Helpdesk'),
('0000000000000004', 'Sulthani', 'HR & Development', 'Juanda'),
('121', 'Bandoro', 'Head IT NOC', 'IT Operations'),
('909095', 'Andrian Laksamana', 'Head IT dede', 'IT Planning');

-- --------------------------------------------------------

--
-- Struktur dari tabel `receipt`
--

CREATE TABLE `receipt` (
  `id_receipt` int(11) NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nik_admin` varchar(16) NOT NULL,
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
(16, '766523', '9178131212', '0000000000000004', 'Laptop', '11625', 'Surat Serah Terima', 'dss', '2022-10-15'),
(17, '766523232', '1235', '0000000000000004', 'Gatewayyyyy', '92738', 'Surat Serah Terima', 'dwssd', '2022-10-15'),
(18, '2426666666', '0000000000000001', '0000000000000004', 'Proyektor', '12', 'Peminjaman', 'Peminjaman proyektor', '2022-10-19'),
(19, '2426666666', '0000000000000002', '0000000000000004', 'Proyektor', '12', 'Surat Serah Terima', 'Peminjaman proyektor', '2022-10-19'),
(20, '2147483643', '0000000000000001', '0000000000000004', 'Proyektor', '12', 'Surat Serah Terima', 'Laptop', '2022-10-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_request` int(3) NOT NULL,
  `keluhan` text NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `no_aset` varchar(20) NOT NULL,
  `tipe_pengajuan` enum('hardware','software') NOT NULL,
  `status` enum('pending','process','approved','revision','rejected','finish') NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_category` int(1) NOT NULL DEFAULT 1,
  `tanggal_request` date NOT NULL,
  `tanggal_approval` date NOT NULL,
  `approval_notes` text NOT NULL,
  `nik_admin` varchar(16) NOT NULL,
  `nip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_request`, `keluhan`, `no_tiket`, `no_aset`, `tipe_pengajuan`, `status`, `nik`, `id_category`, `tanggal_request`, `tanggal_approval`, `approval_notes`, `nik_admin`, `nip`) VALUES
(4, 'bisa', '34342', '09765', 'hardware', 'pending', '2121312234444444', 5, '2022-10-15', '0000-00-00', '', '', ''),
(5, 'Ganti', '7665', '1212', 'software', 'process', '2123434343343433', 4, '2022-10-15', '0000-00-00', '', '', ''),
(6, 'ww', '766523', '09765', 'software', 'pending', '2121313131313131', 5, '2022-10-15', '0000-00-00', '', '', ''),
(7, 'sds', '7665', '23232', 'software', 'pending', '92844761613', 6, '2022-10-15', '0000-00-00', '', '', ''),
(11, 'a', '2147483643', 'A/201/PCA', 'software', 'revision', '0000000000000005', 7, '2022-10-17', '0000-00-00', 'Rusak', '909095', '0000000001'),
(14, 'Keyboard mati', '2426666666', 'A/201/RIFKY', 'hardware', 'process', '0000000000000004', 5, '2022-10-19', '0000-00-00', 'Beli kabel keyboard baru', '909095', ''),
(15, 'Monitor mati', '3333333333', 'A/201/PCA21', 'hardware', 'process', '0000000000000001', 5, '2022-10-19', '0000-00-00', 'Beli soket baru', '121', ''),
(16, 'Install aplikasi windows', '2313124124', 'A/201/PCA', 'software', 'pending', '0000000000000004', 8, '2022-10-19', '0000-00-00', '', '', ''),
(17, '2222222AA', '2222222222', '321344', 'software', 'approved', '0000000000000001', 9, '2022-10-19', '2022-10-19', 'AAAAAAA', '0000000000000002', '0000000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `nama_software` text NOT NULL,
  `version` varchar(20) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `software`
--

INSERT INTO `software` (`id_software`, `no_tiket`, `nama_software`, `version`, `notes`) VALUES
(2, '4444444444', 'Antivirus', '13', 'Avira'),
(4, '4444444444', 'Microsoft Windows', '11', 'Windows 11 PRO'),
(5, '766523', 'Microsoft Project', '2', 't'),
(6, '7665', 'Microsoft Project', '55', 'Instalasi'),
(7, '2147483643', 'Microsoft Office Standart', '1', 'a'),
(8, '2313124124', 'Microsoft Office Standart', '1', 'a'),
(9, '2222222222', 'Microsoft Office Standart', '1', 'A');

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
('0000000001', 'Rifky Yusuf', 'manager', '123'),
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
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id_hardware` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_receipt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
