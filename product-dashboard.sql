-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: product_dashboard
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,6,'Thank you.','2022-12-07 01:26:03','2022-12-07 01:26:03'),(2,1,6,'We Will update you for more.','2022-12-07 01:26:04','2022-12-07 01:26:04'),(3,1,8,'We have many stocks here. Would you want to order now?','2022-12-07 02:23:15','2022-12-07 02:23:15'),(4,1,5,'Thank you for feed. We are glad to satisfy your needs.','2022-12-07 02:38:54','2022-12-07 02:38:54'),(5,1,9,'Yes sir. We are happy to serve you again sir.\r\n','2022-12-07 05:55:39','2022-12-07 05:55:39'),(6,1,9,'Our product is still available. Would you like to order sir Michael?','2022-12-07 07:14:25','2022-12-07 07:14:25'),(7,1,3,'Yes sir. You can purchase it now.','2022-12-07 07:20:33','2022-12-07 07:20:33');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `inventory_count` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'V88 cap','stylish v88 cap available in any size. ',50,100,'2022-11-29 15:49:03','2022-11-29 15:49:03'),(2,'V88 T-shirt','Legit, comfortable V88 t-shirt available in any size.',250,120,'2022-11-29 15:49:03','2022-11-30 05:39:17'),(3,'V88 Towel','V88 version of towel.  ',30,50,'2022-11-29 21:23:54','2022-11-29 21:23:54'),(4,'V88 Keychain','Souvenir of your choice. V88 Keychain.',10,14,'2022-11-29 21:34:12','2022-11-30 05:39:32');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `review` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,2,'I want to buy again.','2022-12-01 02:17:30','2022-12-01 02:17:30'),(2,3,2,'This T-shirt is awesome do you have another stock?','2022-12-01 02:18:39','2022-12-01 02:18:39'),(3,3,3,'Do you also have a red color of towel?','2022-12-06 23:09:32','2022-12-06 23:09:32'),(4,2,1,'It was delivered on time. I really like this shirt.','2022-12-06 23:10:57','2022-12-06 23:10:57'),(5,2,1,'It was delivered on time. I really like this shirt.','2022-12-06 23:10:58','2022-12-06 23:10:58'),(6,3,4,'Nice keychain','2022-12-06 23:15:55','2022-12-06 23:15:55'),(7,2,4,'I want to buy again.','2022-12-06 23:18:32','2022-12-06 23:18:32'),(8,3,1,'I need one.','2022-12-06 23:19:59','2022-12-06 23:19:59'),(9,3,3,'Can I buy again?','2022-12-07 04:07:52','2022-12-07 04:07:52'),(10,3,2,'I like color blue.','2022-12-07 04:57:07','2022-12-07 04:57:07'),(11,2,4,'The staff was great. The seller was very helpful and answered all our questions.  Will order again!','2022-12-07 07:29:24','2022-12-07 07:29:24');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `qty_sold` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,60,'2022-11-29 15:49:03','2022-11-29 15:49:03'),(2,2,100,'2022-11-29 15:49:03','2022-11-29 15:49:03'),(3,3,50,'2022-11-29 21:23:54','2022-11-29 21:23:54'),(4,4,70,'2022-11-29 21:34:12','2022-11-29 21:34:12');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='				';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John Ronald','Santos','ron.garcia.santos@gmail.com','25f9e794323b453885f5181f1b624d0b','2022-11-27 03:37:44','2022-11-30 03:37:11'),(2,'Eric','Tomboc','erctomb@gmail.com','25f9e794323b453885f5181f1b624d0b','2022-11-27 04:11:37','2022-11-27 04:11:37'),(3,'Michael','Pajulio','michaelp@gmail.com','25f9e794323b453885f5181f1b624d0b','2022-11-27 22:16:50','2022-11-27 22:16:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-07  7:34:04
