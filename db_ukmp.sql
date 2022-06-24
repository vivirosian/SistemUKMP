-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 04:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nia` int(7) NOT NULL,
  `nim` bigint(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bidangid` varchar(5) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nia`, `nim`, `nama`, `bidangid`, `prodi`, `angkatan`) VALUES
(192816, 19344052301, 'Muhammad Ertam Hidayat', 'B0001', 'PJSD', 2019),
(192916, 19520244015, 'Menara Lintang Was', 'B0004', 'PTI', 2019),
(202801, 20305144041, 'Vivi Rosian Rahmadika Rianto', 'B0002', 'Matematika', 2020),
(202916, 20520244016, 'Az-Zuhaida', 'B0005', 'PTI', 2020),
(222222, 19340568569, 'Tomas Alfa Edison', 'B0003', 'PKR', 2019),
(267181, 20305144041, 'Ini', 'B0002', 'Matematika', 2021),
(444444, 111111111111, 'topan', 'B0003', 'PTI', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `bidangid` varchar(5) NOT NULL,
  `nama_bidang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`bidangid`, `nama_bidang`) VALUES
('B0001', 'Ketua'),
('B0002', 'Wakil Ketua'),
('B0003', 'HRD'),
('B0004', 'Kesra'),
('B0005', 'KWU'),
('B0006', 'Penelitian');

-- --------------------------------------------------------

--
-- Table structure for table `detail_db`
--

CREATE TABLE `detail_db` (
  `bidangid` varchar(5) DEFAULT NULL,
  `prokerid` varchar(5) NOT NULL,
  `nama_proker` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_db`
--

INSERT INTO `detail_db` (`bidangid`, `prokerid`, `nama_proker`) VALUES
('B0001', 'K1001', 'UKMP Berbagi'),
('B0001', 'K1002', 'UKMP Mengabdi'),
('B0001', 'K1003', 'UKMP Mengajar'),
('B0002', 'K2001', 'UKMP Berbagi'),
('B0002', 'K2002', 'UKMP Mengabdi');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `prestasi_id` varchar(6) DEFAULT NULL,
  `nia` int(7) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `penyelenggara` varchar(100) DEFAULT NULL,
  `tingkatan` varchar(100) DEFAULT NULL,
  `gelar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`prestasi_id`, `nia`, `tahun`, `penyelenggara`, `tingkatan`, `gelar`) VALUES
('P0001', 192816, 2022, 'Unity', 'Nasional', 'Juara 3'),
(NULL, NULL, 2022, 'UNY', NULL, 'Juara 1'),
(NULL, 222222, 2021, 'UNY', 'Nasional', 'Juara');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `publikasi_id` varchar(6) DEFAULT NULL,
  `nia` int(7) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `tahun_publish` int(4) DEFAULT NULL,
  `tipe_publikasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`publikasi_id`, `nia`, `judul`, `publisher`, `tahun_publish`, `tipe_publikasi`) VALUES
('PUB001', 202801, 'Publikasi Keren', 'UKMP Publisher', 2022, 'Jurnal'),
('PUB002', 202801, 'Jurnal Keren Banget', 'UKMP Publisher', 2022, 'Jurnal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nia`),
  ADD KEY `anggota_FK` (`bidangid`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidangid`);

--
-- Indexes for table `detail_db`
--
ALTER TABLE `detail_db`
  ADD PRIMARY KEY (`prokerid`),
  ADD KEY `detail_db_FK` (`bidangid`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD KEY `prestasi_FK` (`nia`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD KEY `publikasi_FK` (`nia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `nia` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795707;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_FK` FOREIGN KEY (`bidangid`) REFERENCES `bidang` (`bidangid`);

--
-- Constraints for table `detail_db`
--
ALTER TABLE `detail_db`
  ADD CONSTRAINT `detail_db_FK` FOREIGN KEY (`bidangid`) REFERENCES `bidang` (`bidangid`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_FK` FOREIGN KEY (`nia`) REFERENCES `anggota` (`nia`);

--
-- Constraints for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD CONSTRAINT `publikasi_FK` FOREIGN KEY (`nia`) REFERENCES `anggota` (`nia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
