CREATE DATABASE  IF NOT EXISTS `travels` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `travels`;
-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: travels
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) NOT NULL,
  `tour_back_id` varchar(166) NOT NULL,
  `returning` enum('1','2') NOT NULL DEFAULT '1',
  `client_firstname` varchar(50) NOT NULL,
  `client_lastname` varchar(50) NOT NULL,
  `identification_nr` varchar(166) NOT NULL,
  `booked_seats` int(2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` varchar(3) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'USD','$'),(2,'EUR','€'),(3,'GBP','£'),(4,'CHF','Fr'),(5,'AUD','$'),(6,'CAD','$');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `iso` varchar(3) NOT NULL,
  PRIMARY KEY (`destination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Noida'),(2,'Dehli'),(3,'Aligarh'),(4,'Goa');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `company_name` varchar(50) NOT NULL,
  `company_street` varchar(50) NOT NULL,
  `company_zip` varchar(50) NOT NULL,
  `company_city` varchar(50) NOT NULL,
  `company_state` varchar(50) NOT NULL,
  `company_phone_one` varchar(50) NOT NULL,
  `company_phone_two` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_rules` text NOT NULL,
  `company_currency` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('Trip Express','Berliner-str','12345','Berlin','DE','0049131253452','0049131253345','support@example.com','2) bibendum quam. Morbi at dui dignissim, auctor turpis id, tempus nulla. Mauris tincidunt ac purus nec dapibus. Mauris dapibus sed urna id placerat. Curabitur in interdum lacus. In hac\r\n3) habitasse platea dictumst. Curabitur placerat quis nibh eu viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n4) Vestibulum posuere, tellus quis consectetur interdum, purus nisl molestie velit, lacinia hendrerit sapien justo id neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per\r\n5) inceptos himenaeos. Sed ornare ligula nisl, a laoreet nisi molestie at. Aliquam eu orci arcu. In dictum quam id lacinia pellentesque. Cras a varius lacus. Suspendisse sagittis risus eget\r\nvolutpat bibendum. Suspendisse facilisis urna sit amet diam viverra porta non a ante. Vivamus vel volutpat libero.\r\nFusce consequat mi erat, vel pharetra quam gravida sit amet. Integer interdum mi eu nibh ultrices laoreet. Aliquam massa eros, tempor mattis dapibus eget, commodo at diam. Maecenas\r\n6) sagittis ex nec arcu ultrices interdum. Maecenas tortor arcu, eleifend in elementum vel, sagittis id risus. Suspendisse suscipit lectus et odio viverra convallis. Lorem ipsum dolor sit amet,\r\nconsectetur adipiscing elit. Vestibulum eget justo maximus, pretium elit quis, consectetur odio. Aenean rhoncus blandit erat, ac ultrices purus tincidunt in. Integer quam arcu, blandit et\r\nauctor et, vestibulum in massa. In dictum lacus nec nisi ornare sodales. Nunc et nisi ex.\r\n7) Vestibulum tempus, justo sit amet varius molestie, metus eros sollicitudin odio, id ullamcorper nulla lectus in orci. Proin ac mi mauris. Aenean maximus vitae dui eu scelerisque. Ut\r\nfaucibus pharetra sem, lacinia blandit erat porttitor eu. Nunc et sollicitudin massa. Sed eu imperdiet tellus. Quisque ut facilisis lacus. Donec ut justo eget nulla interdum aliquam. Etiam a\r\nex nec urna varius interdum. Cras dictum ante in nunc tristique, nec lacinia sapien tempor. Aliquam sit amet orci quis arcu rutrum ornare. Fusce condimentum tempor ipsum id cursus.\r\nPellentesque sed malesuada libero.\r\nDonec quis dolor neque. Vivamus vulputate scelerisque nisl, at consectetur felis semper vel. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n8) Maecenas dapibus risus sit amet fringilla pretium. Suspendisse non interdum erat, at cursus est. Morbi porttitor dapibus tempus. Duis vulputate et dui sit amet imperdiet','2');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(50) NOT NULL,
  `to` int(50) NOT NULL,
  `from_start_time` datetime NOT NULL,
  `available_seats` int(5) NOT NULL,
  `start_price` decimal(10,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('1','2') DEFAULT NULL COMMENT '1 - User, 2 - Guide',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Vikas','Chauhan','vikkygp4all@gmail.com','8860206024','e968e6ae6805cd4ebc7cca293049cb4e','2'),(2,'Vikas','chauhan','vikaschauhan@mail.com','9897874546','8cd6c6d3d9adb53949568a8d19e2ecf0','1'),(3,'afzal','md','afzalmhd@mail.com','8786768768','60d25c2d918be5f46443a81ac1ae5f87','2'),(4,'fffff','ffff','vikky@gmail.com','67678686','adf313bdefe46704b94326ab873deb43','2'),(5,'travel','guide','travelguide@mail.com','7056576576','69266c67e75c946ef9b4144b0554326d','2'),(6,'Lisa','Ray','lisaray@mail.com','23423423434','69266c67e75c946ef9b4144b0554326d','2'),(7,'PAmrika','Ray','pamrika@mail.com','5675876887','69266c67e75c946ef9b4144b0554326d','2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_profile`
--

DROP TABLE IF EXISTS `users_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_profile` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `about_me` varchar(400) DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `location_id` tinyint(2) DEFAULT NULL COMMENT 'reference_id to location',
  `profile_photo` varchar(255) DEFAULT NULL,
  `user_id` tinyint(4) DEFAULT NULL COMMENT 'reference id of user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_profile`
--

LOCK TABLES `users_profile` WRITE;
/*!40000 ALTER TABLE `users_profile` DISABLE KEYS */;
INSERT INTO `users_profile` VALUES (1,'I am a very simple person',25,'male',2,NULL,2),(2,'I am a traveller guy',32,'male',2,NULL,5),(3,'I am a very simple person I am a very simple person',35,'male',2,NULL,4),(4,'I am a very simple, age 23 year old',23,'female',2,NULL,6),(5,'I am a very simple and humble, age 25 year old',25,'female',4,NULL,7);
/*!40000 ALTER TABLE `users_profile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-22 14:14:35
