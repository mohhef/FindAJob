-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: comp353a1
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `email` varchar(50) NOT NULL,
  `author_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `bookstore`
--

DROP TABLE IF EXISTS `bookstore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookstore` (
  `bs_id` varchar(10) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `bookstore_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `ISBN` varchar(50) NOT NULL,
  `publisher_number` varchar(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `cost_price` decimal(10,0) DEFAULT NULL,
  `book_subject` varchar(50) DEFAULT NULL,
  `Selling_price` varchar(50) DEFAULT NULL,
  `bs_id` varchar(10) NOT NULL,

  PRIMARY KEY (`ISBN`),
  KEY `publisher_number` (`publisher_number`),
  KEY `bs_id` (`bs_id`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`publisher_number`) REFERENCES `publisher_branch` (`publisher_number`),
  CONSTRAINT `book_ibfk_2` FOREIGN KEY (`bs_id`) REFERENCES `bookstore` (`bs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `book_order`
--

DROP TABLE IF EXISTS `book_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_order` (
  `order_id` varchar(10) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `qty` int,
  `arrival_date` date,
  PRIMARY KEY (`order_id`,`ISBN`),
  KEY `ISBN` (`ISBN`),
  CONSTRAINT `book_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  CONSTRAINT `book_order_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `cid` varchar(10),
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `telephone_number` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cumulative_purchases` int DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `interested_in`
--

DROP TABLE IF EXISTS `interested_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interested_in` (
  `category_name` varchar(50) NOT NULL,
  `cid` varchar(10) NOT NULL,
  PRIMARY KEY (`category_name`,`cid`),
  KEY `cid` (`cid`),
  CONSTRAINT `interested_in_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `reader_interest` (`category_name`),
  CONSTRAINT `interested_in_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_from`
--

DROP TABLE IF EXISTS `order_from`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_from` (
  `branch_name` varchar(50) NOT NULL,
  `publisher_number` varchar(10) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  PRIMARY KEY (`branch_name`,`publisher_number`,`order_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_from_ibfk_1` FOREIGN KEY (`branch_name`, `publisher_number`) REFERENCES `publisher_branch` (`branch_name`, `publisher_number`),
  CONSTRAINT `order_from_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` varchar(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `publisher_number` varchar(10) NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `telephone_number` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`publisher_number`),
  KEY `email_address` (`email_address`),
  CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`email_address`) REFERENCES `representative` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `publisher_branch`
--

DROP TABLE IF EXISTS `publisher_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher_branch` (
  `branch_name` varchar(50) NOT NULL,
  `publisher_number` varchar(10) NOT NULL,
  `telephone_number` varchar(50) DEFAULT NULL,
  `rep_email_address` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`branch_name`,`publisher_number`),
  KEY `publisher_number` (`publisher_number`),
  KEY `rep_email_address` (`rep_email_address`),
  CONSTRAINT `publisher_branch_ibfk_1` FOREIGN KEY (`publisher_number`) REFERENCES `publisher` (`publisher_number`),
  CONSTRAINT `publisher_branch_ibfk_2` FOREIGN KEY (`rep_email_address`) REFERENCES `representative` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reader_interest`
--

DROP TABLE IF EXISTS `reader_interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reader_interest` (
  `category_name` varchar(50) NOT NULL,
  `interest_description` varchar(200) DEFAULT NULL,
  `bs_id` varchar(10) NOT NULL,
  PRIMARY KEY (`category_name`),
  KEY `bs_id` (`bs_id`),
  CONSTRAINT `reader_interest_ibfk_1` FOREIGN KEY (`bs_id`) REFERENCES `bookstore` (`bs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `representative`
--

DROP TABLE IF EXISTS `representative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `representative` (
  `email_address` varchar(50) NOT NULL,
  `representative_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sale_to`
--

DROP TABLE IF EXISTS `sale_to`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_to` (
  `ISBN` varchar(50) NOT NULL,
  `cid` varchar(10) NOT NULL ,
  `Transaction_id` varchar(10) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Order_date` date DEFAULT NULL,
  PRIMARY KEY (`ISBN`,`cid`,`Transaction_id`),
  KEY `cid` (`cid`),
  CONSTRAINT `sale_to_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  CONSTRAINT `sale_to_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_order`
--

DROP TABLE IF EXISTS `special_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_order` (
  `order_id` varchar(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `cid` varchar(10) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `publisher_number` varchar(10) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`),
  CONSTRAINT `special_order_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`),
  CONSTRAINT `special_order_ibfk_2` FOREIGN KEY (`branch_name`,`publisher_number`) REFERENCES `publisher_branch`(`branch_name`,`publisher_number`),
  CONSTRAINT `special_order_ibfk_3` FOREIGN KEY (`ISBN`) REFERENCES `book`(`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stores` (
  `ISBN` varchar(50) NOT NULL,
  `bs_id` varchar(10) NOT NULL,
  `Quantity_on_hand` int(11) DEFAULT NULL,
  PRIMARY KEY (`ISBN`,`bs_id`),
  KEY `bs_id` (`bs_id`),
  CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`bs_id`) REFERENCES `bookstore` (`bs_id`),
  CONSTRAINT `stores_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `written_by`
--

DROP TABLE IF EXISTS `written_by`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `written_by` (
  `ISBN` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`ISBN`,`email`),
  KEY `email` (`email`),
  CONSTRAINT `written_by_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  CONSTRAINT `written_by_ibfk_2` FOREIGN KEY (`email`) REFERENCES `author` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-15  3:03:47
