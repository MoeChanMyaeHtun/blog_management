-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@gmail.com','09987456123','Mdy','$2y$10$lhc67NWFUqU2x6IevOIX6e/HIqpxNrAwfqDgdYLqE5lNFQGrAHai2',NULL,'2022-10-18 02:53:43','2022-10-18 02:53:43');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Samsung Phone','2022-10-18 02:53:43','2022-10-18 02:53:43',NULL),(2,'Samsung Tablet','2022-10-18 02:53:43','2022-10-18 02:53:43',NULL),(3,'Samsung Laptop','2022-10-18 02:53:43','2022-10-18 02:53:43',NULL),(4,'mac book','2022-10-18 02:53:43','2022-10-18 02:53:43',NULL),(5,'iphone','2022-10-18 02:53:43','2022-10-18 02:53:43',NULL),(6,'ipad','2022-10-18 02:53:43','2022-10-20 05:16:46','2022-10-20 05:16:46'),(7,'iwatch','2022-10-18 02:53:43','2022-10-20 04:45:30','2022-10-20 04:45:30'),(8,'Asus laptop','2022-10-18 02:53:43','2022-10-19 09:50:52','2022-10-19 09:50:52'),(9,'Acer Laptop','2022-10-18 02:53:43','2022-10-18 09:26:50','2022-10-18 09:26:50'),(10,'shoon','2022-10-18 09:27:30','2022-10-19 09:46:50','2022-10-19 09:46:50');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_products`
--

DROP TABLE IF EXISTS `category_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `products_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_products_products_id_foreign` (`products_id`),
  KEY `category_products_category_id_foreign` (`category_id`),
  CONSTRAINT `category_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_products`
--

LOCK TABLES `category_products` WRITE;
/*!40000 ALTER TABLE `category_products` DISABLE KEYS */;
INSERT INTO `category_products` VALUES (213,132,3,NULL,NULL),(214,132,4,NULL,NULL);
/*!40000 ALTER TABLE `category_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `imageable_id` int NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,108,'App\\Models\\Products','16662507406350f7f4b3276_img_10.jpg','C:\\Apache24\\htdocs\\laravel\\public\\img/16662507406350f7f4b3276_img_10.jpg',NULL,'2022-10-20 07:25:40','2022-10-20 07:25:40'),(2,109,'App\\Models\\Products','16662515426350fb16c89bc_img_4.jpg','C:\\Apache24\\htdocs\\laravel\\public\\img/16662515426350fb16c89bc_img_4.jpg',NULL,'2022-10-20 07:39:02','2022-10-20 07:39:02'),(3,110,'App\\Models\\Products','16662515686350fb300c609_img_10.jpg','C:\\Apache24\\htdocs\\laravel\\public\\img/16662515686350fb300c609_img_10.jpg',NULL,'2022-10-20 07:39:28','2022-10-20 07:39:28'),(4,111,'App\\Models\\Products','1666253754635103bae98d5_img_3.jpg','/1666253754635103bae98d5_img_3.jpg',NULL,'2022-10-20 08:15:54','2022-10-20 08:15:54'),(5,112,'App\\Models\\Products','166625384563510415c7587_img_4.jpg','img./166625384563510415c7587_img_4.jpg',NULL,'2022-10-20 08:17:25','2022-10-20 08:17:25'),(6,113,'App\\Models\\Products','16662538836351043bd4219_img_4.jpg','img/16662538836351043bd4219_img_4.jpg',NULL,'2022-10-20 08:18:03','2022-10-20 08:18:03'),(7,114,'App\\Models\\Products','166625902563511851aa1eb_img_04.jpg','img/166625902563511851aa1eb_img_04.jpg',NULL,'2022-10-20 08:27:53','2022-10-20 09:43:45'),(8,115,'App\\Models\\Products','16662590456351186597c6a_img_02.jpg','img/16662590456351186597c6a_img_02.jpg',NULL,'2022-10-20 09:07:15','2022-10-20 09:44:05'),(9,116,'App\\Models\\Products','166625906463511878dbd23_img-03.jpg','img/166625906463511878dbd23_img-03.jpg',NULL,'2022-10-20 09:44:24','2022-10-20 09:44:24'),(10,117,'App\\Models\\Products','166625962363511aa7e6a8b_img_7.jpg','img/166625962363511aa7e6a8b_img_7.jpg',NULL,'2022-10-20 09:53:43','2022-10-20 09:53:43'),(11,118,'App\\Models\\Products','166625963663511ab4ecf80_img_6.jpg','img/166625963663511ab4ecf80_img_6.jpg',NULL,'2022-10-20 09:53:56','2022-10-20 09:53:56'),(12,119,'App\\Models\\Products','166625965063511ac2db016_img-8.jpg','img/166625965063511ac2db016_img-8.jpg',NULL,'2022-10-20 09:54:10','2022-10-20 09:54:10'),(13,120,'App\\Models\\Products','1666320596635208d463b8e_img_1.jpg','img/1666320596635208d463b8e_img_1.jpg',NULL,'2022-10-21 02:49:56','2022-10-21 02:49:56'),(14,121,'App\\Models\\Products','1666320620635208ec041b7_img_5.jpg','img/1666320620635208ec041b7_img_5.jpg',NULL,'2022-10-21 02:50:20','2022-10-21 02:50:20'),(15,122,'App\\Models\\Products','166632158063520cac71ea5_img_6.jpg','img/166632158063520cac71ea5_img_6.jpg',NULL,'2022-10-21 03:06:20','2022-10-21 03:06:20'),(16,123,'App\\Models\\Products','166632159063520cb607f53_img_1.jpg','img/166632159063520cb607f53_img_1.jpg',NULL,'2022-10-21 03:06:30','2022-10-21 03:06:30'),(17,124,'App\\Models\\Products','1666322598635210a680362_img_1.jpg','img/1666322598635210a680362_img_1.jpg',NULL,'2022-10-21 03:23:18','2022-10-21 03:23:18'),(18,125,'App\\Models\\Products','1666322617635210b93074f_img_6.jpg','img/1666322617635210b93074f_img_6.jpg',NULL,'2022-10-21 03:23:37','2022-10-21 03:23:37'),(19,126,'App\\Models\\Products','16663234726352141026c04_img_6.jpg','img/16663234726352141026c04_img_6.jpg',NULL,'2022-10-21 03:37:52','2022-10-21 03:37:52'),(20,11,'App\\Models\\User','166633809363524d2d8d8ac_img_7.jpg','img/profile/166633809363524d2d8d8ac_img_7.jpg',NULL,'2022-10-21 05:03:17','2022-10-21 07:41:33'),(21,12,'App\\Models\\User','166634226463525d783b296_img-03.jpg','img/profile/166634226463525d783b296_img-03.jpg',NULL,'2022-10-21 08:51:04','2022-10-21 08:51:04'),(22,128,'App\\Models\\Products','166634242163525e153dd5c_img-03.jpg','img/166634242163525e153dd5c_img-03.jpg',NULL,'2022-10-21 08:53:41','2022-10-21 08:53:41'),(23,13,'App\\Models\\User','16663452606352692c9b12f_img_02.jpg','img/profile/16663452606352692c9b12f_img_02.jpg',NULL,'2022-10-21 09:41:00','2022-10-21 09:41:00'),(24,14,'App\\Models\\User','16663453096352695dc130d_img_04.jpg','img/profile/16663453096352695dc130d_img_04.jpg',NULL,'2022-10-21 09:41:49','2022-10-21 09:41:49'),(25,15,'App\\Models\\User','166634601763526c219e020_img_2.jpg','img/profile/166634601763526c219e020_img_2.jpg',NULL,'2022-10-21 09:52:36','2022-10-21 09:53:37'),(26,131,'App\\Models\\Products','166634609263526c6cc5612_istockphoto-668320490-612x612.jpg','img/166634609263526c6cc5612_istockphoto-668320490-612x612.jpg',NULL,'2022-10-21 09:54:52','2022-10-21 09:54:52'),(27,132,'App\\Models\\Products','166634631463526d4a2d22f_istockphoto-668320490-612x612.jpg','img/166634631463526d4a2d22f_istockphoto-668320490-612x612.jpg',NULL,'2022-10-21 09:58:34','2022-10-21 09:58:34'),(28,133,'App\\Models\\Products','166634689463526f8e88897_img_7.jpg','img/166634689463526f8e88897_img_7.jpg',NULL,'2022-10-21 10:08:14','2022-10-21 10:08:14');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_10_11_022315_create_products_table',1),(6,'2022_10_11_024152_create_categories_table',1),(7,'2022_10_11_024549_create_category__products_table',1),(8,'2022_10_12_142017_create_admins_table',1),(9,'2022_10_20_105721_create_images_table',2);
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`),
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (128,12,'Et doloribus dicta v','Iste proident repel','401','2022-10-21 09:38:47','2022-10-21 08:53:41','2022-10-21 09:38:47'),(129,12,'Irure quas ipsam ill','Dolores velit dolor','716','2022-10-21 10:06:52','2022-10-21 09:36:38','2022-10-21 10:06:52'),(130,12,'Irure quas ipsam ill','Dolores velit dolor','716','2022-10-21 10:05:57','2022-10-21 09:36:55','2022-10-21 10:05:57'),(131,15,'Qui incididunt volup','Veniam vel adipisic','153','2022-10-21 09:55:46','2022-10-21 09:54:52','2022-10-21 09:55:46'),(132,14,'Facere aliquid labor','In placeat elit au','345',NULL,'2022-10-21 09:58:34','2022-10-21 09:58:34'),(133,15,'Cupiditate excepturi','Nostrud quisquam in','461','2022-10-21 10:08:23','2022-10-21 10:08:14','2022-10-21 10:08:23');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'kyisin','scm.kyisinshoonlaelin@gmail.com','09123456789','ygn','$2y$10$Lo0tUNNOj3uXfQ0olVNf8OjUeUU8G/wPVF2pfQFeq8UjfGsekKU4m',NULL,'2022-10-21 02:49:19','2022-10-21 02:49:19'),(5,'Raphael Torres','fikysonywo@mailinator.com','09123456789','At occaecat fuga Es','$2y$10$Z9urlxSZ7S8h561fzdRkQ.UTqYj9.0bSTaccOoFYeTwo0UsnMLC9u',NULL,'2022-10-21 04:52:24','2022-10-21 04:52:24'),(6,'shoon','shoon@gmail.com','09123456789','mdy','$2y$10$XGcjk0com2lBMdObYUkZruZQbqUEIP8vy1Y29UJf38y6ekeKFLRqa',NULL,'2022-10-21 04:53:58','2022-10-21 04:53:58'),(8,'shoonshoon','shoonshoon5@gmail.com','09123456789','mdy','$2y$10$dg/dD79aF3kkDcSojAACYOZyEMNwNdJpqeXPJppoBTB.dtOGsXFIe',NULL,'2022-10-21 04:58:51','2022-10-21 04:58:51'),(9,'Thar Thar','thar@gmail.com','09123456789','ygn','$2y$10$2aT6rLA/KrIPjhcmlU9Mz.ItEU0iOkPDbsyP2La0V5I2eC1rJZs2y',NULL,'2022-10-21 05:00:58','2022-10-21 05:00:58'),(11,'pyaesone','pyaesone@gmail.com','09123456789','ygn','$2y$10$ueqdS4LUM3l0OpwviZK0IOMtQZgD.ydo.FC1kF8ma/VUwSSFp5nj.',NULL,'2022-10-21 05:03:17','2022-10-21 05:03:17'),(12,'Mochi','mochi1@gmail.com','09123456789','ygn','$2y$10$.YHBpw/OSJN4qb2ETdMK8.XWTWjJQEjj4VikG2SXAeCfSdWfB3lxi',NULL,'2022-10-21 08:51:04','2022-10-21 08:51:04'),(13,'Myat Theingi','scm.myattheingiaung@gmail.com','912345678','pyay','$2y$10$UsiLLmjpoWqDWcTbiSCJQeG/9/u/kHBiZn4UVyQpYkezzhR9NFpu2',NULL,'2022-10-21 09:41:00','2022-10-21 09:41:00'),(14,'moechan','moechan@gmail.com','1-123456789','ygn','$2y$10$BvsIo2zRonw4//LKbO.oqul5fSVQh1Uad1Nr3GAgCTAVdsrsEEOxa',NULL,'2022-10-21 09:41:49','2022-10-21 09:41:49'),(15,'Kaung Myat Thway','scm.kaungmyatthway@gmail.com','09123456789','ygn','$2y$10$UQ/wgHLBYMRXxDgsbYozNu/sHTwChdTpJY3OMplqEi0AYj3Wl2ySi',NULL,'2022-10-21 09:52:36','2022-10-21 09:52:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-21 16:47:15
