-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2024 at 02:38 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21300876_mservis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', 'admin'),
(2, 'alfarsyi', '123masuk'),
(3, 'baihaqi\r\n', '123masuk'),
(4, 'Nugraha', '123masuk');

-- --------------------------------------------------------

--
-- Table structure for table `cek`
--

CREATE TABLE `cek` (
  `id_cek` int(3) NOT NULL,
  `nama_cek` varchar(50) DEFAULT NULL,
  `harga_cek` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cek`
--

INSERT INTO `cek` (`id_cek`, `nama_cek`, `harga_cek`) VALUES
(1, 'Cek Kelistrikan', 20000),
(2, NULL, NULL),
(3, 'Cek Sekring ', 25000),
(4, 'Cek Pengapian ', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `oli`
--

CREATE TABLE `oli` (
  `id_oli` int(3) NOT NULL,
  `nama_oli` varchar(50) DEFAULT NULL,
  `harga_oli` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oli`
--

INSERT INTO `oli` (`id_oli`, `nama_oli`, `harga_oli`) VALUES
(1, 'Oli Castrol 1 Liter', 65000),
(2, NULL, NULL),
(3, 'Oli MPX 1 Liter', 65000),
(4, 'Oli Yamalube 1 Liter', 55000),
(5, 'Oli Shell 1 Liter', 60000),
(6, 'Oli Master 1 Liter ', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `jenis_jasa` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `telepon_pemesan` varchar(15) NOT NULL,
  `alamat_pemesan` varchar(100) NOT NULL,
  `biaya_jasa` int(10) DEFAULT NULL,
  `biaya_tambahan` int(10) DEFAULT NULL,
  `total_biaya` int(10) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal_datang` date NOT NULL,
  `status_pemesanan` varchar(25) NOT NULL DEFAULT 'Pesanan Diterima',
  `id_oli` int(3) DEFAULT NULL,
  `id_servis` int(3) DEFAULT NULL,
  `id_cek` int(3) DEFAULT NULL,
  `id_sparepart` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `jenis_jasa`, `id_user`, `tanggal_pemesanan`, `nama_pemesan`, `telepon_pemesan`, `alamat_pemesan`, `biaya_jasa`, `biaya_tambahan`, `total_biaya`, `keterangan`, `tanggal_datang`, `status_pemesanan`, `id_oli`, `id_servis`, `id_cek`, `id_sparepart`) VALUES
(73, 'Service Motor Gigi', 1, '2024-02-03', 'coba', '08888623800', 'bekasi', 0, 0, 65000, ' ', '2024-02-04', 'Pesanan Diterima', 2, 1, 2, 2),
(74, 'Service Motor Matic', 17, '2024-02-03', 'tes', '085796582143', 'Depok', 0, 0, 265000, ' ', '2024-02-04', 'Pesanan Diterima', 4, 1, 4, 8),
(75, 'Service Motor Gigi', 2, '2024-02-03', 'Ari Baihaqi', '085796542135', 'Bekasi', 0, 0, 300000, ' ', '2024-02-05', 'Pesanan Diterima', 1, 1, 1, 7),
(76, 'Service Motor Kopling', 9, '2024-02-03', 'Reza Alfarsyi', '085745638921', 'Jakarta Timur', 0, 0, 160000, ' ', '2024-02-04', 'Pesanan Diterima', 5, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'Service Motor Matic', 'matic.png', 'Melayani Servis CVT, Penggantian Oli, Cek Kondisi dan Pergantian Sparepart.'),
(2, 'Service Motor Gigi', 'Bebek.png\r\n', 'Melayani Servis Karburator, Penggantian Oli, Cek Kondisi dan Pergantian Sparepart.'),
(3, 'Service Motor Kopling', 'kopling.png', 'Melayani Servis Karburator, Penggantian Oli, Cek Kondisi dan Pergantian Sparepart.');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id_servis` int(3) NOT NULL,
  `nama_servis` varchar(50) DEFAULT NULL,
  `harga_servis` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id_servis`, `nama_servis`, `harga_servis`) VALUES
(1, 'Servis Karburator', 65000),
(2, NULL, NULL),
(3, 'Servis CVT', 80000),
(4, 'Servis TB', 130000);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` int(3) NOT NULL,
  `nama_sparepart` varchar(50) DEFAULT NULL,
  `harga_sparepart` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_sparepart`, `nama_sparepart`, `harga_sparepart`) VALUES
(1, 'Bohlam Depan Honda', 30000),
(2, NULL, NULL),
(3, 'Kampas Rem depan ', 40000),
(4, 'Busi ', 45000),
(5, 'Kampas Kopling ', 70000),
(6, 'Vanbelt Honda', 120000),
(7, 'Master Rem ', 150000),
(8, 'Gear Set ', 130000),
(9, 'Cakram Rem Honda ', 80000),
(10, 'Selang Rem', 50000),
(11, 'Filter Udara Honda', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email_pemesan` varchar(50) NOT NULL,
  `password_pemesan` varchar(25) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email_pemesan`, `password_pemesan`, `nama_pemesan`) VALUES
(1, 'coba@email.com', '123masuk', 'coba'),
(2, 'aribaihaqi@email.com', 'ariskuy', 'Ari Baihaqi'),
(9, 'rezagojo@email.com', 'xavieranjay', 'Reza Alfarsyi'),
(10, 'septian09@email.com', 'asdf123', 'Septian Nugraha'),
(12, 'vr46@email.com', 'racing46', 'Valentino Rossi'),
(16, 'ade123@gmail.com', 'adesn123', 'ade123'),
(17, 'tes123@gmail.com', 'tes123', 'tes'),
(18, 'ari123@gmail.com', 'ari12345', 'ari123'),
(19, 'setiawan01@gmail.com', 'setiawan123', 'setiawan'),
(20, 'nugraha7684@gmail.com', 'anjay123', 'Nugraha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cek`
--
ALTER TABLE `cek`
  ADD PRIMARY KEY (`id_cek`);

--
-- Indexes for table `oli`
--
ALTER TABLE `oli`
  ADD PRIMARY KEY (`id_oli`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk_id_servis` (`id_servis`),
  ADD KEY `fk_id_cek` (`id_cek`),
  ADD KEY `fk_id_oli` (`id_oli`),
  ADD KEY `fk_id_sparepart` (`id_sparepart`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id_servis`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cek`
--
ALTER TABLE `cek`
  MODIFY `id_cek` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oli`
--
ALTER TABLE `oli`
  MODIFY `id_oli` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id_servis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id_sparepart` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_id_cek` FOREIGN KEY (`id_cek`) REFERENCES `cek` (`id_cek`),
  ADD CONSTRAINT `fk_id_oli` FOREIGN KEY (`id_oli`) REFERENCES `oli` (`id_oli`),
  ADD CONSTRAINT `fk_id_servis` FOREIGN KEY (`id_servis`) REFERENCES `servis` (`id_servis`),
  ADD CONSTRAINT `fk_id_sparepart` FOREIGN KEY (`id_sparepart`) REFERENCES `sparepart` (`id_sparepart`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
