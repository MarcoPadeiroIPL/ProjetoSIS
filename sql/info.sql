-- MariaDB dump 10.19  Distrib 10.9.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: airbender
-- ------------------------------------------------------
-- Server version	10.9.4-MariaDB

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
-- Table structure for table `airplanes`
--

DROP TABLE IF EXISTS `airplanes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airplanes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `luggageCapacity` int(11) NOT NULL,
  `minLinha` int(11) NOT NULL,
  `minCol` char(1) NOT NULL,
  `maxLinha` int(11) NOT NULL,
  `maxCol` char(1) NOT NULL,
  `economicStart` char(1) NOT NULL,
  `economicStop` char(1) NOT NULL,
  `normalStart` char(1) NOT NULL,
  `normalStop` char(1) NOT NULL,
  `luxuryStart` char(1) NOT NULL,
  `luxuryStop` char(1) NOT NULL,
  `status` enum('Active','Not working') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airplanes`
--

LOCK TABLES `airplanes` WRITE;
/*!40000 ALTER TABLE `airplanes` DISABLE KEYS */;
INSERT INTO `airplanes` VALUES
(3,413,1,'A',9,'L','I','L','C','H','A','B','Active'),
(4,173,1,'A',7,'L','I','L','E','H','A','D','Active'),
(5,154,1,'A',9,'K','G','K','E','F','A','D','Active'),
(6,480,1,'A',8,'I','H','I','C','G','A','B','Active'),
(7,247,1,'A',6,'K','H','K','C','G','A','B','Active'),
(8,229,1,'A',6,'K','H','K','E','G','A','D','Active'),
(9,478,1,'A',6,'L','I','L','D','H','A','C','Active'),
(10,431,1,'A',9,'L','G','L','D','F','A','C','Active'),
(11,416,1,'A',7,'L','I','L','E','H','A','D','Active'),
(12,222,1,'A',6,'K','I','K','C','H','A','B','Active'),
(13,317,1,'A',6,'K','I','K','D','H','A','C','Active'),
(14,108,1,'A',7,'K','H','K','E','G','A','D','Active'),
(15,320,1,'A',6,'L','H','L','E','G','A','D','Active'),
(16,278,1,'A',6,'J','H','J','D','G','A','C','Active'),
(17,390,1,'A',7,'L','I','L','D','H','A','C','Active'),
(18,330,1,'A',9,'L','F','L','D','E','A','C','Active'),
(19,188,1,'A',9,'K','H','K','E','G','A','D','Active'),
(20,453,1,'A',7,'K','J','K','E','I','A','D','Active'),
(21,345,1,'A',6,'L','H','L','D','G','A','C','Active'),
(22,302,1,'A',6,'L','I','L','E','H','A','D','Active'),
(23,443,1,'A',7,'K','I','K','C','H','A','B','Active'),
(24,128,1,'A',7,'L','E','L','E','D','A','D','Active'),
(25,268,1,'A',6,'L','H','L','C','G','A','B','Active'),
(26,314,1,'A',7,'L','I','L','D','H','A','C','Active'),
(27,425,1,'A',8,'L','G','L','C','F','A','B','Active'),
(28,424,1,'A',9,'J','G','J','C','F','A','B','Active'),
(29,396,1,'A',8,'K','I','K','D','H','A','C','Active'),
(30,349,1,'A',6,'L','I','L','C','H','A','B','Active'),
(31,350,1,'A',6,'L','I','L','D','H','A','C','Active'),
(32,154,1,'A',8,'F','E','F','C','D','A','B','Active');
/*!40000 ALTER TABLE `airplanes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `search` int(11) NOT NULL,
  `status` enum('Operational','Not Operational') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airports`
--

LOCK TABLES `airports` WRITE;
/*!40000 ALTER TABLE `airports` DISABLE KEYS */;
INSERT INTO `airports` VALUES
(5,'Russia','RU','Novyy Karachay',84,'Operational'),
(6,'France','FR','Créteil',25,'Operational'),
(7,'Montenegro','ME','Ulcinj',7,'Not Operational'),
(8,'Albania','AL','Qelëz',95,'Operational'),
(9,'Nigeria','NG','Suya',41,'Not Operational'),
(10,'Brazil','BR','Unaí',75,'Operational'),
(11,'Indonesia','ID','Komi',43,'Operational'),
(12,'United States','US','Tampa',38,'Operational'),
(13,'China','CN','Kuishan',17,'Operational'),
(14,'Indonesia','ID','Malati',39,'Operational'),
(15,'Sweden','SE','Ytterby',36,'Operational'),
(16,'Macedonia','MK','Oslomej',11,'Operational'),
(17,'Indonesia','ID','Tambulatana',71,'Not Operational'),
(18,'Philippines','PH','Concepcion',12,'Operational'),
(19,'Russia','RU','Sukhobezvodnoye',41,'Operational'),
(20,'Slovenia','SI','Mengeš',52,'Operational'),
(21,'Russia','RU','Voznesenskaya',71,'Operational'),
(22,'Philippines','PH','Don Carlos',3,'Not Operational'),
(23,'Portugal','PT','Porto',50,'Operational'),
(24,'Gambia','GM','Bambali',74,'Operational'),
(25,'Russia','RU','Serdobsk',37,'Not Operational'),
(26,'China','CN','Yongning',55,'Operational'),
(27,'Myanmar','MM','Mogok',14,'Not Operational'),
(28,'Colombia','CO','El Tambo',6,'Operational'),
(29,'Cyprus','CY','Kato Pyrgos',91,'Not Operational'),
(30,'Syria','SY','Armanaz',50,'Not Operational');
/*!40000 ALTER TABLE `airports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES
('admin','24',1673108605),
('admin','29',1673108662),
('admin','35',1673108669),
('admin','36',1673108671),
('admin','39',1673108674),
('admin','40',1673108676),
('admin','43',1673108679),
('admin','45',1673108682),
('admin','46',1673108683),
('admin','48',1673108721),
('admin','53',1673108727),
('admin','55',1673108730),
('admin','66',1673108744),
('admin','71',1673108785),
('admin','8',1673108585),
('admin','9',1673108586),
('client','100',1673108910),
('client','101',1673108911),
('client','102',1673108912),
('client','103',1673108914),
('client','104',1673108915),
('client','105',1673108916),
('client','106',1673108918),
('client','107',1673109043),
('client','108',1673109045),
('client','109',1673109046),
('client','110',1673109048),
('client','111',1673109049),
('client','112',1673109050),
('client','113',1673109051),
('client','114',1673109053),
('client','115',1673109054),
('client','116',1673109055),
('client','117',1673109057),
('client','118',1673109058),
('client','119',1673109059),
('client','120',1673109060),
('client','121',1673109062),
('client','122',1673109063),
('client','123',1673109064),
('client','124',1673109065),
('client','125',1673109067),
('client','126',1673109068),
('client','127',1673109069),
('client','128',1673109070),
('client','129',1673109072),
('client','131',1673109244),
('client','132',1673109245),
('client','133',1673109247),
('client','134',1673109248),
('client','135',1673109249),
('client','136',1673109251),
('client','137',1673109252),
('client','138',1673109253),
('client','139',1673109255),
('client','140',1673109256),
('client','141',1673109257),
('client','142',1673109259),
('client','143',1673109260),
('client','144',1673109261),
('client','145',1673109263),
('client','146',1673109264),
('client','147',1673109265),
('client','148',1673109267),
('client','149',1673109268),
('client','89',1673108896),
('client','90',1673108897),
('client','91',1673108898),
('client','92',1673108900),
('client','93',1673108901),
('client','94',1673108902),
('client','95',1673108903),
('client','96',1673108905),
('client','97',1673108906),
('client','98',1673108907),
('client','99',1673108909),
('supervisor','11',1673108589),
('supervisor','12',1673108590),
('supervisor','18',1673108598),
('supervisor','20',1673108600),
('supervisor','21',1673108602),
('supervisor','22',1673108603),
('supervisor','24',1673108605),
('supervisor','25',1673108607),
('supervisor','29',1673108662),
('supervisor','30',1673108663),
('supervisor','34',1673108668),
('supervisor','35',1673108669),
('supervisor','36',1673108671),
('supervisor','37',1673108672),
('supervisor','38',1673108673),
('supervisor','39',1673108674),
('supervisor','40',1673108676),
('supervisor','43',1673108679),
('supervisor','44',1673108681),
('supervisor','45',1673108682),
('supervisor','46',1673108683),
('supervisor','47',1673108685),
('supervisor','48',1673108721),
('supervisor','50',1673108723),
('supervisor','52',1673108726),
('supervisor','53',1673108727),
('supervisor','54',1673108729),
('supervisor','55',1673108730),
('supervisor','56',1673108731),
('supervisor','58',1673108734),
('supervisor','59',1673108735),
('supervisor','61',1673108738),
('supervisor','62',1673108739),
('supervisor','63',1673108740),
('supervisor','64',1673108742),
('supervisor','65',1673108743),
('supervisor','66',1673108744),
('supervisor','67',1673108780),
('supervisor','68',1673108781),
('supervisor','71',1673108785),
('supervisor','73',1673108788),
('supervisor','74',1673108789),
('supervisor','76',1673108792),
('supervisor','77',1673108793),
('supervisor','78',1673108794),
('supervisor','79',1673108796),
('supervisor','8',1673108585),
('supervisor','80',1673108797),
('supervisor','82',1673108800),
('supervisor','83',1673108801),
('supervisor','85',1673108804),
('supervisor','87',1673108807),
('supervisor','9',1673108586),
('ticketOperator','10',1673108588),
('ticketOperator','11',1673108589),
('ticketOperator','12',1673108590),
('ticketOperator','13',1673108591),
('ticketOperator','14',1673108593),
('ticketOperator','15',1673108594),
('ticketOperator','16',1673108595),
('ticketOperator','17',1673108597),
('ticketOperator','18',1673108598),
('ticketOperator','19',1673108599),
('ticketOperator','20',1673108600),
('ticketOperator','21',1673108602),
('ticketOperator','22',1673108603),
('ticketOperator','23',1673108604),
('ticketOperator','24',1673108605),
('ticketOperator','25',1673108607),
('ticketOperator','26',1673108608),
('ticketOperator','27',1673108609),
('ticketOperator','28',1673108660),
('ticketOperator','29',1673108662),
('ticketOperator','30',1673108663),
('ticketOperator','31',1673108664),
('ticketOperator','32',1673108666),
('ticketOperator','33',1673108667),
('ticketOperator','34',1673108668),
('ticketOperator','35',1673108669),
('ticketOperator','36',1673108671),
('ticketOperator','37',1673108672),
('ticketOperator','38',1673108673),
('ticketOperator','39',1673108674),
('ticketOperator','40',1673108676),
('ticketOperator','41',1673108677),
('ticketOperator','42',1673108678),
('ticketOperator','43',1673108679),
('ticketOperator','44',1673108681),
('ticketOperator','45',1673108682),
('ticketOperator','46',1673108683),
('ticketOperator','47',1673108685),
('ticketOperator','48',1673108721),
('ticketOperator','49',1673108722),
('ticketOperator','50',1673108723),
('ticketOperator','51',1673108725),
('ticketOperator','52',1673108726),
('ticketOperator','53',1673108727),
('ticketOperator','54',1673108729),
('ticketOperator','55',1673108730),
('ticketOperator','56',1673108731),
('ticketOperator','57',1673108733),
('ticketOperator','58',1673108734),
('ticketOperator','59',1673108735),
('ticketOperator','60',1673108736),
('ticketOperator','61',1673108738),
('ticketOperator','62',1673108739),
('ticketOperator','63',1673108740),
('ticketOperator','64',1673108742),
('ticketOperator','65',1673108743),
('ticketOperator','66',1673108744),
('ticketOperator','67',1673108780),
('ticketOperator','68',1673108781),
('ticketOperator','69',1673108783),
('ticketOperator','70',1673108784),
('ticketOperator','71',1673108785),
('ticketOperator','72',1673108786),
('ticketOperator','73',1673108788),
('ticketOperator','74',1673108789),
('ticketOperator','75',1673108790),
('ticketOperator','76',1673108792),
('ticketOperator','77',1673108793),
('ticketOperator','78',1673108794),
('ticketOperator','79',1673108796),
('ticketOperator','8',1673108585),
('ticketOperator','80',1673108797),
('ticketOperator','81',1673108799),
('ticketOperator','82',1673108800),
('ticketOperator','83',1673108801),
('ticketOperator','84',1673108803),
('ticketOperator','85',1673108804),
('ticketOperator','86',1673108805),
('ticketOperator','87',1673108807),
('ticketOperator','88',1673108808),
('ticketOperator','9',1673108586);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES
('admin',1,NULL,NULL,NULL,1670254804,1670254804),
('client',1,NULL,NULL,NULL,1670254804,1670254804),
('createAdmin',2,'Create a Admin',NULL,NULL,1670254804,1670254804),
('createAirplane',2,'Create a Airplane',NULL,NULL,1670254804,1670254804),
('createAirport',2,'Create a Airport',NULL,NULL,1670254804,1670254804),
('createBalanceReq',2,'Create a BalanceReq',NULL,NULL,1670254804,1670254804),
('createClient',2,'Create a Client',NULL,NULL,1670254804,1670254804),
('createConfig',2,'Create a Config',NULL,NULL,1670254804,1670254804),
('createEmployee',2,'Create a Employee',NULL,NULL,1670254804,1670254804),
('createFlight',2,'Create a Flight',NULL,NULL,1670254804,1670254804),
('createRefund',2,'Create a Refund',NULL,NULL,1670254804,1670254804),
('createTariff',2,'Create a Tariff',NULL,NULL,1670254804,1670254804),
('createTicket',2,'Create a Ticket',NULL,NULL,1670254804,1670254804),
('deleteAdmin',2,'Delete a Admin',NULL,NULL,1670254804,1670254804),
('deleteAirplane',2,'Delete a Airplane',NULL,NULL,1670254804,1670254804),
('deleteAirport',2,'Delete a Airport',NULL,NULL,1670254804,1670254804),
('deleteBalanceReq',2,'Delete a BalanceReq',NULL,NULL,1670254804,1670254804),
('deleteClient',2,'Delete a Client',NULL,NULL,1670254804,1670254804),
('deleteConfig',2,'Delete a Config',NULL,NULL,1670254804,1670254804),
('deleteEmployee',2,'Delete a Employee',NULL,NULL,1670254804,1670254804),
('deleteFlight',2,'Delete a Flight',NULL,NULL,1670254804,1670254804),
('deleteRefund',2,'Delete a Refund',NULL,NULL,1670254804,1670254804),
('deleteTariff',2,'Delete a Tariff',NULL,NULL,1670254804,1670254804),
('deleteTicket',2,'Delete a Ticket',NULL,NULL,1670254804,1670254804),
('listAdmin',2,'List a Admin',NULL,NULL,1670254804,1670254804),
('listAirplane',2,'List a Airplane',NULL,NULL,1670254804,1670254804),
('listAirport',2,'List a Airport',NULL,NULL,1670254804,1670254804),
('listBalanceReq',2,'List a BalanceReq',NULL,NULL,1670254804,1670254804),
('listClient',2,'List a Client',NULL,NULL,1670254804,1670254804),
('listConfig',2,'List a Config',NULL,NULL,1670254804,1670254804),
('listEmployee',2,'List a Employee',NULL,NULL,1670254804,1670254804),
('listFlight',2,'List a Flight',NULL,NULL,1670254804,1670254804),
('listRefund',2,'List a Refund',NULL,NULL,1670254804,1670254804),
('listTariff',2,'List a Tariff',NULL,NULL,1670254804,1670254804),
('listTicket',2,'List a Ticket',NULL,NULL,1670254804,1670254804),
('readAdmin',2,'Read a Admin',NULL,NULL,1670254804,1670254804),
('readAirplane',2,'Read a Airplane',NULL,NULL,1670254804,1670254804),
('readAirport',2,'Read a Airport',NULL,NULL,1670254804,1670254804),
('readBalanceReq',2,'Read a BalanceReq',NULL,NULL,1670254804,1670254804),
('readClient',2,'Read a Client',NULL,NULL,1670254804,1670254804),
('readConfig',2,'Read a Config',NULL,NULL,1670254804,1670254804),
('readEmployee',2,'Read a Employee',NULL,NULL,1670254804,1670254804),
('readFlight',2,'Read a Flight',NULL,NULL,1670254804,1670254804),
('readRefund',2,'Read a Refund',NULL,NULL,1670254804,1670254804),
('readTariff',2,'Read a Tariff',NULL,NULL,1670254804,1670254804),
('readTicket',2,'Read a Ticket',NULL,NULL,1670254804,1670254804),
('supervisor',1,NULL,NULL,NULL,1670254804,1670254804),
('ticketOperator',1,NULL,NULL,NULL,1670254804,1670254804),
('updateAdmin',2,'Update a Admin',NULL,NULL,1670254804,1670254804),
('updateAirplane',2,'Update a Airplane',NULL,NULL,1670254804,1670254804),
('updateAirport',2,'Update a Airport',NULL,NULL,1670254804,1670254804),
('updateBalanceReq',2,'Update a BalanceReq',NULL,NULL,1670254804,1670254804),
('updateClient',2,'Update a Client',NULL,NULL,1670254804,1670254804),
('updateConfig',2,'Update a Config',NULL,NULL,1670254804,1670254804),
('updateEmployee',2,'Update a Employee',NULL,NULL,1670254804,1670254804),
('updateFlight',2,'Update a Flight',NULL,NULL,1670254804,1670254804),
('updateRefund',2,'Update a Refund',NULL,NULL,1670254804,1670254804),
('updateTariff',2,'Update a Tariff',NULL,NULL,1670254804,1670254804),
('updateTicket',2,'Update a Ticket',NULL,NULL,1670254804,1670254804);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES
('admin','createAdmin'),
('admin','createAirplane'),
('admin','createAirport'),
('admin','createEmployee'),
('admin','createFlight'),
('admin','deleteAdmin'),
('admin','deleteAirplane'),
('admin','deleteAirport'),
('admin','deleteEmployee'),
('admin','deleteFlight'),
('admin','listAdmin'),
('admin','listEmployee'),
('admin','readAdmin'),
('admin','supervisor'),
('admin','updateAdmin'),
('admin','updateAirplane'),
('admin','updateAirport'),
('admin','updateEmployee'),
('admin','updateFlight'),
('client','createBalanceReq'),
('client','createClient'),
('client','createRefund'),
('client','createTicket'),
('client','deleteBalanceReq'),
('client','deleteRefund'),
('client','listAirport'),
('client','listBalanceReq'),
('client','listConfig'),
('client','listFlight'),
('client','listRefund'),
('client','listTicket'),
('client','readAirport'),
('client','readBalanceReq'),
('client','readClient'),
('client','readConfig'),
('client','readFlight'),
('client','readRefund'),
('client','readTariff'),
('client','readTicket'),
('client','updateClient'),
('supervisor','createConfig'),
('supervisor','createTariff'),
('supervisor','deleteBalanceReq'),
('supervisor','deleteClient'),
('supervisor','deleteConfig'),
('supervisor','deleteTariff'),
('supervisor','listBalanceReq'),
('supervisor','listRefund'),
('supervisor','readBalanceReq'),
('supervisor','readRefund'),
('supervisor','ticketOperator'),
('supervisor','updateBalanceReq'),
('supervisor','updateClient'),
('supervisor','updateConfig'),
('supervisor','updateRefund'),
('supervisor','updateTariff'),
('ticketOperator','listAirplane'),
('ticketOperator','listAirport'),
('ticketOperator','listClient'),
('ticketOperator','listConfig'),
('ticketOperator','listFlight'),
('ticketOperator','listTariff'),
('ticketOperator','listTicket'),
('ticketOperator','readAirplane'),
('ticketOperator','readAirport'),
('ticketOperator','readClient'),
('ticketOperator','readConfig'),
('ticketOperator','readEmployee'),
('ticketOperator','readFlight'),
('ticketOperator','readTariff'),
('ticketOperator','readTicket'),
('ticketOperator','updateTicket');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balanceReq`
--

DROP TABLE IF EXISTS `balanceReq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balanceReq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double(10,2) NOT NULL,
  `status` enum('Accepted','Declined','Ongoing','Canceled') NOT NULL DEFAULT 'Ongoing',
  `requestDate` datetime NOT NULL,
  `decisionDate` datetime DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client_id` (`client_id`),
  CONSTRAINT `fk_client_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balanceReq`
--

LOCK TABLES `balanceReq` WRITE;
/*!40000 ALTER TABLE `balanceReq` DISABLE KEYS */;
/*!40000 ALTER TABLE `balanceReq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balanceReq_employee`
--

DROP TABLE IF EXISTS `balanceReq_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balanceReq_employee` (
  `balanceReq_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`balanceReq_id`),
  KEY `fk_employeeBalanceReq_id` (`employee_id`),
  CONSTRAINT `fk_balanceReq_id` FOREIGN KEY (`balanceReq_id`) REFERENCES `balanceReq` (`id`),
  CONSTRAINT `fk_employeeBalanceReq_id` FOREIGN KEY (`employee_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balanceReq_employee`
--

LOCK TABLES `balanceReq_employee` WRITE;
/*!40000 ALTER TABLE `balanceReq_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `balanceReq_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `user_id` int(11) NOT NULL,
  `balance` double(10,2) NOT NULL,
  `application` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_usersClients_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES
(89,990.00,1),
(90,42.00,1),
(91,970.00,0),
(92,481.00,1),
(93,415.00,1),
(94,826.00,0),
(95,943.00,0),
(96,366.00,1),
(97,317.00,0),
(98,781.00,1),
(99,88.00,1),
(100,594.00,0),
(101,431.00,1),
(102,2.00,0),
(103,459.00,0),
(104,58.00,0),
(105,598.00,0),
(106,472.00,1),
(107,944.00,1),
(108,31.00,1),
(109,333.00,1),
(110,911.00,1),
(111,877.00,0),
(112,435.00,1),
(113,903.00,1),
(114,935.00,0),
(115,569.00,0),
(116,471.00,0),
(117,319.00,1),
(118,291.00,0),
(119,571.00,1),
(120,553.00,0),
(121,303.00,1),
(122,76.00,1),
(123,10.00,0),
(124,274.00,0),
(125,219.00,0),
(126,493.00,1),
(127,958.00,1),
(128,203.00,1),
(129,961.00,1),
(131,499.00,0),
(132,713.00,0),
(133,565.00,1),
(134,736.00,0),
(135,736.00,1),
(136,362.00,0),
(137,297.00,1),
(138,631.00,1),
(139,935.00,1),
(140,201.00,0),
(141,937.00,1),
(142,15.00,0),
(143,966.00,0),
(144,635.00,1),
(145,92.00,0),
(146,828.00,0),
(147,815.00,0),
(148,794.00,0),
(149,102.00,0);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `weight` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` VALUES
(1,'20KG travel bag.',20,39.99,1),
(2,'10KG travel bag.',10,24.99,1);
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `user_id` int(11) NOT NULL,
  `salary` double(10,2) NOT NULL,
  `airport_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_airport_id` (`airport_id`),
  CONSTRAINT `fk_airport_id` FOREIGN KEY (`airport_id`) REFERENCES `airports` (`id`),
  CONSTRAINT `fk_usersEmployees_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES
(8,2483.00,5),
(9,1787.00,21),
(10,2190.00,8),
(11,2367.00,25),
(12,2168.00,17),
(13,1707.00,9),
(14,2287.00,7),
(15,1319.00,6),
(16,1823.00,15),
(18,1026.00,21),
(19,1341.00,10),
(20,1910.00,21),
(21,2240.00,10),
(22,1842.00,21),
(23,1848.00,24),
(24,1606.00,13),
(25,1743.00,12),
(26,993.00,18),
(27,1615.00,10),
(28,1756.00,14),
(29,2238.00,13),
(30,1144.00,25),
(31,2146.00,14),
(32,987.00,25),
(33,2311.00,23),
(34,2359.00,5),
(35,1964.00,16),
(36,2463.00,22),
(37,2228.00,9),
(38,2468.00,8),
(39,1902.00,19),
(40,2318.00,14),
(41,1841.00,7),
(42,1038.00,17),
(43,1503.00,17),
(44,1737.00,25),
(45,916.00,6),
(46,1331.00,14),
(47,2021.00,12),
(48,1488.00,10),
(49,2313.00,14),
(50,1436.00,24),
(51,1996.00,14),
(52,1746.00,20),
(53,2293.00,12),
(54,1543.00,12),
(55,1380.00,19),
(56,2256.00,23),
(57,1763.00,10),
(58,1355.00,16),
(59,2069.00,5),
(60,1323.00,22),
(61,1653.00,22),
(62,1799.00,17),
(63,1573.00,25),
(64,1904.00,19),
(65,2134.00,9),
(66,1278.00,22),
(67,1378.00,13),
(68,1770.00,21),
(69,2194.00,21),
(70,873.00,14),
(71,1675.00,16),
(72,1256.00,5),
(73,2423.00,23),
(74,1455.00,24),
(75,2046.00,11),
(76,826.00,24),
(77,2386.00,24),
(78,1425.00,23),
(79,836.00,8),
(80,1420.00,25),
(81,1043.00,11),
(82,2242.00,16),
(83,2225.00,21),
(84,1575.00,11),
(85,2251.00,28),
(86,2204.00,15),
(87,2030.00,5),
(88,2135.00,12);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departureDate` datetime NOT NULL,
  `duration` time NOT NULL,
  `airplane_id` int(11) NOT NULL,
  `airportDeparture_id` int(11) NOT NULL,
  `airportArrival_id` int(11) NOT NULL,
  `status` enum('Available','Unavailable','Complete','Canceled') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_airplane_id` (`airplane_id`),
  KEY `fk_airportDeparture_id` (`airportDeparture_id`),
  KEY `fk_airportArrival_id` (`airportArrival_id`),
  CONSTRAINT `fk_airplane_id` FOREIGN KEY (`airplane_id`) REFERENCES `airplanes` (`id`),
  CONSTRAINT `fk_airportArrival_id` FOREIGN KEY (`airportArrival_id`) REFERENCES `airports` (`id`),
  CONSTRAINT `fk_airportDeparture_id` FOREIGN KEY (`airportDeparture_id`) REFERENCES `airports` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flights`
--

LOCK TABLES `flights` WRITE;
/*!40000 ALTER TABLE `flights` DISABLE KEYS */;
/*!40000 ALTER TABLE `flights` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES
('m000000_000000_base',1666799296),
('m130524_201442_init',1666799298),
('m140506_102106_rbac_init',1670254797),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1670254797),
('m180523_151638_rbac_updates_indexes_without_prefix',1670254797),
('m190124_110200_add_verification_token_column_to_user_table',1666799298),
('m200409_110543_rbac_update_mssql_trigger',1670254797);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseDate` datetime NOT NULL,
  `total` double(10,2) NOT NULL,
  `status` enum('Complete','Pending','Refunded') DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clientTicket_id` (`client_id`),
  CONSTRAINT `fk_clientReceipt_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts`
--

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund`
--

DROP TABLE IF EXISTS `refund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('Accepted','Declined','Ongoing','Canceled') NOT NULL DEFAULT 'Ongoing',
  `requestDate` datetime NOT NULL,
  `decisionDate` datetime DEFAULT NULL,
  `receipt_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_receiptRefund_id` (`receipt_id`),
  CONSTRAINT `fk_receiptRefund_id` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund`
--

LOCK TABLES `refund` WRITE;
/*!40000 ALTER TABLE `refund` DISABLE KEYS */;
/*!40000 ALTER TABLE `refund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund_employee`
--

DROP TABLE IF EXISTS `refund_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refund_employee` (
  `refund_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`refund_id`),
  KEY `fk_refundEmployee_id` (`employee_id`),
  CONSTRAINT `fk_refundEmployee_id` FOREIGN KEY (`employee_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_refund_id` FOREIGN KEY (`refund_id`) REFERENCES `refund` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund_employee`
--

LOCK TABLES `refund_employee` WRITE;
/*!40000 ALTER TABLE `refund_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `refund_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tariffs`
--

DROP TABLE IF EXISTS `tariffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tariffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime NOT NULL,
  `economicPrice` double(10,2) NOT NULL,
  `normalPrice` double(10,2) NOT NULL,
  `luxuryPrice` double(10,2) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_flightTariff_id` (`flight_id`),
  CONSTRAINT `fk_flightTariff_id` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariffs`
--

LOCK TABLES `tariffs` WRITE;
/*!40000 ALTER TABLE `tariffs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tariffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `age` int(11) NOT NULL,
  `checkedIn` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `seatLinha` char(1) NOT NULL,
  `seatCol` int(11) NOT NULL,
  `luggage_1` int(11) DEFAULT NULL,
  `luggage_2` int(11) DEFAULT NULL,
  `receipt_id` int(11) NOT NULL,
  `tariff_id` int(11) NOT NULL,
  `tariffType` enum('economic','normal','luxury') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employeeTicket_id` (`checkedIn`),
  KEY `fk_clientTicket_id` (`client_id`),
  KEY `fk_flight_id` (`flight_id`),
  KEY `fk_luggage_1` (`luggage_1`),
  KEY `fk_luggage_2` (`luggage_2`),
  KEY `fk_receipt_id` (`receipt_id`),
  KEY `fk_tariff_id` (`tariff_id`),
  CONSTRAINT `fk_clientTicket_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`user_id`),
  CONSTRAINT `fk_employeeTicket_id` FOREIGN KEY (`checkedIn`) REFERENCES `employees` (`user_id`),
  CONSTRAINT `fk_flight_id` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`),
  CONSTRAINT `fk_luggage_1` FOREIGN KEY (`luggage_1`) REFERENCES `configs` (`id`),
  CONSTRAINT `fk_luggage_2` FOREIGN KEY (`luggage_2`) REFERENCES `configs` (`id`),
  CONSTRAINT `fk_receipt_id` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`),
  CONSTRAINT `fk_tariff_id` FOREIGN KEY (`tariff_id`) REFERENCES `tariffs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
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
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(8,'diogo','GSrjaLOei_FhJMCBWf5YrXub3AlkB4Md','$2y$13$Op0zfC65Q/brTy0EZe6wteanowF4yK/QSmjuX.pIPDietSM/ZRGm6',NULL,'diogo@gmail.com',10,1673108585,1673108585,'XCTalBC1Yvq1zBFxxMe9a7sZGw1qYpnI_1673108585'),
(9,'quintina','4GgKcmoOp2VZoMY-F3oehk_cJu3MFHtE','$2y$13$F02jo6JVN1uQrQu/WDTTpuGfqkp5/kvGYed8w07oXGn92ZoGssdrC',NULL,'quintina@gmail.com',10,1673108586,1673108586,'L7PW-GkTtyH_f3lA7S4CjrUQ70c2dShe_1673108586'),
(10,'pieter','zHTTYKUiUk_8TeL5127xSzEHlzOCvh5t','$2y$13$ivTANB8ixOfE35CMjnr9n.d5S/ymaKNwTvPiURmqOVkiemHqMYxpm',NULL,'pieter@gmail.com',10,1673108588,1673108588,'GukxK9OH02pAB55tdALGSNRNQCBhtQZC_1673108588'),
(11,'calypso','QcssatSmqkqw4yLTb522pLz9WHjG4fPu','$2y$13$PGtB5r7BSI76lRoP1RsVn.T42QIBkXcs.Uk.naD5owbcd0E3hidf2',NULL,'calypso@gmail.com',10,1673108589,1673108589,'eZw8CL_ruVggPPx48qIBexxhacVxVOFu_1673108589'),
(12,'dougie','S2-u70Nz59lolldESHkhMvk9uDWU0XvL','$2y$13$XOrdsiFY.lCyOJyu/tHU7e6A0C7UmeKrSzKZ22EdqJozPEUFGUmNm',NULL,'dougie@gmail.com',10,1673108590,1673108590,'Rm0d4u3X9uqDcs_AoBPjtaW_CMYuFX1k_1673108590'),
(13,'natka','uMmXP4TTKBkSC3Vsj9XoN2t-_hxRm0Uy','$2y$13$Bswj0X3mo1WyuESWDiaKceWAnravvSIc205JqPgr4cRlUa5EZ1YYC',NULL,'natka@gmail.com',10,1673108591,1673108591,'5S4G1lGKlYi9GbpJ_jGFoWUU3DkZjooU_1673108591'),
(14,'titus','Syy4EdIAOb2z5PA2YJTRgrGfNO45bncu','$2y$13$Uh68e/Hol9smpAS0pucMNep5ikIDhGOymdMFtDZ9QcFxZdYCL9Uuq',NULL,'titus@gmail.com',10,1673108593,1673108593,'Em6tja-hZBtyCJJ_XNRTnDKzn7xcSnlz_1673108593'),
(15,'chaim','6rgGFXPkNHidVi9_8v8nvQNKj_sUXlLG','$2y$13$EUfthoda1yR1RNThoHj3D.KXB1soy0j3xUcje4oAPdsXaNB8a9WEC',NULL,'chaim@gmail.com',10,1673108594,1673108594,'XHO0jfTawx2Hdu7JLUEu8RL5jgGJVSN8_1673108594'),
(16,'merill','LtslFaXuqP0CQhS25TxLIejhS31tRWD4','$2y$13$PVo/vLEfuUbkMseKyCCXD.UNon5wj3yfq9yciegIJk/4nHbl71rMi',NULL,'merill@gmail.com',10,1673108595,1673108595,'8aQ2NQD2eKdNdu5L0a9iqMNy77unm3nY_1673108595'),
(17,'tuckie','1pnjH2iza3oWwux6T5CUQwr4ejexVcSZ','$2y$13$ZAcaSfsGaGHp831Xii7vR.HvLquzXvq4NalRBrZvI31YFcYAbjNj6',NULL,'tuckie@gmail.com',10,1673108597,1673108597,'HTT660KD-UTTEMW6gT7QY24gbxBfxY8K_1673108597'),
(18,'aldric','5xQMOxBKmOBRMuG6tnfemo80k_IE9WEm','$2y$13$.IfmmrEVgaeOVB0fhry7pexi/YMDbiFLQKLmFsXRTAmRsky30n0Pe',NULL,'aldric@gmail.com',10,1673108598,1673108598,'2VPTDZlBHSWjun1h_l7GWxl41uyI4KIG_1673108598'),
(19,'ignazio','AUtRZDaWeYYsgr6pafWceQVg1pbq9sFH','$2y$13$0wO.Vj0MyWzbF8Ht/peFF.b8/BP2zY1qPiQlHcXjAWGw48DVDiluO',NULL,'ignazio@gmail.com',10,1673108599,1673108599,'zo4l8Pwzp0f1vFtNRU-nu-SgjsFoSKGY_1673108599'),
(20,'valerye','5Y_IVXCNOuT7s7cIf_WVcoL2Xfdjqxnl','$2y$13$YwtOVVSpaHBJ2hVWW3sNquV8Qi3/x2IcCmOob1CLZrQnKDo05CMI6',NULL,'valerye@gmail.com',10,1673108600,1673108600,'djcFT-PcjkncKw7J9A7bP6WNjveC99Xc_1673108600'),
(21,'imogen','odzWAq42vKGcblaWT1v_d30NVbgAIm4O','$2y$13$G3cOSNZH8GTfLoHQQzqJye/Kk.VcchNZngK8fxLsECU3/vPaY.QQu',NULL,'imogen@gmail.com',10,1673108602,1673108602,'hyFJCNc8GFZ25ktHNqVZCXLItLq0doqB_1673108602'),
(22,'ellyn','q0xoxicCzz4LOFkBrHnC67X3T2IzqIJZ','$2y$13$UuhmXvH47i8Fr6cv607qYex6OYCVDu0W7yeM.Fazf8cT9vjVLtF9G',NULL,'ellyn@gmail.com',10,1673108603,1673108603,'uIM8nmX0DLouhAqgpPSlBPnw4EzE12tU_1673108603'),
(23,'thorsten','X0f76ta6ol3Zyn9pxljZrpWPkdkliUlN','$2y$13$tctyEQbCEhuLGve97o2aXeNmxqfSwfby7PHF7kpxfvU0Ccg3XVXWC',NULL,'thorsten@gmail.com',10,1673108604,1673108604,'NYEvM5w-AOgCgyRJO_rWVnO6uSgWY60j_1673108604'),
(24,'town','63B302R4NhgUkp6lY5-Orw1vAE70smO1','$2y$13$/4wwE0YTJ8yiHnyOPj985.8.6xHwlWPz7GiXTjUiz0dNMliD5N02u',NULL,'town@gmail.com',10,1673108605,1673108605,'OD3mL0z00tn9BERASU-AAvJNbvm9fSaK_1673108605'),
(25,'kirk','NGHdlp3n2leYFBXlAYleYUsFikfrJ0Z3','$2y$13$VW9g0lMLoM1jGGu2j/o/OehcXihOxoMgPRfZKaZ9I0nZ6Yu51lg1G',NULL,'kirk@gmail.com',10,1673108607,1673108607,'FXhBV7aYaLBhqLR8SBHEYW0Ccm7DKez3_1673108607'),
(26,'schuyler','qBWYV4oIO_JxtRuGRmKLKuZuwkdqSQz5','$2y$13$MlGl2wdw2jMWCnG7Btf1gOWXVfxplZXiiqxMA6OxkKlPpBjmjmgpy',NULL,'schuyler@gmail.com',10,1673108608,1673108608,'m9N5O3QNhKKFyb6LPX7a6wTu7zPnSpeL_1673108608'),
(27,'andreana','g9kJvRWJH4BBDilHGrBODYGoOUzOYVVY','$2y$13$QovBCfHYS5GCFWMz46J/3ePI8H9K5WxMgny0Er7vWXj74kO2XTJeu',NULL,'andreana@gmail.com',10,1673108609,1673108609,'Ti30RZH2W3FIoFQynaROSBqNRAw7hx3r_1673108609'),
(28,'baily','jdapAV_P2RKHohsBSK50SzpLMWgX2gA-','$2y$13$wX/8SQteRx2NFlYbBFR6buQVSG4xXWF3ew3j8/W2ZBhRjU4kfJFiC',NULL,'baily@gmail.com',10,1673108660,1673108660,'biV-jeiHOJUWiQtSKGshzNUgNMg9cYD7_1673108660'),
(29,'wilow','_rJHD2CGw1FU21KEjTckF3WMNjvI9XWX','$2y$13$BAkQ7UtOdur8V75yi9CK0eyrWSWrgy3IszbR1Hu37yM6HjVnNdhjm',NULL,'wilow@gmail.com',10,1673108662,1673108662,'lbda4YntUBUjc8LNdSy2soUI5M1kl60C_1673108662'),
(30,'kenn','NY1L9iKyWyNhSmDxQl7O7VwYVoOmTGcb','$2y$13$GUm9qFZXt2iOx3G43HPMWOTAFkobLDWBHJW2nQK4b6ayeC0FQxiW.',NULL,'kenn@gmail.com',10,1673108663,1673108663,'IxoCe_SKaPzxx_NLyzTBwlsiReioOMz9_1673108663'),
(31,'kev','QlxJzaoU5uEb9ubGAPbIWEDrCQiCFJpk','$2y$13$.GOLZfNd2wRxKGT94mwojuoltZutjxq.Lmlak3sbmDZmBQL.xOVS2',NULL,'kev@gmail.com',10,1673108664,1673108664,'TERHJhrV7-Nrljyev31FU61I7ke7vRTx_1673108664'),
(32,'rozella','beNnq7tKWPWVuYxez0tkaTrqiv34UxNE','$2y$13$Y1PpF9gL36pDq4VVWLeSYO5r671wmtV83s8mmd4eHEVNTw4NNgRdC',NULL,'rozella@gmail.com',10,1673108666,1673108666,'2yVwfZ-iGjul2aYscf0akevdH1HHL2_U_1673108666'),
(33,'mildred','BkOmpT0VCQPNd0VLS7MmgeCQYzzPNKYF','$2y$13$BPb1Y5/LOOeHq6pKqbHsMeX4RgBGsmuoyi8A7rFOFxQ4ooCUn11By',NULL,'mildred@gmail.com',10,1673108667,1673108667,'F5Z8Cq26GPRsFl1j9nhadlrqYCT4ezHk_1673108667'),
(34,'bonny','btOvVj0oMkd_46RwbOTbVFdMmJK7Jd4I','$2y$13$pCHUjaH08vHyiJeZaOhgy.b.rI3RQfqlAr0N.KAzYftqDfPjgfxDq',NULL,'bonny@gmail.com',10,1673108668,1673108668,'_wTQrDYKvW7YJt_j4_-Ei_JWg3YXCh_e_1673108668'),
(35,'melony','uobyOrtZ2wM3jeN0QQk7sgmY0xW5x4KV','$2y$13$1XsY3/fWCZFgbotPMwTCgeKRrvfdmPWubX.A3.Rcr/fmRKizhCn2S',NULL,'melony@gmail.com',10,1673108669,1673108669,'xJXZIRE5GTXNQyM1YYB3QITuZ5K-eW3n_1673108669'),
(36,'aprilette','ZxcCOFzaKXMb8TG9mqt1SUCE3rYCwSZf','$2y$13$J7gjuomrk9u0kgCNH2AIEesIENNArGcObevBdp9TDXsqZGYMnPWVu',NULL,'aprilette@gmail.com',10,1673108671,1673108671,'4C_nzdQLtuiXMpdaca4AWfejYw-E2yWv_1673108671'),
(37,'elinore','vcRLFdAJaGM5YFytAmmsFWGGTCehPVHU','$2y$13$Dwei6r4E9OuhKSYcr6ncJ.XPyKUS4WLwJLM5QqWKGyA0u1rxnhtR.',NULL,'elinore@gmail.com',10,1673108672,1673108672,'1VN2qZRQC1t9X73iv2w8kD8ZhUI_looY_1673108672'),
(38,'dulciana','lpVBnTChIi02vgiYKcAdu8_F2O8Ehc0W','$2y$13$xqrjy8gKcEna1Cq3OBRKuO/thtoM2TdjgUh4KvbdX./HNezPFWmUG',NULL,'dulciana@gmail.com',10,1673108673,1673108673,'EWuskeXk3kZHomBHxT2naNowbzOrjACo_1673108673'),
(39,'donia','fTNrlHy1uEna8MM7DX0OeU0WrwjrRICl','$2y$13$Rt8wvwDeUTSZgWbER.RRzOsGYp2UywX05Va4nFNMoInlnvRS.P2c.',NULL,'donia@gmail.com',10,1673108674,1673108674,'RWRas55goYCCzd19H2K2HTOY5PxMQTtG_1673108674'),
(40,'abraham','XV7OJSYgvZYaor4vW3pSkCPJ3uf0KII3','$2y$13$CRK57VZ8sHaBpyYbsjuRJ.v5vTXUtdGSTUZXEa.a2ucE06FLmzcLW',NULL,'abraham@gmail.com',10,1673108676,1673108676,'qbtV_S48FAXQf1JDeud27dusHmf_fW55_1673108676'),
(41,'gerty','1kk0MFcC6AzryMTksV9Is5IByt_cSPL-','$2y$13$hZHIUdiNC9q7x5kwGaYCSuxc5JwwAv0iEw6F9wlmkBYbnqnINjtlC',NULL,'gerty@gmail.com',10,1673108677,1673108677,'OskxP_x-QAXns-Qm7JgJGUpXX3ZRVB_8_1673108677'),
(42,'barbi','rp7kSPOpsG0zvcDU7zTVL4iEXgiZ4jUy','$2y$13$r3HssmlsKQX8lVWc6fzvre84PqqmUVka/QX42BfYK3t2.2PK3FrK2',NULL,'barbi@gmail.com',10,1673108678,1673108678,'hNSbAb_7TQ8U1AQ8OZc2Ehpcs2DnCrFu_1673108678'),
(43,'hall','IdQzz8Zoz_pEHpmRt3bEeMkSpGxYxmGU','$2y$13$kQy5ttjzaP05f9hhstSY9.dEsWkK7X6kyDvev1VG6yBRfJGjnb9WS',NULL,'hall@gmail.com',10,1673108679,1673108679,'GRm_9RvuNwdf62uzfYdW8UPylqvMnxFG_1673108679'),
(44,'tiler','xD_w1QBliGiOqmK-XAZghsLvIKXdMbpO','$2y$13$63rGj6T2XTiqnwPANSkhaeRwP9op.o9qFjoAvdg2/8Ir.c/SeTZBm',NULL,'tiler@gmail.com',10,1673108681,1673108681,'JEcWkUxyzgU_i-4efJhzeLJnscD5oomz_1673108681'),
(45,'rod','dur4Y9jYge9lUVheFEO-t19u8ihPe3X-','$2y$13$gTd9cvWfo6HOucDCBgL0EO4PlwvKAbu1HlhALY.ZAy8HoSh4k90ii',NULL,'rod@gmail.com',10,1673108682,1673108682,'oR9s924vThLeFOyjSGLKHaXICPtXNve6_1673108682'),
(46,'brunhilda','R1m59pUDAhQZjs8gM_6Qw0ndUxcwDzeu','$2y$13$eiWiDSRdYX5PDlH4bKJEgeCUbtmT7RnO3j38olDaHUyEmXrJ0WNiW',NULL,'brunhilda@gmail.com',10,1673108683,1673108683,'Xw9cNPTyZlwHqlFRtf5m6UCbs6INeweh_1673108683'),
(47,'sandy','LMMAQBHWkViIPahLsbdHMI6Sb5hFEzHL','$2y$13$IppaxzqZgNWzWsdR5uza2.swJkLr/lig6FUlRBubcEUgCWRxDaOgK',NULL,'sandy@gmail.com',10,1673108685,1673108685,'l_68W_Q3WwqwLT23SMaI0mNg2IVGDYrz_1673108685'),
(48,'hyacintha','d_VpwudyGn8taXQttQ0auqGyAvI89Kk9','$2y$13$cr7O3fFNt33g9CqiqN0jReCnxeASTzzya5EUsjZwRrlIxk7Kyjd9G',NULL,'hyacintha@gmail.com',10,1673108721,1673108721,'5wtw4Ai_Qs-YB6TAt4lJHxOAfx1pU5Ko_1673108721'),
(49,'kristine','qJILD8xdNGR512fwwCta4VV-CR9N4Yax','$2y$13$qNBJD25ldZyRFgDb1UngYOQVq3yHaz0EwAts23/ZoyfvRGoUSbMUu',NULL,'kristine@gmail.com',10,1673108722,1673108722,'JgEhfurzq7FOiabqcCsZ7wKvWuu79s1t_1673108722'),
(50,'innis','x26J-3gaVGleEZfH5VvQrXvvH4gRqdGK','$2y$13$vyiBryVPIh1OABLjtC0R..3Sc7omoRgxRiLeNZgq39BUGiXFqSZWK',NULL,'innis@gmail.com',10,1673108723,1673108723,'SFpoaqihUG9TRnrZClumRc1VDeSDcMPU_1673108723'),
(51,'delmer','F52NuoZsGwXmh1WYYrpxpWmDUkSeoC-x','$2y$13$ZoHnhG6m8eQQY8Jw2xzFmusmxNwTjN20OG8r9ok9aERwukxAnLz6O',NULL,'delmer@gmail.com',10,1673108725,1673108725,'2x3TowS0nfQ4pXxmUC0zGeMznk2ePRt7_1673108725'),
(52,'marlane','-E2sBGuxOFMmC6mLrhYWbF5d154YsOI0','$2y$13$VHI6sOO7bZQ9K8Ub9mQVUORdUUAwFSjNMyElhCfaN7.T9FWFCYM46',NULL,'marlane@gmail.com',10,1673108726,1673108726,'Do9ahpi2gXQldbpH46cnaymdKIEe6gMz_1673108726'),
(53,'opaline','6vYpAV2fBCAXoECIShqdhWWAoi_-phqc','$2y$13$WnXnfhtofeOndwgisBOFsu7DIit7/DI7v55ynvKMzYP24Ls7ffVx6',NULL,'opaline@gmail.com',10,1673108727,1673108727,'S-nFYnzHXk7XayLtjVE-J_hnZiv-zHOv_1673108727'),
(54,'tobiah','88llP06HgwXA9F1rirxPdAf6wSUAe_mW','$2y$13$zCKwVJ1rkR1jBjxdt1Tf7O3KQ4k02etbGczVKB07Lhe82OQFAlRu.',NULL,'tobiah@gmail.com',10,1673108729,1673108729,'g7ZUqP8Gp27uK0fP18le6AmyNRSokZSX_1673108729'),
(55,'graeme','T6INgrdBSxP21ReAho1atA9ekLRW-YQ4','$2y$13$Q0ahhnmTX2PNHGhQzsFDr.JqoUR8zvXF5N5EH5Lv4UMeUobF5NVja',NULL,'graeme@gmail.com',10,1673108730,1673108730,'U36YBYZogVZIvRB2xR87YFyyikoxBef__1673108730'),
(56,'shanon','8LjpPAJIfr22Xxv47HCJ30fhp8W8lx9-','$2y$13$na2AKTy5fMNxK4GE3vWAXOWS.tRxJQzrKLTiHNY0VNErd1vkAOFWq',NULL,'shanon@gmail.com',10,1673108731,1673108731,'ktapaqcFZK5WzN0k2ApmCksxWi18FkMh_1673108731'),
(57,'ermanno','yIXKbv06rCT-7A2_tD5olzVApuBX5lu5','$2y$13$/L4n6t04ABi9BRC7eliwXOkj6J0uNNBzH20NzLrmkZR8WVowLJjUm',NULL,'ermanno@gmail.com',10,1673108733,1673108733,'w4IFTKInsOaRoIJx_L7t62qml7B5B7ZQ_1673108733'),
(58,'philippe','qJFDTyBP-oO6y-kFAlaJ5BKJJ5CoWejV','$2y$13$bRdpSISNksDweVbLMBpAZeyc9yUn6.klOoDvBf8H.YGxTYc.cl0b.',NULL,'philippe@gmail.com',10,1673108734,1673108734,'8UJG7xwKFVCIFvK_cGeQI8UyudUz__QR_1673108734'),
(59,'addie','Eu1rX42Pur-L8JEx_48DhTPhCDPMixl-','$2y$13$TMBuDkgJeOTsTYE.N8sKFuZmXwaWzWpizraDKXQkdVrECbbXYcqIC',NULL,'addie@gmail.com',10,1673108735,1673108735,'mlsgBEkJSVgCcmDivmM4GWgLHqHfFI5c_1673108735'),
(60,'carole','tgR6r7dZU9_PGW11pHtQ0FxPZBf1FjJX','$2y$13$GP4glj79B5U0C.gRjxV4cOuPnnflORAWWc/klQm3tBVzk3paxqisi',NULL,'carole@gmail.com',10,1673108736,1673108736,'oEBf1LXD1hfTfg8DL5vV2XpgEUrWpDp5_1673108736'),
(61,'lenard','tGLTKSqCAw_b0sYMwYzesdZ6Fv-8FBfC','$2y$13$LMUkLd7jBaqIHgHSf4alse0HokEuuPcWI4Hvk4U4g9rtaY/j90uuC',NULL,'lenard@gmail.com',10,1673108738,1673108738,'US36CEhyOMtTobXsFjxJLzyJPl1PKDhK_1673108738'),
(62,'twila','us9il9SXg0I3NyaXYyaWKHY4rBvMnUes','$2y$13$cn8Ocp0DoRiKhMVjS2/LaOHynnlUKnS60wsx9DRr2ad1ucTTuITPC',NULL,'twila@gmail.com',10,1673108739,1673108739,'gvuG8L8we4i9I4tiHKlae5Ml8fayWzZX_1673108739'),
(63,'marcellina','CEeOyplvZccWJXShoYTEX3mEjqjb-P32','$2y$13$Gjt4lIUzCWNO9wiirUtKT.NRoqHSe29s6x3tANAvB5mWFSya4Q6O6',NULL,'marcellina@gmail.com',10,1673108740,1673108740,'R8Nsr32IMrgIOJnLFPDiCLF_Aw69cRU1_1673108740'),
(64,'bryant','WPrGw6NKRqYkzSVvRhj530IHIVUN-KS3','$2y$13$GVf5KPxUH21HUnaiFB70zuV.cHU5od57Vra.CWksNe1iKt5gy4VnW',NULL,'bryant@gmail.com',10,1673108742,1673108742,'XtXViNSd9wGgK2o0qxl-OkAbBvYI0P2u_1673108742'),
(65,'gail','gmRY9QgMr-SrEgodZ8oDcAb1Smpxl2bv','$2y$13$W.z9NRsSKzhrDF2o5m4HB.SoE5FAPWlukHebCS.AbujeMFnwRrVva',NULL,'gail@gmail.com',10,1673108743,1673108743,'FPCwMuV0UuZUISPQx-_tU8aM9suGqqN6_1673108743'),
(66,'charisse','svD2b77-gAknCkGTVDHU1BAeZGKXtAbV','$2y$13$sX9Qbisk1818ACUstNicb.xCRDxyom8hwPJiWFsWvwxjk4e7EsIZi',NULL,'charisse@gmail.com',10,1673108744,1673108744,'QZJNRj12TsxvGBmhDe2Zjue2eDfCj02h_1673108744'),
(67,'rowen','yB-h4k7vFXaPB9S5aCS-6BPQ9ya-qnhN','$2y$13$6PSKKxI5Q2fBUfIFBSAg.uD9GZgBeqgQ3IxWU0St5f.c.k8sJ2Z46',NULL,'rowen@gmail.com',10,1673108780,1673108780,'QHreNKvS2Zd-FQSprwego00IfS6u8WGS_1673108780'),
(68,'kriste','e1OU_Oz4Fdi47AYYm6InETQtaGy7i4oq','$2y$13$iuAwANTWSwjgd2ms5LjZBOT08asKMqT.rAKXQkPQS2O5l96N/Efyq',NULL,'kriste@gmail.com',10,1673108781,1673108781,'XlxoKMLwEglmCx5eCk9Abw6cvBZe6D3z_1673108781'),
(69,'mitzi','ysGIJX_EpYamMlNbkJrs6qusyZWo5cVZ','$2y$13$.dApOVMjSf.Wj/jhcWula.WFVreMWyi3NIwhGhD/gzUTdYNlNqJaO',NULL,'mitzi@gmail.com',10,1673108783,1673108783,'LQSPWzVJR-TfAM6OCFCO_mUVVZC9P-zN_1673108783'),
(70,'reinwald','eqLgQLxMHStKPhvj_1J7q_M5_ZCKMKBA','$2y$13$AIymq4X/96ougN2iIgRE.ePF2/ui5AAptX/kIzwbVDEgkdr/atQMO',NULL,'reinwald@gmail.com',10,1673108784,1673108784,'NsMDckuovpbo2YNbZtbB1nlP-9UkA4Cy_1673108784'),
(71,'ximenez','FVE4Mo1crkD5lTq7aChHUnlHIf3J7IEq','$2y$13$WjD9PGacJ/3meY3FaZaTr.wruPtkDCRLHGc4O5UisZ50ZFM/nfWxq',NULL,'ximenez@gmail.com',10,1673108785,1673108785,'3ad7Xaqwm7YAJ-cBCRDzKXio73V9vVOX_1673108785'),
(72,'ted','IjcIKEk14VlR_9GtdICuhcvYHoZ6AoLu','$2y$13$GmGjbw1zyHPe9RtTMBKxv.GIZg5CydezHhnJHF2QhAX4kvkuoa.1m',NULL,'ted@gmail.com',10,1673108786,1673108786,'sMQ6uTC2NoVkPJk_J5s_mi-zwn-S7OHz_1673108786'),
(73,'norri','X11f8Tyk0iSC_0IziBuBXGWvkjpq_0Qm','$2y$13$U2Z1zv2e9Xt8PNm/c5BbWeZmMABzwF4LeKoTPdJmhuuC.p6zMVQfK',NULL,'norri@gmail.com',10,1673108788,1673108788,'2hmvyfYzKgne6YUuvsJ-BcXxw00kLPww_1673108788'),
(74,'grace','bl9KBMJBze8qKCoyUlZ9buegcXQqAsY0','$2y$13$GxZ2hU7La/.2b.c99yBmMu3H95ZNMuHXKKug4ddlPUwVwBbVWJXhq',NULL,'grace@gmail.com',10,1673108789,1673108789,'e3jhnAw7C3YQW8a4puo4Q_1oERUst2tq_1673108789'),
(75,'kathleen','R_UXwuVzMctsV2BOt9MKnh-YeRbdw18C','$2y$13$v1umamt40GDOcuSnwb3ehuZYf/Tl9.wOKjKk.F5.QQ6UY3UrlpGoi',NULL,'kathleen@gmail.com',10,1673108790,1673108790,'z9WrRZdU2S6Pld0Y9Ju99M4AwOQteDsZ_1673108790'),
(76,'beryl','R02XOrnKhbzXH_NciROYnJLxm8E6Rb6M','$2y$13$adPc0zXP4qjekShnika5Z.e4DSFuaA7csge4w.xkPPskiz.PXD8Ra',NULL,'beryl@gmail.com',10,1673108792,1673108792,'3SFNmuK813p0OpKwIbDrF6Q_h36mYCyH_1673108792'),
(77,'priscilla','kOQygth8wkj1CSchFHydn--JgjtFO5Fm','$2y$13$sn2jSqe4itzVMp.wYojmk.Su0YZiqIsXk0NnHUudw36Z/O3..6G/K',NULL,'priscilla@gmail.com',10,1673108793,1673108793,'BqYF5NrRzbutcWB1pKbMFFPuai5moHZl_1673108793'),
(78,'rustie','PfQ0Qk424HaKx-734EU72zM3k3A74CK5','$2y$13$5UIBZ/H8hOqpBUdw0AwmW.CVYdPRj8DkzVOyJHWVt1muzDOza86Me',NULL,'rustie@gmail.com',10,1673108794,1673108794,'Yvm3K8nUPQFDZTiJ-uxj0TbyIKaOW3yh_1673108794'),
(79,'evelina','J-iXrRciA9daTFPUSJjMVBesQGQWvWcI','$2y$13$i5BRDK7.LQjw2XqHJ3adFuyNEa.ufXPgBJqTuzqEzRXkPGy.AYcqS',NULL,'evelina@gmail.com',10,1673108796,1673108796,'dNmBx823LujpHQfr9lCRcR_a-umdC-BD_1673108796'),
(80,'elisa','3IPizsxupicmhFTVAnaR1R5tmy8Bg1Cy','$2y$13$ygzRk.ERjG4GuQnqoNRhm.AMSVUypyOlTXa.Oq1Jw1Ofg6vfu4vZ.',NULL,'elisa@gmail.com',10,1673108797,1673108797,'GTHeyJK8K8_T3YdpqSe3uxwLnXavXTrj_1673108797'),
(81,'taylor','XkmGl0viMUk9qUdOmiMZlbg8Orji8FVP','$2y$13$G/ibmMfrs8udTmq3d/zq/ul1sDIrQUFwpqwseaBPJZy7dobjx5UPK',NULL,'taylor@gmail.com',10,1673108798,1673108798,'w7XId4hS-uiSBHV20MMCozzxIyaubNWM_1673108798'),
(82,'hal','FzN63KQoErcRyRz7plwKmyX5yUVek8dD','$2y$13$8yUPOWjHByr3BNzP8MzqdOae.Z9AUujfl4mVtM.jsI905hR5180o2',NULL,'hal@gmail.com',10,1673108800,1673108800,'zAfsPEjZ8N3sL-BsnqLE0yRLUS2nEp4z_1673108800'),
(83,'marnia','Yhv8Cis9v1dHu4-SbNzDVIOSfMMFW1fY','$2y$13$wvkicCplnT/MNys./ODUNecjAtrVHTN1kk.rJA3f0oDGf6vrWOAQ.',NULL,'marnia@gmail.com',10,1673108801,1673108801,'gn-q5_kKbBEOxN3wlS0paaL4CjsQdtno_1673108801'),
(84,'hilary','ZVTZ6qT2P_QzfCedfx8Zf5SzVrP7-A9p','$2y$13$cHpAxfRmXPgaFe3fVAS60OeSNuBdu/L8p0czqqgxvSi8Y1k/T9Sk6',NULL,'hilary@gmail.com',10,1673108803,1673108803,'rmcxvyMZksMcIvRd53LK-q4_KOSmsPRc_1673108803'),
(85,'lorine','MTvhsNp38to6Gu_LDZ3p12QmefbxEAqO','$2y$13$p8stnJ86p10n/CBdW6ZR7OTJgNb83T9LMBfZ2HxMtZNygkWOFenaa',NULL,'lorine@gmail.com',10,1673108804,1673108804,'gmyVtgfUHtnqvtM5LoSCt6DvAHz5g2Xw_1673108804'),
(86,'turner','AUkuwUsUZmtNSPkQ-bENlsi4KeplphUa','$2y$13$rpOTYqlj0g2XOuGp.O3XBuo7ZGeaPXgscM.HmuBrKQCVc66B6WX/O',NULL,'turner@gmail.com',10,1673108805,1673108805,'vBZ2O_KdoJPnEYTM63uw02zrtZ38GkKr_1673108805'),
(87,'ambrosi','JiO_bNURPX1a0AggBt9zWz3i0-pn-jzn','$2y$13$LIDFYVI1AZY1lvGtDzFEieJBIvZjqBIJXjtZ.Dj7hWWY1T/gFzXc.',NULL,'ambrosi@gmail.com',10,1673108807,1673108807,'lFxlPRyyGiZtlUxdVpj_U1r4okjGBpzd_1673108807'),
(88,'valenka','-IglNNUto6BTwT-2zXEqG6zEj4TeK2Zu','$2y$13$djWp9wsWEl5EzQRYCRKWjehHLlSA0clVUkBzrb0T3./z8o1O7PYEe',NULL,'valenka@gmail.com',10,1673108808,1673108808,'BJdEcp-3QccAsasZRxFTEhBN2CHED6Fh_1673108808'),
(89,'luis','o6cG3eSVfYjuQJsNDz4AJuDVX9au8i6P','$2y$13$bCXz3IV4vOnlT9gLuGFEvOxZz3wAOHf4N4zB6mvcHn/1V8fL2qNA.',NULL,'luis@gmail.com',10,1673108896,1673108896,'PV6nbzO2XMmEVbgVtDutUgId_Q3VVefS_1673108896'),
(90,'stepha','GtxfhyVJVq_WEFJgw2s0Z7K1UqgxTv7K','$2y$13$PsYVKuYL4FjNHzSI4NFh2.dusQ0YVBnQl4g3qPHgQZCDNBgySRjt6',NULL,'stepha@gmail.com',10,1673108897,1673108897,'86wxJIIxb63w1SxbI3WOQ5MMZr5tE5I5_1673108897'),
(91,'martie','PtRhzMIoh7lTyxgUpxaZxu9a-NQ_rdJx','$2y$13$B0MrN1doyqOOMn3b.lqDDeR2TgvbRIZe2lvPWTb6Bme051O1nuP0C',NULL,'martie@gmail.com',10,1673108898,1673108898,'7tQagH6M-WJR_OunWCETUV0eKwpXsePJ_1673108898'),
(92,'lenardo','TWEVcXuc0Xyn90u-7Cxyzqj_MEhCLd1S','$2y$13$0vm/FVcwKmG1iSc4vff1e.axfgJ5OhsCVk/Pg4F8yxnh14s9HQBfa',NULL,'lenardo@gmail.com',10,1673108900,1673108900,'d2ii-RXAK4Nw6XaxLNwC-9Yabj3Q6j3N_1673108900'),
(93,'reggy','RpJogYOtuTaU6wZgFXYwOFzIhoxqDCTd','$2y$13$E8RB1eTiOJ5dFr5ppAKRqu3jHJdGdPRcL/9lv6JZ761LRQTB3dHEC',NULL,'reggy@gmail.com',10,1673108901,1673108901,'s2N2m86W-9Y3B1reOciML-uUe1ezyI68_1673108901'),
(94,'evvie','ZROVeYV85nnkLQcOH3Ph1vqoifGfI8V_','$2y$13$dU9BkRpURkvE1ncuECmFTuA8MBdOBA5jCDAKxcflOY7zmQGPW9B0K',NULL,'evvie@gmail.com',10,1673108902,1673108902,'rEjINW8M9OuVUIxqDS9ooLAmZl2nGzmI_1673108902'),
(95,'chad','N3ucIf3AQmt9qp2DkVIFKkkjgZWIacJD','$2y$13$it.LLG7l5hcKfwBKUnG5v.NR2I6juqVzLJ2WyU6y2kwLtOs.lvEne',NULL,'chad@gmail.com',10,1673108903,1673108903,'VfIC_SYcc2Qpo9FNpTP55vkAezd2ZEBD_1673108903'),
(96,'hanny','Keh3K9qHRZcMSTfuvTOWlDqOHMc0W9r7','$2y$13$5KCPK0PfzWp/ewf6sPipsu.g/5pRdRqfzzgxyVRE/m5NjLFjmt6WK',NULL,'hanny@gmail.com',10,1673108905,1673108905,'B8Hq58eNOtqSAO1WAe4iQX2YV6ZVB3kU_1673108905'),
(97,'bidget','ZBr0lO2yKwzEu_GGJ3OJG3vFkm_shNEX','$2y$13$TVo.kHIOvDCfUiS2bdQg2ueFFsYqaBEr1zgp2V6j0fWjAz2bE75hq',NULL,'bidget@gmail.com',10,1673108906,1673108906,'p4-0wGWE4jWt-BfZfUXNTHH4GgX75S_B_1673108906'),
(98,'karyn','sE9Zsyk4211Beo9lcSRXAL3aAzvsghLR','$2y$13$Hn1jhdBPEtKv41zpOcr5Y.utfYSnjMrXQzzeE9PrDxosEwNmP5uyu',NULL,'karyn@gmail.com',10,1673108907,1673108907,'hCzeIxZ1pZjYsTkwU8iGxH9nSIMS9mt9_1673108907'),
(99,'theodore','EtFPiy-HFws8RT2lqrYj1_8QV2voV5dW','$2y$13$7YgYEX5CigtFFptU/w0nGedTeowr.17H0qnst5w8yvxIfJO33lwXa',NULL,'theodore@gmail.com',10,1673108909,1673108909,'xnAaeZaZXTPCWfzmwqZ34QvgB_ggX4DI_1673108909'),
(100,'don','wG7U_P-FTZ5xDWecFdC_uYwXRkFf6KJp','$2y$13$a9Ow/4PM0YFH8Xfd2K4fUOxTXcfkWa6ghs3N1h5PFudpqY8UFpnM6',NULL,'don@gmail.com',10,1673108910,1673108910,'4XwZgMaZF5hxhkt0mDL1Bjlkr7q9-F-q_1673108910'),
(101,'benn','no63qdL51Q0Py0dTN_WsCEVJtttYHEh-','$2y$13$2bS2ghj7NXxevSkLFVLvEuiJQI4sYN/mpNWfuo60YK.3j7VMxJCVC',NULL,'benn@gmail.com',10,1673108911,1673108911,'4IM53wiR7QbBI0BXUzmc6gU4jlVTs7q1_1673108911'),
(102,'jaquelin','MHMLsjXMIEnBC2SHn3BIMEK9kH4ZG9A_','$2y$13$7WhauLup42aA76OWfFDwfeLgyK/BdBCEVhlbzehTsAMA.Gw45KzI.',NULL,'jaquelin@gmail.com',10,1673108912,1673108912,'J2U308JyhpY3Ut3NZsRHt4cy9kf-0OPv_1673108912'),
(103,'margie','7i6g8XZI3kcYTpV-ZL6zHuRT8b4zhxK2','$2y$13$nAr0K9XzNe1F7mYSBmms/..okpQtuZoCkge8/KXn8qNZ8u/L3PLTa',NULL,'margie@gmail.com',10,1673108914,1673108914,'nmqPO9nYgiku4oVSBdB_CtuUGhapXk0W_1673108914'),
(104,'donall','zpsuOIoT31ZucRfEMyq7QHIs0OuHjfpI','$2y$13$Kv7PcEqXd7SElNCSm.zjkuuHCI3QwtJ1IxaqWEz981gPyfYQe/IA2',NULL,'donall@gmail.com',10,1673108915,1673108915,'ldjaRaE26JFt7oVxDMpNGlp9qAhG3YU6_1673108915'),
(105,'angil','OGEiMCHcrtuqcj6pgQfeej4c32XFm7_T','$2y$13$ff//ttPk37KPwxI8De2sHu6WVbffYO.k/rFa2jpyZ7gBGB9Ws26LK',NULL,'angil@gmail.com',10,1673108916,1673108916,'HnFnv81noDPq9Yj-s0l8Fs7oVJBOsaym_1673108916'),
(106,'zedekiah','MwYzaRCIyPkGEMA0U0SDu-UUKCf2P6Fw','$2y$13$gKV6LtQtHTcVI0RNE6wGVe8MdOISquI28rvBTgzSx5dEJ.VuicXJe',NULL,'zedekiah@gmail.com',10,1673108917,1673108917,'0rLr5Nz7Yrv34RofWplaHnFCODYdJSy6_1673108917'),
(107,'derwin','OMKbnhQ1nvYiYmJuS48WNGhh2iDcdvg9','$2y$13$4NBD4f5vO2WA7ddp3vYjtef3KNwypKskvulnNv4A65IpofyfMmwn6',NULL,'derwin@gmail.com',10,1673109043,1673109043,'_lSWX10sqoQXmnjNneHAXPNTOtkI5OJ4_1673109043'),
(108,'ailene','4Z32wAmZWkKRQc1DNQaV48e9wJ5VxNuz','$2y$13$T8gwxftOhacsG0/kEaD2/.s.mK56jILuTxPrnVZfNfAadZGDlQiTO',NULL,'ailene@gmail.com',10,1673109045,1673109045,'5bIOQHynI7ca5D-lU6FLORbNzWShRddE_1673109045'),
(109,'georgie','Ch06F6yIqAE8h_2o4VsHh9a5LRryEOCV','$2y$13$4gvHQ0QFJ5/wHZM6KKSTi.0u3UGRqhAV2NOBgYWnNgybRvS/2i3pe',NULL,'georgie@gmail.com',10,1673109046,1673109046,'M5EmzXdBRada5LLTA2GGlOwBjiqywiOq_1673109046'),
(110,'griffin','pPOFNpVdOyPaxDmhCebB3q2xSfNrxcyl','$2y$13$LCHGs/A40j9lrdG4/bwqcu6e8DCvVsLAnMUWIgzpfiksPH3AoXs9.',NULL,'griffin@gmail.com',10,1673109048,1673109048,'kLPmJZTc9C1XE2vZg3iN9tSveyj4YPC4_1673109048'),
(111,'lorrin','Hnqb5cCWi5MRGik_IqdFAxhfl1UUhSz-','$2y$13$OtPcgUzhPSRKRzgINUyPPumh4G1blwY2YAZHZGQkRcrxcw70G0MxG',NULL,'lorrin@gmail.com',10,1673109049,1673109049,'d1CR26X0TxcgfHu0H5C7L7VWX7BcRQ-d_1673109049'),
(112,'arvin','DApym66BnMpeIyrs6WmyfMPzKQYCipB-','$2y$13$PawwcMPni3xURSsfr.QJs.Qsx0PTFgcRbc7/ze.r5Fn5L2V9gBMK.',NULL,'arvin@gmail.com',10,1673109050,1673109050,'9EFSoS0fgArQ3uwsN6xfbcW26Mt6zuuY_1673109050'),
(113,'edyth','ZBjvRMXBpilQmSRfQNV-5PP6DwUWhx4m','$2y$13$9NGoa3uJCxEFXy3W9CWG9OzDBa6tNWRoOWugTbCOxicq3y14Haqiy',NULL,'edyth@gmail.com',10,1673109051,1673109051,'uxk0xH-UkUO27q3MumsDlU_FCV6xmeFT_1673109051'),
(114,'alecia','vVdEb5rCMsIJJemY78BZlPpJ8oCTZ-1Q','$2y$13$BqT0ZC3Atjwn7jVhfegzVeCSLWeHDhx9se4dH8TaL5tjEhXFSsFNe',NULL,'alecia@gmail.com',10,1673109053,1673109053,'Z2Ad2BrIs2txSsUne3H09Pr8Iz0aBGes_1673109053'),
(115,'malinda','GehENsikSoCnqb1xAqWX_GMzz--6j36o','$2y$13$FG7puZXiO23MZfXxAUWhqugtEbQcUB2DIw4.KqHH5FwDGQYWcjiTy',NULL,'malinda@gmail.com',10,1673109054,1673109054,'RVqeZpUaqeGXuWb58R-VualSv1mVBaO7_1673109054'),
(116,'lane','JYXDsVOGp0_snTFdHl87k3VM4Lx5vzwD','$2y$13$L5Fgve.Cx4ZyV7PGR6hdoO7SVm9RQdY8.1Fq8SzWtkM8egWSoWpAi',NULL,'lane@gmail.com',10,1673109055,1673109055,'f-xwGv6e-1P3bUztJnnyZ61QwsLP402d_1673109055'),
(117,'barth','kgjQ_pA6lgdnyxAvv_UyHY1q8ZVXUk-T','$2y$13$h74eD4nQvTy0C4qkf2KEterlpfILBqHchLZXiwY2e0jKJgnt34Xby',NULL,'barth@gmail.com',10,1673109056,1673109056,'24nEQP5kWVbyv-ZNsruiiU7tvvHLepZo_1673109056'),
(118,'cirillo','HG0P-xqw6UdBPD7QbnFeCdzd4w2_5qR7','$2y$13$uXfCNu4aBws9OHet/201..YTvxjGD1OhKb2j7YL6Sb7khFv5YEBl.',NULL,'cirillo@gmail.com',10,1673109058,1673109058,'eGNcXbJhuIxhrNoLfCNqj_BqVzhUvQxb_1673109058'),
(119,'alexina','wccZKrEV2xRwEUZanVILpR_hHZ96qXm4','$2y$13$bp5BKBDPk/kFbBB2ry.c0.DsQEh51YiyD5Y8yTEXsbaNJeSnr4Zsm',NULL,'alexina@gmail.com',10,1673109059,1673109059,'AdSGk_9rPqtDa91yuNZRonhesNLjK8zU_1673109059'),
(120,'abba','NtZgRrHb3qfa5C7u0BWBn-M01Rz8yCio','$2y$13$fZTGL4QOOC/dCCZq7t0.w.nqH1d2sczTHbrjkAeg0S27yxvCPPbH.',NULL,'abba@gmail.com',10,1673109060,1673109060,'xttXqE2nV69Nj4ZJAWHVYVoygnJ2nzM__1673109060'),
(121,'sibyl','8by-ByPYJDqJcfYreAqrJRFZEQvdqMjr','$2y$13$cyqIwS/BKFQd9XGC057.queLNiHb.5hWJcL.xqdieLUvWL51wIfyi',NULL,'sibyl@gmail.com',10,1673109062,1673109062,'lTeBf8xAmC3fYHFRHSE8xLo1_Rn6yPnV_1673109062'),
(122,'olwen','OLINVWg4oljhW_PyzhG8pt1osMCwKOSo','$2y$13$RiQSzoodUmXJOVLGyxuaS.4ibysx8uhp393n3k3yMVntOB00zJrdq',NULL,'olwen@gmail.com',10,1673109063,1673109063,'sTgFuYibz0R-wPGCZfc6wwRFIy5skGr6_1673109063'),
(123,'osbourne','VyfhQKTSzqKdB9QqlH1-DhljEJJl_AOk','$2y$13$kzswGRqLSUBHydwTaVkPC.OOkmdKEIB9sGJ4TZjN.4TvdpQGqO8XW',NULL,'osbourne@gmail.com',10,1673109064,1673109064,'wL5NtWdwhZ39wGVpBz26AJS_efyRzXBC_1673109064'),
(124,'germain','K703C9pIsEvwip7YwUNMYsVUh5GtgMFj','$2y$13$R9SRh/UHvexz9d3aW.VXEuhWjWCYmhn.QYfkf/xGIuWv7x4wguo6a',NULL,'germain@gmail.com',10,1673109065,1673109065,'ZFEabIXM6mj7S3pAJlVJye7r4WdQCA9A_1673109065'),
(125,'patty','lMnmMsYhwwL4-ncLRnV4bGsaH8EYjIDG','$2y$13$XCUeL6mwlVX3Kae2DpuW5eMZMCoFfClvfh.DytYD1KOk46AcMrw9S',NULL,'patty@gmail.com',10,1673109067,1673109067,'Ge6eRiVd34vQkcdOFYgHwvgRHI16Jvc0_1673109067'),
(126,'leann','O1515mui4FDMfskVl56IpLKqzFiaYQBx','$2y$13$1lBBkfRUchzHc7q83bJVd.I7P1yV6qRUB3PMNgHEHzzILXbIo9OPu',NULL,'leann@gmail.com',10,1673109068,1673109068,'j-AmQZ5M21hy5XOqpPWktGGoIuqABJFj_1673109068'),
(127,'stanly','_tn0IRuaufNsCUuMDJ-7GtC65aHoio_d','$2y$13$UVJ8mGBrbNQo6r45sMXS6OKWGbreH.715wfc4Pd/0RJA8NfKJfAce',NULL,'stanly@gmail.com',10,1673109069,1673109069,'TcrrmR2SApRNIVR-O83Ch8YS2kOzw7QV_1673109069'),
(128,'brandais','1Wm50my7irbWF4wx2ibsR5TDhhMS31-a','$2y$13$4WvywemARvfbFLun/BCVb.udshFT0ovKTfPetU8vQxD6t0dy0P1Gm',NULL,'brandais@gmail.com',10,1673109070,1673109070,'StOliBMg5D-6-GZiyNzOzXtn49Rfhm8Y_1673109070'),
(129,'paolina','TJVvn7HLJbKxYWXo77yU24pnT7jpg8T-','$2y$13$JUplxSfftbEK1aeDLV1LHeOUbp8Zj2L.MIx7r2URnSm9IQ/JaAO5O',NULL,'paolina@gmail.com',10,1673109072,1673109072,'D_z1ErG2NoBHctXAsSJGzaeCTRmYeVjg_1673109072'),
(131,'harmony','vxGYeT2nzWrlx6VRAcA-j37SmOCOuNYV','$2y$13$3vQUeC87WjlQjfjyG5XO1.81ppQIPU8m1DY14qmoKutkcDT1EXz3y',NULL,'harmony@gmail.com',10,1673109244,1673109244,'QL-dGZXG780PG9xR49wi5o6oXB3RerxM_1673109244'),
(132,'nani','z2tnIe03ukBu2y5yUDswSfwHyzMkV2pB','$2y$13$3/GLbJizjbB1eKt3zeNMDui5QK1JHBToLVrGdtJs4BEfe6xBKQhu.',NULL,'nani@gmail.com',10,1673109245,1673109245,'VRI5n5D_FRGIehFWway_c8mL1Tg5aLLt_1673109245'),
(133,'edwina','CWSo35pDCDvW9C1YhaMh-_OujXdRQNk5','$2y$13$if3O8a.TeLOn9Ca6mSn89uFqT0WOUuBKIh4BlF4pbXEIDEY6Rn6Oe',NULL,'edwina@gmail.com',10,1673109247,1673109247,'ZpNdLwFY4PdWzWyBA6BIVY9LJzvzCfh5_1673109247'),
(134,'thor','a4Hzo2fcDZChD-vD0P1uIHS6Hx2lnDZk','$2y$13$oEQ7qg69unR/iy34XX5VvuRrRZaz8PNBlubmAegYRB0XnintbOPoi',NULL,'thor@gmail.com',10,1673109248,1673109248,'ee3YYLJPfEPDivzD7urfmpwKrT_vkpYP_1673109248'),
(135,'riccardo','mreHsxMd9adcKq0RLO3czJlzgiOE7OFf','$2y$13$P94Vj3T9cm6zrpYJWe1TxuxVQML0SiGZW7P6AyiC2jN16xtrH7y02',NULL,'riccardo@gmail.com',10,1673109249,1673109249,'ghfjzrYvR8skpkFjoPi-q8ytArJ1I_Zl_1673109249'),
(136,'cosetta','FhbN_Qv25kVHTcbexy9ltrW6ixsEkZbP','$2y$13$fZa1mqrulSrbg2swKVtOBe4q6kTIG4iqFsKE/EZ8R054b2S5CHxpG',NULL,'cosetta@gmail.com',10,1673109251,1673109251,'PfnKYb22xrBcVtwZQTF4A3g33XP94TWO_1673109251'),
(137,'lara','hF629CRLT9kP0xptKi1S42DI7y4Q4PWh','$2y$13$vnMXbtvYgj7VdhEr5aqZYelxWywsq7iBvVvVqPHNlLz17egJ2LrXe',NULL,'lara@gmail.com',10,1673109252,1673109252,'37V466mwGMkd9-Px0xIIV2uCPpcB81tt_1673109252'),
(138,'gretel','bpb-_wu0LkREh1cq-RTRnHoz8X0miA4q','$2y$13$n3MZxRHo4ppv2J0J6eVWLeFmTb9vnJJJNPb44GBTBgbZrG2l5JdNm',NULL,'gretel@gmail.com',10,1673109253,1673109253,'pGbN8Ad6jM8_zlZJQytLbgb5lUXBCjYB_1673109253'),
(139,'talbert','cIXbsw9nMWYjTtpqAyZkH92IkxZcX3Wj','$2y$13$LwAIvtSB9SZPgOc4PTPQ1uOVFhgdUBzmRMyywBNk8o7qAWEhIfili',NULL,'talbert@gmail.com',10,1673109255,1673109255,'WHNEeOqKT04aPwKvo-90R9M5S14ORwPB_1673109255'),
(140,'ezechiel','yLBcF9PomBWPtbQjxFfxPfc0QHQHDqhC','$2y$13$PgQseiO8dsWjzVmPtUU6sOAgGUJq.W1N7uq0v2uNEzJBToFYvvQL2',NULL,'ezechiel@gmail.com',10,1673109256,1673109256,'wgSO0Pk46Vo3aRN3BLRIogYfKBPaAp7f_1673109256'),
(141,'nicol','uk5TVZPEvepAVYvS2oonpDsPRuRSIJsI','$2y$13$YLxRhoQwXLizZein5pTFjuesE0CsUpjQhIvQ6HGORJ6PbAzK3x5Im',NULL,'nicol@gmail.com',10,1673109257,1673109257,'lBizDt5ddnlBmG-e8i88tv7P42xCDmYI_1673109257'),
(142,'kelby','CcKrrGi1ItRXQhty87uy2DZ57u0s_NwI','$2y$13$r/YH5UPR4ThHm/R8izoUGeDCD9qR0Kur5HAMDpkS7w7g/jft/746.',NULL,'kelby@gmail.com',10,1673109259,1673109259,'WVoPzId4yQB4W8Zn3w3qpQpuvoLuLGGQ_1673109259'),
(143,'jennifer','5ueHvoVno6MCzO_RUw9Ub6Lk4JZj2evw','$2y$13$lhn5Asm1TFFR2XRwZfVqhODMenhitfmK2puql6Rym0E6O59lxhJu.',NULL,'jennifer@gmail.com',10,1673109260,1673109260,'VoxXqGV3F3CV74UFgKCfhmbvQRqqEcK0_1673109260'),
(144,'shandee','ehYWtAcTmc07aqR1ibnrfBJNKbahjliN','$2y$13$0XaDkNUR1YoWzAMtPJTiNuFDRSttSG4QDLplmFaJImuhMZIna8PlC',NULL,'shandee@gmail.com',10,1673109261,1673109261,'9jOqcBP4bQkMFUzI-Fm9IkYYvzuOUSsN_1673109261'),
(145,'vinson','-ZJPk7RxWSIFTxOvBo3h-Dx8Ivnti2nP','$2y$13$o.OFFGqbVSFuV/hnhFoBa.KKkeqdSs2l7LCzaDhb7/BCkSGUdHxTq',NULL,'vinson@gmail.com',10,1673109263,1673109263,'ZidPHjLYI3xRiNmE-b_uwURAevPUgDmJ_1673109263'),
(146,'belicia','VWOCdA1fc9Y4ngS7eZCwD4QJvgODKtiQ','$2y$13$geuMX5ekMt0Vrp8pQEvjouhrW.HA4Xdu/Sv7gMgdzlHT9QFhT2hLC',NULL,'belicia@gmail.com',10,1673109264,1673109264,'TgpyfM9o6dzWF5chLQ3PTy04nldIMuBx_1673109264'),
(147,'jaclin','uLVSq7Uhr2I28VEo8ugXyAlD_Ck0kHcr','$2y$13$y3DZpq72qlLyUCZBUEgd9.kxOIe1DPj/72dOSjbKuCjRFZvQbP6qm',NULL,'jaclin@gmail.com',10,1673109265,1673109265,'1lKenrE5lTODEwQXdjnSxYrPPLFSy1tZ_1673109265'),
(148,'andree','-awQmQKfLSSdFQr7Sxpj6zk6M9o5va08','$2y$13$24cyg9Rzx82he2f6lzOqJ.RsPgV3juDVYHJ5KjcnTDxfd.C6EMj3a',NULL,'andree@gmail.com',10,1673109267,1673109267,'d9PRvEyGI75pwHgO6vWOMd2XSK9hnZGL_1673109267'),
(149,'louis','ijoK15TsSTogtP4F0SP9XnG4qYSv-NBS','$2y$13$cFqQ.tesBALQzI1l6Yybz.pw.gVWT3TzZPX7p6TLdCSDvrZlWfh5e',NULL,'louis@gmail.com',10,1673109268,1673109268,'oxEAJknzokzyZkTFGvxkhGixlpZik7JC_1673109268');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userData`
--

DROP TABLE IF EXISTS `userData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userData` (
  `user_id` int(11) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(9) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `accCreationDate` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `nif` (`nif`),
  CONSTRAINT `fk_userData_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userData`
--

LOCK TABLES `userData` WRITE;
/*!40000 ALTER TABLE `userData` DISABLE KEYS */;
INSERT INTO `userData` VALUES
(8,'Diogo','Pedro','2002-01-06','932840128','304959905','M','2005-07-02 15:14:16'),
(9,'Quintina','Cecere','2002-06-13','932840778','304399905','F','2019-11-02 22:08:10'),
(10,'Pieter','Ritchley','1972-07-31','972129007','306338022','M','2007-07-28 15:42:02'),
(11,'Calypso','Bush','1979-05-23','902748891','404852787','F','2011-07-01 03:47:10'),
(12,'Dougie','Panketh','1999-08-13','984233790','436268321','M','2016-10-30 01:06:57'),
(13,'Natka','Bason','1973-02-17','936191171','593122317','F','2006-04-03 07:15:14'),
(14,'Titus','Olufsen','1962-06-09','976757820','734650250','M','2021-04-29 15:58:21'),
(15,'Chaim','Belbin','2003-12-05','963094874','871973411','M','2014-01-22 08:24:01'),
(16,'Merill','Stobie','1993-10-23','926273593','833033475','M','2019-06-30 17:15:54'),
(17,'Tuckie','Berfoot','1968-06-05','950150818','640583527','M','2010-01-16 11:18:58'),
(18,'Aldric','Bovaird','2003-01-18','978950514','164035232','M','2010-03-02 08:45:04'),
(19,'Ignazio','Avann','1985-03-02','905157650','313726914','M','2019-09-22 21:11:11'),
(20,'Valerye','Alderwick','1988-07-06','943494518','667224231','F','2008-07-28 11:04:43'),
(21,'Imogen','Reiling','1974-10-05','997885212','519628586','F','2014-08-08 10:45:57'),
(22,'Ellyn','Kezourec','1963-11-05','955004435','729776958','F','2022-06-21 16:18:30'),
(23,'Thorsten','Wroughton','1994-08-29','987291996','221545575','M','2007-07-29 21:11:59'),
(24,'Town','Wenderoth','1969-08-16','931449908','208788746','M','2013-01-13 23:10:41'),
(25,'Kirk','Gristhwaite','1996-02-20','962983254','666135090','M','2016-03-28 02:01:09'),
(26,'Schuyler','Dighton','1976-07-27','935972125','724034572','M','2019-09-16 02:17:21'),
(27,'Andreana','Sieur','1980-02-14','953252696','732375633','F','2020-02-27 09:44:20'),
(28,'Baily','Filyashin','1963-10-04','915611176','929493263','M','2005-01-14 01:22:15'),
(29,'Wilow','Wingeat','2002-08-16','905029586','402838075','F','2010-09-21 20:21:39'),
(30,'Kenn','Foxten','1992-06-19','911216019','897958862','M','2009-03-30 23:38:30'),
(31,'Kev','Darque','1981-04-08','908815440','358995378','M','2021-06-22 08:17:41'),
(32,'Rozella','Kmietsch','1995-05-15','978085656','429274345','F','2021-08-20 10:37:04'),
(33,'Mildred','Tugwell','1993-12-06','978317803','177283409','F','2010-04-12 04:49:24'),
(34,'Bonny','Ritchie','2003-08-10','987282770','158427308','F','2010-07-15 03:49:48'),
(35,'Melony','Greeves','1985-09-21','939241103','984246965','F','2006-11-05 00:46:52'),
(36,'Aprilette','Argrave','1984-05-05','964440036','189230220','F','2018-09-08 15:36:35'),
(37,'Elinore','Nuzzi','1965-09-02','967823649','242037736','F','2013-04-07 04:14:27'),
(38,'Dulciana','Midford','1981-10-30','923987634','539197252','F','2017-07-24 10:02:11'),
(39,'Donia','Deeks','1967-04-29','950336507','190239156','F','2012-01-14 06:10:00'),
(40,'Abraham','Pillifant','1989-07-24','976759633','121526685','M','2008-08-24 13:09:23'),
(41,'Gerty','Mebius','1964-10-04','929990647','641633486','F','2015-03-05 09:14:37'),
(42,'Barbi','Brotherhead','1998-06-14','942963950','559279606','F','2009-01-24 19:56:26'),
(43,'Hall','Lelievre','1982-11-27','916160760','254151525','M','2020-01-26 15:18:00'),
(44,'Tiler','Kabos','1987-04-08','975164706','389649609','M','2009-12-19 16:33:35'),
(45,'Rod','Ucceli','1977-08-18','959841948','888802945','M','2012-10-31 11:42:24'),
(46,'Brunhilda','Seczyk','1967-05-31','981750531','452031768','F','2018-01-27 15:18:58'),
(47,'Sandy','Shilliday','1982-10-15','923906089','966927220','M','2011-09-04 13:37:39'),
(48,'Hyacintha','Beasant','1973-05-08','972265260','735516435','F','2020-08-07 09:08:43'),
(49,'Kristine','Babington','1970-05-08','933788197','159965230','F','2010-04-30 22:00:17'),
(50,'Innis','Sunderland','1998-07-05','909412463','582740968','M','2018-05-23 00:22:10'),
(51,'Delmer','Vogel','1987-08-01','981192001','845517127','M','2017-04-07 21:29:20'),
(52,'Marlane','Eastbrook','1981-10-05','974572089','194318892','F','2021-07-20 01:37:58'),
(53,'Opaline','Skelington','1968-08-10','950006291','468045793','F','2011-02-02 11:50:02'),
(54,'Tobiah','Hearons','1960-09-23','983851503','566676229','M','2006-09-21 20:00:16'),
(55,'Graeme','Mateev','1988-07-24','921079089','701108669','M','2013-09-18 18:32:35'),
(56,'Shanon','Dripp','1981-04-11','964689113','200750882','F','2021-03-30 13:41:01'),
(57,'Ermanno','Middle','1998-04-25','926684869','196692582','M','2012-03-20 20:30:41'),
(58,'Philippe','Kitson','1992-02-19','947375472','843024102','F','2006-05-16 17:53:54'),
(59,'Addie','Echelle','1979-11-22','939556750','464360936','M','2005-12-04 04:26:01'),
(60,'Carole','Sweed','1985-01-07','950936643','287002157','F','2018-01-17 03:47:45'),
(61,'Lenard','Sprigging','1967-10-21','982383289','430804384','M','2017-09-28 00:09:16'),
(62,'Twila','Gault','1971-09-04','966921873','213888766','F','2007-03-23 20:08:32'),
(63,'Marcellina','Tourry','1971-11-14','999509393','191735126','F','2022-01-30 17:51:21'),
(64,'Bryant','Swinley','1970-11-11','982141770','210440236','M','2018-10-26 13:24:14'),
(65,'Gail','Tezure','1980-12-29','975286483','143515185','M','2022-08-05 07:52:11'),
(66,'Charisse','Pakes','1982-06-25','968774654','757144144','F','2018-03-08 10:31:04'),
(67,'Rowen','Girdler','2001-10-10','954957711','687899255','M','2017-08-06 09:12:01'),
(68,'Kriste','Shard','1965-08-11','933078349','297514187','F','2017-02-16 14:54:51'),
(69,'Mitzi','Corley','1962-05-09','916346221','499902710','F','2021-10-30 07:03:20'),
(70,'Reinwald','Talmadge','1985-07-17','923516250','454756895','M','2018-09-12 03:37:31'),
(71,'Ximenez','Huton','1969-05-27','924567496','952124410','M','2021-09-07 22:32:45'),
(72,'Ted','Kornalik','1996-10-01','993729336','345884635','F','2018-05-30 12:03:10'),
(73,'Norri','Townrow','1960-11-07','975499608','915213550','F','2008-01-02 00:58:43'),
(74,'Grace','Lapley','1980-09-22','983799003','466235668','M','2007-10-14 10:09:59'),
(75,'Kathleen','Peepall','1970-12-13','918456757','190368956','F','2012-10-10 07:39:55'),
(76,'Beryl','Sallarie','2003-03-01','919109584','512322171','F','2010-11-24 16:14:30'),
(77,'Priscilla','Burnhard','1973-03-18','961438824','958926965','F','2012-06-16 21:06:15'),
(78,'Rustie','McKim','1992-09-25','962292662','303752021','M','2012-01-29 22:00:59'),
(79,'Evelina','Bricket','1998-04-14','957808380','688918115','F','2005-01-26 13:10:07'),
(80,'Elisa','Suthworth','1979-05-04','912859120','288109862','F','2005-09-28 03:19:29'),
(81,'Taylor','Dyett','1973-04-20','965030155','446336816','M','2019-07-06 18:21:04'),
(82,'Hal','Lenahan','1977-11-29','994528434','457383732','M','2009-10-01 00:27:25'),
(83,'Marnia','Laffan','1990-11-28','968668242','932375480','F','2007-01-06 12:11:40'),
(84,'Hilary','Siddle','1989-06-23','935105858','315483725','F','2015-07-16 18:03:27'),
(85,'Lorine','Kerley','1979-12-18','937924045','495050549','F','2020-04-02 00:20:39'),
(86,'Turner','Tavinor','1998-01-18','925762740','358297759','M','2022-04-19 08:28:01'),
(87,'Ambrosi','Buckles','1981-12-31','900526681','344176289','M','2018-12-15 16:39:36'),
(88,'Valenka','Cammidge','1989-06-03','910252228','171828132','F','2019-04-28 15:53:44'),
(89,'Luis','Silva','1979-11-28','900166439','867557855','M','2012-02-13 14:55:23'),
(90,'Stepha','Shane','1977-12-13','959569671','440256808','F','2018-12-05 07:25:37'),
(91,'Martie','Garfit','2005-03-22','994379524','447042066','F','2010-06-01 12:59:52'),
(92,'Lenardo','Stonhouse','1982-07-20','905776362','596917100','M','2008-07-03 18:13:12'),
(93,'Reggy','Stronack','1991-09-20','952085543','342972798','M','2012-10-29 03:35:45'),
(94,'Evvie','Surgey','2000-09-13','980252518','902233914','F','2012-10-01 10:49:52'),
(95,'Chad','Candy','1978-04-08','961121116','333289619','M','2019-01-30 07:37:27'),
(96,'Hanny','Ousby','1997-07-31','929602413','270401183','F','2005-11-06 12:57:17'),
(97,'Bidget','Guerri','1991-06-19','973815959','105578229','F','2020-01-16 11:48:26'),
(98,'Karyn','Vigurs','1995-05-30','948467108','945279539','F','2016-04-19 00:58:28'),
(99,'Theodore','Mercey','1984-10-12','910061005','279701748','M','2006-04-24 11:38:44'),
(100,'Don','Haldin','1978-02-22','952052262','763303109','M','2012-01-23 11:58:45'),
(101,'Benn','Winckworth','1979-11-02','987757965','580062312','M','2007-11-20 17:19:43'),
(102,'Jaquelin','Gamil','1990-03-24','960728453','953556891','F','2010-11-10 13:53:05'),
(103,'Margie','Muffett','1981-10-25','999297757','326047413','F','2011-03-01 13:21:58'),
(104,'Donall','Silversmidt','1986-06-04','960834203','529408830','M','2010-10-26 12:00:18'),
(105,'Angil','Lockie','2005-05-29','932423058','499948659','F','2014-09-03 10:28:22'),
(106,'Zedekiah','Murton','1986-09-10','972368965','811415413','M','2014-11-25 14:34:42'),
(107,'Derwin','MacAless','1998-02-02','968107764','915714889','M','2012-10-29 14:03:53'),
(108,'Ailene','Warmisham','1977-10-13','938332801','419647682','F','2015-04-12 16:35:23'),
(109,'Georgie','Ulyat','1978-04-03','906100635','944723624','M','2013-11-29 15:46:27'),
(110,'Griffin','Cinelli','1981-05-21','924942382','959523029','M','2011-01-31 15:49:43'),
(111,'Lorrin','Wormleighton','1978-11-06','977927484','704751533','F','2012-09-08 06:39:21'),
(112,'Arvin','Biaggiotti','2003-02-05','915177421','328013739','M','2006-11-26 06:27:59'),
(113,'Edyth','Coopman','2001-06-05','951367935','553838420','F','2018-12-13 13:17:44'),
(114,'Alecia','Besson','2004-07-09','996606682','695644892','F','2015-02-08 23:37:51'),
(115,'Malinda','Le Borgne','1989-11-28','939364986','553193408','F','2018-03-12 04:53:43'),
(116,'Lane','Thurlborn','1977-06-08','928378504','674306411','F','2021-03-17 08:47:49'),
(117,'Barth','Furbank','2004-04-13','915071134','192852598','M','2009-01-03 18:35:31'),
(118,'Cirillo','Pickvance','1998-11-09','925816627','948700596','M','2019-10-29 05:12:25'),
(119,'Alexina','Costin','1996-07-15','940000226','314284264','F','2017-10-05 00:31:53'),
(120,'Abba','Chapellow','1983-01-16','985940491','384125395','M','2018-02-27 17:19:19'),
(121,'Sibyl','Bottinelli','1979-06-07','924021768','663970956','F','2015-04-17 19:10:41'),
(122,'Olwen','Pyne','1995-04-29','930005921','122590753','F','2007-04-05 10:58:31'),
(123,'Osbourne','Bagworth','1995-08-23','960226819','814101095','M','2013-02-24 15:59:28'),
(124,'Germain','Edgerly','1999-06-19','974453215','472402504','M','2011-10-05 08:55:04'),
(125,'Patty','Mosley','1985-05-25','965038082','931536715','M','2009-10-23 22:49:40'),
(126,'Leann','Guidetti','1998-10-08','947704934','864560834','F','2008-05-09 21:15:58'),
(127,'Stanly','Cready','1981-06-14','939861602','630861219','M','2019-05-14 12:33:07'),
(128,'Brandais','Coakley','1997-04-26','949677920','764904930','F','2006-02-03 07:42:16'),
(129,'Paolina','Sabban','2005-08-27','921520447','365968047','F','2009-04-26 12:38:20'),
(131,'Harmony','Berthouloume','1981-05-16','963069997','906496661','F','2017-04-06 09:18:40'),
(132,'Nani','Feavyour','1997-11-14','901576566','680028554','F','2015-10-19 19:51:19'),
(133,'Edwina','Yusupov','1982-04-30','936823434','330002975','F','2008-07-29 21:38:53'),
(134,'Thor','Confait','1984-07-13','934213268','630450916','M','2007-12-29 13:40:45'),
(135,'Riccardo','Stollman','1985-10-30','959388421','560912327','M','2005-02-12 17:09:58'),
(136,'Cosetta','Tansly','1981-07-09','936623578','720362467','F','2007-04-01 02:11:14'),
(137,'Lara','Kelberman','1999-04-28','999239314','172960019','F','2020-05-17 05:54:21'),
(138,'Gretel','Swaisland','2003-04-16','976445817','722450773','F','2012-05-01 06:35:15'),
(139,'Talbert','Gabitis','2001-06-11','942625419','496781408','M','2014-11-17 00:25:05'),
(140,'Ezechiel','Oolahan','2000-09-22','930029945','817142483','M','2008-04-23 04:21:46'),
(141,'Nicol','Gebbe','1982-11-15','992017514','590411481','M','2012-10-13 17:12:50'),
(142,'Kelby','Quinn','1976-05-11','961852299','165782371','M','2009-05-02 07:00:33'),
(143,'Jennifer','Puckett','2003-08-18','919332473','888121718','F','2020-05-09 18:44:48'),
(144,'Shandee','Allright','1984-09-13','962837463','179906741','F','2021-03-20 14:13:51'),
(145,'Vinson','Sygrove','1978-02-14','963911210','490849381','M','2018-03-04 16:25:20'),
(146,'Belicia','Coupman','1985-11-15','960622226','287605925','F','2020-07-31 09:00:27'),
(147,'Jaclin','Silverstone','1991-10-29','972099262','265819222','F','2005-03-18 04:49:11'),
(148,'Andree','Morgan','2003-06-03','956114151','160774425','F','2008-08-19 01:26:33'),
(149,'Louis','Culshaw','1977-12-13','992575780','461682841','M','2014-02-11 01:58:45');
/*!40000 ALTER TABLE `userData` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-07 16:37:06
