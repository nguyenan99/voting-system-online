-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: vso
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

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
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidate_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `candidates_position_id_foreign` (`position_id`),
  CONSTRAINT `candidates_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (4,'Nguyễn Thanh Hải',9),(5,'Nguyễn Thị Hương',8),(8,'Nguyễn Thị Mai',9),(10,'Nguyễn Mai Trang',13),(11,'Nguyễn Thị Liên',13),(14,'Hoàng Văn Cường',11),(17,'Nguyễn Thị Thúy',8),(19,'Nguyễn Thị Thanh Huyền',14),(20,'Nguyễn Thanh Tùng',14),(21,'Nguyễn Bảo An',13),(22,'Hoàng Ngọc Minh',8),(23,'Nguyễn Văn Đạo',13),(24,'Nguyễn Văn Trọng',13),(25,'Nguyễn Văn Phong',11),(26,'Nguyễn Bảo Anh',10),(27,'Nguyễn Thị Ly',10),(28,'Nguyễn Ngọc Ánh',9),(29,'Nguyễn Minh Cường',8),(30,'Nguyễn Thành Đức',11),(31,'Nguyễn Văn Hợp',14),(32,'Nguyễn Thị Minh Trang',14);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_05_11_171548_create_positions_table',1),(4,'2020_05_11_171411_create_candidates_table',2),(5,'2020_05_11_171457_create_votes_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (8,'Chủ nhiệm câu lạc bộ',NULL,NULL),(9,'Phó chủ nhiệm thứ nhất',NULL,NULL),(10,'Phó chủ nhiệm thứ hai',NULL,NULL),(11,'Trưởng ban đối ngoại',NULL,NULL),(13,'Trưởng ban nghệ thuật',NULL,NULL),(14,'Trưởng ban hậu cần',NULL,NULL);
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Nguyễn Văn Hải','hainv@gmail.com','2020-05-19 00:58:59','$2y$10$PQ5h3Y7s5Yu5AVEQU.tNau9fTDqytyaBEJQC1Ki.qnnkmC3E6i7E2',1,'pWkDRsfCvIyrVC2XzooRWlcg93KvYj3sqeXoVvalsOVjRJZFKDezWkzKr6ZN','2020-05-19 00:59:00','2020-05-23 20:43:50'),(3,'Nguyễn Văn Minh','minhvn@gmail.com','2020-05-19 00:58:59','$2y$10$RcKjjBFb5dn7ysXb8ceC1OiVFO9vNWHMeR8YNItVZb8xXVcOdlv2.',1,'vj5UaMa2IlqbYUMITzUqJW7MFbXsGA0ZgbWuma96G3HT0ZsJRR5N6cwAfHAB','2020-05-19 00:59:00','2020-05-23 20:44:39'),(6,'Nguyễn Văn Thông','thongnv@gmail.com','2020-05-19 01:09:42','$2y$10$qcFMccKd7OLAZKCzUVRYau.lhB/R1fbUIbY6YbdUAlbUWvHJAHk6y',0,'lCaQlGvAWj','2020-05-19 01:09:42','2020-05-23 21:33:12'),(11,'Nguyễn Văn Toàn B','Toanvn@gmail.com','2020-05-22 00:58:49','$2y$10$GiAgLNctr3..qlqlcoJP8eG78dID8g3PIBeKT3rrMQn7sfD4J0J7y',0,'gIcAWwsUEO','2020-05-22 00:58:50','2020-05-23 22:37:38'),(12,'Nguyễn Công Phượng','phuongcp@gmail.com','2020-05-22 00:58:49','$2y$10$Je9V0649yDVN7AXveFh7a.utkh2p967bKaQyzrZWu0rLfSqexLJF.',0,'Rzi9L2EacZ','2020-05-22 00:58:50','2020-05-23 22:41:14'),(13,'Nguyễn Trọng Đảm','damdt@gmail.com','2020-05-22 00:58:49','$2y$10$fgOcv44MqwOHXmMTDkqPxuq0ro/TLIHcheRO/lBC6zPH66oyI9Ak2',0,'OeJUM5VpL2','2020-05-22 00:58:50','2020-05-23 21:38:48'),(14,'Nguyễn Vũ Tùng Dương','duongnvt@gmail.com','2020-05-22 00:58:49','$2y$10$m9cLyry8tNVe3elbOr5cWuIWI3ogL.DtRiHnoTIYR3.WwxeW95Gtm',0,'cvfEgRCOl3','2020-05-22 00:58:50','2020-05-23 21:39:42'),(15,'Hoàng Quang Chỉnh','chinhhc@gmail.com','2020-05-22 00:58:49','$2y$10$vr.RD/dHtF1aSTXQiECB6eInr9UF27Zor44t6.NPSAg6wFqkfN6X6',0,'3nZOMeQhdYqbLq3rbjkMmnem8X3bKGsW0YjSlNELyV0cylwFm4jIz7wkoIyD','2020-05-22 00:58:50','2020-05-23 21:40:42'),(16,'Nguyễn Văn Nam','namnv@gmail.com',NULL,'$2y$10$zrCsa5F3PWmnvfXk4vAvDuaE3sX9g5sCZtU2ZxngF1tbmmgeOfaHm',1,NULL,'2020-05-23 20:36:06','2020-05-23 20:36:06'),(17,'Trần Bảo Anh','anhbn@gmail.com',NULL,'$2y$10$CwLZtsY9SXnEUPAFhq28qerN38KQ0Pr3Rk7e7auFdljFYN5nCZq62',1,NULL,'2020-05-23 22:30:09','2020-05-23 22:43:12'),(18,'Admin','Admin@gmail.com',NULL,'$2y$10$W2.eKqo8Tj8XTvIaf8StKue5SUNfzwjGKT7VQX6k1sULjVJWt2cya',1,NULL,'2020-05-23 22:38:44','2020-05-23 22:38:44');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `votes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `voter_id` bigint unsigned NOT NULL,
  `cadidate_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `votes_cadidate_id_foreign` (`cadidate_id`),
  KEY `votes_voter_id_index` (`voter_id`),
  CONSTRAINT `votes_cadidate_id_foreign` FOREIGN KEY (`cadidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `votes_voter_id_foreign` FOREIGN KEY (`voter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-24 13:17:49
