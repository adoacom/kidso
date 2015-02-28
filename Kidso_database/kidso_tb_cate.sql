CREATE DATABASE  IF NOT EXISTS `kidso` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `kidso`;
-- MySQL dump 10.13  Distrib 5.6.17, for osx10.6 (i386)
--
-- Host: localhost    Database: kidso
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2-log

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
-- Table structure for table `tb_cate`
--

DROP TABLE IF EXISTS `tb_cate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_zh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_cate_zh` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_cate_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cate`
--

LOCK TABLES `tb_cate` WRITE;
/*!40000 ALTER TABLE `tb_cate` DISABLE KEYS */;
INSERT INTO `tb_cate` VALUES (1,'教育','Education',NULL,'Special Ed','2015-01-29 09:57:18'),(2,'教育','Education','教育','Education','2015-01-29 09:57:18'),(3,'教育','Education',NULL,'Playgroups','2015-01-29 09:57:19'),(4,'戶外及課外活動','Activities',NULL,'Activities','2015-01-29 09:57:20'),(5,'戶外及課外活動','Activities',NULL,'Outdoor','2015-01-29 09:57:21'),(6,'醫療','Medical',NULL,'Pre/Postnatal','2015-01-29 09:57:19'),(7,'醫療','Medical',NULL,'Health&Service','2015-01-29 09:57:20'),(8,'休閒娛樂','Party',NULL,'Party&Memories','2015-01-29 09:57:20');
/*!40000 ALTER TABLE `tb_cate` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-24 14:24:37
