-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for bakatsql
CREATE DATABASE IF NOT EXISTS `bakatsql` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bakatsql`;

-- Dumping structure for table bakatsql.detail_konsultasi
CREATE TABLE IF NOT EXISTS `detail_konsultasi` (
  `ID_DETAIL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_HASIL` int(11) NOT NULL,
  `ID_BAKAT_MINAT` int(11) NOT NULL,
  `HASIL_HITUNG` float NOT NULL,
  PRIMARY KEY (`ID_DETAIL`),
  KEY `FK_DETAIL_K_RELATIONS_TB_DUMP` (`ID_HASIL`) USING BTREE,
  KEY `ID_BAKAT_MINAT` (`ID_BAKAT_MINAT`),
  CONSTRAINT `FK_detail_konsultasi_tb_bakat_minat` FOREIGN KEY (`ID_BAKAT_MINAT`) REFERENCES `tb_bakat_minat` (`ID_BAKAT_MINAT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_detail_konsultasi_tb_hasil_konsultasi` FOREIGN KEY (`ID_HASIL`) REFERENCES `tb_hasil_konsultasi` (`ID_HASIL`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table bakatsql.tb_bakat_minat
CREATE TABLE IF NOT EXISTS `tb_bakat_minat` (
  `ID_BAKAT_MINAT` int(11) NOT NULL AUTO_INCREMENT,
  `BAKAT_MINAT` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_BAKAT_MINAT`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table bakatsql.tb_dump
CREATE TABLE IF NOT EXISTS `tb_dump` (
  `ID_DUMP` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SISWA` int(11) NOT NULL,
  `ID_KUSONER` int(11) NOT NULL,
  `JWB` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_DUMP`),
  KEY `FK_TB_DUMP_RELATIONS_TB_SISWA` (`ID_SISWA`),
  KEY `FK_TB_DUMP_RELATIONS_TB_BAKAT` (`ID_KUSONER`) USING BTREE,
  CONSTRAINT `FK_TB_DUMP_RELATIONS_TB_SISWA` FOREIGN KEY (`ID_SISWA`) REFERENCES `tb_siswa` (`ID_SISWA`),
  CONSTRAINT `FK_tb_dump_tb_kusoner` FOREIGN KEY (`ID_KUSONER`) REFERENCES `tb_kusoner` (`ID_KUSONER`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table bakatsql.tb_hasil_konsultasi
CREATE TABLE IF NOT EXISTS `tb_hasil_konsultasi` (
  `ID_HASIL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SISWA` int(11) NOT NULL,
  PRIMARY KEY (`ID_HASIL`),
  KEY `ID_SISWA` (`ID_SISWA`),
  CONSTRAINT `FK_tb_hasil_konsultasi_tb_siswa` FOREIGN KEY (`ID_SISWA`) REFERENCES `tb_siswa` (`ID_SISWA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table bakatsql.tb_kusoner
CREATE TABLE IF NOT EXISTS `tb_kusoner` (
  `ID_KUSONER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_BAKAT_MINAT` int(11) NOT NULL,
  `KUSONER` text NOT NULL,
  PRIMARY KEY (`ID_KUSONER`),
  KEY `FK_TB_KUSON_RELATIONS_TB_BAKAT` (`ID_BAKAT_MINAT`),
  CONSTRAINT `FK_TB_KUSON_RELATIONS_TB_BAKAT` FOREIGN KEY (`ID_BAKAT_MINAT`) REFERENCES `tb_bakat_minat` (`ID_BAKAT_MINAT`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table bakatsql.tb_siswa
CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `ID_SISWA` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SISWA` varchar(100) NOT NULL,
  `KELAS` varchar(100) NOT NULL,
  `JK` char(2) NOT NULL,
  PRIMARY KEY (`ID_SISWA`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table bakatsql.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(100) NOT NULL,
  `PASSW` varchar(10) NOT NULL,
  `STATUS_USER` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
