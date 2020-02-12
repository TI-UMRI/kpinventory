-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 04:42 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `spesifikasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kode_barang`, `nama_barang`, `kode_kategori`, `satuan`, `stok`, `spesifikasi`) VALUES
('BRG001', 'Kertas ', 16, 'RIM', 6, 'A4'),
('BRG002', 'Laptop', 17, 'UNIT', 3, 'Lenovo V330');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_penerimaan`
--

CREATE TABLE `tbdetail_penerimaan` (
  `id` int(11) NOT NULL,
  `kode_terima` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_penerimaan`
--

INSERT INTO `tbdetail_penerimaan` (`id`, `kode_terima`, `kode_barang`, `jumlah_barang`) VALUES
(21, 'PERM 02', 'BRG001', 2),
(23, 'PERM 01', 'BRG002', 1),
(24, 'PERM 01', 'BRG001', 1),
(26, 'PERM 02', 'BRG001', 12),
(27, 'PERM 03', 'BRG002', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_pengeluaran`
--

CREATE TABLE `tbdetail_pengeluaran` (
  `id` int(11) NOT NULL,
  `kode_keluar` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_pengeluaran`
--

INSERT INTO `tbdetail_pengeluaran` (`id`, `kode_keluar`, `kode_barang`, `jumlah_barang`) VALUES
(6, 'PENG 01', 'BRG002', 1),
(7, 'PENG 01', 'BRG001', 1),
(9, 'PENG 02', 'BRG001', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbgabung_transaksi`
--

CREATE TABLE `tbgabung_transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbgabung_transaksi`
--

INSERT INTO `tbgabung_transaksi` (`id`, `kode`, `tanggal`, `kode_barang`, `jumlah_barang`, `ket`) VALUES
(18, 'PERM 01', '2020-02-10', 'BRG002', 1, 'MASUK'),
(19, 'PERM 02', '2020-02-10', 'BRG001', 2, 'MASUK'),
(21, 'PERM 01', '2020-02-10', 'BRG002', 0, 'MASUK'),
(22, 'PERM 02', '2020-02-10', 'BRG001', 0, 'MASUK'),
(24, 'PENG 01', '2020-02-10', 'BRG002', 1, 'KELUAR'),
(25, 'PENG 01', '2020-02-10', 'BRG001', 1, 'KELUAR'),
(27, 'PENG 01', '2020-02-10', 'BRG002', 0, 'MASUK'),
(28, 'PENG 01', '2020-02-10', 'BRG001', 0, 'MASUK'),
(30, 'PERM 01', '2020-02-10', 'BRG002', 1, 'MASUK'),
(31, 'PERM 01', '2020-02-10', 'BRG001', 1, 'MASUK'),
(33, 'PERM 01', '2020-02-10', 'BRG002', 0, 'MASUK'),
(34, 'PERM 01', '2020-02-10', 'BRG001', 0, 'MASUK'),
(36, 'PERM 02', '2020-02-11', 'BRG001', 12, 'MASUK'),
(37, 'PERM 02', '2020-02-11', 'BRG001', 0, 'KELUAR'),
(38, 'PENG 02', '2020-02-11', 'BRG001', 5, 'KELUAR'),
(39, 'PENG 02', '2020-02-11', 'BRG001', 0, 'MASUK'),
(40, 'PERM 03', '2020-02-11', 'BRG002', 3, 'MASUK'),
(41, 'PERM 03', '2020-02-11', 'BRG002', 0, 'KELUAR');

-- --------------------------------------------------------

--
-- Table structure for table `tbinvetaris`
--

CREATE TABLE `tbinvetaris` (
  `kode_inventraris` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`kode_kategori`, `nama_kategori`) VALUES
(16, 'ATK'),
(17, 'INVENTARIS');

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `id_login` varchar(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `status_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`id_login`, `username`, `password`, `nama_admin`, `status_admin`) VALUES
('ADM001', 'Rizky', '123456', 'Rizky', 1),
('ADM002', 'wahyu', '1', 'Wahyu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbpenerimaan`
--

CREATE TABLE `tbpenerimaan` (
  `kode_terima` varchar(20) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `id_login` varchar(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenerimaan`
--

INSERT INTO `tbpenerimaan` (`kode_terima`, `tanggal_terima`, `jumlah_item`, `kode_supplier`, `id_login`, `keterangan`) VALUES
('PERM 01', '2020-02-10', 2, 'SUP002', 'ADM001', 'PO1'),
('PERM 02', '2020-02-11', 1, 'SUP001', 'ADM001', 'PO 234'),
('PERM 03', '2020-02-11', 1, 'SUP002', 'ADM001', 'PO2');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengeluaran`
--

CREATE TABLE `tbpengeluaran` (
  `kode_keluar` varchar(20) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `kode_supplier` varchar(20) NOT NULL,
  `id_login` varchar(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengeluaran`
--

INSERT INTO `tbpengeluaran` (`kode_keluar`, `tanggal_keluar`, `jumlah_item`, `kode_supplier`, `id_login`, `keterangan`) VALUES
('PENG 01', '2020-02-10', 2, 'SUP002', 'ADM001', 'PO2'),
('PENG 02', '2020-02-11', 1, 'SUP002', 'ADM001', 'PO 234');

-- --------------------------------------------------------

--
-- Table structure for table `tbsementara`
--

CREATE TABLE `tbsementara` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `kode_supplier` varchar(6) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `ext` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsupplier`
--

INSERT INTO `tbsupplier` (`kode_supplier`, `nama_supplier`, `ext`) VALUES
('SUP001', 'Toko Buku Mandiri', '102'),
('SUP002', 'Toko Buku Andini 2', '103');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbgabung_transaksi`
--
ALTER TABLE `tbgabung_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbinvetaris`
--
ALTER TABLE `tbinvetaris`
  ADD PRIMARY KEY (`kode_inventraris`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbpenerimaan`
--
ALTER TABLE `tbpenerimaan`
  ADD PRIMARY KEY (`kode_terima`);

--
-- Indexes for table `tbpengeluaran`
--
ALTER TABLE `tbpengeluaran`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `tbsementara`
--
ALTER TABLE `tbsementara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbgabung_transaksi`
--
ALTER TABLE `tbgabung_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbsementara`
--
ALTER TABLE `tbsementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
