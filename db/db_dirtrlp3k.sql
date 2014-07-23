-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2014 at 09:17 AM
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
  `activityId` int(11) NOT NULL,
  `activityValue` varchar(50) NOT NULL,
  `n_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_activity`
--

INSERT INTO `code_activity` (`id`, `activityId`, `activityValue`, `n_status`) VALUES
(1, 1, 'surf', 1);

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

--
-- Dumping data for table `code_activity_log`
--

INSERT INTO `code_activity_log` (`id`, `userid`, `activityId`, `activityDesc`, `source`, `datetimes`, `n_status`) VALUES
(0, 1, 1, 'insert data program', '::1', '2014-03-01 09:01:44', 1),
(0, 1, 1, 'insert data program', '::1', '2014-03-01 09:02:23', 1),
(0, 1, 1, 'Insert Slide Show', '::1', '2014-03-01 09:18:20', 1),
(0, 1, 1, 'Update Slide Show', '::1', '2014-03-01 09:27:05', 1),
(0, 1, 1, 'Update Slide Show', '::1', '2014-03-01 09:28:38', 1),
(0, 1, 1, 'Insert Slide Show', '::1', '2014-03-01 09:58:02', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `dtataruang_news_content`
--

INSERT INTO `dtataruang_news_content` (`id`, `title`, `brief`, `content`, `image`, `thumbnailimage`, `categoryid`, `articletype`, `tags`, `createdate`, `postdate`, `expiredate`, `fromwho`, `authorid`, `n_status`) VALUES
(1, 'struktur organisasi', '', 'struktur organisasi<br />', 'struktur organisasi/caa34a0eb82d356847eafac87efafb27.jpg', '', 2, 1, '', '2014-02-19 07:45:03', '2014-02-19 13:45:20', '0000-00-00 00:00:00', 1, 1, 1),
(2, 'sejarah', '', 'sejarah adalah', 'sejarah/ba41783d9f3880ca9b12b4d6d42d0e55.png', '', 1, 1, '', '2014-02-19 14:03:55', '2014-02-19 14:04:00', '0000-00-00 00:00:00', 1, 1, 1),
(3, 'tupoksi', '', 'tupoksi adalah', '', '', 3, 1, '', '2014-02-19 08:04:31', '2014-02-19 14:04:40', '0000-00-00 00:00:00', 1, 1, 1),
(6, 'Heynckes: Messi Selevel Maradona dan Pele', 'Mantan pelatih top Jupp ''Heynckes ''membandingkan antara Lionel Messi, Cristiano Ronaldo dan Franck Ribery. Menurut Heynckes, Messi setara dua legenda sepakbola Maradona dan Pele.', 'Mantan pelatih top Jupp Heynckes membandingkan antara Lionel Messi, \r\nCristiano Ronaldo dan Franck Ribery. Menurut Heynckes, Messi setara dua \r\nlegenda sepakbola Maradona dan Pele.<br />\r\n<br />\r\nHeynckes menutup kariernya \r\npada akhir musim lalu setelah mengantar Bayern Munich mencapai prestasi \r\ntertinggi dalam sejarahnya dengan menjuarai Bundesliga, DFB-Pokal dan \r\nLiga Champions.', 'berita/c934c3123431e54664d215a70b477634.png', '', 4, 1, '', '2014-02-19 09:30:20', '2014-02-20 15:29:50', '0000-00-00 00:00:00', 1, 1, 1),
(7, 'Rummenigge: Aktivitas di Bursa Transfer Sudah Ubah Arsenal', 'Karl-Heinz Rummenigge menyebut bahwa Arsenal musim lalu dan musim ini berbeda. Salah satunya alasannya lantaran &lt;em&gt;The Gunners&lt;/em&gt; musim ini berani keluar uang besar di bursa transfer.', 'Karl-Heinz Rummenigge menyebut bahwa Arsenal musim lalu dan musim ini berbeda. Salah satunya alasannya lantaran <em>The Gunners</em> musim ini berani keluar uang besar di bursa transfer.<br />\r\n<br />Musim\r\n lalu, Bayern Munich sukses menyingkirkan Arsenal dari Liga Champions. \r\nSetelah menang 3-1 di Emirates Stadium, Bayern kalah 0-2 di Allianz \r\nArena. Kendati demikian, Die Roten tetap lolos lantaran keunggulan \r\nagresivitas gol tandang.<br />\r\n<br />Rummenigge menilai, pertemuan kali ini tidak akan semudah musim kemarin.', 'berita/08093d30603cbd0379407cca9eb7e363.png', '', 4, 1, '', '2014-02-19 10:16:38', '2014-02-19 16:15:50', '0000-00-00 00:00:00', 1, 1, 1),
(8, 'Ditekuk Barca 2-0, Pellegrini Salahkan Wasit', 'Pelatih Manchester City, Manuel Pellegrini mengatakan wasit Jonas \r\nEriksson lebih memihak Barcelona. Ia juga menyebut wasit asal Swedia \r\ntersebut tidak layak memimpin pertandingan sekelas Liga Champions.', 'Pelatih Manchester City, Manuel Pellegrini mengatakan wasit Jonas \r\nEriksson lebih memihak Barcelona. Ia juga menyebut wasit asal Swedia \r\ntersebut tidak layak memimpin pertandingan sekelas Liga Champions.', 'berita/0ccf9996e80692428c128e1c42b1d730.jpg', '', 4, 1, '', '2014-02-19 10:18:13', '2014-02-19 16:17:40', '0000-00-00 00:00:00', 1, 1, 1),
(9, 'Bandara Tapanuli Tengah Sumut Ditutup karena Kabut Asap', 'Kabut asap yang melanda sebagian wilayah Sumut menyebabkan penutupan \r\nBandara Ferdinand Lumban Tobing di Pinangsori, Kabupaten Tapanuli \r\nTengah. Belum bisa dipastikan sampai kapan penutupan itu akan \r\nberlangsung.', '<strong>Medan</strong> - Kabut asap yang melanda sebagian wilayah \r\nSumatera Utara (Sumut) menyebabkan penutupan Bandara Ferdinand Lumban \r\nTobing di Pinangsori, Kabupaten Tapanuli Tengah. Belum bisa dipastikan \r\nsampai kapan penutupan itu akan berlangsung.<br />\r\n<br />\r\nPenutupan bandara \r\nmulai berlangsung sejak Rabu (19/2/2014) pagi. Tidak ada aktivitas \r\npenerbangan baik datang maupun landing sejak pagi.<br />\r\n<br />\r\nKabut asap \r\nmenjadi pemicu utama penutupan bandara ini. Jarak pandang diperkirakan \r\nhanya sekitar 300 meter saja karena pekatnya asap. Padahal idealnya \r\njarak pandang paling tidak sekitar 5.000 meter.', 'agenda/77c8158cd01e58ff6c1741aedef4e41c.png', '', 9, 1, '', '2014-02-19 10:53:36', '2014-02-19 16:51:00', '0000-00-00 00:00:00', 1, 1, 1),
(10, 'SBY: Pemilu Bukanlah Sesuatu yang Harus Ditakuti', 'Presiden Susilo Bambang Yudhoyono (SBY) kembali mengingatkan pentingnya \r\nberpartisipasi dalam Pemilu 2014. Menurut SBY pemilu bukanlah sesuatu \r\nyang harus ditakuti.', '<strong>Makassar</strong> - Presiden Susilo Bambang Yudhoyono (SBY) \r\nkembali mengingatkan pentingnya berpartisipasi dalam Pemilu 2014. \r\nMenurut SBY pemilu bukanlah sesuatu yang harus ditakuti.<br />\r\n<br />"Pemilu \r\nbukanlah sesuatu yang harus ditakuti. Tidak perlu diseram-seramkan," \r\nujar SBY dalam sambutannya saat peresmian Pabrik Semen Tonasa di \r\nKabupaten Pangkajene dan Kepulauan (Pangkep), Sulawesi Selatan, Rabu \r\n(19/2/2014).<br />\r\n<br />SBY mengatakan Indonesia pernah melakukan pemilihan \r\npresiden secara langsung pada 2004 dan 2009. Kedua pemilu itu berjalan \r\nbaik, aman, damai, tertib, lancar dan demokratis.', 'agenda/616ffd4fa29e631185f62d61031aeb18.png', '', 9, 1, '', '2014-02-19 11:14:30', '2014-02-19 17:13:20', '0000-00-00 00:00:00', 1, 1, 1),
(11, 'WN China Buronan Kasus Penipuan Kabur ke RI Pakai Paspor Palsu', 'Subdit Jatanras Ditreskrimum Polda Metro Jaya dan Interpol menangkap WN \r\nChina, Huang Zhangbao (46), buronan kasus penipuan, perbankan dan \r\npencucian uang Kepolisian China. Zhangbao kabur ke Indonesia menggunakan\r\n paspor palsu.', '<strong>Jakarta</strong> - Subdit Jatanras Ditreskrimum Polda Metro Jaya\r\n dan Interpol menangkap WN China, Huang Zhangbao (46), buronan kasus \r\npenipuan, perbankan dan pencucian uang Kepolisian China. Zhangbao kabur \r\nke Indonesia menggunakan paspor palsu.<br />\r\n<br />"Dia ke Indonesia \r\nmenggunakan paspor palsu. Paspor tersebut milik kakaknya dan mukanya \r\nmirip," kata Direktur Reserse Kriminal Umum Polda Metro Jaya Kombes Pol \r\nHeru Pranoto saat jumpa pers di Mapolda Metro Jaya, Jakarta, Rabu \r\n(19/2/2014).', 'agenda/8e6f38ae8f454552ada9ba53777298fa.png', '', 9, 1, '', '2014-02-19 11:17:24', '2014-02-19 17:16:20', '0000-00-00 00:00:00', 1, 1, 1),
(12, 'Mabes Polri Perintahkan Polres Bogor Profesional Usut Istri Jenderal', 'Mabes ''Polri'' memerintahkan Polres Bogor Kota tak sungkan memeriksa dugaan\r\n penganiayaan pembantu yang dilakukan M, istri Brigjen MS. Walau MS \r\nseorang jenderal aktif (sebelumnya ditulis purnawirawan-red), penegakkan\r\n hukum harus dilakukan.', '<strong>Jakarta</strong> - Mabes ''Polri ''memerintahkan Polres Bogor Kota \r\ntak sungkan memeriksa dugaan penganiayaan pembantu yang dilakukan M, \r\nistri Brigjen MS. Walau MS seorang jenderal aktif (sebelumnya ditulis \r\npurnawirawan-red), penegakkan hukum harus dilakukan.<br />\r\n<br />\r\n"Mabes Polri\r\n selaku pembina fungsi penegakan hukum telah mengarahkan Polda Jabar dan\r\n Polres Bogor untuk menangani kasus ini secara profesional, \r\nproporsional, dan prosedural," kata Kadiv Humas Mabes Polri Irjen Pol \r\nRonny F Sompie saat dikonfirmasi detikcom, Rabu (19/2/2014).', 'agenda/5933992f8312075970d0506eb1446a31.png', '', 9, 1, '', '2014-02-19 11:31:09', '2014-02-19 17:30:20', '0000-00-00 00:00:00', 1, 1, 1),
(14, 'Orang Jujur Ditolak Jadi Hakim Agung, Inilah Suara Hati Suhardjono', '&quot;DPR menjudge seolah-olah memang tidak suka kepada kita, kalau di agama \r\nitu kan kita jangan tidak adil dengan siapapun. KY melakukan rekam \r\njejak, secara diam-diam,&quot; kata Suhardjono.', '<strong>Jakarta</strong> - Komisi III DPR menolak tiga ''kandidat'' calon \r\nyang dikenal berintegritas untuk menjadi hakim agung. DPR menilai \r\nketiganya tidak cakap dan performanya tidak memuaskan. Ketiganya yaitu \r\nSuhardjono, Sunarto dan Maria Anna.<br />\r\n<br />\r\nBerikut wawancara khusus detikcom dengan Suhardjono atas kegagalan tersebut, Sabtu (8/2/2014):<br />\r\n<br />\r\n<strong>Terkait keputusan DPR, apa Bapak sudah sepenuhnya menerima?</strong>', 'opini/1b910883bc6416641a1257b65234478a.jpg', '', 5, 1, '', '2014-02-19 11:55:14', '2014-02-19 17:54:40', '0000-00-00 00:00:00', 1, 1, 1),
(15, 'Denny Indrayana Soal Corby: Ini Masalah Hukum, Popularitas Tak Penting', 'Wamenkum HAM Denny Indrayana menegaskan bahwa masalah pembebasan \r\nbersyarat Schapelle Corby, terpidana 20 tahun kasus narkoba asal \r\nAustralia adalah masalah hukum. Bila ada yang menilai pembebasan \r\nbersyarat ini kebijakan tidak populer, pihaknya t', '<strong>Jakarta</strong> - Wamenkum HAM Denny Indrayana menegaskan bahwa\r\n masalah pembebasan bersyarat Schapelle Corby, terpidana 20 tahun kasus \r\nnarkoba asal Australia adalah masalah hukum. Bila ada yang menilai \r\npembebasan bersyarat ini kebijakan tidak populer, pihaknya tidak \r\nmenganggap hal itu. <br />\r\n<br />"Kita adalah negara hukum, jadi kita tidak \r\nmempertimbangkan apa-apa di luar. Kalau kita mempertimbangkan hal-hal \r\nlain, berarti kita bukan lagi negara hukum. Termasuk pada saat kita \r\nbicara martabat, hukum di atas segalanya. Termasuk kalau ini membuat \r\nkita tidak populer karena dianggap ini dan itu, lah hukumnya sudah \r\ndipenuhi," kata Denny.<br />', 'opini/0ce6d49c5842959dc3b6ebd14d658f3b.jpg', '', 5, 1, '', '2014-02-19 11:56:47', '2014-02-19 17:56:10', '0000-00-00 00:00:00', 1, 1, 1),
(16, 'BNI Lirik Bank Beraset di Atas Rp 20 Triliun', 'Lahar ''hujan'' menerjang wilayah Ngantang, Kabupaten Malang, membuat warga \r\npanik. Mereka memilih pulang untuk menyelamatkan ternaknya.', 'Lahar ''hujan'' menerjang wilayah Ngantang, Kabupaten Malang, membuat warga \r\npanik. Mereka memilih pulang untuk menyelamatkan ternaknya.', 'opini/bfbfa28f6ab922f9660ffe864926d368.jpg', '', 5, 1, '', '2014-02-19 12:07:38', '2014-02-19 18:07:20', '0000-00-00 00:00:00', 1, 1, 1),
(19, '', '', '', '', '', 5, 1, '', '2014-02-19 13:18:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(20, '', '', '', '', '', 5, 1, '', '2014-02-19 13:19:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(21, '', '', '', '', '', 9, 1, '', '2014-02-19 13:19:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 2),
(24, '', '', 'Bhayanaka Digital &amp; Trinata Digitalssssssddddddddddd', 'kontak/2294e2f19291b916cf2487b53042a39f.png', '', 8, 1, '', '2014-02-19 19:53:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(28, 'Visi Misi', '', 'testing visi misi adalah<br />', 'onemap/003d11f1d33d79afb90eda0fd4378e6a.jpg', '', 10, 4, '', '2014-03-03 06:12:13', '2014-03-03 12:12:10', '0000-00-00 00:00:00', 1, 1, 1),
(29, 'Rencana Aksi', '', 'rencana aks demo lahssssss', 'onemap/81f40de6b4b4a9a5db895742070154d0.jpg', '', 11, 4, '', '2014-02-22 07:21:25', '2014-02-25 13:20:40', '0000-00-00 00:00:00', 1, 1, 1),
(30, 'Database Tematik', '', 'database tematik ajalah', 'onemap/f0baab70de7049a379c5b80f5ac772f9.png', '', 12, 4, '', '2014-02-22 07:22:43', '2014-02-27 13:22:20', '0000-00-00 00:00:00', 1, 1, 1),
(31, 'Target dan Capaian', '', 'target capain adalh percobaan', 'onemap/aad807aed8f8b5ca9a38f1bc95e299cf.png', '', 13, 4, '', '2014-02-22 07:23:44', '2014-02-22 13:23:50', '0000-00-00 00:00:00', 1, 1, 1),
(32, 'Dokumentasi', '', 'dokumentasi percoabaannnsssss', 'onemap/9222c0050814477fa1e61be087e1b05e.png', '', 14, 4, '', '2014-03-03 05:47:25', '2014-03-03 11:47:30', '0000-00-00 00:00:00', 1, 1, 1),
(35, 'coba', '', '', 'gallery/foto/92dc9df134f47cc207cc4fe8c87414db.png', 'gallery/foto/92dc9df134f47cc207cc4fe8c87414db.png', 6, 2, '', '2014-02-24 03:57:16', '2014-02-24 09:56:30', '0000-00-00 00:00:00', 1, 1, 1),
(39, 'video coba 1', '', '', 'gallery/video/5af36b85e0f45e66fd3731b5851936ea.mp4', '', 7, 2, '', '2014-02-24 08:15:05', '2014-02-24 14:24:30', '0000-00-00 00:00:00', 1, 1, 2),
(40, 'test', '', '', 'gallery/foto/a3697941007d04ebebeeb2a40fda1ff0.jpg', 'gallery/foto/a3697941007d04ebebeeb2a40fda1ff0.jpg', 6, 2, '', '2014-02-25 05:47:22', '2014-02-25 00:00:00', '0000-00-00 00:00:00', 1, 1, 1),
(44, 'test kocak', '', '', 'gallery/foto/95715fa0fbd8d34c09b8ff6c2dc2797a.png', 'gallery/foto/95715fa0fbd8d34c09b8ff6c2dc2797a.png', 6, 2, '', '2014-02-28 16:37:46', '2014-02-28 22:37:10', '0000-00-00 00:00:00', 1, 1, 0),
(45, 'qwe', '', '', '', '', 7, 2, '', '2014-02-28 16:39:08', '2014-02-28 22:39:00', '0000-00-00 00:00:00', 1, 1, 2),
(46, 'kocak', '', '', 'gallery/video/da9e0b2b4526c285127a17a56513e6e6.mp4', '', 7, 2, '', '2014-02-28 16:50:56', '2014-02-28 22:50:40', '0000-00-00 00:00:00', 1, 1, 0),
(48, 'slide show 1', '', '', 'slideshow/1e68bce3cf44f1b4672e1dce466be31c.jpg', '', 16, 0, 'image', '2014-03-01 09:16:35', '2014-03-02 15:16:40', '0000-00-00 00:00:00', 1, 1, 1),
(49, 'slide video', '', '', 'slideshow/a731f63359b767d1e46897664004731d.mp4', '', 16, 0, 'video', '2014-03-01 09:57:43', '2014-03-01 15:57:50', '0000-00-00 00:00:00', 1, 1, 1),
(50, 'kkp1', '', '', 'rss/2b34d14f1f5062cd85bedf6f5c4f373c.jpg', '', 17, 0, '', '2014-03-03 05:16:06', '2014-03-04 11:16:10', '0000-00-00 00:00:00', 1, 1, 1),
(51, 'tester', '', '', 'slideshow/3cf75e0981b490ca062f31451837a85b.jpg', '', 16, 0, 'image', '2014-03-03 06:11:12', '2014-03-03 12:11:10', '0000-00-00 00:00:00', 1, 1, 0),
(52, 'aaaa', '', '', '', '', 15, 0, '', '2014-03-03 06:12:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0),
(53, 'tester', 'penjelasan tentang&nbsp; Indeks Peta Tematik', '', 'slideshow/41c8d4fb541a2a5e9f69f4e680d26e90.png', '', 15, 0, '', '2014-03-03 06:12:46', '2014-03-03 14:41:20', '0000-00-00 00:00:00', 1, 1, 1),
(55, 'apa', '', '', '', '', 15, 0, '', '2014-03-03 09:00:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(14, '4', 'Dokumentasi', 'one_map/dokumentasi/', 1),
(15, '4', 'Indeks Peta Tematik', 'one_map/indeks_peta/', 1),
(16, '', 'Slide Show', '', 1),
(17, '', 'RSS', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `dtataruang_news_content_peraturan`
--

INSERT INTO `dtataruang_news_content_peraturan` (`id`, `title`, `nomor`, `deskripsi`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(51, 'undang-undang dasar 45', 0, 'undang2', 'peraturan/35f8cb153a8b3ca5f4b7d7b7dcbda9be.png', 1, 1, '2014-02-24 14:48:01', '2014-02-24 14:48:00', 1, 1, 1),
(52, 'undang-undang dasar 45 a', 0, 'undang-undang dasar 45 a', '', 1, 1, '2014-02-24 14:48:34', '2014-02-24 14:48:40', 1, 1, 1),
(53, 'undang-undang dasar 45 b', 0, 'undang-undang dasar 45 b', '', 1, 1, '2014-02-24 14:49:00', '2014-02-24 14:49:00', 1, 1, 1),
(54, 'undang-undang dasar 45 c', 0, 'undang-undang dasar 45 c', '', 1, 1, '2014-02-24 14:49:19', '2014-02-24 14:49:20', 1, 1, 1),
(55, 'undang-undang dasar 45 d', 0, 'undang-undang dasar 45 d', '', 1, 1, '2014-02-24 14:49:35', '2014-02-24 14:49:40', 1, 1, 1),
(56, 'undang-undang dasar 45 e', 0, 'undang-undang dasar 45 e', '', 1, 1, '2014-02-24 14:49:49', '2014-02-24 14:49:50', 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `dtataruang_news_content_product`
--

INSERT INTO `dtataruang_news_content_product` (`id`, `title`, `brief`, `content`, `id_provinsi`, `id_kabupaten`, `kecamatan`, `tahun`, `jml_hal`, `lampiran`, `image`, `thumbnailimage`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(10, 'peta nasional 1', '', 'peta nasionalaaaaa', '02', '0212', 'kec seribu', 2015, 0, '', 'sig/peta pola ruang/a78e4e13067c4195bfe9ad057326fb16.png', '', '', 33, 4, '2014-02-22 12:55:22', '2014-02-22 18:53:50', 1, 1, 1),
(12, 'peta provinsi 1', '', 'sdasdadasaaa ddd<br />', '05', '0508', 'aaaabbbb', 20141, 0, '', 'sig/peta pola ruang/ff3e23e51e09c67e44cd463f00e51dfd.jpg', '', '', 33, 2, '2014-02-25 01:10:37', '2014-02-22 19:12:10', 1, 1, 1),
(13, 'peta pola ruang', '', 'peta pola ruang', '01', '0156', 'kec seribu', 2014, 0, '', 'sig/peta pola ruang/1d69666fd805920793174351b74ac150.jpg', '', '', 33, 4, '2014-02-24 17:25:32', '2014-02-24 23:25:50', 1, 1, 1),
(14, 'tes struktur ruang 11', '', 'tes struktur ruang11', '03', '0315', 'banyu', 2015, 0, '', 'sig/peta struktur ruang/cc2b8c082c429afb64f62ca2afb81c2a.jpg', '', '', 34, 4, '2014-02-24 19:02:05', '2014-02-26 00:44:30', 1, 1, 1),
(15, 'peta pola struktur provinsi', '', 'dmlkamdlkmsakldmal', '01', '0156', 'kec seribu', 2014, 0, '', 'sig/peta struktur ruang/9bc0ea73ef3af838aa01d8d4f129fda8.jpg', '', '', 34, 3, '2014-02-24 19:04:08', '2014-02-25 01:03:20', 1, 1, 1),
(16, 'test', '', 'Tetser', '', '', '', 2012, 100, 'dokumen', 'product/0f2a1a2370e7aca9acad4d8ec24ac5cf.jpg', '', '', 10, 1, '2014-01-14 00:00:00', '2014-02-25 00:00:00', 1, 1, 1),
(17, 'tes pola ruang', '', '', '', '', '', 2014, 0, '', '', '', '', 33, 1, '2014-02-28 10:36:40', '0000-00-00 00:00:00', 1, 1, 0),
(18, 'test', '', '', '', '', '', 2014, 0, '', '', '', '', 33, 1, '2014-03-03 09:10:22', '0000-00-00 00:00:00', 1, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `dtataruang_news_content_program`
--

INSERT INTO `dtataruang_news_content_program` (`id`, `title`, `brief`, `content`, `id_provinsi`, `id_kabupaten`, `kecamatan`, `tahun`, `jml_hal`, `lampiran`, `image`, `thumbnailimage`, `files`, `categoryid`, `articletype`, `createdate`, `postdate`, `fromwho`, `authorid`, `n_status`) VALUES
(27, 'program rencana pengelolaan', '', 'program rencana pengelolaan', '', '', '', 2014, 0, '', 'program/044e18c3becdbbc20fcd257b07418290.png', '', '', 1, 3, '2014-02-24 11:08:50', '0000-00-00 00:00:00', 1, 1, 1),
(28, 'program rencana pengelolaan', '', 'program rencana pengelolaan', '', '', '', 2014, 0, '', 'program/35f89f722e0fcec15ae58e4ba776e732.jpg', '', '', 2, 3, '2014-02-24 11:37:54', '0000-00-00 00:00:00', 1, 1, 1),
(30, 'test1', '', 'testing aja11', '02', '0212', 'kec bandung', 2015, 11, 'peta rencana strategis11', 'program/fd8dc439457d959a06f5ce3cd11dca7b.png', '', '', 2, 2, '2014-02-24 15:14:33', '2014-02-27 21:15:30', 1, 1, 1),
(33, 'tester', '', '', '', '', '', 2014, 0, '', '', '', '', 2, 5, '2014-02-24 15:55:49', '0000-00-00 00:00:00', 1, 1, 1),
(34, 'wkwkwkwk', '', 'knk', '', '', '', 2014, 0, '', 'program/e408b3fd1467f8672eed747b6c69d073.jpg', '', '', 2, 5, '2014-02-24 16:19:34', '0000-00-00 00:00:00', 1, 1, 1),
(35, 'asss', '', '', '', '', '', 2014, 0, '', 'program/44b6fbdfe00d9657e2ea370742379df4.jpg', '', '', 1, 5, '2014-02-26 15:15:32', '0000-00-00 00:00:00', 1, 1, 1),
(36, 'coba program add', '', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '02', '0206', 'cisaat', 2014, 12, 'kertas', 'program/fdb01d8dff4d2d12a9bb0ace0650c6bf.png', '', '', 1, 1, '2014-02-28 13:13:13', '2014-02-28 18:55:30', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtataruang_news_content_repo`
--

CREATE TABLE IF NOT EXISTS `dtataruang_news_content_repo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `brief` text NOT NULL,
  `content` text NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `dtataruang_news_content_repo`
--

INSERT INTO `dtataruang_news_content_repo` (`id`, `title`, `brief`, `content`, `typealbum`, `gallerytype`, `files`, `thumbnail`, `fromwho`, `otherid`, `userid`, `createdate`, `postdate`, `n_status`) VALUES
(38, 'coba', 'pemandangan 1', '', 1, 1, 'gallery/foto/c8b4d067283b7255bedcb9e5625a0e37.jpg', 'gallery/foto/c8b4d067283b7255bedcb9e5625a0e37.jpg', 0, 35, 0, '2014-02-24 03:57:16', '2014-02-24 09:56:30', 1),
(39, 'coba', 'pemandangan 3', '', 1, 1, 'gallery/foto/bbed87c42f23c3f728ad4684c5f5c6e0.jpg', 'gallery/foto/bbed87c42f23c3f728ad4684c5f5c6e0.jpg', 0, 35, 0, '2014-02-24 03:57:16', '2014-02-24 09:56:30', 1),
(40, 'coba', 'pemandangan 3', '', 1, 1, 'gallery/foto/c451e0bf959ccd087bf4b499ace4d90f.jpg', 'gallery/foto/c451e0bf959ccd087bf4b499ace4d90f.jpg', 0, 35, 0, '2014-02-24 03:57:16', '2014-02-24 09:56:30', 1),
(41, 'penyusunan rencana strategis', '', 'penyusunan rencana strategis', 1, 5, 'program/529cda13a271844ca7727cf2716b3346.jpg', NULL, 0, 25, 0, '2014-02-24 10:07:00', '2014-02-24 16:07:10', 0),
(42, 'penyusunan rencana strategis', '', 'penyusunan rencana strategis', 1, 5, 'program/adfbe53e9c6af14f04ac80f4fc4b8cf3.jpg', NULL, 0, 25, 0, '2014-02-24 10:07:00', '2014-02-24 16:07:10', 0),
(43, 'penyusunan rencana strategis', '', 'penyusunan rencana strategis', 1, 5, 'program/8e4da205b846f65e3d48762b36e9bd33.jpg', NULL, 0, 25, 0, '2014-02-24 10:07:00', '2014-02-24 16:07:10', 0),
(47, 'program rencana pengelolaan', '', 'program rencana pengelolaan', 1, 5, 'program/67bc36e1b8f9bba0db59c1b125571ad2.png', 'Naskah Akademis', 0, 27, 0, '2014-02-24 11:08:50', '0000-00-00 00:00:00', 0),
(48, 'program rencana pengelolaan', '', 'program rencana pengelolaan', 1, 5, 'program/b29d6ac8681a70266041b199d64ae1be.png', 'Peta Struktur Ruang', 0, 27, 0, '2014-02-24 11:08:50', '0000-00-00 00:00:00', 0),
(49, 'program rencana pengelolaan', '', 'program rencana pengelolaan', 1, 5, 'program/269a261481d083f92a2e53a23a4a1255.png', 'Naskah Akademis', 0, 28, 0, '2014-02-24 11:22:38', '0000-00-00 00:00:00', 0),
(50, 'program rencana pengelolaan', '', 'program rencana pengelolaan', 1, 5, 'program/850a6f71520a78a483b35e36ccae3e4c.png', 'Peta Struktur Ruang', 0, 28, 0, '2014-02-24 11:22:38', '0000-00-00 00:00:00', 0),
(56, 'test1', '', 'testing aja11', 1, 5, 'program/7bd1c45407f3656e8048c678ec899c04.jpg', 'Naskah Akademis', 0, 30, 0, '2014-02-24 15:14:33', '2014-02-27 21:15:30', 0),
(57, 'test1', '', 'testing aja11', 1, 5, 'program/31af2b6ea320aec2afcbcade7ad0e4f2.jpg', 'Peta Pola Ruang', 0, 30, 0, '2014-02-24 15:14:33', '2014-02-27 21:15:30', 0),
(58, 'test1', '', 'testing aja11', 1, 5, 'program/1823936ca0fe9aaed7d42229fd6453b9.jpg', 'Peta Struktur Ruang', 0, 30, 0, '2014-02-24 15:14:33', '2014-02-27 21:15:30', 0),
(61, 'wkwkwkwk', '', 'knk', 1, 5, 'program/3840291fd6a92f6b7d0416ad8ab03796.jpg', 'Naskah Akademis', 0, 34, 0, '2014-02-24 16:19:34', '0000-00-00 00:00:00', 0),
(62, 'wkwkwkwk', '', 'knk', 1, 5, 'program/2a48ea76191533f5ad17e7bff368576b.jpg', 'Peta Pola Ruang', 0, 34, 0, '2014-02-24 16:19:34', '0000-00-00 00:00:00', 0),
(63, 'wkwkwkwk', '', 'knk', 1, 5, 'program/3856243d4fdace5bc7b5f336444c3be0.jpg', 'Peta Struktur Ruang', 0, 34, 0, '2014-02-24 16:19:34', '0000-00-00 00:00:00', 0),
(64, 'peta pola ruang', '', 'peta pola ruang', 1, 6, 'sig/peta pola ruang/571b0519d35867b102d1c23fd80ec99e.jpg', 'sig_pola', 0, 13, 0, '2014-02-24 17:25:32', '2014-02-24 23:25:50', 2),
(65, 'tes struktur ruang 11', '', 'tes struktur ruang11', 0, 7, 'sig/peta struktur ruang/bee4da19682df6d02b0000cde6bd82da.jpg', 'sig_struktur', 0, 14, 0, '2014-02-24 19:02:05', '2014-02-26 00:44:30', 0),
(66, 'peta pola struktur provinsi', '', 'dmlkamdlkmsakldmal', 0, 7, 'sig/peta struktur ruang/bc136a368e5ee41c5814af402a71d576.png', 'sig_struktur', 0, 15, 0, '2014-02-24 19:04:08', '2014-02-25 01:03:20', 0),
(67, 'peta provinsi 1', '', 'sdasdadasaaa ddd<br />', 1, 6, 'sig/peta pola ruang/42396992c531f3c53bd6d59db80a38ed.jpg', 'sig_pola', 0, 12, 0, '2014-02-25 01:10:37', '2014-02-22 19:12:10', 0),
(68, 'test', '1', '', 1, 1, 'gallery/foto/f66857c7ba884137077f53bdb30763bd.jpg', 'gallery/foto/f66857c7ba884137077f53bdb30763bd.jpg', 0, 40, 0, '2014-02-25 05:47:22', '2014-02-25 00:00:00', 1),
(69, 'test', '2', '', 1, 1, 'gallery/foto/ca7a548efb4b1da7d6d5135140665a75.jpg', 'gallery/foto/ca7a548efb4b1da7d6d5135140665a75.jpg', 0, 40, 0, '2014-02-25 05:47:22', '2014-02-25 00:00:00', 1),
(70, 'test', '3', '', 1, 1, 'gallery/foto/ce33529bdae6410e299f9da3ae183b07.jpg', 'gallery/foto/ce33529bdae6410e299f9da3ae183b07.jpg', 0, 40, 0, '2014-02-25 05:47:22', '2014-02-25 00:00:00', 1),
(71, 'test', '', 'Tetser', 0, 3, 'product/35b197f0e1e236dd567a24fc55475585.doc', 'Naskah Akademis', 1, 10, 0, '2014-01-14 00:00:00', '2014-02-25 00:00:00', 1),
(72, 'asss', '', '', 1, 5, 'program/324804d6eeb08e04d141a686870a6095.jpg', 'Peta Pola Ruang', 0, 35, 0, '2014-02-26 15:15:32', '0000-00-00 00:00:00', 0),
(73, 'coba program add', '', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 1, 5, 'program/6a204ea6e26e2b049396236b14b16b88.doc', 'Naskah Akademis', 0, 36, 0, '2014-02-28 13:13:13', '2014-02-28 18:55:30', 0),
(74, 'coba program add', '', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 1, 5, 'program/3e41f485f53445b3f9d98bc093efb054.png', 'Peta Pola Ruang', 0, 36, 0, '2014-02-28 13:13:13', '2014-02-28 18:55:30', 0),
(75, 'coba program add', '', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 1, 5, 'program/08c8e61975cb2df97767628716c3d648.png', 'Peta Struktur Ruang', 0, 36, 0, '2014-02-28 13:13:13', '2014-02-28 18:55:30', 0),
(76, 'coba program add', '', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 1, 5, 'program/93d67e899bccd404f497be29c3ac99f1.doc', 'Dokumen Final', 0, 36, 0, '2014-02-28 13:13:13', '2014-02-28 18:55:30', 0),
(77, 'test kocak', '', '', 1, 1, 'gallery/foto/fb72e019c64d466a7a9f14f4baef551a.jpg', 'gallery/foto/fb72e019c64d466a7a9f14f4baef551a.jpg', 0, 44, 0, '2014-02-28 16:37:46', '2014-02-28 22:37:10', 0),
(78, 'test kocak', '', '', 1, 1, 'gallery/foto/5c0b2094186dab61279bf50102236294.jpg', 'gallery/foto/5c0b2094186dab61279bf50102236294.jpg', 0, 44, 0, '2014-02-28 16:37:46', '2014-02-28 22:37:10', 0),
(79, 'test kocak', '', '', 1, 1, 'gallery/foto/646d11f79b9070fd862a311d898e06a2.jpg', 'gallery/foto/646d11f79b9070fd862a311d898e06a2.jpg', 0, 44, 0, '2014-02-28 16:37:46', '2014-02-28 22:37:10', 0);

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
(4, 4, 'One Map', 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_member`
--

INSERT INTO `user_member` (`id`, `name`, `nickname`, `email`, `register_date`, `verified_date`, `img`, `image_profile`, `username`, `last_login`, `city`, `sex`, `birthday`, `description`, `middle_name`, `last_name`, `StreetName`, `phone_number`, `n_status`, `login_count`, `verified`, `usertype`, `salt`, `password`) VALUES
(1, 'admin', 'admin', NULL, '2014-01-20 12:37:14', '0000-00-00 00:00:00', NULL, '', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, '1234567890', 'ebf95c3f793174665fd929f01597df7738f574c0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
