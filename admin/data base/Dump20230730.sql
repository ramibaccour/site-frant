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
  `name` varchar(105) DEFAULT NULL,
  `name2` varchar(105) DEFAULT NULL,
  `text` text,
  `text2` text,
  `image` varchar(105) DEFAULT NULL,
  `number1` int DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `id_accueil_type` int DEFAULT NULL,
  `id_article` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accueil_accueil_type_idx` (`id_accueil_type`),
  KEY `article_accueil_idx` (`id_article`),
  KEY `categorie_accueil_idx` (`id_categorie`),
  CONSTRAINT `accueil_accueil_type` FOREIGN KEY (`id_accueil_type`) REFERENCES `accueil_type` (`id`),
  CONSTRAINT `article_accueil` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  CONSTRAINT `categorie_accueil` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accueil`
--

LOCK TABLES `accueil` WRITE;
/*!40000 ALTER TABLE `accueil` DISABLE KEYS */;
INSERT INTO `accueil` VALUES (39,'hgfvd',NULL,'<p><strong>yhtgrf </strong></p><p><em>sff tyku,</em></p><p><em>sff tyku,</em></p>',NULL,'zkzA09gFkY.jpg',NULL,NULL,3,0,4,NULL,NULL),(40,'hgb tgr',NULL,'<p><strong>emou momeerjfô moehggooen perhp hzjl fiuruhg uerhu</strong></p>',NULL,NULL,NULL,NULL,4,0,2,NULL,NULL),(41,'hi hozon topo your ara welcom',NULL,'<p>the best way to have maps</p>',NULL,NULL,NULL,NULL,1,0,1,NULL,NULL),(42,'zzzzz ggggggg',NULL,'<h2>oiut</h2>',NULL,'GTAf2p3Dfu356375308_3423462734585928_6192325212685890937_n.jpg',NULL,NULL,4,0,4,NULL,NULL),(43,'Top service',NULL,'<p>Mais services disponible à nos client. Vous pouvez me contacter pour tout autre information complémentaire </p>',NULL,NULL,NULL,NULL,5,0,3,NULL,NULL),(44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,0,5,NULL,NULL),(45,'gjtsvvyuk yryrh',NULL,'<p>yukdfer rtryjj rtrtrt gjtsvvyuk yryrh yukdfer rtryjj rtrtrt gjtsvvyuk yryrh yukdfer rtryjj rtrtrt gjtsvvyuk yryrhyukdfer rtryjj rtrtrt gjtsvvyuk yryrh</p>',NULL,NULL,NULL,NULL,5,0,6,NULL,NULL),(46,'rjy tuklyu ty',NULL,'<p>rjy ty rjy tuklyu ty rjy tuklyu ty rjy tuklyu ty rjy tuklyu ty </p>',NULL,NULL,NULL,NULL,6,0,7,NULL,NULL),(47,'les blog',NULL,'<p>Sujet intéressant à lire et commenté</p>',NULL,NULL,NULL,NULL,7,0,8,NULL,NULL),(54,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,10,NULL,NULL),(55,'uygd',NULL,'<p>ytgf</p>',NULL,NULL,NULL,NULL,2,0,11,NULL,NULL),(56,'sv ere ebeb',NULL,'<p>ebeb sv sv ere ebebere ebeb sv ere ebeb</p>',NULL,NULL,NULL,NULL,3,0,12,NULL,NULL);
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
  `id_resolution` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resolution_accueil_type_idx` (`id_resolution`),
  CONSTRAINT `resolution_accueil_type` FOREIGN KEY (`id_resolution`) REFERENCES `resolution_by_content` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accueil_type`
--

LOCK TABLES `accueil_type` WRITE;
/*!40000 ALTER TABLE `accueil_type` DISABLE KEYS */;
INSERT INTO `accueil_type` VALUES (1,'Bannière ( image 1920_1080 )','LIST',1),(2,'Liste 2 / N élements ( image 800_600 )','LIST',2),(3,'Liste 3 / N élements ( image 48_48 )','LIST',3),(4,'Image à gauche 1024_768 et groupe de textes ','LIST',4),(5,'Liste tabs Image ( image 800_600 )','LIST',2),(6,'Groupe 3 / N élements  ( image 1024_768 )','LIST_GROUPE',4),(7,'Liste déroulante  ( image 400_400 )','LIST',6),(8,'Liste 3 / N élements ( image 1024_768 )','LIST',NULL),(9,'Image à gauche 1024_768 et une descriptioon','LIST',4),(10,'Statistique','LIST',NULL),(11,'Equipe','LIST',NULL),(12,'Testimonials','LIST',NULL);
/*!40000 ALTER TABLE `accueil_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accueil_type_resolution`
--

DROP TABLE IF EXISTS `accueil_type_resolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accueil_type_resolution` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_accueil_type` int DEFAULT NULL,
  `id_resolution` int DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accueil_type_accueil_type_resolution_idx` (`id_accueil_type`),
  KEY `resolution_accueil_type_resolution_idx` (`id_resolution`),
  CONSTRAINT `accueil_type_accueil_type_resolution` FOREIGN KEY (`id_accueil_type`) REFERENCES `accueil_type` (`id`),
  CONSTRAINT `resolution_accueil_type_resolution` FOREIGN KEY (`id_resolution`) REFERENCES `resolution_by_content` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accueil_type_resolution`
--

LOCK TABLES `accueil_type_resolution` WRITE;
/*!40000 ALTER TABLE `accueil_type_resolution` DISABLE KEYS */;
INSERT INTO `accueil_type_resolution` VALUES (1,1,1,1),(2,2,2,1),(3,3,3,1),(4,4,5,1),(5,5,2,1),(6,6,4,1),(7,7,6,1),(8,8,4,1),(10,10,7,1),(11,11,8,1),(12,12,6,1);
/*!40000 ALTER TABLE `accueil_type_resolution` ENABLE KEYS */;
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
  `name2` varchar(105) DEFAULT NULL,
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
  `date1` datetime DEFAULT NULL,
  `id_model_affichage` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_model_affichage_art_idx` (`id_model_affichage`),
  CONSTRAINT `id_model_affichage_art` FOREIGN KEY (`id_model_affichage`) REFERENCES `model_affichage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'1 ryj tyu','OIUHJN FYGHJ','<p>desc pc</p>','<p>ful desc</p>',1.2,1,'2023-10-12 00:00:00','2023-12-31 00:00:00','badge',NULL,1,1,NULL,NULL,NULL,NULL,'dfs','fdsx ee \nkjhg','2023-07-22 02:00:00',1),(4,'2hngh',NULL,'<p>efv</p>','<p>eefv</p>',52,5,'2023-01-12 00:00:00','2023-04-30 00:00:00','tgrfd',NULL,5,1,NULL,NULL,NULL,NULL,'2hngh','eefv\n',NULL,3),(5,'3',NULL,'uy','iujy',78,8,'2000-12-12 00:00:00','2000-12-31 00:00:00','tygf',NULL,75,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'4',NULL,'uy','uyht',55,465,'2000-12-12 00:00:00','2000-12-31 00:00:00','ytg',NULL,6,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'zzzzz ggggggg','drn yui','<p><em>dfb </em>rrr rg utyw jui_ tyuè<em>dfb </em>rrr rg utyw jui_ tyuè<em>dfb </em>rrr rg utyw jui_ tyuè</p>','<p>f<em>dfb </em>rrf<em>dfb </em>rr rg f<em>dfb </em>rtyw jf<em>dfb </em>rui_f<em>dfb </em>r tyf<em>dfb </em>ruè</p>',58,58,'2023-01-12 00:00:00','2023-07-12 00:00:00','yutrg',NULL,5,0,NULL,NULL,NULL,NULL,'zzzzz ggggggg','fgh dfdsw ggggggg dfb rrr fgh dfdsw\n\n','2023-01-05 01:00:00',3),(8,'pmf dtyj tyjyk ','yutg yi','<p>fiopok oirio knds kjd dkhd knds kjd dkhd kjoh nhuh knd kjoh nhuh knd</p>','<p>knds kjd dkhd kjoh nhuh knds kjd dkhd kjoh nhuh knds kjd dkhd kjoh nhuh</p>',5,7,'2023-06-12 00:00:00','2023-07-12 00:00:00','likjhgf',NULL,7,0,NULL,NULL,NULL,NULL,'2023-07-19 16:05:36','_ièujy-h\n','2023-02-01 01:00:00',3),(9,'7',NULL,'ujrye','rthjt',75,75,'2023-05-01 00:00:00','2023-07-10 00:00:00','rujuè',NULL,75,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'fsvs rtttyy fsvs','yte uiyjh','<p>rt</p>','<p>tyj</p>',47,7,NULL,NULL,'tgr',NULL,78,0,NULL,NULL,NULL,NULL,'fsvs rtttyy fsvs','tyj\n','2023-07-14 02:00:00',1),(11,'ujgt tyjil','zh tuk','<p>ethty eeb rglo hygg tfg gyft jkjigydrse ftertg ftrdethty eeb rglo hygg tfg gyft jkjigydrse ftertg ftrd</p>','<p>ethty eeb rgloethty eeb rgloethty eeb rglo</p>',75,7,NULL,NULL,'qdjtu',NULL,785,0,NULL,NULL,NULL,NULL,'9','ethty','2023-03-15 01:00:00',1),(12,'10','agr ui','<p>juyhgf</p>','<p>efv</p>',8,3,NULL,NULL,'srhr',NULL,7,0,NULL,NULL,NULL,NULL,'10','efv\n','2023-07-30 02:00:00',1),(13,'11','p erj,s','<p>ukkre</p>','<p>tyhuj,</p>',5,5,NULL,NULL,'iujyhtg',NULL,8,0,NULL,NULL,NULL,NULL,'11','tyhuj,\n','2023-07-11 02:00:00',3),(14,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'rami name',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'thrf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'gbgbgbgb fgfgfg','yu erh','<p>jn oeqgqnr fgfgfg oeqgqnr gr eyj</p>','<p>fgfgfg oeqgqnr</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'gbgbgbgb fgfgfg','2023-07-19 23:06:27','2023-07-16 02:00:00',3),(24,'df','j, dty,','<p><br></p>','<p><br></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'df','2023-07-19 10:06:54','2023-07-14 02:00:00',1),(25,'fgv gfd','zeh, uhtb','<p>dfv</p>','<p>fdxw</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'fgv gfd','fdxw\n','2023-07-08 02:00:00',3),(26,'wxxxw','dghd','<p>wxxxw</p>','<p>wxxxw</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'wxxxw','wxxxw\n','2023-07-13 02:00:00',1),(27,'abc',NULL,'<p><br></p>','<p><br></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'abc','2023-07-14 16:41:07','2023-07-10 02:00:00',NULL),(28,'art 101','er ty,y','<p><br></p>','<p><br></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'art 101','2023-07-14 16:40:44','2023-07-15 02:00:00',3),(29,'projet tunis','trtnry','<p><br></p>','<p><br></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'projet tunis','2023-07-19 10:07:24','2023-07-24 02:00:00',3),(30,'azerty','rsyn sty','<p>ssfd</p>','<p>ff</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'azerty','ff\n','2023-07-18 02:00:00',3),(32,NULL,NULL,'<p><br></p>','<p><br></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'\n',NULL,NULL),(33,NULL,NULL,'<p><br></p>','<p><br></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'\n',NULL,NULL),(34,NULL,NULL,'<p><br></p>','<p><br></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'\n',NULL,NULL);
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
  PRIMARY KEY (`id`),
  KEY `article_categorie_idx` (`id_article`),
  KEY `article_categorie_idx1` (`id_categorie`),
  CONSTRAINT `article_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  CONSTRAINT `article_categorie_` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_categorie`
--

LOCK TABLES `article_categorie` WRITE;
/*!40000 ALTER TABLE `article_categorie` DISABLE KEYS */;
INSERT INTO `article_categorie` VALUES (27,7,36),(28,8,35),(29,7,1);
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
  `description` text,
  `id_parent` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `title_seo` text,
  `description_seo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Accueil','<p><br></p>',NULL,0,1,'uyhg',', yhtgfvdcx \npoiujyhgf'),(2,'name 2','<p><br></p>',NULL,1,2,'name 2','name 2'),(3,'name 1.1',NULL,1,1,3,NULL,NULL),(4,'name 1.2',NULL,1,1,1,'name 1.2','name 1.2'),(5,'name 1.1.1',NULL,3,1,NULL,NULL,NULL),(6,'name 1.1.1.1',NULL,5,1,NULL,NULL,NULL),(33,'name 3',NULL,NULL,1,2,'name 3','name 3'),(34,'name 4',NULL,NULL,1,3,'name 4','name 4'),(35,'Qui   somme nous','<p>Page pour decrir la societe a</p>',NULL,0,2,'Qui   somme nous','Page pour decrir la societe '),(36,'Blog','<p><br></p>',NULL,0,2,'Blog',NULL),(37,'bloc 1 ldjkfvn','<p><br></p>',36,0,1,'b1','2023-07-15 09:34:44'),(38,'b2 bloc 2 ldjkfvn','<p><br></p>',36,0,2,'b2','2023-07-15 09:34:54');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_accueil`
--

DROP TABLE IF EXISTS `categorie_accueil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie_accueil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categorie` int DEFAULT NULL,
  `id_accueil` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_accueil__idx` (`id_categorie`),
  KEY `categorie_accueil_idx` (`id_accueil`),
  CONSTRAINT `categorie_accueil_1` FOREIGN KEY (`id_accueil`) REFERENCES `accueil` (`id`),
  CONSTRAINT `categorie_accueil_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_accueil`
--

LOCK TABLES `categorie_accueil` WRITE;
/*!40000 ALTER TABLE `categorie_accueil` DISABLE KEYS */;
INSERT INTO `categorie_accueil` VALUES (18,1,46),(19,1,55),(20,1,41),(21,1,40),(22,1,39),(23,1,43),(24,1,47);
/*!40000 ALTER TABLE `categorie_accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `couleur` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `couleur`
--

LOCK TABLES `couleur` WRITE;
/*!40000 ALTER TABLE `couleur` DISABLE KEYS */;
/*!40000 ALTER TABLE `couleur` ENABLE KEYS */;
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
  `id_couleur` int DEFAULT NULL,
  `id_article` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `id_parametre` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `couleur_image_idx` (`id_couleur`),
  KEY `article_image_idx` (`id_article`),
  KEY `categorie_image_idx` (`id_categorie`),
  KEY `parametre_image_idx` (`id_parametre`),
  CONSTRAINT `article_image` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  CONSTRAINT `categorie_image` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  CONSTRAINT `couleur_image` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id`),
  CONSTRAINT `parametre_image` FOREIGN KEY (`id_parametre`) REFERENCES `parametre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (17,'C59ZdRDnKA356375308_3423462734585928_6192325212685890937_n.jpg',1,NULL,2,NULL,1,NULL,0,NULL),(18,'MTES4hrKB6356375308_3423462734585928_6192325212685890937_n.jpg',6,NULL,1,NULL,30,NULL,0,NULL),(19,'EgQdZyCWEI356375308_3423462734585928_6192325212685890937_n.jpg',2,NULL,1,NULL,NULL,1,0,NULL),(20,'8U9one251E1965044_809534412394452_257104665_n.jpg',1,NULL,1,NULL,1,NULL,0,NULL),(21,'J7ESnCMs3bdocumentrami.jpg',1,NULL,1,NULL,NULL,1,0,NULL),(22,'GoZNvLRjWa.jpg',2,NULL,1,NULL,10,NULL,0,NULL),(23,'zLuygPGKJv.png',2,NULL,1,NULL,NULL,35,0,NULL),(24,'B8VKVjoH8D.jpg',3,NULL,2,NULL,8,NULL,0,NULL),(28,'cCV1RbvhpD.png',3,NULL,1,NULL,8,NULL,0,NULL),(29,'O1uOqKOr6y.jpg',2,NULL,1,NULL,8,NULL,0,NULL),(30,'qwRInoQ3Fw.jpg',3,NULL,1,NULL,1,NULL,0,NULL),(31,'aOmcF4U6PT.jpg',3,NULL,1,NULL,7,NULL,0,NULL),(32,'hhWlrvj9wL.jpg',3,NULL,1,NULL,10,NULL,0,NULL),(33,'m9uK1z0M1V.jpg',3,NULL,1,NULL,11,NULL,0,NULL),(34,'u7BI5Mlob5.png',5,NULL,1,NULL,NULL,35,0,NULL),(35,'nccE42Nd4E.jpg',4,NULL,1,NULL,7,NULL,0,NULL),(36,'zbEbI4EuxP.jpg',4,NULL,1,NULL,22,NULL,0,NULL),(37,'oJAOPE13x8.jpg',4,NULL,1,NULL,28,NULL,0,NULL),(38,'Ho4JNIo0iH.jpg',1,NULL,1,NULL,7,NULL,0,NULL),(39,'7w9adhpFMp.png',4,NULL,1,NULL,7,NULL,0,NULL),(40,'FwBXsEKu9f.png',4,NULL,1,NULL,11,NULL,0,NULL),(41,'D0AsNsDgV8.jpg',4,NULL,1,NULL,12,NULL,0,NULL),(42,'qnry0rwibr.png',1,NULL,1,NULL,11,NULL,0,NULL),(43,'HWhkzqQsDT.jpg',2,NULL,1,NULL,7,NULL,0,NULL),(44,'EllVQ84q2x.jpg',1,NULL,1,NULL,8,NULL,0,NULL);
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
  `name` varchar(105) DEFAULT NULL,
  `name2` varchar(105) DEFAULT NULL,
  `text` text,
  `tex2` text,
  `image` varchar(105) DEFAULT NULL,
  `number1` int DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `id_accueil` int NOT NULL,
  `id_article` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  `id_parent` int DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  `facebook` varchar(145) DEFAULT NULL,
  `linkedin` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accueil_ligne_accueil_idx` (`id_accueil`),
  KEY `article_ligne_accueil_idx` (`id_article`),
  KEY `categorie_ligne_accueil_idx` (`id_categorie`),
  KEY `id_parent_ligne_accueil_idx` (`id_parent`),
  CONSTRAINT `accueil_ligne_accueil` FOREIGN KEY (`id_accueil`) REFERENCES `accueil` (`id`),
  CONSTRAINT `article_ligne_accueil` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  CONSTRAINT `categorie_ligne_accueil` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  CONSTRAINT `id_parent_ligne_accueil` FOREIGN KEY (`id_parent`) REFERENCES `ligne_accueil` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligne_accueil`
--

LOCK TABLES `ligne_accueil` WRITE;
/*!40000 ALTER TABLE `ligne_accueil` DISABLE KEYS */;
INSERT INTO `ligne_accueil` VALUES (38,NULL,NULL,NULL,NULL,'ill9PmjndvGTAf2p3Dfu356375308_3423462734585928_6192325212685890937_n.jpg',NULL,1,1,41,NULL,NULL,NULL,NULL,NULL,NULL),(39,NULL,NULL,NULL,NULL,NULL,NULL,2,1,41,1,NULL,NULL,NULL,NULL,NULL),(40,NULL,NULL,NULL,NULL,NULL,NULL,3,1,41,NULL,1,NULL,NULL,NULL,NULL),(41,NULL,NULL,NULL,NULL,'35geeqTAZO.jpg',NULL,4,1,41,NULL,NULL,NULL,NULL,NULL,NULL),(42,'ygf',NULL,'<p>oçiuy</p>',NULL,'ih4NXUFufs.jpg',NULL,1,1,40,NULL,NULL,NULL,NULL,NULL,NULL),(43,NULL,NULL,NULL,NULL,NULL,NULL,2,1,40,10,NULL,NULL,NULL,NULL,NULL),(44,NULL,NULL,NULL,NULL,NULL,NULL,3,1,40,NULL,35,NULL,NULL,NULL,NULL),(45,NULL,NULL,NULL,NULL,NULL,NULL,1,1,43,8,NULL,NULL,NULL,NULL,NULL),(46,NULL,NULL,NULL,NULL,NULL,NULL,2,1,43,1,NULL,NULL,NULL,NULL,NULL),(47,NULL,NULL,NULL,NULL,NULL,NULL,3,1,43,7,NULL,NULL,NULL,NULL,NULL),(48,NULL,NULL,NULL,NULL,NULL,NULL,4,1,43,11,NULL,NULL,NULL,NULL,NULL),(49,'tygrf err',NULL,'<p>er errtb vvv ddk osdj pdjic hhhj  pduhjio jlmùduh</p>',NULL,'n3WjNqOrCx.png',NULL,1,1,39,NULL,NULL,NULL,NULL,NULL,NULL),(50,'fdgfhgjh ik',NULL,'<p>er errtb vvv  er errtb vvv er errtb vvv er errtb vvv er errtb vvv er errtb vvv er errtb vvv </p>',NULL,'i28PGFqedl.png',NULL,2,1,39,NULL,NULL,NULL,NULL,NULL,NULL),(51,NULL,NULL,NULL,NULL,NULL,NULL,3,1,39,NULL,35,NULL,NULL,NULL,NULL),(52,'iotynty tyty','dghd','<p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</em></p><ul><li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li><li>&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit.</li><li>&nbsp;Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li></ul>',NULL,'2bWBiXKPPH.jpg',NULL,1,1,44,NULL,NULL,NULL,NULL,NULL,NULL),(53,'h efe paeuf poe ,p ofi','paeuf poe ','<p>ypohsds hgdhc jkdkj ypohsds hgdhc jkdkj ypohsds hgdhc jkdkj ypohsds hgdhc jkdkj ypohsds hgdhc jkdkj ypohsds hgdhc jkdkj </p>',NULL,'LOluLeA8Wz.jpg',NULL,1,1,44,NULL,NULL,NULL,NULL,NULL,NULL),(54,'agfjy yuk',NULL,NULL,NULL,NULL,NULL,1,1,45,NULL,NULL,NULL,NULL,NULL,NULL),(55,'vx yu',NULL,NULL,NULL,NULL,NULL,2,1,45,NULL,NULL,NULL,NULL,NULL,NULL),(56,'gnr reh',NULL,NULL,NULL,NULL,NULL,3,1,45,NULL,NULL,NULL,NULL,NULL,NULL),(57,'iygrp ',NULL,'<p><span style=\"color: rgb(86, 156, 214);\">this</span>.<span style=\"color: rgb(220, 220, 170);\">editLigneAccueille</span>(<span style=\"color: rgb(156, 220, 254);\">event</span>.<span style=\"color: rgb(156, 220, 254);\">row</span>)</p>',NULL,'R3E68o2l2E.jpg',NULL,1,1,45,NULL,NULL,54,NULL,NULL,NULL),(58,NULL,NULL,NULL,NULL,NULL,NULL,1,1,45,7,NULL,55,NULL,NULL,NULL),(59,NULL,NULL,NULL,NULL,NULL,NULL,3,1,44,11,NULL,NULL,NULL,NULL,NULL),(60,NULL,NULL,NULL,NULL,NULL,NULL,4,1,45,NULL,35,NULL,NULL,NULL,NULL),(61,NULL,NULL,NULL,NULL,NULL,NULL,1,1,45,22,NULL,60,NULL,NULL,NULL),(62,' er  trht tht','poiujy refds','<p>u izefiyg zygfulzi ilyrgfier iune ergevs</p>',NULL,'NplfiNdVd0.jpg',2,1,1,46,NULL,NULL,NULL,NULL,NULL,NULL),(63,NULL,NULL,NULL,NULL,NULL,NULL,1,1,46,24,NULL,NULL,NULL,NULL,NULL),(64,NULL,NULL,NULL,NULL,NULL,NULL,3,1,46,NULL,35,NULL,NULL,NULL,NULL),(65,'hnb','hnb','<p>uytgr</p>',NULL,'enZoN06mY2.jpg',5,1,1,46,NULL,NULL,NULL,NULL,NULL,NULL),(66,NULL,NULL,NULL,NULL,NULL,NULL,1,1,47,28,NULL,NULL,NULL,NULL,NULL),(67,NULL,NULL,NULL,NULL,NULL,NULL,2,1,47,27,NULL,NULL,NULL,NULL,NULL),(68,NULL,NULL,NULL,NULL,NULL,NULL,3,1,47,12,NULL,NULL,NULL,NULL,NULL),(69,NULL,NULL,NULL,NULL,NULL,NULL,4,1,47,24,NULL,NULL,NULL,NULL,NULL),(70,'fgn ty,t','uj yiyjh','<p>trgf oi rèi-j_ue èu -j-uuyj;</p>',NULL,'LGNpUBHWQI.jpg',NULL,NULL,1,55,NULL,NULL,NULL,NULL,'https://www.facebook.com/','https://www.linkedin.com/feed/'),(71,'dfgj hyh','jukyf ','<p>kj,hnbzefrg polikujh kj,hnbzefrg polikujh kj,hnbzefrg polikujh kj,hnbzefrg polikujh kj,hnbzefrg polikujh</p>',NULL,'ndBmN0EBor.PNG',NULL,NULL,1,55,NULL,NULL,NULL,NULL,'https://www.facebook.com/','https://www.linkedin.com/feed/'),(72,'255',NULL,'<p>plkjhg</p>',NULL,'Nkkv4QFoww.jpg',NULL,1,1,54,NULL,NULL,NULL,NULL,NULL,NULL),(73,'57',NULL,'<p>yuk ytu</p>',NULL,'2tjdlAXoxd.jpg',NULL,2,1,54,NULL,NULL,NULL,NULL,NULL,NULL),(74,'drrf brb ','rttrr rttrb','<p>efv erv rfrgjy yy eetth efv erv rfrgjy yy eetth efv erv rfrgjy yy eetth efv erv rfrgjy yy eetth efv erv rfrgjy yy eetth</p>',NULL,'6uXWJ1kSJh.PNG',3,2,0,56,NULL,NULL,NULL,NULL,NULL,NULL),(75,NULL,NULL,NULL,NULL,NULL,NULL,1,1,41,7,NULL,NULL,NULL,NULL,NULL),(76,NULL,NULL,NULL,NULL,NULL,NULL,2,1,41,10,NULL,NULL,NULL,NULL,NULL),(77,NULL,NULL,NULL,NULL,NULL,NULL,1,1,41,7,NULL,NULL,NULL,NULL,NULL),(78,NULL,NULL,NULL,NULL,NULL,NULL,2,1,41,8,NULL,NULL,NULL,NULL,NULL),(79,NULL,NULL,NULL,NULL,NULL,NULL,1,1,41,7,NULL,NULL,NULL,NULL,NULL),(80,NULL,NULL,NULL,NULL,NULL,NULL,1,1,41,7,NULL,NULL,NULL,NULL,NULL),(81,NULL,NULL,NULL,NULL,NULL,NULL,2,1,41,8,NULL,NULL,NULL,NULL,NULL),(82,NULL,NULL,NULL,NULL,NULL,NULL,1,0,41,7,NULL,NULL,NULL,NULL,NULL),(83,NULL,NULL,NULL,NULL,NULL,NULL,2,0,41,8,NULL,NULL,NULL,NULL,NULL),(84,'gtt','thyè','<p>thyh thyh thyh thyh thyh</p>',NULL,'ifAftsEMP4.jpg',NULL,1,0,55,NULL,NULL,NULL,NULL,'https://www.facebook.com/','https://www.linkedin.com/feed/'),(85,'yurt','ergh','<p>rsge rrsge rhyj jrsge rhyj jujrsge rhyj jujrj rj hyrsrsge rhyj jujrj e rhyj jujrjrsge rhyj jujrj  j jujrj </p>',NULL,'gsBK5jviEn.jpg',NULL,2,0,55,NULL,NULL,NULL,NULL,'https://www.facebook.com/','https://www.linkedin.com/feed/');
/*!40000 ALTER TABLE `ligne_accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_affichage`
--

DROP TABLE IF EXISTS `model_affichage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_affichage` (
  `id` int NOT NULL,
  `name` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_affichage`
--

LOCK TABLES `model_affichage` WRITE;
/*!40000 ALTER TABLE `model_affichage` DISABLE KEYS */;
INSERT INTO `model_affichage` VALUES (1,'Projet'),(3,'Blog');
/*!40000 ALTER TABLE `model_affichage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parametre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `value` text,
  `type` varchar(45) DEFAULT NULL,
  `sub_type` varchar(45) DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  `visible` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametre`
--

LOCK TABLES `parametre` WRITE;
/*!40000 ALTER TABLE `parametre` DISABLE KEYS */;
INSERT INTO `parametre` VALUES (1,'Article colomne','{\n     \"fields\" : \n             [\n               {\n                 \"name\" : \"name\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Nom\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"filter\" : \n                 {\n                   \"show\" : true,\n                   \"type\" : \"text\",\n                   \"value\" : \"\",\n                   \"operator\" : \"%%\"\n                 },\n                 \"show\" : true,\n                 \"required\" : true,\n                 \"active\" : true,\n                 \"order\" : 1\n               },\n                {\n                 \"name\" : \"name2\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Nom 2\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",                \n                 \"show\" : false,\n                 \"required\" : false,\n                 \"active\" : true,\n                 \"order\" : 1\n               },\n               {\n                 \"name\" : \"description\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Texte 1\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"filter\" : \n                 {\n                   \"show\" : true,\n                   \"type\" : \"text\",\n                   \"value\" : \"\",\n                   \"operator\" : \"%%\"\n                 },\n                 \"show\" : true,\n                 \"required\" : true,\n                 \"active\" : true,\n                 \"order\" : 2\n                 \n               },     \n               {\n                 \"name\" : \"date1\",\n                 \"type\" : \"date\",\n                 \"label\" : \"Date création\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",                 \n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : false,\n                 \"order\" : 3                 \n               },        \n               {\n                 \"name\" : \"id_model_affichage\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Modél\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",                 \n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true,\n                 \"order\" : 3                 \n               },   \n               {\n                 \"name\" : \"debut_promo\",\n                 \"type\" : \"date\",\n                 \"label\" : \"Début promo\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"filter\" : \n                 {\n                   \"show\" : true,\n                   \"type\" : \"date\",                   \n                \"returnProperty\":\"debut_promoFilter\",\n                   \"value\" : \n                              {\n                                   \"start\" :  \"\", \n                                   \"end\" : \"\"\n                               }\n                 },\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true,\n                 \"order\" : 3\n                 \n               },             \n               {\n                 \"name\" : \"is_deleted\",\n                 \"type\" :  \"icon\",\n                 \"label\" : \"Supprimer\",\n                 \"filter\" : \n                         {\n                           \"show\" : true,\n                           \"type\" : \"checkbox\",\n                           \"value\" :\"\",\n                           \"operator\" : \"=\"\n                         },\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"show\" : true,\n                 \"active\" : true,\n                 \"required\" : true,\n                 \"order\" : 6\n               },\n               {\n                 \"name\" : \"full_description\",\n                 \"label\" : \"Texte 2\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : false\n               },\n               {\n                 \"name\" : \"price\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"new_price\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"fin_promo\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"badge\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"disponible\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"quantite\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"valider\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"id_fournisseur\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"id_marque\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"tva\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"title_seo\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"description_seo\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" :\"action\",\n                 \"type\" : \"action\",\n                 \"label\" : \"Action\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"buttons\" :  \n                 [\n                   {\"name\" :\"delete\",\"icon\" :\"delete\",\"label\" : \"Supprimer\",\"color\" :\"#f44336\"},\n                   {\"name\" :\"edit\",\"icon\" :\"edit\",\"label\" : \"Editer\",\"color\" :\"#3f51b5\"}\n                 ],\n                  \"active\" : true, \n                  \"show\" : true,\n                 \"required\" : true,\n                 \"order\" : 8\n               }\n             ],\n     \"showFilter\" : true,\n     \"breakpoint\" : 830\n   }',NULL,NULL,NULL,NULL,0),(2,'Parametre colomne','{\n    \"fields\" : \n            [\n              {\n                \"name\" : \"name\",\n                \"type\" : \"text\",\n                \"label\" : \"Nom\",\n                \"minWidth\" : \"100px\",\n                \"width\" : \"30%\",\n                \"filter\" : \n                {\n                  \"show\" : true,\n                  \"type\" : \"text\",\n                  \"value\" : \"\",\n                   \"operator\" : \"%%\"\n                },\n                \"show\" : true,\n                \"required\" : true,\n                \"active\" : true,\n                \"order\" : 1\n                \n              },\n              {\n                \"name\" : \"value\",\n                \"type\" : \"text\",\n                \"label\" : \"Valeur\",\n                \"minWidth\" : \"100px\",\n                \"width\" : \"30%\",\n                \"filter\" : \n                {\n                  \"show\" : true,\n                  \"type\" : \"text\",\n                  \"value\" : \"\",\n                   \"operator\" : \"%%\"\n                },\n                \"show\" : true,\n                \"required\" : true,\n                \"active\" : true,\n                \"order\" : 2\n                \n              },   \n              {\n                \"name\" : \"type\",\n                \"type\" : \"text\",\n                \"label\" : \"Type\",\n                \"minWidth\" : \"100px\",\n                \"width\" : \"30%\",\n                \"filter\" : \n                {\n                  \"show\" : true,\n                  \"type\" : \"select\",\n                  \"showEmptyValue\" : true,\n                  \"returnProperty\" : \"type\",\n                  \"data\" : [],\n                  \"id\" : \"type\",\n                  \"name\" : \"type\",\n                   \"operator\" : \"=\",\n                   \"value\" : \"\"\n                },\n                \"show\" : true,\n                \"active\" : true,\n                \"required\" : false,\n                \"order\" : 3\n                \n              }, \n              {\n                \"name\" : \"sub_type\",\n                \"show\" : false,\n                \"active\" : true,\n                \"required\" : false\n              },\n              {\n                \"name\" : \"type_content\",\n                \"show\" : false,\n                \"active\" : true,\n                \"required\" : true\n              },\n              {\n                \"name\" : \"ordre\",\n                \"show\" : false,\n                \"active\" : true,\n                \"required\" : false\n              },\n              {\n                \"name\" : \"visible\",\n                \"show\" : false,\n                \"active\" : false,\n                \"required\" : true\n              },\n              {\n                \"name\" :\"action\",\n                \"type\" : \"action\",\n                \"label\" : \"Action\",\n                \"minWidth\" : \"100px\",\n                \"width\" : \"30%\",\n                \"buttons\" :  \n                [\n                  {\"name\" :\"delete\",\"icon\" :\"delete\",\"label\" : \"Supprimer\",\"color\" :\"#f44336\"},\n                  {\"name\" :\"edit\",\"icon\" :\"edit\",\"label\" : \"Editer\",\"color\" :\"#3f51b5\"}\n                ],\n             \"active\" : true,\n              \"show\" : true,\n              \"required\" : true,\n              \"order\" : 8\n              }\n            ],\n    \"showFilter\" : true,\n    \"breakpoint\" : 830\n  }',NULL,NULL,NULL,NULL,0),(3,'Accueille colomne','{\n   \"fields\" : \n           [\n             {\n               \"name\" : \"name\",\n               \"type\" : \"text\",\n               \"label\" : \"Nom\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\",\n                  \"operator\" : \"%\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueille\" : [1,2,3,4,6,7,8,11,12]\n             },\n               {\n               \"name\" : \"choix_selection\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,                        \n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : [4]\n             },\n             {\n               \"name\" : \"text\",\n               \"type\" : \"text\",\n               \"label\" : \"Text\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\",\n                   \"operator\" : \"%%\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 2,\n               \"listeIdTypeAccueille\" : [1,2,3,4,6,7,8,11,12]               \n             },   \n             {\n               \"name\" : \"image\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n               \"listeIdTypeAccueille\" : [4]               \n             }, \n             {\n               \"name\" : \"type_content\",\n               \"show\" : false,\n               \"active\" : false,\n               \"required\" : true,                        \n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : []     \n             },\n            {\n               \"name\" : \"ordre\",\n               \"type\" : \"text\",\n               \"label\" : \"Ordre\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"number\",\n                 \"value\" : \"\",\n                   \"operator\" : \"=\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueille\" : [1,2,3,4,5,6,7,8,10,11,12]\n             },\n             {\n                 \"name\" : \"is_deleted\",\n                 \"type\" :  \"icon\",\n                 \"label\" : \"Supprimer\",\n                 \"filter\" : \n                         {\n                           \"show\" : true,\n                           \"type\" : \"checkbox\",\n                           \"value\" :\"\",\n                          \"operator\" : \"=\"\n                         },\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"show\" : true,\n                 \"active\" : true,\n                 \"required\" : true,\n                 \"order\" : 6\n               },\n             {\n               \"name\" : \"accueilType.type\",\n               \"show\" : true,\n               \"active\" : false,\n                \"type\" : \"text\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"label\" : \"Type accueil\",\n               \"required\" : true,\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"select\",\n                 \"showEmptyValue\" : true,\n                 \"returnProperty\" : \"id_accueil_type\",\n                 \"data\" : [],\n                  \"operator\" : \"=\",\n                  \"value\" : \"\"\n               },\n               \"order\" : 3\n             },\n             {\n               \"name\" : \"id_article\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n              \"listeIdTypeAccueille\" :[4]\n             },\n             {\n               \"name\" : \"id_accueil_type\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : [1,2,3,4,5,6,7,8]\n             },\n             {\n               \"name\" : \"id_categorie\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : [4]\n             },\n             {\n               \"name\" :\"action\",\n               \"type\" : \"action\",\n               \"label\" : \"Action\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"buttons\" :  \n               [\n                 {\"name\" :\"delete\",\"icon\" :\"delete\", \"label\" : \"Supprimer\",\"color\" :\"#f44336\"},\n                 {\"name\" :\"edit\",\"icon\" :\"edit\",\"label\" : \"Editer\",\"color\" :\"#3f51b5\"}\n               ],\n            \"active\" : true,\n             \"show\" : true,\n             \"required\" : true,\n             \"order\" : 8\n             }\n           ],\n   \"showFilter\" : true,\n   \"breakpoint\" : 830\n }',NULL,NULL,NULL,NULL,0),(4,'Ligne accueille colonne','{\n   \"fields\" : \n           [\n             {\n               \"name\" : \"name\",\n               \"type\" : \"text\",\n               \"label\" : \"Nom\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueilleForParent\":[6],\n              \"listeIdTypeAccueille\" : [2,4,5,6,7,10,11,12]               \n             },\n             {\n               \"name\" : \"name2\",\n               \"type\" : \"text\",\n               \"label\" : \"Nom 2\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"show\" : false,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueilleForParent\":[],\n              \"listeIdTypeAccueille\" : [5,7,11,12]               \n             },\n             {\n               \"name\" : \"number1\",\n               \"type\" : \"text\",\n               \"label\" : \"Vote sur 5\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"show\" : false,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n                \"max\" : 5,\n               \"listeIdTypeAccueilleForParent\":[],\n              \"listeIdTypeAccueille\" : [7,12]               \n             },\n             {\n               \"name\" : \"linkedin\",\n               \"type\" : \"text\",\n               \"label\" : \"Linkedin\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"show\" : false,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueilleForParent\":[],\n              \"listeIdTypeAccueille\" : [11]               \n             },\n             {\n               \"name\" : \"facebook\",\n               \"type\" : \"text\",\n               \"label\" : \"Facebook\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"show\" : false,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueilleForParent\":[],\n              \"listeIdTypeAccueille\" : [11]               \n             },\n              {\n               \"name\" : \"article.name\",\n               \"type\" : \"text\",\n               \"label\" : \"Article\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"show\" : true,\n               \"required\" : false,\n               \"active\" : false,\n               \"order\" : 2 \n             },               \n             {\n               \"name\" : \"text\",\n               \"type\" : \"text\",\n               \"label\" : \"Text\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n                \"show\" : false,\n               \"required\" : true,\n               \"active\" : true,\n               \"listeIdTypeAccueilleForParent\":[],\n              \"listeIdTypeAccueille\" : [2,4,5,6,7,10,11,12]\n              },\n              {\n               \"name\" : \"categorie.name\",\n               \"type\" : \"text\",\n               \"label\" : \"Catégorie\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"show\" : true,\n               \"required\" : false,\n               \"active\" : false,\n               \"order\" : 2 \n             },\n             {\n               \"name\" : \"image\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n               \"listeIdTypeAccueilleForParent\":[],\n              \"listeIdTypeAccueille\" : [1,2,4,5,6,7,10,11,12]               \n             }, \n              {\n               \"name\" : \"choix_selection\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,                        \n               \"order\" : 3,\n               \"listeIdTypeAccueilleForParent\":[6],\n              \"listeIdTypeAccueille\" : [1,2,4,6]\n             },\n             {\n               \"name\" : \"type_content\",\n               \"show\" : false,\n               \"active\" : false,\n               \"required\" : true,                        \n               \"order\" : 3\n             },\n             {\n               \"name\" : \"ordre\",\n               \"type\" : \"text\",\n               \"label\" : \"Ordre\",\n               \"show\" : true,\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 0,\n               \"listeIdTypeAccueilleForParent\":[6],\n              \"listeIdTypeAccueille\" : [1,2,3,4,5,6,7,8,10,11,12]\n             },\n             {\n                 \"name\" : \"is_deleted\",\n                 \"type\" :  \"icon\",\n                 \"label\" : \"Supprimer\",\n                 \"filter\" : \n                         {\n                           \"show\" : true,\n                           \"type\" : \"checkbox\",\n                           \"value\" :\"\",\n                           \"operator\" : \"=\"\n                         },\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"show\" : true,\n                 \"active\" : true,\n                 \"required\" : true,\n                 \"order\" : 6\n               },\n             {\n               \"name\" : \"id_accueil\",\n               \"show\" : false,\n               \"active\" : false,\n                \"type\" : \"text\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"label\" : \"Type accueil\",\n               \"required\" : true,\n               \"order\" : 3\n             },\n             {\n               \"name\" : \"id_article\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n               \"listeIdTypeAccueilleForParent\":[6],\n              \"listeIdTypeAccueille\" : [1,2,3,4,6,8]\n             },\n             {\n               \"name\" : \"id_categorie\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n               \"listeIdTypeAccueilleForParent\":[6],\n              \"listeIdTypeAccueille\" : [1,2,3,4,6]\n             },\n             {\n               \"name\" :\"action\",\n               \"type\" : \"action\",\n               \"label\" : \"Action\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"buttons\" :  \n               [\n                 {\"name\" :\"delete\",\"icon\" :\"delete\", \"label\" : \"Supprimer\",\"color\" :\"#f44336\"},\n                 {\"name\" :\"edit\",\"icon\" :\"edit\",\"label\" : \"Editer\",\"color\" :\"#3f51b5\"},\n                 {\"name\" :\"add\",\"icon\" :\"add\",\"label\" : \"Ajouter\",\"color\" :\"#9002fb\"}\n               ],\n            \"active\" : true,\n             \"show\" : true,\n             \"required\" : true,\n             \"order\" : 8\n             }\n           ],\n   \"showFilter\" : true,\n   \"breakpoint\" : 830\n }',NULL,NULL,NULL,NULL,0),(5,'Catégorie colomne ','{\n     \"fields\" : \n             [\n               {\n                 \"name\" : \"name\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Nom\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",                \n                 \"show\" : true,\n                 \"required\" : true,\n                 \"active\" : true,\n                 \"order\" : 1  \n               },  \n               {\n                 \"name\" : \"description\",\n                 \"type\" : \"text\",\n                 \"label\" : \"Description\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"show\" : false,\n                 \"required\" : false,\n                 \"active\" : true,\n                 \"order\" : 2\n                 \n               },   \n               {\n                 \"name\" : \"id_parent\",\n                 \"show\" : false,\n                 \"active\" : false,\n                 \"required\" : false\n               },       \n               {\n                 \"name\" : \"is_deleted\",\n                 \"type\" :  \"icon\",\n                 \"label\" : \"Supprimer\",               \n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"show\" : true,\n                 \"active\" : true,\n                 \"required\" : true,\n                 \"order\" : 2\n               },\n               {\n                 \"name\" : \"ordre\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },     \n               {\n                 \"name\" : \"title_seo\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" : \"description_seo\",\n                 \"show\" : false,\n                 \"active\" : true,\n                 \"required\" : true\n               },\n               {\n                 \"name\" :\"action\",\n                 \"type\" : \"action\",\n                 \"label\" : \"Action\",\n                 \"minWidth\" : \"100px\",\n                 \"width\" : \"30%\",\n                 \"buttons\" :  \n                 [\n                   {\"name\" :\"delete\",\"icon\" :\"delete\",\"label\" : \"Supprimer\",\"color\" :\"#f44336\"}                   \n                 ],\n                  \"active\" : true, \n                  \"show\" : true,\n                 \"required\" : true,\n                 \"order\" : 3\n               }\n             ],\n     \"showFilter\" : true,\n     \"breakpoint\" : 830\n   }',NULL,NULL,NULL,NULL,0),(6,'Nom société','HorizonTopo','Société',NULL,NULL,NULL,1),(7,'Titre page acceuil','Horizon Topo ','SEO',NULL,NULL,NULL,1),(8,'Déscription page accueil',NULL,'SEO',NULL,NULL,NULL,1),(9,'Titre page qui sommes nous',NULL,'SEO',NULL,NULL,NULL,1),(10,'Déscription page qui sommes nous',NULL,'SEO',NULL,NULL,NULL,1),(11,'Titre page contact',NULL,'SEO',NULL,NULL,NULL,1),(12,'Déscription page contact',NULL,'SEO',NULL,NULL,NULL,1),(13,'Accueil categorie colomne','{\n   \"fields\" : \n           [\n             {\n               \"name\" : \"name\",\n               \"type\" : \"text\",\n               \"label\" : \"Nom\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\",\n                 \"operator\" : \"\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueille\" : [1,2,3,4,6,7,8]\n             },\n               {\n               \"name\" : \"choix_selection\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,                        \n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : [4]\n             },\n             {\n               \"name\" : \"text\",\n               \"type\" : \"text\",\n               \"label\" : \"Text\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\",\n                 \"operator\" : \"\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 2,\n               \"listeIdTypeAccueille\" : [1,2,3,4,6,7,8]               \n             },   \n             {\n               \"name\" : \"image\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n               \"listeIdTypeAccueille\" : [4]               \n             }, \n             {\n               \"name\" : \"type_content\",\n               \"show\" : false,\n               \"active\" : false,\n               \"required\" : true,                        \n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : []     \n             },\n            {\n               \"name\" : \"ordre\",\n               \"type\" : \"text\",\n               \"label\" : \"Ordre\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"text\",\n                 \"value\" : \"\",\n                 \"operator\" : \"\"\n               },\n               \"show\" : true,\n               \"required\" : true,\n               \"active\" : true,\n               \"order\" : 1,\n               \"listeIdTypeAccueille\" : [1,2,3,4,5,6,7,8]\n             },\n             {\n               \"name\" : \"accueilType.type\",\n               \"show\" : true,\n               \"active\" : false,\n                \"type\" : \"text\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"label\" : \"Type accueil\",\n               \"required\" : true,\n               \"filter\" : \n               {\n                 \"show\" : true,\n                 \"type\" : \"select\",\n                 \"showEmptyValue\" : true,\n                 \"returnProperty\" : \"id_accueil_type\",\n                 \"data\" : [],\n                 \"value\" : \"\",\n                 \"operator\" : \"\"\n               },\n               \"order\" : 3\n             },\n             {\n               \"name\" : \"id_article\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n              \"listeIdTypeAccueille\" :[4]\n             },\n             {\n               \"name\" : \"id_accueil_type\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : [1,2,3,4,5,6,7,8]\n             },\n             {\n               \"name\" : \"id_categorie\",\n               \"show\" : false,\n               \"active\" : true,\n               \"required\" : true,\n               \"order\" : 3,\n              \"listeIdTypeAccueille\" : [4]\n             },\n             {\n               \"name\" :\"action\",\n               \"type\" : \"action\",\n               \"label\" : \"Action\",\n               \"minWidth\" : \"100px\",\n               \"width\" : \"30%\",\n               \"buttons\" :  \n               [\n                 {\"name\" :\"delete\",\"icon\" :\"delete\", \"label\" : \"Supprimer\",\"color\" :\"#f44336\"}\n                \n               ],\n            \"active\" : true,\n             \"show\" : true,\n             \"required\" : true,\n             \"order\" : 8\n             }\n           ],\n   \"showFilter\" : false,\n   \"breakpoint\" : 830\n }',NULL,NULL,NULL,NULL,0),(14,'Adresse ','Zahra rue des fleurs 5865, Tunis ',NULL,NULL,NULL,NULL,0),(15,'Téléphone ','+216 99 999 999',NULL,NULL,NULL,NULL,0),(16,'Mail ','horizontopo@mail.com',NULL,NULL,NULL,NULL,0),(17,'Instagrame ','https://www.instagrame.com',NULL,NULL,NULL,NULL,0),(18,'Facebook ','https://www.facebook.com',NULL,NULL,NULL,NULL,0),(19,'Linkedin','https://www.linkedin.com',NULL,NULL,NULL,NULL,0),(20,'Google maps longitude et latitude','34.777741316325496, 10.744860612509036','Société',NULL,NULL,NULL,0);
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
  `width` int DEFAULT NULL,
  `height` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolution`
--

LOCK TABLES `resolution` WRITE;
/*!40000 ALTER TABLE `resolution` DISABLE KEYS */;
INSERT INTO `resolution` VALUES (1,1920,1080),(2,800,600),(3,48,48),(4,1024,768),(5,28,28),(6,400,400),(7,42,42),(8,600,600);
/*!40000 ALTER TABLE `resolution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resolution_by_content`
--

DROP TABLE IF EXISTS `resolution_by_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resolution_by_content` (
  `id` int NOT NULL,
  `name` varchar(145) DEFAULT NULL,
  `type_content` varchar(45) DEFAULT NULL,
  `id_resolution` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_resolution__idx` (`id_resolution`),
  CONSTRAINT `id_resolution_` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolution_by_content`
--

LOCK TABLES `resolution_by_content` WRITE;
/*!40000 ALTER TABLE `resolution_by_content` DISABLE KEYS */;
INSERT INTO `resolution_by_content` VALUES (1,'Bannière','ACCUEIL',1),(2,'Liste 2 / N élements ( image 800_600 )','ACCUEIL',2),(3,'Liste 3 / N élements ( image 48_48 )','ACCUEIL',3),(4,'Image grande à gauche','ACCUEIL',4),(5,'Image pour text detai de l\'mage grande à gauche  (28_28)','ACCUEIL',5),(6,'Témoignages','ACCUEIL',6),(7,'Bannière','ARTICLE',1),(8,'Liste 2 / N élements ( image 800_600 )','ARTICLE',2),(9,'Image grande à gauche, Groupe 3 / N élements ','ARTICLE',4),(10,'Témoignages','ARTICLE',6),(11,'Bannière','CATEGORIE',1),(12,'Liste 2 / N élements ( image 800_600 )','CATEGORIE',2),(13,'Image grande à gauche','CATEGORIE',4),(14,'Témoignages','CATEGORIE',6),(15,'Statistique','ACCUEIL',7),(16,'Equipe','ACCUEIL',8),(17,'Liste 3 / N élements ( image 48_48 )','ARTICLE',3),(18,'Liste 3 / N élements ( image 48_48 )','CATEGORIE',3),(19,'Image pour text detai de l\'mage grande à gauche  (28_28)','CATEGORIE',5),(20,'Image pour text detai de l\'mage grande à gauche  (28_28)','ARTICLE',5);
/*!40000 ALTER TABLE `resolution_by_content` ENABLE KEYS */;
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

-- Dump completed on 2023-07-30 15:47:41
