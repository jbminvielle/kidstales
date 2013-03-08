# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# H�te: 127.0.0.1 (MySQL 5.5.25)
# Base de donn�es: kidstales
# Temps de g�n�ration: 2013-03-08 01:00:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table enfant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `enfant`;

CREATE TABLE `enfant` (
  `id_enfant` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_enfant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `enfant` WRITE;
/*!40000 ALTER TABLE `enfant` DISABLE KEYS */;

INSERT INTO `enfant` (`id_enfant`, `prenom`, `mail`, `mdp`, `sexe`)
VALUES
	(0,'Julien','mail3@dom.com','motdepass1',0),
	(1,'Théo','mail1@dom.com','motdepass2',0),
	(2,'Emilie','mail@dom.com','motdepass3',0),
	(3,'Julie','mail4@dom.com','motdepass4',0),
	(4,'Marie','mail8@dom.com','motdepass5',0),
	(5,'Baptiste','mail7@dom.com','motdepass6',0),
	(6,'Grégoire','mail6@dom.com','motdepass7',0),
	(7,'Anna','mail5@dom.com','motdepass8',0),
	(8,'Jérémi','mail22@dom.com','motdepass9',0),
	(9,'Jule','mail2@dom.com','motdepass10',0),
	(10,'Jennyfer','mail9@dom.com','motdepass11',0);

/*!40000 ALTER TABLE `enfant` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table histoire
# ------------------------------------------------------------

DROP TABLE IF EXISTS `histoire`;

CREATE TABLE `histoire` (
  `id_histoire` int(11) NOT NULL AUTO_INCREMENT,
  `cont` text NOT NULL,
  `date` date NOT NULL,
  `evaluation` int(100) NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_lieu` int(11) NOT NULL,
  PRIMARY KEY (`id_histoire`),
  KEY `histoire_uk_lieu_idx` (`id_lieu`),
  KEY `histoire_uk_enfant_idx` (`id_enfant`),
  CONSTRAINT `histoire_ibfk_2` FOREIGN KEY (`id_lieu`) REFERENCES `lieu` (`id_lieu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `histoire_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `histoire` WRITE;
/*!40000 ALTER TABLE `histoire` DISABLE KEYS */;

INSERT INTO `histoire` (`id_histoire`, `cont`, `date`, `evaluation`, `id_enfant`, `id_lieu`)
VALUES
	(1,'Nous avons visité le chateau de Vincenne, c\'était trop cool!','2013-06-08',45,2,4),
	(2,'Les moniteurs on fait un feu de camp et nous avons fait une veillé chocolat.','2013-08-03',34,3,3),
	(3,'Nous avons fini de monter les tentes, l\'après-midi était difficile','2013-08-01',45,4,1),
	(4,'J\'ai appris à tirer à l\'arc, pas évident de viser juste :(','2013-06-12',23,1,3),
	(5,'Nous avons visité le musé du vin, lendemain difficil...','2013-07-08',65,5,6),
	(6,'Nous avons été divisé en quatres groupes pour un cache cache géant. Génial!','2013-08-16',45,7,3),
	(7,'La colonie est arrivé à destination, à part deux morts tout va bien. Demain on enterre les corps.','2013-06-22',76,4,5),
	(8,'C\'est mardi, avant dernière soirée :( , mais ce soir c\'est la boom!! ','2013-07-30',34,2,3),
	(9,'Expédition en montagne pour les enfants, on va se muscler les jambes.','2013-08-10',98,8,6),
	(10,'Dimanche, il pleut...','2013-08-30',56,4,2);

/*!40000 ALTER TABLE `histoire` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table intervenant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `intervenant`;

CREATE TABLE `intervenant` (
  `id_intervenant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `type` varchar(30) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id_intervenant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `intervenant` WRITE;
/*!40000 ALTER TABLE `intervenant` DISABLE KEYS */;

INSERT INTO `intervenant` (`id_intervenant`, `nom`, `prenom`, `type`, `mdp`, `mail`)
VALUES
	(1,'Martin','Jean','parent','abc','mail1@ani.fr'),
	(2,'Dupuis','Jules','Animateur','def','mail2@ani.fr'),
	(3,'Delorme','Martine','Animateur','ghi','mail3@ani.fr'),
	(4,'Drouo','Jérôme','Accompagnateur','jkl','mail4@ani.fr'),
	(5,'Treton','Elize','Moniteur','mno','mail5@ani.fr'),
	(6,'Renoton','Jeanne','Moniteur','pqr','mail6@ani.fr');

/*!40000 ALTER TABLE `intervenant` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table lieu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lieu`;

CREATE TABLE `lieu` (
  `id_lieu` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `nom` varchar(70) NOT NULL,
  `note` int(100) NOT NULL,
  PRIMARY KEY (`id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `lieu` WRITE;
/*!40000 ALTER TABLE `lieu` DISABLE KEYS */;

INSERT INTO `lieu` (`id_lieu`, `lat`, `lng`, `nom`, `note`)
VALUES
	(1,48.849,2.44,'Zoo de Vincennes',34),
	(2,45.7769,3.09712,'Clermont-Ferrand',45),
	(3,44.5725,6.696,'Vars',76),
	(4,45.183,5.717,'Grenobles',44),
	(5,46.167,-1.167,'La Rochelle',34),
	(6,48,-4.1,'Quimper',67),
	(7,47.283,-2.2,'Escal\'Atlantic',44),
	(8,42.95,1.583,'Foix',0),
	(9,43.933,4.8,'Pont d\'Avignon',0),
	(10,47.133,-0.15,'Montreuil-Bellay',0),
	(11,0,0,'',0);

/*!40000 ALTER TABLE `lieu` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `media_uk_histoire_idx` (`id_histoire`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id_histoire`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `name` text NOT NULL,
  UNIQUE KEY `inter_uk_enf` (`date_debut`,`id_enfant`,`date_fin`,`id_intervenant`),
  KEY `session_pk_enfant_idx` (`id_enfant`),
  KEY `session_fk_intervenant_idx` (`id_intervenant`),
  CONSTRAINT `session_ibfk_2` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_intervenant`) REFERENCES `intervenant` (`id_intervenant`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;

INSERT INTO `session` (`date_debut`, `date_fin`, `id_enfant`, `id_intervenant`, `name`)
VALUES
	('2013-06-08','2013-06-15',1,2,'Session1'),
	('2013-06-08','2013-06-15',2,2,'Session1'),
	('2013-06-08','2013-06-15',3,2,'Session1'),
	('2013-06-08','2013-06-15',4,2,'Session1'),
	('2013-06-20','2013-06-30',3,3,'Session2'),
	('2013-06-20','2013-06-30',4,3,'Session2'),
	('2013-06-20','2013-06-30',5,3,'Session2'),
	('2013-07-01','2013-07-15',2,5,'Session3'),
	('2013-07-01','2013-07-15',3,5,'Session3'),
	('2013-07-01','2013-07-15',5,5,'Session3'),
	('2013-07-01','2013-07-15',7,5,'Session3'),
	('2013-07-20','2013-07-30',3,3,'Session4'),
	('2013-07-20','2013-07-30',4,3,'Session4'),
	('2013-07-20','2013-07-30',5,3,'Session4'),
	('2013-07-20','2013-07-30',6,3,'Session4'),
	('2013-07-20','2013-07-30',7,3,'Session4'),
	('2013-07-20','2013-07-30',10,3,'Session4'),
	('2013-08-01','2013-08-12',6,1,'Session5'),
	('2013-08-01','2013-08-12',7,1,'Session5'),
	('2013-08-01','2013-08-12',8,1,'Session5'),
	('2013-08-15','2013-08-30',1,4,'Session6'),
	('2013-08-15','2013-08-30',2,4,'Session6'),
	('2013-08-15','2013-08-30',9,4,'Session6'),
	('2013-08-15','2013-08-30',10,4,'Session6');

/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
