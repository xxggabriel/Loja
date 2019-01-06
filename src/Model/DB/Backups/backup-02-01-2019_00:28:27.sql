-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: db_loja
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `tb_address`
--

DROP TABLE IF EXISTS `tb_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_address` (
  `id_address` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `CEP` int(11) NOT NULL,
  `street` varchar(128) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `sector` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_address`),
  KEY `fk_address_status_idx` (`status`),
  KEY `fk_address_id_user_idx` (`id_user`),
  CONSTRAINT `fk_address_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_address_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_address`
--

LOCK TABLES `tb_address` WRITE;
/*!40000 ALTER TABLE `tb_address` DISABLE KEYS */;
INSERT INTO `tb_address` VALUES (1,1,85355456,'15',22,46,'Esmeraldas dos condominios','Goias','Goiania',1),(2,2,74355456,'51',11,64,'Condominio das esmeraldas','Goiânia','Goias',1);
/*!40000 ALTER TABLE `tb_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_brand`
--

DROP TABLE IF EXISTS `tb_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name_brand` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_brand`),
  KEY `fk_brand_status_idx` (`status`),
  CONSTRAINT `fk_brand_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_brand`
--

LOCK TABLES `tb_brand` WRITE;
/*!40000 ALTER TABLE `tb_brand` DISABLE KEYS */;
INSERT INTO `tb_brand` VALUES (1,'Caneca Mania',1),(2,'HypeX',1);
/*!40000 ALTER TABLE `tb_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cart`
--

DROP TABLE IF EXISTS `tb_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cart` (
  `session` varchar(150) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ammount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`session`),
  KEY `fk_cart_product_idx` (`id_product`),
  KEY `fk_cart_user_idx` (`id_user`),
  KEY `fk_cart_status_idx` (`status`),
  CONSTRAINT `fk_cart_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cart`
--

LOCK TABLES `tb_cart` WRITE;
/*!40000 ALTER TABLE `tb_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_delivery`
--

DROP TABLE IF EXISTS `tb_delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_delivery` (
  `id_delivery` int(11) NOT NULL AUTO_INCREMENT,
  `id_sale` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_delivery`),
  KEY `fk_delivery_sale_idx` (`id_sale`),
  KEY `fk_delivery_status_idx` (`status`),
  CONSTRAINT `fk_delivery_id_sale` FOREIGN KEY (`id_sale`) REFERENCES `tb_sale` (`id_sale`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_delivery_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_delivery`
--

LOCK TABLES `tb_delivery` WRITE;
/*!40000 ALTER TABLE `tb_delivery` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_product`
--

DROP TABLE IF EXISTS `tb_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_provider` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL COMMENT 'Para referenciar com o tipo de produto, coo camiseta,caneca, etc.',
  `name_product` varchar(100) DEFAULT NULL,
  `value` float(4,2) DEFAULT '0.00',
  `value_cost` float(4,2) DEFAULT '0.00',
  `amount` int(11) DEFAULT '0',
  `status_product` int(11) DEFAULT '1',
  PRIMARY KEY (`id_product`),
  KEY `fk_product_type_idx` (`id_type`),
  KEY `fk_product_provider_idx` (`id_provider`),
  KEY `fk_product_brand_idx` (`id_brand`),
  KEY `ky_product_status_idx` (`status_product`),
  CONSTRAINT `fk_product_id_brand` FOREIGN KEY (`id_brand`) REFERENCES `tb_brand` (`id_brand`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_id_provider` FOREIGN KEY (`id_provider`) REFERENCES `tb_provider` (`id_provider`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_id_type` FOREIGN KEY (`id_type`) REFERENCES `tb_type` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_status` FOREIGN KEY (`status_product`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_product`
--

LOCK TABLES `tb_product` WRITE;
/*!40000 ALTER TABLE `tb_product` DISABLE KEYS */;
INSERT INTO `tb_product` VALUES (1,1,1,1,'harry potter ',29.99,11.22,100,1),(2,1,1,1,'Caneca Home de ferro',29.99,11.22,5,1),(3,1,1,1,'Caneca Huck',29.99,11.22,9,1),(4,1,1,1,'Livro João e o pé de feijão',30.00,12.89,2,1),(5,1,1,2,'Como ficar rico',16.89,9.58,26,1),(6,2,1,1,'Caneca termossensivel harry potter grifinoria',59.98,9.89,57,1);
/*!40000 ALTER TABLE `tb_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_product_sample`
--

DROP TABLE IF EXISTS `tb_product_sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_product_sample` (
  `id_product_sample` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_product_sample`),
  KEY `fk_product_sample_status_idx` (`status`),
  KEY `fk_product_sample_id_product_idx` (`id_product`),
  CONSTRAINT `fk_product_sample_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_sample_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_product_sample`
--

LOCK TABLES `tb_product_sample` WRITE;
/*!40000 ALTER TABLE `tb_product_sample` DISABLE KEYS */;
INSERT INTO `tb_product_sample` VALUES (21,1,'Hellypoter','<p>Ok</p>\r\n','http://localhost:8888/resource/upload/2018-12-12-nome-do-site-harry-potter-e-o-enigma-do-principe.jpg','hwllo',1),(22,6,'Caneca termossensivel harry potter grifinoria','Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria','http://localhost:8888/resource/upload/2018-12-12-nome-do-site-Caneca-termossensivel-harry-potter-grifinoria.jpg','caneca-termossensivel-harry-potter-grifinoria',1),(23,6,'Caneca termossensivel harry potter grifinoria','Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria','','caneca-termossensivel-harry-potter-grifinoria',1),(24,6,'Caneca termossensivel harry potter grifinoria','Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria','','caneca-termossensivel-harry-potter-grifinoria',1),(25,6,'Caneca termossensivel harry potter grifinoria','Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria Caneca termossensivel harry potter grifinoria','','caneca-termossensivel-harry-potter-grifinoria',1),(26,4,'João e o pé de Feijão','','http://localhost:8888/resource/upload/2019-01-01-nome-do-site-51y9jYu2XTL._SX431_BO1,204,203,200_.jpg','/Joao-pe-Feijao-Flavio-Souza',1);
/*!40000 ALTER TABLE `tb_product_sample` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_provider`
--

DROP TABLE IF EXISTS `tb_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_provider` (
  `id_provider` int(11) NOT NULL AUTO_INCREMENT,
  `name_provider` varchar(128) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `cnpj` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_provider`),
  KEY `fk_provider_status_idx` (`status`),
  CONSTRAINT `fk_tb_provider_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_provider`
--

LOCK TABLES `tb_provider` WRITE;
/*!40000 ALTER TABLE `tb_provider` DISABLE KEYS */;
INSERT INTO `tb_provider` VALUES (1,'Aço Italia','2147483647',NULL,0),(2,'Cocacola','2147483647','45.997.418/0001-53',1),(3,'Cocacola','2147483647','',0),(4,'Google','62991691823','06.990.590/0001-23 ',1);
/*!40000 ALTER TABLE `tb_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_recover_password_user`
--

DROP TABLE IF EXISTS `tb_recover_password_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_recover_password_user` (
  `id_user` int(11) NOT NULL,
  `token` varchar(60) DEFAULT NULL,
  `date` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`),
  KEY `fk_recover_password_user_status_idx` (`status`),
  CONSTRAINT `fk_recover_password_user_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_recover_password_user_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_recover_password_user`
--

LOCK TABLES `tb_recover_password_user` WRITE;
/*!40000 ALTER TABLE `tb_recover_password_user` DISABLE KEYS */;
INSERT INTO `tb_recover_password_user` VALUES (2,'5f3eecc7cf9c00780a9ee006673969db52c1375907ce390cebbdfab21afd','2018-12-11 01:36:39.000000',1);
/*!40000 ALTER TABLE `tb_recover_password_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sale`
--

DROP TABLE IF EXISTS `tb_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sale` (
  `id_sale` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_sale`),
  UNIQUE KEY `session_UNIQUE` (`session`),
  KEY `fk_sale_cart_session_idx` (`session`),
  KEY `fk_sale_status_idx` (`status`),
  CONSTRAINT `fk_sale_cart_session` FOREIGN KEY (`session`) REFERENCES `tb_cart` (`session`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sale`
--

LOCK TABLES `tb_sale` WRITE;
/*!40000 ALTER TABLE `tb_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_session`
--

DROP TABLE IF EXISTS `tb_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_session` (
  `id_user` int(11) NOT NULL,
  `session` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`),
  KEY `fk_session_status_idx` (`status`),
  CONSTRAINT `fk_session_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_session`
--

LOCK TABLES `tb_session` WRITE;
/*!40000 ALTER TABLE `tb_session` DISABLE KEYS */;
INSERT INTO `tb_session` VALUES (1,'geca-gessicasouzarocha@outlock.com',1),(2,'SESSION-admin09-12-2018-05:57',1),(3,'edson-edosonsouza@gmail.com',1),(12,'drica-drica@gmail.com',1);
/*!40000 ALTER TABLE `tb_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_status`
--

DROP TABLE IF EXISTS `tb_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status`
--

LOCK TABLES `tb_status` WRITE;
/*!40000 ALTER TABLE `tb_status` DISABLE KEYS */;
INSERT INTO `tb_status` VALUES (0,'Desativada','alguma atividade falsa'),(1,'Ativo','algumas aitidade verdadeira'),(2,'User','Usuario Padrão'),(3,'Admin','Administrador do site');
/*!40000 ALTER TABLE `tb_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_type`
--

DROP TABLE IF EXISTS `tb_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(128) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_type`),
  KEY `fk_type_status_idx` (`status`),
  CONSTRAINT `fk_type_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_type`
--

LOCK TABLES `tb_type` WRITE;
/*!40000 ALTER TABLE `tb_type` DISABLE KEYS */;
INSERT INTO `tb_type` VALUES (1,'Caneca','Canecas personalizadas ',NULL),(2,'Livros','Livro de todos os seguimantos',0),(6,'Carrilho','Carrilho de corrida(Não é de controle remoto)',1),(8,'Boneca','Bonecas femeninas',0);
/*!40000 ALTER TABLE `tb_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_address` int(11) DEFAULT NULL,
  `name_user` varchar(128) DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT '2',
  PRIMARY KEY (`id_user`),
  KEY `fk_user_status_idx` (`status`),
  CONSTRAINT `fk_user_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,1,'Gessica Souza','geca','gessicasouzarocha@outlock.com','1458586','$2y$10$MIY/mF0HZV5dSxDR7utiaeglYXbS/ARsNUmtCXaRZR7dSzYtl.qPS',2),(2,2,'Gabriel Oliveira','admin','gabrieloliveradesouza9@gmail.com','991691823','$2y$10$MIY/mF0HZV5dSxDR7utiaeglYXbS/ARsNUmtCXaRZR7dSzYtl.qPS',3),(3,NULL,'Edson Souza','edson','edosonsouza@gmail.com',NULL,'$2y$10$MIY/mF0HZV5dSxDR7utiaeglYXbS/ARsNUmtCXaRZR7dSzYtl.qPS',2),(4,NULL,'Renan','renan','renan@gmail.com',NULL,'$2y$10$MIY/mF0HZV5dSxDR7utiaeglYXbS/ARsNUmtCXaRZR7dSzYtl.qPS',2),(5,NULL,'Daine Oliveira De Souza','daine','daine@gmail.com','','$2y$10$MIY/mF0HZV5dSxDR7utiaeglYXbS/ARsNUmtCXaRZR7dSzYtl.qPS',2),(12,NULL,'Drica Neves','drica','drica@gmail.com',NULL,'$2y$10$C8jeR569TJV/7D.g2EeXDuKdhjvPc5WwHmd1712Vv1E7C03KWS3Z.',2);
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user_profile`
--

DROP TABLE IF EXISTS `tb_user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user_profile` (
  `id_user` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `biography` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`),
  CONSTRAINT `fk_tb_user_profile_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user_profile`
--

LOCK TABLES `tb_user_profile` WRITE;
/*!40000 ALTER TABLE `tb_user_profile` DISABLE KEYS */;
INSERT INTO `tb_user_profile` VALUES (1,NULL,'Geca',NULL,1),(2,NULL,'ZoinBrs',NULL,1);
/*!40000 ALTER TABLE `tb_user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_loja'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-02  0:28:27
