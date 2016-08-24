-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2016 at 12:21 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_spartan`
--

-- --------------------------------------------------------

--
-- Table structure for table `end`
--

CREATE TABLE IF NOT EXISTS `end` (
  `id_end` int(10) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `nsub` varchar(50) NOT NULL,
  `tu` varchar(50) NOT NULL,
  `ntu` varchar(50) NOT NULL,
  `ka` varchar(50) NOT NULL,
  `nka` varchar(50) NOT NULL,
  PRIMARY KEY (`id_end`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `end`
--

INSERT INTO `end` (`id_end`, `text`, `kota`, `sub`, `nsub`, `tu`, `ntu`, `ka`, `nka`) VALUES
(1, 'masuk bulan laporan 16 April 2013', 'Semarang', 'MUHAMMAD KURNIAWAN', 'Jaksa Muda NIP. 197809182008012011', 'ARDI KURNIAWAN', 'Jaksa Muda NIP. 197809182008012011', 'ANDYS SANDRA KURNIAWAN', 'Jaksa Muda NIP. 197809182008012011');

-- --------------------------------------------------------

--
-- Table structure for table `hukuman`
--

CREATE TABLE IF NOT EXISTS `hukuman` (
  `id_hukuman` int(10) NOT NULL AUTO_INCREMENT,
  `peg` varchar(50) NOT NULL,
  `pasal` varchar(50) NOT NULL,
  `pengaduan` varchar(50) NOT NULL,
  `hukuman` varchar(50) NOT NULL,
  `kep` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `periode` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hukuman`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodejenis` char(5) NOT NULL,
  `urjenis` char(50) NOT NULL,
  PRIMARY KEY (`id`,`kodejenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `kodejenis`, `urjenis`) VALUES
(1, 'S', 'Surat Biasa'),
(2, 'ST', 'Surat Tugas'),
(3, 'ND', 'Nota Dinas'),
(4, 'KET', 'Surat Keterangan'),
(5, 'UND', 'Undangan'),
(6, 'R', 'Surat Rahasia'),
(7, 'SR', 'Surat Sangat Rahasia'),
(8, 'LAP', 'Laporan'),
(9, 'SI', 'Surat Izin'),
(10, 'NDR', 'Nota Dinas Rahasia'),
(11, 'BA', 'Berita Acara'),
(12, 'BAST', 'Berita Acara Serah Terima'),
(13, 'Mo', 'Memo'),
(14, 'KEP', 'Surat Keputusan'),
(15, 'SP', 'Surat Pengantar'),
(16, 'PER', 'Peraturan DJPB'),
(17, 'SPTPL', 'Surat Pernyataan Tanggungjawab Pekerjaan Lembur'),
(18, 'PRINT', 'Surat Perintah'),
(19, 'BAR', 'Berita Acara Rekonsiliasi'),
(20, 'NP', 'Nota Pertimbangan'),
(21, 'SPK', 'Surat Perintah Kerja'),
(22, 'PEM', 'Pemberitahuan');

-- --------------------------------------------------------

--
-- Table structure for table `kompilasi`
--

CREATE TABLE IF NOT EXISTS `kompilasi` (
  `id_kompilasi` int(10) NOT NULL AUTO_INCREMENT,
  `tempat` varchar(50) NOT NULL,
  `an` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kompilasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kompilasi`
--

INSERT INTO `kompilasi` (`id_kompilasi`, `tempat`, `an`, `nama`, `nip`) VALUES
(1, 'Purwodadi', 'Asisten Pengawas', 'Wawan Hermawan Kurniaqwan', 'Jaksa Madya NIP. 1234 567 897 8797');

-- --------------------------------------------------------

--
-- Table structure for table `nama`
--

CREATE TABLE IF NOT EXISTS `nama` (
  `id_nama` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_nama`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nama`
--

INSERT INTO `nama` (`id_nama`, `nama`, `alamat`, `telp`, `email`, `web`) VALUES
(1, 'KANTOR WILAYAH PROVINSI KALIMANTAN TENGAH', 'Jalan Tjilik Riwut Km.1 No.10 Kode Pos 73111', '(0536)3221215', 'umum.kanwilkalteng@gmail.com', 'http://kanwildjpbnkalteng.net');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `jab` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `pangkat`, `nip`, `nrp`, `jab`) VALUES
(47, 'Irwan Susanto', 'Penata (III/c)', '197506021999031001', '-', 'Kepala Subbagian Kepegawaian');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa`
--

CREATE TABLE IF NOT EXISTS `pemeriksa` (
  `id_pemeriksa` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `sumber` varchar(150) NOT NULL,
  `terlapor` varchar(150) NOT NULL,
  `uraian` varchar(150) NOT NULL,
  `telaahan` varchar(150) NOT NULL,
  `petunjuk` varchar(150) NOT NULL,
  `lporan` varchar(150) NOT NULL,
  `petunjuk1` varchar(150) NOT NULL,
  `lporan2` varchar(150) NOT NULL,
  `petunjuk2` varchar(150) NOT NULL,
  `putusan` varchar(150) NOT NULL,
  `ket` varchar(150) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pemeriksa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id_pengaduan` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `sumber` varchar(150) NOT NULL,
  `terlapor` varchar(150) NOT NULL,
  `uraian` varchar(150) NOT NULL,
  `telaah` varchar(150) NOT NULL,
  `klarifikasi` varchar(150) NOT NULL,
  `inspeksi` varchar(150) NOT NULL,
  `kajati` varchar(150) NOT NULL,
  `jamwas` varchar(150) NOT NULL,
  `jaksa` varchar(150) NOT NULL,
  `putusan` varchar(150) NOT NULL,
  `ket` varchar(150) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pengaduan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id_register` int(10) NOT NULL AUTO_INCREMENT,
  `nos` varchar(50) NOT NULL,
  `tgl1` date NOT NULL,
  `peg` varchar(50) NOT NULL,
  `pejabat` varchar(50) NOT NULL,
  `pasal` varchar(50) NOT NULL,
  `hukuman` varchar(50) NOT NULL,
  `tgl2` date NOT NULL,
  `tgl3` date NOT NULL,
  `ket` text NOT NULL,
  `periode` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_register`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rjabatan`
--

CREATE TABLE IF NOT EXISTS `rjabatan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `kontrol` varchar(25) NOT NULL,
  PRIMARY KEY (`id`,`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `rjabatan`
--

INSERT INTO `rjabatan` (`id`, `kode`, `jabatan`, `kontrol`) VALUES
(1, '1800', 'Kepala Kantor', '/WPB.18/'),
(2, '1810', 'Kepala Bagian Umum', '/WPB.18/BG.01/'),
(3, '1811', 'Kepala Subbagian Kepegawaian', '/WPB.18/BG.0101/'),
(4, '1812', 'Kepala Subbagian Keuangan', '/WPB.18/BG.0102/'),
(5, '1813', 'Kepala Subbagian TU/RT', '/WPB.18/BG.0103/'),
(6, '1814', 'Kepala Subbagian Penilaian Kinerja', '/WPB.18/BG.0104/'),
(7, '1820', 'Kepala Bidang PPA I', '/WPB.18/BD.01/'),
(8, '1821', 'Kepala Seksi PPA I/A', '/WPB.18/BD.0101/'),
(9, '1822', 'Kepala Seksi PPA I/B', '/WPB.18/BD.0102/'),
(10, '1823', 'Kepala Seksi PPA I/C', '/WPB.18/BD.0103/'),
(11, '1824', 'Kepala Seksi PPA I/D', '/WPB.18/BD.0104/'),
(12, '1830', 'Kepala Bidang PPA II', '/WPB.18/BD.02/'),
(13, '1831', 'Kepala Seksi PPA II/A', '/WPB.18/BD.0201/'),
(14, '1832', 'Kepala Seksi PPA II/B', '/WPB.18/BD.0202/'),
(15, '1834', 'Kepala Seksi PPA II/C', '/WPB.18/BD.0203/'),
(16, '1840', 'Kepala Bidang SKKI', '/WPB.18/BD.03/'),
(17, '1841', 'Kepala Seksi Kepatuhan Internal', '/WPB.18/BD.0301/'),
(18, '1842', 'Kepala Seksi Spv. Proses Bisnis', '/WPB.18/BD.0302/'),
(19, '1843', 'Kepala Seksi Spv. Teknis Aplikasi', '/WPB.18/BD.0303/'),
(20, '1850', 'Kepala Bidang PAPK', '/WPB.18/BD.04/'),
(21, '1851', 'Kepala Seksi ASPLK', '/WPB.18/BD.0401/'),
(22, '1852', 'Kepala Seksi PSAPP', '/WPB.18/BD.0402/'),
(23, '1853', 'Kepala Seksi PSAPD', '/WPB.18/BD.0403/');

-- --------------------------------------------------------

--
-- Table structure for table `rkantor`
--

CREATE TABLE IF NOT EXISTS `rkantor` (
  `id` int(3) DEFAULT NULL,
  `kantor` varchar(210) DEFAULT NULL,
  `alamat` varchar(450) DEFAULT NULL,
  `telpon` varchar(60) DEFAULT NULL,
  `faks` varchar(60) DEFAULT NULL,
  `pos` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rkantor`
--

INSERT INTO `rkantor` (`id`, `kantor`, `alamat`, `telpon`, `faks`, `pos`, `email`) VALUES
(1, 'Menteri Keuangan', 'Gedung Djuanda I Jl. Dr. Wahidin Raya No.1 Jakarta Pusat', '(021) 3814324', '\\N', '\\N', '\\N'),
(2, 'Sekretariat Kementerian Keuangan', 'Gedung Djuanda I Jl. Dr. Wahidin Raya No.1 Jakarta Pusat', '(021) 3449230', '\\N', '\\N', 'setjen.kemenkeu.go.id'),
(3, 'Dit.jen Perbendaharaan', 'Gedung Prijadi Praptosuhardjo I Jl. Banteng Timur No.2-4 Jakarta Pusat/ 10710', '(021) 3814411', '\\N', '\\N', 'perbendaharaan.kemekeu.go.id'),
(4, 'Dit.jen Bea Dan Cukai', 'Jl. Achmad Yani By pass, Rawamangun Jakarta Timur13230', '9021) 1500225', '\\N', '\\N', 'beacukai.go.id'),
(5, 'Dit.jen Kekayaan Negara', 'Gedung PAIK (Ged.Syafrudin Prawiranegara) Jl. Lapangan Banteng Timur No. 2-4 Jakarta Pusat 10710', '(021) 1500991', '\\N', '\\N', 'djkn.kemenkeu.go.id'),
(6, 'Dit.jen Anggaran', 'Gedung Sutikno Slamet Jl. Dr. Wahidin raya No.1 Jakarta Pusat 10710', '(021) 34832511', '\\N', '\\N', 'anggaran.kemenkeu.go.id '),
(7, 'Dit.jen Perimbangan Keuangan', 'Gedung Radius Prawiro Jl. Dr. Wahidin Raya No.1 Jakarta Pusat 10710', '(021) 3509442', '\\N', '\\N', 'djpk.kemenkeu.go.id'),
(8, 'Dit.jen Pajak', 'Gedung Utama jl. Jend. Gatot Subroto No. 40-42 Jakarta Selatan 12190', '(021) 1500200', '\\N', '\\N', 'pajak.go.id'),
(9, 'Dit.jen Pengelolaan Pembiayaan Dan Resiko', 'Gedung Frans Seda Jl. Dr. Wahidin Raya No.1 Jakarta Pusat 10710', '(021) 3865330', '\\N', '\\N', 'djppr.kemenkeu.go.id'),
(10, 'Inspektorat Jenderal', 'Gedung Djuanda II Jl. Dr. Wahidin Raya No.1 Jakarta Pusat 10710', '(021) 3865430', '\\N', '\\N', 'itjen.kemenkeu.go.id'),
(11, 'Badan Kebijakan Fiskal', 'Gedung R.M. Notohamiprodjo Jl. Dr. Wahidin Raya No. 1 Jakarta Pusat', '(021) 34833486', '\\N', '\\N', 'fiskal.kemenkeu.go.id'),
(12, 'BPPK Jakarta', 'Jl. Purnawarman No.99, Kebayoran Baru Jakarta Selatan 12110', '(021) 29054300', '\\N', '\\N', 'BPPK.kemenkeu.go.id'),
(13, 'SetDit.jen Perbendaharaan', 'Gedung Prijadi Praptosuhardjo I lantai 1 dan 2, Jalan Lapangan Banteng Timur No.2-4 Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(14, 'Dit. Pelaksanaan Anggaran', 'Gedung Prijadi Praptosuhardjo I lantai 4, Jalan Lapangan Banteng Timur No.2-4 Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(15, 'Dit. Pengelolaan Kas Negara', 'Gedung Prijadi Praptosuhardjo II lantai 2 dan 3, Jalan Lapangan Banteng Timur No.2-4 Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(16, 'Dit. Sistem Manajemen Investasi', 'Gedung Prijadi Praptosuhardjo I lantai 3, Jalan Lapangan Banteng Timur No.2-4 Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(17, 'Dit. PPK BLU', 'Gedung Prijadi Praptosuhardjo I lantai 5, Jalan Lapangan Banteng Timur No.2-4 Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(18, 'Dit. Akuntansi Dan Pelaporan', 'Gedung Prijadi Praptosuhardjo III lantai 1 dan 2 Jalan Budi Utomo No.6, Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(19, 'Dit. Sistem Perbendaharaan', 'Gedung Prijadi Praptosuhardjo III lantai 3 dan 4 Jalan Budi Utomo No.6, Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(20, 'Dit. Sistem Informasi Dan Teknologi Perbendaharaan', 'Gedung Prijadi Praptosuhardjo III lantai 3, Jalan Dr. Wahidin II No.3, Jakarta Pusat', '(021) 3449230', '\\N', '\\N', '\\N'),
(21, 'Kanwil DJPBN Provinsi Aceh', 'GKN Gedung A Lt.2-3 Jl.Tengku chik Di Tiro Banda Aceh / 23241', '\\N', '0651-31094', '\\N', '\\N'),
(22, 'Kanwil DJPBN Provinsi Sumatera Utara', 'Jl. Diponegoro No.30A Medan', '\\N', '061-4148440,4538600', '1651/', 'kanwilsumut.DJPBN@depkeu.go.id'),
(23, 'Kanwil DJPBN Provinsi Sumatera Barat', 'Jl. Khatib Sulaiman No.53 Padang /25138', '\\N', '0751-7051020', '\\N', '\\N'),
(24, 'Kanwil DJPBN Provinsi Riau', 'Jl. Jend Sudirman No.249 / 28116 Pekanbaru', '\\N', '\\N', '\\N', '\\N'),
(25, 'Kanwil DJPBN Provinsi Kepulauan Riau', 'Jl. Jend Sudirman No.249 / 28116 Pekanbaru', '\\N', '\\N', '\\N', '\\N'),
(26, 'Kanwil DJPBN Provinsi Jambi', 'Jl. Mayjend N. Yoesoef Singadikane No.45 Jambi /36122', '\\N', '\\N', '\\N', '\\N'),
(27, 'Kanwil DJPBN Provinsi Sumatera Selatan', 'Gedung Keuangan Negara (GKN) Jl. Kapten A.Rivai No. 2 Palembang/30129', '\\N', '\\N', '\\N', '\\N'),
(28, 'Kanwil DJPBN Provinsi Lampung', 'Jl. Cut Meutia No. 23A Lampung / 35124', '\\N', '\\N', '\\N', '\\N'),
(29, 'Kanwil DJPBN Provinsi Bengkulu', 'Jl. Adam Malik LM.8 Bengkulu /38225', '\\N', '\\N', '\\N', '\\N'),
(30, 'Kanwil DJPBN Provinsi Bangka Belitung', 'Jl. Sungai Selan No.91 Pangkalpinang/33135', '\\N', '\\N', '\\N', '\\N'),
(31, 'Kanwil DJPBN Provinsi Banten', 'Jl.KH. Abdul fatah Hasan No.33 Serang Banten/ 42118', '\\N', '\\N', '\\N', '\\N'),
(32, 'Kanwil DJPBN Provinsi Dki Jakarta', 'Jkl. Otto Iskandar No. 53-55 jakarta/13330', '\\N', '\\N', '\\N', '\\N'),
(33, 'Kanwil DJPBN Provinsi Jawa Barat', 'Gedung Dwi Darma Jl. Diponegoro No.59 Bandung/40123', '\\N', '\\N', '\\N', 'kanwil.pbnjabar@gmail.com'),
(34, 'Kanwil DJPBN Provinsi Jawa Tengah', 'GKN. Jl. Pemuda No. 2 semarang/50138', '\\N', '\\N', '\\N', 'kanwil.jateng@depkeu.go.id'),
(35, 'Kanwil DJPBN Provinsi D.I. Yogyakarta', 'Jl. Solo Km.8,6 Nayan Maguwoharjo, Depok Sleman Yogyakarta 55282', '\\N', '\\N', '\\N', '\\N'),
(36, 'Kanwil DJPBN Provinsi Jawa Timur', 'GKN. Surabaya I Jl. Indraputra 5 surabaya ', '\\N', '\\N', '\\N', 'kanwiljatim@perbendaharaan.go.id'),
(37, 'Kanwil DJPBN Provinsi Kalimantan Barat', ' Jl. K.S. Tubun No.36 Pontianak 78121', '\\N', '\\N', '\\N', 'umum.kanwildjpbpontianak@gmail.com'),
(38, 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Jl. Tjilik Riwut Km. 1 No.10 Palangkaraya 73111', '\\N', '\\N', '\\N', 'kanwil.DJPBN.kalteng@gmail.com'),
(39, 'Kanwil DJPBN Provinsi Kalimantan Selatan', 'Jl. Mayjen D.I. Panjaitan No.24 Banjarmasin', '\\N', '\\N', '\\N', 'kanwil.banjarmasin@perbendaharaan.go.id'),
(40, 'Kanwil DJPBN Provinsi Kalimantan Timur', 'Jl. Ir. H. Juanda No. 4 Samarinda 75124', '\\N', '\\N', '\\N', '\\N'),
(41, 'Kanwil DJPBN Provinsi Bali', 'GKN Jl. Dr. Kusumaatmaja Niti Mandala Denpasar 80235', '\\N', '0361-222844', '\\N', 'perbendaharaan.bali.@gmail.com'),
(42, 'Kanwil DJPBN Provinsi Nusa Tenggara Barat', 'Jl. Majapahit No. 10 Mataram 83127', '0370-643622; 633669;', '0370-643633', '\\N', '\\N'),
(43, 'Kanwil DJPBN Provinsi Nusa Tenggara Timur', 'GKN Lt. 3 Jl. Frans Seda,Kupang 85228', '0380-823501', '0380-823509', '\\N', 'treasurykupang@gmail.com'),
(44, 'Kanwil DJPBN Provinsi Sulawesi Selatan', 'Jl. Jend. Urip Sumoharjo Km. 4 GKN II Lt. II', '\\N', '0411-456134', '1073', '\\N'),
(45, 'Kanwil DJPBN Provinsi Sulawesi Barat', 'Jl.Soekarno Hatta Mamuju GKN Lt.III, Mamuju 91511', '\\N', '0451-422936', '\\N', 'kanwilDJPBNsulbar@gmail.com'),
(46, 'Kanwil DJPBN Provinsi Sulawesi Tengah', 'Jl. Tanjung dako NO.15 palu 94112', '\\N', '0451-422936', '\\N', 'kanwil.Palu@gmail.com'),
(47, 'Kanwil DJPBN Provinsi Sulawesi Tenggara', 'Jl. Mayjen Sutoyo No. 34 Kendari/ 93112', '\\N', '0401-3127119', '\\N', 'DJPBNsultra@gmail.com , Kanwil.kendari@perbendahar'),
(48, 'Kanwil DJPBN Provinsi Gorontalo', 'Jl. Araden Saleh No. 3 Gorontalo / 96128', '0435-826694', '0435-824412', '\\N', '\\N'),
(49, 'Kanwil DJPBN Provinsi Sulawesi Utara', 'GKN Manado Lt.3; Jl. Bethesda No.8 Manado/95114', '\\N', '0431-863713', '\\N', 'kanwil.djpb.sulut@gmail.com'),
(50, 'Kanwil DJPBN Provinsi Maluku Utara', 'Jl. Jati Lurus No.254 Ternate', '\\N', '0921-311117', '\\N', '\\N'),
(51, 'Kanwil DJPBN Provinsi Maluku', 'Jl. Pitu Ina No.7 Karang panjang ambon/ 97122', '\\N', '0911-314757', '\\N', '\\N'),
(52, 'Kanwil DJPBN Provinsi Papua Barat', 'Jl. Merdeka No.97C Manokwari ', '0986-212122', '0986-212124', '\\N', '\\N'),
(53, 'Kanwil DJPBN Provinsi Papua', 'Gedung Menara Indoprima Jl.pasifik Permai Blok D7-D8, jayapura 99111', '\\N', '0967-535963', '\\N', '\\N'),
(54, 'KPPN Banda Aceh', 'GKN Gedung A Lt. 1 Jl. Tengku Chik di Tiro Banda Aceh / 23241', '\\N', '0651-22460', '\\N', '\\N'),
(55, 'KPPN Lhokseumawe', 'Jl. Merdeka, kampung Jawa lama, lhokseumawe/24241', '\\N', '0645-630659', '\\N', '\\N'),
(56, 'KPPN Meulaboh', 'Jl. Sisingamangaraja No.3 Meulaboh / 23617', '\\N', '0655-7551023', '\\N', '\\N'),
(57, 'KPPN Tapak Tuan', 'Jl. Cut Ali No.69 Tapak Tuan / 23715', '\\N', '0656-21116', '\\N', '\\N'),
(58, 'KPPN Langsa', 'Jl. Jend. A. Yani No. 2 Langsa /24416', '\\N', '0641-21408', '\\N', '\\N'),
(59, 'KPPN Kutacane', 'Jl. Blangkejeren Km.3,5 Kutacane / 24601', '\\N', '0629-21222', '\\N', '\\N'),
(60, 'KPPN Takengon', 'Gedung Pendari Jl. Yos Sudarso Takengon /24551', '\\N', '0643-23771', '\\N', '\\N'),
(61, 'KPPN Medan I', 'Jl. Diponegoro No.30A Medan/ 20152', '\\N', '061-4515710', '\\N', 'KPPN004.prima@gmail.com'),
(62, 'KPPN Medan II', 'Jl. Diponegoro No.30A Medan/ 20152', '\\N', '061-4538448', '\\N', 'KPPNmedanprima2@gmail.com'),
(63, 'KPPN Tebingtinggi', 'Jl. Sutomo No. 2 Tebingtinggi / 20600', '\\N', '0621-327601', '\\N', 'KPPNtebingtinggi@gmail.com'),
(64, 'KPPN Pematang Siantar', 'Jl. Brigjen Rajamin Purba, SH Pematang siantar / 21111', '\\N', '0622-22593', '\\N', 'kpepeen.lima@gmail.com'),
(65, 'KPPN Padang Sidempuan', 'Jl. Kenanga No. 50 Padang Sidempuan / 22725', '\\N', '0634-21257', '\\N', 'KPPNsidempuan@gmail.com'),
(66, 'KPPN Gunung Sitoli', 'Jl. Pancasila No. 13 Gunung sitoli/ 22814', '\\N', '0639-21934', '\\N', 'KPPN.gunungsitoli@gmail.com'),
(67, 'KPPN Rantau Prapat', 'Jl. sisingamangaraja No.62 Rantau papat /21415', '\\N', '0624-21773', '\\N', 'KPPN.rantaurapat.075@gmail.com'),
(68, 'KPPN Tanjung Balai', 'Jl. Sudirman Km.1 Tanjungbalai/ 21312', '\\N', '0623-92021', '\\N', 'KPPNtanjungbalai@gmail.com'),
(69, 'KPPN Sibolga', 'Jl. Dr. Sutomo No.7 Sibolga /21520', '\\N', '0631-21520', '\\N', 'KPPNsibolga@gmail.com'),
(70, 'KPPN Sidikalang', 'Jl. Sisingamangaraja No.69A Sidikalang ', '\\N', '0627-21680', '\\N', 'KPPN119@gmail.com'),
(71, 'KPPN Balige', 'Jl. Raya Balige-Laguboti Km. 3,5 Balige ', '\\N', '0632-21205', '\\N', '\\N'),
(72, 'KPPN Padang', 'Jl. Perintis Kemerdekaan No.79 padang/25129 ', '\\N', '0751-21282', '\\N', '\\N'),
(73, 'KPPN Painan', 'Jl. Ilyas Yacub No. 3 Painan', '\\N', '0756-21716', '\\N', '\\N'),
(74, 'KPPN Bukit Tinggi', 'Jl. Prof. Hazairin No. 1 Bukit Tinggi / 26116 ', '\\N', '0752-21306', '\\N', '\\N'),
(75, 'KPPN Solok', 'Jl. Raja Kota Baru Solok /27362  ', '\\N', '0755-20501', '\\N', '\\N'),
(76, 'KPPN Sijunjung', 'Jl. Prof. M. Yamin, SH No.77 Muaro Sijunjung', '\\N', '0754-21124', '\\N', '\\N'),
(77, 'KPPN Lubuk Sikaping', 'Jl. Jend. Sudirman No. 93 lubuk sikaping/28116', '\\N', '0753-20282', '\\N', '\\N'),
(78, 'KPPN Pekanbaru', 'Jl. Jend. sudirman No. 249 pekanbaru', '\\N', '0761-23117', '\\N', 'www.pekanbaru.net , KPPNpekanbaru@gmail.com'),
(79, 'KPPN Rengat', 'Jl. Diponegoro No. 2 Rengat / 29112', '\\N', '0769-21170', '\\N', 'KPPN092@gmail.com'),
(80, 'KPPN Dumai', 'Jl. Jend. Sudirman No. 25 Dumai / 28812', '\\N', '0765-31037', '\\N', 'KPPNdumai@gmail.com'),
(81, 'KPPN Tanjung Pinang', 'Jl. Diponegoro No.5 Tanjung Pinang /29111', '\\N', '0771-21644', '\\N', '\\N'),
(82, 'KPPN Batam', 'Jl. Raja Haji - Sekupang Batam / 29422', '\\N', '0778-321740', '\\N', '\\N'),
(83, 'KPPN Jambi', 'Jl. Jend.a. Yani No.7 Jambi / 36122', '\\N', '0741-62719', '\\N', '\\N'),
(84, 'KPPN Kuala Tungkal', 'Jl. Thomas Cup No.1 Kuala Tungkal / 36513', '\\N', '0742-323226', '\\N', '\\N'),
(85, 'KPPN Sungai Penuh', 'Jl. H. Bakri No.16 Sungai Penuh /37112', '\\N', '0748-22022', '\\N', '\\N'),
(86, 'KPPN Muara Bungo', 'Jl. Sultan Thaha No.52 Muara Bungo /37211', '\\N', '0747-21610', '\\N', '\\N'),
(87, 'KPPN Bangko', 'Jl. Diponegoro Bangko ', '\\N', '0746-323161', '\\N', '\\N'),
(88, 'KPPN Palembang', 'Jl. Kapten A.rivai No.2 Palembang / 30129', '\\N', '0711-312755', '\\N', 'KPPNpalembang@gmail.com'),
(89, 'KPPN Sekayu', 'Jl. Kolonel Wahid Udi Sekayu ', '\\N', '0714-322814', '\\N', 'KPPN160@gmail.com'),
(90, 'KPPN Baturaja', 'Jl. Jend. D.I. Panjaitan No.471 Baturaja / 32112', '\\N', '0735-324631', '\\N', 'KPPN.baturaja@gmail.com'),
(91, 'KPPN Lubuk Linggau', 'Jl. Yos Sudarso Taba Pingin Komp. Pemda Tk.II Musi Rawas/31626', '\\N', '0733-451571', '\\N', 'KPPN.lubuklinggau.070@gmail.com'),
(92, 'KPPN Lahat', 'Jl. R.E. Martadinata No. 20 Lahat / 31414', '\\N', '0731-326022', '\\N', 'KPPN114@gmail.com'),
(93, 'KPPN Bandar Lampung', 'Jl. Jend.gatot subroto No.91 / 35128', '\\N', '0721-259518', '\\N', 'KPPNbalam@depkeu.go.id'),
(94, 'KPPN Metro', 'Jl. Seminung No. 5 Metro', '\\N', '0725-49450', '\\N', 'vera10@gmail.com'),
(95, 'KPPN Kotabumi', 'Jl. Jend. Sudirman Km.3 kotabumi / 31513', '\\N', '0724-21446', '\\N', 'KPPN116@gmail.com'),
(96, 'KPPN Liwa', 'Jl. Raden Intan Way Mengaku ', '\\N', '0728-21635', '\\N', 'KPPNliwa@depkeu.go.id'),
(97, 'KPPN Bengkulu', 'Jl. Soekarno Hatta No.1 Bengkulu ', '\\N', '0736-21967', '\\N', 'KPPNbengkulu016@gmail.com'),
(98, 'KPPN Muko-Muko', 'Jl. Imam Bonjol, Komplek Perkantoran Pemda Muko-muko /38365', '\\N', '0737-71616', '\\N', '\\N'),
(99, 'KPPN Curup', 'Jl. Sukowati No.63 Curup / 39114', '\\N', '0732-325332', '\\N', 'KPPN146@gnail.com'),
(100, 'KPPN Manna', 'Jl. Affan Baksin No. 103 Manna', '\\N', '0739-21018', '\\N', 'KPPN121@gmail.com'),
(101, 'KPPN Pangkalpinang', 'Jl. Kejaksaan No.16 Pangalpinang/ 33125', '\\N', '0717-422822', '\\N', 'KPPN015pkp@gmail.com'),
(102, 'KPPN Tanjung Pandan', 'Jl. Sriwijaya Paal 1 Tanjung Pandan /33416', '\\N', '0719-21717', '\\N', 'KPPN107@gmail.com'),
(103, 'KPPN Serang', 'Jl. KH. Abdul Fatah Hasan No. 33 serang banten/ 421187', '\\N', '0254-2002127', '\\N', 'KPPN20@gmail.com'),
(104, 'KPPN Rangkasbitung', 'Jl. Siliwangi No.48 Pasir Ona Rangkas Bitung', '\\N', '021-280800', '\\N', 'kepeg.KPPN.rangkasbitung@gmail.com'),
(105, 'KPPN Tangerang', 'Jl. TMP Taruna No.12 Tangerang Banten / 42314', '\\N', '021-5533725', '\\N', 'KPPNtangerang@gmail.com'),
(106, 'KPPN Jakarta I', 'Jl. Ir. H. Juanda No.19 Jakarta/ 10210', '\\N', '021-3845795', '\\N', '\\N'),
(107, 'KPPN Jakarta II', 'Jl. Wahidin II No.3 Jakarta/10710', '\\N', '021-3812514', '\\N', '\\N'),
(108, 'KPPN Jakarta III', 'Jl. Otto Iskandar Dinata No. 53-55 Jakarta Timur', '\\N', '021-8192426', '\\N', '\\N'),
(109, 'KPPN Jakarta IV', 'Jl. Ir. H. Juanda No.19 Jakarta/ 10210', '\\N', '021-3812301', '\\N', '\\N'),
(110, 'KPPN Jakarta V', 'Jl. T. B. Simatupang Kav.67 Pasar Minggu Jakarta Selatan', '\\N', '021-78832428', '\\N', 'KPPN139@gmail.com'),
(111, 'KPPN Jakarta VI', 'Jl. Ir. H. Juanda No.19 Jakarta/ 10210', '\\N', '021-3510324', '\\N', 'KPPNjkt6@depkeu.go.id , KPPNjkt6@gmail.com'),
(112, 'KPPN Khusus Jakarta Vii ', 'Jl. Otto Iskandar Dinata No. 53-55 Jakarta Timur/13330', '\\N', '021-85915426', '\\N', 'KPPN182@gmail.com'),
(113, 'KPPN Khusus Pinjaman Dan Hibah', 'Jl. Ir. H. Juanda No.19 Jakarta/ 10210', '\\N', '021-3842271', '\\N', '\\N'),
(114, 'KPPN Khusus Penerimaan', 'Gedung Prijadi Prapsuhardjo III Lt. 2, Jl. Dr. Wahidin II No.3 jakarta', '\\N', '\\N', '\\N', '\\N'),
(115, 'KPPN Khusus Investasi', 'Gedung Prijadi praptosuhardjo III Lt. 2, Jl. DR. Wahidin II No.3 Jakarta', '\\N', '\\N', '\\N', '\\N'),
(116, 'KPPN Bandung I', 'Jl. Asia Afrika No.114 Bandung / 40261', '\\N', '022-4240298', '\\N', 'kepeg.KPPN022@gmail.com'),
(117, 'KPPN Bandung Ii', 'Jl. Penghulu H. Hasan Mustofa No.37 Bandung', '\\N', '022-7205931', '\\N', 'KPPN095@gmail.com'),
(118, 'KPPN Bekasi', 'Jl. Pramuka No.63 Bekasi ', '\\N', '021-8845299', '\\N', 'KPPN171@gmail.com'),
(119, 'KPPN Karawang', 'Jl. Kertabumi No.40A Karawang / 41311', '\\N', '0267-412124', '\\N', 'KPPN086@gmail.com'),
(120, 'KPPN Bogor', 'Jl. Ir. H. Juanda No.62 Bogor /46122', '\\N', '0251-8321055', '\\N', 'KPPNbogor023@gmail.com'),
(121, 'KPPN Purwakarta', 'Jl. Ibrahim Singadilaga No.82 Purwakarta/41115', '\\N', '0264-200412', '\\N', 'KPPN.keren@gmail.com'),
(122, 'KPPN Sukabumi', 'Jl. Suryakencana No.20 Kecamatan Cikole, kota Sukabumi/43111', '\\N', '0266-214933', '\\N', 'KPPN128@gmail.com'),
(123, 'KPPN Garut', 'Jl. Jend. A. Yani No.24 garut/44117', '\\N', '026-2233047', '\\N', 'kepeg.KPPNgarut096@gmail.com'),
(124, 'KPPN Cirebon', 'Jl. Tuparev No.14 Cirebon ', '\\N', '0231-203800', '\\N', 'KPPNcirebon024@gmail.com'),
(125, 'KPPN Kuningan', 'Jl. Moch. Toha Kasturi Kuningan ', '\\N', '0232-870387', '\\N', 'KPPN147@perbendaharaan.go.id; , kepeg.KPPNkuningan'),
(126, 'KPPN Tasikmalaya', 'Jl. Manojaya No.50 cibereum Tasikmalaya /46196', '\\N', '0265-320202', '\\N', 'KPPN.tasikmalaya@gmail.com'),
(127, 'KPPN Sumedang', 'Jl. Mayor Abdurahman No. 221 Sumedang', '\\N', '0261-201146', '\\N', 'KPPN087.sumedang@gmail.com'),
(128, 'KPPN Semarang I', 'Jl. Ki Mangunsarkoro No.34 Semarang /50241', '\\N', '024-8411086', '\\N', 'semarang1.KPPN@gmail.com'),
(129, 'KPPN Semarang Ii', 'Jl. Ki Mangunsarkoro No.34 Semarang /50241', '\\N', '024-8419664', '\\N', 'KPPN.semarang2@gmail.com'),
(130, 'KPPN Surakarta', 'Jl. Slamet Riyadi No.467 Surakarta/57146', '\\N', '0271-710648', '\\N', 'KPPN028@gmail.com'),
(131, ' KPPN Sragen', 'Komp.gd. Kartini, Jl.sukowatiNo.15C Sragen', '\\N', '0271-710648', '\\N', 'KPPN162.sragen@gmail.com'),
(132, 'KPPN Klaten', 'Jl. Sersan Sadikin No. 30 Klaten ', '\\N', '0272-320443', '\\N', 'KPPN148@gmail.com'),
(133, 'KPPN Pati', 'Jl. P. Diponegoro No.102 pati/59111', '\\N', '0295-381484', '\\N', 'KPPN097@gmail.com'),
(134, 'KPPN Purwodadi', 'Jl. MH. Thamrin 13 Purwodadi ', '\\N', '0292-455030', '\\N', 'KPPN163@gmail.com'),
(135, 'KPPN Kudus', 'Jl. Raya Mejobo Kudus /59319', '\\N', '0291-431397', '\\N', 'KPPNkudus@gmail.com'),
(136, 'KPPN Pekalongan', 'Jl. Bahagia No.44 Pekalongan/51117', '\\N', '0285-421479', '\\N', 'KPPN.pkl@gmail.com'),
(137, 'KPPN Tegal ', 'Jl. Dr. Sutomo No.64 Tegal/52113', '\\N', '0283-353224', '\\N', 'KPPNtegal@gmail.com'),
(138, 'KPPN Purworejo', 'Jl. Uri Sumoharjo No/ 83 purworejo/54111', '\\N', '0275-321382', '\\N', 'KPPN.purworejo@gmail.com'),
(139, 'KPPN Purwokerto', 'Jl. D.I. Panjaitan No.62 Purwokerto', '\\N', '0281-634715', '\\N', 'kepeg.KPPN.pwt@gmail.com'),
(140, 'KPPN Banjarnegara', 'Jl. Letjen S.parman No.545 Banjarnegara/53412', '\\N', '0286-591456', '\\N', 'umumKPPN164@gmailcom'),
(141, 'KPPN Cilacap', 'Jl. Dr.Perintis Kemerdekaan No.28 Cilacap', '\\N', '0282-547009', '\\N', 'KPPN130.cilacap@gmail.com'),
(142, 'KPPN Magelang', 'Jl. Veteran No.3 magelang/56117', '\\N', '0293-363632,0364437', '\\N', 'KPPN115magelang@gmail.com'),
(143, 'KPPN Yogyakarta', 'Jl. Kusumanegara No.11 Yogyakarta/55166', '\\N', '0274-554634', '\\N', 'kepegawaian.KPPNjogja@gmail.com'),
(144, 'KPPN Wates', 'Jl. KH. Achmad Dahlan KM. 2,2 Wates/55611', '\\N', '0274-775301', '\\N', 'KPPN176@gmail.com'),
(145, 'KPPN Wonosari', 'Jl. Taman Bhakti Piyaman Wonosari/55815', '\\N', '0274-394712', '\\N', 'KPPNwno@gmail.com'),
(146, 'KPPN Surabaya I ', 'GKN Surabaya 1 Jl. Indraputra No. 5 Lt.4 Surabaya/60175', '\\N', '031-3523992', '\\N', '\\N'),
(147, 'KPPN Surabaya II', 'GKN Surabaya II Lt.7 Jl. Dinoyo No.111 Surabaya/60265', '\\N', '031-5615394', '\\N', '\\N'),
(148, 'KPPN Sidoarjo', 'Jl.monginsidi No.89A Sidoarjo', '\\N', '031-8057648', '\\N', '\\N'),
(149, 'KPPN Malang ', 'Jl. Merdeka Selatan No.2 Malang/65119', '\\N', '0341-362800', '\\N', '\\N'),
(150, 'KPPN Pamekasan', 'Jl. Jokotole No.141 Pamekasan/69321', '\\N', '0324-322367', '\\N', '\\N'),
(151, 'KPPN Mojokerto', 'Jl. Gajah Mada No.147 Mojokerto/61314', '\\N', '0321-321288', '\\N', '\\N'),
(152, 'KPPN Banyuwangi', 'Jl. Jend. A. Yani No.120 Banyuwangi/68416', '\\N', '0333-410078', '\\N', '\\N'),
(153, 'KPPN Jember', 'Jl. Kalimantan No.35 Jember/68121', '\\N', '0331-336571', '\\N', '\\N'),
(154, 'KPPN Bondowoso', 'Jl. Jend. A. Yani No.86 Bondowoso/68215', '\\N', '0332-420605', '\\N', '\\N'),
(155, 'KPPN Madiun', 'Jl. Salak No.52 Madiun/63131', '\\N', '0351-459183', '\\N', '\\N'),
(156, 'Kppb Kediri', 'Jl. Jenderal Basuki Rachmat No.11 Kediri/64124', '\\N', '0354-682325', '\\N', '\\N'),
(157, 'KPPN Blitar ', 'Jl. Raya Galum Km.4 Blitar/66182', '\\N', '0342-813534', '\\N', '\\N'),
(158, 'KPPN Bojonegoro', 'Jl. Untung Suropati No.63 Bojonegoro/62115', '\\N', '0353-881309', '\\N', '\\N'),
(159, 'KPPN Tuban ', 'Jl. H. O. S Cokroaminoto No.22 Tuban', '\\N', '0356-327362', '\\N', '\\N'),
(160, 'KPPN Pacitan', 'Jl. Letjen S. Parman No.47 Pacitan ', '\\N', '0357-881197', '\\N', '\\N'),
(161, 'KPPN Pontianak', 'Jl. K. Sasuit Tubun No.36 pontianak/78121 ', '\\N', '0561-749980', '\\N', 'sbu.KPPNpontianak@gmail.com'),
(162, 'KPPN Sanggau', 'Jl. Jenderal Sudirman Km.77 No.99 Sanggau/78511', '\\N', '0564-23300', '\\N', 'KPPNsanggau@gmail.com'),
(163, 'KPPN Singkawang', 'Jl. Firdaus H.Rais No.66 Singkawang/79123', '\\N', '0562-631027', '\\N', 'KPPNsingkawang@gmail.com'),
(164, 'KPPN Ketapang', 'Jl. Jend.Sudirman No.55 Ketapang/78812', '\\N', '0534-32077', '\\N', 'KPPN094.ketapang@gmail.com'),
(165, 'KPPN Sintang', 'Jl. Adi Sucipto No.1 sintang/78611', '\\N', '0565-21901', '\\N', 'KPPNsintang@gmail.com'),
(166, 'KPPN Putussibau', 'Jl. W.R. Supratman No.50 Putussibau/78711', '\\N', '0567-21180', '\\N', 'kpp.putusibau@gmail.com'),
(167, 'KPPN Palangkaraya', 'Jl. Kapt. P.Tendean No.4 palangka raya/73112', '\\N', '0536-3221439', '\\N', 'KPPN0431@gmail.com'),
(168, 'KPPN Buntok', 'Jl. Pelita Raya No.69 Buntok/73711', '\\N', '0525-21792', '\\N', 'KPPNbuntok@gmail.com'),
(169, 'KPPN Sampit', 'Jl. Jend.Sudirman Km. 1,5 Sampit/74322', '\\N', '0531-32786', '\\N', 'KPPN044@perbendaharaan.go.id'),
(170, 'KPPN Pangkalan Bun', 'Jl. Sutan Syahrir No.9 Pangkalan Bun/74101', '\\N', '0532-21393', '\\N', '\\N'),
(171, 'KPPN Banjarmasin', 'Jl. Mayjen D.I. Panjaitan No.10 Banjarmasin/70114', '\\N', '0511-3352856', '\\N', 'KPPN045@perbendaharaan.go.id'),
(172, 'KPPN Pelaihari', 'Jl. Datu insad No.79 Pelaihari/70813', '\\N', '0512-22460', '\\N', 'kpp168@gmail.com'),
(173, 'KPPN Barabai', 'Jl. P.H.M. Noor No.28 Barabai/71311', '\\N', '0517-41307', '\\N', 'KPPN110@gmail.com'),
(174, 'KPPN Tanjung', 'Jl. Ahmad Yani Km. 10 No. 20 Maburai Tanjung', '\\N', '0526-2027207', '\\N', 'info.KPPNtanjung@gmail.com'),
(175, 'KPPN Kotabaru', 'Jl. Yakut No.19 Kotabaru/72116', '\\N', '0518-25320', '\\N', 'KPPN081@gmail.com; KPPN.kotabaru@depkeu.go.id'),
(176, 'KPPN Samarinda', 'Jl. Moh. Yamin No. 2 Samarinda/75123', '\\N', '0541-743491', '\\N', '\\N'),
(177, 'KPPN Balikpapan', 'Jl. Jend.A.Yani No.28 Balikpapan/76113', '\\N', '0542-731284', '\\N', '\\N'),
(178, 'KPPN Tanjungredeb', 'Jl. Milono No.2 Tanjungredeb/77311', '\\N', '0554-26818', '\\N', '\\N'),
(179, 'KPPN Tarakan', 'Jl P Diponegoro No.46 Tarakan/77114', '\\N', '0551-21953', '\\N', '\\N'),
(180, 'KPPN Nunukan', 'Jl. Ujung Dewa Sedadap Nunukan', '\\N', '0556-2025588', '\\N', '\\N'),
(181, 'KPPN Denpasar', 'GKN I Jl. Kusumaatmaja Niti Mandala Denpasar/80235', '\\N', '0361-225591', '\\N', 'denpasar.KPPN@gmail.com'),
(182, 'KPPN Singaraja', 'Jl. Udayana No.10 Singaraja/81116', '\\N', '0362-26595', '\\N', '\\N'),
(183, 'KPPN Amlapura', 'Jl. Cempaka Amlapura/80812', '\\N', '0363-22027', '\\N', 'KPPNamlapura@gmail.com'),
(184, 'KPPN Mataram', 'Jl. Langko No. 40 Mataram/83125', '\\N', '0370-633744', '\\N', '\\N'),
(185, 'KPPN Selong', 'Jl. Moh. Yamin No.43 Selong/83612', '\\N', '0376-22959', '\\N', '\\N'),
(186, 'KPPN Bima', 'Jl. Pendidikan No.16 Bima/84116 ', '\\N', '0374-43615', '\\N', '\\N'),
(187, 'KPPN Sumbawa Besar', 'Jl. Garuda No.107 Sumbawa Besar/84312', '\\N', '0371-21720', '\\N', '\\N'),
(188, 'KPPN Kupang', 'Jl. Ferans Seda, kupang/85711', '0380-823508', '0380-825122', '\\N', 'KPPNkupang@gmail.com'),
(189, 'KPPN Atambua', 'Jl.Diponegoro , Tulamalae, Atambua, Kab.Belu/85711', '0389-33638', '0389-22643', '\\N', 'KPPN172@gmail.com'),
(190, 'KPPN Larantuka', 'Jl. Jend.Sudirman No.48 Larantuka', '0383-2325092', '0383-2325091', '\\N', 'KPPN174@gmail.com'),
(191, 'KPPN Ende', 'Jl. Kelimutu No.53 Ende/86316', '0381-21268', '0381-21046', '\\N', 'kpp.ende040@gmail.com'),
(192, 'KPPN Ruteng', 'Jl. Adi Sucipto No.29 Ruteng/86518', '0385-22910,21549', '0385-21457', '\\N', 'KPPNruteng111@gmail.com'),
(193, 'KPPN Waingapu', 'Jl. Ampera No.1 Waingapu/87111', '0387-61074', '0387-61037', '\\N', 'KPPNwaingapu@gmail.com'),
(194, 'KPPN Makassar I', 'Jl. Slamet Riyadi No.5 Makssar', '\\N', '0411-325873', '\\N', '\\N'),
(195, 'KPPN Makassar Ii', 'Jl. Urip sumohardjo Km. 4 GKN I Makassar', '\\N', '0411-456958', '\\N', '\\N'),
(196, 'KPPN Pare-Pare', 'Jl. Karaeng Burane No.20 Pare-pare/91111', '\\N', '0421-21850', '\\N', '\\N'),
(197, 'KPPN Benteng', 'Jl. D.I. Panjaitan nbenteng Selayar', '\\N', '0414-22588', '\\N', '\\N'),
(198, 'KPPN Bantaeng', 'Jl. Raya Lantao No,112 Bantaeng/92411', '\\N', '0413-21119', '9', '\\N'),
(199, 'KPPN Sinjai', 'Jl. KH.Abdul Latif No.4 Sinjai/92611', '\\N', '0482-23285', '\\N', '\\N'),
(200, 'KPPN Palopo', 'Jl. Opu Tosappaile No.107 Palopo/91921', '\\N', '0471-21126', '\\N', '\\N'),
(201, 'KPPN Watampone', 'Jl. K.H.. Agus Salim No.7 Watampone/92732', '\\N', '0481-21252', '\\N', '\\N'),
(202, 'KPPN Makale', 'Jl. Pongtiku Poros Makale-Rantepao Km.13 Tana Toraja', '\\N', '0423-2810655', '\\N', '\\N'),
(203, 'KPPN Mamuju', 'Jl. A.Yani No.14 ', '\\N', '0426-2325035', '\\N', 'KPPN178@gmail.com'),
(204, 'KPPN Majene', 'Jl. Jend Sudirman No.96 majene/91412', '\\N', '0422-21026', '\\N', 'KPPNmajene@gmail.com'),
(205, 'KPPN Palu ', 'Jl. Tanjung Dako NO.11 palu 94112', '\\N', '0451-421225', '\\N', 'KPPN051@perbendaharaan.go.id'),
(206, 'KPPN Poso', 'Jl. Kalimantan No.16 Poso/94619', '\\N', '0452-21459', '\\N', 'poso.KPPN@gmail.com'),
(207, 'KPPN Luwuk', 'Jl. Jend.A.Yani No.134 Luwuk/94711', '\\N', '0461-21069', '\\N', '\\N'),
(208, 'KPPN Toli Toli', 'Jl. Mgamu No.6-8 Toli toli/94515', '\\N', '0453-21041', '\\N', 'KPPNtoli2@gmail.com'),
(209, 'KPPN Kendari', 'Jl. Mayjen Sutomo No.5 Kendari/93122', '\\N', '0401-3121542', '\\N', 'KPPN.kendari@depkeu.go.id ; KPPNkendari@gmail.com'),
(210, 'KPPN Bau Bau', 'Jl. Palagimata Bau-Bau/93717', '\\N', '0251-7535686', '\\N', 'KPPN103@gmail.com'),
(211, 'KPPN Raha', 'Jl. Kasuari No. 1 Raha', '\\N', '0403-2522916', '\\N', 'KPPN157@gmail.com'),
(212, 'KPPN Kolaka', 'Jl. Bendungan Km.6 Kolaka/93518', '\\N', '0405-2321326', '\\N', 'KPPN.156@gmail.com ; KPPNkolaka@depkeu.go.id'),
(213, 'KPPN Gorontalo', 'Jl. Jend. Sudirman No.58 Gorontalo/96128', '0435-821460', '0435-821192', '\\N', '\\N'),
(214, 'KPPN Marisa', 'Jl. Pelabuhan Marisa, Gorontalo/96266', '0443-210213', '\\N', '\\N', '\\N'),
(215, 'KPPN Manado', 'GKN Manado Lt.2; Jl. 17 Agustus Manado/95113', '\\N', '0431-869666', '\\N', '\\N'),
(216, 'KPPN Tahuna', 'Jl. Malahasa No. 29 Tahuna/95813', '\\N', '0432-21039', '\\N', 'KPPN.tahuna083@gmail.com'),
(217, 'KPPN Kotamobagu', 'Jl. Paloko No. 7 Kotamobagu', '\\N', '0434-24062', '\\N', 'KPPN.kotamobagu@gmail.com'),
(218, 'KPPN Bitung ', 'Jl. Stadion Dua Saudara Manembo-Nembo Atas, Bitung', '\\N', '0438-37472', '\\N', 'KPPNbitung179@gmail.com'),
(219, 'KPPN Ternate', 'Jl. Yos Sudarso No.6 Ternate/97711', '\\N', '0921-3121643', '\\N', '\\N'),
(220, 'KPPN Tobelo', 'Jl. Kemakmuran Tabelo', '\\N', '0924-2622567', '\\N', '\\N'),
(221, 'KPPN Ambon', 'GKN Lt.I dan II, Jl. Kapitan Ulupaha No. 1 Ambon/97124', '\\N', '0911-344364', '\\N', '\\N'),
(222, 'KPPN Tual', 'Jl. Pahlawan Revolusi Ohijang,Tual/97611', '\\N', '0916-21289', '\\N', '\\N'),
(223, 'KPPN Saumlaki', 'Jl. Sifnama Saumlaki/97664', '\\N', '0918-21489', '\\N', '\\N'),
(224, 'KPPN Masohi', 'Jl. Pattimura No.36 Masohi/97511', '\\N', '0914-22722', '\\N', '\\N'),
(225, 'KPPN Manokwari', 'Jl. Yos Sudarso No.1003 Manokwari ', '0986-211525', '\\N', '\\N', '\\N'),
(226, 'KPPN Sorong', 'Jl. Basuki Rachmat Km.7 sorong/98416', '0951-321263', '\\N', '\\N', '\\N'),
(227, 'KPPN Fak Fak', 'Jl. DPRD Fakfak/98611', '\\N', '0956-22506', '\\N', '\\N'),
(228, 'KPPN Jayapura ', 'Ruko Pasific Permai Blok D7-D8 !, Jayapura 99111', '\\N', '0967-533389', '\\N', '\\N'),
(229, 'KPPN Biak', 'Jl. Majapahit No. 1 Biak/98117', '\\N', '0981-21367', '\\N', '\\N'),
(230, 'KPPN Serui', 'Jl. Maluku Serui/98211', '\\N', '0983-31742', '\\N', '\\N'),
(231, 'KPPN Merauke', 'Jl. Prajurit No.1 Merauke', '\\N', '0971-321812', '\\N', '\\N'),
(232, 'KPPN Wamena', 'Jl. Yos Sudarso Np.26 Wamena/99502', '\\N', '0969-31324', '\\N', '\\N'),
(233, 'KPPN Nabire', 'Jl. Merdeka No.46 Nabire/98815', '\\N', '0984-22156', '\\N', '\\N'),
(234, 'KPPN Timika', 'Jl. Cenderawasih (SP II) Timika', '\\N', '0901-322926', '\\N', '\\N'),
(NULL, 'DPRD Provinsi Kalteng', 'Jalan S Parman 2', '05363236320', '3236329', '73112', NULL),
(NULL, 'Badan Pusat Statistik Provinsi Kalimantan Tengah', 'Jalan Kapten P.Tendean No 6', '05363228105', '05363221380', '73111', 'bps6200@mailhost.bps.go.id'),
(NULL, 'Dinas Pekerjaan Umum Pemprov Kalteng', 'Jalan Letjend S Parman No 3', '05363221150', NULL, NULL, NULL),
(NULL, 'Pusat LPSE Setjen Kemenkeu RI', 'Jalan Dr Wahidin Raya No 1 Jakarta', '3449230, 3512214', '0213512219', '10710', 'www.lpse.depkeu.gi.id'),
(NULL, 'Kementerian Hukum dan HAM Kanwil Kalimantan Tengah', 'Jalan G Obos Nomor 10 Palangka Raya', '05363221554', '05363220150', NULL, NULL),
(NULL, 'Pengadilan Negeri Buntok', 'Jalan Pelita Raya Nomor 20', '052521010', '052521686', '73711', 'www.pn-buntok.go.id, pn_buntok@yahoo.co.id'),
(NULL, 'Kejaksaan Negeri Kotawaringin Barat', NULL, NULL, NULL, NULL, NULL),
(NULL, 'Polres Pulang Pisau Kalimantan Tengah', 'Jalan Trans Kalimantan Km 01 Pulang Pisau ', NULL, NULL, '74811', NULL),
(NULL, 'Kejaksaan Negeri Pangkalan Bun', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rsifat`
--

CREATE TABLE IF NOT EXISTS `rsifat` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sifat` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rsifat`
--

INSERT INTO `rsifat` (`id`, `sifat`) VALUES
(1, 'Segera'),
(2, 'Sangat Segera'),
(3, 'Biasa'),
(4, 'Penting'),
(5, 'Rahasia'),
(6, 'Sangat Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `rstatus`
--

CREATE TABLE IF NOT EXISTS `rstatus` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rstatus`
--

INSERT INTO `rstatus` (`id`, `status`) VALUES
(1, 'Proses'),
(2, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `skeluar`
--

CREATE TABLE IF NOT EXISTS `skeluar` (
  `id_sKeluar` int(10) NOT NULL AUTO_INCREMENT,
  `tKeluar` date NOT NULL,
  `nAgenda` int(6) NOT NULL,
  `jSurat` varchar(5) NOT NULL,
  `nKontrol` varchar(30) NOT NULL,
  `uSifat` varchar(15) NOT NULL,
  `jLampiran` varchar(20) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `kepada` text NOT NULL,
  `hal` text NOT NULL,
  `ket` text,
  `periode` varchar(10) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sKeluar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `skeluar`
--

INSERT INTO `skeluar` (`id_sKeluar`, `tKeluar`, `nAgenda`, `jSurat`, `nKontrol`, `uSifat`, `jLampiran`, `penerbit`, `kepada`, `hal`, `ket`, `periode`, `stamp`) VALUES
(1, '2016-08-02', 667, 'ND', '/WPB.18/', 'Segera', '-', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'ST Pelaksanaan Kegiatan Penyusunan LK Bun Semeter I Tahun 2016', 'Irwan Ritonga, Guruh Utomo', '2016', '2016-08-01 21:37:28'),
(2, '2016-08-02', 829, 'S', '/WPB.18/', 'Segera', '1 Lembar', 'Kepala Bidang SKKI', 'KPPN Palangkaraya, KPPN Sampit', 'Penetapan sampel dan pelaksanaan pemantauan EIKR 2016 ', '-', '2016', '2016-08-01 21:53:01'),
(3, '2016-08-02', 172, 'ST', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Bagian Umum', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'ST Konsultasi Penyusunan LK-BUN semester I 2016', 'Irwan Ritonga, Guruh Utomo', '2016', '2016-08-01 22:00:10'),
(4, '2016-08-02', 668, 'ND', '/WPB.18/', 'Segera', '1 Lembar', 'Kepala Bidang SKKI', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Laporan Pemantauan pengendalian intern minggu ke empat bulan juli 2016', '-', '2016', '2016-08-01 22:04:30'),
(5, '2016-08-01', 76, 'SI', '/WPB.18/BG.01/', 'Segera', '-', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Surat Ijin Cuti Tahunan', 'An.Desemianto', '2016', '2016-08-01 22:09:41'),
(6, '2016-08-02', 71, 'UND', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Bidang PPA I', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Undangan Pembahasan Perkembangan RPA', 'An.Santosa Imam Prajitno Dkk', '2016', '2016-08-01 22:13:52'),
(7, '2016-07-20', 89, 'KEP', '/WPB.18/BD.02/', 'Segera', '1 Lembar', 'Kepala Bidang PPA I', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'KEP tentang susunan,panitia,narasumber dan moderator rakor evaluasi anggaran', '-', '2016', '2016-08-01 22:28:31'),
(8, '2016-08-03', 669, 'ND', '/WPB.18/BG.0104/', 'Segera', '-', 'Kepala Bidang SKKI', 'Kepala kanwil DJPBN Prov Kalteng.', 'Permintaan Data rekap dan Salinan SP2D Transaksi pengadaan.', '', '2016', '2016-08-03 13:27:10'),
(9, '2016-08-03', 830, 'S', '/WPB.18/BG.0104/', 'Segera', '-', 'Kepala Bidang SKKI', 'Kepala Kejaksaan Negeri Kotim Sampit.', 'Permintaan Data Rekapitulasi dan Salinan SP2D Transaksi pengadaan barang jasa yg bersumber dari APBN.', '', '2016', '2016-08-03 13:29:59'),
(10, '2016-08-03', 128, 'PRINT', '/WPB.18/BG.01/', 'Segera', '-', 'Kepala Bagian Umum', 'KPPN Pangkalan Bun', 'Plh Kkepala KPPN Pangkalan Bun', 'An.Sugiyono', '2016', '2016-08-03 14:19:13'),
(11, '2016-08-03', 214, 'SPTPL', '/WPB.18/BG.01/', 'Segera', '-', 'Kepala Bagian Umum', 'Bidang PPA 1', 'Lembur Bidang PPA 1 hari selasa tgl.2-8-2016.', '', '2016', '2016-08-03 19:15:17'),
(12, '2016-08-03', 87, 'SP', '/WPB.18/BG.01/', 'Segera', '1', 'Kepala Bagian Umum', 'BRI Cabang Palangka raya.', 'Daftar Pembayaran Tukin dan Tunj Tambahan bulan Agustus 2016.', '', '2016', '2016-08-03 14:25:03'),
(13, '2016-08-03', 59, 'KET', '/WPB.18/BG.01/', 'Segera', '1', 'Kepala Bagian Umum', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'surat keterangan tidak menempati rumah dinas', 'Udi.', '2016', '2016-08-03 14:28:01'),
(14, '2016-08-03', 670, 'ND', '/WPB.18/BG.01/', 'Segera', '-', 'Kepala Bagian Umum', 'Kepala bagian Umum', 'Kerusakan Komputer SPAN di Middle Office', '', '2016', '2016-08-03 19:18:49'),
(15, '2016-08-03', 671, 'ND', '/WPB.18/BD.03/', 'Segera', '1 Lembar', 'Kepala Bidang PPA II', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Penyampaian LKT dan Rekap LKT dana transfer ke daerah dan dana desa  sesuai dgn PMK 48/PMK.07/2016', '', '2016', '2016-08-03 15:04:30'),
(16, '2016-08-03', 672, 'ND', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'SK KK ttg Penetapan ASN teladan Kanwil DJPBN Prov.Kalteng', '', '2016', '2016-08-03 15:07:50'),
(17, '2016-08-03', 831, 'S', '/WPB.18/BD.03/', 'Segera', '1 Berkas', 'Kepala Bidang PPA II', 'Dit.jen Perimbangan Keuangan', 'Penyampaian LKT dan Rekap LKT dana transfer ke daerah dan dana desa  sesuai dgn PMK 48/PMK.07/2016', 'Dirjend Perbendaharaan jakarta', '2016', '2016-08-03 15:18:43'),
(18, '2016-08-03', 90, 'KEP', '/WPB.18/BG.01/', '0', '1 Berkas', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Kep KK Ttg Penetapan ASN Teladan Kanwil DJPBN Prov.Kalteng', '', '2016', '2016-08-03 15:21:54'),
(19, '2016-08-03', 88, 'SP', '/WPB.18/BG.01/', 'Segera', '1 Berkas', 'Kepala Subbagian Kepegawaian', 'Kepala Bagian Administrasi kepegawaiaan Up.Kasubbag Penegakan Disiplin pegawai', 'Laporan bulanan ketertiban pegawai (L.B.2)', '', '2016', '2016-08-03 15:32:32'),
(20, '2016-08-03', 673, 'ND', '/WPB.18/BG.01/', 'Segera', '-', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Surat tugas pelaksanaan collecting Data guna Penyusunan RPA', '', '2016', '2016-08-03 16:13:36'),
(21, '2016-08-03', 173, 'ST', '/WPB.18/BG.01/', 'Segera', '-', 'Kepala Bagian Umum', 'Santosa Imam Prajitno dan Asep resmana', 'untuk melaksanakan colleting data guna penyusunan reviu', '', '2016', '2016-08-03 16:16:51'),
(22, '2016-08-03', 674, 'ND', '/WPB.18/BD.04/', 'Segera', '1 Berkas', 'Kepala Bidang SKKI', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Laporan Penyelesaiaan Retur SP2D periode akhir tahun 2015.', '', '2016', '2016-08-03 16:26:16'),
(23, '2016-08-03', 832, 'S', '/WPB.18/BD.04/', 'Segera', '1 Berkas', 'Kepala Bidang SKKI', 'Dit. Pengelolaan Kas Negara', 'Laporan Penyelesaiaan Retur SP2D periode akhir tahun 2015.', '', '2016', '2016-08-03 16:29:25'),
(24, '2016-08-03', 675, 'ND', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Bagian Umum', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Surat Tindak lanjut pelaksanaan program coaching dan counseling lingkup kanwil DJPBN Prov kalteng.', '', '2016', '2016-08-02 19:52:59'),
(25, '2016-08-03', 833, 'S', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Para Kepala KPPN lingkup Kanwil DJPBN Prov kalteng.', 'Surat Tindak lanjut pelaksanaan program coaching dan counseling lingkup kanwil DJPBN Prov kalteng.', '', '2016', '2016-08-02 19:55:10'),
(26, '2016-08-03', 676, 'ND', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'ST koordinasi dengan pihak ketiga terkait(counsouil/PPILN) untuk mendapatkan sertifikat Laik Operasional (SLO)', '', '2016', '2016-08-02 20:12:22'),
(27, '2016-08-03', 677, 'ND', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Bidang PAPK', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'ND Permohonan penugasan pegawai untuk penyampaian Lap.Keuangan Kuasa BUN semester I TA 2016', '', '2016', '2016-08-02 22:14:15'),
(28, '2016-08-03', 678, 'ND', '/WPB.18/BD.01/', 'Segera', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Pemberitahuan untuk penunjukan Plh Kepala Kanwil DJPBN Prov.Kalteng dan Penunjukan Plh KKabid PAPK', '', '2016', '2016-08-03 12:49:00'),
(29, '2016-08-03', 174, 'ST', '/WPB.18/BG.01/', 'Biasa', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'ST koordinasi dengan pihak ketiga terkait(counsouil/PPILN) untuk mendapatkan sertifikat Laik Operasional (SLO)', 'An.Hartanto dan Dollas', '2016', '2016-08-02 20:15:27'),
(30, '2016-08-03', 834, 'S', '/WPB.18/', 'Penting', '1 Berkas', 'Kepala Bidang PAPK', 'Direktur jenderal Perbendaharaan Up.Direktur PKN Jakarta.', 'Laporan keuangan Tingkat UAKKBUN-kanwil Semester l TA 2016.', '', '2016', '2016-08-02 21:16:58'),
(31, '2016-08-03', 215, 'SPTPL', '/WPB.18/BD.0104/', 'Biasa', '', 'Kepala Bagian Umum', 'Bidang PPA 1', 'SPTPL Lembur Bidang PPA 1 hari rabu tgl.03-08-2016.', 'An.Bayu Prabowo dkk', '2016', '2016-08-02 21:47:38'),
(32, '2016-08-03', 129, 'PRINT', '/WPB.18/', 'Biasa', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Surat Perintah Plh Kepala Kanwil DJPBN Prov.Kalteng ', 'An.Saritano ', '2016', '2016-08-03 12:51:17'),
(33, '2016-08-03', 130, 'PRINT', '/WPB.18/BG.01/', 'Biasa', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Surat Perintah Plh Kabid PAPK Kanwil Kalteng', 'An.Muhammad Suharsa', '2016', '2016-08-03 12:53:23'),
(34, '2016-08-04', 679, 'ND', '/WPB.18/', 'Biasa', '-', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'ST penyampaiaan laporan keuangan Kuasa BUN Semester l TA 2016.', 'Ellisa wahyu Sancorini', '2016', '2016-08-04 14:52:38'),
(35, '2016-08-04', 680, 'ND', '/WPB.18/', 'Biasa', '-', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Kenaikan Gaj Berkala', 'AN.Marimin', '2016', '2016-08-04 14:54:22'),
(36, '2016-08-04', 175, 'ST', '/WPB.18/', 'Biasa', '-', 'Kepala Subbagian Kepegawaian', 'Ellisa Wahyu Sancoyorini', 'ST untuk menyampaikan Laporan keuangan Kuasa BUN Semester l Tahun Anggaran 2016.', '', '2016', '2016-08-04 14:56:09'),
(37, '2016-08-04', 23, 'PEM', '/WPB.18/', 'Penting', '-', 'Kepala Subbagian Kepegawaian', 'An.Dollas', 'Kenaikan Gaji Berkala.', '', '2016', '2016-08-04 15:17:29'),
(39, '2016-08-04', 24, 'PEM', '/WPB.18/BG.01/', 'Penting', '-', 'Kepala Subbagian Kepegawaian', 'An.Marimin', 'Kenaikan Gaji Berkala.', '', '2016', '2016-08-04 15:18:36'),
(40, '2016-08-04', 835, 'S', '/WPB.18/', 'Segera', '1 Berkas', 'Kepala Subbagian TU/RT', 'Para Kepala KPPN Lingkup Kanwl DJPBN Prov kalteng.', 'Pemetaan Penerapan Standarisasi Sarana dan Prasarana kantor Vertikal DJPB Tahun 2016.', '', '2016', '2016-08-03 19:35:14'),
(41, '2016-08-04', 681, 'ND', '/WPB.18/', 'Segera', '-', 'Kepala Bagian Umum', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Kerusakan Komputer SPAN di Middle Office', '', '2016', '2016-08-03 19:36:53'),
(42, '2016-08-04', 836, 'S', '/WPB.18/', 'Segera', '-', 'Kepala Bagian Umum', 'Direktur Sistem Informasi dan Transformasi Perbendaharaan Jakarta.', 'Kerusakan Kkomputer SPAn Midle Office pada PA.1.', '', '2016', '2016-08-03 19:39:15'),
(43, '2016-08-04', 77, 'SI', '/WPB.18/BG.01/', 'Biasa', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Surat Izin Cuti Tahunan ', 'An.Ellisa Wahyu Sancoyorini', '2016', '2016-08-03 20:04:00'),
(44, '2016-08-04', 176, 'ST', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'ST Untuk Menghadiri konferensi Pers BRS Triwulan I 2016 ', 'An.Rani', '2016', '2016-08-03 21:32:40'),
(45, '2016-08-04', 682, 'ND', '/WPB.18/BG.01/', 'Segera', '1 Lembar', 'Kepala Subbagian Kepegawaian', 'Kepala Kanwil DJPBN Provinsi Kalimantan Tengah', 'ST Konferensi Pers BRS triwulan II 2016', '', '2016', '2016-08-03 21:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `skeputusan`
--

CREATE TABLE IF NOT EXISTS `skeputusan` (
  `id_skeputusan` int(10) NOT NULL AUTO_INCREMENT,
  `nsurat` varchar(11) NOT NULL,
  `kdwil` varchar(11) NOT NULL,
  `kdmas` varchar(11) NOT NULL,
  `blth` varchar(22) NOT NULL,
  `tsurat` date NOT NULL,
  `pelaksana` int(10) NOT NULL,
  `isi` text NOT NULL,
  `ket` text NOT NULL,
  `periode` int(10) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_skeputusan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smasuk`
--

CREATE TABLE IF NOT EXISTS `smasuk` (
  `id_sMasuk` int(10) NOT NULL AUTO_INCREMENT,
  `nAgenda` varchar(6) NOT NULL,
  `jSurat` varchar(5) DEFAULT NULL,
  `uSifat` varchar(15) DEFAULT NULL,
  `nSurat` varchar(50) NOT NULL,
  `tSurat` date NOT NULL,
  `jLampiran` varchar(10) DEFAULT NULL,
  `tMasuk` date NOT NULL,
  `dari` text NOT NULL,
  `hal` text NOT NULL,
  `dispo` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sMasuk`,`nAgenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `smasuk`
--

INSERT INTO `smasuk` (`id_sMasuk`, `nAgenda`, `jSurat`, `uSifat`, `nSurat`, `tSurat`, `jLampiran`, `tMasuk`, `dari`, `hal`, `dispo`, `status`, `periode`, `stamp`) VALUES
(9, '000378', 'S', 'Segera', 'S-5828/PB.1/2016', '2016-07-25', '', '2016-07-27', 'Setditjen Perbendaharaan', 'Laporan Implementasi tindak lanjut rekomendasi hasil Survey Kesehatan Organisasi (MOFIN) Ditjen Perbendaharaan', 'Kepala Kantor', 'Proses', '2016', '2016-07-26 21:52:27'),
(8, '000377', 'S', 'Segera', 'S-5819/PB/2016', '2016-07-25', '', '2016-07-27', 'Dit. Pelaksanaan Anggaran', 'Tema Analisis Aspek Khusus pada Reviu Pelaksanaan Anggaran Tahun 2016', 'Kepala Kantor', 'Proses', '2016', '2016-07-26 21:49:45'),
(7, '000376', 'S', 'Segera', 'S-5806/PB.3/2016', '2016-07-25', '', '2016-07-26', 'Dit. Pengelolaan Kas', 'Laporan Penyelesaian Retur SP2D periode s.d Akhir Tahun 2015', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 14:51:40'),
(6, '000375', 'S', 'Segera', 'S-1560/WPB.18/KP.043/2016', '2016-07-26', '1 lembar', '2016-07-26', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Data PNS Pusat', 'Kepala Bidang PPA I', 'Proses', '2016', '2016-07-28 14:52:46'),
(10, '000379', 'S', 'Segera', 'S-5511/PB/2016', '2016-07-13', '-', '2016-07-27', 'Dit. PPK BLU', 'Penyampaian Laporan Keuangan Badan Layanan Umum (BLU)', 'Kepala Kantor', 'Proses', '2016', '2016-07-26 21:54:43'),
(11, '000380', 'S', 'Segera', 'S-5937/PB.1/2016', '2016-07-27', '1 berkas', '2016-07-27', 'Setditjen Perbendaharaan', 'Penetapan Sampel dan Pelaksanaan Pemantauan EIKR Tahun 2016 di Lingkungan Ditjen Pbn', 'Kepala Kantor', 'Proses', '2016', '2016-07-26 22:27:18'),
(12, '000381', 'S', 'Sangat Segera', 'S-5909/PB/2016', '2016-07-26', '', '2016-07-28', 'Ditjen Perbendaharaan', 'Penghentian Layanan Penyetoran Penerimaan Negara Melalui MPN G1', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 14:28:59'),
(13, '000382', 'S', 'Segera', 'B-08/Q.2.11/Dsp.1/07/2016', '2016-07-27', '', '2016-07-28', 'Kejaksaan Negeri Kotawaringin Timur', 'Permintaan Data Rekapitulasi dan Salinan SP2D Transaksi PBJ yang bersumber dari APBN TA 2015 dan 2016', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-28 14:56:29'),
(14, '000383', 'S', 'Segera', 'B-09/Q.2/11/Dsp.1/07/2016', '2016-07-27', '', '2016-07-28', 'Kejaksaan Negeri Kotawaringin Timur', 'Permintaan Data Rekapitulasi dan Salinan SP2D Transaksi PBJ yang bersumber dari APBN TA 2015 dan 2016', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-28 15:00:17'),
(15, '000384', 'S', 'Segera', 'S-2079/WPB.18/KP.0210/2016', '2016-07-28', '1 berkas', '2016-07-28', 'KPPN BUNTOK', 'Penyampaian LKPP Semester I Tingkat Kuasa BUN TA 2016', 'Kepala Bidang PAPK', 'Proses', '2016', '2016-07-29 13:44:38'),
(16, '000385', 'S', 'Segera', 'S-717/WPB.18/KP.102/2016', '2016-07-20', '', '2016-07-28', 'KPPN Pangkalan Bun', 'Lembar Konfirmasi Transfer ke Daerah dan Dana Desa', 'Kepala Bidang PPA II', 'Proses', '2016', '2016-07-28 16:25:27'),
(17, '000386', 'S', 'Segera', 'S-724/WPB.18/KP.102/2016', '2016-07-27', '', '2016-07-28', 'KPPN Pangkalan Bun', 'Laporan Penyelesaian Retur SP2D periode s.d Akhir Tahun 2015', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-28 16:29:43'),
(18, '000387', 'S', 'Segera', 'S-722/WPB.18/KP.102/2016', '2016-07-26', '', '2016-07-28', 'KPPN Pangkalan Bun', 'Permohonan untuk penunjukkan plh pada KPPN Pangkalan Bun', 'Kepala Bagian Umum', 'Proses', '2016', '2016-07-28 16:32:31'),
(19, '000388', 'SP', 'Segera', 'SP-225/WPB.18/KP.102/2016', '2016-07-27', '', '2016-07-28', 'KPPN Pangkalan Bun', 'Monitoring Pembayaran Gaji Induk Pada KPPN Pangkalan Bun Bulan Agustus 2016', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-28 16:41:07'),
(20, '000389', 'SP', 'Segera', 'SP-230/WPB.18/KP.044/2016', '2016-07-27', '', '2016-07-28', 'KPPN Sampit', 'Surat Pernyataan Tanggung Jawab LKPP, Laporan Arus Kas Bulan Semester I 2016 dst', 'Kepala Bidang PAPK', 'Proses', '2016', '2016-07-28 16:45:08'),
(21, '000390', 'SP', 'Segera', '900/365/C/DPKA/VII/2016', '2016-07-26', '', '2016-07-28', 'Dinas Pengelolaan Keuangan Dan Aset Kabupaten Gunung Mas', 'Lembar I, II, III, IV, V SKPP Bupati Gumas an Idal Diman pada SDN 2 Sepang Simin Kec Sepang', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-28 16:50:04'),
(22, '000391', 'S', 'Sangat Segera', 'S-1577/WPB.18/KP.043/2016', '2016-07-27', '', '2016-07-28', 'KPPN Palangka Raya', 'Pemberitahuan Retur SP2D', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-27 19:58:58'),
(23, '000392', 'S', 'Segera', 'S-1578. 1579, 1580/WPB.18/KP.043/2016', '2016-07-27', '', '2016-07-28', 'KPPN Palangka Raya', 'Pemberitahuan Pengajuan Penggantian Uang Persediaan', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-27 20:01:28'),
(24, '000393', 'PER', 'Sangat Segera', 'PER-31/PB/2016', '2016-06-29', '', '2016-07-28', 'Ditjen Perbendaharaan', 'Tata Cara Pembayaran Penghasilan Bagi Pegawai Pemerintah Non Pegawai Negeri Yang Dibebankan Pada Anggaran Pendapatan dan Belanja Negara', 'Kepala Kantor', 'Proses', '2016', '2016-07-27 21:27:56'),
(25, '000394', 'SI', 'Segera', 'SI-023 dan 026/WPB.18/KP.044/2016', '2016-07-27', '1 lembar', '2016-07-29', 'KPPN Sampit', 'Surat Izin Cuti Tahunan an Yovi Irawan dan Iwan Susylo', 'Kepala Bagian Umum', 'Proses', '2016', '2016-07-29 14:31:01'),
(26, '000395', 'ND', 'Segera', 'ND-097/WPB.18/KP.044/2016', '2016-07-27', '', '2016-07-29', 'KPPN Sampit', 'Pelaksanaan GKM ttg SOP Pengesahan SKPP dan Penerbitan Gaji Induk pada KPPN', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-29 14:33:22'),
(27, '000396', 'S', 'Segera', 'S-641/WPB.18/KP.044/2016', '2016-07-26', '', '2016-07-29', 'KPPN Sampit', 'Penonaktifan Data Supplier', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-29 14:35:04'),
(28, '000397', 'S', 'Segera', 'S-640/WPB18/KP.044/2016', '2016-07-26', '', '2016-07-29', 'KPPN Sampit', 'Persetujuan Pembayaran Uang Makan Melalui Mekanisme Pembayaran Langsung Rekening Bendahara', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-29 14:37:40'),
(29, '000398', 'S', 'Segera', 'S-644/WPB.18/KP.044/2016', '2016-07-28', '', '2016-07-29', 'KPPN Sampit', 'Permohonan Perbaikan Data Saldo Akhir Kas Audited TA 2015', 'Kepala Bidang PAPK', 'Proses', '2016', '2016-07-29 14:39:50'),
(30, '000399', 'S', 'Segera', 'S-2032/WPB.18/KP.01/2016', '2016-07-22', '', '2016-07-29', 'KPPN BUNTOK', 'Permintaan Data ', 'Kepala Bidang PPA I', 'Proses', '2016', '2016-07-29 14:41:13'),
(31, '000400', 'SP', 'Segera', 'DP-121/WPB.18/KP.02/2016', '2016-07-19', '', '2016-07-29', 'KPPN BUNTOK', 'Laporan Keuangan KPPN Buntok Semester I TA 2016', 'Kepala Bidang PAPK', 'Proses', '2016', '2016-07-29 14:45:16'),
(32, '000401', 'SP', 'Segera', 'SP-849/WPB.18/KP.043/2016', '2016-07-28', '', '2016-07-29', 'KPPN Palangka Raya', 'Rekapitulasi Lembar Konfirmasi Dana Transfer (LKT) ke Daerah dan Dana Desa Triwulan II Tahun 2016', 'Kepala Bidang PPA II', 'Proses', '2016', '2016-07-29 14:47:57'),
(33, '000402', 'S', 'Sangat Segera', 'S-1601/WPB.18/KP.043/2016', '2016-07-28', '', '2016-07-29', 'KPPN Palangka Raya', 'Pemberitahuan Retur SP2D', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-29 14:49:28'),
(34, '000403', 'S', 'Segera', 'S-1598-1599/WPB.18/KP.043/2016', '2016-07-18', '', '2016-07-29', 'KPPN Palangka Raya', 'Pemberitahuan II Pengajuan Penggantian Uang Persediaan', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-29 14:50:59'),
(35, '000404', 'S', 'Sangat Segera', 'S-645/WPB.18/KP.044/2016', '2016-07-28', '', '2016-07-29', 'KPPN Sampit', 'Penutupan Rekening', 'Kepala Seksi Kepatuhan Internal', 'Proses', '2016', '2016-07-29 14:59:25'),
(36, '000405', 'S', 'Segera', 'S-5926/PB.1/2016', '2016-07-27', '', '2016-07-29', 'Setditjen Perbendaharaan', 'Usul Perubahan Tarif Iuran dan Pemanfataan Dana Sosial', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 19:37:00'),
(37, '000406', 'S', 'Segera', 'S-5922/PB.1/2016', '2016-07-27', '', '2016-07-29', 'Setditjen Perbendaharaan', 'Penyampaian Pembaruan Pakta Integritas Kepala Kanwil Ditjen Perbendaharaan Provinsi Kalimantan Tengah yang Telah Ditandatangani oleh Direktur Jenderal Perbendaharaan', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 19:39:12'),
(38, '000407', 'S', 'Segera', 'S-5894/PB.1/2016', '2016-07-26', '', '2016-07-29', 'Setditjen Perbendaharaan', 'Tindak Lanjut Pengecekan dan Penataan Perangkat Kelistrikan dan Jaringan Komputer dan Checklist Bulanan Pengamanan BMN Dalam Rangka Penanggulangan Kebakaran di Lingkup Direktorat Jenderal Perbendaharaan', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 19:43:15'),
(39, '000408', 'S', 'Segera', 'S-5492/PB.8/2016', '2016-07-27', '', '2016-07-29', 'Dit. SITP', 'Penyelesaian Gaji Bulan Ketiga Belas dan Tunjangan Hari Raya Tahun 2016 yang Terindikasi Dobel Bayar', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 19:45:04'),
(40, '000409', 'S', 'Segera', 'S-1602/WPB.18/KP.043/2016', '2016-07-28', '', '2016-07-29', 'KPPN Palangka Raya', 'Pemberitahuan Terkait Dobel Bayar Tunjangan an Netto WS Rahan', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 20:05:07'),
(41, '000410', 'UND', 'Segera', 'B-0119/BPS/62510/07/2016', '2016-07-29', '', '2016-07-29', 'Badan Pusat Statistik Provinsi Kalimantan Tengah', 'Undangan Konferensi Pers BRS Bulan Agustus 2016', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 20:09:52'),
(42, '000411', 'S', 'Segera', 'W.17.PR.01.04-2834', '2016-07-27', '', '2016-07-29', 'Kementerian Hukum dan HAM Kanwil Kalimantan Tengah', 'Permintaan Narasumber Rapat Koordinasi Penyusunan Program dan Anggaran Tahun 2017', 'Kepala Kantor', 'Proses', '2016', '2016-07-28 20:49:48'),
(43, '000412', 'SP', 'Segera', 'SP-258/WPB.18/KP.102/2016', '2016-07-28', '1 berkas', '2016-08-01', 'Plh Kepala KPPN Pangkalan Bun', 'Laporan Keuangan Pemerintah Pusat Tingkat Kuasa BUN KPPN Pangkalan Bun Semester I TA 2016', 'Kepala Bidang PAPK', 'Proses', '2016', '2016-07-31 19:55:48'),
(44, '000413', 'S', 'Segera', 'S-5871/PN/2016', '2016-07-26', '', '2016-08-01', 'Dit.jen Perbendaharaan', 'Penyampaian Ucapan Apresiasi atas Capaian Quickwin Penempatan Uang Negara di Bank Umum', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 16:10:39'),
(45, '000414', 'S', 'Segera', 'S-5877/PB/2016', '2016-07-26', '', '2016-08-01', 'Dit.jen Perbendaharaan', 'Penyampaian Ucapan Apresiasi atas Capaian Quickwin Peluncuran Pedoman Telaah Laporan Keuangan Kementerian Negara/Lembaga Berbasis Akrual', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 16:14:00'),
(46, '000415', 'SP', 'Segera', 'SP-613/PB.14/2016', '2016-07-27', '7 buku', '2016-08-01', 'SetDit.jen Perbendaharaan', 'Buku Himpunan Peraturan Perbendaharaan Triwulan IV Tahun 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 16:20:19'),
(47, '000416', 'S', 'Segera', 'S-649/WPB.18/KP.044/2016', '2016-06-29', '1 berkas', '2016-08-01', 'KPPN Sampit', 'Usulan Penghapusan Arsip Inaktif KPPN Sampit', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-01 16:41:45'),
(48, '000417', 'S', 'Sangat Segera', 'S-651/WPB.18/KP.044/2016', '2016-07-29', '1 lembar', '2016-08-01', 'KPPN Sampit', 'Penghentian Layanan Penyetoran Penerimaan Negara Melalui MPN G1', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-01 16:25:33'),
(49, '000418', 'S', 'Segera', 'S-650/WPB.18/KP.044/2016', '2016-07-29', '1 berkas', '2016-08-01', 'KPPN Sampit', 'Perubahan Data Kontrak', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-01 16:27:55'),
(50, '000419', 'S', 'Sangat Segera', 'S-646 dan 648/WPB.18/KP.044/2016', '2016-07-28', '1 berkas', '2016-08-01', 'KPPN Sampit', 'Pengantar Berita Acara Rekonsiliasi Retur SP2D', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-01 16:40:56'),
(51, '000420', 'UND', 'Segera', '005/1238/DPRD/2016', '2016-08-01', '', '2016-08-01', 'DPRD Provinsi Kalteng', 'Undangan Rapat', 'Kepala Kantor', 'Proses', '2016', '2016-07-31 19:14:12'),
(52, '000421', 'SP', 'Segera', 'SP-856/WPB.18/KP.043/2016', '2016-08-01', '1 berkas', '2016-08-01', 'KPPN Palangkaraya', 'Laporan Monitoring dan Evaluasi atas Kepatuhan Bank/Pos Persepsi', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-07-31 19:55:15'),
(53, '000422', 'SP', 'Segera', 'SP-855/WPB.18/KP.043/2016', '2016-08-01', '1 berkas', '2016-08-01', 'KPPN Palangkaraya', 'Laporan Pelaksanaan Reversal Transaksi Penerimaan Negara menurut SE Dirjen Pbn no SE-36/PB/2011 untuk bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-07-31 20:00:30'),
(54, '000423', 'SP', 'Segera', 'B-269/BPS/62513/07/2016', '2016-07-26', '4 SK', '2016-08-01', 'Badan Pusat Statistik Provinsi Kalimantan Tengah', 'Penyampaian SK Mutasi Staf di Lingkungan BPS Prov Kalteng ', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-07-31 20:09:32'),
(55, '000424', 'S', 'Segera', 'S-1610/WPB.18/KP.043/2016', '2016-07-29', '', '2016-08-01', 'KPPN Palangkaraya', 'Tata Cara Pembayaran Penghasilan Bagi Pegawai Pemerintah Non Pegawai Negeri Yang Dibebankan Pada Anggaran Pendapatan dan Belanja Negara', 'Kepala Bagian Umum', 'Proses', '2016', '2016-07-31 20:13:22'),
(56, '000425', 'S', 'Sangat Segera', 'S-6026/PB.1/2016', '2016-07-29', '', '2016-08-02', 'SetDit.jen Perbendaharaan Jakarta', 'Pemberitahuan untuk mengunduh ADK RKA-K/L dalam rangka APBN-P TA 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 14:39:52'),
(57, '000426', 'S', 'Sangat Segera', 'UM.01.11/CK/VII/127/2016', '2016-07-29', '1 berkas', '2016-08-02', 'Dinas Pekerjaan Umum Pemprov Kalteng', 'Surat Keputusan Penetapan Pengelola Teknis TA 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 14:48:03'),
(58, '000427', 'S', 'Segera', 'S-729/WPB.18/KP.102/2016', '2016-08-01', '1 lembar', '2016-08-02', 'KPPN Pangkalan Bun', 'Laporan Monitoring Kepatuhan Bank/Pos Persepsi', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-02 15:00:54'),
(59, '000428', 'S', 'Segera', 'S-730/WPB.18/KP.102/2016', '2016-08-01', '2 Lembar', '2016-08-02', 'KPPN Pangkalan Bun', 'Laporan Pelaksanaan Reversal Bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-02 15:18:44'),
(60, '000429', 'SP', 'Segera', 'SP-260/WPB.18/KP.102/2016', '2016-08-01', '1 berkas', '2016-08-02', 'KPPN Pangkalan Bun', 'Laporan Penerimaan, Pembagian, dan Realisasi Penyaluran DBH PBB Termasuk DBH BP PBB Perminggu Bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-02 15:08:18'),
(61, '000430', 'S', 'Segera', 'S-728/WPB.18/KP.102/2016', '2016-07-29', '1 berkas', '2016-08-02', 'KPPN Pangkalan Bun', 'Laporan Penyelesaian Gaji Bulan Ketiga Belas dan Tunjangan Hari Raya Tahun 2016 yang Terindikasi Dobel Bayar', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-02 15:15:08'),
(62, '000431', 'S', 'Segera', 'S-6075/PB.1/2016', '2016-08-01', '1 berkas', '2016-08-02', 'SetDit.jen Perbendaharaan', 'Pemetaan Penerapan Standarisasi Sarana Prasarana Kantor Vertikal Direktorat Jenderal Perbendaharaan Tahun 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 15:25:00'),
(63, '000432', 'UND', 'Segera', '005/1244/DPRD/2016', '2016-08-02', '', '2016-08-02', 'DPRD Provinsi Kalteng', 'Penundaan Rapat', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 16:39:37'),
(64, '000433', 'KET', 'Segera', '-', '2016-08-02', '', '2016-08-02', 'Kanwil DJPBN Provinsi Kalimantan Tengah', 'Permohonan Menempati Rumah Dinas an Mohammad Suharsa', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 16:50:48'),
(65, '000434', 'S', 'Segera', 'S-1627/WPB.18/KP.043/2016', '2016-08-01', '1 lembar', '2016-08-02', 'KPPN Palangkaraya', 'Checklist Bulanan Pengamanan BMN Dalam Rangka Penanggulangan Kebakaran di Lingkup Ditjen Pbn', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-01 19:07:40'),
(66, '000435', 'S', 'Sangat Segera', 'S-1625/WPB.18/KP.043/2016', '2016-08-01', '1 berkas', '2016-08-02', 'KPPN Palangkaraya', 'Pemberitahuan Retur SP2D', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-01 19:11:19'),
(67, '000436', 'S', 'Sangat Segera', 'S-6043/PB.1/2016', '2016-07-29', '1 lembar', '2016-08-02', 'SetDit.jen Perbendaharaan', 'Monitoring Pelaksanaan Program Coaching dan Counseling Ditjen Perbendaharaan Tahun 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 19:29:27'),
(68, '000437', 'S', 'Sangat Segera', 'S-6086/PB.1/2016', '2016-08-02', '2 Berkas', '2016-08-02', 'SetDit.jen Perbendaharaan', 'Penyampaian Pengumuman Hasil Assesment Center Seleksi Jabatan Fungsional Keahlian Dosen/ Widyaswara di Lingkungan Kementerian Keuangan Tahun 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 19:33:46'),
(69, '000438', 'S', 'Segera', 'S-174/PE/2016', '2016-07-26', '1 berkas', '2016-08-02', 'Pusat LPSE Setjen Kemenkeu RI', 'Pelaksanaan Monitoring dan Evaluasi (Monev) dan Focus Group Discussion (FGD) Tahun 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 20:15:00'),
(70, '000439', 'UND', 'Segera', '-', '2016-08-01', '', '2016-08-02', 'Kementerian Hukum dan HAM Kanwil Kalimantan Tengah', 'Pembukaan Rakor Penyusunan Program dan Anggaran Tahun 2017', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 21:35:36'),
(71, '000440', 'S', 'Segera', 'S-6023/PB/2016', '2016-07-29', '', '2016-08-02', 'Dit.jen Perbendaharaan', 'Pemberian Izin Peminjaman Dokumen Asli SPM, SP2D, dan Dokumen Pendukung Lainnya Guna Kepentingan Penyidikan', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 21:39:06'),
(72, '000441', 'S', 'Segera', 'S-5970/PB/2016', '2016-07-28', '12 Berkas', '2016-08-02', 'SetDit.jen Perbendaharaan', 'Izin Melakukan Perjalanan ke Luar Negeri', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 21:42:39'),
(73, '000442', 'S', 'Segera', 'S-6014/PB.8/2016', '2016-07-29', '1 berkas', '2016-08-02', 'Dit. Sistem Informasi Dan Teknologi Perbendaharaan', 'Pengiriman Perbaikan ADK GPP/DPP', 'Kepala Kantor', 'Proses', '2016', '2016-08-01 21:45:06'),
(74, '000443', 'S', 'Segera', 'S-733/WPB.18/KP.102/2016', '2016-08-01', '1 lembar', '2016-08-03', 'KPPN Pangkalan Bun', 'Laporan Kemajuan Pelaksanaan Belanja Modal TA 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:19:03'),
(75, '000444', 'SP', 'Segera', 'SP-263/WPB.18/KP.102/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Pangkalan Bun', 'Laporan Realisasi PNBP TA 2016 KPPN Pangkalan Bun Periode Bulan Juli 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:22:06'),
(76, '000445', 'SP', 'Segera', 'SP-262/WPB.18/KP.102/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Pangkalan Bun', 'Laporan Perkembangan Realisasi DIPA TA 2016 KPPN Pangkalan Bun Bulan Juli 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:25:09'),
(77, '000446', 'SP', 'Segera', 'SP-261/WPB.18/KP.102/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Pangkalan Bun', 'Laporan Realisasi Anggaran dan Kinerja KPPN Pangkalan Bun Bulan Juli 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:28:48'),
(78, '000447', 'SP', 'Segera', 'SP-264/WPB.18/KP.102/2016', '2016-08-02', '1 berkas', '2016-08-03', 'KPPN Pangkalan Bun', 'Laporan Pertanggungjawaban Bendahara (LPJ) Bendahara Pengeluaran bulan Juli 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:38:54'),
(79, '000448', 'LAP', 'Segera', 'Lap-010/WPB.18/KP.102/2016', '2016-08-02', '2 Berkas', '2016-08-03', 'KPPN Pangkalan Bun', 'SPJ Tukin Bulan Agustus 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:41:59'),
(80, '000449', 'S', 'Segera', 'S-655/WPB.18/KP.044/2016', '2016-08-01', '', '2016-08-03', 'KPPN Sampit', 'Usulan Panitia/Tim Penghapusan BMN pada KPPN Sampit', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:44:36'),
(81, '000450', 'SP', 'Segera', 'SP-233/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Sampit', 'Laporan Pertanggungjawaban Bendahara (LPJ) Bendahara Pengeluaran bulan Juli 2016, BA Pemeriksaan Kas dan Rekonsiliasi dst', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:46:57'),
(82, '000451', 'SP', 'Segera', 'SP-235/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Sampit', 'Laporan Perkembangan Realisasi DIPA; Laporan Realisasi Anggaran Bulan Juli 2016 dst', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 14:49:00'),
(83, '000452', 'S', 'Segera', 'S-660/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Sampit', 'Penonaktifan Data Supplier', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 15:01:40'),
(84, '000453', 'S', 'Segera', 'S-659/WPB.18/KP.044/2016', '2016-08-01', '1 lembar', '2016-08-03', 'KPPN Sampit', 'Pelaksanaan Uji Coba Pembayaran Secara Elektronik Melalui Cash Management System (CMS)/ Internet Banking', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 15:04:38'),
(85, '000454', 'S', 'Segera', 'S-657/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Sampit', 'Laporan Pengendalian Intern Bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 15:06:47'),
(86, '000455', 'S', 'Segera', 'S-658/WPB.18/KP.044/2016', '2016-08-01', '2 Lembar', '2016-08-03', 'KPPN Sampit', 'Penyampaian Laporan Bulanan Pelaksanaan Pengelolaan Pengaduan', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 15:09:11'),
(87, '000456', 'KEP', 'Segera', 'KEP-021/WPB.18/KP.044/2016', '2016-08-01', '1 lembar', '2016-08-03', 'KPPN Sampit', 'Penetapan Unit Pengendali Gratifikasi Pada KPPN Sampit TA 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 15:12:35'),
(88, '000457', 'SP', 'Segera', 'SP-234/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Sampit', 'Laporan Kegiatan Pendampingan Penyusunan Laporan Keuangan Satuan Kerja Mitra KPPN Sampit', 'Kepala Bidang PAPK', 'Proses', '2016', '2016-08-03 15:24:32'),
(89, '000458', 'SP', 'Segera', 'SP-232/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-03', 'KPPN Sampit', 'Daftar Laporan Rumah-rumah Pemerintah Yang Disewakan (DA.04.22) Departemen/ Non Departemen dalam Wilayah Kerja KPPN Sampit untuk Bulan Agustus 2016', 'Kepala Bidang PPA I', 'Proses', '2016', '2016-08-03 15:27:13'),
(90, '000459', 'SP', 'Segera', 'SP-866/WPB.18/KP.043/2016', '2016-08-02', '2 Lembar', '2016-08-03', 'KPPN Palangkaraya', 'Laporan Pengelolaan Pengaduan Bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 16:26:48'),
(91, '000460', 'SP', 'Segera', 'SP-867/WPB.18/KP.043/2016', '2016-08-02', '1 berkas', '2016-08-03', 'KPPN Palangkaraya', 'Laporan Bulanan Pelaksanaan Pemantauan Pengendalian Intern Bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 16:29:38'),
(92, '000461', 'S', 'Segera', 'S-6017/PB/2016', '2016-07-29', '', '2016-08-03', 'Dit.jen Perbendaharaan', 'Pedoman Umum Penyusunan Tarif Layanan Badan Layanan Umum', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 19:24:59'),
(93, '000462', 'S', 'Segera', 'S-6078/PB/2016', '2016-08-01', '', '2016-08-03', 'Dit.jen Perbendaharaan', 'Izin Melakukan Perjalanan ke Luar Negeri', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 19:29:31'),
(94, '000463', 'S', 'Segera', 'S-6077/PB/2016', '2016-08-01', '', '2016-08-03', 'Dit.jen Perbendaharaan', 'Permintaan Reviu Terhadap Rancangan Grand Design Pengelolaan SDM Dirjend PBN tahun 2016 sd 2019', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 19:33:13'),
(95, '000464', 'S', 'Segera', 'S-1629/WPB.18/KP.043/2016', '2016-08-02', '', '2016-08-03', 'KPPN Palangkaraya', 'Laporan Peminjaman Dokumen Asli SPM/SP2D dan Dokumen Pendukungnya satker Ditreskrimsus Polda Kalteng Guna Kepentingan Penyidikan', 'Kepala Kantor', 'Proses', '2016', '2016-08-02 19:40:58'),
(96, '000465', 'S', 'Segera', 'S-1642,S-1643,S-1644/WPB.18/KP.043/2016', '2016-08-03', '', '2016-08-03', 'KPPN Palangkaraya', 'Pemberitahuan Pengajuan Penggantian Uang Persediaan', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-02 19:44:34'),
(97, '000466', 'SP', 'Segera', 'SP-876/WPB.18/KP.043/2016', '2016-08-03', '1 berkas', '2016-08-03', 'KPPN Palangkaraya', 'Rekapitulasi Lembar Konfirmasi Dana Transfer (LKT) ke Daerah dan Dana Desa Triwulan II Tahun 2016', 'Kepala Bidang PPA II', 'Proses', '2016', '2016-08-02 20:46:49'),
(98, '000467', 'Mo', 'Biasa', '-', '2016-08-02', '1 berkas', '2016-08-03', 'Panitia HUT RI ke-71 RW II Kelurahan Palangka Kecamatan Jekan Raya Kota Palangka Raya', 'Proposal Kegiatan Memperingati HUT RI ke-71', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-02 21:07:59'),
(99, '000468', 'S', 'Segera', '62/Plk/SP/Penjualan/5/0816', '2016-08-01', '1 berkas', '2016-08-04', 'Kantor Pos Indonesia Palangka Raya', 'Invoice Bulan Juli 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-04 15:38:24'),
(100, '000469', 'S', 'Segera', '304901/KGP/PKY/VI/2016.Keu', '2016-08-01', '1 berkas', '2016-08-04', 'KGP (Kerta Gaya Pusaka) Palangka Raya', 'Biaya Pengiriman Barang Cetakan/ Dokumen milik Kanwil DJPBN Palangkaraya, lewat PT KGP Perwakilan Palangka Raya Bulan Juni 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-04 15:54:01'),
(101, '000470', 'SP', 'Segera', 'SP-848/WPB.18/KP.043/2016', '2016-07-28', '1 berkas', '2016-08-04', 'KPPN Palangkaraya', 'Laporan Keuangan Tingkat UAKBUN Daerah Semester I Tahun 2016 KPPN Palangka Raya', 'Kepala Bidang PAPK', 'Proses', '2016', '2016-08-04 15:57:37'),
(102, '000471', 'SP', 'Segera', 'SP-240/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-04', 'KPPN Sampit', 'LPJ TKPKN Bulan Agustus 2016; Laporan Iuran Dansos Bulan Agustus 2016 dst', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-04 16:03:22'),
(103, '000472', 'SP', 'Segera', 'SP-239/WPB.18/KP.044/2016', '2016-08-02', '1 berkas', '2016-08-04', 'KPPN Sampit', 'Laporan Bulanan Ketertiban Pegawai (LB.2) bulan Juli 2016', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-04 16:06:22'),
(104, '000473', 'S', 'Segera', 'S-661, 662, 663/WPB.18/KP.044/2016', '2016-08-01', '', '2016-08-04', 'KPPN Sampit', 'Pemberitahuan Pengajuan Penggantian Uang Persediaan', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-04 16:17:01'),
(105, '000474', 'S', 'Biasa', 'S-667/WPB.18/KP.044/2016', '2016-08-02', '1 berkas', '2016-08-04', 'KPPN Sampit', 'Perubahan Data Supplier', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-04 16:19:53'),
(106, '000475', 'S', 'Segera', 'S-666/WPB.18/KP.044/2016', '2016-08-02', '1 berkas', '2016-08-04', 'KPPN Sampit', 'Checklist Bulanan Pengamanan BMN Dalam Rangka Penanggulangan Kebakaran di Lingkup Ditjen Pbn', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-04 16:23:26'),
(107, '000476', 'S', 'Segera', 'S-665/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-04', 'KPPN Sampit', 'Monitoring Pengembalian/ Penolakan Surat Perintah Membayar (SPM) pada KPPN Sampit', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-04 16:28:34'),
(108, '000477', 'KEP', 'Segera', 'KEP-022/WPB.18/KP.044/2016', '2016-06-30', '1 lembar', '2016-08-04', 'KPPN Sampit', 'Penunjukan Petugas Pemantauan Pengendalian Intern KPPN Sampit TA 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-04 16:33:31'),
(109, '000478', 'SP', 'Segera', 'SP-238/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-04', 'KPPN Sampit', 'Laporan Pelaksanaan Reversal Transaksi Penerimaan Negara (Lampiran III dan IV) Bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-04 16:37:12'),
(110, '000479', 'SP', 'Segera', 'SP-237/WPB.18/KP.044/2016', '2016-08-01', '1 berkas', '2016-08-04', 'KPPN Sampit', 'Laporan Monitoring Kepatuhan Bank/Pos Persepsi Mitra KPPN Sampit Bulan Juli 2016', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-04 16:40:34'),
(111, '000480', 'S', 'Segera', 'S-656/WPB.18/KP.044/2016', '2016-08-01', '', '2016-08-04', 'KPPN Sampit', 'Data Rencana Eksekusi Belanja Barang dan Belanja Modal Tahun 2016', 'Kepala Bidang PPA I', 'Proses', '2016', '2016-08-04 16:43:40'),
(112, '000481', 'S', 'Segera', 'S-664/WPB.18/KP.044/2016', '2016-08-04', '1 lembar', '2016-08-04', 'KPPN Sampit', 'Data Rencana Eksekusi Belanja Barang dan Belanja Modal Tahun 2016', 'Kepala Bidang PPA I', 'Proses', '2016', '2016-08-04 16:47:21'),
(113, '000482', 'S', 'Penting', 'S-732/WPB.18/KP.102/2016', '2016-08-01', '', '2016-08-04', 'KPPN Pangkalan Bun', 'Penegasan Pelaksanaan Peraturan Direktur Jenderal Perbendaharaan No PER-31/PB/2016 tentang Tata Cara Pembayaran Penghasilan Bagi PPNPN yang dibebankan pada APBN', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 19:40:29'),
(114, '000483', 'S', 'Sangat Segera', 'S-6186/PB/2016', '2016-08-03', '2 Berkas', '2016-08-04', 'Dit. Sistem Manajemen Investasi', 'Koordinasi terkait Penyelesaian Piutang Negara pada PDAM melalui Skema Hibanh-PMD', 'Kepala Kantor', 'Proses', '2016', '2016-08-03 19:44:22'),
(115, '000484', 'UND', 'Segera', 'B-0129/BPS/62510/08/2016', '2016-08-03', '3 Lembar', '2016-08-04', 'Badan Pusat Statistik Provinsi Kalimantan Tengah', 'Undangan Konferensi Pers BRS Triwulan II 2016', 'Kepala Kantor', 'Proses', '2016', '2016-08-03 19:47:23'),
(116, '000485', 'S', 'Segera', 'S-1645/WPB.18/KP.043/2016', '2016-08-02', '', '2016-08-04', 'KPPN Palangkaraya', 'Pemberitahuan I Pengajuan Penggantian Uang Persediaan', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 19:51:33'),
(117, '000486', 'S', 'Segera', 'S-1647/WPB.18/KP.043/2016', '2016-08-01', '', '2016-08-04', 'KPPN Palangkaraya', 'TUP yang Belum dipertanggungjawabkan', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 19:54:12'),
(118, '000487', 'LAP', 'Segera', 'W.16-U6/602/KU.04.2/VII/2016', '2016-07-29', '1 rangkap', '2016-08-04', 'Pengadilan Negeri Buntok', 'Laporan Realisasi PNBP pada Satker Pengadilan Negeri Buntok', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 20:02:29'),
(119, '000488', 'SP', 'Segera', 'B/761/VIII/2016', '2016-08-02', '1 Buku', '2016-08-04', 'Polres Pulang Pisau Kalimantan Tengah', 'Laporan Rekapitulasi Pelimpahan/ Penyetoran PNBP ke kas Negara Bulan Juli 2016 pada Polres Pulang Pisau', 'Kepala Bidang SKKI', 'Proses', '2016', '2016-08-03 20:26:21'),
(120, '000489', 'BAST', 'Segera', 'BAST-573/PB.143/2016', '2016-08-01', '', '2016-08-04', 'SetDit.jen Perbendaharaan', 'BAST Peralatan PC SAKTI', 'Kepala Kantor', 'Proses', '2016', '2016-08-03 20:42:43'),
(121, '000490', 'SP', 'Segera', 'SP-626/PB.12/2016', '2016-08-03', '1 berkas', '2016-08-04', 'SetDit.jen Perbendaharaan', 'Penyampaian Sertifikat Diklat Sistem Aplikasi Keuangan Tingkat Instansi Online Kelas Administrator bagi End User oleh Pusdiklat Anggaran dan Perbendaharaan an; Bara Sandy Gautama cs', 'Kepala Kantor', 'Proses', '2016', '2016-08-03 20:48:12'),
(122, '000491', 'SP', 'Segera', 'SP-247/WPB.18/KP.044/2016', '2016-08-03', '1 berkas', '2016-08-04', 'KPPN Sampit', 'Usulan Kenaikan Pangkat an Rifqi Akmal Syarif', 'Kepala Bagian Umum', 'Proses', '2016', '2016-08-03 20:51:50'),
(123, '000492', 'SP', 'Segera', 'SP-1335/Q.2.14/Cu.3/07/2016', '2016-07-29', '1 berkas', '2016-08-04', 'Kejaksaan Negeri Kotawaringin Barat', 'Laporan Bulanan PNBP/ Hasil Dinas Dalam Bulan Juli 2016', 'Kepala Bidang PPA I', 'Proses', '2016', '2016-08-03 20:55:27'),
(124, '000493', 'SP', 'Segera', 'SP-1140/Q.2.14/Cu.3/06/2016', '2016-06-30', '1 berkas', '2016-08-04', 'Kejaksaan Negeri Pangkalan Bun', 'Laporan Bulanan PNBP/ Hasil Dinas dalam Bulan Juni 2016', 'Kepala Bidang PPA I', 'Proses', '2016', '2016-08-03 20:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `sperintah`
--

CREATE TABLE IF NOT EXISTS `sperintah` (
  `id_sperintah` int(10) NOT NULL AUTO_INCREMENT,
  `nsurat` varchar(11) NOT NULL,
  `kdwil` varchar(11) NOT NULL,
  `kdmas` varchar(11) NOT NULL,
  `blth` varchar(22) NOT NULL,
  `tsurat` date NOT NULL,
  `pelaksana` int(10) NOT NULL,
  `isi` text NOT NULL,
  `ket` text NOT NULL,
  `periode` int(10) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sperintah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'irwan.sst@gmail.com', '087833141400', 'admin', 'N', 'cmqg037iab16pqote93uk5q941'),
('umum', 'adfab9c56b8b16d6c067f8d3cff8818e', 'Bagian Umum', 'umum.kanwilkalteng@gmail.com', '082117808789', 'user', 'N', 'fd8avebpv2c13955prkg9e40i7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
