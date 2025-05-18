-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2025 at 10:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemeliharaan_kompjav`
--

-- --------------------------------------------------------

--
-- Table structure for table `tkomputer`
--

CREATE TABLE `tkomputer` (
  `id_komputer` int NOT NULL,
  `nama_komputer` varchar(100) DEFAULT NULL,
  `tipe_komputer` varchar(50) DEFAULT NULL,
  `prosesor` varchar(100) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `penyimpanan` varchar(50) DEFAULT NULL,
  `sistem_operasi` varchar(50) DEFAULT NULL,
  `id_ruangan` int DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `status` enum('aktif','rusak','maintenance','lain-lain') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tkomputer`
--

INSERT INTO `tkomputer` (`id_komputer`, `nama_komputer`, `tipe_komputer`, `prosesor`, `ram`, `penyimpanan`, `sistem_operasi`, `id_ruangan`, `tanggal_pembelian`, `status`) VALUES
(4, 'apalah', 'intel', 'amd', '8 gb', '520 gb', 'windows', 2, '2025-05-10', 'aktif'),
(6, 'a', 'intel', 'amd', '8 gb', '520 gb', 'a', NULL, '2025-05-10', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tpemeliharaan`
--

CREATE TABLE `tpemeliharaan` (
  `id_pemeliharaan` int NOT NULL,
  `id_komputer` int DEFAULT NULL,
  `tanggal_pemeliharaan` date DEFAULT NULL,
  `jenis_pemeliharaan` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `status` varchar(50) DEFAULT NULL,
  `id_teknisi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tpemeliharaan`
--

INSERT INTO `tpemeliharaan` (`id_pemeliharaan`, `id_komputer`, `tanggal_pemeliharaan`, `jenis_pemeliharaan`, `keterangan`, `status`, `id_teknisi`) VALUES
(3, 4, '2025-05-10', 'maintenance', 'rusak', 'proses', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tperbaikan`
--

CREATE TABLE `tperbaikan` (
  `id_perbaikan` int NOT NULL,
  `id_komputer` int DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `komponen_yg_diperbaiki` varchar(100) DEFAULT NULL,
  `deskripsi_perbaikan` text,
  `status` varchar(50) DEFAULT NULL,
  `id_teknisi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `truangan`
--

CREATE TABLE `truangan` (
  `id_ruangan` int NOT NULL,
  `nama_ruangan` varchar(100) DEFAULT NULL,
  `lantai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `truangan`
--

INSERT INTO `truangan` (`id_ruangan`, `nama_ruangan`, `lantai`) VALUES
(2, 'kelas 12', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tteknisi`
--

CREATE TABLE `tteknisi` (
  `id_teknisi` int NOT NULL,
  `nama_teknisi` varchar(100) DEFAULT NULL,
  `telpon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tteknisi`
--

INSERT INTO `tteknisi` (`id_teknisi`, `nama_teknisi`, `telpon`, `email`, `alamat`) VALUES
(1, 'hariono', '0899232231', 'hariono@gmail.com', 'cibeber');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hak` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `nama`, `alamat`, `username`, `password`, `hak`) VALUES
(2, 'aku baik', 'baik', 'Asep RUdi', '202cb962ac59075b964b07152d234b70', 'petugas'),
(3, 'admin', 'admin', 'admin', '0192023a7bbd73250516f069df18b500', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tkomputer`
--
ALTER TABLE `tkomputer`
  ADD PRIMARY KEY (`id_komputer`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `tpemeliharaan`
--
ALTER TABLE `tpemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD KEY `id_komputer` (`id_komputer`),
  ADD KEY `id_teknisi` (`id_teknisi`);

--
-- Indexes for table `tperbaikan`
--
ALTER TABLE `tperbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_komputer` (`id_komputer`),
  ADD KEY `id_teknisi` (`id_teknisi`);

--
-- Indexes for table `truangan`
--
ALTER TABLE `truangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tteknisi`
--
ALTER TABLE `tteknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tkomputer`
--
ALTER TABLE `tkomputer`
  MODIFY `id_komputer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tpemeliharaan`
--
ALTER TABLE `tpemeliharaan`
  MODIFY `id_pemeliharaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tperbaikan`
--
ALTER TABLE `tperbaikan`
  MODIFY `id_perbaikan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truangan`
--
ALTER TABLE `truangan`
  MODIFY `id_ruangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tteknisi`
--
ALTER TABLE `tteknisi`
  MODIFY `id_teknisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tkomputer`
--
ALTER TABLE `tkomputer`
  ADD CONSTRAINT `tkomputer_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `truangan` (`id_ruangan`);

--
-- Constraints for table `tpemeliharaan`
--
ALTER TABLE `tpemeliharaan`
  ADD CONSTRAINT `tpemeliharaan_ibfk_1` FOREIGN KEY (`id_komputer`) REFERENCES `tkomputer` (`id_komputer`),
  ADD CONSTRAINT `tpemeliharaan_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `tteknisi` (`id_teknisi`);

--
-- Constraints for table `tperbaikan`
--
ALTER TABLE `tperbaikan`
  ADD CONSTRAINT `tperbaikan_ibfk_1` FOREIGN KEY (`id_komputer`) REFERENCES `tkomputer` (`id_komputer`),
  ADD CONSTRAINT `tperbaikan_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `tteknisi` (`id_teknisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
