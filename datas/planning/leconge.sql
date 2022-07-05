-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 juin 2022 à 07:24
-- Version du serveur : 5.7.19
-- Version de PHP : 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `intracf2m`
--

-- --------------------------------------------------------

--
-- Structure de la table `leconge`
--

DROP TABLE IF EXISTS `leconge`;
CREATE TABLE IF NOT EXISTS `leconge` (
  `idleconge` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ladate` date NOT NULL COMMENT 'date du congé',
  `letype` tinyint(1) NOT NULL COMMENT '0= cours, 1 = matin, 2 = après-midi, 3 = toute la journée',
  `lasession_idlasession` int(10) UNSIGNED NOT NULL COMMENT 'session de formation',
  PRIMARY KEY (`idleconge`),
  KEY `fk_leconge_lasession1_idx` (`lasession_idlasession`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `leconge`
--

INSERT INTO `leconge` (`idleconge`, `ladate`, `letype`, `lasession_idlasession`) VALUES
(1, '2022-08-31', 2, 123),
(2, '2022-09-05', 2, 123),
(3, '2022-10-10', 3, 123),
(4, '2022-10-31', 1, 123),
(5, '2023-05-19', 3, 123),
(6, '2023-09-01', 2, 123);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
