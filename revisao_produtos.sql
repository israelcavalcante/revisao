CREATE DATABASE  IF NOT EXISTS `revisao` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `revisao`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: revisao
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB

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
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `valor` double NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_produtos`),
  KEY `fk_produtos_modelo_idx` (`id_modelo`),
  KEY `fk_produtos_marca1_idx` (`id_marca`),
  CONSTRAINT `fk_produtos_marca1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_modelo` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Honda Titan',8000,'moto passeio',1,1,NULL),(2,'Yamaha Fazer',12000,'moto passeio',2,2,NULL),(3,'cb1000',32000,'moto corrida',3,3,NULL),(4,'cbx500',38000,'moto corrida',1,1,NULL),(5,'XR300',15000,'Moto para trilha',1,1,''),(6,'Hornet',32000,'moto corrida',1,1,'cb_600f_hornet_frente'),(9,'cb300',17500,'moto',1,1,'Honda-CB-300-R-2014-ficha-tecnica.jpg'),(10,'Fazer 250',13000,'passeio',2,2,'fazer 250 - 2010 - passeio.jpg');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-15 16:06:43
