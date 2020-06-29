-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: localhost    Database: nodeapps
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `bpuser`
--

DROP TABLE IF EXISTS `bpuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bpuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `roles` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `company` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clocktime`
--

DROP TABLE IF EXISTS `clocktime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clocktime` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) DEFAULT NULL,
  `company` int DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `hours` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `codehash`
--

DROP TABLE IF EXISTS `codehash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `codehash` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `company` int DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `people` varchar(200) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `taxes` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `receipt` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `expenses_view1`
--

DROP TABLE IF EXISTS `expenses_view1`;
/*!50001 DROP VIEW IF EXISTS `expenses_view1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `expenses_view1` AS SELECT 
 1 AS `id`,
 1 AS `customer`,
 1 AS `area`,
 1 AS `username`,
 1 AS `description`,
 1 AS `people`,
 1 AS `qty`,
 1 AS `taxes`,
 1 AS `vat`,
 1 AS `country`,
 1 AS `transdate`,
 1 AS `timestamp`,
 1 AS `receipt`,
 1 AS `filename`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `expenses_view2`
--

DROP TABLE IF EXISTS `expenses_view2`;
/*!50001 DROP VIEW IF EXISTS `expenses_view2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `expenses_view2` AS SELECT 
 1 AS `id`,
 1 AS `customer`,
 1 AS `area`,
 1 AS `username`,
 1 AS `company`,
 1 AS `description`,
 1 AS `people`,
 1 AS `qty`,
 1 AS `taxes`,
 1 AS `vat`,
 1 AS `country`,
 1 AS `transdate`,
 1 AS `timestamp`,
 1 AS `receipt`,
 1 AS `filename`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `figures`
--

DROP TABLE IF EXISTS `figures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `figures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` int DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internalfn` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instr`
--

DROP TABLE IF EXISTS `instr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sites` varchar(201) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linename` varchar(201) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stations` varchar(201) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hows` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whys` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pics` int DEFAULT NULL,
  `orders` int DEFAULT NULL,
  `users` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instructions`
--

DROP TABLE IF EXISTS `instructions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `relation` int DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int DEFAULT NULL,
  `hows` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whys` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transdate` datetime DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `company` int DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `customername` varchar(200) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `customerd` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `invoicenumber` varchar(20) DEFAULT NULL,
  `invoicestatus` varchar(20) DEFAULT 'not ready',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoicesd`
--

DROP TABLE IF EXISTS `invoicesd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoicesd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `relation` int DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `itemorder` int DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `machines`
--

DROP TABLE IF EXISTS `machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` int DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `title` varchar(201) DEFAULT NULL,
  `description` varchar(201) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` int DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `title` varchar(201) DEFAULT NULL,
  `customer` varchar(201) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transdate` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `products_view1`
--

DROP TABLE IF EXISTS `products_view1`;
/*!50001 DROP VIEW IF EXISTS `products_view1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `products_view1` AS SELECT 
 1 AS `id`,
 1 AS `company`,
 1 AS `username`,
 1 AS `title`,
 1 AS `customer`,
 1 AS `description`,
 1 AS `transdate`,
 1 AS `timestamp`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` int DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `city` varchar(201) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stations`
--

DROP TABLE IF EXISTS `stations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` int DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `title` varchar(201) DEFAULT NULL,
  `site` int DEFAULT NULL,
  `product` int DEFAULT NULL,
  `machine` int DEFAULT NULL,
  `description` varchar(201) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `stations_view1`
--

DROP TABLE IF EXISTS `stations_view1`;
/*!50001 DROP VIEW IF EXISTS `stations_view1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stations_view1` AS SELECT 
 1 AS `id`,
 1 AS `username`,
 1 AS `title`,
 1 AS `site`,
 1 AS `timestamp`,
 1 AS `transdate`,
 1 AS `product`,
 1 AS `machine`,
 1 AS `sites`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `stations_view2`
--

DROP TABLE IF EXISTS `stations_view2`;
/*!50001 DROP VIEW IF EXISTS `stations_view2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stations_view2` AS SELECT 
 1 AS `id`,
 1 AS `username`,
 1 AS `company`,
 1 AS `title`,
 1 AS `site`,
 1 AS `timestamp`,
 1 AS `transdate`,
 1 AS `product`,
 1 AS `machine`,
 1 AS `sites`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tweets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tweetid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `len` int DEFAULT NULL,
  `tweettext` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tweets_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22440 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `upfiles`
--

DROP TABLE IF EXISTS `upfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upfiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `sequence` int DEFAULT NULL,
  `expense` int DEFAULT NULL,
  `company` int DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `internalfn` varchar(200) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `expenses_view1`
--

/*!50001 DROP VIEW IF EXISTS `expenses_view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `expenses_view1` AS select `a`.`id` AS `id`,`a`.`customer` AS `customer`,`a`.`area` AS `area`,`a`.`username` AS `username`,`a`.`description` AS `description`,`a`.`people` AS `people`,`a`.`qty` AS `qty`,`a`.`taxes` AS `taxes`,`a`.`vat` AS `vat`,`a`.`country` AS `country`,`a`.`transdate` AS `transdate`,`a`.`timestamp` AS `timestamp`,`a`.`receipt` AS `receipt`,`b`.`filename` AS `filename` from (`expenses` `a` left join `upfiles` `b` on((`a`.`id` = `b`.`expense`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `expenses_view2`
--

/*!50001 DROP VIEW IF EXISTS `expenses_view2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `expenses_view2` AS select `a`.`id` AS `id`,`a`.`customer` AS `customer`,`a`.`area` AS `area`,`a`.`username` AS `username`,`a`.`company` AS `company`,`a`.`description` AS `description`,`a`.`people` AS `people`,`a`.`qty` AS `qty`,`a`.`taxes` AS `taxes`,`a`.`vat` AS `vat`,`a`.`country` AS `country`,`a`.`transdate` AS `transdate`,`a`.`timestamp` AS `timestamp`,`a`.`receipt` AS `receipt`,`b`.`filename` AS `filename` from (`expenses` `a` left join `upfiles` `b` on((`a`.`id` = `b`.`expense`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `products_view1`
--

/*!50001 DROP VIEW IF EXISTS `products_view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `products_view1` AS select `p`.`id` AS `id`,`c`.`name` AS `company`,`p`.`username` AS `username`,`p`.`title` AS `title`,`p`.`customer` AS `customer`,`p`.`description` AS `description`,`p`.`transdate` AS `transdate`,`p`.`timestamp` AS `timestamp` from (`products` `p` left join `company` `c` on((`p`.`company` = `c`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stations_view1`
--

/*!50001 DROP VIEW IF EXISTS `stations_view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stations_view1` AS select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`title` AS `title`,`a`.`site` AS `site`,`a`.`timestamp` AS `timestamp`,`a`.`transdate` AS `transdate`,(select `p`.`title` from `products` `p` where (`p`.`id` = `a`.`product`)) AS `product`,(select `m`.`title` from `machines` `m` where (`m`.`id` = `a`.`machine`)) AS `machine`,(select `s`.`city` from `sites` `s` where (`s`.`id` = `a`.`site`)) AS `sites` from `stations` `a` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stations_view2`
--

/*!50001 DROP VIEW IF EXISTS `stations_view2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`adiaz`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stations_view2` AS select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`company` AS `company`,`a`.`title` AS `title`,`a`.`site` AS `site`,`a`.`timestamp` AS `timestamp`,`a`.`transdate` AS `transdate`,(select `p`.`title` from `products` `p` where (`p`.`id` = `a`.`product`)) AS `product`,(select `m`.`title` from `machines` `m` where (`m`.`id` = `a`.`machine`)) AS `machine`,(select `s`.`city` from `sites` `s` where (`s`.`id` = `a`.`site`)) AS `sites` from `stations` `a` */;
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

-- Dump completed on 2020-06-29 15:48:59
