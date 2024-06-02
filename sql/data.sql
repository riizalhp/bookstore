-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 06:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(11) NOT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `nama_buku` varchar(50) DEFAULT NULL,
  `harga` int(22) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `penerbit` varchar(22) DEFAULT NULL,
  `tahun` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kategori`, `nama_buku`, `harga`, `stok`, `penerbit`, `tahun`) VALUES
('B1001', 'Bisnis', 'Bisnis Online', 75000, 9, 'Penerbit Informatika', '2018'),
('B1002', 'Bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', 67500, 20, 'Penerbit Informatika', '2020'),
('K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi', 50000, 60, 'Penerbit Informatika', '2003'),
('K1002', 'Keilmuan', 'Artifical Intelligence', 45000, 60, 'Penerbit Informatika', '2009'),
('K1009', 'Keilmuan', 'Deep Learning', 99000, 1, 'Penerbit Informatika', '2018'),
('K2003', 'Keilmuan', 'Autocad 3 Dimensi', 40000, 25, 'Penerbit Informatika', '2019'),
('K3004', 'Keilmuan', 'Cloud Computing Technology', 85000, 15, 'Penerbit Informatika', '2019'),
('N1001', 'Novel', 'Cahaya Di Penjuru Hati', 68000, 10, 'Andi Offset', '2019'),
('N1002', 'Novel', 'Aku Ingin Cerita', 48000, 12, 'Danendra', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(11) NOT NULL,
  `nama` varchar(22) DEFAULT NULL,
  `alamat` varchar(99) DEFAULT NULL,
  `kota` varchar(22) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama`, `alamat`, `kota`, `telepon`, `email`) VALUES
('SP01', 'Penerbit Informatika', 'Jl. Buah Batu No. 121', 'Bandung', '0813-2220-1946', 'abc@gmail.com'),
('SP02', 'Andi Offset', 'Jl. Suryalaya IX No.3', 'Bandung', '0878-3903-0688', 'acc@gmail.com'),
('SP03', 'Danendra', 'Jl. Moch Toha 44', 'Bandung', '022-5201215', 'zz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(10, 'admin', '123'),
(11, 'admin', '123'),
(12, 'admin1', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
