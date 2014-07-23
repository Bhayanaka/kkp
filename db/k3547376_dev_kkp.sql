-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2014 at 06:26 PM
-- Server version: 5.1.72-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k3547376_dev_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `code_activity`
--

CREATE TABLE IF NOT EXISTS `code_activity` (
  `id` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `activityValue` varchar(50) NOT NULL,
  `n_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `code_activity_log`
--

CREATE TABLE IF NOT EXISTS `code_activity_log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `activityDesc` varchar(250) NOT NULL,
  `source` varchar(20) NOT NULL,
  `datetimes` datetime NOT NULL,
  `n_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `dtataruang_news_content`
--

INSERT INTO `dtataruang_news_content` (`id`, `title`, `brief`, `content`, `image`, `thumbnailimage`, `categoryid`, `articletype`, `tags`, `createdate`, `postdate`, `expiredate`, `fromwho`, `authorid`, `n_status`) VALUES
(1, 'berlayar', '', 'content', '3_b.jpg', '', 0, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(2, 'berlayar', '', 'content', '2_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(3, 'berlayar', '', 'content', '3_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(4, 'berlayar', '', 'content', '4_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(5, 'berlayar', '', 'content', '5_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(6, 'menari', '', 'content', '2_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(7, 'menari', '', 'content', '2_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(8, 'menari', '', 'content', '3_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(9, 'menari', '', 'content', '4_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(10, 'menari', '', 'content', '5_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(11, 'menari', '', 'content', '5_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(12, 'menari', '', 'content', '5_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(13, 'menari', '', 'content', '5_b.jpg', '', 6, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(14, 'aksdad', '', 'content', 'cinta.mp4', '', 7, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(15, 'simbada', '', 'content', 'SIMBADA.mp4', '', 7, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(16, 'simbada2', '', 'content', 'Simbada_2.mp4', '', 7, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(24, '', '', '', 'gallery/video/3', 'gallery/video/3', 7, 2, '', '2014-02-09 19:43:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(25, '', '', '', 'gallery/video/d', 'gallery/video/d', 7, 2, '', '2014-02-09 19:46:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(26, 'Charts', '', '', 'gallery/foto/6afc8c770224c502cc41343e0fd6eac1.png', 'gallery/foto/6afc8c770224c502cc41343e0fd6eac1.png', 6, 2, '', '2014-02-10 01:03:30', '2014-02-10 08:01:50', '0000-00-00 00:00:00', 1, 1, 0),
(27, 'Sejarah Direktorat Jenderal Kelautan Pesisir dan Pulau-Pulau Kecil', '', '(isi sejarah) Exporting can be a profitable way of expanding your business, spreading your risks and reducing your dependence on the local market.\\'', \\''(isi sejarah) Exporting can be a profitable way of expanding your business, spreading your risks and reducing your dependence on the local market.', 'sejarah/6ae8554b8fa01e87a5cce4a50f9afdfd.png', '', 1, 1, '', '2014-02-10 09:16:23', '2014-02-10 09:14:00', '0000-00-00 00:00:00', 1, 1, 1),
(28, 'Struktur Organisasi Direktorat Jenderal Kelautan Pesisir dan Pulau-Pulau Kecil', '', '(isi struktur organisasi)Exporting can be a profitable way of expanding your business, spreading your risks and reducing your dependence on the local market. Austrade research shows that, on average, \\'', \\''(isi struktur organisasi)Exporting can be a profitable way of expanding your business, spreading your risks and reducing your dependence on the local market. Austrade research shows that, on average', 'struktur organisasi/bb701e3470b0d34dbb9ac1b83c2d5e5c.jpg', '', 2, 1, '', '2014-02-10 02:18:28', '2014-02-10 09:16:00', '0000-00-00 00:00:00', 1, 1, 1),
(29, 'Tugas Pokok Dan Fungsi Direktorat Jenderal Kelautan Pesisir dan Pulau-Pulau Kecil', '', '(isi tugas pokok dan fungsi)Exporting can be a profitable way of expanding your business, spreading your risks and reducing your dependence on the local market.', '', '', 3, 1, '', '2014-02-10 02:19:24', '2014-02-10 09:17:10', '0000-00-00 00:00:00', 1, 1, 1),
(30, 'Kelor, Satu Lagi Pulau Cantik di Flores', 'Labuan Bajo - Flores punya banyak pulau dengan pantai yang cantik dan alam bawah laut yang memukau.', 'Labuan Bajo - Flores punya banyak pulau dengan pantai yang cantik dan alam bawah laut yang memukau.', 'berita/6d98a23122ca75c3a36677f3594695d9.jpg', '', 4, 1, '', '2014-02-10 02:36:30', '2014-02-10 09:31:40', '0000-00-00 00:00:00', 1, 1, 1),
(31, 'Ayo Liburan ke Labuan Bajo, Eksotis!', 'Labuan Bajo adalah sebuah daerah pelabuhan kecil yang sangat menakjubkan. Barisan kapal-kapal nelayan', 'Labuan Bajo - Flores punya banyak pulau dengan pantai yang cantik dan alam bawah laut yang memukau.', 'berita/6bceab47111e3a706becaccdc7453649.jpg', '', 4, 1, '', '2014-02-10 02:39:28', '2014-02-10 09:34:40', '0000-00-00 00:00:00', 1, 1, 1),
(32, 'Ini Bukti Flores Bagai Surga yang Jatuh di Indonesia', 'Flores adalah salah satu dari 566 pulau yang tersebar di Nusa Tenggara Timur.', 'Flores adalah salah satu dari 566 pulau yang tersebar di Nusa Tenggara Timur. Flores punya sejuta eksotisme alam mulai dari pantai, gunung, danau, hingga kekayaan budaya yang lestari.', 'opini/baddbf203b96ae3f7873e3e1ebce1912.jpg', '', 5, 1, '', '2014-02-10 02:42:14', '2014-02-10 09:36:10', '0000-00-00 00:00:00', 1, 1, 1),
(33, 'Go Green', '', '', 'gallery/foto/f15ded9c167ae1f0954b0ad1462d1994.png', 'gallery/foto/f15ded9c167ae1f0954b0ad1462d1994.png', 6, 2, '', '2014-02-10 02:45:32', '2014-02-10 09:40:10', '0000-00-00 00:00:00', 1, 1, 0),
(35, 'Undangan Rakornas KKP 2014', 'Kementerian Kelautan dan Perikanan akan menyelenggarakan Rapat Koordinasi Nasional Tahun 2014', 'Kementerian Kelautan dan Perikanan akan menyelenggarakan Rapat Koordinasi Nasional Tahun 2014 dengan fokus pembahasan Pembangunan Kelautan dan Perikanan<br />\r\n<br />', 'agenda/69f159343a2f9810e985c05d6f238d26.jpg', '', 9, 1, '', '2014-02-10 03:17:07', '2014-02-10 10:12:10', '0000-00-00 00:00:00', 1, 1, 1),
(36, 'mancing', '', '', 'gallery/video/a7b2a7910a0fb7f05a05c42a0d8eba58.mp4', 'gallery/video/a7b2a7910a0fb7f05a05c42a0d8eba58.mp4', 7, 2, '', '2014-02-10 03:58:22', '2014-02-10 10:55:20', '0000-00-00 00:00:00', 1, 1, 1),
(37, 'KKP Fokus Bangun 12 Pulau Kecil Terluar', 'Metrotvnews.com, Jakarta: Kementerian Kelautan dan Perikanan (KKP) berencana untuk untuk memfokuskan pembangunan di 12 pulau kecil terluar. Ke-12 pulau itu yakni Sebatik, Nusa Kambangan, Miangas, Marore, Marampit, Lingayan, Maratua, Wetar, Alor, Engg', '<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\">Metrotvnews.com, Jakarta: Kementerian Kelautan dan Perikanan (KKP) berencana untuk untuk memfokuskan pembangunan di 12 pulau kecil terluar. Ke-12 pulau itu yakni Sebatik, Nusa Kambangan, Miangas, Marore, Marampit, Lingayan, Maratua, Wetar, Alor, Enggano, Simuk dan Dubi Kecil.</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\"><br />\r\n</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\">Menurut Dirjen Kelautan Pesisir dan Pulau Kecil KKP Sudirman Saad, pembangunan pulau-pulau tersebut merupakan implementasi amanat PP Nomor 62 Tahun 2010 tentang Pemanfaatan Pulau-Pulau Kecil Terluar. Adapun Indonesia sendiri memiliki 92 pulau-pulau kecil terluar.</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\"><br />\r\n</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\">Dari jumlah tersebut, kata Sudirman lagi, 31 di antaranya berpenghuni. Tapi pada umumnya masih tertinggal terutama terkait ketersediaan infrastruktur. Sudirman berharap ada pihak yang mau ikut terlibat dalam proyek pembangunan tersebut.</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\"><br />\r\n</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\">\\"Diharapkan pada tahun ini, pengembangan yang dilakukan di 92 pulau tadi rampung. Dengan pengembangan, akan ada peluang untuk ekonomi setempat dan juga membantu pemerintah dalam menjaga kedaulatan dan pertahanan,\\" kata Sudirman di Jakarta, Selasa (7/1).</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\"><br />\r\n</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\">Potensi ekonomi yang dimaksud antara lain pembangunan resort wisata, hotel, eco-tourism dan lokasi menyelam. Namun sesuai prinsip dalam konsep minawisata, investasi di pulau kecil tidak boleh merusak ekosistem pulau yang sudah ada.</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\"><br />\r\n</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span style=\\"font-family: Arial, Helvetica, sans-serif; font-size: x-small;\\">\\"Dalam UU Pesisir dan Pulau Kecil, investasi asing ditata sesuai dengan kepentingan nasional. Investasi asing tidak dilarang, tapi harus mengikuti syarat diantaranya bermitra dengan perusahaan lokal, dilakukan di pulau tak berpenghuni, dan wajib melakukan alih saham ke mitra lokal dan alih teknologi,\\" ujarnya.</span>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>', 'berita/92f3b0c34bd961cadc773dcbc42c0a8a.jpg', '', 4, 1, '', '2014-02-11 08:54:51', '2014-02-11 00:00:00', '0000-00-00 00:00:00', 1, 2, 0),
(38, 'Revisi UU Pesisir Disahkan : Jamin Hak Nelayan', 'Panitia kerja DPR bersama pemerintah telah menyepakati revisi Undang-Undang No. 27 Tahun 2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-pualu Kecil, dan sudah disahkan sesuai dengan sidang paripurna masa sidang 2013 yang dilaksanakan pada Rabu (1', 'Keberadaan UU No. 27 Tahun 2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-Pulau Kecil, sangat strategis. Terutama, mewujudkan keberlanjutan pengelolaan sumber daya wilayah pesisir dan pulau-pulau kecil serta meningkatkan kesejahteraan masyarakat yang bermukim di wilayah pesisir dan pulau-pulau kecil. Sumber daya pesisir dan pulau-pulau kecil berdasarkan pasal 33 UUD 45 merupakan kekayaan alam yang dikuasai Negara dan dipergunakan sebesar-besar untuk kemakmuran rakyat.\r\n\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\">Setidaknya ada empat norma hukum penting yang telah disepakati yakin: (1) pemberdayaan masyarakat hukum adat dan nelayan tradisional; (2) penataan investasi; (3) sistem perizinan; dan (4) pengelolaan kawasan konservasi laut nasional.\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><strong>Pemberdayaan masyarakat hukum adat dan nelayan tradisional</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\">Ditandai dengan masuknya unsur masyarakat dalam inisiasi penyusunan Rencana Zonasi Wilayah Pesisir dan Pulau-Pulau Kecil setara dengan pemerintah dan dunia usaha (Pasal 14 ayat 1). Dengan norma hukum ini, maka masyarakat dapat mengambil inisiatif mengusulkan rencana zonasi. UU Perubahan ini juga telah memberikan pengakuan hak asal usul masyarakat hukum adat untuk mengatur wilayah perairan yang telah dikelola secara turun temurun (Pasal 1 angka 33). Dalam Pemanfaatan ruang dan sumber daya perairan pesisir dan pulau-pulau kecil pada wilayah Masyarakat Hukum Adat oleh Masyarakat Hukum Adat menjadi kewenangan Masyarakat Hukum Adat setempat (Pasal 22). Sementara bagi nelayan tradisional yang memiliki wilayah penangkapan ikan secara tradisional diakui dengan cara memasukkan wilayah tersebut sebagai subzona dalam Rencana Zonasi sehingga memiliki perlindungan hukum secara paripurna.\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><strong>Penataan investasi</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\">Dalam UU Perubahan ini, investasi asing ditata sedemikian rupa sehingga tetap mengedepankan kepentingan nasional. Investasi asing tidak dilarang tetapi diiringi sejumlah syarat diantaranya, bermitra dengan perusahaan lokal, di pulau kecil yang tidak berpenduduk, belum ada pemanfaatan oleh masyakat setempat, wajib melakukan alih saham ke mitra lokal (divestasi) dan alih teknologi (Pasal 26A ayat 4).\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><strong>Sistem perizinan</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\">Sebagai pelaksanaan keputusan Mahkamah Konsititusi, maka norma hukum Hak Pengusahaan Perairan Pesisir (HP-3) diganti menjadi perizinan. Ada 2 (dua) macam izin yang diatur dalam revisi UU ini yaitu izin lokasi dan izin pengelolaan (Pasal 16 ayat (1) dan Pasal 19 ayat 1).\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><strong>Pengelolaan kawasan konservasi laut nasional.</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\">Dalam UU Perubahan ini, pengelolaan kawasan konservasi laut nasional juga ditata sesuai tugas masing-masing. Kawasan konservasi laut yang telah ditetapkan sebelum UU Perubahan ini dan masih dikelola instansi lain dialihkan pengelolaannya ke KKP.\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\">Setalah UU tentang Perubahan Atas UU Nomor 27 Tahun 2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-Pulau Kecil ini diundangkan, maka tugas lebih lanjut Pemerintah adalah melakukan sosialisasi, menyelesaikan peraturan perundang-undangan yang diamanatkan sehingga pada akhirnya undang-undang ini dapat diimplementasikan dengan baik untuk mewajudkan kesejahteraan masyarakat pesisir dan pulau-pulau kecil.\r\n</div>\r\n<div style=\\"\\\\&quot;\\\\\\\\&quot;text-align:\\\\&quot;\\" justify;\\\\\\\\\\\\\\"=\\"\\\\&quot;\\\\&quot;\\"><br />\r\n</div>\\\\\\" &gt;\\" &gt;', 'ce0c0968cddf378cd4fbd98b8de3a0ac.jpg', '', 4, 1, '', '2014-02-11 08:57:57', '2014-02-11 00:00:00', '0000-00-00 00:00:00', 1, 2, 2),
(39, 'Revisi UU Pesisir Disahkan : Jamin Hak Nelayan', 'Panitia kerja DPR bersama pemerintah telah menyepakati revisi Undang-Undang No. 27 Tahun 2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-pualu Kecil, dan sudah disahkan sesuai dengan sidang paripurna masa sidang 2013 yang dilaksanakan pada Rabu (1', '<div>Panitia kerja DPR bersama pemerintah telah menyepakati revisi Undang-Undang No. 27 Tahun 2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-pualu Kecil, dan sudah disahkan sesuai dengan sidang paripurna masa sidang 2013 yang dilaksanakan pada Rabu (18/12) dI Gedung Nusantara II, DPR.\r\n</div>\r\n<div>Keberadaan UU No. 27 Tahun 2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-Pulau Kecil, sangat strategis. Terutama, mewujudkan keberlanjutan pengelolaan sumber daya wilayah pesisir dan pulau-pulau kecil serta meningkatkan kesejahteraan masyarakat yang bermukim di wilayah pesisir dan pulau-pulau kecil. Sumber daya pesisir dan pulau-pulau kecil berdasarkan pasal 33 UUD 45 merupakan kekayaan alam yang dikuasai Negara dan dipergunakan sebesar-besar untuk kemakmuran rakyat.\r\n</div>\r\n<div>Setidaknya ada empat norma hukum penting yang telah disepakati yakin: (1) pemberdayaan masyarakat hukum adat dan nelayan tradisional; (2) penataan investasi; (3) sistem perizinan; dan (4) pengelolaan kawasan konservasi laut nasional.\r\n</div>\r\n<div><br />\r\n</div>\r\n<div><strong>Pemberdayaan masyarakat hukum adat dan nelayan tradisional</strong>\r\n</div>\r\n<div>Ditandai dengan masuknya unsur masyarakat dalam inisiasi penyusunan Rencana Zonasi Wilayah Pesisir dan Pulau-Pulau Kecil setara dengan pemerintah dan dunia usaha (Pasal 14 ayat 1). Dengan norma hukum ini, maka masyarakat dapat mengambil inisiatif mengusulkan rencana zonasi. UU Perubahan ini juga telah memberikan pengakuan hak asal usul masyarakat hukum adat untuk mengatur wilayah perairan yang telah dikelola secara turun temurun (Pasal 1 angka 33). Dalam Pemanfaatan ruang dan sumber daya perairan pesisir dan pulau-pulau kecil pada wilayah Masyarakat Hukum Adat oleh Masyarakat Hukum Adat menjadi kewenangan Masyarakat Hukum Adat setempat (Pasal 22). Sementara bagi nelayan tradisional yang memiliki wilayah penangkapan ikan secara tradisional diakui dengan cara memasukkan wilayah tersebut sebagai subzona dalam Rencana Zonasi sehingga memiliki perlindungan hukum secara paripurna.\r\n</div>\r\n<div><br />\r\n</div>\r\n<div><strong>Penataan investasi</strong>\r\n</div>\r\n<div>Dalam UU Perubahan ini, investasi asing ditata sedemikian rupa sehingga tetap mengedepankan kepentingan nasional. Investasi asing tidak dilarang tetapi diiringi sejumlah syarat diantaranya, bermitra dengan perusahaan lokal, di pulau kecil yang tidak berpenduduk, belum ada pemanfaatan oleh masyakat setempat, wajib melakukan alih saham ke mitra lokal (divestasi) dan alih teknologi (Pasal 26A ayat 4).\r\n</div>\r\n<div><br />\r\n</div>\r\n<div><strong>Sistem perizinan</strong>\r\n</div>\r\n<div>Sebagai pelaksanaan keputusan Mahkamah Konsititusi, maka norma hukum Hak Pengusahaan Perairan Pesisir (HP-3) diganti menjadi perizinan. Ada 2 (dua) macam izin yang diatur dalam revisi UU ini yaitu izin lokasi dan izin pengelolaan (Pasal 16 ayat (1) dan Pasal 19 ayat 1).\r\n</div>\r\n<div><br />\r\n</div>\r\n<div><strong>Pengelolaan kawasan konservasi laut nasional.</strong>\r\n</div>\r\n<div>Dalam UU Perubahan ini, pengelolaan kawasan konservasi laut nasional juga ditata sesuai tugas masing-masing. Kawasan konservasi laut yang telah ditetapkan sebelum UU Perubahan ini dan masih dikelola instansi lain dialihkan pengelolaannya ke KKP.\r\n</div>\r\n<div>Setalah UU tentang Perubahan Atas UU Nomor 27 Tahun 2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-Pulau Kecil ini diundangkan, maka tugas lebih lanjut Pemerintah adalah melakukan sosialisasi, menyelesaikan peraturan perundang-undangan yang diamanatkan sehingga pada akhirnya undang-undang ini dapat diimplementasikan dengan baik untuk mewajudkan kesejahteraan masyarakat pesisir dan pulau-pulau kecil.\r\n</div>\r\n<div><br />\r\n</div>', 'berita/7a1567cf0dc99478aa712c130eb6d618.jpg', '', 4, 1, '', '2014-02-11 09:00:27', '2014-02-11 00:00:00', '0000-00-00 00:00:00', 1, 2, 1),
(40, 'Workshop Nasional Akselerasi Penyusunan Rencana Zonasi Wilayah Pesisir dan Pulau-pulau Kecil', 'Ditetapkannya UU No. 27 Tahun 2007 Tentang Pengelolaan Wilayah Pesisir dan Pulau-Pulau Kecil, memberi kewenangan Pemerintah untuk menetapkanaturan penyusunan Rencana Zonasi.  Untuk itu,  setiap Pemerintah Daerah wajib menyusun Rencana Zonasi serta me', '<div style=\\"text-align: justify;\\">Ditetapkannya UU No. 27 Tahun 2007 Tentang Pengelolaan Wilayah Pesisir dan Pulau-Pulau Kecil, memberi kewenangan Pemerintah untuk menetapkanaturan penyusunan Rencana Zonasi. &nbsp;Untuk itu, &nbsp;setiap Pemerintah Daerah wajib menyusun Rencana Zonasi serta menetapkannya dengan Peraturan Daerah (Perda). Demikian ditegaskan Direktur Jenderal Kelautan, Pesisir dan Pulau-Pulau Kecil, Sudirman Saad, mewakili Menteri Kelautan dan Perikanan, pada pembukaanWorkshop Nasional Akselerasi Penyusunan Rencana Zonasi Wilayah Pesisir dan Pulau-pulau Kecil, di Jakarta, Kamis (21/11).\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana Zonasi menjadi alat kontroluntuk keseimbangan pemanfaatan, perlindungan pelestarian, dan kesejahteraan masyarakat sekaligus berfungsi &nbsp;memberikan kepastian dan perlindungan hukum dalam pemanfaatan perairanpesisir. &nbsp;Rencana zonasi memungkinkan untuk menata perairanwilayahpesisir agar tidak terjadi konflik dalam penggunaannya, dimana semua ruang dialokasikan pemanfaatannya secara transparan dan ilmiah sesuai dengan kelayakan dan kompatibilitas. Rencana Zonasi juga memastikan adanya perlindungan, pelestarian, pemanfaatan, perbaikan, dan pengkayaan &nbsp;sumber daya pesisir besertaekosistemnya secara berkelanjutan. “Rencana Zonasi juga mengakomodasikan kepentinganperlindungan wilayah masyarakat hukum adat di perairan pesisir yang sudah ada dan berlaku secara turun temurun.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Penetapan Zonasi, kataSudirman, &nbsp;mempunyai dampak positif, baik ekonomi, sosial, maupun lingkungan.China bisa menjadi contoh keberhasilan dalam menata wilayahpesisir. Negeri tirai bambu ini telah menyelesaikan seluruh tata ruang laut (Marine Functional Zoning) baik tingkat nasional, provinsi maupun tingkat Kabupaten tahun 2002 dan ditinjau kembali pada tahun 2011.Dari sisi Ekonomi, &nbsp;pemerintah pusat dan daerahpada 2012,memperoleh pendapatan atas lisensi perairan laut sebesar 9,68 miliar Yuan. Dari jumlah itu, 2,97 miliar Yuan masuk ke kas pusat dan 6,71 miliar Yuan mengalir ke kas daerah. “Contoh menarik lain adalah &nbsp;Norwegia, Tataruang laut diatur alokasi ruang untuk perikanan tangkap, perikanan budidaya, tambang minyak dan gas bumi, alur pelayaran dan konservasi sehingga harmonis dan bersinergi serta tidak saling mengganggu.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Penetapan zonasi wilayah pesisir merupakan bentuk &nbsp; tanggungjawab pemerintah untukmelindungi dan menciptakan keadilan di antara golongan masyarakat dalam mengakses sumberdayadi wilayah pesisir. Apalagi, perairan pesisir danlaut berlakurejim ‘open acces’. &nbsp;Praktiknya banyakterjadipermasalahan dan konflik kepentingan dalam pemanfaatannyawilayah pesisir. Bahkan,terjadi marginalisasi masyarakat pesisir,serta timbulnya dampak kerusakan terhadap lingkunganpesisir.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Dalam penyusunan zonasidiperlukan akselerasi secara tepat dan cermat untuk mengatasi kendala-kendala utamanya seperti keterbatasan kapasitas kelembagaan dan sumberdaya manusia, keterbatasan penganggaran, kendala-kendala teknis, serta masih kurangnya sosialisasi. Dukungan dan kerjasama dari semua pihak baik di pusat maupun daerah sangat diperlukan. Termasuk, &nbsp;dukungan lintas sektor dari BKPRN (Badan Koordinasi Penataan Ruang Nasional), Bappeda dan Dinas Kelautan Perikanan,serta SKPD terkait dengan pengelolaan wilayah pesisirserta antara Kelompok Kerja dengan BKPRD.“Tentunya juga tidak terlepas &nbsp;perlunya dukungan DPRD dalam pengalokasian anggaran untuk mengakselerasi &nbsp;Rencana Tata Ruang Wilayah atau RTRW dengan Rencana Zonasi Wilayah Pesisir dan Pulau-pulau Kecil atau RZWP3K.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>', 'berita/2a703b4ab5a0982f7f4736b6cdd5e4f5.jpg', '', 4, 1, '', '2014-02-11 09:04:16', '2014-02-11 00:00:00', '0000-00-00 00:00:00', 1, 2, 1),
(41, 'Merencanakan Pengelolaan Wilayah Pesisir  dan Pulau-pulau Kecil', 'Kebijakan pengelolaan wilayah pesisir dan pulau-pulau kecil di masa depan mestinya akan lebih baik. Apalagi dengan hadirnya dua Undang-Undang (UU), yakni UU No 27/2007  tentang Pengelolaan Wilayah Pesisir dan Pulau-pulau Kecil serta UU No. 17/2007 te', '<strong>Oleh: Dr. Ir. Subandono Diposaptono, M.Eng</strong>\r\n\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Kebijakan pengelolaan wilayah pesisir dan pulau-pulau kecil di masa depan mestinya akan lebih baik. Apalagi dengan hadirnya dua Undang-Undang (UU), yakni UU No 27/2007 &nbsp;tentang Pengelolaan Wilayah Pesisir dan Pulau-pulau Kecil serta UU No. 17/2007 tentang Rencana Pembangunan Jangka Panjang Nasional tahun 2005-2025.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Kita patut bersyukur memiliki payung hukum seperti itu. Pada UU No 17/2007 misalnya, dari 8 misi pembangunan nasional jangka panjang, satu di antaranya (misi no 7) adalah mewujudkan Indonesia sebagai negara kepulauan yang mandiri, maju, kuat, dan berbasiskan kepentingan nasional.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Jelas misi ini sangat relevan dengan konteks pengelolaan wilayah pesisir dan pulau-pulau kecil seperti tertuang pada UU 27/2007. Hal ini merupakan pilar penting dalam tata kelola negara kepulauan seperti &nbsp;diamanatkan dalam Rencana Pembangunan Jangka Panjang (RPJP).\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">RPJM (Rencana Pembangunan Jangka Menengah) I (2005-2009) sesuai dengan Peraturan Presiden (Perpres) No 7/2005 meletakkan fungsi pesisir dan laut dalam agenda meningkatkan kesejahteraan rakyat melalui strategi perbaikan pengelolaan sumber daya alam dan pelestarian fungsi lingkungan hidup, khususnya yang tercantum dalam sasaran pembangunan kelautan nasional.&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Perpres No 7/2005 memuat 10 sasaran pembangunan kelautan, di antaranya adalah membaiknya pengelolaan ekosistem pesisir, laut, dan pulau-pulau kecil yang dilakukan secara lestari, terpadu, dan berbasis masyarakat. Pengelolaan semacam ini sangatlah penting. Apalagi fakta menunjukkan, konflik antarpengguna kawasan pesisir kerap terjadi.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Karena itulah, dengan diterapkannya UU 27/2007 dalam mengelola pesisir dan pulau-pulau kecil diharapkan dapat meredam konflik pemanfaatan yang selama ini marak terjadi di berbagai kawasan pesisir dan pulau-pulau kecil di Indonesia. Hal ini tentu saja memerlukan perencanaan yang komprehensif dan terpadu serta harus mempertimbangkan keterkaitan ekosistem darat dan laut serta aspek bioekoregion.&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><strong>Wajib Disusun Pemda</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Perencanaan pengelolaan wilayah pesisir dan pulau-pulau kecil merupakan amanat UU 27/2007 yang wajib disusun oleh pemerintah daerah (provinsi dan kabupaten/kota). Perencanaan itu terdiri empat hierarki, yakni rencana strategis, rencana zonasi, rencana pengelolaan, dan rencana aksi pengelolaan wilayah pesisir dan pulau-pulau kecil.&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Berdasarkan keruangan (spasial), maka keempat hierarki perencanaan tersebut dapat dibedakan menjadi dua kelompok. Pertama, perencanaan yang sifatnya spasial yaitu rencana zonasi wilayah pesisir dan pulau-pulau kecil (RZWP-3-K).&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Kedua, perencanaan yang sifatnya nonspasial yaitu, rencana strategis wilayah pesisir dan pulau-pulau kecil (RSWP-3-K), rencana pengelolaan wilayah pesisir dan pulau-pulau kecil (RPWP-3-K), serta rencana aksi pengelolaan wilayah pesisir dan pulau-pulau kecil (RAPWP-3-K).\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">RSWP-3-K merupakan kebijakan publik yang dimaksudkan untuk memastikan upaya-upaya pengelolaan wilayah pesisir dan pulau-pulau kecil dapat menjadi arus utama dalam pembangunan. Dokumen ini memberikan arah kebijakan lintas sektor untuk perencanaan pembangunan melalui penetapan isu, tujuan, sasaran, dan strategi, serta target pelaksanaan dengan indikator pengelolaan pesisir dan pulau-pulau kecil yang tepat.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">RSWP-3-K juga harus disusun dengan mengacu kepada beberapa landasan dan ditujukan untuk mendorong peran serta dan keterpaduan antar pemerintahan, antar instansi, swasta, dan masyarakat dalam mengembangkan upaya pengelolaan wilayah pesisir dan pulau-pulau kecil secara komprehensif. Diharapkan dokumen yang telah disusun dapat menjadi acuan bagi semua instansi dan pihak yang terkait dalam pelaksanaan pengelolaan wilayah pesisir dan pulau-pulau kecil. Beberapa strategi harus dikembangkan sebagai panduan untuk menjabarkan program ke dalam rencana-rencana kegiatan.&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Sementara itu, strategi pelaksanaan rencana dirumuskan untuk mengarahkan implementasi rencana secara konsisten. Strategi adopsi dan pelembagaan dokumen dirumuskan dalam upaya memperkuat status legalitas dokumen serta memantapkan kedudukan dan fungsi dokumen RSWP-3-K dalam sistem perencanaan pembangunan dan penganggaran daerah.&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><strong><br />\r\n</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><strong>Membangun Komitmen</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">&nbsp;Hal terpenting dari upaya pengelolaan wilayah pesisir dan pulau-pulau kecil adalah terbangunnya komitmen semua instansi dan pihak yang terkait dalam pelaksanaannya. Oleh karena itu perlu dikembangkan kerja sama dan komunikasi yang harmonis antar stakeholder sehingga keterpaduan pengelolaan di daerah dapat terwujud secara maksimal.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Lalu bagaimana agar RSWP-3-K masuk dalam perencanaan pembangunan daerah? Dalam rangka menjamin konsistensi pelaksanaan dokumen RSWP-3-K yang sudah disusun, maka hasil tersebut perlu menjadi bagian dari proses perencanaan pembangunan daerah. Artinya Pemda perlu menyusun tata cara perencanaan pembangunan untuk menghasilkan rencana-rencana pembangunan jangka panjang, jangka menengah, dan tahunan yang telah memasukkan pengelolaan wilayah pesisir dan pulau-pulau kecil.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Dokumen RSWP-3-K diharapkan berfungsi sebagai instrumen yang akan dipakai sebagai referensi kebijakan dan program kegiatan dalam &nbsp;pengelolaan wilayah pesisir dan pulau-pulau kecil sampai dengan beberapa tahun ke depan &nbsp;oleh pemerintah daerah, swasta, dan masyarakat. Untuk mewujudkan hal tersebut, maka dokumen RSWP-3-K haruslah: (a) sejalan dan menjadi bagian dari sistem dan dokumen perencanaan pembangunan daerah, serta (b) dilaksanakan secara konsisten oleh masing-masing sektor, baik daerah maupun pusat.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Pada dasarnya, integrasi dokumen RSWP-3-K tersebut sejalan dengan sistem dan konsep perencanaan pembangunan yang ada (UU No. 25 Tahun 2004) sebagaimana ilustrasi pada Gambar 1. Tampak bahwa adopsi dan pelembagaan dokumen tersebut dilakukan dengan menjadikan dokumen RSWP-3-K sebagai input dalam penyusunan RPJMD (Rencana Pembangunan Jangka Mengengah Daerah), RKPD (Rencana &nbsp;Kerja Pemerintah Daerah), Renstra SKPD (Satuan Kerja Perangkat Daerah), dan Renja SKPD.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><strong>Kebijakan Lintas Sektor</strong>\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Dalam UU No 27/2007, yang dimaksud dengan rencana strategis adalah rencana yang memuat arah kebijakan lintas sektor untuk kawasan perencanaan pembangunan melalui penetapan tujuan, sasaran, dan strategi yang luas, serta target pelaksanaan dengan indikator yang tepat.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">RSWP-3-K memiliki durasi waktu hingga 20 tahun dan dapat ditinjau paling tidak selama 5 tahun sekali. &nbsp;RSWP-3-K harus mempertimbangkan isu strategis yang muncul dalam pengelolaan wilayah pesisir di daerah masing-masing seperti isu pemanfaat sumber daya, degradasi sumber daya pesisir dan laut, isu daerah potensi bencana, isu konflik antar pengguna sumber daya, dan lain-lain. &nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Pengertian rencana strategis dalam UU No 27/2007 ini sedikit berbeda dengan rencana strategis dalam UU No. 25/2004. Dalam UU 25/2004 yang dimaksud dengan rencana strategis adalah merupakan rencana pembangunan jangka menengah (RPJM), &nbsp;baik untuk kementerian/lembaga maupun Satuan Kerja Perangkat Daerah dan merupakan dokumen perencanaan dengan masa berlaku selama 5 tahun.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Sedangkan RSWP-3-K lebih mendekati definisi RPJP dalam UU No 25/2004, yaitu dokumen perencanaan untuk periode 20 tahun namun hanya dalam skala wilayah pesisir dan pulau-pulau kecil. Sebagai contoh untuk RPJP Daerah di mana rencana tersebut memuat visi, misi, dan arah pembangunan daerah yang mengacu pada RPJP Nasional.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">&nbsp;Namun demikian, yang tetap harus menjadi perhatian adalah peran Bappeda selaku badan pengkoordinasi di daerah. Bappeda memainkan peran yang sangat penting dalam hal memfasilitasi terlaksananya berbagai rencana yang sudah disepakati dalam dokumen RSWP-3-K dan harmonisasi dengan perencanaan yang sudah ada antara lain RPJMD dan RKPD.&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Instansi-instansi sektor selanjutnya memastikan bahwa dokumen SKPD telah menampung muatan RSWP-3-K, mereview, mengesahkan, atau menolak berbagai kegiatan yang tidak sejalan dengan kebijakan dan program pengelolaan wilayah pesisir dan pulau-pulau kecil yang telah disepakati bersama. Ilustrasi pemuatan isi RSWP-3-K dalam RPJMD dan &nbsp;RKPD&nbsp;\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\"><br />\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">Penulis adalah pemerhati coastal disaster, coastal environment, dan coastal management.\r\n</div>\r\n<div style=\\"\\\\&quot;text-align:\\" justify;\\\\\\"=\\"\\">\r\n</div>', '3', '', 5, 1, '', '2014-02-11 09:12:12', '2014-02-11 16:09:40', '0000-00-00 00:00:00', 1, 2, 1);
INSERT INTO `dtataruang_news_content` (`id`, `title`, `brief`, `content`, `image`, `thumbnailimage`, `categoryid`, `articletype`, `tags`, `createdate`, `postdate`, `expiredate`, `fromwho`, `authorid`, `n_status`) VALUES
(42, 'TATA RUANG LAUT', '', '<div style=\\"text-align: justify;\\">Oleh :\r\n</div>\r\n<div style=\\"text-align: justify;\\">Dr.Ir. Subandono Diposaptono, MEng&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sebagai negara kepulauan, &nbsp;dengan luas laut yang lebih besar dari daratan, &nbsp;maka sektor kelautan dan perikanan dapat merupakan salah satu keunggulan kompetitif untuk menggerakkan perekonomian nasional. Sejalan dengan semakin berkurangnya sumber daya alam dan jasa lingkungan daratan yang disebabkan antara lain oleh meningkatnya pemanfaatan sumber daya alam, jumlah penduduk dan pendapatan masyarakat, maka dorongan untuk memanfaatkan sumber daya kelautan dan perikanan saat ini dan mendatang cenderung semakin besar.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pembangunan sumberdaya kelautan pada saat ini menjadi andalan bagi Bangsa Indonesia untuk melakukan pembangunan ekonomi. Sesuai dengan kebijakan politik yang memacu desentralisasi, maka pengelolaan sumberdaya kelautan akan lebih banyak didelegasikan kepada pemerintah daerah. Hal ini tentu saja memberikan peluang yang lebih besar bagi daerah untuk mengelola dan memanfaatkan potensi kelautannya bagi kesejahteraan daerah. Namun disisi lain juga menciptakan kemungkinan eksploitasi sumberdaya hanya untuk memacu pertumbuhan daerah.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Strategi pemanfaatan sumber daya kelautan tersebut perlu diformulasikan secara tepat mengingat sumber daya alam kelautan dipandang sebagai milik umum (common property). Implikasi dari sikap yang demikian ini adalah bahwa setiap pengguna berusaha memanfaatkan sumber daya alam laut secara maksimal tanpa memperhatikan dampak negatif. Akibat yang ditimbulkannya adalah terjadinya tragedy of the common. Disamping itu ditengah euforia otonomi daerah yang berlebihan yang mana semboyan sekali merdeka, tetap merdeka disalah artikan menjadi “sekali merdeka, merdeka sekali”, mendorong daerah berupaya dengan berbagai cara untuk meningkatkan PAD yang sebesar-besarnya tanpa memperhatikan kelestarian lingkungan.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Memperhatikan hal tersebut, maka diperlukan strategi pegelolaan dampak lingkungan yang ditimbulkan akibat aktivitas pembangunan di wilayah pesisir dan laut. Oleh karena itu instrumen pengaturan ruang laut melalui tata ruang laut menjadi penting untuk menjaga lingkungan pesisir dan laut tetap lestari dan berkelanjutan.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Pada umumnya komponen biotik dan abiotik dari suatu wilayah pesisir dan lautan menyusun sistem lingkungan alam (ekosistem) yang paling kompleks di dunia. &nbsp;Sifat kompleks ini berpangkal dari kondisi lingkungan wilayah pesisir yang unik, yakni terletak di antara (peralihan) ekosistem darat dan laut. &nbsp;Faktor-faktor lingkungan yang bekerja di wilayah pesisir (seperti angin, gelombang, pasang surut, arus, sedimen dan salinitas) jauh lebih berfluktuasi dari pada yang terdapat di laut lepas maupun ekosistem perairan di darat (sungai dan danau). &nbsp;Selain itu, nilai (besaran, arah, dan konsentrasi) dari segenap faktor lingkungan tersebut juga berubah secara berangsur (gradual) dari arah darat ke laut lepas. &nbsp;Karakteristik hidrodinamika yang sangat dinamis (fluktuatif) inilah yang mengakibatkan pengelolaan wilayah pesisir, baik itu untuk kepentingan produksi biologi (perikanan tangkap dan budidaya), konstruksi atau coastal engineering (seperti pembuatan dermaga/jetty, marina, pemecah gelombang/breakwaters, dan bangunan lainnya), penambangan pasir laut, industri maritim maupun kepentingan pariwisata (selam, renang, selancar, dan berjemur di pantai) harus dikerjakan secara lebih hati-hati.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Oleh karena kondisi lingkungan yang unik dan fluktuatif seperti tersebut di atas, maka ekosistem-ekosistem (seperti mangrove, padang lamun, terumbu karang, dan estuaria) yang terdapat di dalam wilayah pesisir sudah beradaptasi dengan kondisi lingkungan semacam ini. &nbsp;Akan tetapi, suatu ekosistem pesisir dapat sangat tahan terhadap perubahan (gangguan) faktor lingkungan tertentu, tetapi sangat rentan (mudah rusak) akibat gangguan faktor lingkungan yang lain.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Karakteristik lain yang harus mendapat perhatian dalam pengelolaan wilayah pesisir adalah fakta bahwa ekosistem-ekosistem yang ada dalam sistem wilayah pesisir (seperti mangrove, padang lamun, terumbu karang, dan estuaria) saling terkait satu sama lain. &nbsp;Artinya, perubahan (kerusakan) yang menimpa suatu ekosistem pesisir (mangrove misalnya), maka pada gilirannya akan berdampak negatip terhadap ekosistem pesisir lainnya. Permasalahannya adalah bahwa dampak tersebut pada umumnya tidak terjadi seketika, tetapi memerlukan waktu (ada semacam time lag). &nbsp;Kenyataan ekologis inilah yang seringkali terabaikan dalam pengelolaan pembangunan pesisir yang terlalu berorientasi pada keuntungan jangka pendek.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Lebih jauh, wilayah pesisir juga terkait dengan segenap perubahan yang terjadi di luar sistem pesisir, baik itu yang terjadi di lahan atas (upland) maupun di laut lepas. &nbsp;Contohnya, penggundulan hutan di lahan atas akan menyebabkan erosi secara berlebihan, yang akhirnya menimbulkan laju sedimentasi di perairan pesisir secara berlebihan pula dan pada gilirannya dapat menimbulkan kematian organisme dasar perairan (bentos), terumbu karang, dan biota lain yang peka terhadap sedimentasi. &nbsp;Pembuatan dam (bendungan) yang memotong badan sungai akan menghalangi jenis-jenis ikan yang beruaya (migrasi) dari dan ke ekosistem pesisir (seperti ikan sidat, udang galah, dan salmon), sehingga dapat menurunkan produktivitas perikanan pesisir. &nbsp;Perubahan pola arus di laut lepas (samudera) dan dampak ikutannya, yakni perubahan suhu air dan pasokan (supply) unsur hara (nutrient) dapat secara nyata (significant) mempengaruhi populasi ikan di perairan pesisir, seperti yang terjadi terhadap penurunan ikan Anchovy (sejenis teri) di Peru dan ikan sardine (sejenis tembang) di Samudera Pasifik.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Dalam suatu wilayah pesisir biasanya terdapat beberapa tipe unit lahan atau unit perairan yang memiliki karakteristik biogeofisik-kimiwai yang berbeda. &nbsp;Sebagai konsekuensi logis, suatu wilayah pesisir pada umumnya dapat dimanfaatkan untuk lebih dari dua jenis kegiatan pembangunan. &nbsp;Misalnya wilayah pesisir Kodya Semarang, yang hanya memiliki panjang garis pantai sekitar 25km, dapat dimanfaatkan untuk kegiatan usaha tambak udang, perikanan tangkap tradisional, sawah, kebun, pelabuhan, dan pemukiman. Oleh karena itu, konflik pemanfaatan ruang maupun sumberdaya alam lebih sering terjadi di wilayah pesisir dari pada di wilayah daratan maupun laut lepas. &nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Isu kepemilikan lahan (land tenure) dan alokasi sumberdaya (resource allocation) merupakan sumber utama konflik yang acap kali terjadi di wilayah pesisir dan laut. &nbsp;Lahan, perairan laut dan sumberdaya alam yang terdapat di dalamnya (khususnya sumberdaya perikanan) merupakan milik bersama (common property resources), yang tidak adak hak kepemilikannya. &nbsp;Oleh karena itu, pemanfaatan sumberdaya alam pesisir biasanya mengikuti azas akses terbuka (open access). &nbsp;Artinya, siapa saja boleh memanfaatkan sumberdaya alam pesisir semaksimal mungkin dan kapan saja.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Pendekatan akses terbuka dalam pengelolaan pemanfaatan sumberdaya tidak berdampak negatip, apabila sumberdaya yang tersedia masih berlimpah, sedangkan tingkat pemanfaatnnya masih rendah. &nbsp;Kondisi ini umum dijumpai di komunitas masyarakat pesisir tradisional, dimana jumlah penduduk masih sedikit, teknologi pemanfaatan sumberdaya yang dugunakan masih sederhana, dan tujuan pemanfaatan pun hanya untuk memenuhi kebutuhan dasar hidupnya (subsisten) bukan untuk tujuan komersial. &nbsp;Ketika jumlah penduduk sudah besar, kualitas kehidupan masyarakat tinggi, dan tekonologi pemanfaatan sumberdaya pesisir sudah semakin canggih, maka kebijakan akses terbuka akan membawa kemusnahan sumberdaya (tragedy of the commons). &nbsp;Hal ini disebabkan oleh prilaku (attitude) pengguna sumberdaya yang berprinsip memaksimalkan keuntungan pribadi, tanpa menghiraukan kelestarian sumberdaya dan kepentingan pengguna lain.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Namun demikian, pola pemanfaatan sumberdaya pesisir yang dapat memberikan keuntungan bagi masyarakat secara keseluruhan biasanya tidak begitu menguntungkan bagi pengguna sumberdaya tertentu (swasta, BUMN, atau instansi pemerintah). &nbsp;Misalnya, pemanfaatan terumbu karang untuk tujuan konservasi, yakni wisata alam atau ecotourism, perikanan, pelindung pantai, dan sumber plasma nutfah dianggap kurang menguntungakan oleh para pengembang (developer) dibandingkan jika lahan terumbu karang tersebut digunakan untuk perhotelan, pemukiman mewah, atau pusat bisnis (business centre). &nbsp;Oleh karena itu, banyak lahan terumbu karang yang akahir-akhir ini direklamasi oleh para pengembang dan pemerintah daerah demi meraup keuntungan maksimal dalam jangka waktu yang singkat, tanpa memperhatikan kelestarian ekosistem pesisir dan kepentingan masyarakat luas. &nbsp;Padahal sebenarnya, dapat dicari pola pembangunan (reklamasi) yang dapat mengharmoniskan antara kepentingan jangka pendek dan kepentingan jangka panjang (konservasi atau kelestarian).&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Ruang Laut merupakan kesatuan geografis beserta segenap unsur terkait padanya yang batas dan sistemnya ditentukan berdasarkan aspek administrative dan atau aspek fungsional. Ruang Laut berdasarkan aspek administrasi dapat dibedakan menjadi aspek ruang laut nasional, ruang laut propinsi, dan ruang laut kabupaten/kota yang merupakan satu kesatuan yang baik visi, misi dan kebijakan makronya.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Berdasarkan UU No. 26/2007, Pasal 6 ayat (3) penataan ruang wilayah nasional meliputi wilayah yurisdiksi dan wilayah kedaulatan nasional yang mencakup ruang darat, ruang laut, dan ruang udara, termasuk ruang di dalam bumi sebagai satu kesatuan. Ruang laut ditinjau dari wilayah yurisdiksi dan wilayah kedaulatan nasional meliputi perairan pedalaman, laut kepulauan dan laut territorial. Laut territorial adalah laut yang berada di luar garis pangkal kearah laut lepas yang bagi suatu Negara kepulauan berada di sebelah luar garis pangkal lurus kepulauannya, dan lebarnya maksimum sampai 12 mil laut. Ruang laut dalam konstelasi kedaulatan nsional dapat meliputi juga wilayah ZEE dan Landas Kontinen (UNCLOS 1982).\r\n</div>\r\n<div style=\\"text-align: justify;\\">Undang-Undang Nomor 32 Tahun 2004 tentang Pemerintahan Daerah telah menyerahkan kewenangan – kewenangan tertentu dalam pengelolaan wilayah pesisir, termasuk perairan pantai sampai sejauh 12 mil dari garis pantai, menjadi kewenangan otonom pemerintah daerah. Selanjutnya untuk mengimplementasikan kewenangan baru atas ruang lautan ini pemerintah daerah perlu merumuskan kebijakanpengaturan atas pemanfaatan bagian laut yang berbatasan dengan pantainya (Suparman, 2007.)\r\n</div>\r\n<div style=\\"text-align: justify;\\">&nbsp;<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Aspek fungsional dalam penataan ruang laut misalnya adalah memalui pendekatan ekosistem / unit geografis tertentu. Pendekatan penataan ruang menggunakan metode sel sedimen merupakan salah satu contohnya. Disamping itu menggunakan metode yang lain untuk penataan ruang wilayah dengan karakteristik tertentu misalnya pengelolaan kawasan DAS, teluk, Eustuaria, dll.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Hasil analisis yang dihasilkan kemudian digunakan sebagai dasar penyusunan rencana tata ruang laut. Penyusunan rencana tata ruang laut mencakup scenario rencana tata ruang laut, konsep rencana tata rauang laut, strategi rencana tata ruang laut, rencana tata ruang laut yang terdiri dari rencana struktur dan pola ruang, jangka waktu perencanaan dan skala peta rencana, indikasi program, peraturan zonasi, dan kelengkapan muatan rencana tata ruang laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Skenario rencana tata runag laut ditentukan dalam rangka memprediksi rencana pengembangan kegiatan yang akan dilakukan, terutama arahan kegiatan yang bukan berdasarkan proyeksi kegiatan eksisting. Selain ini, scenario rencana juga dilakukan dalam rangka menjustifikasi penentuan arahan kegiatan berdasarkan proyeksi kegiatan eksisting.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Hasil analisa yang diperoleh menjadi dasar pertimbangan penyusunan rencana tata ruang laut. Konsep rencana tata ruang laut menggambarkan potret awal rencana tata ruang laut yang dihasilkan dari hasil analisa tersebut. Konsep ini mendeliniasi pola ruang dari ketiga dimensi ruang laut serta keterkaitan system antar kegiatan yang ada dan penentuan pusat-pusat kegiatannya. Konsep tersebut dijabarkan untuk mendukung pencapaian tujuan dan sasaran yang diharapakan dalam rangka penyusunan rencana tata ruang laut yang dilakukan. Konsep ini kemudian akan dijabarkan dalam rencana struktur ruang laut dan rencana pola ruang laut. Contoh mengenai konsep rencana tata ruang laut kawasan Teluk Jakarta untuk penempatan bagan tancap dan rakit kerang hijau.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Strategi rencana tata ruang Penentuan &nbsp;strategi rencana tata ruang laut identik dengan penentuan strategi rencana tata ruang darat. Strategi rencana tata ruang lautmenjabarkan pendekatan pencapaian tujuan dan sasaran yang kemudian akan diterjemahkan dalam konsep rencana tata ruang yang disusun. Contoh uraian mengenai strategi rencana tata ruang laut kawasan Teluk Jakarta untuk penempatan bagan tancap dan rakit kerang hijau.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Berdasarkan kepada UU No. 26 tahun 2007 tentang Penataan Ruang, rencana tata ruang wilayah meliputi ruang darat, laut, dan udara serta isi dalam bumi. Oleh karena itu rencana tata ruang laut merupakan komplementer untuk rencana tata ruang wilayah yaitu Rencana Tata Ruang Wilayah Nasional (RTRWN), Rencana Tata Ruang wilayah Propinsi (RTRWP) dan Rencana Tata Ruang Laut Wilayah Kabupaten/Kota (RTRWK). Rencana Tata Ruang Laut dapat pula merupaka rencana kawasan strategis yang dominan wilayahnya adalah laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Merencanakan ruang laut sedikit berbeda dengan merencanakan ruang darat. Prinsip dasar yang harus diperhatikan dalam menyusun rencana tata ruang laut adalah:\r\n</div>\r\n<div style=\\"text-align: justify;\\">1.<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Kegiatan yang berlangsung pada ruang laut bersifat dinamis dan statis. &nbsp;Contoh konkrit aktivitas di laut yang betrsifat dinamis adalah kegiatan pelayaran, alur migrasi ikan dan aktivitas wisata bahari, seperti snorkling, diving, selancar. Sementra itu contoh aktivitas laut yang bersifat statis adalah, permukiman atas air, Rig pertambangan, bagan tancap, bagan apung, dll.\r\n</div>\r\n<div style=\\"text-align: justify;\\">2.<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Ruang laut memiliki tiga dimensi yaitu permukaa, kolom dan dasar laut. Pada masing-masing dimensi dapat dilakukan aktivitas yang berbeda dalam suatu zona yang sama, dan bias dalam waktu yang sama pula. Contoh konkrit adalah penggunaan dasar laut untuk kabel pipa bawah laut, kolomnya untuk daerah migrasi ikan dan permukaannya untuk alur pelayaran, dan masih banyak kombinasi kegiatan yang lain, baik antara kegiatan yang statis, antara kegiatan yang dinamis atau kombinasi kegiatan statis dan dinamis.\r\n</div>\r\n<div style=\\"text-align: justify;\\">3.<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Penetapan jangka waktu perencanaan, prediksi jangka waktu perencanaan ruang laut dipengaruhi oleh sumberdaya (resources) yang dikembangkan oleh masing-masing kegiatan. Generalisasi jangka waktu perencanaan, seperti yang dilakukan dalam metrencanakan ruang darat, menjadi suatu kendala dalam menyusun rencana tata ruang laut apabila kegiatan yang dikembangkan pada suatu lokasi tertentu berdasar pada sumbernya (resources) yang ada di lokasi tersebut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Struktur ruang diwujudkan sebagai pusat-pusat permukiman yang merupakan sentra aktivitas kegiatan atau pusat kegiatan dalam jangkauan pelayanan tertentu. Struktur ruang dalam suatu wilayah perencanaan memiliki hirarki berdasarkan jangkauan pelayanannya, mulai dari hirarki paling tinggi yang memiliki jangkauan pelayanan &nbsp;lebih jauh sampai pada hirarki terendah yang memiliki pelayanan lebih dekat. Pusat kegiatan yang berkembang pada ruang laut diwujudkan dalam berbagai aktivitas diantaranya permukiman, perikanan tangkap dan budidaya, pelabuhan perikanan, pel;abuhan umum, wisata bahari, pertambangan, dan jasa kelautan. Dala lingkup perencanaan wilayah, pusat kegiatan ini berfungsi sebagai pusat permukiman, pada kedudukan hirarki tertinggi, menengah atau terendah, berdasarkan akajian dalam suatu unit wilayah perencanaan (Nasional, Provinsi, Kabupaten/Kota). Untuk lingkup ruang laut, pusat permukiman ini hirarkinya, di posisikan sesuai dengan kajian unit analisi pada cakupan ruang laut yang direncanakan.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Struktur ruang dalam penyusunan rencana tata ruang laut untuk multi sektor, yaitu rencana tata ruang laut wilayah nasional (RTRWN), rencana tata ruang wilayah laut Propinsi (RTRWP), rencana tata ruang laut wilayah kabupaten/kota (RTRWK), harus dilakukan secara terpadu antar ruang darat, laut, udara. Unit analisa yang digunakan dalam menyusun rencana struktur &nbsp;ruang laut sebaiknya mempertimbangkan dan memperhitungkan keterkaitan unit analisa tersebut untuk perencanaan wilayah darat maupun udara. Pada sisi yang lain, penyusunan rencana struktur ruang untuk suatu sector tertentu, misalnya sektor perikanan, berimplikasi pada penentuan &nbsp; lokasi pusat kegiatan. Lokasi ini pada akhirnya berfungsi sebagai lokasi pusat kegiatan atau pusat pengembangan (pusat pemukiman) dalam kontelasi wilayah yang lebih luas, yaitu kabupaten/kota, provinsi atau nasional, atau sebagai titik pusat pengembangan yang mendukung funsi salah satu pusat pengembangan (pusat pemukiman) pada konstelasi perencanaan regionalnya (wilayah kabupaten/kota, provinsi, atau nasional).\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana pola ruang laut perlu memperhatiakn keberadaan kegiatan pada ketiga dimensi ruang laut (permukaan, kolom dan dasar laut) serta memperhitungkan kemungkinan keberadaan suatu kegiatan pada ketiga dimensi ruang tersebut berdasarkan prediksi potensi yang masih tersedia. Penyusunan rencana pola ruang laut sedikit berbeda dengan penyusunan pola ruang darat. Kegiatan-kegiatan yang berlangsung pada ruang darat dan laut sama-sama ada yang bersifat statis dan dinamis, tetapi alokasi pola ruang darat dan pola ruang laut harus dibedakan. Pada ruang darat, pola ruang untuk jalan sifatnya statis dan rigid, sehingga tidak dapat digunakan untuk fungsi kegiatan lain, misalnya jalan umum tidak dapat digunakan sebagai taman. Sementara iu alur pelayaran pada ruang laut sifatnya dinamis, artinya zona alur pelayaran dapat diperuntukkan juga untuk kegiatan lain misalnya alur kapal perikanan. Pada sisi yang lain, rencana pola ruang darat dengna pola ruang laut harus dibedakan berdasarkan dimensinya. Pada ruang darat kita mengenal 1 (satu) dimensi ruang, sementara itu pada ruang laut kita mengenal 3 (tiga) dimensi ruang. Hal ini sangat mempengaruhi proses penyusunan rencana pola runag yang dilakukan. Oleh Karena itu, rencana pola ruang disusun untuk ketiga dimensi ruang yang ada, yaitu permukaan, kolom dan dasar laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana pola runag laut disusun berdasarkan analisis huabuanga fungsional kegiatan dan kesesuaian lahan / ruang seperti halnya yang diterapkan pada penetapan pola rung darat. Perbedaan yang perlu diperhatikan untuk menyusun pola ruang laut adalah dimensi ruangnya. Pola ruang laut yang ditetapkan adalah pola ruang untuk ketiga dimensi ruang laut. Peta rencana pola ruang laut mengakomodasi 3 (tiga) layer penetapan pola ruang dari masing-masing dimensi (permukaan, kolom dan dasar laut). Pada masing-masing dimensi, pola ruang laut dapat mengakomodasi kegiatan yang multi fungsi sehingga alokasi ruanggannyapun bisa overlapping pada satu zona tertentu. Pola ruang laut yang mengakomodasi lebih dari satu kegiatan pada suatu zona yang sama pada waktu tertentu yang sama pula harus dilengkapi dengan peraturan zonasi yang akan mengatur mekanisme system pelaksanaan kegiatannya termasuk manajemen waktu pemanfaatan dari masing-masing pola untuk setiap kegiatan,selain peraturan zonasi yang mengatur ketentuan-ketentuan masing-masing pola ruang yang ditetapkan. Satu hal lagi yang berbeda pada saat menyusun rencana pola ruang darat dengan pola ruang laut adalah pada saat menetapkan zona peruntukan dalam satu wilayah perencanaan. Rencana pola ruang laut akan mengakomodasi zona-zona peruntukan kegiatan yang direncanakan. Wilayah perencanaan ruang laut yang direncanakan tidak selalu terbagi habis atas zona-zona peruntuka yang teridentifikasi. Berikut contoh rencana pola ruang laut untuk satu sector di Indonesia dan contoh rencana pola ruang laut multi sector di Negara lain. Rencana pola ruang laut yang diterapkan di Indonesia masih belum mempertimbangkan pemanfaatan ruang yang multi use, yaitu pemanfaatan ruang pada satu area tetentu yang dimanfaatkan &nbsp; oleh lebih dari satu sektor pada waktu yang bersamaan. Untuk masa yang akan datang, kegiatan pembangunan yang menggunakan ruang laut akan semakin marak, kompleks dan dapat memicu konflik kepentingan antar sektor/pihak. Oleh karena itu pendekatan perencanaan yang dilakukan pada ruang laut harus memperhatikan pemanfaatan ruang yang multi use tersebut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana pola ruang pada layer permukaan laut mendeliniasi batasan area lisensi yang diperoleh suatu perusahaan untuk mengeksplorasi sumberdaya kelautan dan batasan area rekreasi pelayaran, serta jaringan alur (rute) kapal wisata, juga area aktif eksplorasi.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana pola ruang pada layer kolom laut mendeliniasi batasan area penangkapan ikan, berdasarkan ikan yang terdapat pada area kolom laut tersebut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana pola ruang pada later dasar laut tersebut mendeliniasi likasi konservasi dan lokasi cagar laut dan cagar budaya laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Seperti yang telah dipaparkan di atas bahwa penetapan jangka waktu perencanaan, prediksi jangka waktu perencanaan ruang laut dipengaruhi oleh sumberdaya (resources) yang dikembangkan oleh masing-masing kegiatan. Generalisasi jangka waktu pencemaran, seperti yang dilakukan dalam merencanakan ruang darat, menjadi suatu kendala dalam menyusun rencana tata ruang laut apabila kegiatan yang dikembangkan pada suatu lokasi tertentu berdasar pada sumberdaya (resources) yang ada di lokasi tersebut. Hal ini menuntut kearifan para penyusun rencana tata ruang laut untuk melakukan justifikasi –justifikasi terhadap jangka waktu perencanaan yang dilakukan di wilayah darat sebagai satu kesatuan produk rencana tata ruang wilayah/propinsi/kabupaten/kota. Justifikasi-justifikasi tersebut dapat dituangkan dalam peraturan zonasi yang disusun.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Mengacu pada keterbatasan data dan peta yang ada, bahwa rencana tata ruang laut menggunakan peta batimetri sebagai peta dasar, maka skala yang dipakai sebaikany adalah skala regional. Undang-undang No.26 tahun 2007 mengamanatkan bahwa skala peta akan ditetapkan dalam peraturan pemerintah. Oleh karena itu skala peta rencana yang dibuat mengacu pada peraturan tersebut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana tata ruang laut yang telah selesai disusun, perlu dilengkapi dengan indikasi program. Proses penentuan indikasi program untuk rencana tata ruang laut similar dengan penentuan indikasi program rencana tata ruang darat. Indikasi program merupakan tahapan proses pelaksanaan perencanaan yang telah disusun\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana tata ruang laut yang disusun perlu dilengkapi dengan aturan-aturan pemanfaatan zona yang dibuat (Peraturan Zonasi . serupa halnya pada saat menyusun tata ruang darat, peraturan zonasi meliputi hal-hal yang tekait dengan standar-standar kebutuhan pengembangan , seperti kepadatan, standar konstruksi, dll. Keunikan sifat ruang laut menuntut adanya penambahan aturan dalam peraturan zonasi yang dibuat, yaitu aturan mengenai kemungkinan beragamnya pemanfaatan ruang (multi use/ multi fungsi). Dan mediasi konflik akibat beragamnya kegiatan yang ada tersebut, sebagaimana diuraikan berikut ini.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Kelengkapan muatan rencana tata ruang laut merupakan prasyarat minimum kajian dan arahan yang diperlukan dalam rangka melengkapi hasil rencana tata ruang laut yang disusun. Kelengkapan ini yaitu: diversufikasi ekonomi sumberdaya, multifungsi penggunaan ruang laut dan mediasi konflik, sebagaimana diuraikan berikut ini.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Salah satu variable analisa ekonomi yang digunakan untuk menyusun rencana tata ruang laut adalah sumberdaya (resources). Pada uraian sebelumnya disampaikan bahwa hal ini akan mempengaruhi variasi jangka waktu dari kegiatan-kegiatan yang dilakukan, khususnya bagi kegiatan0kegiatan yang berdasarkan pada sumberdaya (resources) oleh karena itu deskripsi mengenai pengaliha fungsi suatu kegiatan pasca produksi dari suati sumberdaya perlu ternmuat pula dalam dokumen tata ruang laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Potensi sumberdaya kelautan dan perikanan yang tinggi mengakibatkan semakin banyaknya sector-sektor yang akan mengembangkan kegiatanny dan memanfatkan ruang laut. Kesempatan multi fungsi penggunaan ruang laut perlu mencapai situasi kesepakatan (win-win solution) multi – sector yang terlibat berdasarkan kompatibilitinya.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Kebutuhan pengembangan ruang laut pada masa yang akan datang biasanya bertujuan untuk memenuhi kebutuhan social-ekonomi dan kelestarian lingkungannya. Oleh karena itu, penyusunan rencana tata ruang laut dapat mengakomodasi kepentingan multi-sektor pada satu area yang sama. Konflik kepentingan antar sector mungkin saja muncul saat rencana tata ruang laut diimplementasikan pada waktu yang akan datang. Sebagai ilustrasi, konflik yang mungkin muncul antara sector perikanan dan sector pertambangan dan energy. Langkah awal adalah mendeskripsikan tujuan utam dari pengembangan kegiatan sector tersebut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Mengacu pada UU No.26 tahun 2007 tentang penataan ruang, rencana tata ruang laut disusun secara terintegrasi antara ruang darat, ruang udara dan ruang dalam bumi untuk menghasilkan suatu rencana tata ruang wilayah (RTRW) Propinsi/ kabupaten/ kota. Bappeda bertanggung jawab untuk mengintegrasikan penyusunan RTRW ini. Focus untuk substansi rencana tata ruang laut, Dinas Perikanan dan Kelautan Propinsi/Kabupaten/Kota mengemban tugas untuk menjabarkan rencana tata ruang laut dan bertanggung jawab untuk menyampaikan muatan rencana tata ruang laut ini kepada Bappeda yang selanjutnya berkordinasi dengan sector terkait lain. Departemen Kelautan dan Perikanan menfasilitasi Dinas Perikanan dan Kelautan untuk menyusun substansi materi tata ruang laut. Kelembagaan yang bertugas untuk mengimplementasikan rencana tata ruang laut mutlak perlu ada. Struktur kelembagaan diperlukan untuk mengimplementasikan rencana tata ruang laut berdasarkan indikasi program yang dikeluarkan melalui rencana tata ruang laut yang dibuat.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Mekanisme dan system kelembagaan yang disusun bias melibatkan institusi di luar daerah perencanaan, khususnya untuk mengembangkan program-program kerjasama antar daerah/Negara yang diperlukan untuk mengimplementasi rencana tata ruang laut yang memiliki keterkaitan dengan daerah/negara lain.\r\n</div>\r\n<div style=\\"text-align: justify;\\">UU No.26 tahun 2007 tentang penataan ruang mengamanatkan bahwa Rencana tata rung wilayah disusun secara terpadu,oleh karena itu rencana tata ruang laut adalah komplementer terhadap rencana tata ruang darat, dan disusun sebagai bagian muatan rencana tata ruang wilayah. Rencana tata ruang laut disahkan dengan peraturan daerah (Perda) mengenai rencana tata ruang wilayah propinsi/Kabupaten/Kota. Rencana tata ruang laut yang disusun untuk pengembangan satu sector tertentu merupakan bagian dari rencana tata ruang wilayah (Nasional/Propinsi/kabupaten/Kota), khususnya deliniasi arahan pengembangan pada ruang lautnya.\r\n</div>\r\n<div style=\\"text-align: justify;\\">&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">&nbsp;&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Menata Wilayah Laut\r\n</div>\r\n<div style=\\"text-align: justify;\\">Perjuangan Indonesia atas konsep wilayah laut bagi negara kepulauan telah membawa dampak signifikan &nbsp;bagi perkembangan Wilayah laut dengan disertai dengan hak-hak serta kewenangan dalam pengelolaannya. Laut telah berkembang menjadi ast nasional sebagai wilayah kedaulatan, ekosistem, sumbrdaya yang dapat bertindak sebagai sumber energi, sumber Bahan makanan, sumber bahan farmasi, serta berperan sebagai media lintas laut antar pulau, media pertukaran sosial budaya, kawasan perdagangan, dan wilayah pertahanan keamanan.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Beragamnya pemanfaatan laut menuntut adanya pengaturan yang tegas guna menghindari konflik pemanfaatan ruang di laut. Mengingat luas perairan dan kompleksitas karakter perairan di Indonesia, maka diperlukan suatu konsepsi melalui pendekatan secara makro dan mikro dalam penataan wilayah laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pendekatan secara makro dimaksudkan sebagai langkah pengenalan karakter dan perkiraan prioritas pemanfaatan yang dapat ditetapkan pada suatukawsan perairan, melalui pengelompokan &nbsp;kawsan perairan. Sedangkan pendekatan secara mikro merupakan langkah-langkah penetaapan jenis dan batas-batas pemanfaatan lahan laut berdasarkan prioritas pemanfaatan di suatu kawsan perairan yang telah ditetapkan sebelumnya. Pendekatan mikro ini lebih ditekankan pada peninjauan terhadap ketersediaan sumberdaya, sifat dinamika laut, kerentanan bencana, kerentanan konflik pemanfaatan ruang dan daya dukung lahan laut. Di samping itu penetapan jenis dan batas pemanfaatan lahan laut didasrkan pada aspek aspek ekonomi, ekologi dan sosial budaya. &nbsp; &nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Kawasan perairan dan pulau-pulau di Indonesia secara geologis terbentuk secara kompleks. Bentukan-bentukan yang terjadi selama perjalanan waktu, telah memberikan karakteristik-karakteristik dengan spektrum keanekaragaman yang cukup besar, bukan hanya dari segi ukuran, namun juga aspek terkait lainnya.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Kondisi dinamika oseanografi menyangkut gelombang, pasang surut, arus, salinitas, suhu dan lainnya di perairan dangkal seperti halnya kawasan Kepulauan Riau, akan berbeda pada kawasan pulau di perairan dengan kedalaman lebih besar di daerah Maluku dan sekitarnya. Selanjutnya apabila diamati secara seksama, maka morfologi pantai dan jenis bencana alam yang dapat terjadi pun berbeda dari satu kawasan ke kawasan lainnya.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Kondisi alam ini memberikan keanekaragaman hayati yang berbeda pula. Jenis ikan yang hidup dan ditangkap oleh masyarakat sekitar merupakan karakteristik masing-masing kawasan. Pola kehidupan, adat istiadat, perkembangan teknologi, dan budaya masyarakat setempat secara langsung dan tidak langsung terbentuk oleh kondisi alam yang ada. Keyataan ini merupakan salah satu dampak yang diakibatkan oleh karakteristik alam yang berbeda dengan salah satu penyebabny adalah genesis atau proses pembentukan pulau dan perairannya.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Wilayah Indonesia secara geologi mempunyai genesis yang berbeda-beda. Hal ini disebabkan wilayah ini merupakan hasil dari proses interaksi pergerakanlempeng tektonik yang sangat besar, yaitu Lempeng Benua Asia, Lepemg Samudra Hindia, Lempeng Benua Australia, dan Lempeng Samudra Pasifik, maupun lempeng lain yg lebih kecil. Tumbukan lempeng tersebut secara fisik akan membentuk topografi yang khas, diantaranya adalah munculnya daratan yang lebih tinggi dari muka air laut pada saat pasang atau lebih dikenal sebagai pulau dan kawasan yang terendam air membentuk laut antar pulau.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Tumbukan frontal antara lempeng samudra dengan lempeng benua yang terjadi di sepanjang selatan Pulau Jawa hingga Pulau Timor dan di sebelah barat pulau Sumatera, secara alami membentuk jajaran pulau dan perairan di sekitarnya yang dapat dikelompokkan menjadi 3 katergoti, meliputi :\r\n</div>\r\n<div style=\\"text-align: justify;\\">(1)<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Cekungan busur muka (fore arc basin) seperti terdapat di wilayah Kepulauan Nias dan perairan di sekitarnya\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">(2)<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Busur vulkanik (volcanic arc) mencakup wilayah Pulau Sumatera, Pulau Jawa, Pulau Bali, Pulau Krakatau, dan pulau-pulaul lain (yang terbentuk oleh kegiatan gunung api aktif), serta\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">(3)<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Cekungan busur belakang (back arc basin) meliputi Kepulauan Karimunjawa, pulau Bawean, Kepulauan Seribu, dan pulau-pulau lainnya.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sementara itu, kawasan yang terbentuk sebahai akibat proses pemekaran lempeng samudera (sea floor spreading) adalah di wilayah pulau-pulau kecil di perairan Selat Makasar. Sedangkan kawasan di sekitar Pulau Bangka, Belitung, Batam, Bintan, dan pulau lain di perairan Kepulau Riau merupakan ciri khas genesis tepi benua atau continental margin. Suatu proses akibat sistem sistem morfologi tinggian, sebelum terjadinya proses pencairan es atau pada masa genang laut secara golbal. Variasi pembentukan lainnya adalah pertumbuhan koloni terumbu karang yang ternyata masih banyak terdapat di kawasan perairan Indonesia.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Atas dasar pengamatan secara emphiris, maka faktor genesa dapat dijadikan salah satu faktor dalam pendekatan secara makro untuk mengetahui karakter dan perkiraan prioritas pemanfaatan suatu kawasan perairan melalui suatu pengelompokan kawasan perairan, meliputi perilaku dinamika osenografi, hidrogarafi, geologi, morfologi, potensi biota laut, tingkat kerawanan bencana, dan iklim adalah elemen dasar utama di samping budaya dan demografi.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Selanjutnya penetapan prioritas pemanfaatan suatu kawasan perairan dilakukan berdasarkan fungsi pemanfaatan, meliputi:\r\n</div>\r\n<div style=\\"text-align: justify;\\">(1)<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Fungsi Ekonomi\r\n</div>\r\n<div style=\\"text-align: justify;\\">Fungsi ekonomi dimaksudkan sebagai kebijakan secara makro bahwa suatu kawasan perairan ditetapkan sebagai kawasan pertumbuhan ekonomi. Berdasarkan karakter yang dimiliki setiap kelompok perairan dapat diperkirakan seperti halnya arahan komoditi unggulan, kebutuhan infrastruktur, arahan kelembagaan, arahan format jaringan pemasaran produk, ataupun perkiraan tingkat kerawanan bencana. Hal ini dapat memberikan masukan dalam penyusunan skala prioritas pemanfaatan di kawasan perairan tersebut.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">(2)<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Fungsi Pertahanan dan Keamanan\r\n</div>\r\n<div style=\\"text-align: justify;\\">Dalam konsep negara maritim, laut memiliki arti penting pada konteks kedaulatan dan keamanan negara. Fungsi pertahanan dan keamanan dimaksudkan sebagai upaya menempatkan fungsi pulau-pulau kecil di suatu kawasan perairan sebagai titik pangkal teritorial maupun basis pangkalan petahanan negara dalam rangka menjaga kedaulatan wilayah nusantara.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Di samping itu pada beberapa kawasan perairan tertentu memiliki kerawanan terhadap penyelundupan, praktek penangkapan ikan secara ilegal, perompakan, ataupun tindakan kejahatan lainnya. Pada kawasan perairan yang memiliki indikasi sebagai wilayah rawan kejahatan penetapan fungsi pertahanan dan keamanan menjadi prioritas. Pengetahuan terhadap karakter kawasan dapat memberikan masukkan signifikan terhadap pola pengembangan kawasan perairan tersebut sebagai basis keamanan terhadap tindakan kejahatan di laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">(3)<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Fungsi Konservasi\r\n</div>\r\n<div style=\\"text-align: justify;\\">Fungsi ini dimaksudkan sebagai langkah mempertahankan kelangsungan suatu kondisi alam, sosial, budaya, ataupun kearifan lokal ditemukan pada suatu kawasan perairan atau pulau. Penetapan fungsi ini dapat berarti bahwa kawasan tersebut dapat dijadikan sebagai kawasan konservasi dan atas kajian dan pertimbangnan lebih kanjut dapat ditetapkan sebagai kawasan lindung.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Secara garis besar pendekatan secara makro sebagai langkah awal dalam penataan wilayah laut. Pengelompokkan kawasan perairan berdasarkan genesanya dapat memberikan gambaran awal terhadap potensi yang dimiliki pada setiap kelompok kawasan dan penetapan fungsi pemanfaatan kawasan perairan bertindak sebagai pedoman awal terhadap prioritas pemanfaatan.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Konflik Pemanfaatan Ruang Laut\r\n</div>\r\n<div style=\\"text-align: justify;\\">Langkah selanjutnya dalam upaya menata wilyah laut adalah pendekatan lebih detail pada setiap kawasan perairan. Mengingat fungsi laut sebagai sumber daya yang dapat dikonversi sebagai nilai lebih ekonbomi, maka aktivitas manusia dalam kaitan kepentingan pemanfaatan sumber daya laut memperlihatkan adanya kecenderungan tidak memperhatikan fungsi laut lainnya. Tanpa pengaturan yang tegas dalam pemanfaatan laut akan dapat berdampak pada konflik pemanfaatan ruang di laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Penanganan pasir laut di sekitar Kepulauan Riau yang pada tahun 2002 sempat hangat diperbincangkan secara nasional pada dasarnya merupakan studi kasus yang sangat menarik untuk dicermati sebagai masalah penangannan konflik pemanfaatan ruang laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Di satu sisi, adanya anggapan bahwa kegiatan penambangan pasir laut dapat berdampak negatif pada ekosistem pulau-pulau kecil, kelangsungan hidup nelayan tradisional, wisata bahari dan sektor terkait lainnya. Di sisi lain, ada pendapat kegiatan penambangan pasir laut “tetap dipertahankan” karena aktivitas ini diharapkan mampu memberikan kontribusi sebagai pemasok devisa.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pasir laut adalah endapan mineral yang terhampar pada dasar pantai yang sangat sensitif terhadap adanya perubahan keseimbangan. Terganggunya keseimbangan endapan yang awalnya bersifat likuid ini akan segera berubah menjadi uspended. Sebaran material lepas yang terbawa oleh air laut dapat bertindak sebagai faktor pengubah keseimbangan alam lainnya yang dapat berdampak pada kelangsungan hidup terumbu karang, berlanjut pada kehidupan ikan, dan mungkin mata rantai berikutnya terganggunya aktivitas selam sebagai atraksi wisata bahari atau berdampak pada nelayan tradisional dengan menurunnya jumlah tangkapan ikan. Seberapa jauh dampak negatif yang ditimbulkan akibat penambangan pasir laut terhadap sektor lain, tidak dinas secara khusus disini karena perlu adanya kajian tersendiri. Namun permasalahan penambangan pasir di Kepulauan Riau telah meberikan gambaran yang jelas tentang adanya konflik pemanfaatan ruang laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pembangunan bagan-bagan ikan di laut ataupun lahan budidaya rumput laut yang pada akhir-akhir ini berkembang cukup pesat, telah meningkatkan nilai kerawanan terhadap konflik pemanfaatan ruang di laut. Di samping adanya indikasi penurunan kualitas lingkungan, penempatan bagan-bagan tanpa pengaturan yang telah berdampak terganggunya jalur pelayaran. Sementara itu masihlah banyak kasus konflik pemanfaatan ruang laut di Indonesia. Kenyataan ini semakin memperkuat konsepsi kewilayahan dalam pengelolaan laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Penataan Wilayah Laut\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sifat laut sebagai ruang yang pada setiap segmennya baik secara vertikal maupun horizontal memiliki potensi yang dapat dimanfaatkan untuk suatu peruntukan tertentu merupakan perbedaan mendasar antara penataan ruang darat dan laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Perhatikan gamabar 2.5 secara horizontal pada wilayah permukaan laut dimanfaatkan sebagai jalur pelayaran baik penumpang maupun barang, demikian pula pada area sekitar pantai dimanfaatkan sebagai lahan budi daya rumput laut ataupun area pertambakan. Pada area kolom air merupakan area penangkapan ikan atau spot plah raga selam. Pada dasar laut sering digunakan sebgai pemasangan jalur kabel komunikasi dan jalur pipa serta di area pada perairan tertentu di samping mengandung mineral juga ditemukan kapal tenggelam yang bermuatan benda berharga. Sedangkan tanah di dasar laut dapat merupakan area cadangan minyak dan gas.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Penataan wilayah laut pada dasarnya diperlukan dalam kaitannya pengaturan pemanfaatan laut secara optimal dengan mengakomodasi semua kepentingan untuk menghindari adanya konflik pemanfaatan ruang laut. Pengertian ini mengarah pada suatu pemahaman, bahwa pemanfaatan suatu sumber daya laut diberikan batas yang jelas antara zona pemanfaatan yang satu dengan zona yang lain. Aspek yang harus diperhatikan dalam zonasi adalah :\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\"><strong>a.<span class=\\"Apple-tab-span\\" style=\\"white-space:pre\\">	</span>Sifat Dinamis Laut</strong>\r\n</div>\r\n<div style=\\"text-align: justify;\\">Air sebagai media pengantar yang baik sehingga sensitif terhadap setiap perubahan. Perubahan suhu akan berpengaruh pada perubahan salinitas dan sifat fisik lainnya. Kondisi ini mengakibatkan laut sangat sensitif terhadap perubahan cuaca. Arus dan gelombang merupakan salah satu bukti gejala dinamika laut. Air juga bertindak sebagai media transportasi yang baik. Melalui air disamping disebarkan sumber makanan bagi hesan-hewan laut, bibit-bibit terumbu karang atau tumbuhan yang akan membentuk koloni baru, juga disebarkan partikel-partikel endapan. Sebagai media hantar energi yang baik, laut sangat reaktif terhadap adanya perubahan energi yang mendadak. Bencana tsunami merupakan dampak reaksi laut terhadap pelepasan energi secara mendadak pada saat terjadinya gejala tektonik.‰‰\r\n</div>\r\n<div style=\\"text-align: justify;\\">Alam tersusun oleh sitem-sistem keseimbangan yang bersifat dinamis. Artinya adanya perubahan salah satu atau lebih faktor dalam suatu sistem, maka alam akan mencari keseimbangan baru. Demikian pula system dilaut, sebutlah terumbu karang. Terumbu karang akan hidup dengan optimal pada suhu 20&#8304;C - 30&#8304;C, Kondisi salinitas berkisar 30‰-33‰, kedalaman hingga 40m tergantung penetrasi sinar matahari. Terumbu karang merupakan tempat bertelur, berpijah ataupun hidup beberapa jenis ikan. Adanya perubahan tingkat kecerahan misalnya akibat arus turbulensi yang mengangkut material endapan, maka kondisi terumbu karang akan menurun atau bahkan mati. Perubahan keseimbangan ini akan berdampak pada kehidupan ikan yang selama ini bersimbiosis.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Aspek sifat laut yang dinamis perlu diperhatikan dalam penarikan zona untuk peruntukan tertentu. Sifat-sifat keseimbangan system yang terkait pada zona tersebut perlu diketahui, sehingga penetapan zona apakah dapat dilakukan hanya secara spasial atau juga spasial –temporal untuk menjaga keseimbangan yang ada. Prinsip ini dapat dikembangkan sebagai salah satu dasar pemanfaatan sumberdaya laut yang lestari.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\"><strong>b. Penafsiran nilai ekonomi dan nilai beban lingkungan</strong>\r\n</div>\r\n<div style=\\"text-align: justify;\\">kawasan perairan mengandung beranekaragam sumberdaya. Sumberdaya laut ini perlu didata secara seksama meliputi jenis, sebaran dan rekan kandungan cadangannya. Dikaitkan dengan penarikan zona pemanfaatan untuk peruntukan tertentu ada 2 (dua) unsure utama yang harus diperhatikan yakni : (1) potensi pasokan, merupakan kondisi sumberdaya laut baik fisik maupun biologi yang mempunyai kemampuan tumbuh dan berkembang serta dapat dimanfaatkan oleh masyarakat untuk memenuhi kebutuhannya: serta (2) potensi permintaaan, yang meliputi kondisi sosial dan ekonomi masyarakat yang dalam perkembangannya memerlukan potensi pasokan yang memadai.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Tindakan pemanfaatan sumberdaya laut dapat dipastikan berdampak pada adanya perubahan keseimbangan lingkungan dan bahkan dapat berbentuk sebagai beban pada lingkungan. Apabila pada akhirnya biaya perbaikan lingkungan lebih besar dari pada nilai ekonomi yang telah didapatkan, maka tujuan pemanfaatan sumberdaya untuk memberikan nilai tambah tidak dapat tercapai. Untuk itu selain penilaian terhadap potensi pasokan dan potensi permintaan, penilaian juga dilakukan pada potensi beban lingkungan akibat pemanfaatan sumberdaya. Penilaian ketiga potensi dilakukan pada setiap sumberdaya yang tersedia pada kawasan perairan tersebut untuk mementukan jenis dan batas-batas lahan laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\"><strong>c. Sosial budaya masyarakat pesisir dan pulau</strong>\r\n</div>\r\n<div style=\\"text-align: justify;\\">kehidupan social budaya masyarakat pesisir dan pulau di Indonesia sangatlah beragam. Perkembangan social budaya ini secara langsung dan tidak langsung dipengaruhi oleh factor alam disekitarnya. Perilaku social budaya ini memiliki kaitan erat dengan perilaku masyarakat dalam memanfaatkan sumberdaya alam di sekitarnya.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Tidaklah jarang ditemukan bahwa masyarakat pesisir dan pulau belum tentu memilih laut sebagai lahan utama dalam mencari mata pencaharian. Demikian pula, pada masyarakat pesisir dan pulau yang memanfaatkan laut sebagai lahan pencaharian utama, menunjukan pola dan karakter yang berbeda dari kawasan perairan satu ke kawasan lain memiliki pola yang berbeda. Adat istiadat suku yang bermukim di wilayah pesisir dan pulau sangatlah beragam pula. Di beberapa tempat sering dijumpai adanya budaya pengaturan lahan laut atau sering disebut hak ulayat laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Aturan-aturan semacam ini merupakan satu kearifan local yang perlu dihargai sesuai dengan UUD 1945 pasa 18 B ayat 2 yang menyebutkan bahwa &nbsp;Negara mengakui dan menghormati kesatuan-kesatuan masyarakat hokum adat beserta hak-hak tradisionalnya sepanjang masih hidup dan sesuai dengan perkembangan masyarakat dan prinsip Negara Kesatuan Republik Indonesia, yang diatur dengan Undang-Undang.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Selanjutnya kondisi demografi menyangkut masalah perkembangan penduduk, taraf pendidikan, suku bangsa, agama serta tingkat arus informasi yang dapat diterima, merupakan factor-faktor terkait dalam mengkaji permasalahan social budaya masyarakat pesisir untuk perumusan kebijakan penataan wilayah laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">d. Kepastian hokum pemanfaatan lahan laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\">UU No.24 Tahun 1992 pasal 1 tentang penataan ruang secara tegas menyebutkan bahwa ruang adalah wadah yang meliputi ruang daratan, ruang lautan dan ruang udara. Dalam kaitan ini ruang diterjemahkan sebagai satu kesatuan wilayah, tempat manusia dan makhluk hidup lainnya melakukan dan memelihara kelangsungan hidup mereka. Berdasarkan pemahaman ini, maka dapat dikembangkan suatu konsep bahwa laut merupakan suatu kesatuan wilayah Negara yang perlu ditata dan diatur tanpa mengurangi prinsip Negara Kesatuan Republik Indonesia.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pada kenyataanya hingga sampai saat ini penataan wilayah laut belum diatur secara tegas. Batas-batas pemanfaatan lahan laut juga belum secara keseluruhan memiliki kepastian hokum yang kuat dibandingkan dengan pengaturan pengelolaan wilayah darat.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Tanah Negara, misalnya dibagi habis dalam bentuk persil yang diatur berdasarkan Undang-undang pokok agraria (UUPA) tahun 1960 dengan pemberian hak, kewajiban, dan larangan yang jelas. Hak diberikan kepada masyarakat dalam bentuk hak milik, hak guna, hak pakai, dan sebagainya. Batas-batas persil tersebut memiliki kekuatan hokum dan memiliki kewajiban sesuai dengan hak yang diberikan. Pengaturan ini merupakan atministrasi public terhadap lahan darat yang diatur secara tegas, sehingga ada kepastian hokum terhadap penyelesaian konflik pemanfaatan lahan.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Menjadi suatu pemikiran, apakah konsep administrasi public lahan darat ini dapat diadopsi dan diterapkan untuk pengaturan lahan laut dengan memperhatikan karakteristik laut wilayah laut. Apabila konsep akan diterapkan, maka hal-hal yang perlu mendapatkan perhatian, adalah :&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">\r\n<ul>\r\n <li>Pandangan secara 3 (tiga) dimensi terhadap lahan atau persil laut,&nbsp;</li>\r\n <li>Penggunaan lahan laut diberikan dengan mempertimbangkan aspek keseimbangan dinamis laut, maka pengaturan penggunaan lahan laut dapat diberikan berdasarkan ruang dan skala waktu,</li>\r\n <li>Mengingatkan bahwa paradigm laut yang telah berkembang sejak abad ke 17 adalah : “that the ocean space as a common, available to all by owned by none”, maka hak milik tidak dapat diberikan pada lahan laut,</li>\r\n <li>Hokum-hukum adat dan hak-hak tradisional yang berlaku pada masyarakat dalm pengaturan pemanfaatan laut perlu mendapat perlindungan hokum yang jelas.</li>\r\n</ul>\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Kesimpulan\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sebagai Negara kepulauan, Indonesia sudah selayaknya mengelola laut untuk berbagai kepentingan yang dapat memberikan nilai tambah. Paradigma pengelolaan laut secara sektoral, telah berdampak pada meningkatnya konflik pemanfaatan ruang di laut. Sementara itu dalam menanggapi konflik pemanfaatan ruang di laut berkembang konsepsi pemanfaatan laut secara kewilayahan.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Mengingat luas perairan Indonesia, maka dalam upaya menata wilayah laut diusulkan melalui pendapatan secara mekro dengan mengelompokkan kawasan perairan berdasarkan proses pembentukan geologi. Pengelompokan ini dimaksudkan sebagai langkah awal mengenal karakter suatu kawasan perairan. Pada setiap kelompok kawasa perairan selanjutnya ditinjau berdasarkan fungsi pemanfaatan meliputi ekonomi, pertahana dan keamanan, atau konservasi, untuk menetapkan prioritas pemanfaatan kawasan perairan.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Penentuan jenis dan batas-batas lahan laut dilakukan melalui pendekatan secara mikro terhadap suatu kawasan dengan mengacu hasil pendekatan secara makro sebelumnya. Pada tahapan ini diperlukan kajian secara mendasar sifat dinamis laut, nilai ekonomi dan beban lingkungan, kondisi social budaya masayarakat pesisir dan pulau, serta kemungkinan-kemungkinan adanya konflik pemanfaatan ruang lau.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Jenis pemanfaatan pada kawasan tersebut ditetapkan kemudian berdasarkan kajian daya dukung lahan laut dan disusun sebagai suatu zonasi pemanfaatan dengan batas-batas dalam suatu system koordinat yang jelas. Untuk menghindari adanya konflik pemanfatan ruang laut atau menyelesaikan permasalahan konflik secara hokum, maka diperlukan suatu administrasi public terhadap lahan. Administrasi public ini ditetapkan berdasarkan peraturan perundangan untuk mengatur hak, kewajiban dan larangan untuk setiap lahan laut.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Dalam menata wilayah laut tidak dapat dihindari adanya penetapan batas-batas laut dengan tetap memperhatikan aspek ekonomi, ekologi dan sosial budaya masyarakat guna mendukung prinsip pemanfaatan laut secara lestari. Penetapan batas-batas lahan laut haruslah diartikan sebagai upaya managemen sumberdaya laut secara kuantitatif yang diatur secara hokum berdasarkan azas kesatuan dan peraturan wilayah NKRI.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Di berbagai kawasan pesisir, konflik antarelemen masyarakat menyeruak. Masing-masing pihak bersikukuh dengan pendiriannya. Lagi-lagi lingkungan pesisir menjadi korbannya.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sebut saja dalam kasus tercemarnya tambak udang oleh industri yang berada tak jauh dari situ. Akibat limbah yang dibuang itu, pembudidaya gagal panen. Sang pemilik industri juga tak dapat tenang karena setiap waktu diprotes pemilik tambak.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Tentu saja masih banyak kasus serupa lainnya. &nbsp;Jika hal ini dibiarkan, di masa depan potensi konflik terus membumbung tinggi. Dan dampak negatif yang pasti terjadi, lingkungan di kawasan pesisir rusak. Lebih dari itu, situasi seperti ini tidak akan menuai hasil sesuai harapan para pengguna yang berebut tadi.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Belum lagi dengan adanya ancaman perubahan iklim. Jelas bahwa jenis pemanfaatan apa pun yang akan dan sedang diusahakan menghadapi tantangan berat. Lalu bagaimana meredam konflik pemanfaatan di kawasan pesisir dan pulau-pulau kecil?\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sebelum menjawab pertanyaan itu, coba kita merenung sejenak terhadap makna dari isi Undang-Undang (UU) No. 27/2007 tentang Pengelolaan Wilayah Pesisir dan Pulau-pulau Kecil. Kita sepakat bahwa lahirnya UU tersebut merupakan tonggak sejarah bagi upaya pengelolaan wilayah pesisir dan pulau-pulau kecil di Indonesia. Keberadaannya menjadi jawaban bagaimana negara mampu mengelola wilayah pesisir dan pulau-pulau kecilnya.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Betapa tidak, UU tersebut memuat pengelolaan wilayah pesisir dan pulau-pulau kecil melalui berbagai tahapan mulai dari kegiatan perencanaan, pemanfaatan, pengawasan, hingga pengendalian di negara yang memiliki sekitar 17.480 pulau dengan garis pantai sepanjang 95.181 km. Tahapan pengelolaan ini diharapkan dapat menjamin kelestariannya sekaligus meningkatkan kesejahteraan masyarakat dan menjaga keutuhan Negara Kesatuan Republik Indonesia.\r\n</div>\r\n<div style=\\"text-align: justify;\\">&nbsp;Pada tahap perencanaan pengelolaan wilayah pesisir dan pulau-pulau kecil misalnya, terdiri atas rencana strategis, rencana zonasi, rencana pengelolaan, dan rencana aksi wilayah pesisir dan pulau-pulau-kecil. Berdasarkan keruangan (spasial) maka keempat hierarki perencanaan tersebut dapat dibedakan menjadi dua kelompok.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pertama, perencanaan yang sifatnya nonspasial yaitu, rencana strategis, rencana pengelolaan, dan rencana aksi wilayah pesisir dan pulau-pulau kecil. Kedua, perencanaan yang sifatnya spasial yaitu rencana zonasi wilayah pesisir dan pulau-pulau kecil (RZWP-3-K).\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Memadukan Secara Spasial\r\n</div>\r\n<div style=\\"text-align: justify;\\">Zonasi merupakan kebijakan publik sebagai penerjemahan rencana strategis pengelolaan wilayah pesisir secara keruangan, dalam rangka mengoptimasikan kepentingan antar para pelaku pembangunan dalam kegiatan pemanfaatan ruang. Zonasi juga memadukan secara spasial fungsi-fungsi kegiatan pemanfaatan ruang, baik antarsektor maupun antarwilayah administrasi pemerintahan agar bersinergi positif dan tidak saling mengganggu. Wilayah pesisir adalah daerah peralihan antara ekosistem darat dan laut yang dipengaruhi oleh perubahan di darat dan di laut.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Lalu, bagaimana dengan pulau-pulau kecil? Disebut pulau kecil karena pulau tersebut memiliki luas kurang atau sama dengan 2.000 km2 (UU N0 27/2007).&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Karena kecilnya, definisi ini mengisyaratkan pulau-pulau kecil juga merupakan wilayah pesisir. Namur demikian pulau kecil mempunyai keunikan tersendiri. UNCLOS (1982) mendefinisikan pulau sebagai area lahan (daratan) yang terbentuk secara alami, dikelilingi oleh air yang berada di atas muka air pada pasut tinggi (tidak boleh tenggelam, jika air pasang tinggi).&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Ruang lingkup pengaturan UU No 27/2007 di wilayah pesisir dan pulau-pulau kecil meliputi daerah peralihan antara eksosistem darat dan laut yang dipengaruhi oleh perubahan di darat dan di laut. Ke arah darat mencakup wilayah administrasi kecamatan dan ke arah laut sejauh 12 (dua belas) mil laut diukur dari garis pantai.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sementara itu, pada 2007 telah lahir pula UU No 26/2006 tentang Tata Ruang yang merupakan revisi dari UU No 24/1992 tentang Penataan Ruang. UU ini juga mengatur tentang perencanaan wilayah yang sifatnya spasial.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Di Pasal 6 ayat 5 UU 26/2007 menyatakan bahwa ruang laut dan ruang udara, pengelolaannya diatur dengan undang-undang sendiri. Khusus untuk ruang laut yang dimaksud dalam undang-undang tersebut tentunya adalah UU No 27/2007.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Bagaimana dengan daratan wilayah pesisir? Terdapat dua rejim undang-undang yang mengatur perencanaan secara spasial di daratan wilayah pesisir dan pulau-pulau kecil&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Secara prinsip, baik UU No 26/2007 maupun UU No 27/2007 menekankan perlunya penataan ruang dan zonasi yang mempertimbangkan keserasian, keselarasan, dan keseimbangan. Bahkan secara eksplisit UU No 27/2007 mengamanatkan bahwa rencana zonasi wilayah pesisir dan pulau-pulau kecil harus diserasikan, diselaraskan, dan diseimbangkan dengan rencana tata ruang wilayah (RTRW) pemerintah provinsi atau kabupaten/kota.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Dengan demikian secara prinsip, dasar kedua UU tersebut memiliki kesamaan. Namun demikian, terdapat perbedaan peristilahan zonasi yang perlu dipahami agar tidak menimbulkan kesimpangsiuran dalam implementasinya.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pada UU No 26/2007 misalnya, mengatur perencanaan zonasi sebagai alat pengendali pemanfaatan ruang. Di sini terdapat dua istilah penting dalam rencana tata ruang, yakni &nbsp;rencana struktur ruang dan rencana pola ruang.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Rencana struktur ruang mencakup rencana permukiman dan rencana jaringan sarana-prasarana kegiatan sosial ekonomi. Rencana pola ruang berisi rencana distribusi peruntukan ruang untuk kawasan lindung dan budidaya. Sementara itu, istilah zonasi dalam tata ruang berisi persyaratan pemanfaatan ruang dan ketentuan pengendaliannya untuk setiap zona dalam rencana rinci tata ruang.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Pengertian ini berbeda dengan istilah rencana zonasi yang tertuang dalam UU No 27/2007. Di sini, rencana zonasi berisi kawasan pemanfaatan umum, kawasan konservasi, kawasan strategis nasional, dan alur laut.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\">Zonasi ini lebih mendekati definisi pola ruang dalam UU No 26/2007, yaitu distribusi peruntukan ruang untuk budidaya dan lindung. UU No27/2007 menyatakan bahwa rencana zonasi merupakan arahan pemanfaatan sumber daya di wilayah pesisir dan pulau-pulau kecil.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Perbedaan mendasar lainnya, secara nature UU No 26/2007 mengatur ruang di darat dengan interkonektivitas sumber daya yang lebih statis. Sedangkan UU No 27/2007 mengatur ruang di wilayah pesisir yang terdiri dari daratan dan perairan dengan interkonektivitas sumber daya, antarpengguna, dan kondisi alamiah yang dinamis.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Potensi konflik antarpengguna akibat kompetisi pemanfaatan ruang dan dampak satu kegiatan ke kegiatan lainnya sangatlah tinggi. Sehingga, rencana zonasi wilayah pesisir harus mempertimbangkan keterkaitan ekosistem darat dan laut serta aspek bioekoregion.&nbsp;\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\"><strong>Harmonisasi dan Integrasi</strong>\r\n</div>\r\n<div style=\\"text-align: justify;\\">Lalu bagaimana implementasi kedua pengaturan tersebut di wilayah pesisir, khususnya dalam rangka adaptasi terhadap perubahan iklim? Mengingat wilayah pesisir memiliki dua kawasan yang berbeda yaitu kawasan daratan dan perairan, maka &nbsp;agar konsisten dengan pengaturan kedua UU tersebut, untuk kawasan daratan digunakan istilah struktur dan pola ruang. Sedangkan untuk kawasan perairan digunakan istilah zonasi.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Secara praktik, tentu saja yang paling ideal adalah baik zonasi maupun tata ruang disusun dalam waktu yang bersamaan dan dengan tim yang sama. Banyak keuntungan yang dapat diperoleh. Selain efisiensi waktu, tenaga dan biaya, juga memudahkan dalam harmonisasi dan integrasi. Keuntungan lain, memberikan kepastian hukum yang lebih kuat. Dengan kewenangan yang dimiliki oleh pemerintah daerah, penetapan seperti itu tidaklah sulit dilakukan.\r\n</div>\r\n<div style=\\"text-align: justify;\\"><br />\r\n</div>\r\n<div style=\\"text-align: justify;\\">Secara konseptual, mengingat wilayah pesisir mencakup kawasan daratan dan perairan, maka prinsip-prinsip pengelolaan pesisir terpadu harus diikuti dalam perencanaan struktur ruang &nbsp;dan pola ruang di kawasan darat serta rencana zonasi di kawasan pesisir. Prinsip integrasi antara ekosistem darat dan laut serta antara science dan management menjadi acuan dalam penyusunan rencana tata ruang dan zonasi wilayah menyangkut:&nbsp;\r\n</div>\r\n<div>\r\n<ol>\r\n <li style=\\"text-align: justify;\\">Mengetahui pola dan karakteristik wilayah pesisir yang akan disusun penataan ruang dan zonasinya secara ekobiofisik, sosial ekonomi, dan budaya.</li>\r\n <li style=\\"text-align: justify;\\">Menentukan pola ruang di darat apakah kompatibel atau tidak dengan zonasi di kawasan perairan.</li>\r\n <li style=\\"text-align: justify;\\">Mengevaluasi dampak kegiatan dalam blok-blok zona tata ruang dengan zonasi kawasan perairan dan habitat-habitat pesisir penting misalnya mangrove, terumbu karang, dan lamun.</li>\r\n <li style=\\"text-align: justify;\\">Dampak skenario bencana alam untuk wilayah tersebut terhadap rencana struktur dan pola ruang di kawasan daratan.</li>\r\n <li style=\\"text-align: justify;\\">Menentukan kawasan setback atau sempadan pantai yang perlu dialokasikan sebagai kawasan lindung dalam rencana pola ruang.</li>\r\n</ol>\r\n</div>\r\n<div style=\\"text-align: justify;\\">Sementara itu, prinsip integrasi horizontal dan vertikal memastikan bahwa rencana tata ruang dan zonasi wilayah pesisir mengacu pada tiga hal. Pertama, prioritas pembangunan daerah dalam RPJP sebagai landasan bagi penyusunan rencana tata ruang di darat dan zonasi di perairan pesisir.\r\n</div>\r\n<div style=\\"text-align: justify;\\">Kedua, nilai strategis wilayah pesisir dan potensi utama yang akan dikembangkan sehingga baik tata ruang maupun zonasinya mendukung ke arah sana. Ketiga, kesesuaian antara struktur ruang dan pola ruang di darat dengan rencana pemanfaatan kawasan perairan pesisir.&nbsp;\r\n</div>\r\n<div style=\\"text-align: ', 'opini/4', '', 5, 1, '', '2014-02-11 09:16:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 1);
INSERT INTO `dtataruang_news_content` (`id`, `title`, `brief`, `content`, `image`, `thumbnailimage`, `categoryid`, `articletype`, `tags`, `createdate`, `postdate`, `expiredate`, `fromwho`, `authorid`, `n_status`) VALUES
(43, '', '', '', 'gallery/foto/', 'gallery/foto/', 6, 2, '', '2014-02-11 09:25:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 0),
(44, '', '', '', 'gallery/foto/', 'gallery/foto/', 6, 2, '', '2014-02-11 09:25:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 0),
(45, '', '', '', 'gallery/foto/', 'gallery/foto/', 6, 2, '', '2014-02-11 09:35:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 0),
(46, 'tesss', '', '', 'gallery/foto/86c4558e13142c0bf9bdd11a7b44b86b.jpg', 'gallery/foto/86c4558e13142c0bf9bdd11a7b44b86b.jpg', 6, 2, '', '2014-02-11 09:54:29', '2014-02-11 14:00:00', '0000-00-00 00:00:00', 1, 1, 1),
(47, '', '', '', 'gallery/foto/', 'gallery/foto/', 6, 2, '', '2014-02-11 09:55:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 0),
(48, '', '', '', 'gallery/foto/', 'gallery/foto/', 6, 2, '', '2014-02-11 09:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 0),
(49, 'BIMTEK PERENCANAAN PENGELOLAAN WILAYAH PESISIR DAN PULAU-PULAU KECIL', '', '', 'gallery/foto/dca8dcebd45f2dad4fcde53909cd7b52.JPG', 'gallery/foto/dca8dcebd45f2dad4fcde53909cd7b52.JPG', 6, 2, '', '2014-02-11 10:00:03', '2014-02-11 00:00:00', '0000-00-00 00:00:00', 1, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(12, '4', 'Database Tematik', 'one_map/database_tematik/', 1),
(13, '4', 'Target dan Capaian', 'one_map/target_capaian/', 1),
(14, '4', 'Dokumentasi', 'one_map/dokumentasi/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_category_product`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 'Provinsi', 1);

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
-- Table structure for table `dtataruang_news_content_peraturan`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_peraturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL,
  `nomor` int(11) NOT NULL,
  `deskripsi` varchar(220) NOT NULL,
  `files` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articletype` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `postdate` datetime NOT NULL,
  `fromwho` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `dtataruang_news_content_peraturan`
--

INSERT INTO `dtataruang_news_content_peraturan` (`id`, `title`, `nomor`, `deskripsi`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(1, 'No 23 Tahun 2013', 23, 'Keputusan Menteri', 'peraturan/0f0c7a6dfbffc63944f9e257a1da956f.pdf', 1, 7, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(2, 'No 26 Tahun 2013', 26, 'Peraturan Menteri', '', 1, 6, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(3, 'No 23 Tahun 2013', 23, 'Keputusan Presiden', '', 1, 4, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(4, 'No 27 Tahun 2013', 27, 'Peraturan Menteri', '', 1, 6, '2014-01-01 00:00:00', '2014-01-01 00:00:00', 0, 0, 1),
(5, 'No 28 Tahun 2013', 28, 'Peraturan Menteri', '', 1, 6, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(6, 'No 29 Tahun 2013', 29, 'Instruksi Presiden', '', 1, 5, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(7, 'No 30 Tahun 2013', 30, 'Instruksi Presiden', '', 1, 5, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(8, 'No 31 Tahun 2013', 31, 'Undang-undang', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(9, 'No 32 Tahun 2013', 32, 'Instruksi Presiden', '', 1, 5, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(10, 'No 21 Tahun 2013', 21, 'Peraturan Pemerintah', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(11, 'No 22 Tahun 2013', 22, 'Keputusan Menteri', '', 1, 7, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(12, 'No 24 Tahun 2013', 24, 'Peraturan Pemerintah', '', 1, 4, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(13, 'No 25 Tahun 2013', 25, 'Peraturan Pemerintah', '', 1, 4, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(14, 'No 26 Tahun 2013', 26, 'Peraturan Pemerintah', '', 1, 4, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(15, 'No 27 Tahun 2013', 27, 'SNI', '', 1, 9, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(16, 'No 28 Tahun 2013', 28, 'SNI', '', 1, 9, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(17, 'No 29 Tahun 2013', 29, 'SNI', '', 1, 9, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(18, 'No 26 Tahun 2013', 26, 'Undang-undang', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(19, 'No 27 Tahun 2013', 27, 'Undang-undang', 'peraturan/0f0c7a6dfbffc63944f9e257a1da956f.pdf', 1, 1, '2014-01-01 00:00:00', '2014-01-01 00:00:00', 0, 0, 1),
(20, 'No 28 Tahun 2013', 28, 'Undang-undang', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(21, 'No 29 Tahun 2013', 29, 'Undang-undang', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(22, 'No 30 Tahun 2013', 30, 'Undang-undang', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(23, 'No 31 Tahun 2013', 31, 'Undang-undang', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(24, 'No 32 Tahun 2013', 32, 'Undang-undang', '', 1, 1, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(25, 'No 21 Tahun 2013', 21, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(26, 'No 22 Tahun 2013', 22, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(27, 'No 24 Tahun 2013', 24, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(28, 'No 25 Tahun 2013', 25, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(29, 'No 26 Tahun 2013', 26, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(30, 'No 27 Tahun 2013', 27, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(31, 'No 28 Tahun 2013', 28, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(32, 'No 29 Tahun 2013', 29, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(33, 'No 30 Tahun 2013', 30, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(34, 'No 31 Tahun 2013', 31, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(35, 'No 32 Tahun 2013', 32, 'Peraturan Pemerintah', '', 1, 2, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(36, 'No 21 Tahun 2013', 21, 'Peraturan Presiden', '', 1, 3, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(37, 'No 22 Tahun 2013', 22, 'Peraturan Presiden', '', 1, 3, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(38, 'No 23 Tahun 2013', 23, 'Peraturan Presiden', '', 1, 3, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(39, 'No 24 Tahun 2013', 24, 'Peraturan Presiden', '', 1, 3, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(40, 'No 25 Tahun 2013', 25, 'Peraturan Presiden', '', 1, 3, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(41, 'No 30 Tahun 2013', 30, 'Peraturan / Keputusan Direktur Jenderal', '', 1, 8, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(42, 'No 31 Tahun 2013', 31, 'Peraturan / Keputusan Direktur Jenderal', '', 1, 8, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(43, 'No 32 Tahun 2013', 32, 'Peraturan / Keputusan Direktur Jenderal', '', 1, 8, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(44, 'No 21 Tahun 2013', 21, 'Peraturan / Keputusan Direktur Jenderal', '', 1, 8, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(45, 'No 22 Tahun 2013', 22, 'Keputusan Menteri', '', 1, 7, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(46, 'No 23 Tahun 2013', 23, 'Keputusan Menteri', '', 1, 7, '2014-01-16 00:00:00', '2014-01-16 00:00:00', 0, 0, 1),
(47, 'No 13 Tahun 2013', 0, 'undang-undang', '46de36bbc076ad348712f8205a06255c.pdf', 1, 1, '2014-02-10 10:54:28', '2014-02-10 10:50:20', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_product`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) NOT NULL,
  `brief` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_repo`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_repo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `brief` text NOT NULL,
  `content` text NOT NULL,
  `typealbum` int(11) NOT NULL COMMENT '1:song;2:images',
  `gallerytype` int(11) NOT NULL COMMENT '0:content,1:contest;2:bucketlist',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161 ;

--
-- Dumping data for table `dtataruang_news_content_repo`
--

INSERT INTO `dtataruang_news_content_repo` (`id`, `title`, `brief`, `content`, `typealbum`, `gallerytype`, `files`, `thumbnail`, `fromwho`, `otherid`, `userid`, `createdate`, `postdate`, `n_status`) VALUES
(1, 'tes galeri konten 1', '', 'konten', 1, 0, 'tes.jpg', 'tes thumb.jpg', 0, 1, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '2_b.jpg', 0, 1, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '3_b.jpg', 0, 1, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '4_b.jpg', 0, 1, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '5_b.jpg', 0, 1, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'berlayar', '', 'cover', 1, 0, 'image', '1_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '2_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '3_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '4_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '5_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '5_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(12, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '5_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'tes galeri konten 1', '', 'content', 1, 0, 'image', '5_b.jpg', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(14, 'video hahahha', '', 'content', 2, 0, 'video', 'cinta.avi', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(15, 'simbada', '', 'content', 2, 0, 'video', 'SIMBADA.mp4', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(16, 'simbada2', '', 'content', 2, 0, 'video', 'Simbada_2.mp4', 0, 6, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(146, 'tes galeri konten 1', '', 'konten', 1, 0, 'te1s.jpg', 'tes thumb1.jpg', 0, 1, 0, '2013-12-18 00:00:00', '0000-00-00 00:00:00', 1),
(147, '', '', '', 2, 7, 'gallery/video/3', 'gallery/video/3', 0, 24, 0, '2014-02-09 19:43:44', '0000-00-00 00:00:00', 2),
(148, '', '', '', 2, 7, 'gallery/video/d', 'gallery/video/d', 0, 25, 0, '2014-02-09 19:46:12', '0000-00-00 00:00:00', 2),
(149, 'Charts', '', '', 1, 6, 'gallery/foto/43a66a9d6c4fd78b1db418426f4a2ec5.jpg', 'gallery/foto/43a66a9d6c4fd78b1db418426f4a2ec5.jpg', 0, 26, 0, '2014-02-10 01:03:30', '2014-02-10 08:01:50', 0),
(150, 'Go Green', '', '', 1, 6, 'gallery/foto/b8867a75e451e32b99a4318f846f95db.png', 'gallery/foto/b8867a75e451e32b99a4318f846f95db.png', 0, 33, 0, '2014-02-10 02:45:32', '2014-02-10 09:40:10', 0),
(151, 'Go Green', '', '', 1, 6, 'gallery/foto/b54b1b3710a86ace318348d5e69425c8.png', 'gallery/foto/b54b1b3710a86ace318348d5e69425c8.png', 0, 33, 0, '2014-02-10 02:45:32', '2014-02-10 09:40:10', 0),
(152, 'Go Green', '', '', 1, 6, 'gallery/foto/ec93c9fedb282b87a43fd8a606eab74c.png', 'gallery/foto/ec93c9fedb282b87a43fd8a606eab74c.png', 0, 33, 0, '2014-02-10 02:45:32', '2014-02-10 09:40:10', 0),
(153, 'mancing', '', '', 2, 7, 'gallery/video/a7b2a7910a0fb7f05a05c42a0d8eba58.mp4', 'gallery/video/a7b2a7910a0fb7f05a05c42a0d8eba58.mp4', 0, 36, 0, '2014-02-10 03:58:22', '2014-02-10 10:55:20', 1),
(154, 'tesss', 'teeeeessss', '', 1, 6, 'gallery/foto/17730fa4e542b12ceb6a14da784ba239.jpg', 'gallery/foto/17730fa4e542b12ceb6a14da784ba239.jpg', 0, 46, 0, '2014-02-11 09:54:29', '2014-02-11 14:00:00', 1),
(155, 'BIMTEK PERENCANAAN PENGELOLAAN WILAYAH PESISIR DAN PULAU-PULAU KECIL', '', '', 1, 6, 'gallery/foto/82dd8afe124e88f171540155e4d96820.JPG', 'gallery/foto/82dd8afe124e88f171540155e4d96820.JPG', 0, 49, 0, '2014-02-11 10:00:03', '2014-02-11 00:00:00', 1),
(156, 'BIMTEK PERENCANAAN PENGELOLAAN WILAYAH PESISIR DAN PULAU-PULAU KECIL', '', '', 1, 6, 'gallery/foto/16ae823d2eb14a9e73ce5a46dab4c273.JPG', 'gallery/foto/16ae823d2eb14a9e73ce5a46dab4c273.JPG', 0, 49, 0, '2014-02-11 10:02:34', '2014-02-11 00:00:00', 1),
(157, 'BIMTEK PERENCANAAN PENGELOLAAN WILAYAH PESISIR DAN PULAU-PULAU KECIL', '', '', 1, 6, 'gallery/foto/9d7088a6d87802bb01f5ab0d0e46ce18.JPG', 'gallery/foto/9d7088a6d87802bb01f5ab0d0e46ce18.JPG', 0, 49, 0, '2014-02-11 10:02:34', '2014-02-11 00:00:00', 1),
(158, 'BIMTEK PERENCANAAN PENGELOLAAN WILAYAH PESISIR DAN PULAU-PULAU KECIL', '', '', 1, 6, 'gallery/foto/1cf553458a00d489f5e2f1f89761a43c.JPG', 'gallery/foto/1cf553458a00d489f5e2f1f89761a43c.JPG', 0, 49, 0, '2014-02-11 10:02:34', '2014-02-11 00:00:00', 1),
(159, 'BIMTEK PERENCANAAN PENGELOLAAN WILAYAH PESISIR DAN PULAU-PULAU KECIL', '', '', 1, 6, 'gallery/foto/20b2f90249635e4a83db0ab497913e4c.JPG', 'gallery/foto/20b2f90249635e4a83db0ab497913e4c.JPG', 0, 49, 0, '2014-02-11 10:04:12', '2014-02-11 00:00:00', 1),
(160, 'BIMTEK PERENCANAAN PENGELOLAAN WILAYAH PESISIR DAN PULAU-PULAU KECIL', '', '', 1, 6, 'gallery/foto/7', 'gallery/foto/7', 0, 49, 0, '2014-02-11 10:04:12', '2014-02-11 00:00:00', 2);

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
(2, 2, 'Info', 1),
(3, 3, 'Agenda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_type_norma`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_type_norma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dtataruang_news_content_type_norma`
--

INSERT INTO `dtataruang_news_content_type_norma` (`id`, `value`, `n_status`) VALUES
(1, 'Pedoman Umum', 1),
(2, 'Pedoman Teknis', 1),
(3, 'Modul Pelatihan', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_member`
--

INSERT INTO `user_member` (`id`, `name`, `nickname`, `email`, `register_date`, `verified_date`, `img`, `image_profile`, `username`, `last_login`, `city`, `sex`, `birthday`, `description`, `middle_name`, `last_name`, `StreetName`, `phone_number`, `n_status`, `login_count`, `verified`, `usertype`, `salt`, `password`) VALUES
(1, 'admin', 'admin', NULL, '2014-01-20 12:37:14', '0000-00-00 00:00:00', NULL, '', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '1234567890', 'ebf95c3f793174665fd929f01597df7738f574c0'),
(2, 'andre', NULL, 'andrepratama16@gmail.com', '2014-02-10 05:59:19', '0000-00-00 00:00:00', NULL, 'b48275653ab6301fee14aff5f99b7c27.jpg', 'andre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 'codekir-v0.3', '8ef2d3edf05adaad83ed18daae3b5eb578438d3d');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
