-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2014 at 11:48 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dirtrlp3k`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_category_product`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dtataruang_news_content_category_product`
--

INSERT INTO `dtataruang_news_content_category_product` (`id`, `value`, `n_status`) VALUES
(1, 'Nasional / Perairan Yuridiksi', 1),
(2, 'Perairan Enclave', 1),
(3, 'Bio Ecoregion', 1),
(4, 'Lintas Kawasan / Provinsi', 1),
(5, ' Regional Marine Planing', 1),
(6, 'Rencana Pengembangan Kawasan Strategis', 1),
(7, 'Provinsi', 1),
(8, 'Kabupaten / Kota', 1),
(9, 'Kabupaten / Kota Rinci', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
