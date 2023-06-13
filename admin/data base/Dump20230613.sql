-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: site
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accueil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `text` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `id_accueil_type` int DEFAULT NULL,
  `id_article` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accueil`
--

LOCK TABLES `accueil` WRITE;
/*!40000 ALTER TABLE `accueil` DISABLE KEYS */;
INSERT INTO `accueil` VALUES (1,'azz','sdc',NULL,NULL,NULL,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accueil_type`
--

DROP TABLE IF EXISTS `accueil_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accueil_type` (
  `id` int NOT NULL,
  `type` varchar(450) DEFAULT NULL,
  `sub_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accueil_type`
--

LOCK TABLES `accueil_type` WRITE;
/*!40000 ALTER TABLE `accueil_type` DISABLE KEYS */;
INSERT INTO `accueil_type` VALUES (1,'Bannière ( image 1920_1080 )','LIST'),(2,'Liste 2 / N élements ( image 800_600 )','LIST'),(3,'Liste 3 / N élements ( image 48_48 )','LIST'),(4,'Image à gauche 1024_768 et groupe de textes ','LIST_GROUPE'),(5,'Liste tabs Image ( image 800_600 )','LIST'),(6,'Groupe 3 / N élements  ( image 1024_768 )','LIST_GROUPE'),(7,'Liste déroulante  ( image 400_400 )','LIST'),(8,'Liste 3 / N élements ( image 1024_768 )','LIST');
/*!40000 ALTER TABLE `accueil_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(400) DEFAULT NULL,
  `description` text,
  `full_description` text,
  `price` double DEFAULT NULL,
  `new_price` double DEFAULT NULL,
  `debut_promo` datetime DEFAULT NULL,
  `fin_promo` datetime DEFAULT NULL,
  `badge` varchar(10) DEFAULT NULL,
  `disponible` varchar(45) DEFAULT NULL,
  `quantite` double DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `valider` varchar(10) DEFAULT NULL,
  `id_fournisseur` int DEFAULT NULL,
  `id_marque` int DEFAULT NULL,
  `tva` int DEFAULT NULL,
  `title_seo` text,
  `description_seo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'1','desc pc','ful desc',1.2,1,'2023-10-12 00:00:00','2023-12-31 00:00:00','badge',NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL),(4,'2','efv','eefv',52,5,'2023-01-12 00:00:00','2023-04-30 00:00:00','tgrfd',NULL,5,1,NULL,NULL,NULL,NULL,NULL,NULL),(5,'3','uy','iujy',78,8,'2000-12-12 00:00:00','2000-12-31 00:00:00','tygf',NULL,75,1,NULL,NULL,NULL,NULL,NULL,NULL),(6,'4','uy','uyht',55,465,'2000-12-12 00:00:00','2000-12-31 00:00:00','ytg',NULL,6,1,NULL,NULL,NULL,NULL,NULL,NULL),(7,'zzzzz ggggggg','<h1>fgh</h1>','o_kiujè-y',58,58,'2023-01-12 00:00:00','2023-07-12 00:00:00','yutrg',NULL,5,0,NULL,NULL,NULL,NULL,NULL,NULL),(8,'azazaaaaaaa','kiujyht','_ièujy-h',5,7,'2023-06-12 00:00:00','2023-07-12 00:00:00','likjhgf',NULL,7,0,NULL,NULL,NULL,NULL,NULL,NULL),(9,'7','ujrye','rthjt',75,75,'2023-05-01 00:00:00','2023-07-10 00:00:00','rujuè',NULL,75,0,NULL,NULL,NULL,NULL,NULL,NULL),(10,'fsvs','rt','tyj',47,7,NULL,NULL,'tgr',NULL,78,0,NULL,NULL,NULL,NULL,NULL,NULL),(11,'9','heth','ethty',75,7,NULL,NULL,'qdjtu',NULL,785,0,NULL,NULL,NULL,NULL,NULL,NULL),(12,'10','juyhgf','efv',8,3,NULL,NULL,'srhr',NULL,7,0,NULL,NULL,NULL,NULL,NULL,NULL),(13,'11','ukkre','tyhuj,',5,5,NULL,NULL,'iujyhtg',NULL,8,0,NULL,NULL,NULL,NULL,NULL,NULL),(14,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'thrf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'gbgbgbgb fgfgfg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_categorie`
--

DROP TABLE IF EXISTS `article_categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article_categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_article` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_categorie`
--

LOCK TABLES `article_categorie` WRITE;
/*!40000 ALTER TABLE `article_categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `id_parent` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `title_seo` text,
  `description_seo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'name 1',NULL,0,1,NULL,NULL),(2,'name 2',NULL,0,2,NULL,NULL),(3,'name 1.1',1,0,3,NULL,NULL),(4,'name 1.2',1,0,NULL,NULL,NULL),(5,'name 1.1.1',3,0,NULL,NULL,NULL),(6,'name 1.1.1.1',5,0,NULL,NULL,NULL),(7,'s',NULL,0,6,NULL,NULL),(8,'q',7,1,NULL,NULL,NULL),(9,'qsddz',NULL,1,NULL,NULL,NULL),(10,'w',9,1,NULL,NULL,NULL),(11,'vssssssss',8,1,6,NULL,NULL),(12,'fddf',NULL,0,NULL,NULL,NULL),(13,'d',12,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `id_resolution` int DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `couleur` varchar(45) DEFAULT NULL,
  `id_article` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `id_parametre` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ligne_accueil`
--

DROP TABLE IF EXISTS `ligne_accueil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ligne_accueil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_accueil` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `text` varchar(380) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `id_parent` int DEFAULT NULL,
  `id_article` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligne_accueil`
--

LOCK TABLES `ligne_accueil` WRITE;
/*!40000 ALTER TABLE `ligne_accueil` DISABLE KEYS */;
/*!40000 ALTER TABLE `ligne_accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parametre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `value` text,
  `type` varchar(45) DEFAULT NULL,
  `sub_type` varchar(45) DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `visible` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametre`
--

LOCK TABLES `parametre` WRITE;
/*!40000 ALTER TABLE `parametre` DISABLE KEYS */;
INSERT INTO `parametre` VALUES (1,'Article colomne','{\n     \"fields\" : \n             [\n               {\n                 \"name\" : \"name\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Nom\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"filter\" : \n                 {\n                   \"show\" : true,\n                   \"type\" : \"text\",\n                   \"value\" : \"\"\n                 },\n                 \"show\" : true,\n                 \"required\" : true,\n                 \"active\" : true,\n                 \"order\" : 1\n                 \n               },\n               {\n                 \"name\" : \"description\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Description\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"filter\" : \n                 {\n                   \"show\" : true,\n                   \"type\" : \"text\",\n                   \"value\" : \"\"\n                 },\n                 \"show\" : true,\n                 \"required\" : true,\n                 \"active\" : true,\n                 \"order\" : 2\n                 \n               },   \n               {\n                 \"name\" : \"debut_promo\",\n                 \"type\" : \"date\",\n                 \"label\" : \"Début promo\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"filter\" : \n                 {\n                   \"show\" : true,\n                   \"type\" : \"date\",\n                   \"returnProperty\" : \"debut_promoFilter\",\n                   \"value\" : \n                              {\n                                   \"start\" :  \"\", \n                                   \"end\" : \"\"\n                               }\n                 },\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true,\n                 \"order\" : 3\n                 \n               },             \n               {\n                 \"name\" : \"is_deleted\",\n                 \"type\" :  \"icon\",\n                 \"label\" : \"Supprimer\",\n                 \"filter\" : \n                         {\n                           \"show\" : true,\n                           \"type\" : \"checkbox\",\n                           \"value\" :\"\"\n                         },\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"show\" : true,\n                 \"active\" : true,\n                 \"required\" : true,\n                 \"order\" : 6\n               },\n               {\n                 \"name\" : \"full_description\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"price\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"new_price\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"fin_promo\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"badge\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"disponible\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"quantite\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"valider\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"id_fournisseur\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"id_marque\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"tva\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"title_seo\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"description_seo\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" :\"action\",\n                 \"type\" : \"action\",\n                 \"label\" : \"Action\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"buttons\" :  \n                 [\n                   {\"name\" :\"delete\",\"icon\" :\"delete\",\"label\" : \"Supprimer\",\"color\" :\"#f44336\"},\n                   {\"name\" :\"edit\",\"icon\" :\"edit\",\"label\" : \"Editer\",\"color\" :\"#3f51b5\"}\n                 ],\n                  \"active\" : true, \n                  \"show\" : true,\n                 \"required\" : true,\n                 \"order\" : 8\n               }\n             ],\n     \"showFilter\" : true,\n     \"breakpoint\" : 830\n   }',NULL,NULL,NULL,NULL,NULL),(2,'Parametre colomne','{\n   \"fields\" : \n           [\n             {\n               \"name\" : \"name\",\n               \"type\" : \"text\",\n               \"label\" : \"Nom\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1\n               \n             },\n             {\n               \"name\" : \"value\",\n               \"type\" : \"text\",\n               \"label\" : \"Valeur\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 2\n               \n             },   \n             {\n               \"name\" : \"type\",\n               \"type\" : \"text\",\n               \"label\" : \"Type\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"select\",\n                 \"showEmptyValue\" : true,\n                 \"returnProperty\" : \"type\",\n                 \"data\" : []\n               },\n               \"show\" : true,\n               \"active\" : true,\n               \"required\" : false,\n               \"order\" : 3\n               \n             }, \n             {\n               \"name\" : \"sub_type\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : false\n             },\n             {\n               \"name\" : \"type_content\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true\n             },\n             {\n               \"name\" : \"ordre\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : false\n             },\n             {\n               \"name\" : \"visible\",\n               \"show\" : false,\n               \"active\" : false,\n               \"required\" : true\n             },\n             {\n               \"name\" :\"action\",\n               \"type\" : \"action\",\n               \"label\" : \"Action\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"buttons\" :  \n               [\n                 {\"name\" :\"delete\",\"icon\" :\"delete\",\"label\" : \"Supprimer\",\"color\" :\"#f44336\"},\n                 {\"name\" :\"edit\",\"icon\" :\"edit\",\"label\" : \"Editer\",\"color\" :\"#3f51b5\"}\n               ],\n            \"active\" : true,\n             \"show\" : true,\n             \"required\" : true,\n             \"order\" : 8\n             }\n           ],\n   \"showFilter\" : true,\n   \"breakpoint\" : 830\n }',NULL,NULL,NULL,NULL,NULL),(3,'Accueille colomne','{\n   \"fields\" : \n           [\n             {\n               \"name\" : \"name\",\n               \"type\" : \"text\",\n               \"label\" : \"Nom\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1\n               \n             },\n             {\n               \"name\" : \"text\",\n               \"type\" : \"text\",\n               \"label\" : \"Text\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 2\n               \n             },   \n             {\n               \"name\" : \"image\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : false,\n               \"order\" : 3\n               \n             }, \n             {\n               \"name\" : \"type_content\",\n               \"show\" : true,\n               \"active\" : true,\n               \"required\" : true,               \n               \"order\" : 3\n             },\n             {\n               \"name\" : \"ordre\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : false,\n               \"order\" : 3\n             },\n             {\n               \"name\" : \"is_deleted\",\n               \"show\" : true,\n               \"active\" : false,\n               \"required\" : true,\n               \"order\" : 3\n             },\n             {\n               \"name\" : \"id_accueil_type\",\n               \"show\" : true,\n               \"active\" : true,\n               \"required\" : true,\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"select\",\n                 \"showEmptyValue\" : true,\n                 \"returnProperty\" : \"id_accueil_type\",\n                 \"data\" : []\n               },\n               \"order\" : 3\n             },\n             {\n               \"name\" : \"id_article\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : false,\n               \"order\" : 3\n             },\n             {\n               \"name\" : \"id_categorie\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : false,\n               \"order\" : 3\n             },\n             {\n               \"name\" :\"action\",\n               \"type\" : \"action\",\n               \"label\" : \"Action\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"buttons\" :  \n               [\n                 {\"name\" :\"delete\",\"icon\" :\"delete\", \"label\" : \"Supprimer\",\"color\" :\"#f44336\"},\n                 {\"name\" :\"edit\",\"icon\" :\"edit\",\"label\" : \"Editer\",\"color\" :\"#3f51b5\"}\n               ],\n            \"active\" : true,\n             \"show\" : true,\n             \"required\" : true,\n             \"order\" : 8\n             }\n           ],\n   \"showFilter\" : true,\n   \"breakpoint\" : 830\n }',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `parametre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resolution`
--

DROP TABLE IF EXISTS `resolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resolution` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `resolution` varchar(45) DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolution`
--

LOCK TABLES `resolution` WRITE;
/*!40000 ALTER TABLE `resolution` DISABLE KEYS */;
INSERT INTO `resolution` VALUES (1,'Bannière','1920_1080',NULL),(2,'Liste 1','800_600',NULL),(3,'Liste 2','48_48',NULL),(4,'Image grande à gauche','1024_768',NULL),(5,NULL,'28_28',NULL),(6,NULL,'400_400',NULL);
/*!40000 ALTER TABLE `resolution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'rami','rami','rami');
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

-- Dump completed on 2023-06-13  6:48:18
