-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 27 juin 2020 à 23:16
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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
  PRIMARY KEY (`id_club`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `email_club`, `mdp_club`) VALUES
(1, 'Lecture', 'Club-lecture@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
  `description` text NOT NULL,
  `article` text,
  `cloture` tinyint(1) NOT NULL DEFAULT '0',
  `limite` tinyint(1) NOT NULL DEFAULT '0',
  `nbr_places` int(11) DEFAULT NULL,
  `id_club` int(11) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_club` (`id_club`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom_membre`, `prenom_membre`, `email_membre`, `mdp_membre`) VALUES
(1, 'Saadoune', 'Sanaa', 'Sanaa@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
