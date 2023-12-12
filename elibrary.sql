-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 02:17 AM
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
('BK1', 'Pemrograman C++ Revisi Kedua', 'Budi Raharjo', 'Informatika', '2', 'available', 5),
('BK2', 'dkv', 'sds', 'sds', 'sdsd', 'sdsd', 5);

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
  `idSiswa` varchar(20) NOT NULL,
  `noInduk` varchar(25) NOT NULL,
  `namaSiswa` varchar(50) NOT NULL,
  `idbarang` varchar(25) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggalkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`idpinjam`, `idSiswa`, `noInduk`, `namaSiswa`, `idbarang`, `namaBarang`, `tanggalpinjam`, `tanggalkembali`) VALUES
('PJBR1', 'SW2', '19340015', 'Wati', 'BR1', 'Mikrotik', '2023-12-12', '2023-12-13'),
('PJBR2', 'SW1', '19340018', 'Galih', 'BR1', 'Mikrotik', '2023-12-13', '2023-12-14');

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
  `tanggalKembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjambuku`
--

INSERT INTO `pinjambuku` (`idPinjam`, `idBuku`, `idSiswa`, `noInduk`, `namaSiswa`, `namaBuku`, `tanggalPinjam`, `tanggalKembali`) VALUES
('PJBK1', 'BK1', 'SW1', '19340018', 'Galih', 'Pemrograman C++ Revisi Kedua', '2023-12-11', '2023-12-13'),
('PJBR2', 'BK2', 'SW2', '19340015', 'Wati', 'dkv', '2023-12-11', '2023-12-13');

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
