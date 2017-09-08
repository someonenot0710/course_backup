-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: seminar_106fall
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `forum1`
--

DROP TABLE IF EXISTS `forum1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(32) NOT NULL DEFAULT '',
  `time` varchar(32) NOT NULL DEFAULT '',
  `content` text,
  `numLikes` int(16) NOT NULL DEFAULT '0',
  `likesFrom` varchar(9999) NOT NULL DEFAULT '',
  `isAnswered` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum1`
--

LOCK TABLES `forum1` WRITE;
/*!40000 ALTER TABLE `forum1` DISABLE KEYS */;
INSERT INTO `forum1` VALUES (13,'user02','2017-08-30 11:05:02','i am the first',0,'','\0'),(14,'user01','2017-08-30 11:05:17','hahahahaha',6,'user04,user05,admin,user01','\0'),(15,'admin','2017-08-30 11:05:59','doremifasolasido',1,'user05','\0'),(16,'user03','2017-08-31 10:58:49','ä¸­æ–‡æ¸¬è©¦',1,'user05','\0'),(17,'user01','2017-08-31 01:57:32','hihi',1,'user05','\0'),(18,'user05','2017-08-31 02:33:29','test',2,'user05,user04','\0'),(19,'user01','2017-08-31 02:56:25','aaa',1,'user05','\0'),(20,'','2017-08-31 06:54:23','',1,'user05','\0'),(21,'user01','2017-08-31 07:29:54','1234567',1,'user05','\0'),(22,'user01','2017-08-31 07:33:24','00000000000',3,'user02,user05,user01','\0'),(23,'user05','2017-09-07 01:47:09','5',4,'user05,user04,user02,user01','\0'),(24,'user05','2017-09-07 01:47:11','6',1,'user04','\0'),(25,'user05','2017-09-07 01:47:13','7',1,'user05','\0'),(26,'user05','2017-09-07 01:47:57','1',1,'user04','\0'),(27,'admin','2017-09-07 08:21:43','æ¸¬è©¦ä¸€ä¸‹',2,'admin,user02','\0'),(28,'admin','2017-09-07 08:50:06','',0,'','\0'),(29,'admin','2017-09-07 08:50:07','',0,'','\0'),(30,'admin','2017-09-07 08:50:15','',0,'','\0'),(31,'admin','2017-09-07 08:50:17','',0,'','\0'),(32,'admin','2017-09-07 09:15:12','',0,'','\0'),(33,'user02','2017-09-07 01:08:23','å—šå—šå—š',0,'','\0'),(34,'user02','2017-09-07 01:13:42','å°¾è¦å’ª',0,'','\0'),(35,'user02','2017-09-07 01:22:07','hello',0,'','\0'),(36,'user02','2017-09-07 01:22:18','hello',0,'','\0'),(37,'user02','2017-09-07 01:24:17','å“ˆå›‰å“ˆå›‰',0,'','\0'),(38,'user02','2017-09-07 01:26:12','å®‰å®‰å®‰å®‰',0,'','\0'),(39,'user02','2017-09-07 01:30:36','why?????????',0,'','\0'),(40,'user02','2017-09-07 01:32:57','oh no!!!!!!!!!!!!!!!!!!!!',1,'user02','\0'),(41,'user02','2017-09-07 01:38:02','fight',0,'','\0'),(42,'admin','2017-09-07 01:39:22','oh my god',0,'','\0'),(43,'admin','2017-09-07 01:43:33','why the messages are not shown?',0,'','\0'),(44,'admin','2017-09-07 01:55:35','asking question',0,'','\0'),(45,'admin','2017-09-07 02:10:43','whether it will success this time?',0,'','\0'),(46,'admin','2017-09-07 02:12:59','kerkerkerker',0,'','\0'),(47,'admin','2017-09-07 02:15:21','kerker2',0,'','\0'),(48,'user02','2017-09-07 02:21:23','why i have no right?',0,'','\0'),(49,'user02','2017-09-07 02:22:22','now i have right to post',0,'','\0'),(50,'user05','2017-09-07 02:25:51','alright',0,'','\0'),(51,'user01','2017-09-07 11:29:12','æœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Žæœƒè¶…éŽå—Ž',0,'','\0'),(52,'user01','2017-09-08 05:47:34','okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok',0,'','\0'),(53,'user04','2017-09-08 10:32:34','æˆåŠŸäº†å—Žï¼Ÿ',0,'','\0'),(54,'user01','2017-09-08 10:50:10','Yes',0,'','\0'),(55,'user01','2017-09-08 11:26:42','11111',0,'','\0');
/*!40000 ALTER TABLE `forum1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum2`
--

DROP TABLE IF EXISTS `forum2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `numLikes` int(16) NOT NULL,
  `likesFrom` varchar(9999) NOT NULL,
  `isAnswered` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum2`
--

LOCK TABLES `forum2` WRITE;
/*!40000 ALTER TABLE `forum2` DISABLE KEYS */;
INSERT INTO `forum2` VALUES (1,'user100','2017-08-30 11:05:59','abcdefg',1,'user02','\0'),(2,'user01','2017-08-31 07:35:10','0192938',3,'user02,user02,user01','\0'),(3,'user01','2017-08-31 07:49:05','asdasd',0,'','\0'),(4,'user03','2017-08-31 08:09:03','hello',3,'user02,user01','\0'),(5,'user01','2017-08-31 08:47:37','Popo',1,'user05','\0'),(6,'user02','2017-09-01 10:18:02','hahahahahahahahahaha',0,'','\0'),(7,'user01','2017-09-01 02:21:30','heeeeeeeelloooooooooooo',0,'','\0'),(8,'user02','2017-09-01 02:29:08','ok haha',1,'user02','\0'),(9,'user01','2017-09-06 11:29:32','assss',0,'','\0'),(10,'user01','2017-09-06 11:36:37','123123',0,'','\0'),(11,'user01','2017-09-06 11:38:19','3345678',0,'','\0'),(12,'user01','2017-09-06 11:39:31','fuck',0,'','\0'),(13,'user01','2017-09-06 11:40:15','test3',0,'','\0'),(14,'user01','2017-09-06 11:41:46','.....',0,'','\0'),(15,'user01','2017-09-06 11:45:12','123123123',0,'','\0'),(16,'user01','2017-09-06 11:51:23','098282723',0,'','\0'),(17,'user01','2017-09-06 11:52:57','asdasdasd',0,'','\0'),(18,'user01','2017-09-06 11:53:29','111123213',0,'','\0'),(19,'user01','2017-09-06 11:53:59','dasdasd',0,'','\0'),(20,'user01','2017-09-06 11:54:29','one',0,'','\0'),(21,'user01','2017-09-07 12:01:01','asdasds',0,'','\0'),(22,'user01','2017-09-07 12:04:46','1111123',0,'','\0'),(23,'user01','2017-09-07 12:09:04','yes',0,'','\0'),(24,'user01','2017-09-07 12:11:25','123123213',0,'','\0'),(25,'user05','2017-09-07 12:59:52','asdsadasd',0,'','\0'),(26,'user05','2017-09-07 01:00:24','asdasdqw',0,'','\0'),(27,'user05','2017-09-07 01:01:36','1212eqsdasd',0,'','\0'),(28,'user05','2017-09-07 01:02:05','123123123',0,'','\0'),(29,'user01','2017-09-07 01:02:36','123123123',0,'','\0'),(30,'user05','2017-09-07 01:05:11','123123sadd',0,'','\0'),(31,'user05','2017-09-07 01:05:32','å†ä¸€æ¬¡',0,'','\0'),(32,'user05','2017-09-07 01:05:40','12312asdasd',0,'','\0'),(33,'user05','2017-09-07 01:05:44','sadasd2312',0,'','\0'),(34,'user05','2017-09-07 01:05:55','ä¸­æ–‡æ€Žéº¼äº†',0,'','\0'),(35,'user05','2017-09-07 01:06:10','ä¸­æ–‡ä¸èƒ½ï¼ï¼',0,'','\0'),(36,'user05','2017-09-07 01:06:16','å‚»çœ¼äº†',0,'','\0'),(37,'user05','2017-09-07 01:06:23','å‰›å‰›æ˜¯æ€Žéº¼äº†ï¼',0,'','\0'),(38,'user05','2017-09-07 01:09:12','1',0,'','\0'),(39,'user05','2017-09-07 01:37:26','abcde',0,'','\0'),(40,'user05','2017-09-07 01:37:41','123',0,'','\0'),(41,'user05','2017-09-07 01:38:43','111',0,'','\0'),(42,'user01','2017-09-07 01:42:54','123',0,'','\0'),(43,'user01','2017-09-07 01:43:08','000000',0,'','\0'),(44,'user05','2017-09-07 01:46:38','1',0,'','\0'),(45,'user05','2017-09-07 01:46:42','2',0,'','\0'),(46,'user05','2017-09-07 01:46:44','3',0,'','\0'),(47,'user05','2017-09-07 01:46:45','4',0,'','\0'),(48,'user02','2017-09-07 01:13:08','å°¾è¦å¯†',0,'','\0');
/*!40000 ALTER TABLE `forum2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talks`
--

DROP TABLE IF EXISTS `talks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talks` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `lecturer` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `syllabus` varchar(4096) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(4096) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `img` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talks`
--

LOCK TABLES `talks` WRITE;
/*!40000 ALTER TABLE `talks` DISABLE KEYS */;
INSERT INTO `talks` VALUES (1,'多層式結構來看生醫訊號-蕭子健','2017/9/15','大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱大綱','http://140.114.77.130/course_chen/talk.php?1','cat.JPG'),(2,'海生館的珊瑚胞內共生研究-陳啟祥','2017/9/20','還是大綱還是大綱還是大綱還是大綱還是大綱還是大綱還是大綱還是大綱還是大綱還是大綱','http://140.114.77.130/course_chen/talk.php?2','dog.JPG');
/*!40000 ALTER TABLE `talks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `acc` char(11) NOT NULL DEFAULT '',
  `pswd` char(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '',
  `isAdmin` bit(1) NOT NULL DEFAULT b'0',
  `thumb1` int(11) NOT NULL,
  `publish1` int(11) NOT NULL,
  `thumb2` int(11) NOT NULL,
  `publish2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user02','8bd108c8a01a892d129c52484ef97a0d','user02','\0',10,10,10,10),(2,'user01','b75705d7e35e7014521a46b532236ec3','user01','\0',9,9,10,10),(3,'admin','1d3cb090b87f0469a0757795cf6e08de','admin','',10,10,10,10),(4,'user03','a7d39043afa25be5cc235d943b64917a','user03','\0',10,10,10,10),(5,'user04','9e3526e252e6d5914ec1bdaabc680436','user04','\0',10,10,10,10),(6,'user05','fe510823ea9f953fbc758c714247a63b','user05','\0',10,10,10,10);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-08 11:41:56
