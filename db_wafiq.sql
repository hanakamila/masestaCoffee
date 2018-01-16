-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 03:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wafiq`
--
CREATE DATABASE IF NOT EXISTS `wafiq` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wafiq`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `KD_ADMIN` int(11) NOT NULL,
  `USERNAME` varchar(55) DEFAULT NULL,
  `PASSWORD` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`KD_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `KD_DETAIL` int(11) NOT NULL,
  `KD_PEMBELIAN` int(11) DEFAULT NULL,
  `KD_KOPI` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`KD_DETAIL`, `KD_PEMBELIAN`, `KD_KOPI`, `JUMLAH`, `TOTAL`) VALUES
(5, 2147483647, 3, 2, 4000),
(6, 2147483647, 4, 1, 1000),
(8, 1801168565, 3, 2, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kopi`
--

CREATE TABLE `tb_kopi` (
  `KD_KOPI` int(11) NOT NULL,
  `NAMA_KOPI` varchar(55) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `BERAT` int(11) DEFAULT NULL,
  `ASAL_KOPI` varchar(55) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kopi`
--

INSERT INTO `tb_kopi` (`KD_KOPI`, `NAMA_KOPI`, `DESKRIPSI`, `BERAT`, `ASAL_KOPI`, `HARGA`, `STOCK`, `FOTO`) VALUES
(4, 'Kopi Telkom', '', 2, 'Dampit', 1000, 4, 'ts.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `KD_PEMBELIAN` int(11) NOT NULL,
  `KD_USER` int(11) DEFAULT NULL,
  `TGL_PEMBELIAN` text,
  `TOTAL` int(11) DEFAULT NULL,
  `STATUS` varchar(55) NOT NULL,
  `BUKTI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`KD_PEMBELIAN`, `KD_USER`, `TGL_PEMBELIAN`, `TOTAL`, `STATUS`, `BUKTI`) VALUES
(1801168565, 1, '16-01-2018', 4000, 'BELUM TRANSFER', ''),
(2147483647, 1, '16-01-2018', 5000, 'BELUM TRANSFER', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `KD_USER` int(11) NOT NULL,
  `NAMA_USER` varchar(55) DEFAULT NULL,
  `NO_TELP` text,
  `EMAIL` text,
  `PASSWORD` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`KD_USER`, `NAMA_USER`, `NO_TELP`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Ahmad', '081', 'ahmad@ahmad.com', '61243c7b9a4022cb3f8dc3106767ed12'),
(2, 'faris', '0708', 'faris@gmail.com', '7d77e825b80cff62a72e680c1c81424f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`KD_ADMIN`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`KD_DETAIL`),
  ADD KEY `FK_DIBELI` (`KD_KOPI`),
  ADD KEY `FK_MEMPUNYAI` (`KD_PEMBELIAN`);

--
-- Indexes for table `tb_kopi`
--
ALTER TABLE `tb_kopi`
  ADD PRIMARY KEY (`KD_KOPI`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`KD_PEMBELIAN`),
  ADD KEY `FK_PEMBELIAN` (`KD_USER`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`KD_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `KD_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `KD_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_kopi`
--
ALTER TABLE `tb_kopi`
  MODIFY `KD_KOPI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `KD_PEMBELIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `KD_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `FK_PEMBELIAN` FOREIGN KEY (`KD_USER`) REFERENCES `tb_user` (`KD_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
