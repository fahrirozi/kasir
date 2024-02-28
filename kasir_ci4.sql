-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 07:31 AM
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
-- Database: `kasir_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `id_jual` int(11) NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `tgl_jual` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `dibayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `id_user` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`id_jual`, `no_faktur`, `tgl_jual`, `jam`, `grand_total`, `dibayar`, `kembalian`, `id_user`) VALUES
(20, '202402240001', '2024-02-20', '17:04:06', 61000, 65000, 4000, 5),
(21, '202402240002', '2024-02-20', '17:51:52', 225000, 250000, 25000, 5),
(22, '202402250001', '2024-01-21', '03:53:48', 73000, 100000, 27000, 5),
(23, '202402250002', '2024-02-21', '10:27:35', 10000, 20000, 10000, 5),
(24, '202402250003', '2024-02-23', '10:29:42', 7500, 10000, 2500, 5),
(25, '202402250004', '2024-02-23', '12:52:00', 96000, 100000, 4000, 5),
(26, '202402250005', '2024-02-24', '14:22:18', 45000, 50000, 5000, 5),
(27, '202402260001', '2024-02-26', '03:11:43', 52500, 55000, 2500, 6),
(28, '202402260002', '2024-02-26', '03:40:27', 165000, 170000, 5000, 6),
(33, '202402270001', '2024-02-27', '11:21:53', 30000, 50000, 20000, 5),
(34, '202402270002', '2024-02-27', '05:47:47', 18000, 20000, 2000, 5),
(35, '202402270003', '2024-02-27', '06:25:43', 3000, 5000, 2000, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Bumbu Dapur'),
(4, 'Elektronik'),
(5, 'Alat Tulis Kantor'),
(6, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(25) DEFAULT NULL,
  `nama_produk` varchar(150) DEFAULT NULL,
  `id_kategori` int(25) DEFAULT NULL,
  `id_satuan` int(25) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `id_satuan`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, '11111', 'Permen Kis', 1, 7, 5000, 7000, 7),
(2, '11112', 'Frisian Flag Kental Manis', 2, 10, 8000, 10000, 65),
(3, '11113', 'Aqua', 2, 15, 6000, 8000, 40),
(5, '11114', 'Coca Cola', 2, 15, 10000, 15000, 40),
(6, '11115', 'Yakult', 2, 1, 5000, 7500, 20),
(7, '11116', 'Indomie', 1, 1, 2000, 3000, 69);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci`
--

CREATE TABLE `tbl_rinci` (
  `id_rinci` int(11) NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `kode_produk` varchar(25) DEFAULT NULL,
  `modal` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `untung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rinci`
--

INSERT INTO `tbl_rinci` (`id_rinci`, `no_faktur`, `kode_produk`, `modal`, `harga`, `qty`, `total_harga`, `untung`) VALUES
(1, '202402260002', '11114', 10000, 15000, 1, 15000, 5000),
(2, '202402260002', '11112', 8000, 10000, 15, 150000, 30000),
(3, '202402270001', '11116', 2000, 3000, 10, 30000, 10000),
(4, '202402270001', '11114', 10000, 15000, 5, 75000, 25000),
(5, '202402270002', '11115', 5000, 7500, 5, 37500, 12500),
(6, '202402270003', '11114', 10000, 15000, 4, 60000, 20000),
(7, '202402270003', '11115', 5000, 7500, 7, 52500, 17500),
(8, '202402270004', '11116', 2000, 3000, 4, 12000, 4000),
(9, '202402270004', '11111', 5000, 7000, 2, 14000, 4000),
(10, '202402270001', '11116', 2000, 3000, 10, 30000, 10000),
(11, '202402270002', '11116', NULL, 3000, 6, 18000, 18000),
(12, '202402270003', '11116', 2000, 3000, 1, 3000, 1000);

--
-- Triggers `tbl_rinci`
--
DELIMITER $$
CREATE TRIGGER `t_rinci` AFTER INSERT ON `tbl_rinci` FOR EACH ROW BEGIN
UPDATE tbl_produk SET stok = stok - NEW.qty
WHERE kode_produk = NEW.kode_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(2) NOT NULL,
  `nama_satuan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'PCS'),
(2, 'BOX'),
(3, 'Lusin'),
(4, 'Buah'),
(5, 'KG'),
(6, 'Unit'),
(7, 'Bungkus'),
(9, 'Karung'),
(10, 'Kaleng'),
(15, 'Liter'),
(19, 'Bungkus'),
(20, 'Bungkus'),
(21, '1'),
(22, 'PCS'),
(26, 'Kaleng'),
(27, 'Bungkus'),
(28, 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(25) DEFAULT NULL,
  `slogan` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telpon` varchar(18) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `slogan`, `alamat`, `no_telpon`, `deskripsi`) VALUES
(1, 'Market Uncle ', 'Haya pork Bbq is Halal?', 'Jl. Tentara Pelajar', '08999999999', 'apa saja\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(7, 'rafi', 'fi@gmail.com', '123', 1),
(12, 'fahri', 'fahrozi@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 2),
(13, 'M fahri rozi', 'fahri@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_rinci`
--
ALTER TABLE `tbl_rinci`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rinci`
--
ALTER TABLE `tbl_rinci`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
