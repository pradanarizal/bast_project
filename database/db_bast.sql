-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 12:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(3) NOT NULL,
  `operating_system` int(1) NOT NULL DEFAULT 0,
  `microsoft_office` int(1) NOT NULL DEFAULT 0,
  `software_design` int(1) NOT NULL DEFAULT 0,
  `software_lainnya` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `operating_system`, `microsoft_office`, `software_design`, `software_lainnya`) VALUES
(1, 1, 0, 0, 0),
(2, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`nik`, `nama`, `bagian`, `jabatan`) VALUES
('0000000000000001', 'Rizaldi Akbar', 'Juanda', 'IT Support'),
('0000000000000002', 'Rizal Aziz', 'Juanda', 'IT Helpdesk'),
('0000000000000003', 'Rifky Yusuf', 'Juanda', 'IT Governance'),
('0000000000000004', 'Sulthan', 'Juanda', 'HR & Development'),
('0000000000000005', 'Doly', 'Juanda', 'IT Support'),
('0000000000000006', 'Muhammad Agam', 'Juanda', 'IT Helpdesk'),
('0000000000000007', 'Zidan Nurdin', 'Juanda', 'IT Operation'),
('0000000000000008', 'Tri Aji', 'Juanda', 'IT Operation'),
('0000000000000009', 'Muhammad Fadhlurrahman', 'Juanda', 'IT Governance');

-- --------------------------------------------------------

--
-- Table structure for table `giver`
--

CREATE TABLE `giver` (
  `id_giver` int(11) NOT NULL,
  `id_receipt` int(11) NOT NULL,
  `nik` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `id_hardware` int(3) NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `komponen` varchar(50) NOT NULL,
  `status_hardware` varchar(3) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `noc_admin`
--

CREATE TABLE `noc_admin` (
  `nik_admin` varchar(16) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `position_admin` varchar(50) NOT NULL,
  `division_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noc_admin`
--

INSERT INTO `noc_admin` (`nik_admin`, `nama_admin`, `position_admin`, `division_admin`) VALUES
('1231', 'Dede Junaedi', 'Juanda', 'IT Support'),
('1232', 'Udin Santoso', 'Juanda', 'IT Support NOC'),
('1233', 'Udin Bahrudin', 'Juanda', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id_receipt` int(11) NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `nik` int(16) NOT NULL,
  `nik_noc` int(16) NOT NULL,
  `item` varchar(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `description` varchar(70) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id_receipt`, `no_tiket`, `nik`, `nik_noc`, `item`, `item_id`, `kategori`, `description`, `date`) VALUES
(1, '4444444444', 1123, 1231, 'Gate', 11111, 'Peminjaman', 'aaaaaaaaaaaaaa', '2022-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(3) NOT NULL,
  `keluhan` text NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `no_aset` varchar(20) NOT NULL,
  `tipe_pengajuan` enum('hardware','software') NOT NULL,
  `status` enum('pending','process','approved','revision','rejected') NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_category` int(1) NOT NULL DEFAULT 1,
  `tanggal_request` date NOT NULL,
  `tanggal_approval` date NOT NULL,
  `approval_notes` text NOT NULL,
  `nik_admin` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `keluhan`, `no_tiket`, `no_aset`, `tipe_pengajuan`, `status`, `nik`, `id_category`, `tanggal_request`, `tanggal_approval`, `approval_notes`, `nik_admin`) VALUES
(1, 'Update Windows', '4444444444', '444444/432413/214132', 'software', 'approved', '134134135133434', 1, '2022-10-13', '2022-10-14', 'Mantap', ''),
(2, '1111111', '4444444444', '444449', 'software', 'pending', '134134135133434', 2, '2022-10-14', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `no_tiket` varchar(10) NOT NULL,
  `nama_software` text NOT NULL,
  `version` varchar(20) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id_software`, `no_tiket`, `nama_software`, `version`, `notes`) VALUES
(2, '4444444444', 'Antivirus', '13', 'Avira'),
(4, '4444444444', 'Microsoft Windows', '11', 'Windows 11 PRO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('manager','admin','sadmin') NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nama`, `role`, `password`) VALUES
('0000000001', 'Rifky', 'manager', '123'),
('0000000002', 'Rizal', 'admin', '321'),
('0000000003', 'Doly', 'sadmin', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id_hardware`);

--
-- Indexes for table `noc_admin`
--
ALTER TABLE `noc_admin`
  ADD PRIMARY KEY (`nik_admin`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id_receipt`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id_software`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_receipt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
