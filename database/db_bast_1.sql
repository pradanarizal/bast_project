-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2022 at 07:32 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
  `id_category` int(1) NOT NULL,
  `nama_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `nama_category`) VALUES
(1, 'Operating System'),
(2, 'Microsoft Office'),
(3, 'Software Design'),
(4, 'Software Lainnya');

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
('0283928', 'Muhammad', 'IT RangkasDenglok', 'Head Office'),
('081366778956', 'Sigit', 'NOC Juanda', 'Head IT support'),
('1111112011010001', 'Hadi', 'Juanda', 'IT'),
('1111112011010002', 'Rifky', 'Juanda', 'Marketing'),
('1323244535454554', 'gigolo', 'sds', 'dsds'),
('2147483647', 'Riki', 'NOC Manggarai', 'manager'),
('293782', 'rifky', 'ITod', 'JiJO'),
('321455', 'Bandoro', 'IT Juanda', 'Asisten Manager'),
('816271', 'doodl', 'IT Pandanara', 'Marketing'),
('8162712', 'Doly Prahoro', 'Marketing', 'manager'),
('92712817', 'Rizaldi Akbar', 'IT Bekasi', 'Head Manager');

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
  `id_executor` int(2) NOT NULL,
  `id_request` int(2) NOT NULL,
  `komponen` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `noc_admin`
--

CREATE TABLE `noc_admin` (
  `nik_admin` int(16) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `position_admin` varchar(50) NOT NULL,
  `division_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id_receipt` int(11) NOT NULL,
  `no_tiket` int(10) NOT NULL,
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
(6, 232445, 2147483647, 0, 'Motor', 1231, 'Peminjaman', 'Peminjaman Motor Listrik', '2022-10-11'),
(7, 923787, 3132, 0, 'Kereta', 11, 'Surat Serah Terima', 'Operasi', '2022-10-11'),
(8, 76653, 2147483647, 0, 'print', 123, 'Surat Serah Terima', 'Perbaikan printer', '2022-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id_receiver` int(11) NOT NULL,
  `id_receipt` int(10) NOT NULL,
  `nik` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(3) NOT NULL,
  `keluhan` text NOT NULL,
  `no_tiket` int(10) NOT NULL,
  `no_aset` varchar(20) NOT NULL,
  `tipe_pengajuan` enum('hardware','software') NOT NULL,
  `status` enum('pending','process','approved','revision','rejected') NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_category` int(1) NOT NULL DEFAULT '1',
  `tanggal_request` date NOT NULL,
  `tanggal_approval` date NOT NULL,
  `approval_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `keluhan`, `no_tiket`, `no_aset`, `tipe_pengajuan`, `status`, `nik`, `id_category`, `tanggal_request`, `tanggal_approval`, `approval_notes`) VALUES
(3, 'Update OS', 222223, '333333', 'software', 'process', '1111112011010002', 1, '2022-10-02', '2022-10-04', 'Cancelled'),
(5, 'Install Visual Studio', 235239, '243434', 'software', 'process', '1111112011010002', 4, '2022-10-05', '2022-10-04', 'Cancelled'),
(6, 'Update windows', 923782, '8172632', 'software', 'pending', '9172813', 1, '2022-10-06', '0000-00-00', ''),
(7, 'isajiai', 121212, '102891', 'software', 'pending', '293782', 1, '2022-10-06', '0000-00-00', ''),
(8, 'Ganti windows', 918238278, '1928', 'software', 'pending', '8162712', 1, '2022-10-06', '0000-00-00', ''),
(10, 'ssfs', 27382, 'e2e2e', 'hardware', 'pending', '23232', 5, '2022-10-06', '0000-00-00', ''),
(11, 'Update Windows', 92328, '82722', 'software', 'pending', '816271', 1, '2022-10-06', '0000-00-00', ''),
(12, 'Update Windows 11', 1212313, '011', 'software', 'pending', '92712817', 1, '2022-10-07', '0000-00-00', ''),
(13, 'Update Windows', 89927382, '4232', 'hardware', 'pending', '0283928', 5, '2022-10-07', '0000-00-00', ''),
(14, 'reef', 827, '3232', 'hardware', 'pending', '1323244535454554', 5, '2022-10-12', '0000-00-00', ''),
(15, 'reef', 0, '3232', 'hardware', 'pending', '1323244535454554', 5, '2022-10-12', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `id_executor` int(2) NOT NULL,
  `id_request` int(2) NOT NULL,
  `nama_software` text NOT NULL,
  `version` varchar(20) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id_software`, `id_executor`, `id_request`, `nama_software`, `version`, `notes`) VALUES
(3, 1, 3, 'Microsoft Windows', '11', 'Windows 11 Pro');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('manager','admin') NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nama`, `role`, `password`) VALUES
('0000000001', 'Rifky', 'manager', '123'),
('0000000002', 'Rizal', 'admin', '321'),
('0000000003', 'Doly', '', '111');

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
-- Indexes for table `giver`
--
ALTER TABLE `giver`
  ADD PRIMARY KEY (`id_giver`);

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
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id_receiver`);

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
-- AUTO_INCREMENT for table `giver`
--
ALTER TABLE `giver`
  MODIFY `id_giver` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_receipt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id_receiver` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
