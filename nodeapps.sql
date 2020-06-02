-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: nodeapps
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bpuser`
--

DROP TABLE IF EXISTS `bpuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bpuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `bp_id` varchar(100) DEFAULT NULL,
  `roles` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bpuser`
--

LOCK TABLES `bpuser` WRITE;
/*!40000 ALTER TABLE `bpuser` DISABLE KEYS */;
INSERT INTO `bpuser` VALUES (2,'adiaz','$2y$10$.nOB7yYlwUedEw/ukQjLeOK.KMy2fgG9L1JDoCQFFs7WxPtRBjw9i','None','User'),(4,'borja','$2y$10$wa3dJ62yBmBkkCsDXJH35OH87cv/UF5b2KINO2OEQeTZQ5g5UaTMW','none','Admin');
/*!40000 ALTER TABLE `bpuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clocktime`
--

DROP TABLE IF EXISTS `clocktime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clocktime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `hours` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clocktime`
--

LOCK TABLES `clocktime` WRITE;
/*!40000 ALTER TABLE `clocktime` DISABLE KEYS */;
INSERT INTO `clocktime` VALUES (1,'70744','adiaz','None3','USA','2020-05-26 22:21:00','2020-05-27 09:00:00',10.65);
/*!40000 ALTER TABLE `clocktime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `people` varchar(200) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `taxes` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `receipt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (14,'29466','Hotel','adiaz','None2','none2',38,3.5,0,'USA','2020-05-26 00:00:00','2020-05-26 10:57:07',0),(15,'29466','Rental','adiaz','none3','none3',10,1.5,0,'USA','2020-05-26 00:00:00','2020-05-26 11:10:34',0),(16,'29466','Airfare','adiaz','none re','none re',7.5,1.2,0,'USA','2020-05-26 00:00:00','2020-05-26 11:11:07',0);
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `expenses_view1`
--

DROP TABLE IF EXISTS `expenses_view1`;
/*!50001 DROP VIEW IF EXISTS `expenses_view1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `expenses_view1` (
  `id` tinyint NOT NULL,
  `customer` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `people` tinyint NOT NULL,
  `qty` tinyint NOT NULL,
  `taxes` tinyint NOT NULL,
  `vat` tinyint NOT NULL,
  `country` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `receipt` tinyint NOT NULL,
  `filename` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `upfiles`
--

DROP TABLE IF EXISTS `upfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `internalfn` varchar(200) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upfiles`
--

LOCK TABLES `upfiles` WRITE;
/*!40000 ALTER TABLE `upfiles` DISABLE KEYS */;
INSERT INTO `upfiles` VALUES (2,'70744','12-agile-principles-600x776.jpg','Airfare',NULL,0,'adiaz',NULL,NULL,'2020-05-29 08:54:34'),(5,'29466','qrcode-info.png','Supplies',NULL,0,'adiaz','{AE88951E-DAA2-93CB-74CA-6BB8F398AF90}',NULL,'2020-05-29 08:54:34'),(6,'29466','d-box-small.png','Restaurant',NULL,0,'adiaz','28F5CF5F-7445-97EF-F22E-3B29B1687D03',NULL,'2020-05-29 08:54:34'),(7,'17701','diazllc-logo-black.jpg','Rental',NULL,NULL,'borja','B2D9170C-E533-B593-954B-11B58727B9FD',NULL,'2020-05-29 08:54:34');
/*!40000 ALTER TABLE `upfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `expenses_view1`
--

/*!50001 DROP TABLE IF EXISTS `expenses_view1`*/;
/*!50001 DROP VIEW IF EXISTS `expenses_view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `expenses_view1` AS select `a`.`id` AS `id`,`a`.`customer` AS `customer`,`a`.`area` AS `area`,`a`.`username` AS `username`,`a`.`description` AS `description`,`a`.`people` AS `people`,`a`.`qty` AS `qty`,`a`.`taxes` AS `taxes`,`a`.`vat` AS `vat`,`a`.`country` AS `country`,`a`.`transdate` AS `transdate`,`a`.`timestamp` AS `timestamp`,`a`.`receipt` AS `receipt`,`b`.`filename` AS `filename` from (`expenses` `a` left join `upfiles` `b` on(`a`.`id` = `b`.`expense`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-29 15:35:51
