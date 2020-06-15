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
  `roles` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `bp_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bpuser`
--

LOCK TABLES `bpuser` WRITE;
/*!40000 ALTER TABLE `bpuser` DISABLE KEYS */;
INSERT INTO `bpuser` VALUES (2,'adiaz','$2y$10$IKY4NoVNxyqds9NQDI3w5u0GJuVfvQkE56El.H3Nrjsg7Yhlg06a2','User',NULL,NULL),(4,'borja','$2y$10$wa3dJ62yBmBkkCsDXJH35OH87cv/UF5b2KINO2OEQeTZQ5g5UaTMW','Admin',NULL,NULL),(6,'antoniodiaz','$2y$10$bxQC7VVEY/lHnmScMFw5TehFPqQdJ4Num6XIlTbTa6wrm.Ms70Bfq','Admin','antoniodiazduran@icloud.com','109'),(7,'antoniod','$2y$10$Ad1ywnH9R384Thj/HGiX8OvOPR8hcyx006cxHlQrW4pAc06n1na/6','Data',NULL,NULL),(8,'antoniodz','$2y$10$gipFF5TwgwNLHbJeW5xQMuDMjvOLjKG2J5dOZ3x6/oe2v17A2YvD.','User','antoniodiaz@icloud.com','103'),(9,'youlinrd','$2y$10$0tHcOl2pmSpdGksotb34.eferMf7kO.vgqXaCTe62TZrytqJqQ/HK','User','youlindiaz@yahoo.com',NULL),(12,'youlinrdd','$2y$10$GDNMQX/JZ4K9SW55HAtvIe/ZM0YZtwn5shAFuWfI9qmiTBfoSFyam','User','youlindia@yahoo.com',NULL),(13,'antoniodiazd','$2y$10$YMcAG9PdCECsRb8ZI4IJN.Ajw70x3fGUvjT.fHz.MoSarzZ.v28ma','User','antoniodiaz@yahoo.com','102');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clocktime`
--

LOCK TABLES `clocktime` WRITE;
/*!40000 ALTER TABLE `clocktime` DISABLE KEYS */;
INSERT INTO `clocktime` VALUES (2,'70744','adiaz','Introductions, tour  and VSM initial draft','USA','2020-06-02 07:15:00','2020-06-02 17:40:00',10.42),(3,'70744','adiaz','Completion of VSM for chassis and body','USA','2020-06-03 07:15:00','2020-06-03 17:35:00',10.33),(6,'70744','adiaz','Wrap-up, A3 for Kaizens','USA','2020-06-04 07:34:00','2020-06-04 17:35:00',10.02);
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (22,'29466','Marketing','adiaz','Purchase of Google Domain diaz consulting.llc','',30,0,0,'USA','2020-05-14 10:13:00','2020-06-06 14:14:17',12),(23,'29466','Marketing','adiaz','Business cards (100 pcs) to Vistaprint for Diaz Consulting LLC','',39.99,3.6,0,'USA','2020-05-22 15:05:00','2020-06-06 14:15:58',13),(24,'70744','Airfare','adiaz','Airline: American Airlines\r\nLocation From: CHS	To: BTR \r\nDates From: 6/1/2020 	To: 6/5/2020','Passenger: Antonio Diaz',232,26.2,0,'USA','2020-05-18 10:16:00','2020-06-06 14:17:30',10),(25,'70744','Hotel','adiaz','Chain/Brand: Hilton Homewood\r\nDates From: 6/1/2020\r\nTo: 6/5/2020\r\nDays: 4','Antonio Diaz',443.16,70.68,0,'USA','2020-06-05 06:00:00','2020-06-06 14:19:40',14),(26,'70744','Parking','adiaz','City/Airport: CHS\r\nDays: 4','Antonio Diaz',50,0,0,'USA','2020-06-05 10:19:00','2020-06-06 14:20:27',15),(27,'70744','Taxi','adiaz','Uber: Baton Rouge\r\nLocation From: BTR\r\nTo: Hotel','Antonio Diaz',22.73,6.19,0,'USA','2020-06-01 10:20:00','2020-06-06 14:21:59',16),(28,'70744','Taxi','adiaz','Uber: Baton Rouge \r\nLocation From: Hotel\r\nTo: BTR\r\nNo Receipt','Antonio Diaz',35,0,0,'USA','2020-06-05 05:50:00','2020-06-06 14:22:57',0),(31,'29466','Marketing','adiaz','South Carolina Secretary of State filling for LLC ','',125,0,0,'USA','2020-05-14 12:22:00','2020-06-06 16:23:09',11),(32,'70744','Meals','adiaz','Name: Mansurs on the Blvd\r\nLocation: Baton Rouge','Guest: Antonio Diaz\r\nGuest: ',24,1.99,0,'USA','2020-06-01 08:45:00','2020-06-07 12:47:08',17),(33,'70744','Meals','adiaz','Name: Mansurs on the Blvs\r\nLocation: Baton Rouge','Guest: Antonio Diaz\r\nGuest: ',28,2.39,0,'USA','2020-06-02 08:47:00','2020-06-07 12:48:25',19),(34,'70744','Meals','adiaz','Name: Mansurs on the Blvd \r\nLocation: Baton Rouge','Guest: Antonio Diaz\r\nGuest: ',41,3.58,0,'USA','2020-06-03 08:48:00','2020-06-07 12:49:24',18);
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
  `username` varchar(100) DEFAULT NULL,
  `customername` varchar(200) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `customerd` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `invoicenumber` varchar(20) DEFAULT NULL,
  `invoicestatus` varchar(20) DEFAULT 'not ready',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,'2020-06-09 00:00:00','2020-06-20 00:00:00','2020-06-12 11:12:00','adiaz','Leanarrow, LLC','45068','7980 Bending Willow CT\r\nWaynesville, OH  45068','Visit to Ferrara Fire Apparatus for RPA exercise\r\n','2020-001','sent'),(2,'2020-06-10 00:00:00','2020-06-13 00:00:00','2020-06-12 10:48:00','adiaz','x','29466','x','Test for invoicing','2020-002','not ready');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoicesd`
--

LOCK TABLES `invoicesd` WRITE;
/*!40000 ALTER TABLE `invoicesd` DISABLE KEYS */;
INSERT INTO `invoicesd` VALUES (12,2,'2020-06-08 15:36:00','2020-06-08 19:36:25',NULL,'Expenses',1,130,130,'Test1'),(14,2,'2020-06-08 16:08:00','2020-06-08 20:09:14',NULL,'Kaizen',10,120,1200,'test'),(15,1,'2020-05-18 00:00:00','2020-06-09 20:48:43',NULL,'Expenses',1,258.2,258.2,'American Airlines from CHS to BTR June 1 to 5, 2020'),(18,1,'2020-06-01 00:00:00','2020-06-09 20:51:42',NULL,'Expenses',1,28.92,28.92,'Uber from BTR airport to Hilton'),(19,1,'2020-06-05 00:00:00','2020-06-09 20:52:13',NULL,'Expenses',1,35,35,'Taxi from Hilton to BTR airport'),(20,1,'2020-06-05 00:00:00','2020-06-09 20:52:39',NULL,'Expenses',5,102.768,513.84,'Hilton Homewood Suites in Baton Rouge from June 1 to 5, 2020'),(21,1,'2020-06-05 00:00:00','2020-06-09 20:53:26',NULL,'Expenses',1,50,50,'Parking at Charleston airport from June 1 to 5, 2020'),(22,1,'2020-06-05 00:00:00','2020-06-09 20:55:05',NULL,'Expenses',1,100.96,100.96,'Meals - Dinner in Baton Rouge June 1, 2 and 3, 2020'),(23,1,'2020-06-05 00:00:00','2020-06-09 20:55:52',NULL,'Support',1,1000,1000,'Supporting the assessment team at Ferrara Fire Apparatus');
/*!40000 ALTER TABLE `invoicesd` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upfiles`
--

LOCK TABLES `upfiles` WRITE;
/*!40000 ALTER TABLE `upfiles` DISABLE KEYS */;
INSERT INTO `upfiles` VALUES (7,'17701','diazllc-logo-black.jpg','Rental',NULL,NULL,'borja','B2D9170C-E533-B593-954B-11B58727B9FD',NULL,'2020-05-29 08:54:34'),(10,'70744','american-airlines-dysurt.pdf','Airfare',NULL,24,'adiaz','E98B0B67-3459-3821-B35A-BD40FF8B4FE2','2020-05-18 14:53:00','2020-06-06 14:04:27'),(11,'29466','business-filing-confirmation.pdf','Marketing',NULL,31,'adiaz','596B0924-7649-532C-2CC4-943F63C1D709','2020-05-14 10:04:00','2020-06-06 14:05:30'),(12,'29466','google-domains-purchase-receipt.pdf','Marketing',NULL,22,'adiaz','6F28D6CE-CB2C-C14C-6329-33FB2C3F6DC8','2020-05-14 15:30:00','2020-06-06 14:06:42'),(13,'29466','vistaprint-order-receipt.pdf','Marketing',NULL,23,'adiaz','49AE7926-768F-6465-AB02-4A7E4EBEF56B','2020-05-22 15:03:00','2020-06-06 14:07:16'),(14,'70744','hilton-homewood-baton-rouge.pdf','Hotel',NULL,25,'adiaz','27AD9035-DD91-A0D6-3011-0F2E8BD5739A','2020-06-05 06:00:00','2020-06-06 14:08:21'),(15,'70744','parking-at-chs-baton-rouge.pdf','Parking',NULL,26,'adiaz','7D66B085-107F-5BE4-EDB1-8BDDE1769BF5','2020-06-05 12:15:00','2020-06-06 14:08:55'),(16,'70744','uber-btr-to-hotel','Taxi',NULL,27,'adiaz','56EB5DD3-8C6D-7EFB-FFB8-489EDD318F01','2020-06-01 10:08:00','2020-06-06 14:09:13'),(17,'70744','customer-copy-6-1-2020.pdf','Meals',NULL,32,'adiaz','98368B73-F1AB-A3A7-3F55-4C8ACF46CF71','2020-06-01 08:44:00','2020-06-07 12:44:38'),(18,'70744','customer-copy-6-3-2020.pdf','Meals',NULL,34,'adiaz','0E6E9DFC-B464-4E4D-BE2C-9EC9774FB019','2020-06-03 08:44:00','2020-06-07 12:44:53'),(19,'70744','customer-copy-6-2-2020.pdf','Meals',NULL,33,'adiaz','1C22170A-0D0D-05E4-E9BF-1426F6C43D96','2020-06-02 08:44:00','2020-06-07 12:45:08');
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

-- Dump completed on 2020-06-15 14:03:38
