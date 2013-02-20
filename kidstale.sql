-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 20 Février 2013 à 11:50
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

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
-- Structure de la table `enfant`
--

CREATE TABLE IF NOT EXISTS `enfant` (
  `id_enfant` int(11) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `mail_parent` varchar(100) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  PRIMARY KEY (`id_enfant`),
  UNIQUE KEY `id_enfant` (`id_enfant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enfant`
--

INSERT INTO `enfant` (`id_enfant`, `prenom`, `mail_parent`, `mdp`, `id_intervenant`, `session`) VALUES
(0, 'Emilie', 'monpapa@mail.fr', 'abcd', 1, 1),
(1, 'Mathieu', 'mamaman@mail.fr', 'efgh', 0, 1),
(2, 'Julie', 'parents@mail.fr', 'ijkl', 0, 2),
(3, 'Théo', 'papa@mail.fr', 'mnop', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE IF NOT EXISTS `histoire` (
  `id_enfant` int(11) NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `id_inter` int(11) NOT NULL,
  `titre` varchar(145) NOT NULL,
  `texte` text NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE IF NOT EXISTS `intervenant` (
  `id_inter` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `type` varchar(20) NOT NULL,
  `session` int(11) NOT NULL,
  UNIQUE KEY `id_inter` (`id_inter`),
  UNIQUE KEY `prenom` (`prenom`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `session` (`session`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `intervenant`
--

INSERT INTO `intervenant` (`id_inter`, `nom`, `prenom`, `mail`, `mdp`, `type`, `session`) VALUES
(0, 'Cérien', 'Jean', 'cérien.jean@mail.com', 'abc123', 'animateur de colonie', 1),
(1, 'Cépa', 'Jène', 'jenecepa@mail.com', 'def456', 'chef scout', 2);

-- --------------------------------------------------------

--
-- Structure de la table `kids_as_inter`
--

CREATE TABLE IF NOT EXISTS `kids_as_inter` (
  `id_intervenant` int(11) NOT NULL,
  `id_enfant` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_enfant`),
  UNIQUE KEY `id_intervenant` (`id_intervenant`),
  UNIQUE KEY `id_enfant` (`id_enfant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `id_lieu` int(11) NOT NULL,
  `pos_x` float NOT NULL,
  `pos_y` float NOT NULL,
  `nom` varchar(50) NOT NULL,
  `note` int(100) NOT NULL,
  UNIQUE KEY `id_lieu` (`id_lieu`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `pos_x`, `pos_y`, `nom`, `note`) VALUES
(0, 45.7769, 3.08712, 'Clermont-Ferrand', 0),
(1, 44.5725, 6.68016, 'Vars', 0);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_histoire` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `lien` varchar(100) NOT NULL,
  PRIMARY KEY (`id_histoire`),
  UNIQUE KEY `id` (`id_histoire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_histoire`, `type`, `lien`) VALUES
(0, 'photo', 'media/img/image.png'),
(1, 'video', 'media/video/video.ogg'),
(2, 'son', 'media/son/son.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL,
  `titre` varchar(144) NOT NULL,
  `desc` text NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `createur` varchar(50) NOT NULL,
  `media` int(11) NOT NULL,
  UNIQUE KEY `id_post` (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id_post`, `titre`, `desc`, `date`, `lieu`, `createur`, `media`) VALUES
(0, 'Balade en ville', 'Promenade dans les rue de Clermont-Ferrand avec les enfants', '2012-07-07', 'Clermont-Ferrand', 'Cépa', 1),
(1, 'Journée ski', 'Les enfants on passé aujourd''hui leur examen pour la première étoile', '2012-02-12', 'Vars', 'Cérien', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
