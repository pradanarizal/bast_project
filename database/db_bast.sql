-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 10:55 AM
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
(22, 1, 0, 0, 0),
(23, 1, 0, 0, 0),
(24, 1, 1, 1, 1),
(25, 1, 1, 1, 0),
(26, 1, 0, 1, 0),
(27, 1, 0, 0, 0),
(28, 0, 0, 1, 0),
(29, 1, 0, 0, 0),
(30, 1, 0, 1, 0);

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
('1111112011010001', 'Hadi', 'Juanda', 'IT'),
('1111112011010002', 'Rifky', 'Juanda', 'Marketing'),
('1323244535454554', 'gigolo', 'sds', 'dsds'),
('134134135133434', 'Ditaaa', 'Juandaaa', 'HRD'),
('1341341351334344', 'Dita', 'Juandaa', 'Marketing'),
('1341341351334367', 'Agung', 'Juanda', 'Design');

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
('0', 'Dea', 'Juanda', 'NOC'),
('1231', 'Dede', 'Juanda', 'NOC');

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
(0, '111111', 1123, 1231, 'Gate', 11111, 'Surat Serah Terima', 'adadadad', '2022-10-13');

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
(26, 'Update Office', '2147483647', '444449', 'software', 'process', '1341341351334367', 24, '2022-10-10', '0000-00-00', '', '0'),
(27, 'Booting keluar asap', '3434343433', '444449', 'hardware', 'process', '134134135133434', 5, '2022-10-12', '0000-00-00', '', '0'),
(28, 'Instal office', '22222222', '444449', 'software', 'process', '1341341351334367', 25, '2022-10-12', '0000-00-00', '', '0'),
(33, 'dddd', '4432432424', 'a', 'hardware', 'pending', '1341341351334367', 5, '2022-10-13', '0000-00-00', '', '0'),
(34, 'a', '0465665464', 'a', 'hardware', 'pending', '1341341351334367', 5, '2022-10-13', '0000-00-00', '', '0'),
(35, 's', '9998767856', 'a', 'software', 'pending', '1341341351334367', 29, '2022-10-13', '0000-00-00', '', '0'),
(36, 'sss', '9998765555', 'as', 'software', 'pending', '1341341351334367', 30, '2022-10-13', '0000-00-00', '', '0');

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
(13, '22222222', 'Microsoft Windows', '2', 'a'),
(14, '2147483647', 'Microsoft Visio', '', ''),
(15, '22222222', 'Microsoft Visio', 'a', 'a');

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
('0000000003', 'Doly', 'sadmin', '111'),
('0000000004', 'Aji', 'manager', '11111');

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
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
