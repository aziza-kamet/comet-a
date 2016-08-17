-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: comet_a
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `wall_id` int(10) NOT NULL,
  `comment` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,2,1,'comment','2015-06-12 07:06:34',0),(2,2,2,'sdfghjkl;','2015-06-12 07:24:51',1),(3,3,8,'Be ready','2015-06-15 06:01:37',0),(4,3,3,'hehey','2015-06-15 06:09:57',0),(5,3,7,'blablabla','2015-06-15 06:11:38',0),(6,3,7,'asd','2015-06-15 06:17:45',1),(7,1,7,'zxcv','2015-06-21 05:32:04',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_g`
--

DROP TABLE IF EXISTS `comments_g`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_g` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `wall_id` int(10) NOT NULL,
  `comment` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` int(1) NOT NULL,
  `as_admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_g`
--

LOCK TABLES `comments_g` WRITE;
/*!40000 ALTER TABLE `comments_g` DISABLE KEYS */;
INSERT INTO `comments_g` VALUES (1,3,7,'qwerty','2015-06-15 06:14:26',0,1),(2,3,5,'qwerty','2015-06-15 06:16:36',0,0),(3,3,5,'asdfg','2015-06-15 06:16:34',0,0),(4,3,7,'asdf','2015-06-15 06:23:51',0,0),(5,3,7,'zxcvb','2015-06-15 06:23:50',0,0),(6,3,5,'wesdxcgbhjk','2015-06-15 06:23:53',0,0),(7,2,7,'some comments','2015-06-21 05:15:14',0,0),(8,1,7,'qwertyu','2015-06-21 05:29:09',0,0),(9,1,5,'qwertyu','2015-06-21 05:30:22',1,0),(10,2,7,'asdfgh','2015-06-21 05:30:47',1,0);
/*!40000 ALTER TABLE `comments_g` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `f_id` int(10) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (1,2,3,1),(2,3,2,1),(3,1,2,1),(4,2,1,1),(5,1,3,1),(6,3,1,1),(7,1,5,1),(8,5,1,1),(9,2,5,1),(10,5,2,1);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `a_id` int(10) NOT NULL,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,3,'Muse',' Alternative-rock music band','1g.jpg','2015-06-11 23:15:26',1),(2,2,'IITU','The best university in KZ','default.png','2015-06-12 03:37:35',1);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `from_id` int(10) NOT NULL,
  `to_id` int(10) NOT NULL,
  `text` longtext NOT NULL,
  `f_d` int(1) NOT NULL,
  `t_d` int(1) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_readen` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,2,3,'hello',1,1,'2015-06-11 22:55:28',0),(2,3,2,'hi',1,1,'2015-06-11 22:55:41',0),(3,2,3,'how are you?',1,1,'2015-06-11 22:55:52',0),(4,3,2,'okay',1,1,'2015-06-11 22:56:02',0),(5,3,2,'you?',1,1,'2015-06-11 22:56:11',0),(6,2,3,'too',1,1,'2015-06-11 22:56:20',0),(7,3,2,'blablabla\r\n',1,1,'2015-06-12 06:46:26',0),(8,3,2,'bla\r\n',1,1,'2015-06-12 07:13:19',0),(9,2,3,'siudgawiug',1,1,'2015-06-12 07:14:44',0),(10,3,2,'qwertyu',1,1,'2015-06-12 07:46:29',0),(11,2,3,'heeeeey',1,1,'2015-06-12 07:51:36',0),(12,3,2,'hey',1,1,'2015-06-12 07:59:03',0),(13,3,2,'Hello',0,0,'2015-06-15 06:59:39',0),(14,2,3,'hi',0,0,'2015-06-15 07:00:11',0),(15,5,2,'priveeeeet',0,0,'2015-06-21 06:06:23',0),(16,2,5,'privet)',0,0,'2015-06-21 06:06:43',0),(17,2,1,'privet',0,0,'2015-06-21 06:07:21',0),(18,1,2,'hi',0,0,'2015-06-21 06:07:37',0),(19,2,5,'kak ty?',0,0,'2015-06-21 06:19:08',0),(20,2,1,'qwerty',0,0,'2015-06-21 06:21:55',0),(21,2,3,'qwer',0,0,'2015-06-21 06:26:04',0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `w_id` int(10) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,3,2,'2015-06-15 03:59:13'),(2,3,3,'2015-06-15 03:59:59'),(3,3,1,'2015-06-15 04:00:21'),(4,2,3,'2015-06-15 04:38:26'),(5,2,1,'2015-06-15 04:38:32'),(6,1,4,'2015-06-15 04:40:56'),(7,1,2,'2015-06-15 04:40:59'),(8,1,3,'2015-06-15 04:51:14'),(9,1,1,'2015-06-15 04:51:16'),(10,1,15,'2015-06-21 13:02:42'),(11,3,14,'2015-06-22 16:54:45');
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings_group`
--

DROP TABLE IF EXISTS `ratings_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `wg_id` int(10) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings_group`
--

LOCK TABLES `ratings_group` WRITE;
/*!40000 ALTER TABLE `ratings_group` DISABLE KEYS */;
INSERT INTO `ratings_group` VALUES (1,3,2,'2015-06-15 04:03:51'),(2,3,3,'2015-06-15 04:04:17'),(3,2,4,'2015-06-15 04:55:48'),(4,2,5,'2015-06-15 04:55:50'),(5,2,1,'2015-06-15 04:58:02'),(6,2,3,'2015-06-15 04:58:05'),(7,2,2,'2015-06-15 04:59:29'),(8,3,7,'2015-06-15 06:24:03'),(9,3,11,'2015-06-21 18:10:28');
/*!40000 ALTER TABLE `ratings_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `f_id` int(10) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,3,2,'2015-06-11 21:15:44',2),(2,3,1,'2015-06-12 07:56:01',2),(3,2,1,'2015-06-21 06:00:40',2),(4,5,2,'2015-06-21 06:04:29',2),(5,5,1,'2015-06-21 06:04:51',2),(6,5,2,'2015-06-21 06:05:55',2),(7,5,2,'2015-06-21 06:06:06',2);
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `g_id` int(10) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,3,1,0),(2,2,1,0),(3,2,2,0),(4,3,1,1),(5,1,2,0),(6,1,1,0),(7,1,2,1),(8,1,1,0),(9,1,1,0),(10,2,1,0),(11,2,2,0),(12,2,1,0),(13,3,2,0),(14,2,2,0),(15,2,1,0),(16,2,2,1),(17,2,1,0),(18,2,1,1),(19,3,2,0),(20,3,2,0),(21,3,2,1),(22,1,1,1),(23,4,1,1);
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `age` varchar(3) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'koala@gmail.com','31415','Asylkhan','Raiskhanov','1.jpg','18','Astana',1),(2,'assel@gmail.com','123','Assel','Salavatova','2.jpg','19','Almaty',1),(3,'cooper@gmail.com','31415','Mukhamed','Issa','3.jpg','17','Almaty',1),(4,'risingkratos@gmail.com','kampfer16777216','Muslim','Beibytuly','default.png','18','Almaty',1),(5,'kameta96@gmail.com','271828','Aziza','Kamet','default.png','18','Almaty',1),(6,'mail@e-mail.com','1','name','surname','default.png','13','city',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wall`
--

DROP TABLE IF EXISTS `wall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wall` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `author_id` int(10) NOT NULL,
  `text` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(50) NOT NULL,
  `with_img` int(1) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wall`
--

LOCK TABLES `wall` WRITE;
/*!40000 ALTER TABLE `wall` DISABLE KEYS */;
INSERT INTO `wall` VALUES (1,2,2,'Panda','2015-06-11 18:09:29','2w0.jpg',1,0),(2,1,2,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit,\r\nsed diam nonummy nibh euismod tincidunt ut laoreet dolore\r\nmagna aliquam erat volutpat. ','2015-06-11 18:11:17','2w1.jpg',1,0),(3,2,1,'Claritas est etiam processus dynamicus, qui sequitur mutationem\r\nconsuetudium lectorum. Mirum est notare quam littera gothica,\r\nquam nunc putamus parum claram, anteposuerit litterarum formas\r\nhumanitatis per seacula quarta decima et quinta decima. Eodem\r\nmodo typi, qui nunc nobis videntur parum clari, fiant sollemnes\r\nin futurum','2015-06-11 18:15:14','1w0.jpg',1,1),(4,1,3,'piiiiiii','2015-06-12 03:54:58','3w0.jpg',1,0),(5,2,2,'','2015-06-15 05:35:44','2w2.jpg',1,1),(6,1,3,'Power of PI','2015-06-15 05:45:48','3w1.jpg',1,0),(7,1,3,'Power of PI','2015-06-15 05:46:45','3w2.jpg',1,1),(8,3,3,'','2015-06-15 06:01:22','3w3.jpg',1,1),(9,2,2,'','2015-06-21 09:49:51','default.png',0,0),(10,2,2,'','2015-06-21 09:50:24','2w4.png',1,0),(11,2,2,'','2015-06-21 09:54:11','default.png',0,0),(12,2,2,'text','2015-06-21 09:54:39','2w6.png',1,0),(13,2,2,'qwerty','2015-06-21 09:55:59','default.png',0,0),(14,2,2,'Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum','2015-06-21 09:58:11','default.png',0,1),(15,1,2,'The display property also allows the author to show or hide an element. It is similar to the visibility property. However, if you set display:none, it hides the entire element, while visibility:hidden means that the contents of the element will be invisible, but the element stays in its original position and size.','2015-06-21 12:53:04','default.png',0,1);
/*!40000 ALTER TABLE `wall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wall_group`
--

DROP TABLE IF EXISTS `wall_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wall_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_id` int(10) NOT NULL,
  `author_id` int(10) NOT NULL,
  `text` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(50) NOT NULL,
  `with_img` int(1) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wall_group`
--

LOCK TABLES `wall_group` WRITE;
/*!40000 ALTER TABLE `wall_group` DISABLE KEYS */;
INSERT INTO `wall_group` VALUES (1,1,3,'','2015-06-14 14:38:18','3wg0.jpg',1,0),(2,1,3,'','2015-06-14 14:39:12','3wg1.jpg',1,0),(3,1,3,'test with some text','2015-06-14 14:39:33','3wg2.jpg',1,1),(4,2,2,'','2015-06-14 14:40:11','2wg0.jpg',1,1),(5,2,2,'','2015-06-15 04:55:13','2wg1.jpg',1,1),(6,1,3,'','2015-06-15 05:09:13','3wg3.jpg',1,0),(7,1,3,'Enjoy new album','2015-06-15 05:59:57','3wg4.jpg',1,1),(10,1,2,'Ð±Ð»Ð°Ð±Ð»Ð°Ð±Ð»Ð°','2015-06-21 18:03:02','',0,0),(11,1,2,'Ð¹Ñ†ÑƒÐºÐµ56Ð½ÑˆÑ‰Ð·Ñ…ÑŠ','2015-06-21 18:07:38','default.png',0,0);
/*!40000 ALTER TABLE `wall_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-12 13:28:47
