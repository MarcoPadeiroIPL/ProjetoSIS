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
DROP DATABASE airbender;
CREATE DATABASE airbender;
USE airbender;

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
(3,413,1,'A',9,'L','A','B','C','H','I','L','Active'),
(4,173,1,'A',7,'L','A','D','E','H','I','L','Active'),
(5,154,1,'A',9,'K','A','D','E','F','G','K','Active'),
(6,480,1,'A',8,'I','A','B','C','G','H','I','Active'),
(7,247,1,'A',6,'K','A','B','C','G','H','K','Active'),
(8,229,1,'A',6,'K','A','D','E','G','H','K','Active'),
(9,478,1,'A',6,'L','A','C','D','H','I','L','Active'),
(10,431,1,'A',9,'L','A','C','D','F','G','L','Active'),
(11,416,1,'A',7,'L','A','D','E','H','I','L','Active'),
(12,222,1,'A',6,'K','A','B','C','H','I','K','Active'),
(13,317,1,'A',6,'K','A','C','D','H','I','K','Active'),
(14,108,1,'A',7,'K','A','D','E','G','H','K','Active'),
(15,320,1,'A',6,'L','A','D','E','G','H','L','Active'),
(16,278,1,'A',6,'J','A','C','D','G','H','J','Active'),
(17,390,1,'A',7,'L','A','C','D','H','I','L','Active'),
(18,330,1,'A',9,'L','A','C','D','E','F','L','Active'),
(19,188,1,'A',9,'K','A','D','E','G','H','K','Active'),
(20,453,1,'A',7,'K','A','D','E','I','J','K','Active'),
(21,345,1,'A',6,'L','A','C','D','G','H','L','Active'),
(22,302,1,'A',6,'L','A','D','E','H','I','L','Active'),
(23,443,1,'A',7,'K','A','B','C','H','I','K','Active'),
(24,128,1,'A',7,'L','A','D','E','D','E','L','Active'),
(25,268,1,'A',6,'L','A','B','C','G','H','L','Active'),
(26,314,1,'A',7,'L','A','C','D','H','I','L','Active'),
(27,425,1,'A',8,'L','A','B','C','F','G','L','Active'),
(28,424,1,'A',9,'J','A','B','C','F','G','J','Active'),
(29,396,1,'A',8,'K','A','C','D','H','I','K','Active'),
(30,349,1,'A',6,'L','A','B','C','H','I','L','Active'),
(31,350,1,'A',6,'L','A','C','D','H','I','L','Active'),
(32,154,1,'A',8,'F','A','B','C','D','E','F','Active');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
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
('admin','100',1673030200),
('admin','103',1673030204),
('admin','105',1673030207),
('admin','106',1673030208),
('admin','108',1673030280),
('admin','113',1673030287),
('admin','115',1673030289),
('admin','126',1673030304),
('admin','131',1673030367),
('admin','68',1673030049),
('admin','69',1673030050),
('admin','84',1673030069),
('admin','89',1673030186),
('admin','95',1673030194),
('admin','96',1673030195),
('admin','99',1673030199),
('client','10',1673029670),
('client','11',1673029671),
('client','12',1673029673),
('client','13',1673029674),
('client','14',1673029675),
('client','15',1673029677),
('client','16',1673029678),
('client','17',1673029679),
('client','18',1673029681),
('client','19',1673029682),
('client','20',1673029683),
('client','21',1673029684),
('client','22',1673029686),
('client','23',1673029687),
('client','24',1673029688),
('client','25',1673029690),
('client','26',1673029691),
('client','27',1673029692),
('client','28',1673029801),
('client','29',1673029802),
('client','30',1673029803),
('client','31',1673029805),
('client','32',1673029806),
('client','33',1673029807),
('client','34',1673029808),
('client','35',1673029810),
('client','36',1673029811),
('client','37',1673029812),
('client','38',1673029813),
('client','39',1673029815),
('client','40',1673029816),
('client','41',1673029817),
('client','42',1673029819),
('client','43',1673029820),
('client','44',1673029821),
('client','45',1673029822),
('client','46',1673029824),
('client','47',1673029825),
('client','48',1673029880),
('client','49',1673029881),
('client','50',1673029883),
('client','51',1673029884),
('client','52',1673029885),
('client','53',1673029886),
('client','54',1673029888),
('client','55',1673029889),
('client','56',1673029890),
('client','57',1673029891),
('client','58',1673029893),
('client','59',1673029894),
('client','60',1673029895),
('client','61',1673029897),
('client','62',1673029898),
('client','63',1673029899),
('client','64',1673029900),
('client','65',1673029902),
('client','66',1673029903),
('client','67',1673029904),
('client','8',1673029667),
('client','9',1673029669),
('supervisor','100',1673030200),
('supervisor','103',1673030204),
('supervisor','104',1673030205),
('supervisor','105',1673030207),
('supervisor','106',1673030208),
('supervisor','107',1673030209),
('supervisor','108',1673030280),
('supervisor','110',1673030283),
('supervisor','112',1673030285),
('supervisor','113',1673030287),
('supervisor','114',1673030288),
('supervisor','115',1673030289),
('supervisor','116',1673030291),
('supervisor','118',1673030293),
('supervisor','119',1673030295),
('supervisor','121',1673030297),
('supervisor','122',1673030298),
('supervisor','123',1673030300),
('supervisor','124',1673030301),
('supervisor','125',1673030302),
('supervisor','126',1673030304),
('supervisor','127',1673030362),
('supervisor','128',1673030364),
('supervisor','131',1673030367),
('supervisor','133',1673030370),
('supervisor','134',1673030371),
('supervisor','136',1673030374),
('supervisor','137',1673030375),
('supervisor','138',1673030376),
('supervisor','139',1673030378),
('supervisor','140',1673030379),
('supervisor','142',1673030382),
('supervisor','143',1673030383),
('supervisor','145',1673030385),
('supervisor','147',1673030388),
('supervisor','68',1673030049),
('supervisor','69',1673030050),
('supervisor','71',1673030053),
('supervisor','72',1673030054),
('supervisor','78',1673030061),
('supervisor','80',1673030064),
('supervisor','81',1673030065),
('supervisor','82',1673030067),
('supervisor','84',1673030069),
('supervisor','85',1673030070),
('supervisor','89',1673030186),
('supervisor','90',1673030187),
('supervisor','94',1673030192),
('supervisor','95',1673030194),
('supervisor','96',1673030195),
('supervisor','97',1673030196),
('supervisor','98',1673030198),
('supervisor','99',1673030199),
('ticketOperator','100',1673030200),
('ticketOperator','101',1673030201),
('ticketOperator','102',1673030203),
('ticketOperator','103',1673030204),
('ticketOperator','104',1673030205),
('ticketOperator','105',1673030207),
('ticketOperator','106',1673030208),
('ticketOperator','107',1673030209),
('ticketOperator','108',1673030280),
('ticketOperator','109',1673030281),
('ticketOperator','110',1673030283),
('ticketOperator','111',1673030284),
('ticketOperator','112',1673030285),
('ticketOperator','113',1673030287),
('ticketOperator','114',1673030288),
('ticketOperator','115',1673030289),
('ticketOperator','116',1673030291),
('ticketOperator','117',1673030292),
('ticketOperator','118',1673030293),
('ticketOperator','119',1673030295),
('ticketOperator','120',1673030296),
('ticketOperator','121',1673030297),
('ticketOperator','122',1673030298),
('ticketOperator','123',1673030300),
('ticketOperator','124',1673030301),
('ticketOperator','125',1673030302),
('ticketOperator','126',1673030304),
('ticketOperator','127',1673030362),
('ticketOperator','128',1673030364),
('ticketOperator','129',1673030365),
('ticketOperator','130',1673030366),
('ticketOperator','131',1673030367),
('ticketOperator','132',1673030369),
('ticketOperator','133',1673030370),
('ticketOperator','134',1673030371),
('ticketOperator','135',1673030373),
('ticketOperator','136',1673030374),
('ticketOperator','137',1673030375),
('ticketOperator','138',1673030376),
('ticketOperator','139',1673030378),
('ticketOperator','140',1673030379),
('ticketOperator','141',1673030380),
('ticketOperator','142',1673030382),
('ticketOperator','143',1673030383),
('ticketOperator','144',1673030384),
('ticketOperator','145',1673030385),
('ticketOperator','146',1673030387),
('ticketOperator','147',1673030388),
('ticketOperator','148',1673030389),
('ticketOperator','68',1673030049),
('ticketOperator','69',1673030050),
('ticketOperator','70',1673030051),
('ticketOperator','71',1673030053),
('ticketOperator','72',1673030054),
('ticketOperator','73',1673030055),
('ticketOperator','74',1673030056),
('ticketOperator','75',1673030058),
('ticketOperator','76',1673030059),
('ticketOperator','77',1673030060),
('ticketOperator','78',1673030061),
('ticketOperator','79',1673030063),
('ticketOperator','80',1673030064),
('ticketOperator','81',1673030065),
('ticketOperator','82',1673030067),
('ticketOperator','83',1673030068),
('ticketOperator','84',1673030069),
('ticketOperator','85',1673030070),
('ticketOperator','86',1673030072),
('ticketOperator','87',1673030073),
('ticketOperator','88',1673030185),
('ticketOperator','89',1673030186),
('ticketOperator','90',1673030187),
('ticketOperator','91',1673030188),
('ticketOperator','92',1673030190),
('ticketOperator','93',1673030191),
('ticketOperator','94',1673030192),
('ticketOperator','95',1673030194),
('ticketOperator','96',1673030195),
('ticketOperator','97',1673030196),
('ticketOperator','98',1673030198),
('ticketOperator','99',1673030199);
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
(8,990.00,1),
(9,42.00,1),
(10,970.00,0),
(11,481.00,1),
(12,415.00,1),
(13,826.00,0),
(14,943.00,0),
(15,366.00,1),
(16,317.00,0),
(17,781.00,1),
(18,88.00,1),
(19,594.00,0),
(20,431.00,1),
(21,2.00,0),
(22,459.00,0),
(23,58.00,0),
(24,598.00,0),
(25,472.00,1),
(26,944.00,1),
(27,31.00,1),
(28,333.00,1),
(29,911.00,1),
(30,877.00,0),
(31,435.00,1),
(32,903.00,1),
(33,935.00,0),
(34,569.00,0),
(35,471.00,0),
(36,319.00,1),
(37,291.00,0),
(38,571.00,1),
(39,553.00,0),
(40,303.00,1),
(41,76.00,1),
(42,10.00,0),
(43,274.00,0),
(44,219.00,0),
(45,493.00,1),
(46,958.00,1),
(47,203.00,1),
(48,961.00,1),
(49,499.00,0),
(50,713.00,0),
(51,565.00,1),
(52,736.00,0),
(53,736.00,1),
(54,362.00,0),
(55,297.00,1),
(56,631.00,1),
(57,935.00,1),
(58,201.00,0),
(59,937.00,1),
(60,15.00,0),
(61,966.00,0),
(62,635.00,1),
(63,92.00,0),
(64,828.00,0),
(65,815.00,0),
(66,794.00,0),
(67,102.00,0);
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
(68,2483.00,5),
(69,1787.00,21),
(70,2190.00,8),
(71,2367.00,25),
(72,2168.00,17),
(73,1707.00,9),
(74,2287.00,7),
(75,1319.00,6),
(76,1823.00,15),
(78,1026.00,21),
(79,1341.00,10),
(80,1910.00,21),
(81,2240.00,10),
(82,1842.00,21),
(83,1848.00,24),
(84,1606.00,13),
(85,1743.00,12),
(86,993.00,18),
(87,1615.00,10),
(88,1756.00,14),
(89,2238.00,13),
(90,1144.00,25),
(91,2146.00,14),
(92,987.00,25),
(93,2311.00,23),
(94,2359.00,5),
(95,1964.00,16),
(96,2463.00,22),
(97,2228.00,9),
(98,2468.00,8),
(99,1902.00,19),
(100,2318.00,14),
(101,1841.00,7),
(102,1038.00,17),
(103,1503.00,17),
(104,1737.00,25),
(105,916.00,6),
(106,1331.00,14),
(107,2021.00,12),
(108,1488.00,10),
(109,2313.00,14),
(110,1436.00,24),
(111,1996.00,14),
(112,1746.00,20),
(113,2293.00,12),
(114,1543.00,12),
(115,1380.00,19),
(116,2256.00,23),
(117,1763.00,10),
(118,1355.00,16),
(119,2069.00,5),
(120,1323.00,22),
(121,1653.00,22),
(122,1799.00,17),
(123,1573.00,25),
(124,1904.00,19),
(125,2134.00,9),
(126,1278.00,22),
(127,1378.00,13),
(128,1770.00,21),
(129,2194.00,21),
(130,873.00,14),
(131,1675.00,16),
(132,1256.00,5),
(133,2423.00,23),
(134,1455.00,24),
(135,2046.00,11),
(136,826.00,24),
(137,2386.00,24),
(138,1425.00,23),
(139,836.00,8),
(140,1420.00,25),
(141,1043.00,11),
(142,2242.00,16),
(143,2225.00,21),
(144,1575.00,11),
(145,2251.00,28),
(146,2204.00,15),
(147,2030.00,5),
(148,2135.00,12);
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
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(8,'luis','UUGz4EqDqQcUY87SvGGPujiMwaqHyYND','$2y$13$T/TbVbbb81Wh7t5UsW.IDuMY9GZtGFydF.GMADQ4Ak3N1X6dO080K',NULL,'luis@gmail.com',10,1673029667,1673029667,'l-POmtb4rTvteWOjWdXt12ZyoqvMPgrq_1673029667'),
(9,'stepha','L9bsHRhuxSngbv5UCfra8344bbPUBgpN','$2y$13$O1pu/DpeqIH3jYvqC0XCjOyo/27DLY/4./KzqCLm.aHMo4NEDJ/Kq',NULL,'stepha@gmail.com',10,1673029669,1673029669,'y4ksOPaAO__9nrouxmQKlketHzUbWL_U_1673029669'),
(10,'martie','djsnVDluvqF34d9mkbrn5OqoL46jQaAT','$2y$13$iRuAsDgc3IZPpsO4V7hFmOIPFt3CqmUzAnTbx0ybXfGgbz8k.d6ze',NULL,'martie@gmail.com',10,1673029670,1673029670,'quF95MmxePEmYcsD3oLgXisRGa_LIrFS_1673029670'),
(11,'lenardo','4cNCuT-XTiXoWQVGwt2IE00Cnu8lJtvD','$2y$13$f.DrRemijt7JZ5ZuppCWSemfqhpELcu0Lk4euqZNUcfwpYrYtXEwa',NULL,'lenardo@gmail.com',10,1673029671,1673029671,'mh_uQMHTGV9AZYW4LqU8ObzoWyU22Lt9_1673029671'),
(12,'reggy','YLHXrSPFkaO9ogT28wV4md-DLa5gKPjn','$2y$13$12DLFU2ofI0bmE2Hd3R8W./d/RgxmIcMyM4CPXXEkIuJD85hjF./m',NULL,'reggy@gmail.com',10,1673029673,1673029673,'qZXMWF7uZqZPF4RbJcFncqDZsk_eBfuH_1673029673'),
(13,'evvie','US0O-VDzpirfVuyZ3ZgZTDV8yzGviSND','$2y$13$4EBiLGqOEkplJa0F7gA/C.X3TE5YMQXtd9XnByJuSWMve8xENEiiy',NULL,'evvie@gmail.com',10,1673029674,1673029674,'6t7Yx90M_WsnEHeJ2G4vJwlfEevgaNZc_1673029674'),
(14,'chad','uQnqe41JwhiaSCMgp8LYdSUOsCUOHgZv','$2y$13$KOTyb1pvYs3rV7Kj3FL2KulU7VcXAYQT1nQHKrf5mke6LFbpLIUSS',NULL,'chad@gmail.com',10,1673029675,1673029675,'f-YIuRFJyEPpdJN7DtEhNDm_exgC_TBf_1673029675'),
(15,'hanny','LVN6unqqTyK6GfgusMPELtDYLyTae53c','$2y$13$nY3UkRCKmwEkhG8BjwiVGukm1w4L5PGsORprKTlSWXKojduNOhE5G',NULL,'hanny@gmail.com',10,1673029677,1673029677,'7iZHyQE7dtdiS0ucmbQibCq04G_DmpZf_1673029677'),
(16,'bidget','OkSYQZJcQsEIsXlHNkabGQIxJHLWlBwr','$2y$13$CNKjrRG6LEa3.pb6fGmmTujdbO8ao5kvQqjPXcRCTWVUKO70dj8P2',NULL,'bidget@gmail.com',10,1673029678,1673029678,'GqkcAi1yW3V5-wOBxPSM-SnTla8-oTMO_1673029678'),
(17,'karyn','zFiVc7CS1hkHq5WqgTNo9PmCEshhgyiH','$2y$13$QDxPrxAWtsGjw38yst/rC.FKtCNNkt8lGePxecjCVH46MW5FCQjCe',NULL,'karyn@gmail.com',10,1673029679,1673029679,'2fMYIS3Qs05blOnsmzVKcAyJ5mLix1O2_1673029679'),
(18,'theodore','pCe-ibCgi6uloXRF0rO-o4aRo-U5Mdh-','$2y$13$TqqjbfvVeE/k0XQowJcGQeV2qgLIIsKj38AhvnrJVi6UYOxsvDLMS',NULL,'theodore@gmail.com',10,1673029681,1673029681,'kKdc2VtK-7PmbG3Zd6pICnGwGgHfNpUb_1673029681'),
(19,'don','LBDFHlnTQqqi55to2t9Kh1oQVLbzWBBS','$2y$13$u.S06k683fqc02fMN4Li2Od7AWDM4hDZvVV7Aem1Mo6br.yszcM.u',NULL,'don@gmail.com',10,1673029682,1673029682,'A0e7pbUoZzbQEee0ksiq5dn2Vk4g1tDI_1673029682'),
(20,'benn','hTahFI3sggyrN6GLc3ejxlc6FCD5hlTh','$2y$13$KriSNwi3W7Bqh7uEP0xig.1Bda0zyw2zh.NL9lDTvudzuLuopYpFK',NULL,'benn@gmail.com',10,1673029683,1673029683,'sAczC2cP1v0JdGrWPnnOP_V2Xc50H0j5_1673029683'),
(21,'jaquelin','14iHsIdKtdN4_Kj35G-tHY2U6aEndKd9','$2y$13$em1ghZhgnA5RWFEkZEhtsuS7A3aLnY63CBfcYCP5v19vkI9.rIRaO',NULL,'jaquelin@gmail.com',10,1673029684,1673029684,'OUW9WhYYhaGLmyS8lQGjvYQ9KNf4Y9N2_1673029684'),
(22,'margie','gP96PgUuVGGB-5Qnq6RQ4f5pwxX-BLjH','$2y$13$ByElLuMaKn6U7cVTiiAIzO7GE8K9SK90EFfFZS6gjvrLMTSN1Zzne',NULL,'margie@gmail.com',10,1673029686,1673029686,'wia5qWeNOMtOGYkItoDw1R98dWPI_x7t_1673029686'),
(23,'donall','J90fgd_7gUSz0lCqHAmSj1nv7emwEBf2','$2y$13$4dQbs4sVq/j7WtKgc5jz.ebF9FSBFhrv8T2PS642dlRMdlgPeCnvy',NULL,'donall@gmail.com',10,1673029687,1673029687,'gs7U5ZYc1EVSRGbKdRN84TPsNeupcljR_1673029687'),
(24,'angil','DKNhEs0dQgxGWoC4oStA7mBZZI7n_QK_','$2y$13$LnRZv9RfkHOvS/HxSXzlv.TiCt9cetWWhkxbcaHhtLTOjC9y5r3jW',NULL,'angil@gmail.com',10,1673029688,1673029688,'2IqG-f19WbjmqJkanZ6scffhuyapBLpb_1673029688'),
(25,'zedekiah','qa4kW0Ip2S7GsuqiGusj4OzAyGJD61yr','$2y$13$Ci4FjRNfs5roxYNLHeJHwOvm8zgean4UPgHgOmbvAX5yxJ146rNoO',NULL,'zedekiah@gmail.com',10,1673029690,1673029690,'BHJ1_g25ggkYhRGlGe2dalBp025aTV_n_1673029690'),
(26,'derwin','bLgFGrv7882x-vp7_qnY-BWrKTy_eIv0','$2y$13$gQe.mZYC.5Gs653U39PZYuKKfXsTqv/0kxf1R0FCR.HDIYKXjteWK',NULL,'derwin@gmail.com',10,1673029691,1673029691,'2zl8l-d5isXHC2ARJoixg0JyepUwukxA_1673029691'),
(27,'ailene','rU3_kKc7CqtCLm2BAPFyk6fGtIvEPz-A','$2y$13$bpiSQeK83pBtLN9QTyUOwe2SUkAkzq/x01msCTmJmhyeJ.uk.6Omu',NULL,'ailene@gmail.com',10,1673029692,1673029692,'IDYnDa-ooMtCWGZZMzq72NQf67Fh2sRv_1673029692'),
(28,'georgie','GgPTovOd3wAXSaeUzXJaiDZuTGPtsULj','$2y$13$k5BdHp4n/g4MDiowNYsL2eYI7Xy8knSkPJJs.tl4hLFZeUGwaMyGO',NULL,'georgie@gmail.com',10,1673029801,1673029801,'A29KHqS9X8YqGdaVgX9-04_Y-s2d6asZ_1673029801'),
(29,'griffin','w8lFKnH5d-yVHHdPZEF6b6W_WGbgHXmv','$2y$13$3uZCu4Zf6lRKR7wOy7IYeeIqRtyCZ3b9/dIvK42a/7wlKIJLuxrmm',NULL,'griffin@gmail.com',10,1673029802,1673029802,'Hz9WNpZePLXL38Ox9AU8yTOLn5NaJnzC_1673029802'),
(30,'lorrin','QsSzZ2BaAYGuzFd0mCOHkk8JuaBJttIl','$2y$13$pV5vt2y03y7Cips3Di1Zeuyf9twDLWyHXZvaCwMdPMdh/yEeLu51a',NULL,'lorrin@gmail.com',10,1673029803,1673029803,'Wk7dEzLNdQ4PMu7zjdjCwqFTtrxdpGnq_1673029803'),
(31,'arvin','mN57ODfGq0VLHs3SNYAUnoKtQW40IE-F','$2y$13$6yXd5VuN9w1872NRRgfoYecyfkRnkF3JzbRJRxgRg9z/o6Y4lXa1W',NULL,'arvin@gmail.com',10,1673029805,1673029805,'mYCndRQnmkGdAZRCdFKfnljtFaCzWcjT_1673029805'),
(32,'edyth','I3zqQYtvTnEQu2Ho2wqQ_b_HyiTIY-Mx','$2y$13$lArTJM5jDBjL2GYymeb77uV1UX85OiiWC/aa.O9iYl04m4LK0wNT2',NULL,'edyth@gmail.com',10,1673029806,1673029806,'TFpkKAktjKejtEyhUKgvD_8BnuApK6sB_1673029806'),
(33,'alecia','sUtL3CrBl28oOy4oBU-RD0AySu_Toug_','$2y$13$E0L1tZaw3m4WVZsbBZX.uOhN36M6cvyvsjWd/CK5UysYycp9PgBBW',NULL,'alecia@gmail.com',10,1673029807,1673029807,'2mZOA2-hPGECw-OTiXB43BjKEmBiM25r_1673029807'),
(34,'malinda','WHIjDG1NoQVMqaTcO5C915xRyUwTN8zh','$2y$13$Jdoys8Ndqcudf3J8fryqN.QaBzT4R5TtHn2eFx3Y4NBC1sD0OeyiW',NULL,'malinda@gmail.com',10,1673029808,1673029808,'-qay73tfK8iWCPtK9ACJYjs8msMbzKvN_1673029808'),
(35,'lane','ZD8DNTDDHlfKZf88DXK4vNhMriNsGazT','$2y$13$q8sCP7/oK8rp6xVFiOkaR.VL.lRpttfG5qA7XLFlsruEoIHM5352S',NULL,'lane@gmail.com',10,1673029810,1673029810,'3SpKY-8zw-_wA7XnozoQzlx5GucUMC6y_1673029810'),
(36,'barth','7CqeTntx9OoX4hDrlbG2Y7i2yEFfUily','$2y$13$HeOfjLBNcaPxqIp99YAxROKp2fR4tvVyklvQ1rQWqEeqmHYGdSZOW',NULL,'barth@gmail.com',10,1673029811,1673029811,'Wc6IhBAfOpLvhEFsbrSLOJtmSP036COV_1673029811'),
(37,'cirillo','FaSaDsUoKURh9gGc14KdzliWlYSXVQdC','$2y$13$CkSjVJZLmV.n5VuL77nGReFJvHe.lqFMI5kbxrsPcxa64.P2x.UtS',NULL,'cirillo@gmail.com',10,1673029812,1673029812,'pi2tHONRY-Gh3E4RHc25UM73IAhwY_Qz_1673029812'),
(38,'alexina','K2tAbeLdq9aq20lR6UkDn8M7XcyRcoVJ','$2y$13$.LGROMJbVLNzXhNqcfpoluj0RfaNyHgI89kBdAAEYR4iFf4YKYWwu',NULL,'alexina@gmail.com',10,1673029813,1673029813,'kAvsWNiWwPZ-XifbmzkuUqQhgc_9DRnZ_1673029813'),
(39,'abba','oLu_9pt7MwbQ5cSVsmQSpBD1FLRy18hp','$2y$13$OU5Yy30z1NtlI.v2RtWaD.EVGf/TILe34rtLIuZ71/87T/2roD.Ym',NULL,'abba@gmail.com',10,1673029815,1673029815,'_L1ApX2ZV1phrUce2wVzbIdPMls95EmO_1673029815'),
(40,'sibyl','NmswCPwlFJDQK-ZQmEuYyXX5vuxvpgxc','$2y$13$r3kI73KunTmrTmjFZv2NvOQJMNd0kl7vlF4ody4VIHln1RVsWcxX.',NULL,'sibyl@gmail.com',10,1673029816,1673029816,'rsrp6-KcsqkDJ67lJ3rhTefCj6mRxMhz_1673029816'),
(41,'olwen','Zj2NdyZy1CWFo8VFqWEl-tSArhS_wqBw','$2y$13$ZOU.Vp9XoZLphFFBkVksYOj3xIRdgDFtIUKPtEPRbJL5kwId4LLGW',NULL,'olwen@gmail.com',10,1673029817,1673029817,'dTQHENdQqNKSk6QRaEt55OIfKVxYzK1f_1673029817'),
(42,'osbourne','RCpgXwBKfT20xI5lYKp29H-wV-hlkVYm','$2y$13$yUvxcMer/GhnHWZ9LVKMBOKVAfr3P6WGYgWj7wREZLchKdXBuoP5C',NULL,'osbourne@gmail.com',10,1673029819,1673029819,'cgwC6MaNVoeBYAPsPfINAUdpJuuTMTQO_1673029819'),
(43,'germain','v7RoC79Ut9fOec-DlPlMiamfTmIa9ksY','$2y$13$bdwp6lIkMYqPXxh7znzCCeVnrHzVx06OiZKjXOYppXivgsPS8xMdC',NULL,'germain@gmail.com',10,1673029820,1673029820,'TTkwWxs2f7dCZgOnQkDt91xd1vI442hP_1673029820'),
(44,'patty','_cIpI0Jqq1kV-IvcIP6DKhJaO-I5J-tF','$2y$13$FFI3y5cbmC1fxeuyBrluIun3sh1PyTPtEqJcOYIyJdf2EJ.11gyBa',NULL,'patty@gmail.com',10,1673029821,1673029821,'RVUHnZN5VFPeOEUOA4Xd7cDvvtlF55lW_1673029821'),
(45,'leann','SBNA5J88YnWPMyQPAPTnjL6GMKD0nl3s','$2y$13$nquOTsHARnEup5JeyOb8COvvoDU1p/uqeTIDkvSkaD0wDHFyMwFFm',NULL,'leann@gmail.com',10,1673029822,1673029822,'fNmPLOCP0bRvt8FAR0x7OsAWQ_Vdrq21_1673029822'),
(46,'stanly','eYoS0EXOISlBlhH5fqrEkCFbgjukkpiQ','$2y$13$KcYO9ybjWz7LnFEHRatl7.og.NoiuCFsnLJgrEW3/CcJsS7KJMDNq',NULL,'stanly@gmail.com',10,1673029824,1673029824,'BPLE47-NApzWiSIuPHOIZPNhxOhNOBXH_1673029824'),
(47,'brandais','WLU39vRBl3ICoP7FoXstcaOEENVVTolP','$2y$13$QyDurMcny817HbMDWgQALe1K63Il6ENP8OXlEvh7Ooi3eyd.jXG.q',NULL,'brandais@gmail.com',10,1673029825,1673029825,'1wtoxvwHMxzTFNeWNLCFDVOcCxPy6z7p_1673029825'),
(48,'paolina','91odnqloO8GeHnpUHyrjIU-__z1_GlCT','$2y$13$Dvl1KioaFx8hpj0bcydNYulTITwy2nkuaO2shIGf4wSNvV7Lk2gZq',NULL,'paolina@gmail.com',10,1673029880,1673029880,'xnZzBFX06GDBNRfL9txUaNPKLDgbCoAq_1673029880'),
(49,'harmony','7jsLJuUHNEeMPaZ-bHwtUwYp13uvT7-t','$2y$13$N7TEro/Xz.ddItbQmeIgVehGdNU7IeM8RmaiKQhiZ1qjfkKPM2rba',NULL,'harmony@gmail.com',10,1673029881,1673029881,'0NSAE2mJ1ZZ6rAFkXTZWoqISGNqhyiI6_1673029881'),
(50,'nani','-j2fM5Lo-f5JZqxnZeG246xdX0DcObts','$2y$13$zZ.Iaeb4DSjzcB7ehWMOl.cLMxSZt/.ePFaPUYjP1zYjipEmuY.my',NULL,'nani@gmail.com',10,1673029883,1673029883,'xyX6hIcJBMZPEC44P-V3ebhL565-5Mvb_1673029883'),
(51,'edwina','18IQVtou7q8AEZSah8-ZXTS2EBtrnpRQ','$2y$13$JcqqMeg8OhcZ9ycy/jP5tu.czwoolXZ7mtGHMUa3rA3oqRN/78/em',NULL,'edwina@gmail.com',10,1673029884,1673029884,'Ho6GCUoeuawiq33k-MaYKY8T8aPEpScg_1673029884'),
(52,'thor','AdSEv3aIuuHS4wFxD5ELD36Q3WRya469','$2y$13$5kwsQVki4boq/qAdlYRsse97J9EKKAG2hGavFA3PotZbUZIJqcc7G',NULL,'thor@gmail.com',10,1673029885,1673029885,'BeL7moTleHbqpJyMd9quKHrZzqq5kq8-_1673029885'),
(53,'riccardo','bJAl_M18UIMSVLfWXuJhFEDxIjxhjAj7','$2y$13$qNkhZ8H6sa61UDxh.V5AtuoEfNprnXsVQsT6rSwaBwEvWt1uTqswi',NULL,'riccardo@gmail.com',10,1673029886,1673029886,'xeNikPXfGgbyH8zJG3agUQHAtCC0Gh8C_1673029886'),
(54,'cosetta','b77vOwjIpy25eF10aqrgrB1yHpU7JCOs','$2y$13$NjnrySnCKcFVkPd0D4TaGuJWU8T7wJiS2e4lTnn36o7nGvsociZjO',NULL,'cosetta@gmail.com',10,1673029888,1673029888,'IFEN_o7O1kMY9EejHDWJSoAbTBRXLuH4_1673029888'),
(55,'lara','rDSGsO2iETlbEQvfutRJNaHWZOsYf-f9','$2y$13$ZRSfamD1g2edOJc5.X/lGugDYRbu5FBwQCBEAElN8LYK7tRz8RS5a',NULL,'lara@gmail.com',10,1673029889,1673029889,'gd_h35UZT7-FHiAI49-VYjScj_dIV0gW_1673029889'),
(56,'gretel','0xQ1JGjgKx0JMCOfmgvir58Hm5BWb9g9','$2y$13$qD/iGu6Nunnv42XPy7vDqekZF/soiIicgf2xE4q0fFiRuFTR9j4/K',NULL,'gretel@gmail.com',10,1673029890,1673029890,'ASIP3jdMFXTToawDV8diOi-rlu3u64pJ_1673029890'),
(57,'talbert','XM39YtJaj4WNljtWW3rxroRYWwsqGVEn','$2y$13$HgTxdjfMzsVnRZVhQ.baWelO.uUiBMwno6/AEEupRKMMNG1rHoSem',NULL,'talbert@gmail.com',10,1673029891,1673029891,'tXEBPvq0bewjSr4Admllf3T2iWO2I3YM_1673029891'),
(58,'ezechiel','JvF-w4dMT9xJMyG1oZeh8KUv5hsRog03','$2y$13$swZY4w3G9fW6Q7Bf7As/zOL1aWmHK0HlmZzQKK1YcjS2cVMrFVN1.',NULL,'ezechiel@gmail.com',10,1673029893,1673029893,'0fxb0gvq3XC33h4B1IlvGVkPuKZ7EuvF_1673029893'),
(59,'nicol','BXp2oSLMxHPV0m41Qb-xXlHlJHy1DU3Q','$2y$13$D1lA4lsPfmiiChSPBQHVHOb/aBzAoTRWq2vyVRkTBBPeJ72m2N6Rm',NULL,'nicol@gmail.com',10,1673029894,1673029894,'FESs0IM2DAYkiHsU_K1he50jDC5GyefQ_1673029894'),
(60,'kelby','UYLUBeglfWfgTj15Y1TeeBNoLIEjWFgi','$2y$13$iPiqJUAVqvXSGYtnwVfXCOabt3Gn01QZnPWDZXE5XhzvHtZVC3122',NULL,'kelby@gmail.com',10,1673029895,1673029895,'_WLeGSww9M2Zg4FbdUX7lCOZ55xoiIx-_1673029895'),
(61,'jennifer','cPD-jfCLMtiGCR9rJkQ72vDZC5XaIHCv','$2y$13$V7Y68UqT1rRfbIWijpAdmu4QYwATJdtz5VccMP.31s7gYRVtgfynu',NULL,'jennifer@gmail.com',10,1673029897,1673029897,'qC1Xc_fxTSXEBLZ-RSkJljb4wYt8Dq1q_1673029897'),
(62,'shandee','1m_-VqvczD3Lbu1xK3d2EWux8IwiTkJn','$2y$13$s4dH/Dmb.0F/6IU8UT4cU.AQLprRyY0wO52UlSr3BpL45pKa4DT.2',NULL,'shandee@gmail.com',10,1673029898,1673029898,'kor8rczRnqrEwjYjDadLJHHU0zjAmhUF_1673029898'),
(63,'vinson','XA9yc0VZsT1N2rS5WSz9DEE-52i7_soB','$2y$13$WOtysLTKMsU.BA31MzTIN.MXFLNVoLUxyIIHYhR.BaAdDeVBQlJX6',NULL,'vinson@gmail.com',10,1673029899,1673029899,'HRqiqkN4RgjzFcDE3DC2hG8L3OJ47inV_1673029899'),
(64,'belicia','-Fr0N3z-71P25xjqHujQ-2n1GUSH5mm1','$2y$13$X1oxNrs6VnzYRenihOhv0ul82Xr/k1NyMHv4REdp.D3/KWk7pOS7a',NULL,'belicia@gmail.com',10,1673029900,1673029900,'N-nXG4Om4nNvG0iCq_5DzsNxhj15va2K_1673029900'),
(65,'jaclin','DajF2PPB4mdLA7UEva1X7VZfEwV9_Rdy','$2y$13$sXipASo5MLXZCjZT4LOFAekGS6j2YJwYUzwEKtWHraJUoAdijz5qu',NULL,'jaclin@gmail.com',10,1673029902,1673029902,'RWVpkGmwOG6fdcOtxJ6aBkjHFY1J-Upk_1673029902'),
(66,'andree','j0dVwmtR5lgc-qj9Us9mVfRoUEzaaI3d','$2y$13$GES4dHSxCYK3WP087j5Sp.2y11KWmKYkOP1EPAc.MKmRYWQSEBSsu',NULL,'andree@gmail.com',10,1673029903,1673029903,'21tjCmgwNjPs8dI_pa0ie980vEo5PVlW_1673029903'),
(67,'louis','DiNG7uswX-TR8w-6BDkDNDNMbJ4uv3Vz','$2y$13$aHUrYS.xlFW9rPu1uTQPkuSCUxFgKjhbWVUCTwnA4Qm5ulg2T2K7q',NULL,'louis@gmail.com',10,1673029904,1673029904,'aeBwkPonCa_iQR4icc5J_s-DFoCF4IYw_1673029904'),
(68,'diogo','JJwyitu1U2WFUw_NNbvZpP267AqX0TTe','$2y$13$bJjb7oTwfMrDqR7AWbXkWOBC6U.RP3fSHynSEJd7FX0XFan3fN8bC',NULL,'diogo@gmail.com',10,1673030049,1673030049,'0c7zTtCrlB2bOwypvkP_82jwLGR80i7w_1673030049'),
(69,'quintina','a8GhNToR5Nr458lerONrChZJmyrFFa-a','$2y$13$/h8aH1k0EQ3jdvvFYBSfOOauY/EIKM0VjreSC6Af6apyYFoT1UhDa',NULL,'quintina@gmail.com',10,1673030050,1673030050,'0MM9a6qRjiFc2xcau5E3LOSySoYUKKZJ_1673030050'),
(70,'pieter','5WjDcP_BaCfYpMPs_Q6IsaOqq_hQj_sh','$2y$13$klGaqD6VavYgKX7LayAmWetUcOSZnfx4MCj0MQz4OvZGh1I5IlyiK',NULL,'pieter@gmail.com',10,1673030051,1673030051,'b_p9C2BNx8h8jdB7gJJjKA8zHK4VM0oH_1673030051'),
(71,'calypso','IFJVqufk_dN1gr0XlaZLwl1HEmrx25zt','$2y$13$fGDvYSfeiPjhbrNig0DXseaCexc5tkvSfrYvNIGSYw2U6zYYCA1Z2',NULL,'calypso@gmail.com',10,1673030052,1673030052,'F84r-lnlYYFZd50JOSsn3o7C9UVh8fFh_1673030052'),
(72,'dougie','L6A84jHm6_1p875klW6GRnNZKMfSLftG','$2y$13$fUVhXuGQ6kJEx/CrIir.AOvFrZwxlSdU856bX4RkfMaFq.uFW5qKK',NULL,'dougie@gmail.com',10,1673030054,1673030054,'SdDie6RK80_EsQ1KnQp6aAZu0DWNOiHP_1673030054'),
(73,'natka','t5vrYHM2-iGqkyjyKTan7iHe-XtM3nbL','$2y$13$gvnBlWTRhg/Vph8i1KB5BuN5Cj3mImPp9mA01uU7Fkm18JwWdacT.',NULL,'natka@gmail.com',10,1673030055,1673030055,'UjNHsBIm79y4NCHRe-8IBh9PdWRI13nv_1673030055'),
(74,'titus','ib4eFKFN9agv23EsYHbYCbvnvNp45N-H','$2y$13$9IaVT5W0BQNCmbthTODh0e9aZGmEYm8fEeNmVrn8ynjVQObwf1uGK',NULL,'titus@gmail.com',10,1673030056,1673030056,'3_lvKU4JNGNuQenELQ2cQZQGnp8dp0h3_1673030056'),
(75,'chaim','jZ-mjgU0luAL86k6usvUxNVWXB_lzmyf','$2y$13$2eZtDi0P.5xQcSKsionWke.gwRmtxksLLL.nwwFd1oL0zcqIluC/G',NULL,'chaim@gmail.com',10,1673030058,1673030058,'TmDkW1WbYvuFHRVvn5lzIhszeBTZSNU4_1673030058'),
(76,'merill','ZiY4BHH7VH-DWuw0ZH1GIJKD0yUXeIWC','$2y$13$VW8wAEfiGCpY74hmcVFJg.mxraTJWxU4C15JHolAXmR9LwP42PDsS',NULL,'merill@gmail.com',10,1673030059,1673030059,'SjC27P2OhkMWwrHfpz6WeQP8tLAcbQ0p_1673030059'),
(77,'tuckie','o6pbuX5ZyOtY4-u_XsFRom5nuQazRqK_','$2y$13$TMzSfbrwymgd4a0SEx/Cn.DVNIoig.SXUnYN157KvL/stL8yd4Amy',NULL,'tuckie@gmail.com',10,1673030060,1673030060,'vW1aKfmwfa7vCIAGkzEjCalo31NZ3jTn_1673030060'),
(78,'aldric','_2XPDfLXKD8NEv-KMCz945u9wsDKR65k','$2y$13$5FkKcnMkPu/m5MTwIZ1aaORJokVxsXxwDQUwS7B1h398vPwTFiolW',NULL,'aldric@gmail.com',10,1673030061,1673030061,'iezM1blM1tX75kLon-QY6KLoaHp0A_Zk_1673030061'),
(79,'ignazio','BlpPjIAckWeiTJHebViPkoW5NeSBATJF','$2y$13$Tl34I/e2GS8Ve2MPrkpuV.ReTbASXqNeVkS.uMn0IFrzp0fLuEKA2',NULL,'ignazio@gmail.com',10,1673030063,1673030063,'AdmWEr_D9WSyg3isu9Jgs1ETCD3go2Jf_1673030063'),
(80,'valerye','pa2pzZ3crxNCeSG7dmOjiFm0pv1tVJmt','$2y$13$Ni.X937l2i7Ka9/UbyITVeCM5p.y7hdRbwVb6pb8JHvkxJAdlFYZW',NULL,'valerye@gmail.com',10,1673030064,1673030064,'DCMgp63RdOxqdkP26Q-VvTy8wUpRwRSe_1673030064'),
(81,'imogen','M-BHHeWksnn4WzNKDj5Wm8BWIr3Nt2Cc','$2y$13$QCPE5DJDZrCmtCVSExxSneuTQ5yO2WzzGbzSxYlgeA856/R9NlZy2',NULL,'imogen@gmail.com',10,1673030065,1673030065,'g6HXvcpJX_lg_h8PhO1pQeMJxrvtP634_1673030065'),
(82,'ellyn','0eZHx4LD_vRxeZkhZeXY0SCuccaW1yTm','$2y$13$CbZxGIlhlOkb8a.f0mBcUuFIh6qh5PkNBf8efuitN/i/FLMwvTlfm',NULL,'ellyn@gmail.com',10,1673030066,1673030066,'-B_PN4UICAbyTLYkEFAptnuIaI6Zdgu6_1673030066'),
(83,'thorsten','Yw6sxh9Fsuaqw9kWF4tjS6XqSrppX3P9','$2y$13$cxBI9Pjp6U5YWnl/GfZPpuPA8sQK05N0fakx2lLOBNdPRpsecUHZy',NULL,'thorsten@gmail.com',10,1673030068,1673030068,'5vJIM_a50g7fegsx5OX97892hUH60lMx_1673030068'),
(84,'town','wtBBWs__WrYd_N7wzSa5xP1NONX8TmwX','$2y$13$6Ye5DpIRv9Om7evZ1q4mguSYZSBDY0dnmYAUbY7MspX9ZE1msZP3a',NULL,'town@gmail.com',10,1673030069,1673030069,'lawpyv8bWd7QwGdz0aBKGKkPmyhJHhB2_1673030069'),
(85,'kirk','uHCkWerQkSwMUDdSo_9iH2H0rnoZ9hL4','$2y$13$XfEFKEsfcGOMooLwVjj8Hua.i/oOoaaosPgp3S5fDshOoLkULx3im',NULL,'kirk@gmail.com',10,1673030070,1673030070,'fEV6I6kl8W5FsWRWK-lb7VVKyDYfcYkE_1673030070'),
(86,'schuyler','dEXB0U4KQTLKVqBpYigffqK0emDaG464','$2y$13$sx2uuF0qpoBel0b8y692TOE1U1uS0l75ga/5aJcVvV9N4FFMLowgu',NULL,'schuyler@gmail.com',10,1673030072,1673030072,'rnH1WVgO9RZsxeQ1xifiCs-E6Mk4nmrl_1673030072'),
(87,'andreana','lXimbVz7FcBeKWqknunb2g8LSJG1HZa0','$2y$13$OrD2/sJJQf/y9HmTlUShXel6/hWfcQnvIe11NbTYnb506Ai17LiuO',NULL,'andreana@gmail.com',10,1673030073,1673030073,'FhuBfWRFuDfFHdAUW5iSJAZ9tTEklabo_1673030073'),
(88,'baily','9my9czalTQbaiOC3e01w158lf27rKZy-','$2y$13$6Vd74u666ChJgNKQyv5LDOaI/6aZqY4ONJPA1YlRfk7gEU43eVWy2',NULL,'baily@gmail.com',10,1673030184,1673030184,'CGnp1UVZyDY1ppgWsYCpVO6WGy7iHZB9_1673030184'),
(89,'wilow','6yd4sYFefD8S7i9xu8FeeAMJIOrp671j','$2y$13$CZyKzBN5yUau4f6t3lx9eO5NLARYfhdVhpPCNHZ.PjSzX0evlwgUG',NULL,'wilow@gmail.com',10,1673030186,1673030186,'fD8nj3uT8jFryv5rwV17Rx79do2ml_vF_1673030186'),
(90,'kenn','oO4S1AzafP1zEhsmZ4Y422tLUmvD4HFe','$2y$13$id6TLQiogk6tk/3eVyoAeew3y/gkF6U2L9aItdwTCezfRu90jGDWW',NULL,'kenn@gmail.com',10,1673030187,1673030187,'I34aFmpNDmRfbOibom4CBosDUOxo966w_1673030187'),
(91,'kev','OHENg79uebrkaX4RQjsWtkg_35QwcTkU','$2y$13$XTDQPz64a7oqXqrpE47PjeeozC3SOyjgFN2EfZDJIKUTjQpSObXx6',NULL,'kev@gmail.com',10,1673030188,1673030188,'hP3ISQuYrLpvoAQa3d-hXMX_xllSBVYm_1673030188'),
(92,'rozella','D4vpCCZhtrvO_CPxNvppPfMy9MUsKh4z','$2y$13$rtJt346rp9zuZcQaWlsfz.D7xlm29dUuAvHkMD2038pkIk8MehQQa',NULL,'rozella@gmail.com',10,1673030190,1673030190,'NzawgeawWDMDxTb9gW8TexK7xKAxJtLW_1673030190'),
(93,'mildred','vJ4KOhjtIsDVrmFdTpqw4WFumCNYILI9','$2y$13$r7SxnlkwDEkzx/1vrRzfEuEu3.Mpkx7Qby9dc6UMpnibS1YkVZXva',NULL,'mildred@gmail.com',10,1673030191,1673030191,'ghX2kq42m_-cWWgqwSMbhAzqxwY8cEzQ_1673030191'),
(94,'bonny','39OKJwgDsNEvR-tweDV4n9wXiWSXS-0H','$2y$13$JFwYEfkbK1utQsG8XFfFIexcjR0RXF3Jr2AaHJncKsCZg5155OzOe',NULL,'bonny@gmail.com',10,1673030192,1673030192,'15RDTWTT2gT3qdK-kSGUwD9_w_Ed3kTd_1673030192'),
(95,'melony','KsBkaJcY_xn-fHBeN1ZTI-BlOUD0EKY-','$2y$13$iFQPd3gFq.fori/NljjVDuq7ms0lFkRgvBLRGAzO5/bxzcAMmpwoq',NULL,'melony@gmail.com',10,1673030194,1673030194,'mvYCvzi-nIg8hBPtUJJCTZAxOhv9E38a_1673030194'),
(96,'aprilette','UOHHmPb54ai83hLHx1vXJxjjqe1ndYEz','$2y$13$b36W/yHtOiahP4WXQvOH/.lsfGv/8Z6CcVw39bbQ9Gr072K5Vd0yO',NULL,'aprilette@gmail.com',10,1673030195,1673030195,'WK0p-M6Pv20FO_ZnYgmev4UgN2bJSQOz_1673030195'),
(97,'elinore','MVQ4-C1uhQwxq5FCU70jzuZgBtrLswBH','$2y$13$trQivDPNePTgIUqTHUjOIOOHgavn.LB8ul5DcGtMNlXQRUjyRZ4bC',NULL,'elinore@gmail.com',10,1673030196,1673030196,'s82_re78h-QTgjIhaKxAlvAOpVsC9g15_1673030196'),
(98,'dulciana','6o4DY3Gc1J56m_8Ef5yhpUDFy1uM7pTE','$2y$13$LufYBGLf5frYKXeJ.QNzxOJ4mpR4L.TEV/CRdgSiTQzflP.hOAqe.',NULL,'dulciana@gmail.com',10,1673030198,1673030198,'yfaCgzy3Kv0cU6u4yLppwOaZXWZfnNp-_1673030198'),
(99,'donia','z7Ixy0oggas2nv6fQb7Qt_e3DejvhiCn','$2y$13$xZAvt8q7zEnj97X5i6yvH.xBcvoJMxaYlkykiphJ1iNdctd10rBSW',NULL,'donia@gmail.com',10,1673030199,1673030199,'AI3PO713SUc3pq9ieah1zSaM9dvXfwHJ_1673030199'),
(100,'abraham','Bag-1C4SW_SMLGai8oT0xDrB2CNlvTK5','$2y$13$uzG3RW.5/YeGisRp4jL5feaU1vxZ19zPHv9tESON/Dq3HGUYzGtCm',NULL,'abraham@gmail.com',10,1673030200,1673030200,'1NU-JPFdpAQjepVWloaS47OtkV_mvO4u_1673030200'),
(101,'gerty','c1gL3lJ0tjiczdJSsn4PV9SAyJRtaTy3','$2y$13$9JGmV7uWxBe3sa4gRVTGOuKZihR2.S7iV88DfeCztQlLB4DzKgLri',NULL,'gerty@gmail.com',10,1673030201,1673030201,'Emh_bzSD9AwI7JvucgQWQN_iGEA6aU_T_1673030201'),
(102,'barbi','oA5KUiQWmn5-JE2XYDRX_5NbbYjKJ1ct','$2y$13$PiDE3at5EjR8WBwCfMKE/.rbSF8mgXKyrmUE/TDrD4mhoG2qkpuIm',NULL,'barbi@gmail.com',10,1673030203,1673030203,'CaVgRTAI8jbM2nIi9Rpax-Q5yHQF-bWx_1673030203'),
(103,'hall','QsuiardbmQ6a7b38ZCE4MLTuhoTByli5','$2y$13$EgA0Xq3xWcoJbvId8mRX/eBtPhPzAcmoPolBtQQ.dgmeV4WWyBv9C',NULL,'hall@gmail.com',10,1673030204,1673030204,'dzXbhoeAgwZGJCc0cYqWoNRVFouiSKUe_1673030204'),
(104,'tiler','dl214ZwsViWP4ynXNlylKGBTFqH-dV8V','$2y$13$R8bML3We0wcu821Cmh0vR.5Zg8cl2vvRojF7ausHxjB93HYLgL1Ki',NULL,'tiler@gmail.com',10,1673030205,1673030205,'p66pO2DKdpVXl_aTVeV9aQfLHmglh0uF_1673030205'),
(105,'rod','cVF-eQXcqKwGuPWyC0QyAhrkbSQ9mXaR','$2y$13$XEspBmtExjAnNkEvNJ.Qj.GpdWxUtn4FV3Whgq7MFp..hGbO5GYL.',NULL,'rod@gmail.com',10,1673030207,1673030207,'K6TvcNgcEuS-wlKkgUCWZZoHdR9mqSQ4_1673030207'),
(106,'brunhilda','pdQAFLXsePnNOF2mf-VDgyeNmVAWtgSC','$2y$13$dCds.WsDNmFWFiUvTOAtLu0RtCpdxFpkG7Az0mAbc5Ww0bNj6Y6Jm',NULL,'brunhilda@gmail.com',10,1673030208,1673030208,'OzG2EN7Dz4likHjWDAqXOCWcHLHVlGzO_1673030208'),
(107,'sandy','kCzZOJ14GzlsRUU0nH2kye8yQmd57iX7','$2y$13$8J1PVwVQCVUEw2afb.hEkeDeFh8wYuOseNYpZCzxoQl1PnA59vaUe',NULL,'sandy@gmail.com',10,1673030209,1673030209,'DgpsPhgo8KZyW1i0K5M8O9yvFC9CTRyz_1673030209'),
(108,'hyacintha','5cUbb-gamg_ppNvoGd0fjrtde_63yE6Y','$2y$13$wKF8nNvyzEaMC/hmzo4yeeq/74hJfBOQxFbacT5QKjJQHExcizasa',NULL,'hyacintha@gmail.com',10,1673030280,1673030280,'P0Ty4d-OdvBm7hWWBoZRuJGbRZpUnJdF_1673030280'),
(109,'kristine','9ZwyWaq92PYopoT0UUsvEXeR5XFZj11D','$2y$13$L7t49KzlAuCZQhNtck1Coe1yKmSKAECLvBDVkDFJnEua3eKHnpbCa',NULL,'kristine@gmail.com',10,1673030281,1673030281,'ZPjhQTM06zFIbsfXIiN2fRWxwy1UWBWw_1673030281'),
(110,'innis','z3le8k8UxFMY4QEG443K_O0UQBqViPNC','$2y$13$N.g/wxi83NJvtochcOTXRe.tJRuEuOkehjYHcetJm91lRR.QgGPhy',NULL,'innis@gmail.com',10,1673030283,1673030283,'hlVGCirI2WmRRj1XeJmRgTTkzxlOvBNV_1673030283'),
(111,'delmer','_5UYn20sonWV3Q4ZgNN2qVv84IqB2FmU','$2y$13$1Qe52kNWP96wp/cR//eUDeNQgL6lIZ58Pu1M2gZRZRhhTPODWgk/y',NULL,'delmer@gmail.com',10,1673030284,1673030284,'nBx7xyV8arFbL8vHURuF1-_OTbfb0lNq_1673030284'),
(112,'marlane','B0fIB14Co1e91xaqdtuj1YY4uyZw3YZR','$2y$13$v2Vs8aW8ghLYTHzsjh2bmeHsk7JjdMnJgeIyQPOhj1HGWARWCOrGO',NULL,'marlane@gmail.com',10,1673030285,1673030285,'Ah1uasNCyEL8dc4dnSprDc2YounuftBM_1673030285'),
(113,'opaline','mFH6QjIVVplYzmhBE1O6olueQ4lv9V-I','$2y$13$cta1ZWyYZlA3HEa.n0Vpiek1y.4KUtzJCCGLbLOBeHLsUsljDFtjq',NULL,'opaline@gmail.com',10,1673030286,1673030286,'jvq4JPEmpr6D_N2NyhaoPU7Nmae9aYmW_1673030286'),
(114,'tobiah','ACNqTxQNWAh8bAH4OIidFXkB10eduvxN','$2y$13$zN/L/sGwnesX9JslLyy2ium/wBxUJb7CEzjMotuj20Mn/cdlf8OYC',NULL,'tobiah@gmail.com',10,1673030288,1673030288,'t16LNRS2n8xa8CMl8B7yZiBcY1WPChte_1673030288'),
(115,'graeme','vFbhaJSRyvnfsypErSBJ7syM2tgArp95','$2y$13$6J3GmkEGnqCWXUp8TFvQfOGmyA38fQ2YLEN8nGqWfnI0syz0yW9QK',NULL,'graeme@gmail.com',10,1673030289,1673030289,'cZQHTYDw7zur3ejnIFfJnaHQiFCCIiWB_1673030289'),
(116,'shanon','O0VOfI7qLxCW9pvjAorcwjpi8WxIym6W','$2y$13$AHv74ixOeckzaZ/1RjMCLOxX/tPUFBjpqiQfzfVS72Bm6dGHZjsXC',NULL,'shanon@gmail.com',10,1673030291,1673030291,'osm5IJ_Y6Vv82xIDGDob88fcQmJ7wRhm_1673030291'),
(117,'ermanno','895qprbCy9rHYB8vGyevpQ3eYCebsxvo','$2y$13$kyOLoOsOaEmreGzsI25Rh.QFXvO.BrPtQSDC7n40gJCPMgz7v8aji',NULL,'ermanno@gmail.com',10,1673030292,1673030292,'ZCivALvi1A4k_A4efy5u8Xt3IGi-tXQH_1673030292'),
(118,'philippe','oabER7P3wDsgdvx7dH_BcOLw_ygIEpPY','$2y$13$ijo7c2lWaChvubFW0b.Ii.JWMAJH.iwZyW8D1uzcFUKFVMV7.ua3e',NULL,'philippe@gmail.com',10,1673030293,1673030293,'tyZMWjeWpDjXuqAqy46iaOzMcuMI_bTA_1673030293'),
(119,'addie','AcuMh4ifQWsVIi7Dg2Daa_64Bv8CRIM9','$2y$13$d3LvPkKv1Zaf5tGjiO1EsONP7owp7ZLbSsnYsJAoZ8ZPYQEKcQOLK',NULL,'addie@gmail.com',10,1673030294,1673030294,'pR3ZOqthgmIdgYC2zQkhdls5BAPePduv_1673030294'),
(120,'carole','u7XwT2dNOOIOvTVIqq9-xsPouyuihvPk','$2y$13$s/yLLtN3CFLsWB.GQ3OjuO7GsKbGOGlWozShRU5/EUA23BAhBixFO',NULL,'carole@gmail.com',10,1673030296,1673030296,'Qx11SmRudlHFfeUhVC5RY6BpyRAnO4rY_1673030296'),
(121,'lenard','SHUXhfsBvPUKQ5GtcroMrV3ixbc7aGkI','$2y$13$BWF2vOFlIJveSOxAvxREqO3uuHemhwl3W9NW9mLA14Ds4LAKkqPk6',NULL,'lenard@gmail.com',10,1673030297,1673030297,'MJefVelyMGXak5OesI5Rda4YU6L0QagT_1673030297'),
(122,'twila','UBAuA5f6X5bvgDlPb0kysEv1-1KLvdSZ','$2y$13$wOhCFCn59rOw5ZBO69NYGelo3lIF.PXWP0A4BeE6QJTUFXwViQfL2',NULL,'twila@gmail.com',10,1673030298,1673030298,'5_31feZWjfDk43iG3efF40PAgkKriOH9_1673030298'),
(123,'marcellina','ZmWX0zHlmiiwlr0MWlY3kUD1KcS9Vsa_','$2y$13$UmjUMIJOS8WKBXyVE2Mq7uggIhQIUXdcW2Lbbcy1XUUsGCFKs7PP.',NULL,'marcellina@gmail.com',10,1673030300,1673030300,'sUImVBFWh6FkN0Be-toUPCkGMKQpaU-x_1673030300'),
(124,'bryant','JOr7fo-ndK_MNbgwWS6u3oITDsuGcd_6','$2y$13$.EfQqY/RY7LDaaI7dr0l2ujqq2AaGHVPR2xMzaXi6On8UnWcacJNC',NULL,'bryant@gmail.com',10,1673030301,1673030301,'QRQWwdA5tjtIOJr7Li74rdOgdK0LIjPy_1673030301'),
(125,'gail','5S1pakxbK4oOptjydSO2YGoD2EwXOJqE','$2y$13$UyDN9vMlmnPOUR2tZREGbOdWiw8dRxwZhVS1ynIEw/fsD6zsl1Doy',NULL,'gail@gmail.com',10,1673030302,1673030302,'TtmU7WeI3wHWf39SbePMsZgY9-OXEM1U_1673030302'),
(126,'charisse','jCsqscTkBgSuaw4DZcO90gPihFjTQlMo','$2y$13$Gw..R9LgOTnof.R8lquxdubgmt/nqCQb2gN3wfm452gQ3ENLn/JhC',NULL,'charisse@gmail.com',10,1673030304,1673030304,'K51WiON07pODhfK6qVRad8CfXa-Kl-Lx_1673030304'),
(127,'rowen','x_294N6_FKlWUbNQIN2mscKGHlcUGVtu','$2y$13$Hz79KSh3WQGdZb4qsp0Jz.sBi792BQd8PRMWmFCDYpJs7VM/UY5GC',NULL,'rowen@gmail.com',10,1673030362,1673030362,'XmBjMZfA0yXdDFtyZeBZARVz47OXuhC9_1673030362'),
(128,'kriste','YkkileprtFMYLszjx2KcVdVxicuXm1tR','$2y$13$Bp3eY.q4mIJ1h4rY1h5Hw.npUBv4ZvFBfiuMHGLEmRXsL0KK6XnO.',NULL,'kriste@gmail.com',10,1673030363,1673030363,'MxwM4eW7dWO6RwIM2Jc3r_2_r8DMF_yB_1673030363'),
(129,'mitzi','hUvm-ZRU1uiYqaQ-4FYPF4j-ZihvvV9G','$2y$13$kfvH6/rprTpeggCjQJzB7.t55QptxqTRXlZbis6otBlV.fjIKmuYS',NULL,'mitzi@gmail.com',10,1673030365,1673030365,'KLR8RbP80FDtWQvjzNYcvVIazUVgd33Q_1673030365'),
(130,'reinwald','53bhnH_0eRwE4MIV1U-FihXFvQAzyKVi','$2y$13$Us0ZNGC/V/rmfCO8cnzUseSlo/DuEG1MgqfLooqgRS9yvEYSpO8aq',NULL,'reinwald@gmail.com',10,1673030366,1673030366,'Q6Iz14csTLECNbkMPJ3YjDab0b140lod_1673030366'),
(131,'ximenez','PWQCkgCYG7OXdtOf2aGgAVZTY53r1o4C','$2y$13$Dunw/fkxAAaqR/k5ZNwJhOseQKAC4mkLCr7hqnmWyFHyjBAaXsMRi',NULL,'ximenez@gmail.com',10,1673030367,1673030367,'pyt9F5tbixNWtmKyjmL3T42Wojn5GqWp_1673030367'),
(132,'ted','N94IpQk5j5CZdRRWUhCUi14G7nXPSRVL','$2y$13$8lkif6YXYuKnBabZbqNzXuzo0sk5F6sNm.ryEgzDnONC9DWb7OxXG',NULL,'ted@gmail.com',10,1673030369,1673030369,'RiZsm0Vyu7ivjZPK_6Y2awZvyc5Wa8Mw_1673030369'),
(133,'norri','NgajK01rA079EyLWxlWUs6cw0UhdR8Vk','$2y$13$sYt9/.Fs.X0/5qan0uyUL.RR0kpigA4feliRB9WFQKqGWCEOot8Ui',NULL,'norri@gmail.com',10,1673030370,1673030370,'mq1L3RbxrZRyACJRQ8Cp8t00eNsAWUvD_1673030370'),
(134,'grace','GwzTtf1PyJOfc7X8zuyxZCWOyboOzUfp','$2y$13$9iFfDuuYwolBjCSHHdeO/O4F8UvtMF8CrWh3BcEZYO13kOt9R34pW',NULL,'grace@gmail.com',10,1673030371,1673030371,'tZukoohwfzFRyxxuuYIi725ol0RRDYeF_1673030371'),
(135,'kathleen','BxghEhAhhnY3i-lUMvheKDlroCRkggX9','$2y$13$nAsZ9l9FGKekKdTRJ6kWReF6ufla61GpA.mhJf.WIzRnuWfaZ63J6',NULL,'kathleen@gmail.com',10,1673030373,1673030373,'pTTDx9Ws_0-uGkQZJHzoLaWycVF-UVxG_1673030373'),
(136,'beryl','4wk5WcBENB4pa7eD5j_xfYrSHbj6Bsue','$2y$13$LbSy5AbXMYuNoH/QOjar9.aB0nIO3bQXXFjs510g8Ky/amHQbitJK',NULL,'beryl@gmail.com',10,1673030374,1673030374,'YmAn3QWlFG1IV8CcmlE9IL7nChMfzaKA_1673030374'),
(137,'priscilla','rqg877D4OTolyIKHn0FDxMZIswQJDlgx','$2y$13$kCQhP4lwml7sPFn.pl5JI.UtQCd4TXkMAnl6R1bDKgUPQJyG/PXXK',NULL,'priscilla@gmail.com',10,1673030375,1673030375,'Xr23Muc_UWR_0CdtrIwF0HfJcYvoaqql_1673030375'),
(138,'rustie','iRC0jpnjlakHUwAvTn8VE3jUbc6VY8ez','$2y$13$urjcBJLhdhUNEl9FXgShOuVyKV2CvAYKVpYPXXKirVo6kFxjDlI4a',NULL,'rustie@gmail.com',10,1673030376,1673030376,'1Ahdf6uqE9TID66naxWkiLNxkLk39EDQ_1673030376'),
(139,'evelina','IVqjK-dTmT7fDk3T0NgabJm5-vSqCuLV','$2y$13$xXcRJ8bJKT1CFad6IfjQsuxgkL0qBuHJI/XQHjw5PmICCPtU0PoVS',NULL,'evelina@gmail.com',10,1673030378,1673030378,'1NdJqcPuahrUPtrmC3SM9q2xh_b2BKo6_1673030378'),
(140,'elisa','IWlmolHMs0wf9PdawegwVAOBYL-Uy0B3','$2y$13$cbZNqGSxkhqDN4E6gXWN8.MuDWO8.6sUxr1H/1VA93uDVrbsWm42e',NULL,'elisa@gmail.com',10,1673030379,1673030379,'yc3htUJgqLuleamEvpus99B-5OLux8LQ_1673030379'),
(141,'taylor','j-hm-LterIURkbPuE5ZR-ZqvkaTVjQ1L','$2y$13$xS5nxiIdg0g2ZoXtXliW5ObsHXopAq48ufr0f/UMWGsyD3If/2DJK',NULL,'taylor@gmail.com',10,1673030380,1673030380,'xWfhW1IOn6COSDRwfOJy8ThRPXzQ9v2__1673030380'),
(142,'hal','pA61cgSC0YkDwj2_a57-NZ1v6qWV_G_b','$2y$13$mw2.oME6t/BdYgVdz6MrION2JfT7AWJy4bq2BNVVc66pRf7BdNI26',NULL,'hal@gmail.com',10,1673030381,1673030381,'WOhxEV8Gk_Ady-q8VhdIJq1NGM0R_FlP_1673030381'),
(143,'marnia','Ur6gYtgzOr71oWErmLIJ_HOtXKFumm0M','$2y$13$O.I3PALGQYIF6CxmR6UyEekFN06jY03XBk9DDAq1pSun/U0glwed6',NULL,'marnia@gmail.com',10,1673030383,1673030383,'U_4Ya_OVklay4fkbzlIZ2AbOxzPAaZwE_1673030383'),
(144,'hilary','ZLwyPVeS91GHlRJDYccIbnQ5hGAxbGKp','$2y$13$gwOcyX7Q1gkLaxhmOJY3IeQ292ck2gQ1kRSDvZhRRMlHFO78T4TPG',NULL,'hilary@gmail.com',10,1673030384,1673030384,'--jC7f2SPw1N6AfS1P8QDkVFb12WnGzD_1673030384'),
(145,'lorine','J20KfT1OROcbFvjJqT8n4y4FOhWwjrN9','$2y$13$qEDultP0ZQMwIQz8zhl3ee4Jalnk8GNCXAEFV4ieQce25jfiZ6GPO',NULL,'lorine@gmail.com',10,1673030385,1673030385,'Ui3giIpWMQ_fJgNjC97lNp61WvweMrmC_1673030385'),
(146,'turner','qHLOo7sKuhmGpKSzv7KtKerKoMNQrPaL','$2y$13$SizhBH74TDNIWeKl3PLSbe6Ef8irQQatEVUdu7mLyFFW7xHPpqM2a',NULL,'turner@gmail.com',10,1673030387,1673030387,'_MN82_vixIn4k-H2yufkbF9x6Sv_bQBh_1673030387'),
(147,'ambrosi','3bQYrlZylhcWD037maS7HsPbDltgSXkf','$2y$13$EesUkTbrpxOGPVKl.NRIyOE5hFNZ.vnXRYjbq/RGxsv4/QUK9pPee',NULL,'ambrosi@gmail.com',10,1673030388,1673030388,'Zg4MjITpAzlek7Z_7Teo0yQiV4hJ9jaJ_1673030388'),
(148,'valenka','UT77zU_2IO4tGeWbj1va6ZU3nGdrIiXW','$2y$13$NHF59vo2KJI2f5NM2HLpA.qMjNWcIeGHWn2g3A9ZPVOtTmxGk77k.',NULL,'valenka@gmail.com',10,1673030389,1673030389,'TsUXQKFWXcQSc1_zbyH9-gEzhVSxUSZ3_1673030389');
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
(8,'Luis','Silva','1979-11-28','900166439','867557855','M','2012-02-13 14:55:23'),
(9,'Stepha','Shane','1977-12-13','959569671','440256808','F','2018-12-05 07:25:37'),
(10,'Martie','Garfit','2005-03-22','994379524','447042066','F','2010-06-01 12:59:52'),
(11,'Lenardo','Stonhouse','1982-07-20','905776362','596917100','M','2008-07-03 18:13:12'),
(12,'Reggy','Stronack','1991-09-20','952085543','342972798','M','2012-10-29 03:35:45'),
(13,'Evvie','Surgey','2000-09-13','980252518','902233914','F','2012-10-01 10:49:52'),
(14,'Chad','Candy','1978-04-08','961121116','333289619','M','2019-01-30 07:37:27'),
(15,'Hanny','Ousby','1997-07-31','929602413','270401183','F','2005-11-06 12:57:17'),
(16,'Bidget','Guerri','1991-06-19','973815959','105578229','F','2020-01-16 11:48:26'),
(17,'Karyn','Vigurs','1995-05-30','948467108','945279539','F','2016-04-19 00:58:28'),
(18,'Theodore','Mercey','1984-10-12','910061005','279701748','M','2006-04-24 11:38:44'),
(19,'Don','Haldin','1978-02-22','952052262','763303109','M','2012-01-23 11:58:45'),
(20,'Benn','Winckworth','1979-11-02','987757965','580062312','M','2007-11-20 17:19:43'),
(21,'Jaquelin','Gamil','1990-03-24','960728453','953556891','F','2010-11-10 13:53:05'),
(22,'Margie','Muffett','1981-10-25','999297757','326047413','F','2011-03-01 13:21:58'),
(23,'Donall','Silversmidt','1986-06-04','960834203','529408830','M','2010-10-26 12:00:18'),
(24,'Angil','Lockie','2005-05-29','932423058','499948659','F','2014-09-03 10:28:22'),
(25,'Zedekiah','Murton','1986-09-10','972368965','811415413','M','2014-11-25 14:34:42'),
(26,'Derwin','MacAless','1998-02-02','968107764','915714889','M','2012-10-29 14:03:53'),
(27,'Ailene','Warmisham','1977-10-13','938332801','419647682','F','2015-04-12 16:35:23'),
(28,'Georgie','Ulyat','1978-04-03','906100635','944723624','M','2013-11-29 15:46:27'),
(29,'Griffin','Cinelli','1981-05-21','924942382','959523029','M','2011-01-31 15:49:43'),
(30,'Lorrin','Wormleighton','1978-11-06','977927484','704751533','F','2012-09-08 06:39:21'),
(31,'Arvin','Biaggiotti','2003-02-05','915177421','328013739','M','2006-11-26 06:27:59'),
(32,'Edyth','Coopman','2001-06-05','951367935','553838420','F','2018-12-13 13:17:44'),
(33,'Alecia','Besson','2004-07-09','996606682','695644892','F','2015-02-08 23:37:51'),
(34,'Malinda','Le Borgne','1989-11-28','939364986','553193408','F','2018-03-12 04:53:43'),
(35,'Lane','Thurlborn','1977-06-08','928378504','674306411','F','2021-03-17 08:47:49'),
(36,'Barth','Furbank','2004-04-13','915071134','192852598','M','2009-01-03 18:35:31'),
(37,'Cirillo','Pickvance','1998-11-09','925816627','948700596','M','2019-10-29 05:12:25'),
(38,'Alexina','Costin','1996-07-15','940000226','314284264','F','2017-10-05 00:31:53'),
(39,'Abba','Chapellow','1983-01-16','985940491','384125395','M','2018-02-27 17:19:19'),
(40,'Sibyl','Bottinelli','1979-06-07','924021768','663970956','F','2015-04-17 19:10:41'),
(41,'Olwen','Pyne','1995-04-29','930005921','122590753','F','2007-04-05 10:58:31'),
(42,'Osbourne','Bagworth','1995-08-23','960226819','814101095','M','2013-02-24 15:59:28'),
(43,'Germain','Edgerly','1999-06-19','974453215','472402504','M','2011-10-05 08:55:04'),
(44,'Patty','Mosley','1985-05-25','965038082','931536715','M','2009-10-23 22:49:40'),
(45,'Leann','Guidetti','1998-10-08','947704934','864560834','F','2008-05-09 21:15:58'),
(46,'Stanly','Cready','1981-06-14','939861602','630861219','M','2019-05-14 12:33:07'),
(47,'Brandais','Coakley','1997-04-26','949677920','764904930','F','2006-02-03 07:42:16'),
(48,'Paolina','Sabban','2005-08-27','921520447','365968047','F','2009-04-26 12:38:20'),
(49,'Harmony','Berthouloume','1981-05-16','963069997','906496661','F','2017-04-06 09:18:40'),
(50,'Nani','Feavyour','1997-11-14','901576566','680028554','F','2015-10-19 19:51:19'),
(51,'Edwina','Yusupov','1982-04-30','936823434','330002975','F','2008-07-29 21:38:53'),
(52,'Thor','Confait','1984-07-13','934213268','630450916','M','2007-12-29 13:40:45'),
(53,'Riccardo','Stollman','1985-10-30','959388421','560912327','M','2005-02-12 17:09:58'),
(54,'Cosetta','Tansly','1981-07-09','936623578','720362467','F','2007-04-01 02:11:14'),
(55,'Lara','Kelberman','1999-04-28','999239314','172960019','F','2020-05-17 05:54:21'),
(56,'Gretel','Swaisland','2003-04-16','976445817','722450773','F','2012-05-01 06:35:15'),
(57,'Talbert','Gabitis','2001-06-11','942625419','496781408','M','2014-11-17 00:25:05'),
(58,'Ezechiel','Oolahan','2000-09-22','930029945','817142483','M','2008-04-23 04:21:46'),
(59,'Nicol','Gebbe','1982-11-15','992017514','590411481','M','2012-10-13 17:12:50'),
(60,'Kelby','Quinn','1976-05-11','961852299','165782371','M','2009-05-02 07:00:33'),
(61,'Jennifer','Puckett','2003-08-18','919332473','888121718','F','2020-05-09 18:44:48'),
(62,'Shandee','Allright','1984-09-13','962837463','179906741','F','2021-03-20 14:13:51'),
(63,'Vinson','Sygrove','1978-02-14','963911210','490849381','M','2018-03-04 16:25:20'),
(64,'Belicia','Coupman','1985-11-15','960622226','287605925','F','2020-07-31 09:00:27'),
(65,'Jaclin','Silverstone','1991-10-29','972099262','265819222','F','2005-03-18 04:49:11'),
(66,'Andree','Morgan','2003-06-03','956114151','160774425','F','2008-08-19 01:26:33'),
(67,'Louis','Culshaw','1977-12-13','992575780','461682841','M','2014-02-11 01:58:45'),
(68,'Diogo','Pedro','2002-01-06','932840128','304959905','M','2005-07-02 15:14:16'),
(69,'Quintina','Cecere','2002-06-13','932840778','304399905','F','2019-11-02 22:08:10'),
(70,'Pieter','Ritchley','1972-07-31','972129007','306338022','M','2007-07-28 15:42:02'),
(71,'Calypso','Bush','1979-05-23','902748891','404852787','F','2011-07-01 03:47:10'),
(72,'Dougie','Panketh','1999-08-13','984233790','436268321','M','2016-10-30 01:06:57'),
(73,'Natka','Bason','1973-02-17','936191171','593122317','F','2006-04-03 07:15:14'),
(74,'Titus','Olufsen','1962-06-09','976757820','734650250','M','2021-04-29 15:58:21'),
(75,'Chaim','Belbin','2003-12-05','963094874','871973411','M','2014-01-22 08:24:01'),
(76,'Merill','Stobie','1993-10-23','926273593','833033475','M','2019-06-30 17:15:54'),
(77,'Tuckie','Berfoot','1968-06-05','950150818','640583527','M','2010-01-16 11:18:58'),
(78,'Aldric','Bovaird','2003-01-18','978950514','164035232','M','2010-03-02 08:45:04'),
(79,'Ignazio','Avann','1985-03-02','905157650','313726914','M','2019-09-22 21:11:11'),
(80,'Valerye','Alderwick','1988-07-06','943494518','667224231','F','2008-07-28 11:04:43'),
(81,'Imogen','Reiling','1974-10-05','997885212','519628586','F','2014-08-08 10:45:57'),
(82,'Ellyn','Kezourec','1963-11-05','955004435','729776958','F','2022-06-21 16:18:30'),
(83,'Thorsten','Wroughton','1994-08-29','987291996','221545575','M','2007-07-29 21:11:59'),
(84,'Town','Wenderoth','1969-08-16','931449908','208788746','M','2013-01-13 23:10:41'),
(85,'Kirk','Gristhwaite','1996-02-20','962983254','666135090','M','2016-03-28 02:01:09'),
(86,'Schuyler','Dighton','1976-07-27','935972125','724034572','M','2019-09-16 02:17:21'),
(87,'Andreana','Sieur','1980-02-14','953252696','732375633','F','2020-02-27 09:44:20'),
(88,'Baily','Filyashin','1963-10-04','915611176','929493263','M','2005-01-14 01:22:15'),
(89,'Wilow','Wingeat','2002-08-16','905029586','402838075','F','2010-09-21 20:21:39'),
(90,'Kenn','Foxten','1992-06-19','911216019','897958862','M','2009-03-30 23:38:30'),
(91,'Kev','Darque','1981-04-08','908815440','358995378','M','2021-06-22 08:17:41'),
(92,'Rozella','Kmietsch','1995-05-15','978085656','429274345','F','2021-08-20 10:37:04'),
(93,'Mildred','Tugwell','1993-12-06','978317803','177283409','F','2010-04-12 04:49:24'),
(94,'Bonny','Ritchie','2003-08-10','987282770','158427308','F','2010-07-15 03:49:48'),
(95,'Melony','Greeves','1985-09-21','939241103','984246965','F','2006-11-05 00:46:52'),
(96,'Aprilette','Argrave','1984-05-05','964440036','189230220','F','2018-09-08 15:36:35'),
(97,'Elinore','Nuzzi','1965-09-02','967823649','242037736','F','2013-04-07 04:14:27'),
(98,'Dulciana','Midford','1981-10-30','923987634','539197252','F','2017-07-24 10:02:11'),
(99,'Donia','Deeks','1967-04-29','950336507','190239156','F','2012-01-14 06:10:00'),
(100,'Abraham','Pillifant','1989-07-24','976759633','121526685','M','2008-08-24 13:09:23'),
(101,'Gerty','Mebius','1964-10-04','929990647','641633486','F','2015-03-05 09:14:37'),
(102,'Barbi','Brotherhead','1998-06-14','942963950','559279606','F','2009-01-24 19:56:26'),
(103,'Hall','Lelievre','1982-11-27','916160760','254151525','M','2020-01-26 15:18:00'),
(104,'Tiler','Kabos','1987-04-08','975164706','389649609','M','2009-12-19 16:33:35'),
(105,'Rod','Ucceli','1977-08-18','959841948','888802945','M','2012-10-31 11:42:24'),
(106,'Brunhilda','Seczyk','1967-05-31','981750531','452031768','F','2018-01-27 15:18:58'),
(107,'Sandy','Shilliday','1982-10-15','923906089','966927220','M','2011-09-04 13:37:39'),
(108,'Hyacintha','Beasant','1973-05-08','972265260','735516435','F','2020-08-07 09:08:43'),
(109,'Kristine','Babington','1970-05-08','933788197','159965230','F','2010-04-30 22:00:17'),
(110,'Innis','Sunderland','1998-07-05','909412463','582740968','M','2018-05-23 00:22:10'),
(111,'Delmer','Vogel','1987-08-01','981192001','845517127','M','2017-04-07 21:29:20'),
(112,'Marlane','Eastbrook','1981-10-05','974572089','194318892','F','2021-07-20 01:37:58'),
(113,'Opaline','Skelington','1968-08-10','950006291','468045793','F','2011-02-02 11:50:02'),
(114,'Tobiah','Hearons','1960-09-23','983851503','566676229','M','2006-09-21 20:00:16'),
(115,'Graeme','Mateev','1988-07-24','921079089','701108669','M','2013-09-18 18:32:35'),
(116,'Shanon','Dripp','1981-04-11','964689113','200750882','F','2021-03-30 13:41:01'),
(117,'Ermanno','Middle','1998-04-25','926684869','196692582','M','2012-03-20 20:30:41'),
(118,'Philippe','Kitson','1992-02-19','947375472','843024102','F','2006-05-16 17:53:54'),
(119,'Addie','Echelle','1979-11-22','939556750','464360936','M','2005-12-04 04:26:01'),
(120,'Carole','Sweed','1985-01-07','950936643','287002157','F','2018-01-17 03:47:45'),
(121,'Lenard','Sprigging','1967-10-21','982383289','430804384','M','2017-09-28 00:09:16'),
(122,'Twila','Gault','1971-09-04','966921873','213888766','F','2007-03-23 20:08:32'),
(123,'Marcellina','Tourry','1971-11-14','999509393','191735126','F','2022-01-30 17:51:21'),
(124,'Bryant','Swinley','1970-11-11','982141770','210440236','M','2018-10-26 13:24:14'),
(125,'Gail','Tezure','1980-12-29','975286483','143515185','M','2022-08-05 07:52:11'),
(126,'Charisse','Pakes','1982-06-25','968774654','757144144','F','2018-03-08 10:31:04'),
(127,'Rowen','Girdler','2001-10-10','954957711','687899255','M','2017-08-06 09:12:01'),
(128,'Kriste','Shard','1965-08-11','933078349','297514187','F','2017-02-16 14:54:51'),
(129,'Mitzi','Corley','1962-05-09','916346221','499902710','F','2021-10-30 07:03:20'),
(130,'Reinwald','Talmadge','1985-07-17','923516250','454756895','M','2018-09-12 03:37:31'),
(131,'Ximenez','Huton','1969-05-27','924567496','952124410','M','2021-09-07 22:32:45'),
(132,'Ted','Kornalik','1996-10-01','993729336','345884635','F','2018-05-30 12:03:10'),
(133,'Norri','Townrow','1960-11-07','975499608','915213550','F','2008-01-02 00:58:43'),
(134,'Grace','Lapley','1980-09-22','983799003','466235668','M','2007-10-14 10:09:59'),
(135,'Kathleen','Peepall','1970-12-13','918456757','190368956','F','2012-10-10 07:39:55'),
(136,'Beryl','Sallarie','2003-03-01','919109584','512322171','F','2010-11-24 16:14:30'),
(137,'Priscilla','Burnhard','1973-03-18','961438824','958926965','F','2012-06-16 21:06:15'),
(138,'Rustie','McKim','1992-09-25','962292662','303752021','M','2012-01-29 22:00:59'),
(139,'Evelina','Bricket','1998-04-14','957808380','688918115','F','2005-01-26 13:10:07'),
(140,'Elisa','Suthworth','1979-05-04','912859120','288109862','F','2005-09-28 03:19:29'),
(141,'Taylor','Dyett','1973-04-20','965030155','446336816','M','2019-07-06 18:21:04'),
(142,'Hal','Lenahan','1977-11-29','994528434','457383732','M','2009-10-01 00:27:25'),
(143,'Marnia','Laffan','1990-11-28','968668242','932375480','F','2007-01-06 12:11:40'),
(144,'Hilary','Siddle','1989-06-23','935105858','315483725','F','2015-07-16 18:03:27'),
(145,'Lorine','Kerley','1979-12-18','937924045','495050549','F','2020-04-02 00:20:39'),
(146,'Turner','Tavinor','1998-01-18','925762740','358297759','M','2022-04-19 08:28:01'),
(147,'Ambrosi','Buckles','1981-12-31','900526681','344176289','M','2018-12-15 16:39:36'),
(148,'Valenka','Cammidge','1989-06-03','910252228','171828132','F','2019-04-28 15:53:44');
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

-- Dump completed on 2023-01-07 14:56:49
