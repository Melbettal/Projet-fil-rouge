-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 30 août 2020 à 20:51
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdyouclubs`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `id_club` int(11) NOT NULL AUTO_INCREMENT,
  `nom_club` varchar(255) NOT NULL,
  `email_club` varchar(255) NOT NULL,
  `mdp_club` varchar(255) NOT NULL,
  PRIMARY KEY (`id_club`),
  UNIQUE KEY `UniqueMail` (`email_club`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `email_club`, `mdp_club`) VALUES
(4, 'Events', 'club-events@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(5, 'Lecture', 'club-lecture@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nom_event` varchar(255) NOT NULL,
  `date_event` datetime NOT NULL,
  `photo_event` varchar(255) NOT NULL,
  `description_event` text NOT NULL,
  `article` text,
  `cloture` tinyint(1) NOT NULL DEFAULT '0',
  `limite` tinyint(1) NOT NULL DEFAULT '0',
  `nbr_places` int(11) DEFAULT NULL,
  `id_club` int(11) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_club` (`id_club`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_event`, `nom_event`, `date_event`, `photo_event`, `description_event`, `article`, `cloture`, `limite`, `nbr_places`, `id_club`) VALUES
(5, 'Roman le petit prince', '2020-08-14 17:00:00', '608202lecture.jpg', 'chapitre 1', '   C\'était un très bon événement, et c\'était vraiment utile pour tous. On a pu terminé le chapitre 2 de ce roman et on a remarqué que le niveau des apprenants s\'améliore de plus en plus! Premièrement, on a lu ... \r\n   C\'était un très bon événement, et c\'était vraiment utile pour tous. On a pu terminé le chapitre 2 de ce roman et on a remarqué que le niveau des apprenants s\'améliore de plus en plus! Premièrement, on a lu ... \r\n   C\'était un très bon événement, et c\'était vraiment utile pour tous. On a pu terminé le chapitre 2 de ce roman et on a remarqué que le niveau des apprenants s\'améliore de plus en plus! Premièrement, on a lu ... \r\n   C\'était un très bon événement, et c\'était vraiment utile pour tous. On a pu terminé le chapitre 2 de ce roman et on a remarqué que le niveau des apprenants s\'améliore de plus en plus! Premièrement, on a lu ... ', 1, 0, NULL, 1),
(2, 'New year\'s revolution', '2020-12-30 17:30:00', '396573event.jpg', 'NEW YEAR NEW ME', NULL, 0, 0, NULL, 2),
(3, 'YOUSCAPE', '2020-08-22 18:50:00', '874314youscape.jpg', 'STAY TUNED', 'C\'était vraiment un bon evenement ! premièrement on a fait touuuuuut deuxiement et finalement on cloturé cet evenement par donner des cadeaux aux gagnants. C\'était vraiment un bon evenement ,C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , vC\'était vraiment un bon evenement, C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , C\'était vraiment un bon evenement  C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , C\'était vraiment un bon evenement , C\'était vraiment un bon evenement ,C\'était vraiment un bon evenement', 1, 0, NULL, 2),
(4, 'Youcode talents', '2019-01-10 17:30:00', '858808halsey.jpg', 'DECOUVERONS NOS TALENTS', 'C\'était vraiment un bon evenement ?C\'était vraiment un bon evenement ,C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement C\'était vraiment un bon evenement OK!! ;)', 1, 0, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_membre` varchar(255) NOT NULL,
  `prenom_membre` varchar(255) NOT NULL,
  `email_membre` varchar(255) NOT NULL,
  `mdp_membre` varchar(255) NOT NULL,
  `adminYC` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `UniqueMail` (`email_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom_membre`, `prenom_membre`, `email_membre`, `mdp_membre`, `adminYC`) VALUES
(1, 'Saadoune', 'Sanaa', 'Sanaa@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0),
(3, 'Admin', 'Admin', 'admin1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `id_membre` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  KEY `id_membre` (`id_membre`),
  KEY `id_event` (`id_event`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `src_photo` varchar(255) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `id_event` (`id_event`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `src_photo`, `id_event`) VALUES
(1, '720140Billie2.jpg', 1),
(2, '368647iconF.png', 1),
(3, '874419Guitare.png', 1),
(4, '542057iconH.png', 1),
(5, '822921Billie2.jpg', 3),
(6, '985476halsey.jpg', 3),
(7, '442345lect.jpg', 3),
(8, '240638lec.jpg', 3),
(9, '110097lec.jpg', 4),
(10, '241184Billie2.jpg', 4),
(11, '522624lect.jpg', 4),
(12, '558564Billie3.jpg', 4),
(13, '781028lect.jpg', 5),
(14, '508885lectur.jpg', 5),
(15, '654160lec.jpg', 5),
(16, '738429lec.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE IF NOT EXISTS `suggestion` (
  `id_suggest` int(11) NOT NULL AUTO_INCREMENT,
  `text_suggest` text NOT NULL,
  `date_suggest` datetime NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  PRIMARY KEY (`id_suggest`),
  KEY `id_membre` (`id_membre`),
  KEY `id_club` (`id_club`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
