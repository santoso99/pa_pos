-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 07, 2020 at 02:24 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

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
('MD-PR-000000001', 'iPhone 12 Pro Max', 'MD-KP-00001', 'MD-BR-00001', '6 GB', '128 GB', 'Super Retina XDR display 6.7‑inch ', 'IOS 14', 'Deskripsi New iPhone 12 Pro | Pro Max 128GB Silver, Graphite, Gold, Pacific Blue - GRAY', 25700000, '0d4a95e647ecd44420d654154e54c017.jpg'),
('MD-PR-000000002', 'iPhone 12 Pro Max', 'MD-KP-00001', 'MD-BR-00001', '6 GB', '512 GB', 'Super Retina XDR display 6.7‑inch ', 'IOS 14', 'Deskripsi New iPhone 12 Pro | Pro Max 128GB Silver, Graphite, Gold, Pacific Blue - GRAY', 31700000, 'a6495d45705129756467cdf09de33b54.jpeg');

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
('MD-BR-00001', 'Apple', '300fbb5a4afff85492be56aa2eb8e9e6.jpg'),
('MD-BR-00002', 'Samsung', 'e7fa5d83a5736ab6327ef90d3c9f697d.jpg'),
('MD-BR-00003', 'Xiaomi', 'af3db19ff00d3757f41f15a4d292422e.png'),
('MD-BR-00004', 'Harman/kardon', '231555cbfe98f5f06901a55327099181.jpg'),
('MD-BR-00005', 'Asus', 'f77e34ad7bf5cd9e59d56852b6e3f6a7.png');

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
('4-20001', 'Pendapatan Bunga', 'k', '4-2'),
('5-10001', 'Beban Gaji Karyawan Kios', 'd', '5-1'),
('5-20001', 'Beban Listrik, Telepon dan Air', 'd', '5-2'),
('6-10006', 'Harga Pokok Penjualan', 'd', '6-1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` varchar(20) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_company` varchar(100) DEFAULT NULL,
  `client_address` text NOT NULL,
  `client_phone` varchar(13) NOT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_company`, `client_address`, `client_phone`, `client_email`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('PL-0001', 'Ir Josephua D.Hutahuruk, M.Sc', '-', 'Jalan Abdullah dg. Sirua BTN CV DEWI blok B2 No 15 Makassar', '081250750057', 'josephua@gmail.com', 1, '2020-11-17 09:51:48', 1, '2020-11-17 09:59:14', NULL, NULL, NULL),
('PL-0002', 'Firdaus Husain', '-', 'Jl Takabonerate No 12 Bukit Baruga Makassar', '085556665587', 'firdaus@gmail.com', 1, '2020-11-24 19:10:36', 1, '2020-11-24 19:10:44', NULL, NULL, NULL);

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
('4-1', 'Pendapatan dari Penjualan', '4'),
('4-2', 'Pendapatan diluar Usaha', '4'),
('5-1', 'Beban Penjualan', '5'),
('5-2', 'Beban Administrasi dan Umum', '5'),
('5-3', 'Beban diluar Usaha', '5'),
('6-1', 'Harga Pokok Penjualan', '6');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` bigint(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_no` varchar(20) NOT NULL,
  `posisi` char(1) NOT NULL,
  `nominal` double NOT NULL,
  `id_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `tanggal`, `account_no`, `posisi`, `nominal`, `id_transaksi`) VALUES
(1, '2020-12-03 07:50:47', '1-10001', 'd', 1000000000, 'TRX-KM-000000001'),
(2, '2020-12-03 07:50:47', '3-10001', 'k', 1000000000, 'TRX-KM-000000001'),
(4, '2020-12-03 08:05:32', '1-10005', 'd', 212500000, 'TRX-PO-000000001'),
(5, '2020-12-03 08:05:32', '1-10001', 'k', 212500000, 'TRX-PO-000000001'),
(6, '2020-12-03 12:34:49', '1-10005', 'd', 52000000, 'TRX-PO-000000002'),
(7, '2020-12-03 12:34:49', '1-10001', 'k', 52000000, 'TRX-PO-000000002'),
(8, '2020-12-03 19:31:03', '1-10005', 'd', 232000000, 'TRX-PO-000000003'),
(9, '2020-12-03 19:31:03', '1-10001', 'k', 232000000, 'TRX-PO-000000003'),
(10, '2020-12-03 20:51:13', '1-10001', 'd', 108800000, 'TRX-SO-000000001'),
(11, '2020-12-03 20:51:13', '4-10001', 'k', 108800000, 'TRX-SO-000000001'),
(12, '2020-12-03 20:51:13', '6-10006', 'd', 88500000, 'TRX-SO-000000001'),
(13, '2020-12-03 20:51:13', '1-10005', 'k', 88500000, 'TRX-SO-000000001'),
(14, '2020-12-03 21:11:44', '1-10001', 'd', 25700000, 'TRX-SO-000000002'),
(15, '2020-12-03 21:11:44', '4-10001', 'k', 25700000, 'TRX-SO-000000002'),
(16, '2020-12-03 21:11:44', '6-10006', 'd', 22500000, 'TRX-SO-000000002'),
(17, '2020-12-03 21:11:44', '1-10005', 'k', 22500000, 'TRX-SO-000000002'),
(18, '2020-12-04 06:52:31', '1-10001', 'd', 25700000, 'TRX-SO-000000003'),
(19, '2020-12-04 06:52:31', '4-10001', 'k', 25700000, 'TRX-SO-000000003'),
(20, '2020-12-04 06:52:31', '6-10006', 'd', 22500000, 'TRX-SO-000000003'),
(21, '2020-12-04 06:52:31', '1-10005', 'k', 22500000, 'TRX-SO-000000003'),
(24, '2020-12-05 14:22:31', '1-10005', 'd', 232000000, 'TRX-PO-000000004'),
(25, '2020-12-05 14:22:31', '1-10001', 'k', 232000000, 'TRX-PO-000000004');

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
('MD-KP-00004', 'Aksesoris Handphone');

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
('MD-PL-00001', 'Aulia', '081554654789', 'aulia@gmail.com', 'Jl Batununggal No 102, Bandung'),
('MD-PL-00002', 'Silvya', '081554658789', 'silvya@gmail.com', 'Jl Suka Lucu No 12'),
('MD-PL-00003', 'Keken', '08923838381', 'keken@gmail.com', 'Jl Soekarna Hatta No 13');

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
(5, 'TRX-PO-000000001', '2020-12-03 08:05:32', 2, 20000000, 5, 3, 100000000),
(6, 'TRX-PO-000000001', '2020-12-03 08:05:32', 4, 22500000, 5, 2, 112500000),
(7, 'TRX-PO-000000002', '2020-12-03 12:34:49', 8, 26000000, 2, 1, 52000000),
(8, 'TRX-PO-000000003', '2020-12-03 19:31:03', 8, 23200000, 10, 10, 232000000),
(10, 'TRX-PO-000000004', '2020-12-05 14:22:31', 7, 23200000, 10, 10, 232000000);

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
(3, 'TRX-SO-000000001', 8, '2020-12-03 20:28:37', 7, 26000000, 31700000, 1),
(4, 'TRX-SO-000000001', 4, '2020-12-03 20:41:13', 6, 22500000, 25700000, 1),
(5, 'TRX-SO-000000001', 2, '2020-12-03 20:49:08', 5, 20000000, 25700000, 2),
(6, 'TRX-SO-000000002', 4, '2020-12-03 21:11:27', 6, 22500000, 25700000, 1),
(7, 'TRX-SO-000000003', 4, '2020-12-04 06:52:16', 6, 22500000, 25700000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_vendor` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0',
  `total` double DEFAULT NULL,
  `tipe` varchar(100) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_vendor`, `id_pelanggan`, `tanggal`, `status`, `total`, `tipe`, `keterangan`) VALUES
('TRX-KM-000000001', NULL, NULL, '2020-12-03 07:48:47', 1, 1000000000, 'cash in', 'Setoran Modal Awal Pemilik'),
('TRX-PO-000000001', 'MD-VN-00001', NULL, '2020-12-03 08:05:32', 1, 212500000, 'purchasing', 'Pembelian Untuk stok baru'),
('TRX-PO-000000002', 'MD-VN-00001', NULL, '2020-12-03 12:34:49', 1, 52000000, 'purchasing', ''),
('TRX-PO-000000003', 'MD-VN-00002', NULL, '2020-12-03 19:31:03', 1, 232000000, 'purchasing', 'Pembelian dari singapore (Apple Store) kurs rupiah Rp 14.500'),
('TRX-PO-000000004', 'MD-VN-00002', NULL, '2020-12-05 14:22:31', 1, 232000000, 'purchasing', 'Pembelian iphone Inter'),
('TRX-SO-000000001', NULL, 'MD-PL-00001', '2020-12-03 20:51:13', 1, 108800000, 'order', 'Penjualan kepada Ny.Aulia'),
('TRX-SO-000000002', NULL, 'MD-PL-00002', '2020-12-03 21:11:44', 1, 25700000, 'order', 'Penjualan kepada Ny.Slivya'),
('TRX-SO-000000003', NULL, 'MD-PL-00003', '2020-12-04 06:52:31', 1, 25700000, 'order', 'Penjualan kepada Neng Keken');

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
('MD-VN-00001', 'iBox Dago Bandung ', '085123321654', 'ibox.bandung@ibox.com', 'Jl, Ir. H Juanda No 145, Bandung'),
('MD-VN-00002', 'Apple Orchard Road', '18006992824', '', '270 Orchard Road Singapore, 238857');

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
(1, 'Silver', 'MD-PR-000000001'),
(2, 'Graphite', 'MD-PR-000000001'),
(3, 'Gold', 'MD-PR-000000001'),
(4, 'Pacific Blue', 'MD-PR-000000001'),
(5, 'Silver', 'MD-PR-000000002'),
(6, 'Graphite', 'MD-PR-000000002'),
(7, 'Gold', 'MD-PR-000000002'),
(8, 'Pacific Blue', 'MD-PR-000000002');

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_vendor` (`id_vendor`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

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
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `warna_barang`
--
ALTER TABLE `warna_barang`
  MODIFY `id_warna` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `chart_of_account` (`account_no`),
  ADD CONSTRAINT `jurnal_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna_barang` (`id_warna`) ON DELETE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna_barang` (`id_warna`),
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `warna_barang`
--
ALTER TABLE `warna_barang`
  ADD CONSTRAINT `warna_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
