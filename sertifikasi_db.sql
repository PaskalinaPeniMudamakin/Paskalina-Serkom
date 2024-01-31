-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 12:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sertifikasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `Id_peserta` int(11) NOT NULL,
  `Kd_skema` varchar(10) DEFAULT NULL,
  `Nama_peserta` varchar(255) DEFAULT NULL,
  `Jenis_kelamin` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `No_hp` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`Id_peserta`, `Kd_skema`, `Nama_peserta`, `Jenis_kelamin`, `alamat`, `No_hp`) VALUES
(16, 'SKM-001', 'Peni', 'Perempuan', 'Bandung', 2147483647),
(17, 'SKM-002', 'Sonya', 'Perempuan', 'Jakarta', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `skema`
--

CREATE TABLE `skema` (
  `Kd_skema` varchar(10) NOT NULL,
  `Nm_skema` varchar(255) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `Jml_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skema`
--

INSERT INTO `skema` (`Kd_skema`, `Nm_skema`, `jenis`, `Jml_unit`) VALUES
('SKM-001', 'Junior web Developer', 'KKNIs', 60),
('SKM-002', 'Digital marketing', 'Klaster', 10),
('SKM-003', 'Desainer Multimedia Muda', 'KKNI', 10),
('SKM-004', 'Network Administrator Muda', 'KKNI', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`Id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `Id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
