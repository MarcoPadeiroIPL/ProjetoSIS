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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airplanes`
--

LOCK TABLES `airplanes` WRITE;
/*!40000 ALTER TABLE `airplanes` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airports`
--

LOCK TABLES `airports` WRITE;
/*!40000 ALTER TABLE `airports` DISABLE KEYS */;
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
('admin','1',1667908213);
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
('admin',1,NULL,NULL,NULL,1667908213,1667908213),
('client',1,NULL,NULL,NULL,1667908213,1667908213),
('createAdmin',2,'Create a Admin',NULL,NULL,1667908213,1667908213),
('createAirplane',2,'Create a Airplane',NULL,NULL,1667908213,1667908213),
('createAirport',2,'Create a Airport',NULL,NULL,1667908213,1667908213),
('createBalanceReq',2,'Create a BalanceReq',NULL,NULL,1667908213,1667908213),
('createClient',2,'Create a Client',NULL,NULL,1667908213,1667908213),
('createConfig',2,'Create a Config',NULL,NULL,1667908213,1667908213),
('createEmployee',2,'Create a Employee',NULL,NULL,1667908213,1667908213),
('createFlight',2,'Create a Flight',NULL,NULL,1667908213,1667908213),
('createRefund',2,'Create a Refund',NULL,NULL,1667908213,1667908213),
('createTariff',2,'Create a Tariff',NULL,NULL,1667908213,1667908213),
('createTicket',2,'Create a Ticket',NULL,NULL,1667908213,1667908213),
('deleteAdmin',2,'Delete a Admin',NULL,NULL,1667908213,1667908213),
('deleteAirplane',2,'Delete a Airplane',NULL,NULL,1667908213,1667908213),
('deleteAirport',2,'Delete a Airport',NULL,NULL,1667908213,1667908213),
('deleteBalanceReq',2,'Delete a BalanceReq',NULL,NULL,1667908213,1667908213),
('deleteClient',2,'Delete a Client',NULL,NULL,1667908213,1667908213),
('deleteConfig',2,'Delete a Config',NULL,NULL,1667908213,1667908213),
('deleteEmployee',2,'Delete a Employee',NULL,NULL,1667908213,1667908213),
('deleteFlight',2,'Delete a Flight',NULL,NULL,1667908213,1667908213),
('deleteRefund',2,'Delete a Refund',NULL,NULL,1667908213,1667908213),
('deleteTariff',2,'Delete a Tariff',NULL,NULL,1667908213,1667908213),
('deleteTicket',2,'Delete a Ticket',NULL,NULL,1667908213,1667908213),
('listAdmin',2,'List a Admin',NULL,NULL,1667908213,1667908213),
('listAirplane',2,'List a Airplane',NULL,NULL,1667908213,1667908213),
('listAirport',2,'List a Airport',NULL,NULL,1667908213,1667908213),
('listBalanceReq',2,'List a BalanceReq',NULL,NULL,1667908213,1667908213),
('listClient',2,'List a Client',NULL,NULL,1667908213,1667908213),
('listConfig',2,'List a Config',NULL,NULL,1667908213,1667908213),
('listEmployee',2,'List a Employee',NULL,NULL,1667908213,1667908213),
('listFlight',2,'List a Flight',NULL,NULL,1667908213,1667908213),
('listRefund',2,'List a Refund',NULL,NULL,1667908213,1667908213),
('listTariff',2,'List a Tariff',NULL,NULL,1667908213,1667908213),
('listTicket',2,'List a Ticket',NULL,NULL,1667908213,1667908213),
('readAdmin',2,'Read a Admin',NULL,NULL,1667908213,1667908213),
('readAirplane',2,'Read a Airplane',NULL,NULL,1667908213,1667908213),
('readAirport',2,'Read a Airport',NULL,NULL,1667908213,1667908213),
('readBalanceReq',2,'Read a BalanceReq',NULL,NULL,1667908213,1667908213),
('readClient',2,'Read a Client',NULL,NULL,1667908213,1667908213),
('readConfig',2,'Read a Config',NULL,NULL,1667908213,1667908213),
('readEmployee',2,'Read a Employee',NULL,NULL,1667908213,1667908213),
('readFlight',2,'Read a Flight',NULL,NULL,1667908213,1667908213),
('readRefund',2,'Read a Refund',NULL,NULL,1667908213,1667908213),
('readTariff',2,'Read a Tariff',NULL,NULL,1667908213,1667908213),
('readTicket',2,'Read a Ticket',NULL,NULL,1667908213,1667908213),
('supervisor',1,NULL,NULL,NULL,1667908213,1667908213),
('ticketOperator',1,NULL,NULL,NULL,1667908213,1667908213),
('updateAdmin',2,'Update a Admin',NULL,NULL,1667908213,1667908213),
('updateAirplane',2,'Update a Airplane',NULL,NULL,1667908213,1667908213),
('updateAirport',2,'Update a Airport',NULL,NULL,1667908213,1667908213),
('updateBalanceReq',2,'Update a BalanceReq',NULL,NULL,1667908213,1667908213),
('updateClient',2,'Update a Client',NULL,NULL,1667908213,1667908213),
('updateConfig',2,'Update a Config',NULL,NULL,1667908213,1667908213),
('updateEmployee',2,'Update a Employee',NULL,NULL,1667908213,1667908213),
('updateFlight',2,'Update a Flight',NULL,NULL,1667908213,1667908213),
('updateRefund',2,'Update a Refund',NULL,NULL,1667908213,1667908213),
('updateTariff',2,'Update a Tariff',NULL,NULL,1667908213,1667908213),
('updateTicket',2,'Update a Ticket',NULL,NULL,1667908213,1667908213);
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
('client','updateBalanceReq'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
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
  `arrivalDate` datetime NOT NULL,
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
('m140506_102106_rbac_init',1667386891),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1667386891),
('m180523_151638_rbac_updates_indexes_without_prefix',1667386891),
('m190124_110200_add_verification_token_column_to_user_table',1666799298),
('m200409_110543_rbac_update_mssql_trigger',1667386891);
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
  `status` enum('Complete','Refunded') DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  PRIMARY KEY (`id`),
  KEY `fk_employeeTicket_id` (`checkedIn`),
  KEY `fk_clientTicket_id` (`client_id`),
  KEY `fk_flight_id` (`flight_id`),
  KEY `fk_luggage_1` (`luggage_1`),
  KEY `fk_luggage_2` (`luggage_2`),
  KEY `fk_receipt_id` (`receipt_id`),
  CONSTRAINT `fk_clientTicket_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`user_id`),
  CONSTRAINT `fk_employeeTicket_id` FOREIGN KEY (`checkedIn`) REFERENCES `employees` (`user_id`),
  CONSTRAINT `fk_flight_id` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`),
  CONSTRAINT `fk_luggage_1` FOREIGN KEY (`luggage_1`) REFERENCES `configs` (`id`),
  CONSTRAINT `fk_luggage_2` FOREIGN KEY (`luggage_2`) REFERENCES `configs` (`id`),
  CONSTRAINT `fk_receipt_id` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'admin','tRmAX9Ui90tRYlGaVcbV8A51ivNxHwRw','$2y$13$/Clj2.AkHYqcihE40fa1A.XpBS8XjOvl0TX4rCaajFocG2jTknTNy',NULL,'admin@gmail.com',10,1666799925,1666799925,'PGF9gv1CFKHFwb2Xmhekqsqnkhc0zf3C_1666799925');
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

-- Dump completed on 2022-11-29 13:13:38
