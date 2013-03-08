-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 07 Mars 2013 à 22:22
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `kidstales`
--

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE IF NOT EXISTS `enfant` (
  `id_enfant` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_enfant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `enfant`
--

INSERT INTO `enfant` (`id_enfant`, `prenom`, `mail`, `mdp`, `sexe`) VALUES
(0, 'Julien', 'mail3@dom.com', 'motdepass1', 0),
(1, 'Théo', 'mail1@dom.com', 'motdepass2', 0),
(2, 'Emilie', 'mail@dom.com', 'motdepass3', 0),
(3, 'Julie', 'mail4@dom.com', 'motdepass4', 0),
(4, 'Marie', 'mail8@dom.com', 'motdepass5', 0),
(5, 'Baptiste', 'mail7@dom.com', 'motdepass6', 0),
(6, 'Grégoire', 'mail6@dom.com', 'motdepass7', 0),
(7, 'Anna', 'mail5@dom.com', 'motdepass8', 0),
(8, 'Jérémi', 'mail22@dom.com', 'motdepass9', 0),
(9, 'Jule', 'mail2@dom.com', 'motdepass10', 0),
(10, 'Jennyfer', 'mail9@dom.com', 'motdepass11', 0);

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE IF NOT EXISTS `histoire` (
  `id_histoire` int(11) NOT NULL AUTO_INCREMENT,
  `cont` text NOT NULL,
  `date` date NOT NULL,
  `evaluation` int(100) NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_lieu` int(11) NOT NULL,
  PRIMARY KEY (`id_histoire`),
  KEY `histoire_uk_lieu_idx` (`id_lieu`),
  KEY `histoire_uk_enfant_idx` (`id_enfant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Contenu de la table `histoire`
--

INSERT INTO `histoire` (`id_histoire`, `cont`, `date`, `evaluation`, `id_enfant`, `id_lieu`) VALUES
(1, 'Nous avons visité le chateau de Vincenne, c''était trop cool!', '2013-06-08', 45, 2, 4),
(2, 'Les moniteurs on fait un feu de camp et nous avons fait une veillé chocolat.', '2013-08-03', 34, 3, 3),
(3, 'Nous avons fini de monter les tentes, l''après-midi était difficile', '2013-08-01', 45, 4, 1),
(4, 'J''ai appris à tirer à l''arc, pas évident de viser juste :(', '2013-06-12', 23, 1, 3),
(5, 'Nous avons visité le musé du vin, lendemain difficil...', '2013-07-08', 65, 5, 6),
(6, 'Nous avons été divisé en quatres groupes pour un cache cache géant. Génial!', '2013-08-16', 45, 7, 3),
(7, 'La colonie est arrivé à destination, à part deux morts tout va bien. Demain on enterre les corps.', '2013-06-22', 76, 4, 5),
(8, 'C''est mardi, avant dernière soirée :( , mais ce soir c''est la boom!! ', '2013-07-30', 34, 2, 3),
(9, 'Expédition en montagne pour les enfants, on va se muscler les jambes.', '2013-08-10', 98, 8, 6),
(10, 'Dimanche, il pleut...', '2013-08-30', 56, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE IF NOT EXISTS `intervenant` (
  `id_intervenant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `type` varchar(30) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id_intervenant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `intervenant`
--

INSERT INTO `intervenant` (`id_intervenant`, `nom`, `prenom`, `type`, `mdp`, `mail`) VALUES
(1, 'Martin', 'Jean', 'parent', 'abc', 'mail1@ani.fr'),
(2, 'Dupuis', 'Jules', 'Animateur', 'def', 'mail2@ani.fr'),
(3, 'Delorme', 'Martine', 'Animateur', 'ghi', 'mail3@ani.fr'),
(4, 'Drouo', 'Jérôme', 'Accompagnateur', 'jkl', 'mail4@ani.fr'),
(5, 'Treton', 'Elize', 'Moniteur', 'mno', 'mail5@ani.fr'),
(6, 'Renoton', 'Jeanne', 'Moniteur', 'pqr', 'mail6@ani.fr');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `id_lieu` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `nom` varchar(70) NOT NULL,
  `note` int(100) NOT NULL,
  PRIMARY KEY (`id_lieu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `lat`, `lng`, `nom`, `note`) VALUES
(1, 40, 6, 'ville1', 34),
(2, 36, 5, 'ville2', 45),
(3, 35, 4, 'ville3', 76),
(4, 60, 3, 'ville4', 44),
(5, 50, 6, 'ville5', 34),
(6, 55, 5, 'ville6', 67),
(7, 45, 4, 'ville7', 44);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `media_uk_histoire_idx` (`id_histoire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `name` text NOT NULL,
  UNIQUE KEY `inter_uk_enf` (`date_debut`,`id_enfant`,`date_fin`,`id_intervenant`),
  KEY `session_pk_enfant_idx` (`id_enfant`),
  KEY `session_fk_intervenant_idx` (`id_intervenant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`date_debut`, `date_fin`, `id_enfant`, `id_intervenant`, `name`) VALUES
('2013-06-08', '2013-06-15', 1, 2, 'Session1'),
('2013-06-08', '2013-06-15', 2, 2, 'Session1'),
('2013-06-08', '2013-06-15', 3, 2, 'Session1'),
('2013-06-08', '2013-06-15', 4, 2, 'Session1'),
('2013-06-20', '2013-06-30', 3, 3, 'Session2'),
('2013-06-20', '2013-06-30', 4, 3, 'Session2'),
('2013-06-20', '2013-06-30', 5, 3, 'Session2'),
('2013-07-01', '2013-07-15', 2, 5, 'Session3'),
('2013-07-01', '2013-07-15', 3, 5, 'Session3'),
('2013-07-01', '2013-07-15', 5, 5, 'Session3'),
('2013-07-01', '2013-07-15', 7, 5, 'Session3'),
('2013-07-20', '2013-07-30', 3, 3, 'Session4'),
('2013-07-20', '2013-07-30', 4, 3, 'Session4'),
('2013-07-20', '2013-07-30', 5, 3, 'Session4'),
('2013-07-20', '2013-07-30', 6, 3, 'Session4'),
('2013-07-20', '2013-07-30', 7, 3, 'Session4'),
('2013-07-20', '2013-07-30', 10, 3, 'Session4'),
('2013-08-01', '2013-08-12', 6, 1, 'Session5'),
('2013-08-01', '2013-08-12', 7, 1, 'Session5'),
('2013-08-01', '2013-08-12', 8, 1, 'Session5'),
('2013-08-15', '2013-08-30', 1, 4, 'Session6'),
('2013-08-15', '2013-08-30', 2, 4, 'Session6'),
('2013-08-15', '2013-08-30', 9, 4, 'Session6'),
('2013-08-15', '2013-08-30', 10, 4, 'Session6');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD CONSTRAINT `histoire_ibfk_2` FOREIGN KEY (`id_lieu`) REFERENCES `lieu` (`id_lieu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `histoire_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id_histoire`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_intervenant`) REFERENCES `intervenant` (`id_intervenant`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
