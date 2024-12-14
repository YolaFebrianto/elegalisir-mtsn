-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.34 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table mtsn_legal.tbl_instansi
DROP TABLE IF EXISTS `tbl_instansi`;
CREATE TABLE IF NOT EXISTS `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepsek` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_instansi`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mtsn_legal.tbl_instansi: ~1 rows (approximately)
INSERT INTO `tbl_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `kepsek`, `nip`, `website`, `email`, `logo`) VALUES
	(1, 'KEMENTERIAN AGAMA REPUBLIK INDONESIA', 'KANTOR KEMENTERIAN AGAMA KABUPATEN SIDOARJO', 'MTs Negeri 1 Sidoarjo', 'Jalan Stadion Nomor 150 Kemiri Sidoarjo 61234', 'Drs. Achmad Saifullah, M.Pd.I', '196712261995031001', 'https://mtsn1sidoarjo.sch.id', 'mtsnsidoarjo@gmail.com', 'logo_kemenag_resmi-removebg-preview.png');

-- Dumping structure for table mtsn_legal.tbl_legalisir
DROP TABLE IF EXISTS `tbl_legalisir`;
CREATE TABLE IF NOT EXISTS `tbl_legalisir` (
  `id_legal` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ijazah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus` int DEFAULT (0),
  `status` tinyint DEFAULT '0',
  `pengambilan` tinyint DEFAULT '0',
  `file` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_legal` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdon` datetime NOT NULL DEFAULT (now()),
  `lastediton` datetime NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_legal`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mtsn_legal.tbl_legalisir: ~2 rows (approximately)
INSERT INTO `tbl_legalisir` (`id_legal`, `nik`, `nisn`, `no_ijazah`, `tahun_lulus`, `status`, `pengambilan`, `file`, `file_legal`, `createdon`, `lastediton`) VALUES
	(1, '54321', '0123544408', '9876/5432/1234', 2017, 0, 0, '54321_20241214120824.pdf', NULL, '2024-12-14 14:37:24', '2024-12-14 18:09:12'),
	(2, '12345', '', '9876/5432/1234', 2020, 0, 1, '12345_20241214115012.pdf', '', '2024-12-14 17:33:51', '2024-12-14 17:54:05');

-- Dumping structure for table mtsn_legal.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` tinyint NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `level` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `nik` (`nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table mtsn_legal.tbl_user: ~2 rows (approximately)
INSERT INTO `tbl_user` (`id_user`, `nik`, `nisn`, `password`, `nama`, `email`, `kontak`, `gambar`, `admin`, `level`, `status`) VALUES
	(1, '12345', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Indra Praja Kusuma', NULL, 'XXX', '12345.jpg', 0, 0, 1),
	(2, '54321', '0123544408', '21232f297a57a5a743894a0e4a801fc3', 'yola', 'admin@admin.com', '0123456789', '54321.jpg', 0, 1, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
