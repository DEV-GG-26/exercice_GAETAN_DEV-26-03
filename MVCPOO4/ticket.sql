CREATE DATABASE  IF NOT EXISTS `ticket` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ticket`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ticket
-- ------------------------------------------------------
-- Server version	8.4.7

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
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) NOT NULL,
  `id_categorie_parent` int DEFAULT NULL,
  PRIMARY KEY (`id_categorie`),
  UNIQUE KEY `nom_categorie` (`nom_categorie`),
  KEY `fk_categorie_parent` (`id_categorie_parent`),
  CONSTRAINT `fk_categorie_parent` FOREIGN KEY (`id_categorie_parent`) REFERENCES `categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Téléphonie',NULL),(2,'Informatique',NULL),(3,'Smartphones',1),(4,'Accessoires téléphone',1),(5,'Ordinateurs portables',2),(6,'Périphériques',2);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(100) NOT NULL,
  `prix_produit` decimal(11,2) NOT NULL,
  `id_categorie` int NOT NULL,
  `stock_produit` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produit`),
  KEY `fk_produit_categorie` (`id_categorie`),
  CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,'Smartphone Nova 12',733.95,3,25),(2,'Smartphone Nova 12 Lite',418.95,3,30),(3,'Coque silicone Nova 12',20.90,4,60),(4,'Chargeur rapide 65 W USB-C',39.90,4,50),(5,'Ordinateur portable Zéphyr 14',1227.56,5,18),(6,'Ordinateur portable Zéphyr 16 Pro',2078.06,5,33),(7,'Souris sans fil',26.15,6,70),(8,'Clavier mécanique',93.45,6,30),(9,'Écran 27 pouces',292.95,6,22);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit_ticket`
--

DROP TABLE IF EXISTS `produit_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produit_ticket` (
  `id_produit` int NOT NULL,
  `id_ticket` int NOT NULL,
  `quantite_produit` int NOT NULL,
  PRIMARY KEY (`id_produit`,`id_ticket`),
  KEY `fk_produit_ticket_ticket` (`id_ticket`),
  CONSTRAINT `fk_produit_ticket_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE,
  CONSTRAINT `fk_produit_ticket_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit_ticket`
--

LOCK TABLES `produit_ticket` WRITE;
/*!40000 ALTER TABLE `produit_ticket` DISABLE KEYS */;
INSERT INTO `produit_ticket` VALUES (1,1,1),(2,3,2),(3,1,1),(3,6,3),(4,1,1),(5,2,1),(7,2,3),(7,4,1),(8,4,1),(9,4,2);
/*!40000 ALTER TABLE `produit_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket` (
  `id_ticket` int NOT NULL AUTO_INCREMENT,
  `date_ticket` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_vendeur` int NOT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `fk_ticket_vendeur` (`id_vendeur`),
  CONSTRAINT `fk_ticket_vendeur` FOREIGN KEY (`id_vendeur`) REFERENCES `vendeur` (`id_vendeur`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,'2026-10-01 09:15:00',1),(2,'2026-10-01 11:42:00',2),(3,'2026-10-02 14:05:00',1),(4,'2026-10-03 10:30:00',4),(6,'2026-10-05 12:10:00',2);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendeur` (
  `id_vendeur` int NOT NULL AUTO_INCREMENT,
  `nom_vendeur` varchar(50) NOT NULL,
  `prenom_vendeur` varchar(50) NOT NULL,
  `email_vendeur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_vendeur`),
  UNIQUE KEY `email_vendeur` (`email_vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendeur`
--

LOCK TABLES `vendeur` WRITE;
/*!40000 ALTER TABLE `vendeur` DISABLE KEYS */;
INSERT INTO `vendeur` VALUES (1,'Martin','Léa','lea.martin@magasin.fr'),(2,'Durand','Hugo','hugo.durand@magasin-toulouse.fr'),(4,'Moreau','Karim','karim.moreau@magasin.fr');
/*!40000 ALTER TABLE `vendeur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-30 15:23:21
