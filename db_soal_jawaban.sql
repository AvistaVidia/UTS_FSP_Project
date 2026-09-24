-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fullstack
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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

CREATE DATABASE IF NOT EXISTS `fullstack`;
USE `fullstack`;

--
-- Table structure for table `jawaban`
--

DROP TABLE IF EXISTS `jawaban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jawaban` (
  `idjawaban` int(11) NOT NULL AUTO_INCREMENT,
  `idsoal` int(11) NOT NULL,
  `isi_jawaban` text DEFAULT NULL,
  `benarkah` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idjawaban`),
  KEY `fk_jawaban_soal_idx` (`idsoal`),
  CONSTRAINT `fk_jawaban_soal` FOREIGN KEY (`idsoal`) REFERENCES `soal` (`idsoal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jawaban`
--

LOCK TABLES `jawaban` WRITE;
/*!40000 ALTER TABLE `jawaban` DISABLE KEYS */;
INSERT INTO `jawaban` VALUES (1,1,'Gary',1),(2,1,'Larry',0),(3,1,'Jerry',0),(4,1,'Rocky',0),(5,2,'Chum Bucket',0),(6,2,'Krusty Krab',1),(7,2,'Barg\'N-Mart',0),(8,2,'Weenie Hut Jr.',0),(9,3,'Squidward Tentacles',0),(10,3,'Mrs. Puff',0),(11,3,'Sheldon J. Plankton',1),(12,3,'Flying Dutchman',0),(13,15,'Patrick Star',1),(14,15,'Sandy Cheeks',0),(15,15,'Larry the Lobster',0),(16,15,'Mrs. Puff',0),(17,99,'Gitar',0),(18,99,'Klarinet',1),(19,99,'Drum',0),(20,99,'Biola',0),(21,42,'Di dalam Nanas',0),(22,42,'Di bawah Batu',0),(23,42,'Kubah Kaca (Treedome)',1),(24,42,'Di dalam Jangkar Kapal',0),(25,77,'Mermaid Man',1),(26,77,'Batman',0),(27,77,'Sponge Tron',0),(28,77,'Super Ray',0),(29,88,'Kelp City',0),(30,88,'Rock Bottom',0),(31,88,'Shell City',0),(32,88,'Bikini Bottom',1),(33,23,'Pearl',1),(34,23,'Karen',0),(35,23,'Sandy',0),(36,23,'Mindy',0),(37,55,'Mrs. Puff',0),(38,55,'Pearl',0),(39,55,'Karen',1),(40,55,'Betsy',0),(41,61,'Kuda Laut',0),(42,61,'Ubur-ubur',1),(43,61,'Cacing Tanah',0),(44,61,'Kerang',0),(45,34,'Uang',1),(46,34,'Krabby Patty',0),(47,34,'Resep Rahasia',0),(48,34,'Mutiara',0),(49,89,'Mrs. Puff',1),(50,89,'Mr. Krabs',0),(51,89,'Plankton',0),(52,89,'Squidward',0),(53,11,'Nanas',0),(54,11,'Jangkar Kapal',0),(55,11,'Patung Moai (Kepala Paskah)',0),(56,11,'Batu',1),(57,105,'Barnacle Boy',1),(58,105,'Man Ray',0),(59,105,'Dirty Bubble',0),(60,105,'Krabby Boy',0);
/*!40000 ALTER TABLE `jawaban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal`
--

DROP TABLE IF EXISTS `soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal` (
  `idsoal` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` int(11) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `halaman_ke` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsoal`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal`
--

LOCK TABLES `soal` WRITE;
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;
INSERT INTO `soal` VALUES (1,1,'Siapa nama siput peliharaan SpongeBob?',1),(2,2,'Di mana SpongeBob SquarePants bekerja?',1),(3,3,'Siapa musuh bebuyutan Tuan Krabs yang selalu berusaha mencuri resep rahasia Krabby Patty?',1),(11,14,'Berbentuk apakah rumah tempat Patrick Star tinggal?',5),(15,4,'Siapa nama sahabat terbaik SpongeBob?',2),(23,9,'Siapa nama anak perempuan Tuan Krabs yang berwujud paus?',3),(34,12,'Benda apa yang paling disukai dan dicintai oleh Tuan Krabs di dunia ini?',4),(42,6,'Di mana tempat tinggal Sandy Cheeks di Bikini Bottom?',2),(55,10,'Siapa nama istri komputer pintar milik Plankton?',4),(61,11,'Hewan apa yang sangat suka ditangkap SpongeBob menggunakan jaring?',4),(77,7,'Siapa pahlawan super idola SpongeBob dan Patrick?',3),(88,8,'Apa nama kota tempat SpongeBob dan teman-temannya tinggal?',3),(89,13,'Siapa nama guru sekolah mengemudi kapal milik SpongeBob?',5),(99,5,'Instrumen musik apa yang sering dimainkan oleh Squidward?',2),(105,15,'Siapa nama pahlawan super pendamping (sidekick) dari Mermaid Man?',5);
/*!40000 ALTER TABLE `soal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-24 18:02:06
