-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 01:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sapra`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `level`, `id`) VALUES
(4, 'dimas', '$2y$10$/kPDEaK9ry.Ekj93LEgos.GAut6IFvjwhmN9zwoU4iYCVIlwNrZde', 1, 12),
(6, 'admin', '$2y$10$m4wm15JGQ4GKu1RHlIUbpOk1v613yHUbyjodi3KQr/7SFN4NueCWi', 2, 0),
(7, 'hilmi', '$2y$10$Cp5ieCOkKF2tUsD4ye6ee.hlFUxoWfg5Lv5xMoUyv8.e2sDCNzB66', 2, 27),
(8, '13', '$2y$10$NTdl6k3.aoJ2jc2zii/cru9p5Z1wIUuLbMds6cwZOxyrt1Mtv3tee', 2, 13),
(9, 'angkasa', '$2y$10$TaBHKAu9Yn9XrDoPCFTVIu5kNUklR8lkktuX7Uo2mYRongyz1y8Ci', 2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tgl_register` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `jumlah`, `tgl_register`) VALUES
(1, 'Proyektor', 12, '2019-05-01'),
(3, 'Laptop', 7, '2019-05-08'),
(4, 'Speaker', 12, '2019-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(3) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `telp` int(13) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `telp`, `alamat`) VALUES
(12, 'Dimas Angkasa Nurindra', 2147483647, 'Jl. nya sudah lupa'),
(13, 'HamRiz ZUye', 8912345, 'Rahasia'),
(27, 'Hilmi Uye', 90990, 'awdwa'),
(28, 'Samid Angkasa', 2147483647, 'Sudah Ingat');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_inventaris` int(3) NOT NULL,
  `id_pegawai` int(3) NOT NULL,
  `tgl_pinjam` varchar(10) NOT NULL,
  `tgl_kembali` varchar(10) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_inventaris`, `id_pegawai`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(4, 1, 12, '2019-05-15', '2019-05-30', 'Kembali'),
(7, 3, 13, '2019-05-27', '2019-05-08', 'Kembali'),
(8, 1, 13, '2019-05-07', '2019-05-23', 'Terima'),
(9, 3, 13, '2019-05-06', '2019-05-23', 'Tolak'),
(16, 4, 13, '2019-05-21', '2019-05-22', 'Terima'),
(17, 4, 28, '2019-05-21', '2019-05-31', 'Terima'),
(18, 1, 28, '2019-05-22', '2019-05-24', 'Terima'),
(19, 3, 13, '2019-05-21', '2019-05-23', 'Kembali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_inventaris` (`id_inventaris`,`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
