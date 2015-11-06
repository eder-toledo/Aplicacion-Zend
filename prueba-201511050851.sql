-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: prueba
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `Aviso`
--

DROP TABLE IF EXISTS `Aviso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aviso` (
  `id_aviso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usr` int(11) NOT NULL,
  `texto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_aviso`),
  KEY `IDX_73FCDFF789C6A1D6` (`id_usr`),
  CONSTRAINT `FK_73FCDFF789C6A1D6` FOREIGN KEY (`id_usr`) REFERENCES `Usuario` (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aviso`
--

LOCK TABLES `Aviso` WRITE;
/*!40000 ALTER TABLE `Aviso` DISABLE KEYS */;
/*!40000 ALTER TABLE `Aviso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bitacora`
--

DROP TABLE IF EXISTS `Bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hora` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bitacora`
--

LOCK TABLES `Bitacora` WRITE;
/*!40000 ALTER TABLE `Bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `Bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Compra`
--

DROP TABLE IF EXISTS `Compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `piezas` int(11) NOT NULL,
  `total_pagado` int(11) NOT NULL,
  `procentaje_utilidad` double NOT NULL,
  `precio_venta` double NOT NULL,
  `piezas_en_almacen` int(11) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `IDX_996D34C9F760EA80` (`id_producto`),
  KEY `IDX_996D34C996F5D4E9` (`id_proveedor`),
  CONSTRAINT `FK_996D34C996F5D4E9` FOREIGN KEY (`id_proveedor`) REFERENCES `Proovedor` (`id_proveedor`),
  CONSTRAINT `FK_996D34C9F760EA80` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Compra`
--

LOCK TABLES `Compra` WRITE;
/*!40000 ALTER TABLE `Compra` DISABLE KEYS */;
INSERT INTO `Compra` VALUES (1,1,1,'',1,1,1,1,1),(2,1,1,'2015-11-04',2,2,2,2,2),(3,1,1,'2015-11-04',3,3,3,3,3),(4,1,1,'2015-11-04',3,3,3,3,3);
/*!40000 ALTER TABLE `Compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Corte`
--

DROP TABLE IF EXISTS `Corte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Corte` (
  `id_corte` int(11) NOT NULL AUTO_INCREMENT,
  `id_usr` int(11) NOT NULL,
  `momento` datetime NOT NULL,
  `fecha_corte` date NOT NULL,
  `fecha_corte2` date NOT NULL,
  `entradas` double NOT NULL,
  `quedo` double NOT NULL,
  `saldo` double NOT NULL,
  `comentario` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_corte`),
  KEY `IDX_9BCAA7CA89C6A1D6` (`id_usr`),
  CONSTRAINT `FK_9BCAA7CA89C6A1D6` FOREIGN KEY (`id_usr`) REFERENCES `Usuario` (`id_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Corte`
--

LOCK TABLES `Corte` WRITE;
/*!40000 ALTER TABLE `Corte` DISABLE KEYS */;
INSERT INTO `Corte` VALUES (1,1,'2015-11-01 20:53:55','2015-11-01','2015-11-01',1,1,1,'comentario');
/*!40000 ALTER TABLE `Corte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Desgloce`
--

DROP TABLE IF EXISTS `Desgloce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Desgloce` (
  `id_desgloce` int(11) NOT NULL AUTO_INCREMENT,
  `id_corte` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hora` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `importe` double NOT NULL,
  `confirmado` int(11) NOT NULL,
  `giro` int(11) NOT NULL,
  PRIMARY KEY (`id_desgloce`),
  KEY `IDX_F6ACCD1BB48EC9FE` (`id_corte`),
  KEY `IDX_F6ACCD1BF760EA80` (`id_producto`),
  KEY `IDX_F6ACCD1B6162AF65` (`id_venta`),
  CONSTRAINT `FK_F6ACCD1B6162AF65` FOREIGN KEY (`id_venta`) REFERENCES `Venta` (`id_venta`),
  CONSTRAINT `FK_F6ACCD1BB48EC9FE` FOREIGN KEY (`id_corte`) REFERENCES `Corte` (`id_corte`),
  CONSTRAINT `FK_F6ACCD1BF760EA80` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Desgloce`
--

LOCK TABLES `Desgloce` WRITE;
/*!40000 ALTER TABLE `Desgloce` DISABLE KEYS */;
INSERT INTO `Desgloce` VALUES (2,1,1,1,'','',1,'asd',1,1,1,1);
/*!40000 ALTER TABLE `Desgloce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Existencia`
--

DROP TABLE IF EXISTS `Existencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Existencia` (
  `id_existencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `mostrador` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id_existencia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Existencia`
--

LOCK TABLES `Existencia` WRITE;
/*!40000 ALTER TABLE `Existencia` DISABLE KEYS */;
INSERT INTO `Existencia` VALUES (1,1,2,2);
/*!40000 ALTER TABLE `Existencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Leido_por`
--

DROP TABLE IF EXISTS `Leido_por`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Leido_por` (
  `id_aviso` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  PRIMARY KEY (`id_aviso`,`id_usr`),
  KEY `IDX_4B7CFE585CB8B1C3` (`id_aviso`),
  KEY `IDX_4B7CFE5889C6A1D6` (`id_usr`),
  CONSTRAINT `FK_4B7CFE585CB8B1C3` FOREIGN KEY (`id_aviso`) REFERENCES `Aviso` (`id_aviso`),
  CONSTRAINT `FK_4B7CFE5889C6A1D6` FOREIGN KEY (`id_usr`) REFERENCES `Usuario` (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Leido_por`
--

LOCK TABLES `Leido_por` WRITE;
/*!40000 ALTER TABLE `Leido_por` DISABLE KEYS */;
/*!40000 ALTER TABLE `Leido_por` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `punto_reorden` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `finito` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ufecha` datetime NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
INSERT INTO `Producto` VALUES (1,'Galletas Marias','Gamesa',1,1,'49','2015-10-31 13:04:06'),(2,'qwe','asd',1,1,'1','2015-11-05 20:11:31');
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Proovedor`
--

DROP TABLE IF EXISTS `Proovedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Proovedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Proovedor`
--

LOCK TABLES `Proovedor` WRITE;
/*!40000 ALTER TABLE `Proovedor` DISABLE KEYS */;
INSERT INTO `Proovedor` VALUES (1,'proveedor','direccion','rfc','962'),(2,'a','a','a','a');
/*!40000 ALTER TABLE `Proovedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Surtimiento`
--

DROP TABLE IF EXISTS `Surtimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Surtimiento` (
  `id_surtimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuantos_surtido` int(11) NOT NULL,
  `precio_entra` int(11) NOT NULL,
  PRIMARY KEY (`id_surtimiento`),
  KEY `IDX_8A7D1182F760EA80` (`id_producto`),
  KEY `IDX_8A7D118289C6A1D6` (`id_usr`),
  CONSTRAINT `FK_8A7D118289C6A1D6` FOREIGN KEY (`id_usr`) REFERENCES `Usuario` (`id_usr`),
  CONSTRAINT `FK_8A7D1182F760EA80` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Surtimiento`
--

LOCK TABLES `Surtimiento` WRITE;
/*!40000 ALTER TABLE `Surtimiento` DISABLE KEYS */;
INSERT INTO `Surtimiento` VALUES (1,1,1,'',10,10),(2,1,1,'2015-11-04',1,1);
/*!40000 ALTER TABLE `Surtimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `activo` tinyint(1) NOT NULL,
  `log` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (1,1,'0','Administrador','adminn','admin'),(2,1,'0','Gerente','gerente','gerente'),(3,1,'0','Vendedor','ramiro','ramiro'),(4,1,'0','Administrador','a','a');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Venta`
--

DROP TABLE IF EXISTS `Venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `efectivo` double NOT NULL,
  `redondeo` double NOT NULL,
  `cambio` double NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Venta`
--

LOCK TABLES `Venta` WRITE;
/*!40000 ALTER TABLE `Venta` DISABLE KEYS */;
INSERT INTO `Venta` VALUES (1,1,1,1,1),(2,0,4,0,4),(3,0,4,0,4),(4,0,4,0,4),(5,2,4,0,2),(6,0,4,0,4),(7,0,4,0,4),(8,2,4,0,2);
/*!40000 ALTER TABLE `Venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-05 20:52:51
