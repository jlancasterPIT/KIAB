-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: kiabReservations
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.10.1

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
-- Table structure for table `clientConfig`
--

DROP TABLE IF EXISTS `clientConfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientConfig` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientConfig`
--

LOCK TABLES `clientConfig` WRITE;
/*!40000 ALTER TABLE `clientConfig` DISABLE KEYS */;
INSERT INTO `clientConfig` VALUES (1,'title','Double Hydrant Bed N Biscuits, Mt. Pleasant, PA 15666'),(2,'hours','Monday - Saturday: 9AM-4PM'),(3,'company_name','Double Hydrant'),(4,'address','142 Airport Road, Mt. Pleasant, PA 15666'),(5,'phone_number','724-757-0855'),(6,'detailed_pickup','Monday - Saturday : 9AM - 11AM : 2PM - 4PM'),(7,'detailed_dropoff','Monday - Saturday : 9AM - 11AM'),(8,'company_email','deb@doublehydrant.com'),(9,'price_pernight','21'),(10,'price_pernight_onerun','35'),(11,'price_latefee','8'),(12,'facebook_url','https://www.facebook.com/pages/Double-Hydrant/357471531055907');
/*!40000 ALTER TABLE `clientConfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmsSpotTable`
--

DROP TABLE IF EXISTS `cmsSpotTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmsSpotTable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmsSpotTable`
--

LOCK TABLES `cmsSpotTable` WRITE;
/*!40000 ALTER TABLE `cmsSpotTable` DISABLE KEYS */;
/*!40000 ALTER TABLE `cmsSpotTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enabledModules`
--

DROP TABLE IF EXISTS `enabledModules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enabledModules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moduleName` varchar(255) DEFAULT NULL,
  `enabled` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enabledModules`
--

LOCK TABLES `enabledModules` WRITE;
/*!40000 ALTER TABLE `enabledModules` DISABLE KEYS */;
INSERT INTO `enabledModules` VALUES (1,'facebook','1'),(2,'clientTestimonals','1');
/*!40000 ALTER TABLE `enabledModules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dropOffDate` date DEFAULT NULL,
  `pickUpDate` date DEFAULT NULL,
  `numOfDogs` int(10) DEFAULT NULL,
  `boardTogether` int(2) DEFAULT NULL,
  `vaccineRecordLocation` varchar(255) DEFAULT NULL,
  `dogName` varchar(25) DEFAULT NULL,
  `dogAge` int(4) DEFAULT NULL,
  `dogBreed` varchar(255) DEFAULT NULL,
  `listOfAllergies` text,
  `listOfMedications` text,
  `listOfFleaTreatment` text,
  `feedingRequirements` text,
  `hasTreats` int(2) DEFAULT NULL,
  `hasWalks` int(2) DEFAULT NULL,
  `hasDogPark` int(2) DEFAULT NULL,
  `hasPlayTime` int(2) DEFAULT NULL,
  `clientName` varchar(255) DEFAULT NULL,
  `clientPhoneNumber` varchar(255) DEFAULT NULL,
  `clientEmail` varchar(255) DEFAULT NULL,
  `pdfLink` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (77,'2013-11-18','2013-11-22',3,1,'/uploads/c0234eb912588900730629f9f8ef9bb0.png','Sophie',1,'German Sheperd','None','None','None','Nothing Special',1,1,1,1,'Jeremy Lancaster','724-263-3475','jeremy@jeremylancasterconsulting.com','/var/www/reservation_pdfs/77a1bd33d4f13be0103e70a0b23920b6.pdf'),(78,'2013-11-18','2013-11-22',3,1,'/uploads/f62b4483a80e824f9cc728756764d859.png','Sophie',1,'German Sheperd','None','None','None','Nothing Special',1,1,1,1,'Jeremy Lancaster','724-263-3475','jeremy@jeremylancasterconsulting.com','/var/www/reservation_pdfs/433e00261b4d5021de03e79e9b03f8a0.pdf'),(79,'2013-11-18','2013-11-22',3,1,'/uploads/891651c3a67aa91b1d99a1cd959d1966.png','Sophie',1,'German Sheperd','None','None','None','Nothing Special',1,1,1,1,'Jeremy Lancaster','724-263-3475','jeremy@jeremylancasterconsulting.com','/var/www/reservation_pdfs/a3fce6d081def7a7c6f8c8da40710879.pdf'),(80,'2013-01-01','2013-01-11',1,0,'/uploads/21694804726af98f363b162824287918.png','Sophie',1,'German Sheperd','None','None','None','Nothing Special',1,0,1,0,'Jeremy Lancaster','724-263-3475','jeremy@jeremylancasterconsulting.com','/var/www/reservation_pdfs/7fab8993e845bf4e6d0b63d082727801.pdf');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userInformation`
--

DROP TABLE IF EXISTS `userInformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userInformation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userInformation`
--

LOCK TABLES `userInformation` WRITE;
/*!40000 ALTER TABLE `userInformation` DISABLE KEYS */;
INSERT INTO `userInformation` VALUES (1,'admin','712a5aa7af2b852d5849bf9bb3c3cc10');
/*!40000 ALTER TABLE `userInformation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-27 23:12:49
