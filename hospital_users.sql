-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: hospital
-- ------------------------------------------------------
-- Server version	5.7.43-log

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `id_r_fk` int(11) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_u`),
  KEY `id_r_fk_idx` (`id_r_fk`),
  CONSTRAINT `id_r_fk` FOREIGN KEY (`id_r_fk`) REFERENCES `role` (`id_r`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ahmed','e10adc3949ba59abbe56e057f20f883e',1,'21-1.jpg'),(2,'hassan','$2y$10$th.QEzKTDh9hOevlhKUqq.Z16xDGblDI17HTqyNCriQsu7fCKuJoO',1,'21-1.jpg'),(19,'gg','$2y$10$zuTHS1nxT61pNijdHqo2FeWKPqWkUB0xa6wQtyssiIhsLlpNetiZe',1,'1951768e7a0a6937da2c2df0b531d591.jpg'),(23,'ali','$2y$10$anrQdVQHqeptWYcLokRkYuj9JjXT/tUEHnLE93dJZiEifaRHa6sZG',1,'393132012_2031381100592605_8055284537722491297_n.jpg'),(25,'a2','$2y$10$Nk8w2T.JA4VlEmBGmtrfLuN33.GHMAQQKTPunnNEVVjfDph4WaSmO',1,'403415708_264393086620140_3405381311976102257_n.jpg'),(26,'a2','$2y$10$oB15KPkQhN35tvL7lPwPJ.6VXxtzD.waSyYYXMWLwOtRpfauDoV3K',1,'403415708_264393086620140_3405381311976102257_n.jpg'),(27,'a2','$2y$10$nA3aqINThIRR20d95PcMLeAt5g4BTdoVLHCrh1PnQR6UBdvbz6Bsa',1,'403415708_264393086620140_3405381311976102257_n.jpg'),(28,'a3','$2y$10$DshwY89qIvC8g6EoSOYSgeRRj9phGfBBVpJhqTpO.urnU/OrvB.YC',2,'1951768e7a0a6937da2c2df0b531d591.jpg'),(29,'a5','$2y$10$lz15BARatVOk12vNuQJtr.u6ibajM0aRm6kjBmPVsqTZYsTPUEElm',1,'2d59a1bb380ee26129134232cd555d20.jpg'),(30,'a5','$2y$10$0grft5HUsjP1RM/dcFK0xuv4jGdkGlt2av8fd9Hf2cc3aPNGMrJnu',1,'2d59a1bb380ee26129134232cd555d20.jpg'),(31,'a5','$2y$10$f9ipGx1wcVgUqqf4OTJdf.kMqfj0GmtYITTz7DIJeUf7hJ1kYDiMe',1,'2d59a1bb380ee26129134232cd555d20.jpg'),(32,'a5','$2y$10$maXfew.Jdeel7FlS3QGI5.i8Iz4aYnoVwRAlmo9WZZYZolHFFazQm',1,'2d59a1bb380ee26129134232cd555d20.jpg'),(33,'h2','$2y$10$h2AKIBlKj.PzmOon7R3/c.OqHD2gF99iAXLhWZxx90i9qIYTVWRx2',1,'ddd.jpg'),(34,'h2','$2y$10$wpTQLk/JiklHOPthuUwzD.dmmfjVDvpxG6vEUmQxoAgMgp66dlnLK',1,'ddd.jpg'),(35,'h2','$2y$10$Mulr7I6iAt6IREHsS9995Ogg2gXli/WItugmhjedyMANCd8NzpmyK',1,'ddd.jpg'),(51,'h1','e10adc3949ba59abbe56e057f20f883e',2,'403415708_264393086620140_3405381311976102257_n.jpg'),(54,'doctor2','e10adc3949ba59abbe56e057f20f883e',1,'download.jpg'),(55,'patient1','e10adc3949ba59abbe56e057f20f883e',2,'21-1.jpg'),(56,'hassan1','e10adc3949ba59abbe56e057f20f883e',2,'21-1.jpg');
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

-- Dump completed on 2024-06-24 23:51:10
