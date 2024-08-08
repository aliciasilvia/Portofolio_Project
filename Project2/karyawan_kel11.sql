-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 05:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan_kel11`
--

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `nik` int(8) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `status_kerja` enum('Tetap','Tidak Tetap') NOT NULL,
  `position` varchar(10) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `responsibility` decimal(10,2) NOT NULL,
  `teamwork` decimal(10,2) NOT NULL,
  `management_time` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `grade` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`nik`, `foto`, `nama`, `status_kerja`, `position`, `tgl_penilaian`, `responsibility`, `teamwork`, `management_time`, `total`, `grade`) VALUES
(32210008, 'Tamara-6543cc3fd1d74.png', 'Tamara', 'Tetap', 'Back-end', '2023-10-23', '90.00', '80.00', '77.00', '81.80', 'A'),
(32210011, 'Lim Yong Teck-6543ce4597763.png', 'Lim Yong Teck', 'Tidak Tetap', 'CEO', '2023-05-28', '40.00', '20.00', '50.00', '38.00', 'D'),
(32210014, 'Alicia S-6543cc78acd84.png', 'Alicia S', 'Tidak Tetap', 'UI/UX', '2023-11-01', '75.00', '80.00', '79.00', '78.10', 'B'),
(32210016, 'Agnes V.K-6543ccbd94566.png', 'Agnes V.K', 'Tetap', 'SuperG', '2023-09-13', '50.00', '60.00', '30.00', '45.00', 'C'),
(32210075, 'Daniel A-6543ce1218af6.png', 'Daniel A', 'Tetap', 'Software', '2023-07-19', '70.00', '50.00', '59.00', '59.60', 'C'),
(32210089, 'Alex S-6543cd7863dd3.png', 'Alex S', 'Tetap', 'Admin', '2023-10-09', '50.00', '35.00', '35.00', '39.50', 'D'),
(32210096, 'Natasha A-6543ccf881620.png', 'Natasha A', 'Tidak Tetap', 'Designer', '2023-11-02', '45.00', '52.00', '70.00', '57.10', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
