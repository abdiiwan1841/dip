-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2016 at 07:58 
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ujian_admaresi`
--
CREATE DATABASE IF NOT EXISTS `ujian_admaresi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ujian_admaresi`;

-- --------------------------------------------------------

--
-- Table structure for table `admaresi_barang`
--

CREATE TABLE IF NOT EXISTS `admaresi_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `quantity` int(25) NOT NULL,
  `price` text NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admaresi_barang`
--

INSERT INTO `admaresi_barang` (`id_barang`, `barang`, `quantity`, `price`) VALUES
(1, 'tes', 1, '2000000'),
(3, 'Pel', 3, '30000');

-- --------------------------------------------------------

--
-- Table structure for table `admaresi_printer`
--

CREATE TABLE IF NOT EXISTS `admaresi_printer` (
  `id_printer` int(11) NOT NULL AUTO_INCREMENT,
  `printer` text NOT NULL,
  `all` enum('all') NOT NULL DEFAULT 'all',
  PRIMARY KEY (`id_printer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admaresi_printer`
--

INSERT INTO `admaresi_printer` (`id_printer`, `printer`, `all`) VALUES
(9, 'Canon MP250 series Printer', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `admaresi_user`
--

CREATE TABLE IF NOT EXISTS `admaresi_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(35) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `image` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `admaresi_user`
--

INSERT INTO `admaresi_user` (`id_user`, `username`, `password`, `email`, `nama`, `alamat`, `jk`, `image`, `status`) VALUES
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ahmad.uji1902@gmail.com', 'Ahmad Fauzi', 'Depok', 'Laki-laki', 'user-27055108.jpg', 'Aktif'),
(17, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'ahmad.uji19022@gmail.com', 'Ahmad Fauzi', 'Depok', 'Laki-laki', 'user-c84258e9c39059a89ab77d846ddab909-jQuery-debouncing-events.jpg', 'Aktif'),
(18, '', '01171e903065008bf3bf312bec43e5b4', '', '', '', '', '', 'Aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
