-- MariaDB dump 10.19  Distrib 10.5.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: invbio
-- ------------------------------------------------------
-- Server version	10.5.13-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `invbio_category`
--

DROP TABLE IF EXISTS `invbio_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invbio_category` (
  `category_id` int(8) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(1500) NOT NULL,
  `category_code` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_code` (`category_code`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invbio_category`
--

LOCK TABLES `invbio_category` WRITE;
/*!40000 ALTER TABLE `invbio_category` DISABLE KEYS */;
INSERT INTO `invbio_category` VALUES (1,'Keperluan Pabrik','5120090501','2022-03-25 01:59:54'),(2,'Pemeliharaan Bangunan Perusahaan','5120090601','2022-03-25 01:59:54'),(3,'Pemeliharaan Mesin','5120090801','2022-03-25 01:59:54'),(4,'Pemeliharaan Utiliti','5120090802','2022-03-25 01:59:54'),(5,'Pemeliharaan Pabrik','5120090803','2022-03-25 01:59:54'),(6,'Pemeliharaan Inventaris Kantor','5120090901','2022-03-25 01:59:54'),(7,'Pemeliharaan Inventaris Kantor  IT','5120090902','2022-03-25 01:59:54'),(8,'Uji Peralatan','5120091301','2022-03-25 01:59:54');
/*!40000 ALTER TABLE `invbio_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invbio_item`
--

DROP TABLE IF EXISTS `invbio_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invbio_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(2000) NOT NULL,
  `img` varchar(2200) DEFAULT NULL,
  `thumbnail` varchar(2200) DEFAULT NULL,
  `item_code` varchar(100) NOT NULL,
  `category_id` int(8) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `product_code` (`item_code`)
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invbio_item`
--

LOCK TABLES `invbio_item` WRITE;
/*!40000 ALTER TABLE `invbio_item` DISABLE KEYS */;
INSERT INTO `invbio_item` VALUES (1,'KUNCI L','',NULL,'F5032',1,'set','2022-03-25 02:03:17'),(2,'LAMPU SENTER','',NULL,'F5036',1,'buah','2022-03-25 02:03:17'),(3,'DOUBLE TAPE 3M','',NULL,'F3994',2,'rol','2022-03-25 02:03:17'),(4,'FISHER 6 MM','',NULL,'F4011',2,'dus','2022-03-25 02:03:17'),(5,'FISHER 8 MM','',NULL,'F4012',2,'buah','2022-03-25 02:03:17'),(6,'KUAS','',NULL,'F4059',2,'buah','2022-03-25 02:03:17'),(7,'MATA BOR BESI','',NULL,'F4148',2,'buah','2022-03-25 02:03:17'),(8,'MATA BOR TEMBOK / BETON','',NULL,'F4151',2,'buah','2022-03-25 02:03:17'),(9,'MATA BOR BESI 3,5 MM','',NULL,'F4182',2,'buah','2022-03-25 02:03:17'),(10,'MATA BOR BESI 4 MM','',NULL,'F4184',2,'buah','2022-03-25 02:03:17'),(11,'MATA BOR BESI 4,5 MM','',NULL,'F4185',2,'buah','2022-03-25 02:03:17'),(12,'MATA BOR BESI 5 MM','',NULL,'F4186',2,'buah','2022-03-25 02:03:17'),(13,'MATA BOR BESI 6 MM','',NULL,'F4188',2,'buah','2022-03-25 02:03:17'),(14,'MATA BOR SS 3,5 MM','',NULL,'F4197',2,'buah','2022-03-25 02:03:17'),(15,'MATA BOR SS 4,5 MM','',NULL,'F4199',2,'buah','2022-03-25 02:03:17'),(16,'MATA BOR SS 5,5 MM','',NULL,'F4201',2,'buah','2022-03-25 02:03:17'),(17,'PEMBERSIHAN LAMPU DI AREA PRODUKSI','',NULL,'F4322',2,'ls','2022-03-25 02:03:17'),(18,'PAHAT BETON 3 CM','',NULL,'F4447',2,'buah','2022-03-25 02:03:17'),(19,'SEKRUP FISHER 6 MM','',NULL,'F4594',2,'dus','2022-03-25 02:03:17'),(20,'Perbaikan Solar Cell','',NULL,'F5095',2,'ls','2022-03-25 02:03:17'),(21,'BUSBAR SISIR','',NULL,'F0206',3,'m','2022-03-25 02:03:17'),(22,'INDIKATOR PANEL LAMP','',NULL,'F1131',3,'buah','2022-03-25 02:03:17'),(23,'JUNCTION BOX','',NULL,'F1187',3,'buah','2022-03-25 02:03:17'),(24,'KABEL NYYHY 0,75 MM X 4','',NULL,'F1294',3,'m','2022-03-25 02:03:17'),(25,'KUNCI PANEL','',NULL,'F1324',3,'buah','2022-03-25 02:03:17'),(26,'KONEKTOR KABEL 4MM','',NULL,'F1331',3,'buah','2022-03-25 02:03:17'),(27,'KONEKTOR KABEL 6MM','',NULL,'F1332',3,'buah','2022-03-25 02:03:17'),(28,'KONEKTOR KABEL 10MM','',NULL,'F1333',3,'buah','2022-03-25 02:03:17'),(29,'KONEKTOR KABEL 16MM','',NULL,'F1334',3,'buah','2022-03-25 02:03:17'),(30,'KONEKTOR KABEL 25MM','',NULL,'F1335',3,'buah','2022-03-25 02:03:17'),(31,'KONEKTOR KABEL 35MM','',NULL,'F1336',3,'buah','2022-03-25 02:03:17'),(32,'KONEKTOR KABEL 50MM','',NULL,'F1337',3,'buah','2022-03-25 02:03:17'),(33,'KONEKTOR KABEL 75MM','',NULL,'F1338',3,'buah','2022-03-25 02:03:17'),(34,'KONEKTOR KABEL 90MM','',NULL,'F1339',3,'buah','2022-03-25 02:03:17'),(35,'KONEKTOR KABEL 120MM','',NULL,'F1340',3,'buah','2022-03-25 02:03:17'),(36,'KONEKTOR KABEL 150MM','',NULL,'F1341',3,'buah','2022-03-25 02:03:17'),(37,'KONEKTOR KABEL 240MM','',NULL,'F1342',3,'buah','2022-03-25 02:03:17'),(38,'KONEKTOR KABEL 300MM','',NULL,'F1343',3,'buah','2022-03-25 02:03:17'),(39,'KWH METER DIGITAL 1 PHASE','',NULL,'F1345',3,'buah','2022-03-25 02:03:17'),(40,'KWH METER DIGITAL 3 PHASE','',NULL,'F1346',3,'buah','2022-03-25 02:03:17'),(41,'OFTAK DUS CABANG 4 (AFTAK DUS)','',NULL,'F1767',3,'buah','2022-03-25 02:03:17'),(42,'PERBAIKAN KABEL TM PLN','',NULL,'F2381',3,'set','2022-03-25 02:03:17'),(43,'PRESSURE SENSOR : Â­ 1,0 ~ 2,5 BAR','',NULL,'F2404',3,'buah','2022-03-25 02:03:17'),(44,'PERBAIKAN INSTALASI LISTRIK + PERENCANAAN','',NULL,'F2448',3,'ls','2022-03-25 02:03:17'),(45,'STOP KONTAK LEGRAND 3 PHASE 4 POLES 16 A INBOWL','',NULL,'F3050',3,'buah','2022-03-25 02:03:17'),(46,'STOP KONTAK LEGRAND 3 PHASE 4 POLES 16 A OUTBOWL','',NULL,'F3051',3,'buah','2022-03-25 02:03:17'),(47,'STOP KONTAK LEGRAND 3 PHASE 4 POLES 32 A INBOWL','',NULL,'F3052',3,'buah','2022-03-25 02:03:17'),(48,'STOP KONTAK LEGRAND 3 PHASE 4 POLES 32 A OUTBOWL','',NULL,'F3053',3,'buah','2022-03-25 02:03:17'),(49,'TUTUP LAMPU DR BAHAN ACRYLIC (150X30X15) CM','',NULL,'F3218',3,'buah','2022-03-25 02:03:17'),(50,'PIPA EGA 20 MM','',NULL,'F2466',4,'buah','2022-03-25 02:03:17'),(51,'PIPA EGA 25 MM','',NULL,'F2467',4,'buah','2022-03-25 02:03:17'),(52,'Perbaikan ETS','',NULL,'F2521',4,'buah','2022-03-25 02:03:17'),(53,'STEKER LISTRIK','',NULL,'F2836',4,'buah','2022-03-25 02:03:17'),(54,'SKUN KABEL','',NULL,'F3022',4,'buah','2022-03-25 02:03:17'),(55,'SOCKER PIPA EGA 20 MM','',NULL,'F3108',4,'buah','2022-03-25 02:03:17'),(56,'SOCKER PIPA EGA 25 MM','',NULL,'F3109',4,'buah','2022-03-25 02:03:17'),(57,'TERMINAL LISTRIK','',NULL,'F3315',4,'buah','2022-03-25 02:03:17'),(58,'KABEL TRAY','',NULL,'F3338',4,'btg','2022-03-25 02:03:17'),(59,'Pemeliharaan Instalasi Kabel Jaringan','',NULL,'F3808',4,'ls','2022-03-25 02:03:17'),(60,'PENGGANTIAN TRAY KABEL','',NULL,'F4066',4,'ls','2022-03-25 02:03:17'),(61,'PERBAIKAN INSTALASI LISTRIK','',NULL,'F4302',4,'ls','2022-03-25 02:03:17'),(62,'PERBAIKAN TRAY KABEL','',NULL,'F4487',4,'ls','2022-03-25 02:03:17'),(63,'SKUN KABEL','',NULL,'F5033',4,'pak','2022-03-25 02:03:17'),(64,'Kabel Listrik','',NULL,'F5966',4,'METER','2022-03-25 02:03:17'),(65,'Change Over Switch (Cos)','',NULL,'F5968',4,'buah','2022-03-25 02:03:17'),(66,'Power Monitor Digital','',NULL,'F5969',4,'buah','2022-03-25 02:03:17'),(67,'Terminal Krustin','',NULL,'F5973',4,'pack','2022-03-25 02:03:17'),(68,'Junction Box Hensel/Legrand','',NULL,'F5974',4,'buah','2022-03-25 02:03:17'),(69,'ETS (electicity treatment system)','',NULL,'F6324',4,'set','2022-03-25 02:03:17'),(70,'Power Meter','',NULL,'F6325',4,'set','2022-03-25 02:03:17'),(71,'solar cell','',NULL,'F6328',4,'pcs','2022-03-25 02:03:17'),(72,'Inverter Solar cell','',NULL,'F6329',4,'pcs','2022-03-25 02:03:17'),(73,'Kabel TR','',NULL,'F6332',4,'m','2022-03-25 02:03:17'),(74,'Kabel TM','',NULL,'F6333',4,'m','2022-03-25 02:03:17'),(75,'Perbaikan Power Meter','',NULL,'F6387',4,'ls','2022-03-25 02:03:17'),(76,'Peremajaan panel TR','',NULL,'F6389',4,'ls','2022-03-25 02:03:17'),(77,'Peremajaan Panel TM','',NULL,'F6390',4,'ls','2022-03-25 02:03:17'),(78,'Penarikan Kabel','',NULL,'F6391',4,'ls','2022-03-25 02:03:17'),(79,'Relokasi Panel','',NULL,'F6392',4,'ls','2022-03-25 02:03:17'),(80,'Perapihan Jaringan listrik','',NULL,'F6393',4,'ls','2022-03-25 02:03:17'),(81,'Perencanaan Jaringan Listrik','',NULL,'F6395',4,'ls','2022-03-25 02:03:17'),(82,'Perbaikan Grounding Sistem','',NULL,'F6396',4,'ls','2022-03-25 02:03:17'),(83,'Perbaikan Penyalur Petir','',NULL,'F6397',4,'ls','2022-03-25 02:03:17'),(84,'AVO METER','',NULL,'F0015',5,'buah','2022-03-25 02:03:17'),(85,'ACB','',NULL,'F0058',5,'buah','2022-03-25 02:03:17'),(86,'BALK HPIT + LAMPU (250 - 400 WATT)','',NULL,'F0089',5,'buah','2022-03-25 02:03:17'),(87,'BATTERY CR 2032 AVOMETER','',NULL,'F0093',5,'buah','2022-03-25 02:03:17'),(88,'BATTERY GP 9V 170 MI NIMH','',NULL,'F0094',5,'buah','2022-03-25 02:03:17'),(89,'BOX INSTRUMENT (U/ SPARE PARTS ELEKTRONIK)','',NULL,'F0104',5,'buah','2022-03-25 02:03:17'),(90,'BOX KUNCI','',NULL,'F0105',5,'buah','2022-03-25 02:03:17'),(91,'BALK + LAMPU TL 10 S/D 20W','',NULL,'F0153',5,'buah','2022-03-25 02:03:17'),(92,'BALK + LAMPU TL 36 S/D 40W','',NULL,'F0154',5,'buah','2022-03-25 02:03:17'),(93,'BATEREI LAMPU EXIT','',NULL,'F0164',5,'buah','2022-03-25 02:03:17'),(94,'BLOWER VAN (EXHAUST)','',NULL,'F0171',5,'buah','2022-03-25 02:03:17'),(95,'BATTERY UPS','',NULL,'F0194',5,'buah','2022-03-25 02:03:17'),(96,'BENDING PIPA EGA 20 MM','',NULL,'F0203',5,'buah','2022-03-25 02:03:17'),(97,'BENDING PIPA EGA 25 MM','',NULL,'F0204',5,'buah','2022-03-25 02:03:17'),(98,'BOR LISTRIK','',NULL,'F0235',5,'buah','2022-03-25 02:03:17'),(99,'BALK HPIT 150 W','',NULL,'F0241',5,'buah','2022-03-25 02:03:17'),(100,'CLAMP \"EGA\"','',NULL,'F0294',5,'packs','2022-03-25 02:03:17'),(101,'CABLE TIES/TIE RATE/INSULOCK BESAR','',NULL,'F0324',5,'pack','2022-03-25 02:03:17'),(102,'CABLE TIES/TIE RATE/INSULOCK KECIL','',NULL,'F0325',5,'pack','2022-03-25 02:03:17'),(103,'CABLE TIES/TIE RATE/INSULOCK SEDANG','',NULL,'F0326',5,'pack','2022-03-25 02:03:17'),(104,'CAPASITOR 60 MIKRO','',NULL,'F0329',5,'buah','2022-03-25 02:03:17'),(105,'CONTACTOR 10 AMPERE','',NULL,'F0364',5,'buah','2022-03-25 02:03:17'),(106,'CONTACTOR 20 AMPERE','',NULL,'F0365',5,'buah','2022-03-25 02:03:17'),(107,'CONTACTOR 35 AMPERE','',NULL,'F0369',5,'buah','2022-03-25 02:03:17'),(108,'COOL BRUSH','',NULL,'F0375',5,'set','2022-03-25 02:03:17'),(109,'CORDLESS HAND DRILL','',NULL,'F0428',5,'buah','2022-03-25 02:03:17'),(110,'DIMER','',NULL,'F0451',5,'buah','2022-03-25 02:03:17'),(111,'DYNA BOLD','',NULL,'F0550',5,'buah','2022-03-25 02:03:17'),(112,'FAN (EXHAUST FAN)','',NULL,'F0679',5,'buah','2022-03-25 02:03:17'),(113,'FAN CEILING','',NULL,'F0681',5,'buah','2022-03-25 02:03:17'),(114,'FLEXIBLE EGA','',NULL,'F0721',5,'m','2022-03-25 02:03:17'),(115,'FLEXIBLE PLASTIK (UNTUK LISTRIK)','',NULL,'F0842',5,'rol','2022-03-25 02:03:17'),(116,'FITING TL BULAT/RING','',NULL,'F0888',5,'buah','2022-03-25 02:03:17'),(117,'FITTING LAMPU TL','',NULL,'F0889',5,'buah','2022-03-25 02:03:17'),(118,'FITTING STARTER','',NULL,'F0890',5,'buah','2022-03-25 02:03:17'),(119,'GULUNG MOTOR / WEKEL UKURAN 0.5 S/D 11 KW','',NULL,'F1000',5,'buah','2022-03-25 02:03:17'),(120,'GULUNG MOTOR 2 PK','',NULL,'F1003',5,'buah','2022-03-25 02:03:17'),(121,'GULUNG MOTOR 7,5 PK','',NULL,'F1008',5,'buah','2022-03-25 02:03:17'),(122,'GERINDA TANGAN','',NULL,'F1027',5,'unit','2022-03-25 02:03:17'),(123,'HEAT SHRINK','',NULL,'F1072',5,'m','2022-03-25 02:03:17'),(124,'HANDLE KUNCI SHOCK','',NULL,'F1099',5,'buah','2022-03-25 02:03:17'),(125,'INBOWL DUS','',NULL,'F1144',5,'buah','2022-03-25 02:03:17'),(126,'INVERTER 1 S/D 2 KW','',NULL,'F1155',5,'buah','2022-03-25 02:03:17'),(127,'INVERTER 3 S/D 5 KW','',NULL,'F1156',5,'buah','2022-03-25 02:03:17'),(128,'INVERTER 6 S/D 12 KW','',NULL,'F1157',5,'buah','2022-03-25 02:03:17'),(129,'INVERTER 12 S/D 20 KW','',NULL,'F1165',5,'buah','2022-03-25 02:03:17'),(130,'INVERTER 20 S/D 30 KW','',NULL,'F1166',5,'buah','2022-03-25 02:03:17'),(131,'INFRARED TEMPERATURE','',NULL,'F1181',5,'buah','2022-03-25 02:03:17'),(132,'INFRARED METERAN','',NULL,'F1182',5,'buah','2022-03-25 02:03:17'),(133,'KABEL ROLL','',NULL,'F1193',5,'m','2022-03-25 02:03:17'),(134,'KABEL NYA','',NULL,'F1220',5,'rol','2022-03-25 02:03:17'),(135,'KABEL GLAND','',NULL,'F1247',5,'buah','2022-03-25 02:03:17'),(136,'KABEL NYAF 0,75 MM','',NULL,'F1283',5,'m','2022-03-25 02:03:17'),(137,'KABEL NYAF 1,5 MM','',NULL,'F1285',5,'m','2022-03-25 02:03:17'),(138,'KABEL NYM 1 MM X 3','',NULL,'F1290',5,'m','2022-03-25 02:03:17'),(139,'KABEL NYM 2,5 MM X 3','',NULL,'F1291',5,'m','2022-03-25 02:03:17'),(140,'KABEL NYYHY 1,5 MM X 4','',NULL,'F1296',5,'m','2022-03-25 02:03:17'),(141,'KABEL NYYHY 2,5 MM X 4','',NULL,'F1297',5,'m','2022-03-25 02:03:17'),(142,'KABLE DUCT','',NULL,'F1299',5,'buah','2022-03-25 02:03:17'),(143,'KAPASITOR STARTER','',NULL,'F1300',5,'buah','2022-03-25 02:03:17'),(144,'KLEM KABEL 10 MM','',NULL,'F1301',5,'buah','2022-03-25 02:03:17'),(145,'KONEKTOR KABEL','',NULL,'F1306',5,'buah','2022-03-25 02:03:17'),(146,'KUNCI SHOCK UKURAN 8 S/D 26 ML','',NULL,'F1322',5,'buah','2022-03-25 02:03:17'),(147,'KABEL NYA 1 X 1,5 MM2','',NULL,'F1358',5,'m','2022-03-25 02:03:17'),(148,'KABEL NYA 1 X 2,5 MM2','',NULL,'F1359',5,'m','2022-03-25 02:03:17'),(149,'KABEL NYA 1 X 4 MM2','',NULL,'F1360',5,'m','2022-03-25 02:03:17'),(150,'KABEL NYM 3 X 1,5 MM2','',NULL,'F1368',5,'m','2022-03-25 02:03:17'),(151,'KABEL NYM 3 X 2,5 MM2','',NULL,'F1369',5,'m','2022-03-25 02:03:17'),(152,'KABEL NYM 4 X 1,5 MM2','',NULL,'F1370',5,'m','2022-03-25 02:03:17'),(153,'KABEL NYM 4 X 2,5 MM2','',NULL,'F1372',5,'m','2022-03-25 02:03:17'),(154,'KABEL NYM 4 X 4 MM2','',NULL,'F1373',5,'m','2022-03-25 02:03:17'),(155,'KABEL NYM 4 X 6 MM2','',NULL,'F1374',5,'m','2022-03-25 02:03:17'),(156,'KABEL NYY 1 X 120 MM2','',NULL,'F1377',5,'m','2022-03-25 02:03:17'),(157,'KABEL NYY 1 X 240 MM2','',NULL,'F1378',5,'m','2022-03-25 02:03:17'),(158,'KABEL NYY 1 X 300 MM2','',NULL,'F1379',5,'m','2022-03-25 02:03:17'),(159,'KABEL NYY 1 X 70 MM2','',NULL,'F1380',5,'m','2022-03-25 02:03:17'),(160,'KABEL NYY 1 X 95 MM2','',NULL,'F1381',5,'m','2022-03-25 02:03:17'),(161,'KABEL NYY 4 X 10 MM2','',NULL,'F1382',5,'m','2022-03-25 02:03:17'),(162,'KABEL NYY 4 X 16 MM2','',NULL,'F1384',5,'m','2022-03-25 02:03:17'),(163,'KABEL NYY 4 X 25 MM2','',NULL,'F1386',5,'m','2022-03-25 02:03:17'),(164,'KABEL NYY 4 X 35 MM2','',NULL,'F1388',5,'m','2022-03-25 02:03:17'),(165,'KABEL NYY 4 X 50 MM2','',NULL,'F1389',5,'m','2022-03-25 02:03:17'),(166,'KABEL NYY 3 X 1,5 MM2','',NULL,'F1394',5,'m','2022-03-25 02:03:17'),(167,'KABEL NYY 3 X 2,5 MM2','',NULL,'F1395',5,'m','2022-03-25 02:03:17'),(168,'KABEL NYY 4 X 1,5 MM2','',NULL,'F1396',5,'m','2022-03-25 02:03:17'),(169,'KABEL NYY 4 X 2,5 MM2','',NULL,'F1397',5,'m','2022-03-25 02:03:17'),(170,'KABEL NYY 4 X 4 MM2','',NULL,'F1398',5,'m','2022-03-25 02:03:17'),(171,'KABEL NYY 5 X 2,5 MM2','',NULL,'F1399',5,'m','2022-03-25 02:03:17'),(172,'KABEL NYYHY 3 X 0,75 MM2','',NULL,'F1403',5,'m','2022-03-25 02:03:17'),(173,'KABEL NYYHY 3 X 1,5 MM2','',NULL,'F1404',5,'m','2022-03-25 02:03:17'),(174,'KABEL NYYHY 3 X 2,5 MM2','',NULL,'F1405',5,'m','2022-03-25 02:03:17'),(175,'KABEL NYYHY 4 X 1,5 MM2','',NULL,'F1406',5,'m','2022-03-25 02:03:17'),(176,'KABEL NYYHY 4 X 10 MM2','',NULL,'F1407',5,'m','2022-03-25 02:03:17'),(177,'KABEL NYYHY 4 X 2,5 MM2','',NULL,'F1409',5,'m','2022-03-25 02:03:17'),(178,'KABEL NYYHY 5 X 1,5 MM2','',NULL,'F1413',5,'m','2022-03-25 02:03:17'),(179,'KABEL NYYHY 5 X 2,5 MM2','',NULL,'F1414',5,'m','2022-03-25 02:03:17'),(180,'KABEL NYZ 2 X 0,75 MM2','',NULL,'F1415',5,'m','2022-03-25 02:03:17'),(181,'KONTRA STEKER','',NULL,'F1448',5,'buah','2022-03-25 02:03:17'),(182,'KABEL TR 150 mm2','',NULL,'F1474',5,'m','2022-03-25 02:03:17'),(183,'LAMPU MIKROSKOP','',NULL,'F1526',5,'buah','2022-03-25 02:03:17'),(184,'LAMPU PEMANAS AYAM DOC','',NULL,'F1528',5,'buah','2022-03-25 02:03:17'),(185,'LAMPU HPIT','',NULL,'F1541',5,'buah','2022-03-25 02:03:17'),(186,'LAMPU INSECT TRAP 20 W','',NULL,'F1545',5,'buah','2022-03-25 02:03:17'),(187,'LAMPU LOGO SYSTEM LED','',NULL,'F1546',5,'buah','2022-03-25 02:03:17'),(188,'LAMPU TL 20 WATT','',NULL,'F1547',5,'buah','2022-03-25 02:03:17'),(189,'LAMPU TL 40 WATT','',NULL,'F1548',5,'buah','2022-03-25 02:03:17'),(190,'LAMPU HALOGEN 150 WATT','',NULL,'F1553',5,'buah','2022-03-25 02:03:17'),(191,'LAMPU INSECT TRAP 10 WATT','',NULL,'F1557',5,'buah','2022-03-25 02:03:17'),(192,'LAMPU INSECT TRAP 15 WATT','',NULL,'F1558',5,'buah','2022-03-25 02:03:17'),(193,'LAMPU LED','',NULL,'F1559',5,'buah','2022-03-25 02:03:17'),(194,'LIMIT SWITCH','',NULL,'F1566',5,'buah','2022-03-25 02:03:17'),(195,'LAMPU TL RING 32 W','',NULL,'F1573',5,'buah','2022-03-25 02:03:17'),(196,'LAMPU TL RING 20 W','',NULL,'F1574',5,'buah','2022-03-25 02:03:17'),(197,'LAMPU EXPLOSION PROOF','',NULL,'F1580',5,'buah','2022-03-25 02:03:17'),(198,'LAMPU TL T-5','',NULL,'F1584',5,'buah','2022-03-25 02:03:17'),(199,'MICRO SWITCH','',NULL,'F1587',5,'buah','2022-03-25 02:03:17'),(200,'Log Out Tag Out Station','',NULL,'F1588',5,'set','2022-03-25 02:03:17'),(201,'LUXMETER','',NULL,'F1603',5,'buah','2022-03-25 02:03:17'),(202,'METERAN 5 METER','',NULL,'F1631',5,'buah','2022-03-25 02:03:17'),(203,'METERAN 50 METER','',NULL,'F1632',5,'buah','2022-03-25 02:03:17'),(204,'MCB 1 PHASE 16 A','',NULL,'F1656',5,'buah','2022-03-25 02:03:17'),(205,'MCB 1 PHASE 2 A','',NULL,'F1657',5,'buah','2022-03-25 02:03:17'),(206,'MCB 1 PHASE 25 A','',NULL,'F1658',5,'buah','2022-03-25 02:03:17'),(207,'MCB 1 PHASE 32 A','',NULL,'F1659',5,'buah','2022-03-25 02:03:17'),(208,'MCB 1 PHASE 4 A','',NULL,'F1660',5,'buah','2022-03-25 02:03:17'),(209,'MCB 1 PHASE 40 A','',NULL,'F1661',5,'buah','2022-03-25 02:03:17'),(210,'MCB 1 PHASE 6 A','',NULL,'F1662',5,'buah','2022-03-25 02:03:17'),(211,'MCB 3 PHASE 16 A','',NULL,'F1664',5,'buah','2022-03-25 02:03:17'),(212,'MCB 3 PHASE 25 A','',NULL,'F1665',5,'buah','2022-03-25 02:03:17'),(213,'MCB 3 PHASE 32 A','',NULL,'F1666',5,'buah','2022-03-25 02:03:17'),(214,'MCB 3 PHASE 40 A','',NULL,'F1667',5,'buah','2022-03-25 02:03:17'),(215,'MCB 3 PHASE 63 A','',NULL,'F1669',5,'buah','2022-03-25 02:03:17'),(216,'MCCB > 1000A','',NULL,'F1700',5,'buah','2022-03-25 02:03:17'),(217,'NFB 100 AMPERE','',NULL,'F1739',5,'buah','2022-03-25 02:03:17'),(218,'NFB 125 AMPERE','',NULL,'F1740',5,'buah','2022-03-25 02:03:17'),(219,'NFB 200 AMPERE','',NULL,'F1741',5,'buah','2022-03-25 02:03:17'),(220,'NFB 250 AMPERE','',NULL,'F1742',5,'buah','2022-03-25 02:03:17'),(221,'NFB 300 AMPERE','',NULL,'F1743',5,'buah','2022-03-25 02:03:17'),(222,'NFB 400 AMPERE','',NULL,'F1744',5,'buah','2022-03-25 02:03:17'),(223,'NFB 50 AMPERE','',NULL,'F1745',5,'buah','2022-03-25 02:03:17'),(224,'NFB 63 AMPERE','',NULL,'F1746',5,'buah','2022-03-25 02:03:17'),(225,'NFB 630 AMPERE','',NULL,'F1747',5,'buah','2022-03-25 02:03:17'),(226,'NFB 75 AMPERE','',NULL,'F1748',5,'buah','2022-03-25 02:03:17'),(227,'NFB 80 AMPERE','',NULL,'F1749',5,'buah','2022-03-25 02:03:17'),(228,'NFB 100 A, 4 POLES','',NULL,'F1752',5,'buah','2022-03-25 02:03:17'),(229,'NFB 125 A, 4 POLES','',NULL,'F1753',5,'buah','2022-03-25 02:03:17'),(230,'NFB 250 A, 4 POLES','',NULL,'F1754',5,'buah','2022-03-25 02:03:17'),(231,'NFB 300 A, 4 POLES','',NULL,'F1755',5,'buah','2022-03-25 02:03:17'),(232,'NFB 400 A, 4 POLES','',NULL,'F1756',5,'buah','2022-03-25 02:03:17'),(233,'NFB 630 A, 4 POLES','',NULL,'F1757',5,'buah','2022-03-25 02:03:17'),(234,'OVER STEKER','',NULL,'F1851',5,'buah','2022-03-25 02:03:17'),(235,'PHASEKUEN','',NULL,'F1995',5,'buah','2022-03-25 02:03:17'),(236,'PERBAIKAN PANEL','',NULL,'F2003',5,'buah','2022-03-25 02:03:17'),(237,'PERBAIKAN SYSTEM POWER MONITOR','',NULL,'F2077',5,'buah','2022-03-25 02:03:17'),(238,'PERBAIKAN MOTOR BLOWER','',NULL,'F2085',5,'buah','2022-03-25 02:03:17'),(239,'PAKU SOLDER','',NULL,'F2114',5,'buah','2022-03-25 02:03:17'),(240,'PERMAGUM','',NULL,'F2130',5,'kg','2022-03-25 02:03:17'),(241,'POWER SUPPLY','',NULL,'F2300',5,'buah','2022-03-25 02:03:17'),(242,'PANEL LISTRIK (KHUSUS BOX PANEL LISTRIK)','',NULL,'F2314',5,'buah','2022-03-25 02:03:17'),(243,'PILOT LAMP','',NULL,'F2323',5,'buah','2022-03-25 02:03:17'),(244,'PERBAIKAN ACB','',NULL,'F2398',5,'buah','2022-03-25 02:03:17'),(245,'PERBAIKAN LAMINAR AIR FLOW','',NULL,'F2432',5,'buah','2022-03-25 02:03:17'),(246,'REL MCB','',NULL,'F2604',5,'m','2022-03-25 02:03:17'),(247,'RELAY LY2','',NULL,'F2744',5,'buah','2022-03-25 02:03:17'),(248,'RELAY MK3PI','',NULL,'F2745',5,'buah','2022-03-25 02:03:17'),(249,'RELAY MY2','',NULL,'F2746',5,'buah','2022-03-25 02:03:17'),(250,'RELAY MY4N','',NULL,'F2747',5,'buah','2022-03-25 02:03:17'),(251,'SSR INPUT 80-220VAC','',NULL,'F2751',5,'buah','2022-03-25 02:03:17'),(252,'RUBBER TAPE','',NULL,'F2778',5,'buah','2022-03-25 02:03:17'),(253,'REFILL DYMO LABELLER','',NULL,'F2779',5,'buah','2022-03-25 02:03:17'),(254,'SELECTOR SWITCH ON-OFF','',NULL,'F2809',5,'buah','2022-03-25 02:03:17'),(255,'SWITCHING POWER SUPPLY','',NULL,'F2850',5,'buah','2022-03-25 02:03:17'),(256,'SOFT STARTER','',NULL,'F2901',5,'buah','2022-03-25 02:03:17'),(257,'STATER LAMPU TL S-10','',NULL,'F3027',5,'buah','2022-03-25 02:03:17'),(258,'STATER LAMPU TL S-2','',NULL,'F3028',5,'buah','2022-03-25 02:03:17'),(259,'STOP KONTAK LEGRAND 3 PHASE 5 POLES 16 A OUTBOWL','',NULL,'F3055',5,'buah','2022-03-25 02:03:17'),(260,'STOP KONTAK LEGRAND 3 PHASE 5 POLES 32 A OUTBOWL','',NULL,'F3057',5,'buah','2022-03-25 02:03:17'),(261,'SAKELAR ANKLE/TUNGGAL INBOWL','',NULL,'F3059',5,'buah','2022-03-25 02:03:17'),(262,'SAKELAR ANKLE/TUNGGAL OUTBOWL','',NULL,'F3060',5,'buah','2022-03-25 02:03:17'),(263,'SAKELAR DOUBLE INBOWL','',NULL,'F3061',5,'buah','2022-03-25 02:03:17'),(264,'SAKELAR DOUBLE OUTBOWL','',NULL,'F3062',5,'buah','2022-03-25 02:03:17'),(265,'SAKELAR HOTEL INBOWL','',NULL,'F3063',5,'buah','2022-03-25 02:03:17'),(266,'STOP KONTAK 1 PHASE 3 LUBANG','',NULL,'F3068',5,'buah','2022-03-25 02:03:17'),(267,'STOP KONTAK 1 PHASE INBOWL','',NULL,'F3069',5,'buah','2022-03-25 02:03:17'),(268,'STOP KONTAK 1 PHASE OUTBOWL','',NULL,'F3070',5,'buah','2022-03-25 02:03:17'),(269,'STOP KONTAK 1 PHASE WATERPROOF','',NULL,'F3071',5,'buah','2022-03-25 02:03:17'),(270,'STOP KONTAK LEGRAND 1 PHASE 16 A OUTBOWL','',NULL,'F3073',5,'buah','2022-03-25 02:03:17'),(271,'STOP KONTAK LEGRAND 1 PHASE 32 A OUTBOWL','',NULL,'F3075',5,'buah','2022-03-25 02:03:17'),(272,'TOOL KIT BESAR (COMPLETE)','',NULL,'F3210',5,'set','2022-03-25 02:03:17'),(273,'TOOL KIT KECIL','',NULL,'F3211',5,'set','2022-03-25 02:03:17'),(274,'TOOL SET KUNCI PAS RING, OBENG & L','',NULL,'F3212',5,'buah','2022-03-25 02:03:17'),(275,'TESPEN','',NULL,'F3219',5,'buah','2022-03-25 02:03:17'),(276,'TANG AMPERE','',NULL,'F3220',5,'buah','2022-03-25 02:03:17'),(277,'TRAFO/BALAST LAMPU TL','',NULL,'F3223',5,'buah','2022-03-25 02:03:17'),(278,'TANGKAI TAP TANGAN','',NULL,'F3240',5,'buah','2022-03-25 02:03:17'),(279,'TAP TANGAN','',NULL,'F3242',5,'buah','2022-03-25 02:03:17'),(280,'TEMPERATUR CONTROL','',NULL,'F3309',5,'buah','2022-03-25 02:03:17'),(281,'THERMIS 12 AMPERE','',NULL,'F3317',5,'buah','2022-03-25 02:03:17'),(282,'THERMIS 25 AMPERE','',NULL,'F3320',5,'buah','2022-03-25 02:03:17'),(283,'THERMIS 6 AMPERE','',NULL,'F3321',5,'buah','2022-03-25 02:03:17'),(284,'THERMIS 9 AMPERE','',NULL,'F3322',5,'buah','2022-03-25 02:03:17'),(285,'TIMAH SOLDER','',NULL,'F3324',5,'rol','2022-03-25 02:03:17'),(286,'TRAFO/BALAST ELECTRONIC TL 20 W','',NULL,'F3331',5,'buah','2022-03-25 02:03:17'),(287,'TRAFO/BALAST ELECTRONIC TL 40 W','',NULL,'F3332',5,'buah','2022-03-25 02:03:17'),(288,'TIMER ANALOG','',NULL,'F3345',5,'buah','2022-03-25 02:03:17'),(289,'TIMER DIGITAL','',NULL,'F3346',5,'buah','2022-03-25 02:03:17'),(290,'TANK GRIP','',NULL,'F3353',5,'buah','2022-03-25 02:03:17'),(291,'TREKER','',NULL,'F3354',5,'buah','2022-03-25 02:03:17'),(292,'Tap','',NULL,'F3371',5,'set','2022-03-25 02:03:17'),(293,'Tang Ripet','',NULL,'F3372',5,'set','2022-03-25 02:03:17'),(294,'TL RING 30 WATT','',NULL,'F3384',5,'buah','2022-03-25 02:03:17'),(295,'VINYL KABEL','',NULL,'F3551',5,'buah','2022-03-25 02:03:17'),(296,'VACUUM PUMP HAND','',NULL,'F3569',5,'buah','2022-03-25 02:03:17'),(297,'WD 40/60','',NULL,'F3575',5,'buah','2022-03-25 02:03:17'),(298,'WATER LEVEL CONTROL (WLC)','',NULL,'F3578',5,'buah','2022-03-25 02:03:17'),(299,'Kunci Inggris','',NULL,'F4850',5,'buah','2022-03-25 02:03:17'),(300,'Kunci pas ring','',NULL,'F4867',5,'set','2022-03-25 02:03:17'),(301,'Hole saw','',NULL,'F4892',5,'set','2022-03-25 02:03:17'),(302,'PEKERJAAN PEMASANGAN LAMPU TYPE CLEANROOM DI RUANG BERKELAS','',NULL,'F5045',5,'ls','2022-03-25 02:03:17'),(303,'Perbaikan Instalasi Listrik TR','',NULL,'F5113',5,'ls','2022-03-25 02:03:17'),(304,'Perbaikan Instalasi Listrik TM','',NULL,'F5114',5,'ls','2022-03-25 02:03:17'),(305,'Balk + Lampu Ruang Berkelas','',NULL,'F5115',5,'buah','2022-03-25 02:03:17'),(306,'KABEL NYYHY 3 X 0,75 MM2','',NULL,'F5453',5,'METER','2022-03-25 02:03:17'),(307,'KABEL NYYHY 3 X 1,5 MM2','',NULL,'F5454',5,'METER','2022-03-25 02:03:17'),(308,'BLOWER EXHAUST FUME HOOD','',NULL,'F5533',5,'buah','2022-03-25 02:03:17'),(309,'Kap Lampu Plafon','',NULL,'F5540',5,'buah','2022-03-25 02:03:17'),(310,'Kontrak Service Pemeliharaan Laf','',NULL,'F5965',5,'ls','2022-03-25 02:03:17'),(311,'Sticker Reflector Tachometer','',NULL,'F5967',5,'roll','2022-03-25 02:03:17'),(312,'Mounting Kabel 3M','',NULL,'F5971',5,'pack','2022-03-25 02:03:17'),(313,'Armature Lampu Tl','',NULL,'F5977',5,'buah','2022-03-25 02:03:17'),(314,'Modul Control UPS','',NULL,'F6326',5,'pcs','2022-03-25 02:03:17'),(315,'Controller UPS','',NULL,'F6327',5,'pcs','2022-03-25 02:03:17'),(316,'baterai power supply DC','',NULL,'F6330',5,'pcs','2022-03-25 02:03:17'),(317,'Monitoring baterai','',NULL,'F6331',5,'ls','2022-03-25 02:03:17'),(318,'Perbaikan Modul UPS','',NULL,'F6388',5,'ls','2022-03-25 02:03:17'),(319,'CHARGER HANDY TALKY (HT)','',NULL,'F3636',6,'buah','2022-03-25 02:03:17'),(320,'KEY BOX','',NULL,'F3652',6,'buah','2022-03-25 02:03:17'),(321,'SERVICE HANDY TALKY (HT)','',NULL,'F3670',6,'buah','2022-03-25 02:03:17'),(322,'HANDY TALKY','',NULL,'F4984',6,'unit','2022-03-25 02:03:17'),(323,'SERVICE UPS','',NULL,'F3819',7,'buah','2022-03-25 02:03:17'),(324,'Battery UPS 12V 7AH','',NULL,'F5372',7,'buah','2022-03-25 02:03:17'),(325,'Kontrak Service Pemeliharaan Ups','',NULL,'F5964',7,'ls','2022-03-25 02:03:17'),(326,'KALIBRASI ALAT INFRARED THERMOMETER','',NULL,'F5543',8,'buah','2022-03-25 02:03:17'),(327,'KALIBRASI ALAT LUX METER (INTENSITAS CAHAYA)','',NULL,'I0055',8,'buah','2022-03-25 02:03:17'),(328,'KALIBRASI EARTH METER (GROUNDING)','',NULL,'I0059',8,'buah','2022-03-25 02:03:17'),(329,'KALIBRASI NOISE METER','',NULL,'I0063',8,'buah','2022-03-25 02:03:17'),(330,'KALIBRASI TACHOMETER','',NULL,'I0071',8,'buah','2022-03-25 02:03:17'),(331,'KALIBRASI TANG AMPERE','',NULL,'I0111',8,'buah','2022-03-25 02:03:17');
/*!40000 ALTER TABLE `invbio_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invbio_stock`
--

DROP TABLE IF EXISTS `invbio_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invbio_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(8) NOT NULL,
  `quantity` mediumint(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invbio_stock`
--

LOCK TABLES `invbio_stock` WRITE;
/*!40000 ALTER TABLE `invbio_stock` DISABLE KEYS */;
INSERT INTO `invbio_stock` VALUES (3,20,35,'2022-03-25 06:58:29'),(4,39,8,'2022-03-25 06:58:43'),(5,45,8,'2022-03-25 06:59:03'),(6,47,80,'2022-03-25 07:01:24'),(7,52,2,'2022-03-25 07:14:06'),(8,248,4,'2022-03-25 07:18:49'),(9,21,4,'2022-03-25 07:19:04'),(10,21,4,'2022-03-25 07:21:15'),(11,28,4,'2022-03-25 07:26:02'),(12,42,320,'2022-03-25 07:27:14'),(13,22,9,'2022-03-25 07:30:34'),(14,44,2,'2022-03-25 08:58:17');
/*!40000 ALTER TABLE `invbio_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invbio_stock_in`
--

DROP TABLE IF EXISTS `invbio_stock_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invbio_stock_in` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(8) NOT NULL,
  `quantity` mediumint(9) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invbio_stock_in`
--

LOCK TABLES `invbio_stock_in` WRITE;
/*!40000 ALTER TABLE `invbio_stock_in` DISABLE KEYS */;
/*!40000 ALTER TABLE `invbio_stock_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invbio_stock_out`
--

DROP TABLE IF EXISTS `invbio_stock_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invbio_stock_out` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(8) NOT NULL,
  `quantity` mediumint(9) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invbio_stock_out`
--

LOCK TABLES `invbio_stock_out` WRITE;
/*!40000 ALTER TABLE `invbio_stock_out` DISABLE KEYS */;
INSERT INTO `invbio_stock_out` VALUES (3,2,2,NULL,'2022-03-25 07:18:35');
/*!40000 ALTER TABLE `invbio_stock_out` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-25 16:07:40
