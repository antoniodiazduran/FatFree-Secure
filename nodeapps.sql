-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (x86_64)
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
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `customer` varchar(100) DEFAULT NULL,
  `customerd` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoicesd`
--

DROP TABLE IF EXISTS `invoicesd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoicesd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation` int(11) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `itemorder` int(11) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- Dump completed on 2020-06-06 13:27:20
