-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 27, 2020 at 06:53 AM
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
('MD-PR-000000001', 'Iphone 11 Pro Max', 'MD-KP-00001', 'MD-BR-00001', '4', '512', '6.7', 'IOS 14', 'Deskripsi Iphone 11 Pro Midnight Green 256 GB\r\nIphone 11 Pro Midnight Green 256 GB\r\nbatre health 85%\r\nmulus banget pemakaian pribadi .\r\nAcc tidak pernah di pakai sama sekali\r\nex singapore\r\nsemua simcard bisa', 23000000, '0d22801d3b7d02641a6d3409057da105.jpeg');

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
('4-1', 'Pendapatan dari Penjualan', '4'),
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
(1, '2020-12-26 17:00:00', '1-10001', 'd', 1000000000, 'TRX-KM-000000001'),
(2, '2020-12-26 17:00:00', '3-10001', 'k', 1000000000, 'TRX-KM-000000001'),
(3, '2020-12-27 06:08:35', '1-10005', 'd', 150000000, 'TRX-PO-000000001'),
(4, '2020-12-27 06:08:35', '1-10001', 'k', 150000000, 'TRX-PO-000000001'),
(5, '2020-12-27 06:11:43', '1-10001', 'd', 23000000, 'TRX-SO-000000002'),
(6, '2020-12-27 06:11:43', '4-10001', 'k', 23000000, 'TRX-SO-000000002'),
(7, '2020-12-27 06:11:43', '6-10006', 'd', 15000000, 'TRX-SO-000000002'),
(8, '2020-12-27 06:11:43', '1-10005', 'k', 15000000, 'TRX-SO-000000002'),
(9, '2020-12-27 06:14:38', '1-10005', 'd', 80000000, 'TRX-PO-000000002'),
(10, '2020-12-27 06:14:38', '1-10001', 'k', 80000000, 'TRX-PO-000000002'),
(11, '2020-12-27 06:17:58', '1-10001', 'd', 230000000, 'TRX-SO-000000001'),
(12, '2020-12-27 06:17:58', '4-10001', 'k', 230000000, 'TRX-SO-000000001'),
(13, '2020-12-27 06:17:58', '6-10006', 'd', 151000000, 'TRX-SO-000000001'),
(14, '2020-12-27 06:17:58', '1-10005', 'k', 151000000, 'TRX-SO-000000001');

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
(1, 'TRX-PO-000000001', '2020-12-27 06:08:35', 1, 15000000, 10, 0, 150000000),
(2, 'TRX-PO-000000002', '2020-12-27 06:14:38', 1, 16000000, 5, 4, 80000000);

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
(1, 'TRX-SO-000000002', 1, '2020-12-27 06:10:25', 1, 15000000, 23000000, 1),
(2, 'TRX-SO-000000001', 1, '2020-12-27 06:17:43', 1, 15000000, 23000000, 9),
(3, 'TRX-SO-000000001', 1, '2020-12-27 06:17:43', 2, 16000000, 23000000, 1);

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
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_transaksi` varchar(50) NOT NULL,
  `id_warna` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `cogs` double NOT NULL,
  `tipe` int(1) NOT NULL DEFAULT '1',
  `id_pembelian` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `tanggal`, `id_transaksi`, `id_warna`, `qty`, `cogs`, `tipe`, `id_pembelian`) VALUES
(1, '2020-12-27 06:08:35', 'TRX-PO-000000001', 1, 10, 15000000, 1, NULL),
(2, '2020-12-27 06:10:25', 'TRX-SO-000000002', 1, 9, 15000000, 0, 1),
(3, '2020-12-27 06:14:38', 'TRX-PO-000000002', 1, 5, 16000000, 1, NULL),
(4, '2020-12-27 06:17:43', 'TRX-SO-000000001', 1, 0, 15000000, 0, 1),
(5, '2020-12-27 06:17:43', 'TRX-SO-000000001', 1, 4, 16000000, 0, 2);

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
('TRX-KM-000000001', NULL, NULL, '2020-12-26 17:00:00', 1, 1000000000, 'cash_in', 'Setoran Modal Pemilik'),
('TRX-PO-000000001', 'MD-VN-00001', NULL, '2020-12-27 06:08:35', 1, 150000000, 'purchasing', 'Pembelian Baru Inter termasuk bea cukai dan PPN'),
('TRX-PO-000000002', 'MD-VN-00001', NULL, '2020-12-27 06:14:38', 1, 80000000, 'purchasing', 'Pembelian Ke 2'),
('TRX-SO-000000001', NULL, 'MD-PL-00002', '2020-12-27 06:17:58', 1, 230000000, 'order', 'Pembelian Reseller'),
('TRX-SO-000000002', NULL, 'MD-PL-00001', '2020-12-27 06:11:43', 1, 23000000, 'order', 'Penjualan kepada Tn X Full Waranty');

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
(1, 'Midnight Green', 'MD-PR-000000001');

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
  MODIFY `id_jurnal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warna_barang`
--
ALTER TABLE `warna_barang`
  MODIFY `id_warna` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna_barang` (`id_warna`);

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
