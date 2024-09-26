-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 09:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL DEFAULT '0',
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode`, `nama`, `merk`, `stok`, `satuan`) VALUES
('TRG234', 'Keaybord', 'Logitech', '4', 'Pcs'),
('UJL890', 'MousE', 'Logitech', '3', 'Pcs'),
('VGF875', 'Papan Tulis', 'Snowman', '2', 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `username`, `tgl_lahir`, `jenis_kelamin`, `nohp`, `password`, `level`) VALUES
('12367', 'aa', 'eeee', '2007-12-17', 'Perempuan', '098765432123', '202cb962ac59075b964b07152d234b70', 'user'),
('2201091005', 'ayunda', 'ayunda', '2007-12-18', 'Perempuan', '1234', '202cb962ac59075b964b07152d234b70', 'user'),
('2201091008', 'Fikri Wilya', 'fikri', '2004-03-12', 'Laki-Laki', '567899', '202cb962ac59075b964b07152d234b70', 'user'),
('2201091017', 'Altaf Hafizun', 'altaf', '2024-01-13', 'Laki-Laki', '09876543356', '202cb962ac59075b964b07152d234b70', 'user'),
('2201092010', 'Hanifah Firzi', 'hani', '2008-12-16', 'Perempuan', '09876567899', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
('2201092042', 'Nada Yuliani', 'nada', '2024-01-27', 'Perempuan', '0896542567', '202cb962ac59075b964b07152d234b70', 'user'),
('22010933', 'diki', 'dikii', '2024-01-12', 'Laki-Laki', '9999999', '202cb962ac59075b964b07152d234b70', 'user'),
('2201097090', 'Gitaa', 'gita', '2024-01-08', 'Perempuan', '4545', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jaminan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nim`, `nama_barang`, `jumlah`, `tgl_pinjam`, `tgl_kembali`, `jaminan`, `status`) VALUES
(54, '2201091005', 'Mouse', 1, '2024-01-11', '2024-01-11', 'KTM', 'Selesai'),
(55, '2201091005', 'Mouse', 1, '2024-01-11', '2024-01-11', 'KTM', 'Tidak Disetujui'),
(56, '2201091005', 'AC', 1, '2024-01-11', '2024-01-11', 'KTM', 'Selesai'),
(57, '2201091005', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Tidak Disetujui'),
(58, '2201091005', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(59, '2201092010', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(60, '2201092010', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(61, '2201092010', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(62, '2201091005', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Tidak Disetujui'),
(63, '2201091005', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Tidak Disetujui'),
(64, '2201091005', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(65, '2201092010', 'Laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(66, '2201092010', 'Keaybord', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(67, '2201091008', 'Komputer', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(68, '22010933', 'laptop', 1, '2024-01-12', '2024-01-14', 'KTM', 'Selesai'),
(69, '2201091005', 'Keaybord', 1, '2024-01-13', '2024-01-15', 'KTM', 'Selesai'),
(70, '2201091005', 'Keaybord', 1, '2024-01-13', '2024-01-15', 'KTM', 'Selesai'),
(71, '2201091005', 'MousE', 1, '2024-01-13', '2024-01-15', 'KTM', 'Selesai'),
(72, '2201091005', 'MousE', 1, '2024-01-13', '2024-01-15', 'KTM', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode` varchar(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kode`, `jumlah`, `tanggal`, `status`, `ruangan`) VALUES
('VGF875', '1', '2024-01-11 20:15:34', 'Mutasi', 'E204'),
('VGF875', '1', '2024-01-11 20:15:47', 'Mutasi', 'E207'),
('UJL890', '3', '2024-01-12 03:04:53', 'Mutasi', 'E207'),
('TRG234', '2', '2024-01-13 04:35:02', 'Mutasi', 'E201'),
('TRG234', '2', '2024-01-13 04:35:19', 'Mutasi', 'E201');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `level`) VALUES
('hanes', 'hanes', '202cb962ac59075b964b07152d234b70', 'admin'),
('iqbal', 'iqbal', '202cb962ac59075b964b07152d234b70', 'admin'),
('ira', 'fitratul', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
('naya', 'naya', '202cb962ac59075b964b07152d234b70', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
