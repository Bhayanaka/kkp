-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2014 at 02:08 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

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
-- Table structure for table `code_activity`
--

CREATE TABLE IF NOT EXISTS `code_activity` (
  `id` int(11) NOT NULL,
  `activityId` int(11) NOT NULL COMMENT '1:content;2:norma;3:peraturan;4:produk;5:program;6:sig;7:user',
  `activityValue` varchar(50) NOT NULL,
  `n_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_activity`
--

INSERT INTO `code_activity` (`id`, `activityId`, `activityValue`, `n_status`) VALUES
(1, 1, 'INSERT BERITA', 1),
(2, 1, 'UPDATE BERITA', 1),
(3, 1, 'DELETE BERITA', 1),
(4, 1, 'INSERT AGENDA', 1),
(5, 1, 'UPDATE AGENDA', 1),
(6, 1, 'DELETE AGENDA', 1),
(7, 1, 'INSERT OPINI', 1),
(8, 1, 'UPDATE OPINI', 1),
(9, 1, 'DELETE OPINI', 1),
(10, 1, 'INSERT GALLERY FOTO', 1),
(11, 1, 'UPDATE GALLERY FOTO', 1),
(12, 1, 'DELETE GALLERY FOTO', 1),
(13, 1, 'INSERT GALLERY VIDEO', 1),
(14, 1, 'UPDATE GALLERY VIDEO', 1),
(15, 1, 'DELETE GALLERY VIDEO', 1),
(16, 1, 'INSERT KONTAK', 1),
(17, 1, 'UPDATE KONTAK', 1),
(18, 3, 'INSERT PERATURAN', 1),
(19, 3, 'UPDATE PERATURAN', 1),
(20, 3, 'DELETE PERATURAN', 1),
(21, 4, 'INSERT PRODUK', 1),
(22, 4, 'UPDATE PRODUK', 1),
(23, 4, 'DELETE PRODUK', 1),
(24, 2, 'INSERT NORMA', 1),
(25, 2, 'UPDATE NORMA', 1),
(26, 2, 'DELETE  NORMA', 1),
(27, 5, 'INSERT PROGRAM', 1),
(28, 5, 'UPDATE PROGRAM ', 1),
(29, 5, 'DELETE  PROGRAM ', 1),
(30, 1, 'INSERT VISI MISI', 1),
(31, 1, 'UPDATE VISI MISI', 1),
(32, 1, 'INSERT RENCANA AKSI', 1),
(33, 1, 'UPDATE  RENCANA AKSI', 1),
(34, 1, 'INSERT DATABASE TEMATIK', 1),
(35, 1, 'UPDATE DATABASE TEMATIK', 1),
(36, 1, 'INSERT TARGET DAN CAPAIAN', 1),
(37, 1, 'UPDATE TARGET DAN CAPAIAN', 1),
(38, 1, 'INSERT DOKUMENTASI', 1),
(39, 1, 'UPDATE DOKUMENTASI', 1),
(40, 1, 'INSERT INDEKS PETA TEMATIK', 1),
(41, 1, 'UPDATE INDEKS PETA TEMATIK', 1),
(42, 1, 'DELETE INDEKS PETA TEMATIK ', 1),
(43, 1, 'INSERT DATABASE SPASIAL', 1),
(44, 1, 'UPDATE DATABASE SPASIAL', 1),
(45, 1, 'DELETE DATABASE SPASIAL', 1),
(46, 6, 'INSERT SIG PETA POLA RUANG', 1),
(47, 6, 'UPDATE SIG PETA POLA RUANG', 1),
(48, 6, 'DELETE SIG PETA POLA RUANG', 1),
(49, 6, 'INSERT SIG PETA STRUKTUR RUANG', 1),
(50, 6, 'UPDATE SIG PETA STRUKTUR RUANG', 1),
(51, 6, 'DELETE SIG PETA STRUKTUR RUANG', 1),
(52, 1, 'INSERT SLIDE', 1),
(53, 1, 'UPDATE SLIDE', 1),
(54, 1, 'DELETE SLIDE', 1),
(55, 1, 'INSERT RSS', 1),
(56, 1, 'UPDATE RSS', 1),
(57, 1, 'DELETE RSS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `code_activity_log`
--

CREATE TABLE IF NOT EXISTS `code_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `activityDesc` varchar(250) NOT NULL,
  `source` varchar(20) NOT NULL,
  `datetimes` datetime NOT NULL,
  `n_status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=214 ;

--
-- Dumping data for table `code_activity_log`
--

INSERT INTO `code_activity_log` (`id`, `userid`, `activityId`, `activityDesc`, `source`, `datetimes`, `n_status`) VALUES
(5, 1, 1, '157', '::1', '2014-03-17 18:16:31', 1),
(7, 1, 2, '157', '::1', '2014-03-17 18:17:35', 1),
(8, 1, 1, '158', '::1', '2014-03-17 18:18:39', 1),
(9, 1, 2, '158', '::1', '2014-03-17 18:18:58', 1),
(10, 1, 3, '157', '::1', '2014-03-17 18:23:46', 1),
(11, 1, 4, '160', '::1', '2014-03-17 18:29:03', 1),
(12, 1, 5, '160', '::1', '2014-03-17 18:29:33', 1),
(13, 1, 6, '160', '::1', '2014-03-17 18:30:55', 1),
(16, 1, 7, '165', '::1', '2014-03-17 18:37:04', 1),
(17, 1, 8, '165', '::1', '2014-03-17 18:37:36', 1),
(18, 1, 6, '165', '::1', '2014-03-17 18:38:32', 1),
(19, 1, 10, '166', '::1', '2014-03-17 18:45:32', 1),
(23, 1, 11, '166', '::1', '2014-03-17 18:55:11', 1),
(24, 1, 12, '85', '::1', '2014-03-17 19:04:35', 1),
(25, 1, 13, '167', '::1', '2014-03-17 19:07:43', 1),
(26, 1, 14, '167', '::1', '2014-03-17 19:10:02', 1),
(27, 1, 14, '167', '::1', '2014-03-17 19:11:14', 1),
(28, 1, 15, '167', '::1', '2014-03-17 19:12:54', 1),
(29, 1, 16, '169', '::1', '2014-03-17 19:17:51', 1),
(32, 1, 17, '169', '::1', '2014-03-17 19:19:44', 1),
(33, 1, 18, '62', '::1', '2014-03-18 01:08:12', 1),
(34, 1, 19, '62', '::1', '2014-03-18 01:09:34', 1),
(35, 1, 20, '62', '::1', '2014-03-18 01:11:02', 1),
(36, 1, 21, '34', '::1', '2014-03-18 02:04:14', 1),
(37, 1, 22, '34', '::1', '2014-03-18 02:04:50', 1),
(38, 1, 23, '34', '::1', '2014-03-18 02:07:01', 1),
(39, 1, 18, '62', '::1', '2014-03-18 02:42:57', 1),
(40, 1, 24, '62', '::1', '2014-03-18 02:46:54', 1),
(41, 1, 25, '2', '::1', '2014-03-18 02:49:35', 1),
(42, 1, 25, '2', '::1', '2014-03-18 02:50:02', 1),
(43, 1, 22, '31', '::1', '2014-03-18 02:53:37', 1),
(44, 1, 21, '35', '::1', '2014-03-18 02:54:24', 1),
(45, 1, 22, '35', '::1', '2014-03-18 02:54:45', 1),
(46, 1, 22, '35', '::1', '2014-03-18 02:54:58', 1),
(47, 1, 22, '35', '::1', '2014-03-18 02:55:47', 1),
(48, 1, 24, '3', '::1', '2014-03-18 02:58:28', 1),
(49, 1, 25, '3', '::1', '2014-03-18 02:59:34', 1),
(50, 1, 24, '4', '::1', '2014-03-18 03:18:20', 1),
(51, 1, 27, '2', '::1', '2014-03-18 06:44:16', 1),
(52, 1, 24, '5', '::1', '2014-03-18 07:02:01', 1),
(53, 5, 24, '6', '::1', '2014-03-18 07:02:32', 1),
(54, 1, 28, '2', '::1', '2014-03-18 07:08:33', 1),
(55, 1, 29, '2', '::1', '2014-03-18 07:17:16', 1),
(56, 1, 30, '170', '::1', '2014-03-18 07:47:57', 1),
(57, 1, 31, '170', '::1', '2014-03-18 07:49:16', 1),
(58, 1, 32, '171', '::1', '2014-03-18 07:49:57', 1),
(59, 1, 33, '171', '::1', '2014-03-18 07:51:05', 1),
(60, 1, 34, '172', '::1', '2014-03-18 08:05:13', 1),
(61, 1, 35, '172', '::1', '2014-03-18 08:06:07', 1),
(62, 1, 36, '173', '::1', '2014-03-18 08:07:03', 1),
(63, 1, 37, '173', '::1', '2014-03-18 08:07:39', 1),
(64, 1, 38, '174', '::1', '2014-03-18 08:08:28', 1),
(65, 1, 39, '174', '::1', '2014-03-18 08:09:44', 1),
(66, 1, 40, '175', '::1', '2014-03-18 08:36:08', 1),
(67, 1, 41, '175', '::1', '2014-03-18 08:41:11', 1),
(68, 1, 41, '175', '::1', '2014-03-18 09:04:09', 1),
(69, 1, 41, '175', '::1', '2014-03-18 09:10:56', 1),
(70, 1, 40, '176', '::1', '2014-03-18 09:23:27', 1),
(71, 1, 42, '175', '::1', '2014-03-18 11:02:43', 1),
(72, 1, 43, '177', '::1', '2014-03-18 11:12:08', 1),
(73, 5, 43, '178', '::1', '2014-03-18 11:15:02', 1),
(74, 1, 44, '177', '::1', '2014-03-18 11:15:48', 1),
(75, 1, 44, '178', '::1', '2014-03-18 11:20:18', 1),
(76, 1, 45, '178', '::1', '2014-03-18 11:22:28', 1),
(77, 1, 27, '2', '::1', '2014-03-18 11:43:43', 1),
(78, 1, 47, '2', '::1', '2014-03-18 11:48:28', 1),
(79, 1, 46, '3', '::1', '2014-03-18 11:49:45', 1),
(80, 1, 47, '2', '::1', '2014-03-18 11:49:55', 1),
(81, 1, 47, '3', '::1', '2014-03-18 11:50:24', 1),
(82, 1, 27, '3', '::1', '2014-03-18 16:20:36', 1),
(83, 1, 48, '3', '::1', '2014-03-18 16:41:21', 1),
(84, 1, 48, '3', '::1', '2014-03-18 16:42:23', 1),
(85, 1, 49, '3', '::1', '2014-03-18 16:51:30', 1),
(86, 1, 49, '4', '::1', '2014-03-18 17:07:37', 1),
(87, 1, 50, '4', '::1', '2014-03-18 17:08:47', 1),
(88, 1, 50, '4', '::1', '2014-03-18 17:28:28', 1),
(89, 1, 50, '4', '::1', '2014-03-18 17:29:27', 1),
(90, 1, 50, '4', '::1', '2014-03-18 17:29:50', 1),
(91, 1, 28, '3', '::1', '2014-03-18 17:33:33', 1),
(92, 1, 51, '4', '::1', '2014-03-18 17:44:56', 1),
(93, 1, 52, '179', '::1', '2014-03-18 17:52:52', 1),
(94, 1, 53, '179', '::1', '2014-03-18 17:53:25', 1),
(95, 1, 52, '180', '::1', '2014-03-18 18:11:55', 1),
(96, 1, 54, '180', '::1', '2014-03-18 18:12:31', 1),
(97, 1, 52, '181', '::1', '2014-03-18 18:13:31', 1),
(98, 1, 52, '182', '::1', '2014-03-19 12:38:41', 1),
(99, 1, 53, '181', '::1', '2014-03-19 12:38:52', 1),
(100, 1, 53, '182', '::1', '2014-03-19 12:39:13', 1),
(101, 1, 54, '182', '::1', '2014-03-19 12:49:26', 1),
(102, 1, 54, '181', '::1', '2014-03-19 12:49:29', 1),
(103, 1, 52, '183', '::1', '2014-03-19 12:49:46', 1),
(104, 1, 53, '183', '::1', '2014-03-19 12:49:52', 1),
(105, 1, 53, '183', '::1', '2014-03-19 12:50:06', 1),
(106, 1, 52, '184', '::1', '2014-03-19 12:50:52', 1),
(107, 1, 52, '185', '::1', '2014-03-19 12:51:21', 1),
(108, 1, 52, '186', '::1', '2014-03-19 12:51:38', 1),
(109, 1, 52, '187', '::1', '2014-03-19 12:52:10', 1),
(110, 1, 1, '188', '::1', '2014-03-20 10:35:54', 1),
(111, 1, 1, '188', '::1', '2014-03-20 10:38:55', 1),
(112, 1, 1, '188', '::1', '2014-03-20 10:41:20', 1),
(113, 1, 1, '189', '::1', '2014-03-20 10:43:20', 1),
(114, 1, 1, '190', '::1', '2014-03-20 10:49:57', 1),
(115, 1, 1, '191', '::1', '2014-03-20 10:50:18', 1),
(116, 1, 1, '192', '::1', '2014-03-20 10:50:38', 1),
(117, 1, 1, '193', '::1', '2014-03-20 10:51:07', 1),
(118, 1, 1, '194', '::1', '2014-03-20 10:51:32', 1),
(119, 1, 1, '169', '::1', '2014-03-20 11:14:23', 1),
(120, 1, 1, '169', '::1', '2014-03-20 11:31:26', 1),
(121, 1, 1, '169', '::1', '2014-03-20 11:37:28', 1),
(122, 1, 1, '169', '::1', '2014-03-20 11:44:45', 1),
(123, 1, 1, '169', '::1', '2014-03-20 11:45:09', 1),
(124, 1, 1, '169', '::1', '2014-03-20 12:49:12', 1),
(125, 1, 1, '169', '::1', '2014-03-20 12:55:09', 1),
(126, 1, 1, '169', '::1', '2014-03-20 13:02:37', 1),
(127, 1, 1, '169', '::1', '2014-03-20 13:03:16', 1),
(128, 1, 1, '169', '::1', '2014-03-20 13:03:52', 1),
(129, 1, 1, '63', '::1', '2014-03-20 13:32:31', 1),
(130, 5, 1, '169', '::1', '2014-03-20 13:37:26', 1),
(131, 1, 1, '169', '::1', '2014-03-20 13:43:13', 1),
(132, 1, 17, '169', '::1', '2014-03-20 13:47:32', 1),
(133, 1, 34, '195', '::1', '2014-03-22 04:46:26', 1),
(134, 1, 42, '195', '::1', '2014-03-22 04:48:14', 1),
(135, 1, 42, '176', '::1', '2014-03-22 04:48:18', 1),
(136, 1, 40, '196', '::1', '2014-03-22 04:48:35', 1),
(137, 1, 42, '174', '::1', '2014-03-22 04:48:47', 1),
(138, 1, 34, '197', '::1', '2014-03-22 04:50:00', 1),
(139, 1, 34, '198', '::1', '2014-03-22 04:50:28', 1),
(140, 1, 35, '', '::1', '2014-03-22 04:53:37', 1),
(141, 1, 35, '', '::1', '2014-03-22 04:53:57', 1),
(142, 1, 35, '', '::1', '2014-03-22 04:54:28', 1),
(143, 1, 34, '199', '::1', '2014-03-22 04:55:05', 1),
(144, 1, 35, '', '::1', '2014-03-22 04:55:49', 1),
(145, 1, 42, '199', '::1', '2014-03-22 04:56:38', 1),
(146, 1, 42, '196', '::1', '2014-03-22 04:56:45', 1),
(147, 1, 42, '198', '::1', '2014-03-22 04:56:57', 1),
(148, 1, 42, '197', '::1', '2014-03-22 04:59:47', 1),
(149, 1, 35, '', '::1', '2014-03-22 05:00:17', 1),
(150, 1, 35, '', '::1', '2014-03-22 05:02:24', 1),
(151, 1, 35, '', '::1', '2014-03-22 05:04:05', 1),
(152, 1, 35, '', '::1', '2014-03-22 05:04:57', 1),
(153, 1, 34, '200', '::1', '2014-03-22 05:05:46', 1),
(154, 1, 35, '', '::1', '2014-03-22 05:06:10', 1),
(155, 1, 34, '201', '::1', '2014-03-22 05:07:23', 1),
(156, 1, 35, '', '::1', '2014-03-22 05:07:50', 1),
(157, 1, 35, '', '::1', '2014-03-22 05:09:39', 1),
(158, 1, 35, '', '::1', '2014-03-22 05:09:51', 1),
(159, 1, 35, '', '::1', '2014-03-22 05:10:33', 1),
(160, 1, 35, '', '::1', '2014-03-22 05:11:10', 1),
(161, 1, 35, '', '::1', '2014-03-22 05:12:03', 1),
(162, 1, 35, '', '::1', '2014-03-22 05:13:15', 1),
(163, 1, 35, '', '::1', '2014-03-22 05:13:58', 1),
(164, 1, 35, '201', '::1', '2014-03-22 05:14:44', 1),
(165, 1, 34, '202', '::1', '2014-03-22 05:15:00', 1),
(166, 1, 45, '202', '::1', '2014-03-22 05:17:37', 1),
(167, 1, 35, '', '::1', '2014-03-22 05:18:13', 1),
(168, 1, 34, '203', '::1', '2014-03-22 05:18:31', 1),
(169, 1, 34, '204', '::1', '2014-03-22 05:19:25', 1),
(170, 1, 35, '204', '::1', '2014-03-22 05:19:56', 1),
(171, 1, 35, '204', '::1', '2014-03-22 05:20:14', 1),
(172, 1, 35, '', '::1', '2014-03-22 05:20:37', 1),
(173, 1, 35, '', '::1', '2014-03-22 05:21:15', 1),
(174, 1, 35, '204', '::1', '2014-03-22 05:23:03', 1),
(175, 1, 40, '205', '::1', '2014-03-22 05:23:49', 1),
(176, 1, 43, '206', '::1', '2014-03-22 05:24:03', 1),
(177, 1, 41, '205', '::1', '2014-03-22 07:48:10', 1),
(178, 1, 44, '206', '::1', '2014-03-22 07:48:25', 1),
(179, 1, 35, '204', '::1', '2014-03-23 16:16:51', 1),
(180, 1, 45, '204', '::1', '2014-03-23 16:17:06', 1),
(181, 1, 35, '201', '::1', '2014-03-23 16:25:03', 1),
(182, 1, 35, '200', '::1', '2014-03-23 16:25:23', 1),
(183, 1, 35, '203', '::1', '2014-03-23 16:25:29', 1),
(184, 1, 41, '205', '::1', '2014-03-23 16:38:42', 1),
(185, 1, 40, '207', '::1', '2014-03-23 16:38:57', 1),
(186, 1, 17, '169', '::1', '2014-03-23 16:48:45', 1),
(187, 1, 56, '194', '::1', '2014-03-23 16:49:11', 1),
(188, 1, 56, '190', '::1', '2014-03-23 17:02:30', 1),
(189, 1, 56, '190', '::1', '2014-03-23 17:03:32', 1),
(190, 1, 56, '191', '::1', '2014-03-23 17:03:48', 1),
(191, 1, 56, '192', '::1', '2014-03-23 17:03:55', 1),
(192, 1, 56, '193', '::1', '2014-03-23 17:04:00', 1),
(193, 1, 56, '194', '::1', '2014-03-23 17:04:08', 1),
(194, 1, 2, '169', '::1', '2014-03-24 13:35:07', 1),
(195, 1, 3, '169', '::1', '2014-03-24 13:35:17', 1),
(196, 1, 2, '74', '::1', '2014-03-24 16:35:49', 1),
(197, 1, 2, '75', '::1', '2014-03-24 16:41:57', 1),
(198, 1, 3, '79', '::1', '2014-03-24 16:42:22', 1),
(199, 1, 3, '75', '::1', '2014-03-24 16:42:54', 1),
(200, 1, 3, '74', '::1', '2014-03-24 16:43:28', 1),
(201, 1, 3, '70', '::1', '2014-03-24 17:16:33', 1),
(202, 1, 3, '158', '::1', '2014-03-26 15:43:30', 1),
(203, 1, 5, '77', '::1', '2014-03-26 15:47:30', 1),
(204, 1, 5, '77', '::1', '2014-03-26 15:47:57', 1),
(205, 1, 5, '77', '::1', '2014-03-26 15:49:01', 1),
(206, 1, 5, '77', '::1', '2014-03-26 15:50:46', 1),
(207, 1, 2, '62', '::1', '2014-03-26 15:51:12', 1),
(208, 1, 5, '82', '::1', '2014-03-26 15:52:40', 1),
(209, 1, 5, '82', '::1', '2014-03-26 15:54:24', 1),
(210, 1, 6, '63', '::1', '2014-03-26 15:54:49', 1),
(211, 1, 8, '78', '::1', '2014-03-27 10:30:54', 1),
(212, 1, 8, '78', '::1', '2014-03-27 10:31:19', 1),
(213, 1, 7, '210', '::1', '2014-03-27 10:32:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `code_url_redirect`
--

CREATE TABLE IF NOT EXISTS `code_url_redirect` (
  `id` int(11) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `shortUrl` varchar(100) DEFAULT NULL,
  `friendlyUrl` varchar(300) DEFAULT NULL,
  `datetimes` datetime DEFAULT NULL,
  `n_status` int(1) NOT NULL,
  UNIQUE KEY `shortUrl` (`shortUrl`),
  UNIQUE KEY `friendlyUrl` (`friendlyUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_url_redirect`
--

INSERT INTO `code_url_redirect` (`id`, `articleId`, `shortUrl`, `friendlyUrl`, `datetimes`, `n_status`) VALUES
(1, 1, 'wqdwqaas', 'ada-apa-dengan-kerjaan', '2013-09-30 00:00:00', 1),
(1, 1, 'wqdwqaas1', 'ada-apa-dengan-kerjaan-kantor', '2013-09-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_lokasi`
--

CREATE TABLE IF NOT EXISTS `dtataruang_lokasi` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `kode_lokasi` varchar(50) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtataruang_lokasi`
--

INSERT INTO `dtataruang_lokasi` (`id`, `parent_id`, `kode_lokasi`, `nama_lokasi`) VALUES
(1, 0, '', 'Jawa Barat'),
(2, 0, '', 'Jakarta'),
(35, 1, '', 'Bogor'),
(36, 2, '', 'Senen'),
(37, 2, '', 'Gambir'),
(45, 35, '', 'Bogor_1'),
(46, 36, '', 'Senen_1');

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_menu`
--

CREATE TABLE IF NOT EXISTS `dtataruang_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `brief` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumbnailimage` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articletype` int(11) NOT NULL COMMENT '0:news,1:lowongan',
  `tags` text NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `expiredate` datetime NOT NULL,
  `fromwho` int(11) NOT NULL COMMENT '0:admin;1:operator',
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `dtataruang_news_content`
--

INSERT INTO `dtataruang_news_content` (`id`, `title`, `brief`, `content`, `image`, `thumbnailimage`, `categoryid`, `articletype`, `tags`, `createdate`, `postdate`, `expiredate`, `fromwho`, `authorid`, `n_status`) VALUES
(62, 'berita', '<p>berita</p>', '<p>berita sss</p>', 'berita/1ccd00e12e2cd2bd4d0badde35de9bcb.jpg', '', 4, 1, '', '2014-03-12 03:51:26', '2014-03-12 09:50:20', '0000-00-00 00:00:00', 1, 1, 0),
(63, 'agenda dada', '<p><span style="font-family:arial,helvetica,sans-serif">dsafdsadada adddddddddddddd</span></p>', '<p>Referensi :</p>\r\n\r\n<p>Buku pegangan wajib :</p>\r\n\r\n<ol>\r\n	<li>Anonim, <em>Algoritma &amp; Pemrograman (Seri Diktat Kuliah),</em> Penerbit Gunadarma, Jakarta, 1996</li>\r\n	<li>Suryadi H. S, &amp; Agus Sumin. <em>Pengantar.Algoritma dan pemrograman : Teknik Diagram Alur dan Bahasa Basic Dasar</em>, Penerbit Gunadarma, Jakarta, 1991</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Buku pegangan tambahan :</p>\r\n\r\n<ol>\r\n	<li>Antony Pranata, <em>Algoritma dan Pemrograman</em>, Penerbit J&amp;J Learning, Yogyakarta 2000</li>\r\n	<li>Insap Santoso. P., <em>Turbo Pascal Versi 5.0 dan 5.5</em>, Elexmedia Komputindo</li>\r\n	<li>Jogiyanto H.M., <em>Turbo Pascal</em>, Penerbit Andi Offset, Yogyakarta, 1991</li>\r\n	<li>Rijanto Tosin, <em>Flowchart Untuk Siswa dan Mahasiswa</em>, Penerbit Dinastindo, Jakarta, 1997</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dipersilahkan menggunakan referensi buku lainnya!</p>', 'agenda/43a32f55c3f86f39dc944128752cf9e8.jpg', '', 9, 1, '', '2014-03-12 04:02:10', '2014-03-12 10:01:50', '0000-00-00 00:00:00', 1, 1, 2),
(64, 'opini', 'opini sandankdksa', 'dsadasd', 'opini/ba6125f244496df69b09375b2f40ef75.jpg', '', 5, 1, '', '2014-03-12 04:04:59', '2014-03-12 10:04:40', '0000-00-00 00:00:00', 1, 1, 1),
(66, 'video coba 11', '', '', 'gallery/video/1273f78df87a63959cc6ed5603393e5f.mp4', '', 7, 2, '', '2014-03-12 13:56:12', '2014-03-13 19:50:50', '0000-00-00 00:00:00', 1, 1, 1),
(67, 'coba gallery', '', '', 'gallery/foto/bed990db6064cb44ec689477643792e3.png', 'gallery/foto/bed990db6064cb44ec689477643792e3.png', 6, 2, '', '2014-03-12 14:19:39', '2014-03-12 20:18:40', '0000-00-00 00:00:00', 1, 1, 2),
(69, 'berita 2', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'berita/1ddeee3c6af5a9b9710da368c8421757.jpg', '', 4, 1, '', '2014-03-14 09:04:36', '2014-03-14 15:04:20', '0000-00-00 00:00:00', 1, 1, 1),
(70, 'berita 3', 'bbbbbbbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbb', 'berita/76361d96457b840c968b4b5462983a46.jpg', '', 4, 1, '', '2014-03-14 09:05:17', '2014-03-14 15:04:50', '0000-00-00 00:00:00', 1, 1, 2),
(71, 'sejarah', '', '<p>sejarahhhhhh sss</p>', 'sejarah/87ae8d1f61668986c0f11cd16213b61b.png', '', 1, 1, '', '2014-03-14 15:51:24', '2014-03-20 19:56:20', '0000-00-00 00:00:00', 1, 1, 1),
(72, 'struktur organisasi 1', '', '<p>stuktur organisasi dddd</p>', 'struktur organisasi/cf08e6b85ee751b3960c664a49eb5ea8.jpg', '', 2, 1, '', '2014-03-14 09:56:55', '2014-03-21 15:57:00', '0000-00-00 00:00:00', 1, 1, 1),
(73, 'topoksi', '', 'Tugas Pokok :<br />\r\n<br />\r\nMelaksanakan penyiapan perumusan dan pelaksanaan kebijakan, penyusunan <br />\r\n<br />\r\nnorma, standar, prosedur, dan kriteria, serta pemberian bimbingan teknis, dan <br />\r\n<br />\r\n<p>evaluasi di bidang tata ruang laut, pesisir, dan pulau-pulau kecil.</p>\r\n<p><br />\r\n</p>\r\n1. Menyusun rencana kegiatan Seksi Rencana Tata Ruang Laut Nasional;<br />\r\n<br />2. Menyiapkan bahan konsep perumusan dan pelaksanaan kebijakan, <br />\r\n<br />penyusunan norma, standar, prosedur, dan kriteria di bidang <br />\r\n<br />perencanaan tata ruang laut nasional; <br />\r\n<br />3. Melaksanakan arahan dan disposisi atasan langsung;<br />\r\n<br />4. Menyiapkan bahan pelaksanaan bimbingan teknis dan sosialisasi di <br />\r\n<br />bidang perencanaan tata ruang laut nasional;<br />\r\n<br />5. Menyipakan bahan penyusunan pedoman, juklat dan juknis rencana <br />\r\n<br />tata ruang laut nasional;<br />\r\n<br />6. Menyiapkan bahan koordinasi dengan unit kerja/instansi terkait;<br />\r\n<br />7. Menyiapkan bahan identifikasi wilayah dalam rencana tata ruang laut <br />\r\n<br />nasional;<br />\r\n<br />8. Menyiapkan bahan penyusunan rencana strategis dan mempersiapkan <br />\r\n<br />bahan koordinasi perencanaan skala nasional;<br />\r\n<br />9. Menyiapkan bahan usulan penetapan/pengukuhan kawasan strategis <br />\r\n<br />nasional tertentu dan zonasi nasional;<br />\r\n<br />10. Menyiapkan bahan fasilitasi penyelenggaraan, pendaftaran, pemberian, dan <br />\r\n<br />pencabutan HP3 (Hak Pengusahaan Perairan Pesisir) di KSNT.<br />\r\n<br />11. Menyiapkan bahan fasilitasi dan supervisi kepada pemerintah daerah <br />\r\n<br />untuk pelaksanaan tugas di daerah termasuk kegiatan yang di dukung <br />\r\n<br />oleh anggaran dekonsentrasi dan tugas pembantuan;<br />\r\n<br />12. Menyiapkan bahan fasilitasi dan supervisi kepada pihak ketiga untuk <br />\r\n<br />pekerjaan yang di pihak ketigakan;<br />\r\n<br />13. Menyiapkan bahan monitoring dan evaluasi di bidang perencanaan tata <br />\r\n<br />ruang laut nasional; dan<br />\r\n<br />14.Menyiapkan dan menyusun laporan kegiatan Seksi Rencana Tata <br />\r\n<br />Ruang Laut Nasional.', '', '', 3, 1, '', '2014-03-14 09:59:10', '2014-03-14 15:59:10', '0000-00-00 00:00:00', 1, 1, 1),
(74, 'berita 4', '<p>dsaldlsadlkjakdj</p>', '<p>fdsjfjdslkjflkjlslf</p>', 'berita/f7f6c14137d7102bd52ac5b88ae2cfa8.png', '', 4, 1, '', '2014-03-14 12:13:33', '2014-03-14 18:13:20', '0000-00-00 00:00:00', 1, 1, 2),
(75, 'berita 5', '<!--[if gte mso 9]>\r\n \r\n  \r\n \r\n<![endif]-->\r\n<p>&nbsp;</p>\r\n\r\n<p>&lt;p normal&quot;=&quot;&quot; style=&quot;margin-bottom:0cm;margin-bottom:.0001pt;line-height: 16.8pt;background:white;vertical-align:baseline&quot;&gt;</p>', '', '', '', 4, 1, '', '2014-03-14 12:15:21', '2014-03-14 18:14:50', '0000-00-00 00:00:00', 1, 1, 2),
(76, 'ssss', '', '', 'berita/7e968e7b3a4e1b4ffd926caa673e4022.png', '', 4, 1, '', '2014-03-17 04:18:53', '2014-03-17 10:18:50', '0000-00-00 00:00:00', 1, 1, 2),
(77, 'aaaa', '<p>agenda agenda agenda agenda agenda agenda agenda</p>', '<p>agenda agenda agenda agenda agenda agenda agenda</p>', 'agenda/6a4148701a5ab7d22f5ef0d176801731.jpg', '', 9, 1, '', '2014-03-17 04:23:33', '2014-03-26 21:47:00', '0000-00-00 00:00:00', 1, 1, 0),
(78, 'opini simbada 1', '<p>ssss</p>', '', 'opini/f9a046aac385250ce5ebff6ffde75e76.png', '', 5, 1, '', '2014-03-17 04:26:24', '2014-03-27 16:30:40', '0000-00-00 00:00:00', 1, 1, 1),
(79, 'tes user 1', '', '', '', '', 4, 1, '', '2014-03-17 06:48:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 5, 2),
(80, 'kocakkkk', '', '', '', '', 4, 1, '', '2014-03-17 07:13:38', '2014-03-17 13:13:30', '0000-00-00 00:00:00', 2, 5, 0),
(81, 'operator input', '', '', '', '', 4, 1, '', '2014-03-17 08:04:08', '2014-03-17 14:04:00', '0000-00-00 00:00:00', 3, 6, 0),
(82, 'agenda operator', '', '', '', '', 9, 1, '', '2014-03-17 08:28:12', '2014-03-26 21:54:20', '0000-00-00 00:00:00', 1, 1, 1),
(83, 'publisher opini', '', '', '', '', 5, 1, '', '2014-03-17 08:35:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 5, 0),
(84, 'galery publisher', '', '', 'gallery/foto/feea5041376ef91a63e1b18d3a4c7491.jpg', 'gallery/foto/feea5041376ef91a63e1b18d3a4c7491.jpg', 6, 2, '', '2014-03-17 08:49:26', '2014-03-17 14:49:00', '0000-00-00 00:00:00', 2, 5, 1),
(85, 'galery operator', '', '', 'gallery/foto/c47c827b1e6e88605ced2ae83deaac0b.jpg', 'gallery/foto/c47c827b1e6e88605ced2ae83deaac0b.jpg', 6, 2, '', '2014-03-17 08:50:07', '2014-03-17 14:49:50', '0000-00-00 00:00:00', 3, 6, 2),
(86, 'video publisher', '', '', 'gallery/video/b62229f821df72d2bdbdf638a9c246ac.mp4', '', 7, 2, '', '2014-03-17 08:58:30', '2014-03-17 14:58:10', '0000-00-00 00:00:00', 3, 6, 0),
(87, 'video dsasdadas', '', '', 'gallery/video/8423cb567ad6c98465980893a70eb55a.mp4', '', 7, 2, '', '2014-03-17 08:59:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 5, 0),
(157, 'lalier1', '', '', '', '', 4, 1, '', '2014-03-17 18:16:31', '2014-03-18 00:16:50', '0000-00-00 00:00:00', 1, 1, 2),
(158, 'log sukses 1', '', '', '', '', 4, 1, '', '2014-03-17 18:18:38', '2014-03-18 00:18:30', '0000-00-00 00:00:00', 1, 1, 2),
(160, 'log agenda 11', '', '', '', '', 9, 1, '', '2014-03-17 18:29:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(165, 'log opini update', '', '', '', '', 5, 1, '', '2014-03-17 18:37:03', '2014-03-18 00:37:00', '0000-00-00 00:00:00', 1, 1, 2),
(166, 'foto log a', '', '', 'gallery/foto/da3d1242dc84d1b135f4fa0d447a8a41.png', 'gallery/foto/da3d1242dc84d1b135f4fa0d447a8a41.png', 6, 2, '', '2014-03-17 18:45:31', '2014-03-18 00:45:10', '0000-00-00 00:00:00', 1, 1, 2),
(167, 'tes video log 3', '', '', 'gallery/video/52c8d45bbd67ba184bd0bb0f4614f73a.mp4', '', 7, 2, '', '2014-03-17 19:07:43', '2014-03-18 01:07:30', '0000-00-00 00:00:00', 1, 1, 2),
(169, 'tes', '', '<p>Direktorat Tata Ruang Laut Pesisir dan Pulau-pulau Kecil</p>\r\n\r\n<p>Direktorat Jenderal Kelautan Pesisir dan Pulau-pulau Kecil</p>\r\n\r\n<p>Kementerian Kelautan dan Perikanan</p>', '', '', 8, 1, '', '2014-03-18 01:17:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(170, 'Visi Misi', '', 'visi misi update<br />', 'onemap/d3afb01e9013afa24c6c6a253c52c910.png', '', 10, 4, '', '2014-03-18 07:47:58', '2014-03-19 13:49:00', '0000-00-00 00:00:00', 1, 1, 1),
(171, 'Rencana Aksi', '', 'rencana aksi update<br />', 'onemap/1c3998fe8ca01b98ae301200db52cd19.png', '', 11, 4, '', '2014-03-18 07:50:25', '2014-03-19 13:49:40', '0000-00-00 00:00:00', 1, 1, 1),
(172, 'Database Tematik', '', 'DATABASE TEMATIK EDIT', '', '', 12, 4, '', '2014-03-18 08:05:14', '2014-03-18 14:05:00', '0000-00-00 00:00:00', 1, 1, 1),
(173, 'Target dan Capaian', '', 'TARGET CAPAIAN&nbsp;UPDATE', '', '', 13, 4, '', '2014-03-18 08:07:03', '2014-03-18 14:06:40', '0000-00-00 00:00:00', 1, 1, 1),
(174, 'Dokumentasi', '', 'DOKUMENTASI UPDATE<br />', 'onemap/38015be6ee675d36e8726540d1659fc3.png', '', 14, 4, '', '2014-03-18 08:08:29', '2014-03-18 14:08:00', '0000-00-00 00:00:00', 1, 1, 2),
(175, 'log ipt', 'Nurhadi memulai karier sebagai PNS di MA di tahun 80-an. Dirinya lama \r\nmenjadi Kepala Biro Hukum dan Humas MA sebelum diangkat menjadi \r\nSekretaris MA pada 2012 silam. Nama Nurhadi ramai diperbincangkan saat \r\nhakim agung Djoko Sarwoko menyebut Nurh', '', 'onemap/9620184b3bec99d1a032c4d832964f9d.png', '', 15, 4, '', '2014-03-18 08:35:38', '2014-03-18 14:35:40', '0000-00-00 00:00:00', 1, 1, 2),
(176, 'Armin Van Buuren Tak Larang Anak Jadi DJ', 'Banyak musisi yang menularkan bakat musiknya kepada anaknya. Tapi \r\nsepertinya hal tersebut tak dilakukan oleh Disc Jockey (DJ) ternama \r\nArmin Van Buuren.<br />\r\n<br />Armin justru mengaku tak mau memaksakan \r\nanak-nya untuk menggeluti profesi yang ', '', 'onemap/4f1ac943bbec38b7adab8420e079b29b.jpg', '', 15, 4, '', '2014-03-18 09:22:11', '2014-03-18 15:22:20', '0000-00-00 00:00:00', 1, 1, 2),
(177, 'log databse', '<p>\r\n Armin justru mengaku tak mau memaksakan anak-nya untuk menggeluti \r\nprofesi yang sama dengan dirinya. Tapi jika nantinya anaknya ingin \r\nmengikuti jejaknya, ia pun tak akan melarangnya.dsad</p>', '', 'onemap/15e9dde911a21b309d231ff71d87d46a.jpg', '', 16, 4, '', '2014-03-18 11:11:30', '2014-03-27 17:15:40', '0000-00-00 00:00:00', 1, 1, 1),
(178, 'log operator db', '"Saya tidak akan menghentikan jika mereka ingin menjadi DJ. Saya akan \r\nmendukung dengan pengetahuan yang saya miliki," ucapnya kepada detikHOT \r\nusai tampil di Future Music Festival di Malaysia beberapa waktu lalu.<br />\r\n<br />\r\nDJ asal Belanda itu', '', 'onemap/f22586ef191522ce87b0e57c53d3d9df.jpg', '', 16, 4, '', '2014-03-18 11:14:35', '2014-03-18 17:14:40', '0000-00-00 00:00:00', 2, 5, 2),
(179, 'slide 111', '', '', 'slideshow/08dd0cbe025d552ccc52b6d9bf3b1240.jpg', '', 17, 0, '', '2014-03-18 17:52:32', '2014-03-18 23:52:40', '0000-00-00 00:00:00', 1, 1, 2),
(180, 'slide 1', '', '', 'slideshow/8c08a2c7e7bedc868fd2cdd3ec571590.jpg', '', 17, 0, 'Chrysanthemum.jpg', '2014-03-18 18:11:41', '2014-03-19 00:11:50', '0000-00-00 00:00:00', 1, 1, 2),
(181, 'slide 1', '', '', 'slideshow/0804b4a99039877caf48c59bfbb9c6e7.jpg', '', 17, 0, '', '2014-03-18 18:13:22', '2014-03-19 00:13:20', '0000-00-00 00:00:00', 1, 1, 2),
(182, 'slide 2', '', '', 'slideshow/f2d000d446b30d293ba5779da934b75b.mp4', '', 17, 0, '', '2014-03-19 12:38:16', '2014-03-19 18:38:20', '0000-00-00 00:00:00', 1, 1, 2),
(183, 'slide 1', '', '', 'slideshow/351c9f1008064674948a45205c63fe2b.jpg', '', 17, 0, 'image', '2014-03-19 12:49:32', '2014-03-19 18:49:30', '0000-00-00 00:00:00', 1, 1, 1),
(184, 'slide 2', '', '', 'slideshow/3c48ea3eddbd8808a7c8abf536084e01.jpg', '', 17, 0, 'image', '2014-03-19 12:50:43', '2014-03-19 18:50:40', '0000-00-00 00:00:00', 1, 1, 1),
(185, 'slide 3', '', '', 'slideshow/d7ddfb114e35d14dd79865d41e78b7fd.jpg', '', 17, 0, 'image', '2014-03-19 12:51:07', '2014-03-19 18:51:10', '0000-00-00 00:00:00', 1, 1, 0),
(186, 'slide 4', '', '', 'slideshow/e930034cf5cb5cc5a89992cbe5c9e222.jpg', '', 17, 0, 'image', '2014-03-19 12:51:26', '2014-03-19 18:51:30', '0000-00-00 00:00:00', 1, 1, 0),
(187, 'slide 5', '', '', 'slideshow/97457beb6a20050b7b41cf41df33d0a4.mp4', '', 17, 0, 'video', '2014-03-19 12:51:42', '2014-03-19 18:51:40', '0000-00-00 00:00:00', 1, 1, 0),
(190, 'rss 1', 'www.facebook.com', '', 'rss/6628250d83dda31cbb5069f57e2ee5fb.jpg', '', 18, 0, '', '2014-03-20 10:49:33', '2014-03-20 16:49:40', '0000-00-00 00:00:00', 1, 1, 1),
(191, 'rss 2', 'www.facebook.com', '', 'rss/e47d0f034162ab0c4147b500d05fdc06.jpg', '', 18, 0, '', '2014-03-20 10:50:01', '2014-03-20 16:50:10', '0000-00-00 00:00:00', 1, 1, 1),
(192, 'rss 3', 'www.facebook.com', '', 'rss/87d8534ee43e3619a138798bf14bf346.jpg', '', 18, 0, '', '2014-03-20 10:50:23', '2014-03-20 16:50:30', '0000-00-00 00:00:00', 1, 1, 1),
(193, 'rss 4', 'www.facebook.com', '', 'rss/592a92632ddf9cf5d571516b2508fd39.jpg', '', 18, 0, '', '2014-03-20 10:50:55', '2014-03-20 16:51:00', '0000-00-00 00:00:00', 1, 1, 1),
(194, 'rss 5', 'www.facebook.com', '', 'rss/db3f551b5ff8fdd88ae14935f6d13af6.jpg', '', 18, 0, '', '2014-03-20 10:51:13', '2014-03-20 16:51:20', '0000-00-00 00:00:00', 1, 1, 1),
(195, 'tes', '', '', '', '', 14, 4, '', '2014-03-22 04:38:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(196, 'kocak', '', '', 'onemap/01c6a52bffffb33253d0453a29521a0e.doc', '', 15, 4, '', '2014-03-22 04:48:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(197, 'dasdasd', '', '', '', '', 14, 4, '', '2014-03-22 04:49:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(198, 'kocak', '', '', '', '', 14, 4, '', '2014-03-22 04:50:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(199, 'coba', '', '', '', '', 14, 4, '', '2014-03-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(200, 'db tematik', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '', 'onemap/52f33e5bdc34c8517e01b25e4ce351b9.jpg', '', 14, 4, '', '2014-03-22 05:05:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1),
(201, 'db tematik 22', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '', 'onemap/d71f8f8257126c872daba6bfece2bcce.png', '', 14, 4, '', '2014-03-22 05:07:05', '2014-03-22 11:07:10', '0000-00-00 00:00:00', 1, 1, 1),
(202, 'db tematik 33', '', '', '', '', 14, 4, '', '2014-03-22 05:14:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(203, 'percobaan', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '', 'onemap/11ba49b16908bc40a25d18ec86d311da.png', '', 14, 4, '', '2014-03-22 05:18:18', '2014-03-22 11:18:20', '0000-00-00 00:00:00', 1, 1, 1),
(204, 'percobaan 112', '<p>dsadsada</p>', '', 'onemap/37e0fa0f5f48bd3c8980c8845aee380b.png', '', 14, 4, '', '2014-03-22 05:19:09', '2014-03-22 11:19:50', '0000-00-00 00:00:00', 1, 1, 2),
(205, 'ip', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '', 'onemap/c64010c28c863ab7fa25dddbd1e416b2.png', '', 15, 4, '', '2014-03-22 05:23:41', '2014-03-22 11:23:40', '0000-00-00 00:00:00', 1, 1, 1),
(206, 'db', '', '', 'onemap/ee6cb157469d2807bfe43c9f3c51e86e.jpg', '', 16, 4, '', '2014-03-22 05:23:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0),
(207, 'kocak', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '', 'onemap/40bdfde1136f99fbe3d0ec612d4d0664.jpg', '', 15, 4, '', '2014-03-23 16:38:44', '2014-03-23 22:38:40', '0000-00-00 00:00:00', 1, 1, 1),
(209, 'iman', 'iman@gmail.com', '', '', '', 19, 0, '', '2014-03-24 09:56:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(210, 'contoh opini', '', '', '', '', 5, 1, '', '2014-03-27 10:32:48', '2014-03-27 16:32:40', '0000-00-00 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_category`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `class_function` varchar(250) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dtataruang_news_content_category`
--

INSERT INTO `dtataruang_news_content_category` (`id`, `category`, `value`, `class_function`, `n_status`) VALUES
(1, '1', 'Sejarah', 'profil/sejarah/', 1),
(2, '1', ' Struktur Organisasi', 'profil/struktur_organisasi/', 1),
(3, '1', 'Tupoksi', 'profil/tupoksi/', 1),
(4, '2', 'Berita', 'berita/info_berita_detail/', 1),
(5, '2', 'Opini', 'berita/info_opini_detail/', 1),
(6, '2', 'List Galeri Foto ', 'informasi_terkini/informasi_gallery_detail/', 1),
(7, '2', 'List Galeri video', 'informasi_terkini/informasi_video_detail/', 1),
(9, '3', 'Agenda', 'berita/info_agenda_detail/', 1),
(10, '4', 'Visi Misi', 'one_map/visi_misi/', 1),
(11, '4', 'Rencana Aksi', 'one_map/rencana_aksi/', 1),
(12, '4', 'Target dan Capaian ', 'one_map/target_capaian/ ', 1),
(13, '4', 'Dokumentasi', 'one_map/dokumentasi/', 1),
(14, '4', 'Database Tematik', 'one_map/database_tematik/', 1),
(15, '', 'Indeks Peta Tematik', '', 1),
(16, '', 'Database Spasial', '', 1),
(17, '', 'Slide Show', '', 1),
(18, '', 'RSS ', '', 1),
(19, '', 'Kotak Saran', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_category_product`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `dtataruang_news_content_category_product`
--

INSERT INTO `dtataruang_news_content_category_product` (`id`, `value`, `n_status`) VALUES
(1, 'Zona Ekonomi Ekslusif (ZEE)', 1),
(2, 'Nasional / Perairan Yuridiksi', 1),
(3, 'Perairan Enclave', 1),
(4, 'Bio Ecoregion', 1),
(5, 'Lintas Kawasan / Provinsi', 1),
(6, ' Regional Marine Planing', 1),
(7, 'Rencana Pengembangan Kawasan Strategis', 1),
(8, 'Perairan > 12 Mil', 1),
(9, 'Koridor Laut/ALKI', 1),
(10, 'Kawasan Strategis Nasional (KSN)', 1),
(11, 'KawasanStrategisNasionalTertentu (KSNT) Konservasi', 1),
(12, 'KawasanStrategisNasionalTertentu (KSNT) PPK Terluar', 1),
(13, 'Wilayah Prioritas Pengembangan Ekonomi Nasional', 1),
(14, 'Provinsi', 1),
(15, 'Kabupaten/Kota', 1),
(16, 'Kabupaten / Kota Lambat Tumbuh', 1),
(17, 'Kabupaten Perbatasan', 1),
(18, 'Rinci', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_comment`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `contentid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `n_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `userid` (`userid`),
  KEY `contentid` (`contentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dtataruang_news_content_comment`
--

INSERT INTO `dtataruang_news_content_comment` (`id`, `gid`, `userid`, `parentid`, `contentid`, `comment`, `date`, `n_status`) VALUES
(1, 0, 123, 0, 1, 'test comment', '2013-12-18 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_norma`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_norma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL,
  `brief` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `id_provinsi` varchar(20) NOT NULL,
  `id_kabupaten` varchar(11) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `jml_hal` int(11) NOT NULL,
  `lampiran` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumbnailimage` varchar(100) NOT NULL,
  `files` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articletype` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `fromwho` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dtataruang_news_content_norma`
--

INSERT INTO `dtataruang_news_content_norma` (`id`, `title`, `brief`, `content`, `id_provinsi`, `id_kabupaten`, `kecamatan`, `tahun`, `jml_hal`, `lampiran`, `image`, `thumbnailimage`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(3, 'log norma 11', '', '', '', '', '', 2014, 0, '', '', '', '', 20, 1, '2014-03-18 02:59:04', '0000-00-00 00:00:00', 1, 1, 2),
(4, 'log norma', '', 'tes log norma', '', '', '', 2014, 1, 'peta', 'norma/1c85a6480ac510600b03da04a57a7c3a.jpg', '', '', 20, 1, '2014-03-18 03:17:35', '2014-03-18 09:18:10', 1, 1, 1),
(5, 'werty', '', '', '', '', '', 2014, 0, '', '', '', '', 20, 1, '2014-03-18 07:01:52', '0000-00-00 00:00:00', 1, 1, 0),
(6, 'cacaca', '', '', '', '', '', 2014, 0, '', '', '', '', 20, 1, '2014-03-18 07:02:22', '0000-00-00 00:00:00', 2, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_peraturan`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_peraturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL,
  `nomor` int(11) NOT NULL,
  `deskripsi` varchar(220) NOT NULL,
  `files` varchar(200) NOT NULL,
  `tags` text NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articletype` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `fromwho` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `dtataruang_news_content_peraturan`
--

INSERT INTO `dtataruang_news_content_peraturan` (`id`, `title`, `nomor`, `deskripsi`, `files`, `tags`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(60, 'pp22', 0, 'ssdasddddd ddddd<br />', 'peraturan/0517ffa4df27d75258c3572dcc649b45.doc', 'AK-011225.doc', 1, 2, '2014-03-18 06:56:37', '2014-03-18 06:56:40', 1, 1, 2),
(62, 'tesdddd', 0, 'dsadssada', 'peraturan/be0bb4786c0b87a228659065b14685f9.pdf', 'Dokumentasi_PND.pdf', 1, 3, '2014-03-18 07:07:40', '2014-03-18 07:08:00', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_product`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL,
  `brief` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `id_provinsi` varchar(20) NOT NULL,
  `id_kabupaten` varchar(11) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `jml_hal` int(11) NOT NULL,
  `lampiran` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumbnailimage` varchar(100) NOT NULL,
  `files` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articletype` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `fromwho` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `dtataruang_news_content_product`
--

INSERT INTO `dtataruang_news_content_product` (`id`, `title`, `brief`, `content`, `id_provinsi`, `id_kabupaten`, `kecamatan`, `tahun`, `jml_hal`, `lampiran`, `image`, `thumbnailimage`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(31, 'tes', '', '', '06', '0612', '', 2014, 0, '', 'product/cb2cf23f4c4287f0560333682235b368.png', '', '', 1, 1, '2014-03-18 02:53:12', '0000-00-00 00:00:00', 1, 1, 1),
(32, 'user2', '', '', '06', '0606', '', 2014, 0, '', '', '', '', 2, 1, '2014-03-18 01:54:26', '0000-00-00 00:00:00', 3, 6, 1),
(34, 'tes log 11', '', '', '06', '0606', '', 2014, 0, '', '', '', '', 1, 1, '2014-03-18 02:04:44', '0000-00-00 00:00:00', 1, 1, 2),
(35, 'log produk', '', '', '30', '3003', '', 2014, 0, '', '', '', '', 2, 1, '2014-03-18 02:55:22', '0000-00-00 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_program`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL,
  `brief` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `id_provinsi` varchar(20) NOT NULL,
  `id_kabupaten` varchar(11) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `jml_hal` int(11) NOT NULL,
  `lampiran` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumbnailimage` varchar(100) NOT NULL,
  `files` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articletype` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `fromwho` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dtataruang_news_content_program`
--

INSERT INTO `dtataruang_news_content_program` (`id`, `title`, `brief`, `content`, `id_provinsi`, `id_kabupaten`, `kecamatan`, `tahun`, `jml_hal`, `lampiran`, `image`, `thumbnailimage`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(2, 'log program', '', 'tesssss', '01', '0156', '', 2014, 1, 'peta', '', '', '', 2, 1, '2014-03-18 07:08:23', '2014-03-18 12:43:50', 1, 1, 2),
(3, 'program 1', '', 'sadasdaddddddddddddddsadsadas', '01', '0156', 'aaa', 2014, 1, 'peta', 'program/f208405df80640e31c472b1e9255d87c.jpg', '', '', 1, 2, '2014-03-18 17:33:27', '2014-03-18 22:20:20', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_repo`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_repo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `brief` text NOT NULL,
  `content` text NOT NULL,
  `tags` text NOT NULL,
  `typealbum` int(11) NOT NULL COMMENT '1:song;2:images;3:document',
  `gallerytype` int(11) NOT NULL COMMENT '1:galeryfoto,2:galeryvideo;3:dokumenperencanaan,4:norma,5:program,6:sigpola,7:sigstruktur',
  `files` varchar(200) NOT NULL COMMENT 'can be image or song',
  `thumbnail` varchar(200) DEFAULT NULL,
  `fromwho` int(11) NOT NULL COMMENT '0;admin;1:user;2:pages',
  `otherid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `n_status` int(11) NOT NULL COMMENT '1(unverified)2(verified)3(rejected)4(winnerThisorthat)5(event)6(DYO)',
  PRIMARY KEY (`id`),
  KEY `otherid` (`otherid`),
  KEY `IDX_typeAlbum` (`typealbum`),
  KEY `IDX_Album_ID` (`gallerytype`),
  KEY `IDX_FROM_WHO` (`fromwho`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `dtataruang_news_content_repo`
--

INSERT INTO `dtataruang_news_content_repo` (`id`, `title`, `brief`, `content`, `tags`, `typealbum`, `gallerytype`, `files`, `thumbnail`, `fromwho`, `otherid`, `userid`, `createdate`, `postdate`, `n_status`) VALUES
(94, 'coba gallery', 'ev 1', '', '', 1, 1, 'gallery/foto/034f3ef4fb5e7013b708b871d785735f.png', 'gallery/foto/034f3ef4fb5e7013b708b871d785735f.png', 0, 67, 0, '2014-03-12 14:19:39', '2014-03-12 20:18:40', 2),
(95, 'coba gallery', 'ev 2', '', '', 1, 1, 'gallery/foto/29448f50ba28650fe986591b0ef42952.png', 'gallery/foto/29448f50ba28650fe986591b0ef42952.png', 0, 67, 0, '2014-03-12 14:19:39', '2014-03-12 20:18:40', 2),
(96, 'coba gallery', 'ev 3', '', '', 1, 1, 'gallery/foto/8df75e6f651560695d680da53a2ab5fb.png', 'gallery/foto/8df75e6f651560695d680da53a2ab5fb.png', 0, 67, 0, '2014-03-12 14:19:39', '2014-03-12 20:18:40', 2),
(97, 'aaaaaaaa', '', '', '', 1, 5, 'program/cd3fe924f31b215c544171e9d5a30446.doc', 'Naskah Akademis', 0, 38, 0, '2014-03-14 11:16:41', '0000-00-00 00:00:00', 0),
(98, 'aaaaaaaa', '', '', '', 1, 5, 'program/2c63b975073ab796674fd6c25d4dd9b2.doc', 'Dokumen Final', 0, 38, 0, '2014-03-14 11:16:41', '0000-00-00 00:00:00', 0),
(99, 'galery publisher', '', '', '', 1, 1, 'gallery/foto/273906945e54dbbcc3449a67a31605b0.jpg', 'gallery/foto/273906945e54dbbcc3449a67a31605b0.jpg', 0, 84, 0, '2014-03-17 08:49:26', '2014-03-17 14:49:00', 1),
(100, 'galery operator', '', '', '', 1, 1, 'gallery/foto/2dd10781404c5d265b444ac2d697a5da.jpg', 'gallery/foto/2dd10781404c5d265b444ac2d697a5da.jpg', 0, 85, 0, '2014-03-17 08:50:07', '2014-03-17 14:49:50', 2),
(101, 'foto log a', '', '', '', 1, 1, 'gallery/foto/9f179f6b502db5965f5a6c5aa5235354.png', 'gallery/foto/9f179f6b502db5965f5a6c5aa5235354.png', 0, 166, 0, '2014-03-17 18:45:31', '2014-03-18 00:45:10', 2),
(102, 'foto log a', '', '', '', 1, 1, 'gallery/foto/1bb9905c475b3fdb211f368bff88f822.png', 'gallery/foto/1bb9905c475b3fdb211f368bff88f822.png', 0, 166, 0, '2014-03-17 18:45:31', '2014-03-18 00:45:10', 2),
(103, 'foto log a', '', '', '', 1, 1, 'gallery/foto/12547388d563e2649398474c8f010ac8.png', 'gallery/foto/12547388d563e2649398474c8f010ac8.png', 0, 166, 0, '2014-03-17 18:45:31', '2014-03-18 00:45:10', 2),
(107, 'tes', '', '', 'AK-011326.doc', 0, 3, 'product/4e1b4b490974e5e9975941520038fd1f.doc', 'Naskah Akademis', 1, 30, 0, '2014-03-18 01:45:38', '0000-00-00 00:00:00', 0),
(108, 'tes', '', '', 'AK-011225.doc', 0, 3, 'product/61a0ab4d3dc0e4c654f54140f2ab0d67.doc', 'Dokumen Final', 1, 30, 0, '2014-03-18 01:45:38', '0000-00-00 00:00:00', 0),
(109, 'tes', '', '', 'workflow.docx', 0, 3, 'product/3a8e7a268271192e37783d1bc0a265be.docx', 'Naskah Akademis', 1, 34, 0, '2014-03-18 02:53:12', '0000-00-00 00:00:00', 0),
(110, 'tes', '', '', 'IT-000038.rtf', 0, 3, 'product/19cd29ce9f24f0b2502294cd1e89c69d.rtf', 'Dokumen Final', 1, 34, 0, '2014-03-18 02:53:12', '0000-00-00 00:00:00', 0),
(111, 'tes', '', '', '', 0, 3, '', 'Peta Struktur Ruang', 1, 34, 0, '2014-03-18 02:53:12', '0000-00-00 00:00:00', 0),
(112, 'tes', '', '', '', 0, 3, '', 'Peta Pola Ruang', 1, 34, 0, '2014-03-18 02:53:12', '0000-00-00 00:00:00', 0),
(113, 'tes log 11', '', '', '', 0, 3, '', 'Naskah Akademis', 1, 34, 0, '2014-03-18 02:04:44', '0000-00-00 00:00:00', 2),
(114, 'tes log 11', '', '', '1', 0, 3, '', 'Dokumen Final', 1, 34, 0, '2014-03-18 02:04:44', '0000-00-00 00:00:00', 2),
(115, 'tes log 11', '', '', '', 0, 3, '', 'Peta Struktur Ruang', 1, 34, 0, '2014-03-18 02:04:44', '0000-00-00 00:00:00', 2),
(116, 'tes log 11', '', '', '', 0, 3, '', 'Peta Pola Ruang', 1, 34, 0, '2014-03-18 02:04:44', '0000-00-00 00:00:00', 2),
(123, 'log produk', '', '', 'AK-011225.doc', 0, 3, 'product/81c092ae19997e5bb32654a9203f3466.doc', 'Naskah Akademis', 1, 35, 0, '2014-03-18 02:55:22', '0000-00-00 00:00:00', 0),
(124, 'log produk', '', '', 'workflow.docx', 0, 3, 'product/9665c4a7e006e68920c2c4dd64b1082c.docx', 'Dokumen Final', 1, 35, 0, '2014-03-18 02:55:22', '0000-00-00 00:00:00', 0),
(125, 'log produk', '', '', '', 0, 3, '', 'Peta Struktur Ruang', 1, 35, 0, '2014-03-18 02:55:22', '0000-00-00 00:00:00', 0),
(126, 'log produk', '', '', '', 0, 3, '', 'Peta Pola Ruang', 1, 35, 0, '2014-03-18 02:55:22', '0000-00-00 00:00:00', 0),
(127, 'log norma 11', '', '', 'AK-011326.doc', 0, 4, '', 'Naskah Akademis', 1, 3, 0, '2014-03-18 02:59:04', '0000-00-00 00:00:00', 2),
(128, 'log norma 11', '', '', 'AK-011225.doc', 0, 4, 'norma/bce9125ec4c065f4e5b6e936904a1137.doc', 'Dokumen Final', 1, 3, 0, '2014-03-18 02:59:04', '0000-00-00 00:00:00', 2),
(129, 'log norma 11', '', '', '', 0, 4, 'norma/b04609a747c66020efab432228364db4.png', 'Peta Struktur Ruang', 1, 3, 0, '2014-03-18 02:59:04', '0000-00-00 00:00:00', 2),
(130, 'log norma 11', '', '', '', 0, 4, '', 'Peta Pola Ruang', 1, 3, 0, '2014-03-18 02:59:04', '0000-00-00 00:00:00', 2),
(131, 'log norma', '', 'tes log norma', 'AK-011326.doc', 0, 4, 'norma/05cfe0173e1a0f14e78d5db735f30f0a.doc', 'Naskah Akademis', 1, 4, 0, '2014-03-18 03:17:35', '2014-03-18 09:18:10', 0),
(132, 'log norma', '', 'tes log norma', 'AK-011225.doc', 0, 4, 'norma/34e632aadc33479d23bf1b56d7a0132f.doc', 'Dokumen Final', 1, 4, 0, '2014-03-18 03:17:35', '2014-03-18 09:18:10', 0),
(133, 'log norma', '', 'tes log norma', '', 0, 4, 'norma/10a1182caa9f974c8c83881cc32e0fe2.jpg', 'Peta Struktur Ruang', 1, 4, 0, '2014-03-18 03:17:35', '2014-03-18 09:18:10', 0),
(134, 'log norma', '', 'tes log norma', '', 0, 4, 'norma/a415c084fc3448f4729376a303276de3.jpg', 'Peta Pola Ruang', 1, 4, 0, '2014-03-18 03:17:35', '2014-03-18 09:18:10', 0),
(137, 'log program', '', 'tesssss', 'AK-011326.doc', 1, 5, 'program/0c51bf71e7447de77f58b29ca8ba50b9.doc', 'Naskah Akademis', 0, 2, 0, '2014-03-18 07:08:23', '2014-03-18 12:43:50', 0),
(138, 'log program', '', 'tesssss', 'AK-011225.doc', 1, 5, 'program/c9a30522a185bca6baef4e8bc930ed38.doc', 'Dokumen Final', 0, 2, 0, '2014-03-18 07:08:23', '2014-03-18 12:43:50', 0),
(139, 'log program', '', 'tesssss', '', 1, 5, 'program/bc1a8d707c76fd5260f1dc99dae7d7b8.png', 'Peta Pola Ruang', 0, 2, 0, '2014-03-18 07:08:23', '2014-03-18 12:43:50', 0),
(140, 'log peta pola ruang', '', 'log peta pola ruang', '', 1, 6, 'sig/peta pola ruang/21efa046331025320c954bae7823b9a9.jpg', 'sig_pola', 0, 1, 0, '2014-03-18 11:42:02', '0000-00-00 00:00:00', 0),
(141, 'log peta pola ruang 2', '', 'log peta pola ruang1', '', 1, 6, 'sig/peta pola ruang/e576a347eb0b3f7e7b65e5cbf65508ec.jpg', 'sig_pola', 0, 2, 0, '2014-03-18 11:49:50', '2014-03-18 17:49:50', 0),
(142, 'log peta pola ruang', '', 'log peta pola ruang 2', '', 1, 6, 'sig/peta pola ruang/47890de220a09fa3dfbb482e95519c5a.jpg', 'sig_pola', 0, 3, 0, '2014-03-18 11:50:20', '0000-00-00 00:00:00', 2),
(143, 'program 1', '', 'sadasdaddddddddddddddsadsadas', 'AK-011326.doc', 1, 5, 'program/da66f04ede34cfe221179105051ec34e.doc', 'Naskah Akademis', 0, 3, 0, '2014-03-18 17:33:27', '2014-03-18 22:20:20', 0),
(144, 'program 1', '', 'sadasdaddddddddddddddsadsadas', '', 1, 5, 'program/74269b09114eb916becb9e8c3b43a7eb.jpg', 'Peta Pola Ruang', 0, 3, 0, '2014-03-18 17:33:27', '2014-03-18 22:20:20', 0),
(145, 'program 1', '', 'sadasdaddddddddddddddsadsadas', '', 1, 5, 'program/7ca95172f8be2accc1446b91093e4abe.jpg', 'Peta Struktur Ruang', 0, 3, 0, '2014-03-18 17:33:27', '2014-03-18 22:20:20', 0),
(146, 'program 1', '', 'sadasdaddddddddddddddsadsadas', 'AK-011225.doc', 1, 5, 'program/633deab9322f44950e9dab788725e334.doc', 'Dokumen Final', 0, 3, 0, '2014-03-18 17:33:27', '2014-03-18 22:20:20', 0),
(147, 'log peta struktur', '', 'ndkaskdlamslkdmalmdlkam', '', 1, 7, 'sig/peta struktur ruang/afe96141038d48b8e9d118eb28745a16.jpg', 'sig_struktur', 0, 36, 0, '2014-03-18 16:50:53', '2014-03-18 22:51:20', 0),
(148, 'log peta struktur', '', 'dadasdasdadadadad', '', 0, 7, 'sig/peta struktur ruang/e22bd4fb146b4d6a77427edf13024c55.jpg', 'sig_struktur', 0, 4, 0, '2014-03-18 17:29:47', '2014-03-18 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_sig`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_sig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL,
  `brief` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `id_provinsi` varchar(20) NOT NULL,
  `id_kabupaten` varchar(11) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `jml_hal` int(11) NOT NULL,
  `lampiran` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumbnailimage` varchar(100) NOT NULL,
  `files` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articletype` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `fromwho` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dtataruang_news_content_sig`
--

INSERT INTO `dtataruang_news_content_sig` (`id`, `title`, `brief`, `content`, `id_provinsi`, `id_kabupaten`, `kecamatan`, `tahun`, `jml_hal`, `lampiran`, `image`, `thumbnailimage`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(2, 'log peta pola ruang 2', '', 'log peta pola ruang1', '01', '0156', '', 2014, 0, '', 'sig/peta pola ruang/1a894981d048549aaa66bb5408ac67e8.jpg', '', '', 33, 1, '2014-03-18 11:49:50', '2014-03-18 17:49:50', 1, 1, 1),
(3, 'log peta pola ruang', '', 'log peta pola ruang 2', '01', '0153', '', 2014, 0, '', 'sig/peta pola ruang/b496d78d2ac5036f3539f4eae63bfc7f.jpg', '', '', 33, 1, '2014-03-18 11:50:20', '0000-00-00 00:00:00', 1, 1, 2),
(4, 'log peta struktur', '', 'dadasdasdadadadad', '01', '0156', '', 2014, 0, '', 'sig/peta struktur ruang/abbe1d14ca6896406b17ca622aca9e7e.jpg', '', '', 34, 4, '2014-03-18 17:29:47', '2014-03-18 00:00:00', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_type`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_type` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtataruang_news_content_type`
--

INSERT INTO `dtataruang_news_content_type` (`id`, `type`, `value`, `n_status`) VALUES
(1, 1, 'Profil', 1),
(2, 2, 'Berita', 1),
(3, 3, 'Agenda', 1),
(4, 4, 'One Map', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_type_norma`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_type_norma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dtataruang_news_content_type_norma`
--

INSERT INTO `dtataruang_news_content_type_norma` (`id`, `value`, `n_status`) VALUES
(1, 'Pedoman Umum', 1),
(2, 'Pedoman Teknis', 1),
(3, 'Modul Pelatihan', 1),
(4, 'Prosedur dan Kriteria', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_type_peraturan`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_type_peraturan` (
  `id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtataruang_news_content_type_peraturan`
--

INSERT INTO `dtataruang_news_content_type_peraturan` (`id`, `value`, `n_status`) VALUES
(1, 'Undang Undang', 1),
(2, 'Peraturan Pemerintah', 1),
(3, 'Peraturan Presiden', 1),
(4, 'Keputusan Presiden', 1),
(5, 'Instruksi Presiden', 1),
(6, 'Peraturan Menteri', 1),
(7, 'Keputusan Menteri', 1),
(8, 'Peraturan / Keputusan Direktur Jenderal', 1),
(9, 'SNI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_type_peta`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_type_peta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dtataruang_news_content_type_peta`
--

INSERT INTO `dtataruang_news_content_type_peta` (`id`, `value`, `n_status`) VALUES
(1, 'Nasional', 1),
(2, 'Provinsi', 1),
(3, 'Kabupaten / Kota ', 1),
(4, 'Kabupaten / Kota Rinci', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_type_product`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_type_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `category_list` varchar(50) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dtataruang_news_content_type_product`
--

INSERT INTO `dtataruang_news_content_type_product` (`id`, `value`, `category_list`, `n_status`) VALUES
(1, 'Rencana Strategis WP-3-K', '1,2,3,4,7', 1),
(2, 'Rencana Zonasi WP-3-K', '1,2,3,4,5,7', 1),
(3, 'Rencana Pengelolaan WP-3-K', '1,2,3,4,7', 1),
(4, 'Rencana Aksi WP-3-K', '1,2,3,4,7,6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_type_program`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_type_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dtataruang_news_content_type_program`
--

INSERT INTO `dtataruang_news_content_type_program` (`id`, `value`, `n_status`) VALUES
(1, 'Penyusunan Rencana Strategis WP-3-K', 1),
(2, 'Penyusunan Rencana Zonasi WP-3-K', 1),
(3, 'Penyusunan Rencana Pengelolaan WP-3-K', 1),
(4, 'Penyusunan Rencana Aksi WP-3-K', 1),
(5, 'Lain-Lain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wilayah`
--

CREATE TABLE IF NOT EXISTS `tbl_wilayah` (
  `kode_wilayah` varchar(255) DEFAULT NULL,
  `nama_wilayah` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`kode_wilayah`, `nama_wilayah`, `parent`) VALUES
('01', 'DKI JAKARTA', '0'),
('0151', 'KOTA JAKARTA PUSAT', '01'),
('0152', 'KOTA JAKARTA UTARA', '01'),
('0153', 'KOTA JAKARTA BARAT', '01'),
('0154', 'KOTA JAKARTA SELATAN', '01'),
('0155', 'KOTA JAKARTA TIMUR', '01'),
('0156', 'KEPULAUAN SERIBU', '01'),
('02', 'JAWA BARAT', '0'),
('0205', 'KAB.BOGOR', '02'),
('0206', 'KAB.SUKABUMI', '02'),
('0207', 'KAB.CIANJUR', '02'),
('0208', 'KAB.BEKASI', '02'),
('0209', 'KAB.KERAWANG', '02'),
('0210', 'KAB.PURWAKARTA', '02'),
('0211', 'KAB. SUBANG', '02'),
('0212', 'KAB. BANDUNG', '02'),
('0213', 'KAB. SUMEDANG', '02'),
('0214', 'KAB. G A R U T', '02'),
('0215', 'KAB. TASIKMALAYA', '02'),
('0216', 'KAB. CIAMIS', '02'),
('0217', 'KAB. CIREBON', '02'),
('0218', 'KAB. KUNINGAN', '02'),
('0219', 'KAB. INDRAMAYU', '02'),
('0220', 'KAB. MAJALENGKA', '02'),
('0221', 'KAB. BANDUNG BARAT', '02'),
('0251', 'KOTA BANDUNG', '02'),
('0252', 'KOTA BOGOR', '02'),
('0253', 'KOTA SUKABUMI', '02'),
('0254', 'KOTA CIREBON', '02'),
('0257', 'KOTA BEKASI', '02'),
('0258', 'KOTA DEPOK', '02'),
('0260', 'KOTA TASIKMALAYA', '02'),
('0261', 'KOTA CIMAHI', '02'),
('0262', 'KOTA BANJAR', '02'),
('03', 'JAWA TENGAH', '0'),
('0301', 'KAB. SEMARANG', '03'),
('0302', 'KAB. KENDAL', '03'),
('0303', 'KAB. DEMAK', '03'),
('0304', 'KAB. GROBOGAN', '03'),
('0305', 'KAB. PEKALONGAN', '03'),
('0306', 'KAB. BATANG', '03'),
('0307', 'KAB. TEGAL', '03'),
('0308', 'KAB. BREBES', '03'),
('0309', 'KAB. PATI', '03'),
('0310', 'KAB. KUDUS', '03'),
('0311', 'KAB. PEMALANG', '03'),
('0312', 'KAB. JEPARA', '03'),
('0313', 'KAB. REMBANG', '03'),
('0314', 'KAB. BLORA', '03'),
('0315', 'KAB. BANYUMAS', '03'),
('0316', 'KAB. CILACAP', '03'),
('0317', 'KAB. PURBALINGGA', '03'),
('0318', 'KAB. BANJARNEGARA', '03'),
('0319', 'KAB. MAGELANG', '03'),
('0320', 'KAB. TEMANGGUNG', '03'),
('0321', 'KAB. WONOSOBO', '03'),
('0322', 'KAB. PURWOREJO', '03'),
('0323', 'KAB. KEBUMEN', '03'),
('0324', 'KAB. KLATEN', '03'),
('0325', 'KAB. BOYOLALI', '03'),
('0326', 'KAB. SRAGEN', '03'),
('0327', 'KAB. SUKOHARJO', '03'),
('0328', 'KAB. KARANGANYAR', '03'),
('0329', 'KAB. WONOGIRI', '03'),
('0330', 'KAB. CEPU', '03'),
('0351', 'KOTA SEMARANG', '03'),
('0352', 'KOTA SALATIGA', '03'),
('0353', 'KOTA PEKALONGAN', '03'),
('0354', 'KOTA TEGAL', '03'),
('0355', 'KOTA MAGELANG', '03'),
('0356', 'KOTA SURAKARTA', '03'),
('04', 'DI YOGYAKARTA', '0'),
('0401', 'KAB. BANTUL', '04'),
('0402', 'KAB. SLEMAN', '04'),
('0403', 'KAB. GUNUNGKIDUL', '04'),
('0404', 'KAB. KULONPROGO', '04'),
('0451', 'KOTA YOGYAKARTA', '04'),
('05', 'JAWA TIMUR', '0'),
('0501', 'KAB. GRESIK', '05'),
('0502', 'KAB. MOJOKERTO', '05'),
('0503', 'KAB. SIDOARJO', '05'),
('0504', 'KAB. JOMBANG', '05'),
('0505', 'KAB. SAMPANG', '05'),
('0506', 'KAB. PAMEKASAN', '05'),
('0507', 'KAB. SUMENEP', '05'),
('0508', 'KAB. BANGKALAN', '05'),
('0509', 'KAB. BONDOWOSO', '05'),
('0510', 'KAB. SITUBONDO', '05'),
('0511', 'KAB. BANYUWANGI', '05'),
('0512', 'KAB. JEMBER', '05'),
('0513', 'KAB. MALANG', '05'),
('0514', 'KAB. PASURUAN', '05'),
('0515', 'KAB. PROBOLINGGO', '05'),
('0516', 'KAB. LUMAJANG', '05'),
('0517', 'KAB. KEDIRI', '05'),
('0518', 'KAB. TULUNGAGUNG', '05'),
('0519', 'KAB. NGANJUK', '05'),
('0520', 'KAB. TRENGGALEK', '05'),
('0521', 'KAB. BLITAR', '05'),
('0522', 'KAB. MADIUN', '05'),
('0523', 'KAB. NGAWI', '05'),
('0524', 'KAB. MAGETAN', '05'),
('0525', 'KAB. PONOROGO', '05'),
('0526', 'KAB. PACITAN', '05'),
('0527', 'KAB. BOJONEGORO', '05'),
('0528', 'KAB. TUBAN', '05'),
('0529', 'KAB. LAMONGAN', '05'),
('0551', 'KOTA SURABAYA', '05'),
('0552', 'KOTA MOJOKERTO', '05'),
('0553', 'KOTA MALANG', '05'),
('0554', 'KOTA PASURUAN', '05'),
('0555', 'KOTA PROBOLINGGO', '05'),
('0556', 'KOTA BLITAR', '05'),
('0557', 'KOTA KEDIRI', '05'),
('0558', 'KOTA MADIUN', '05'),
('0559', 'KOTA BATU', '05'),
('06', 'ACEH', '0'),
('0601', 'KAB. ACEH BESAR', '06'),
('0602', 'KAB. P I D I E', '06'),
('0603', 'KAB. ACEH UTARA', '06'),
('0604', 'KAB. ACEH TIMUR', '06'),
('0605', 'KAB. ACEH SELATAN', '06'),
('0606', 'KAB. ACEH BARAT', '06'),
('0607', 'KAB. ACEH TENGAH', '06'),
('0608', 'KAB. ACEH TENGGARA', '06'),
('0609', 'KAB. SIMEULEU', '06'),
('0610', 'KAB. ACEH SINGKIL', '06'),
('0611', 'KAB. BIREUN', '06'),
('0612', 'KAB. ACEH BARAT DAYA', '06'),
('0613', 'KAB. ACEH GAYO LUES', '06'),
('0614', 'KAB. ACEH JAYA', '06'),
('0615', 'KAB. NAGAN RAYA', '06'),
('0616', 'KAB. ACEH TAMIANG', '06'),
('0617', 'KAB. BENER MERIAH', '06'),
('0618', 'KAB. PIDIE JAYA', '06'),
('0651', 'KOTA BANDA ACEH', '06'),
('0652', 'KOTA SABANG', '06'),
('0653', 'KOTA LANGSA', '06'),
('0654', 'KOTA LHOKSEUMAWE', '06'),
('0655', 'KOTA MEULABOH', '06'),
('0656', 'KOTA SUMBULUSSALAM', '06'),
('07', 'SUMATERA UTARA', '0'),
('0701', 'KAB. DELISERDANG', '07'),
('0702', 'KAB. KARO', '07'),
('0703', 'KAB. LANGKAT', '07'),
('0704', 'KAB. TAPANULI TENGAH', '07'),
('0705', 'KAB. SIMALUNGUN', '07'),
('0706', 'KAB. LABUHANBATU', '07'),
('0707', 'KAB. D A I R I', '07'),
('0708', 'KAB. TAPANULI UTARA', '07'),
('0709', 'KAB. TAPANULI SELATAN', '07'),
('0710', 'KAB. ASAHAN', '07'),
('0711', 'KAB. N I A S', '07'),
('0712', 'KAB. SAMOSIR', '07'),
('0713', 'KAB. MANDAILING NATAL', '07'),
('0714', 'KAB. NIAS SELATAN', '07'),
('0715', 'KAB. PAKPAK BARAT', '07'),
('0716', 'KAB. HUMBANG HASUNDUTAN', '07'),
('0717', 'KAB. TOBA SAMOSIR', '07'),
('0718', 'KAB. TARUTUNG', '07'),
('0720', 'KAB. SERDANG BEDAGAI', '07'),
('0721', 'KAB. BATUBARA', '07'),
('0722', 'KAB. PADANG LAWAS', '07'),
('0723', 'KAB. PADANG LAWAS UTARA', '07'),
('0724', 'KAB. LABUHAN BATU SELATAN', '07'),
('0725', 'KAB. LABUHAN BATU UTARA', '07'),
('0726', 'KAB. NIAS UTARA', '07'),
('0727', 'KAB. NIAS BARAT', '07'),
('0751', 'KOTA MEDAN', '07'),
('0752', 'KOTA TEBINGTINGGI', '07'),
('0753', 'KOTA B I N J A I', '07'),
('0754', 'KOTA PEMATANGSIANTAR', '07'),
('0755', 'KOTA TANJUNGBALAI', '07'),
('0756', 'KOTA SIBOLGA', '07'),
('0757', 'KOTA PADANG SIDEMPUAN', '07'),
('0758', 'KOTA STABAT', '07'),
('0759', 'KOTA LUBUK PAKAM', '07'),
('0760', 'KOTA SIDI KALANG', '07'),
('0761', 'KOTA GUNUNG SITOLI', '07'),
('08', 'SUMATERA BARAT', '0'),
('0801', 'KAB. A G A M', '08'),
('0802', 'KAB. PASAMAN', '08'),
('0803', 'KAB. LIMAPULUH KOTA', '08'),
('0804', 'KAB. S O L O K', '08'),
('0805', 'KAB. PADANG PARIAMAN', '08'),
('0806', 'KAB. PESISIR SELATAN', '08'),
('0807', 'KAB. TANAH DATAR', '08'),
('0808', 'KAB. SAWAHLUNTO', '08'),
('0809', 'KAB. KEPULAUAN MENTAWAI', '08'),
('0810', 'KAB. DHARMAS RAYA', '08'),
('0811', 'KAB. SOLOK SELATAN', '08'),
('0812', 'KAB. PASAMAN BARAT', '08'),
('0813', 'KAB. SIJUNJUNG', '08'),
('0814', 'KAB. SAWAHLUNTO SIJUNJUNG', '08'),
('0851', 'KOTA BUKITTINGGI', '08'),
('0852', 'KOTA PADANG PANJANG', '08'),
('0853', 'KOTA S O L O K', '08'),
('0854', 'KOTA SAWAHLUNTO', '08'),
('0855', 'KOTA PADANG', '08'),
('0856', 'KOTA PAYAKUMBUH', '08'),
('0857', 'KOTA PARIAMAN', '08'),
('0858', 'KOTA LUBUK SIKAPING', '08'),
('0859', 'KOTA PAINAN', '08'),
('09', 'RIAU', '0'),
('0901', 'KAB. KAMPAR', '09'),
('0902', 'KAB. BENGKALIS', '09'),
('0904', 'KAB. INDRAGIRI HULU', '09'),
('0905', 'KAB. INDRAGIRI HILIR', '09'),
('0906', 'KAB. PELALAWAN', '09'),
('0907', 'KAB. ROKAN HULU', '09'),
('0908', 'KAB. ROKAN HILIR', '09'),
('0909', 'KAB. SIAK', '09'),
('0912', 'KAB. KUANTAN SINGINGI', '09'),
('0913', 'KAB. KEPULAUAN MERANTI', '09'),
('0951', 'KOTA PEKANBARU', '09'),
('0953', 'KOTA DUMAI', '09'),
('0954', 'KOTA RENGAT', '09'),
('0955', 'OTORITA BATAM', '09'),
('10', 'JAMBI', '0'),
('1001', 'KAB. BATANGHARI', '10'),
('1002', 'KAB. TANJUNG JABUNG BARAT', '10'),
('1003', 'KAB. BUNGO', '10'),
('1004', 'KAB. SAROLANGUN', '10'),
('1005', 'KAB. KERINCI', '10'),
('1006', 'KAB. MERANGIN', '10'),
('1007', 'KAB. TANJUNG JABUNG TIMUR', '10'),
('1008', 'KAB. T E B O', '10'),
('1009', 'KAB. MUARO JAMBI', '10'),
('1051', 'KOTA JAMBI', '10'),
('1052', 'KOTA SUNGAI PENUH', '10'),
('11', 'SUMATERA SELATAN', '0'),
('1103', 'KAB. MUSI BANYU ASIN', '11'),
('1104', 'KAB. OGAN KOMERING ULU', '11'),
('1105', 'KAB. MUARA ENIM', '11'),
('1106', 'KAB. L A H A T', '11'),
('1107', 'KAB. MUSI RAWAS', '11'),
('1108', 'KAB. OGAN KOMERING ILIR', '11'),
('1109', 'KAB. BANYUASIN', '11'),
('1110', 'KAB. OKU TIMUR', '11'),
('1111', 'KAB. OKU SELATAN', '11'),
('1112', 'KAB. OGAN ILIR', '11'),
('1113', 'KAB. OKU UTARA', '11'),
('1115', 'KAB. IDRALAYA', '11'),
('1116', 'KAB. BATU RAJA', '11'),
('1117', 'KAB. EMPAT LAWANG', '11'),
('1151', 'KOTA PALEMBANG', '11'),
('1153', 'KOTA PRABUMULIH', '11'),
('1154', 'KOTA PAGAR ALAM', '11'),
('1155', 'KOTA LUBUK LINGGAU', '11'),
('12', 'LAMPUNG', '0'),
('1201', 'KAB. LAMPUNG SELATAN', '12'),
('1202', 'KAB. LAMPUNG TENGAH', '12'),
('1203', 'KAB. LAMPUNG UTARA', '12'),
('1204', 'KAB. LAMPUNG BARAT', '12'),
('1205', 'KAB. TULANG BAWANG', '12'),
('1206', 'KAB. TANGGAMUS', '12'),
('1207', 'KAB. LAMPUNG TIMUR', '12'),
('1208', 'KAB. WAY KANAN', '12'),
('1209', 'KAB. PESAWARAN', '12'),
('1210', 'KAB. PRINGSEWU', '12'),
('1211', 'KAB. MESUJI', '12'),
('1212', 'KAB. TULANG BAWANG BARAT', '12'),
('1251', 'KOTA BANDAR LAMPUNG', '12'),
('1252', 'KOTA METRO', '12'),
('13', 'KALIMANTAN BARAT', '0'),
('1301', 'KAB. SAMBAS', '13'),
('1302', 'KAB. SANGGAU', '13'),
('1303', 'KAB. SINTANG', '13'),
('1304', 'KAB. PONTIANAK', '13'),
('1305', 'KAB. KAPUAS HULU', '13'),
('1306', 'KAB. KETAPANG', '13'),
('1307', 'KAB. BENGKAYANG', '13'),
('1308', 'KAB. LANDAK', '13'),
('1309', 'KAB. MELAWI', '13'),
('1310', 'KAB. SEKADAU', '13'),
('1311', 'KAB. KAYONG UTARA', '13'),
('1312', 'KAB. KUBU RAYA', '13'),
('1351', 'KOTA PONTIANAK', '13'),
('1352', 'KOTA SINGKAWANG', '13'),
('14', 'KALIMANTAN TENGAH', '0'),
('1401', 'KAB. KAPUAS', '14'),
('1402', 'KAB. BARITO UTARA', '14'),
('1403', 'KAB. BARITO SELATAN', '14'),
('1404', 'KAB. KOTAWARINGIN TIMUR', '14'),
('1405', 'KAB. KOTAWARINGIN BARAT', '14'),
('1406', 'KAB. KATINGAN', '14'),
('1407', 'KAB. SERUYAN', '14'),
('1408', 'KAB. SUKAMARA', '14'),
('1409', 'KAB. LAMANDAU', '14'),
('1410', 'KAB. GUNUNG MAS', '14'),
('1411', 'KAB. PULANG PISAU', '14'),
('1412', 'KAB. MURUNG RAYA', '14'),
('1413', 'KAB. BARITO TIMUR', '14'),
('1451', 'KOTA PALANGKARAYA', '14'),
('15', 'KALIMANTAN SELATAN', '0'),
('1501', 'KAB. BANJAR', '15'),
('1502', 'KAB. TANAH LAUT', '15'),
('1503', 'KAB. TAPIN', '15'),
('1504', 'KAB. HULU SUNGAI SELATAN', '15'),
('1505', 'KAB. HULU SUNGAI TENGAH', '15'),
('1506', 'KAB. BARITO KUALA', '15'),
('1507', 'KAB. TABALONG', '15'),
('1508', 'KAB. KOTABARU', '15'),
('1509', 'KAB. HULU SUNGAI UTARA', '15'),
('1510', 'KAB. TANAH BUMBU', '15'),
('1511', 'KAB. BALANGAN', '15'),
('1551', 'KOTA BANJARMASIN', '15'),
('1552', 'KOTA BANJARBARU', '15'),
('16', 'KALIMANTAN TIMUR', '0'),
('1601', 'KAB. K U T A I', '16'),
('1602', 'KAB. P A S E R', '16'),
('1603', 'KAB. BULUNGAN', '16'),
('1604', 'KAB. B E R A U', '16'),
('1605', 'KAB. NUNUKAN', '16'),
('1606', 'KAB. MALINAU', '16'),
('1607', 'KAB. KUTAI BARAT', '16'),
('1608', 'KAB. KUTAI TIMUR', '16'),
('1609', 'KAB. PENAJAM PASER UTARA', '16'),
('1610', 'KAB. KUTAI KERTANEGARA', '16'),
('1611', 'TENGGARONG', '16'),
('1612', 'KAB. TANA TIDUNG', '16'),
('1651', 'KOTA SAMARINDA', '16'),
('1652', 'KOTA BALIKPAPAN', '16'),
('1653', 'KOTA TARAKAN', '16'),
('1654', 'KOTA BONTANG', '16'),
('17', 'SULAWESI UTARA', '0'),
('1702', 'KAB. MINAHASA', '17'),
('1703', 'KAB. BOLAANG MONGONDOW', '17'),
('1704', 'KAB. KEPULAUAN SANGIHE', '17'),
('1705', 'KAB. KEPULAUAN TALAUD', '17'),
('1706', 'KAB. MINAHASA SELATAN', '17'),
('1707', 'KAB. TOMOHON', '17'),
('1708', 'KAB. MINAHASA UTARA', '17'),
('1709', 'KAB. KEP.SANGIHE TALAUD', '17'),
('1710', 'KAB. MINAHASA TENGGARA', '17'),
('1711', 'KAB. BOLAANG MONGONDOW UTARA', '17'),
('1712', 'KAB. KEP. SIAU TAGULANDANG BIARO', '17'),
('1713', 'KAB. BOLAANG MONGONDOW SELATAN', '17'),
('1714', 'KAB. BOLAANG MONGONDOW TIMUR', '17'),
('1751', 'KOTA MANADO', '17'),
('1752', 'KOTA TOMOHON', '17'),
('1753', 'KOTA BITUNG', '17'),
('1754', 'KOTA KOTAMOBAGO', '17'),
('18', 'SULAWESI TENGAH', '0'),
('1801', 'KAB. P O S O', '18'),
('1802', 'KAB. DONGGALA', '18'),
('1803', 'KAB. TOLI-TOLI', '18'),
('1804', 'KAB. BANGGAI', '18'),
('1805', 'KAB. B U O L', '18'),
('1806', 'KAB. MOROWALI', '18'),
('1807', 'KAB. BANGGAI KEPULAUAN', '18'),
('1808', 'KAB. PARIGI MOUTONG', '18'),
('1809', 'KAB. TOJO UNA-UNA', '18'),
('1812', 'KAB. SIGI', '18'),
('1851', 'KOTA PALU', '18'),
('19', 'SULAWESI SELATAN', '0'),
('1901', 'KAB. PINRANG', '19'),
('1902', 'KAB. GOWA', '19'),
('1903', 'KAB. WAJO', '19'),
('1905', 'KAB. BONE', '19'),
('1906', 'KAB. TANATORAJA', '19'),
('1907', 'KAB. MAROS', '19'),
('1909', 'KAB. LUWU', '19'),
('1910', 'KAB. SINJAI', '19'),
('1911', 'KAB. BULUKUMBA', '19'),
('1912', 'KAB. BANTAENG', '19'),
('1913', 'KAB. JENEPONTO', '19'),
('1914', 'KAB. KEPULAUAN SELAYAR', '19'),
('1915', 'KAB. TAKALAR', '19'),
('1916', 'KAB. BARRU', '19'),
('1917', 'KAB. SIDENRENG RAPPANG', '19'),
('1918', 'KAB. PANGKAJENE KEPULAUAN', '19'),
('1919', 'KAB. SOPPENG', '19'),
('1921', 'KAB. ENREKANG', '19'),
('1922', 'KAB. LUWU UTARA', '19'),
('1924', 'KAB. LUWU TIMUR', '19'),
('1925', 'KAB. TORAJA UTARA', '19'),
('1951', 'KOTA MAKASSAR', '19'),
('1952', 'KOTA PARE-PARE', '19'),
('1953', 'KOTA PALOPO', '19'),
('20', 'SULAWESI TENGGARA', '0'),
('2001', 'KAB. KENDARI (SDH TIDAK ADA)', '20'),
('2002', 'KAB. BUTON', '20'),
('2003', 'KAB. MUNA', '20'),
('2004', 'KAB. KOLAKA', '20'),
('2005', 'KAB. KONAWE SELATAN', '20'),
('2006', 'KAB. BOMBANA', '20'),
('2007', 'KAB. WAKATOBI', '20'),
('2008', 'KAB. KOLAKA UTARA', '20'),
('2009', 'KAB. KONAWE', '20'),
('2010', 'KAB. KONAWE UTARA', '20'),
('2011', 'KAB. BUTON UTARA', '20'),
('2051', 'KOTA KENDARI', '20'),
('2052', 'KOTA BAU-BAU', '20'),
('21', 'MALUKU', '0'),
('2101', 'KAB. MALUKU TENGAH', '21'),
('2102', 'KAB. MALUKU TENGGARA', '21'),
('2103', 'KAB. MALUKU TENGGARA BARAT', '21'),
('2104', 'KAB. PULAU BURU', '21'),
('2105', 'KAB. KEPULAUAN ARU', '21'),
('2106', 'KAB. SERAM BAGIAN BARAT', '21'),
('2107', 'KAB. SERAM BAGIAN TIMUR', '21'),
('2108', 'KAB. MALUKU', '21'),
('2109', 'KAB. MALUKU BARAT DAYA', '21'),
('2110', 'KAB. BURU SELATAN', '21'),
('2151', 'KOTA AMBON', '21'),
('2152', 'KOTA TUAL', '21'),
('22', 'BALI', '0'),
('2201', 'KAB. BULELENG', '22'),
('2202', 'KAB. JEMBRANA', '22'),
('2203', 'KAB. KLUNGKUNG', '22'),
('2204', 'KAB. GIANYAR', '22'),
('2205', 'KAB. KARANGASEM', '22'),
('2206', 'KAB. BANGLI', '22'),
('2207', 'KAB. BADUNG', '22'),
('2208', 'KAB. TABANAN', '22'),
('2209', 'KAB. NEGARA', '22'),
('2251', 'KOTA DENPASAR', '22'),
('23', 'NUSA TENGGARA BARAT', '0'),
('2301', 'KAB. LOMBOK BARAT', '23'),
('2302', 'KAB. LOMBOK TENGAH', '23'),
('2303', 'KAB. LOMBOK TIMUR', '23'),
('2304', 'KAB. B I M A', '23'),
('2305', 'KAB. SUMBAWA', '23'),
('2306', 'KAB. DOMPU', '23'),
('2307', 'KAB. SUMBAWA BARAT', '23'),
('2308', 'KAB. LOMBOK UTARA', '23'),
('2351', 'KOTA MATARAM', '23'),
('2352', 'KOTA BIMA', '23'),
('24', 'NUSA TENGGARA TIMUR', '0'),
('2401', 'KAB. KUPANG', '24'),
('2402', 'KAB. B E L U', '24'),
('2403', 'KAB. TIMOR TENGAH UTARA', '24'),
('2404', 'KAB. TIMOR TENGAH SELATAN', '24'),
('2405', 'KAB. A L O R', '24'),
('2406', 'KAB. S I K K A', '24'),
('2407', 'KAB. FLORES TIMUR', '24'),
('2408', 'KAB. E N D E', '24'),
('2409', 'KAB. NGADA', '24'),
('2410', 'KAB. MANGGARAI', '24'),
('2411', 'KAB. SUMBA TIMUR', '24'),
('2412', 'KAB. SUMBA BARAT', '24'),
('2413', 'KAB. LEMBATA', '24'),
('2414', 'KAB. ROTE NDAO', '24'),
('2415', 'KAB. MANGGARAI BARAT', '24'),
('2416', 'KAB. TIMOR', '24'),
('2417', 'KAB. NAGEKEO', '24'),
('2418', 'KAB. SUMBA TENGAH', '24'),
('2419', 'KAB. SUMBA BARAT DAYA', '24'),
('2420', 'MANGGARAI TIMUR', '24'),
('2421', 'KAB. SABU RAIJUA', '24'),
('2451', 'KOTA KUPANG', '24'),
('2453', 'KAB. RUTENG', '24'),
('25', 'PAPUA', '0'),
('2501', 'KAB. JAYAPURA', '25'),
('2502', 'KAB. BIAK-NUMFOR', '25'),
('2504', 'KAB. KEPULAUAN YAPEN', '25'),
('2507', 'KAB. MERAUKE', '25'),
('2508', 'KAB. JAYAWIJAYA', '25'),
('2509', 'KAB. PANIAI', '25'),
('2510', 'KAB. NABIRE', '25'),
('2511', 'KAB. PUNCAK JAYA', '25'),
('2512', 'KAB. MIMIKA', '25'),
('2513', 'KAB. MAPPI', '25'),
('2514', 'KAB. ASMAT', '25'),
('2515', 'KAB. BOVEN DIGOEL', '25'),
('2516', 'KAB. SARMI', '25'),
('2517', 'KAB. KEEROM', '25'),
('2518', 'KAB. TOLIKARA', '25'),
('2519', 'KAB. PEGUNUNGAN BINTANG', '25'),
('2520', 'KAB. MAMBERAMO RAYA', '25'),
('2523', 'KAB. WAROPEN', '25'),
('2524', 'KAB. YAHUKIMO', '25'),
('2527', 'KAB. SUPIORI', '25'),
('2528', 'MAMBERAMO TENGAH', '25'),
('2529', 'KAB. LANNY JAYA', '25'),
('2530', 'KAB.DOGIYAI', '25'),
('2531', 'KAB.YALIMO', '25'),
('2532', 'KAB.NDUGA', '25'),
('2533', 'KAB. PUNCAK', '25'),
('2534', 'KAB. DAYAI', '25'),
('2535', 'KAB. INTAN JAYA', '25'),
('2536', 'KAB. DEIYAI', '25'),
('2551', 'KOTA JAYAPURA', '25'),
('26', 'BENGKULU', '0'),
('2601', 'KAB. BENGKULU UTARA', '26'),
('2602', 'KAB. BENGKULU SELATAN', '26'),
('2603', 'KAB. REJANG LEBONG', '26'),
('2604', 'KAB. SELUMA', '26'),
('2605', 'KAB. K A U R', '26'),
('2606', 'KAB. MUKO-MUKO', '26'),
('2607', 'KAB. LEBONG', '26'),
('2608', 'KAB. KEPAHIANG', '26'),
('2609', 'KAB. BENGKULU TENGAH', '26'),
('2651', 'KOTA BENGKULU', '26'),
('28', 'MALUKU UTARA', '0'),
('2801', 'KAB. MALUKU UTARA', '28'),
('2802', 'KAB. HALMAHERA TENGAH', '28'),
('2803', 'KAB. HALMAHERA UTARA', '28'),
('2804', 'KAB. HALMAHERA SELATAN', '28'),
('2805', 'KAB. KEPULAUAN SULA', '28'),
('2806', 'KAB. HALMAHERA TIMUR', '28'),
('2807', 'KAB. HALMAHERA BARAT', '28'),
('2808', 'KAB. PULAU MOROTAI', '28'),
('2851', 'KOTA TERNATE', '28'),
('2852', 'KOTA TIDORE', '28'),
('2853', 'KOTA TIDORE KEPULAUAN', '28'),
('29', 'BANTEN', '0'),
('2901', 'KAB. SERANG', '29'),
('2902', 'KAB. PANDEGLANG', '29'),
('2903', 'KAB. LEBAK', '29'),
('2904', 'KAB. TANGERANG', '29'),
('2951', 'KOTA TANGERANG', '29'),
('2952', 'KOTA CILEGON', '29'),
('2953', 'KOTA SERANG', '29'),
('2954', 'KOTA TANGERANG SELATAN', '29'),
('30', 'BANGKA BELITUNG', '0'),
('3001', 'KAB. BELITUNG', '30'),
('3002', 'KAB. BANGKA', '30'),
('3003', 'KAB. BANGKA BARAT', '30'),
('3004', 'KAB. BANGKA TENGAH', '30'),
('3005', 'KAB. BANGKA SELATAN', '30'),
('3006', 'KAB. BELITUNG TIMUR', '30'),
('3007', 'KAB. SUNGAI LIAT', '30'),
('3051', 'KOTA PANGKALPINANG', '30'),
('31', 'GORONTALO', '0'),
('3101', 'KAB. GORONTALO', '31'),
('3102', 'KAB. BOALEMO', '31'),
('3103', 'KAB. POHUWATO', '31'),
('3104', 'KAB. BONE BOLANGO', '31'),
('3105', 'KAB. LIMBOTO', '31'),
('3106', 'KAB. MARISA', '31'),
('3107', 'KAB. GORONTALO UTARA', '31'),
('3151', 'KOTA GORONTALO', '31'),
('32', 'KEPULAUAN RIAU', '0'),
('3201', 'KAB. BINTAN', '32'),
('3202', 'KAB. KARIMUN', '32'),
('3203', 'KAB. NATUNA', '32'),
('3204', 'KAB. LINGGA', '32'),
('3205', 'KAB. ANAMBAS', '32'),
('3206', 'KAB. BARELANG', '32'),
('3207', 'KAB. MERANTI', '32'),
('3251', 'KOTA BATAM', '32'),
('3252', 'KOTA TANJUNG PINANG', '32'),
('33', 'PAPUA BARAT', '0'),
('3301', 'KAB. MANOKWARI', '33'),
('3302', 'KAB. SORONG', '33'),
('3303', 'KAB. FAK FAK', '33'),
('3304', 'KAB. SORONG SELATAN', '33'),
('3305', 'KAB. RAJA AMPAT', '33'),
('3306', 'KAB. TELUK BINTUNI', '33'),
('3307', 'KAB. TELUK WONDAMA', '33'),
('3308', 'KAB. KAIMANA', '33'),
('3309', 'KAB. TAMBRAUW', '33'),
('3310', 'KAB. MAYBRAT', '33'),
('34', 'SULAWESI BARAT', '0'),
('3401', 'KAB. MAJENE', '34'),
('3402', 'KAB. MAMUJU', '34'),
('3403', 'KAB. MAMUJU UTARA', '34'),
('3404', 'KAB. POLEWALI MANDAR', '34'),
('3405', 'KAB. MAMASA', '34'),
('3451', 'KOTA.MAMUJU', '34');

-- --------------------------------------------------------

--
-- Table structure for table `user_member`
--

CREATE TABLE IF NOT EXISTS `user_member` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(46) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified_date` datetime NOT NULL,
  `img` varchar(200) DEFAULT NULL COMMENT 'GIID Image',
  `image_profile` varchar(200) NOT NULL,
  `username` varchar(46) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `description` text,
  `middle_name` varchar(46) DEFAULT NULL,
  `last_name` varchar(46) DEFAULT NULL,
  `StreetName` varchar(150) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `n_status` int(3) NOT NULL DEFAULT '0' COMMENT ' pending , approved, verified, rejected , deleted ( 7 day ), deactivated ( kill my self )',
  `login_count` int(11) NOT NULL DEFAULT '0',
  `verified` tinyint(3) DEFAULT '0' COMMENT '0->no hp blm verified, 1->sudah verified.',
  `usertype` int(11) NOT NULL COMMENT '0:online;1:offline;2;existing',
  `salt` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_member`
--

INSERT INTO `user_member` (`id`, `name`, `nickname`, `email`, `register_date`, `verified_date`, `img`, `image_profile`, `username`, `last_login`, `city`, `sex`, `birthday`, `description`, `middle_name`, `last_name`, `StreetName`, `phone_number`, `n_status`, `login_count`, `verified`, `usertype`, `salt`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '2014-01-20 12:37:14', '0000-00-00 00:00:00', NULL, '177c6b4424f07bb4c5030b02daa7b8c3.png', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '1234567890', 'ebf95c3f793174665fd929f01597df7738f574c0'),
(5, 'user1', NULL, 'user1@gmail.com', '2014-03-17 03:02:05', '0000-00-00 00:00:00', NULL, '', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 2, 'codekir-v0.3', 'ae312bb2e0e4574e0fb3a8e1b6ec6c42fae7a149'),
(6, 'user2', NULL, 'user2@gmail.com', '2014-03-17 03:10:27', '0000-00-00 00:00:00', NULL, '', 'user2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 3, 'codekir-v0.3', '3a77d0e90060d273c2a0ccd15bdd2a3aeb57f6fc'),
(7, 'fau', NULL, 'fau@gmail.com', '2014-03-23 16:39:33', '0000-00-00 00:00:00', NULL, '3e88bcb30293f743bb9a41cb5fc0796e.jpg', 'fau', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, 1, 'codekir-v0.3', '79edc4cd680cb072cb7c2892c1dbf9ee6b67b9e0'),
(8, 'tester11', NULL, '11tester@gmail.com', '2014-03-23 16:47:53', '0000-00-00 00:00:00', NULL, 'fa07bc35d4b3d6cfcc114fe97c24cbfa.jpg', 'tester', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 2, 'codekir-v0.3', '79edc4cd680cb072cb7c2892c1dbf9ee6b67b9e0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
