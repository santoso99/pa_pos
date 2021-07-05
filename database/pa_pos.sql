-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 05, 2021 at 06:20 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pa_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_brand` varchar(20) NOT NULL,
  `ram` varchar(100) DEFAULT NULL,
  `memori` varchar(100) DEFAULT NULL,
  `layar` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `deskripsi_barang` text,
  `harga_satuan` double NOT NULL,
  `foto_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_brand`, `ram`, `memori`, `layar`, `os`, `deskripsi_barang`, `harga_satuan`, `foto_barang`) VALUES
('MD-PR-000000001', 'Iphone 11 Pro Max', 'MD-KP-00001', 'MD-BR-00001', '4', '512', '6.7', 'IOS 14', 'Deskripsi Iphone 11 Pro Midnight Green 256 GB\r\nIphone 11 Pro Midnight Green 256 GB\r\nbatre health 85%\r\nmulus banget pemakaian pribadi .\r\nAcc tidak pernah di pakai sama sekali\r\nex singapore\r\nsemua simcard bisa', 23000000, '0d22801d3b7d02641a6d3409057da105.jpeg'),
('MD-PR-000000002', 'Iphone 12 ', 'MD-KP-00001', 'MD-BR-00001', '6', '128', '6', 'IOS 14', 'Iphone 12', 25000000, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `brand_barang`
--

CREATE TABLE `brand_barang` (
  `id_brand` varchar(20) NOT NULL,
  `nama_brand` varchar(100) NOT NULL,
  `logo_brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand_barang`
--

INSERT INTO `brand_barang` (`id_brand`, `nama_brand`, `logo_brand`) VALUES
('MD-BR-00001', 'Apple', 'ad3d4bc91d0340cdeae87dedb3b40add.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account`
--

CREATE TABLE `chart_of_account` (
  `account_no` varchar(20) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `normal_balance` varchar(2) NOT NULL,
  `sub_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart_of_account`
--

INSERT INTO `chart_of_account` (`account_no`, `account_name`, `normal_balance`, `sub_code`) VALUES
('1-10001', 'Kas', 'd', '1-1'),
('1-10002', 'Piutang Dagang', 'd', '1-1'),
('1-10003', 'Bank Mandiri', 'd', '1-1'),
('1-10004', 'Bank BCA', 'd', '1-1'),
('1-10005', 'Persediaan Barang Dagang', 'd', '1-1'),
('1-20001', 'Kios ', 'd', '1-2'),
('1-20002', 'Akumulasi Penyusutan Kios', 'k', '1-2'),
('1-20003', 'Motor Operasional Penjualan', 'd', '1-2'),
('1-20004', 'Akumulasi Penyusutan Motor Operasional Penjualan', 'k', '1-2'),
('1-30001', 'Obligasi', 'd', '1-3'),
('1-30002', 'Saham', 'd', '1-3'),
('2-10001', 'Pendapatan diterima dimuka', 'k', '2-1'),
('2-10002', 'Utang Dagang', 'k', '2-1'),
('2-20001', 'Pinjaman Bank Mandiri', 'k', '2-2'),
('2-20002', 'Pinjaman Bank BCA', 'k', '2-2'),
('3-10001', 'Modal Usaha', 'k', '3-1'),
('3-10002', 'Ekuitas Awal', 'k', '3-1'),
('4-10001', 'Penjualan', 'k', '4-1'),
('4-10002', 'Potongan Penjualan', 'd', '4-1'),
('4-10003', 'Retur Penjualan', 'd', '4-1'),
('4-10004', 'Retur Pembelian', 'k', '4-1'),
('4-20001', 'Pendapatan Bunga', 'k', '4-2'),
('5-10001', 'Beban Gaji Karyawan Kios', 'd', '5-1'),
('5-20001', 'Beban Listrik, Telepon dan Air', 'd', '5-2'),
('6-10006', 'Harga Pokok Penjualan', 'd', '6-1');

-- --------------------------------------------------------

--
-- Table structure for table `coa_head`
--

CREATE TABLE `coa_head` (
  `head_code` varchar(20) NOT NULL,
  `head_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coa_head`
--

INSERT INTO `coa_head` (`head_code`, `head_name`) VALUES
('1', 'Aktiva'),
('2', 'Pasiva'),
('3', 'Modal'),
('4', 'Pendapatan'),
('5', 'Beban Operasi'),
('6', 'Harga Pokok Penjualan');

-- --------------------------------------------------------

--
-- Table structure for table `coa_subhead`
--

CREATE TABLE `coa_subhead` (
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(150) NOT NULL,
  `head_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coa_subhead`
--

INSERT INTO `coa_subhead` (`sub_code`, `sub_name`, `head_code`) VALUES
('1-1', 'Aktiva Lancar', '1'),
('1-2', 'Aktiva Tetap', '1'),
('1-3', 'Aktiva Tidak Berwujud', '1'),
('2-1', 'Kewajiban Jangka Pendek', '2'),
('2-2', 'Kewajiban Jangka Panjang', '2'),
('3-1', 'Modal', '3'),
('4-1', 'Pendapatan dari penjualan', '4'),
('4-2', 'Pendapatan diluar Usaha', '4'),
('5-1', 'Beban Penjualan', '5'),
('5-2', 'Beban Administrasi dan Umum', '5'),
('5-3', 'Beban diluar Usaha', '5'),
('6-1', 'Harga Pokok Penjualan', '6');

-- --------------------------------------------------------

--
-- Table structure for table `detail_setting_jurnal`
--

CREATE TABLE `detail_setting_jurnal` (
  `id` bigint(20) NOT NULL,
  `id_setting` varchar(20) NOT NULL,
  `debet` varchar(20) NOT NULL,
  `kredit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_setting_jurnal`
--

INSERT INTO `detail_setting_jurnal` (`id`, `id_setting`, `debet`, `kredit`) VALUES
(1, 'STT-0001', '1-10001', '3-10001'),
(2, 'STT-0002', '1-10001', '3-10002'),
(3, 'STT-0003', '1-10003', '1-10001'),
(4, 'STT-0004', '1-10001', '2-20001'),
(5, 'STT-0005', '2-20001', '1-10001'),
(6, 'STT-0006', '5-10001', '1-10001'),
(7, 'STT-0007', '5-20001', '1-10001');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` bigint(20) NOT NULL,
  `periode` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_no` varchar(20) NOT NULL,
  `posisi` char(1) NOT NULL,
  `nominal` double NOT NULL,
  `id_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `periode`, `tanggal`, `account_no`, `posisi`, `nominal`, `id_transaksi`) VALUES
(17, 202106, '2021-06-29 17:00:00', '1-10001', 'd', 1000000000, 'TRX-KM-000000001'),
(18, 202106, '2021-06-29 17:00:00', '3-10002', 'k', 1000000000, 'TRX-KM-000000001'),
(19, 202107, '2021-07-04 03:21:28', '1-10005', 'd', 170000000, 'TRX-PO-000000001'),
(20, 202107, '2021-07-04 03:21:28', '1-10001', 'k', 170000000, 'TRX-PO-000000001'),
(21, 202107, '2021-07-04 03:32:14', '1-10001', 'd', 23000000, 'TRX-SO-000000001'),
(22, 202107, '2021-07-04 03:32:14', '4-10001', 'k', 23000000, 'TRX-SO-000000001'),
(23, 202107, '2021-07-04 03:32:14', '6-10006', 'd', 17000000, 'TRX-SO-000000001'),
(24, 202107, '2021-07-04 03:32:14', '1-10005', 'k', 17000000, 'TRX-SO-000000001'),
(25, 202107, '2021-07-04 03:34:45', '1-10001', 'd', 23000000, 'TRX-SO-000000002'),
(26, 202107, '2021-07-04 03:34:45', '4-10001', 'k', 23000000, 'TRX-SO-000000002'),
(27, 202107, '2021-07-04 03:34:45', '6-10006', 'd', 17000000, 'TRX-SO-000000002'),
(28, 202107, '2021-07-04 03:34:45', '1-10005', 'k', 17000000, 'TRX-SO-000000002'),
(29, 202107, '2021-07-04 08:55:10', '1-10005', 'd', 269000000, 'TRX-PO-000000002'),
(30, 202107, '2021-07-04 08:55:10', '1-10001', 'k', 269000000, 'TRX-PO-000000002'),
(31, 202107, '2021-07-04 08:55:54', '1-10001', 'd', 25000000, 'TRX-SO-000000003'),
(32, 202107, '2021-07-04 08:55:54', '4-10001', 'k', 25000000, 'TRX-SO-000000003'),
(33, 202107, '2021-07-04 08:55:54', '6-10006', 'd', 23500000, 'TRX-SO-000000003'),
(34, 202107, '2021-07-04 08:55:54', '1-10005', 'k', 23500000, 'TRX-SO-000000003'),
(37, 202107, '2021-07-04 12:18:04', '1-10001', 'd', 25000000, 'TRX-SO-000000004'),
(38, 202107, '2021-07-04 12:18:04', '4-10001', 'k', 25000000, 'TRX-SO-000000004'),
(39, 202107, '2021-07-04 12:18:04', '6-10006', 'd', 23500000, 'TRX-SO-000000004'),
(40, 202107, '2021-07-04 12:18:04', '1-10005', 'k', 23500000, 'TRX-SO-000000004'),
(41, 202107, '2021-07-04 12:20:08', '1-10001', 'd', 25000000, 'TRX-SO-000000005'),
(42, 202107, '2021-07-04 12:20:08', '4-10001', 'k', 25000000, 'TRX-SO-000000005'),
(43, 202107, '2021-07-04 12:20:08', '6-10006', 'd', 23500000, 'TRX-SO-000000005'),
(44, 202107, '2021-07-04 12:20:08', '1-10005', 'k', 23500000, 'TRX-SO-000000005'),
(47, 202107, '2021-07-04 12:23:01', '1-10001', 'd', 64000000, 'TRX-PR-000000001'),
(48, 202107, '2021-07-04 12:23:01', '1-10005', 'k', 64000000, 'TRX-PR-000000001'),
(49, 202107, '2021-07-03 17:00:00', '5-10001', 'd', 15000000, 'TRX-KK-000000001'),
(50, 202107, '2021-07-03 17:00:00', '1-10001', 'k', 15000000, 'TRX-KK-000000001'),
(51, 202107, '2021-07-04 12:57:44', '1-10001', 'd', 23000000, 'TRX-SO-000000006'),
(52, 202107, '2021-07-04 12:57:44', '4-10001', 'k', 23000000, 'TRX-SO-000000006'),
(53, 202107, '2021-07-04 12:57:44', '6-10006', 'd', 17000000, 'TRX-SO-000000006'),
(54, 202107, '2021-07-04 12:57:44', '1-10005', 'k', 17000000, 'TRX-SO-000000006'),
(55, 202107, '2021-07-04 13:17:17', '4-10003', 'd', 23000000, 'TRX-SR-000000001'),
(56, 202107, '2021-07-04 13:17:17', '1-10001', 'k', 23000000, 'TRX-SR-000000001'),
(57, 202107, '2021-07-04 13:17:17', '1-10005', 'd', 17000000, 'TRX-SR-000000001'),
(58, 202107, '2021-07-04 13:17:17', '6-10006', 'k', 17000000, 'TRX-SR-000000001'),
(59, 202107, '2021-07-03 17:00:00', '5-20001', 'd', 1500000, 'TRX-KK-000000002'),
(60, 202107, '2021-07-03 17:00:00', '1-10001', 'k', 1500000, 'TRX-KK-000000002'),
(61, 202107, '2021-07-03 17:00:00', '5-20001', 'd', 500000, 'TRX-KK-000000003'),
(62, 202107, '2021-07-03 17:00:00', '1-10001', 'k', 500000, 'TRX-KK-000000003'),
(63, 202107, '2021-07-04 16:21:34', '1-10001', 'd', 25000000, 'TRX-SO-000000007'),
(64, 202107, '2021-07-04 16:21:34', '4-10001', 'k', 25000000, 'TRX-SO-000000007'),
(65, 202107, '2021-07-04 16:21:34', '6-10006', 'd', 23500000, 'TRX-SO-000000007'),
(66, 202107, '2021-07-04 16:21:34', '1-10005', 'k', 23500000, 'TRX-SO-000000007'),
(67, 202107, '2021-07-05 03:14:56', '1-10001', 'd', 23000000, 'TRX-SO-000000008'),
(68, 202107, '2021-07-05 03:14:56', '4-10001', 'k', 23000000, 'TRX-SO-000000008'),
(69, 202107, '2021-07-05 03:14:56', '6-10006', 'd', 17000000, 'TRX-SO-000000008'),
(70, 202107, '2021-07-05 03:14:56', '1-10005', 'k', 17000000, 'TRX-SO-000000008');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
('MD-KP-00001', 'Handphone & Tablet'),
('MD-KP-00002', 'Komputer & Laptop'),
('MD-KP-00003', 'Aksesoris Komputer & Laptop'),
('MD-KP-00004', 'Aksesoris Handphone'),
('MD-KP-00005', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `lb_format`
--

CREATE TABLE `lb_format` (
  `id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `header` varchar(100) DEFAULT NULL,
  `sub_header` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_access`
--

CREATE TABLE `menu_access` (
  `id` bigint(20) NOT NULL,
  `tcode` varchar(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_access`
--

INSERT INTO `menu_access` (`id`, `tcode`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'MP01', 1, '2021-07-05 05:00:04', NULL),
(2, 'MP02', 1, '2021-07-05 05:00:04', NULL),
(3, 'MP03', 1, '2021-07-05 05:00:04', NULL),
(4, 'MA01', 1, '2021-07-05 05:00:47', NULL),
(5, 'MR01', 1, '2021-07-05 05:01:23', NULL),
(6, 'MR02', 1, '2021-07-05 05:01:23', NULL),
(7, 'TJ01', 1, '2021-07-05 05:02:43', NULL),
(8, 'TJ02', 1, '2021-07-05 05:02:43', NULL),
(9, 'TP01', 1, '2021-07-05 05:03:14', NULL),
(10, 'TP02', 1, '2021-07-05 05:03:14', NULL),
(11, 'TK01', 1, '2021-07-05 05:04:03', NULL),
(12, 'TK02', 1, '2021-07-05 05:04:03', NULL),
(13, 'LA01', 1, '2021-07-05 05:05:56', NULL),
(14, 'LA02', 1, '2021-07-05 05:05:56', NULL),
(15, 'LA03', 1, '2021-07-05 05:05:56', NULL),
(16, 'LA04', 1, '2021-07-05 05:05:56', NULL),
(17, 'LI01', 1, '2021-07-05 05:05:56', NULL),
(18, 'LI02', 1, '2021-07-05 05:05:56', NULL),
(19, 'LI03', 1, '2021-07-05 05:05:56', NULL),
(20, 'ST01', 1, '2021-07-05 05:06:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_head`
--

CREATE TABLE `menu_head` (
  `head_id` bigint(20) NOT NULL,
  `head_name` varchar(100) NOT NULL,
  `icon` longtext NOT NULL,
  `id` varchar(255) NOT NULL,
  `nu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_head`
--

INSERT INTO `menu_head` (`head_id`, `head_name`, `icon`, `id`, `nu`, `created_at`, `updated_at`) VALUES
(1, 'Master Produk', 'icon-Box3', 'master-produk', 1, '2021-07-05 04:30:55', NULL),
(2, 'Master Akuntansi', 'icon-Bullet-list', 'master-akuntansi', 2, '2021-07-05 04:30:55', NULL),
(3, 'Relasi', 'icon-Share1', 'master-relasi', 3, '2021-07-05 04:30:55', NULL),
(4, 'Pembelian', 'icon-Cart2', 'transaksi-pembelian', 4, '2021-07-05 04:30:55', NULL),
(5, 'Penjualan', 'icon-Cart', 'transaksi-penjualan', 5, '2021-07-05 04:30:55', NULL),
(6, 'Kas Umum', 'icon-Commit', 'transksi-kas', 6, '2021-07-05 04:30:55', NULL),
(7, 'Akuntansi', 'icon-Library', 'laporan-akuntansi', 7, '2021-07-05 04:30:55', '2021-07-05 04:31:22'),
(8, 'Inventory', 'icon-Book', 'laporan-inventory', 8, '2021-07-05 04:30:55', NULL),
(9, 'Setting', 'ti-settings', 'setting', 9, '2021-07-05 04:37:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `tcode` varchar(20) NOT NULL,
  `nu` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `head_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`tcode`, `nu`, `menu_name`, `url`, `head_id`, `created_at`, `updated_at`) VALUES
('LA01', 1, 'Jurnal Umum', 'akuntansi/jurnal_umum', 7, '2021-07-05 04:51:02', NULL),
('LA02', 2, 'Buku Besar', 'akuntansi/buku_besar', 7, '2021-07-05 04:51:02', NULL),
('LA03', 3, 'Laba Rugi', 'akuntansi/lb', 7, '2021-07-05 04:51:02', NULL),
('LA04', 4, 'Neraca Saldo', 'akuntansi/neraca_saldo', 7, '2021-07-05 04:51:02', NULL),
('LI01', 1, 'Pembelian', 'inventory/pembelian', 8, '2021-07-05 04:53:29', NULL),
('LI02', 2, 'Penjualan', 'inventory/penjualan', 8, '2021-07-05 04:53:29', NULL),
('LI03', 3, 'Kartu Stok', 'inventory/fifo', 8, '2021-07-05 04:53:29', NULL),
('MA01', 1, 'Akun', 'master/coa', 2, '2021-07-05 04:42:16', NULL),
('MP01', 1, 'Brand Produk', 'master/brand', 1, '2021-07-05 04:41:07', NULL),
('MP02', 2, 'Kategori Produk', 'master/kategori', 1, '2021-07-05 04:41:07', NULL),
('MP03', 3, 'Produk', 'naster/produk', 1, '2021-07-05 04:41:07', NULL),
('MR01', 1, 'Vendor', 'master/vendor', 3, '2021-07-05 04:43:31', NULL),
('MR02', 2, 'Pelanggan', 'master/pelanggan', 3, '2021-07-05 04:43:31', NULL),
('ST01', 1, 'Pengguna', 'setting/pengguna', 9, '2021-07-05 04:54:16', NULL),
('TJ01', 1, 'Penjualan', 'transaksi/penjualan', 5, '2021-07-05 04:46:55', NULL),
('TJ02', 2, 'Retur Penjualan', 'retur/penjualan', 5, '2021-07-05 04:46:55', NULL),
('TK01', 1, 'Kas Masuk', 'kas/masuk', 6, '2021-07-05 04:47:51', NULL),
('TK02', 2, 'Kas Keluar', 'kas/keluar', 6, '2021-07-05 04:47:51', NULL),
('TP01', 1, 'Pembelian', 'transaksi/pembelian', 4, '2021-07-05 04:45:24', NULL),
('TP02', 2, 'Retur Pembelian', 'retur/pembelian', 4, '2021-07-05 04:45:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telp`, `email_pelanggan`, `alamat_pelanggan`) VALUES
('MD-PL-00001', 'Tn X', '081280055856', 'iniemail@gmail.com', 'Jl Jalan'),
('MD-PL-00002', 'Tn Y', '081290055856', 'iniemail2@gmail.com', 'Jl Panjaitan');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` bigint(20) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_warna` bigint(20) NOT NULL,
  `cogs` double NOT NULL,
  `qty` double NOT NULL,
  `ready` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_transaksi`, `tanggal`, `id_warna`, `cogs`, `qty`, `ready`, `total`) VALUES
(4, 'TRX-PO-000000001', '2021-07-04 03:21:28', 1, 17000000, 10, 7, 170000000),
(5, 'TRX-PO-000000002', '2021-07-04 08:55:10', 1, 17000000, 2, 1, 34000000),
(6, 'TRX-PO-000000002', '2021-07-04 08:55:10', 2, 23500000, 10, 4, 235000000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` bigint(20) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_warna` bigint(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pembelian` bigint(20) NOT NULL,
  `cogs` double NOT NULL,
  `harga_jual` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_transaksi`, `id_warna`, `tanggal`, `id_pembelian`, `cogs`, `harga_jual`, `qty`) VALUES
(4, 'TRX-SO-000000001', 1, '2021-07-04 03:32:00', 4, 17000000, 23000000, 1),
(5, 'TRX-SO-000000002', 1, '2021-07-04 03:34:36', 4, 17000000, 23000000, 1),
(6, 'TRX-SO-000000003', 2, '2021-07-04 08:55:45', 6, 23500000, 25000000, 1),
(7, 'TRX-SO-000000004', 2, '2021-07-04 12:17:53', 6, 23500000, 25000000, 1),
(8, 'TRX-SO-000000005', 2, '2021-07-04 12:19:57', 6, 23500000, 25000000, 1),
(9, 'TRX-SO-000000006', 1, '2021-07-04 12:57:34', 4, 17000000, 23000000, 1),
(10, 'TRX-SO-000000007', 2, '2021-07-04 16:21:26', 6, 23500000, 25000000, 1),
(11, 'TRX-SO-000000008', 1, '2021-07-05 03:14:46', 4, 17000000, 23000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE `retur_pembelian` (
  `id_retur_pembelian` bigint(20) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_warna` bigint(20) NOT NULL,
  `id_pembelian` bigint(20) NOT NULL,
  `cogs` double NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retur_pembelian`
--

INSERT INTO `retur_pembelian` (`id_retur_pembelian`, `id_transaksi`, `tanggal`, `id_warna`, `id_pembelian`, `cogs`, `qty`) VALUES
(5, 'TRX-PR-000000001', '2021-07-04 12:23:01', 1, 5, 17000000, 1),
(6, 'TRX-PR-000000001', '2021-07-04 12:23:01', 2, 6, 23500000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `retur_penjualan`
--

CREATE TABLE `retur_penjualan` (
  `id_retur_penjualan` bigint(20) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_warna` bigint(20) NOT NULL,
  `id_penjualan` bigint(20) NOT NULL,
  `id_pembelian` bigint(20) NOT NULL,
  `cogs` double NOT NULL,
  `harga_jual` double NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retur_penjualan`
--

INSERT INTO `retur_penjualan` (`id_retur_penjualan`, `id_transaksi`, `tanggal`, `id_warna`, `id_penjualan`, `id_pembelian`, `cogs`, `harga_jual`, `qty`) VALUES
(1, 'TRX-SR-000000001', '2021-07-04 13:17:17', 1, 9, 4, 17000000, 23000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-07-05 03:29:59', NULL),
(2, 'Pemilik', '2021-07-05 03:29:59', NULL),
(3, 'Kepala Toko', '2021-07-05 03:29:59', NULL),
(4, 'Penjualan', '2021-07-05 03:29:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_jurnal`
--

CREATE TABLE `setting_jurnal` (
  `id_setting` varchar(20) NOT NULL,
  `setting_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_jurnal`
--

INSERT INTO `setting_jurnal` (`id_setting`, `setting_name`, `type`) VALUES
('STT-0001', 'Penyetoran Modal', 'cash_in'),
('STT-0002', 'Penyesuaian Modal Awal', 'cash_in'),
('STT-0003', 'Setor Kas ke Bank Mandiri', 'cash_out'),
('STT-0004', 'Pencairan Dana Pinjaman Jangka Panjang Bank Mandiri (Tunai)', 'cash_in'),
('STT-0005', 'Bayar Angsuran Pinjaman Bank Mandiri', 'cash_out'),
('STT-0006', 'Bayar Gaji Karyawan', 'cash_out'),
('STT-0007', 'Bayar Listrik, telepon atau air', 'cash_out');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` bigint(20) NOT NULL,
  `periode` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_transaksi` varchar(50) NOT NULL,
  `id_warna` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `cogs` double NOT NULL,
  `tipe` int(1) NOT NULL DEFAULT '1' COMMENT '1: Masuk, 0 : Keluar ',
  `id_pembelian` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `periode`, `tanggal`, `id_transaksi`, `id_warna`, `qty`, `cogs`, `tipe`, `id_pembelian`) VALUES
(7, 202107, '2021-07-04 03:21:28', 'TRX-PO-000000001', 1, 10, 17000000, 1, NULL),
(8, 202107, '2021-07-04 03:32:00', 'TRX-SO-000000001', 1, 9, 17000000, 0, 4),
(9, 202107, '2021-07-04 03:34:36', 'TRX-SO-000000002', 1, 8, 17000000, 0, 4),
(10, 202107, '2021-07-04 08:55:10', 'TRX-PO-000000002', 1, 2, 17000000, 1, NULL),
(11, 202107, '2021-07-04 08:55:10', 'TRX-PO-000000002', 2, 10, 23500000, 1, NULL),
(12, 202107, '2021-07-04 08:55:45', 'TRX-SO-000000003', 2, 9, 23500000, 0, 6),
(13, 202107, '2021-07-04 12:17:53', 'TRX-SO-000000004', 2, 8, 23500000, 0, 6),
(14, 202107, '2021-07-04 12:19:57', 'TRX-SO-000000005', 2, 7, 23500000, 0, 6),
(15, 202107, '2021-07-04 12:23:01', 'TRX-PR-000000001', 1, 1, 17000000, 0, NULL),
(16, 202107, '2021-07-04 12:23:01', 'TRX-PR-000000001', 2, 5, 23500000, 0, NULL),
(17, 202107, '2021-07-04 12:57:34', 'TRX-SO-000000006', 1, 7, 17000000, 0, 4),
(18, 202107, '2021-07-04 13:17:17', 'TRX-SR-000000001', 1, 8, 17000000, 1, NULL),
(19, 202107, '2021-07-04 16:21:26', 'TRX-SO-000000007', 2, 4, 23500000, 0, 6),
(20, 202107, '2021-07-05 03:14:46', 'TRX-SO-000000008', 1, 7, 17000000, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `periode` int(11) DEFAULT NULL,
  `id_vendor` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ref` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `total` double DEFAULT NULL,
  `tipe` varchar(100) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `periode`, `id_vendor`, `id_pelanggan`, `tanggal`, `ref`, `status`, `total`, `tipe`, `keterangan`) VALUES
('TRX-KK-000000001', 202107, NULL, NULL, '2021-07-03 17:00:00', NULL, 1, 15000000, 'cash_out', 'Pembayaran Gaji Karyawan Counter'),
('TRX-KK-000000002', 202107, NULL, NULL, '2021-07-03 17:00:00', NULL, 1, 1500000, 'cash_out', 'Bayar Listrik'),
('TRX-KK-000000003', 202107, NULL, NULL, '2021-07-03 17:00:00', NULL, 1, 500000, 'cash_out', 'Bayar Listrik Counter'),
('TRX-KM-000000001', 202106, NULL, NULL, '2021-06-29 17:00:00', NULL, 1, 1000000000, 'cash_in', 'Saldo Awal'),
('TRX-PO-000000001', 202107, 'MD-VN-00001', NULL, '2021-07-04 03:21:28', NULL, 1, 170000000, 'purchasing', 'Pembelian 1'),
('TRX-PO-000000002', 202107, 'MD-VN-00001', NULL, '2021-07-04 08:55:10', NULL, 1, 269000000, 'purchasing', 'Pembelian 2'),
('TRX-PR-000000001', 202107, NULL, NULL, '2021-07-04 12:23:01', 'TRX-PO-000000002', 1, 64000000, 'purchase_return', 'Retur 1'),
('TRX-SO-000000001', 202107, NULL, 'MD-PL-00001', '2021-07-04 03:30:52', NULL, 1, 23000000, 'order', 'Penjualan 1'),
('TRX-SO-000000002', 202107, NULL, 'MD-PL-00002', '2021-07-04 03:34:30', NULL, 1, 23000000, 'order', 'Penjualan 2'),
('TRX-SO-000000003', 202107, NULL, 'MD-PL-00001', '2021-07-04 08:26:51', NULL, 1, 25000000, 'order', 'Penjualan 3'),
('TRX-SO-000000004', 202107, NULL, 'MD-PL-00001', '2021-07-04 12:17:42', NULL, 1, 25000000, 'order', 'Penjualan Ke 4'),
('TRX-SO-000000005', 202107, NULL, 'MD-PL-00002', '2021-07-04 12:19:43', NULL, 1, 25000000, 'order', 'Penjualan Ke 5'),
('TRX-SO-000000006', 202107, NULL, 'MD-PL-00002', '2021-07-04 12:57:27', NULL, 1, 23000000, 'order', 'Penjualan 6'),
('TRX-SO-000000007', 202107, NULL, 'MD-PL-00001', '2021-07-04 16:21:11', NULL, 1, 25000000, 'order', 'Penjualan Ke 7'),
('TRX-SO-000000008', 202107, NULL, 'MD-PL-00001', '2021-07-05 03:14:25', NULL, 1, 23000000, 'order', 'Penjualan 7'),
('TRX-SO-000000009', 202107, NULL, NULL, '2021-07-05 03:16:22', NULL, 0, NULL, 'order', NULL),
('TRX-SR-000000001', 202107, NULL, NULL, '2021-07-04 13:17:17', 'TRX-SO-000000006', 1, 23000000, 'sales_return', 'Retur Penjualan 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` bigint(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0: Blok 1: Aktif',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `role`, `status`, `date_created`) VALUES
(1, 'Admin', 'admin', '$2y$10$inYyr0FUiMwBgIJgPEqD/.yx/CvghHDayF6qfaFoL8H5rYfGEMNPu', 1, 1, '2021-07-05 05:45:32'),
(2, 'Pemilik', 'pemilik', '$2y$10$Kl4aukKsLsfQIfnF.Ra5c.vzuy3nVuIFfkLtaUXYu/huTQSVfIN1i', 2, 1, '2021-07-05 05:47:49'),
(3, 'Kepala Toko Updated Test', 'kepala_toko', '$2y$10$5/aMNM.KSf6ma9lUmibA3O9a9P28X9XK65oI9BFNEFg5uvTnjLWMC', 3, 1, '2021-07-05 05:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` varchar(20) NOT NULL,
  `nama_vendor` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email_vendor` varchar(100) DEFAULT NULL,
  `alamat_vendor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `no_telp`, `email_vendor`, `alamat_vendor`) VALUES
('MD-VN-00001', 'Apple Store Singapore', '123456', 'apple.store@applel.com', 'Orchid Forest');

-- --------------------------------------------------------

--
-- Table structure for table `warna_barang`
--

CREATE TABLE `warna_barang` (
  `id_warna` bigint(20) NOT NULL,
  `nama_warna` varchar(100) NOT NULL,
  `id_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warna_barang`
--

INSERT INTO `warna_barang` (`id_warna`, `nama_warna`, `id_barang`) VALUES
(1, 'Midnight Green', 'MD-PR-000000001'),
(2, 'Ocean Blue', 'MD-PR-000000002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `brand_barang`
--
ALTER TABLE `brand_barang`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  ADD PRIMARY KEY (`account_no`),
  ADD KEY `sub_code` (`sub_code`);

--
-- Indexes for table `coa_head`
--
ALTER TABLE `coa_head`
  ADD PRIMARY KEY (`head_code`);

--
-- Indexes for table `coa_subhead`
--
ALTER TABLE `coa_subhead`
  ADD PRIMARY KEY (`sub_code`),
  ADD KEY `head_code` (`head_code`);

--
-- Indexes for table `detail_setting_jurnal`
--
ALTER TABLE `detail_setting_jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_setting` (`id_setting`),
  ADD KEY `debet` (`debet`),
  ADD KEY `kredit` (`kredit`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `account_no` (`account_no`),
  ADD KEY `jurnal_ibfk_2` (`id_transaksi`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lb_format`
--
ALTER TABLE `lb_format`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_no` (`account_no`);

--
-- Indexes for table `menu_access`
--
ALTER TABLE `menu_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tcode` (`tcode`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `menu_head`
--
ALTER TABLE `menu_head`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`tcode`),
  ADD KEY `head_id` (`head_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_warna` (`id_warna`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_warna` (`id_warna`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD PRIMARY KEY (`id_retur_pembelian`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD PRIMARY KEY (`id_retur_penjualan`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_jurnal`
--
ALTER TABLE `setting_jurnal`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_warna` (`id_warna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_vendor` (`id_vendor`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indexes for table `warna_barang`
--
ALTER TABLE `warna_barang`
  ADD PRIMARY KEY (`id_warna`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_setting_jurnal`
--
ALTER TABLE `detail_setting_jurnal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `lb_format`
--
ALTER TABLE `lb_format`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_access`
--
ALTER TABLE `menu_access`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menu_head`
--
ALTER TABLE `menu_head`
  MODIFY `head_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  MODIFY `id_retur_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  MODIFY `id_retur_penjualan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warna_barang`
--
ALTER TABLE `warna_barang`
  MODIFY `id_warna` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand_barang` (`id_brand`);

--
-- Constraints for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  ADD CONSTRAINT `chart_of_account_ibfk_1` FOREIGN KEY (`sub_code`) REFERENCES `coa_subhead` (`sub_code`);

--
-- Constraints for table `coa_subhead`
--
ALTER TABLE `coa_subhead`
  ADD CONSTRAINT `coa_subhead_ibfk_1` FOREIGN KEY (`head_code`) REFERENCES `coa_head` (`head_code`);

--
-- Constraints for table `detail_setting_jurnal`
--
ALTER TABLE `detail_setting_jurnal`
  ADD CONSTRAINT `detail_setting_jurnal_ibfk_1` FOREIGN KEY (`id_setting`) REFERENCES `setting_jurnal` (`id_setting`),
  ADD CONSTRAINT `detail_setting_jurnal_ibfk_2` FOREIGN KEY (`debet`) REFERENCES `chart_of_account` (`account_no`),
  ADD CONSTRAINT `detail_setting_jurnal_ibfk_3` FOREIGN KEY (`kredit`) REFERENCES `chart_of_account` (`account_no`);

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `chart_of_account` (`account_no`),
  ADD CONSTRAINT `jurnal_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lb_format`
--
ALTER TABLE `lb_format`
  ADD CONSTRAINT `lb_format_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `chart_of_account` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_access`
--
ALTER TABLE `menu_access`
  ADD CONSTRAINT `menu_access_ibfk_1` FOREIGN KEY (`tcode`) REFERENCES `menu_item` (`tcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_access_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`head_id`) REFERENCES `menu_head` (`head_id`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna_barang` (`id_warna`) ON DELETE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna_barang` (`id_warna`),
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD CONSTRAINT `retur_pembelian_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `retur_pembelian_ibfk_2` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD CONSTRAINT `retur_penjualan_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `retur_penjualan_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `retur_penjualan_ibfk_3` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna_barang` (`id_warna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warna_barang`
--
ALTER TABLE `warna_barang`
  ADD CONSTRAINT `warna_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
