-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2016 at 04:23 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_absensi`
--

CREATE TABLE IF NOT EXISTS `t_absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_absen` datetime NOT NULL,
  `id_guru` int(11) NOT NULL,
  PRIMARY KEY (`id_absensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_absensi`
--

INSERT INTO `t_absensi` (`id_absensi`, `id_siswa`, `id_status`, `keterangan`, `tgl_absen`, `id_guru`) VALUES
(1, 2, 1, 'Ijin Edit svsgs', '2016-04-14 04:18:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_berita`
--

CREATE TABLE IF NOT EXISTS `t_berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_berita`
--

INSERT INTO `t_berita` (`id_berita`, `judul`, `isi`, `id_guru`, `gambar`, `tgl_input`, `tgl_update`) VALUES
(1, 'Liburan Sekolah Edit', '<p>Libur Sekolah Edit<br></p><p></p>', 1, 'photo8.jpg', '2016-04-13 00:00:00', '2016-04-13 10:44:05'),
(2, 'Lomba TTG EDIT', 'svsbsbs EDIT<br>', 1, 'Koala.jpg', '2016-04-13 10:04:20', '2016-04-13 10:45:48'),
(3, 'Seleksi Lomba cepat Tepat SMK N 5 Kota Bekasi', '<p><strong>Bekasi, 09 Februari 2016-Â </strong>DalamÂ rangka mempersiapkan siswa-siswi untuk mengikuti sebuah event Lomba Cepat Tepat memperingati Hari Ulang tahun Kota Bekasi , SMK Negeri 5 Kota Bekasi menggelar seleksi kepada siswa-siswi SMK Negeri 5 Kota Bekasi dari kelas 10 dan kelas 11. Seleksi ini bertujuan untuk mencari siswa-siswi yang layak mewakili SMK Negeri 5 Kota Bekasi dalam Lomba cepat tepat HUT Kota Bekasi .Â </p>\r\n<p>Seleksi ini dilakukan dengan beberapa tahap, agar menghasilkan siswa-siswi yang benar-benar kompeten dan bisa bersaing bahkan bisa merebut juara pada lomba tersebut. Untuk seleksi tahap pertama, siswa-siswi peserta seleksi harus mengerjakan 50 soal dalam waktu 60 menit saja. Dari tahap pertama ini, akan diambil 25 besar terbaik untuk mengikuti tahap seleksi selanjutnya sampai mendapat 3 siswa-siswi terbaik untuk mewakili SMK negeri 5 Kota Bekasi.</p>\r\n<p>Seleksi ini menunjukan bahwa SMK Negeri 5 Kota Bekasi sungguh-sungguh dalam mengikuti ajang lomba tersebut, agar SMK Negeri 5 Kota Bekasi tidak sekedar hanya sebagai peserta penghibur atau pelengkap saja, namun bisa bersaing, bisa memberikan perlawanan bahkan bisa merebut juara. Kalah menang memang Â suatu hal yang biasa.Â </p>\r\n<p><em>"Â Boleh kalah, tetapi bagaiamana caranya agar tim lain tidak dengan mudah mengalahkan kita, artinya SMK Negeri 5 Kota Bekasi harus bisa bersaing, harus bisa memberikan perlawanan." </em>Â Itu merupakan kutipan salah satu pesan dari kepala SMK Negeri 5 Kota Bekasi B. Agus Wimbadi, M.Pd kepada peserta seleksi Lomba Cepat Tepat.</p>\r\n<p>Â </p>', 1, 'tes.jpg', '2016-04-13 10:25:59', '2016-04-13 10:45:27'),
(4, 'Bedah SKL Matematika SMK Se-Kota Bekasi', ' <p><strong>Bekasi, 2 Februari 2016-</strong>&nbsp;Dalam rangka menghadapi event yang sangat penting yakni Ujian Nasional tahun 2016, Dinas Pendidikan Kota Bekasi dalam hal ini Bidang Pendidikan Menengah mengadakan sebuah kegiatan bedah SKL mata pelajaran Ujian Nasional Sekolah Menengah Kejuruan. Dimana beberapa Sekolah Menegah Kejuruan ditunjuk sebagai tuan rumah.&nbsp;</p>\r\n<p>Berkaitan dengan kegiatan ini, SMK Negeri 5 Kota Bekasi ditunjuk oleh Dinas Pendidikan Kota Bekasi sebagai tempat pelaksanaan Bedah SKL mata pelajaran Matematika SMK Se-Kota Bekasi. Kegiatan ini diikuti oleh guru-guru mata pelajaran matematika tingkat SMK Se-kota Bekasi. Setiap SMK yang ada di kota Bekasi mengirimkan perwakilin minimal 1 orang guru untuk mengikuti kegiatan ini. Jadi, kurang lebih ada sekitar 200 guru matematika tingkat SMK Se-kota Bekasi yang mengikuti kegiatan ini.</p>\r\n<p>Kegiatan bedah SKL di SMK Negeri 5 Kota Bekasi yang bertajuk <em><strong>"Kupas Tuntas Ujian Nasional Matematika SMK Se-Kota Bekasi" &nbsp;</strong></em>ini diawali dengan sambutan dari Kepala SMK Negeri 5 Kota Bekasi yakni Bapak B. Agus Wimbadi, M.Pd. Selanjutnya kegiatan bedah SKL ini secara resmi dibuka oleh Ketua MKKS Kota Bekasi yaitu Bapak H. I Made Supriatna, M.Si. tepat pukul 08.00 WIB.</p>\r\n<p>Salah satu tujuan dari kegiatan ini adalah agar siswa-siswi SMK kota Bekasi dapat menghadapi Ujian Nasional yang mandiri dan berkualitas.&nbsp;</p>\r\n', 2, 'tes2.JPG', '2016-04-13 11:14:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE IF NOT EXISTS `t_guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nm_guru` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_input` int(11) NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_guru`
--

INSERT INTO `t_guru` (`id_guru`, `nip`, `nm_guru`, `alamat`, `tlp`, `email`, `foto`, `id_input`, `tgl_update`) VALUES
(1, '-', 'Muhamad Riyadi, S.KOM', 'Villa Mas Garden Blok F/33 - Bekasi Utara', '087880000286', 'mriyadi911@gmail.com', '1362_113939025649696_1853294374108855160_n.jpg', 1, '2016-04-14 04:22:09'),
(2, '-', 'Gustavianto, S.KOM', 'Bekasi', '353636363', 'gustav@gmail.com', '', 1, '2016-04-14 02:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE IF NOT EXISTS `t_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kelas` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nm_kelas`) VALUES
(1, 'X RPL 1'),
(2, 'X RPL 2');

-- --------------------------------------------------------

--
-- Table structure for table `t_login`
--

CREATE TABLE IF NOT EXISTS `t_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `u_login` varchar(255) NOT NULL,
  `p_login` char(32) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_login`
--

INSERT INTO `t_login` (`id_login`, `u_login`, `p_login`, `id_guru`, `tgl_daftar`) VALUES
(1, 'riyadi', '202cb962ac59075b964b07152d234b70', 1, '2016-04-14 02:56:29'),
(2, 'gustav', '202cb962ac59075b964b07152d234b70', 2, '2016-04-14 02:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE IF NOT EXISTS `t_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `nm_siswa` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `thn_masuk` char(4) NOT NULL,
  `thn_keluar` char(4) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_input` int(11) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`id_siswa`, `nis`, `nm_siswa`, `id_kelas`, `alamat`, `tlp`, `email`, `thn_masuk`, `thn_keluar`, `foto`, `id_input`) VALUES
(1, '-', 'Muhammad Arsalan Diponegoro', 1, 'sfgsfgsgsg', '5464574', 'fdgdg@dfhdghd.com', '2014', '', '', 0),
(2, '12345', 'Fauzan', 2, 'BEKASI', '4747464', 'sfgfg@gmail.com', '2014', '-', '18.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_status`
--

CREATE TABLE IF NOT EXISTS `t_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nm_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_status`
--

INSERT INTO `t_status` (`id_status`, `nm_status`) VALUES
(1, 'Ijin'),
(2, 'Sakit'),
(3, 'Tidak Hadir');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
