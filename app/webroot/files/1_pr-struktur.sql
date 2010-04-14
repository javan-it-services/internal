-- MySQL dump 10.11
--
-- Host: localhost    Database: pr
-- ------------------------------------------------------
-- Server version	5.0.67-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ambil_berita`
--

DROP TABLE IF EXISTS `ambil_berita`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ambil_berita` (
  `kd_ambil_berita` int(11) NOT NULL auto_increment,
  `kd_berita` int(11) default NULL,
  `kd_media_asal` char(2) default NULL,
  `kd_media_ke` char(2) default NULL,
  `user_id` varchar(15) default NULL,
  `created` datetime default NULL,
  PRIMARY KEY  (`kd_ambil_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `anggota` (
  `kd_anggota` int(11) NOT NULL auto_increment,
  `email` varchar(250) default NULL,
  `password` varchar(13) default NULL,
  `nama` varchar(250) default NULL,
  `alamat` varchar(250) default NULL,
  `no_tel` varchar(15) default NULL,
  `hp` varchar(15) default NULL,
  `status` enum('0','1') NOT NULL default '0',
  `uang` decimal(16,2) NOT NULL default '0.00',
  `last_login` datetime default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bankberita`
--

DROP TABLE IF EXISTS `bankberita`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bankberita` (
  `kd_berita` bigint(20) NOT NULL auto_increment,
  `tgl_input` datetime default NULL,
  `kd_kelompok` int(11) default NULL,
  `kd_topik` int(11) default NULL,
  `kd_subtopik` int(11) default NULL,
  `judul_utama` varchar(250) default NULL,
  `artikel` longtext,
  `pengarang` varchar(250) default NULL,
  `penulis` varchar(250) default NULL,
  `kd_media` char(1) default NULL,
  `cetak` enum('0','1') default '0',
  `foto1` varchar(250) default NULL,
  `foto2` varchar(250) default NULL,
  `foto3` varchar(250) default NULL,
  `foto4` varchar(250) default NULL,
  `foto5` varchar(250) default NULL,
  `ketfoto1` longtext,
  `ketfoto2` longtext,
  `ketfoto3` longtext,
  `ketfoto4` longtext,
  `ketfoto5` longtext,
  `forward` enum('0','1','3') NOT NULL default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=16990 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `banner` (
  `kd_banner` int(11) NOT NULL auto_increment,
  `nama` varchar(250) default NULL,
  `gambar` varchar(250) default NULL,
  `mulai` date default NULL,
  `berakhir` date default NULL,
  `link` varchar(250) default NULL,
  `kd_topik` int(11) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_banner`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `banner_posisi`
--

DROP TABLE IF EXISTS `banner_posisi`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `banner_posisi` (
  `id` int(11) NOT NULL auto_increment,
  `kd_bannerwebsite` int(11) default NULL,
  `kd_banner` int(11) NOT NULL default '0',
  `kd_bannerposisi` char(3) NOT NULL default '',
  `dilihat` int(11) NOT NULL default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `kd_banner` (`kd_banner`,`kd_bannerposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bannerposisi`
--

DROP TABLE IF EXISTS `bannerposisi`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bannerposisi` (
  `id` int(11) NOT NULL auto_increment,
  `kd_bannerwebsite` int(11) default NULL,
  `kd_bannerposisi` char(3) default NULL,
  `lebar` int(11) default '0',
  `tinggi` int(11) default '0',
  `jenis` enum('0','1') default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `kd_bannerwebsite` (`kd_bannerwebsite`,`kd_bannerposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bannerposisi_old`
--

DROP TABLE IF EXISTS `bannerposisi_old`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bannerposisi_old` (
  `id` int(11) NOT NULL auto_increment,
  `kd_bannerwebsite` int(11) default NULL,
  `kd_bannerposisi` char(3) default NULL,
  `lebar` int(11) default '0',
  `tinggi` int(11) default '0',
  `jenis` enum('0','1') default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `kd_bannerwebsite` (`kd_bannerwebsite`,`kd_bannerposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bannerwebsite`
--

DROP TABLE IF EXISTS `bannerwebsite`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bannerwebsite` (
  `kd_bannerwebsite` int(11) NOT NULL auto_increment,
  `nama` varchar(250) default NULL,
  `desc` text,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_bannerwebsite`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `berita` (
  `kd_berita` bigint(20) NOT NULL auto_increment,
  `headline` enum('0','1') NOT NULL default '0',
  `kd_suplemen` int(11) default NULL,
  `tgl_input` datetime default NULL,
  `tgl_terbit` datetime default NULL,
  `halaman` int(11) default NULL,
  `kd_kelompok` int(11) default NULL,
  `kd_rubrik` int(11) default NULL,
  `kd_subrubrik` int(11) default NULL,
  `kd_topik` int(11) default NULL,
  `kd_subtopik` int(11) default NULL,
  `kata_kunci` varchar(250) default NULL,
  `judul_kecil_atas` varchar(250) default NULL,
  `judul_utama` varchar(250) default NULL,
  `judul_kecil_bawah` varchar(250) default NULL,
  `artikel` longtext,
  `pengarang` varchar(250) default NULL,
  `editor` varchar(250) default NULL,
  `penulis` varchar(250) default NULL,
  `kd_media` char(1) default NULL,
  `cetak` enum('0','1') default NULL,
  `foto1` varchar(250) default NULL,
  `foto2` varchar(250) default NULL,
  `foto3` varchar(250) default NULL,
  `foto4` varchar(250) default NULL,
  `foto5` varchar(250) default NULL,
  `ketfoto1` longtext,
  `ketfoto2` longtext,
  `ketfoto3` longtext,
  `ketfoto4` longtext,
  `ketfoto5` longtext,
  `commentable` enum('0','1') NOT NULL default '1',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=62924 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `berita_komentar`
--

DROP TABLE IF EXISTS `berita_komentar`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `berita_komentar` (
  `id` int(11) NOT NULL auto_increment,
  `kd_berita` int(11) default NULL,
  `nama` varchar(250) default NULL,
  `alamat` varchar(250) default NULL,
  `email` varchar(250) default NULL,
  `no_tel` varchar(15) default NULL,
  `komentar` longtext,
  `created` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=450 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `beritateredit`
--

DROP TABLE IF EXISTS `beritateredit`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `beritateredit` (
  `kd_berita` bigint(20) NOT NULL auto_increment,
  `headline` enum('0','1') NOT NULL default '0',
  `kd_suplemen` int(11) default NULL,
  `tgl_input` datetime default NULL,
  `tgl_terbit` datetime default NULL,
  `kd_kelompok` int(11) default NULL,
  `kd_rubrik` int(11) default NULL,
  `kd_subrubrik` int(11) default NULL,
  `kd_topik` int(11) default NULL,
  `kd_subtopik` int(11) default NULL,
  `kata_kunci` varchar(250) default NULL,
  `judul_kecil_atas` varchar(250) default NULL,
  `judul_utama` varchar(250) default NULL,
  `judul_kecil_bawah` varchar(250) default NULL,
  `artikel` longtext,
  `pengarang` varchar(250) default NULL,
  `editor` varchar(250) default NULL,
  `penulis` varchar(250) default NULL,
  `kd_media` char(1) default NULL,
  `cetak` enum('0','1') default NULL,
  `foto1` varchar(250) default NULL,
  `foto2` varchar(250) default NULL,
  `foto3` varchar(250) default NULL,
  `foto4` varchar(250) default NULL,
  `foto5` varchar(250) default NULL,
  `ketfoto1` longtext,
  `ketfoto2` longtext,
  `ketfoto3` longtext,
  `ketfoto4` longtext,
  `ketfoto5` longtext,
  `forward` enum('0','1','2') NOT NULL default '0',
  `commantable` enum('0','1') NOT NULL default '1',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=16520 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cuaca`
--

DROP TABLE IF EXISTS `cuaca`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cuaca` (
  `kd_cuaca` int(11) NOT NULL auto_increment,
  `tanggal` date default NULL,
  `utara` varchar(250) default NULL,
  `timur` varchar(250) default NULL,
  `selatan` varchar(250) default NULL,
  `barat` varchar(250) default NULL,
  `tengah` varchar(250) default NULL,
  `sumber` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_cuaca`),
  UNIQUE KEY `tanggal` (`tanggal`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `iklan_baris`
--

DROP TABLE IF EXISTS `iklan_baris`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `iklan_baris` (
  `kd_iklan_baris` int(11) NOT NULL auto_increment,
  `kd_kategori_iklan_baris` int(11) default NULL,
  `iklan_baris` longtext,
  `tgl_terbit` datetime default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_iklan_baris`)
) ENGINE=InnoDB AUTO_INCREMENT=893 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `jadwalsholat`
--

DROP TABLE IF EXISTS `jadwalsholat`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `jadwalsholat` (
  `id` bigint(20) NOT NULL auto_increment,
  `imsak` time default NULL,
  `subuh` time default NULL,
  `dzuhur` time default NULL,
  `ashar` time default NULL,
  `maghrib` time default NULL,
  `isya` time default NULL,
  `tanggal` date default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `tanggal` (`tanggal`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `jawaban_polling`
--

DROP TABLE IF EXISTS `jawaban_polling`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `jawaban_polling` (
  `id` int(11) NOT NULL auto_increment,
  `kd_polling` int(11) default NULL,
  `jawaban` varchar(255) default NULL,
  `jml_vote` int(11) default '0',
  `tgl_jawab` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `kategori_iklan_baris`
--

DROP TABLE IF EXISTS `kategori_iklan_baris`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `kategori_iklan_baris` (
  `kd_kategori_iklan_baris` int(11) NOT NULL auto_increment,
  `nama_kategori` varchar(250) default NULL,
  `desc` varchar(250) default NULL,
  PRIMARY KEY  (`kd_kategori_iklan_baris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `kelompok`
--

DROP TABLE IF EXISTS `kelompok`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `kelompok` (
  `kd_kelompok` int(11) NOT NULL auto_increment,
  `kelompok` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_kelompok`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `media` (
  `id` int(11) NOT NULL auto_increment,
  `kd_media` char(2) NOT NULL default '',
  `media` varchar(250) default NULL,
  `alamat` varchar(250) default NULL,
  `kota` varchar(250) default NULL,
  `no_tel` varchar(15) default NULL,
  `fax` varchar(15) default NULL,
  `email` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `kd_media` (`kd_media`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `negara`
--

DROP TABLE IF EXISTS `negara`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `negara` (
  `kd_negara` int(11) NOT NULL auto_increment,
  `negara` varchar(250) default NULL,
  `kd_mata_uang` varchar(10) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_negara`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `oleole`
--

DROP TABLE IF EXISTS `oleole`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `oleole` (
  `id` int(11) NOT NULL auto_increment,
  `oleole` text,
  `tanggal` date default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=949 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pdf` (
  `kd_pdf` int(11) NOT NULL auto_increment,
  `pdf` varchar(250) default NULL,
  `gambar` varchar(250) default NULL,
  `tanggal` date default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_pdf`),
  UNIQUE KEY `tanggal` (`tanggal`)
) ENGINE=InnoDB AUTO_INCREMENT=348 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `polling`
--

DROP TABLE IF EXISTS `polling`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `polling` (
  `kd_polling` int(11) NOT NULL auto_increment,
  `pertanyaan` varchar(255) default NULL,
  `aktif` date default NULL,
  `expired` date default NULL,
  `dibuat` datetime default NULL,
  PRIMARY KEY  (`kd_polling`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pradd_artikel`
--

DROP TABLE IF EXISTS `pradd_artikel`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pradd_artikel` (
  `kd_artikel` int(11) NOT NULL auto_increment,
  `tanggal` datetime default NULL,
  `judul` varchar(250) default NULL,
  `summary` text,
  `content` longtext,
  `gambar` varchar(250) default NULL,
  `ket_gambar` varchar(250) default NULL,
  `commentable` enum('0','1') NOT NULL default '1',
  PRIMARY KEY  (`kd_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pradd_artikel_comment`
--

DROP TABLE IF EXISTS `pradd_artikel_comment`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pradd_artikel_comment` (
  `kd_artikel_comment` int(11) NOT NULL auto_increment,
  `kd_artikel` int(11) default NULL,
  `nama` varchar(250) default NULL,
  `email` varchar(250) default NULL,
  `alamat` varchar(250) default NULL,
  `komentar` longtext,
  `show` enum('0','1') NOT NULL default '0',
  `created` datetime default NULL,
  PRIMARY KEY  (`kd_artikel_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pradd_index`
--

DROP TABLE IF EXISTS `pradd_index`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pradd_index` (
  `kd_index` int(11) NOT NULL auto_increment,
  `user_id` varchar(15) NOT NULL default '',
  `tanggal` datetime default NULL,
  `judul` varchar(250) default NULL,
  `summary` text,
  `content` longtext,
  `gambar` varchar(250) default NULL,
  `active` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`kd_index`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pradd_jenis_usaha`
--

DROP TABLE IF EXISTS `pradd_jenis_usaha`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pradd_jenis_usaha` (
  `kd_jenis_usaha` int(11) NOT NULL auto_increment,
  `jenis_usaha` varchar(250) default NULL,
  `desc` varchar(250) default NULL,
  PRIMARY KEY  (`kd_jenis_usaha`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pradd_paket`
--

DROP TABLE IF EXISTS `pradd_paket`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pradd_paket` (
  `kd_paket` int(11) NOT NULL auto_increment,
  `nm_paket` varchar(250) default NULL,
  `jum_iklan` int(11) default NULL,
  `biaya` decimal(16,2) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pradd_users`
--

DROP TABLE IF EXISTS `pradd_users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pradd_users` (
  `id` int(11) NOT NULL auto_increment,
  `kd_jenis_usaha` int(11) default NULL,
  `user_id` varchar(15) NOT NULL default '',
  `password` varchar(13) default NULL,
  `badan_usaha` char(1) default NULL,
  `perusahaan` varchar(250) default NULL,
  `phone` varchar(15) default NULL,
  `fax` varchar(15) default NULL,
  `contact_person` varchar(250) default NULL,
  `jabatan` varchar(250) default NULL,
  `email` varchar(250) default NULL,
  `hp` varchar(15) default NULL,
  `kd_paket` int(11) default NULL,
  `tgl_aktif` date default NULL,
  `tgl_expired` date default NULL,
  `logo` varchar(250) default NULL,
  `status` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1283 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_ambil_jenis_proposal`
--

DROP TABLE IF EXISTS `prevent_ambil_jenis_proposal`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_ambil_jenis_proposal` (
  `kd_ambil_jenis_proposal` int(11) NOT NULL auto_increment,
  `kd_proposal` int(11) default NULL,
  `kd_eo` int(11) default NULL,
  `kd_jenis_proposal` int(11) default NULL,
  `permintaan` decimal(16,0) default NULL,
  `diterima` decimal(16,0) default NULL,
  `status` enum('0','1','2') default '0',
  `tanggal` datetime default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_ambil_jenis_proposal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_eo`
--

DROP TABLE IF EXISTS `prevent_eo`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_eo` (
  `kd_eo` int(11) NOT NULL auto_increment,
  `user_id` varchar(15) NOT NULL default '',
  `password` varchar(13) default NULL,
  `perusahaan` varchar(250) default NULL,
  `contact_person` varchar(250) default NULL,
  `alamat` varchar(250) default NULL,
  `no_tel` varchar(15) default NULL,
  `fax` varchar(15) default NULL,
  `email` varchar(250) default NULL,
  `no_hp` varchar(15) default NULL,
  `status` enum('0','1') NOT NULL default '0',
  `logo` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_eo`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_event_galeri`
--

DROP TABLE IF EXISTS `prevent_event_galeri`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_event_galeri` (
  `kd_event_galeri` int(11) NOT NULL auto_increment,
  `kd_event` int(11) default NULL,
  `gambar` varchar(250) default NULL,
  `desc` varchar(250) default NULL,
  `created` datetime default NULL,
  PRIMARY KEY  (`kd_event_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_event_join`
--

DROP TABLE IF EXISTS `prevent_event_join`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_event_join` (
  `kd` int(11) NOT NULL auto_increment,
  `kd_event` int(11) default NULL,
  `id` int(11) default NULL,
  `status` enum('0','1') default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd`),
  UNIQUE KEY `kd_event` (`kd_event`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_event_sponsor`
--

DROP TABLE IF EXISTS `prevent_event_sponsor`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_event_sponsor` (
  `kd` int(11) NOT NULL auto_increment,
  `kd_event` int(11) default NULL,
  `kd_sponsor` int(11) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_events`
--

DROP TABLE IF EXISTS `prevent_events`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_events` (
  `kd_event` int(11) NOT NULL auto_increment,
  `kd_kategori` int(11) default NULL,
  `kd_eo` int(11) default NULL,
  `nama_event` text,
  `desc` longtext,
  `mulai` datetime default NULL,
  `selesai` datetime default NULL,
  `tempat` varchar(255) default NULL,
  `form_daftar` varchar(250) default NULL,
  `banner` varchar(250) default NULL,
  `gambar` text,
  `video` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_event`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_jenis_proposal`
--

DROP TABLE IF EXISTS `prevent_jenis_proposal`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_jenis_proposal` (
  `kd_jenis_proposal` int(11) NOT NULL auto_increment,
  `jenis_proposal` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_jenis_proposal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_katalog`
--

DROP TABLE IF EXISTS `prevent_katalog`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_katalog` (
  `kd_katalog` int(11) NOT NULL auto_increment,
  `nama_katalog` varchar(250) default NULL,
  `harga` decimal(16,2) default '0.00',
  `desc` longtext,
  `gambar` varchar(250) default NULL,
  `created` datetime default NULL,
  PRIMARY KEY  (`kd_katalog`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_kategori`
--

DROP TABLE IF EXISTS `prevent_kategori`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_kategori` (
  `kd_kategori` int(11) NOT NULL auto_increment,
  `nama_kategori` varchar(250) default NULL,
  `desc` text,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_proposal`
--

DROP TABLE IF EXISTS `prevent_proposal`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_proposal` (
  `kd_proposal` int(11) NOT NULL auto_increment,
  `kd_eo` int(11) NOT NULL default '0',
  `nama_event` varchar(250) default NULL,
  `proposal` varchar(250) default NULL,
  `status` enum('0','1','2','3') NOT NULL default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_proposal`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_sponsor`
--

DROP TABLE IF EXISTS `prevent_sponsor`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_sponsor` (
  `kd_sponsor` int(11) NOT NULL auto_increment,
  `nama_sponsor` varchar(250) default NULL,
  `url` varchar(250) default NULL,
  `gambar` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_sponsor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prevent_users`
--

DROP TABLE IF EXISTS `prevent_users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prevent_users` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` varchar(15) NOT NULL default '',
  `password` varchar(13) default NULL,
  `nama` varchar(250) default NULL,
  `alamat` varchar(250) default NULL,
  `no_tel` varchar(15) default NULL,
  `no_hp` varchar(15) default NULL,
  `email` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `rubrik`
--

DROP TABLE IF EXISTS `rubrik`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `rubrik` (
  `kd_rubrik` int(11) NOT NULL auto_increment,
  `rubrik` varchar(250) default NULL,
  `ket` text,
  `khusus` enum('0','1','2') NOT NULL default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_rubrik`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `shp`
--

DROP TABLE IF EXISTS `shp`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `shp` (
  `id` int(11) NOT NULL auto_increment,
  `kd_topik_shp` int(11) default NULL,
  `shp` text,
  `tanggal` date default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `subrubrik`
--

DROP TABLE IF EXISTS `subrubrik`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `subrubrik` (
  `kd_subrubrik` int(11) NOT NULL auto_increment,
  `subrubrik` varchar(250) default NULL,
  `ket` text,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_subrubrik`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `subtopik`
--

DROP TABLE IF EXISTS `subtopik`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `subtopik` (
  `kd_subtopik` int(11) NOT NULL auto_increment,
  `kd_topik` int(11) default NULL,
  `subtopik` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_subtopik`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `suplemen`
--

DROP TABLE IF EXISTS `suplemen`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `suplemen` (
  `kd_suplemen` int(11) NOT NULL auto_increment,
  `suplemen` varchar(250) default NULL,
  `logo` varchar(250) default NULL,
  `hari` set('0','1','2','3','4','5','6') NOT NULL default '0',
  `kode` enum('0','1','2') NOT NULL default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_suplemen`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `suplemenrubrik`
--

DROP TABLE IF EXISTS `suplemenrubrik`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `suplemenrubrik` (
  `id` int(11) NOT NULL auto_increment,
  `kd_suplemen` int(11) NOT NULL default '0',
  `kd_rubrik` int(11) NOT NULL default '0',
  `hari` set('0','1','2','3','4','5','6') NOT NULL default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `kd_suplemen` (`kd_suplemen`,`kd_rubrik`,`hari`)
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `suplemenrubrikshow`
--

DROP TABLE IF EXISTS `suplemenrubrikshow`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `suplemenrubrikshow` (
  `id` bigint(20) NOT NULL auto_increment,
  `kd_suplemen` int(11) NOT NULL default '0',
  `kd_rubrik` int(11) NOT NULL default '0',
  `hari` set('0','1','2','3','4','5','6') NOT NULL default '0',
  `tanggal` date NOT NULL default '0000-00-00',
  `muncul` enum('0','1') NOT NULL default '1',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=521507 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `suplemensubrubrik`
--

DROP TABLE IF EXISTS `suplemensubrubrik`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `suplemensubrubrik` (
  `id` int(11) NOT NULL auto_increment,
  `kd_suplemen` int(11) NOT NULL default '0',
  `kd_subrubrik` int(11) NOT NULL default '0',
  `hari` set('0','1','2','3','4','5','6') NOT NULL default '0',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `kd_suplemen` (`kd_suplemen`,`kd_subrubrik`,`hari`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `suplemensubrubrikshow`
--

DROP TABLE IF EXISTS `suplemensubrubrikshow`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `suplemensubrubrikshow` (
  `id` bigint(20) NOT NULL auto_increment,
  `kd_suplemen` int(11) NOT NULL default '0',
  `kd_subrubrik` int(11) NOT NULL default '0',
  `hari` set('0','1','2','3','4','5','6') NOT NULL default '0',
  `tanggal` date NOT NULL default '0000-00-00',
  `muncul` enum('0','1') NOT NULL default '1',
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86786 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `topik`
--

DROP TABLE IF EXISTS `topik`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `topik` (
  `kd_topik` int(11) NOT NULL auto_increment,
  `topik` varchar(250) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_topik`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `topik_shp`
--

DROP TABLE IF EXISTS `topik_shp`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `topik_shp` (
  `kd_topik_shp` int(11) NOT NULL auto_increment,
  `topik_shp` varchar(255) default NULL,
  `tgl_mulai` date default NULL,
  `tgl_berakhir` date default NULL,
  PRIMARY KEY  (`kd_topik_shp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tunggudulu`
--

DROP TABLE IF EXISTS `tunggudulu`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tunggudulu` (
  `id` int(11) NOT NULL auto_increment,
  `tunggudulu` text,
  `tanggal` date default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` varchar(15) NOT NULL default '',
  `password` varchar(13) NOT NULL default '',
  `nama` varchar(250) default NULL,
  `level` enum('0','1','2','3','4','5','6','7','100') NOT NULL default '1',
  `kd_wartawan` varchar(4) default NULL,
  `kd_media` char(1) default NULL,
  `kd_topik` int(11) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `valas`
--

DROP TABLE IF EXISTS `valas`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `valas` (
  `kd_valas` int(11) NOT NULL auto_increment,
  `kd_negara` int(11) default NULL,
  `tanggal` date default NULL,
  `gmc_beli` decimal(16,2) default NULL,
  `gmc_jual` decimal(16,2) default NULL,
  `trivanza_beli` decimal(16,2) default NULL,
  `trivanza_jual` decimal(16,2) default NULL,
  `restu_valuta_beli` decimal(10,2) default NULL,
  `restu_valuta_jual` decimal(10,2) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`kd_valas`),
  UNIQUE KEY `kd_negara` (`kd_negara`,`tanggal`)
) ENGINE=InnoDB AUTO_INCREMENT=2289 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `wartawan`
--

DROP TABLE IF EXISTS `wartawan`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `wartawan` (
  `id` int(11) NOT NULL auto_increment,
  `kd_wartawan` varchar(4) default NULL,
  `nama` varchar(250) default NULL,
  `alamat` varchar(250) default NULL,
  `no_tel` varchar(15) default NULL,
  `hp` varchar(15) default NULL,
  `email` varchar(250) default NULL,
  `kd_media` char(1) default NULL,
  `created` datetime default NULL,
  `createdby` varchar(15) default NULL,
  `updated` datetime default NULL,
  `updatedby` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-03-06  9:20:21
