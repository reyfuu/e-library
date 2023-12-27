-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 02:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `pinjambuku`
--

CREATE TABLE `pinjambuku` (
  `idPinjam` varchar(50) NOT NULL,
  `idBuku` varchar(20) NOT NULL,
  `idSiswa` varchar(20) NOT NULL,
  `noInduk` varchar(20) NOT NULL,
  `namaSiswa` varchar(50) NOT NULL,
  `namaBuku` varchar(50) NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjambuku`
--

INSERT INTO `pinjambuku` (`idPinjam`, `idBuku`, `idSiswa`, `noInduk`, `namaSiswa`, `namaBuku`, `tanggalPinjam`, `tanggalKembali`, `status`) VALUES
('PJBK1', 'BK1', 'SW1', '19340018', 'Galih', 'Pemrograman C++ Revisi Kedua', '2023-12-11', '2023-12-13', 'pinjam'),
('PJBK2', 'BK2', 'SW2', '19340015', 'Wati', 'dkv', '2023-12-11', '2023-12-13', 'pinjam'),
('PJBK3', 'BK1', 'SW2', '19340015', 'Wati', 'Pemrograman C++ Revisi Kedua', '2023-12-15', '2023-12-22', 'pinjam'),
('PJBK4', 'BK2', 'SW2', '19340015', 'Wati', 'dkv', '2023-12-14', '2023-12-21', 'pinjam'),
('PJBK5', 'BK1', 'SW1', '19340018', 'galih', 'Pemrograman C++ Revisi Kedua', '2023-12-21', '2023-12-28', 'pinjam'),
('PJBK6', 'BK10', 'SW1', '19340018', 'galih', 'sdzxcqwda', '2023-12-21', '2023-12-28', 'pinjam'),
('PJBK7', 'BK11', 'SW1', '19340018', 'galih', 'sdad', '2023-12-13', '2023-12-20', 'pinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD PRIMARY KEY (`idPinjam`),
  ADD KEY `buku` (`idBuku`),
  ADD KEY `siswa` (`idSiswa`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD CONSTRAINT `buku` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
