-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 08:15 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-swct`
--

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

CREATE TABLE `housing` (
  `id` int(255) NOT NULL,
  `ide` int(11) NOT NULL,
  `idd` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `ids1` int(11) NOT NULL,
  `ids2` int(11) NOT NULL,
  `value_work` enum('0','1') NOT NULL DEFAULT '0',
  `non_value_work` enum('0','1') NOT NULL DEFAULT '0',
  `langkah` enum('0','1') NOT NULL DEFAULT '0',
  `erm` varchar(50) NOT NULL,
  `inp` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `door` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`id`, `ide`, `idd`, `ket`, `ids1`, `ids2`, `value_work`, `non_value_work`, `langkah`, `erm`, `inp`, `floor`, `door`) VALUES
(1, 0, 1, '', 3, 1, '0', '1', '0', '3', '3', '3', '3'),
(2, 6, 22, '6x7', 4, 9, '0', '1', '0', '4', '4', '4', '4'),
(3, 0, 1, '', 3, 2, '0', '1', '0', '4', '4', '4', '4'),
(4, 0, 1, '', 3, 3, '0', '1', '0', '5', '5', '5', '5'),
(5, 0, 1, '', 3, 4, '0', '1', '0', '6', '6', '6', '6'),
(7, 0, 1, '', 3, 6, '0', '1', '0', '8', '8', '8', '8'),
(8, 0, 1, '', 3, 7, '0', '1', '0', '9', '9', '9', '9'),
(9, 0, 1, '', 1, 1, '0', '1', '0', '4', '4', '4', '4'),
(10, 0, 1, '', 1, 2, '0', '1', '0', '5', '5', '5', '5'),
(11, 0, 1, '', 1, 3, '0', '1', '0', '6', '6', '6', '6'),
(12, 0, 1, '', 1, 4, '0', '1', '0', '7', '7', '7', '7'),
(13, 0, 1, '', 1, 5, '0', '1', '0', '8', '8', '8', '8'),
(14, 0, 1, '', 1, 6, '0', '1', '0', '9', '9', '9', '9'),
(15, 0, 1, '', 1, 7, '0', '1', '0', '10', '10', '10', '10'),
(17, 0, 3, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(18, 0, 4, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(19, 0, 5, '', 0, 0, '0', '1', '0', '1', '1', '1', '1'),
(20, 0, 6, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(21, 3, 7, '', 0, 0, '1', '0', '0', '3', '3', '3', '3'),
(22, 0, 8, '', 0, 0, '0', '1', '0', '6', '6', '6', '6'),
(23, 1, 9, '', 0, 0, '0', '1', '0', '-', '-', '10', '10'),
(24, 1, 10, '', 0, 0, '0', '1', '0', '-', '-', '8', '8'),
(25, 2, 11, '', 0, 0, '0', '1', '0', 'CT OS BUNDLING', 'CT OS BUNDLING', 'CT OS BUNDLING', 'CT OS BUNDLING'),
(28, 0, 13, '', 0, 0, '0', '0', '1', '3', '3', '3', '3'),
(29, 0, 12, '', 0, 0, '0', '0', '1', '2', '2', '2', '2'),
(30, 0, 1, '', 2, 1, '0', '1', '0', '4', '4', '4', '4'),
(31, 0, 1, '', 2, 2, '0', '1', '0', '5', '5', '5', '5'),
(32, 0, 1, '', 2, 3, '0', '1', '0', '6', '6', '6', '6'),
(33, 0, 1, '', 2, 4, '0', '1', '0', '7', '7', '7', '7'),
(34, 0, 1, '', 2, 5, '0', '1', '0', '8', '8', '8', '8'),
(35, 0, 1, '', 2, 6, '0', '1', '0', '9', '9', '9', '9'),
(36, 0, 1, '', 2, 7, '0', '1', '0', '10', '10', '10', '10'),
(37, 6, 22, '6x7', 4, 8, '1', '0', '0', '8', '8', '8', '8'),
(38, 6, 22, '6x7', 5, 8, '1', '0', '0', '5', '5', '5', '5'),
(39, 6, 22, '6x7', 5, 9, '1', '0', '0', '10', '10', '10', '10'),
(40, 6, 22, '6x7', 6, 8, '1', '0', '0', '6', '6', '6', '6'),
(41, 6, 22, '6x7', 6, 9, '1', '0', '0', '12', '12', '12', '12'),
(42, 6, 22, '6x7', 7, 8, '1', '0', '0', '7', '7', '7', '7'),
(43, 6, 22, '6x7', 7, 9, '1', '0', '0', '14', '14', '14', '14'),
(44, 6, 22, '8x9', 4, 8, '1', '0', '0', '3', '3', '3', '3'),
(45, 6, 22, '8x9', 4, 9, '1', '0', '0', '6', '6', '6', '6'),
(46, 6, 22, '8x9', 5, 8, '1', '0', '0', '4', '4', '4', '4'),
(47, 6, 22, '8x9', 5, 9, '1', '0', '0', '8', '8', '8', '8'),
(48, 6, 22, '8x9', 6, 8, '1', '0', '0', '5', '5', '5', '5'),
(49, 6, 22, '8x9', 6, 9, '1', '0', '0', '10', '10', '10', '10'),
(50, 6, 22, '8x9', 7, 8, '1', '0', '0', '6', '6', '6', '6'),
(51, 6, 22, '8x9', 7, 9, '1', '0', '0', '12', '12', '12', '12'),
(53, 6, 22, '', 4, 0, '1', '0', '0', '3', '3', '3', '3'),
(54, 6, 22, '10x11', 4, 9, '1', '0', '0', '6', '6', '6', '6'),
(55, 6, 22, '10x11', 5, 8, '1', '0', '0', '4', '4', '4', '4'),
(56, 6, 22, '10x11', 5, 9, '1', '0', '0', '8', '8', '8', '8'),
(57, 6, 22, '10x11', 6, 8, '1', '0', '0', '5', '5', '5', '5'),
(58, 6, 22, '10x11', 6, 9, '1', '0', '0', '10', '10', '10', '10'),
(59, 6, 22, '10x11', 7, 8, '1', '0', '0', '6', '6', '6', '6'),
(60, 6, 22, '10x11', 7, 9, '1', '0', '0', '12', '12', '12', '12'),
(61, 6, 22, '12x13', 4, 8, '1', '0', '0', '3', '3', '3', '3'),
(62, 6, 22, '12x13', 4, 9, '1', '0', '0', '6', '6', '6', '6'),
(63, 6, 22, '12x13', 5, 8, '1', '0', '0', '4', '4', '4', '4'),
(64, 6, 22, '12x13', 5, 9, '1', '0', '0', '8', '8', '8', '8'),
(65, 6, 22, '12x13', 6, 8, '1', '0', '0', '5', '5', '5', '5'),
(66, 6, 22, '12x13', 6, 9, '1', '0', '0', '10', '10', '10', '10'),
(67, 6, 22, '12x13', 7, 8, '1', '0', '0', '6', '6', '6', '6'),
(68, 6, 22, '12x13', 7, 9, '1', '0', '0', '12', '12', '12', '12'),
(69, 6, 22, '14x15', 4, 8, '1', '0', '0', '2', '2', '2', '2'),
(70, 6, 22, '14x15', 4, 9, '1', '', '0', '4', '4', '4', '4'),
(71, 6, 22, '14x15', 5, 8, '1', '0', '0', '3', '3', '3', '3'),
(72, 6, 22, '14x15', 5, 9, '1', '0', '0', '6', '6', '6', '6'),
(73, 6, 22, '14x15', 6, 8, '1', '0', '0', '4', '4', '4', '4'),
(74, 6, 22, '14x15', 6, 9, '1', '0', '0', '8', '8', '8', '8'),
(75, 6, 22, '14x15', 7, 8, '1', '0', '0', '5', '5', '5', '5'),
(76, 6, 22, '14x15', 7, 9, '1', '0', '0', '10', '10', '10', '10'),
(78, 6, 22, '16x17', 4, 8, '1', '0', '0', '2', '2', '2', '2'),
(79, 6, 22, '16x17', 4, 9, '1', '0', '0', '4', '4', '4', '4'),
(80, 6, 22, '16x17', 5, 8, '1', '0', '0', '3', '3', '3', '3'),
(81, 6, 22, '16x17', 5, 9, '1', '0', '0', '6', '6', '6', '6'),
(82, 6, 22, '16x17', 6, 8, '1', '0', '0', '4', '4', '4', '4'),
(83, 6, 22, '16x17', 6, 9, '1', '0', '0', '8', '8', '8', '8'),
(84, 6, 22, '16x17', 7, 8, '1', '0', '0', '5', '5', '5', '5'),
(85, 6, 22, '16x17', 7, 9, '1', '0', '0', '10', '10', '10', '10'),
(86, 0, 2, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(87, 0, 14, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(88, 0, 15, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(89, 5, 17, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(90, 5, 18, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(91, 5, 16, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(92, 4, 19, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(93, 4, 20, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(94, 4, 21, '', 0, 0, '0', '1', '0', '3', '3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `housing_detail`
--

CREATE TABLE `housing_detail` (
  `id_detail` int(11) NOT NULL,
  `detail_ek` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing_detail`
--

INSERT INTO `housing_detail` (`id_detail`, `detail_ek`) VALUES
(1, 'Tarik cct ctrl.no XXX ( color ) dari housing hanger'),
(2, 'Ambil BONDER  XXX dari HJ'),
(3, 'Ambil CIK, barcode CIK'),
(4, 'Ambil conn u. XXX ( PART-NUMBER )  masukkan pada M/P,dengan tangan kanan,tangan kiri menyentuh stoper'),
(5, 'Tekan tombol switch sub YYY'),
(6, 'Ambil cct ctrl.no XXX ( color ) dari housing hanger,dengan tangan kanan'),
(7, 'Insert cct ctrl.no XXX ( color )  ke u. YYY  dengan tangan kanan'),
(8, 'Insert  twist cct ctrl.no XXX ( color )  ke u. YYY  dengan tangan '),
(9, 'Pasang gromet ( memasukkan connector saja )'),
(10, 'Pasang gromet ( memasukkan cct )'),
(11, 'Lakukan proses bundling'),
(12, 'Kembali ke homeposition'),
(13, 'Letakkan subassy pada hanger transit/trolly'),
(16, 'Ambil SHIELD/DC  XXX dari duct'),
(17, 'Ambil SHIELD/DC  XXX dari HJ'),
(18, 'Ambil SHIELD/DC XXX dari chutter'),
(19, 'Ambil JOINT  XXX dari HJ'),
(20, 'Ambil JOINT  XXX dari chutter'),
(21, 'Ambil JOINT  XXX dari duct'),
(22, 'Pasang VO (color)  (diameter) (c/l)');

-- --------------------------------------------------------

--
-- Table structure for table `housing_syarat1`
--

CREATE TABLE `housing_syarat1` (
  `id_s1` int(11) NOT NULL,
  `syarat1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing_syarat1`
--

INSERT INTO `housing_syarat1` (`id_s1`, `syarat1`) VALUES
(1, 'TWIST WIRE'),
(2, 'SHIELD WIRE'),
(3, 'SINGLE WIRE'),
(4, 'L : 100'),
(5, 'L : 300'),
(6, 'L : 500'),
(7, 'L : 1000');

-- --------------------------------------------------------

--
-- Table structure for table `housing_syarat2`
--

CREATE TABLE `housing_syarat2` (
  `id_s2` int(11) NOT NULL,
  `syarat2a` int(50) NOT NULL,
  `syarat2b` int(50) NOT NULL,
  `dot` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing_syarat2`
--

INSERT INTO `housing_syarat2` (`id_s2`, `syarat2a`, `syarat2b`, `dot`) VALUES
(1, 0, 1000, 'mm'),
(2, 1001, 2000, 'mm'),
(3, 2001, 3000, 'mm'),
(4, 3001, 4000, 'mm'),
(5, 4001, 5000, 'mm'),
(6, 5001, 6000, 'mm'),
(8, 1, 4, ''),
(9, 5, 9, ''),
(10, 7001, 8000, 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `housing_temp`
--

CREATE TABLE `housing_temp` (
  `id_hapus` int(11) NOT NULL,
  `id_temp` int(11) NOT NULL,
  `detail_update` text NOT NULL,
  `std` varchar(11) NOT NULL,
  `critical` varchar(225) NOT NULL,
  `os` varchar(225) NOT NULL,
  `SaI123` varchar(12) NOT NULL,
  `SaI098765` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing_temp`
--

INSERT INTO `housing_temp` (`id_hapus`, `id_temp`, `detail_update`, `std`, `critical`, `os`, `SaI123`, `SaI098765`) VALUES
(1, 18, 'Ambil conn u. 4532 ( 1234-0973 )  masukkan pada M/P,dengan tangan kanan,tangan kiri menyentuh stoper', '2', '', '', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `h_elemen`
--

CREATE TABLE `h_elemen` (
  `id_e` int(11) NOT NULL,
  `nama_elemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_elemen`
--

INSERT INTO `h_elemen` (`id_e`, `nama_elemen`) VALUES
(1, 'grommet'),
(2, 'bundling'),
(3, 'insert cct'),
(4, 'joint'),
(5, 'shield'),
(6, 'vo'),
(7, 'po'),
(9, 'm'),
(10, '3323'),
(11, 'grommet'),
(12, 'grommet');

-- --------------------------------------------------------

--
-- Table structure for table `h_os`
--

CREATE TABLE `h_os` (
  `id_os` int(11) NOT NULL,
  `nama_os` varchar(50) NOT NULL,
  `ide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_os`
--

INSERT INTO `h_os` (`id_os`, `nama_os`, `ide`) VALUES
(1, 'TRN-OS-FA-911', 1),
(2, 'TRN-OS-FA-912', 1),
(3, 'TRN-OS-FA-913', 1),
(4, 'TRN-OS-FA-967', 1),
(5, 'TRN-OS-FA-969', 1),
(6, 'TRN-OS-FA-783', 1),
(7, 'TRN-OS-FA-426', 2),
(8, 'TRN-OS-FA-427', 2),
(9, 'TRN-OS-FA-428', 2),
(10, 'TRN-OS-FA-429', 2),
(11, 'TRN-OS-FA-40', 3),
(12, 'TRN-OS-FA-97', 3),
(13, 'TRN-OS-FA-382', 4),
(14, 'TRN-OS-FA-396', 4),
(15, 'TRN-OS-FA-392', 5),
(16, 'TRN-OS-FA-324', 6),
(17, 'TRN-OS-FA-325', 6);

-- --------------------------------------------------------

--
-- Table structure for table `kop`
--

CREATE TABLE `kop` (
  `id_kop` int(11) NOT NULL,
  `customer` varchar(25) NOT NULL,
  `carModel` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `noRev` varchar(25) NOT NULL,
  `station` varchar(50) NOT NULL,
  `family` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kop`
--

INSERT INTO `kop` (`id_kop`, `customer`, `carModel`, `type`, `tanggal`, `noRev`, `station`, `family`) VALUES
(4, '3', 'a', 'sd', '2018-08-17', '12', 'SETTING - 02', 'setting'),
(5, '12', '12', '122', '2018-08-21', '13', '12', 'housing');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(4, 'maf', 'maf', ''),
(5, 'nahila', 'nahila', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `elemen_kerja` varchar(255) NOT NULL,
  `idd` int(11) NOT NULL,
  `idket` varchar(225) NOT NULL,
  `ids1` int(11) NOT NULL,
  `ids2` int(11) NOT NULL,
  `vw` enum('0','1') NOT NULL,
  `nvw` enum('0','1') NOT NULL,
  `langkah` enum('0','1') NOT NULL,
  `erm` varchar(11) NOT NULL,
  `inp` varchar(11) NOT NULL,
  `floor` varchar(11) NOT NULL,
  `door` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `elemen_kerja`, `idd`, `idket`, `ids1`, `ids2`, `vw`, `nvw`, `langkah`, `erm`, `inp`, `floor`, `door`) VALUES
(3, 'Subassy', 5, '1', 0, 0, '0', '0', '1', '2', '2', '2', '2'),
(4, 'Subassy', 5, '2', 0, 0, '0', '0', '1', '4', '4', '4', '4'),
(5, 'Subassy', 5, '15', 0, 0, '0', '0', '1', '6', '6', '6', '6'),
(6, 'Subassy', 6, '', 0, 0, '1', '0', '0', '2', '2', '2', '2'),
(7, 'Connector', 7, '', 0, 0, '1', '0', '0', '2', '2', '2', '2'),
(8, 'Connector', 8, '', 0, 0, '1', '0', '0', '3', '3', '3', '3'),
(9, 'Connector', 9, '', 0, 0, '1', '0', '0', '2', '2', '2', '2'),
(10, 'Connector', 10, '3', 0, 0, '1', '0', '0', '1', '1', '1', '1'),
(11, 'Connector', 10, '4', 0, 0, '1', '0', '0', '2', '2', '2', '2'),
(12, 'Connector', 10, '5', 0, 0, '1', '0', '0', '3', '3', '3', '3'),
(13, 'Connector', 10, '6', 0, 0, '1', '0', '0', '4', '4', '4', '4'),
(14, 'Connector', 10, '7', 0, 0, '1', '0', '0', '5', '5', '5', '5'),
(15, 'Connector', 10, '8', 0, 0, '1', '0', '0', '6', '6', '6', '6'),
(16, 'Connector', 10, '9', 0, 0, '1', '0', '0', '7', '7', '7', '7'),
(17, 'Connector', 11, '3', 0, 0, '1', '0', '0', '2', '2', '2', '2'),
(18, 'Connector', 11, '4', 0, 0, '1', '0', '0', '3', '3', '3', '3'),
(19, 'Connector', 11, '5', 0, 0, '1', '0', '0', '4', '4', '4', '4'),
(20, 'Connector', 11, '6', 0, 0, '1', '0', '0', '5', '5', '5', '5'),
(21, 'Connector', 11, '7', 0, 0, '1', '0', '0', '6', '6', '6', '6'),
(22, 'Connector', 11, '8', 0, 0, '1', '0', '0', '7', '7', '7', '7'),
(23, 'Connector', 11, '9', 0, 0, '1', '0', '0', '8', '8', '8', '8'),
(24, 'Connector', 12, '', 0, 0, '1', '0', '0', '4', '4', '4', '4'),
(25, 'Connector', 13, '', 0, 0, '1', '0', '0', '1', '1', '1', '1'),
(26, 'Connector', 14, '', 0, 0, '1', '0', '0', '1', '1', '1', '1'),
(27, 'RB', 15, '', 0, 0, '1', '0', '0', '4', '-', '-', '-'),
(28, 'RB', 16, '', 0, 0, '1', '0', '0', '10', '-', '-', '-'),
(29, 'FL', 17, '', 0, 0, '1', '0', '0', '7', '-', '-', '-'),
(30, 'grommet', 18, '10', 0, 0, '1', '0', '0', '2', '2', '2', '2'),
(31, 'grommet', 18, '11', 0, 0, '1', '0', '0', '4', '4', '4', '4'),
(32, '', 19, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(33, '', 20, '', 0, 0, '0', '1', '0', '2', '2', '2', '2'),
(34, '', 21, '', 0, 0, '0', '0', '1', '3', '3', '3', '3'),
(35, '', 22, '', 0, 0, '1', '0', '0', '2', '2', '2', '2'),
(36, '', 23, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(37, '', 24, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(38, '', 25, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(39, '', 26, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(40, '', 27, '', 0, 0, '0', '1', '0', '3', '3', '3', '3'),
(41, 'SubAssy', 5, '9', 0, 0, '0', '1', '0', '1', 'ada', 'd', 'ad');

-- --------------------------------------------------------

--
-- Table structure for table `setting_assy`
--

CREATE TABLE `setting_assy` (
  `id_assy` int(11) NOT NULL,
  `kode_assy` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_assy`
--

INSERT INTO `setting_assy` (`id_assy`, `kode_assy`) VALUES
(1, 'SaI1234'),
(2, 'SaISWE12'),
(3, 'SaIpo'),
(4, 'SaISAI12'),
(5, 'SaI131445');

-- --------------------------------------------------------

--
-- Table structure for table `setting_detail`
--

CREATE TABLE `setting_detail` (
  `id_detail` int(11) NOT NULL,
  `detail_ek` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_detail`
--

INSERT INTO `setting_detail` (`id_detail`, `detail_ek`) VALUES
(5, 'Ambil sub assy XXX dari hanger transit'),
(6, 'Ambil CIK  & sub kanban yg ada di sao sub assy. Baca CIK lalu letakkan  pada tempatnya'),
(7, 'Setting conn u. XXX  ke dalam M/P dengan tangan kanan,tangan kiri membuka stopper'),
(8, 'Setting conn u. XXX  ke dalam M/P FP dengan tangan kanan,tangan kiri membuka stopper'),
(9, 'Setting LA XXX ke dalam M/P dengan tangan kanan'),
(10, 'Layout cct ctrl.no  XXX ( size ) (color) dari u.AAA  ke u.BBB'),
(11, 'Layout ujung  XXX ( size ) (color) dari u.AAA  ke u.BBB'),
(12, 'Insert cct ctrl.no XXX'),
(13, 'Lock spacer conector dengan jari'),
(14, 'Letakkan bonder ctrl.no  pada fork bonder'),
(15, 'Ambil dan letakkan RB ujung XXX pada matting  part'),
(16, 'Insert cct ctrl.no XXX ke RB ujung AAA'),
(17, 'Letakkan FL pada matting part'),
(18, 'Letakkan grommet (PART-NUMBER) pada matting part.'),
(19, 'Ambil sao kosong dari jig'),
(20, 'Kembalikan sao kosong ke hanger transit/trolly'),
(21, 'Kembali ke homeposition'),
(22, 'FORK spesial yg dilewati SUBASSY atau cct'),
(23, 'Ambil connector dari SAO subassy'),
(24, 'Letakkan SAO subassy ke jigboard'),
(25, 'Buka bundlingan subassy (XXX)'),
(26, 'Ambil cct di percabangan du. (XXX)rh'),
(27, 'Pilah cct (XXX)');

-- --------------------------------------------------------

--
-- Table structure for table `setting_ket`
--

CREATE TABLE `setting_ket` (
  `id_ket` int(11) NOT NULL,
  `syarat_a` int(11) DEFAULT NULL,
  `syarat_b` int(11) DEFAULT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_ket`
--

INSERT INTO `setting_ket` (`id_ket`, `syarat_a`, `syarat_b`, `ket`) VALUES
(1, 0, 6, 'ujung'),
(2, 7, 10, 'ujung'),
(3, 0, 599, 'cct'),
(4, 600, 899, 'cct'),
(5, 900, 1199, 'cct'),
(6, 1200, 1499, 'cct'),
(7, 1500, 1799, 'cct'),
(8, 1800, 2099, 'cct'),
(9, 2100, 2300, 'cct'),
(10, NULL, NULL, 'grommet kecil'),
(11, NULL, NULL, 'grommet panjang/besar'),
(12, 2, 3, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `setting_s1`
--

CREATE TABLE `setting_s1` (
  `id_s1` int(11) NOT NULL,
  `syarat1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_temp`
--

CREATE TABLE `setting_temp` (
  `id_hapus` int(11) NOT NULL,
  `id_temp` int(11) NOT NULL,
  `detail_update` text NOT NULL,
  `critical` varchar(225) NOT NULL,
  `os` varchar(100) NOT NULL,
  `std` varchar(11) NOT NULL,
  `SaI1234` varchar(12) NOT NULL,
  `SaISWE12` varchar(12) NOT NULL,
  `SaIpo` varchar(12) NOT NULL,
  `SaISAI12` varchar(12) NOT NULL,
  `SaI131445` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_temp`
--

INSERT INTO `setting_temp` (`id_hapus`, `id_temp`, `detail_update`, `critical`, `os`, `std`, `SaI1234`, `SaISWE12`, `SaIpo`, `SaISAI12`, `SaI131445`) VALUES
(1, 3, 'Ambil sub assy 123 dari hanger transit', 'Yes', 'No', '2', '2', '', '2', '2', '2'),
(2, 8, 'Setting conn u. 878  ke dalam M/P FP dengan tangan kanan,tangan kiri membuka stopper', '', '', '3', '', '', '', '3', '3'),
(3, 9, 'Setting LA XXX ke dalam M/P dengan tangan kanan', '', '', '2', '', '', '', '', '2'),
(4, 7, 'Setting conn u. XXX  ke dalam M/P dengan tangan kanan,tangan kiri membuka stopper', '', '', '2', '', '', '', '', '2'),
(5, 3, 'Ambil sub assy 1212121 dari hanger transit', '', '', '2', '', '', '', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `taping_all`
--

CREATE TABLE `taping_all` (
  `idt_all` int(11) NOT NULL,
  `idt_detail` int(11) NOT NULL,
  `jumlah_lilitan` int(11) DEFAULT NULL,
  `idt_tube` int(11) DEFAULT NULL,
  `idt_length` int(11) DEFAULT NULL,
  `jumlah_cct` int(11) DEFAULT NULL,
  `jumlah_intensitas` int(11) DEFAULT NULL,
  `jenis` enum('Value Work','Non Value Work','Langkah') NOT NULL,
  `t_erm` int(11) NOT NULL,
  `t_inp` int(11) NOT NULL,
  `t_floor_rear` int(11) NOT NULL,
  `t_door` int(11) NOT NULL,
  `t_critical` varchar(255) DEFAULT NULL,
  `t_os` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_all`
--

INSERT INTO `taping_all` (`idt_all`, `idt_detail`, `jumlah_lilitan`, `idt_tube`, `idt_length`, `jumlah_cct`, `jumlah_intensitas`, `jenis`, `t_erm`, `t_inp`, `t_floor_rear`, `t_door`, `t_critical`, `t_os`) VALUES
(1, 1, 0, 0, 0, 0, 1, 'Langkah', 4, 4, 4, 4, NULL, NULL),
(2, 2, 0, 0, 0, 0, 1, 'Non Value Work', 2, 2, 2, 2, 'Yayaya', 'klah'),
(5, 5, 0, 0, 0, 0, 1, 'Non Value Work', 2, 2, 2, 2, NULL, NULL),
(6, 6, 0, 0, 0, 0, 1, 'Non Value Work', 3, 3, 3, 3, NULL, NULL),
(7, 7, 0, 0, 0, 0, 1, 'Non Value Work', 2, 2, 2, 2, NULL, NULL),
(8, 7, 0, 0, 0, 0, 1, 'Non Value Work', 2, 2, 2, 2, NULL, NULL),
(9, 8, 0, 0, 0, 0, 1, 'Non Value Work', 3, 3, 3, 3, NULL, NULL),
(10, 9, 0, 0, 0, 0, 1, 'Non Value Work', 3, 3, 3, 3, NULL, NULL),
(11, 10, 0, 0, 1, 0, 1, 'Non Value Work', 6, 6, 6, 6, NULL, NULL),
(12, 10, 0, 0, 2, 0, 1, 'Value Work', 7, 7, 7, 7, NULL, NULL),
(13, 10, 0, 0, 3, 0, 1, 'Value Work', 8, 8, 8, 8, NULL, NULL),
(14, 10, 0, 0, 4, 0, 1, 'Value Work', 9, 9, 9, 9, NULL, NULL),
(15, 10, 0, 0, 5, 0, 1, 'Value Work', 10, 10, 10, 10, NULL, NULL),
(16, 10, 0, 0, 6, 0, 1, 'Value Work', 11, 11, 11, 11, NULL, NULL),
(17, 11, 0, 0, 1, 0, 1, 'Value Work', 10, 10, 10, 10, NULL, NULL),
(18, 12, 0, 0, 21, 0, 1, 'Value Work', 10, 10, 10, 10, NULL, NULL),
(19, 13, 0, 0, 21, 0, 1, 'Value Work', 22, 22, 22, 22, NULL, NULL),
(20, 14, 0, 0, 2, 0, 1, 'Value Work', 21, 21, 21, 21, NULL, NULL),
(21, 15, 0, 0, 0, 0, 1, 'Value Work', 10, 10, 10, 10, NULL, NULL),
(22, 16, 0, 0, 0, 0, 1, 'Value Work', 13, 13, 13, 13, NULL, NULL),
(23, 17, 0, 0, 0, 0, 1, 'Value Work', 17, 17, 17, 17, NULL, NULL),
(24, 18, 0, 0, 0, 0, 1, 'Value Work', 13, 13, 13, 13, NULL, NULL),
(25, 22, 0, 0, 0, 0, 1, 'Value Work', 5, 5, 5, 5, NULL, NULL),
(26, 25, 0, 0, 0, 0, 1, 'Value Work', 8, 8, 8, 8, NULL, NULL),
(27, 28, 2, 0, 0, 0, 1, 'Value Work', 2, 2, 2, 2, NULL, NULL),
(28, 29, 0, 0, 0, 0, 1, 'Non Value Work', 2, 2, 2, 2, NULL, NULL),
(29, 30, 0, 1, 22, 0, 1, 'Value Work', 5, 5, 5, 5, NULL, NULL),
(30, 31, 6, 0, 0, 0, 1, 'Value Work', 5, 5, 5, 5, NULL, NULL),
(31, 32, 3, 0, 0, 0, 1, 'Value Work', 3, 4, 4, 4, NULL, NULL),
(32, 33, 5, 2, 22, 0, 0, 'Value Work', 2, 2, 2, 2, NULL, NULL),
(33, 81, 0, 0, 6, 0, 1, 'Value Work', 12, 12, 12, 12, NULL, NULL),
(34, 37, 0, 0, 0, 0, 1, 'Value Work', 1, 1, 1, 1, NULL, NULL),
(35, 2, 0, 0, 0, 0, 1, 'Non Value Work', 4, 4, 4, 4, NULL, NULL),
(36, 2, 0, 0, 0, 0, 1, 'Value Work', 2, 2, 2, 2, NULL, NULL),
(37, 2, 7, 0, 0, 0, 0, 'Non Value Work', 6, 6, 6, 5, '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `taping_assy`
--

CREATE TABLE `taping_assy` (
  `idt_assy` int(11) NOT NULL,
  `kode_assy` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taping_cct`
--

CREATE TABLE `taping_cct` (
  `idt_cct` int(11) NOT NULL,
  `jumlah_cct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taping_detail`
--

CREATE TABLE `taping_detail` (
  `idt_detail` int(11) NOT NULL,
  `idt_elemen` int(11) NOT NULL,
  `t_detail` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_detail`
--

INSERT INTO `taping_detail` (`idt_detail`, `idt_elemen`, `t_detail`) VALUES
(1, 1, 'Melangkah ke jig selanjutnya'),
(2, 2, 'Ambil ( all material ) dengan tangan kanan'),
(3, 3, 'Ambil tape XXXX dari tape holder dengan tangan kanan'),
(4, 3, 'Letakkan tape XXXX ke tape hoder dengan tangan kanan'),
(5, 4, 'Ambil  connector pada matting part'),
(6, 4, 'Ambil  connector pada matting part FP'),
(7, 4, 'Letakkan connector pada matting part'),
(8, 4, 'Letakkan connector pada matting part FP'),
(9, 5, 'Spot Taping'),
(10, 6, 'Spiral taping  (panjang dimensi, termasuk spot awal dan akhir )'),
(11, 7, 'Full taping  (panjang dimensi, termasuk spot awal dan akhir )'),
(12, 8, 'Spiral taping  (panjang dimensi, termasuk spot awal dan akhir )'),
(13, 9, 'Full taping  (panjang dimensi, termasuk spot awal dan akhir )'),
(14, 10, 'Full taping  (panjang dimensi, termasuk spot awal dan akhir )'),
(15, 11, 'Cross taping tidak mutlak untuk 3 branch'),
(16, 11, 'Cross taping tidak mutlak untuk 4 branch'),
(17, 11, 'Cross taping tidak mutlak untuk 5 branch'),
(18, 12, 'Cross taping mutlak untuk 3 branch'),
(19, 12, 'Cross taping mutlak untuk 4 branch'),
(21, 12, 'Cross taping mutlak untuk 5 branch'),
(22, 13, 'Cross taping tidak mutlak untuk 3 branch'),
(23, 13, 'Cross taping tidak mutlak untuk 4 branch'),
(24, 13, 'Cross taping tidak mutlak untuk 5 branch'),
(25, 14, 'Cross taping mutlak untuk 3 branch'),
(26, 14, 'Cross taping mutlak untuk 4 branch'),
(27, 14, 'Cross taping mutlak untuk 5 branch'),
(28, 15, 'Spot taping awal pemasangan COT'),
(29, 15, 'Ambil part'),
(30, 15, 'Pasang COT dengan colgeter'),
(31, 15, 'Spot menurun ujung'),
(32, 15, 'Spot tepat  COT'),
(33, 15, 'Spiral taping di atas COT (varian dimensi COT)'),
(34, 15, 'Full  taping di atas COT (varian dimensi COT)'),
(35, 15, 'Spot menurun pangkal'),
(36, 15, 'Spot tapat COT'),
(37, 15, 'Sobek tape'),
(38, 16, 'Spot taping awal pemasangan HPVC'),
(39, 16, 'Ambil part'),
(40, 16, 'Pasang HPVC dengan colgeter'),
(41, 16, 'Spot menurun ujung'),
(42, 16, 'Spot tepat  HPVC'),
(43, 16, 'Spiral taping di atas HPVC (varian dimensi HPVC)'),
(44, 16, 'Full  taping di atas HPVC (varian dimensi HPVC)'),
(45, 16, 'Spot menurun pangkal'),
(46, 16, 'Spot tepat HPVC'),
(47, 16, 'Sobek tape'),
(48, 17, 'Ambil Ujung XXXX'),
(49, 17, 'Spot taping awal pemasangan Twish tube'),
(50, 17, 'Ambil part'),
(51, 17, 'Pasang twisth tube XXXX'),
(52, 17, 'Spot menurun ujung'),
(53, 17, 'Spot tepat  twisth tube'),
(54, 17, 'Sobek tape'),
(55, 17, 'Rapikan twisth tube'),
(56, 17, 'Spot menurun pangkal'),
(57, 17, 'Spot tepat twisth tube'),
(58, 17, 'Layout Ujung XXXX'),
(59, 18, 'Spot taping awal du XXXX'),
(60, 18, 'Ambil part'),
(61, 18, 'Pasang CVO XXXX'),
(62, 18, 'Awal spot menurun ujung'),
(63, 0, 'Awal spot tepat ujung'),
(64, 18, 'Spiral taping di atas CVO'),
(65, 18, 'Full taping di atas CVO'),
(66, 18, 'Akhiri spot menurun pangkal'),
(67, 18, 'Akhiri spot tepat pangkal'),
(68, 18, 'Sobek tape'),
(69, 19, 'Ambil part'),
(70, 19, 'Pasang VS ( METODE DILIPAT )'),
(71, 19, 'Pasang VS ( METODE DIGULUNG )'),
(72, 19, 'Awal spot menurun ujung'),
(73, 19, 'Awal spot tepat ujung'),
(74, 19, 'Akhiri spot menurun pangkal'),
(75, 19, 'Akhiri spot tepat pangkal'),
(76, 19, 'Sobek tape'),
(77, 20, 'Ambil part'),
(78, 20, 'Pasang Soft tape (METODE DILIPAT)'),
(79, 20, 'Pasang Soft tape (METODE DIGULUNG)'),
(80, 20, 'Awal spot menurun ujung'),
(81, 20, 'Awal spot tepat ujung'),
(82, 20, 'Akhiri spot menurun pangkal'),
(83, 20, 'Akhiri spot tepat pangkal'),
(84, 20, 'Sobek tape'),
(85, 21, 'Ambil part  XXXX'),
(86, 21, 'Taping awal pada base clip'),
(87, 21, 'Layout pada matting part'),
(88, 21, 'Taping 5 lilitan di atas clip'),
(89, 21, 'Sobek tape'),
(90, 21, 'Letakkan tape pada tape holder'),
(91, 22, 'Ambil part  XXXX'),
(92, 22, 'Taping awal pada base clip'),
(93, 22, 'Layout pada matting part'),
(94, 22, 'Taping 5 lilitan di atas clip'),
(95, 22, 'Sobek tape'),
(96, 22, 'Taping 5 lilitan di atas clip'),
(97, 22, 'Layout branch sesuai layou pada clip'),
(98, 22, 'Sobek tape'),
(99, 22, 'Letakkan tape pada tape holder'),
(100, 23, 'Ambil part XXXX'),
(101, 23, 'Taping awal pada base clip'),
(102, 23, 'Layout pada matting part'),
(103, 23, 'Taping 5 lilitan di atas clip'),
(104, 23, 'Sobek tape'),
(105, 23, 'Taping 5 lilitan di atas'),
(106, 23, 'Sobek tape'),
(107, 23, 'Letakkan tape pada tape holder'),
(108, 24, 'Spot gabung antara ujung XXXX dengan ujung XXXX'),
(109, 25, 'Ambil part XXXX'),
(110, 25, 'Pasang clip ke Matting Part'),
(111, 25, 'Kencangkan clip'),
(112, 26, 'Potong semua band clip insulock , buang potongan band clip pada apron dengan tangan kanan'),
(113, 27, 'Untuk pemasangan protector kondisional sesuai eng. Dwg'),
(114, 28, 'Spot taping awal'),
(115, 28, 'Ambil part/NP dari rak N/P'),
(116, 28, 'Pasang NP'),
(117, 28, 'Spot NP'),
(118, 28, 'Sobek tape'),
(119, 28, 'Spot 1 sisi lainnya'),
(120, 28, 'Sobek tape'),
(122, 2, 'Ambil tape XXXX dari tape holder dengan tangan kiri'),
(123, 1, 'OK'),
(124, 2, 'Ambil ( all material ) dengan tangan kanan kamu'),
(125, 3, 'Ambil tape XXXX dari tape holder dengan tangan kananmuk'),
(126, 2, 'Ambil tape XXXX dari tape holder dengan tangan kanan');

-- --------------------------------------------------------

--
-- Table structure for table `taping_elemen`
--

CREATE TABLE `taping_elemen` (
  `idt_elemen` int(11) NOT NULL,
  `t_elemen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_elemen`
--

INSERT INTO `taping_elemen` (`idt_elemen`, `t_elemen`) VALUES
(1, '-'),
(2, 'Ambil Material'),
(3, 'Tape'),
(5, 'Spot Taping'),
(6, 'Spiral Taping (VTA 19)'),
(7, 'Full Taping (VTA 19)'),
(8, 'Spiral Taping (VTA 25)'),
(9, 'Full Taping (VTA 25)'),
(10, 'Full Taping (AATN)'),
(11, 'Cross taping tidak mutlak (VTA 19)'),
(12, 'Cross taping mutlak( VTA 19)'),
(13, 'Cross taping tidak mutlak (VTA 25)'),
(14, 'Cross taping mutlak( VTA 25)'),
(15, 'COT'),
(16, 'Hard Tube / HPVC'),
(17, 'Twisth Tube'),
(18, 'C-VO'),
(19, 'VS'),
(20, 'Soft tape'),
(21, 'Clip 1 base'),
(22, 'Clip type L'),
(24, 'Spot gabung'),
(25, 'Clip insulock'),
(26, 'Gunclip'),
(27, 'Protector'),
(28, 'Name Plate'),
(29, 'Materiall'),
(32, 'Connec'),
(33, 'Connector');

-- --------------------------------------------------------

--
-- Table structure for table `taping_henkaten`
--

CREATE TABLE `taping_henkaten` (
  `no` int(11) NOT NULL,
  `ujung` varchar(50) DEFAULT NULL,
  `no_mat` varchar(255) DEFAULT NULL,
  `mat_old` varchar(200) DEFAULT NULL,
  `mat_new` varchar(200) DEFAULT NULL,
  `method_old` varchar(255) DEFAULT NULL,
  `method_new` varchar(255) DEFAULT NULL,
  `critical` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `82111-F2L10` varchar(12) NOT NULL,
  `82111-F2T40` varchar(12) NOT NULL,
  `82111-F2T50` varchar(12) NOT NULL,
  `82111-F2L20` varchar(12) NOT NULL,
  `82115-F2030` varchar(12) NOT NULL,
  `82115-F2810` varchar(12) NOT NULL,
  `82115-F2800` varchar(12) NOT NULL,
  `82115-F2740` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_henkaten`
--

INSERT INTO `taping_henkaten` (`no`, `ujung`, `no_mat`, `mat_old`, `mat_new`, `method_old`, `method_new`, `critical`, `remarks`, `82111-F2L10`, `82111-F2T40`, `82111-F2T50`, `82111-F2L20`, `82115-F2030`, `82115-F2810`, `82115-F2800`, `82115-F2740`) VALUES
(1, NULL, NULL, 'Suffix 02000', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(2, NULL, NULL, 'Suffix A0000', 'Suffix A1000', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(3, 'AB', NULL, 'AB111-F2L10', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(4, NULL, NULL, 'VTA FR B W19', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(5, 'U.22', NULL, '7289-2587-40', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(6, 'U.22', NULL, 'COT-F B D7.4X10.2 L=155', NULL, 'Spot menurun ujung, Full taping diatas COT, Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(7, 'U.22', NULL, '7047-3509-30', NULL, 'Spot taping di bawah insulock dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(8, 'U.37', NULL, 'conn 7283-8852', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(9, 'U.37', NULL, 'COT F B D 5.1X7.6 L=145', NULL, 'Spiral taping didalam COT, Spot tepat ujung menurun pangkal dengan VTA FR B W=19', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(10, 'U.17', NULL, '7289-9879-30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(11, 'U.17', NULL, 'COT F B D5.1X7.6 L=355', NULL, 'Spiral taping sesuai initial di dalam COT, Spot tepat ujung, Full taping diatas COT sesuai initial,  menurun pangkal VTA-FR-B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(12, 'U.17', NULL, '7247-9526', NULL, 'Spot base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(13, 'U.31', NULL, 'conn 7283 0393 40', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(14, 'U.31', NULL, 'COT F B D7.4X10.2 L=55', NULL, 'Spiral taping didalam COT, Spot tepat ujung menurun pangkal  dengan VTA FR B W=19', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(15, 'DU.31', NULL, NULL, NULL, 'Full taping trunk dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(16, 'DU.31', NULL, NULL, NULL, 'Spot percabangan du.31 dengan VTAC-Gy W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(17, 'du.31', NULL, 'COT F B D7.4X10.2 L=270', NULL, 'Spot tepat ujung, Full taping di atas COT, Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(18, 'du.31', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(19, 'DU.31', NULL, NULL, NULL, 'Spot gabung du.31  dengan trunk', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(20, 'U.411', NULL, 'Bonder 7409 9915 (W/B)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(21, 'U.411', NULL, NULL, NULL, 'Spot gabung U.411 dengan trunk 4 lilitan dengan VTA FR B W=19', NULL, NULL, 'Tieback', '', '', '', '', '', '', '', ''),
(22, 'U.85', NULL, 'conn 7287 2652 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(23, 'U.85', NULL, 'VS04T3-B W50 L=440', 'VS04T3-B W=50 L=450', 'Dilipat, spot tepat ujung menurun pangkal', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(24, 'U.85', NULL, '7047-2848-30', NULL, 'Spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(25, 'U.85', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(26, 'du.31', NULL, NULL, NULL, 'cross taping mutlak du.85', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(27, 'du.31', NULL, '7047 7787', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(28, 'du.31', NULL, 'COT F B D 10.7X14.1 L=90', NULL, 'Spot dalam cot 1 area,Spot menurun kedua ujung full taping di atas dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(29, 'U.53', NULL, 'conn A/B 7C83 8794 70', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(30, 'U.53', NULL, '7184 3100', NULL, 'cot masuk cover conn', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(31, 'U.53', NULL, 'COT F B D 5.1X7.6 L=330', NULL, 'full taping di atas sesuai initial Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(32, 'U.53', NULL, '7047 2848 30', NULL, 'spot 2 base clip dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(33, 'U.53', NULL, '7046 9085', NULL, 'full taping name plate dengan ND2032TR W=50', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(34, 'U.43', NULL, 'conn 7283 0392 30', NULL, NULL, NULL, NULL, 'HLC,Y=15', '', '', '', '', '', '', '', ''),
(35, 'U.43', NULL, 'COT F B D 5.1X7.6 L=140', NULL, 'Spiral taping didalam COT, Spot tepat ujung menurun pangkal dengan VTA FR B W=19', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(36, 'U.43', NULL, 'COT F B D 5.1X7.6 L=265', NULL, 'Spiral taping didalam COT, Spot tepat ujung menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(37, 'U.43', NULL, '7052 1502', NULL, 'spot 1 base clip dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(38, 'U.23', NULL, 'CONN 7287-7598-30', NULL, 'Cover conn 7134-4004', NULL, NULL, 'HLC', '', '', '', '', '', '', '', ''),
(39, 'U.23', NULL, 'VO-B D12X13 L=205', NULL, 'spot menurun pangkal dg VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(40, 'DU.23', NULL, NULL, NULL, 'Spot gabung U.23 dengan base clip 7052-1502 pada base clip dg VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(41, 'DU.23', NULL, 'COT-F-B D7,4X10,2 L=110', NULL, 'Spiral taping didalam COT, Spot menurun ujung, Spot menurun pangkal dg VTA070-B, W=19', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(42, 'DU.43', NULL, NULL, NULL, 'cross tap mutlak du.43', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(43, 'DU.43', NULL, '7047-2848-30', NULL, 'Spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(44, 'DU.43', NULL, 'COT F B D7,4X10,2 L=145', NULL, 'Full taping spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(45, 'U.706', NULL, '7009 2289 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(46, 'U.620', NULL, '7009 2281 02', NULL, 'docking dengan U.704', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(47, 'DU.620', NULL, NULL, NULL, 'Spot gabung Du.620 dengan trunk du.43', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(48, 'U.621', NULL, 'conn 7189 2978 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(49, 'U.622', NULL, 'conn 7009 2282 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(50, 'U.622', NULL, NULL, NULL, 'docking dengan 7388 2978 30', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(51, 'DU.622', NULL, NULL, NULL, 'spot gabung U.621 dan U.622 sesuai initial 1 area', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(52, 'DU.622', NULL, NULL, NULL, 'Spot percabangan du.621', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(53, 'DU.622', NULL, NULL, NULL, 'cross taping tidak mutlak du.621', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(54, 'DU.622', NULL, '7047 2848 30', NULL, 'spot kedua base clip ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(55, 'DU.622', NULL, NULL, NULL, 'spot gabung du.622 dengan trunk ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(56, 'DU.622', NULL, 'COT F B D 15.2X19.5 L=160', NULL, 'Spiral taping didalam COT, Spot menurun kedua ujung Spot di atas cot 1 area ', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(57, 'U.123', NULL, 'conn 7283 4673 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(58, 'U.123', NULL, 'COT F B D 5.1X7.6 L=195', NULL, 'Spiral taping sesuai initial didalam COT, Spot tepat ujung, full taping diatas sesuai initial, SPOT menurun pangkal dengan VTA FR B W=19', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(59, 'U.701', NULL, 'conn 7282 9762 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(60, 'U.701', NULL, 'COT F B D7.4X10.2 L=105', NULL, 'Spot tepat ujung menurun pangkal spiral taping diatas sesuai initial dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(61, 'U.41', NULL, 'conn 7283-4372 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(62, 'U.41', NULL, 'TC 7152-5477', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(63, 'U.41', NULL, 'COT F B D7.4X10.2 L=100', NULL, 'Spot tepat ujung, spiral taping diatas sesuai initial, Spot  menurun pangkal  dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(64, 'U.40', NULL, 'conn 7287 2279 40', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(65, 'U.40', NULL, 'COT F B D 5.1X7.6 L=55', NULL, 'Spot tepat ujung menurun pangkal full taping diatas sesuai initial dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(66, 'du.40', NULL, '7047 2848 30', NULL, 'spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(67, 'DU.40', NULL, 'CVO B D6X8 L=820', NULL, 'Spot menurun kedua ujung full taping diatas dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(68, 'DU.41', NULL, 'CVOH-9 L=50 (7138-4345)', NULL, 'Spot menurun ujung, Full taping di atas CVOH, Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(69, 'DU.40', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(70, 'DU.40', NULL, NULL, NULL, 'cross taping tidak mutlak du.40', 'Spot percabangan DU.40', NULL, NULL, '', '', '', '', '', '', '', ''),
(71, 'DU.40', NULL, '7047 2848 30', NULL, 'spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(72, 'DU.40', NULL, NULL, NULL, 'spot gabung DU.40 + U.123 + DU.621 dengan VTA-FR-B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(73, 'DU.40', NULL, 'COT F B D 15.2X19.5 L=335', NULL, 'Spiral taping didalam COT, Spot menurun kedua ujung full taping di atas cot sesuai initial', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(74, 'DU.40', NULL, '7047 3509 30', NULL, 'Spot diatas COT (dibawah insulock) dengan VTAC-GY W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(75, 'U.810', NULL, 'conn 7171 1456 30', NULL, NULL, NULL, NULL, 'DERSS CONN', '', '', '', '', '', '', '', ''),
(76, 'U.418', NULL, 'Bonder 7409 9915 (Lg)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(77, 'U.563', NULL, '7254-0956-3W', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(78, 'DU.810', NULL, NULL, NULL, 'spiral taping gabung U.810 dan U.453', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(79, 'DU.810', NULL, 'COT F B D22,1X27 L=55', NULL, 'spiral taping di dalam cot full tap sesuai initial spot tepat pangkal (ujung cot untap 25mm)', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(80, 'DU.810', NULL, NULL, NULL, 'cross taping mutlak du.810', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(81, 'DU.810', NULL, NULL, NULL, 'un taping du.810', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(82, 'DU.810', NULL, 'VS04T3 - B W100 L=115', NULL, 'dilipat spot menurun kedua ujung dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(83, 'U.39', NULL, 'conn 7283 4050 30', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(84, 'U.39', NULL, '7157 8767 80', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(85, 'U.39', NULL, 'COT F B D 7.4X10.2 L=365', NULL, 'Spot tepat ujung, full taping sesuai dengan initial, spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(86, 'U.39', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(87, 'U.39', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(88, 'U.39', NULL, NULL, NULL, 'cot masuk protector', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(89, 'U.39', NULL, NULL, NULL, 'un taping ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(90, 'U.105', NULL, 'CONN 7283-8821-30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(91, 'U.105', NULL, 'VO-B D8X9 L=220', NULL, 'spot menurun pangkal dg VTA FR B W=19, spot di atas VO dg VTAC W, W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(92, 'U.105', NULL, NULL, NULL, 'Vo masuk prot ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(93, 'U.105', NULL, NULL, NULL, 'untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(94, 'DU.105', NULL, 'Prot 7276-0617-3W', NULL, 'Spot tepat base prot du.810 , full taping menurun base prot sampai trunk DU.405 sesuai initial dekat COT L=145', NULL, 'Spot tepat  prot U.105 di tekuk', NULL, '', '', '', '', '', '', '', ''),
(95, 'DU.105', NULL, NULL, NULL, 'Spot gabung du.810 dengan U.39 dengan VTA-FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(96, 'DU.105', NULL, 'Cover prot 7176-0196-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(97, 'DU.105', NULL, 'COT F B D22,1X27 L=145', NULL, 'Spiral taping didalam COT, Spot menurun ujung, Spot tepat pangkal', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(98, 'DU.105', NULL, 'CLIP 7047 0231 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(99, 'U.519', NULL, 'conn 7283 4578', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(100, 'U.509', NULL, 'conn 7287 1915', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(101, 'U.510', NULL, 'conn 7283 4854 40', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(102, 'U.511', NULL, 'A/B 7C87 7079 70', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(103, 'du.511', NULL, NULL, NULL, 'Spot gabung U.510 dan U.511 dengan  VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(104, 'du.511', NULL, 'VS04T3 - B W100 L=290', NULL, 'Dilipat, spot menurun kedua ujung dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(105, 'du.511', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(106, 'U.625', NULL, 'conn 7009-2283 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(107, 'U.710', NULL, 'conn 7009-2289 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(108, 'U.353', NULL, 'conn 7289 3342 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(109, 'U.353', NULL, 'docking dengan 7288 3338 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(110, 'DU.353', NULL, NULL, NULL, 'Spot gabung U.353 dengan trunk dengan VTA070 B W=19 N=8 lilitan', NULL, NULL, 'Tieback', '', '', '', '', '', '', '', ''),
(111, 'DU.353', NULL, NULL, NULL, 'cross taping tidak mutlak du.353 dg VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(112, 'DU.353', NULL, 'VS04T3 - B W100 L=140', NULL, 'Dilipat,spot menurun kedua ujung dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(113, 'DU.353', NULL, '7047 3846', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(114, 'U.520', NULL, '7287-1915 40', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(115, 'U.520', NULL, 'VS04T3 - B W70 L=85', NULL, 'Dilipat, spot menurun pangkal dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(116, 'U.514', NULL, 'conn 7283-4675', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(117, 'U.514', NULL, 'VS04T3 - B W70 L=100', 'VS04T3-B W=50 L=70', 'Dilipat, spot menurun pangkal dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(118, 'U.92', NULL, 'conn 7283-0391 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(119, 'U.92', NULL, 'VS04T3 - B W70 L=100', NULL, 'Dilipat, spot menurun pangkal dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(120, 'U.113', NULL, 'conn 7283 4204', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(121, 'U.112', NULL, 'conn 7287 4097', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(122, 'DU.112', NULL, NULL, NULL, 'Spot percabangan du.112 dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(123, 'U.110', NULL, 'conn 7189 8974-30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(124, 'U.110', NULL, 'COT F B D 5.1 X 7.6 L=195', NULL, 'Spot tepat ujung menurun pangkal ,full tap diatas COT dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(125, 'U.110', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(126, 'U.13', NULL, 'CONN 7283-7699-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(127, 'U.13', NULL, 'Cover conn 7174-1284 30', NULL, 'COT masuk conn', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(128, 'U.13', NULL, 'Cover conn 7174-1283 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(129, 'U.13', NULL, 'COT-F-B D7,4X10,2 L=200', NULL, 'Spiral taping didalam COT, Spot menurun pangkal, spot diatas COT dg VTA070-B, W=19', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(130, 'U.111', NULL, 'conn 7287 3903 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(131, 'U.111', NULL, 'VS04T3 - B W70 L=40', NULL, 'Dilipat spot menurun pangkal dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(132, 'Du.111', NULL, 'VS04T3 - B W70 L=95', NULL, 'Dilipat spot menurun kedua ujung dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(133, 'Du.111', NULL, '7047-7787', NULL, 'pasang gabung U.111 dengan trunk Du.110 (VS04YK L=95)', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(134, 'Du.111', NULL, NULL, NULL, 'cross taping tidak mutlak du.520 dengan VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(135, 'Du.111', NULL, NULL, NULL, 'Full taping trunk dg VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(136, 'Du.520', NULL, '7035-7499-30', NULL, 'spot menurun kedua ujung gromet', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(137, 'Du.520', NULL, NULL, NULL, 'Full taping masuk protector didalam gromet', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(138, 'Du.520', NULL, '7047-3509-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(139, 'Du.520', NULL, NULL, NULL, 'Untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(140, 'U.101', NULL, 'CONN 7289-6235-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(141, 'U.101', NULL, '7274-1158 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(142, 'U.101', NULL, '7047-7539-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(143, 'U.101', NULL, 'TWISTH B16 L=155 (7139 5608 30)', NULL, 'Spot menurun kedua ujung, spot diatas twisth', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(144, 'U.101', NULL, 'CLIP 7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(145, 'U.101', NULL, NULL, NULL, 'full taping sesuai initial sampai percabangan', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(146, 'U.101', NULL, '7047-3509-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(147, 'U.405', NULL, 'Bonder 7409 9915 (BE)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(148, 'DU.101', 'Siage', 'Prot 7276 0615 3W', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(149, 'DU.101', 'Siage', 'Cover prot 7176 0190 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(150, 'DU.101', NULL, 'VS04T3 - B W150 L=190', NULL, 'dilipat, spot tepat ujung spot di atas 1 area', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(151, 'DU.101', NULL, NULL, NULL, 'VS masuk prot', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(152, 'DU.101', NULL, NULL, NULL, 'untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(153, 'U.102', NULL, 'CONN 7289-7976-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(154, 'U.102', NULL, 'VS04T3 - B W100 L=100', NULL, 'Dilipat, spot menurun ujung, Spot tepat pangkal', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(155, 'U.102', NULL, '7047-7539-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(156, 'U.102', NULL, 'CVOH 12 L=45 (7139-6329-30)', NULL, 'Full taping diatas CVOH spot menurun kedua ujung ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(157, 'U.102', NULL, 'CLIP 7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(158, 'U.102', NULL, 'INSULOCK 7047-3509-30', NULL, 'Spot dibawah clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(159, 'DU.102', NULL, 'PROTECTOR 7276-0191-3W', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(160, 'DU.102', NULL, 'COVER 7176-0192-30', NULL, 'spot tepat 2 base prot', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(161, 'DU.102', NULL, 'VS04T3 - B W150 L=140', NULL, 'Dilipat, spot menurun pangkal', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(162, 'DU.102', NULL, NULL, NULL, 'untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(163, 'U.439', NULL, 'Bonder 7409 9915 (W-B)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(164, 'U.438', NULL, 'Bonder 7409 9915 (LG-G)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(165, 'U.516', NULL, 'CONN 7283-4578-90', NULL, 'Spot center dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(166, 'U.506', NULL, 'CONN 7289-4104-40', NULL, 'Spot dress conn dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(167, 'U.507', NULL, 'CONN 7283-3011', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(168, 'DU.507', NULL, 'VS04T3 - B W100 L=330', NULL, 'Dilipat, spot menurun kedua ujung dg VTA070, spot dalam VS 1 area dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(169, 'DU.507', NULL, 'CLIP 7047-3982-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(170, 'DU.507', NULL, 'CLIP 7047-3846', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(171, 'U.16', NULL, 'CONN 7283-3032-90', '7283-3032-30', 'Full tap sesuai initial dengan VTA070 B W=19', NULL, NULL, 'DRESS CONN', '', '', '', '', '', '', '', ''),
(172, 'U.16', NULL, 'VS04T3 - B W70 L=305', NULL, 'Dilipat, spot menurun pangkal dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(173, 'U.16', NULL, '7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(174, 'U.253', NULL, 'CONN 7187-2998', NULL, NULL, NULL, NULL, 'DRESS CONN', '', '', '', '', '', '', '', ''),
(175, 'U.253', NULL, NULL, NULL, 'Spot gabung U.16 dg 253 dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(176, 'U.115', NULL, 'CONN 7289-5794-80', NULL, 'Spot dress, spot center, spot pangkal dg VTA070 ', NULL, NULL, 'DRESS CONN', '', '', '', '', '', '', '', ''),
(177, 'U.508', NULL, 'CONN 7189-3033', NULL, 'Un taping', NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(178, 'U.508', NULL, 'VS04T3 - B W70 L=135', NULL, 'Dilipat, spot menurun pangkal dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(179, 'U.251', NULL, 'CONN 7283-3011', NULL, 'Untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(180, 'U.251', NULL, 'VS04T3 - B W50 L=65', NULL, 'Dilipat, spot menurun pangkal dg VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(181, 'U.702', NULL, 'CONN 7287-8820', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(182, 'U.703', NULL, 'CONN 7287-8821', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(183, 'U.703', NULL, 'VS04T3 - B W=70 L=65', NULL, 'Dilipat, spot menurun pangkal dg VTA0070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(184, 'U.250', NULL, '7173-2374 30', NULL, 'Docking dengan u.701 & U.702', NULL, NULL, 'Lever', '', '', '', '', '', '', '', ''),
(185, 'DU.703', NULL, NULL, NULL, 'spiral taping ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(186, 'U.615', NULL, 'CONN 7009-2281-02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(187, 'U.705', NULL, 'CONN 7009-2288-02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(188, 'U.512', NULL, 'CONN 7283-4578', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(189, 'U.512', NULL, 'VS04T3 - B W70 L=90', NULL, 'dilipat, spot menurun pangkal dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(190, 'U.513', NULL, 'CONN 7287-1915-90', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(191, 'U.513', NULL, 'VS04T3 - B W70 L=125', NULL, 'dilipat, spot menurun pangkal dg VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(192, 'U.513', NULL, NULL, NULL, 'Spot gabung U.512 & 513 dg VTAC Gy W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(193, 'U.515', NULL, 'CONN 7289-3033', NULL, 'Spot branch dg VTAC Gy W=19', NULL, NULL, 'HLC', '', '', '', '', '', '', '', ''),
(194, 'DU.515', NULL, NULL, NULL, 'Cross tap tidak mutlak DU.515 dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(195, 'DU.515', NULL, NULL, NULL, 'Spiral tap trunk dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(196, 'DU.515', NULL, NULL, NULL, 'Spot sesuai initial diatas spiral DU.515 dg VTAC Gy W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(197, 'DU.515', NULL, NULL, NULL, 'Spot gabung U.515 trunk, U.512 dan 513 +Trunk du.512 dg VTA070', 'Full taping gabung trunk dengan DU.512,U.515 dengan VTA-070-B W=19', NULL, NULL, '', '', '', '', '', '', '', ''),
(198, 'U.352', NULL, 'CONN 7289-3342-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(199, 'U.352', NULL, '7288-3338-30', NULL, 'Spot gabung U.351 dengan trunk 12  lilitan', NULL, NULL, 'jumper', '', '', '', '', '', '', '', ''),
(200, 'U.351', NULL, 'CONN 7289-3342', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(201, 'U.351', NULL, '7288-3332-30', NULL, 'Spot gabung U.352 dengan trunk 12  lilitan', NULL, NULL, 'jumper', '', '', '', '', '', '', '', ''),
(202, 'U.90', NULL, 'CONN 7283-0391 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(203, 'U.90', NULL, 'VS04T3 - B W50 L=130', NULL, 'dilipat, spot menurun pangkal dg VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(204, 'U.351', NULL, NULL, NULL, 'Cross taping tidak mutlak DU.352 dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(205, 'DU.351', NULL, NULL, NULL, 'Spiral taping Trunk dg VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(206, 'DU.351', NULL, 'JA 7090-1475-80', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(207, 'DU.351', NULL, 'JA 7090-1475-80', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(208, 'DU.351', NULL, 'CLIP 7047-0162', NULL, 'Spot dibawah insulock dg VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(209, 'DU.351', NULL, NULL, NULL, 'spiral taping pada trunk dgn VTA070', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(210, 'DU.351', NULL, 'GR 7035-7498-30', NULL, 'Spot menurun kedua ujung grommet dg VTA070 B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(211, 'DU.351', NULL, NULL, NULL, 'full tap diatas gromet dg AATNV B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(212, 'DU.351', NULL, NULL, NULL, 'Double full taping menurun gromet VTA-FR-B W=19 (akhir) VTAHC-Dgy W=19 (awal)', NULL, NULL, 'Full taping dari atas gromet menuju trunk', '', '', '', '', '', '', '', ''),
(213, 'U.15', NULL, 'CONN 7289-3622-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(214, 'U.15', NULL, 'COT F B D10,7X14,1 L=65', NULL, 'Spot tepat ujung, menurun pangkal, full diatas COT', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(215, 'U.15', NULL, NULL, NULL, 'untaping dalam prot', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(216, 'U.200', NULL, '7282-8125-40', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(217, 'U.361', NULL, '7283-8125-40', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(218, 'U.200', NULL, 'TC 7152-5477', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(219, 'U.200', NULL, 'COT F B D5.1X7.6 L=335', NULL, 'Spot tepat ujung full taping di atas spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(220, 'U.200', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(221, 'U.200', NULL, NULL, NULL, 'untaping dalam prot', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(222, 'U.100', NULL, 'CONN 7287-6986-30', NULL, 'spot dress conn', NULL, NULL, 'DRESS CONN', '', '', '', '', '', '', '', ''),
(223, 'U.100', NULL, 'Cover conn 7274-0215 30', NULL, 'COT masuk Cover', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(224, 'U.100', NULL, 'INSULOCK 7047-7539-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(225, 'U.100', NULL, 'COT F B D10,7X14,1 L=140', NULL, 'spot tepat ujung menurun pangkal, full diatas COT', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(226, 'U.100', NULL, NULL, NULL, 'Untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(227, 'DU.100', NULL, '7047-3509-30', NULL, 'spot gabung percabangan DU.100 di bawah insulock', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(228, 'U.401', NULL, '7409-9915 ( R)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(229, 'DU.401', NULL, NULL, NULL, 'Cross taping tidak mutlak DU.401', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(230, 'DU.401', 'Siage', 'PROT 7276-0616-3W', NULL, 'spot 1 sisi prot di atas VS du.102', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(231, 'DU.401', 'Siage', 'COVER 7176-0194-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(232, 'DU.401', 'Siage', 'CLIP 7047-3509-30', 'ssss', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(233, 'DU.401', NULL, 'VS04T3 - B W150 L=100', NULL, 'Dilipat, spot menurun pangkal, spot diatas vs 1 area', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(234, 'DU.401', NULL, 'CLIP 7047-3509-30', NULL, 'Pasang diatas VS diatas spot', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(235, 'U.5', NULL, '7283-7520-30', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(236, 'U.5', NULL, 'COT F B D7,4X10,2 L=105', NULL, 'full tap diatas COT, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(237, 'U.5', NULL, '7047-3982-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(238, 'U.6', NULL, '7283-7520-40', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(239, 'U.6', NULL, 'COT F B D7,4X10,2 L=50', NULL, 'full tap diatas COT, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(240, 'U.6', NULL, NULL, NULL, 'cross taping mutlak du.6', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(241, 'DU.6', NULL, 'COT F B D10,7X14,1 L=260', NULL, 'Full tap diatas COT, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(242, 'DU.6', NULL, '7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(243, 'DU.6', NULL, '7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(244, 'DU.6', NULL, '7047-1773-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(245, 'DU.6', NULL, '7047-3509-30', NULL, 'pasang diatas clip 7047-1773 30', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(246, 'U.9', NULL, 'conn 7283 1023 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(247, 'U.360', NULL, '7282 1023', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(248, 'U.9', NULL, 'COT F B D5.1X7.6 L=65', NULL, 'spot tepat ujung Full taping di atas spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(249, 'DU.9', NULL, NULL, NULL, 'Cross taping mutlak du.9', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(250, 'DU.9', NULL, 'COT F B D10,7X14,1 L=405', NULL, 'full tap diatas COT, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(251, 'DU.9', NULL, 'CLIP 7047-3982-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(252, 'DU.9', NULL, 'CLIP 7047-3982-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(253, 'DU.9', NULL, 'CLIP 7047-3985-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(254, 'U.7', NULL, 'CONN 7287-8452-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(255, 'U.7', NULL, 'COT F B D7,4X10,2 L=585', NULL, 'Spiral taping sesuai initial didalam COT, Full tap diatas COT sesuai initial, spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(256, 'U.7', NULL, '7174-0877 30', NULL, 'Ujung cot masuk prot untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(257, 'U.7', NULL, 'CLIP 7047-3982-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(258, 'U.7', NULL, 'CLIP 7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(259, 'U.7', NULL, 'CLIP 7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(260, 'U.7', NULL, 'CLIP 7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(261, 'U.7', NULL, NULL, NULL, 'Untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(262, 'U.612', NULL, '7009-2283-02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(263, 'U.611', NULL, 'CONN 7189-2978-30', NULL, 'docking 7388-2978-30', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(264, 'du 611', NULL, 'COT F B D10,7X14,1 L=115', NULL, 'Spiral taping sesuai initial didalam COT, Spot menurun kedua ujung, Full tap diatas cot sesuai initial ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(265, 'du 611', NULL, 'CLIP 7047-3985-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(266, 'du 611', NULL, NULL, NULL, 'spot gabung DU.611 dg U.7 disamping clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(267, 'du 611', NULL, NULL, NULL, 'Full taping trunk DU.611', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(268, 'du 611', NULL, NULL, NULL, 'full tap gabung sesuai initial du.611 dan u.7', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(269, 'U.8', NULL, 'A/B 7C83 8794-70', NULL, 'Ujung cot untaping masuk conn', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(270, 'U.8', NULL, 'COT F B D5,1X7,6  L=150', NULL, 'full taping sesuai initial, spot menurun pangkal', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(271, 'U.8', NULL, NULL, NULL, 'Cross taping tidak mutlak du.8', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(272, 'DU.8', NULL, 'CLIP 7047-2848-30', NULL, 'spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(273, 'DU.8', NULL, NULL, NULL, 'spiral taping sesuai inisial', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(274, 'DU.8', NULL, NULL, NULL, 'spot gabung U.8 dg du.611', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(275, 'DU.8', NULL, 'CVO B D10X11 L=70', NULL, 'spiral tap diatas cvo, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(276, 'DU.8', NULL, NULL, NULL, 'cross tap tidak mutlak du.8', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(277, 'DU.8', NULL, NULL, NULL, 'full tap trunk', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(278, 'DU.8', NULL, 'INSULOCK 7047-3509-30', NULL, 'full tap trunk masuk prot', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(279, 'DU.8', NULL, 'Prot  7276-0207-3W', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(280, 'DU.8', NULL, 'Cover prot 7176-0208-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(281, 'DU.8', NULL, 'INSULOCK 7047-3509-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(282, 'du.8', NULL, 'COT F B D13,2X17,5 L=135', NULL, 'Untaping didalam COT, spiral tap diatas COT, spot menurun kedua ujung', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(283, 'U.707', 'BT', '7187-1237', NULL, NULL, NULL, NULL, 'HLC ', '', '', '', '', '', '', '', ''),
(284, 'U.708', 'BT', '7187-1769', NULL, NULL, NULL, NULL, 'HLC ', '', '', '', '', '', '', '', ''),
(285, 'U.602', 'BT', '7009 2137 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(286, 'U.602', 'BT', 'VO-B D8X9 L=200', NULL, 'Spot menurun ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(287, 'U.603', 'BT', '7009 2137 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(288, 'U.603', 'BT', 'VO-B D10X11 L=200', NULL, 'Spot menurun ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(289, 'U.601', 'BT', '7009 2137 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(290, 'U.601', 'BT', 'VO-B D10X11 L=200', NULL, 'Spot menurun ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(291, 'U.709', 'BT', '7009 1786 02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(292, 'U.709', 'BT', 'VO-B D8X9 L=200', NULL, 'Spot menurun ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(293, 'U.562', 'BT', '7327-6627-3W', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(294, 'DU.603', 'BT', 'PROT 7176-0205-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(295, 'DU.603', 'BT', 'Cover prot 7176-0206-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(296, 'DU.603', 'BT', 'INSULOCK 7047-3509-30', NULL, 'full taping dibawah insulock', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(297, 'DU.603', 'BT', NULL, NULL, 'full tap sesuai initial', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(298, 'DU.603', 'BT', 'COT F B, D19,5X23,8 L=40', NULL, 'full tap diatas COT, spot menurun kedua ujung ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(299, 'DU.603', 'BT', NULL, NULL, 'full taping pada trunk sesuai initial du.602', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(300, 'DU.603', NULL, NULL, NULL, 'full tap gabung du.707 dg trunk', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(301, 'DU.603', NULL, '7047-3509-30', NULL, 'full tap gabung du.707 dg trunk', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(302, 'DU.603', NULL, NULL, NULL, 'Untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(303, 'U.802', NULL, '7254-0954-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(304, 'U.804', NULL, 'CONN 7171-1474-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(305, 'U.503', NULL, 'CONN 7286-1915', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(306, 'U.811', NULL, 'CONN 7287-4098', NULL, 'Spot center', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(307, 'U.812', NULL, 'CONN 7287-1915', NULL, 'Spot center', NULL, NULL, 'DRESS CONN', '', '', '', '', '', '', '', ''),
(308, 'U.800', NULL, 'conn 7271-1473-30', NULL, NULL, NULL, NULL, 'DRESS CONN', '', '', '', '', '', '', '', ''),
(309, 'U.801', NULL, 'CONN 7254-0955-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(310, 'U.417', NULL, 'BONDER 7409-9915 (B)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(311, 'U.413', NULL, 'BONDER 7409-9915 (W/B)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(312, 'U.420', NULL, 'BONDER 7409-9915 (L)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(313, 'U.412', NULL, 'BONDER 7409-9915 (W/B)', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(314, 'DU.412', NULL, NULL, NULL, 'spot kanan dan kiri percabangan DU.413', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(315, 'U.501', NULL, 'CONN 7286-3885-40', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(316, 'U.502', NULL, '7282-4578-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(317, 'DU.502', NULL, NULL, NULL, 'untaping', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(318, 'DU.502', NULL, 'COT F B D15,2X19 ,5 L=120', NULL, 'Full taping didalam COT, Spot menurun ujung, Full taping diatas COT, Spot menurun pangkal denga VTA-FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(319, 'DU.502', NULL, 'INSULOCK 7047-3509-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(320, 'U.704', NULL, '7009-2287-02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(321, 'U.610', NULL, '7009-2281-02', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(322, 'du 610', NULL, 'COT F B D10,7X14,1 L=65', NULL, 'full taping spot tepat ujung, menurun pangkal ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(323, 'U.18', NULL, 'conn 7283-4372 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(324, 'U.18', NULL, 'TC 7152-5477', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(325, 'U.18', NULL, 'CVO-B D6X7 L=815', NULL, 'Spot tepat ujung,full taping diatas CVO,spot menurun pangkal dengan VTA-FR-B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(326, 'U.18', NULL, '7047-2848 30', NULL, 'spot 2 base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(327, 'U.18', NULL, 'CVOH9 L=50 (7138-4345)', NULL, 'Spot menurun ujung,full taping diatas CVOH,spot menurun pangkal dengan VTA-FR-B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(328, 'U.18', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(329, 'U.700', NULL, 'conn 7282 9762 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(330, 'U.700', NULL, 'CVO B D6X8 L=815', NULL, 'Spot tepat ujung, Full taping diatas CVO, Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(331, 'U.700', NULL, 'CVOH-9 L=50 (7138-4345)', NULL, 'Spot menurun ujung, Full taping di atas CVOH, Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(332, 'U.700', NULL, '7047 2848 30', NULL, 'spot 2 base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(333, 'U.700', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(334, 'U.77', NULL, 'conn 7283 7699 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(335, 'U.77', NULL, 'COT F B D5.1X7.6 L=585', NULL, 'Spot tepat ujung, full taping diatas, spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(336, 'U.77', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(337, 'U.77', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(338, 'U.77', NULL, '7047 2848 30', NULL, 'spot 2 base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(339, 'U.550', NULL, 'conn 7282 4372 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(340, 'U.550', NULL, 'COT F B D5.1X7.6 L=215', NULL, 'Spot menurun kedua ujung full taping di atas dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(341, 'DU.550', NULL, 'COT F B D7.4X10.2 L=450', NULL, 'untaping didalam COT, Spot menurun kedua ujung full taping di atas COT dengan VTA FR B W=19', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(342, 'DU.550', NULL, NULL, NULL, 'spiral taping di atas COT L=450 dari initial sampai pangkal COT', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(343, 'DU.550', NULL, '7052-1506 30', NULL, 'spot tepat kedua base', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(344, NULL, NULL, '7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(345, 'DU.550', NULL, NULL, NULL, 'spot gabung U.550 dengan base clip 7052-1506 30', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(346, 'U.4', NULL, 'conn 7283 4679 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(347, 'U.4', NULL, 'COT F B D5.1X7.4 L=280', NULL, 'Spot menurun kedua ujung full taping di atas dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(348, 'U.4', NULL, '7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(349, 'U.2', NULL, 'CONN 7283-4774-30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(350, 'U.2', NULL, 'COT F B D5,1X7,6 L=155', NULL, 'full tap diatas COT, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(351, 'U.3', NULL, 'CONN 7223-5016-30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(352, 'U.3', NULL, 'VO B D8X9 L=65', NULL, 'spot menurun pangkal VO ', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(353, 'du 3', NULL, NULL, NULL, 'cross taping tidak mutlak DU.3', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(354, 'DU.3', NULL, NULL, NULL, 'full taping branch DU.3', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(355, 'DU.3', NULL, '7052-1506-30', NULL, 'spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(356, 'DU.3', NULL, 'COT F B D7,4X10,2 L=355', NULL, 'full taping diatas COT, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(357, 'DU.3', NULL, 'CLIP 7047-2848-30', NULL, 'spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(358, 'U.14', NULL, 'conn 7283 8679 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(359, 'U.14', NULL, 'COT F B D5.1X7.6 L=425', NULL, 'Spot tepat ujung full taping di atas spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(360, 'U.14', NULL, '7052 7335 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(361, 'U.14', NULL, '7047 2745', NULL, 'spot 1 base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(362, 'U.86', NULL, 'conn 7287 2652 30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(363, 'U.86', NULL, 'COT F B D5.1X7.6 L=315', NULL, 'Spot tepat ujung,Full taping di atas, spot menurun pangkal', NULL, 'Spot awal ujung pada branch', NULL, '', '', '', '', '', '', '', ''),
(364, 'U.86', NULL, '7047 2745', NULL, 'spot 1 base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(365, 'U.86', NULL, '7047-2745', NULL, 'Spot gabung U.14 dan U.86 pada base Clip 7047-2745 dengan VTA FR B W=19', 'Pasang gabung U.14 dan U.86 (spot 1 base clip)', NULL, NULL, '', '', '', '', '', '', '', ''),
(366, 'U.21', NULL, '7289-2587-40', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(367, 'U.21', NULL, 'COT-F-B D7.4X10.2 L=325', NULL, 'Spot menurun ujung, Full taping diatas COT, Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(368, 'U.21', NULL, '7047-3509-30', NULL, 'Spot taping di bawah insulock dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(369, 'U.30', NULL, '7289-9679-30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(370, 'U.30', NULL, 'COT-F B D5.1X7.6 L=355', NULL, 'Spiral taping didalam COT sesuai  initial,spot tepat ujung,full taping diatas COT sesuai initial,spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(371, 'U.30', NULL, '7247-9626', NULL, 'Spot 1 base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(372, 'U.38', NULL, 'CONN 7283-8852 30', NULL, NULL, NULL, NULL, 'Y=15', '', '', '', '', '', '', '', ''),
(373, 'U.38', NULL, 'COT F B D5,1X7,6 L=160', NULL, 'Spiral taping didalam COT, spot tepat ujung, spot menurun pangkal', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(374, 'U.32', NULL, 'CONN 7283-0393-40', NULL, NULL, NULL, NULL, 'Y=20', '', '', '', '', '', '', '', ''),
(375, 'U.32', NULL, 'COT F B D7,4X10,2 L=55', NULL, 'Spiral taping  didalam COT, spot tepat ujung, spot menurun pangkal', NULL, NULL, 'PD17N-02-336', '', '', '', '', '', '', '', ''),
(376, 'DU.32', NULL, NULL, NULL, 'Full taping trunk', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(377, 'DU.32', NULL, NULL, NULL, 'Spot percabangan DU.32 dengan VTAC-Gy W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(378, 'DU.32', NULL, 'COT F B D7,4X10,2 L=415', NULL, 'Spot tepat ujung, Full taping di atas COT, Spot menurun pangkal dengan VTA FR B W=19', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(379, 'DU.32', NULL, NULL, NULL, 'Spot gabung DU.32 dengan trunk', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(380, 'DU.32', NULL, 'INSULOCK 7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(381, 'DU.32', NULL, NULL, NULL, 'cross taping mutlak DU.32', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(382, 'DU.32', NULL, 'CLIP 7047-2848-30', NULL, 'spot kedua base clip', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(383, 'DU.32', NULL, 'COT F B D10,7X14,1 L=305', NULL, 'full tap diatas COT, spot menurun kedua ujung', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(384, 'du.32', NULL, '7146-8650', NULL, 'spot N/P 1 sisi', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(385, 'DU.32', NULL, 'CLIP 7052-7335-30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(386, 'DU.32', NULL, NULL, NULL, 'cross tap  mutlak du.610', NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(387, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(388, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(389, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(390, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(391, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(392, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(393, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(394, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(395, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(396, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(397, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(398, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(399, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(401, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '');
INSERT INTO `taping_henkaten` (`no`, `ujung`, `no_mat`, `mat_old`, `mat_new`, `method_old`, `method_new`, `critical`, `remarks`, `82111-F2L10`, `82111-F2T40`, `82111-F2T50`, `82111-F2L20`, `82115-F2030`, `82115-F2810`, `82115-F2800`, `82115-F2740`) VALUES
(402, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(403, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(404, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(405, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(406, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(407, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(408, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(409, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(410, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(411, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(412, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(413, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(414, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(415, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(416, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(417, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(418, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(419, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(420, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(421, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(422, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(423, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(424, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(425, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(426, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(427, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(428, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(429, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(430, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(431, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(432, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(433, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(434, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(435, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(436, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(437, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(438, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(439, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(440, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(441, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(442, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(443, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(444, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(445, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(446, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(447, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(448, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(449, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(450, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(451, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(452, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(453, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(454, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(455, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(456, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(457, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(458, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(459, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(460, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(461, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(462, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(463, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(464, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(465, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(466, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(467, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(468, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(470, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(471, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(472, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(473, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(474, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(475, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(476, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(477, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(478, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(481, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(482, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(483, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(484, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(485, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(487, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(488, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(490, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(491, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(492, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(493, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(494, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(495, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(496, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(497, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(498, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(499, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(501, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(502, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(503, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(504, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(505, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(506, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(507, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(508, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(509, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(510, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(513, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(514, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(516, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(517, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(518, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(519, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(522, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(523, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(524, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(525, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(526, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(527, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(528, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(529, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(530, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(531, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(532, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(533, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(534, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(535, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(536, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(537, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(538, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(539, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(540, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(541, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(542, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(543, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(544, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(545, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(546, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(547, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', ''),
(548, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `taping_intensitas`
--

CREATE TABLE `taping_intensitas` (
  `idt_intensitas` int(11) NOT NULL,
  `jumlah_intensitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_intensitas`
--

INSERT INTO `taping_intensitas` (`idt_intensitas`, `jumlah_intensitas`) VALUES
(1, '1'),
(2, '1 (dikalikan sesuai jml proses)');

-- --------------------------------------------------------

--
-- Table structure for table `taping_length`
--

CREATE TABLE `taping_length` (
  `idt_length` int(11) NOT NULL,
  `awal_length` int(11) DEFAULT NULL,
  `akhir_length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_length`
--

INSERT INTO `taping_length` (`idt_length`, `awal_length`, `akhir_length`) VALUES
(1, 1, 50),
(2, 51, 100),
(3, 101, 150),
(4, 151, 200),
(5, 201, 250),
(6, 251, 300),
(7, 301, 350),
(8, 351, 400),
(9, 401, 450),
(10, 451, 500),
(11, 501, 550),
(12, 551, 600),
(13, 601, 650),
(14, 651, 700),
(15, 701, 750),
(16, 751, 800),
(17, 801, 850),
(18, 851, 900),
(19, 901, 950),
(20, 951, 1000),
(21, 1, 500),
(22, 0, 100),
(23, 1, 10),
(24, 100, 120);

-- --------------------------------------------------------

--
-- Table structure for table `taping_lilitan`
--

CREATE TABLE `taping_lilitan` (
  `idt_lilitan` int(11) NOT NULL,
  `jumlah_lilitan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_lilitan`
--

INSERT INTO `taping_lilitan` (`idt_lilitan`, `jumlah_lilitan`) VALUES
(1, 2),
(2, 0),
(3, 6),
(4, 3),
(5, 5),
(6, 7),
(7, 9),
(8, 11),
(9, 13),
(10, 15),
(11, 17),
(12, 19),
(13, 21),
(14, 23),
(15, 25);

-- --------------------------------------------------------

--
-- Table structure for table `taping_temp`
--

CREATE TABLE `taping_temp` (
  `idt_hapus` int(11) NOT NULL,
  `idt_all` int(11) NOT NULL,
  `t_detail_update` text NOT NULL,
  `t_critical` varchar(225) NOT NULL,
  `t_os` varchar(100) NOT NULL,
  `t_std` varchar(11) NOT NULL,
  `t_grafik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taping_temporary`
--

CREATE TABLE `taping_temporary` (
  `id_tempo` int(11) NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  `critical` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `std_time` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taping_tube`
--

CREATE TABLE `taping_tube` (
  `idt_tube` int(11) NOT NULL,
  `batas_awal` int(11) NOT NULL,
  `batas_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taping_tube`
--

INSERT INTO `taping_tube` (`idt_tube`, `batas_awal`, `batas_akhir`) VALUES
(1, 1, 20),
(2, 1, 10),
(3, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tapping`
--

CREATE TABLE `tapping` (
  `id` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `idd` int(11) NOT NULL,
  `jml_lilitan` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `idl` int(11) NOT NULL,
  `jml_cct` int(11) NOT NULL,
  `itensitas` int(11) NOT NULL,
  `vw` enum('0','1') NOT NULL,
  `nvw` enum('0','1') NOT NULL,
  `langkah` enum('0','1') NOT NULL,
  `erm` int(11) NOT NULL,
  `inp` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `door` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tapping`
--

INSERT INTO `tapping` (`id`, `ide`, `idd`, `jml_lilitan`, `idt`, `idl`, `jml_cct`, `itensitas`, `vw`, `nvw`, `langkah`, `erm`, `inp`, `floor`, `door`) VALUES
(2, 0, 1, 0, 0, 0, 0, 1, '0', '0', '1', 4, 4, 4, 4),
(3, 4, 5, 0, 0, 0, 0, 1, '0', '1', '0', 2, 2, 2, 2),
(4, 5, 6, 0, 0, 0, 0, 1, '0', '1', '0', 2, 2, 2, 2),
(5, 5, 7, 0, 0, 0, 0, 1, '0', '1', '0', 2, 2, 2, 2),
(6, 8, 8, 0, 0, 9, 0, 1, '1', '0', '0', 6, 6, 6, 6),
(7, 8, 8, 0, 0, 13, 0, 1, '1', '0', '0', 10, 10, 10, 10),
(8, 9, 9, 0, 0, 9, 0, 1, '1', '0', '0', 10, 10, 10, 10),
(9, 17, 21, 0, 1, 14, 0, 1, '1', '0', '0', 5, 5, 5, 5),
(10, 17, 22, 5, 2, 14, 0, 1, '1', '0', '0', 2, 2, 2, 2),
(11, 18, 23, 0, 3, 16, 0, 1, '1', '0', '0', 11, 11, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tapping_assy`
--

CREATE TABLE `tapping_assy` (
  `id_assy` int(11) NOT NULL,
  `kode_assy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tapping_detail`
--

CREATE TABLE `tapping_detail` (
  `id_detail` int(11) NOT NULL,
  `detail_ek` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tapping_detail`
--

INSERT INTO `tapping_detail` (`id_detail`, `detail_ek`) VALUES
(1, 'Melangkah ke jig selanjutnya'),
(5, 'Ambil ( all material ) dengan tangan kanan'),
(6, 'Ambil tape XXXX dari tape holder dengan tangan kanan'),
(7, 'Letakkan tape XXXX ke tape hoder dengan tangan kanan'),
(8, 'Spiral taping  (panjang dimensi, termasuk spot awal dan akhir )'),
(9, 'Full taping  (panjang dimensi, termasuk spot awal dan akhir )'),
(10, 'Cross taping tidak mutlak untuk 3 branch'),
(11, 'Cross taping tidak mutlak untuk 4 branch'),
(12, 'Cross taping tidak mutlak untuk 5 branch'),
(13, 'Cross taping mutlak untuk 3 branch'),
(14, 'Cross taping mutlak untuk 4 branch'),
(15, 'Cross taping mutlak untuk 5 branch'),
(16, 'Ambil  connector pada matting part'),
(17, 'Ambil  connector pada matting part FP'),
(18, 'Letakkan connector pada matting part FP'),
(19, 'Letakkan connector pada matting part'),
(20, 'spot taping'),
(21, 'Pasang COT dengan colgeter'),
(22, 'Spiral taping di atas COT (varian dimensi COT)'),
(23, 'Pasang twisth tube XXXX');

-- --------------------------------------------------------

--
-- Table structure for table `tapping_temp`
--

CREATE TABLE `tapping_temp` (
  `id` int(11) NOT NULL,
  `id_temp` int(11) NOT NULL,
  `detail_update` varchar(225) NOT NULL,
  `std` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tapping_temp`
--

INSERT INTO `tapping_temp` (`id`, `id_temp`, `detail_update`, `std`) VALUES
(1, 1, 'Melangkah ke jig selanjutnya', '4');

-- --------------------------------------------------------

--
-- Table structure for table `temp_assy`
--

CREATE TABLE `temp_assy` (
  `id_assy` int(11) NOT NULL,
  `kode_assy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_assy`
--

INSERT INTO `temp_assy` (`id_assy`, `kode_assy`) VALUES
(1, 'SaI123'),
(2, 'SaI098765');

-- --------------------------------------------------------

--
-- Table structure for table `t_elemen`
--

CREATE TABLE `t_elemen` (
  `id_e` int(11) NOT NULL,
  `elemen` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_elemen`
--

INSERT INTO `t_elemen` (`id_e`, `elemen`) VALUES
(4, 'Ambil material'),
(5, 'tape'),
(6, 'Connector'),
(7, 'spot taping'),
(8, 'Spiral taping  ( VTA 19 )'),
(9, 'Full taping ( VTA 19 )'),
(10, 'Spiral taping  ( VTA 25 )'),
(11, 'Full taping ( VTA 25 )'),
(12, 'Full taping  ( AATN )'),
(13, 'Cross taping tidak mutlak ( VTA 19 )'),
(14, 'Cross taping mutlak (VTA 19)'),
(15, 'Cross taping tidak mutlak ( VTA 25 )'),
(16, 'Cross taping mutlak (VTA 25)'),
(17, 'COT'),
(18, 'Twisth tube');

-- --------------------------------------------------------

--
-- Table structure for table `t_length`
--

CREATE TABLE `t_length` (
  `id_length` int(11) NOT NULL,
  `length1` int(11) NOT NULL DEFAULT '0',
  `length2` int(11) DEFAULT '0',
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_length`
--

INSERT INTO `t_length` (`id_length`, `length1`, `length2`, `ket`) VALUES
(1, 1, 50, 'x'),
(2, 51, 100, 'x'),
(3, 101, 150, 'x'),
(4, 151, 200, 'x'),
(5, 201, 250, 'x'),
(6, 251, 300, 'x'),
(7, 301, 350, 'x'),
(8, 351, 400, 'x'),
(9, 401, 450, 'x'),
(10, 451, 500, 'x'),
(11, 501, 550, 'x'),
(12, 551, 600, 'x'),
(13, 601, 650, 'x'),
(14, 651, 700, 'x'),
(15, 701, 750, 'x'),
(16, 751, 800, 'x'),
(17, 801, 850, 'x'),
(18, 851, 900, 'x'),
(19, 901, 950, 'x'),
(20, 951, 1000, 'x'),
(21, 1, 500, 'x'),
(22, 100, 500, '-'),
(23, 501, 1000, '-'),
(24, 1001, 1500, '-'),
(25, 1501, 2000, '-'),
(26, 1, 400, 'x'),
(27, 401, 800, 'x'),
(28, 1, 100, 'x'),
(29, 101, 200, 'x'),
(30, 301, 400, 'x'),
(31, 401, 500, 'x'),
(32, 501, 600, 'x'),
(33, 601, 700, 'x'),
(34, 701, 800, 'x'),
(36, 0, 0, '100'),
(37, 0, 0, '200'),
(38, 0, 0, '300'),
(39, 0, 0, '400'),
(40, 0, 0, '500'),
(41, 0, 0, '600'),
(42, 0, 0, '700'),
(43, 0, 0, '800'),
(44, 0, 0, '900'),
(45, 0, 0, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `t_tube_size`
--

CREATE TABLE `t_tube_size` (
  `id_tube` int(11) NOT NULL,
  `tube1` int(11) NOT NULL,
  `tube2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tube_size`
--

INSERT INTO `t_tube_size` (`id_tube`, `tube1`, `tube2`) VALUES
(1, 2, 19),
(2, 2, 9),
(3, 12, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `housing`
--
ALTER TABLE `housing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housing_detail`
--
ALTER TABLE `housing_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `housing_syarat1`
--
ALTER TABLE `housing_syarat1`
  ADD PRIMARY KEY (`id_s1`);

--
-- Indexes for table `housing_syarat2`
--
ALTER TABLE `housing_syarat2`
  ADD PRIMARY KEY (`id_s2`);

--
-- Indexes for table `housing_temp`
--
ALTER TABLE `housing_temp`
  ADD PRIMARY KEY (`id_hapus`);

--
-- Indexes for table `h_elemen`
--
ALTER TABLE `h_elemen`
  ADD PRIMARY KEY (`id_e`);

--
-- Indexes for table `h_os`
--
ALTER TABLE `h_os`
  ADD PRIMARY KEY (`id_os`);

--
-- Indexes for table `kop`
--
ALTER TABLE `kop`
  ADD PRIMARY KEY (`id_kop`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_assy`
--
ALTER TABLE `setting_assy`
  ADD PRIMARY KEY (`id_assy`);

--
-- Indexes for table `setting_detail`
--
ALTER TABLE `setting_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `setting_ket`
--
ALTER TABLE `setting_ket`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indexes for table `setting_temp`
--
ALTER TABLE `setting_temp`
  ADD PRIMARY KEY (`id_hapus`);

--
-- Indexes for table `taping_all`
--
ALTER TABLE `taping_all`
  ADD PRIMARY KEY (`idt_all`);

--
-- Indexes for table `taping_assy`
--
ALTER TABLE `taping_assy`
  ADD PRIMARY KEY (`idt_assy`);

--
-- Indexes for table `taping_cct`
--
ALTER TABLE `taping_cct`
  ADD PRIMARY KEY (`idt_cct`);

--
-- Indexes for table `taping_detail`
--
ALTER TABLE `taping_detail`
  ADD PRIMARY KEY (`idt_detail`);

--
-- Indexes for table `taping_elemen`
--
ALTER TABLE `taping_elemen`
  ADD PRIMARY KEY (`idt_elemen`);

--
-- Indexes for table `taping_henkaten`
--
ALTER TABLE `taping_henkaten`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `taping_intensitas`
--
ALTER TABLE `taping_intensitas`
  ADD PRIMARY KEY (`idt_intensitas`);

--
-- Indexes for table `taping_length`
--
ALTER TABLE `taping_length`
  ADD PRIMARY KEY (`idt_length`);

--
-- Indexes for table `taping_lilitan`
--
ALTER TABLE `taping_lilitan`
  ADD PRIMARY KEY (`idt_lilitan`);

--
-- Indexes for table `taping_temp`
--
ALTER TABLE `taping_temp`
  ADD PRIMARY KEY (`idt_hapus`);

--
-- Indexes for table `taping_temporary`
--
ALTER TABLE `taping_temporary`
  ADD PRIMARY KEY (`id_tempo`);

--
-- Indexes for table `taping_tube`
--
ALTER TABLE `taping_tube`
  ADD PRIMARY KEY (`idt_tube`);

--
-- Indexes for table `tapping`
--
ALTER TABLE `tapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tapping_assy`
--
ALTER TABLE `tapping_assy`
  ADD PRIMARY KEY (`id_assy`);

--
-- Indexes for table `tapping_detail`
--
ALTER TABLE `tapping_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tapping_temp`
--
ALTER TABLE `tapping_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_assy`
--
ALTER TABLE `temp_assy`
  ADD PRIMARY KEY (`id_assy`);

--
-- Indexes for table `t_elemen`
--
ALTER TABLE `t_elemen`
  ADD PRIMARY KEY (`id_e`);

--
-- Indexes for table `t_length`
--
ALTER TABLE `t_length`
  ADD PRIMARY KEY (`id_length`);

--
-- Indexes for table `t_tube_size`
--
ALTER TABLE `t_tube_size`
  ADD PRIMARY KEY (`id_tube`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `housing`
--
ALTER TABLE `housing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `housing_detail`
--
ALTER TABLE `housing_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `housing_syarat1`
--
ALTER TABLE `housing_syarat1`
  MODIFY `id_s1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `housing_syarat2`
--
ALTER TABLE `housing_syarat2`
  MODIFY `id_s2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `housing_temp`
--
ALTER TABLE `housing_temp`
  MODIFY `id_hapus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `h_elemen`
--
ALTER TABLE `h_elemen`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `h_os`
--
ALTER TABLE `h_os`
  MODIFY `id_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kop`
--
ALTER TABLE `kop`
  MODIFY `id_kop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `setting_assy`
--
ALTER TABLE `setting_assy`
  MODIFY `id_assy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setting_detail`
--
ALTER TABLE `setting_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `setting_ket`
--
ALTER TABLE `setting_ket`
  MODIFY `id_ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `setting_temp`
--
ALTER TABLE `setting_temp`
  MODIFY `id_hapus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `taping_all`
--
ALTER TABLE `taping_all`
  MODIFY `idt_all` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `taping_assy`
--
ALTER TABLE `taping_assy`
  MODIFY `idt_assy` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taping_cct`
--
ALTER TABLE `taping_cct`
  MODIFY `idt_cct` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taping_detail`
--
ALTER TABLE `taping_detail`
  MODIFY `idt_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `taping_elemen`
--
ALTER TABLE `taping_elemen`
  MODIFY `idt_elemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `taping_henkaten`
--
ALTER TABLE `taping_henkaten`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;
--
-- AUTO_INCREMENT for table `taping_intensitas`
--
ALTER TABLE `taping_intensitas`
  MODIFY `idt_intensitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `taping_length`
--
ALTER TABLE `taping_length`
  MODIFY `idt_length` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `taping_lilitan`
--
ALTER TABLE `taping_lilitan`
  MODIFY `idt_lilitan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `taping_temp`
--
ALTER TABLE `taping_temp`
  MODIFY `idt_hapus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taping_temporary`
--
ALTER TABLE `taping_temporary`
  MODIFY `id_tempo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taping_tube`
--
ALTER TABLE `taping_tube`
  MODIFY `idt_tube` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tapping`
--
ALTER TABLE `tapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tapping_assy`
--
ALTER TABLE `tapping_assy`
  MODIFY `id_assy` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tapping_detail`
--
ALTER TABLE `tapping_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tapping_temp`
--
ALTER TABLE `tapping_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_assy`
--
ALTER TABLE `temp_assy`
  MODIFY `id_assy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_elemen`
--
ALTER TABLE `t_elemen`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `t_length`
--
ALTER TABLE `t_length`
  MODIFY `id_length` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `t_tube_size`
--
ALTER TABLE `t_tube_size`
  MODIFY `id_tube` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
