-- MySQL dump 10.14  Distrib 5.5.43-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: meal
-- ------------------------------------------------------
-- Server version	5.5.43-MariaDB-1ubuntu0.14.04.2

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
-- Table structure for table `customer_tbl`
--

DROP TABLE IF EXISTS `customer_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_tbl` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cust_contact` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `cust_no` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `cust_address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cust_phone1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `cust_phone2` varchar(20) COLLATE utf8_bin NOT NULL,
  `cust_notes` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='客戶基本資料表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_tbl`
--

LOCK TABLES `customer_tbl` WRITE;
/*!40000 ALTER TABLE `customer_tbl` DISABLE KEYS */;
INSERT INTO `customer_tbl` VALUES (3,'æ¸¬è©¦3','è€å¤§','86543221','','03-222211','',''),(4,'æ±å—éºµåº—','æŽå°å§','12345678','','03-2212220','','');
/*!40000 ALTER TABLE `customer_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_tbl`
--

DROP TABLE IF EXISTS `food_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_tbl` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `food_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_desc` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `food_notes` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_tbl`
--

LOCK TABLES `food_tbl` WRITE;
/*!40000 ALTER TABLE `food_tbl` DISABLE KEYS */;
INSERT INTO `food_tbl` VALUES (13,4,'ç‰›è‚‰éºµ',85,'ç´…ç‡’111',NULL);
/*!40000 ALTER TABLE `food_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mealmanage_tbl`
--

DROP TABLE IF EXISTS `mealmanage_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mealmanage_tbl` (
  `order_date` date NOT NULL,
  `order_type` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL DEFAULT '-1',
  `notes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`order_date`,`order_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mealmanage_tbl`
--

LOCK TABLES `mealmanage_tbl` WRITE;
/*!40000 ALTER TABLE `mealmanage_tbl` DISABLE KEYS */;
INSERT INTO `mealmanage_tbl` VALUES ('2015-06-08',1,3,-1,NULL),('2015-06-08',2,3,-1,NULL),('2015-06-09',1,3,-1,NULL),('2015-06-09',2,4,-1,NULL),('2015-06-10',1,3,-1,NULL),('2015-06-10',2,4,-1,NULL),('2015-06-11',1,-1,-1,NULL),('2015-06-11',2,-1,-1,NULL),('2015-06-12',1,-1,-1,NULL),('2015-06-12',2,-1,-1,NULL),('2015-06-13',1,-1,-1,NULL),('2015-06-13',2,-1,-1,NULL),('2015-06-14',1,-1,-1,NULL),('2015-06-14',2,-1,-1,NULL),('2015-06-15',1,-1,-1,NULL),('2015-06-15',2,-1,-1,NULL);
/*!40000 ALTER TABLE `mealmanage_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_partment` varchar(100) DEFAULT NULL,
  `user_tokenid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tbl`
--

LOCK TABLES `user_tbl` WRITE;
/*!40000 ALTER TABLE `user_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-13  7:15:28
