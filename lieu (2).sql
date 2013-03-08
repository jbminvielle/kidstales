-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 08 Mars 2013 à 04:03
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `kidstale`
--

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
  `photo` varchar(150) NOT NULL,
  `comment` varchar(800) NOT NULL,
  PRIMARY KEY (`id_lieu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `lat`, `lng`, `nom`, `note`, `photo`, `comment`) VALUES
(1, 48.849, 2.44, 'Zoo de Vincennes', 34, 'public/images/zoo.jpg', 'Je me suis trop amusé, j''ai même donner à manger aux singes'),
(2, 45.7769, 3.09712, 'Clermont-Ferrand', 45, 'public/images/vulcania.jpg', 'c''était nul, j''ai dormi'),
(3, 44.5725, 6.696, 'Vars', 76, 'public/images/cantal.jpg', ''),
(4, 45.183, 5.717, 'Grenoble', 44, 'public/images/grenoble.jpg', 'on est tous partis en classe de neige à grenoble et on s''y est énormément amusé!'),
(5, 46.167, -1.167, 'La Rochelle', 34, 'public/images/weekngo.jpg', 'c''est mon parc préféré, acrobranches, escalade, jeux. j''ai hate qu''on y retourne'),
(6, 48, -4.1, 'Quimper', 67, 'public/images/cantal.jpg', ''),
(7, 47.283, -2.2, 'Escal''Atlantic', 44, 'public/images/escaleatlantic.jpg', 'j''ai beaucoup aimé visiter le bateau avec mon groupe scout. j''aimerais y retourner un prochaine fois. '),
(8, 42.95, 1.583, 'Foix', 0, 'public/images/chateaufoix.jpg', 'Chateau intéressant pour les enfants mais peu d''informations et difficiles d''accès'),
(9, 43.933, 4.8, 'Pont d''Avignon', 0, 'public/images/avignon.jpg', 'la chanson est mieux que le pont'),
(10, 47.133, -0.15, 'Montreuil-Bellay', 5, 'public/images/MONTREUIL BELLAY.jpg', 'génial !!'),
(11, 0, 0, '', 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
