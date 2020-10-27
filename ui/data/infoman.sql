-- MySQL dump 10.17  Distrib 10.3.23-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: nodeapps
-- ------------------------------------------------------
-- Server version	10.3.23-MariaDB-0+deb10u1

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation` int(11) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `question` int(11) DEFAULT NULL,
  `answer` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainee` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `audits`
--

DROP TABLE IF EXISTS `audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `roles` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `company` int(11) DEFAULT 0,
  `verified` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bpuserlog`
--

DROP TABLE IF EXISTS `bpuserlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bpuserlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretcode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epoch` int(11) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
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
  `company` int(11) DEFAULT 0,
  `username` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `hours` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `downtime`
--

DROP TABLE IF EXISTS `downtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT current_timestamp(),
  `username` varchar(100) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
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
  `company` int(11) DEFAULT 0,
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
  `invoice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4;
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
-- Temporary table structure for view `expenses_view2`
--

DROP TABLE IF EXISTS `expenses_view2`;
/*!50001 DROP VIEW IF EXISTS `expenses_view2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `expenses_view2` (
  `id` tinyint NOT NULL,
  `customer` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `company` tinyint NOT NULL,
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
-- Temporary table structure for view `expenses_view3`
--

DROP TABLE IF EXISTS `expenses_view3`;
/*!50001 DROP VIEW IF EXISTS `expenses_view3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `expenses_view3` (
  `id` tinyint NOT NULL,
  `customer` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `people` tinyint NOT NULL,
  `qty` tinyint NOT NULL,
  `taxes` tinyint NOT NULL,
  `vat` tinyint NOT NULL,
  `country` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `receipt` tinyint NOT NULL,
  `filename` tinyint NOT NULL,
  `internalfn` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `expenses_view4`
--

DROP TABLE IF EXISTS `expenses_view4`;
/*!50001 DROP VIEW IF EXISTS `expenses_view4`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `expenses_view4` (
  `id` tinyint NOT NULL,
  `customer` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `people` tinyint NOT NULL,
  `qty` tinyint NOT NULL,
  `taxes` tinyint NOT NULL,
  `vat` tinyint NOT NULL,
  `country` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `receipt` tinyint NOT NULL,
  `filename` tinyint NOT NULL,
  `internalfn` tinyint NOT NULL,
  `invoice` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `figures`
--

DROP TABLE IF EXISTS `figures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `figures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internalfn` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instructions`
--

DROP TABLE IF EXISTS `instructions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation` int(11) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `hows` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whys` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transdate` datetime DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `company` int(11) DEFAULT 0,
  `username` varchar(100) DEFAULT NULL,
  `customername` varchar(200) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `customerd` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `invoicenumber` varchar(20) DEFAULT NULL,
  `invoicestatus` varchar(20) DEFAULT 'not ready',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `machines`
--

DROP TABLE IF EXISTS `machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `title` varchar(201) DEFAULT NULL,
  `description` varchar(201) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `transdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `machines_view1`
--

DROP TABLE IF EXISTS `machines_view1`;
/*!50001 DROP VIEW IF EXISTS `machines_view1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `machines_view1` (
  `id` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `cid` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accesscode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT 0,
  `username` varchar(100) DEFAULT NULL,
  `title` varchar(201) DEFAULT NULL,
  `customer` varchar(201) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `transdate` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `products_view1`
--

DROP TABLE IF EXISTS `products_view1`;
/*!50001 DROP VIEW IF EXISTS `products_view1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `products_view1` (
  `id` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `customer` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `products_view2`
--

DROP TABLE IF EXISTS `products_view2`;
/*!50001 DROP VIEW IF EXISTS `products_view2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `products_view2` (
  `id` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `customer` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `cid` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_list` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_default` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rework`
--

DROP TABLE IF EXISTS `rework`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT current_timestamp(),
  `username` varchar(100) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `scrap`
--

DROP TABLE IF EXISTS `scrap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scrap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT current_timestamp(),
  `username` varchar(100) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT 0,
  `username` varchar(100) DEFAULT NULL,
  `city` varchar(201) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stations`
--

DROP TABLE IF EXISTS `stations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT 0,
  `username` varchar(100) DEFAULT NULL,
  `title` varchar(201) DEFAULT NULL,
  `site` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `machine` int(11) DEFAULT NULL,
  `description` varchar(201) DEFAULT NULL,
  `inst_version` varchar(100) DEFAULT NULL,
  `inst_refresh` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `transdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stations_view1`
--

DROP TABLE IF EXISTS `stations_view1`;
/*!50001 DROP VIEW IF EXISTS `stations_view1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stations_view1` (
  `id` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `site` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `product` tinyint NOT NULL,
  `machine` tinyint NOT NULL,
  `sites` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stations_view2`
--

DROP TABLE IF EXISTS `stations_view2`;
/*!50001 DROP VIEW IF EXISTS `stations_view2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stations_view2` (
  `id` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `site` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `product` tinyint NOT NULL,
  `machine` tinyint NOT NULL,
  `sites` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stations_view3`
--

DROP TABLE IF EXISTS `stations_view3`;
/*!50001 DROP VIEW IF EXISTS `stations_view3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stations_view3` (
  `id` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `site` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `transdate` tinyint NOT NULL,
  `inst_version` tinyint NOT NULL,
  `inst_refresh` tinyint NOT NULL,
  `product` tinyint NOT NULL,
  `machine` tinyint NOT NULL,
  `sites` tinyint NOT NULL
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
  `company` int(11) DEFAULT 0,
  `username` varchar(100) DEFAULT NULL,
  `internalfn` varchar(200) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;
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

--
-- Final view structure for view `expenses_view2`
--

/*!50001 DROP TABLE IF EXISTS `expenses_view2`*/;
/*!50001 DROP VIEW IF EXISTS `expenses_view2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `expenses_view2` AS select `a`.`id` AS `id`,`a`.`customer` AS `customer`,`a`.`area` AS `area`,`a`.`username` AS `username`,`a`.`company` AS `company`,`a`.`description` AS `description`,`a`.`people` AS `people`,`a`.`qty` AS `qty`,`a`.`taxes` AS `taxes`,`a`.`vat` AS `vat`,`a`.`country` AS `country`,`a`.`transdate` AS `transdate`,`a`.`timestamp` AS `timestamp`,`a`.`receipt` AS `receipt`,`b`.`filename` AS `filename` from (`expenses` `a` left join `upfiles` `b` on(`a`.`id` = `b`.`expense`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `expenses_view3`
--

/*!50001 DROP TABLE IF EXISTS `expenses_view3`*/;
/*!50001 DROP VIEW IF EXISTS `expenses_view3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `expenses_view3` AS select `a`.`id` AS `id`,`a`.`customer` AS `customer`,`a`.`area` AS `area`,`a`.`username` AS `username`,`a`.`company` AS `company`,`a`.`description` AS `description`,`a`.`people` AS `people`,`a`.`qty` AS `qty`,`a`.`taxes` AS `taxes`,`a`.`vat` AS `vat`,`a`.`country` AS `country`,`a`.`transdate` AS `transdate`,`a`.`timestamp` AS `timestamp`,`a`.`receipt` AS `receipt`,`b`.`filename` AS `filename`,`b`.`internalfn` AS `internalfn` from (`expenses` `a` left join `upfiles` `b` on(`a`.`id` = `b`.`expense`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `expenses_view4`
--

/*!50001 DROP TABLE IF EXISTS `expenses_view4`*/;
/*!50001 DROP VIEW IF EXISTS `expenses_view4`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `expenses_view4` AS select `a`.`id` AS `id`,`a`.`customer` AS `customer`,`a`.`area` AS `area`,`a`.`username` AS `username`,`a`.`company` AS `company`,`a`.`description` AS `description`,`a`.`people` AS `people`,`a`.`qty` AS `qty`,`a`.`taxes` AS `taxes`,`a`.`vat` AS `vat`,`a`.`country` AS `country`,`a`.`transdate` AS `transdate`,`a`.`timestamp` AS `timestamp`,`a`.`receipt` AS `receipt`,`b`.`filename` AS `filename`,`b`.`internalfn` AS `internalfn`,`a`.`invoice` AS `invoice` from (`expenses` `a` left join `upfiles` `b` on(`a`.`id` = `b`.`expense`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `machines_view1`
--

/*!50001 DROP TABLE IF EXISTS `machines_view1`*/;
/*!50001 DROP VIEW IF EXISTS `machines_view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `machines_view1` AS select `m`.`id` AS `id`,`c`.`name` AS `company`,`c`.`id` AS `cid`,`m`.`username` AS `username`,`m`.`title` AS `title`,`m`.`description` AS `description`,`m`.`transdate` AS `transdate`,`m`.`timestamp` AS `timestamp` from (`machines` `m` left join `company` `c` on(`m`.`company` = `c`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `products_view1`
--

/*!50001 DROP TABLE IF EXISTS `products_view1`*/;
/*!50001 DROP VIEW IF EXISTS `products_view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `products_view1` AS select `p`.`id` AS `id`,`c`.`name` AS `company`,`p`.`username` AS `username`,`p`.`title` AS `title`,`p`.`customer` AS `customer`,`p`.`description` AS `description`,`p`.`transdate` AS `transdate`,`p`.`timestamp` AS `timestamp` from (`products` `p` left join `company` `c` on(`p`.`company` = `c`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `products_view2`
--

/*!50001 DROP TABLE IF EXISTS `products_view2`*/;
/*!50001 DROP VIEW IF EXISTS `products_view2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `products_view2` AS select `p`.`id` AS `id`,`c`.`name` AS `company`,`p`.`username` AS `username`,`p`.`title` AS `title`,`p`.`customer` AS `customer`,`p`.`description` AS `description`,`p`.`transdate` AS `transdate`,`p`.`timestamp` AS `timestamp`,`c`.`id` AS `cid` from (`products` `p` left join `company` `c` on(`p`.`company` = `c`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stations_view1`
--

/*!50001 DROP TABLE IF EXISTS `stations_view1`*/;
/*!50001 DROP VIEW IF EXISTS `stations_view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stations_view1` AS select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`title` AS `title`,`a`.`site` AS `site`,`a`.`timestamp` AS `timestamp`,`a`.`transdate` AS `transdate`,(select `p`.`title` from `products` `p` where `p`.`id` = `a`.`product`) AS `product`,(select `m`.`title` from `machines` `m` where `m`.`id` = `a`.`machine`) AS `machine`,(select `s`.`city` from `sites` `s` where `s`.`id` = `a`.`site`) AS `sites` from `stations` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stations_view2`
--

/*!50001 DROP TABLE IF EXISTS `stations_view2`*/;
/*!50001 DROP VIEW IF EXISTS `stations_view2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stations_view2` AS select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`company` AS `company`,`a`.`title` AS `title`,`a`.`site` AS `site`,`a`.`timestamp` AS `timestamp`,`a`.`transdate` AS `transdate`,(select `p`.`title` from `products` `p` where `p`.`id` = `a`.`product`) AS `product`,(select `m`.`title` from `machines` `m` where `m`.`id` = `a`.`machine`) AS `machine`,(select `s`.`city` from `sites` `s` where `s`.`id` = `a`.`site`) AS `sites` from `stations` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stations_view3`
--

/*!50001 DROP TABLE IF EXISTS `stations_view3`*/;
/*!50001 DROP VIEW IF EXISTS `stations_view3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stations_view3` AS select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`company` AS `company`,`a`.`title` AS `title`,`a`.`site` AS `site`,`a`.`timestamp` AS `timestamp`,`a`.`transdate` AS `transdate`,`a`.`inst_version` AS `inst_version`,`a`.`inst_refresh` AS `inst_refresh`,(select `p`.`title` from `products` `p` where `p`.`id` = `a`.`product`) AS `product`,(select `m`.`title` from `machines` `m` where `m`.`id` = `a`.`machine`) AS `machine`,(select `s`.`city` from `sites` `s` where `s`.`id` = `a`.`site`) AS `sites` from `stations` `a` */;
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

-- Dump completed on 2020-10-06 18:50:11
