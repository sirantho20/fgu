-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: fgu
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `fgu_fuelling`
--

DROP TABLE IF EXISTS `fgu_fuelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fgu_fuelling` (
  `site_id` varchar(50) DEFAULT NULL,
  `delivery_date` datetime NOT NULL,
  `quantity_delivered_cm` double DEFAULT NULL,
  `quantity_delivered_lts` float NOT NULL,
  `emergency_fuelling` char(10) NOT NULL,
  `access_code` varchar(50) NOT NULL,
  `quantity_before_delivery_cm` double NOT NULL,
  `quantity_before_delivery_lts` double NOT NULL,
  `quantity_after_delivery_cm` double NOT NULL,
  `quantity_after_delivery_lts` double NOT NULL,
  `htg_fs_present` varchar(50) NOT NULL,
  PRIMARY KEY (`delivery_date`,`access_code`),
  KEY `fuelling_site_id_idx` (`site_id`),
  CONSTRAINT `fuelling_site_id` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fgu_fuelling`
--

LOCK TABLES `fgu_fuelling` WRITE;
/*!40000 ALTER TABLE `fgu_fuelling` DISABLE KEYS */;
/*!40000 ALTER TABLE `fgu_fuelling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genset_reading`
--

DROP TABLE IF EXISTS `genset_reading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genset_reading` (
  `genset_id` varchar(50) DEFAULT NULL,
  `site_id` varchar(50) DEFAULT NULL,
  `reading_date` datetime NOT NULL,
  `fuel_level_cm` double DEFAULT NULL,
  `fuel_quantity_lts` double DEFAULT NULL,
  `genset_run_hours` double DEFAULT NULL,
  `entry_date` datetime NOT NULL,
  `reading_by` varchar(50) NOT NULL,
  `entry_by` varchar(50) NOT NULL,
  `source_of_reading` varchar(50) NOT NULL,
  `date_modified` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `days_from_last_reading` int(11) NOT NULL,
  `access_code` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`reading_date`,`access_code`),
  KEY `genset_reading_site_idx` (`site_id`),
  CONSTRAINT `genset_reading_site` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genset_reading`
--

LOCK TABLES `genset_reading` WRITE;
/*!40000 ALTER TABLE `genset_reading` DISABLE KEYS */;
/*!40000 ALTER TABLE `genset_reading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gensets`
--

DROP TABLE IF EXISTS `gensets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gensets` (
  `genset_id` varchar(50) NOT NULL DEFAULT '',
  `supplier` varchar(50) NOT NULL,
  `kva` double NOT NULL,
  `engine_used` char(10) NOT NULL,
  `fuel_tank_width` varchar(10) NOT NULL,
  `purchase_date` date NOT NULL,
  `fuel_tank_height` varchar(53) NOT NULL,
  `fuel_tank_breadth` varchar(53) NOT NULL,
  `start_run_hours` int(11) NOT NULL,
  PRIMARY KEY (`genset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gensets`
--

LOCK TABLES `gensets` WRITE;
/*!40000 ALTER TABLE `gensets` DISABLE KEYS */;
/*!40000 ALTER TABLE `gensets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meter_reading`
--

DROP TABLE IF EXISTS `meter_reading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meter_reading` (
  `meter_id` varchar(50) DEFAULT NULL,
  `site_id` varchar(11) DEFAULT NULL,
  `reading_date` datetime NOT NULL,
  `kwh_reading` double DEFAULT NULL,
  `reading_by` varchar(50) NOT NULL,
  `entry_date` datetime DEFAULT NULL,
  `date_modified` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `days_from_last_reading` int(10) NOT NULL,
  `access_code` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`reading_date`,`access_code`),
  KEY `meter_reading_site_idx` (`site_id`),
  CONSTRAINT `meter_reading_site` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meter_reading`
--

LOCK TABLES `meter_reading` WRITE;
/*!40000 ALTER TABLE `meter_reading` DISABLE KEYS */;
/*!40000 ALTER TABLE `meter_reading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meter_site`
--

DROP TABLE IF EXISTS `meter_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meter_site` (
  `site_id` varchar(50) NOT NULL,
  `meter_id` varchar(50) NOT NULL,
  PRIMARY KEY (`site_id`,`meter_id`),
  KEY `meter_site_meter_idx` (`meter_id`),
  CONSTRAINT `meter_site_site` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `meter_site_meter` FOREIGN KEY (`meter_id`) REFERENCES `utility_meter` (`meter_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meter_site`
--

LOCK TABLES `meter_site` WRITE;
/*!40000 ALTER TABLE `meter_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `meter_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1401707162),('m130524_201442_init',1401707406);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `site_id` varchar(50) NOT NULL DEFAULT '',
  `site_name` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `city_town` varchar(50) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_details`
--

DROP TABLE IF EXISTS `site_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_details` (
  `site_id` varchar(50) NOT NULL DEFAULT '',
  `x3_site_id` varchar(50) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `site_accepted_for_closing` varchar(50) NOT NULL,
  `shareable` varchar(50) NOT NULL,
  `tigo_site_class` varchar(50) NOT NULL,
  `tigo_site_type` varchar(50) NOT NULL,
  `htg_site_type` varchar(50) NOT NULL,
  `number_of_dependent_tigo_sites` int(10) NOT NULL,
  PRIMARY KEY (`site_id`),
  CONSTRAINT `site_details_site` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_details`
--

LOCK TABLES `site_details` WRITE;
/*!40000 ALTER TABLE `site_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_genset`
--

DROP TABLE IF EXISTS `site_genset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_genset` (
  `site_id` varchar(50) NOT NULL DEFAULT '',
  `genset_id` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`site_id`,`genset_id`),
  KEY `site_genset_genset_idx` (`genset_id`),
  CONSTRAINT `site_genset_genset` FOREIGN KEY (`genset_id`) REFERENCES `gensets` (`genset_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `site_genset_site` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_genset`
--

LOCK TABLES `site_genset` WRITE;
/*!40000 ALTER TABLE `site_genset` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_genset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utility_meter`
--

DROP TABLE IF EXISTS `utility_meter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utility_meter` (
  `meter_id` varchar(50) NOT NULL DEFAULT '',
  `purchase_date` datetime NOT NULL,
  `meter_type` varchar(50) DEFAULT NULL,
  `utility_provider` varchar(50) DEFAULT NULL,
  `kwh_before_install` double NOT NULL,
  PRIMARY KEY (`meter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utility_meter`
--

LOCK TABLES `utility_meter` WRITE;
/*!40000 ALTER TABLE `utility_meter` DISABLE KEYS */;
/*!40000 ALTER TABLE `utility_meter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-02 11:17:16
