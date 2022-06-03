-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 01:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bimbingan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `iddosen` int(11) NOT NULL,
  `namadosen` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tempatlahir` varchar(45) NOT NULL,
  `programstudi` varchar(45) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `alamatrumah` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`iddosen`, `namadosen`, `tanggallahir`, `tempatlahir`, `programstudi`, `fakultas`, `alamatrumah`) VALUES
(12345, 'agus', '2021-12-01', 'balikpapan', 's1', 'komk', 'btncd'),
(123339, '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `programstudi` varchar(45) NOT NULL,
  `tempatlahir` varchar(45) NOT NULL,
  `tanggallahir` date NOT NULL,
  `jeniskelamin` varchar(2) NOT NULL,
  `agama` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `programstudi`, `tempatlahir`, `tanggallahir`, `jeniskelamin`, `agama`, `alamat`, `kota`, `provinsi`) VALUES
(9899, '', '', '', '0000-00-00', 'P', '', '', '', ''),
(112234, 'santoso', 'TI', 'bpn', '2021-12-01', 'L', 'Islam', 'jln', 'Balikpapan', 'Kaltim');

-- --------------------------------------------------------

--
-- Table structure for table `membimbing`
--

CREATE TABLE `membimbing` (
  `nim` int(10) NOT NULL,
  `iddosen` int(11) NOT NULL,
  `uraianbimbingan` varchar(500) NOT NULL,
  `jenisbimbingan` varchar(100) NOT NULL,
  `tanggalbimbingan` date NOT NULL,
  `statusbimbingan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membimbing`
--

INSERT INTO `membimbing` (`nim`, `iddosen`, `uraianbimbingan`, `jenisbimbingan`, `tanggalbimbingan`, `statusbimbingan`) VALUES
(0, 0, '', '', '0000-00-00', 'Belum acc'),
(123323, 0, '', '', '0000-00-00', 'Belum acc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`iddosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `membimbing`
--
ALTER TABLE `membimbing`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `iddosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123340;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nim` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1912029;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
