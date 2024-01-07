-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 06:56 AM
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
('BR1', 'Mikrotik', 10, 'available');

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
  `status` varchar(20) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idBuku`, `judul`, `nama`, `publikasi`, `edisi`, `status`, `stok`) VALUES
('BK1', 'Pemrograman C++ Revisi Kedua', 'Budi Raharjo', 'Informatika', '2', 'available', 4),
('BK10', 'sdzxcqwda', 'sacdfwdcad', 'wacwadcwa', 'awdascd', 'available', 9),
('BK11', 'sdad', 'xacwa', 'adwa', 'asdwaw', 'available', 9),
('BK2', 'dkv', 'sds', 'sds', 'sdsd', 'available', 4),
('BK3', 'sads', 'sadas', 'sadsa', 'sada', 'available', 5),
('BK4', 'sdas', 'sdasd', 'sadsa', 'sda', 'available', 10),
('BK5', 'sdasd', 'sadasd', 'sdasdsa', 'sadwadw', 'available', 10),
('BK6', 'sdadwas', 'sadasdw', 'sadsas', 'sadasdws', 'available', 10),
('BK7', 'sadas', 'sassad', 'saaadwd', 'sadwas', 'available', 10),
('BK8', 'sdawdcac', 'awdsasdwa', 'sxacwawda', 'ascdwaw', 'available', 10),
('BK9', 'sadwad', 'acxcwadcdw', 'adwaxc', 'asdcaxa', 'available', 10);

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
('admin', 'admin'),
('audi', '345'),
('galih', '345');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `idpinjam` varchar(25) NOT NULL,
  `idSiswa` varchar(20) NOT NULL,
  `noInduk` varchar(25) NOT NULL,
  `namaSiswa` varchar(50) NOT NULL,
  `idbarang` varchar(25) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggalkembali` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`idpinjam`, `idSiswa`, `noInduk`, `namaSiswa`, `idbarang`, `namaBarang`, `tanggalpinjam`, `tanggalkembali`, `status`) VALUES
('PJBR1', 'SW2', '19340015', 'Wati', 'BR1', 'Mikrotik', '2023-12-12', '2023-12-13', 'pinjam'),
('PJBR2', 'SW1', '19340018', 'Galih', 'BR1', 'Mikrotik', '2023-12-13', '2023-12-14', 'pinjam'),
('PJBR3', 'SW1', '19340018', 'Galih', 'BR1', 'Mikrotik', '2023-12-13', '2023-12-20', 'pinjam'),
('PJBR4', 'SW1', '19340018', 'Galih', 'BR1', 'Mikrotik', '2023-12-13', '2023-12-20', 'pinjam'),
('PJBR5', 'SW1', '19340018', 'Galih', 'BR1', 'Mikrotik', '2023-12-13', '2023-12-20', 'pinjam');

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

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` varchar(20) NOT NULL,
  `noInduk` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `noInduk`, `nama`, `kelas`) VALUES
('SW1', '19340018', 'Galih', 'X TKJ 1'),
('SW2', '19340015', 'Wati', 'X TKJ');

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
  ADD KEY `idbarang` (`idbarang`) USING BTREE,
  ADD KEY `id siswa` (`idSiswa`);

--
-- Indexes for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD PRIMARY KEY (`idPinjam`),
  ADD KEY `buku` (`idBuku`),
  ADD KEY `siswa` (`idSiswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id siswa` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

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
