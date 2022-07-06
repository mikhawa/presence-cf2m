-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mer. 06 juil. 2022 à 12:39
-- Version du serveur : 10.3.35-MariaDB
-- Version de PHP : 8.1.7

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `presencescf2m`
--
CREATE DATABASE IF NOT EXISTS `presencescf2m` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `presencescf2m`;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220624094333', '2022-06-28 10:43:17', 167),
('DoctrineMigrations\\Version20220624114100', '2022-06-28 10:48:10', 131),
('DoctrineMigrations\\Version20220701093701', '2022-07-01 09:39:04', 874),
('DoctrineMigrations\\Version20220701100648', '2022-07-01 10:07:19', 565),
('DoctrineMigrations\\Version20220706083802', '2022-07-06 08:38:43', 467),
('DoctrineMigrations\\Version20220706085333', '2022-07-06 08:54:31', 674),
('DoctrineMigrations\\Version20220706090527', '2022-07-06 09:07:04', 62),
('DoctrineMigrations\\Version20220706103515', '2022-07-06 10:37:00', 1252);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promoname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startingdate` date DEFAULT NULL,
  `endingdate` date DEFAULT NULL,
  `nbdays` smallint(5) UNSIGNED DEFAULT NULL,
  `active` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `active` smallint(5) UNSIGNED NOT NULL DEFAULT 1,
  `startingdate` datetime DEFAULT current_timestamp(),
  `endingdate` datetime DEFAULT NULL,
  `promotions_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_53DE51E767B3B43D` (`users_id`),
  KEY `IDX_53DE51E710007789` (`promotions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thesurname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `themail` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theuid` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thestatus` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649405C2D18` (`themail`),
  UNIQUE KEY `UNIQ_8D93D64928110ADD` (`theuid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `thename`, `thesurname`, `themail`, `theuid`, `thestatus`) VALUES
(1, 'util1', '[\"ROLE_USER\"]', '$2y$13$SpkGmFgdOZq2H.T34dE2De/6uDkMQN2AgroA96TBMI9bTfY58.iRK', 'Util', 'Un', 'mike@cf2m.be', '62b8409f6ca621.51874765', 1),
(2, 'perso1', '[\"ROLE_USER\",\"ROLE_PERSO\"]', '$2y$13$O8xaIECsZuyniB53IcSoUeRTMgB5bgM7NU99..t5K.oDiVxdDd47O', 'Formateur', 'Un', 'form@cf2m.be', '62c17fd0c96ee9.44589091', 1),
(3, 'encode1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_ENCODE\"]', '$2y$13$qRPI/dvHLEbXh6m2TqHHf.Yuf9BG8MA/XFe4UibVG.KY0FtRNrpyW', 'Encode', 'Mister', 'encode@cf2m.be', '62c29b139f3a51.05502823', 1),
(4, 'format1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_FORMAT\"]', '$2y$13$VumT2eim34mS0ozalEbhEeJsG4FEglXP.5iPP2sw0PK1FQ1swfu0y', 'Formateur', 'Un', 'format@cf2m.be', '62c2a043841800.30373161', 1),
(5, 'pedago1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_FORMAT\",\"ROLE_ENCODE\",\"ROLE_PEDAGO\"]', '$2y$13$fPMsbaU9xqRPEck2BJPL7OPR3UlJfo6FO1dICY41LCB2i6yt9z8kC', 'Pédagogique', 'Un', 'peda@cf2m.be', '62c2a1dd1539a6.95623362', 1),
(6, 'admin1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_FORMAT\",\"ROLE_ENCODE\",\"ROLE_PEDAGO\",\"ROLE_ADMIN\"]', '$2y$13$EDL1.PBTy3uwZY5T11tBauttHnGi6VSB2OFd4YwyYJ9ZuMocO9bti', 'Admin', 'Un', 'adm@cf2m.be', '62c2a2a50b8bd0.00546715', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `FK_53DE51E710007789` FOREIGN KEY (`promotions_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `FK_53DE51E767B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
