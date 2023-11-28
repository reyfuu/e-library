-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 07:16 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` varchar(25) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `stok`, `status`) VALUES
('BR_001', 'Mikrotik', 10, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idBuku` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `publikasi` varchar(20) NOT NULL,
  `edisi` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idBuku`, `judul`, `nama`, `publikasi`, `edisi`, `status`) VALUES
('BK001', 'Pemrograman C++ Revisi Kedua', 'Budi Raharjo', 'Informatika', '2', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `idpinjam` varchar(25) NOT NULL,
  `noInduk` varchar(25) NOT NULL,
  `idbarang` varchar(25) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggalpinjam` datetime NOT NULL,
  `tanggalkembali` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`idpinjam`, `noInduk`, `idbarang`, `namaBarang`, `status`, `tanggalpinjam`, `tanggalkembali`) VALUES
('PJ001', '19340018', 'BR_001', 'Mikrotik', 'unavailable', '2023-11-27 06:48:31', '2023-11-30 12:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `pinjambuku`
--

CREATE TABLE `pinjambuku` (
  `id` int(50) NOT NULL,
  `idBuku` varchar(50) NOT NULL,
  `noInduk` varchar(50) NOT NULL,
  `namaBuku` varchar(50) NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjambuku`
--

INSERT INTO `pinjambuku` (`id`, `idBuku`, `noInduk`, `namaBuku`, `tanggalPinjam`, `tanggalKembali`, `status`) VALUES
(1, 'BK001', '19340018', 'Pemrograman C++ Revisi Kedua', '2023-11-27', '2023-11-30', 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `noInduk` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`noInduk`, `nama`, `kelas`, `password`) VALUES
('19340018', 'Galih', 'X TKJ 1', 'galih123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`idpinjam`),
  ADD UNIQUE KEY `iduser` (`noInduk`),
  ADD UNIQUE KEY `idbarang` (`idbarang`);

--
-- Indexes for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku` (`idBuku`),
  ADD KEY `siswa` (`noInduk`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`noInduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `no induk` FOREIGN KEY (`noInduk`) REFERENCES `siswa` (`noInduk`);

--
-- Constraints for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD CONSTRAINT `buku` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa` FOREIGN KEY (`noInduk`) REFERENCES `siswa` (`noInduk`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
