-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 07:48 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_febri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `terakhir_logout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `terakhir_logout`) VALUES
(1, 'admin', 'admin', 'Febri Maulana Yunus', 'Tanggal : 20 - 04 - 2019, 16 : 53 : 57');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(11) NOT NULL,
  `foto_brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `foto_brand`) VALUES
(1, 'Nokia', 'brand1.png'),
(2, 'Samsung', 'brand3.png'),
(4, 'Canon', 'brand2.png'),
(5, 'Apple', 'brand4.png'),
(6, 'HTC', 'brand5.png'),
(7, 'LG', 'brand6.png'),
(8, 'Xiaomi', 'logo xiaomi.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategory_produk`
--

CREATE TABLE `kategory_produk` (
  `id_kategory` int(11) NOT NULL,
  `nama_kategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategory_produk`
--

INSERT INTO `kategory_produk` (`id_kategory`, `nama_kategory`) VALUES
(1, 'Hp'),
(2, 'laptop'),
(3, 'pakaian pria'),
(4, 'pakaian wanita');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`, `status`) VALUES
(1, 'Jakarta', 0, 'Geratis'),
(2, 'Bogor', 0, 'Geratis'),
(3, 'Depok', 0, 'Geratis'),
(4, 'Tangerang', 0, 'Geratis'),
(5, 'Bekasi', 0, 'Geratis'),
(6, 'Aceh', 40000, '40000'),
(7, 'Medan', 30000, '30000'),
(8, 'Palembang', 30000, '30000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `code_confirm` text NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `aktif` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `code_confirm`, `nama_pelanggan`, `telepon_pelanggan`, `aktif`) VALUES
(11, 'brian.dumet@gmail.com', '123123', '75250bfaa422335d871c57f0e8eae3380afabd50', 'Mas Bram', '08181818181818', '1'),
(12, 'febrimaulana0224@gmail.com', 'marali11', '1964e4569311fae77d544c49d9d1dbead6ce20e3', 'Ahmad Yunus', '081818972724', '1'),
(13, 'febriyunus@gmail.com', 'marali11', '7773bc44ad003429e0c5dd338e04dafa65d9c95c', 'Febri Maulana Yunus', '081818972724', '1'),
(14, 'alfathan.rizki.r@gmail.com', '12345678', 'c3a348b8d0cc4915645831b0ad9f8154de40cc59', 'fatan', '081818776567', '1'),
(15, 'nadiyatamami@gmail.com', '1234567', '8e30094e4973a68136f6e6e2e5cae2c43cf5cd68', 'nadiya', '0895354551611', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 22, 'yunus', 'mandiri', 5500000, '2019-02-21', '20190221110815asus x555LD.png'),
(4, 23, 'yunus', 'mandiri', 5500000, '2019-02-21', '20190221111604asus vivobook.png'),
(5, 24, 'yunus', 'bca', 4600000, '2019-02-21', '20190221112947asus x555LD.png'),
(6, 27, 'febri', 'bca', 17000000, '2019-03-04', '20190304093725asus x555LD.png'),
(7, 28, 'Febri', 'mandiri', 170000, '2019-03-11', '20190311141025aluna blouse.jpg'),
(8, 29, 'febri', 'mandiri', 15210000, '2019-05-19', '201905190953213x4 new.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`) VALUES
(22, 11, 3, '2019-02-21', 5500000, 'Depok', 0, 'jalan depok baru', 'Barang Sudah Sampai'),
(23, 12, 3, '2019-02-21', 5500000, 'Depok', 0, 'depok', 'Barang Sudah Sampai'),
(24, 12, 3, '2019-02-21', 4600000, 'Depok', 0, 'depok baru', 'Barang Sudah Sampai'),
(25, 12, 1, '2019-02-21', 2300000, 'Jakarta', 0, 'h.syaip rt 005/001', 'Pending'),
(26, 12, 3, '2019-02-22', 7800000, 'Depok', 0, 'Gang Palem depok limo grogol', 'Pending'),
(27, 13, 3, '2019-03-04', 17000000, 'Depok', 0, 'depok', 'Barang Sedang Dikirim'),
(28, 13, 3, '2019-03-11', 170000, 'Depok', 0, 'depok', 'Barang Sedang Dikirim'),
(29, 13, 6, '2019-05-19', 15210000, 'Aceh', 40000, 'aceh tangah', 'Barang Sudah Sampai');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(35, 22, 24, 1, 'Iphone 6', 5500000, 200, 200, 5500000),
(36, 23, 24, 1, 'Iphone 6', 5500000, 200, 200, 5500000),
(37, 24, 37, 2, 'Xiaomi redmi Note 6', 2300000, 200, 400, 4600000),
(38, 25, 37, 1, 'Xiaomi redmi Note 6', 2300000, 200, 200, 2300000),
(39, 26, 24, 1, 'Iphone 6', 5500000, 200, 200, 5500000),
(40, 26, 37, 1, 'Xiaomi redmi Note 6', 2300000, 200, 200, 2300000),
(41, 27, 25, 1, 'Laptop Rog Strix', 17000000, 2000, 2000, 17000000),
(42, 28, 26, 1, 'Batik Moderen', 170000, 25, 25, 170000),
(43, 29, 36, 1, 'Lenovo Yoga 730', 15000000, 1500, 1500, 15000000),
(44, 29, 33, 1, 'Kemeja', 170000, 21, 21, 170000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `produk_baru` varchar(11) NOT NULL DEFAULT 'ya',
  `kategory_id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `harga_produk_diskon` int(100) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `total_suka` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `produk_baru`, `kategory_id`, `nama_produk`, `harga_produk`, `harga_produk_diskon`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `total_suka`) VALUES
(16, 'tidak', 1, 'Sony Microsoft', 4500000, 4000000, 450, 'product-4.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti officia dolorum dolor perferendis saepe quod esse debitis tenetur possimus mollitia enim, sunt velit deserunt, harum vitae facere animi incidunt provident.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti officia dolorum dolor perferendis saepe quod esse debitis tenetur possimus mollitia enim, sunt velit deserunt, harum vitae facere animi incidunt provident.</p>\r\n', 0),
(24, 'ya', 1, 'Iphone 6', 6000000, 5500000, 200, 'product-5.jpg', 'produk iphone terbaru', 3),
(25, 'ya', 2, 'Laptop Rog Strix', 20000000, 17000000, 2000, 'Asus ROG Strix.jpg', '<p>Ini adalah produk laprop seri gamming terbaik</p>\r\n', 4),
(27, 'ya', 4, 'Gaun Pesta', 350000, 310000, 30, 'gaun pesta.png', 'Produk baju gaun wanita untuk menghadiri acara pesta', 0),
(28, 'ya', 2, 'Laptop Acer Predator', 19000000, 15000000, 2000, 'acer predator.png', '<p>produk laptop gaming dari acer</p>\r\n', 1),
(29, 'tidak', 1, 'Samsung Galaxy A7', 6000000, 5500000, 168, 'samsung a7.png', '<p><strong>Spesifikasi Samsung A7</strong></p>\r\n\r\n<p><strong>Rilis :&nbsp;</strong>Oktober 2018</p>\r\n\r\n<p><strong>Chipset :&nbsp;</strong>Exynos 7885 Octa</p>\r\n\r\n<p><strong>Cpu :&nbsp;</strong>Octa-core 2.2GHz Cortex- A53</p>\r\n\r\n<p><strong>GPU :&nbsp;</strong>Mail - G71 MP2</p>\r\n\r\n<p><strong>RAM :&nbsp;</strong>4GB</p>\r\n\r\n<p><strong>Storage :&nbsp;</strong>64GB(MicroSD up to 512GB)</p>\r\n\r\n<p><strong>OS :&nbsp;</strong>64GB(MicroSD up to 512GB)</p>\r\n', 0),
(30, 'ya', 2, 'Asus GL554VE', 10000000, 9000000, 1500, 'asus GL554VE.png', '<p><strong>Laptop Asus GL554VE</strong></p>\r\n\r\n<p><strong>SPESIFIKASI</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0),
(31, 'ya', 4, 'Gamis Wanita Hijab', 200000, 150000, 200, 'Gamis wanita.jpg', '<p><strong>Produk Gamis</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0),
(32, 'ya', 4, 'Jaket Jeans', 400000, 350000, 22, 'jaket jeans wanita.jpg', '<p><strong>Jaket jeans</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 1),
(33, 'ya', 4, 'Kemeja', 200000, 170000, 21, 'kemeja wanita.jpg', '<p><strong>Kemeja Cocok untuk kerja dll</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0),
(34, 'ya', 2, 'Hp pavilion', 12000000, 10000000, 2000, 'Hp pavilion.jpg', '<p><strong>Spesifikasi</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 1),
(35, 'ya', 2, 'Lenovo IdeaPad', 13000000, 11000000, 2000, 'Lenovo ideaPad.png', '<p><strong>Spesifikasi</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0),
(36, 'ya', 2, 'Lenovo Yoga 730', 17000000, 15000000, 1500, 'Lenovo yoga 730.jpg', '<p><strong>Spesifikasi</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0),
(37, 'ya', 1, 'Xiaomi redmi Note 6', 2500000, 2300000, 200, 'Xiaomi redmi note 6.jpg', '<p><strong>Spesifikasi</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_pelanggan_suka`
--

CREATE TABLE `produk_pelanggan_suka` (
  `id_suka` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_pelanggan_suka`
--

INSERT INTO `produk_pelanggan_suka` (`id_suka`, `id_pelanggan`, `id_produk`) VALUES
(19, 6, 24),
(20, 4, 24),
(21, 4, 25),
(22, 4, 26),
(23, 5, 25),
(24, 6, 25),
(25, 5, 28),
(26, 5, 38),
(27, 5, 32),
(28, 12, 24),
(29, 12, 34),
(30, 13, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `kategory_produk`
--
ALTER TABLE `kategory_produk`
  ADD PRIMARY KEY (`id_kategory`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_pelanggan_suka`
--
ALTER TABLE `produk_pelanggan_suka`
  ADD PRIMARY KEY (`id_suka`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategory_produk`
--
ALTER TABLE `kategory_produk`
  MODIFY `id_kategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `produk_pelanggan_suka`
--
ALTER TABLE `produk_pelanggan_suka`
  MODIFY `id_suka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
