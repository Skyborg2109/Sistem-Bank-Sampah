-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: projectFramework-231080
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_logs_username_index` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_sampah`
--

DROP TABLE IF EXISTS `data_sampah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_sampah` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_sampah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_sampah`
--

LOCK TABLES `data_sampah` WRITE;
/*!40000 ALTER TABLE `data_sampah` DISABLE KEYS */;
INSERT INTO `data_sampah` VALUES (2,'Organik',24.00,'2026-01-06','2026-01-05 10:02:55','2026-01-08 20:13:21'),(3,'Plastik',5.00,'2026-01-20','2026-01-20 09:57:22','2026-01-20 09:57:49'),(4,'Kaca',5.50,'2026-01-21','2026-01-21 02:59:42','2026-01-21 02:59:58'),(5,'Logam',5.00,'2026-01-21','2026-01-21 03:17:26','2026-01-21 03:17:26');
/*!40000 ALTER TABLE `data_sampah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_user_tabel`
--

DROP TABLE IF EXISTS `data_user_tabel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_user_tabel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas','Warga') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Warga',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_user_tabel_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_user_tabel`
--

LOCK TABLES `data_user_tabel` WRITE;
/*!40000 ALTER TABLE `data_user_tabel` DISABLE KEYS */;
INSERT INTO `data_user_tabel` VALUES (1,'Wilhelmus','admin','admin@gmail.com',NULL,NULL,'$2y$12$390QhyzwY.lKdDs3PJ1Z3eEDAVq8r/Yijh4QQLJlhZEo96QZp5vOW','admin','2026-01-04 14:54:11','2026-01-21 02:46:29'),(2,'Petugas','petugas','petugas@gmail.com',NULL,NULL,'$2y$12$Pa1QlbMNHJvUQohxoHo9We9QCLIVIw95GNjKg.29Oxw7o32TSXu8e','petugas','2026-01-04 14:54:11','2026-01-04 14:54:11'),(3,'Warga','warga','warga@gmail.com',NULL,NULL,'$2y$12$7xTCt8vvruIaNHTU/EBWXer4vptJPaUApU4qVHq5kWm8CcpHsnCuS','Warga','2026-01-04 14:54:12','2026-01-04 14:54:12'),(7,'Willy Juaness','Willy','willyjuaness@gmail.com',NULL,NULL,'$2y$12$WAX97Kmm1ImpMRFxdrvMWufzReS0LPxsL6rNxKpJrfMOHUBd6ewli','Warga',NULL,NULL),(10,'Rosi','rosi123','rosi@gmail.com',NULL,NULL,'$2y$12$AJ.eQ7nDKISXv7QwBMJ6QOW1mLODpfgVGa0PfGTRTtgoBHx77oPKe','petugas',NULL,NULL),(11,'Ahmad','ahmad','ahmad@gmail.com',NULL,NULL,'$2y$12$Hd5jK1ow2U84.xxwUMixoOeayaveIGoV3c1tbGslkXiczT6iLuh2G','Warga',NULL,NULL);
/*!40000 ALTER TABLE `data_user_tabel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_warga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_sampah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

LOCK TABLES `laporan` WRITE;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
INSERT INTO `laporan` VALUES (1,'Willy','Organik',3.00,'2026-01-21',NULL,'2026-01-20 18:50:41','2026-01-20 18:50:41'),(2,'Willy','Plastik',4.00,'2026-01-21',NULL,'2026-01-20 18:50:57','2026-01-20 18:50:57'),(3,'Willy','Plastik',5.50,'2026-01-21',NULL,'2026-01-20 18:55:14','2026-01-20 18:55:14'),(4,'Willy','Plastik',6.25,'2026-01-21','sampah Bungkus Snack','2026-01-20 19:00:27','2026-01-20 19:00:27'),(5,'Willy','Organik',4.24,'2026-01-21',NULL,'2026-01-20 19:18:23','2026-01-20 19:18:23'),(6,'Willy','Organik',5.50,'2026-01-21',NULL,'2026-01-21 02:58:03','2026-01-21 02:58:03');
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2025_12_10_064113_create_data_user_tabel',1),(2,'2025_12_10_071010_mengisi_data_user',1),(3,'2026_01_05_163250_create_data_sampah_table',2),(4,'2026_01_05_165324_create_laporan_table',3),(5,'2026_01_21_025303_update_laporan_berat_column_type',4),(6,'2026_01_21_025357_update_data_sampah_berat_column_type',5),(7,'2026_01_21_031236_create_notifications_table',6),(8,'2026_01_21_032743_add_profile_fields_to_data_user_tabel',7),(9,'2026_01_21_033520_create_user_settings_table',8),(10,'2026_01_21_033931_create_activity_logs_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'laporan','Laporan Baru Masuk','Willy melaporkan 4.24 Kg sampah Organik','laporan','/Admin/laporan','admin',1,'2026-01-20 19:18:23','2026-01-20 19:18:23'),(2,'laporan','Laporan Baru Masuk','Willy melaporkan 5.5 Kg sampah Organik','laporan','/Admin/laporan','admin',1,'2026-01-21 02:58:03','2026-01-21 02:58:03');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_settings`
--

DROP TABLE IF EXISTS `user_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WIB',
  `email_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `push_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `sound_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `compact_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_settings_username_index` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_settings`
--

LOCK TABLES `user_settings` WRITE;
/*!40000 ALTER TABLE `user_settings` DISABLE KEYS */;
INSERT INTO `user_settings` VALUES (1,'admin','id','WIB',1,1,1,1,1,'2026-01-20 19:37:37','2026-01-21 02:47:34');
/*!40000 ALTER TABLE `user_settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-21 14:42:14
