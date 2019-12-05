CREATE DATABASE  IF NOT EXISTS `tbl_identificacao` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tbl_identificacao`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tbl_identificacao
-- ------------------------------------------------------
-- Server version	5.6.45-log

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
-- Table structure for table `curiosidades`
--

DROP TABLE IF EXISTS `curiosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curiosidades` (
  `id_curiosidade` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) NOT NULL,
  `titulo_curiosidade` varchar(45) NOT NULL,
  `texto_curiosidade` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_curiosidade`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curiosidades`
--

LOCK TABLES `curiosidades` WRITE;
/*!40000 ALTER TABLE `curiosidades` DISABLE KEYS */;
INSERT INTO `curiosidades` VALUES (6,'bedea535dbee033931d75eb4415c4f84.jpg','Sabe onde surgiu a pizza?','Foram os italianos que a criaram, mas a chegada do ancestral da pizza Ã  ItÃ¡lia ainda Ã© um mistÃ©rio.',1),(7,'8327fa8cc825ac06a9050eb8d30c798c.jpg','Teste','teste de Curiosidades no site com mais de uma curiosidade',1);
/*!40000 ALTER TABLE `curiosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nv`
--

DROP TABLE IF EXISTS `tbl_nv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_nv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) NOT NULL,
  `nv_1` int(11) NOT NULL,
  `nv_2` int(11) NOT NULL,
  `nv_3` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nv`
--

LOCK TABLES `tbl_nv` WRITE;
/*!40000 ALTER TABLE `tbl_nv` DISABLE KEYS */;
INSERT INTO `tbl_nv` VALUES (1,'Administrador Geral',1,1,1,1),(2,'Administrador de UsuÃ¡rio',1,0,0,1),(3,'Administrador de conteÃºdo',0,1,0,1),(11,'Administrador de Feedback',0,0,1,1);
/*!40000 ALTER TABLE `tbl_nv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_idx` (`fk_id`),
  CONSTRAINT `fk_id` FOREIGN KEY (`fk_id`) REFERENCES `tbl_nv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (4,'Guilherme','Admin','21232f297a57a5a743894a0e4a801fc3',1,'1');
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontato`
--

DROP TABLE IF EXISTS `tblcontato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `logadouro` varchar(80) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `tipo_opn` varchar(45) NOT NULL,
  `mensagem` varchar(45) NOT NULL,
  `profissao` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontato`
--

LOCK TABLES `tblcontato` WRITE;
/*!40000 ALTER TABLE `tblcontato` DISABLE KEYS */;
INSERT INTO `tblcontato` VALUES (3,'Guilherme','sdad','senai@teste.com','m','2002-04-02','Joaquim Alvarenga','160','teste','Jandira','sugestao','dasdas','Programador sd','(312)3123-1231'),(5,'Davi','123','teste@senai.com','m','1999-11-12','teste','123','SÃ£o Paulo','Jandira','critica','Legal... tÃ¡ funcionando','Programador','(011)9999-9999'),(6,'VitÃ³ria','123','teste@senai.com','f','1990-11-02','teste','799','Bahia','ArapuÃ¡','critica','Testando... 123','Programadora','(011)9999-9999');
/*!40000 ALTER TABLE `tblcontato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tbl_identificacao'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-18 21:23:46
